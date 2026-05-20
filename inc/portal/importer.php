<?php
/**
 * Importador de viajes para el Portal del Aventurero.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_portal_register_importer_submenu() {
    add_submenu_page(
        'edit.php?post_type=ukiyo_viaje',
        'Importar viajes',
        'Importar',
        'edit_posts',
        'ukiyo-portal-importar',
        'ukiyo_portal_render_importer_page'
    );
}
add_action( 'admin_menu', 'ukiyo_portal_register_importer_submenu' );

function ukiyo_portal_get_importer_page_url( $args = [] ) {
    return add_query_arg( $args, admin_url( 'edit.php?post_type=ukiyo_viaje&page=ukiyo-portal-importar' ) );
}

function ukiyo_portal_get_importer_notice_key() {
    return 'ukiyo_portal_import_notice_' . get_current_user_id();
}

function ukiyo_portal_store_importer_notice( $notice ) {
    set_transient( ukiyo_portal_get_importer_notice_key(), (array) $notice, 5 * MINUTE_IN_SECONDS );
}

function ukiyo_portal_consume_importer_notice() {
    $key    = ukiyo_portal_get_importer_notice_key();
    $notice = get_transient( $key );

    if ( false !== $notice ) {
        delete_transient( $key );
    }

    return is_array( $notice ) ? $notice : [];
}

function ukiyo_portal_get_importer_draft_key() {
    return 'ukiyo_portal_import_draft_' . get_current_user_id();
}

function ukiyo_portal_store_importer_draft( $json ) {
    set_transient( ukiyo_portal_get_importer_draft_key(), (string) $json, 10 * MINUTE_IN_SECONDS );
}

function ukiyo_portal_consume_importer_draft() {
    $key   = ukiyo_portal_get_importer_draft_key();
    $draft = get_transient( $key );

    if ( false !== $draft ) {
        delete_transient( $key );
    }

    return is_string( $draft ) ? $draft : '';
}

function ukiyo_portal_importer_multiline_value( $value ) {
    if ( is_array( $value ) ) {
        $lines = array_map(
            static function ( $line ) {
                return trim( (string) $line );
            },
            $value
        );

        $lines = array_values( array_filter( $lines, 'strlen' ) );

        return implode( "\n", $lines );
    }

    return trim( (string) $value );
}

function ukiyo_portal_importer_travelers_value( $value ) {
    if ( is_array( $value ) ) {
        $travelers = array_map(
            static function ( $traveler ) {
                return trim( sanitize_text_field( (string) $traveler ) );
            },
            $value
        );

        $travelers = array_values( array_filter( $travelers, 'strlen' ) );

        return implode( "\n", $travelers );
    }

    return trim( (string) $value );
}

function ukiyo_portal_importer_price_breakdown_value( $value ) {
    if ( is_string( $value ) ) {
        return trim( $value );
    }

    if ( ! is_array( $value ) ) {
        return '';
    }

    $lines = [];

    foreach ( $value as $item ) {
        if ( is_string( $item ) ) {
            $item = trim( $item );

            if ( '' !== $item ) {
                $lines[] = $item;
            }

            continue;
        }

        if ( ! is_array( $item ) ) {
            continue;
        }

        $label  = isset( $item['label'] ) ? trim( (string) $item['label'] ) : '';
        $amount = isset( $item['amount'] ) ? trim( (string) $item['amount'] ) : '';
        $note   = isset( $item['note'] ) ? trim( (string) $item['note'] ) : '';

        if ( '' === $label && '' === $amount && '' === $note ) {
            continue;
        }

        $lines[] = implode( ' | ', [ $label, $amount, $note ] );
    }

    return implode( "\n", $lines );
}

function ukiyo_portal_importer_map_points_value( $value ) {
    if ( is_string( $value ) ) {
        return trim( $value );
    }

    if ( ! is_array( $value ) ) {
        return '';
    }

    $lines = [];

    foreach ( $value as $item ) {
        if ( is_string( $item ) ) {
            $item = trim( $item );

            if ( '' !== $item ) {
                $lines[] = $item;
            }

            continue;
        }

        if ( ! is_array( $item ) ) {
            continue;
        }

        $label = isset( $item['label'] ) ? trim( (string) $item['label'] ) : '';
        $url   = isset( $item['url'] ) ? trim( (string) $item['url'] ) : '';
        $lat   = isset( $item['lat'] ) ? trim( (string) $item['lat'] ) : '';
        $lng   = isset( $item['lng'] ) ? trim( (string) $item['lng'] ) : '';

        if ( '' === $label && '' === $url && '' === $lat && '' === $lng ) {
            continue;
        }

        $lines[] = implode(
            ' | ',
            array_filter(
                [ $label, $url, $lat, $lng ],
                static function ( $part ) {
                    return '' !== trim( (string) $part );
                }
            )
        );
    }

    return implode( "\n", $lines );
}

function ukiyo_portal_importer_normalize_documents( $documents ) {
    $normalized = [];

    foreach ( (array) $documents as $document ) {
        if ( ! is_array( $document ) ) {
            continue;
        }

        $normalized[] = [
            'name'        => isset( $document['name'] ) ? (string) $document['name'] : '',
            'type'        => isset( $document['type'] ) ? (string) $document['type'] : '',
            'description' => isset( $document['description'] ) ? (string) $document['description'] : '',
            'file_id'     => isset( $document['file_id'] ) ? absint( $document['file_id'] ) : 0,
            'url'         => isset( $document['url'] ) ? (string) $document['url'] : '',
            'order'       => isset( $document['order'] ) ? (int) $document['order'] : count( $normalized ),
        ];
    }

    return ukiyo_portal_sanitize_documents( $normalized );
}

function ukiyo_portal_importer_normalize_recommendations( $items ) {
    $normalized = [];

    foreach ( (array) $items as $item ) {
        if ( ! is_array( $item ) ) {
            continue;
        }

        $normalized[] = [
            'name'        => isset( $item['name'] ) ? (string) $item['name'] : '',
            'category'    => isset( $item['category'] ) ? (string) $item['category'] : '',
            'place'       => isset( $item['place'] ) ? (string) $item['place'] : '',
            'rating'      => isset( $item['rating'] ) ? (string) $item['rating'] : '',
            'description' => isset( $item['description'] ) ? (string) $item['description'] : '',
            'note'        => isset( $item['note'] ) ? (string) $item['note'] : '',
            'cta_label'   => isset( $item['cta_label'] ) ? (string) $item['cta_label'] : '',
            'url'         => isset( $item['url'] ) ? (string) $item['url'] : '',
            'address'     => isset( $item['address'] ) ? (string) $item['address'] : '',
            'image_id'    => isset( $item['image_id'] ) ? absint( $item['image_id'] ) : 0,
        ];
    }

    return ukiyo_portal_sanitize_recommendations( $normalized );
}

function ukiyo_portal_importer_normalize_contacts( $contacts ) {
    $contacts = is_array( $contacts ) ? $contacts : [];

    return ukiyo_portal_sanitize_contacts(
        [
            'whatsapp'    => isset( $contacts['whatsapp'] ) ? (string) $contacts['whatsapp'] : '',
            'email'       => isset( $contacts['email'] ) ? (string) $contacts['email'] : '',
            'phone'       => isset( $contacts['phone'] ) ? (string) $contacts['phone'] : '',
            'local'       => isset( $contacts['local'] ) ? ukiyo_portal_importer_multiline_value( $contacts['local'] ) : '',
            'emergencies' => isset( $contacts['emergencies'] ) ? ukiyo_portal_importer_multiline_value( $contacts['emergencies'] ) : '',
            'support'     => isset( $contacts['support'] ) ? ukiyo_portal_importer_multiline_value( $contacts['support'] ) : '',
        ]
    );
}

function ukiyo_portal_importer_normalize_flights( $flights ) {
    $flights = is_array( $flights ) ? $flights : [];

    return ukiyo_portal_sanitize_flights(
        [
            'airline'                     => isset( $flights['airline'] ) ? (string) $flights['airline'] : '',
            'airline_custom'              => isset( $flights['airline_custom'] ) ? (string) $flights['airline_custom'] : '',
            'outbound_departure_airport'  => isset( $flights['outbound_departure_airport'] ) ? (string) $flights['outbound_departure_airport'] : '',
            'outbound_arrival_airport'    => isset( $flights['outbound_arrival_airport'] ) ? (string) $flights['outbound_arrival_airport'] : '',
            'outbound_departure_time'     => isset( $flights['outbound_departure_time'] ) ? (string) $flights['outbound_departure_time'] : '',
            'outbound_arrival_time'       => isset( $flights['outbound_arrival_time'] ) ? (string) $flights['outbound_arrival_time'] : '',
            'outbound_departure_timezone' => isset( $flights['outbound_departure_timezone'] ) ? (string) $flights['outbound_departure_timezone'] : '',
            'outbound_arrival_timezone'   => isset( $flights['outbound_arrival_timezone'] ) ? (string) $flights['outbound_arrival_timezone'] : '',
            'outbound_flight_number'      => isset( $flights['outbound_flight_number'] ) ? (string) $flights['outbound_flight_number'] : '',
            'return_departure_airport'    => isset( $flights['return_departure_airport'] ) ? (string) $flights['return_departure_airport'] : '',
            'return_arrival_airport'      => isset( $flights['return_arrival_airport'] ) ? (string) $flights['return_arrival_airport'] : '',
            'return_departure_time'       => isset( $flights['return_departure_time'] ) ? (string) $flights['return_departure_time'] : '',
            'return_arrival_time'         => isset( $flights['return_arrival_time'] ) ? (string) $flights['return_arrival_time'] : '',
            'return_departure_timezone'   => isset( $flights['return_departure_timezone'] ) ? (string) $flights['return_departure_timezone'] : '',
            'return_arrival_timezone'     => isset( $flights['return_arrival_timezone'] ) ? (string) $flights['return_arrival_timezone'] : '',
            'return_flight_number'        => isset( $flights['return_flight_number'] ) ? (string) $flights['return_flight_number'] : '',
        ]
    );
}

function ukiyo_portal_importer_normalize_itinerary( $itinerary ) {
    $normalized = [];

    foreach ( (array) $itinerary as $place ) {
        if ( ! is_array( $place ) ) {
            continue;
        }

        $days = [];

        foreach ( (array) ( isset( $place['days'] ) ? $place['days'] : [] ) as $day_index => $day ) {
            if ( ! is_array( $day ) ) {
                continue;
            }

            $activities = [];

            foreach ( (array) ( isset( $day['activities'] ) ? $day['activities'] : [] ) as $activity ) {
                if ( ! is_array( $activity ) ) {
                    continue;
                }

                $activities[] = [
                    'title'            => isset( $activity['title'] ) ? (string) $activity['title'] : '',
                    'description'      => isset( $activity['description'] ) ? (string) $activity['description'] : '',
                    'modal_content'    => isset( $activity['modal_content'] ) ? (string) $activity['modal_content'] : '',
                    'visiting_hours'   => isset( $activity['visiting_hours'] ) ? (string) $activity['visiting_hours'] : '',
                    'entry_price'      => isset( $activity['entry_price'] ) ? (string) $activity['entry_price'] : '',
                    'location_name'    => isset( $activity['location_name'] ) ? (string) $activity['location_name'] : '',
                    'location_address' => isset( $activity['location_address'] ) ? (string) $activity['location_address'] : '',
                    'map_url'          => isset( $activity['map_url'] ) ? (string) $activity['map_url'] : '',
                    'map_lat'          => isset( $activity['map_lat'] ) ? (string) $activity['map_lat'] : '',
                    'map_lng'          => isset( $activity['map_lng'] ) ? (string) $activity['map_lng'] : '',
                    'image_ids'        => isset( $activity['image_ids'] ) ? (array) $activity['image_ids'] : [],
                ];
            }

            $days[] = [
                'day_number'       => isset( $day['day_number'] ) ? (int) $day['day_number'] : ( $day_index + 1 ),
                'title'            => isset( $day['title'] ) ? (string) $day['title'] : '',
                'description'      => isset( $day['description'] ) ? (string) $day['description'] : '',
                'location_name'    => isset( $day['location_name'] ) ? (string) $day['location_name'] : '',
                'location_address' => isset( $day['location_address'] ) ? (string) $day['location_address'] : '',
                'location_map_url' => isset( $day['location_map_url'] ) ? (string) $day['location_map_url'] : '',
                'location_lat'     => isset( $day['location_lat'] ) ? (string) $day['location_lat'] : '',
                'location_lng'     => isset( $day['location_lng'] ) ? (string) $day['location_lng'] : '',
                'schedule'         => isset( $day['schedule'] ) ? ukiyo_portal_importer_multiline_value( $day['schedule'] ) : '',
                'recommendations'  => isset( $day['recommendations'] ) ? ukiyo_portal_importer_multiline_value( $day['recommendations'] ) : '',
                'activities'       => $activities,
                'image_ids'        => isset( $day['image_ids'] ) ? (array) $day['image_ids'] : [],
                'link_url'         => isset( $day['link_url'] ) ? (string) $day['link_url'] : '',
                'file_id'          => isset( $day['file_id'] ) ? absint( $day['file_id'] ) : 0,
            ];
        }

        $accommodations = [];

        foreach ( (array) ( isset( $place['accommodations'] ) ? $place['accommodations'] : [] ) as $accommodation ) {
            if ( ! is_array( $accommodation ) ) {
                continue;
            }

            $accommodations[] = [
                'name'          => isset( $accommodation['name'] ) ? (string) $accommodation['name'] : '',
                'location'      => isset( $accommodation['location'] ) ? (string) $accommodation['location'] : '',
                'rating'        => isset( $accommodation['rating'] ) ? (string) $accommodation['rating'] : '',
                'rating_source' => isset( $accommodation['rating_source'] ) ? (string) $accommodation['rating_source'] : '',
                'image_id'      => isset( $accommodation['image_id'] ) ? absint( $accommodation['image_id'] ) : 0,
                'start_day'     => isset( $accommodation['start_day'] ) ? (int) $accommodation['start_day'] : 1,
                'end_day'       => isset( $accommodation['end_day'] ) ? (int) $accommodation['end_day'] : 1,
            ];
        }

        $stay_days = isset( $place['stay_days'] ) ? (int) $place['stay_days'] : count( $days );

        $normalized[] = [
            'place'                       => isset( $place['place'] ) ? (string) $place['place'] : '',
            'place_description'           => isset( $place['place_description'] ) ? (string) $place['place_description'] : '',
            'stay_days'                   => max( 1, $stay_days ? $stay_days : max( 1, count( $days ) ) ),
            'image_id'                    => isset( $place['image_id'] ) ? absint( $place['image_id'] ) : 0,
            'map_url'                     => isset( $place['map_url'] ) ? (string) $place['map_url'] : '',
            'map_points'                  => isset( $place['map_points'] ) ? ukiyo_portal_importer_map_points_value( $place['map_points'] ) : '',
            'map_lat'                     => isset( $place['map_lat'] ) ? (string) $place['map_lat'] : '',
            'map_lng'                     => isset( $place['map_lng'] ) ? (string) $place['map_lng'] : '',
            'accommodation_name'          => isset( $place['accommodation_name'] ) ? (string) $place['accommodation_name'] : '',
            'accommodation_location'      => isset( $place['accommodation_location'] ) ? (string) $place['accommodation_location'] : '',
            'accommodation_rating'        => isset( $place['accommodation_rating'] ) ? (string) $place['accommodation_rating'] : '',
            'accommodation_rating_source' => isset( $place['accommodation_rating_source'] ) ? (string) $place['accommodation_rating_source'] : '',
            'accommodation_image_id'      => isset( $place['accommodation_image_id'] ) ? absint( $place['accommodation_image_id'] ) : 0,
            'accommodations'              => $accommodations,
            'days'                        => $days,
        ];
    }

    return ukiyo_portal_sanitize_itinerary( $normalized );
}

function ukiyo_portal_importer_extract_trip_payloads( $payload ) {
    if ( isset( $payload['trips'] ) && is_array( $payload['trips'] ) ) {
        return array_values( $payload['trips'] );
    }

    if ( array_is_list( $payload ) ) {
        return $payload;
    }

    return [ $payload ];
}

function ukiyo_portal_importer_create_trip( $payload ) {
    $payload = is_array( $payload ) ? $payload : [];
    $title   = isset( $payload['title'] ) ? sanitize_text_field( (string) $payload['title'] ) : '';

    if ( '' === $title ) {
        $title = isset( $payload['destination'] ) ? sanitize_text_field( (string) $payload['destination'] ) : '';
    }

    if ( '' === $title ) {
        return new WP_Error( 'missing_title', 'Cada viaje necesita al menos un título.' );
    }

    $post_status = isset( $payload['post_status'] ) ? sanitize_key( (string) $payload['post_status'] ) : 'draft';
    $allowed_post_statuses = [ 'draft', 'publish', 'private', 'pending' ];

    if ( ! in_array( $post_status, $allowed_post_statuses, true ) ) {
        $post_status = 'draft';
    }

    $postarr = [
        'post_type'   => 'ukiyo_viaje',
        'post_status' => $post_status,
        'post_title'  => $title,
    ];

    if ( ! empty( $payload['slug'] ) ) {
        $postarr['post_name'] = sanitize_title( (string) $payload['slug'] );
    }

    $trip_id = wp_insert_post( $postarr, true );

    if ( is_wp_error( $trip_id ) ) {
        return $trip_id;
    }

    $statuses     = ukiyo_portal_get_trip_statuses();
    $access_types = ukiyo_portal_get_access_types();
    $status       = isset( $payload['status'] ) ? sanitize_key( (string) $payload['status'] ) : 'planificacion';
    $access_type  = isset( $payload['access_type'] ) ? sanitize_key( (string) $payload['access_type'] ) : 'private';

    if ( ! isset( $statuses[ $status ] ) ) {
        $status = 'planificacion';
    }

    if ( ! isset( $access_types[ $access_type ] ) ) {
        $access_type = 'private';
    }

    update_post_meta( $trip_id, 'ukiyo_portal_subtitle', isset( $payload['subtitle'] ) ? sanitize_text_field( (string) $payload['subtitle'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_travelers', isset( $payload['travelers'] ) ? ukiyo_portal_importer_travelers_value( $payload['travelers'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_destination', isset( $payload['destination'] ) ? sanitize_text_field( (string) $payload['destination'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_dates', isset( $payload['dates'] ) ? sanitize_text_field( (string) $payload['dates'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_status', $status );
    update_post_meta( $trip_id, 'ukiyo_portal_access_type', $access_type );
    update_post_meta( $trip_id, 'ukiyo_portal_reference', isset( $payload['reference'] ) ? sanitize_text_field( (string) $payload['reference'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_welcome', isset( $payload['welcome'] ) ? ukiyo_portal_importer_multiline_value( $payload['welcome'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_country_story_title', isset( $payload['country_story_title'] ) ? sanitize_text_field( (string) $payload['country_story_title'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_country_story_subtitle', isset( $payload['country_story_subtitle'] ) ? sanitize_text_field( (string) $payload['country_story_subtitle'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_country_story', isset( $payload['country_story'] ) ? wp_kses_post( (string) $payload['country_story'] ) : '' );

    $hero_image_id = isset( $payload['hero_image_id'] ) ? absint( $payload['hero_image_id'] ) : 0;
    update_post_meta( $trip_id, 'ukiyo_portal_hero_image_id', $hero_image_id );

    $user_ids = [];
    foreach ( (array) ( isset( $payload['users'] ) ? $payload['users'] : [] ) as $user_id ) {
        $user_id = absint( $user_id );

        if ( $user_id > 0 ) {
            $user_ids[] = $user_id;
        }
    }
    update_post_meta( $trip_id, 'ukiyo_portal_users', array_values( array_unique( $user_ids ) ) );

	    update_post_meta( $trip_id, 'ukiyo_portal_documents', ukiyo_portal_importer_normalize_documents( isset( $payload['documents'] ) ? $payload['documents'] : [] ) );
	    update_post_meta( $trip_id, 'ukiyo_portal_flights', ukiyo_portal_importer_normalize_flights( isset( $payload['flights'] ) ? $payload['flights'] : [] ) );
	    update_post_meta( $trip_id, 'ukiyo_portal_route_map_points', isset( $payload['route_map_points'] ) ? ukiyo_portal_sanitize_map_points_text( ukiyo_portal_importer_map_points_value( $payload['route_map_points'] ), isset( $payload['destination'] ) ? sanitize_text_field( (string) $payload['destination'] ) : '' ) : '' );
	    update_post_meta( $trip_id, 'ukiyo_portal_itinerary', ukiyo_portal_importer_normalize_itinerary( isset( $payload['itinerary'] ) ? $payload['itinerary'] : [] ) );
    update_post_meta( $trip_id, 'ukiyo_portal_recommendations', ukiyo_portal_importer_normalize_recommendations( isset( $payload['recommendations'] ) ? $payload['recommendations'] : [] ) );
    update_post_meta( $trip_id, 'ukiyo_portal_contacts', ukiyo_portal_importer_normalize_contacts( isset( $payload['contacts'] ) ? $payload['contacts'] : [] ) );

    $proposal = isset( $payload['proposal'] ) && is_array( $payload['proposal'] ) ? $payload['proposal'] : [];

    update_post_meta( $trip_id, 'ukiyo_portal_proposal_price', isset( $proposal['price'] ) ? sanitize_text_field( (string) $proposal['price'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_proposal_price_note', isset( $proposal['price_note'] ) ? sanitize_text_field( (string) $proposal['price_note'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_proposal_price_breakdown', isset( $proposal['price_breakdown'] ) ? ukiyo_portal_importer_price_breakdown_value( $proposal['price_breakdown'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_proposal_recipient_name', isset( $proposal['recipient_name'] ) ? sanitize_text_field( (string) $proposal['recipient_name'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_proposal_traveler_count_override', isset( $proposal['traveler_count_override'] ) ? max( 0, absint( $proposal['traveler_count_override'] ) ) : 0 );
    update_post_meta( $trip_id, 'ukiyo_portal_proposal_valid_until', isset( $proposal['valid_until'] ) ? sanitize_text_field( (string) $proposal['valid_until'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_proposal_includes', isset( $proposal['includes'] ) ? ukiyo_portal_importer_multiline_value( $proposal['includes'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_proposal_excludes', isset( $proposal['excludes'] ) ? ukiyo_portal_importer_multiline_value( $proposal['excludes'] ) : '' );
    update_post_meta( $trip_id, 'ukiyo_portal_proposal_cta_label', isset( $proposal['cta_label'] ) ? sanitize_text_field( (string) $proposal['cta_label'] ) : 'Quiero este viaje' );
    update_post_meta( $trip_id, 'ukiyo_portal_proposal_cta_url', '' );

    if ( isset( $proposal['response_status'] ) ) {
        update_post_meta( $trip_id, 'ukiyo_portal_proposal_response_status', sanitize_key( (string) $proposal['response_status'] ) );
    }

    if ( isset( $proposal['change_request_message'] ) ) {
        update_post_meta( $trip_id, 'ukiyo_portal_proposal_change_request_message', sanitize_textarea_field( (string) $proposal['change_request_message'] ) );
    }

    if ( isset( $proposal['change_requested_at'] ) ) {
        update_post_meta( $trip_id, 'ukiyo_portal_proposal_change_requested_at', sanitize_text_field( (string) $proposal['change_requested_at'] ) );
    }

    if ( isset( $proposal['approved_at'] ) ) {
        update_post_meta( $trip_id, 'ukiyo_portal_proposal_approved_at', sanitize_text_field( (string) $proposal['approved_at'] ) );
    }

    if ( ! empty( $payload['featured_image_id'] ) ) {
        set_post_thumbnail( $trip_id, absint( $payload['featured_image_id'] ) );
    }

    if ( 'proposal' === $access_type ) {
        ukiyo_portal_ensure_proposal_token( $trip_id, ! empty( $proposal['token'] ) );

        if ( ! empty( $proposal['token'] ) ) {
            update_post_meta( $trip_id, 'ukiyo_portal_proposal_token', sanitize_text_field( (string) $proposal['token'] ) );
        }
    }

    return $trip_id;
}

function ukiyo_portal_get_importer_sample_json() {
    $sample = [
        'title'         => 'Indonesia verano 2026',
        'post_status'   => 'draft',
        'access_type'   => 'private',
        'destination'   => 'Indonesia',
        'dates'         => '30 de julio al 16 de agosto de 2026',
        'travelers'     => [ 'Antonio', 'Marta' ],
        'status'        => 'planificacion',
        'reference'     => 'UKIYO-INDO-2026',
        'subtitle'      => 'Un recorrido pausado entre Java, Bromo, Ijen y Bali.',
        'welcome'       => 'Todo el viaje está pensado para equilibrar ritmo, paisaje y alojamiento con encanto.',
        'country_story_title' => 'Conociendo Indonesia',
        'country_story_subtitle' => 'Una mirada breve para entender el contexto del viaje.',
        'country_story' => '<p><strong>Indonesia</strong> es un archipiélago inmenso y diverso.</p><p>Cada isla cambia el ritmo del viaje.</p>',
        'hero_image_id' => 0,
        'featured_image_id' => 0,
	        'flights'       => [
            'airline'                     => 'other',
            'airline_custom'              => 'Saudia',
            'outbound_departure_airport'  => 'Madrid (MAD)',
            'outbound_arrival_airport'    => 'Yakarta (CGK)',
            'outbound_departure_time'     => '2026-07-30 16:40',
            'outbound_arrival_time'       => '2026-07-31 16:00',
            'outbound_departure_timezone' => 'Europe/Madrid',
            'outbound_arrival_timezone'   => 'Asia/Jakarta',
            'outbound_flight_number'      => 'SV 226',
            'return_departure_airport'    => 'Yakarta (CGK)',
            'return_arrival_airport'      => 'Madrid (MAD)',
            'return_departure_time'       => '2026-08-16 00:40',
            'return_arrival_time'         => '2026-08-16 13:45',
            'return_departure_timezone'   => 'Asia/Jakarta',
            'return_arrival_timezone'     => 'Europe/Madrid',
	            'return_flight_number'        => 'SV 227',
	        ],
	        'route_map_points' => [
	            [
	                'label' => 'Yogyakarta',
	                'url'   => 'https://maps.google.com/?q=-7.8013672,110.3647568',
	                'lat'   => '-7.8013672',
	                'lng'   => '110.3647568',
	            ],
	            [
	                'label' => 'Monte Bromo',
	                'url'   => 'https://maps.google.com/?q=-7.9424936,112.9530122',
	                'lat'   => '-7.9424936',
	                'lng'   => '112.9530122',
	            ],
	            [
	                'label' => 'Ubud',
	                'url'   => 'https://maps.google.com/?q=-8.5068536,115.2624778',
	                'lat'   => '-8.5068536',
	                'lng'   => '115.2624778',
	            ],
	        ],
	        'itinerary' => [
            [
                'place'             => 'Java',
                'place_description' => '<p>Una entrada potente al viaje entre templos, volcanes y trenes panorámicos.</p>',
                'stay_days'         => 6,
                'map_points'        => [
                    [
                        'label' => 'Yogyakarta',
                        'url'   => 'https://maps.google.com/?q=-7.8013672,110.3647568',
                        'lat'   => '-7.8013672',
                        'lng'   => '110.3647568',
                    ],
                ],
                'accommodations' => [
                    [
                        'name'      => 'Puri Pangeran Hotel',
                        'location'  => 'Yogyakarta',
                        'rating'    => '4.4',
                        'image_id'  => 0,
                        'start_day' => 1,
                        'end_day'   => 2,
                    ],
                ],
                'days' => [
                    [
                        'day_number'       => 1,
                        'title'            => 'Primer contacto con Java',
                        'description'      => '<p>Llegada, aterrizaje suave y primeras sensaciones de Yogyakarta.</p>',
                        'location_name'    => 'Yogyakarta',
                        'location_map_url' => 'https://maps.google.com/?q=-7.8013672,110.3647568',
                        'schedule'         => [
                            'Llegada al destino',
                            'Check-in en el hotel',
                        ],
                        'activities'       => [
                            [
                                'title'          => 'Paseo por Malioboro',
                                'description'    => 'Una primera toma de contacto con la ciudad.',
                                'modal_content'  => '<p>La calle más viva de Yogyakarta para una primera inmersión.</p>',
                                'location_name'  => 'Malioboro',
                                'map_url'        => 'https://maps.google.com/?q=-7.792,110.365',
                                'visiting_hours' => 'Tarde y noche',
                                'entry_price'    => 'Gratis',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'documents' => [
            [
                'name' => 'Seguro del viaje',
                'type' => 'seguro',
                'url'  => 'https://example.com/seguro.pdf',
            ],
        ],
        'recommendations' => [
            [
                'name'        => 'Café de especialidad',
                'category'    => 'Cafés',
                'place'       => 'Java',
                'description' => '<p>Un buen sitio para empezar el día.</p>',
            ],
        ],
        'contacts' => [
            'whatsapp' => '635300441',
            'email'    => 'info@viajesukiyo.com',
            'phone'    => '635 30 04 41',
        ],
        'proposal' => [
            'price'                  => '3.950 €',
            'price_note'             => 'Precio por persona en base doble.',
            'price_breakdown'        => [
                [
                    'label'  => 'Vuelos internacionales',
                    'amount' => '1.150 €',
                    'note'   => 'Tarifa actual',
                ],
            ],
            'recipient_name'         => 'Antonio',
            'traveler_count_override'=> 2,
            'valid_until'            => '2026-05-15',
            'includes'               => [
                'Vuelos',
                'Alojamientos',
                'Traslados',
            ],
            'excludes'               => [
                'Comidas no indicadas',
            ],
            'cta_label'              => 'Quiero este viaje',
        ],
    ];

    return wp_json_encode( $sample, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
}

function ukiyo_portal_render_importer_page() {
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_die( 'No autorizado.' );
    }

    $notice      = ukiyo_portal_consume_importer_notice();
    $draft_json  = ukiyo_portal_consume_importer_draft();
    $default_json = '' !== $draft_json ? $draft_json : ukiyo_portal_get_importer_sample_json();
    ?>
    <div class="wrap">
        <h1>Importar viajes al Portal del Aventurero</h1>
        <p>Pega aquí un JSON con uno o varios viajes. El importador crea entradas <code>ukiyo_viaje</code> con toda la estructura del portal: general, vuelos, itinerario, propuesta, documentos y recomendaciones.</p>

        <?php if ( ! empty( $notice ) ) : ?>
            <div class="notice notice-<?php echo ! empty( $notice['type'] ) ? esc_attr( $notice['type'] ) : 'info'; ?> is-dismissible">
                <p><?php echo ! empty( $notice['message'] ) ? wp_kses_post( $notice['message'] ) : ''; ?></p>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <?php wp_nonce_field( 'ukiyo_portal_import_trips' ); ?>
            <input type="hidden" name="action" value="ukiyo_portal_import_trips" />

            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row"><label for="ukiyo_portal_import_json">JSON del viaje</label></th>
                        <td>
                            <textarea id="ukiyo_portal_import_json" name="ukiyo_portal_import_json" rows="32" class="large-text code"><?php echo esc_textarea( $default_json ); ?></textarea>
                            <p class="description">Puedes pegar un único objeto JSON, una lista de viajes o un objeto raíz con <code>trips</code>.</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php submit_button( 'Importar viajes' ); ?>
        </form>

        <hr />

        <h2>Instrucciones para ChatGPT</h2>
        <p>Copia este bloque y úsalo como prompt base para pedir un viaje en formato compatible con el importador.</p>
        <textarea rows="18" class="large-text code" readonly>Devuélveme únicamente un JSON válido, sin markdown ni explicaciones.

Crea un viaje para el Portal del Aventurero de WordPress con esta estructura exacta:
- title
- post_status (draft o publish)
- access_type (private o proposal)
- destination
- dates
- travelers (array de nombres)
- status (planificacion, confirmado, preparacion, en-ruta, completado)
- reference
- subtitle
- welcome
- country_story_title
- country_story_subtitle
- country_story (HTML simple con párrafos y negritas)
- hero_image_id
- featured_image_id
- flights
- route_map_points
- itinerary
- documents
- recommendations
- contacts
- proposal

Reglas:
1. El JSON debe ser directamente importable.
2. No inventes image_id: usa 0 si no se conoce.
3. En flights, usa aeropuertos en formato "Ciudad (CODIGO)".
4. En flights, usa fechas y horas en formato "YYYY-MM-DD HH:MM".
5. En flights, usa timezones reales tipo "Europe/Madrid" o "Asia/Jakarta".
6. route_map_points es el campo que pinta el mapa principal del portal. Debe ser un array ordenado de objetos con label, url, lat y lng, desde el primer punto de la ruta hasta el último. Incluye aquí todos los lugares por los que debe pasar visualmente la ruta, aunque alguno no tenga noche.
7. En itinerary, divide por lugares o bases del viaje.
8. Cada lugar debe tener:
	   - place
	   - place_description (HTML)
	   - stay_days
	   - map_points (array de objetos con label, url, lat, lng cuando sea posible)
	   - accommodations (array)
	   - days (array)
	9. Cada day debe tener:
	   - day_number
	   - title
	   - description (HTML)
	   - location_name
	   - location_address
	   - location_map_url
	   - schedule (array de bullets)
	   - recommendations (array de bullets)
	   - image_ids
	   - activities
	10. Cada activity debe tener:
	   - title
	   - description
	   - modal_content (HTML rico para el pop-up)
	   - visiting_hours
	   - entry_price
	   - location_name
	   - location_address
	   - map_url
	   - image_ids
	11. proposal.includes y proposal.excludes deben ser arrays de textos.
	12. proposal.price_breakdown debe ser un array de objetos con:
   - label
   - amount
   - note

Quiero un viaje muy bien pensado, coherente, aspiracional, realista y listo para importar.</textarea>
    </div>
    <?php
}

function ukiyo_portal_handle_import_trips() {
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_die( 'No autorizado.' );
    }

    check_admin_referer( 'ukiyo_portal_import_trips' );

    $json_raw    = isset( $_POST['ukiyo_portal_import_json'] ) ? trim( (string) wp_unslash( $_POST['ukiyo_portal_import_json'] ) ) : '';
    $redirect_to = ukiyo_portal_get_importer_page_url();

    if ( '' === $json_raw ) {
        ukiyo_portal_store_importer_notice(
            [
                'type'    => 'error',
                'message' => 'No has pegado ningún JSON.',
            ]
        );
        wp_safe_redirect( $redirect_to );
        exit;
    }

    $payload = json_decode( $json_raw, true );

    if ( JSON_ERROR_NONE !== json_last_error() || ! is_array( $payload ) ) {
        ukiyo_portal_store_importer_draft( $json_raw );
        ukiyo_portal_store_importer_notice(
            [
                'type'    => 'error',
                'message' => 'El JSON no es válido: ' . esc_html( json_last_error_msg() ),
            ]
        );
        wp_safe_redirect( $redirect_to );
        exit;
    }

    $trip_payloads = ukiyo_portal_importer_extract_trip_payloads( $payload );
    $created_ids   = [];
    $errors        = [];

    foreach ( $trip_payloads as $index => $trip_payload ) {
        $result = ukiyo_portal_importer_create_trip( $trip_payload );

        if ( is_wp_error( $result ) ) {
            $errors[] = sprintf(
                'Viaje %1$d: %2$s',
                $index + 1,
                $result->get_error_message()
            );
            continue;
        }

        $created_ids[] = (int) $result;
    }

    $message_parts = [];

    if ( ! empty( $created_ids ) ) {
        $links = array_map(
            static function ( $trip_id ) {
                return sprintf(
                    '<a href="%1$s">%2$s</a>',
                    esc_url( get_edit_post_link( $trip_id, '' ) ),
                    esc_html( get_the_title( $trip_id ) )
                );
            },
            $created_ids
        );

        $message_parts[] = sprintf(
            'Importados %1$s viaje(s): %2$s.',
            number_format_i18n( count( $created_ids ) ),
            implode( ', ', $links )
        );
    }

    if ( ! empty( $errors ) ) {
        ukiyo_portal_store_importer_draft( $json_raw );
        $message_parts[] = 'Errores: ' . implode( ' | ', array_map( 'esc_html', $errors ) );
    }

    ukiyo_portal_store_importer_notice(
        [
            'type'    => empty( $errors ) ? 'success' : ( ! empty( $created_ids ) ? 'warning' : 'error' ),
            'message' => implode( ' ', $message_parts ),
        ]
    );

    wp_safe_redirect( $redirect_to );
    exit;
}
add_action( 'admin_post_ukiyo_portal_import_trips', 'ukiyo_portal_handle_import_trips' );
