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
        'destinations' => [ 'experiencias', 'destinos', 'destinations' ],
        'pricing' => [ 'precios-viajes-a-medida', 'pricing', 'prices' ],
        'service_custom_travel' => [ 'viajes-a-medida', 'tailor-made-travel' ],
        'service_honeymoon' => [ 'viajes-de-novios', 'honeymoon-travel' ],
        'service_group_travel' => [ 'viajes-en-grupo', 'small-group-trips' ],
        'service_private' => [ 'viajes-privados', 'private-trips' ],
        'viajes_autor' => [ 'viajes-de-autor', 'signature-trips' ],
        'blog' => [ 'blog' ],
        'about' => [ 'nosotros', 'sobre-ukiyo', 'about-ukiyo' ],
        'reviews' => [ 'resenas', 'reseñas', 'reviews' ],
        'plan_trip' => [ 'planifica-tu-viaje', 'planifica-tu-viaje-a-medida', 'plan-your-trip' ],
        'privacy' => [ 'privacidad', 'politica-de-privacidad', 'privacy' ],
        'terms' => [ 'terminos', 'terminos-y-condiciones', 'terms' ],
        'cookies' => [ 'cookies', 'politica-de-cookies' ],
        'destination_indonesia' => [ 'viajes-a-medida-indonesia', 'indonesia', 'destino/indonesia', 'indonesia-tailor-made-travel' ],
        'destination_costa_rica' => [ 'viajes-a-medida-costa-rica', 'costa-rica', 'destino/costa-rica', 'costa-rica-tailor-made-travel' ],
        'destination_colombia' => [ 'viajes-a-medida-colombia', 'colombia', 'destino/colombia', 'colombia-tailor-made-travel' ],
        'destination_marruecos' => [ 'viajes-a-medida-marruecos', 'marruecos', 'destino/marruecos', 'morocco-tailor-made-travel' ],
        'destination_italia' => [ 'viajes-a-medida-italia', 'italia', 'destino/italia', 'italy-tailor-made-travel' ],
        'destination_lanzarote' => [ 'viajes-a-medida-lanzarote', 'lanzarote', 'destino/lanzarote', 'lanzarote-tailor-made-travel' ],
        'destination_marrakech' => [ 'viajes-a-medida-marrakech', 'marrakech', 'destino/marrakech', 'marrakech-tailor-made-travel' ],
        'destination_bali' => [ 'viajes-a-medida-bali', 'bali', 'destino/bali', 'bali-tailor-made-travel' ],
        'form_viaje_autor' => [ 'formulario-viaje-de-autor', 'formularioautor', 'signature-trip-form' ],
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
        $page_id = (int) $page->ID;

        if ( function_exists( 'pll_get_post' ) ) {
            $translated_id = (int) pll_get_post( $page_id );
            if ( $translated_id > 0 ) {
                $page_id = $translated_id;
            }
        }

        return get_permalink( $page_id );
    }

    $first_candidate = is_array( $candidates ) && ! empty( $candidates ) ? reset( $candidates ) : ltrim( (string) $fallback, '/' );

    if ( function_exists( 'pll_home_url' ) ) {
        return trailingslashit( pll_home_url() ) . ltrim( (string) $first_candidate ?: $fallback, '/' );
    }

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

    if ( function_exists( 'pll_current_language' ) && 'en' === pll_current_language() ) {
        if ( 'blog' === $key ) {
            return home_url( '/en/blog/' );
        }

        if ( 'cookies' === $key ) {
            return home_url( '/en/cookies/' );
        }
    }

    return ukiyo_resolve_page_url( $routes[ $key ], $fallback );
}

/**
 * Returns the current language home URL when Polylang is active.
 */
function ukiyo_get_home_url() {
    if ( function_exists( 'pll_home_url' ) ) {
        return pll_home_url();
    }

    return home_url( '/' );
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

    if ( function_exists( 'pll_current_language' ) && 'en' === pll_current_language() ) {
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
 * Clean English aliases for slugs WordPress has to store with a -2 suffix
 * because the Spanish page already owns the same post_name.
 */
function ukiyo_add_english_rewrite_aliases() {
    if ( ! function_exists( 'pll_get_post' ) ) {
        return;
    }

    $blog_id    = (int) pll_get_post( 220, 'en' );
    $cookies_id = (int) pll_get_post( 9, 'en' );

    if ( $blog_id > 0 ) {
        add_rewrite_rule( '^en/blog/?$', 'index.php?page_id=' . $blog_id . '&lang=en', 'top' );
    }

    if ( $cookies_id > 0 ) {
        add_rewrite_rule( '^en/cookies/?$', 'index.php?page_id=' . $cookies_id . '&lang=en', 'top' );
    }

    add_rewrite_rule( '^en/viajes/([^/]+)/?$', 'index.php?viaje_autor=$matches[1]&lang=en', 'top' );
}
add_action( 'init', 'ukiyo_add_english_rewrite_aliases', 40 );

function ukiyo_english_viaje_autor_permalink( $post_link, $post ) {
    if ( ! $post instanceof WP_Post || 'viaje_autor' !== $post->post_type || ! function_exists( 'pll_get_post_language' ) ) {
        return $post_link;
    }

    if ( 'en' !== pll_get_post_language( $post->ID, 'slug' ) ) {
        return $post_link;
    }

    $path = (string) wp_parse_url( $post_link, PHP_URL_PATH );
    if ( 0 === strpos( $path, '/en/' ) ) {
        return $post_link;
    }

    return home_url( '/en' . $path );
}
add_filter( 'post_type_link', 'ukiyo_english_viaje_autor_permalink', 10, 2 );

function ukiyo_keep_clean_english_aliases( $redirect_url ) {
    $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
    $path        = trim( rawurldecode( (string) wp_parse_url( $request_uri, PHP_URL_PATH ) ), '/' );

    if ( in_array( $path, [ 'en/blog', 'en/cookies' ], true ) || 0 === strpos( $path, 'en/viajes/' ) ) {
        return false;
    }

    return $redirect_url;
}
add_filter( 'redirect_canonical', 'ukiyo_keep_clean_english_aliases' );

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
