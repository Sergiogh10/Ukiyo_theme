<?php
/**
 * Guardado del Portal del Aventurero.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_portal_sanitize_documents( $documents ) {
    $sanitized = [];

    foreach ( (array) $documents as $document ) {
        $file_id = isset( $document['file_id'] ) ? absint( $document['file_id'] ) : 0;
        $name    = isset( $document['name'] ) ? sanitize_text_field( $document['name'] ) : '';
        $url     = isset( $document['url'] ) ? esc_url_raw( $document['url'] ) : '';

        if ( '' === $name && ! $file_id && '' === $url ) {
            continue;
        }

        $type = isset( $document['type'] ) ? sanitize_key( $document['type'] ) : 'otros';
        if ( ! array_key_exists( $type, ukiyo_portal_get_document_types() ) ) {
            $type = 'otros';
        }

        $sanitized[] = [
            'name'        => $name,
            'type'        => $type,
            'description' => isset( $document['description'] ) ? sanitize_textarea_field( $document['description'] ) : '',
            'file_id'     => $file_id,
            'url'         => $url,
            'order'       => isset( $document['order'] ) ? intval( $document['order'] ) : count( $sanitized ),
        ];
    }

    return $sanitized;
}

function ukiyo_portal_sanitize_itinerary_activities( $activities ) {
    $sanitized = [];

    foreach ( (array) $activities as $activity ) {
        $title            = isset( $activity['title'] ) ? sanitize_text_field( $activity['title'] ) : '';
        $description      = isset( $activity['description'] ) ? sanitize_textarea_field( $activity['description'] ) : '';
        $modal_content    = isset( $activity['modal_content'] ) ? wp_kses_post( wp_unslash( $activity['modal_content'] ) ) : '';
        $visiting_hours   = isset( $activity['visiting_hours'] ) ? sanitize_text_field( $activity['visiting_hours'] ) : '';
        $entry_price      = isset( $activity['entry_price'] ) ? sanitize_text_field( $activity['entry_price'] ) : '';
        $location_name    = isset( $activity['location_name'] ) ? sanitize_text_field( $activity['location_name'] ) : '';
        $location_address = isset( $activity['location_address'] ) ? sanitize_text_field( $activity['location_address'] ) : '';
        $map_url          = isset( $activity['map_url'] ) ? esc_url_raw( $activity['map_url'] ) : '';
        $map_lat          = isset( $activity['map_lat'] ) ? trim( (string) $activity['map_lat'] ) : '';
        $map_lng          = isset( $activity['map_lng'] ) ? trim( (string) $activity['map_lng'] ) : '';
        $image_ids        = isset( $activity['image_ids'] ) ? ukiyo_portal_normalize_attachment_ids( $activity['image_ids'] ) : [];
        $map_coords       = '' !== $map_url ? ukiyo_portal_extract_google_maps_coords( $map_url ) : [ 'lat' => '', 'lng' => '' ];

        if ( '' === $title && '' === $location_name && '' === $location_address && '' === $map_url && empty( $image_ids ) ) {
            continue;
        }

        $sanitized[] = [
            'title'            => $title,
            'description'      => $description,
            'modal_content'    => $modal_content,
            'visiting_hours'   => $visiting_hours,
            'entry_price'      => $entry_price,
            'location_name'    => $location_name,
            'location_address' => $location_address,
            'map_url'          => $map_url,
            'map_lat'          => preg_match( '/^-?\d+(\.\d+)?$/', $map_lat ) ? $map_lat : ( preg_match( '/^-?\d+(\.\d+)?$/', (string) $map_coords['lat'] ) ? (string) $map_coords['lat'] : '' ),
            'map_lng'          => preg_match( '/^-?\d+(\.\d+)?$/', $map_lng ) ? $map_lng : ( preg_match( '/^-?\d+(\.\d+)?$/', (string) $map_coords['lng'] ) ? (string) $map_coords['lng'] : '' ),
            'image_ids'        => $image_ids,
        ];
    }

    return $sanitized;
}

function ukiyo_portal_sanitize_itinerary_days( $days ) {
    $sanitized = [];

    foreach ( (array) $days as $day ) {
        $title          = isset( $day['title'] ) ? sanitize_text_field( $day['title'] ) : '';
        $description    = isset( $day['description'] ) ? wp_kses_post( $day['description'] ) : '';
        $location_name  = isset( $day['location_name'] ) ? sanitize_text_field( $day['location_name'] ) : '';
        $location_address = isset( $day['location_address'] ) ? sanitize_text_field( $day['location_address'] ) : '';
        $location_map_url = isset( $day['location_map_url'] ) ? esc_url_raw( $day['location_map_url'] ) : '';
        $location_lat   = isset( $day['location_lat'] ) ? trim( (string) $day['location_lat'] ) : '';
        $location_lng   = isset( $day['location_lng'] ) ? trim( (string) $day['location_lng'] ) : '';
        $schedule       = isset( $day['schedule'] ) ? sanitize_textarea_field( $day['schedule'] ) : '';
        $recommendation = isset( $day['recommendations'] ) ? sanitize_textarea_field( $day['recommendations'] ) : '';
        $activities     = isset( $day['activities'] ) ? ukiyo_portal_sanitize_itinerary_activities( $day['activities'] ) : [];
        $map_coords     = '' !== $location_map_url ? ukiyo_portal_extract_google_maps_coords( $location_map_url ) : [ 'lat' => '', 'lng' => '' ];

        if ( '' === $title && '' === wp_strip_all_tags( $description ) && '' === $location_name && '' === $location_address && '' === $schedule && '' === $recommendation && empty( $activities ) ) {
            continue;
        }

        $sanitized[] = [
            'day_number'      => isset( $day['day_number'] ) ? max( 1, intval( $day['day_number'] ) ) : count( $sanitized ) + 1,
            'title'           => $title,
            'description'     => $description,
            'location_name'   => $location_name,
            'location_address'=> $location_address,
            'location_map_url'=> $location_map_url,
            'location_lat'    => preg_match( '/^-?\d+(\.\d+)?$/', $location_lat ) ? $location_lat : ( preg_match( '/^-?\d+(\.\d+)?$/', (string) $map_coords['lat'] ) ? (string) $map_coords['lat'] : '' ),
            'location_lng'    => preg_match( '/^-?\d+(\.\d+)?$/', $location_lng ) ? $location_lng : ( preg_match( '/^-?\d+(\.\d+)?$/', (string) $map_coords['lng'] ) ? (string) $map_coords['lng'] : '' ),
            'schedule'        => $schedule,
            'recommendations' => $recommendation,
            'activities'      => $activities,
            'image_ids'       => isset( $day['image_ids'] ) ? ukiyo_portal_normalize_attachment_ids( $day['image_ids'] ) : [],
            'link_url'        => isset( $day['link_url'] ) ? esc_url_raw( $day['link_url'] ) : '',
            'file_id'         => isset( $day['file_id'] ) ? absint( $day['file_id'] ) : 0,
        ];
    }

    return $sanitized;
}

function ukiyo_portal_sanitize_map_points_text( $raw_points, $place_name = '' ) {
    $lines      = preg_split( '/\r\n|\r|\n/', (string) $raw_points );
    $normalized = [];
    $place_name = sanitize_text_field( (string) $place_name );

    if ( ! is_array( $lines ) ) {
        return '';
    }

    foreach ( $lines as $line ) {
        $line = trim( (string) $line );

        if ( '' === $line ) {
            continue;
        }

        $parts = array_map( 'trim', explode( '|', $line ) );
        $label = isset( $parts[0] ) ? sanitize_text_field( $parts[0] ) : '';
        $url   = isset( $parts[1] ) ? esc_url_raw( $parts[1] ) : '';
        $lat   = isset( $parts[2] ) ? trim( (string) $parts[2] ) : '';
        $lng   = isset( $parts[3] ) ? trim( (string) $parts[3] ) : '';

        if ( '' === $label ) {
            continue;
        }

        if ( $url ) {
            $resolved_url = ukiyo_portal_follow_google_maps_url( $url );
            $url          = $resolved_url ? esc_url_raw( $resolved_url ) : $url;
        }

        if ( ! preg_match( '/^-?\d+(\.\d+)?$/', $lat ) || ! preg_match( '/^-?\d+(\.\d+)?$/', $lng ) ) {
            $coords = $url ? ukiyo_portal_extract_google_maps_coords( $url ) : [ 'lat' => '', 'lng' => '' ];
            $lat    = ( isset( $coords['lat'] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $coords['lat'] ) ) ? (string) $coords['lat'] : '';
            $lng    = ( isset( $coords['lng'] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $coords['lng'] ) ) ? (string) $coords['lng'] : '';
        }

        if ( ( '' === $lat || '' === $lng ) && '' !== ukiyo_portal_get_google_places_api_key() ) {
            $search_query = $label;

            if ( $place_name && false === stripos( $label, $place_name ) ) {
                $search_query .= ', ' . $place_name;
            }

            $place_data = ukiyo_portal_google_places_text_search( $search_query );

            if ( ! is_wp_error( $place_data ) ) {
                if ( '' === $url && ! empty( $place_data['url'] ) ) {
                    $url = esc_url_raw( $place_data['url'] );
                }

                if ( '' === $lat && ! empty( $place_data['lat'] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $place_data['lat'] ) ) {
                    $lat = (string) $place_data['lat'];
                }

                if ( '' === $lng && ! empty( $place_data['lng'] ) && preg_match( '/^-?\d+(\.\d+)?$/', (string) $place_data['lng'] ) ) {
                    $lng = (string) $place_data['lng'];
                }
            }
        }

        $normalized[] = implode(
            ' | ',
            array_filter(
                [
                    $label,
                    $url,
                    $lat,
                    $lng,
                ],
                static function ( $value ) {
                    return '' !== trim( (string) $value );
                }
            )
        );
    }

    return implode( "\n", $normalized );
}

function ukiyo_portal_sanitize_itinerary( $itinerary ) {
    $sanitized = [];

    foreach ( (array) $itinerary as $place ) {
        $place_name          = isset( $place['place'] ) ? sanitize_text_field( $place['place'] ) : '';
        $place_description   = isset( $place['place_description'] ) ? wp_kses_post( wp_unslash( $place['place_description'] ) ) : '';
        $stay_days           = isset( $place['stay_days'] ) ? max( 1, intval( $place['stay_days'] ) ) : 1;
        $place_image         = isset( $place['image_id'] ) ? absint( $place['image_id'] ) : 0;
        $map_url             = isset( $place['map_url'] ) ? esc_url_raw( trim( (string) $place['map_url'] ) ) : '';
        $map_points          = isset( $place['map_points'] ) ? ukiyo_portal_sanitize_map_points_text( $place['map_points'], $place_name ) : '';
        $map_lat             = isset( $place['map_lat'] ) ? trim( (string) $place['map_lat'] ) : '';
        $map_lng             = isset( $place['map_lng'] ) ? trim( (string) $place['map_lng'] ) : '';
        $map_coords          = '' !== $map_url ? ukiyo_portal_extract_google_maps_coords( $map_url ) : [ 'lat' => '', 'lng' => '' ];
        $accommodation_name  = isset( $place['accommodation_name'] ) ? sanitize_text_field( $place['accommodation_name'] ) : '';
        $accommodation_loc   = isset( $place['accommodation_location'] ) ? sanitize_text_field( $place['accommodation_location'] ) : '';
        $accommodation_rate  = isset( $place['accommodation_rating'] ) ? preg_replace( '/[^0-9.,]/', '', (string) $place['accommodation_rating'] ) : '';
        $accommodation_src   = isset( $place['accommodation_rating_source'] ) ? sanitize_text_field( $place['accommodation_rating_source'] ) : '';
        $accommodation_image = isset( $place['accommodation_image_id'] ) ? absint( $place['accommodation_image_id'] ) : 0;
        $days                = isset( $place['days'] ) ? ukiyo_portal_sanitize_itinerary_days( $place['days'] ) : [];
        $place_total_days    = ! empty( $days ) ? count( $days ) : $stay_days;
        $accommodations      = isset( $place['accommodations'] ) ? ukiyo_portal_sanitize_itinerary_accommodations( $place['accommodations'], $place_total_days ) : [];

        if ( empty( $accommodations ) && ( '' !== $accommodation_name || '' !== $accommodation_loc ) ) {
            $accommodations = ukiyo_portal_sanitize_itinerary_accommodations(
                [
                    [
                        'name'          => $accommodation_name,
                        'location'      => $accommodation_loc,
                        'rating'        => $accommodation_rate,
                        'rating_source' => $accommodation_src,
                        'image_id'      => $accommodation_image,
                        'start_day'     => 1,
                        'end_day'       => $place_total_days,
                    ],
                ],
                $place_total_days
            );
        }

        if ( '' === $place_name && '' === $accommodation_name && empty( $days ) ) {
            continue;
        }

        $primary_accommodation = ! empty( $accommodations ) ? $accommodations[0] : [];

        $sanitized[] = [
            'place'                       => $place_name,
            'place_description'           => $place_description,
            'stay_days'                   => $stay_days,
            'image_id'                    => $place_image,
            'map_url'                     => $map_url,
            'map_points'                  => $map_points,
            'map_lat'                     => preg_match( '/^-?\d+(\.\d+)?$/', $map_lat ) ? $map_lat : ( preg_match( '/^-?\d+(\.\d+)?$/', (string) $map_coords['lat'] ) ? (string) $map_coords['lat'] : '' ),
            'map_lng'                     => preg_match( '/^-?\d+(\.\d+)?$/', $map_lng ) ? $map_lng : ( preg_match( '/^-?\d+(\.\d+)?$/', (string) $map_coords['lng'] ) ? (string) $map_coords['lng'] : '' ),
            'accommodation_name'          => ! empty( $primary_accommodation['name'] ) ? (string) $primary_accommodation['name'] : $accommodation_name,
            'accommodation_location'      => ! empty( $primary_accommodation['location'] ) ? (string) $primary_accommodation['location'] : $accommodation_loc,
            'accommodation_rating'        => ! empty( $primary_accommodation['rating'] ) ? (string) $primary_accommodation['rating'] : $accommodation_rate,
            'accommodation_rating_source' => ! empty( $primary_accommodation['rating_source'] ) ? (string) $primary_accommodation['rating_source'] : $accommodation_src,
            'accommodation_image_id'      => ! empty( $primary_accommodation['image_id'] ) ? absint( $primary_accommodation['image_id'] ) : $accommodation_image,
            'accommodations'              => $accommodations,
            'days'                        => $days,
        ];
    }

    return $sanitized;
}

function ukiyo_portal_sanitize_itinerary_accommodations( $accommodations, $fallback_total_days = 1 ) {
    $sanitized          = [];

    foreach ( (array) $accommodations as $accommodation ) {
        $name          = isset( $accommodation['name'] ) ? sanitize_text_field( $accommodation['name'] ) : '';
        $location      = isset( $accommodation['location'] ) ? sanitize_text_field( $accommodation['location'] ) : '';
        $rating        = isset( $accommodation['rating'] ) ? preg_replace( '/[^0-9.,]/', '', (string) $accommodation['rating'] ) : '';
        $rating_source = isset( $accommodation['rating_source'] ) ? sanitize_text_field( $accommodation['rating_source'] ) : '';
        $image_id      = isset( $accommodation['image_id'] ) ? absint( $accommodation['image_id'] ) : 0;
        $start_day     = isset( $accommodation['start_day'] ) ? max( 1, (int) $accommodation['start_day'] ) : 1;
        $end_day       = isset( $accommodation['end_day'] ) ? max( $start_day, (int) $accommodation['end_day'] ) : $start_day;

        if ( '' === $name && '' === $location ) {
            continue;
        }

        $sanitized[] = [
            'name'          => $name,
            'location'      => $location,
            'rating'        => $rating,
            'rating_source' => $rating_source,
            'image_id'      => $image_id,
            'start_day'     => $start_day,
            'end_day'       => $end_day,
        ];
    }

    return $sanitized;
}

function ukiyo_portal_sanitize_recommendations( $items ) {
    $sanitized = [];
    $categories = ukiyo_portal_get_recommendation_categories();

    foreach ( (array) $items as $item ) {
        $name = isset( $item['name'] ) ? sanitize_text_field( $item['name'] ) : '';

        if ( '' === $name ) {
            continue;
        }

        $sanitized[] = [
            'name'        => $name,
            'category'    => ( isset( $item['category'] ) && isset( $categories[ sanitize_text_field( $item['category'] ) ] ) ) ? sanitize_text_field( $item['category'] ) : '',
            'place'       => isset( $item['place'] ) ? sanitize_text_field( $item['place'] ) : '',
            'rating'      => isset( $item['rating'] ) ? preg_replace( '/[^0-9.,]/', '', (string) $item['rating'] ) : '',
            'description' => isset( $item['description'] ) ? wp_kses_post( $item['description'] ) : '',
            'note'        => isset( $item['note'] ) ? sanitize_text_field( $item['note'] ) : '',
            'cta_label'   => isset( $item['cta_label'] ) ? sanitize_text_field( $item['cta_label'] ) : '',
            'url'         => isset( $item['url'] ) ? esc_url_raw( $item['url'] ) : '',
            'address'     => isset( $item['address'] ) ? sanitize_text_field( $item['address'] ) : '',
            'image_id'    => isset( $item['image_id'] ) ? absint( $item['image_id'] ) : 0,
        ];
    }

    return $sanitized;
}

function ukiyo_portal_sanitize_flights( $flights ) {
    $defaults = ukiyo_portal_get_flights_defaults();
    $flights  = is_array( $flights ) ? $flights : [];
    $sanitize_timezone = static function ( $value ) {
        return ukiyo_portal_get_valid_timezone_identifier( sanitize_text_field( (string) $value ) );
    };

    return [
        'airline'                    => isset( $flights['airline'] ) ? sanitize_key( $flights['airline'] ) : $defaults['airline'],
        'airline_custom'             => isset( $flights['airline_custom'] ) ? sanitize_text_field( $flights['airline_custom'] ) : $defaults['airline_custom'],
        'outbound_departure_airport' => isset( $flights['outbound_departure_airport'] ) ? sanitize_text_field( $flights['outbound_departure_airport'] ) : $defaults['outbound_departure_airport'],
        'outbound_arrival_airport'   => isset( $flights['outbound_arrival_airport'] ) ? sanitize_text_field( $flights['outbound_arrival_airport'] ) : $defaults['outbound_arrival_airport'],
        'outbound_departure_time'    => isset( $flights['outbound_departure_time'] ) ? sanitize_text_field( $flights['outbound_departure_time'] ) : $defaults['outbound_departure_time'],
        'outbound_arrival_time'      => isset( $flights['outbound_arrival_time'] ) ? sanitize_text_field( $flights['outbound_arrival_time'] ) : $defaults['outbound_arrival_time'],
        'outbound_departure_timezone'=> isset( $flights['outbound_departure_timezone'] ) ? $sanitize_timezone( $flights['outbound_departure_timezone'] ) : $defaults['outbound_departure_timezone'],
        'outbound_arrival_timezone'  => isset( $flights['outbound_arrival_timezone'] ) ? $sanitize_timezone( $flights['outbound_arrival_timezone'] ) : $defaults['outbound_arrival_timezone'],
        'outbound_flight_number'     => isset( $flights['outbound_flight_number'] ) ? sanitize_text_field( $flights['outbound_flight_number'] ) : $defaults['outbound_flight_number'],
        'return_departure_airport'   => isset( $flights['return_departure_airport'] ) ? sanitize_text_field( $flights['return_departure_airport'] ) : $defaults['return_departure_airport'],
        'return_arrival_airport'     => isset( $flights['return_arrival_airport'] ) ? sanitize_text_field( $flights['return_arrival_airport'] ) : $defaults['return_arrival_airport'],
        'return_departure_time'      => isset( $flights['return_departure_time'] ) ? sanitize_text_field( $flights['return_departure_time'] ) : $defaults['return_departure_time'],
        'return_arrival_time'        => isset( $flights['return_arrival_time'] ) ? sanitize_text_field( $flights['return_arrival_time'] ) : $defaults['return_arrival_time'],
        'return_departure_timezone'  => isset( $flights['return_departure_timezone'] ) ? $sanitize_timezone( $flights['return_departure_timezone'] ) : $defaults['return_departure_timezone'],
        'return_arrival_timezone'    => isset( $flights['return_arrival_timezone'] ) ? $sanitize_timezone( $flights['return_arrival_timezone'] ) : $defaults['return_arrival_timezone'],
        'return_flight_number'       => isset( $flights['return_flight_number'] ) ? sanitize_text_field( $flights['return_flight_number'] ) : $defaults['return_flight_number'],
    ];
}

function ukiyo_portal_sanitize_contacts( $contacts ) {
    $defaults = ukiyo_portal_get_default_contacts();
    $contacts = is_array( $contacts ) ? $contacts : [];

    return [
        'whatsapp'    => isset( $contacts['whatsapp'] ) ? sanitize_text_field( $contacts['whatsapp'] ) : $defaults['whatsapp'],
        'email'       => isset( $contacts['email'] ) ? sanitize_email( $contacts['email'] ) : $defaults['email'],
        'phone'       => isset( $contacts['phone'] ) ? sanitize_text_field( $contacts['phone'] ) : $defaults['phone'],
        'local'       => isset( $contacts['local'] ) ? sanitize_textarea_field( $contacts['local'] ) : $defaults['local'],
        'emergencies' => isset( $contacts['emergencies'] ) ? sanitize_textarea_field( $contacts['emergencies'] ) : $defaults['emergencies'],
        'support'     => isset( $contacts['support'] ) ? sanitize_textarea_field( $contacts['support'] ) : $defaults['support'],
    ];
}

function ukiyo_portal_save_meta( $post_id ) {
    if ( ! isset( $_POST['ukiyo_portal_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_nonce'] ) ), 'ukiyo_portal_save' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $statuses = ukiyo_portal_get_trip_statuses();
    $access_types = ukiyo_portal_get_access_types();
    $status   = isset( $_POST['ukiyo_portal_status'] ) ? sanitize_key( wp_unslash( $_POST['ukiyo_portal_status'] ) ) : 'planificacion';
    $access_type = isset( $_POST['ukiyo_portal_access_type'] ) ? sanitize_key( wp_unslash( $_POST['ukiyo_portal_access_type'] ) ) : 'private';
    if ( ! isset( $statuses[ $status ] ) ) {
        $status = 'planificacion';
    }

    if ( ! isset( $access_types[ $access_type ] ) ) {
        $access_type = 'private';
    }

    update_post_meta( $post_id, 'ukiyo_portal_subtitle', isset( $_POST['ukiyo_portal_subtitle'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_subtitle'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_travelers', isset( $_POST['ukiyo_portal_travelers'] ) ? sanitize_textarea_field( wp_unslash( $_POST['ukiyo_portal_travelers'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_destination', isset( $_POST['ukiyo_portal_destination'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_destination'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_dates', isset( $_POST['ukiyo_portal_dates'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_dates'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_status', $status );
    update_post_meta( $post_id, 'ukiyo_portal_access_type', $access_type );
    update_post_meta( $post_id, 'ukiyo_portal_reference', isset( $_POST['ukiyo_portal_reference'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_reference'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_welcome', isset( $_POST['ukiyo_portal_welcome'] ) ? sanitize_textarea_field( wp_unslash( $_POST['ukiyo_portal_welcome'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_country_story_title', isset( $_POST['ukiyo_portal_country_story_title'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_country_story_title'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_country_story_subtitle', isset( $_POST['ukiyo_portal_country_story_subtitle'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_country_story_subtitle'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_country_story', isset( $_POST['ukiyo_portal_country_story'] ) ? wp_kses_post( wp_unslash( $_POST['ukiyo_portal_country_story'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_hero_image_id', isset( $_POST['ukiyo_portal_hero_image_id'] ) ? absint( $_POST['ukiyo_portal_hero_image_id'] ) : 0 );

    $user_ids = isset( $_POST['ukiyo_portal_users'] ) ? array_values( array_filter( array_map( 'absint', (array) wp_unslash( $_POST['ukiyo_portal_users'] ) ) ) ) : [];
    update_post_meta( $post_id, 'ukiyo_portal_users', $user_ids );

	    $documents = isset( $_POST['ukiyo_portal_documents'] ) ? ukiyo_portal_sanitize_documents( wp_unslash( $_POST['ukiyo_portal_documents'] ) ) : [];
	    $flights   = isset( $_POST['ukiyo_portal_flights'] ) ? ukiyo_portal_sanitize_flights( wp_unslash( $_POST['ukiyo_portal_flights'] ) ) : ukiyo_portal_get_flights_defaults();
	    $route_map_points = isset( $_POST['ukiyo_portal_route_map_points'] ) ? ukiyo_portal_sanitize_map_points_text( wp_unslash( $_POST['ukiyo_portal_route_map_points'] ), isset( $_POST['ukiyo_portal_destination'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_destination'] ) ) : '' ) : '';
	    $itinerary = isset( $_POST['ukiyo_portal_itinerary'] ) ? ukiyo_portal_sanitize_itinerary( wp_unslash( $_POST['ukiyo_portal_itinerary'] ) ) : [];
	    $items     = isset( $_POST['ukiyo_portal_recommendations'] ) ? ukiyo_portal_sanitize_recommendations( wp_unslash( $_POST['ukiyo_portal_recommendations'] ) ) : [];
	    $contacts  = isset( $_POST['ukiyo_portal_contacts'] ) ? ukiyo_portal_sanitize_contacts( wp_unslash( $_POST['ukiyo_portal_contacts'] ) ) : ukiyo_portal_get_default_contacts();

	    update_post_meta( $post_id, 'ukiyo_portal_documents', $documents );
	    update_post_meta( $post_id, 'ukiyo_portal_flights', $flights );
	    update_post_meta( $post_id, 'ukiyo_portal_route_map_points', $route_map_points );
	    update_post_meta( $post_id, 'ukiyo_portal_itinerary', $itinerary );
    update_post_meta( $post_id, 'ukiyo_portal_recommendations', $items );
    update_post_meta( $post_id, 'ukiyo_portal_contacts', $contacts );
    update_post_meta( $post_id, 'ukiyo_portal_proposal_price', isset( $_POST['ukiyo_portal_proposal_price'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_proposal_price'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_proposal_price_note', isset( $_POST['ukiyo_portal_proposal_price_note'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_proposal_price_note'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_proposal_price_breakdown', isset( $_POST['ukiyo_portal_proposal_price_breakdown'] ) ? sanitize_textarea_field( wp_unslash( $_POST['ukiyo_portal_proposal_price_breakdown'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_proposal_recipient_name', isset( $_POST['ukiyo_portal_proposal_recipient_name'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_proposal_recipient_name'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_proposal_traveler_count_override', isset( $_POST['ukiyo_portal_proposal_traveler_count_override'] ) ? max( 0, absint( wp_unslash( $_POST['ukiyo_portal_proposal_traveler_count_override'] ) ) ) : 0 );
    update_post_meta( $post_id, 'ukiyo_portal_proposal_valid_until', isset( $_POST['ukiyo_portal_proposal_valid_until'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_proposal_valid_until'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_proposal_includes', isset( $_POST['ukiyo_portal_proposal_includes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['ukiyo_portal_proposal_includes'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_proposal_excludes', isset( $_POST['ukiyo_portal_proposal_excludes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['ukiyo_portal_proposal_excludes'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_proposal_cta_label', isset( $_POST['ukiyo_portal_proposal_cta_label'] ) ? sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_proposal_cta_label'] ) ) : '' );
    update_post_meta( $post_id, 'ukiyo_portal_proposal_cta_url', '' );

    $regenerate_token = isset( $_POST['ukiyo_portal_regenerate_token'] ) && '1' === (string) wp_unslash( $_POST['ukiyo_portal_regenerate_token'] );

    if ( 'proposal' === $access_type ) {
        ukiyo_portal_ensure_proposal_token( $post_id, $regenerate_token );
    }
}
add_action( 'save_post_ukiyo_viaje', 'ukiyo_portal_save_meta' );
