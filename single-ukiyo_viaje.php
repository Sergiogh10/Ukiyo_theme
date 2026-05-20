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

get_header();
?>

<main class="ukiyo-portal ukiyo-portal-trip ukiyo-portal-trip--editorial">
    <section class="portal-trip-hero" style="background-image:url('<?php echo esc_url( $hero ); ?>')">
        <div class="portal-trip-hero__overlay"></div>
        <div class="portal-shell portal-trip-hero__content">
            <div class="portal-trip-hero__topline">
                <a class="portal-back-link" href="<?php echo esc_url( ukiyo_portal_get_dashboard_overview_url() ); ?>">Volver al portal</a>
                <span class="portal-trip-hero__divider" aria-hidden="true"></span>
                <span class="portal-eyebrow portal-eyebrow--hero">Portal del Aventurero</span>
            </div>
            <h1><?php echo esc_html( get_the_title( $trip ) ); ?></h1>
            <?php if ( $data['subtitle'] ) : ?>
                <p class="portal-trip-hero__subtitle"><?php echo esc_html( $data['subtitle'] ); ?></p>
            <?php endif; ?>
            <div class="portal-trip-hero__facts">
                <?php if ( $data['dates'] ) : ?>
                    <span class="portal-chip"><?php echo esc_html( $data['dates'] ); ?></span>
                <?php endif; ?>
                <?php if ( $data['destination'] ) : ?>
                    <span class="portal-chip"><?php echo esc_html( $data['destination'] ); ?></span>
                <?php endif; ?>
                <span class="portal-chip portal-chip--status"><?php echo esc_html( ukiyo_portal_get_status_label( $data['status'] ) ); ?></span>
            </div>
            <?php if ( ! empty( $traveler_names ) ) : ?>
                <div class="portal-trip-hero__travelers">
                    <span class="portal-trip-hero__travelers-label">Viajeros</span>
                    <div class="portal-trip-hero__travelers-list">
                        <?php foreach ( $traveler_names as $traveler_name ) : ?>
                            <span class="portal-trip-hero__traveler"><?php echo esc_html( $traveler_name ); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( $data['welcome'] ) : ?>
                <p class="portal-trip-hero__welcome"><?php echo esc_html( $data['welcome'] ); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <nav class="portal-section-nav portal-section-nav--editorial" data-portal-nav>
        <div class="portal-shell portal-section-nav__inner">
            <a href="#resumen">Resumen</a>
            <?php if ( $has_flights ) : ?>
                <a href="#vuelos">Vuelos</a>
            <?php endif; ?>
            <?php if ( $has_portal_map ) : ?>
                <a href="#mapa">Mapa</a>
            <?php endif; ?>
            <a href="#itinerario">Itinerario</a>
            <a href="#documentacion">Documentación</a>
            <a href="#recomendaciones">Recomendaciones</a>
            <a href="#contacto">Contacto</a>
        </div>
    </nav>

    <section class="portal-shell portal-summary portal-summary--hero-overlap portal-section--paper" id="resumen" data-portal-section>
        <div class="portal-section-heading">
            <span class="portal-eyebrow">Resumen</span>
            <h2>Todo lo esencial, a mano.</h2>
        </div>

        <div class="portal-summary-stack">
            <article class="portal-panel portal-summary-panel">
                <div class="portal-summary-cards portal-summary-cards--compact">
                    <?php if ( $data['destination'] ) : ?>
                        <div class="portal-summary-card">
                            <span>Destino</span>
                            <strong><?php echo esc_html( $data['destination'] ); ?></strong>
                        </div>
                    <?php endif; ?>
                    <?php if ( $data['dates'] ) : ?>
                        <div class="portal-summary-card">
                            <span>Fechas</span>
                            <strong><?php echo esc_html( $data['dates'] ); ?></strong>
                        </div>
                    <?php endif; ?>
                    <div class="portal-summary-card">
                        <span>Estado</span>
                        <strong><?php echo esc_html( ukiyo_portal_get_status_label( $data['status'] ) ); ?></strong>
                    </div>
                    <?php if ( $data['reference'] ) : ?>
                        <div class="portal-summary-card">
                            <span>Referencia</span>
                            <strong><?php echo esc_html( $data['reference'] ); ?></strong>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="portal-quick-actions">
                    <?php if ( ! empty( $data['documents'] ) ) : ?>
                        <a class="portal-btn portal-btn--primary" href="#documentacion">Ir a documentación</a>
                    <?php endif; ?>
                    <a class="portal-btn portal-btn--whatsapp" href="<?php echo esc_url( $contact_profile['whatsapp_link'] ); ?>" target="_blank" rel="noreferrer">
                        <span class="portal-btn__icon" aria-hidden="true">
                            <svg viewBox="0 0 32 32" role="img" focusable="false" aria-hidden="true">
                                <path fill="currentColor" d="M16.02 3.2c-7 0-12.68 5.66-12.68 12.64 0 2.23.59 4.41 1.71 6.33L3 29l7.04-1.84a12.75 12.75 0 0 0 5.98 1.52h.01c6.99 0 12.67-5.67 12.67-12.65 0-3.38-1.32-6.56-3.72-8.95A12.57 12.57 0 0 0 16.02 3.2Zm0 22.95h-.01a10.6 10.6 0 0 1-5.4-1.48l-.39-.23-4.18 1.09 1.12-4.08-.25-.42a10.49 10.49 0 0 1-1.6-5.6c0-5.83 4.77-10.58 10.65-10.58 2.84 0 5.5 1.1 7.5 3.1a10.47 10.47 0 0 1 3.12 7.49c0 5.84-4.78 10.6-10.56 10.6Zm5.8-7.92c-.32-.16-1.9-.94-2.2-1.05-.29-.1-.5-.16-.71.16-.21.31-.81 1.05-.99 1.27-.18.21-.36.24-.68.08-.32-.16-1.33-.49-2.54-1.56-.94-.84-1.58-1.88-1.76-2.19-.18-.31-.02-.47.13-.63.13-.13.31-.34.47-.52.16-.18.21-.31.31-.52.1-.21.05-.39-.03-.55-.08-.16-.71-1.71-.97-2.34-.26-.62-.52-.53-.71-.54h-.6c-.21 0-.55.08-.83.39-.29.31-1.1 1.08-1.1 2.63s1.12 3.04 1.28 3.25c.16.21 2.19 3.34 5.31 4.68.74.32 1.33.51 1.78.65.75.24 1.42.21 1.96.13.6-.09 1.9-.78 2.17-1.53.27-.75.27-1.39.19-1.52-.07-.13-.28-.21-.6-.37Z"/>
                            </svg>
                        </span>
                        <span class="portal-btn__copy">
                            <span class="portal-btn__eyebrow">WhatsApp</span>
                            <strong>Escribir por WhatsApp</strong>
                        </span>
                    </a>
                </div>
            </article>

            <details class="portal-panel portal-panel--warm portal-story-panel">
                <summary class="portal-story-panel__summary">
                    <div class="portal-story-panel__summary-copy">
                        <span class="portal-eyebrow">Contexto del destino</span>
                        <h3 class="portal-panel__title"><?php echo esc_html( $country_heading ); ?></h3>
                        <?php if ( $country_subtitle ) : ?>
                            <p class="portal-story-panel__subtitle"><?php echo esc_html( $country_subtitle ); ?></p>
                        <?php endif; ?>
                    </div>
                    <span class="portal-story-panel__toggle">Ver más</span>
                </summary>
                <div class="portal-copy-block"><?php echo wp_kses_post( wpautop( $country_copy ) ); ?></div>
            </details>
        </div>
    </section>

    <?php if ( $has_flights ) : ?>
        <section class="portal-shell portal-section portal-section--tint" id="vuelos" data-portal-section>
            <div class="portal-section-heading">
                <span class="portal-eyebrow">Vuelos</span>
                <h2>Toda la operativa aérea, clara de un vistazo.</h2>
            </div>

            <div class="portal-flight-grid">
                <?php if ( $has_outbound_flight ) : ?>
                    <article class="portal-flight-card portal-flight-card--outbound">
                        <div class="portal-flight-card__header">
                            <div class="portal-flight-card__brand">
                                <img class="portal-flight-card__logo" src="<?php echo esc_attr( $airline_logo ); ?>" alt="<?php echo esc_attr( $airline_label ?: 'Aerolínea del viaje' ); ?>" />
                                <div class="portal-flight-card__brand-copy">
                                    <span class="portal-flight-card__eyebrow">Vuelo de ida</span>
                                    <h3><?php echo esc_html( $airline_label ?: 'Aerolínea por confirmar' ); ?></h3>
                                    <?php if ( $flights['outbound_flight_number'] ) : ?>
                                        <span class="portal-flight-card__flight-number"><?php echo esc_html( $flights['outbound_flight_number'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="portal-flight-card__route">
                            <div class="portal-flight-card__segment portal-flight-card__segment--departure">
                                <span class="portal-flight-card__segment-label"><?php echo esc_html( $outbound_departure_airport['label'] ?: 'Origen' ); ?></span>
                                <strong class="portal-flight-card__airport-code"><?php echo esc_html( $outbound_departure_airport['code'] ?: '---' ); ?></strong>
                                <?php if ( $outbound_departure_airport['label'] ) : ?>
                                    <small class="portal-flight-card__airport-city"><?php echo esc_html( $outbound_departure_airport['label'] ); ?></small>
                                <?php endif; ?>
                                <?php if ( $flights['outbound_departure_time'] ) : ?>
                                    <small class="portal-flight-card__airport-date"><?php echo esc_html( ukiyo_portal_format_flight_date( $flights['outbound_departure_time'] ) ); ?></small>
                                    <strong class="portal-flight-card__airport-time"><?php echo esc_html( ukiyo_portal_format_flight_time_only( $flights['outbound_departure_time'] ) ); ?></strong>
                                <?php endif; ?>
                            </div>
                            <div class="portal-flight-card__connector" aria-hidden="true">
                                <?php if ( $outbound_duration ) : ?>
                                    <span class="portal-flight-card__duration"><?php echo esc_html( $outbound_duration ); ?></span>
                                <?php endif; ?>
                                <span class="portal-flight-card__arrow">→</span>
                            </div>
                            <div class="portal-flight-card__segment portal-flight-card__segment--arrival">
                                <span class="portal-flight-card__segment-label"><?php echo esc_html( $outbound_arrival_airport['label'] ?: 'Destino' ); ?></span>
                                <strong class="portal-flight-card__airport-code"><?php echo esc_html( $outbound_arrival_airport['code'] ?: '---' ); ?></strong>
                                <?php if ( $outbound_arrival_airport['label'] ) : ?>
                                    <small class="portal-flight-card__airport-city"><?php echo esc_html( $outbound_arrival_airport['label'] ); ?></small>
                                <?php endif; ?>
                                <?php if ( $flights['outbound_arrival_time'] ) : ?>
                                    <small class="portal-flight-card__airport-date"><?php echo esc_html( ukiyo_portal_format_flight_date( $flights['outbound_arrival_time'] ) ); ?></small>
                                    <strong class="portal-flight-card__airport-time"><?php echo esc_html( ukiyo_portal_format_flight_time_only( $flights['outbound_arrival_time'] ) ); ?></strong>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endif; ?>

                <?php if ( $has_return_flight ) : ?>
                    <article class="portal-flight-card portal-flight-card--return">
                        <div class="portal-flight-card__header">
                            <div class="portal-flight-card__brand">
                                <img class="portal-flight-card__logo" src="<?php echo esc_attr( $airline_logo ); ?>" alt="<?php echo esc_attr( $airline_label ?: 'Aerolínea del viaje' ); ?>" />
                                <div class="portal-flight-card__brand-copy">
                                    <span class="portal-flight-card__eyebrow">Vuelo de vuelta</span>
                                    <h3><?php echo esc_html( $airline_label ?: 'Aerolínea por confirmar' ); ?></h3>
                                    <?php if ( $flights['return_flight_number'] ) : ?>
                                        <span class="portal-flight-card__flight-number"><?php echo esc_html( $flights['return_flight_number'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="portal-flight-card__route">
                            <div class="portal-flight-card__segment portal-flight-card__segment--departure">
                                <span class="portal-flight-card__segment-label"><?php echo esc_html( $return_departure_airport['label'] ?: 'Origen' ); ?></span>
                                <strong class="portal-flight-card__airport-code"><?php echo esc_html( $return_departure_airport['code'] ?: '---' ); ?></strong>
                                <?php if ( $return_departure_airport['label'] ) : ?>
                                    <small class="portal-flight-card__airport-city"><?php echo esc_html( $return_departure_airport['label'] ); ?></small>
                                <?php endif; ?>
                                <?php if ( $flights['return_departure_time'] ) : ?>
                                    <small class="portal-flight-card__airport-date"><?php echo esc_html( ukiyo_portal_format_flight_date( $flights['return_departure_time'] ) ); ?></small>
                                    <strong class="portal-flight-card__airport-time"><?php echo esc_html( ukiyo_portal_format_flight_time_only( $flights['return_departure_time'] ) ); ?></strong>
                                <?php endif; ?>
                            </div>
                            <div class="portal-flight-card__connector" aria-hidden="true">
                                <?php if ( $return_duration ) : ?>
                                    <span class="portal-flight-card__duration"><?php echo esc_html( $return_duration ); ?></span>
                                <?php endif; ?>
                                <span class="portal-flight-card__arrow">→</span>
                            </div>
                            <div class="portal-flight-card__segment portal-flight-card__segment--arrival">
                                <span class="portal-flight-card__segment-label"><?php echo esc_html( $return_arrival_airport['label'] ?: 'Destino' ); ?></span>
                                <strong class="portal-flight-card__airport-code"><?php echo esc_html( $return_arrival_airport['code'] ?: '---' ); ?></strong>
                                <?php if ( $return_arrival_airport['label'] ) : ?>
                                    <small class="portal-flight-card__airport-city"><?php echo esc_html( $return_arrival_airport['label'] ); ?></small>
                                <?php endif; ?>
                                <?php if ( $flights['return_arrival_time'] ) : ?>
                                    <small class="portal-flight-card__airport-date"><?php echo esc_html( ukiyo_portal_format_flight_date( $flights['return_arrival_time'] ) ); ?></small>
                                    <strong class="portal-flight-card__airport-time"><?php echo esc_html( ukiyo_portal_format_flight_time_only( $flights['return_arrival_time'] ) ); ?></strong>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( $has_portal_map ) : ?>
        <section class="portal-shell portal-shell--map portal-section portal-section--tint portal-map-section" id="mapa" data-portal-section>
            <div class="portal-section-heading">
                <span class="portal-eyebrow">Mapa</span>
                <h2><?php echo esc_html( $single_place_view ? 'Todos los puntos clave del viaje, de un vistazo.' : 'La ruta completa del viaje, más clara y visual.' ); ?></h2>
            </div>

            <article class="portal-route-map-card portal-route-map-card--feature">
                <div class="portal-route-map-card__head">
                    <div>
                        <span class="portal-badge"><?php echo esc_html( $single_place_view ? 'Puntos clave' : 'Mapa de ruta' ); ?></span>
                        <h3><?php echo esc_html( $single_place_view ? sprintf( 'Mapa esencial de %s', $data['itinerary'][0]['place'] ?: $route_context ) : 'El recorrido del viaje' ); ?></h3>
                    </div>
                    <p><?php echo esc_html( $single_place_view ? 'Aquí tienes reunidos los lugares importantes del viaje para ubicarlos rápido y entender mejor cada jornada.' : 'Este mapa conecta las paradas principales del viaje en el orden del itinerario para que visualices bien el recorrido.' ); ?></p>
                </div>
                <div
                    class="portal-route-map"
                    data-portal-route-map
                    <?php echo $single_place_view ? 'data-route-mode="markers"' : ''; ?>
                    data-route-points="<?php echo esc_attr( wp_json_encode( $single_place_view ? $single_place_map_points : $route_points ) ); ?>"
                ></div>
            </article>
        </section>
    <?php endif; ?>

    <section class="portal-shell portal-section portal-section--paper" id="itinerario" data-portal-section>
        <div class="portal-section-heading">
            <span class="portal-eyebrow">Itinerario</span>
            <h2>Una lectura clara de cada etapa del viaje.</h2>
        </div>

        <?php if ( empty( $data['itinerary'] ) ) : ?>
            <div class="portal-empty-block">Estamos preparando el itinerario detallado. En cuanto esté listo, aparecerá aquí.</div>
        <?php else : ?>
            <div class="portal-timeline">
                <?php foreach ( $data['itinerary'] as $place_index => $place ) : ?>
                    <?php
                    $place_name        = $place['place'] ?: 'Siguiente parada';
                    $stay_days_label   = sprintf( _n( '%s día en este lugar', '%s días en este lugar', (int) $place['stay_days'], 'ukiyo' ), number_format_i18n( (int) $place['stay_days'] ) );
                    $place_image_url   = ! empty( $place['image_id'] ) ? wp_get_attachment_image_url( $place['image_id'], 'large' ) : '';
                    $place_accommodations = ! empty( $place['accommodations'] ) && is_array( $place['accommodations'] ) ? $place['accommodations'] : [];
                    ?>
                    <details class="portal-place-card" <?php echo $single_place_view ? 'open' : ''; ?>>
                        <summary>
                            <div class="portal-place-card__lead<?php echo $place_image_url ? ' has-visual' : ''; ?>">
                                <span class="portal-place-card__title">
                                    <strong><?php echo esc_html( $place_name ); ?></strong>
                                    <small><?php echo esc_html( $stay_days_label ); ?></small>
                                </span>
                                <?php if ( $place_image_url ) : ?>
                                    <span class="portal-place-card__visual">
                                        <img src="<?php echo esc_url( $place_image_url ); ?>" alt="<?php echo esc_attr( $place_name ); ?>" />
                                        <span class="portal-day-card__toggle portal-day-card__toggle--overlay">Ver lugar</span>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <?php if ( ! $place_image_url ) : ?>
                                <span class="portal-day-card__toggle">Ver estancia</span>
                            <?php endif; ?>
                        </summary>
                        <div class="portal-place-card__content">
                            <div class="portal-place-days">
                                <?php if ( ! empty( $place['days'] ) ) : ?>
                                    <div class="portal-day-viewer" data-portal-day-viewer>
                                        <?php if ( count( $place['days'] ) > 1 ) : ?>
                                            <div class="portal-day-viewer__head">
                                                <div class="portal-day-viewer__controls">
                                                    <button class="portal-day-nav-btn" type="button" data-day-prev aria-label="Ver día anterior">Anterior</button>
                                                    <span class="portal-day-viewer__status" data-day-status></span>
                                                    <button class="portal-day-nav-btn" type="button" data-day-next aria-label="Ver día siguiente">Siguiente</button>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="portal-day-viewer__slides">
                                            <?php foreach ( $place['days'] as $day_index => $day ) : ?>
                                                <?php $file_url = $day['file_id'] ? wp_get_attachment_url( $day['file_id'] ) : ''; ?>
                                                <?php
                                                $day_activities = ukiyo_portal_normalize_itinerary_activities( $day['activities'] );
                                                $day_images = ukiyo_portal_normalize_attachment_ids( $day['image_ids'] );
                                                $day_number = ! empty( $day['day_number'] ) ? (int) $day['day_number'] : $day_index + 1;
                                                $day_location_label = trim( (string) $day['location_name'] );
                                                $day_location_address = trim( (string) $day['location_address'] );
                                                $day_location_map_url = trim( (string) $day['location_map_url'] );
                                                $day_link_label = 'Abrir enlace útil';
                                                $active_accommodation = ukiyo_portal_get_active_place_accommodation( $place, $day_number, $day_index );
                                                $stay_image_url       = ! empty( $active_accommodation['image_id'] ) ? wp_get_attachment_image_url( $active_accommodation['image_id'], 'large' ) : '';
                                                $stay_location_raw    = trim( (string) ( $active_accommodation['location'] ?? '' ) );
                                                $stay_maps_url        = $stay_location_raw ? ukiyo_portal_get_maps_link( $stay_location_raw ) : '';
                                                $stay_location_label  = $stay_location_raw && ! wp_http_validate_url( $stay_location_raw ) ? $stay_location_raw : '';
                                                $rating_value         = str_replace( ',', '.', trim( (string) ( $active_accommodation['rating'] ?? '' ) ) );
                                                $rating_number        = is_numeric( $rating_value ) ? max( 0, min( 5, (float) $rating_value ) ) : 0;
                                                $rating_formatted     = $rating_number ? number_format_i18n( $rating_number, 1 ) : '';
                                                $rating_source        = ! empty( $active_accommodation['rating_source'] ) ? $active_accommodation['rating_source'] : 'Valoración externa';
                                                if ( $day['link_url'] && ( false !== strpos( (string) $day['link_url'], 'google' ) || false !== strpos( (string) $day['link_url'], 'maps.app.goo.gl' ) ) ) {
                                                    $day_link_label = 'Google Maps';
                                                }
                                                ?>
                                                <article class="portal-day-stage<?php echo 0 === $day_index ? ' is-active' : ''; ?>" data-day-slide <?php echo 0 === $day_index ? '' : 'hidden="hidden"'; ?>>
                                                    <div class="portal-day-stage__header">
                                                        <span class="portal-day-card__number">Día <?php echo esc_html( $day['day_number'] ); ?></span>
                                                        <div class="portal-day-stage__title">
                                                            <strong><?php echo esc_html( $day['title'] ?: 'Plan del día' ); ?></strong>
                                                        </div>
                                                    </div>
                                                    <?php if ( ! empty( $day_images ) || $day['description'] ) : ?>
                                                        <div class="portal-day-stage__feature<?php echo empty( $day_images ) ? ' has-no-media' : ''; ?><?php echo ! $day['description'] ? ' has-no-copy' : ''; ?>">
                                                            <?php if ( ! empty( $day_images ) ) : ?>
                                                                <div class="portal-day-stage__gallery" data-day-gallery data-gallery-interval="2000">
                                                                    <div class="portal-day-stage__gallery-slides">
                                                                        <?php foreach ( $day_images as $gallery_index => $image_id ) : ?>
                                                                            <?php $image_url = wp_get_attachment_image_url( $image_id, 'large' ); ?>
                                                                            <?php if ( $image_url ) : ?>
                                                                                <figure class="portal-day-stage__gallery-slide<?php echo 0 === $gallery_index ? ' is-active' : ''; ?>" data-day-gallery-slide <?php echo 0 === $gallery_index ? '' : 'hidden="hidden"'; ?>>
                                                                                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $day['title'] ?: 'Imagen del día' ); ?>" />
                                                                                </figure>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                    <?php if ( count( $day_images ) > 1 ) : ?>
                                                                        <div class="portal-day-stage__gallery-controls">
                                                                            <button class="portal-carousel-btn portal-carousel-btn--overlay" type="button" data-day-gallery-prev aria-label="Ver imagen anterior">‹</button>
                                                                            <span class="portal-day-stage__gallery-status" data-day-gallery-status></span>
                                                                            <button class="portal-carousel-btn portal-carousel-btn--overlay" type="button" data-day-gallery-next aria-label="Ver imagen siguiente">›</button>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if ( $day['description'] ) : ?>
                                                                <div class="portal-day-stage__copy portal-day-card__description portal-rich-text"><?php echo wp_kses_post( $day['description'] ); ?></div>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ( ! empty( $active_accommodation['name'] ) || $stay_image_url || $rating_formatted ) : ?>
                                                        <article class="portal-stay-card">
                                                            <?php if ( $stay_image_url ) : ?>
                                                                <div class="portal-stay-card__media">
                                                                    <img src="<?php echo esc_url( $stay_image_url ); ?>" alt="<?php echo esc_attr( ! empty( $active_accommodation['name'] ) ? $active_accommodation['name'] : $place_name ); ?>" />
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="portal-stay-card__body">
                                                                <span class="portal-badge">Alojamiento</span>
                                                                <h3><?php echo esc_html( ! empty( $active_accommodation['name'] ) ? $active_accommodation['name'] : 'Alojamiento por confirmar' ); ?></h3>
                                                                <?php if ( $stay_location_label ) : ?>
                                                                    <p><?php echo esc_html( $stay_location_label ); ?></p>
                                                                <?php else : ?>
                                                                    <p><?php echo esc_html( $place_name ); ?></p>
                                                                <?php endif; ?>
                                                                <?php if ( $rating_formatted ) : ?>
                                                                    <div class="portal-rating-badge">
                                                                        <span class="portal-rating-badge__brand"><?php echo esc_html( $rating_source ); ?></span>
                                                                        <strong><?php echo esc_html( $rating_formatted ); ?></strong>
                                                                        <span class="portal-rating-badge__stars" aria-hidden="true">★★★★★</span>
                                                                        <small>sobre 5</small>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if ( $stay_maps_url ) : ?>
                                                                    <a class="portal-btn portal-btn--ghost portal-stay-card__maps" href="<?php echo esc_url( $stay_maps_url ); ?>" target="_blank" rel="noreferrer">Google Maps</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </article>
                                                    <?php endif; ?>
                                                    <?php if ( $day_location_label || $day_location_address || $day_location_map_url ) : ?>
                                                        <div class="portal-day-location">
                                                            <span class="portal-day-location__eyebrow">Ubicación del día</span>
                                                            <?php if ( $day_location_label ) : ?>
                                                                <strong><?php echo esc_html( $day_location_label ); ?></strong>
                                                            <?php endif; ?>
                                                            <?php if ( $day_location_address ) : ?>
                                                                <p><?php echo esc_html( $day_location_address ); ?></p>
                                                            <?php endif; ?>
                                                            <?php if ( $day_location_map_url ) : ?>
                                                                <a href="<?php echo esc_url( $day_location_map_url ); ?>" target="_blank" rel="noreferrer">Google Maps</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ( $day['schedule'] || $day['recommendations'] || ! empty( $day_activities ) ) : ?>
                                                        <?php
                                                        $activity_count = count( $day_activities );
                                                        $activity_columns = min( 3, max( 1, $activity_count ) );
                                                        ?>
                                                        <div class="portal-day-card__facts">
                                                            <?php if ( $day['schedule'] ) : ?>
                                                                <div><span>Horario</span><p><?php echo nl2br( esc_html( $day['schedule'] ) ); ?></p></div>
                                                            <?php endif; ?>
                                                            <?php if ( $day['recommendations'] ) : ?>
                                                                <div><span>Actividades y notas</span><p><?php echo nl2br( esc_html( $day['recommendations'] ) ); ?></p></div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <?php if ( ! empty( $day_activities ) ) : ?>
                                                            <div class="portal-day-activities">
                                                                <div class="portal-day-activities__head">
                                                                    <span class="portal-day-activities__eyebrow">Actividades del día</span>
                                                                    <?php if ( $activity_count > 1 ) : ?>
                                                                        <div class="portal-day-activities__nav">
                                                                            <button class="portal-carousel-btn" type="button" data-activity-prev aria-label="Ver actividades anteriores">Anterior</button>
                                                                            <button class="portal-carousel-btn" type="button" data-activity-next aria-label="Ver más actividades">Siguiente</button>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="portal-day-activity-list portal-day-activity-list--rail<?php echo $activity_count > 1 ? ' has-navigation' : ''; ?>" data-portal-activity-rail style="--portal-activity-columns: <?php echo esc_attr( $activity_columns ); ?>;">
                                                                    <?php foreach ( $day_activities as $activity_index => $activity ) : ?>
                                                                            <?php
                                                                            $activity_images = ukiyo_portal_normalize_attachment_ids( $activity['image_ids'] );
                                                                            $activity_cover_id = ! empty( $activity_images ) ? $activity_images[0] : 0;
                                                                            $activity_cover_url = $activity_cover_id ? wp_get_attachment_image_url( $activity_cover_id, 'large' ) : '';
                                                                            $activity_text = trim( wp_strip_all_tags( (string) $activity['description'] ) );
                                                                            $activity_excerpt = $activity_text ? wp_trim_words( $activity_text, 20, '...' ) : '';
                                                                            $activity_meta = trim( (string) ( $activity['location_name'] ?: $activity['location_address'] ) );
                                                                            $activity_modal_content = trim( (string) $activity['modal_content'] );
                                                                            $activity_hours = trim( (string) $activity['visiting_hours'] );
                                                                            $activity_entry_price = trim( (string) $activity['entry_price'] );
                                                                            $activity_modal_rich_content = $activity_modal_content;

                                                                            if ( $activity_modal_rich_content ) {
                                                                                if ( $activity['map_url'] ) {
                                                                                    $quoted_map_url = preg_quote( trim( (string) $activity['map_url'] ), '/' );
                                                                                    $activity_modal_rich_content = preg_replace( '/^\s*' . $quoted_map_url . '\s*/i', '', $activity_modal_rich_content, 1 );
                                                                                }

                                                                                $activity_modal_rich_content = preg_replace( '/^\s*https?:\/\/[^\s<]+\s*/i', '', $activity_modal_rich_content, 1 );
                                                                                $activity_modal_rich_content = trim( (string) $activity_modal_rich_content );
                                                                            }

                                                                            $has_activity_modal = '' !== wp_strip_all_tags( $activity_modal_rich_content ) || '' !== $activity_hours || '' !== $activity_entry_price || count( $activity_images ) > 1;
                                                                            $activity_modal_id = sprintf( 'portal-activity-modal-%1$s-%2$s-%3$s', absint( $place_index ), absint( $day_index ), absint( $activity_index ) );
                                                                            $activity_modal_title_id = $activity_modal_id . '-title';
                                                                            ?>
                                                                            <article class="portal-day-activity<?php echo $activity_cover_url ? ' portal-day-activity--moment has-cover' : ' portal-day-activity--text'; ?>">
                                                                                <?php if ( $activity_cover_url ) : ?>
                                                                                    <figure class="portal-day-activity__media">
                                                                                        <img src="<?php echo esc_url( $activity_cover_url ); ?>" alt="<?php echo esc_attr( $activity['title'] ?: 'Imagen de la actividad' ); ?>" />
                                                                                    </figure>
                                                                                <?php endif; ?>
                                                                                <div class="portal-day-activity__body">
                                                                                    <?php if ( $activity_meta ) : ?>
                                                                                        <span class="portal-day-activity__location">
                                                                                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                                                                                <path d="M12 22s7-6.19 7-12a7 7 0 1 0-14 0c0 5.81 7 12 7 12Zm0-8.5A3.5 3.5 0 1 1 12 6a3.5 3.5 0 0 1 0 7Z" fill="currentColor"/>
                                                                                            </svg>
                                                                                            <?php echo esc_html( $activity_meta ); ?>
                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                    <strong class="portal-day-activity__title"><?php echo esc_html( $activity['title'] ?: 'Actividad' ); ?></strong>
                                                                                    <?php if ( $activity_excerpt ) : ?>
                                                                                        <p class="portal-day-activity__excerpt"><?php echo esc_html( $activity_excerpt ); ?></p>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                                <?php if ( $has_activity_modal ) : ?>
                                                                                    <button class="portal-day-activity__more-button portal-day-activity__more-button--floating" type="button" data-activity-modal-open="<?php echo esc_attr( $activity_modal_id ); ?>" aria-label="<?php echo esc_attr( sprintf( 'Ver más información sobre %s', $activity['title'] ?: 'la actividad' ) ); ?>" aria-haspopup="dialog" aria-controls="<?php echo esc_attr( $activity_modal_id ); ?>">
                                                                                        <span aria-hidden="true">+</span>
                                                                                    </button>
                                                                                <?php endif; ?>
                                                                                <?php if ( $activity['map_url'] ) : ?>
                                                                                    <a class="portal-day-activity__map-button portal-day-activity__map-button--floating" href="<?php echo esc_url( $activity['map_url'] ); ?>" target="_blank" rel="noreferrer" aria-label="<?php echo esc_attr( sprintf( 'Google Maps', $activity['title'] ?: 'actividad' ) ); ?>">
                                                                                        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                                                                            <path d="M12 22s7-6.19 7-12a7 7 0 1 0-14 0c0 5.81 7 12 7 12Zm0-8.5A3.5 3.5 0 1 1 12 6a3.5 3.5 0 0 1 0 7Z" fill="currentColor"/>
                                                                                        </svg>
                                                                                    </a>
                                                                                <?php endif; ?>
                                                                            </article>
                                                                            <?php if ( $has_activity_modal ) : ?>
                                                                                <div class="portal-activity-modal" id="<?php echo esc_attr( $activity_modal_id ); ?>" data-activity-modal hidden>
                                                                                    <div class="portal-activity-modal__backdrop" data-activity-modal-close></div>
                                                                                    <div class="portal-activity-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="<?php echo esc_attr( $activity_modal_title_id ); ?>">
                                                                                        <button class="portal-activity-modal__close" type="button" data-activity-modal-close aria-label="Cerrar más información">
                                                                                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                                                                                <path d="M6.4 5 12 10.6 17.6 5 19 6.4 13.4 12 19 17.6 17.6 19 12 13.4 6.4 19 5 17.6 10.6 12 5 6.4Z" fill="currentColor"/>
                                                                                            </svg>
                                                                                        </button>
                                                                                        <div class="portal-activity-modal__hero<?php echo $activity_cover_url ? ' has-image' : ' has-no-image'; ?>">
                                                                                            <?php if ( $activity_cover_url ) : ?>
                                                                                                <img class="portal-activity-modal__hero-image" src="<?php echo esc_url( $activity_cover_url ); ?>" alt="<?php echo esc_attr( $activity['title'] ?: 'Imagen de la actividad' ); ?>" data-activity-modal-hero />
                                                                                            <?php endif; ?>
                                                                                            <div class="portal-activity-modal__hero-copy">
                                                                                                <?php if ( $activity_meta ) : ?>
                                                                                                    <span class="portal-activity-modal__eyebrow"><?php echo esc_html( $activity_meta ); ?></span>
                                                                                                <?php endif; ?>
                                                                                                <h3 id="<?php echo esc_attr( $activity_modal_title_id ); ?>" class="portal-activity-modal__title"><?php echo esc_html( $activity['title'] ?: 'Actividad' ); ?></h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="portal-activity-modal__content">
                                                                                            <?php if ( $activity_hours || $activity_entry_price || $activity_meta || $activity['map_url'] ) : ?>
                                                                                                <div class="portal-activity-modal__facts">
                                                                                                    <?php if ( $activity_hours ) : ?>
                                                                                                        <div class="portal-activity-modal__fact">
                                                                                                            <span>Horario</span>
                                                                                                            <strong><?php echo esc_html( $activity_hours ); ?></strong>
                                                                                                        </div>
                                                                                                    <?php endif; ?>
                                                                                                    <?php if ( $activity_entry_price ) : ?>
                                                                                                        <div class="portal-activity-modal__fact">
                                                                                                            <span>Entrada</span>
                                                                                                            <strong><?php echo esc_html( $activity_entry_price ); ?></strong>
                                                                                                        </div>
                                                                                                    <?php endif; ?>
                                                                                                    <?php if ( $activity['map_url'] ) : ?>
                                                                                                        <a class="portal-activity-modal__maps" href="<?php echo esc_url( $activity['map_url'] ); ?>" target="_blank" rel="noreferrer" aria-label="<?php echo esc_attr( sprintf( 'Abrir ubicación de %s en Google Maps', $activity['title'] ?: 'la actividad' ) ); ?>">
                                                                                                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                                                                                                <path d="M12 22s7-6.19 7-12a7 7 0 1 0-14 0c0 5.81 7 12 7 12Zm0-8.5A3.5 3.5 0 1 1 12 6a3.5 3.5 0 0 1 0 7Z" fill="currentColor"/>
                                                                                                            </svg>
                                                                                                        </a>
                                                                                                    <?php endif; ?>
                                                                                                </div>
                                                                                            <?php endif; ?>
                                                                                            <?php if ( $activity_modal_rich_content ) : ?>
                                                                                                <div class="portal-activity-modal__section">
                                                                                                    <span class="portal-activity-modal__section-title">Más información</span>
                                                                                                    <div class="portal-activity-modal__rich portal-rich-text"><?php echo wpautop( wp_kses_post( $activity_modal_rich_content ) ); ?></div>
                                                                                                </div>
                                                                                            <?php endif; ?>
                                                                                            <?php if ( count( $activity_images ) > 1 ) : ?>
                                                                                                <div class="portal-activity-modal__section">
                                                                                                    <span class="portal-activity-modal__section-title">Galería</span>
                                                                                                    <div class="portal-activity-modal__gallery" data-activity-modal-gallery>
                                                                                                        <?php foreach ( $activity_images as $gallery_index => $gallery_image_id ) : ?>
                                                                                                            <?php $gallery_image_url = wp_get_attachment_image_url( $gallery_image_id, 'large' ); ?>
                                                                                                            <?php if ( $gallery_image_url ) : ?>
                                                                                                                <button
                                                                                                                    class="portal-activity-modal__thumb<?php echo 0 === $gallery_index ? ' is-active' : ''; ?>"
                                                                                                                    type="button"
                                                                                                                    data-activity-modal-thumb
                                                                                                                    data-image-url="<?php echo esc_url( $gallery_image_url ); ?>"
                                                                                                                    aria-label="<?php echo esc_attr( sprintf( 'Ver imagen %d de %s', $gallery_index + 1, $activity['title'] ?: 'la actividad' ) ); ?>"
                                                                                                                >
                                                                                                                    <img src="<?php echo esc_url( wp_get_attachment_image_url( $gallery_image_id, 'medium_large' ) ?: $gallery_image_url ); ?>" alt="" />
                                                                                                                </button>
                                                                                                            <?php endif; ?>
                                                                                                        <?php endforeach; ?>
                                                                                                    </div>
                                                                                                </div>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if ( $day['link_url'] || $file_url ) : ?>
                                                        <div class="portal-inline-links">
                                                            <?php if ( $day['link_url'] ) : ?>
                                                                <a href="<?php echo esc_url( $day['link_url'] ); ?>" target="_blank" rel="noreferrer"><?php echo esc_html( $day_link_label ); ?></a>
                                                            <?php endif; ?>
                                                            <?php if ( $file_url ) : ?>
                                                                <a href="<?php echo esc_url( $file_url ); ?>" target="_blank" rel="noreferrer">Abrir archivo complementario</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </article>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ( ! empty( $recommendations_by_place[ $place_name ] ) ) : ?>
                                    <div class="portal-place-recommendations">
                                        <div class="portal-place-recommendations__head">
                                            <h3>Algunas recomendaciones</h3>
                                        </div>
                                        <div class="portal-recommendation-grid">
                                            <?php foreach ( $recommendations_by_place[ $place_name ] as $item ) : ?>
                                                <?php $render_recommendation_card( $item ); ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <section class="portal-shell portal-section portal-section--tint" id="documentacion" data-portal-section>
        <div class="portal-section-heading">
            <span class="portal-eyebrow">Documentación</span>
            <h2>Archivos importantes, sin perder contexto.</h2>
        </div>

        <div class="portal-doc-layout">
            <div class="portal-doc-column">
                <?php if ( empty( $data['documents'] ) ) : ?>
                    <div class="portal-empty-block">Todavía no hay documentación cargada para este viaje.</div>
                <?php else : ?>
                    <div class="portal-doc-list">
                        <?php foreach ( $data['documents'] as $index => $document ) : ?>
                            <?php
                            $resource_url     = ! empty( $document['url'] ) ? esc_url_raw( (string) $document['url'] ) : '';
                            $file_id          = ! empty( $document['file_id'] ) ? absint( $document['file_id'] ) : 0;
                            $attachment_path  = $file_id ? get_attached_file( $file_id ) : '';
                            $mime_type        = $file_id ? (string) get_post_mime_type( $file_id ) : '';
                            $extension        = $attachment_path ? strtolower( (string) pathinfo( $attachment_path, PATHINFO_EXTENSION ) ) : '';
                            $is_resource      = 'recurso' === ( isset( $document['type'] ) ? (string) $document['type'] : '' ) || ( $resource_url && ! $file_id );
                            $is_pdf           = ! $is_resource && ( 'pdf' === $extension || 'application/pdf' === $mime_type );
                            $file_label       = $is_resource ? 'LINK' : ( $is_pdf ? 'PDF' : strtoupper( $extension ?: 'DOC' ) );
                            $file_size        = ( $attachment_path && file_exists( $attachment_path ) ) ? size_format( filesize( $attachment_path ) ) : '';
                            $document_href    = ukiyo_portal_get_document_url( $trip, $index );
                            ?>
                            <article class="portal-doc-card portal-doc-card--compact<?php echo $is_pdf ? ' portal-doc-card--pdf' : ''; ?><?php echo $is_resource ? ' portal-doc-card--resource' : ''; ?>">
                                <div class="portal-doc-card__file">
                                    <span class="portal-doc-card__icon" aria-hidden="true"><?php echo esc_html( $file_label ); ?></span>
                                    <div class="portal-doc-card__meta">
                                        <span class="portal-badge"><?php echo esc_html( isset( $document_types[ $document['type'] ] ) ? $document_types[ $document['type'] ] : 'Documento' ); ?></span>
                                        <span class="portal-doc-card__format"><?php echo esc_html( $file_label . ( $is_resource ? '' : ( $file_size ? ' · ' . $file_size : '' ) ) ); ?></span>
                                    </div>
                                </div>
                                <h3><?php echo esc_html( $document['name'] ); ?></h3>
                                <?php if ( $document['description'] ) : ?>
                                    <div class="portal-copy-block"><?php echo wpautop( esc_html( $document['description'] ) ); ?></div>
                                <?php endif; ?>
                                <a class="portal-btn portal-btn--ghost portal-doc-card__cta" href="<?php echo esc_url( $document_href ); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php echo esc_html( $is_resource ? 'Abrir recurso' : ( $is_pdf ? 'Abrir PDF' : 'Ver o descargar' ) ); ?>
                                </a>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <aside
                class="portal-packing-card"
                data-portal-packing-checklist
                data-trip-id="<?php echo esc_attr( (string) $trip->ID ); ?>"
                data-default-items="<?php echo esc_attr( wp_json_encode( $packing_checklist_defaults ) ); ?>"
            >
                <div class="portal-packing-card__head">
                    <span class="portal-eyebrow">Checklist</span>
                    <h3>Lo que ya va en la maleta.</h3>
                    <p>Marca lo que ya llevas y añade tus propios imprescindibles. Se guarda en este dispositivo.</p>
                </div>

                <div class="portal-packing-card__progress">
                    <div>
                        <span class="portal-packing-card__progress-label">Equipaje preparado</span>
                        <strong data-packing-progress-text>0/0</strong>
                    </div>
                    <div class="portal-packing-card__progress-bar" aria-hidden="true">
                        <span data-packing-progress-bar></span>
                    </div>
                </div>

                <div class="portal-packing-list" data-packing-list></div>

                <form class="portal-packing-form" data-packing-form>
                    <label class="portal-packing-form__field">
                        <span>Añadir a la checklist</span>
                        <input type="text" name="packing_item" placeholder="Bañador, cámara, repelente..." maxlength="80" />
                    </label>
                    <button class="portal-btn portal-btn--primary" type="submit">Añadir</button>
                </form>

                <p class="portal-packing-card__hint">Solo se guarda en este navegador, para este viaje.</p>
            </aside>
        </div>
    </section>

    <section class="portal-shell portal-section portal-section--paper" id="recomendaciones" data-portal-section>
        <div class="portal-section-heading">
            <span class="portal-eyebrow">Guía del viaje</span>
            <h2>Ruta y claves para orientarte mejor.</h2>
        </div>

        <?php if ( empty( $general_recommendations ) ) : ?>
            <div class="portal-empty-block">Añadiremos aquí las recomendaciones del equipo UKIYO para este viaje.</div>
        <?php else : ?>
            <?php $general_pages = array_chunk( $general_recommendations, 6 ); ?>
            <section class="portal-recommendation-group portal-recommendation-group--general">
                <div class="portal-recommendation-group__head">
                    <span class="portal-eyebrow">Recomendaciones</span>
                    <h3>Antes de viajar</h3>
                </div>

                <div class="portal-recommendation-carousel<?php echo count( $general_pages ) > 1 ? ' has-navigation' : ''; ?>" data-portal-rec-carousel>
                    <?php if ( count( $general_pages ) > 1 ) : ?>
                        <div class="portal-recommendation-carousel__nav">
                            <button class="portal-carousel-btn" type="button" data-rec-prev aria-label="Ver recomendaciones anteriores">Anterior</button>
                            <span class="portal-recommendation-carousel__status" data-rec-status></span>
                            <button class="portal-carousel-btn" type="button" data-rec-next aria-label="Ver más recomendaciones">Siguiente</button>
                        </div>
                    <?php endif; ?>

                    <div class="portal-recommendation-carousel__pages">
                        <?php foreach ( $general_pages as $page_index => $page_items ) : ?>
                            <div class="portal-recommendation-page<?php echo 0 === $page_index ? ' is-active' : ''; ?>" data-rec-page <?php echo 0 === $page_index ? '' : 'hidden'; ?>>
                                <div class="portal-recommendation-grid portal-recommendation-grid--paged">
                                    <?php foreach ( $page_items as $item ) : ?>
                                        <?php $render_recommendation_card( $item ); ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </section>

    <section class="portal-shell portal-section portal-section--tint portal-affiliate-section" data-portal-section>
        <article class="portal-affiliate-card portal-affiliate-card--saily">
            <div class="portal-affiliate-card__copy">
                <span class="portal-eyebrow"><?php echo esc_html( $saily_profile['eyebrow'] ); ?></span>
                <h2><?php echo esc_html( $saily_profile['title'] ); ?></h2>
                <p><?php echo esc_html( $saily_profile['copy'] ); ?></p>
            </div>
            <?php if ( ! empty( $saily_profile['image'] ) ) : ?>
                <a class="portal-affiliate-card__media" href="<?php echo esc_url( $saily_profile['url'] ); ?>" target="_blank" rel="noopener noreferrer sponsored" aria-label="Ver planes de Sailly">
                    <img src="<?php echo $saily_image_src; ?>" alt="Saily eSIM" loading="lazy" />
                </a>
            <?php endif; ?>
        </article>
    </section>

    <section class="portal-shell portal-section portal-section--paper" id="contacto" data-portal-section>
        <div class="portal-section-heading">
            <span class="portal-eyebrow">Contacto</span>
            <h2>Siempre tendrás a quién recurrir.</h2>
        </div>

        <div class="portal-contact-actions">
            <a class="portal-contact-action portal-contact-action--whatsapp" href="<?php echo esc_url( $contact_profile['whatsapp_link'] ); ?>" target="_blank" rel="noreferrer">
                    <span class="portal-contact-action__brand">
                        <span class="portal-contact-action__logo" aria-hidden="true">
                            <svg viewBox="0 0 32 32" role="img" focusable="false" aria-hidden="true">
                                <path fill="currentColor" d="M16.02 3.2c-7 0-12.68 5.66-12.68 12.64 0 2.23.59 4.41 1.71 6.33L3 29l7.04-1.84a12.75 12.75 0 0 0 5.98 1.52h.01c6.99 0 12.67-5.67 12.67-12.65 0-3.38-1.32-6.56-3.72-8.95A12.57 12.57 0 0 0 16.02 3.2Zm0 22.95h-.01a10.6 10.6 0 0 1-5.4-1.48l-.39-.23-4.18 1.09 1.12-4.08-.25-.42a10.49 10.49 0 0 1-1.6-5.6c0-5.83 4.77-10.58 10.65-10.58 2.84 0 5.5 1.1 7.5 3.1a10.47 10.47 0 0 1 3.12 7.49c0 5.84-4.78 10.6-10.56 10.6Zm5.8-7.92c-.32-.16-1.9-.94-2.2-1.05-.29-.1-.5-.16-.71.16-.21.31-.81 1.05-.99 1.27-.18.21-.36.24-.68.08-.32-.16-1.33-.49-2.54-1.56-.94-.84-1.58-1.88-1.76-2.19-.18-.31-.02-.47.13-.63.13-.13.31-.34.47-.52.16-.18.21-.31.31-.52.1-.21.05-.39-.03-.55-.08-.16-.71-1.71-.97-2.34-.26-.62-.52-.53-.71-.54h-.6c-.21 0-.55.08-.83.39-.29.31-1.1 1.08-1.1 2.63s1.12 3.04 1.28 3.25c.16.21 2.19 3.34 5.31 4.68.74.32 1.33.51 1.78.65.75.24 1.42.21 1.96.13.6-.09 1.9-.78 2.17-1.53.27-.75.27-1.39.19-1.52-.07-.13-.28-.21-.6-.37Z"/>
                            </svg>
                        </span>
                        <span class="portal-contact-action__eyebrow">WhatsApp</span>
                    </span>
                    <strong><?php echo esc_html( $contact_profile['whatsapp_label'] ); ?></strong>
                    <small>Escríbenos directamente</small>
                </a>

            <a class="portal-contact-action portal-contact-action--email" href="<?php echo esc_url( $contact_profile['email_link'] ); ?>">
                    <span class="portal-contact-action__brand">
                        <span class="portal-contact-action__logo portal-contact-action__logo--email" aria-hidden="true">
                            <svg viewBox="0 0 32 32" role="img" focusable="false" aria-hidden="true">
                                <path fill="currentColor" d="M5 8.5A2.5 2.5 0 0 1 7.5 6h17A2.5 2.5 0 0 1 27 8.5v15a2.5 2.5 0 0 1-2.5 2.5h-17A2.5 2.5 0 0 1 5 23.5v-15Zm2.3-.5 8.7 7.12L24.7 8H7.3Zm17.7 2.59-7.74 6.34a2 2 0 0 1-2.52 0L7 10.59V23.5c0 .28.22.5.5.5h17a.5.5 0 0 0 .5-.5V10.59Z"/>
                            </svg>
                        </span>
                        <span class="portal-contact-action__eyebrow">Email</span>
                    </span>
                    <strong><?php echo esc_html( $contact_profile['email_label'] ); ?></strong>
                    <small>Para dudas y coordinación</small>
                </a>

            <a class="portal-contact-action portal-contact-action--support" href="<?php echo esc_url( $contact_profile['support_link'] ); ?>" target="_blank" rel="noreferrer">
                    <span class="portal-contact-action__brand">
                        <span class="portal-contact-action__logo portal-contact-action__logo--support" aria-hidden="true">
                            <svg viewBox="0 0 32 32" role="img" focusable="false" aria-hidden="true">
                                <path fill="currentColor" d="M16 5c6.08 0 11 4.7 11 10.5S22.08 26 16 26c-1.24 0-2.44-.2-3.56-.58L6 27l1.92-5.1C6.08 20.07 5 17.89 5 15.5 5 9.7 9.92 5 16 5Zm0 2C11.04 7 7 10.7 7 15.5c0 1.95.67 3.8 1.9 5.34l.35.44-.95 2.53 3.17-.79.38.16c1.24.52 2.65.82 4.15.82 4.96 0 9-3.7 9-8.5S20.96 7 16 7Zm-3.75 6.75a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5Zm3.75 0a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5Zm3.75 0a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5Z"/>
                            </svg>
                        </span>
                        <span class="portal-contact-action__eyebrow">Acompañamiento</span>
                    </span>
                    <strong><?php echo esc_html( $contact_profile['support_label'] ); ?></strong>
                    <small><?php echo esc_html( $contact_profile['support_text'] ); ?></small>
                </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
