<?php
/**
 * Validation helpers for the UKIYO WP-CLI creator.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_creator_allowed_types() {
    return [ 'post', 'viaje_autor', 'portal' ];
}

function ukiyo_creator_post_type_for_type( $type ) {
    $map = [
        'post'        => 'post',
        'viaje_autor' => 'viaje_autor',
        'portal'      => 'ukiyo_viaje',
    ];

    return isset( $map[ $type ] ) ? $map[ $type ] : '';
}

function ukiyo_creator_read_json_file( $path ) {
    $path = (string) $path;

    if ( '' === trim( $path ) ) {
        return new WP_Error( 'missing_json_path', 'Debes indicar --from-json=/ruta/archivo.json.' );
    }

    if ( ! file_exists( $path ) || ! is_readable( $path ) ) {
        return new WP_Error( 'json_not_readable', 'No se puede leer el archivo JSON: ' . $path );
    }

    $contents = file_get_contents( $path );
    if ( false === $contents ) {
        return new WP_Error( 'json_read_failed', 'No se pudo leer el archivo JSON.' );
    }

    $payload = json_decode( $contents, true );
    if ( JSON_ERROR_NONE !== json_last_error() || ! is_array( $payload ) ) {
        return new WP_Error( 'invalid_json', 'El JSON no es válido: ' . json_last_error_msg() );
    }

    return $payload;
}

function ukiyo_creator_require_fields( $payload, $fields ) {
    foreach ( $fields as $field ) {
        $value = ukiyo_creator_get_nested_value( $payload, $field );
        if ( null === $value || '' === trim( (string) $value ) ) {
            return new WP_Error( 'missing_required_field', 'Falta el campo obligatorio: ' . $field );
        }
    }

    return true;
}

function ukiyo_creator_get_nested_value( $payload, $path, $default = null ) {
    $value = $payload;
    foreach ( explode( '.', $path ) as $segment ) {
        if ( ! is_array( $value ) || ! array_key_exists( $segment, $value ) ) {
            return $default;
        }

        $value = $value[ $segment ];
    }

    return $value;
}

function ukiyo_creator_validate_post_status( $payload ) {
    $status = isset( $payload['post_status'] ) ? sanitize_key( (string) $payload['post_status'] ) : 'draft';

    if ( '' === $status ) {
        $status = 'draft';
    }

    if ( 'draft' !== $status ) {
        return new WP_Error( 'invalid_post_status', 'En V1 solo se permite crear borradores con post_status=draft.' );
    }

    return 'draft';
}

function ukiyo_creator_validate_slug_available( $slug ) {
    $slug = sanitize_title( (string) $slug );

    if ( '' === $slug ) {
        return new WP_Error( 'missing_slug', 'El slug es obligatorio.' );
    }

    $existing = get_page_by_path( $slug, OBJECT, [ 'post', 'page', 'viaje_autor', 'ukiyo_viaje' ] );
    if ( $existing instanceof WP_Post ) {
        return new WP_Error(
            'duplicate_slug',
            sprintf(
                'El slug "%1$s" ya existe en %2$s con ID %3$d.',
                $slug,
                $existing->post_type,
                $existing->ID
            )
        );
    }

    return $slug;
}

function ukiyo_creator_resolve_category( $value ) {
    if ( null === $value || '' === trim( (string) $value ) ) {
        return new WP_Error( 'missing_category', 'Debes indicar una categoría existente.' );
    }

    if ( is_numeric( $value ) ) {
        $term = get_term( absint( $value ), 'category' );
        if ( $term instanceof WP_Term && ! is_wp_error( $term ) ) {
            return $term;
        }
    }

    $raw  = trim( (string) $value );
    $term = get_term_by( 'slug', sanitize_title( $raw ), 'category' );
    if ( ! $term ) {
        $term = get_term_by( 'name', $raw, 'category' );
    }

    if ( ! $term instanceof WP_Term ) {
        return new WP_Error( 'category_not_found', 'No existe la categoría: ' . $raw );
    }

    return $term;
}

function ukiyo_creator_validate_attachment_id( $id, $field_name ) {
    $id = absint( $id );
    if ( 0 === $id ) {
        return 0;
    }

    $attachment = get_post( $id );
    if ( ! $attachment instanceof WP_Post || 'attachment' !== $attachment->post_type ) {
        return new WP_Error( 'invalid_attachment', sprintf( 'La imagen indicada en %1$s no existe: %2$d.', $field_name, $id ) );
    }

    return $id;
}

function ukiyo_creator_validate_attachment_ids_in_payload( $payload, $fields ) {
    foreach ( $fields as $field ) {
        $value = ukiyo_creator_get_nested_value( $payload, $field, 0 );
        if ( is_array( $value ) ) {
            foreach ( $value as $index => $item ) {
                $validated = ukiyo_creator_validate_attachment_id( $item, $field . '[' . $index . ']' );
                if ( is_wp_error( $validated ) ) {
                    return $validated;
                }
            }
            continue;
        }

        $validated = ukiyo_creator_validate_attachment_id( $value, $field );
        if ( is_wp_error( $validated ) ) {
            return $validated;
        }
    }

    return true;
}

function ukiyo_creator_resolve_users( $users ) {
    $resolved = [];

    foreach ( (array) $users as $user_ref ) {
        $user = null;

        if ( is_numeric( $user_ref ) ) {
            $user = get_user_by( 'id', absint( $user_ref ) );
        } elseif ( is_string( $user_ref ) && is_email( $user_ref ) ) {
            $user = get_user_by( 'email', $user_ref );
        } elseif ( is_string( $user_ref ) ) {
            $user = get_user_by( 'login', $user_ref );
        }

        if ( ! $user instanceof WP_User ) {
            return new WP_Error( 'user_not_found', 'No existe el usuario: ' . ( is_scalar( $user_ref ) ? (string) $user_ref : wp_json_encode( $user_ref ) ) );
        }

        $resolved[] = (int) $user->ID;
    }

    return array_values( array_unique( $resolved ) );
}

function ukiyo_creator_validate_no_h1( $content ) {
    if ( preg_match( '/<h1\b/i', (string) $content ) ) {
        return new WP_Error( 'h1_not_allowed', 'El contenido no debe incluir H1. single.php ya genera el H1.' );
    }

    return true;
}

function ukiyo_creator_validate_rank_math_payload( $rank_math ) {
    $rank_math = is_array( $rank_math ) ? $rank_math : [];
    if ( empty( $rank_math['enabled'] ) ) {
        return true;
    }

    return true;
}

function ukiyo_creator_get_portal_statuses() {
    return function_exists( 'ukiyo_portal_get_trip_statuses' ) ? ukiyo_portal_get_trip_statuses() : [];
}

function ukiyo_creator_get_portal_access_types() {
    return function_exists( 'ukiyo_portal_get_access_types' ) ? ukiyo_portal_get_access_types() : [];
}

function ukiyo_creator_normalize_portal_status( $status ) {
    $status   = sanitize_key( (string) $status );
    $aliases  = [
        'en_curso'   => 'en-ruta',
        'en-curso'   => 'en-ruta',
        'finalizado' => 'completado',
    ];
    $statuses = ukiyo_creator_get_portal_statuses();

    if ( isset( $aliases[ $status ] ) ) {
        $status = $aliases[ $status ];
    }

    if ( ! isset( $statuses[ $status ] ) ) {
        return new WP_Error( 'invalid_portal_status', 'Estado de portal no permitido: ' . $status );
    }

    return $status;
}

function ukiyo_creator_normalize_portal_access_type( $access_type ) {
    $access_type  = sanitize_key( (string) $access_type );
    $aliases      = [
        'trip'      => 'private',
        'confirmed' => 'private',
    ];
    $access_types = ukiyo_creator_get_portal_access_types();

    if ( isset( $aliases[ $access_type ] ) ) {
        $access_type = $aliases[ $access_type ];
    }

    if ( ! isset( $access_types[ $access_type ] ) ) {
        return new WP_Error( 'invalid_portal_access_type', 'Tipo de acceso no permitido: ' . $access_type );
    }

    return $access_type;
}

function ukiyo_creator_validate_portal_proposal( $payload, $access_type ) {
    if ( 'proposal' !== $access_type ) {
        return true;
    }

    $proposal = isset( $payload['proposal'] ) && is_array( $payload['proposal'] ) ? $payload['proposal'] : [];
    foreach ( [ 'price', 'recipient_name', 'valid_until', 'includes', 'excludes' ] as $field ) {
        if ( empty( $proposal[ $field ] ) ) {
            return new WP_Error( 'missing_proposal_field', 'Para access_type=proposal falta proposal.' . $field );
        }
    }

    return true;
}

