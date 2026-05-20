<?php
/**
 * Feedback final del viaje.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_portal_is_feedback_request() {
    return in_array( get_query_var( 'ukiyo_portal_view' ), [ 'feedback', 'feedback_manual' ], true );
}

function ukiyo_portal_is_manual_feedback_request() {
    return 'feedback_manual' === get_query_var( 'ukiyo_portal_view' );
}

function ukiyo_portal_get_feedback_review_url() {
    return 'https://g.page/r/CSngBDS0c_ssEBM/review';
}

function ukiyo_portal_register_feedback_cpt() {
    register_post_type(
        'ukiyo_feedback_viaje',
        [
            'labels'             => [
                'name'               => 'Feedback de viajes',
                'singular_name'      => 'Feedback de viaje',
                'menu_name'          => 'Feedback',
                'add_new_item'       => 'Añadir feedback',
                'edit_item'          => 'Editar feedback',
                'new_item'           => 'Nuevo feedback',
                'view_item'          => 'Ver feedback',
                'search_items'       => 'Buscar feedback',
                'not_found'          => 'No se han encontrado feedbacks',
                'not_found_in_trash' => 'No hay feedbacks en la papelera',
            ],
            'public'             => false,
            'show_ui'            => true,
            'show_in_menu'       => 'edit.php?post_type=ukiyo_viaje',
            'show_in_rest'       => false,
            'exclude_from_search'=> true,
            'publicly_queryable' => false,
            'has_archive'        => false,
            'rewrite'            => false,
            'menu_icon'          => 'dashicons-format-status',
            'supports'           => [ 'title' ],
        ]
    );
}
add_action( 'init', 'ukiyo_portal_register_feedback_cpt', 20 );

function ukiyo_portal_get_feedback_tokens( $user_id ) {
    $tokens = get_user_meta( absint( $user_id ), 'ukiyo_portal_feedback_tokens', true );

    return is_array( $tokens ) ? $tokens : [];
}

function ukiyo_portal_set_feedback_tokens( $user_id, $tokens ) {
    update_user_meta( absint( $user_id ), 'ukiyo_portal_feedback_tokens', (array) $tokens );
}

function ukiyo_portal_get_feedback_token( $trip_id, $user_id, $regenerate = false ) {
    $trip_id = absint( $trip_id );
    $user_id = absint( $user_id );

    if ( ! $trip_id || ! $user_id ) {
        return '';
    }

    $tokens = ukiyo_portal_get_feedback_tokens( $user_id );

    if ( ! $regenerate && ! empty( $tokens[ $trip_id ]['token'] ) ) {
        return (string) $tokens[ $trip_id ]['token'];
    }

    $token              = wp_generate_password( 24, false, false );
    $tokens[ $trip_id ] = [
        'token'      => $token,
        'created_at' => current_time( 'mysql' ),
    ];

    ukiyo_portal_set_feedback_tokens( $user_id, $tokens );

    return $token;
}

function ukiyo_portal_get_feedback_url( $trip, $user, $regenerate = false ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );
    $user_obj  = $user instanceof WP_User ? $user : get_user_by( 'id', absint( $user ) );

    if ( ! $trip_post instanceof WP_Post || ! $user_obj instanceof WP_User ) {
        return '';
    }

    $token = ukiyo_portal_get_feedback_token( $trip_post->ID, $user_obj->ID, $regenerate );

    if ( '' === $token ) {
        return '';
    }

    return home_url(
        sprintf(
            '/portal-del-aventurero/finaliza-tu-viaje/%1$s/%2$d/%3$s/',
            rawurlencode( $trip_post->post_name ),
            absint( $user_obj->ID ),
            rawurlencode( $token )
        )
    );
}

function ukiyo_portal_get_manual_feedback_token_store() {
    $store = get_option( 'ukiyo_portal_manual_feedback_tokens', [] );

    return is_array( $store ) ? $store : [];
}

function ukiyo_portal_set_manual_feedback_token_store( $store ) {
    update_option( 'ukiyo_portal_manual_feedback_tokens', (array) $store, false );
}

function ukiyo_portal_get_manual_feedback_token_key( $slug, $recipient_email ) {
    return md5( sanitize_title( (string) $slug ) . '|' . strtolower( trim( (string) $recipient_email ) ) );
}

function ukiyo_portal_get_manual_feedback_token_record( $slug, $recipient_email ) {
    $store = ukiyo_portal_get_manual_feedback_token_store();
    $key   = ukiyo_portal_get_manual_feedback_token_key( $slug, $recipient_email );

    return isset( $store[ $key ] ) && is_array( $store[ $key ] ) ? $store[ $key ] : null;
}

function ukiyo_portal_find_manual_feedback_token_record_by_slug_and_token( $slug, $token ) {
    $slug  = sanitize_title( (string) $slug );
    $token = sanitize_text_field( (string) $token );

    foreach ( ukiyo_portal_get_manual_feedback_token_store() as $record ) {
        if ( ! is_array( $record ) ) {
            continue;
        }

        $record_slug  = isset( $record['slug'] ) ? sanitize_title( (string) $record['slug'] ) : '';
        $record_token = isset( $record['token'] ) ? (string) $record['token'] : '';

        if ( $slug === $record_slug && '' !== $record_token && hash_equals( $record_token, $token ) ) {
            return $record;
        }
    }

    return null;
}

function ukiyo_portal_get_manual_feedback_token( $slug, $recipient_name, $recipient_email, $regenerate = false ) {
    $slug            = sanitize_title( (string) $slug );
    $recipient_email = sanitize_email( $recipient_email );
    $recipient_name  = sanitize_text_field( (string) $recipient_name );

    if ( '' === $slug || ! is_email( $recipient_email ) ) {
        return '';
    }

    $store  = ukiyo_portal_get_manual_feedback_token_store();
    $key    = ukiyo_portal_get_manual_feedback_token_key( $slug, $recipient_email );
    $record = isset( $store[ $key ] ) && is_array( $store[ $key ] ) ? $store[ $key ] : [];

    if ( ! $regenerate && ! empty( $record['token'] ) ) {
        return (string) $record['token'];
    }

    $token        = wp_generate_password( 24, false, false );
    $store[ $key ] = [
        'slug'            => $slug,
        'recipient_name'  => $recipient_name,
        'recipient_email' => strtolower( $recipient_email ),
        'token'           => $token,
        'created_at'      => current_time( 'mysql' ),
    ];

    ukiyo_portal_set_manual_feedback_token_store( $store );

    return $token;
}

function ukiyo_portal_get_manual_feedback_url( $slug, $recipient_name, $recipient_email, $regenerate = false ) {
    $slug  = sanitize_title( (string) $slug );
    $token = ukiyo_portal_get_manual_feedback_token( $slug, $recipient_name, $recipient_email, $regenerate );

    if ( '' === $slug || '' === $token ) {
        return '';
    }

    return home_url(
        sprintf(
            '/portal-del-aventurero/finaliza-tu-viaje-manual/%1$s/%2$s/',
            rawurlencode( $slug ),
            rawurlencode( $token )
        )
    );
}

function ukiyo_portal_get_feedback_form_schema_from_trip_data( $trip_data ) {
    $places = [];

    foreach ( (array) $trip_data['itinerary'] as $place_index => $place ) {
        $place_name              = trim( (string) $place['place'] );
        $related_recommendations = [];
        $activities              = [];

        foreach ( (array) $trip_data['recommendations'] as $recommendation_index => $recommendation ) {
            if ( $place_name && $place_name === trim( (string) $recommendation['place'] ) ) {
                $related_recommendations[] = [
                    'index' => $recommendation_index,
                    'name'  => (string) $recommendation['name'],
                ];
            }
        }

        foreach ( (array) $place['days'] as $day_index => $day ) {
            $label = trim( (string) $day['title'] );

            if ( '' === $label ) {
                $label = 'Día ' . max( 1, absint( $day['day_number'] ) );
            }

            $activities[] = [
                'index' => $day_index,
                'label' => $label,
            ];
        }

        $places[] = [
            'index'           => $place_index,
            'place'           => $place_name ?: 'Etapa ' . ( $place_index + 1 ),
            'stay_days'       => max( 1, absint( $place['stay_days'] ) ),
            'recommendations' => $related_recommendations,
            'activities'      => $activities,
        ];
    }

    return $places;
}

function ukiyo_portal_get_feedback_form_schema( $trip ) {
    return ukiyo_portal_get_feedback_form_schema_from_trip_data( ukiyo_portal_get_trip_data( $trip ) );
}

function ukiyo_portal_get_feedback_defaults_from_schema( $schema ) {
    $values = [
        'general_comments' => '',
        'places'           => [],
    ];

    foreach ( (array) $schema as $place ) {
        $values['places'][ $place['index'] ] = [
            'rating'               => '',
            'recommendations_used' => [],
            'activities_done'      => [],
            'activities_note'      => '',
            'guide_name'           => '',
            'guide_rating'         => '',
            'guide_comment'        => '',
        ];
    }

    return $values;
}

function ukiyo_portal_get_feedback_defaults( $trip ) {
    return ukiyo_portal_get_feedback_defaults_from_schema( ukiyo_portal_get_feedback_form_schema( $trip ) );
}

function ukiyo_portal_merge_feedback_values_with_defaults( $defaults, $stored ) {
    if ( ! is_array( $stored ) ) {
        return $defaults;
    }

    $values                     = wp_parse_args( $stored, $defaults );
    $values['general_comments'] = isset( $stored['general_comments'] ) ? (string) $stored['general_comments'] : '';

    foreach ( $defaults['places'] as $place_index => $default_place ) {
        $stored_place = isset( $stored['places'][ $place_index ] ) && is_array( $stored['places'][ $place_index ] )
            ? $stored['places'][ $place_index ]
            : [];

        $values['places'][ $place_index ] = wp_parse_args( $stored_place, $default_place );
    }

    return $values;
}

function ukiyo_portal_get_feedback_for_trip_user( $trip_id, $user_id ) {
    $posts = get_posts(
        [
            'post_type'      => 'ukiyo_feedback_viaje',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            'meta_query'     => [
                [
                    'key'   => 'ukiyo_feedback_trip_id',
                    'value' => absint( $trip_id ),
                ],
                [
                    'key'   => 'ukiyo_feedback_user_id',
                    'value' => absint( $user_id ),
                ],
            ],
        ]
    );

    return ! empty( $posts[0] ) ? $posts[0] : null;
}

function ukiyo_portal_get_feedback_for_manual_recipient( $slug, $recipient_email ) {
    $slug            = sanitize_title( (string) $slug );
    $recipient_email = strtolower( sanitize_email( $recipient_email ) );

    if ( '' === $slug || ! is_email( $recipient_email ) ) {
        return null;
    }

    $posts = get_posts(
        [
            'post_type'      => 'ukiyo_feedback_viaje',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            'meta_query'     => [
                [
                    'key'   => 'ukiyo_feedback_manual_slug',
                    'value' => $slug,
                ],
                [
                    'key'   => 'ukiyo_feedback_manual_email',
                    'value' => $recipient_email,
                ],
            ],
        ]
    );

    return ! empty( $posts[0] ) ? $posts[0] : null;
}

function ukiyo_portal_get_feedback_values( $trip, $user ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );
    $user_obj  = $user instanceof WP_User ? $user : get_user_by( 'id', absint( $user ) );
    $defaults  = ukiyo_portal_get_feedback_defaults( $trip_post );

    if ( ! $trip_post instanceof WP_Post || ! $user_obj instanceof WP_User ) {
        return $defaults;
    }

    $feedback = ukiyo_portal_get_feedback_for_trip_user( $trip_post->ID, $user_obj->ID );

    if ( ! $feedback instanceof WP_Post ) {
        return $defaults;
    }

    return ukiyo_portal_merge_feedback_values_with_defaults(
        $defaults,
        get_post_meta( $feedback->ID, 'ukiyo_feedback_payload', true )
    );
}

function ukiyo_portal_get_manual_feedback_values( $slug, $recipient_email, $manual_trip ) {
    $schema   = ukiyo_portal_get_feedback_form_schema_from_trip_data( $manual_trip );
    $defaults = ukiyo_portal_get_feedback_defaults_from_schema( $schema );
    $feedback = ukiyo_portal_get_feedback_for_manual_recipient( $slug, $recipient_email );

    if ( ! $feedback instanceof WP_Post ) {
        return $defaults;
    }

    return ukiyo_portal_merge_feedback_values_with_defaults(
        $defaults,
        get_post_meta( $feedback->ID, 'ukiyo_feedback_payload', true )
    );
}

function ukiyo_portal_sanitize_feedback_payload_from_schema( $schema, $raw_payload ) {
    $defaults = ukiyo_portal_get_feedback_defaults_from_schema( $schema );
    $payload  = [
        'general_comments' => isset( $raw_payload['general_comments'] ) ? sanitize_textarea_field( $raw_payload['general_comments'] ) : '',
        'places'           => [],
    ];

    foreach ( (array) $schema as $place ) {
        $place_index             = $place['index'];
        $raw_place               = isset( $raw_payload['places'][ $place_index ] ) && is_array( $raw_payload['places'][ $place_index ] )
            ? $raw_payload['places'][ $place_index ]
            : [];
        $allowed_recommendations = array_map( 'strval', wp_list_pluck( $place['recommendations'], 'index' ) );
        $allowed_activities      = array_map( 'strval', wp_list_pluck( $place['activities'], 'index' ) );

        $payload['places'][ $place_index ] = [
            'rating'               => isset( $raw_place['rating'] ) ? max( 1, min( 5, absint( $raw_place['rating'] ) ) ) : '',
            'recommendations_used' => array_values(
                array_intersect(
                    array_map( 'strval', isset( $raw_place['recommendations_used'] ) ? (array) $raw_place['recommendations_used'] : [] ),
                    $allowed_recommendations
                )
            ),
            'activities_done'      => array_values(
                array_intersect(
                    array_map( 'strval', isset( $raw_place['activities_done'] ) ? (array) $raw_place['activities_done'] : [] ),
                    $allowed_activities
                )
            ),
            'activities_note'      => isset( $raw_place['activities_note'] ) ? sanitize_textarea_field( $raw_place['activities_note'] ) : '',
            'guide_name'           => isset( $raw_place['guide_name'] ) ? sanitize_text_field( $raw_place['guide_name'] ) : '',
            'guide_rating'         => isset( $raw_place['guide_rating'] ) ? max( 1, min( 5, absint( $raw_place['guide_rating'] ) ) ) : '',
            'guide_comment'        => isset( $raw_place['guide_comment'] ) ? sanitize_textarea_field( $raw_place['guide_comment'] ) : '',
        ];

        if ( empty( $raw_place['rating'] ) ) {
            $payload['places'][ $place_index ]['rating'] = '';
        }

        if ( empty( $raw_place['guide_rating'] ) ) {
            $payload['places'][ $place_index ]['guide_rating'] = '';
        }
    }

    return wp_parse_args( $payload, $defaults );
}

function ukiyo_portal_sanitize_feedback_payload( $trip, $raw_payload ) {
    return ukiyo_portal_sanitize_feedback_payload_from_schema( ukiyo_portal_get_feedback_form_schema( $trip ), $raw_payload );
}

function ukiyo_portal_build_feedback_summary_from_schema( $trip_title, $recipient_label, $schema, $payload ) {
    $lines   = [];
    $lines[] = 'Viaje: ' . $trip_title;
    $lines[] = 'Viajero: ' . $recipient_label;
    $lines[] = '';

    foreach ( (array) $schema as $place ) {
        $place_values = isset( $payload['places'][ $place['index'] ] ) ? $payload['places'][ $place['index'] ] : [];
        $lines[]      = $place['place'] . ' (' . $place['stay_days'] . ' día(s))';
        $lines[]      = 'Valoración del lugar: ' . ( ! empty( $place_values['rating'] ) ? $place_values['rating'] . '/5' : 'Sin valorar' );

        if ( ! empty( $place_values['recommendations_used'] ) ) {
            $selected = [];

            foreach ( $place['recommendations'] as $recommendation ) {
                if ( in_array( (string) $recommendation['index'], (array) $place_values['recommendations_used'], true ) ) {
                    $selected[] = $recommendation['name'];
                }
            }

            if ( ! empty( $selected ) ) {
                $lines[] = 'Recomendaciones útiles: ' . implode( ', ', $selected );
            }
        }

        if ( ! empty( $place_values['activities_done'] ) ) {
            $selected = [];

            foreach ( $place['activities'] as $activity ) {
                if ( in_array( (string) $activity['index'], (array) $place_values['activities_done'], true ) ) {
                    $selected[] = $activity['label'];
                }
            }

            if ( ! empty( $selected ) ) {
                $lines[] = 'Actividades realizadas: ' . implode( ', ', $selected );
            }
        }

        if ( ! empty( $place_values['activities_note'] ) ) {
            $lines[] = 'Comentario de actividades: ' . $place_values['activities_note'];
        }

        if ( ! empty( $place_values['guide_name'] ) || ! empty( $place_values['guide_rating'] ) || ! empty( $place_values['guide_comment'] ) ) {
            $guide_line = 'Guía';

            if ( ! empty( $place_values['guide_name'] ) ) {
                $guide_line .= ': ' . $place_values['guide_name'];
            }

            if ( ! empty( $place_values['guide_rating'] ) ) {
                $guide_line .= ' (' . $place_values['guide_rating'] . '/5)';
            }

            $lines[] = $guide_line;

            if ( ! empty( $place_values['guide_comment'] ) ) {
                $lines[] = 'Comentario del guía: ' . $place_values['guide_comment'];
            }
        }

        $lines[] = '';
    }

    if ( ! empty( $payload['general_comments'] ) ) {
        $lines[] = 'Comentario final';
        $lines[] = $payload['general_comments'];
    }

    return implode( "\n", $lines );
}

function ukiyo_portal_build_feedback_summary( $trip, $user, $payload ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );
    $user_obj  = $user instanceof WP_User ? $user : get_user_by( 'id', absint( $user ) );

    return ukiyo_portal_build_feedback_summary_from_schema(
        get_the_title( $trip_post ),
        $user_obj instanceof WP_User ? $user_obj->display_name : '',
        ukiyo_portal_get_feedback_form_schema( $trip_post ),
        $payload
    );
}

function ukiyo_portal_save_feedback_submission( $trip, $user, $payload ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );
    $user_obj  = $user instanceof WP_User ? $user : get_user_by( 'id', absint( $user ) );

    if ( ! $trip_post instanceof WP_Post || ! $user_obj instanceof WP_User ) {
        return new WP_Error( 'invalid_feedback_target', 'No hemos podido guardar este feedback.' );
    }

    $existing = ukiyo_portal_get_feedback_for_trip_user( $trip_post->ID, $user_obj->ID );
    $title    = sprintf( 'Feedback · %s · %s', get_the_title( $trip_post ), $user_obj->display_name );
    $content  = ukiyo_portal_build_feedback_summary( $trip_post, $user_obj, $payload );
    $postarr  = [
        'post_type'    => 'ukiyo_feedback_viaje',
        'post_status'  => 'publish',
        'post_title'   => $title,
        'post_content' => $content,
    ];

    if ( $existing instanceof WP_Post ) {
        $postarr['ID'] = $existing->ID;
        $feedback_id   = wp_update_post( wp_slash( $postarr ), true );
    } else {
        $feedback_id = wp_insert_post( wp_slash( $postarr ), true );
    }

    if ( is_wp_error( $feedback_id ) ) {
        return $feedback_id;
    }

    update_post_meta( $feedback_id, 'ukiyo_feedback_trip_id', $trip_post->ID );
    update_post_meta( $feedback_id, 'ukiyo_feedback_user_id', $user_obj->ID );
    update_post_meta( $feedback_id, 'ukiyo_feedback_mode', 'portal' );
    update_post_meta( $feedback_id, 'ukiyo_feedback_payload', $payload );
    update_post_meta( $feedback_id, 'ukiyo_feedback_submitted_at', current_time( 'mysql' ) );

    return $feedback_id;
}

function ukiyo_portal_save_manual_feedback_submission( $slug, $manual_trip, $recipient_name, $recipient_email, $payload ) {
    $slug            = sanitize_title( (string) $slug );
    $recipient_name  = sanitize_text_field( (string) $recipient_name );
    $recipient_email = strtolower( sanitize_email( $recipient_email ) );

    if ( '' === $slug || ! is_array( $manual_trip ) || ! is_email( $recipient_email ) ) {
        return new WP_Error( 'invalid_manual_feedback_target', 'No hemos podido guardar este feedback.' );
    }

    $existing = ukiyo_portal_get_feedback_for_manual_recipient( $slug, $recipient_email );
    $title    = sprintf( 'Feedback manual · %s · %s', $manual_trip['title'], $recipient_name ? $recipient_name : $recipient_email );
    $content  = ukiyo_portal_build_feedback_summary_from_schema(
        $manual_trip['title'],
        $recipient_name ? $recipient_name : $recipient_email,
        ukiyo_portal_get_feedback_form_schema_from_trip_data( $manual_trip ),
        $payload
    );
    $postarr  = [
        'post_type'    => 'ukiyo_feedback_viaje',
        'post_status'  => 'publish',
        'post_title'   => $title,
        'post_content' => $content,
    ];

    if ( $existing instanceof WP_Post ) {
        $postarr['ID'] = $existing->ID;
        $feedback_id   = wp_update_post( wp_slash( $postarr ), true );
    } else {
        $feedback_id = wp_insert_post( wp_slash( $postarr ), true );
    }

    if ( is_wp_error( $feedback_id ) ) {
        return $feedback_id;
    }

    update_post_meta( $feedback_id, 'ukiyo_feedback_mode', 'manual' );
    update_post_meta( $feedback_id, 'ukiyo_feedback_manual_slug', $slug );
    update_post_meta( $feedback_id, 'ukiyo_feedback_manual_name', $recipient_name );
    update_post_meta( $feedback_id, 'ukiyo_feedback_manual_email', $recipient_email );
    update_post_meta( $feedback_id, 'ukiyo_feedback_payload', $payload );
    update_post_meta( $feedback_id, 'ukiyo_feedback_submitted_at', current_time( 'mysql' ) );

    return $feedback_id;
}

function ukiyo_portal_get_feedback_request_context() {
    static $context = null;
    static $loaded  = false;

    if ( $loaded ) {
        return $context;
    }

    $loaded  = true;
    $context = [
        'type'            => '',
        'trip'            => null,
        'user'            => null,
        'manual_slug'     => '',
        'manual_trip'     => null,
        'recipient_name'  => '',
        'recipient_email' => '',
        'token'           => '',
        'valid'           => false,
    ];

    if ( ! ukiyo_portal_is_feedback_request() ) {
        return $context;
    }

    if ( ukiyo_portal_is_manual_feedback_request() ) {
        $slug        = sanitize_title( (string) get_query_var( 'ukiyo_portal_trip' ) );
        $token       = sanitize_text_field( (string) get_query_var( 'ukiyo_portal_token' ) );
        $manual_trip = $slug ? ukiyo_portal_get_manual_feedback_trip( $slug ) : null;

        if ( ! is_array( $manual_trip ) || '' === $token ) {
            return $context;
        }

        $record = ukiyo_portal_find_manual_feedback_token_record_by_slug_and_token( $slug, $token );

        $context = [
            'type'            => 'manual',
            'trip'            => null,
            'user'            => null,
            'manual_slug'     => $slug,
            'manual_trip'     => $manual_trip,
            'recipient_name'  => is_array( $record ) ? (string) $record['recipient_name'] : '',
            'recipient_email' => is_array( $record ) ? (string) $record['recipient_email'] : '',
            'token'           => $token,
            'valid'           => is_array( $record ),
        ];

        return $context;
    }

    $trip_slug = sanitize_title( (string) get_query_var( 'ukiyo_portal_trip' ) );
    $user_id   = absint( get_query_var( 'ukiyo_portal_user_id' ) );
    $token     = sanitize_text_field( (string) get_query_var( 'ukiyo_portal_token' ) );
    $trip      = $trip_slug ? ukiyo_portal_get_trip_by_slug( $trip_slug ) : null;
    $user      = $user_id ? get_user_by( 'id', $user_id ) : null;

    if ( ! $trip instanceof WP_Post || ! $user instanceof WP_User || '' === $token ) {
        return $context;
    }

    $tokens       = ukiyo_portal_get_feedback_tokens( $user->ID );
    $stored_token = isset( $tokens[ $trip->ID ]['token'] ) ? (string) $tokens[ $trip->ID ]['token'] : '';

    $context = [
        'type'            => 'portal',
        'trip'            => $trip,
        'user'            => $user,
        'manual_slug'     => '',
        'manual_trip'     => null,
        'recipient_name'  => $user->display_name,
        'recipient_email' => $user->user_email,
        'token'           => $token,
        'valid'           => hash_equals( $stored_token, $token ),
    ];

    return $context;
}

function ukiyo_portal_get_feedback_request_url_from_context( $context ) {
    if ( 'manual' === ( $context['type'] ?? '' ) ) {
        return ukiyo_portal_get_manual_feedback_url(
            $context['manual_slug'] ?? '',
            $context['recipient_name'] ?? '',
            $context['recipient_email'] ?? ''
        );
    }

    if ( 'portal' === ( $context['type'] ?? '' ) ) {
        return ukiyo_portal_get_feedback_url( $context['trip'] ?? null, $context['user'] ?? null );
    }

    return home_url( '/' );
}

function ukiyo_portal_process_feedback_request() {
    if ( ! ukiyo_portal_is_feedback_request() || 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ) ) {
        return;
    }

    if ( empty( $_POST['ukiyo_portal_feedback_submit'] ) ) {
        return;
    }

    $context = ukiyo_portal_get_feedback_request_context();

    if ( empty( $context['valid'] ) ) {
        wp_die( 'Enlace de feedback no válido.' );
    }

    if (
        ! isset( $_POST['ukiyo_portal_feedback_nonce'] ) ||
        ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ukiyo_portal_feedback_nonce'] ) ), 'ukiyo_portal_feedback_submit' )
    ) {
        wp_safe_redirect( add_query_arg( 'feedback_notice', 'invalid', ukiyo_portal_get_feedback_request_url_from_context( $context ) ) );
        exit;
    }

    $raw_payload = isset( $_POST['feedback'] ) && is_array( $_POST['feedback'] ) ? wp_unslash( $_POST['feedback'] ) : [];

    if ( 'manual' === $context['type'] ) {
        $schema  = ukiyo_portal_get_feedback_form_schema_from_trip_data( $context['manual_trip'] );
        $payload = ukiyo_portal_sanitize_feedback_payload_from_schema( $schema, $raw_payload );
        $saved   = ukiyo_portal_save_manual_feedback_submission(
            $context['manual_slug'],
            $context['manual_trip'],
            $context['recipient_name'],
            $context['recipient_email'],
            $payload
        );
    } else {
        $payload = ukiyo_portal_sanitize_feedback_payload( $context['trip'], $raw_payload );
        $saved   = ukiyo_portal_save_feedback_submission( $context['trip'], $context['user'], $payload );
    }

    if ( is_wp_error( $saved ) ) {
        wp_safe_redirect( add_query_arg( 'feedback_notice', 'error', ukiyo_portal_get_feedback_request_url_from_context( $context ) ) );
        exit;
    }

    wp_safe_redirect( add_query_arg( 'feedback_notice', 'submitted', ukiyo_portal_get_feedback_request_url_from_context( $context ) ) );
    exit;
}
add_action( 'template_redirect', 'ukiyo_portal_process_feedback_request', 0 );

function ukiyo_portal_get_feedback_email_html( $args = [] ) {
    $defaults = [
        'client_name' => 'viajero',
        'trip_name'   => 'vuestro viaje',
        'form_url'    => home_url( '/' ),
    ];

    $args       = wp_parse_args( $args, $defaults );
    $react_path = get_template_directory() . '/emails/out/feedback_viaje.html';

    if ( ! file_exists( $react_path ) ) {
        return '';
    }

    $html = file_get_contents( $react_path );

    if ( false === $html ) {
        return '';
    }

    $html = strtr(
        $html,
        [
            '{{CLIENT_NAME}}' => $args['client_name'],
            '{{TRIP_NAME}}'   => $args['trip_name'],
            '{{FORM_URL}}'    => $args['form_url'],
        ]
    );

    return ukiyo_email_replace_static_urls( $html );
}

function ukiyo_portal_send_feedback_request_email( $trip, $user ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );
    $user_obj  = $user instanceof WP_User ? $user : get_user_by( 'id', absint( $user ) );

    if ( ! $trip_post instanceof WP_Post || ! $user_obj instanceof WP_User ) {
        return new WP_Error( 'invalid_feedback_email_target', 'Selecciona un viaje y un viajero válidos.' );
    }

    $form_url = ukiyo_portal_get_feedback_url( $trip_post, $user_obj, true );
    $html     = ukiyo_portal_get_feedback_email_html(
        [
            'client_name' => $user_obj->display_name,
            'trip_name'   => get_the_title( $trip_post ),
            'form_url'    => $form_url,
        ]
    );

    if ( '' === $html ) {
        return new WP_Error( 'missing_feedback_template', 'No se ha encontrado la plantilla de email de feedback.' );
    }

    $subject = sprintf( 'Cuéntanos cómo fue %s', get_the_title( $trip_post ) );
    $sent    = wp_mail(
        $user_obj->user_email,
        $subject,
        $html,
        [ 'Content-Type: text/html; charset=UTF-8' ]
    );

    if ( ! $sent ) {
        return new WP_Error( 'feedback_email_failed', 'WordPress no pudo enviar el email de finalización.' );
    }

    return true;
}

function ukiyo_portal_send_manual_feedback_request_email( $manual_slug, $recipient_name, $recipient_email ) {
    $manual_slug     = sanitize_title( (string) $manual_slug );
    $recipient_name  = sanitize_text_field( (string) $recipient_name );
    $recipient_email = sanitize_email( $recipient_email );
    $manual_trip     = ukiyo_portal_get_manual_feedback_trip( $manual_slug );

    if ( ! is_array( $manual_trip ) ) {
        return new WP_Error( 'invalid_manual_trip', 'Selecciona un viaje manual válido.' );
    }

    if ( ! is_email( $recipient_email ) ) {
        return new WP_Error( 'invalid_manual_email', 'Introduce un correo válido para enviar el feedback.' );
    }

    $form_url = ukiyo_portal_get_manual_feedback_url( $manual_slug, $recipient_name, $recipient_email, true );
    $html     = ukiyo_portal_get_feedback_email_html(
        [
            'client_name' => $recipient_name ? $recipient_name : 'viajero',
            'trip_name'   => $manual_trip['title'],
            'form_url'    => $form_url,
        ]
    );

    if ( '' === $html ) {
        return new WP_Error( 'missing_feedback_template', 'No se ha encontrado la plantilla de email de feedback.' );
    }

    $subject = sprintf( 'Cuéntanos cómo fue %s', $manual_trip['title'] );
    $sent    = wp_mail(
        $recipient_email,
        $subject,
        $html,
        [ 'Content-Type: text/html; charset=UTF-8' ]
    );

    if ( ! $sent ) {
        return new WP_Error( 'feedback_email_failed', 'WordPress no pudo enviar el email de finalización.' );
    }

    return true;
}

function ukiyo_portal_get_feedback_email_trip_options() {
    return get_posts(
        [
            'post_type'      => 'ukiyo_viaje',
            'post_status'    => [ 'publish', 'draft', 'pending', 'future', 'private' ],
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        ]
    );
}

function ukiyo_portal_get_feedback_trip_client_users( $trip ) {
    $trip_post = $trip instanceof WP_Post ? $trip : get_post( $trip );

    if ( ! $trip_post instanceof WP_Post ) {
        return [];
    }

    $trip_data = ukiyo_portal_get_trip_data( $trip_post );
    $user_ids  = array_values( array_filter( array_map( 'absint', (array) $trip_data['users'] ) ) );

    if ( empty( $user_ids ) ) {
        return [];
    }

    $users = get_users(
        [
            'include' => $user_ids,
            'orderby' => 'display_name',
            'order'   => 'ASC',
        ]
    );

    return array_values(
        array_filter(
            $users,
            static function ( $user ) {
                return $user instanceof WP_User && ukiyo_portal_is_client_user( $user->ID );
            }
        )
    );
}

function ukiyo_portal_get_feedback_notice_transient_key() {
    return 'ukiyo_portal_feedback_notice_' . get_current_user_id();
}

function ukiyo_portal_store_feedback_notice( $notice ) {
    set_transient( ukiyo_portal_get_feedback_notice_transient_key(), (array) $notice, 10 * MINUTE_IN_SECONDS );
}

function ukiyo_portal_consume_feedback_notice() {
    $key    = ukiyo_portal_get_feedback_notice_transient_key();
    $notice = get_transient( $key );

    if ( false !== $notice ) {
        delete_transient( $key );
    }

    return is_array( $notice ) ? $notice : [];
}

function ukiyo_portal_handle_send_feedback_request_email() {
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_die( 'No autorizado.' );
    }

    check_admin_referer( 'ukiyo_portal_send_feedback_request' );

    $trip_id = isset( $_POST['feedback_trip_id'] ) ? absint( $_POST['feedback_trip_id'] ) : 0;
    $user_id = isset( $_POST['feedback_user_id'] ) ? absint( $_POST['feedback_user_id'] ) : 0;
    $trip    = $trip_id ? get_post( $trip_id ) : null;
    $user    = $user_id ? get_user_by( 'id', $user_id ) : null;

    if ( ! $trip instanceof WP_Post || 'ukiyo_viaje' !== $trip->post_type ) {
        ukiyo_portal_store_feedback_notice(
            [
                'type'    => 'error',
                'message' => 'Selecciona un viaje válido para enviar el formulario de finalización.',
            ]
        );
        wp_safe_redirect( ukiyo_portal_get_emails_page_url() );
        exit;
    }

    if ( ! $user instanceof WP_User ) {
        ukiyo_portal_store_feedback_notice(
            [
                'type'    => 'error',
                'message' => 'Selecciona un viajero válido.',
            ]
        );
        wp_safe_redirect( ukiyo_portal_get_emails_page_url( [ 'feedback_trip_id' => $trip_id ] ) );
        exit;
    }

    $result = ukiyo_portal_send_feedback_request_email( $trip, $user );

    if ( is_wp_error( $result ) ) {
        ukiyo_portal_store_feedback_notice(
            [
                'type'    => 'error',
                'message' => $result->get_error_message(),
            ]
        );
        wp_safe_redirect( ukiyo_portal_get_emails_page_url( [ 'feedback_trip_id' => $trip_id ] ) );
        exit;
    }

    ukiyo_portal_store_feedback_notice(
        [
            'type'    => 'success',
            'message' => sprintf( 'Email de finalización enviado a %s.', $user->user_email ),
        ]
    );

    wp_safe_redirect( ukiyo_portal_get_emails_page_url( [ 'feedback_trip_id' => $trip_id ] ) );
    exit;
}
add_action( 'admin_post_ukiyo_portal_send_feedback_request', 'ukiyo_portal_handle_send_feedback_request_email' );

function ukiyo_portal_handle_send_manual_feedback_request_email() {
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_die( 'No autorizado.' );
    }

    check_admin_referer( 'ukiyo_portal_send_manual_feedback_request' );

    $manual_slug     = isset( $_POST['manual_feedback_trip_slug'] ) ? sanitize_title( wp_unslash( $_POST['manual_feedback_trip_slug'] ) ) : '';
    $recipient_name  = isset( $_POST['manual_feedback_recipient_name'] ) ? sanitize_text_field( wp_unslash( $_POST['manual_feedback_recipient_name'] ) ) : '';
    $recipient_email = isset( $_POST['manual_feedback_recipient_email'] ) ? sanitize_email( wp_unslash( $_POST['manual_feedback_recipient_email'] ) ) : '';
    $result          = ukiyo_portal_send_manual_feedback_request_email( $manual_slug, $recipient_name, $recipient_email );

    if ( is_wp_error( $result ) ) {
        ukiyo_portal_store_feedback_notice(
            [
                'type'    => 'error',
                'message' => $result->get_error_message(),
            ]
        );
        wp_safe_redirect( ukiyo_portal_get_emails_page_url() );
        exit;
    }

    $trip = ukiyo_portal_get_manual_feedback_trip( $manual_slug );

    ukiyo_portal_store_feedback_notice(
        [
            'type'    => 'success',
            'message' => sprintf(
                'Email de feedback manual enviado a %1$s para %2$s.',
                $recipient_email,
                is_array( $trip ) ? $trip['title'] : $manual_slug
            ),
        ]
    );

    wp_safe_redirect( ukiyo_portal_get_emails_page_url() );
    exit;
}
add_action( 'admin_post_ukiyo_portal_send_manual_feedback_request', 'ukiyo_portal_handle_send_manual_feedback_request_email' );
