<?php
/**
 * Gestión de clientes del Portal del Aventurero.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_portal_register_clients_submenu() {
    add_submenu_page(
        'edit.php?post_type=ukiyo_viaje',
        'Clientes del Portal',
        'Clientes',
        'edit_posts',
        'ukiyo-portal-clientes',
        'ukiyo_portal_render_clients_page'
    );
}
add_action( 'admin_menu', 'ukiyo_portal_register_clients_submenu' );

function ukiyo_portal_send_invitation_email( $user_id ) {
    $user = get_user_by( 'id', absint( $user_id ) );

    if ( ! $user instanceof WP_User ) {
        return false;
    }

    $activation_data = ukiyo_portal_create_activation_token( $user->ID );

    if ( empty( $activation_data['token'] ) ) {
        return false;
    }

    $portal_url      = ukiyo_portal_get_dashboard_url();
    $activation_url  = ukiyo_portal_get_activation_url( $user->ID, $activation_data['token'] );
    $subject         = 'Acceso al Portal del Aventurero de UKIYO';
    $trip_title      = ukiyo_portal_get_first_trip_title_for_user( $user->ID );
    $html_body       = ukiyo_portal_get_invitation_email_html(
        [
            '{{CLIENT_NAME}}'    => $user->display_name ?: $user->user_login,
            '{{TRIP_TITLE}}'     => $trip_title,
            '{{ACTIVATION_URL}}' => $activation_url,
            '{{PORTAL_URL}}'     => $portal_url,
        ]
    );
    $headers         = [ 'Content-Type: text/html; charset=UTF-8' ];

    return wp_mail( $user->user_email, $subject, $html_body, $headers );
}

function ukiyo_portal_get_activation_url( $user_id, $token ) {
    return home_url(
        sprintf(
            '/portal-del-aventurero/acceso/%1$d/%2$s/',
            absint( $user_id ),
            rawurlencode( (string) $token )
        )
    );
}

function ukiyo_portal_create_activation_token( $user_id ) {
    $user_id = absint( $user_id );

    if ( ! $user_id ) {
        return [];
    }

    $token = wp_generate_password( 48, false, false );
    update_user_meta(
        $user_id,
        'ukiyo_portal_activation',
        [
            'hash'    => wp_hash_password( $token ),
            'expires' => time() + DAY_IN_SECONDS * 7,
        ]
    );

    return [
        'token'   => $token,
        'expires' => time() + DAY_IN_SECONDS * 7,
    ];
}

function ukiyo_portal_get_activation_user( $user_id, $token ) {
    $user_id = absint( $user_id );
    $token   = (string) $token;

    if ( ! $user_id || '' === $token ) {
        return null;
    }

    $user = get_user_by( 'id', $user_id );
    if ( ! $user instanceof WP_User ) {
        return null;
    }

    $activation = get_user_meta( $user_id, 'ukiyo_portal_activation', true );

    if (
        ! is_array( $activation ) ||
        empty( $activation['hash'] ) ||
        empty( $activation['expires'] ) ||
        time() > absint( $activation['expires'] ) ||
        ! wp_check_password( $token, $activation['hash'] )
    ) {
        return null;
    }

    return $user;
}

function ukiyo_portal_clear_activation_token( $user_id ) {
    delete_user_meta( absint( $user_id ), 'ukiyo_portal_activation' );
}

function ukiyo_portal_get_first_trip_title_for_user( $user_id ) {
    $trips = get_posts(
        [
            'post_type'      => 'ukiyo_viaje',
            'post_status'    => [ 'publish', 'private', 'draft', 'pending', 'future' ],
            'posts_per_page' => 1,
            'orderby'        => 'modified',
            'order'          => 'DESC',
            'meta_query'     => [
                [
                    'key'     => 'ukiyo_portal_users',
                    'value'   => 'i:' . absint( $user_id ) . ';',
                    'compare' => 'LIKE',
                ],
            ],
        ]
    );

    return ! empty( $trips ) ? get_the_title( $trips[0] ) : 'tu viaje';
}

function ukiyo_portal_get_invitation_email_template_path() {
    return get_template_directory() . '/emails/out/invitacion_portal.html';
}

function ukiyo_portal_get_invitation_email_html( $replacements = [] ) {
    $template_path = ukiyo_portal_get_invitation_email_template_path();

    if ( file_exists( $template_path ) ) {
        $html = file_get_contents( $template_path );

        if ( false !== $html ) {
            $html = strtr( $html, $replacements );
            $html = ukiyo_email_replace_static_urls( $html );

            return $html;
        }
    }

    $client_name = isset( $replacements['{{CLIENT_NAME}}'] ) ? $replacements['{{CLIENT_NAME}}'] : 'viajero';
    $trip_title  = isset( $replacements['{{TRIP_TITLE}}'] ) ? $replacements['{{TRIP_TITLE}}'] : 'tu viaje';
    $reset_url   = isset( $replacements['{{ACTIVATION_URL}}'] ) ? $replacements['{{ACTIVATION_URL}}'] : '';
    $portal_url  = isset( $replacements['{{PORTAL_URL}}'] ) ? $replacements['{{PORTAL_URL}}'] : '';

    return wp_kses_post(
        '<p>Hola ' . esc_html( $client_name ) . ',</p>' .
        '<p>Ya tienes acceso al Portal del Aventurero de UKIYO para consultar ' . esc_html( $trip_title ) . '.</p>' .
        '<p><a href="' . esc_url( $reset_url ) . '">Activa aquí tu acceso</a></p>' .
        '<p>Después podrás entrar desde <a href="' . esc_url( $portal_url ) . '">' . esc_html( $portal_url ) . '</a>.</p>'
    );
}

function ukiyo_portal_handle_create_client() {
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_die( 'No autorizado.' );
    }

    check_admin_referer( 'ukiyo_portal_create_client' );

    $name        = isset( $_POST['client_name'] ) ? sanitize_text_field( wp_unslash( $_POST['client_name'] ) ) : '';
    $email       = isset( $_POST['client_email'] ) ? sanitize_email( wp_unslash( $_POST['client_email'] ) ) : '';
    $send_invite = ! empty( $_POST['send_invite'] );
    $redirect_to = admin_url( 'edit.php?post_type=ukiyo_viaje&page=ukiyo-portal-clientes' );

    if ( ! $email ) {
        wp_safe_redirect( add_query_arg( 'portal_client_notice', 'invalid_email', $redirect_to ) );
        exit;
    }

    $existing_user = get_user_by( 'email', $email );
    $user_id       = 0;

    if ( $existing_user instanceof WP_User ) {
        $user_id = $existing_user->ID;
        if ( $name ) {
            wp_update_user(
                [
                    'ID'           => $user_id,
                    'display_name' => $name,
                    'first_name'   => $name,
                ]
            );
        }
    } else {
        $username = ukiyo_portal_generate_username_from_email( $email );
        $password = wp_generate_password( 24, true, true );
        $user_id  = wp_create_user( $username, $password, $email );

        if ( is_wp_error( $user_id ) ) {
            wp_safe_redirect( add_query_arg( 'portal_client_notice', 'create_error', $redirect_to ) );
            exit;
        }

        wp_update_user(
            [
                'ID'           => $user_id,
                'display_name' => $name ?: $username,
                'first_name'   => $name ?: '',
                'role'         => 'subscriber',
            ]
        );
    }

    ukiyo_portal_mark_user_as_client( $user_id );

    if ( $send_invite ) {
        ukiyo_portal_send_invitation_email( $user_id );
    }

    wp_safe_redirect( add_query_arg( 'portal_client_notice', $send_invite ? 'client_invited' : 'client_saved', $redirect_to ) );
    exit;
}
add_action( 'admin_post_ukiyo_portal_create_client', 'ukiyo_portal_handle_create_client' );

function ukiyo_portal_handle_resend_invite() {
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_die( 'No autorizado.' );
    }

    $user_id     = isset( $_GET['user_id'] ) ? absint( $_GET['user_id'] ) : 0;
    $redirect_to = admin_url( 'edit.php?post_type=ukiyo_viaje&page=ukiyo-portal-clientes' );

    check_admin_referer( 'ukiyo_portal_resend_invite_' . $user_id );

    if ( ! $user_id || ! ukiyo_portal_is_client_user( $user_id ) ) {
        wp_safe_redirect( add_query_arg( 'portal_client_notice', 'invite_error', $redirect_to ) );
        exit;
    }

    ukiyo_portal_send_invitation_email( $user_id );
    wp_safe_redirect( add_query_arg( 'portal_client_notice', 'invite_resent', $redirect_to ) );
    exit;
}
add_action( 'admin_post_ukiyo_portal_resend_invite', 'ukiyo_portal_handle_resend_invite' );

function ukiyo_portal_remove_client_from_trips( $user_id ) {
    $user_id = absint( $user_id );

    if ( ! $user_id ) {
        return;
    }

    $trips = get_posts(
        [
            'post_type'      => 'ukiyo_viaje',
            'post_status'    => [ 'publish', 'private', 'draft', 'pending', 'future' ],
            'posts_per_page' => -1,
            'meta_query'     => [
                [
                    'key'     => 'ukiyo_portal_users',
                    'value'   => 'i:' . $user_id . ';',
                    'compare' => 'LIKE',
                ],
            ],
        ]
    );

    foreach ( $trips as $trip ) {
        $assigned_users = get_post_meta( $trip->ID, 'ukiyo_portal_users', true );
        $assigned_users = is_array( $assigned_users ) ? array_map( 'absint', $assigned_users ) : [];
        $assigned_users = array_values( array_filter( $assigned_users, static function ( $assigned_user_id ) use ( $user_id ) {
            return $assigned_user_id !== $user_id;
        } ) );

        update_post_meta( $trip->ID, 'ukiyo_portal_users', $assigned_users );
    }
}

function ukiyo_portal_handle_delete_client() {
    if ( ! current_user_can( 'delete_users' ) && ! current_user_can( 'edit_posts' ) ) {
        wp_die( 'No autorizado.' );
    }

    $user_id     = isset( $_GET['user_id'] ) ? absint( $_GET['user_id'] ) : 0;
    $redirect_to = admin_url( 'edit.php?post_type=ukiyo_viaje&page=ukiyo-portal-clientes' );

    check_admin_referer( 'ukiyo_portal_delete_client_' . $user_id );

    if ( ! $user_id || ! ukiyo_portal_is_client_user( $user_id ) || user_can( $user_id, 'manage_options' ) ) {
        wp_safe_redirect( add_query_arg( 'portal_client_notice', 'delete_error', $redirect_to ) );
        exit;
    }

    ukiyo_portal_remove_client_from_trips( $user_id );
    delete_user_meta( $user_id, 'ukiyo_portal_activation' );
    delete_user_meta( $user_id, 'ukiyo_portal_client' );

    require_once ABSPATH . 'wp-admin/includes/user.php';
    $deleted = wp_delete_user( $user_id );

    wp_safe_redirect( add_query_arg( 'portal_client_notice', $deleted ? 'client_deleted' : 'delete_error', $redirect_to ) );
    exit;
}
add_action( 'admin_post_ukiyo_portal_delete_client', 'ukiyo_portal_handle_delete_client' );

function ukiyo_portal_render_clients_notice() {
    $notice = isset( $_GET['portal_client_notice'] ) ? sanitize_key( wp_unslash( $_GET['portal_client_notice'] ) ) : '';

    if ( ! $notice ) {
        return;
    }

    $messages = [
        'client_saved'   => [ 'Cliente guardado correctamente.', 'updated' ],
        'client_invited' => [ 'Cliente creado e invitación enviada.', 'updated' ],
        'invite_resent'  => [ 'Invitación reenviada.', 'updated' ],
        'client_deleted' => [ 'Cliente eliminado correctamente.', 'updated' ],
        'invalid_email'  => [ 'Introduce un email válido.', 'error' ],
        'create_error'   => [ 'No se pudo crear el cliente.', 'error' ],
        'invite_error'   => [ 'No se pudo reenviar la invitación.', 'error' ],
        'delete_error'   => [ 'No se pudo eliminar el cliente.', 'error' ],
    ];

    if ( ! isset( $messages[ $notice ] ) ) {
        return;
    }

    list( $message, $class ) = $messages[ $notice ];
    printf( '<div class="%1$s notice"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
}

function ukiyo_portal_render_clients_page() {
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_die( 'No autorizado.' );
    }

    $search_term = isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';
    $page_number = isset( $_GET['paged_clients'] ) ? max( 1, absint( $_GET['paged_clients'] ) ) : 1;
    $per_page    = 10;

    $query_args = [
        'orderby'      => 'display_name',
        'order'        => 'ASC',
        'meta_key'     => 'ukiyo_portal_client',
        'meta_value'   => 1,
        'number'       => $per_page,
        'offset'       => ( $page_number - 1 ) * $per_page,
        'count_total'  => true,
    ];

    if ( '' !== $search_term ) {
        $query_args['search']         = '*' . $search_term . '*';
        $query_args['search_columns'] = [ 'display_name', 'user_email', 'user_login' ];
    }

    $clients_query = new WP_User_Query( $query_args );
    $clients       = ! empty( $clients_query->get_results() ) ? $clients_query->get_results() : [];
    $total_clients = (int) $clients_query->get_total();
    $total_pages   = max( 1, (int) ceil( $total_clients / $per_page ) );
    $base_url      = admin_url( 'edit.php?post_type=ukiyo_viaje&page=ukiyo-portal-clientes' );
    ukiyo_portal_admin_styles();
    ?>
    <div class="wrap">
        <h1>Clientes del Portal del Aventurero</h1>
        <?php ukiyo_portal_render_clients_notice(); ?>

        <div class="ukiyo-portal-admin" style="max-width:1120px">
            <div class="ukiyo-field-grid">
                <section class="ukiyo-repeater-item" style="padding:24px">
                    <h2 style="margin-top:0">Añadir o invitar cliente</h2>
                    <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                        <input type="hidden" name="action" value="ukiyo_portal_create_client" />
                        <?php wp_nonce_field( 'ukiyo_portal_create_client' ); ?>
                        <div class="ukiyo-field">
                            <label for="client_name">Nombre</label>
                            <input type="text" id="client_name" name="client_name" />
                        </div>
                        <div class="ukiyo-field">
                            <label for="client_email">Email</label>
                            <input type="email" id="client_email" name="client_email" required />
                        </div>
                        <div class="ukiyo-field">
                            <label style="display:flex;gap:10px;align-items:center">
                                <input type="checkbox" name="send_invite" value="1" checked style="width:auto" />
                                Enviar email de acceso al portal
                            </label>
                        </div>
                        <p>
                            <button type="submit" class="button button-primary">Guardar cliente</button>
                        </p>
                    </form>
                </section>

                <section class="ukiyo-repeater-item" style="padding:24px">
                    <h2 style="margin-top:0">Clientes disponibles</h2>
                    <form method="get" action="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>" style="margin-bottom:18px;display:flex;gap:12px;align-items:end;flex-wrap:wrap">
                        <input type="hidden" name="post_type" value="ukiyo_viaje" />
                        <input type="hidden" name="page" value="ukiyo-portal-clientes" />
                        <div class="ukiyo-field" style="margin:0;min-width:280px;flex:1 1 280px">
                            <label for="ukiyo-client-search">Buscar cliente</label>
                            <input type="text" id="ukiyo-client-search" name="s" value="<?php echo esc_attr( $search_term ); ?>" placeholder="Nombre o email" />
                        </div>
                        <p style="margin:0">
                            <button type="submit" class="button button-secondary">Filtrar</button>
                            <?php if ( '' !== $search_term ) : ?>
                                <a class="button" href="<?php echo esc_url( $base_url ); ?>">Limpiar</a>
                            <?php endif; ?>
                        </p>
                    </form>

                    <?php if ( empty( $clients ) ) : ?>
                        <p><?php echo '' !== $search_term ? 'No hay clientes que coincidan con esa búsqueda.' : 'Aún no hay clientes creados para el portal.'; ?></p>
                    <?php else : ?>
                        <table class="widefat striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $clients as $client ) : ?>
                                    <tr>
                                        <td><?php echo esc_html( $client->display_name ?: $client->user_login ); ?></td>
                                        <td><?php echo esc_html( $client->user_email ); ?></td>
                                        <td>
                                            <div class="ukiyo-client-actions">
                                                <a
                                                    class="ukiyo-icon-button"
                                                    href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=ukiyo_portal_resend_invite&user_id=' . $client->ID ), 'ukiyo_portal_resend_invite_' . $client->ID ) ); ?>"
                                                    aria-label="<?php echo esc_attr( sprintf( 'Reenviar invitación a %s', $client->display_name ?: $client->user_login ) ); ?>"
                                                    title="Reenviar invitación"
                                                >
                                                    <svg viewBox="0 0 24 24" role="img" focusable="false" aria-hidden="true">
                                                        <path fill="currentColor" d="M4.75 5A2.75 2.75 0 0 0 2 7.75v8.5A2.75 2.75 0 0 0 4.75 19h14.5A2.75 2.75 0 0 0 22 16.25v-8.5A2.75 2.75 0 0 0 19.25 5H4.75Zm0 1.5h14.5c.3 0 .57.1.8.26L12 12.56 3.95 6.76c.23-.16.5-.26.8-.26Zm-1.25 1.5v8.25c0 .69.56 1.25 1.25 1.25h14.5c.69 0 1.25-.56 1.25-1.25V8l-8.06 5.8a.75.75 0 0 1-.88 0L3.5 8Z"/>
                                                    </svg>
                                                </a>
                                                <a
                                                    class="ukiyo-icon-button ukiyo-icon-button--delete"
                                                    href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=ukiyo_portal_delete_client&user_id=' . $client->ID ), 'ukiyo_portal_delete_client_' . $client->ID ) ); ?>"
                                                    onclick="return confirm('Se eliminará este cliente del portal. ¿Continuar?');"
                                                    aria-label="<?php echo esc_attr( sprintf( 'Eliminar cliente %s', $client->display_name ?: $client->user_login ) ); ?>"
                                                    title="Eliminar cliente"
                                                >
                                                    <svg viewBox="0 0 24 24" role="img" focusable="false" aria-hidden="true">
                                                        <path fill="currentColor" d="M9 3.75A1.75 1.75 0 0 1 10.75 2h2.5A1.75 1.75 0 0 1 15 3.75V4h4a.75.75 0 0 1 0 1.5h-.68l-.62 12.05A2.5 2.5 0 0 1 15.2 20H8.8a2.5 2.5 0 0 1-2.5-2.45L5.68 5.5H5a.75.75 0 0 1 0-1.5h4v-.25ZM10.5 4h3v-.25a.25.25 0 0 0-.25-.25h-2.5a.25.25 0 0 0-.25.25V4Zm-2.7 1.5.6 11.97c.03.54.47.96 1 .96h6.4c.53 0 .97-.42 1-.96l.6-11.97H7.8Zm2.45 2.25c.41 0 .75.34.75.75v6a.75.75 0 0 1-1.5 0v-6c0-.41.34-.75.75-.75Zm3.5 0c.41 0 .75.34.75.75v6a.75.75 0 0 1-1.5 0v-6c0-.41.34-.75.75-.75Z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <?php if ( $total_pages > 1 ) : ?>
                            <div style="margin-top:18px;display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap">
                                <p style="margin:0;color:#6b655e">
                                    Mostrando <?php echo esc_html( (string) ( ( $page_number - 1 ) * $per_page + 1 ) ); ?>-<?php echo esc_html( (string) min( $page_number * $per_page, $total_clients ) ); ?> de <?php echo esc_html( (string) $total_clients ); ?> clientes
                                </p>
                                <div style="display:flex;gap:10px;align-items:center">
                                    <?php if ( $page_number > 1 ) : ?>
                                        <a class="button button-secondary" href="<?php echo esc_url( add_query_arg( [ 's' => $search_term, 'paged_clients' => $page_number - 1 ], $base_url ) ); ?>">Anterior</a>
                                    <?php endif; ?>
                                    <span style="color:#6b655e">Página <?php echo esc_html( (string) $page_number ); ?> de <?php echo esc_html( (string) $total_pages ); ?></span>
                                    <?php if ( $page_number < $total_pages ) : ?>
                                        <a class="button button-secondary" href="<?php echo esc_url( add_query_arg( [ 's' => $search_term, 'paged_clients' => $page_number + 1 ], $base_url ) ); ?>">Siguiente</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>
    <?php
}
