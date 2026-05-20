<?php
/**
 * Rutas privadas del Portal del Aventurero.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_portal_register_query_vars( $vars ) {
    $vars[] = 'ukiyo_portal_view';
    $vars[] = 'ukiyo_portal_trip';
    $vars[] = 'ukiyo_portal_document';
    $vars[] = 'ukiyo_portal_user_id';
    $vars[] = 'ukiyo_portal_token';

    return $vars;
}
add_filter( 'query_vars', 'ukiyo_portal_register_query_vars' );

function ukiyo_portal_add_rewrite_rules() {
    add_rewrite_rule( '^portal-del-aventurero/?$', 'index.php?ukiyo_portal_view=dashboard', 'top' );
    add_rewrite_rule( '^portal-del-aventurero/acceso/([0-9]+)/([^/]+)/?$', 'index.php?ukiyo_portal_view=activate&ukiyo_portal_user_id=$matches[1]&ukiyo_portal_token=$matches[2]', 'top' );
    add_rewrite_rule( '^portal-del-aventurero/finaliza-tu-viaje/([^/]+)/([0-9]+)/([^/]+)/?$', 'index.php?ukiyo_portal_view=feedback&ukiyo_portal_trip=$matches[1]&ukiyo_portal_user_id=$matches[2]&ukiyo_portal_token=$matches[3]', 'top' );
    add_rewrite_rule( '^portal-del-aventurero/finaliza-tu-viaje-manual/([^/]+)/([^/]+)/?$', 'index.php?ukiyo_portal_view=feedback_manual&ukiyo_portal_trip=$matches[1]&ukiyo_portal_token=$matches[2]', 'top' );
    add_rewrite_rule( '^portal-del-aventurero/viaje/([^/]+)/?$', 'index.php?ukiyo_portal_view=trip&ukiyo_portal_trip=$matches[1]', 'top' );
    add_rewrite_rule( '^portal-del-aventurero/propuesta/([^/]+)/([^/]+)/?$', 'index.php?ukiyo_portal_view=proposal&ukiyo_portal_trip=$matches[1]&ukiyo_portal_token=$matches[2]', 'top' );
    add_rewrite_rule( '^portal-del-aventurero/documento/([^/]+)/([0-9]+)/?$', 'index.php?ukiyo_portal_view=document&ukiyo_portal_trip=$matches[1]&ukiyo_portal_document=$matches[2]', 'top' );
}
add_action( 'init', 'ukiyo_portal_add_rewrite_rules', 20 );

add_action(
    'after_switch_theme',
    function () {
        ukiyo_portal_add_rewrite_rules();
        flush_rewrite_rules();
    }
);

add_action(
    'init',
    function () {
        $version = '5';

        if ( get_option( 'ukiyo_portal_rewrite_version' ) === $version ) {
            return;
        }

        ukiyo_portal_add_rewrite_rules();
        flush_rewrite_rules( false );
        update_option( 'ukiyo_portal_rewrite_version', $version );
    },
    99
);

function ukiyo_portal_template_include( $template ) {
    $view = get_query_var( 'ukiyo_portal_view' );

    if ( ! $view ) {
        return $template;
    }

    if ( in_array( $view, [ 'dashboard', 'activate' ], true ) ) {
        $dashboard_template = get_template_directory() . '/template-portal-aventurero.php';

        return file_exists( $dashboard_template ) ? $dashboard_template : $template;
    }

    if ( in_array( $view, [ 'feedback', 'feedback_manual' ], true ) ) {
        $feedback_template = get_template_directory() . '/template-portal-finaliza-viaje.php';

        return file_exists( $feedback_template ) ? $feedback_template : $template;
    }

    if ( 'trip' === $view ) {
        $trip_template = get_template_directory() . '/single-ukiyo_viaje.php';

        return file_exists( $trip_template ) ? $trip_template : $template;
    }

    if ( 'proposal' === $view ) {
        $proposal_template = get_template_directory() . '/template-portal-propuesta.php';

        return file_exists( $proposal_template ) ? $proposal_template : $template;
    }

    return $template;
}
add_filter( 'template_include', 'ukiyo_portal_template_include', 99 );

function ukiyo_portal_handle_proposal_response() {
    $trip_id        = isset( $_REQUEST['trip_id'] ) ? absint( $_REQUEST['trip_id'] ) : 0;
    $token          = isset( $_REQUEST['token'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['token'] ) ) : '';
    $response_type  = isset( $_REQUEST['response_type'] ) ? sanitize_key( wp_unslash( $_REQUEST['response_type'] ) ) : '';
    $trip           = $trip_id ? get_post( $trip_id ) : null;

    if ( ! $trip instanceof WP_Post || 'ukiyo_viaje' !== $trip->post_type || ! ukiyo_portal_validate_proposal_token( $trip, $token ) ) {
        wp_die( 'Propuesta no válida.', 'Propuesta no válida', [ 'response' => 403 ] );
    }

    if ( ! wp_verify_nonce( isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '', 'ukiyo_portal_proposal_response_' . $trip->ID . '_' . $response_type . '_' . $token ) ) {
        wp_die( 'No hemos podido validar la acción.', 'Acción no válida', [ 'response' => 403 ] );
    }

    $proposal_url = ukiyo_portal_get_proposal_url( $trip, $token );

    if ( 'approve' === $response_type ) {
        update_post_meta( $trip->ID, 'ukiyo_portal_proposal_response_status', 'approved' );
        update_post_meta( $trip->ID, 'ukiyo_portal_proposal_approved_at', current_time( 'mysql' ) );
        wp_safe_redirect( add_query_arg( 'proposal_response', 'approved', $proposal_url ) );
        exit;
    }

    if ( 'changes' === $response_type ) {
        $message = isset( $_POST['proposal_change_request'] ) ? sanitize_textarea_field( wp_unslash( $_POST['proposal_change_request'] ) ) : '';

        if ( '' === trim( $message ) ) {
            wp_safe_redirect( add_query_arg( 'proposal_response', 'changes_error', $proposal_url ) . '#proposal-feedback' );
            exit;
        }

        update_post_meta( $trip->ID, 'ukiyo_portal_proposal_response_status', 'changes_requested' );
        update_post_meta( $trip->ID, 'ukiyo_portal_proposal_change_request_message', $message );
        update_post_meta( $trip->ID, 'ukiyo_portal_proposal_change_requested_at', current_time( 'mysql' ) );

        wp_safe_redirect( add_query_arg( 'proposal_response', 'changes_sent', $proposal_url ) . '#proposal-feedback' );
        exit;
    }

    wp_safe_redirect( $proposal_url );
    exit;
}
add_action( 'admin_post_nopriv_ukiyo_portal_proposal_response', 'ukiyo_portal_handle_proposal_response' );
add_action( 'admin_post_ukiyo_portal_proposal_response', 'ukiyo_portal_handle_proposal_response' );

function ukiyo_portal_handle_reset_proposal_response() {
    if ( ! is_user_logged_in() ) {
        wp_die( 'No autorizado.', 'No autorizado', [ 'response' => 403 ] );
    }

    $trip_id = isset( $_REQUEST['trip_id'] ) ? absint( $_REQUEST['trip_id'] ) : 0;
    $trip    = $trip_id ? get_post( $trip_id ) : null;

    if ( ! $trip instanceof WP_Post || 'ukiyo_viaje' !== $trip->post_type ) {
        wp_die( 'Viaje no válido.', 'Viaje no válido', [ 'response' => 404 ] );
    }

    if ( ! current_user_can( 'edit_post', $trip->ID ) ) {
        wp_die( 'No tienes permisos para editar esta propuesta.', 'Permisos insuficientes', [ 'response' => 403 ] );
    }

    if ( ! wp_verify_nonce( isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '', 'ukiyo_portal_reset_proposal_response_' . $trip->ID ) ) {
        wp_die( 'No hemos podido validar la acción.', 'Acción no válida', [ 'response' => 403 ] );
    }

    update_post_meta( $trip->ID, 'ukiyo_portal_proposal_response_status', 'pending' );
    delete_post_meta( $trip->ID, 'ukiyo_portal_proposal_approved_at' );
    delete_post_meta( $trip->ID, 'ukiyo_portal_proposal_change_request_message' );
    delete_post_meta( $trip->ID, 'ukiyo_portal_proposal_change_requested_at' );

    wp_safe_redirect(
        add_query_arg(
            [
                'post'   => $trip->ID,
                'action' => 'edit',
            ],
            admin_url( 'post.php' )
        )
    );
    exit;
}
add_action( 'admin_post_ukiyo_portal_reset_proposal_response', 'ukiyo_portal_handle_reset_proposal_response' );
