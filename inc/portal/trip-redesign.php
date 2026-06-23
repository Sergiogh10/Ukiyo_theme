<?php
/**
 * Re-skin del Portal del Aventurero (vista de viaje) — diseño Claude Design.
 *
 * Este archivo se incluye desde single-ukiyo_viaje.php cuando un admin añade
 * ?skin=new. Reutiliza las variables ya calculadas allí ($trip, $data, $hero,
 * $flights, $traveler_names, $contact_profile, etc.). NO toca la lógica: solo
 * cambia la presentación. CSS acotado a .uk-portal (assets/css/portal-redesign.css).
 *
 * WIP — secciones implementadas: hero, navegación, resumen (datos clave + contexto).
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Tipografías + CSS acotado del rediseño (solo en esta vista).
add_action( 'wp_enqueue_scripts', function () {
    $tpl = get_template_directory_uri();
    wp_enqueue_style( 'ukiyo-portal-redesign', $tpl . '/assets/css/portal-redesign.css', array(), null );
    wp_enqueue_style( 'ukiyo-portal-fonts', 'https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap', array(), null );
    wp_enqueue_style( 'ukiyo-portal-satoshi', 'https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap', array(), null );
} );

$pr_status_label = ukiyo_portal_get_status_label( $data['status'] );
$pr_duration     = count( (array) $data['itinerary'] );

get_header();
?>

<div class="uk-portal">
<main class="shell">

    <!-- ============== HERO ============== -->
    <section class="hero">
        <img class="hero__img" src="<?php echo esc_url( $hero ); ?>" alt="<?php echo esc_attr( get_the_title( $trip ) ); ?>" />
        <div class="hero__inner">
            <div class="hero__topline">
                <a class="portal-back" href="<?php echo esc_url( ukiyo_portal_get_dashboard_overview_url() ); ?>">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                    Volver al portal
                </a>
                <span style="height:18px;width:1px;background:rgba(255,255,255,.3)"></span>
                <span class="eyebrow" style="color:rgba(255,255,255,.85)">Portal del Aventurero</span>
            </div>
            <h1><?php echo esc_html( get_the_title( $trip ) ); ?></h1>
            <?php if ( $data['subtitle'] ) : ?>
                <p class="hero__sub"><?php echo esc_html( $data['subtitle'] ); ?></p>
            <?php endif; ?>
            <div class="hero__chips">
                <?php if ( $data['dates'] ) : ?>
                <span class="chip">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <?php echo esc_html( $data['dates'] ); ?>
                </span>
                <?php endif; ?>
                <?php if ( $data['destination'] ) : ?>
                <span class="chip">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <?php echo esc_html( $data['destination'] ); ?>
                </span>
                <?php endif; ?>
                <?php if ( ! empty( $traveler_names ) ) : ?>
                <span class="chip">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <?php echo esc_html( count( $traveler_names ) . ( 1 === count( $traveler_names ) ? ' viajero' : ' viajeros' ) ); ?>
                </span>
                <?php endif; ?>
                <?php if ( $pr_status_label ) : ?>
                    <span class="chip chip--status"><?php echo esc_html( $pr_status_label ); ?></span>
                <?php endif; ?>
            </div>
            <?php if ( ! empty( $traveler_names ) ) : ?>
            <div class="hero__travelers">
                <span>Viajeros</span>
                <div class="who">
                    <?php foreach ( $traveler_names as $pr_traveler ) : ?>
                        <span><?php echo esc_html( $pr_traveler ); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ============== SECTION NAV ============== -->
    <nav class="section-nav">
        <div class="section-nav__inner">
            <a href="#resumen" class="is-active">Resumen</a>
            <?php if ( $has_flights ) : ?><a href="#vuelos">Vuelos</a><?php endif; ?>
            <?php if ( $has_portal_map ) : ?><a href="#mapa">Mapa</a><?php endif; ?>
            <?php if ( ! empty( $data['itinerary'] ) ) : ?><a href="#itinerario">Itinerario</a><?php endif; ?>
            <a href="#documentacion">Documentación</a>
            <?php if ( ! empty( $data['recommendations'] ) ) : ?><a href="#recomendaciones">Recomendaciones</a><?php endif; ?>
            <a href="#contacto">Contacto</a>
        </div>
    </nav>

    <!-- ============== RESUMEN ============== -->
    <section class="block" id="resumen">
        <div class="block__head">
            <div>
                <div class="meta">01 · Resumen</div>
                <h2>Todo lo esencial, <em>a mano</em>.</h2>
            </div>
            <p style="max-width:32ch;color:var(--ink-soft);font-size:.92rem">Aquí tienes la foto general del viaje. Si quieres entrar en algo concreto, baja directamente a la sección.</p>
        </div>
        <div class="summary">
            <article class="summary__primary panel">
                <h3>Datos clave</h3>
                <div class="summary__grid">
                    <?php if ( $data['destination'] ) : ?>
                        <div class="summary-card"><span>Destino</span><strong><?php echo esc_html( $data['destination'] ); ?></strong></div>
                    <?php endif; ?>
                    <?php if ( $data['dates'] ) : ?>
                        <div class="summary-card"><span>Fechas</span><strong><?php echo esc_html( $data['dates'] ); ?></strong></div>
                    <?php endif; ?>
                    <?php if ( $pr_status_label ) : ?>
                        <div class="summary-card"><span>Estado</span><strong><?php echo esc_html( $pr_status_label ); ?></strong></div>
                    <?php endif; ?>
                    <?php if ( ! empty( $traveler_names ) ) : ?>
                        <div class="summary-card"><span>Viajeros</span><strong><?php echo esc_html( count( $traveler_names ) . ( 1 === count( $traveler_names ) ? ' adulto' : ' adultos' ) ); ?></strong></div>
                    <?php endif; ?>
                    <?php if ( $data['reference'] ) : ?>
                        <div class="summary-card"><span>Referencia</span><strong><?php echo esc_html( $data['reference'] ); ?></strong></div>
                    <?php endif; ?>
                    <?php if ( $pr_duration ) : ?>
                        <div class="summary-card"><span>Etapas</span><strong><?php echo esc_html( $pr_duration . ( 1 === $pr_duration ? ' etapa' : ' etapas' ) ); ?></strong></div>
                    <?php endif; ?>
                </div>
                <div class="quick-actions">
                    <a class="btn btn-primary" href="#documentacion">
                        Ver documentación
                        <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                    <?php if ( ! empty( $data['itinerary'] ) ) : ?>
                        <a class="btn btn-ghost" href="#itinerario">Ir al itinerario</a>
                    <?php endif; ?>
                    <?php if ( ! empty( $contact_profile['whatsapp_link'] ) ) : ?>
                    <a class="btn btn-wa" href="<?php echo esc_url( $contact_profile['whatsapp_link'] ); ?>" target="_blank" rel="noreferrer">
                        <span class="ic">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"/></svg>
                        </span>
                        <span class="copy">
                            <small>WhatsApp</small>
                            <strong>Hablar con nosotros</strong>
                        </span>
                    </a>
                    <?php endif; ?>
                </div>
            </article>

            <details class="story" open>
                <summary class="story__expand">
                    <span>Sobre el destino</span>
                    <span class="ic">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </span>
                </summary>
                <div style="padding:0 0 1.2rem;position:relative">
                    <span class="story__eye">Contexto del destino</span>
                    <h3><?php echo esc_html( $country_heading ); ?></h3>
                    <p class="lead"><?php echo esc_html( $country_subtitle ); ?></p>
                </div>
                <div class="story__body">
                    <?php echo wp_kses_post( wpautop( $country_copy ) ); ?>
                </div>
            </details>
        </div>
    </section>

    <?php if ( $has_flights ) : ?>
    <!-- ============== VUELOS ============== -->
    <section class="block" id="vuelos">
        <div class="block__head">
            <div>
                <div class="meta">02 · Vuelos</div>
                <h2>Toda la operativa aérea, <em>clara</em>.</h2>
            </div>
            <span class="badge"><?php echo esc_html( $airline_label ? $airline_label . ' · billetes emitidos' : 'Billetes emitidos' ); ?></span>
        </div>
        <div class="flights">
            <?php
            $pr_render_flight = function ( $dir_label, $dir_short, $number, $dep, $arr, $dep_time, $arr_time, $duration ) use ( $airline_label, $airline_logo ) {
                ?>
                <article class="flight">
                    <div class="flight__head">
                        <?php if ( $airline_logo ) : ?><div class="flight__logo"><img src="<?php echo esc_attr( $airline_logo ); ?>" alt="<?php echo esc_attr( $airline_label ?: 'Aerolínea' ); ?>" /></div><?php endif; ?>
                        <div class="flight__brand">
                            <small><?php echo esc_html( $dir_label ); ?></small>
                            <strong><?php echo esc_html( $airline_label ?: 'Aerolínea por confirmar' ); ?></strong>
                            <?php if ( $number ) : ?><span class="num"><?php echo esc_html( $number ); ?></span><?php endif; ?>
                        </div>
                        <span class="flight__direction"><?php echo esc_html( $dir_short ); ?></span>
                    </div>
                    <div class="flight__route">
                        <div class="segment">
                            <small class="label">Salida<?php echo $dep['label'] ? ' · ' . esc_html( $dep['label'] ) : ''; ?></small>
                            <span class="code"><?php echo esc_html( $dep['code'] ?: '---' ); ?></span>
                            <?php if ( $dep['label'] ) : ?><span class="city"><?php echo esc_html( $dep['label'] ); ?></span><?php endif; ?>
                            <?php if ( $dep_time ) : ?>
                                <span class="date"><?php echo esc_html( ukiyo_portal_format_flight_date( $dep_time ) ); ?></span>
                                <span class="time"><?php echo esc_html( ukiyo_portal_format_flight_time_only( $dep_time ) ); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="connector">
                            <?php if ( $duration ) : ?><span class="dur"><?php echo esc_html( $duration ); ?></span><?php endif; ?>
                            <span class="line"><svg class="plane" viewBox="0 0 24 24" fill="currentColor"><path d="M21 16v-2l-8-5V3.5C13 2.67 12.33 2 11.5 2S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg></span>
                            <span class="dur" style="color:var(--ink-faint)">Directo</span>
                        </div>
                        <div class="segment segment--arr">
                            <small class="label">Llegada<?php echo $arr['label'] ? ' · ' . esc_html( $arr['label'] ) : ''; ?></small>
                            <span class="code"><?php echo esc_html( $arr['code'] ?: '---' ); ?></span>
                            <?php if ( $arr['label'] ) : ?><span class="city"><?php echo esc_html( $arr['label'] ); ?></span><?php endif; ?>
                            <?php if ( $arr_time ) : ?>
                                <span class="date"><?php echo esc_html( ukiyo_portal_format_flight_date( $arr_time ) ); ?></span>
                                <span class="time"><?php echo esc_html( ukiyo_portal_format_flight_time_only( $arr_time ) ); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
                <?php
            };
            if ( $has_outbound_flight ) {
                $pr_render_flight( 'Vuelo de ida', 'Ida', $flights['outbound_flight_number'], $outbound_departure_airport, $outbound_arrival_airport, $flights['outbound_departure_time'], $flights['outbound_arrival_time'], $outbound_duration );
            }
            if ( $has_return_flight ) {
                $pr_render_flight( 'Vuelo de vuelta', 'Vuelta', $flights['return_flight_number'], $return_departure_airport, $return_arrival_airport, $flights['return_departure_time'], $flights['return_arrival_time'], $return_duration );
            }
            ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ( $has_portal_map ) : ?>
    <!-- ============== MAPA ============== -->
    <section class="block" id="mapa">
        <div class="block__head">
            <div>
                <div class="meta">03 · Mapa</div>
                <h2><?php echo $single_place_view ? 'Todos los puntos clave, <em>de un vistazo</em>.' : 'La ruta completa del viaje, <em>más visual</em>.'; ?></h2>
            </div>
        </div>
        <article class="panel map-card">
            <div class="map-card__copy">
                <h3><?php echo esc_html( $single_place_view ? sprintf( 'Mapa esencial de %s', $data['itinerary'][0]['place'] ?: $route_context ) : 'El recorrido del viaje' ); ?></h3>
                <p><?php echo esc_html( $single_place_view ? 'Los lugares importantes del viaje reunidos para ubicarlos rápido.' : 'Este mapa conecta las paradas principales en el orden del itinerario, para que visualices bien el recorrido.' ); ?></p>
                <?php if ( ! $single_place_view && ! empty( $data['itinerary'] ) ) : ?>
                <div class="map-card__points">
                    <?php $pr_n = 0; foreach ( (array) $data['itinerary'] as $pr_place ) : $pr_n++;
                        $pr_place = (array) $pr_place;
                        $pr_pdays = isset( $pr_place['days'] ) && is_array( $pr_place['days'] ) ? count( $pr_place['days'] ) : 0; ?>
                        <div class="point-row">
                            <span class="n"><?php echo esc_html( $pr_n ); ?></span>
                            <span class="name"><?php echo esc_html( $pr_place['place'] ?: '—' ); ?></span>
                            <?php if ( $pr_pdays ) : ?><span class="days"><?php echo esc_html( $pr_pdays . ( 1 === $pr_pdays ? ' día' : ' días' ) ); ?></span><?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="map-canvas">
                <div
                    class="portal-route-map"
                    data-portal-route-map
                    <?php echo $single_place_view ? 'data-route-mode="markers"' : ''; ?>
                    data-route-points="<?php echo esc_attr( wp_json_encode( $single_place_view ? $single_place_map_points : $route_points ) ); ?>"
                    style="position:absolute;inset:0;width:100%;height:100%"
                ></div>
            </div>
        </article>
    </section>
    <?php endif; ?>

    <?php if ( ! empty( $data['itinerary'] ) ) : ?>
    <!-- ============== ITINERARIO ============== -->
    <section class="block" id="itinerario">
        <div class="block__head">
            <div>
                <div class="meta">04 · Itinerario</div>
                <h2>Una lectura clara de <em>cada etapa</em>.</h2>
            </div>
            <p style="max-width:32ch;color:var(--ink-soft);font-size:.92rem">Cada parada incluye los días, las actividades del equipo local y dónde dormís.</p>
        </div>
        <div class="timeline">
            <?php $pr_pi = 0; foreach ( (array) $data['itinerary'] as $place ) : $pr_pi++;
                $place           = (array) $place;
                $place_image_url = ! empty( $place['image_id'] ) ? wp_get_attachment_image_url( $place['image_id'], 'large' ) : '';
                $place_days      = isset( $place['days'] ) && is_array( $place['days'] ) ? $place['days'] : array();
                ?>
                <details class="place"<?php echo 1 === $pr_pi ? ' open' : ''; ?>>
                    <summary>
                        <div class="place__num"><?php echo esc_html( str_pad( (string) $pr_pi, 2, '0', STR_PAD_LEFT ) ); ?></div>
                        <div class="place__title">
                            <strong><?php echo esc_html( $place['place'] ?: 'Etapa ' . $pr_pi ); ?></strong>
                            <small><?php echo esc_html( count( $place_days ) . ( 1 === count( $place_days ) ? ' día' : ' días' ) . ' en este lugar' ); ?></small>
                        </div>
                        <?php if ( $place_image_url ) : ?><div class="place__visual"><img src="<?php echo esc_url( $place_image_url ); ?>" alt="<?php echo esc_attr( $place['place'] ); ?>" /></div><?php endif; ?>
                        <span class="place__toggle">
                            <span>Ver estancia</span>
                            <span class="ic"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg></span>
                        </span>
                    </summary>
                    <div class="place__content">
                        <?php $pr_di = 0; foreach ( $place_days as $day ) : $pr_di++;
                            $day            = (array) $day;
                            $day_number     = isset( $day['day_number'] ) ? (int) $day['day_number'] : $pr_di;
                            $day_images     = ukiyo_portal_normalize_attachment_ids( isset( $day['image_ids'] ) ? $day['image_ids'] : array() );
                            $day_img_url    = ! empty( $day_images ) ? wp_get_attachment_image_url( $day_images[0], 'large' ) : '';
                            $active_accommodation = ukiyo_portal_get_active_place_accommodation( $place, $day_number, $pr_di - 1 );
                            $stay_image_url = ! empty( $active_accommodation['image_id'] ) ? wp_get_attachment_image_url( $active_accommodation['image_id'], 'large' ) : '';
                            ?>
                            <div class="day">
                                <div class="day__copy">
                                    <div class="day__head">
                                        <span class="day__num">Día <?php echo esc_html( $day_number ); ?></span>
                                        <?php if ( ! empty( $day['title'] ) ) : ?><h4><?php echo esc_html( $day['title'] ); ?></h4><?php endif; ?>
                                    </div>
                                    <?php if ( ! empty( $day['description'] ) ) : ?><p class="day__desc"><?php echo esc_html( wp_strip_all_tags( $day['description'] ) ); ?></p><?php endif; ?>
                                    <?php if ( ! empty( $day['schedule'] ) || ! empty( $day['location_name'] ) ) : ?>
                                    <div class="day__facts">
                                        <?php if ( ! empty( $day['schedule'] ) ) : ?>
                                        <div class="day-fact">
                                            <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
                                            <div class="txt"><small>Horario</small><span><?php echo esc_html( $day['schedule'] ); ?></span></div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if ( ! empty( $day['location_name'] ) ) : ?>
                                        <div class="day-fact">
                                            <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
                                            <div class="txt"><small>Lugar</small><span><?php echo esc_html( $day['location_name'] ); ?></span></div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="day__visual">
                                    <?php if ( $day_img_url ) : ?>
                                    <div class="day__img" style="min-height:240px">
                                        <img src="<?php echo esc_url( $day_img_url ); ?>" alt="<?php echo esc_attr( $place['place'] ); ?>" />
                                        <?php if ( $place['place'] ) : ?><span class="tag"><?php echo esc_html( $place['place'] ); ?></span><?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $active_accommodation['name'] ) ) : ?>
                                    <div class="stay">
                                        <?php if ( $stay_image_url ) : ?><div class="stay__img"><img src="<?php echo esc_url( $stay_image_url ); ?>" alt="<?php echo esc_attr( $active_accommodation['name'] ); ?>" /></div><?php endif; ?>
                                        <div class="stay__body">
                                            <span class="label">Alojamiento</span>
                                            <h5><?php echo esc_html( $active_accommodation['name'] ); ?></h5>
                                            <?php if ( ! empty( $active_accommodation['location'] ) ) : ?><p><?php echo esc_html( $active_accommodation['location'] ); ?></p><?php endif; ?>
                                            <?php if ( ! empty( $active_accommodation['rating'] ) ) : ?><span class="rating"><span class="brand"><?php echo esc_html( $active_accommodation['rating_source'] ?: 'Booking' ); ?></span><strong><?php echo esc_html( $active_accommodation['rating'] ); ?></strong><span class="stars">★★★★★</span></span><?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </details>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ( ! empty( $data['documents'] ) ) : ?>
    <!-- ============== DOCUMENTACIÓN ============== -->
    <section class="block" id="documentacion">
        <div class="block__head">
            <div>
                <div class="meta">05 · Documentación</div>
                <h2>Todo lo que necesitas <em>guardado</em> en un sitio.</h2>
            </div>
            <span class="badge"><?php echo esc_html( count( $data['documents'] ) . ' documentos' ); ?></span>
        </div>
        <div class="docs">
            <?php foreach ( $data['documents'] as $index => $document ) :
                $document       = (array) $document;
                $document_href  = ukiyo_portal_get_document_url( $trip, $index );
                $doc_type_label = isset( $document_types[ $document['type'] ] ) ? $document_types[ $document['type'] ] : 'Documento';
                $is_resource    = 'recurso' === ( isset( $document['type'] ) ? (string) $document['type'] : '' ) || ( ! empty( $document['url'] ) && empty( $document['file_id'] ) );
                if ( ! $document_href ) { continue; } ?>
                <a href="<?php echo esc_url( $document_href ); ?>" class="doc"<?php echo $is_resource ? '' : ' target="_blank" rel="noopener"'; ?>>
                    <div class="doc__type">
                        <span class="tag"><?php echo esc_html( $doc_type_label ); ?></span>
                        <div class="doc__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
                    </div>
                    <h4><?php echo esc_html( $document['name'] ?: $doc_type_label ); ?></h4>
                    <?php if ( ! empty( $document['description'] ) ) : ?><p><?php echo esc_html( wp_strip_all_tags( $document['description'] ) ); ?></p><?php endif; ?>
                    <span class="doc__open"><?php echo $is_resource ? 'Ver recurso' : 'Abrir'; ?> <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ( ! empty( $data['recommendations'] ) ) : ?>
    <!-- ============== RECOMENDACIONES ============== -->
    <section class="block" id="recomendaciones">
        <div class="block__head">
            <div>
                <div class="meta">06 · Recomendaciones</div>
                <h2>Lugares que el equipo local <em>insiste</em> en que veáis.</h2>
            </div>
            <p style="max-width:32ch;color:var(--ink-soft);font-size:.92rem">Lugares concretos del equipo local. Sin patrocinios, sin catálogo.</p>
        </div>
        <div class="recs">
            <?php foreach ( (array) $data['recommendations'] as $rec ) :
                $rec       = (array) $rec;
                $rec_meta  = ukiyo_portal_get_recommendation_category_meta( isset( $rec['category'] ) ? $rec['category'] : '' );
                $rec_img   = ! empty( $rec['image_id'] ) ? wp_get_attachment_image_url( $rec['image_id'], 'large' ) : '';
                $rec_place = trim( (string) ( isset( $rec['place'] ) ? $rec['place'] : '' ) );
                $rec_rating = isset( $rec['rating'] ) ? trim( (string) $rec['rating'] ) : '';
                if ( empty( $rec['name'] ) ) { continue; } ?>
                <article class="rec">
                    <?php if ( $rec_img ) : ?>
                    <div class="rec__img">
                        <img src="<?php echo esc_url( $rec_img ); ?>" alt="<?php echo esc_attr( $rec['name'] ); ?>" />
                        <span class="rec__cat"><span class="ic"><?php echo esc_html( $rec_meta['icon'] ); ?></span> <?php echo esc_html( $rec_meta['label'] . ( $rec_place ? ' · ' . $rec_place : '' ) ); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="rec__body">
                        <h4><?php echo esc_html( $rec['name'] ); ?></h4>
                        <?php if ( ! empty( $rec['description'] ) ) : ?><p><?php echo esc_html( wp_strip_all_tags( $rec['description'] ) ); ?></p><?php endif; ?>
                        <div class="rec__foot">
                            <?php if ( $rec_rating ) : ?><span class="rating"><span class="brand">Google</span><strong><?php echo esc_html( $rec_rating ); ?></strong><span class="stars">★★★★★</span></span><?php endif; ?>
                            <?php if ( ! empty( $rec['url'] ) ) : ?><a href="<?php echo esc_url( $rec['url'] ); ?>" target="_blank" rel="noreferrer" style="font-family:var(--font-mono);font-size:.72rem;color:var(--primary);font-weight:600"><?php echo esc_html( $rec['cta_label'] ?: 'Ver más' ); ?> →</a><?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- ============== CONTACTO + eSIM ============== -->
    <section class="block" id="contacto">
        <div class="block__head">
            <div>
                <div class="meta">07 · Contacto</div>
                <h2>Cualquier cosa, <em>aquí estamos</em>.</h2>
            </div>
            <span class="badge">Respuesta &lt; 2 horas</span>
        </div>
        <div class="contact-wrap">
            <article class="contact">
                <div class="contact__head">
                    <div class="contact__who">
                        <small>Tu equipo</small>
                        <strong>Ukiyo · <?php echo esc_html( $data['destination'] ?: 'tu viaje' ); ?></strong>
                        <p>Estamos contigo antes y durante el viaje. Escríbenos por WhatsApp o correo cuando lo necesites.</p>
                    </div>
                </div>
                <div class="contact__methods">
                    <?php if ( ! empty( $contact_profile['whatsapp_link'] ) ) : ?>
                    <a class="contact-method" href="<?php echo esc_url( $contact_profile['whatsapp_link'] ); ?>" target="_blank" rel="noreferrer">
                        <div class="ic"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"/></svg></div>
                        <div class="txt"><small>WhatsApp</small><strong>Escríbenos ahora</strong></div>
                    </a>
                    <?php endif; ?>
                    <?php if ( ! empty( $contact_profile['email_link'] ) ) : ?>
                    <a class="contact-method" href="<?php echo esc_url( $contact_profile['email_link'] ); ?>">
                        <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
                        <div class="txt"><small>Email</small><strong><?php echo esc_html( $contact_profile['email_label'] ?: 'Escríbenos' ); ?></strong></div>
                    </a>
                    <?php endif; ?>
                </div>
            </article>

            <?php if ( ! empty( $saily_profile['title'] ) ) : ?>
            <article class="esim">
                <?php if ( ! empty( $saily_profile['eyebrow'] ) ) : ?><span class="esim__eye"><?php echo esc_html( $saily_profile['eyebrow'] ); ?></span><?php endif; ?>
                <h3><?php echo esc_html( $saily_profile['title'] ); ?></h3>
                <?php if ( ! empty( $saily_profile['copy'] ) ) : ?><p><?php echo esc_html( $saily_profile['copy'] ); ?></p><?php endif; ?>
                <?php if ( ! empty( $saily_profile['url'] ) ) : ?>
                <a class="esim__cta" href="<?php echo esc_url( $saily_profile['url'] ); ?>" target="_blank" rel="noopener noreferrer sponsored">
                    Activar eSIM de Saily
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <?php endif; ?>
            </article>
            <?php endif; ?>
        </div>
    </section>

    <div class="foot shell" style="padding-left:0;padding-right:0">
        <span class="stamp">Ukiyo · Portal del Aventurero</span>
        <small>Tu sesión está protegida<?php echo $data['reference'] ? ' · ' . esc_html( $data['reference'] ) : ''; ?></small>
    </div>

</main>
</div>

<script>
(function(){
    var links = Array.prototype.slice.call(document.querySelectorAll('.uk-portal .section-nav a'));
    if (!links.length) return;
    var sections = links.map(function(a){ return document.querySelector(a.getAttribute('href')); });
    function onScroll(){
        var y = window.scrollY + 200, idx = 0;
        sections.forEach(function(s, k){ if (s && s.offsetTop <= y) idx = k; });
        links.forEach(function(a, k){ a.classList.toggle('is-active', k === idx); });
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
})();
</script>

<?php
get_footer();
