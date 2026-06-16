<?php
/**
 * WP-CLI command for creating UKIYO content from JSON.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
    return;
}

require_once __DIR__ . '/creator-validators.php';
require_once __DIR__ . '/creator-builders.php';

class Ukiyo_Creator_Command extends WP_CLI_Command {
    /**
     * Creates UKIYO content from a JSON file.
     *
     * ## OPTIONS
     *
     * --type=<type>
     * : post, viaje_autor or portal.
     *
     * --from-json=<path>
     * : Absolute or container-readable path to a JSON payload.
     *
     * [--dry-run]
     * : Validate and show summary without creating anything.
     *
     * [--yes]
     * : Required to create records in V1.
     *
     * ## EXAMPLES
     *
     *     wp ukiyo create --type=post --from-json=/tmp/post.json --dry-run
     *     wp ukiyo create --type=portal --from-json=/tmp/portal.json --yes
     */
    public function __invoke( $args, $assoc_args ) {
        $type = isset( $assoc_args['type'] ) ? sanitize_key( (string) $assoc_args['type'] ) : '';

        if ( ! in_array( $type, ukiyo_creator_allowed_types(), true ) ) {
            WP_CLI::error( 'Debes indicar --type=post, --type=viaje_autor o --type=portal.' );
        }

        $payload = ukiyo_creator_read_json_file( isset( $assoc_args['from-json'] ) ? (string) $assoc_args['from-json'] : '' );
        if ( is_wp_error( $payload ) ) {
            WP_CLI::error( $payload->get_error_message() );
        }

        $plan = ukiyo_creator_build_plan( $type, $payload );
        if ( is_wp_error( $plan ) ) {
            WP_CLI::error( $plan->get_error_message() );
        }

        $this->render_summary( $plan );

        if ( ! empty( $assoc_args['dry-run'] ) ) {
            WP_CLI::success( 'Dry-run correcto. No se ha creado ningún registro.' );
            return;
        }

        if ( empty( $assoc_args['yes'] ) ) {
            WP_CLI::confirm( 'V1 solo crea registros si confirmas explícitamente. ¿Crear este borrador?', $assoc_args );
        }

        $post_id = ukiyo_creator_create_from_plan( $plan );
        if ( is_wp_error( $post_id ) ) {
            WP_CLI::error( $post_id->get_error_message() );
        }

        $this->render_created( (int) $post_id, $plan );
    }

    private function render_summary( $plan ) {
        WP_CLI::line( 'Resumen de creación UKIYO' );
        WP_CLI::line( 'Tipo: ' . $plan['type'] );
        WP_CLI::line( 'Post type: ' . $plan['post_type'] );
        WP_CLI::line( 'Título: ' . $plan['title'] );
        WP_CLI::line( 'Slug: ' . $plan['slug'] );
        WP_CLI::line( 'Estado: draft' );

        if ( 'post' === $plan['type'] ) {
            WP_CLI::line( 'Categoría: ' . $plan['category']['name'] . ' (' . $plan['category']['slug'] . ')' );
            WP_CLI::line( 'Landing enlazada: ' . $plan['extra']['landing_url'] );
            WP_CLI::line( 'Rank Math configurado: ' . ( $plan['rank_math']['enabled'] ? 'sí' : 'no' ) );
        }

        if ( 'viaje_autor' === $plan['type'] ) {
            WP_CLI::line( 'Destino: ' . $plan['extra']['destination'] );
            WP_CLI::line( 'Itinerario: ' . $plan['extra']['itinerary'] . ' días' );
            WP_CLI::line( 'FAQs: ' . $plan['extra']['faqs'] );
            WP_CLI::line( 'SEO configurado: ' . ( $plan['rank_math']['enabled'] ? 'sí' : 'no' ) );
        }

        if ( 'portal' === $plan['type'] ) {
            WP_CLI::line( 'Usuarios con acceso: ' . implode( ', ', $plan['extra']['users'] ) );
            WP_CLI::line( 'Tipo de acceso: ' . $plan['extra']['access_type'] );
            if ( $plan['extra']['access_type_raw'] !== $plan['extra']['access_type'] ) {
                WP_CLI::line( 'Tipo de acceso normalizado desde: ' . $plan['extra']['access_type_raw'] );
            }
            WP_CLI::line( 'Estado interno: ' . $plan['extra']['status'] );
            if ( $plan['extra']['status_raw'] !== $plan['extra']['status'] ) {
                WP_CLI::line( 'Estado normalizado desde: ' . $plan['extra']['status_raw'] );
            }
            WP_CLI::line( 'Etapas de itinerario: ' . $plan['extra']['itinerary'] );
        }
    }

    private function render_created( $post_id, $plan ) {
        $post = get_post( $post_id );

        WP_CLI::success( 'Creado correctamente.' );
        WP_CLI::line( 'Tipo: ' . $plan['type'] );
        WP_CLI::line( 'ID: ' . $post_id );
        WP_CLI::line( 'Título: ' . ( $post instanceof WP_Post ? $post->post_title : $plan['title'] ) );
        WP_CLI::line( 'Slug: ' . ( $post instanceof WP_Post ? $post->post_name : $plan['slug'] ) );
        WP_CLI::line( 'Estado: ' . ( $post instanceof WP_Post ? $post->post_status : 'draft' ) );
        WP_CLI::line( 'Editar: ' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) );

        if ( 'portal' === $plan['type'] ) {
            $token = (string) get_post_meta( $post_id, 'ukiyo_portal_proposal_token', true );
            WP_CLI::line( 'Usuarios con acceso: ' . implode( ', ', $plan['extra']['users'] ) );
            WP_CLI::line( 'Tipo de acceso: ' . $plan['extra']['access_type'] );
            WP_CLI::line( 'Token: ' . $token );
            WP_CLI::line( 'Vista previa: ' . ( function_exists( 'ukiyo_portal_get_trip_url' ) ? ukiyo_portal_get_trip_url( $post_id ) : get_preview_post_link( $post_id ) ) );
            return;
        }

        WP_CLI::line( 'Vista previa: ' . get_preview_post_link( $post_id ) );

        if ( 'post' === $plan['type'] ) {
            WP_CLI::line( 'Categoría: ' . $plan['category']['name'] );
            WP_CLI::line( 'Landing enlazada: ' . $plan['extra']['landing_url'] );
            WP_CLI::line( 'Rank Math configurado: ' . ( $plan['rank_math']['enabled'] ? 'sí' : 'no' ) );
        }

        if ( 'viaje_autor' === $plan['type'] ) {
            WP_CLI::line( 'Destino: ' . $plan['extra']['destination'] );
            WP_CLI::line( 'Duración: ' . $plan['meta']['duracion_viaje'] );
            WP_CLI::line( 'Grupo: ' . $plan['meta']['grupos_viaje'] );
            WP_CLI::line( 'Precio: ' . $plan['meta']['precio_final'] );
            WP_CLI::line( 'Itinerario: ' . $plan['extra']['itinerary'] );
            WP_CLI::line( 'FAQs: ' . $plan['extra']['faqs'] );
            WP_CLI::line( 'SEO configurado: ' . ( $plan['rank_math']['enabled'] ? 'sí' : 'no' ) );
        }
    }
}

WP_CLI::add_command( 'ukiyo create', 'Ukiyo_Creator_Command' );

