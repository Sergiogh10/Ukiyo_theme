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

/*
 * Pantalla de acceso (login / activación): diseño de dos paneles a pantalla
 * completa, sin el header del sitio. El dashboard del usuario autenticado se
 * mantiene con la cabecera/footer del tema más abajo.
 */
$is_auth_screen = $is_activation || ! $is_logged_in;

if ( $is_auth_screen ) :
    $auth_visual_img = get_template_directory_uri() . '/assets/home/hero-marruecos.webp';
    $auth_logo       = get_template_directory_uri() . '/assets/precios/logo-white.png';
    $auth_contact    = ukiyo_portal_get_global_contact_profile();
    $auth_title      = $is_activation ? 'Activa tu acceso' : 'Acceso';
    ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo esc_html( $auth_title ); ?> · Portal del Aventurero · Ukiyo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'ukiyo-portal-auth-page' ); ?>>
<main class="ukiyo-portal-auth pa-auth">

    <section class="pa-visual">
        <img class="pa-visual__img" src="<?php echo esc_url( $auth_visual_img ); ?>" alt="Marruecos al atardecer" />
        <div class="pa-visual__top">
            <a class="pa-visual__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $auth_logo ); ?>" alt="Viajes Ukiyo" /></a>
            <a class="pa-visual__site" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
                Volver a la web
            </a>
        </div>
        <div class="pa-visual__body">
            <span class="pa-eyebrow">Portal del Aventurero</span>
            <h2>Tu viaje, <em>siempre contigo</em>.</h2>
            <p>Vuelos, itinerario, documentación y tu equipo local. Todo en un solo sitio, listo para cuando lo necesites.</p>
        </div>
    </section>

    <section class="pa-form-side">
        <div class="pa-form-card">

            <?php if ( $is_activation ) : ?>

                <div class="pa-form-card__head">
                    <span class="pa-kicker">Activación segura</span>
                    <h1>Activa <em>tu portal</em></h1>
                    <p>Define ahora tu contraseña para acceder a tu Portal del Aventurero, una experiencia completamente privada.</p>
                </div>

                <?php if ( ! $activation_user ) : ?>
                    <div class="pa-notice pa-notice--error">Este enlace ya no es válido o ha caducado. Solicita una nueva invitación.</div>
                <?php elseif ( 'password_error' === $activation_state ) : ?>
                    <div class="pa-notice pa-notice--error">Las contraseñas no coinciden o no cumplen el mínimo de 8 caracteres.</div>
                <?php endif; ?>

                <?php if ( $activation_user ) : ?>
                    <form class="pa-form" method="post" action="<?php echo esc_url( ukiyo_portal_get_activation_url( $activation_user_id, $activation_token ) ); ?>">
                        <?php wp_nonce_field( 'ukiyo_portal_activation', 'ukiyo_portal_activation_nonce' ); ?>
                        <input type="hidden" name="ukiyo_portal_activation_submit" value="1" />
                        <input type="hidden" name="ukiyo_portal_user_id" value="<?php echo esc_attr( $activation_user_id ); ?>" />
                        <input type="hidden" name="ukiyo_portal_token" value="<?php echo esc_attr( $activation_token ); ?>" />

                        <div class="pa-field">
                            <label for="pa-email">Correo electrónico</label>
                            <div class="pa-input-wrap">
                                <span class="pa-ic" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                </span>
                                <input id="pa-email" type="email" value="<?php echo esc_attr( $activation_user->user_email ); ?>" disabled />
                            </div>
                        </div>

                        <div class="pa-field">
                            <label for="pa-password">Nueva contraseña</label>
                            <div class="pa-input-wrap">
                                <span class="pa-ic" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                </span>
                                <input id="pa-password" type="password" name="portal_password" minlength="8" placeholder="Mínimo 8 caracteres" autocomplete="new-password" required />
                                <button type="button" class="pa-toggle" data-pa-toggle="pa-password" aria-label="Mostrar contraseña">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>
                                </button>
                            </div>
                        </div>

                        <div class="pa-field">
                            <label for="pa-password-confirm">Repite la contraseña</label>
                            <div class="pa-input-wrap">
                                <span class="pa-ic" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                </span>
                                <input id="pa-password-confirm" type="password" name="portal_password_confirm" minlength="8" placeholder="••••••••" autocomplete="new-password" required />
                            </div>
                        </div>

                        <button type="submit" class="pa-btn-submit">
                            Activar acceso
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                        </button>
                    </form>
                <?php endif; ?>

            <?php else : ?>

                <div class="pa-form-card__head">
                    <span class="pa-kicker">Acceso privado</span>
                    <h1>Entra a <em>tu portal</em></h1>
                    <p>Introduce las credenciales que te enviamos por correo para ver toda la información de tu viaje.</p>
                </div>

                <?php if ( in_array( $login_state, [ 'failed', 'invalid' ], true ) ) : ?>
                    <div class="pa-notice pa-notice--error">No hemos podido iniciar sesión. Revisa tus datos e inténtalo de nuevo.</div>
                <?php elseif ( 'logged_out' === $login_state ) : ?>
                    <div class="pa-notice">Has cerrado sesión correctamente.</div>
                <?php endif; ?>

                <form class="pa-form" method="post" action="<?php echo esc_url( ukiyo_portal_get_dashboard_url() ); ?>">
                    <?php wp_nonce_field( 'ukiyo_portal_login', 'ukiyo_portal_login_nonce' ); ?>
                    <input type="hidden" name="ukiyo_portal_login_submit" value="1" />
                    <input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>" />

                    <div class="pa-field">
                        <label for="pa-login">Correo electrónico</label>
                        <div class="pa-input-wrap">
                            <span class="pa-ic" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </span>
                            <input id="pa-login" type="text" name="log" placeholder="tu@correo.com" autocomplete="username" required />
                        </div>
                    </div>

                    <div class="pa-field">
                        <label for="pa-password">Contraseña <a href="<?php echo esc_url( $auth_contact['whatsapp_link'] ); ?>" target="_blank" rel="noreferrer">¿La has olvidado?</a></label>
                        <div class="pa-input-wrap">
                            <span class="pa-ic" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </span>
                            <input id="pa-password" type="password" name="pwd" placeholder="••••••••" autocomplete="current-password" required />
                            <button type="button" class="pa-toggle" data-pa-toggle="pa-password" aria-label="Mostrar contraseña">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="pa-row-between">
                        <label class="pa-check">
                            <input type="checkbox" name="rememberme" value="forever" checked />
                            <span class="pa-box"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
                            Mantener la sesión abierta
                        </label>
                    </div>

                    <button type="submit" class="pa-btn-submit">
                        Entrar al portal
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </button>
                </form>

            <?php endif; ?>

            <div class="pa-divider">o si tienes dudas</div>

            <div class="pa-help">
                <div class="pa-help__ic" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"/></svg>
                </div>
                <div class="pa-help__txt">
                    <strong>¿No recibiste tus credenciales?</strong>
                    <p>Escríbenos por <a href="<?php echo esc_url( $auth_contact['whatsapp_link'] ); ?>" target="_blank" rel="noreferrer">WhatsApp</a> o a <a href="<?php echo esc_url( $auth_contact['email_link'] ); ?>"><?php echo esc_html( $auth_contact['email_label'] ); ?></a> y te damos acceso al momento.</p>
                </div>
            </div>

            <div class="pa-form-foot">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                Conexión segura · Ukiyo Portal del Aventurero
            </div>
        </div>
    </section>

</main>
<script>
(function(){
    document.querySelectorAll('[data-pa-toggle]').forEach(function(btn){
        var input = document.getElementById(btn.getAttribute('data-pa-toggle'));
        if (!input) return;
        var on  = '<path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/>';
        var off = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
        btn.addEventListener('click', function(){
            var show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            var svg = btn.querySelector('svg');
            if (svg) svg.innerHTML = show ? off : on;
            btn.setAttribute('aria-label', show ? 'Ocultar contraseña' : 'Mostrar contraseña');
        });
    });
})();
</script>
<?php wp_footer(); ?>
</body>
</html>
    <?php
    return;
endif;

get_header();
?>

<main class="ukiyo-portal ukiyo-portal-dashboard">
    <section class="portal-shell portal-hero portal-hero--dashboard">
        <div class="portal-hero__content">
            <span class="portal-eyebrow">Portal del Aventurero</span>
            <h1>Tu viaje, ordenado con el mismo cuidado con el que lo hemos diseñado.</h1>
            <p>
                Aquí encontrarás la información esencial de cada viaje: documentación, itinerario, recomendaciones y contactos de apoyo.
                <?php if ( $current_user->display_name ) : ?>
                    <?php echo 'Hola, ' . esc_html( $current_user->display_name ) . '.'; ?>
                <?php endif; ?>
            </p>
        </div>
        <div class="portal-hero__aside">
            <div class="portal-stat-card">
                <span class="portal-stat-card__label">Viajes activos</span>
                <strong><?php echo esc_html( count( $trips ) ); ?></strong>
            </div>
            <div class="portal-stat-card">
                <span class="portal-stat-card__label">Acceso privado</span>
                <strong>Seguro y centralizado</strong>
            </div>
        </div>
    </section>

    <?php if ( $is_logged_in ) : ?>
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
