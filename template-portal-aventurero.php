<?php
/**
 * Dashboard del Portal del Aventurero.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$current_user = wp_get_current_user();
$trips        = ukiyo_portal_get_user_trips();
$is_logged_in = ukiyo_portal_is_authenticated();
$login_state  = isset( $_GET['portal_login'] ) ? sanitize_key( wp_unslash( $_GET['portal_login'] ) ) : '';
$redirect_to  = isset( $_GET['redirect_to'] ) ? esc_url_raw( wp_unslash( $_GET['redirect_to'] ) ) : '';
$is_activation = ukiyo_portal_is_activation_request();
$activation_state = isset( $_GET['portal_activation'] ) ? sanitize_key( wp_unslash( $_GET['portal_activation'] ) ) : '';
$activation_user_id = absint( get_query_var( 'ukiyo_portal_user_id' ) );
$activation_token = sanitize_text_field( (string) get_query_var( 'ukiyo_portal_token' ) );
$activation_user = $is_activation ? ukiyo_portal_get_activation_user( $activation_user_id, $activation_token ) : null;

get_header();
?>

<main class="ukiyo-portal ukiyo-portal-dashboard">
    <section class="portal-shell portal-hero portal-hero--dashboard">
        <div class="portal-hero__content">
            <span class="portal-eyebrow">Portal del Aventurero</span>
            <?php if ( $is_activation ) : ?>
                <h1>Activa tu acceso al portal.</h1>
                <p>Define ahora tu contraseña para acceder a tu Portal del Aventurero con una experiencia completamente privada y sin pasar por WordPress.</p>
                <?php if ( ! $activation_user ) : ?>
                    <div class="portal-login-notice portal-login-notice--error">Este enlace ya no es válido o ha caducado. Solicita una nueva invitación.</div>
                <?php elseif ( 'password_error' === $activation_state ) : ?>
                    <div class="portal-login-notice portal-login-notice--error">Las contraseñas no coinciden o no cumplen el mínimo de 8 caracteres.</div>
                <?php endif; ?>

                <?php if ( $activation_user ) : ?>
                    <form class="portal-login-form" method="post" action="<?php echo esc_url( ukiyo_portal_get_activation_url( $activation_user_id, $activation_token ) ); ?>">
                        <?php wp_nonce_field( 'ukiyo_portal_activation', 'ukiyo_portal_activation_nonce' ); ?>
                        <input type="hidden" name="ukiyo_portal_activation_submit" value="1" />
                        <input type="hidden" name="ukiyo_portal_user_id" value="<?php echo esc_attr( $activation_user_id ); ?>" />
                        <input type="hidden" name="ukiyo_portal_token" value="<?php echo esc_attr( $activation_token ); ?>" />
                        <label>
                            <span>Email</span>
                            <input type="text" value="<?php echo esc_attr( $activation_user->user_email ); ?>" disabled />
                        </label>
                        <label>
                            <span>Nueva contraseña</span>
                            <input type="password" name="portal_password" minlength="8" autocomplete="new-password" required />
                        </label>
                        <label>
                            <span>Repite la contraseña</span>
                            <input type="password" name="portal_password_confirm" minlength="8" autocomplete="new-password" required />
                        </label>
                        <button type="submit" class="portal-btn portal-btn--primary">Activar acceso</button>
                    </form>
                <?php endif; ?>
            <?php elseif ( $is_logged_in ) : ?>
                <h1>Tu viaje, ordenado con el mismo cuidado con el que lo hemos diseñado.</h1>
                <p>
                    Aquí encontrarás la información esencial de cada viaje: documentación, itinerario, recomendaciones y contactos de apoyo.
                    <?php if ( $current_user->display_name ) : ?>
                        <?php echo 'Hola, ' . esc_html( $current_user->display_name ) . '.'; ?>
                    <?php endif; ?>
                </p>
            <?php else : ?>
                <h1>Accede a tu Portal del Aventurero.</h1>
                <p>Entra con el email y contraseña de tu acceso privado para ver únicamente tu viaje, tu documentación y tus contactos de apoyo.</p>
                <?php if ( in_array( $login_state, [ 'failed', 'invalid' ], true ) ) : ?>
                    <div class="portal-login-notice portal-login-notice--error">No hemos podido iniciar sesión. Revisa tus datos e inténtalo de nuevo.</div>
                <?php elseif ( 'logged_out' === $login_state ) : ?>
                    <div class="portal-login-notice">Has cerrado sesión correctamente.</div>
                <?php endif; ?>
                <form class="portal-login-form" method="post" action="<?php echo esc_url( ukiyo_portal_get_dashboard_url() ); ?>">
                    <?php wp_nonce_field( 'ukiyo_portal_login', 'ukiyo_portal_login_nonce' ); ?>
                    <input type="hidden" name="ukiyo_portal_login_submit" value="1" />
                    <input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>" />
                    <label>
                        <span>Email o usuario</span>
                        <input type="text" name="log" autocomplete="username" required />
                    </label>
                    <label>
                        <span>Contraseña</span>
                        <input type="password" name="pwd" autocomplete="current-password" required />
                    </label>
                    <label class="portal-login-form__remember">
                        <input type="checkbox" name="rememberme" value="forever" />
                        <span>Recordarme en este dispositivo</span>
                    </label>
                    <button type="submit" class="portal-btn portal-btn--primary">Entrar al portal</button>
                    <span class="portal-login-form__forgot">Si no recuerdas tu contraseña, te reenviamos un acceso desde UKIYO.</span>
                </form>
            <?php endif; ?>
        </div>
        <div class="portal-hero__aside">
            <div class="portal-stat-card">
                <span class="portal-stat-card__label">Viajes activos</span>
                <strong><?php echo esc_html( $is_logged_in ? count( $trips ) : ( $is_activation ? 'Activación segura' : 'Acceso individual' ) ); ?></strong>
            </div>
            <div class="portal-stat-card">
                <span class="portal-stat-card__label">Acceso privado</span>
                <strong><?php echo esc_html( $is_logged_in ? 'Seguro y centralizado' : ( $is_activation ? 'Tu contraseña se define aquí' : 'Solo verás tu viaje asignado' ) ); ?></strong>
            </div>
        </div>
    </section>

    <?php if ( $is_logged_in && ! $is_activation ) : ?>
    <section class="portal-shell portal-listing">
        <div class="portal-dashboard-topbar">
            <span class="portal-dashboard-topbar__label">Sesión iniciada como <?php echo esc_html( $current_user->display_name ?: $current_user->user_login ); ?></span>
            <a class="portal-btn portal-btn--ghost" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'portal_action', 'logout', ukiyo_portal_get_dashboard_url() ), 'ukiyo_portal_logout' ) ); ?>">Cerrar sesión</a>
        </div>
        <?php if ( empty( $trips ) ) : ?>
            <article class="portal-empty-state">
                <h2>Aún no hay viajes disponibles en tu portal.</h2>
                <p>Si esperabas ver ya tu viaje aquí, escríbenos y lo activamos contigo.</p>
                <div class="portal-empty-state__actions">
                    <a class="portal-btn portal-btn--primary" href="<?php echo esc_url( ukiyo_get_route_url( 'plan_trip' ) ); ?>">Hablar con UKIYO</a>
                    <a class="portal-btn portal-btn--ghost" href="<?php echo esc_url( home_url( '/' ) ); ?>">Volver a la web</a>
                </div>
            </article>
        <?php else : ?>
            <div class="portal-grid">
                <?php foreach ( $trips as $trip ) : ?>
                    <?php
                    $data      = ukiyo_portal_get_trip_data( $trip );
                    $hero      = ukiyo_portal_get_trip_hero_image_url( $trip );
                    $trip_url  = ukiyo_portal_get_trip_url( $trip );
                    $doc_count = count( $data['documents'] );
                    $day_count = count( $data['itinerary'] );
                    ?>
                    <article class="portal-trip-card">
                        <a class="portal-trip-card__media" href="<?php echo esc_url( $trip_url ); ?>">
                            <img src="<?php echo esc_url( $hero ); ?>" alt="<?php echo esc_attr( get_the_title( $trip ) ); ?>" />
                        </a>
                        <div class="portal-trip-card__body">
                            <div class="portal-trip-card__meta">
                                <span class="portal-badge"><?php echo esc_html( ukiyo_portal_get_status_label( $data['status'] ) ); ?></span>
                                <?php if ( $data['reference'] ) : ?>
                                    <span class="portal-ref"><?php echo esc_html( $data['reference'] ); ?></span>
                                <?php endif; ?>
                            </div>
                            <h2><a href="<?php echo esc_url( $trip_url ); ?>"><?php echo esc_html( get_the_title( $trip ) ); ?></a></h2>
                            <?php if ( $data['subtitle'] ) : ?>
                                <p class="portal-trip-card__subtitle"><?php echo esc_html( $data['subtitle'] ); ?></p>
                            <?php endif; ?>
                            <ul class="portal-trip-card__facts">
                                <?php if ( $data['destination'] ) : ?>
                                    <li><?php echo esc_html( $data['destination'] ); ?></li>
                                <?php endif; ?>
                                <?php if ( $data['dates'] ) : ?>
                                    <li><?php echo esc_html( $data['dates'] ); ?></li>
                                <?php endif; ?>
                            </ul>
                            <p class="portal-trip-card__excerpt"><?php echo esc_html( wp_trim_words( $data['welcome'] ?: get_the_title( $trip ), 26 ) ); ?></p>
                            <div class="portal-trip-card__footer">
                                <span><?php echo esc_html( $day_count ); ?> días</span>
                                <span><?php echo esc_html( $doc_count ); ?> documentos</span>
                                <a class="portal-btn portal-btn--inline" href="<?php echo esc_url( $trip_url ); ?>">Entrar</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
