<?php
/**
 * Vista publica de propuesta comercial del Portal del Aventurero.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$trip = ukiyo_portal_get_current_trip();

if ( ! $trip instanceof WP_Post ) {
    ukiyo_portal_force_404();
}

$data             = ukiyo_portal_get_trip_data( $trip );
$hero             = ukiyo_portal_get_trip_hero_image_url( $trip );
$proposal         = wp_parse_args( $data['proposal'], ukiyo_portal_get_proposal_defaults() );
$contact_profile  = ukiyo_portal_get_global_contact_profile();
$travelers        = ukiyo_portal_parse_travelers( $data['travelers'] );
$includes         = ukiyo_portal_parse_list_items( $proposal['includes'] );
$excludes         = ukiyo_portal_parse_list_items( $proposal['excludes'] );
$price_breakdown  = ukiyo_portal_parse_price_breakdown( $proposal['price_breakdown'] );
$cta_label        = $proposal['cta_label'] ? $proposal['cta_label'] : 'ME GUSTA';
$cta_url          = ukiyo_portal_get_proposal_approval_url( $trip, $proposal['token'] );
$valid_until      = ukiyo_portal_format_proposal_valid_until( $proposal['valid_until'] );
$recommendations  = ukiyo_portal_group_recommendations( $data['recommendations'], $data['itinerary'] );
$trip_reference   = $data['reference'] ? $data['reference'] : strtoupper( 'UKIYO-' . $trip->ID );
$recipient_name   = trim( (string) $proposal['recipient_name'] );
$traveler_count   = ! empty( $proposal['traveler_count_override'] ) ? (int) $proposal['traveler_count_override'] : ( ! empty( $travelers ) ? count( $travelers ) : 2 );
$traveler_label   = 1 === $traveler_count ? 'persona' : 'personas';
$proposal_response = isset( $_GET['proposal_response'] ) ? sanitize_key( wp_unslash( $_GET['proposal_response'] ) ) : '';
$response_meta    = ukiyo_portal_get_proposal_response_status_meta( $proposal['response_status'] );
$change_form_open = 'changes_error' === $proposal_response;
$place_count      = count( $data['itinerary'] );
$total_days       = 0;
$parse_proposal_day_items = static function ( $value ) {
    $value = trim( (string) $value );

    if ( '' === $value ) {
        return [];
    }

    $parts = preg_split( '/\r\n|\r|\n|\||•/', $value );

    if ( ! is_array( $parts ) ) {
        return [];
    }

    $parts = array_map(
        static function ( $item ) {
            return trim( wp_strip_all_tags( (string) $item ) );
        },
        $parts
    );

    return array_values( array_filter( $parts ) );
};

foreach ( (array) $data['itinerary'] as $place ) {
    $place_days = isset( $place['days'] ) && is_array( $place['days'] ) ? count( $place['days'] ) : 0;
    $total_days += $place_days ? $place_days : max( 1, (int) $place['stay_days'] );
}

if ( 0 === $total_days ) {
    $total_days = max( 1, $place_count );
}

get_header();
?>

<main class="ukiyo-portal ukiyo-portal-proposal">
    <section class="proposal-hero" style="background-image:url('<?php echo esc_url( $hero ); ?>')">
        <div class="proposal-hero__overlay"></div>
        <div class="portal-shell proposal-hero__inner">
            <div class="proposal-hero__kicker"><?php echo esc_html( $trip_reference ); ?></div>
            <?php if ( $recipient_name ) : ?>
                <p class="proposal-hero__recipient">Propuesta para <?php echo esc_html( $recipient_name ); ?></p>
            <?php endif; ?>
            <h1><?php echo esc_html( get_the_title( $trip ) ); ?></h1>
            <p class="proposal-hero__lede">
                <?php echo esc_html( $data['subtitle'] ? $data['subtitle'] : 'Una propuesta de viaje diseñada con detalle, ritmo y una lectura clara de todo lo importante.' ); ?>
            </p>

            <div class="proposal-hero__meta">
                <?php if ( $data['destination'] ) : ?>
                    <span class="proposal-meta-pill">Destino · <?php echo esc_html( $data['destination'] ); ?></span>
                <?php endif; ?>
                <?php if ( $data['dates'] ) : ?>
                    <span class="proposal-meta-pill">Fechas · <?php echo esc_html( $data['dates'] ); ?></span>
                <?php endif; ?>
                <span class="proposal-meta-pill">Duración · <?php echo esc_html( number_format_i18n( $total_days ) ); ?> días</span>
            </div>

            <div class="proposal-hero__actions">
                <a class="portal-btn proposal-hero__secondary" href="#resumen">Ver propuesta</a>
            </div>
        </div>
    </section>

    <nav class="proposal-sticky-nav" data-portal-nav>
        <div class="portal-shell proposal-sticky-nav__inner">
            <a href="#resumen">Resumen</a>
            <?php if ( ! empty( $price_breakdown ) ) : ?>
                <a href="#precio">Precio</a>
            <?php endif; ?>
            <a href="#servicios">Servicios</a>
            <a href="#itinerario">Itinerario</a>
            <a href="#selecciones">Selecciones</a>
        </div>
    </nav>

    <section class="portal-shell proposal-overview" id="resumen" data-portal-section>
        <div class="proposal-overview__grid">
            <article class="proposal-stat-card">
                <span class="proposal-stat-card__label">Duración</span>
                <strong><?php echo esc_html( number_format_i18n( $total_days ) ); ?> días</strong>
            </article>
            <article class="proposal-stat-card">
                <span class="proposal-stat-card__label">Viajeros</span>
                <strong><?php echo esc_html( number_format_i18n( $traveler_count ) ); ?> <?php echo esc_html( $traveler_label ); ?></strong>
            </article>
            <article class="proposal-stat-card proposal-stat-card--accent">
                <span class="proposal-stat-card__label">Estado</span>
                <strong><?php echo esc_html( $response_meta['label'] ); ?></strong>
            </article>
            <?php if ( $recipient_name ) : ?>
                <article class="proposal-stat-card proposal-stat-card--accent">
                    <span class="proposal-stat-card__label">Propuesta para</span>
                    <strong><?php echo esc_html( $recipient_name ); ?></strong>
                </article>
            <?php endif; ?>
        </div>
    </section>

    <section class="portal-shell proposal-layout">
        <div class="proposal-layout__main">
            <?php if ( 'approved' === $proposal_response ) : ?>
                <div class="proposal-notice proposal-notice--success">Perfecto. Ya sabemos que la propuesta os encaja.</div>
            <?php elseif ( 'changes_sent' === $proposal_response ) : ?>
                <div class="proposal-notice proposal-notice--info">Hemos recibido vuestra propuesta de cambios. La revisaremos y volveremos con una nueva versión.</div>
            <?php elseif ( 'changes_error' === $proposal_response ) : ?>
                <div class="proposal-notice proposal-notice--error">Escribe qué queréis ajustar antes de enviar la propuesta de cambios.</div>
            <?php endif; ?>
            <article class="proposal-panel proposal-panel--intro">
                <div class="proposal-panel__header">
                    <span class="proposal-section-kicker">Visión general</span>
                    <h2>Conociendo vuestro destino</h2>
                </div>
                <div class="proposal-panel__body">
                    <p><?php echo esc_html( $data['welcome'] ? $data['welcome'] : 'Aquí tienes una versión clara y visual del viaje: recorrido, servicios, precio orientativo y los elementos que marcan la experiencia.' ); ?></p>
                    <?php if ( $data['country_story'] ) : ?>
                        <div class="proposal-rich-copy">
                            <?php echo wp_kses_post( $data['country_story'] ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </article>

            <?php if ( ! empty( $price_breakdown ) ) : ?>
                <section class="proposal-price-breakdown" id="precio" data-portal-section>
                    <div class="proposal-panel__header">
                        <span class="proposal-section-kicker">Transparencia</span>
                        <h2>Así se construye el precio de esta propuesta.</h2>
                    </div>

                    <div class="proposal-price-breakdown__intro">
                        <p>Desglosamos la base económica del viaje para que podáis entender qué estáis pagando y qué peso tiene cada parte dentro de la experiencia.</p>
                    </div>

                    <div class="proposal-price-breakdown__table" role="list">
                        <?php foreach ( $price_breakdown as $item ) : ?>
                            <article class="proposal-price-breakdown__row" role="listitem">
                                <div class="proposal-price-breakdown__copy">
                                    <?php if ( $item['label'] ) : ?>
                                        <h3><?php echo esc_html( $item['label'] ); ?></h3>
                                    <?php endif; ?>
                                    <?php if ( $item['note'] ) : ?>
                                        <p><?php echo esc_html( $item['note'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php if ( $item['amount'] ) : ?>
                                    <strong class="proposal-price-breakdown__amount"><?php echo esc_html( $item['amount'] ); ?></strong>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <?php if ( $proposal['price'] || $proposal['price_note'] || $valid_until ) : ?>
                        <div class="proposal-price-breakdown__summary">
                            <div>
                                <span class="proposal-price-breakdown__summary-label">Base total de la propuesta</span>
                                <strong><?php echo esc_html( $proposal['price'] ? $proposal['price'] : 'A consultar' ); ?></strong>
                            </div>
                            <div class="proposal-price-breakdown__summary-meta">
                                <?php if ( $proposal['price_note'] ) : ?>
                                    <p><?php echo esc_html( $proposal['price_note'] ); ?></p>
                                <?php endif; ?>
                                <?php if ( $valid_until ) : ?>
                                    <p>Válida hasta el <?php echo esc_html( $valid_until ); ?>.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </section>
            <?php endif; ?>

            <section class="proposal-services" id="servicios" data-portal-section>
                <div class="proposal-panel__header">
                    <span class="proposal-section-kicker">Servicios</span>
                    <h2>Qué está contemplado y qué dejamos fuera.</h2>
                </div>
                <div class="proposal-services__grid">
                    <article class="proposal-service-card proposal-service-card--included">
                        <div class="proposal-service-card__head">
                            <span class="proposal-service-card__icon">+</span>
                            <div>
                                <span class="proposal-service-card__eyebrow">Incluido</span>
                            </div>
                        </div>
                        <?php if ( ! empty( $includes ) ) : ?>
                            <ul class="proposal-service-list">
                                <?php foreach ( $includes as $item ) : ?>
                                    <li><?php echo esc_html( $item ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <p>Definiremos contigo el alcance final del viaje antes del cierre.</p>
                        <?php endif; ?>
                    </article>

                    <article class="proposal-service-card proposal-service-card--excluded">
                        <div class="proposal-service-card__head">
                            <span class="proposal-service-card__icon">-</span>
                            <div>
                                <span class="proposal-service-card__eyebrow">No incluido</span>
                            </div>
                        </div>
                        <?php if ( ! empty( $excludes ) ) : ?>
                            <ul class="proposal-service-list">
                                <?php foreach ( $excludes as $item ) : ?>
                                    <li><?php echo esc_html( $item ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <p>Indicaremos aquí cualquier opcional o servicio que se gestione por separado.</p>
                        <?php endif; ?>
                    </article>
                </div>
            </section>

            <section class="proposal-itinerary" id="itinerario" data-portal-section>
                <div class="proposal-panel__header">
                    <span class="proposal-section-kicker">Itinerario</span>
                    <h2>Una lectura clara de cada etapa del viaje.</h2>
                </div>

                <?php if ( empty( $data['itinerary'] ) ) : ?>
                    <div class="portal-empty-block">Estamos cerrando el recorrido detallado. En cuanto esté listo, aparecerá aquí.</div>
                <?php else : ?>
                    <div class="proposal-itinerary__list">
                        <?php foreach ( $data['itinerary'] as $index => $place ) : ?>
                            <?php
                            $place_name                  = $place['place'] ? $place['place'] : 'Siguiente parada';
                            $place_copy                  = isset( $place['place_description'] ) ? trim( (string) $place['place_description'] ) : '';
                            $place_image_url             = ! empty( $place['image_id'] ) ? wp_get_attachment_image_url( $place['image_id'], 'large' ) : $hero;
                            $days                        = isset( $place['days'] ) && is_array( $place['days'] ) ? $place['days'] : [];
                            $accent_class                = 0 === $index % 3 ? 'is-blue' : ( 1 === $index % 3 ? 'is-amber' : 'is-slate' );
                            $place_accommodation_summary = ukiyo_portal_get_place_accommodation_summary( $place );
                            ?>
                            <article class="proposal-stop-card <?php echo esc_attr( $accent_class ); ?>">
                                <div class="proposal-stop-card__media">
                                    <img src="<?php echo esc_url( $place_image_url ); ?>" alt="<?php echo esc_attr( $place_name ); ?>" />
                                </div>
                                <div class="proposal-stop-card__body">
                                    <div class="proposal-stop-card__head">
                                        <div>
                                            <span class="proposal-stop-card__daycount"><?php echo esc_html( number_format_i18n( max( 1, (int) $place['stay_days'] ) ) ); ?> día(s)</span>
                                            <h3><?php echo esc_html( $place_name ); ?></h3>
                                        </div>
                                        <?php if ( $place_accommodation_summary && 'Alojamiento por definir' !== $place_accommodation_summary ) : ?>
                                            <span class="proposal-stop-card__tag"><?php echo esc_html( $place_accommodation_summary ); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ( ! empty( $place['accommodations'] ) && 1 === count( $place['accommodations'] ) && ! empty( $place['accommodations'][0]['location'] ) ) : ?>
                                        <p class="proposal-stop-card__location"><?php echo esc_html( $place['accommodations'][0]['location'] ); ?></p>
                                    <?php elseif ( $place['accommodation_location'] && empty( $place['accommodations'] ) ) : ?>
                                        <p class="proposal-stop-card__location"><?php echo esc_html( $place['accommodation_location'] ); ?></p>
                                    <?php endif; ?>

                                    <?php if ( $place_copy ) : ?>
                                        <div class="proposal-stop-card__copy">
                                            <?php echo wp_kses_post( wpautop( $place_copy ) ); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( ! empty( $days ) ) : ?>
                                        <div class="proposal-day-stack">
                                            <?php foreach ( $days as $day ) : ?>
                                                <?php
                                                $day_description = isset( $day['description'] ) ? wp_strip_all_tags( (string) $day['description'] ) : '';
                                                $day_schedule    = isset( $day['schedule'] ) ? trim( (string) $day['schedule'] ) : '';
                                                $day_tips        = isset( $day['recommendations'] ) ? trim( (string) $day['recommendations'] ) : '';
                                                $day_activities  = array_values(
                                                    array_unique(
                                                        array_merge(
                                                            $parse_proposal_day_items( $day_schedule ),
                                                            $parse_proposal_day_items( $day_tips )
                                                        )
                                                    )
                                                );
                                                ?>
                                                <div class="proposal-day-item">
                                                    <div class="proposal-day-item__topline">
                                                        <strong>Día <?php echo esc_html( number_format_i18n( (int) $day['day_number'] ) ); ?></strong>
                                                        <span class="proposal-day-item__eyebrow">Qué vivirás</span>
                                                    </div>
                                                    <span class="proposal-day-item__title"><?php echo esc_html( $day['title'] ? $day['title'] : wp_trim_words( wp_strip_all_tags( $day['description'] ), 10 ) ); ?></span>
                                                    <?php if ( $day_description ) : ?>
                                                        <div class="proposal-day-item__content">
                                                            <?php echo wpautop( esc_html( $day_description ) ); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ( ! empty( $day_activities ) ) : ?>
                                                        <div class="proposal-day-item__activities">
                                                            <span class="proposal-day-item__activities-label">Actividades y momentos clave</span>
                                                            <ul class="proposal-day-item__activity-list">
                                                                <?php foreach ( $day_activities as $activity_item ) : ?>
                                                                    <li><?php echo esc_html( $activity_item ); ?></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php elseif ( ! $place_copy ) : ?>
                                        <p class="proposal-stop-card__copy">Base pensada para descubrir esta zona con ritmo cómodo y margen para disfrutar.</p>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>

            <?php if ( ! empty( $recommendations ) ) : ?>
                <section class="proposal-selections" id="selecciones" data-portal-section>
                    <div class="proposal-panel__header">
                        <span class="proposal-section-kicker">Selecciones UKIYO</span>
                        <h2>Ideas, lugares y recursos que ayudan a imaginar el viaje mejor.</h2>
                    </div>
                    <div class="proposal-selection-grid">
                        <?php foreach ( $recommendations as $section ) : ?>
                            <?php foreach ( $section['groups'] as $category => $items ) : ?>
                                <?php foreach ( array_slice( $items, 0, 4 ) as $item ) : ?>
                                    <article class="proposal-selection-card">
                                        <span class="proposal-selection-card__category"><?php echo esc_html( $category ); ?></span>
                                        <h3><?php echo esc_html( $item['name'] ); ?></h3>
                                        <?php if ( $section['title'] ) : ?>
                                            <p class="proposal-selection-card__place"><?php echo esc_html( $section['title'] ); ?></p>
                                        <?php endif; ?>
                                        <p><?php echo esc_html( wp_trim_words( wp_strip_all_tags( $item['description'] ), 22 ) ); ?></p>
                                    </article>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <section class="proposal-bottom-cta" data-portal-section>
                <div class="proposal-bottom-cta__copy">
                    <span class="proposal-section-kicker">Siguiente paso</span>
                    <h2>Si os encaja, lo siguiente es cerrarlo juntos.</h2>
                    <p>La propuesta ya está lista para comentarla. Si queréis avanzar, revisamos ajustes, resolvemos dudas y dejamos el viaje encaminado.</p>
                </div>
                <div class="proposal-bottom-cta__actions">
                    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="proposal-response-form" data-proposal-response-form="approve">
                        <input type="hidden" name="action" value="ukiyo_portal_proposal_response" />
                        <input type="hidden" name="response_type" value="approve" />
                        <input type="hidden" name="trip_id" value="<?php echo esc_attr( (string) $trip->ID ); ?>" />
                        <input type="hidden" name="token" value="<?php echo esc_attr( $proposal['token'] ); ?>" />
                        <input type="hidden" name="_wpnonce" value="<?php echo esc_attr( ukiyo_portal_get_proposal_response_nonce( $trip, 'approve', $proposal['token'] ) ); ?>" />
                        <button class="portal-btn portal-btn--primary proposal-approve-button" type="submit" data-proposal-submit-button="approve">
                            <span class="proposal-approve-button__icons" aria-hidden="true">
                                <svg viewBox="0 0 24 24" focusable="false"><path d="M2 21h4V9H2v12Zm20-11.2a2.8 2.8 0 0 0-2.8-2.8h-5L15 3.3a1.9 1.9 0 0 0-1.8-2.5l-.6.1-5 5.8c-.4.5-.6 1.1-.6 1.8V19a2 2 0 0 0 2 2h8.2a2.8 2.8 0 0 0 2.7-2.1l1.6-7.1c.1-.3.1-.7.1-1Z" fill="currentColor"/></svg>
                                <svg viewBox="0 0 24 24" focusable="false"><path d="M12 21.35 10.55 20C5.4 15.24 2 12.1 2 8.25A5.25 5.25 0 0 1 7.25 3C9.04 3 10.76 3.83 12 5.14 13.24 3.83 14.96 3 16.75 3A5.25 5.25 0 0 1 22 8.25c0 3.85-3.4 6.99-8.55 11.76L12 21.35Z" fill="currentColor"/></svg>
                            </span>
                            <span><?php echo esc_html( $cta_label ); ?></span>
                        </button>
                    </form>
                    <button class="portal-btn portal-btn--ghost proposal-change-toggle" type="button" data-proposal-change-toggle aria-controls="proposal-feedback-form" aria-expanded="<?php echo $change_form_open ? 'true' : 'false'; ?>">Proponer cambios</button>
                </div>
                <form class="proposal-change-request<?php echo $change_form_open ? ' is-open' : ''; ?>" id="proposal-feedback-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" data-proposal-change-form <?php echo $change_form_open ? '' : 'hidden'; ?>>
                    <input type="hidden" name="action" value="ukiyo_portal_proposal_response" />
                    <input type="hidden" name="response_type" value="changes" />
                    <input type="hidden" name="trip_id" value="<?php echo esc_attr( (string) $trip->ID ); ?>" />
                    <input type="hidden" name="token" value="<?php echo esc_attr( $proposal['token'] ); ?>" />
                    <input type="hidden" name="_wpnonce" value="<?php echo esc_attr( ukiyo_portal_get_proposal_response_nonce( $trip, 'changes', $proposal['token'] ) ); ?>" />
                    <label class="proposal-change-request__field" for="proposal_change_request">
                        <span>Contadnos qué queréis ajustar</span>
                        <textarea id="proposal_change_request" name="proposal_change_request" rows="5" placeholder="Por ejemplo: cambiar hotel, ajustar el ritmo del itinerario, ampliar una noche o revisar el presupuesto." required></textarea>
                    </label>
                    <button class="portal-btn portal-btn--primary" type="submit" data-proposal-change-submit>Enviar cambios</button>
                </form>
            </section>
        </div>

        <aside class="proposal-layout__aside">
            <div class="proposal-sidebar-card proposal-sidebar-card--price">
                <span class="proposal-sidebar-card__label">Precio orientativo</span>
                <strong class="proposal-sidebar-card__price"><?php echo esc_html( $proposal['price'] ? $proposal['price'] : 'A consultar' ); ?></strong>
                <?php if ( $proposal['price_note'] ) : ?>
                    <p><?php echo esc_html( $proposal['price_note'] ); ?></p>
                <?php endif; ?>
                <?php if ( $valid_until ) : ?>
                    <p class="proposal-sidebar-card__muted">Válida hasta el <?php echo esc_html( $valid_until ); ?></p>
                <?php endif; ?>
                <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="proposal-response-form proposal-sidebar-card__action" data-proposal-response-form="approve">
                    <input type="hidden" name="action" value="ukiyo_portal_proposal_response" />
                    <input type="hidden" name="response_type" value="approve" />
                    <input type="hidden" name="trip_id" value="<?php echo esc_attr( (string) $trip->ID ); ?>" />
                    <input type="hidden" name="token" value="<?php echo esc_attr( $proposal['token'] ); ?>" />
                    <input type="hidden" name="_wpnonce" value="<?php echo esc_attr( ukiyo_portal_get_proposal_response_nonce( $trip, 'approve', $proposal['token'] ) ); ?>" />
                    <button class="portal-btn portal-btn--primary proposal-approve-button" type="submit" data-proposal-submit-button="approve">
                        <span class="proposal-approve-button__icons" aria-hidden="true">
                            <svg viewBox="0 0 24 24" focusable="false"><path d="M2 21h4V9H2v12Zm20-11.2a2.8 2.8 0 0 0-2.8-2.8h-5L15 3.3a1.9 1.9 0 0 0-1.8-2.5l-.6.1-5 5.8c-.4.5-.6 1.1-.6 1.8V19a2 2 0 0 0 2 2h8.2a2.8 2.8 0 0 0 2.7-2.1l1.6-7.1c.1-.3.1-.7.1-1Z" fill="currentColor"/></svg>
                            <svg viewBox="0 0 24 24" focusable="false"><path d="M12 21.35 10.55 20C5.4 15.24 2 12.1 2 8.25A5.25 5.25 0 0 1 7.25 3C9.04 3 10.76 3.83 12 5.14 13.24 3.83 14.96 3 16.75 3A5.25 5.25 0 0 1 22 8.25c0 3.85-3.4 6.99-8.55 11.76L12 21.35Z" fill="currentColor"/></svg>
                        </span>
                        <span><?php echo esc_html( $cta_label ); ?></span>
                    </button>
                </form>
                <button class="portal-btn portal-btn--ghost proposal-sidebar-card__action proposal-change-toggle" type="button" data-proposal-change-toggle aria-controls="proposal-feedback-form" aria-expanded="<?php echo $change_form_open ? 'true' : 'false'; ?>">Proponer cambios</button>
                <a class="portal-btn portal-btn--ghost proposal-sidebar-card__action" href="<?php echo esc_url( $contact_profile['email_link'] ); ?>"><?php echo esc_html( $contact_profile['email_label'] ); ?></a>
            </div>

            <div class="proposal-sidebar-card">
                <span class="proposal-sidebar-card__label">Resumen rápido</span>
                <ul class="proposal-sidebar-list">
                    <li><strong>Referencia</strong><span><?php echo esc_html( $trip_reference ); ?></span></li>
                    <li><strong>Destino</strong><span><?php echo esc_html( $data['destination'] ? $data['destination'] : 'A medida' ); ?></span></li>
                    <li><strong>Duración</strong><span><?php echo esc_html( number_format_i18n( $total_days ) ); ?> días</span></li>
                    <li><strong>Viajeros</strong><span><?php echo esc_html( number_format_i18n( $traveler_count ) ); ?> <?php echo esc_html( $traveler_label ); ?></span></li>
                    <?php if ( $recipient_name ) : ?>
                        <li><strong>Propuesta para</strong><span><?php echo esc_html( $recipient_name ); ?></span></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="proposal-sidebar-card proposal-sidebar-card--contact">
                <span class="proposal-sidebar-card__label">Contacto UKIYO</span>
                <div class="proposal-contact-list">
                    <a href="<?php echo esc_url( $contact_profile['whatsapp_link'] ); ?>" target="_blank" rel="noreferrer"><?php echo esc_html( $contact_profile['support_text'] ); ?> · <?php echo esc_html( $contact_profile['whatsapp_label'] ); ?></a>
                    <a href="<?php echo esc_url( $contact_profile['email_link'] ); ?>"><?php echo esc_html( $contact_profile['email_label'] ); ?></a>
                </div>
            </div>
        </aside>
    </section>
</main>

<?php get_footer(); ?>
