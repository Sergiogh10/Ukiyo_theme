<?php
/**
 * Vista privada de un viaje del Portal del Aventurero.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$trip = ukiyo_portal_get_current_trip();

if ( ! $trip instanceof WP_Post ) {
    ukiyo_portal_force_404();
}

$data                   = ukiyo_portal_get_trip_data( $trip );
$hero                   = ukiyo_portal_get_trip_hero_image_url( $trip );
$route_context          = $data['destination'] ? $data['destination'] : get_the_title( $trip );
$dedicated_route_points = ukiyo_portal_get_route_map_points( $data['route_map_points'], $route_context );
$uses_dedicated_route_map = count( $dedicated_route_points ) > 1;
$route_points           = $uses_dedicated_route_map ? $dedicated_route_points : ukiyo_portal_get_route_points( $data['itinerary'], $route_context );
$single_place_view      = ! $uses_dedicated_route_map && 1 === count( (array) $data['itinerary'] );
$single_place_map_points  = [];

if ( $single_place_view && ! empty( $data['itinerary'][0] ) ) {
    $single_place_map_points = ukiyo_portal_get_place_day_map_points( $data['itinerary'][0], $route_context );
}

$has_portal_map       = $uses_dedicated_route_map || ( $single_place_view && ! empty( $single_place_map_points ) ) || ( ! $single_place_view && count( $route_points ) > 1 );
$flights              = ukiyo_portal_normalize_flights( $data['flights'] );
$airline_label        = ukiyo_portal_get_airline_label( $flights['airline'], $flights['airline_custom'] );
$airline_logo         = ukiyo_portal_get_airline_logo_data_uri( $flights['airline'], $flights['airline_custom'] );
$has_outbound_flight = '' !== trim( implode( '', [ $flights['outbound_departure_airport'], $flights['outbound_arrival_airport'], $flights['outbound_departure_time'], $flights['outbound_arrival_time'], $flights['outbound_flight_number'] ] ) );
$has_return_flight   = '' !== trim( implode( '', [ $flights['return_departure_airport'], $flights['return_arrival_airport'], $flights['return_departure_time'], $flights['return_arrival_time'], $flights['return_flight_number'] ] ) );
$has_flights      = $has_outbound_flight || $has_return_flight;
$outbound_departure_airport = ukiyo_portal_parse_airport_display( $flights['outbound_departure_airport'] );
$outbound_arrival_airport   = ukiyo_portal_parse_airport_display( $flights['outbound_arrival_airport'] );
$return_departure_airport   = ukiyo_portal_parse_airport_display( $flights['return_departure_airport'] );
$return_arrival_airport     = ukiyo_portal_parse_airport_display( $flights['return_arrival_airport'] );
$outbound_duration          = ukiyo_portal_format_flight_duration(
    $flights['outbound_departure_time'],
    $flights['outbound_arrival_time'],
    isset( $flights['outbound_departure_timezone'] ) ? $flights['outbound_departure_timezone'] : '',
    isset( $flights['outbound_arrival_timezone'] ) ? $flights['outbound_arrival_timezone'] : ''
);
$return_duration            = ukiyo_portal_format_flight_duration(
    $flights['return_departure_time'],
    $flights['return_arrival_time'],
    isset( $flights['return_departure_timezone'] ) ? $flights['return_departure_timezone'] : '',
    isset( $flights['return_arrival_timezone'] ) ? $flights['return_arrival_timezone'] : ''
);
$document_types   = ukiyo_portal_get_document_types();
$contact_profile  = ukiyo_portal_get_global_contact_profile();
$saily_profile    = ukiyo_portal_get_saily_profile();
$saily_image_src  = ! empty( $saily_profile['image'] ) && 0 === strpos( (string) $saily_profile['image'], 'data:image/' )
    ? esc_attr( $saily_profile['image'] )
    : esc_url( $saily_profile['image'] );
$country_heading  = $data['country_story_title'] ?: ( $data['destination'] ? sprintf( 'Conociendo %s', $data['destination'] ) : 'Conociendo el destino' );
$country_subtitle = $data['country_story_subtitle'] ?: 'Una breve historia editorial para entender mejor el destino antes de viajar.';
$country_copy     = $data['country_story'] ?: 'Aquí encontrarás una breve mirada editorial al destino para entender mejor el país antes de viajar.';
$traveler_names   = ukiyo_portal_parse_travelers( $data['travelers'] );
$packing_checklist_defaults = [
    [
        'id'      => 'passport',
        'label'   => 'Pasaporte o DNI',
        'checked' => false,
    ],
    [
        'id'      => 'insurance',
        'label'   => 'Seguro y documentación del viaje',
        'checked' => false,
    ],
    [
        'id'      => 'wallet',
        'label'   => 'Tarjetas, efectivo y cartera',
        'checked' => false,
    ],
    [
        'id'      => 'charger',
        'label'   => 'Cargador y batería externa',
        'checked' => false,
    ],
    [
        'id'      => 'adapter',
        'label'   => 'Adaptador de enchufe',
        'checked' => false,
    ],
    [
        'id'      => 'medication',
        'label'   => 'Medicación personal y básicos',
        'checked' => false,
    ],
    [
        'id'      => 'toiletry',
        'label'   => 'Neceser de mano',
        'checked' => false,
    ],
    [
        'id'      => 'clothes',
        'label'   => 'Ropa clave para el clima del viaje',
        'checked' => false,
    ],
];

$general_recommendations   = [];
$recommendations_by_place  = [];

foreach ( (array) $data['recommendations'] as $recommendation_item ) {
    $recommendation_item = (array) $recommendation_item;
    $recommendation_place = trim( (string) ( isset( $recommendation_item['place'] ) ? $recommendation_item['place'] : '' ) );

    if ( '' === $recommendation_place ) {
        $general_recommendations[] = $recommendation_item;
        continue;
    }

    if ( ! isset( $recommendations_by_place[ $recommendation_place ] ) ) {
        $recommendations_by_place[ $recommendation_place ] = [];
    }

    $recommendations_by_place[ $recommendation_place ][] = $recommendation_item;
}

$render_recommendation_card = static function ( $item ) {
    $item                     = wp_parse_args(
        (array) $item,
        [
            'name'        => '',
            'category'    => '',
            'rating'      => '',
            'description' => '',
            'note'        => '',
            'cta_label'   => '',
            'url'         => '',
            'image_id'    => 0,
        ]
    );
    $image_url                = $item['image_id'] ? wp_get_attachment_image_url( $item['image_id'], 'large' ) : '';
    $recommendation_rating_raw = str_replace( ',', '.', trim( (string) $item['rating'] ) );
    $recommendation_rating    = is_numeric( $recommendation_rating_raw ) ? max( 0, min( 5, (float) $recommendation_rating_raw ) ) : 0;
    $recommendation_rating_ui = $recommendation_rating ? number_format_i18n( $recommendation_rating, 1 ) : '';
    $category_meta            = ukiyo_portal_get_recommendation_category_meta( $item['category'] );
    ?>
    <article class="portal-recommendation-card portal-recommendation-card--<?php echo esc_attr( $category_meta['slug'] ); ?>">
        <?php if ( $image_url ) : ?>
            <div class="portal-recommendation-card__media">
                <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" />
            </div>
        <?php endif; ?>
        <div class="portal-recommendation-card__body">
            <div class="portal-recommendation-card__category">
                <span class="portal-recommendation-card__icon" aria-hidden="true"><?php echo esc_html( $category_meta['icon'] ); ?></span>
                <span class="portal-recommendation-card__category-label"><?php echo esc_html( $category_meta['label'] ); ?></span>
            </div>
            <div class="portal-recommendation-card__head">
                <h4><?php echo esc_html( $item['name'] ); ?></h4>
                <?php if ( $item['note'] ) : ?>
                    <span class="portal-recommendation-card__note"><?php echo esc_html( $item['note'] ); ?></span>
                <?php endif; ?>
            </div>
            <?php if ( $item['description'] ) : ?>
                <div class="portal-rich-text"><?php echo wpautop( wp_kses_post( $item['description'] ) ); ?></div>
            <?php endif; ?>
            <?php if ( $recommendation_rating_ui ) : ?>
                <div class="portal-rating-badge portal-rating-badge--recommendation">
                    <span class="portal-rating-badge__brand">Google</span>
                    <strong><?php echo esc_html( $recommendation_rating_ui ); ?></strong>
                    <span class="portal-rating-badge__stars" aria-hidden="true">★★★★★</span>
                    <small>sobre 5</small>
                </div>
            <?php endif; ?>
            <?php if ( $item['url'] ) : ?>
                <a class="portal-btn portal-btn--ghost portal-recommendation-card__cta" href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noreferrer">
                    <span class="portal-recommendation-card__cta-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" role="img" focusable="false" aria-hidden="true">
                            <path fill="currentColor" d="M10.59 13.41a1 1 0 0 1 0-1.41l4.59-4.59H13a1 1 0 1 1 0-2h5.59A1.41 1.41 0 0 1 20 6.82V12.4a1 1 0 1 1-2 0V8.23l-4.59 4.59a1 1 0 0 1-1.41 0ZM7 6h3a1 1 0 1 1 0 2H7a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-3a1 1 0 1 1 2 0v3a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V9a3 3 0 0 1 3-3Z"/>
                        </svg>
                    </span>
                    <span><?php echo esc_html( $item['cta_label'] ?: 'Ver recurso' ); ?></span>
                </a>
            <?php endif; ?>
        </div>
    </article>
    <?php
};

// El Portal del Aventurero usa el rediseño importado (Claude Design / Portal del Aventurero.html)
// como vista por defecto. El maquetado está en inc/portal/trip-redesign.php.
require __DIR__ . '/inc/portal/trip-redesign.php';
return;
// UKIYO_FIN_PLANTILLA_VIAJE
