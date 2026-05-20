<?php
/**
 * Envío manual de emails desde plantillas exportadas.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_portal_register_emails_submenu() {
    add_submenu_page(
        'edit.php?post_type=ukiyo_viaje',
        'Emails UKIYO',
        'Emails',
        'edit_posts',
        'ukiyo-portal-emails',
        'ukiyo_portal_render_emails_page'
    );
}
add_action( 'admin_menu', 'ukiyo_portal_register_emails_submenu' );

function ukiyo_portal_get_emails_page_url( $args = [] ) {
    return add_query_arg( $args, admin_url( 'edit.php?post_type=ukiyo_viaje&page=ukiyo-portal-emails' ) );
}

function ukiyo_portal_get_email_template_dir() {
    return trailingslashit( get_template_directory() ) . 'emails/out';
}

function ukiyo_portal_get_email_template_label( $filename ) {
    $filename = preg_replace( '/\.html$/i', '', (string) $filename );
    $label    = preg_replace( '/(?<!^)([A-Z])/', ' $1', $filename );
    $label    = str_replace( [ '-', '_' ], ' ', $label );
    $label    = preg_replace( '/\s+/', ' ', $label );
    $label    = ucwords( trim( $label ) );
    $label    = str_replace( 'Ukiyo', 'UKIYO', $label );

    return $label;
}

function ukiyo_portal_get_email_template_subject( $filename ) {
    return ukiyo_portal_get_email_template_label( $filename );
}

function ukiyo_portal_get_email_templates() {
    $template_dir = ukiyo_portal_get_email_template_dir();
    $files        = glob( $template_dir . '/*.html' );
    $templates    = [];

    if ( false === $files ) {
        return $templates;
    }

    foreach ( $files as $file ) {
        if ( ! is_string( $file ) || ! file_exists( $file ) ) {
            continue;
        }

        $filename = basename( $file );

        $templates[ $filename ] = [
            'filename' => $filename,
            'path'     => $file,
            'label'    => ukiyo_portal_get_email_template_label( $filename ),
            'subject'  => ukiyo_portal_get_email_template_subject( $filename ),
        ];
    }

    uasort(
        $templates,
        static function ( $left, $right ) {
            return strcasecmp( $left['label'], $right['label'] );
        }
    );

    return $templates;
}

function ukiyo_portal_get_email_template( $filename ) {
    $templates = ukiyo_portal_get_email_templates();

    return isset( $templates[ $filename ] ) ? $templates[ $filename ] : null;
}

function ukiyo_portal_get_email_template_html( $filename ) {
    $template = ukiyo_portal_get_email_template( $filename );

    if ( ! is_array( $template ) || empty( $template['path'] ) || ! file_exists( $template['path'] ) ) {
        return '';
    }

    $html = file_get_contents( $template['path'] );

    if ( false === $html ) {
        return '';
    }

    return ukiyo_email_replace_static_urls( $html );
}

function ukiyo_portal_extract_email_placeholders( $html ) {
    if ( ! is_string( $html ) || '' === $html ) {
        return [];
    }

    preg_match_all( '/\{\{[A-Z0-9_]+\}\}/', $html, $matches );

    if ( empty( $matches[0] ) ) {
        return [];
    }

    return array_values( array_unique( $matches[0] ) );
}

function ukiyo_portal_get_email_placeholder_default_value( $token ) {
    $normalized = trim( (string) $token, '{}' );

    $defaults = [
        'CLIENT_NAME'      => 'María',
        'CONTACT_NAME'     => 'Laura',
        'LEAD_NAME'        => 'María',
        'COMPANY_NAME'     => 'IATI Seguros',
        'COMPANY_TYPE'     => 'aseguradora especializada en viajes',
        'TRIP_TITLE'       => 'tu viaje por Costa Rica',
        'ACTIVATION_URL'   => home_url( '/portal-del-aventurero/' ),
        'PORTAL_URL'       => home_url( '/portal-del-aventurero/' ),
        'SCHEDULE_LINK'    => home_url( '/contacto/' ),
        'WHATSAPP_LINK'    => 'https://wa.me/34635300441',
        'WEBSITE_URL'      => home_url( '/' ),
        'TRIP_NAME'        => 'Aventura en Indonesia',
        'DESTINATION'      => 'Costa Rica',
        'DOCUMENTS_URL'    => home_url( '/' ),
        'PROPOSAL_URL'     => home_url( '/' ),
        'PAYMENT_URL'      => home_url( '/' ),
        'CONTACT_EMAIL'    => 'info@viajesukiyo.com',
        'CONTACT_PHONE'    => '+34 635 300 441',
        'CONTACT_WHATSAPP' => '+34 635 300 441',
    ];

    if ( isset( $defaults[ $normalized ] ) ) {
        return $defaults[ $normalized ];
    }

    if ( false !== strpos( $normalized, 'URL' ) || false !== strpos( $normalized, 'LINK' ) ) {
        return home_url( '/' );
    }

    if ( false !== strpos( $normalized, 'EMAIL' ) ) {
        return 'info@viajesukiyo.com';
    }

    if ( false !== strpos( $normalized, 'PHONE' ) || false !== strpos( $normalized, 'WHATSAPP' ) ) {
        return '+34 635 300 441';
    }

    if ( false !== strpos( $normalized, 'NAME' ) ) {
        return 'María';
    }

    return strtolower( str_replace( '_', ' ', $normalized ) );
}

function ukiyo_portal_get_email_placeholder_values( $tokens, $submitted_values = [] ) {
    $values = [];

    foreach ( (array) $tokens as $token ) {
        if ( ! is_string( $token ) || '' === $token ) {
            continue;
        }

        if ( isset( $submitted_values[ $token ] ) ) {
            $values[ $token ] = (string) $submitted_values[ $token ];
            continue;
        }

        $values[ $token ] = ukiyo_portal_get_email_placeholder_default_value( $token );
    }

    return $values;
}

function ukiyo_portal_render_email_html( $template_html, $placeholder_values = [] ) {
    $replacements = [];

    foreach ( (array) $placeholder_values as $token => $value ) {
        if ( ! is_string( $token ) || '' === $token ) {
            continue;
        }

        $replacements[ $token ] = (string) $value;
    }

    $html = strtr( (string) $template_html, $replacements );

    return ukiyo_email_replace_static_urls( $html );
}

function ukiyo_portal_get_email_draft_transient_key() {
    return 'ukiyo_portal_email_draft_' . get_current_user_id();
}

function ukiyo_portal_store_email_draft( $data ) {
    set_transient( ukiyo_portal_get_email_draft_transient_key(), (array) $data, 10 * MINUTE_IN_SECONDS );
}

function ukiyo_portal_consume_email_draft() {
    $key   = ukiyo_portal_get_email_draft_transient_key();
    $draft = get_transient( $key );

    if ( false !== $draft ) {
        delete_transient( $key );
    }

    return is_array( $draft ) ? $draft : [];
}

function ukiyo_portal_handle_send_email_template() {
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_die( 'No autorizado.' );
    }

    check_admin_referer( 'ukiyo_portal_send_email_template' );

    $templates          = ukiyo_portal_get_email_templates();
    $template           = isset( $_POST['template'] ) ? sanitize_file_name( wp_unslash( $_POST['template'] ) ) : '';
    $recipient          = isset( $_POST['recipient_email'] ) ? sanitize_email( wp_unslash( $_POST['recipient_email'] ) ) : '';
    $subject            = isset( $_POST['email_subject'] ) ? sanitize_text_field( wp_unslash( $_POST['email_subject'] ) ) : '';
    $template_html      = isset( $_POST['template_html'] ) ? wp_unslash( $_POST['template_html'] ) : '';
    $raw_values         = isset( $_POST['placeholder_values'] ) && is_array( $_POST['placeholder_values'] ) ? wp_unslash( $_POST['placeholder_values'] ) : [];
    $redirect_args      = [ 'template' => $template ];
    $errors             = [];
    $placeholder_values = [];
    $tokens             = ukiyo_portal_extract_email_placeholders( $template_html );

    if ( ! isset( $templates[ $template ] ) ) {
        $errors[] = 'Selecciona una plantilla válida.';
    }

    if ( empty( $recipient ) || ! is_email( $recipient ) ) {
        $errors[] = 'Introduce un correo de destino válido.';
    }

    if ( '' === $subject ) {
        $errors[] = 'El asunto no puede estar vacío.';
    }

    if ( '' === trim( $template_html ) ) {
        $errors[] = 'El HTML del email no puede estar vacío.';
    }

    foreach ( $tokens as $token ) {
        $placeholder_values[ $token ] = isset( $raw_values[ $token ] ) ? sanitize_textarea_field( $raw_values[ $token ] ) : '';
    }

    $html_body = ukiyo_portal_render_email_html( $template_html, $placeholder_values );

    if ( empty( $errors ) ) {
        $sent = wp_mail(
            $recipient,
            $subject,
            $html_body,
            [ 'Content-Type: text/html; charset=UTF-8' ]
        );

        if ( $sent ) {
            wp_safe_redirect(
                ukiyo_portal_get_emails_page_url(
                    [
                        'email_notice' => 'sent',
                        'template'     => $template,
                    ]
                )
            );
            exit;
        }

        $errors[] = 'WordPress no pudo enviar el correo. Revisa la configuración de envío del sitio.';
    }

    ukiyo_portal_store_email_draft(
        [
            'errors'             => $errors,
            'template'           => $template,
            'recipient_email'    => $recipient,
            'email_subject'      => $subject,
            'template_html'      => $template_html,
            'placeholder_values' => $placeholder_values,
        ]
    );

    wp_safe_redirect( ukiyo_portal_get_emails_page_url( $redirect_args ) );
    exit;
}
add_action( 'admin_post_ukiyo_portal_send_email_template', 'ukiyo_portal_handle_send_email_template' );

function ukiyo_portal_render_emails_page() {
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_die( 'No autorizado.' );
    }

    $templates = ukiyo_portal_get_email_templates();
    $draft     = ukiyo_portal_consume_email_draft();
    $feedback_notice = ukiyo_portal_consume_feedback_notice();

    if ( empty( $templates ) ) {
        echo '<div class="wrap"><h1>Emails UKIYO</h1><div class="notice notice-error"><p>No se han encontrado plantillas en <code>emails/out</code>.</p></div></div>';
        return;
    }

    $template_keys     = array_keys( $templates );
    $selected_template = '';

    if ( ! empty( $draft['template'] ) && isset( $templates[ $draft['template'] ] ) ) {
        $selected_template = $draft['template'];
    } elseif ( isset( $_GET['template'] ) ) {
        $requested_template = sanitize_file_name( wp_unslash( $_GET['template'] ) );
        if ( isset( $templates[ $requested_template ] ) ) {
            $selected_template = $requested_template;
        }
    }

    if ( ! $selected_template ) {
        $selected_template = $template_keys[0];
    }

    $template_html      = ! empty( $draft['template_html'] ) ? (string) $draft['template_html'] : ukiyo_portal_get_email_template_html( $selected_template );
    $tokens             = ukiyo_portal_extract_email_placeholders( $template_html );
    $placeholder_values = ukiyo_portal_get_email_placeholder_values(
        $tokens,
        isset( $draft['placeholder_values'] ) ? (array) $draft['placeholder_values'] : []
    );
    $recipient_email    = ! empty( $draft['recipient_email'] ) ? (string) $draft['recipient_email'] : '';
    $email_subject      = ! empty( $draft['email_subject'] ) ? (string) $draft['email_subject'] : $templates[ $selected_template ]['subject'];
    $preview_html       = ukiyo_portal_render_email_html( $template_html, $placeholder_values );
    $notice             = isset( $_GET['email_notice'] ) ? sanitize_key( wp_unslash( $_GET['email_notice'] ) ) : '';
    $feedback_trip_id   = isset( $_GET['feedback_trip_id'] ) ? absint( $_GET['feedback_trip_id'] ) : 0;
    $feedback_trip      = $feedback_trip_id ? get_post( $feedback_trip_id ) : null;
    $feedback_trip_list = ukiyo_portal_get_feedback_email_trip_options();
    $feedback_users     = $feedback_trip instanceof WP_Post ? ukiyo_portal_get_feedback_trip_client_users( $feedback_trip ) : [];
    $manual_feedback_trips = ukiyo_portal_get_manual_feedback_trip_options();

    ukiyo_portal_admin_styles();
    ?>
    <style>
        .ukiyo-email-layout{display:grid;grid-template-columns:minmax(360px,460px) minmax(0,1fr);gap:24px;align-items:start}
        .ukiyo-email-panel{padding:24px}
        .ukiyo-email-panel h2{margin-top:0}
        .ukiyo-email-preview-shell{position:sticky;top:32px}
        .ukiyo-email-preview-frame{width:100%;min-height:900px;border:1px solid #d8d0c7;border-radius:18px;background:#fff}
        .ukiyo-email-token-list{display:grid;gap:12px}
        .ukiyo-email-toolbar{display:flex;gap:12px;align-items:end;flex-wrap:wrap}
        .ukiyo-email-toolbar .ukiyo-field{margin-bottom:0;flex:1 1 260px}
        .ukiyo-email-toolbar .button{margin-bottom:1px}
        .ukiyo-email-code{font-family:Menlo,Monaco,Consolas,monospace;font-size:12px;line-height:1.5;min-height:420px}
        .ukiyo-email-meta{display:flex;gap:10px;flex-wrap:wrap;margin:12px 0 0}
        .ukiyo-email-chip{display:inline-flex;align-items:center;gap:8px;padding:7px 12px;border-radius:999px;background:#f6f0e8;color:#6b655e;font-size:12px}
        @media (max-width: 1280px){
            .ukiyo-email-layout{grid-template-columns:1fr}
            .ukiyo-email-preview-shell{position:static}
        }
    </style>
    <div class="wrap">
        <h1>Emails UKIYO</h1>

        <?php if ( 'sent' === $notice ) : ?>
            <div class="notice notice-success"><p>Email enviado correctamente.</p></div>
        <?php endif; ?>

        <?php if ( ! empty( $feedback_notice['message'] ) ) : ?>
            <div class="notice notice-<?php echo 'success' === ( $feedback_notice['type'] ?? '' ) ? 'success' : 'error'; ?>">
                <p><?php echo esc_html( $feedback_notice['message'] ); ?></p>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $draft['errors'] ) ) : ?>
            <div class="notice notice-error">
                <p><strong>No se ha podido enviar el email.</strong></p>
                <ul style="list-style:disc;padding-left:20px;margin:8px 0 0">
                    <?php foreach ( (array) $draft['errors'] as $error ) : ?>
                        <li><?php echo esc_html( $error ); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="ukiyo-portal-admin" style="max-width:1400px" data-ukiyo-email-composer>
            <div class="ukiyo-repeater-item ukiyo-email-panel" style="margin-bottom:24px">
                <h2>Feedback manual</h2>
                <p class="ukiyo-hint" style="margin-top:-4px">Úsalo para viajes ya realizados que no existen como <code>ukiyo_viaje</code> dentro del portal.</p>

                <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" style="margin-top:20px">
                    <input type="hidden" name="action" value="ukiyo_portal_send_manual_feedback_request" />
                    <?php wp_nonce_field( 'ukiyo_portal_send_manual_feedback_request' ); ?>

                    <div class="ukiyo-field-grid">
                        <div class="ukiyo-field">
                            <label for="ukiyo-manual-feedback-trip">Viaje manual</label>
                            <select id="ukiyo-manual-feedback-trip" name="manual_feedback_trip_slug" required>
                                <option value="">Selecciona un viaje</option>
                                <?php foreach ( $manual_feedback_trips as $manual_slug => $manual_label ) : ?>
                                    <option value="<?php echo esc_attr( $manual_slug ); ?>">
                                        <?php echo esc_html( $manual_label ); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="ukiyo-field">
                            <label for="ukiyo-manual-feedback-name">Nombre del viajero o grupo</label>
                            <input id="ukiyo-manual-feedback-name" type="text" name="manual_feedback_recipient_name" placeholder="Estefanía y Fran" required />
                        </div>
                        <div class="ukiyo-field">
                            <label for="ukiyo-manual-feedback-email">Correo de destino</label>
                            <input id="ukiyo-manual-feedback-email" type="email" name="manual_feedback_recipient_email" placeholder="cliente@dominio.com" required />
                        </div>
                    </div>

                    <p style="margin-top:20px">
                        <button type="submit" class="button button-primary button-large">Enviar feedback manual</button>
                    </p>
                </form>
            </div>

            <div class="ukiyo-repeater-item ukiyo-email-panel" style="margin-bottom:24px">
                <h2>Finalización del viaje</h2>
                <p class="ukiyo-hint" style="margin-top:-4px">Envía el formulario final al viajero asignado a un viaje concreto del portal.</p>

                <form method="get" class="ukiyo-email-toolbar" style="margin-top:20px">
                    <input type="hidden" name="post_type" value="ukiyo_viaje" />
                    <input type="hidden" name="page" value="ukiyo-portal-emails" />
                    <div class="ukiyo-field">
                        <label for="ukiyo-feedback-trip-id">Viaje</label>
                        <select id="ukiyo-feedback-trip-id" name="feedback_trip_id" onchange="this.form.submit()">
                            <option value="">Selecciona un viaje</option>
                            <?php foreach ( $feedback_trip_list as $trip_option ) : ?>
                                <option value="<?php echo esc_attr( $trip_option->ID ); ?>" <?php selected( $feedback_trip_id, $trip_option->ID ); ?>>
                                    <?php echo esc_html( get_the_title( $trip_option ) ); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="button button-secondary">Cargar viajeros</button>
                </form>

                <?php if ( $feedback_trip instanceof WP_Post ) : ?>
                    <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" style="margin-top:18px">
                        <input type="hidden" name="action" value="ukiyo_portal_send_feedback_request" />
                        <input type="hidden" name="feedback_trip_id" value="<?php echo esc_attr( $feedback_trip->ID ); ?>" />
                        <?php wp_nonce_field( 'ukiyo_portal_send_feedback_request' ); ?>

                        <div class="ukiyo-field-grid">
                            <div class="ukiyo-field">
                                <label for="ukiyo-feedback-trip-url">Enlace que se enviará</label>
                                <input
                                    id="ukiyo-feedback-trip-url"
                                    type="text"
                                    readonly
                                    value="<?php echo ! empty( $feedback_users[0] ) ? esc_attr( ukiyo_portal_get_feedback_url( $feedback_trip, $feedback_users[0] ) ) : ''; ?>"
                                    placeholder="Selecciona un viajero para generar el enlace"
                                />
                                <p class="ukiyo-hint">El enlace final es único para el viaje y el viajero seleccionados.</p>
                            </div>
                            <div class="ukiyo-field">
                                <label for="ukiyo-feedback-user-id">Viajero</label>
                                <select id="ukiyo-feedback-user-id" name="feedback_user_id" required>
                                    <option value="">Selecciona un viajero</option>
                                    <?php foreach ( $feedback_users as $feedback_user ) : ?>
                                        <option
                                            value="<?php echo esc_attr( $feedback_user->ID ); ?>"
                                            data-feedback-url="<?php echo esc_attr( ukiyo_portal_get_feedback_url( $feedback_trip, $feedback_user ) ); ?>"
                                        >
                                            <?php echo esc_html( $feedback_user->display_name . ' · ' . $feedback_user->user_email ); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <?php if ( empty( $feedback_users ) ) : ?>
                            <p class="ukiyo-hint" style="margin-top:8px">Este viaje todavía no tiene clientes del portal asignados.</p>
                        <?php else : ?>
                            <p style="margin-top:20px">
                                <button type="submit" class="button button-primary button-large">Enviar formulario de finalización</button>
                            </p>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    var userSelect = document.getElementById('ukiyo-feedback-user-id');
                                    var urlField = document.getElementById('ukiyo-feedback-trip-url');

                                    if (!userSelect || !urlField) {
                                        return;
                                    }

                                    var syncUrl = function () {
                                        var option = userSelect.options[userSelect.selectedIndex];
                                        urlField.value = option ? (option.getAttribute('data-feedback-url') || '') : '';
                                    };

                                    userSelect.addEventListener('change', syncUrl);
                                    syncUrl();
                                });
                            </script>
                        <?php endif; ?>
                    </form>
                <?php endif; ?>
            </div>

            <div class="ukiyo-email-layout">
                <div class="ukiyo-repeater-item ukiyo-email-panel">
                    <h2>Compositor</h2>

                    <form method="get" class="ukiyo-email-toolbar" style="margin-bottom:24px">
                        <input type="hidden" name="post_type" value="ukiyo_viaje" />
                        <input type="hidden" name="page" value="ukiyo-portal-emails" />
                        <div class="ukiyo-field">
                            <label for="ukiyo-email-template">Plantilla</label>
                            <select id="ukiyo-email-template" name="template" onchange="this.form.submit()">
                                <?php foreach ( $templates as $template ) : ?>
                                    <option value="<?php echo esc_attr( $template['filename'] ); ?>" <?php selected( $selected_template, $template['filename'] ); ?>>
                                        <?php echo esc_html( $template['label'] ); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <p class="ukiyo-hint">Selecciona un HTML exportado desde <code>emails/out</code>.</p>
                        </div>
                        <button type="submit" class="button button-secondary">Cargar plantilla</button>
                    </form>

                    <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                        <input type="hidden" name="action" value="ukiyo_portal_send_email_template" />
                        <input type="hidden" name="template" value="<?php echo esc_attr( $selected_template ); ?>" />
                        <?php wp_nonce_field( 'ukiyo_portal_send_email_template' ); ?>

                        <div class="ukiyo-field-grid">
                            <div class="ukiyo-field">
                                <label for="ukiyo-recipient-email">Enviar a</label>
                                <input type="email" id="ukiyo-recipient-email" name="recipient_email" value="<?php echo esc_attr( $recipient_email ); ?>" placeholder="cliente@dominio.com" required />
                            </div>
                            <div class="ukiyo-field">
                                <label for="ukiyo-email-subject">Asunto</label>
                                <input type="text" id="ukiyo-email-subject" name="email_subject" value="<?php echo esc_attr( $email_subject ); ?>" required />
                            </div>
                        </div>

                        <div class="ukiyo-field">
                            <div class="ukiyo-repeater-top">
                                <span class="ukiyo-repeater-title">Campos detectados</span>
                                <span class="ukiyo-email-chip"><strong data-email-placeholder-count><?php echo esc_html( count( $tokens ) ); ?></strong>&nbsp;placeholder(s)</span>
                            </div>
                            <?php if ( empty( $tokens ) ) : ?>
                                <p class="ukiyo-hint" style="margin:0">Esta plantilla no tiene placeholders `{{TOKEN}}`. Puedes editar el HTML directamente y enviarlo tal cual.</p>
                            <?php else : ?>
                                <div class="ukiyo-email-token-list">
                                    <?php foreach ( $tokens as $token ) : ?>
                                        <div class="ukiyo-field">
                                            <label for="<?php echo esc_attr( 'ukiyo-token-' . md5( $token ) ); ?>"><?php echo esc_html( $token ); ?></label>
                                            <textarea id="<?php echo esc_attr( 'ukiyo-token-' . md5( $token ) ); ?>" name="<?php echo esc_attr( 'placeholder_values[' . $token . ']' ); ?>" rows="2" data-email-token="<?php echo esc_attr( $token ); ?>"><?php echo esc_textarea( $placeholder_values[ $token ] ); ?></textarea>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="ukiyo-field">
                            <label for="ukiyo-template-html">HTML editable</label>
                            <textarea id="ukiyo-template-html" class="ukiyo-email-code" name="template_html" data-email-html spellcheck="false"><?php echo esc_textarea( $template_html ); ?></textarea>
                            <p class="ukiyo-hint">Puedes ajustar textos, enlaces o estilos aquí. La previsualización se actualiza en vivo con los campos rellenados.</p>
                        </div>

                        <div class="ukiyo-email-meta">
                            <span class="ukiyo-email-chip">Plantilla actual: <?php echo esc_html( $templates[ $selected_template ]['label'] ); ?></span>
                            <span class="ukiyo-email-chip">Remitente global: <?php echo esc_html( ukiyo_mail_from_name() . ' <' . ukiyo_mail_from_email() . '>' ); ?></span>
                        </div>

                        <p style="margin-top:24px">
                            <button type="submit" class="button button-primary button-large">Enviar email</button>
                        </p>
                    </form>
                </div>

                <div class="ukiyo-repeater-item ukiyo-email-panel ukiyo-email-preview-shell">
                    <h2>Previsualización</h2>
                    <p class="ukiyo-hint" style="margin-top:-4px">Vista renderizada del HTML que se enviará.</p>
                    <iframe
                        title="Previsualización del email"
                        class="ukiyo-email-preview-frame"
                        data-email-preview
                        sandbox=""
                        srcdoc="<?php echo esc_attr( $preview_html ); ?>"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
    <?php
}
