<?php
/**
 * Control de acceso y protección de documentos del portal.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_portal_get_current_trip() {
    static $trip = null;
    static $loaded = false;

    if ( $loaded ) {
        return $trip;
    }

    $loaded = true;
    $slug   = get_query_var( 'ukiyo_portal_trip' );

    if ( $slug ) {
        $access_type = ukiyo_portal_is_proposal_request() ? 'proposal' : 'private';
        $trip        = ukiyo_portal_get_trip_by_slug_and_access( $slug, $access_type );
    }

    return $trip;
}

function ukiyo_portal_force_404() {
    global $wp_query;

    if ( $wp_query instanceof WP_Query ) {
        $wp_query->set_404();
    }

    status_header( 404 );
    nocache_headers();

    include get_query_template( '404' );
    exit;
}

function ukiyo_portal_require_login() {
    if ( ! ukiyo_portal_is_authenticated() ) {
        $redirect_to = ukiyo_portal_is_dashboard_request() ? '' : ukiyo_portal_get_current_url();
        $login_url   = $redirect_to
            ? add_query_arg( 'redirect_to', rawurlencode( $redirect_to ), ukiyo_portal_get_dashboard_url() )
            : ukiyo_portal_get_dashboard_url();

        wp_safe_redirect( $login_url );
        exit;
    }
}

function ukiyo_portal_process_login_request() {
    if ( ! ukiyo_portal_is_dashboard_request() || 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ) ) {
        return;
    }

    if ( empty( $_POST['ukiyo_portal_login_submit'] ) ) {
        return;
    }

    $redirect_to = isset( $_POST['redirect_to'] ) ? esc_url_raw( wp_unslash( $_POST['redirect_to'] ) ) : '';

    if (
        ! isset( $_POST['ukiyo_portal_login_nonce'] ) ||
        ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_login_nonce'] ) ), 'ukiyo_portal_login' )
    ) {
        wp_safe_redirect( add_query_arg( 'portal_login', 'invalid', ukiyo_portal_get_dashboard_url() ) );
        exit;
    }

    $login_value = isset( $_POST['log'] ) ? sanitize_text_field( wp_unslash( $_POST['log'] ) ) : '';

    if ( is_email( $login_value ) ) {
        $user_by_email = get_user_by( 'email', $login_value );
        if ( $user_by_email instanceof WP_User ) {
            $login_value = $user_by_email->user_login;
        }
    }

    $credentials = [
        'user_login'    => $login_value,
        'user_password' => isset( $_POST['pwd'] ) ? (string) wp_unslash( $_POST['pwd'] ) : '',
        'remember'      => ! empty( $_POST['rememberme'] ),
    ];

    wp_logout();
    $user = wp_signon( $credentials, is_ssl() );

    if ( is_wp_error( $user ) ) {
        $url = add_query_arg(
            [
                'portal_login' => 'failed',
            ],
            ukiyo_portal_get_dashboard_url()
        );

        if ( $redirect_to ) {
            $url = add_query_arg( 'redirect_to', rawurlencode( $redirect_to ), $url );
        }

        wp_safe_redirect( $url );
        exit;
    }

    wp_set_current_user( $user->ID );
    ukiyo_portal_set_gate_cookie();
    wp_safe_redirect( ukiyo_portal_get_login_redirect_url( $redirect_to ) );
    exit;
}
add_action( 'template_redirect', 'ukiyo_portal_process_login_request', 0 );

function ukiyo_portal_process_activation_request() {
    if ( ! ukiyo_portal_is_activation_request() || 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ) ) {
        return;
    }

    if ( empty( $_POST['ukiyo_portal_activation_submit'] ) ) {
        return;
    }

    $user_id = isset( $_POST['ukiyo_portal_user_id'] ) ? absint( $_POST['ukiyo_portal_user_id'] ) : 0;
    $token   = isset( $_POST['ukiyo_portal_token'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_token'] ) ) : '';
    $pass_1  = isset( $_POST['portal_password'] ) ? (string) wp_unslash( $_POST['portal_password'] ) : '';
    $pass_2  = isset( $_POST['portal_password_confirm'] ) ? (string) wp_unslash( $_POST['portal_password_confirm'] ) : '';

    if (
        ! isset( $_POST['ukiyo_portal_activation_nonce'] ) ||
        ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_activation_nonce'] ) ), 'ukiyo_portal_activation' )
    ) {
        wp_safe_redirect( add_query_arg( 'portal_activation', 'invalid', ukiyo_portal_get_dashboard_url() ) );
        exit;
    }

    $user = ukiyo_portal_get_activation_user( $user_id, $token );

    if ( ! $user instanceof WP_User ) {
        wp_safe_redirect( add_query_arg( 'portal_activation', 'invalid', ukiyo_portal_get_dashboard_url() ) );
        exit;
    }

    if ( strlen( $pass_1 ) < 8 || $pass_1 !== $pass_2 ) {
        $activation_url = add_query_arg(
            'portal_activation',
            'password_error',
            ukiyo_portal_get_activation_url( $user_id, $token )
        );
        wp_safe_redirect( $activation_url );
        exit;
    }

    wp_set_password( $pass_1, $user->ID );
    ukiyo_portal_clear_activation_token( $user->ID );
    wp_set_current_user( $user->ID );
    wp_set_auth_cookie( $user->ID, true );
    ukiyo_portal_set_gate_cookie();

    wp_safe_redirect( ukiyo_portal_get_login_redirect_url() );
    exit;
}
add_action( 'template_redirect', 'ukiyo_portal_process_activation_request', 0 );

function ukiyo_portal_process_logout_request() {
    if ( ! ukiyo_portal_is_dashboard_request() ) {
        return;
    }

    if ( 'logout' !== ( isset( $_GET['portal_action'] ) ? sanitize_key( wp_unslash( $_GET['portal_action'] ) ) : '' ) ) {
        return;
    }

    check_admin_referer( 'ukiyo_portal_logout' );
    ukiyo_portal_clear_gate_cookie();
    wp_logout();
    wp_safe_redirect( add_query_arg( 'portal_login', 'logged_out', ukiyo_portal_get_dashboard_url() ) );
    exit;
}
add_action( 'template_redirect', 'ukiyo_portal_process_logout_request', 0 );

function ukiyo_portal_handle_access() {
    if ( ! ukiyo_portal_is_request() ) {
        return;
    }

    // Previsualización del rediseño para administradores (?skin=new): omite el gate del portal.
    if ( current_user_can( 'manage_options' ) && isset( $_GET['skin'] ) && 'new' === $_GET['skin'] ) {
        return;
    }

    nocache_headers();
    header( 'X-Robots-Tag: noindex, nofollow', true );

    if ( ukiyo_portal_is_activation_request() ) {
        return;
    }

    if ( ukiyo_portal_is_feedback_request() ) {
        return;
    }

    if ( ukiyo_portal_is_proposal_request() ) {
        $trip  = ukiyo_portal_get_current_trip();
        $token = get_query_var( 'ukiyo_portal_token' );

        if ( ! $trip instanceof WP_Post || ! ukiyo_portal_validate_proposal_token( $trip, $token ) ) {
            ukiyo_portal_force_404();
        }

        return;
    }

    if ( ukiyo_portal_is_dashboard_request() ) {
        if ( ! ukiyo_portal_is_authenticated() ) {
            return;
        }

        $trips = ukiyo_portal_get_user_trips();

        if ( 1 === count( $trips ) && ! ukiyo_portal_is_dashboard_overview_request() ) {
            wp_safe_redirect( ukiyo_portal_get_trip_url( $trips[0] ) );
            exit;
        }

        return;
    }

    ukiyo_portal_require_login();
    $trip = ukiyo_portal_get_current_trip();

    if ( ! $trip instanceof WP_Post || ! ukiyo_portal_user_can_access_trip( get_current_user_id(), $trip ) ) {
        ukiyo_portal_force_404();
    }

    if ( ukiyo_portal_is_document_request() ) {
        ukiyo_portal_stream_document( $trip );
    }
}
add_action( 'template_redirect', 'ukiyo_portal_handle_access', 1 );

function ukiyo_portal_hide_admin_bar_for_clients( $show_admin_bar ) {
    if ( is_user_logged_in() && ukiyo_portal_is_client_user( get_current_user_id() ) && ! ukiyo_portal_is_admin_user() ) {
        return false;
    }

    return $show_admin_bar;
}
add_filter( 'show_admin_bar', 'ukiyo_portal_hide_admin_bar_for_clients' );

function ukiyo_portal_block_wp_admin_for_clients() {
    if ( ! is_user_logged_in() || ! is_admin() ) {
        return;
    }

    if ( wp_doing_ajax() || ( defined( 'DOING_CRON' ) && DOING_CRON ) ) {
        return;
    }

    if ( ! ukiyo_portal_is_client_user( get_current_user_id() ) || ukiyo_portal_is_admin_user() ) {
        return;
    }

    wp_safe_redirect( ukiyo_portal_get_login_redirect_url() );
    exit;
}
add_action( 'admin_init', 'ukiyo_portal_block_wp_admin_for_clients', 1 );

function ukiyo_portal_enable_gate_after_login( $user_login, $user ) {
    if ( ! $user instanceof WP_User ) {
        return;
    }

    if ( ukiyo_portal_is_client_user( $user->ID ) && ! ukiyo_portal_is_admin_user( $user->ID ) ) {
        ukiyo_portal_set_gate_cookie();
    }
}
add_action( 'wp_login', 'ukiyo_portal_enable_gate_after_login', 10, 2 );

function ukiyo_portal_redirect_client_logins( $redirect_to, $requested_redirect_to, $user ) {
    if ( ! $user instanceof WP_User ) {
        return $redirect_to;
    }

    if ( ukiyo_portal_is_client_user( $user->ID ) && ! ukiyo_portal_is_admin_user( $user->ID ) ) {
        return ukiyo_portal_get_login_redirect_url( $requested_redirect_to );
    }

    return $redirect_to;
}
add_filter( 'login_redirect', 'ukiyo_portal_redirect_client_logins', 10, 3 );

function ukiyo_portal_redirect_client_logout( $redirect_to, $requested_redirect_to, $user ) {
    if ( $user instanceof WP_User && ukiyo_portal_is_client_user( $user->ID ) && ! ukiyo_portal_is_admin_user( $user->ID ) ) {
        return add_query_arg( 'portal_login', 'logged_out', ukiyo_portal_get_dashboard_url() );
    }

    return $redirect_to;
}
add_filter( 'logout_redirect', 'ukiyo_portal_redirect_client_logout', 10, 3 );

function ukiyo_portal_stream_document( $trip ) {
    $trip_post       = $trip instanceof WP_Post ? $trip : get_post( $trip );
    $document_index  = absint( get_query_var( 'ukiyo_portal_document' ) );
    $data            = ukiyo_portal_get_trip_data( $trip_post );
    $documents       = isset( $data['documents'] ) ? $data['documents'] : [];
    $document        = isset( $documents[ $document_index ] ) ? $documents[ $document_index ] : null;
    $attachment_id   = $document ? absint( $document['file_id'] ) : 0;
    $attached_file   = $attachment_id ? get_attached_file( $attachment_id ) : '';
    $download_name   = $attachment_id ? basename( $attached_file ) : '';
    $mime_type       = $attachment_id ? get_post_mime_type( $attachment_id ) : '';

    if ( ! $document || ! $attachment_id || ! $attached_file || ! file_exists( $attached_file ) ) {
        ukiyo_portal_force_404();
    }

    nocache_headers();
    header( 'Content-Description: File Transfer' );
    header( 'Content-Type: ' . ( $mime_type ?: 'application/octet-stream' ) );
    header( 'Content-Disposition: inline; filename="' . rawurlencode( $download_name ) . '"' );
    header( 'Content-Length: ' . filesize( $attached_file ) );
    header( 'X-Robots-Tag: noindex, nofollow', true );
    readfile( $attached_file );
    exit;
}

function ukiyo_portal_enqueue_assets() {
    if ( ! ukiyo_portal_is_request() ) {
        return;
    }

    $map_provider = ukiyo_portal_get_map_provider();
    $style_deps   = [ 'ukiyo-main' ];
    $script_deps  = [];

    if ( 'mapbox' === $map_provider ) {
        wp_enqueue_style(
            'mapbox-gl-css',
            'https://api.mapbox.com/mapbox-gl-js/v3.15.0/mapbox-gl.css',
            [],
            '3.15.0'
        );

        wp_enqueue_script(
            'mapbox-gl-js',
            'https://api.mapbox.com/mapbox-gl-js/v3.15.0/mapbox-gl.js',
            [],
            '3.15.0',
            true
        );

        $style_deps[]  = 'mapbox-gl-css';
        $script_deps[] = 'mapbox-gl-js';
    } else {
        wp_enqueue_style(
            'leaflet-css',
            'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
            [],
            '1.9.4'
        );

        wp_enqueue_script(
            'leaflet-js',
            'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js',
            [],
            '1.9.4',
            true
        );

        $style_deps[]  = 'leaflet-css';
        $script_deps[] = 'leaflet-js';
    }

    wp_enqueue_style(
        'ukiyo-portal-aventurero',
        get_template_directory_uri() . '/assets/css/portal-aventurero.css',
        $style_deps,
        ukiyo_asset_ver( '/assets/css/portal-aventurero.css' )
    );

    // Pantalla de acceso (login/activación): diseño Portal Acceso.html, encolado
    // después de portal-aventurero.css para que sus estilos manden.
    $pa_is_auth_screen = ukiyo_portal_is_activation_request()
        || ( ukiyo_portal_is_dashboard_request() && ! ukiyo_portal_is_authenticated() );
    if ( $pa_is_auth_screen ) {
        wp_enqueue_style(
            'ukiyo-portal-acceso',
            get_template_directory_uri() . '/assets/css/portal-acceso.css',
            [ 'ukiyo-portal-aventurero' ],
            ukiyo_asset_ver( '/assets/css/portal-acceso.css' )
        );
        wp_enqueue_style( 'ukiyo-portal-acceso-rowdies', 'https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap', [], null );
        wp_enqueue_style( 'ukiyo-portal-acceso-satoshi', 'https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap', [], null );
    }

    wp_enqueue_script(
        'ukiyo-portal-frontend',
        get_template_directory_uri() . '/assets/js/portal-frontend.js',
        $script_deps,
        ukiyo_asset_ver( '/assets/js/portal-frontend.js' ),
        true
    );

    wp_add_inline_script(
        'ukiyo-portal-frontend',
        'window.ukiyoPortalMapConfig = ' . wp_json_encode(
            [
                'provider'    => $map_provider,
                'mapboxToken' => ukiyo_portal_get_mapbox_token(),
                'mapboxStyle' => ukiyo_portal_get_mapbox_style(),
            ]
        ) . ';',
        'before'
    );
}
add_action( 'wp_enqueue_scripts', 'ukiyo_portal_enqueue_assets' );
