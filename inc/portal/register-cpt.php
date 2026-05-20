<?php
/**
 * Registro del CPT del portal.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action(
    'init',
    function () {
        $labels = [
            'name'               => 'Portal del Aventurero',
            'singular_name'      => 'Viaje privado',
            'add_new_item'       => 'Añadir viaje privado',
            'edit_item'          => 'Editar viaje privado',
            'new_item'           => 'Nuevo viaje privado',
            'view_item'          => 'Ver viaje privado',
            'search_items'       => 'Buscar viajes privados',
            'not_found'          => 'No se han encontrado viajes',
            'not_found_in_trash' => 'No hay viajes en la papelera',
            'menu_name'          => 'Portal del Aventurero',
        ];

        register_post_type(
            'ukiyo_viaje',
            [
                'labels'             => $labels,
                'public'             => false,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'show_in_rest'       => false,
                'exclude_from_search'=> true,
                'publicly_queryable' => false,
                'has_archive'        => false,
                'rewrite'            => false,
                'menu_icon'          => 'dashicons-tickets-alt',
                'supports'           => [ 'title', 'thumbnail', 'revisions' ],
            ]
        );
    }
);

add_filter(
    'manage_edit-ukiyo_viaje_columns',
    function ( $columns ) {
        $reordered = [];

        foreach ( $columns as $key => $label ) {
            $reordered[ $key ] = $label;

            if ( 'title' === $key ) {
                $reordered['ukiyo_portal_dates']     = 'Fechas del viaje';
                $reordered['ukiyo_portal_travelers'] = 'Viajero';
                $reordered['ukiyo_portal_proposal_response'] = 'Propuesta';
            }
        }

        return $reordered;
    }
);

add_action(
    'manage_ukiyo_viaje_posts_custom_column',
    function ( $column, $post_id ) {
        if ( 'ukiyo_portal_dates' === $column ) {
            $dates = trim( (string) get_post_meta( $post_id, 'ukiyo_portal_dates', true ) );

            echo '' !== $dates ? esc_html( $dates ) : '<span style="color:#8a8f98;">Sin definir</span>';
            return;
        }

        if ( 'ukiyo_portal_travelers' === $column ) {
            $travelers = ukiyo_portal_parse_travelers( (string) get_post_meta( $post_id, 'ukiyo_portal_travelers', true ) );
            $recipient = trim( (string) get_post_meta( $post_id, 'ukiyo_portal_proposal_recipient_name', true ) );

            if ( ! empty( $travelers ) ) {
                $primary = array_slice( $travelers, 0, 2 );
                $extra   = count( $travelers ) - count( $primary );
                $label   = implode( ', ', $primary );

                if ( $extra > 0 ) {
                    $label .= ' +' . $extra;
                }

                echo esc_html( $label );
                return;
            }

            if ( '' !== $recipient ) {
                ?>
                <strong><?php echo esc_html( $recipient ); ?></strong><br />
                <span style="color:#8a8f98;">Propuesta personalizada</span>
                <?php
                return;
            }

            echo '<span style="color:#8a8f98;">Sin definir</span>';
            return;
        }

        if ( 'ukiyo_portal_proposal_response' !== $column ) {
            return;
        }

        $access_type = (string) get_post_meta( $post_id, 'ukiyo_portal_access_type', true );

        if ( 'proposal' !== $access_type ) {
            echo '<span style="color:#8a8f98;">—</span>';
            return;
        }

        $meta = ukiyo_portal_get_proposal_response_status_meta( (string) get_post_meta( $post_id, 'ukiyo_portal_proposal_response_status', true ) );
        ?>
        <span style="display:inline-flex;align-items:center;gap:8px;font-weight:700;color:<?php echo esc_attr( $meta['color'] ); ?>;">
            <span style="display:inline-flex;align-items:center;justify-content:center;width:24px;height:24px;border-radius:999px;background:color-mix(in srgb, <?php echo esc_attr( $meta['color'] ); ?> 14%, white);border:1px solid color-mix(in srgb, <?php echo esc_attr( $meta['color'] ); ?> 18%, white);"><?php echo esc_html( $meta['icon'] ); ?></span>
            <span><?php echo esc_html( $meta['label'] ); ?></span>
        </span>
        <?php
    },
    10,
    2
);
