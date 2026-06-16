<?php
/**
 * Builders for the UKIYO WP-CLI creator.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_creator_sanitize_text_list( $value ) {
    if ( is_string( $value ) ) {
        return sanitize_textarea_field( $value );
    }

    if ( ! is_array( $value ) ) {
        return '';
    }

    $lines = array_map(
        static function ( $line ) {
            return sanitize_text_field( (string) $line );
        },
        $value
    );

    return implode( "\n", array_values( array_filter( $lines, 'strlen' ) ) );
}

function ukiyo_creator_build_post_plan( $payload ) {
    $required = ukiyo_creator_require_fields( $payload, [ 'title', 'slug', 'keyword' ] );
    if ( is_wp_error( $required ) ) {
        return $required;
    }

    if ( empty( $payload['content'] ) && empty( $payload['content_brief'] ) ) {
        return new WP_Error( 'missing_content', 'Para post debes indicar content o content_brief.' );
    }

    $status = ukiyo_creator_validate_post_status( $payload );
    if ( is_wp_error( $status ) ) {
        return $status;
    }

    $slug = ukiyo_creator_validate_slug_available( $payload['slug'] );
    if ( is_wp_error( $slug ) ) {
        return $slug;
    }

    $category_value = isset( $payload['category'] ) ? $payload['category'] : ( isset( $payload['destination'] ) ? $payload['destination'] : '' );
    $category       = ukiyo_creator_resolve_category( $category_value );
    if ( is_wp_error( $category ) ) {
        return $category;
    }

    $content = isset( $payload['content'] ) && '' !== trim( (string) $payload['content'] )
        ? (string) $payload['content']
        : '<p>' . esc_html( (string) $payload['content_brief'] ) . '</p>';

    $h1_validation = ukiyo_creator_validate_no_h1( $content );
    if ( is_wp_error( $h1_validation ) ) {
        return $h1_validation;
    }

    $featured_image_id = isset( $payload['featured_image_id'] ) ? ukiyo_creator_validate_attachment_id( $payload['featured_image_id'], 'featured_image_id' ) : 0;
    if ( is_wp_error( $featured_image_id ) ) {
        return $featured_image_id;
    }

    $rank_math = isset( $payload['rank_math'] ) && is_array( $payload['rank_math'] ) ? $payload['rank_math'] : [];

    return [
        'type'          => 'post',
        'post_type'     => 'post',
        'post_status'   => $status,
        'title'         => sanitize_text_field( (string) $payload['title'] ),
        'slug'          => $slug,
        'content'       => wp_kses_post( $content ),
        'category'      => [
            'id'   => (int) $category->term_id,
            'name' => $category->name,
            'slug' => $category->slug,
        ],
        'featured_image_id' => $featured_image_id,
        'rank_math'     => [
            'enabled'        => ! empty( $rank_math['enabled'] ),
            'title'          => isset( $rank_math['title'] ) ? sanitize_text_field( (string) $rank_math['title'] ) : '',
            'description'    => isset( $rank_math['description'] ) ? sanitize_text_field( (string) $rank_math['description'] ) : '',
            'focus_keyword'  => isset( $rank_math['focus_keyword'] ) ? sanitize_text_field( (string) $rank_math['focus_keyword'] ) : '',
        ],
        'extra'         => [
            'keyword'        => sanitize_text_field( (string) $payload['keyword'] ),
            'landing_url'    => isset( $payload['landing_url'] ) ? esc_url_raw( (string) $payload['landing_url'] ) : '',
            'landing_anchor' => isset( $payload['landing_anchor'] ) ? sanitize_text_field( (string) $payload['landing_anchor'] ) : '',
        ],
    ];
}

function ukiyo_creator_create_post_from_plan( $plan ) {
    $post_id = wp_insert_post(
        [
            'post_type'     => 'post',
            'post_status'   => 'draft',
            'post_title'    => $plan['title'],
            'post_name'     => $plan['slug'],
            'post_content'  => $plan['content'],
            'post_category' => [ (int) $plan['category']['id'] ],
        ],
        true
    );

    if ( is_wp_error( $post_id ) ) {
        return $post_id;
    }

    if ( ! empty( $plan['featured_image_id'] ) ) {
        set_post_thumbnail( $post_id, (int) $plan['featured_image_id'] );
    }

    if ( ! empty( $plan['rank_math']['enabled'] ) ) {
        update_post_meta( $post_id, 'rank_math_title', $plan['rank_math']['title'] );
        update_post_meta( $post_id, 'rank_math_description', $plan['rank_math']['description'] );
        update_post_meta( $post_id, 'rank_math_focus_keyword', $plan['rank_math']['focus_keyword'] );
    }

    return $post_id;
}

function ukiyo_creator_build_viaje_autor_plan( $payload ) {
    $required = ukiyo_creator_require_fields( $payload, [ 'title', 'slug', 'destination' ] );
    if ( is_wp_error( $required ) ) {
        return $required;
    }

    foreach ( [ 'hero.subtitle', 'duration', 'group', 'price' ] as $field ) {
        $value = ukiyo_creator_get_nested_value( $payload, $field );
        if ( null === $value || '' === trim( (string) $value ) ) {
            return new WP_Error( 'missing_required_field', 'Falta el campo obligatorio: ' . $field );
        }
    }

    if ( empty( $payload['itinerary_days'] ) || ! is_array( $payload['itinerary_days'] ) ) {
        return new WP_Error( 'missing_itinerary_days', 'viaje_autor necesita itinerary_days como array.' );
    }

    $status = ukiyo_creator_validate_post_status( $payload );
    if ( is_wp_error( $status ) ) {
        return $status;
    }

    $slug = ukiyo_creator_validate_slug_available( $payload['slug'] );
    if ( is_wp_error( $slug ) ) {
        return $slug;
    }

    $featured_image_id = isset( $payload['featured_image_id'] ) ? ukiyo_creator_validate_attachment_id( $payload['featured_image_id'], 'featured_image_id' ) : 0;
    if ( is_wp_error( $featured_image_id ) ) {
        return $featured_image_id;
    }

    $hero       = isset( $payload['hero'] ) && is_array( $payload['hero'] ) ? $payload['hero'] : [];
    $expert     = isset( $payload['expert'] ) && is_array( $payload['expert'] ) ? $payload['expert'] : [];
    $commercial = isset( $payload['commercial'] ) && is_array( $payload['commercial'] ) ? $payload['commercial'] : [];
    $rank_math  = isset( $payload['rank_math'] ) && is_array( $payload['rank_math'] ) ? $payload['rank_math'] : [];
    $faqs       = isset( $payload['faq_items'] ) && is_array( $payload['faq_items'] ) ? $payload['faq_items'] : [];

    return [
        'type'          => 'viaje_autor',
        'post_type'     => 'viaje_autor',
        'post_status'   => $status,
        'title'         => sanitize_text_field( (string) $payload['title'] ),
        'slug'          => $slug,
        'featured_image_id' => $featured_image_id,
        'meta'          => [
            'hero_image'       => isset( $hero['image'] ) ? esc_url_raw( (string) $hero['image'] ) : ( isset( $payload['hero_image'] ) ? esc_url_raw( (string) $payload['hero_image'] ) : '' ),
            'hero_subtitle'    => sanitize_text_field( (string) $hero['subtitle'] ),
            'hero_tags'        => isset( $hero['tags'] ) ? sanitize_text_field( (string) $hero['tags'] ) : '',
            'expert_name'      => isset( $expert['name'] ) ? sanitize_text_field( (string) $expert['name'] ) : '',
            'expert_title'     => isset( $expert['title'] ) ? sanitize_text_field( (string) $expert['title'] ) : '',
            'expert_image'     => isset( $expert['image'] ) ? esc_url_raw( (string) $expert['image'] ) : '',
            'expert_specialty' => isset( $expert['specialty'] ) ? sanitize_text_field( (string) $expert['specialty'] ) : '',
            'expert_focus'     => isset( $expert['focus'] ) ? sanitize_text_field( (string) $expert['focus'] ) : '',
            'expert_quote'     => isset( $expert['quote'] ) ? sanitize_textarea_field( (string) $expert['quote'] ) : '',
            'duracion_viaje'   => isset( $commercial['duracion_viaje'] ) ? sanitize_text_field( (string) $commercial['duracion_viaje'] ) : sanitize_text_field( (string) $payload['duration'] ),
            'grupos_viaje'     => isset( $commercial['grupos_viaje'] ) ? sanitize_text_field( (string) $commercial['grupos_viaje'] ) : sanitize_text_field( (string) $payload['group'] ),
            'precio_final'     => isset( $commercial['precio_final'] ) ? sanitize_text_field( (string) $commercial['precio_final'] ) : sanitize_text_field( (string) $payload['price'] ),
            'trip_includes'    => isset( $commercial['trip_includes'] ) ? ukiyo_creator_sanitize_text_list( $commercial['trip_includes'] ) : '',
            'trip_excludes'    => isset( $commercial['trip_excludes'] ) ? ukiyo_creator_sanitize_text_list( $commercial['trip_excludes'] ) : '',
            'itinerary_days'   => wp_json_encode( array_values( $payload['itinerary_days'] ), JSON_UNESCAPED_UNICODE ),
            'faq_items'        => wp_json_encode( array_values( $faqs ), JSON_UNESCAPED_UNICODE ),
        ],
        'rank_math'     => [
            'enabled'          => ! empty( $rank_math['enabled'] ),
            'focus_keyword'    => isset( $rank_math['focus_keyword'] ) ? sanitize_text_field( (string) $rank_math['focus_keyword'] ) : '',
            'title'            => isset( $rank_math['title'] ) ? sanitize_text_field( (string) $rank_math['title'] ) : '',
            'description'      => isset( $rank_math['description'] ) ? sanitize_text_field( (string) $rank_math['description'] ) : '',
            'breadcrumb_title' => isset( $rank_math['breadcrumb_title'] ) ? sanitize_text_field( (string) $rank_math['breadcrumb_title'] ) : '',
        ],
        'extra'         => [
            'destination' => sanitize_text_field( (string) $payload['destination'] ),
            'itinerary'   => count( $payload['itinerary_days'] ),
            'faqs'        => count( $faqs ),
        ],
    ];
}

function ukiyo_creator_create_viaje_autor_from_plan( $plan ) {
    $post_id = wp_insert_post(
        [
            'post_type'    => 'viaje_autor',
            'post_status'  => 'draft',
            'post_title'   => $plan['title'],
            'post_name'    => $plan['slug'],
            'post_content' => '',
        ],
        true
    );

    if ( is_wp_error( $post_id ) ) {
        return $post_id;
    }

    if ( ! empty( $plan['featured_image_id'] ) ) {
        set_post_thumbnail( $post_id, (int) $plan['featured_image_id'] );
    }

    foreach ( $plan['meta'] as $key => $value ) {
        update_post_meta( $post_id, $key, $value );
    }

    if ( ! empty( $plan['rank_math']['enabled'] ) ) {
        update_post_meta( $post_id, 'rank_math_focus_keyword', $plan['rank_math']['focus_keyword'] );
        update_post_meta( $post_id, 'rank_math_title', $plan['rank_math']['title'] );
        update_post_meta( $post_id, 'rank_math_description', $plan['rank_math']['description'] );
        update_post_meta( $post_id, 'rank_math_breadcrumb_title', $plan['rank_math']['breadcrumb_title'] );
    }

    if ( function_exists( 'ukiyo_sync_viaje_autor_seo_content' ) ) {
        ukiyo_sync_viaje_autor_seo_content( $post_id );
    }

    return $post_id;
}

function ukiyo_creator_build_portal_plan( $payload ) {
    $required = ukiyo_creator_require_fields( $payload, [ 'title', 'slug', 'destination', 'dates', 'status', 'access_type' ] );
    if ( is_wp_error( $required ) ) {
        return $required;
    }

    if ( empty( $payload['travelers'] ) ) {
        return new WP_Error( 'missing_travelers', 'Portal necesita travelers.' );
    }

    if ( empty( $payload['users'] ) || ! is_array( $payload['users'] ) ) {
        return new WP_Error( 'missing_users', 'Portal necesita users como array.' );
    }

    if ( empty( $payload['itinerary'] ) || ! is_array( $payload['itinerary'] ) ) {
        return new WP_Error( 'missing_itinerary', 'Portal necesita itinerary como array.' );
    }

    $status = ukiyo_creator_validate_post_status( $payload );
    if ( is_wp_error( $status ) ) {
        return $status;
    }

    $slug = ukiyo_creator_validate_slug_available( $payload['slug'] );
    if ( is_wp_error( $slug ) ) {
        return $slug;
    }

    $portal_status = ukiyo_creator_normalize_portal_status( $payload['status'] );
    if ( is_wp_error( $portal_status ) ) {
        return $portal_status;
    }

    $access_type = ukiyo_creator_normalize_portal_access_type( $payload['access_type'] );
    if ( is_wp_error( $access_type ) ) {
        return $access_type;
    }

    $proposal_validation = ukiyo_creator_validate_portal_proposal( $payload, $access_type );
    if ( is_wp_error( $proposal_validation ) ) {
        return $proposal_validation;
    }

    $users = ukiyo_creator_resolve_users( $payload['users'] );
    if ( is_wp_error( $users ) ) {
        return $users;
    }

    foreach ( [ 'hero_image_id', 'featured_image_id' ] as $image_field ) {
        if ( isset( $payload[ $image_field ] ) ) {
            $valid_image = ukiyo_creator_validate_attachment_id( $payload[ $image_field ], $image_field );
            if ( is_wp_error( $valid_image ) ) {
                return $valid_image;
            }
        }
    }

    $proposal = isset( $payload['proposal'] ) && is_array( $payload['proposal'] ) ? $payload['proposal'] : [];
    $contacts = isset( $payload['contacts'] ) && is_array( $payload['contacts'] ) ? $payload['contacts'] : [];
    $flights  = isset( $payload['flights'] ) && is_array( $payload['flights'] ) ? $payload['flights'] : [];
    $story    = isset( $payload['country_story'] ) && is_array( $payload['country_story'] ) ? $payload['country_story'] : [];

    $normalized_itinerary = function_exists( 'ukiyo_portal_normalize_itinerary_places' )
        ? ukiyo_portal_normalize_itinerary_places( $payload['itinerary'] )
        : $payload['itinerary'];

    $normalized_flights = function_exists( 'ukiyo_portal_normalize_flights' )
        ? ukiyo_portal_normalize_flights( $flights )
        : $flights;

    $normalized_contacts = function_exists( 'ukiyo_portal_get_default_contacts' )
        ? wp_parse_args( $contacts, ukiyo_portal_get_default_contacts() )
        : $contacts;

    return [
        'type'          => 'portal',
        'post_type'     => 'ukiyo_viaje',
        'post_status'   => $status,
        'title'         => sanitize_text_field( (string) $payload['title'] ),
        'slug'          => $slug,
        'featured_image_id' => isset( $payload['featured_image_id'] ) ? absint( $payload['featured_image_id'] ) : 0,
        'meta'          => [
            'ukiyo_portal_subtitle'               => isset( $payload['subtitle'] ) ? sanitize_text_field( (string) $payload['subtitle'] ) : '',
            'ukiyo_portal_travelers'              => ukiyo_creator_sanitize_text_list( $payload['travelers'] ),
            'ukiyo_portal_destination'            => sanitize_text_field( (string) $payload['destination'] ),
            'ukiyo_portal_dates'                  => sanitize_text_field( (string) $payload['dates'] ),
            'ukiyo_portal_status'                 => $portal_status,
            'ukiyo_portal_access_type'            => $access_type,
            'ukiyo_portal_reference'              => isset( $payload['reference'] ) ? sanitize_text_field( (string) $payload['reference'] ) : '',
            'ukiyo_portal_welcome'                => isset( $payload['welcome'] ) ? sanitize_textarea_field( (string) $payload['welcome'] ) : '',
            'ukiyo_portal_hero_image_id'          => isset( $payload['hero_image_id'] ) ? absint( $payload['hero_image_id'] ) : 0,
            'ukiyo_portal_users'                  => $users,
            'ukiyo_portal_country_story_title'    => isset( $story['title'] ) ? sanitize_text_field( (string) $story['title'] ) : '',
            'ukiyo_portal_country_story_subtitle' => isset( $story['subtitle'] ) ? sanitize_text_field( (string) $story['subtitle'] ) : '',
            'ukiyo_portal_country_story'          => isset( $story['content'] ) ? wp_kses_post( (string) $story['content'] ) : '',
            'ukiyo_portal_documents'              => isset( $payload['documents'] ) && is_array( $payload['documents'] ) ? $payload['documents'] : [],
            'ukiyo_portal_flights'                => $normalized_flights,
            'ukiyo_portal_itinerary'              => $normalized_itinerary,
            'ukiyo_portal_recommendations'        => isset( $payload['recommendations'] ) && is_array( $payload['recommendations'] ) ? $payload['recommendations'] : [],
            'ukiyo_portal_contacts'               => $normalized_contacts,
            'ukiyo_portal_proposal_price'         => isset( $proposal['price'] ) ? sanitize_text_field( (string) $proposal['price'] ) : '',
            'ukiyo_portal_proposal_price_note'    => isset( $proposal['price_note'] ) ? sanitize_text_field( (string) $proposal['price_note'] ) : '',
            'ukiyo_portal_proposal_price_breakdown' => isset( $proposal['price_breakdown'] ) ? ukiyo_creator_sanitize_text_list( $proposal['price_breakdown'] ) : '',
            'ukiyo_portal_proposal_recipient_name'=> isset( $proposal['recipient_name'] ) ? sanitize_text_field( (string) $proposal['recipient_name'] ) : '',
            'ukiyo_portal_proposal_traveler_count_override' => isset( $proposal['traveler_count_override'] ) ? absint( $proposal['traveler_count_override'] ) : 0,
            'ukiyo_portal_proposal_valid_until'   => isset( $proposal['valid_until'] ) ? sanitize_text_field( (string) $proposal['valid_until'] ) : '',
            'ukiyo_portal_proposal_includes'      => isset( $proposal['includes'] ) ? ukiyo_creator_sanitize_text_list( $proposal['includes'] ) : '',
            'ukiyo_portal_proposal_excludes'      => isset( $proposal['excludes'] ) ? ukiyo_creator_sanitize_text_list( $proposal['excludes'] ) : '',
            'ukiyo_portal_proposal_cta_label'     => isset( $proposal['cta_label'] ) ? sanitize_text_field( (string) $proposal['cta_label'] ) : 'Quiero este viaje',
            'ukiyo_portal_proposal_cta_url'       => isset( $proposal['cta_url'] ) ? esc_url_raw( (string) $proposal['cta_url'] ) : '',
            'ukiyo_portal_proposal_token'         => isset( $proposal['token'] ) ? sanitize_text_field( (string) $proposal['token'] ) : '',
        ],
        'extra'         => [
            'status_raw'      => sanitize_key( (string) $payload['status'] ),
            'status'          => $portal_status,
            'access_type_raw' => sanitize_key( (string) $payload['access_type'] ),
            'access_type'     => $access_type,
            'users'           => $users,
            'itinerary'       => count( $normalized_itinerary ),
        ],
    ];
}

function ukiyo_creator_create_portal_from_plan( $plan ) {
    $post_id = wp_insert_post(
        [
            'post_type'   => 'ukiyo_viaje',
            'post_status' => 'draft',
            'post_title'  => $plan['title'],
            'post_name'   => $plan['slug'],
        ],
        true
    );

    if ( is_wp_error( $post_id ) ) {
        return $post_id;
    }

    if ( ! empty( $plan['featured_image_id'] ) ) {
        set_post_thumbnail( $post_id, (int) $plan['featured_image_id'] );
    }

    foreach ( $plan['meta'] as $key => $value ) {
        if ( 'ukiyo_portal_proposal_token' === $key && '' === (string) $value ) {
            continue;
        }
        update_post_meta( $post_id, $key, $value );
    }

    if ( 'proposal' === $plan['extra']['access_type'] && function_exists( 'ukiyo_portal_ensure_proposal_token' ) ) {
        ukiyo_portal_ensure_proposal_token( $post_id, false );
    }

    return $post_id;
}

function ukiyo_creator_build_plan( $type, $payload ) {
    if ( 'post' === $type ) {
        return ukiyo_creator_build_post_plan( $payload );
    }

    if ( 'viaje_autor' === $type ) {
        return ukiyo_creator_build_viaje_autor_plan( $payload );
    }

    if ( 'portal' === $type ) {
        return ukiyo_creator_build_portal_plan( $payload );
    }

    return new WP_Error( 'invalid_type', 'Tipo no soportado: ' . $type );
}

function ukiyo_creator_create_from_plan( $plan ) {
    if ( 'post' === $plan['type'] ) {
        return ukiyo_creator_create_post_from_plan( $plan );
    }

    if ( 'viaje_autor' === $plan['type'] ) {
        return ukiyo_creator_create_viaje_autor_from_plan( $plan );
    }

    if ( 'portal' === $plan['type'] ) {
        return ukiyo_creator_create_portal_from_plan( $plan );
    }

    return new WP_Error( 'invalid_plan_type', 'Tipo de plan no soportado.' );
}

