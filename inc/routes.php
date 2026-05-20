<?php
/**
 * Internal route helpers for the UKIYO theme.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Returns candidate slugs for the most important internal pages.
 */
function ukiyo_get_route_candidates() {
    return [
        'destinations' => [ 'experiencias', 'destinos' ],
        'pricing' => [ 'precios-viajes-a-medida', 'pricing' ],
        'viajes_autor' => [ 'viajes-de-autor' ],
        'about' => [ 'nosotros', 'sobre-ukiyo', 'about-ukiyo' ],
        'reviews' => [ 'resenas', 'reseñas', 'reviews' ],
        'plan_trip' => [ 'planifica-tu-viaje', 'planifica-tu-viaje-a-medida' ],
        'privacy' => [ 'privacidad', 'politica-de-privacidad' ],
        'terms' => [ 'terminos', 'terminos-y-condiciones' ],
        'cookies' => [ 'cookies', 'politica-de-cookies' ],
        'destination_indonesia' => [ 'viajes-a-medida-indonesia', 'indonesia', 'destino/indonesia' ],
        'destination_costa_rica' => [ 'viajes-a-medida-costa-rica', 'costa-rica', 'destino/costa-rica' ],
        'destination_colombia' => [ 'viajes-a-medida-colombia', 'colombia', 'destino/colombia' ],
        'destination_marruecos' => [ 'viajes-a-medida-marruecos', 'marruecos', 'destino/marruecos' ],
        'destination_italia' => [ 'viajes-a-medida-italia', 'italia', 'destino/italia' ],
        'destination_lanzarote' => [ 'viajes-a-medida-lanzarote', 'lanzarote', 'destino/lanzarote' ],
        'form_viaje_autor' => [ 'formulario-viaje-de-autor', 'formularioautor' ],
    ];
}

/**
 * Resolves the first existing page object from a list of candidate paths.
 */
function ukiyo_get_route_page( $candidates ) {
    foreach ( (array) $candidates as $candidate ) {
        $page = get_page_by_path( $candidate );
        if ( $page instanceof WP_Post ) {
            return $page;
        }
    }

    return null;
}

/**
 * Resolves the first existing page URL from a list of candidate paths.
 */
function ukiyo_resolve_page_url( $candidates, $fallback = '/' ) {
    $page = ukiyo_get_route_page( $candidates );
    if ( $page instanceof WP_Post ) {
        return get_permalink( $page );
    }

    $first_candidate = is_array( $candidates ) && ! empty( $candidates ) ? reset( $candidates ) : ltrim( (string) $fallback, '/' );

    return home_url( '/' . ltrim( (string) $first_candidate ?: $fallback, '/' ) );
}

/**
 * Public helper to fetch an internal route by key.
 */
function ukiyo_get_route_url( $key, $fallback = '/' ) {
    $routes = ukiyo_get_route_candidates();

    if ( ! isset( $routes[ $key ] ) ) {
        return home_url( $fallback );
    }

    return ukiyo_resolve_page_url( $routes[ $key ], $fallback );
}

/**
 * Returns the current page path without leading or trailing slashes.
 */
function ukiyo_get_current_page_path() {
    if ( ! is_page() ) {
        return '';
    }

    return trim( get_page_uri( get_queried_object_id() ), '/' );
}

/**
 * Detects whether the current page matches a legacy alias for a canonical route.
 */
function ukiyo_is_legacy_route_alias( $keys = [] ) {
    if ( ! is_page() ) {
        return false;
    }

    $current_path = ukiyo_get_current_page_path();
    if ( ! $current_path ) {
        return false;
    }

    $routes = ukiyo_get_route_candidates();
    $keys   = $keys ? (array) $keys : array_keys( $routes );

    foreach ( $keys as $key ) {
        if ( empty( $routes[ $key ] ) ) {
            continue;
        }

        $candidates = array_values( $routes[ $key ] );
        $preferred  = reset( $candidates );
        $alternates = array_slice( $candidates, 1 );

        if ( ! in_array( $current_path, $alternates, true ) ) {
            continue;
        }

        $preferred_page = ukiyo_get_route_page( [ $preferred ] );
        if ( $preferred_page instanceof WP_Post && (int) $preferred_page->ID !== (int) get_queried_object_id() ) {
            return true;
        }
    }

    return false;
}

/**
 * Redirects legacy route aliases to the preferred canonical page.
 */
function ukiyo_redirect_legacy_route_aliases() {
    if ( is_admin() || wp_doing_ajax() || is_preview() || ! is_page() ) {
        return;
    }

    $canonical_keys = [ 'about', 'plan_trip', 'privacy', 'terms', 'cookies', 'reviews', 'form_viaje_autor' ];
    $current_path   = ukiyo_get_current_page_path();
    $routes         = ukiyo_get_route_candidates();

    foreach ( $canonical_keys as $key ) {
        if ( empty( $routes[ $key ] ) ) {
            continue;
        }

        $candidates = array_values( $routes[ $key ] );
        $preferred  = reset( $candidates );
        $alternates = array_slice( $candidates, 1 );

        if ( ! in_array( $current_path, $alternates, true ) ) {
            continue;
        }

        $preferred_page = ukiyo_get_route_page( [ $preferred ] );
        if ( ! ( $preferred_page instanceof WP_Post ) || (int) $preferred_page->ID === (int) get_queried_object_id() ) {
            return;
        }

        wp_safe_redirect( get_permalink( $preferred_page ), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'ukiyo_redirect_legacy_route_aliases', 1 );

/**
 * Redirects old public paths that now resolve as 404 in Search Console.
 */
function ukiyo_redirect_legacy_404_paths() {
    if ( is_admin() || wp_doing_ajax() || is_preview() ) {
        return;
    }

    $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
    $path        = trim( rawurldecode( (string) wp_parse_url( $request_uri, PHP_URL_PATH ) ), '/' );

    if ( '' === $path ) {
        return;
    }

    $route_redirects = [
        'costarica'                 => 'destination_costa_rica',
        'costa-rica'                => 'destination_costa_rica',
        'indonesia'                 => 'destination_indonesia',
        'colombia'                  => 'destination_colombia',
        'about_ukiyo'               => 'about',
        'sustainability'            => 'about',
        'sustainability_commitment' => 'about',
        'viajedeautormoha'          => 'viajes_autor',
        'pantanal'                  => 'viajes_autor',
        'viajes/del-atlas-al-sahara-la-escapada-al-desierto-de-marruecos' => 'viajes_autor',
        'viajes/wild-costa-rica-el-viaje-fotografico-definitivo'          => 'viajes_autor',
        'viajes/pantanal-tras-el-rastro-de-jaguar'                       => 'viajes_autor',
    ];

    if ( ! isset( $route_redirects[ $path ] ) ) {
        return;
    }

    $target = ukiyo_get_route_url( $route_redirects[ $path ] );
    if ( ! $target || trailingslashit( home_url( '/' . $path ) ) === trailingslashit( $target ) ) {
        return;
    }

    wp_safe_redirect( $target, 301 );
    exit;
}
add_action( 'template_redirect', 'ukiyo_redirect_legacy_404_paths', 0 );
