<?php
/**
 * Helpers del Portal del Aventurero.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_portal_get_dashboard_url() {
    return home_url( '/portal-del-aventurero/' );
}

function ukiyo_portal_get_dashboard_overview_url() {
    return add_query_arg( 'overview', '1', ukiyo_portal_get_dashboard_url() );
}

function ukiyo_portal_is_dashboard_overview_request() {
    return ukiyo_portal_is_dashboard_request() && '1' === ( isset( $_GET['overview'] ) ? sanitize_text_field( wp_unslash( $_GET['overview'] ) ) : '' );
}

function ukiyo_portal_get_auth_cookie_name() {
    return 'ukiyo_portal_auth';
}

function ukiyo_portal_has_active_gate() {
    $cookie_name = ukiyo_portal_get_auth_cookie_name();

    return ! empty( $_COOKIE[ $cookie_name ] ) && '1' === wp_unslash( $_COOKIE[ $cookie_name ] );
}

function ukiyo_portal_set_gate_cookie() {
    $cookie_name = ukiyo_portal_get_auth_cookie_name();
    $expires     = time() + DAY_IN_SECONDS * 14;
    $secure      = is_ssl();

    setcookie( $cookie_name, '1', $expires, COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN, $secure, true );
    $_COOKIE[ $cookie_name ] = '1';
}

function ukiyo_portal_clear_gate_cookie() {
    $cookie_name = ukiyo_portal_get_auth_cookie_name();
    $secure      = is_ssl();

    setcookie( $cookie_name, '', time() - HOUR_IN_SECONDS, COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN, $secure, true );
    unset( $_COOKIE[ $cookie_name ] );
}

function ukiyo_portal_is_authenticated() {
    return is_user_logged_in() && ukiyo_portal_has_active_gate();
}

function ukiyo_portal_get_current_url() {
    $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/';

    return home_url( $request_uri );
}

function ukiyo_portal_get_trip_url( $trip ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );

    if ( ! $trip_post instanceof WP_Post ) {
        return ukiyo_portal_get_dashboard_url();
    }

    return home_url( '/portal-del-aventurero/viaje/' . $trip_post->post_name . '/' );
}

function ukiyo_portal_get_document_url( $trip, $document_index ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );

    if ( ! $trip_post instanceof WP_Post ) {
        return '';
    }

    $trip_data = ukiyo_portal_get_trip_data( $trip_post );
    $document  = isset( $trip_data['documents'][ $document_index ] ) ? (array) $trip_data['documents'][ $document_index ] : [];
    $url       = isset( $document['url'] ) ? esc_url_raw( (string) $document['url'] ) : '';

    if ( $url && ( 'recurso' === ( isset( $document['type'] ) ? (string) $document['type'] : '' ) || empty( $document['file_id'] ) ) ) {
        return $url;
    }

    return home_url(
        sprintf(
            '/portal-del-aventurero/documento/%1$s/%2$d/',
            rawurlencode( $trip_post->post_name ),
            absint( $document_index )
        )
    );
}

function ukiyo_portal_is_request() {
    return (bool) get_query_var( 'ukiyo_portal_view' );
}

function ukiyo_portal_is_trip_request() {
    return 'trip' === get_query_var( 'ukiyo_portal_view' );
}

function ukiyo_portal_is_proposal_request() {
    return 'proposal' === get_query_var( 'ukiyo_portal_view' );
}

function ukiyo_portal_is_dashboard_request() {
    return 'dashboard' === get_query_var( 'ukiyo_portal_view' );
}

function ukiyo_portal_is_document_request() {
    return 'document' === get_query_var( 'ukiyo_portal_view' );
}

function ukiyo_portal_is_activation_request() {
    return 'activate' === get_query_var( 'ukiyo_portal_view' );
}

function ukiyo_portal_get_document_types() {
    return [
        'vuelos'          => 'Vuelos',
        'seguro'          => 'Seguro',
        'hoteles'         => 'Hoteles',
        'actividades'     => 'Actividades',
        'recurso'         => 'Recurso',
        'visado'          => 'Visado',
        'notas-practicas' => 'Notas prácticas',
        'presupuesto'     => 'Presupuesto',
        'otros'           => 'Otros',
    ];
}

function ukiyo_portal_get_recommendation_categories() {
    return [
        'Restaurantes'      => 'Restaurantes',
        'Cafés'             => 'Cafés',
        'Compras'           => 'Compras',
        'Playas'            => 'Playas',
        'Naturaleza'        => 'Naturaleza',
        'Bienestar'         => 'Bienestar',
        'Transporte'        => 'Transporte',
        'Vida nocturna'     => 'Vida nocturna',
        'Información útil'  => 'Información útil',
    ];
}

function ukiyo_portal_get_recommendation_category_meta( $category ) {
    $map = [
        'Restaurantes'     => [ 'slug' => 'restaurantes', 'label' => 'Restaurantes', 'icon' => '🍽' ],
        'Cafés'            => [ 'slug' => 'cafes', 'label' => 'Cafés', 'icon' => '☕' ],
        'Compras'          => [ 'slug' => 'compras', 'label' => 'Compras', 'icon' => '👜' ],
        'Playas'           => [ 'slug' => 'playas', 'label' => 'Playas', 'icon' => '🌊' ],
        'Naturaleza'       => [ 'slug' => 'naturaleza', 'label' => 'Naturaleza', 'icon' => '🌿' ],
        'Bienestar'        => [ 'slug' => 'bienestar', 'label' => 'Bienestar', 'icon' => '✦' ],
        'Transporte'       => [ 'slug' => 'transporte', 'label' => 'Transporte', 'icon' => '↔' ],
        'Vida nocturna'    => [ 'slug' => 'vida-nocturna', 'label' => 'Vida nocturna', 'icon' => '◐' ],
        'Información útil' => [ 'slug' => 'informacion-util', 'label' => 'Información útil', 'icon' => 'i' ],
    ];

    if ( isset( $map[ $category ] ) ) {
        return $map[ $category ];
    }

    return [
        'slug'  => sanitize_title( (string) $category ) ?: 'selecciones-ukiyo',
        'label' => $category ?: 'Selecciones UKIYO',
        'icon'  => '•',
    ];
}

function ukiyo_portal_get_trip_place_options( $trip_data ) {
    $options = [];

    foreach ( (array) $trip_data['itinerary'] as $place ) {
        $place_name = isset( $place['place'] ) ? trim( (string) $place['place'] ) : '';

        if ( '' === $place_name || isset( $options[ $place_name ] ) ) {
            continue;
        }

        $options[ $place_name ] = $place_name;
    }

    return $options;
}

function ukiyo_portal_get_google_places_api_key() {
    if ( defined( 'UKIYO_GOOGLE_PLACES_API_KEY' ) && UKIYO_GOOGLE_PLACES_API_KEY ) {
        return (string) UKIYO_GOOGLE_PLACES_API_KEY;
    }

    return '';
}

function ukiyo_portal_follow_google_maps_url( $url, $depth = 0 ) {
    $url = esc_url_raw( trim( (string) $url ) );

    if ( '' === $url ) {
        return '';
    }

    if ( $depth > 5 ) {
        return $url;
    }

    $response = wp_remote_get(
        $url,
        [
            'timeout'     => 12,
            'redirection' => 0,
            'headers'     => [
                'User-Agent' => 'UKIYO Portal/1.0; ' . home_url( '/' ),
            ],
        ]
    );

    if ( is_wp_error( $response ) ) {
        return $url;
    }

    $code     = (int) wp_remote_retrieve_response_code( $response );
    $location = wp_remote_retrieve_header( $response, 'location' );

    if ( $location && in_array( $code, [ 301, 302, 303, 307, 308 ], true ) ) {
        if ( 0 === strpos( $location, '/' ) ) {
            $parts    = wp_parse_url( $url );
            $scheme   = isset( $parts['scheme'] ) ? $parts['scheme'] : 'https';
            $host     = isset( $parts['host'] ) ? $parts['host'] : '';
            $location = $scheme . '://' . $host . $location;
        }

        return ukiyo_portal_follow_google_maps_url( $location, $depth + 1 );
    }

    return $url;
}

function ukiyo_portal_extract_google_maps_query( $url ) {
    $url = trim( (string) $url );

    if ( '' === $url ) {
        return '';
    }

    $decoded = html_entity_decode( $url, ENT_QUOTES, 'UTF-8' );
    $parts   = wp_parse_url( $decoded );

    if ( ! empty( $parts['path'] ) ) {
        if ( preg_match( '#/place/([^/]+)#', (string) $parts['path'], $matches ) ) {
            return sanitize_text_field( rawurldecode( str_replace( '+', ' ', $matches[1] ) ) );
        }

        if ( preg_match( '#/search/([^/]+)#', (string) $parts['path'], $matches ) ) {
            return sanitize_text_field( rawurldecode( str_replace( '+', ' ', $matches[1] ) ) );
        }
    }

    if ( empty( $parts['query'] ) ) {
        return '';
    }

    parse_str( (string) $parts['query'], $query_args );

    foreach ( [ 'q', 'query' ] as $key ) {
        if ( ! empty( $query_args[ $key ] ) ) {
            return sanitize_text_field( rawurldecode( (string) $query_args[ $key ] ) );
        }
    }

    if ( ! empty( $query_args['destination'] ) ) {
        return sanitize_text_field( rawurldecode( (string) $query_args['destination'] ) );
    }

    if ( ! empty( $parts['path'] ) && preg_match( '#/place/([^/]+)#', (string) $parts['path'], $matches ) ) {
        return sanitize_text_field( rawurldecode( str_replace( '+', ' ', $matches[1] ) ) );
    }

    return '';
}

function ukiyo_portal_extract_google_maps_coords( $url ) {
    $url = trim( (string) $url );

    if ( '' === $url ) {
        return [
            'lat' => '',
            'lng' => '',
        ];
    }

    $decoded = html_entity_decode( $url, ENT_QUOTES, 'UTF-8' );

    if ( preg_match( '/^\s*(-?\d+(?:\.\d+)?)\s*,\s*(-?\d+(?:\.\d+)?)\s*$/', $decoded, $matches ) ) {
        return [
            'lat' => (string) $matches[1],
            'lng' => (string) $matches[2],
        ];
    }

    $patterns = [
        '/@(-?\d+(?:\.\d+)?),(-?\d+(?:\.\d+)?)/',
        '/!3d(-?\d+(?:\.\d+)?)!4d(-?\d+(?:\.\d+)?)/',
        '/[?&](?:q|query|destination|ll)=(-?\d+(?:\.\d+)?)\s*,\s*(-?\d+(?:\.\d+)?)/',
    ];

    foreach ( $patterns as $pattern ) {
        if ( preg_match( $pattern, $decoded, $matches ) ) {
            return [
                'lat' => (string) $matches[1],
                'lng' => (string) $matches[2],
            ];
        }
    }

    return [
        'lat' => '',
        'lng' => '',
    ];
}

function ukiyo_portal_google_places_search_results( $query, $limit = 5 ) {
    $api_key = ukiyo_portal_get_google_places_api_key();
    $query   = sanitize_text_field( $query );
    $limit   = max( 1, min( 10, absint( $limit ) ) );

    if ( '' === $api_key ) {
        return new WP_Error( 'missing_api_key', 'Google Places API key no configurada.' );
    }

    if ( '' === $query ) {
        return new WP_Error( 'missing_query', 'No hemos podido extraer una búsqueda válida de Google Maps.' );
    }

    $response = wp_remote_post(
        'https://places.googleapis.com/v1/places:searchText',
        [
            'timeout' => 15,
            'headers' => [
                'Content-Type'    => 'application/json',
                'X-Goog-Api-Key'  => $api_key,
                'X-Goog-FieldMask'=> 'places.displayName,places.googleMapsUri,places.formattedAddress,places.rating,places.location',
            ],
            'body'    => wp_json_encode(
                [
                    'textQuery' => $query,
                    'languageCode' => 'es',
                    'maxResultCount' => $limit,
                ]
            ),
        ]
    );

    if ( is_wp_error( $response ) ) {
        return $response;
    }

    $code = (int) wp_remote_retrieve_response_code( $response );
    $body = json_decode( wp_remote_retrieve_body( $response ), true );

    if ( 200 !== $code ) {
        $api_message = '';

        if ( is_array( $body ) ) {
            if ( ! empty( $body['error']['message'] ) ) {
                $api_message = (string) $body['error']['message'];
            } elseif ( ! empty( $body['message'] ) ) {
                $api_message = (string) $body['message'];
            }
        }

        return new WP_Error(
            'places_lookup_failed',
            $api_message
                ? 'Google Places ha respondido con error: ' . sanitize_text_field( $api_message )
                : 'Google Places ha respondido con un error inesperado.'
        );
    }

    if ( empty( $body['places'] ) || ! is_array( $body['places'] ) ) {
        return new WP_Error( 'places_lookup_no_results', 'Google Places no ha devuelto resultados para la búsqueda: ' . sanitize_text_field( $query ) );
    }

    $results = [];

    foreach ( $body['places'] as $place ) {
        if ( ! is_array( $place ) ) {
            continue;
        }

        $results[] = [
            'name'    => isset( $place['displayName']['text'] ) ? sanitize_text_field( $place['displayName']['text'] ) : '',
            'rating'  => isset( $place['rating'] ) ? (string) $place['rating'] : '',
            'url'     => isset( $place['googleMapsUri'] ) ? esc_url_raw( $place['googleMapsUri'] ) : '',
            'address' => isset( $place['formattedAddress'] ) ? sanitize_text_field( $place['formattedAddress'] ) : '',
            'lat'     => isset( $place['location']['latitude'] ) ? (string) $place['location']['latitude'] : '',
            'lng'     => isset( $place['location']['longitude'] ) ? (string) $place['location']['longitude'] : '',
            'query'   => $query,
        ];
    }

    if ( empty( $results ) ) {
        return new WP_Error( 'places_lookup_no_results', 'Google Places no ha devuelto resultados válidos para la búsqueda: ' . sanitize_text_field( $query ) );
    }

    return $results;
}

function ukiyo_portal_google_places_text_search( $query ) {
    $results = ukiyo_portal_google_places_search_results( $query, 1 );

    if ( is_wp_error( $results ) ) {
        return $results;
    }

    return isset( $results[0] ) ? $results[0] : new WP_Error( 'places_lookup_no_results', 'Google Places no ha devuelto resultados para la búsqueda: ' . sanitize_text_field( $query ) );
}

function ukiyo_portal_extract_google_maps_page_name( $url ) {
    $url = esc_url_raw( trim( (string) $url ) );

    if ( '' === $url ) {
        return '';
    }

    $response = wp_remote_get(
        $url,
        [
            'timeout'     => 15,
            'redirection' => 5,
            'headers'     => [
                'User-Agent' => 'Mozilla/5.0 (compatible; UKIYO Portal/1.0; ' . home_url( '/' ) . ')',
            ],
        ]
    );

    if ( is_wp_error( $response ) ) {
        return '';
    }

    $html = wp_remote_retrieve_body( $response );

    if ( ! is_string( $html ) || '' === trim( $html ) ) {
        return '';
    }

    $patterns = [
        '/<meta[^>]+property=["\']og:title["\'][^>]+content=["\']([^"\']+)["\']/i',
        '/<meta[^>]+content=["\']([^"\']+)["\'][^>]+property=["\']og:title["\']/i',
        '/<title>([^<]+)<\/title>/i',
    ];

    foreach ( $patterns as $pattern ) {
        if ( preg_match( $pattern, $html, $matches ) ) {
            $title = sanitize_text_field( html_entity_decode( $matches[1], ENT_QUOTES, 'UTF-8' ) );
            $title = preg_replace( '/\s*[-|]\s*Google Maps\s*$/i', '', $title );
            $title = preg_replace( '/\s*-\s*Google Maps$/i', '', $title );
            $title = trim( (string) $title );

            if ( '' !== $title ) {
                return $title;
            }
        }
    }

    return '';
}

function ukiyo_portal_get_trip_statuses() {
    return [
        'planificacion' => 'En planificación',
        'confirmado'    => 'Confirmado',
        'preparacion'   => 'Preparando salida',
        'en-ruta'       => 'En ruta',
        'completado'    => 'Completado',
    ];
}

function ukiyo_portal_get_status_label( $status ) {
    $statuses = ukiyo_portal_get_trip_statuses();

    return isset( $statuses[ $status ] ) ? $statuses[ $status ] : ucfirst( str_replace( '-', ' ', (string) $status ) );
}

function ukiyo_portal_get_access_types() {
    return [
        'private'  => 'Portal privado',
        'proposal' => 'Propuesta pública',
    ];
}

function ukiyo_portal_get_default_contacts() {
    return [
        'whatsapp'    => '',
        'email'       => '',
        'phone'       => '',
        'local'       => '',
        'emergencies' => '',
        'support'     => '',
    ];
}

function ukiyo_portal_get_global_contact_profile() {
    return [
        'whatsapp_label' => '635 30 04 41',
        'whatsapp_link'  => 'https://wa.me/34635300441',
        'email_label'    => 'info@viajesukiyo.com',
        'email_link'     => 'mailto:info@viajesukiyo.com',
        'support_label'  => 'Hablar con UKIYO',
        'support_text'   => 'WhatsApp',
        'support_link'   => 'https://wa.me/34635300441',
    ];
}

function ukiyo_portal_get_saily_profile() {
    $default_url = defined( 'UKIYO_SAILLY_URL' ) && UKIYO_SAILLY_URL
        ? (string) UKIYO_SAILLY_URL
        : 'https://go.saily.site/aff_c?offer_id=101&aff_id=13327';
    $image_url   = '';
    $image_path  = '';
    $image_uri   = '';
    $candidates  = [
        [
            'path' => trailingslashit( get_template_directory() ) . 'images/saily-banners-affordable-esim-1200x628-es.png',
            'uri'  => trailingslashit( get_template_directory_uri() ) . 'images/saily-banners-affordable-esim-1200x628-es.png',
        ],
        [
            'path' => '/Users/sergiogarcia-heras/Downloads/saily-banners-affordable-esim-1200x628-es.png',
            'uri'  => '',
        ],
        [
            'path' => trailingslashit( get_template_directory() ) . 'images/saily-banners-affordable-esim-728x90-es.png',
            'uri'  => trailingslashit( get_template_directory_uri() ) . 'images/saily-banners-affordable-esim-728x90-es.png',
        ],
        [
            'path' => trailingslashit( get_template_directory() ) . 'assets/images/portal/saily-banners-affordable-esim-728x90-es.png',
            'uri'  => trailingslashit( get_template_directory_uri() ) . 'assets/images/portal/saily-banners-affordable-esim-728x90-es.png',
        ],
    ];

    foreach ( $candidates as $candidate ) {
        if ( file_exists( $candidate['path'] ) ) {
            $image_path = $candidate['path'];
            $image_uri  = $candidate['uri'];
            break;
        }
    }

    if ( $image_path ) {
        $image_contents = file_get_contents( $image_path );

        if ( false !== $image_contents ) {
            $image_url = 'data:image/png;base64,' . base64_encode( $image_contents );
        } elseif ( $image_uri ) {
            $image_url = add_query_arg(
                'v',
                (string) filemtime( $image_path ),
                $image_uri
            );
        }
    }

    return [
        'eyebrow' => 'Internet durante el viaje',
        'title'   => 'Si prefieres llevar el internet resuelto, aquí tienes una opción cómoda',
        'copy'    => 'Muchos viajeros prefieren salir ya con datos móviles activados para no depender de buscar una SIM al aterrizar. Si te encaja esa forma de viajar, puedes echar un vistazo a los planes de Sailly.',
        'cta'     => 'Ver planes de Sailly',
        'url'     => esc_url_raw( $default_url ),
        'image'   => $image_url,
    ];
}

function ukiyo_portal_get_trip_defaults() {
    return [
        'subtitle'        => '',
        'travelers'       => '',
        'destination'     => '',
        'dates'           => '',
        'status'          => 'planificacion',
        'access_type'     => 'private',
        'reference'       => '',
        'welcome'         => '',
        'country_story_title'    => '',
        'country_story_subtitle' => '',
        'country_story'   => '',
        'hero_image_id'   => 0,
        'users'           => [],
	        'flights'         => ukiyo_portal_get_flights_defaults(),
	        'documents'       => [],
	        'route_map_points'=> '',
	        'itinerary'       => [],
	        'recommendations' => [],
	        'contacts'        => ukiyo_portal_get_default_contacts(),
        'proposal'        => ukiyo_portal_get_proposal_defaults(),
    ];
}

function ukiyo_portal_get_proposal_defaults() {
    return [
        'token'                  => '',
        'price'                  => '',
        'price_note'             => '',
        'price_breakdown'        => '',
        'recipient_name'         => '',
        'traveler_count_override'=> 0,
        'valid_until'            => '',
        'includes'               => '',
        'excludes'               => '',
        'cta_label'              => 'Quiero este viaje',
        'cta_url'                => '',
        'response_status'        => '',
        'change_request_message' => '',
        'change_requested_at'    => '',
        'approved_at'            => '',
    ];
}

function ukiyo_portal_get_proposal_response_statuses() {
    return [
        ''                  => [
            'label' => 'Sin respuesta',
            'icon'  => '—',
            'color' => '#94a3b8',
        ],
        'approved'          => [
            'label' => 'Aprobada',
            'icon'  => '✓',
            'color' => '#16a34a',
        ],
        'changes_requested' => [
            'label' => 'Cambios propuestos',
            'icon'  => '?',
            'color' => '#2563eb',
        ],
    ];
}

function ukiyo_portal_get_proposal_response_status_meta( $status ) {
    $statuses = ukiyo_portal_get_proposal_response_statuses();
    $status   = sanitize_key( (string) $status );

    return isset( $statuses[ $status ] ) ? $statuses[ $status ] : $statuses[''];
}

function ukiyo_portal_get_proposal_response_nonce( $trip, $response_type, $token ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );

    if ( ! $trip_post instanceof WP_Post ) {
        return '';
    }

    return wp_create_nonce( 'ukiyo_portal_proposal_response_' . $trip_post->ID . '_' . sanitize_key( (string) $response_type ) . '_' . (string) $token );
}

function ukiyo_portal_get_proposal_response_action_url( $trip, $response_type, $token = '' ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );

    if ( ! $trip_post instanceof WP_Post ) {
        return '';
    }

    $token = '' !== (string) $token ? (string) $token : ukiyo_portal_get_proposal_token( $trip_post );

    return wp_nonce_url(
        add_query_arg(
            [
                'action'        => 'ukiyo_portal_proposal_response',
                'response_type' => sanitize_key( (string) $response_type ),
                'trip_id'       => $trip_post->ID,
                'token'         => $token,
            ],
            admin_url( 'admin-post.php' )
        ),
        'ukiyo_portal_proposal_response_' . $trip_post->ID . '_' . sanitize_key( (string) $response_type ) . '_' . $token
    );
}

function ukiyo_portal_get_proposal_approval_url( $trip, $token = '' ) {
    return ukiyo_portal_get_proposal_response_action_url( $trip, 'approve', $token );
}

function ukiyo_portal_get_airline_options() {
    return [
        'iberia'     => [ 'label' => 'Iberia', 'bg' => '#d71920', 'fg' => '#ffffff', 'short' => 'IB' ],
        'vueling'    => [ 'label' => 'Vueling', 'bg' => '#ffd400', 'fg' => '#111827', 'short' => 'VY' ],
        'air_europa' => [ 'label' => 'Air Europa', 'bg' => '#003a70', 'fg' => '#ffffff', 'short' => 'UX' ],
        'binter'     => [ 'label' => 'Binter', 'bg' => '#0c8f4f', 'fg' => '#ffffff', 'short' => 'NT' ],
        'ryanair'    => [ 'label' => 'Ryanair', 'bg' => '#1d4ed8', 'fg' => '#facc15', 'short' => 'FR' ],
        'delta'      => [ 'label' => 'Delta', 'bg' => '#0f172a', 'fg' => '#ffffff', 'short' => 'DL' ],
        'easyjet'    => [ 'label' => 'easyJet', 'bg' => '#ff6a00', 'fg' => '#ffffff', 'short' => 'U2' ],
        'jet2'       => [ 'label' => 'Jet2', 'bg' => '#c1121f', 'fg' => '#ffffff', 'short' => 'LS' ],
        'lufthansa'  => [ 'label' => 'Lufthansa', 'bg' => '#05164d', 'fg' => '#f5c542', 'short' => 'LH' ],
        'klm'        => [ 'label' => 'KLM', 'bg' => '#00a1de', 'fg' => '#ffffff', 'short' => 'KL' ],
        'transavia'  => [ 'label' => 'Transavia', 'bg' => '#00aa6c', 'fg' => '#ffffff', 'short' => 'HV' ],
        'wizz_air'   => [ 'label' => 'Wizz Air', 'bg' => '#c026d3', 'fg' => '#ffffff', 'short' => 'W6' ],
        'other'      => [ 'label' => 'Otra aerolínea', 'bg' => '#334155', 'fg' => '#ffffff', 'short' => 'FL' ],
    ];
}

function ukiyo_portal_get_flights_defaults() {
    return [
        'airline'                   => '',
        'airline_custom'            => '',
        'outbound_departure_airport'=> '',
        'outbound_arrival_airport'  => '',
        'outbound_departure_time'   => '',
        'outbound_arrival_time'     => '',
        'outbound_departure_timezone' => '',
        'outbound_arrival_timezone'   => '',
        'outbound_flight_number'    => '',
        'return_departure_airport'  => '',
        'return_arrival_airport'    => '',
        'return_departure_time'     => '',
        'return_arrival_time'       => '',
        'return_departure_timezone' => '',
        'return_arrival_timezone'   => '',
        'return_flight_number'      => '',
    ];
}

function ukiyo_portal_normalize_flights( $flights ) {
    $flights = wp_parse_args( (array) $flights, ukiyo_portal_get_flights_defaults() );

    foreach ( $flights as $key => $value ) {
        $flights[ $key ] = is_string( $value ) ? trim( $value ) : $value;
    }

    return $flights;
}

function ukiyo_portal_get_airline_label( $airline_key, $custom_label = '' ) {
    $airline_key   = sanitize_key( (string) $airline_key );
    $custom_label  = trim( (string) $custom_label );
    $airline_map   = ukiyo_portal_get_airline_options();

    if ( 'other' === $airline_key && '' !== $custom_label ) {
        return $custom_label;
    }

    if ( isset( $airline_map[ $airline_key ]['label'] ) ) {
        return (string) $airline_map[ $airline_key ]['label'];
    }

    return $custom_label;
}

function ukiyo_portal_get_airline_asset_url( $airline_key, $custom_label = '' ) {
    $aliases = [
        'air_europa' => 'air_europa',
        'aireuropa'  => 'air_europa',
        'ryanair'    => 'ryanair',
        'iberia'     => 'iberia',
        'delta'      => 'delta',
        'wizzair'    => 'wizz_air',
        'wizz_air'   => 'wizz_air',
        'wizz air'   => 'wizz_air',
    ];
    $files   = [
        'air_europa' => 'aireuropa_airline.webp',
        'ryanair'    => 'ryanair_airline.png',
        'iberia'     => 'iberia_airline.png',
        'delta'      => 'delta_airline.png',
        'wizz_air'   => 'wizz_airline.png',
    ];

    $candidate_keys = [];
    $airline_key    = sanitize_key( (string) $airline_key );
    $custom_label   = trim( (string) $custom_label );
    $fallback_relative_path = 'assets/images/portal/airplane.png';
    $fallback_absolute_path = trailingslashit( get_stylesheet_directory() ) . $fallback_relative_path;

    if ( 'other' === $airline_key ) {
        if ( file_exists( $fallback_absolute_path ) ) {
            return trailingslashit( get_stylesheet_directory_uri() ) . $fallback_relative_path;
        }
    }

    if ( '' !== $airline_key ) {
        $candidate_keys[] = $airline_key;
    }

    if ( '' !== $custom_label ) {
        $normalized_label = strtolower( preg_replace( '/[^a-z0-9]+/i', '_', $custom_label ) );
        $compact_label    = strtolower( preg_replace( '/[^a-z0-9]+/i', '', $custom_label ) );
        $candidate_keys[] = $normalized_label;
        $candidate_keys[] = $compact_label;
        $candidate_keys[] = strtolower( $custom_label );
    }

    foreach ( $candidate_keys as $candidate_key ) {
        $candidate_key = trim( (string) $candidate_key );

        if ( '' === $candidate_key ) {
            continue;
        }

        $resolved_key = isset( $aliases[ $candidate_key ] ) ? $aliases[ $candidate_key ] : $candidate_key;

        if ( empty( $files[ $resolved_key ] ) ) {
            continue;
        }

        $relative_path = 'assets/images/portal/' . $files[ $resolved_key ];
        $absolute_path = trailingslashit( get_stylesheet_directory() ) . $relative_path;

        if ( file_exists( $absolute_path ) ) {
            return trailingslashit( get_stylesheet_directory_uri() ) . $relative_path;
        }
    }

    if ( file_exists( $fallback_absolute_path ) && ( 'other' === $airline_key || '' !== $custom_label || '' !== $airline_key ) ) {
        return trailingslashit( get_stylesheet_directory_uri() ) . $fallback_relative_path;
    }

    return '';
}

function ukiyo_portal_get_airline_logo_data_uri( $airline_key, $custom_label = '' ) {
    $asset_url = ukiyo_portal_get_airline_asset_url( $airline_key, $custom_label );

    if ( $asset_url ) {
        return $asset_url;
    }

    $airline_key  = sanitize_key( (string) $airline_key );
    $custom_label = trim( (string) $custom_label );
    $airline_map  = ukiyo_portal_get_airline_options();
    $brand        = isset( $airline_map[ $airline_key ] ) ? $airline_map[ $airline_key ] : $airline_map['other'];
    $label        = ukiyo_portal_get_airline_label( $airline_key, $custom_label );
    $label        = $label ? $label : $brand['label'];
    $short        = ! empty( $brand['short'] ) ? $brand['short'] : strtoupper( substr( preg_replace( '/[^A-Z0-9]/i', '', $label ), 0, 2 ) );
    $label_xml    = htmlspecialchars( $label, ENT_QUOTES, 'UTF-8' );
    $short_xml    = htmlspecialchars( $short, ENT_QUOTES, 'UTF-8' );
    $bg_xml       = htmlspecialchars( (string) $brand['bg'], ENT_QUOTES, 'UTF-8' );
    $fg_xml       = htmlspecialchars( (string) $brand['fg'], ENT_QUOTES, 'UTF-8' );
    $svg          = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="320" height="120" viewBox="0 0 320 120" fill="none">
  <rect width="320" height="120" rx="28" fill="{$bg_xml}"/>
  <rect x="20" y="20" width="80" height="80" rx="22" fill="rgba(255,255,255,0.14)"/>
  <text x="60" y="70" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-size="28" font-weight="700" fill="{$fg_xml}">{$short_xml}</text>
  <text x="122" y="56" font-family="Arial, Helvetica, sans-serif" font-size="16" font-weight="700" fill="{$fg_xml}">{$label_xml}</text>
  <text x="122" y="80" font-family="Arial, Helvetica, sans-serif" font-size="12" font-weight="500" fill="{$fg_xml}" fill-opacity="0.85">Vuelo del viaje</text>
</svg>
SVG;

    return 'data:image/svg+xml;charset=UTF-8,' . rawurlencode( $svg );
}

function ukiyo_portal_format_flight_datetime( $value ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return '';
    }

    $timestamp = strtotime( str_replace( 'T', ' ', $value ) );

    if ( false === $timestamp ) {
        return $value;
    }

    return wp_date( 'j M \\· H:i', $timestamp );
}

function ukiyo_portal_format_flight_date( $value ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return '';
    }

    $timestamp = strtotime( str_replace( 'T', ' ', $value ) );

    if ( false === $timestamp ) {
        return '';
    }

    return wp_date( 'j M y', $timestamp );
}

function ukiyo_portal_format_flight_time_only( $value ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return '';
    }

    $timestamp = strtotime( str_replace( 'T', ' ', $value ) );

    if ( false === $timestamp ) {
        return '';
    }

    return wp_date( 'H:i', $timestamp );
}

function ukiyo_portal_get_valid_timezone_identifier( $timezone ) {
    $timezone = trim( (string) $timezone );

    if ( '' === $timezone ) {
        return '';
    }

    static $valid_timezones = null;

    if ( null === $valid_timezones ) {
        $valid_timezones = array_fill_keys( timezone_identifiers_list(), true );
    }

    return isset( $valid_timezones[ $timezone ] ) ? $timezone : '';
}

function ukiyo_portal_create_local_datetime( $value, $timezone = '' ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return null;
    }

    $normalized_timezone = ukiyo_portal_get_valid_timezone_identifier( $timezone );

    try {
        if ( $normalized_timezone ) {
            return new DateTimeImmutable( str_replace( 'T', ' ', $value ), new DateTimeZone( $normalized_timezone ) );
        }

        return new DateTimeImmutable( str_replace( 'T', ' ', $value ), wp_timezone() );
    } catch ( Exception $exception ) {
        return null;
    }
}

function ukiyo_portal_format_flight_duration( $departure, $arrival, $departure_timezone = '', $arrival_timezone = '' ) {
    $departure = trim( (string) $departure );
    $arrival   = trim( (string) $arrival );

    if ( '' === $departure || '' === $arrival ) {
        return '';
    }

    $departure_datetime = ukiyo_portal_create_local_datetime( $departure, $departure_timezone );
    $arrival_datetime   = ukiyo_portal_create_local_datetime( $arrival, $arrival_timezone );

    if ( ! $departure_datetime || ! $arrival_datetime ) {
        return '';
    }

    $departure_timestamp = $departure_datetime->getTimestamp();
    $arrival_timestamp   = $arrival_datetime->getTimestamp();

    if ( $arrival_timestamp <= $departure_timestamp ) {
        return '';
    }

    $minutes = (int) round( ( $arrival_timestamp - $departure_timestamp ) / 60 );
    $hours   = (int) floor( $minutes / 60 );
    $remain  = $minutes % 60;

    if ( $hours > 0 && $remain > 0 ) {
        return sprintf( '%1$dh %2$dm', $hours, $remain );
    }

    if ( $hours > 0 ) {
        return sprintf( '%dh', $hours );
    }

    return sprintf( '%dm', $remain );
}

function ukiyo_portal_parse_airport_display( $value ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return [
            'code' => '',
            'label' => '',
        ];
    }

    if ( preg_match( '/^(.*?)\s*\(([A-Za-z0-9]{3,4})\)\s*$/', $value, $matches ) ) {
        return [
            'code'  => strtoupper( trim( $matches[2] ) ),
            'label' => trim( $matches[1] ),
        ];
    }

    if ( preg_match( '/^[A-Za-z0-9]{3,4}$/', $value ) ) {
        return [
            'code'  => strtoupper( $value ),
            'label' => '',
        ];
    }

    return [
        'code'  => $value,
        'label' => '',
    ];
}

function ukiyo_portal_parse_list_items( $value ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return [];
    }

    $parts = preg_split( '/\r\n|\r|\n|\|/', $value );

    if ( ! is_array( $parts ) ) {
        return [];
    }

    $parts = array_map( 'sanitize_text_field', $parts );
    $parts = array_map( 'trim', $parts );

    return array_values( array_filter( array_unique( $parts ) ) );
}

function ukiyo_portal_parse_price_breakdown( $value ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return [];
    }

    $lines = preg_split( '/\r\n|\r|\n/', $value );

    if ( ! is_array( $lines ) ) {
        return [];
    }

    $items = [];

    foreach ( $lines as $line ) {
        $line = trim( (string) $line );

        if ( '' === $line ) {
            continue;
        }

        $parts = array_map( 'trim', explode( '|', $line ) );
        $parts = array_pad( $parts, 3, '' );

        $label  = sanitize_text_field( $parts[0] );
        $amount = sanitize_text_field( $parts[1] );
        $note   = sanitize_text_field( $parts[2] );

        if ( '' === $label && '' === $amount && '' === $note ) {
            continue;
        }

        $items[] = [
            'label'  => $label,
            'amount' => $amount,
            'note'   => $note,
        ];
    }

    return $items;
}

function ukiyo_portal_generate_share_token() {
    return strtolower( wp_generate_password( 24, false, false ) );
}

function ukiyo_portal_get_proposal_token( $trip ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );

    if ( ! $trip_post instanceof WP_Post ) {
        return '';
    }

    return (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_token', true );
}

function ukiyo_portal_ensure_proposal_token( $trip, $force_refresh = false ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );

    if ( ! $trip_post instanceof WP_Post ) {
        return '';
    }

    $token = ukiyo_portal_get_proposal_token( $trip_post );

    if ( $force_refresh || '' === $token ) {
        $token = ukiyo_portal_generate_share_token();
        update_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_token', $token );
    }

    return $token;
}

function ukiyo_portal_get_proposal_url( $trip, $token = '' ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );

    if ( ! $trip_post instanceof WP_Post ) {
        return ukiyo_portal_get_dashboard_url();
    }

    $token = '' !== (string) $token ? (string) $token : ukiyo_portal_get_proposal_token( $trip_post );

    if ( '' === $token ) {
        return '';
    }

    return home_url(
        sprintf(
            '/portal-del-aventurero/propuesta/%1$s/%2$s/',
            rawurlencode( $trip_post->post_name ),
            rawurlencode( $token )
        )
    );
}

function ukiyo_portal_validate_proposal_token( $trip, $token ) {
    $expected = ukiyo_portal_get_proposal_token( $trip );
    $token    = sanitize_text_field( (string) $token );

    if ( '' === $expected || '' === $token ) {
        return false;
    }

    return hash_equals( $expected, $token );
}

function ukiyo_portal_trip_matches_access_type( $trip, $access_type = 'private' ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );

    if ( ! $trip_post instanceof WP_Post ) {
        return false;
    }

    $data = ukiyo_portal_get_trip_data( $trip_post );

    if ( 'proposal' === $access_type ) {
        return 'proposal' === $data['access_type'];
    }

    return 'proposal' !== $data['access_type'];
}

function ukiyo_portal_format_proposal_valid_until( $value ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return '';
    }

    $timestamp = strtotime( $value );

    if ( false === $timestamp ) {
        return $value;
    }

    return wp_date( 'j \\d\\e F \\d\\e Y', $timestamp );
}

function ukiyo_portal_get_proposal_seo_override( $trip = null ) {
    if ( ! function_exists( 'ukiyo_portal_is_proposal_request' ) || ! ukiyo_portal_is_proposal_request() ) {
        return [];
    }

    $trip_post = $trip instanceof WP_Post ? $trip : ukiyo_portal_get_current_trip();

    if ( ! $trip_post instanceof WP_Post ) {
        return [];
    }

    $data           = ukiyo_portal_get_trip_data( $trip_post );
    $proposal       = wp_parse_args( $data['proposal'], ukiyo_portal_get_proposal_defaults() );
    $travelers      = ukiyo_portal_parse_travelers( $data['travelers'] );
    $recipient_name = trim( (string) $proposal['recipient_name'] );
    $traveler_count = ! empty( $proposal['traveler_count_override'] ) ? (int) $proposal['traveler_count_override'] : ( ! empty( $travelers ) ? count( $travelers ) : 2 );
    $traveler_label = 1 === $traveler_count ? 'persona' : 'personas';
    $destination    = trim( (string) $data['destination'] );
    $hero_image     = ukiyo_portal_get_trip_hero_image_data( $trip_post );
    $token          = get_query_var( 'ukiyo_portal_token' ) ? sanitize_text_field( (string) get_query_var( 'ukiyo_portal_token' ) ) : $proposal['token'];
    $canonical      = ukiyo_portal_get_proposal_url( $trip_post, $token );
    $total_days     = 0;

    foreach ( (array) $data['itinerary'] as $place ) {
        $place_days = isset( $place['days'] ) && is_array( $place['days'] ) ? count( $place['days'] ) : 0;
        $total_days += $place_days ? $place_days : max( 1, (int) $place['stay_days'] );
    }

    if ( $total_days < 1 ) {
        $total_days = 1;
    }

    $title = $destination ? 'Propuesta de viaje a ' . $destination : 'Propuesta de viaje a medida';

    if ( $recipient_name ) {
        $title .= ' para ' . $recipient_name;
    }

    $title .= ' | UKIYO';

    $description_parts = [];

    if ( $recipient_name ) {
        $description_parts[] = 'Una propuesta personalizada para ' . $recipient_name . '.';
    }

    $summary_line = sprintf(
        '%1$s días %2$s para %3$s %4$s.',
        number_format_i18n( $total_days ),
        $destination ? 'en ' . $destination : 'de viaje',
        number_format_i18n( $traveler_count ),
        $traveler_label
    );

    $description_parts[] = $summary_line;

    if ( ! empty( $proposal['price'] ) ) {
        $description_parts[] = 'Precio orientativo: ' . trim( (string) $proposal['price'] ) . '.';
    }

    $subtitle = trim( (string) $data['subtitle'] );

    if ( '' !== $subtitle ) {
        $description_parts[] = $subtitle;
    } else {
        $description_parts[] = 'Itinerario visual, servicios incluidos y desglose transparente del precio.';
    }

    return [
        'title'       => trim( $title ),
        'description' => wp_trim_words( implode( ' ', $description_parts ), 32, '…' ),
        'image'       => ! empty( $hero_image['url'] ) ? $hero_image['url'] : '',
        'image_width' => ! empty( $hero_image['width'] ) ? (int) $hero_image['width'] : 0,
        'image_height'=> ! empty( $hero_image['height'] ) ? (int) $hero_image['height'] : 0,
        'image_type'  => ! empty( $hero_image['type'] ) ? (string) $hero_image['type'] : '',
        'canonical'   => $canonical,
    ];
}
add_filter(
    'ukiyo_current_seo_override',
    function ( $override ) {
        $proposal_override = ukiyo_portal_get_proposal_seo_override();

        if ( empty( $proposal_override ) ) {
            return $override;
        }

        return array_merge( (array) $override, $proposal_override );
    }
);

function ukiyo_portal_parse_travelers( $value ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return [];
    }

    $parts = preg_split( '/\r\n|\r|\n|,/', $value );

    if ( ! is_array( $parts ) ) {
        return [];
    }

    $parts = array_map( 'sanitize_text_field', $parts );
    $parts = array_map( 'trim', $parts );
    $parts = array_values( array_filter( array_unique( $parts ) ) );

    return $parts;
}

function ukiyo_portal_get_itinerary_activity_defaults() {
    return [
        'title'            => '',
        'description'      => '',
        'modal_content'    => '',
        'visiting_hours'   => '',
        'entry_price'      => '',
        'location_name'    => '',
        'location_address' => '',
        'map_url'          => '',
        'map_lat'          => '',
        'map_lng'          => '',
        'image_ids'        => [],
    ];
}

function ukiyo_portal_get_itinerary_day_defaults() {
    return [
        'day_number'      => '',
        'title'           => '',
        'description'     => '',
        'location_name'   => '',
        'location_address'=> '',
        'location_map_url'=> '',
        'location_lat'    => '',
        'location_lng'    => '',
        'schedule'        => '',
        'recommendations' => '',
        'activities'      => [],
        'image_ids'       => [],
        'link_url'        => '',
        'file_id'         => 0,
    ];
}

function ukiyo_portal_get_itinerary_place_defaults() {
    return [
        'place'                      => '',
        'place_description'          => '',
        'stay_days'                  => 1,
        'image_id'                   => 0,
        'map_url'                    => '',
        'map_points'                 => '',
        'map_lat'                    => '',
        'map_lng'                    => '',
        'accommodation_name'         => '',
        'accommodation_location'     => '',
        'accommodation_rating'       => '',
        'accommodation_rating_source'=> '',
        'accommodation_image_id'     => 0,
        'accommodations'             => [],
        'days'                       => [],
    ];
}

function ukiyo_portal_get_itinerary_accommodation_defaults() {
    return [
        'name'          => '',
        'location'      => '',
        'rating'        => '',
        'rating_source' => '',
        'image_id'      => 0,
        'start_day'     => 1,
        'end_day'       => 1,
    ];
}

function ukiyo_portal_normalize_itinerary_days( $days ) {
    $normalized = [];

    foreach ( (array) $days as $index => $day ) {
        $day = wp_parse_args( (array) $day, ukiyo_portal_get_itinerary_day_defaults() );

        $day['day_number']      = $day['day_number'] ? max( 1, (int) $day['day_number'] ) : count( $normalized ) + 1;
        $day['title']           = (string) $day['title'];
        $day['description']     = (string) $day['description'];
        $day['location_name']   = (string) $day['location_name'];
        $day['location_address']= (string) $day['location_address'];
        $day['location_map_url']= (string) $day['location_map_url'];
        $day['location_lat']    = (string) $day['location_lat'];
        $day['location_lng']    = (string) $day['location_lng'];
        $day['schedule']        = (string) $day['schedule'];
        $day['recommendations'] = (string) $day['recommendations'];
        $day['activities']      = ukiyo_portal_normalize_itinerary_activities( $day['activities'] );
        $day['image_ids']       = ukiyo_portal_normalize_attachment_ids( $day['image_ids'] );
        $day['link_url']        = (string) $day['link_url'];
        $day['file_id']         = absint( $day['file_id'] );

        $normalized[] = $day;
    }

    return $normalized;
}

function ukiyo_portal_normalize_itinerary_activities( $activities ) {
    $normalized = [];

    foreach ( (array) $activities as $activity ) {
        $activity = wp_parse_args( (array) $activity, ukiyo_portal_get_itinerary_activity_defaults() );

        if ( '' === trim( (string) $activity['title'] ) && '' === trim( (string) $activity['location_name'] ) && '' === trim( (string) $activity['map_url'] ) ) {
            continue;
        }

        $activity['title']            = (string) $activity['title'];
        $activity['description']      = (string) $activity['description'];
        $activity['modal_content']    = (string) $activity['modal_content'];
        $activity['visiting_hours']   = (string) $activity['visiting_hours'];
        $activity['entry_price']      = (string) $activity['entry_price'];
        $activity['location_name']    = (string) $activity['location_name'];
        $activity['location_address'] = (string) $activity['location_address'];
        $activity['map_url']          = (string) $activity['map_url'];
        $activity['map_lat']          = (string) $activity['map_lat'];
        $activity['map_lng']          = (string) $activity['map_lng'];
        $activity['image_ids']        = ukiyo_portal_normalize_attachment_ids( $activity['image_ids'] );

        $normalized[] = $activity;
    }

    return $normalized;
}

function ukiyo_portal_normalize_itinerary_accommodations( $accommodations, $fallback_total_days = 1 ) {
    $normalized       = [];

    foreach ( (array) $accommodations as $accommodation ) {
        $accommodation = wp_parse_args( (array) $accommodation, ukiyo_portal_get_itinerary_accommodation_defaults() );

        if ( '' === trim( (string) $accommodation['name'] ) && '' === trim( (string) $accommodation['location'] ) ) {
            continue;
        }

        $start_day = max( 1, (int) $accommodation['start_day'] );
        $end_day   = max( $start_day, (int) $accommodation['end_day'] );

        if ( $end_day < $start_day ) {
            $end_day = $start_day;
        }

        $normalized[] = [
            'name'          => (string) $accommodation['name'],
            'location'      => (string) $accommodation['location'],
            'rating'        => (string) $accommodation['rating'],
            'rating_source' => (string) $accommodation['rating_source'],
            'image_id'      => absint( $accommodation['image_id'] ),
            'start_day'     => $start_day,
            'end_day'       => $end_day,
        ];
    }

    return $normalized;
}

function ukiyo_portal_get_place_accommodation_summary( $place ) {
    $accommodations = isset( $place['accommodations'] ) && is_array( $place['accommodations'] ) ? $place['accommodations'] : [];
    $count          = count( $accommodations );

    if ( 0 === $count ) {
        return 'Alojamiento por definir';
    }

    if ( 1 === $count ) {
        return trim( (string) $accommodations[0]['name'] ) ?: '1 alojamiento';
    }

    return sprintf( '%s alojamientos', number_format_i18n( $count ) );
}

function ukiyo_portal_get_active_place_accommodation( $place, $day_number = 1, $day_index = 0 ) {
    $accommodations = isset( $place['accommodations'] ) && is_array( $place['accommodations'] ) ? $place['accommodations'] : [];
    $day_number     = max( 1, (int) $day_number );
    $day_index      = max( 0, (int) $day_index );

    foreach ( $accommodations as $accommodation ) {
        $start_day = ! empty( $accommodation['start_day'] ) ? (int) $accommodation['start_day'] : 1;
        $end_day   = ! empty( $accommodation['end_day'] ) ? (int) $accommodation['end_day'] : $start_day;

        if ( $day_number >= $start_day && $day_number <= $end_day ) {
            return $accommodation;
        }
    }

    if ( isset( $accommodations[ $day_index ] ) ) {
        return $accommodations[ $day_index ];
    }

    return ! empty( $accommodations ) ? $accommodations[0] : [];
}

function ukiyo_portal_normalize_itinerary_places( $itinerary ) {
    $normalized = [];

    foreach ( (array) $itinerary as $index => $entry ) {
        $entry = (array) $entry;

        if ( isset( $entry['days'] ) && is_array( $entry['days'] ) ) {
            $place = wp_parse_args( $entry, ukiyo_portal_get_itinerary_place_defaults() );
            $place['place']                       = (string) $place['place'];
            $place['place_description']           = (string) $place['place_description'];
            $place['stay_days']                   = max( 1, (int) $place['stay_days'] );
            $place['image_id']                    = absint( $place['image_id'] );
            $place['map_url']                     = (string) $place['map_url'];
            $place['map_points']                  = (string) $place['map_points'];
            $place['map_lat']                     = (string) $place['map_lat'];
            $place['map_lng']                     = (string) $place['map_lng'];
            $place['accommodation_name']          = (string) $place['accommodation_name'];
            $place['accommodation_location']      = (string) $place['accommodation_location'];
            $place['accommodation_rating']        = (string) $place['accommodation_rating'];
            $place['accommodation_rating_source'] = (string) $place['accommodation_rating_source'];
            $place['accommodation_image_id']      = absint( $place['accommodation_image_id'] );
            $place['days']                        = ukiyo_portal_normalize_itinerary_days( $place['days'] );
            $place_total_days                     = ! empty( $place['days'] ) ? count( $place['days'] ) : max( 1, (int) $place['stay_days'] );
            $place['accommodations']             = ukiyo_portal_normalize_itinerary_accommodations(
                isset( $place['accommodations'] ) ? $place['accommodations'] : [],
                $place_total_days
            );

            if ( empty( $place['accommodations'] ) && ( '' !== trim( $place['accommodation_name'] ) || '' !== trim( $place['accommodation_location'] ) ) ) {
                $place['accommodations'] = ukiyo_portal_normalize_itinerary_accommodations(
                    [
                        [
                            'name'          => $place['accommodation_name'],
                            'location'      => $place['accommodation_location'],
                            'rating'        => $place['accommodation_rating'],
                            'rating_source' => $place['accommodation_rating_source'],
                            'image_id'      => $place['accommodation_image_id'],
                            'start_day'     => 1,
                            'end_day'       => $place_total_days,
                        ],
                    ],
                    $place_total_days
                );
            }

            if ( ! empty( $place['accommodations'] ) ) {
                $primary_place_accommodation           = $place['accommodations'][0];
                $place['accommodation_name']          = (string) $primary_place_accommodation['name'];
                $place['accommodation_location']      = (string) $primary_place_accommodation['location'];
                $place['accommodation_rating']        = (string) $primary_place_accommodation['rating'];
                $place['accommodation_rating_source'] = (string) $primary_place_accommodation['rating_source'];
                $place['accommodation_image_id']      = absint( $primary_place_accommodation['image_id'] );
            }

            $normalized[]                         = $place;
            continue;
        }

        $legacy_day = wp_parse_args(
            $entry,
            [
                'day_number'      => is_numeric( $index ) ? (int) $index + 1 : '',
                'title'           => '',
                'location'        => '',
                'description'     => '',
                'schedule'        => '',
                'accommodation'   => '',
                'recommendations' => '',
                'image_ids'       => [],
                'link_url'        => '',
                'file_id'         => 0,
            ]
        );

        $normalized[] = [
            'place'                       => (string) $legacy_day['location'],
            'stay_days'                   => 1,
            'image_id'                    => 0,
            'map_url'                     => '',
            'map_points'                  => '',
            'map_lat'                     => '',
            'map_lng'                     => '',
            'accommodation_name'          => (string) $legacy_day['accommodation'],
            'accommodation_location'      => '',
            'accommodation_rating'        => '',
            'accommodation_rating_source' => '',
            'accommodation_image_id'      => 0,
            'accommodations'              => ukiyo_portal_normalize_itinerary_accommodations(
                [
                    [
                        'name'      => (string) $legacy_day['accommodation'],
                        'start_day' => 1,
                        'end_day'   => 1,
                    ],
                ],
                1
            ),
            'days'                        => ukiyo_portal_normalize_itinerary_days(
                [
                    [
                        'day_number'      => $legacy_day['day_number'],
                        'title'           => $legacy_day['title'],
                        'description'     => $legacy_day['description'],
                        'location_name'   => '',
                        'location_address'=> '',
                        'location_map_url'=> '',
                        'schedule'        => $legacy_day['schedule'],
                        'recommendations' => $legacy_day['recommendations'],
                        'activities'      => [],
                        'image_ids'       => $legacy_day['image_ids'],
                        'link_url'        => $legacy_day['link_url'],
                        'file_id'         => $legacy_day['file_id'],
                    ],
                ]
            ),
        ];
    }

    return $normalized;
}

function ukiyo_portal_normalize_attachment_ids( $value ) {
    $ids = [];

    if ( is_array( $value ) ) {
        $ids = $value;
    } elseif ( is_string( $value ) && '' !== trim( $value ) ) {
        $ids = array_map( 'trim', explode( ',', $value ) );
    }

    $ids = array_map( 'absint', $ids );
    $ids = array_values( array_filter( array_unique( $ids ) ) );

    return $ids;
}

function ukiyo_portal_get_trip_data( $trip ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );

    if ( ! $trip_post instanceof WP_Post ) {
        return ukiyo_portal_get_trip_defaults();
    }

    $defaults        = ukiyo_portal_get_trip_defaults();
    $users_meta      = get_post_meta( $trip_post->ID, 'ukiyo_portal_users', true );
    $documents_meta  = get_post_meta( $trip_post->ID, 'ukiyo_portal_documents', true );
	    $flights_meta    = get_post_meta( $trip_post->ID, 'ukiyo_portal_flights', true );
	    $itinerary_meta  = get_post_meta( $trip_post->ID, 'ukiyo_portal_itinerary', true );
	    $recommendations = get_post_meta( $trip_post->ID, 'ukiyo_portal_recommendations', true );
	    $contacts_meta   = get_post_meta( $trip_post->ID, 'ukiyo_portal_contacts', true );
    $data            = [
        'subtitle'        => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_subtitle', true ),
        'travelers'       => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_travelers', true ),
        'destination'     => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_destination', true ),
        'dates'           => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_dates', true ),
        'status'          => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_status', true ),
        'access_type'     => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_access_type', true ),
        'reference'       => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_reference', true ),
        'welcome'         => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_welcome', true ),
        'country_story_title'    => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_country_story_title', true ),
        'country_story_subtitle' => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_country_story_subtitle', true ),
        'country_story'   => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_country_story', true ),
        'hero_image_id'   => absint( get_post_meta( $trip_post->ID, 'ukiyo_portal_hero_image_id', true ) ),
        'users'           => is_array( $users_meta ) ? array_values( array_filter( array_map( 'absint', $users_meta ) ) ) : [],
	        'flights'         => is_array( $flights_meta ) ? $flights_meta : [],
	        'documents'       => is_array( $documents_meta ) ? $documents_meta : [],
	        'route_map_points'=> (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_route_map_points', true ),
	        'itinerary'       => is_array( $itinerary_meta ) ? $itinerary_meta : [],
	        'recommendations' => is_array( $recommendations ) ? $recommendations : [],
        'contacts'        => is_array( $contacts_meta ) ? $contacts_meta : [],
        'proposal'        => [
            'token'                   => ukiyo_portal_get_proposal_token( $trip_post ),
            'price'                   => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_price', true ),
            'price_note'              => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_price_note', true ),
            'price_breakdown'         => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_price_breakdown', true ),
            'recipient_name'          => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_recipient_name', true ),
            'traveler_count_override' => absint( get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_traveler_count_override', true ) ),
            'valid_until'             => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_valid_until', true ),
            'includes'                => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_includes', true ),
            'excludes'                => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_excludes', true ),
            'cta_label'               => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_cta_label', true ),
            'cta_url'                 => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_cta_url', true ),
            'response_status'         => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_response_status', true ),
            'change_request_message'  => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_change_request_message', true ),
            'change_requested_at'     => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_change_requested_at', true ),
            'approved_at'             => (string) get_post_meta( $trip_post->ID, 'ukiyo_portal_proposal_approved_at', true ),
        ],
    ];

    $data = wp_parse_args( $data, $defaults );
    $data['contacts'] = wp_parse_args( $data['contacts'], ukiyo_portal_get_default_contacts() );
    $data['proposal'] = wp_parse_args( $data['proposal'], ukiyo_portal_get_proposal_defaults() );
    $data['flights']  = ukiyo_portal_normalize_flights( $data['flights'] );
    $access_types = ukiyo_portal_get_access_types();

    if ( ! isset( $access_types[ $data['access_type'] ] ) ) {
        $data['access_type'] = 'private';
    }

    foreach ( $data['documents'] as $index => $document ) {
        $data['documents'][ $index ] = wp_parse_args(
            (array) $document,
            [
                'name'        => '',
                'type'        => 'otros',
                'description' => '',
                'file_id'     => 0,
                'url'         => '',
                'order'       => 0,
            ]
        );
    }

    $data['itinerary'] = ukiyo_portal_normalize_itinerary_places( $data['itinerary'] );

    foreach ( $data['recommendations'] as $index => $item ) {
        $data['recommendations'][ $index ] = wp_parse_args(
            (array) $item,
            [
                'name'        => '',
                'category'    => '',
                'place'       => '',
                'rating'      => '',
                'description' => '',
                'note'        => '',
                'cta_label'   => '',
                'url'         => '',
                'address'     => '',
                'image_id'    => 0,
            ]
        );
    }

    usort(
        $data['documents'],
        static function ( $left, $right ) {
            return (int) $left['order'] <=> (int) $right['order'];
        }
    );

    return $data;
}

function ukiyo_portal_get_trip_hero_image_data( $trip ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );

    if ( ! $trip_post instanceof WP_Post ) {
        return [
            'url'    => '',
            'width'  => 0,
            'height' => 0,
            'type'   => '',
        ];
    }

    $data     = ukiyo_portal_get_trip_data( $trip_post );
    $image_id = absint( $data['hero_image_id'] );

    if ( $image_id ) {
        $image_src = wp_get_attachment_image_src( $image_id, 'full' );
        if ( $image_src ) {
            return [
                'url'    => (string) $image_src[0],
                'width'  => ! empty( $image_src[1] ) ? (int) $image_src[1] : 0,
                'height' => ! empty( $image_src[2] ) ? (int) $image_src[2] : 0,
                'type'   => (string) get_post_mime_type( $image_id ),
            ];
        }
    }

    if ( has_post_thumbnail( $trip_post ) ) {
        $thumbnail_id  = get_post_thumbnail_id( $trip_post );
        $thumbnail_src = $thumbnail_id ? wp_get_attachment_image_src( $thumbnail_id, 'full' ) : false;

        if ( $thumbnail_src ) {
            return [
                'url'    => (string) $thumbnail_src[0],
                'width'  => ! empty( $thumbnail_src[1] ) ? (int) $thumbnail_src[1] : 0,
                'height' => ! empty( $thumbnail_src[2] ) ? (int) $thumbnail_src[2] : 0,
                'type'   => $thumbnail_id ? (string) get_post_mime_type( $thumbnail_id ) : '',
            ];
        }
    }

    return [
        'url'    => get_template_directory_uri() . '/images/destination-mood/viajes-personalizados-ukiyo-portada.webp',
        'width'  => 0,
        'height' => 0,
        'type'   => 'image/jpeg',
    ];
}

function ukiyo_portal_get_trip_hero_image_url( $trip ) {
    $image = ukiyo_portal_get_trip_hero_image_data( $trip );

    return ! empty( $image['url'] ) ? (string) $image['url'] : '';
}

function ukiyo_portal_is_admin_user( $user_id = 0 ) {
    $user_id = $user_id ? absint( $user_id ) : get_current_user_id();

    return $user_id && user_can( $user_id, 'manage_options' );
}

function ukiyo_portal_is_client_user( $user ) {
    $user_object = $user instanceof WP_User ? $user : get_user_by( 'id', absint( $user ) );

    if ( ! $user_object instanceof WP_User ) {
        return false;
    }

    return (bool) get_user_meta( $user_object->ID, 'ukiyo_portal_client', true );
}

function ukiyo_portal_mark_user_as_client( $user_id ) {
    $user_id = absint( $user_id );

    if ( ! $user_id ) {
        return;
    }

    update_user_meta( $user_id, 'ukiyo_portal_client', 1 );
}

function ukiyo_portal_get_client_users( $args = [] ) {
    $defaults = [
        'orderby'    => 'display_name',
        'order'      => 'ASC',
        'meta_key'   => 'ukiyo_portal_client',
        'meta_value' => 1,
    ];

    return get_users( wp_parse_args( $args, $defaults ) );
}

function ukiyo_portal_generate_username_from_email( $email ) {
    $email       = sanitize_email( $email );
    $email_user  = $email ? current( explode( '@', $email ) ) : 'cliente';
    $base        = sanitize_user( $email_user, true );
    $base        = $base ? $base : 'cliente';
    $username    = $base;
    $suffix      = 1;

    while ( username_exists( $username ) ) {
        $username = $base . $suffix;
        $suffix++;
    }

    return $username;
}

function ukiyo_portal_get_post_statuses_for_frontend() {
    return [ 'publish', 'private' ];
}

function ukiyo_portal_user_can_access_trip( $user_id, $trip ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );
    $user_id   = absint( $user_id );

    if ( ! $trip_post instanceof WP_Post || ! $user_id ) {
        return false;
    }

    if ( ! ukiyo_portal_trip_matches_access_type( $trip_post, 'private' ) ) {
        return false;
    }

    $data = ukiyo_portal_get_trip_data( $trip_post );

    return in_array( $user_id, array_map( 'absint', $data['users'] ), true );
}

function ukiyo_portal_get_allowed_post_statuses_for_user( $user_id ) {
    return ukiyo_portal_get_post_statuses_for_frontend();
}

function ukiyo_portal_get_trip_by_slug( $slug ) {
    return ukiyo_portal_get_trip_by_slug_and_access( $slug, 'private' );
}

function ukiyo_portal_get_trip_by_slug_and_access( $slug, $access_type = 'private' ) {
    $slug      = sanitize_title( $slug );
    $trip_post = get_page_by_path( $slug, OBJECT, 'ukiyo_viaje' );

    if ( ! $trip_post instanceof WP_Post ) {
        return null;
    }

    if ( ! in_array( $trip_post->post_status, ukiyo_portal_get_post_statuses_for_frontend(), true ) ) {
        return null;
    }

    if ( ! ukiyo_portal_trip_matches_access_type( $trip_post, $access_type ) ) {
        return null;
    }

    return $trip_post;
}

function ukiyo_portal_get_user_trips( $user_id = 0 ) {
    $user_id = $user_id ? absint( $user_id ) : get_current_user_id();

    if ( ! $user_id ) {
        return [];
    }

    $args = [
        'post_type'      => 'ukiyo_viaje',
        'post_status'    => ukiyo_portal_get_allowed_post_statuses_for_user( $user_id ),
        'posts_per_page' => -1,
        'orderby'        => 'modified',
        'order'          => 'DESC',
        'meta_query'     => [
            [
                'key'     => 'ukiyo_portal_users',
                'value'   => 'i:' . $user_id . ';',
                'compare' => 'LIKE',
            ],
        ],
    ];

    $trips = get_posts( $args );

    if ( empty( $trips ) ) {
        return [];
    }

    return array_values(
        array_filter(
            $trips,
            static function ( $trip ) {
                return ukiyo_portal_trip_matches_access_type( $trip, 'private' );
            }
        )
    );
}

function ukiyo_portal_group_recommendations( $items, $itinerary = [] ) {
    $sections = [];
    $general  = [];

    foreach ( (array) $items as $item ) {
        $item      = (array) $item;
        $place_key = trim( (string) ( isset( $item['place'] ) ? $item['place'] : '' ) );
        $category  = trim( (string) ( isset( $item['category'] ) ? $item['category'] : '' ) );
        $category  = $category ?: 'Selecciones UKIYO';
        $item['category'] = $category;

        if ( '' === $place_key ) {
            if ( ! isset( $general[ $category ] ) ) {
                $general[ $category ] = [];
            }

            $general[ $category ][] = $item;
            continue;
        }

        if ( ! isset( $sections[ $place_key ] ) ) {
            $sections[ $place_key ] = [
                'place'      => $place_key,
                'title'      => $place_key,
                'is_general' => false,
                'groups'     => [],
            ];
        }

        if ( ! isset( $sections[ $place_key ]['groups'][ $category ] ) ) {
            $sections[ $place_key ]['groups'][ $category ] = [];
        }

        $sections[ $place_key ]['groups'][ $category ][] = $item;
    }

    $ordered_sections = [];

    if ( ! empty( $general ) ) {
        $ordered_sections[] = [
            'place'      => '',
            'title'      => 'Antes de viajar',
            'is_general' => true,
            'groups'     => $general,
        ];
    }

    $used_places = [];

    foreach ( (array) $itinerary as $place ) {
        $place_name = trim( (string) ( isset( $place['place'] ) ? $place['place'] : '' ) );

        if ( '' === $place_name || ! isset( $sections[ $place_name ] ) ) {
            continue;
        }

        $ordered_sections[]   = $sections[ $place_name ];
        $used_places[]        = $place_name;
    }

    foreach ( $sections as $place_name => $section ) {
        if ( in_array( $place_name, $used_places, true ) ) {
            continue;
        }

        $ordered_sections[] = $section;
    }

    return $ordered_sections;
}

function ukiyo_portal_get_route_map_points( $raw_points, $destination_hint = '' ) {
    $points           = [];
    $destination_hint = trim( (string) $destination_hint );
    $manual_points    = preg_split( '/\r\n|\r|\n/', (string) $raw_points );

    if ( ! is_array( $manual_points ) ) {
        return [];
    }

    foreach ( $manual_points as $manual_point ) {
        $manual_point = trim( (string) $manual_point );

        if ( '' === $manual_point ) {
            continue;
        }

        $parts   = array_map( 'trim', explode( '|', $manual_point ) );
        $label   = isset( $parts[0] ) ? sanitize_text_field( $parts[0] ) : '';
        $map_url = isset( $parts[1] ) ? esc_url_raw( $parts[1] ) : '';
        $lat     = isset( $parts[2] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $parts[2] ) ? (string) $parts[2] : '';
        $lng     = isset( $parts[3] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $parts[3] ) ? (string) $parts[3] : '';

        if ( '' === $label ) {
            continue;
        }

        $search_parts = [ $label ];

        if ( $destination_hint && false === stripos( $label, $destination_hint ) ) {
            $search_parts[] = $destination_hint;
        }

        $points[] = [
            'label'         => $label,
            'query'         => $label,
            'searchQuery'   => implode( ', ', array_filter( $search_parts ) ),
            'context'       => $destination_hint,
            'mapUrl'        => $map_url,
            'lat'           => $lat,
            'lng'           => $lng,
            'sequenceLabel' => 'Parada ' . number_format_i18n( count( $points ) + 1 ),
        ];
    }

    return $points;
}

function ukiyo_portal_get_route_points( $places, $destination_hint = '' ) {
    $points = [];
    $destination_hint = trim( (string) $destination_hint );

    foreach ( (array) $places as $place ) {
        $place = wp_parse_args( (array) $place, ukiyo_portal_get_itinerary_place_defaults() );
        $query   = trim( (string) $place['place'] );
        $map_url = isset( $place['map_url'] ) ? (string) $place['map_url'] : '';
        $lat     = isset( $place['map_lat'] ) ? (string) $place['map_lat'] : '';
        $lng     = isset( $place['map_lng'] ) ? (string) $place['map_lng'] : '';

        if ( ( '' === $map_url || '' === $lat || '' === $lng ) && ! empty( $place['map_points'] ) ) {
            $manual_points = preg_split( '/\r\n|\r|\n/', (string) $place['map_points'] );

            if ( is_array( $manual_points ) ) {
                foreach ( $manual_points as $manual_point ) {
                    $manual_point = trim( (string) $manual_point );

                    if ( '' === $manual_point ) {
                        continue;
                    }

                    $parts = array_map( 'trim', explode( '|', $manual_point ) );

                    if ( '' === $map_url && ! empty( $parts[1] ) ) {
                        $map_url = esc_url_raw( $parts[1] );
                    }

                    if ( '' === $lat && ! empty( $parts[2] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $parts[2] ) ) {
                        $lat = (string) $parts[2];
                    }

                    if ( '' === $lng && ! empty( $parts[3] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $parts[3] ) ) {
                        $lng = (string) $parts[3];
                    }

                    if ( '' !== $lat && '' !== $lng ) {
                        break;
                    }
                }
            }
        }

        if ( '' === $map_url || '' === $lat || '' === $lng ) {
            $place_day_points = ukiyo_portal_get_place_day_map_points( $place, $destination_hint );

            if ( ! empty( $place_day_points ) && is_array( $place_day_points ) ) {
                foreach ( $place_day_points as $place_day_point ) {
                    if ( ! is_array( $place_day_point ) ) {
                        continue;
                    }

                    if ( '' === $map_url && ! empty( $place_day_point['mapUrl'] ) ) {
                        $map_url = (string) $place_day_point['mapUrl'];
                    }

                    if ( '' === $lat && ! empty( $place_day_point['lat'] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $place_day_point['lat'] ) ) {
                        $lat = (string) $place_day_point['lat'];
                    }

                    if ( '' === $lng && ! empty( $place_day_point['lng'] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $place_day_point['lng'] ) ) {
                        $lng = (string) $place_day_point['lng'];
                    }

                    if ( '' === $query ) {
                        if ( ! empty( $place_day_point['query'] ) ) {
                            $query = trim( (string) $place_day_point['query'] );
                        } elseif ( ! empty( $place_day_point['label'] ) ) {
                            $query = trim( (string) $place_day_point['label'] );
                        }
                    }

                    if ( '' !== $lat && '' !== $lng && '' !== $query ) {
                        break;
                    }
                }
            }
        }

        if ( '' === $query ) {
            continue;
        }

        $search_query = $query;

        if ( $destination_hint && false === stripos( $query, $destination_hint ) ) {
            $search_query = $query . ', ' . $destination_hint;
        }

        $points[] = [
            'label'       => $query,
            'query'       => $query,
            'searchQuery' => $search_query,
            'context'     => $destination_hint,
            'mapUrl'      => $map_url,
            'lat'         => $lat,
            'lng'         => $lng,
        ];
    }

    return $points;
}

function ukiyo_portal_get_place_day_map_points( $place, $destination_hint = '' ) {
    $place            = wp_parse_args( (array) $place, ukiyo_portal_get_itinerary_place_defaults() );
    $place_name       = trim( (string) $place['place'] );
    $destination_hint = trim( (string) $destination_hint );
    $points           = [];
    $manual_points    = preg_split( '/\r\n|\r|\n/', (string) $place['map_points'] );

    if ( is_array( $manual_points ) ) {
        foreach ( $manual_points as $manual_index => $manual_point ) {
            $manual_point = trim( (string) $manual_point );

            if ( '' === $manual_point ) {
                continue;
            }

            $parts   = array_map( 'trim', explode( '|', $manual_point ) );
            $label   = isset( $parts[0] ) ? sanitize_text_field( $parts[0] ) : '';
            $map_url = isset( $parts[1] ) ? esc_url_raw( $parts[1] ) : '';
            $lat     = isset( $parts[2] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $parts[2] ) ? (string) $parts[2] : '';
            $lng     = isset( $parts[3] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $parts[3] ) ? (string) $parts[3] : '';

            if ( '' === $label ) {
                continue;
            }

            $search_parts = [ $label ];

            if ( $place_name && false === stripos( $label, $place_name ) ) {
                $search_parts[] = $place_name;
            }

            if ( $destination_hint && false === stripos( implode( ' ', $search_parts ), $destination_hint ) ) {
                $search_parts[] = $destination_hint;
            }

            $points[] = [
                'label'         => $label,
                'query'         => $label,
                'searchQuery'   => implode( ', ', array_filter( $search_parts ) ),
                'context'       => $place_name ?: $destination_hint,
                'mapUrl'        => $map_url,
                'lat'           => $lat,
                'lng'           => $lng,
                'sequenceLabel' => 'Punto ' . number_format_i18n( count( $points ) + 1 ),
            ];
        }
    }

    if ( ! empty( $points ) ) {
        return $points;
    }

    foreach ( (array) $place['days'] as $day ) {
        $day       = wp_parse_args( (array) $day, ukiyo_portal_get_itinerary_day_defaults() );
        $activities = ukiyo_portal_normalize_itinerary_activities( $day['activities'] );
        $day_title = trim( (string) $day['title'] );
        $day_label = 'Día ' . number_format_i18n( (int) $day['day_number'] );

        if ( ! empty( $activities ) ) {
            foreach ( $activities as $activity_index => $activity ) {
                $activity_title = trim( (string) $activity['title'] );
                $activity_location = trim( (string) $activity['location_name'] );
                $activity_address = trim( (string) $activity['location_address'] );
                $query = $activity_location ? $activity_location : ( $activity_address ? $activity_address : $place_name );

                if ( '' === $query ) {
                    continue;
                }

                $search_parts = [ $query ];

                if ( $place_name && false === stripos( implode( ' ', $search_parts ), $place_name ) ) {
                    $search_parts[] = $place_name;
                }

                if ( $destination_hint && false === stripos( implode( ' ', $search_parts ), $destination_hint ) ) {
                    $search_parts[] = $destination_hint;
                }

                $points[] = [
                    'label'         => $activity_title ? $activity_title : $query,
                    'query'         => $query,
                    'searchQuery'   => implode( ', ', array_filter( $search_parts ) ),
                    'context'       => $place_name ?: $destination_hint,
                    'mapUrl'        => isset( $activity['map_url'] ) ? (string) $activity['map_url'] : '',
                    'lat'           => isset( $activity['map_lat'] ) ? (string) $activity['map_lat'] : '',
                    'lng'           => isset( $activity['map_lng'] ) ? (string) $activity['map_lng'] : '',
                    'sequenceLabel' => $day_label,
                    'description'   => trim( (string) $activity['description'] ),
                    'meta'          => $activity_location ? $activity_location : $activity_address,
                ];
            }

            continue;
        }

        $day_location = trim( (string) $day['location_name'] );
        $day_address  = trim( (string) $day['location_address'] );
        $label        = $day_title ? $day_title : $day_label;
        $query        = $day_location ? $day_location : ( $day_address ? $day_address : $place_name );

        if ( '' === $query ) {
            continue;
        }

        $search_parts = [ $query ];

        if ( $place_name && false === stripos( $query, $place_name ) ) {
            $search_parts[] = $place_name;
        }

        if ( $destination_hint && false === stripos( implode( ' ', $search_parts ), $destination_hint ) ) {
            $search_parts[] = $destination_hint;
        }

        $points[] = [
            'label'         => $label,
            'query'         => $query,
            'searchQuery'   => implode( ', ', array_filter( $search_parts ) ),
            'context'       => $place_name ?: $destination_hint,
            'mapUrl'        => isset( $day['location_map_url'] ) ? (string) $day['location_map_url'] : '',
            'lat'           => isset( $day['location_lat'] ) ? (string) $day['location_lat'] : '',
            'lng'           => isset( $day['location_lng'] ) ? (string) $day['location_lng'] : '',
            'sequenceLabel' => $day_label,
            'description'   => trim( wp_strip_all_tags( (string) $day['description'] ) ),
            'meta'          => $day_location ? $day_location : $day_address,
        ];
    }

    return $points;
}

function ukiyo_portal_get_contact_link( $type, $value ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return '';
    }

    switch ( $type ) {
        case 'whatsapp':
            $normalized = preg_replace( '/\D+/', '', $value );
            return $normalized ? 'https://wa.me/' . $normalized : '';
        case 'email':
            return sanitize_email( $value ) ? 'mailto:' . sanitize_email( $value ) : '';
        case 'phone':
            $normalized = preg_replace( '/[^0-9+]/', '', $value );
            return $normalized ? 'tel:' . $normalized : '';
        default:
            return '';
    }
}

function ukiyo_portal_get_maps_link( $value ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return '';
    }

    if ( filter_var( $value, FILTER_VALIDATE_URL ) ) {
        return esc_url_raw( $value );
    }

    return 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $value );
}

function ukiyo_portal_get_mapbox_token() {
    $token = defined( 'UKIYO_MAPBOX_TOKEN' ) ? (string) UKIYO_MAPBOX_TOKEN : '';

    return (string) apply_filters( 'ukiyo_portal_mapbox_token', $token );
}

function ukiyo_portal_get_mapbox_style() {
    $style = defined( 'UKIYO_MAPBOX_STYLE' ) ? (string) UKIYO_MAPBOX_STYLE : 'mapbox://styles/mapbox/streets-v12';

    return (string) apply_filters( 'ukiyo_portal_mapbox_style', $style );
}

function ukiyo_portal_get_map_provider() {
    return ukiyo_portal_get_mapbox_token() ? 'mapbox' : 'leaflet';
}

function ukiyo_portal_get_login_redirect_url( $requested_redirect = '' ) {
    $requested_redirect = $requested_redirect ? esc_url_raw( $requested_redirect ) : '';
    $user_id            = get_current_user_id();

    if ( $requested_redirect ) {
        $path      = (string) wp_parse_url( $requested_redirect, PHP_URL_PATH );
        $trip_slug = '';

        if ( preg_match( '#/portal-del-aventurero/viaje/([^/]+)/?$#', $path, $matches ) ) {
            $trip_slug = sanitize_title( $matches[1] );
        } elseif ( preg_match( '#/portal-del-aventurero/documento/([^/]+)/[0-9]+/?$#', $path, $matches ) ) {
            $trip_slug = sanitize_title( $matches[1] );
        }

        $trip = $trip_slug ? ukiyo_portal_get_trip_by_slug( $trip_slug ) : null;

        if ( $trip instanceof WP_Post && ukiyo_portal_user_can_access_trip( $user_id, $trip ) ) {
            return ukiyo_portal_get_trip_url( $trip );
        }
    }

    $trips = ukiyo_portal_get_user_trips( $user_id );

    if ( ! empty( $trips ) ) {
        return ukiyo_portal_get_trip_url( $trips[0] );
    }

    return ukiyo_portal_get_dashboard_url();
}
