<?php
/**
 * [ukiyo_trip_card] — Card de viaje de autor embebida en un artículo.
 *
 * Uso:
 *   [ukiyo_trip_card]                — usa el meta ukiyo_related_trip_id del post actual
 *   [ukiyo_trip_card id="123"]       — fuerza un viaje concreto por ID
 *   [ukiyo_trip_card kicker="Experiencia Ukiyo" cta="Ver itinerario"]
 *
 * Atributos:
 *   id      — ID del CPT viaje_autor (opcional). Si vacío, se usa el meta del post.
 *   kicker  — eyebrow superior. Default: "Experiencia Ukiyo".
 *   cta     — texto del botón. Default: "Ver itinerario".
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'ukiyo_shortcode_trip_card' ) ) {
	function ukiyo_shortcode_trip_card( $atts ) {
		$atts = shortcode_atts(
			[
				'id'     => '',
				'kicker' => 'Experiencia Ukiyo',
				'cta'    => 'Ver itinerario',
			],
			$atts,
			'ukiyo_trip_card'
		);

		$trip_id = intval( $atts['id'] );
		if ( $trip_id <= 0 ) {
			$current_id = get_the_ID();
			if ( $current_id ) {
				$trip_id = intval( get_post_meta( $current_id, 'ukiyo_related_trip_id', true ) );
			}
		}

		if ( $trip_id <= 0 ) {
			return ''; // No hay viaje relacionado configurado, no pintamos nada.
		}

		$trip = get_post( $trip_id );
		if ( ! $trip || 'publish' !== $trip->post_status || 'viaje_autor' !== $trip->post_type ) {
			return '';
		}

		$title        = get_the_title( $trip );
		$permalink    = get_permalink( $trip );
		$hero_image   = get_post_meta( $trip_id, 'hero_image', true );
		$thumb        = $hero_image ?: get_the_post_thumbnail_url( $trip_id, 'large' );
		$subtitle     = get_post_meta( $trip_id, 'hero_subtitle', true );
		$excerpt      = $subtitle ?: wp_strip_all_tags( get_the_excerpt( $trip ) );
		$price        = get_post_meta( $trip_id, 'precio_final', true ) ?: get_post_meta( $trip_id, 'precio_desde', true );

		ob_start();
		?>
		<a class="ukiyo-trip-card" href="<?php echo esc_url( $permalink ); ?>">
			<?php if ( $thumb ) : ?>
				<div class="ukiyo-trip-card__img">
					<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy" decoding="async" />
				</div>
			<?php endif; ?>
			<div class="ukiyo-trip-card__body">
				<span class="ukiyo-trip-card__kicker"><?php echo esc_html( $atts['kicker'] ); ?></span>
				<h3><?php echo esc_html( $title ); ?></h3>
				<?php if ( $excerpt ) : ?>
					<p><?php echo esc_html( $excerpt ); ?></p>
				<?php endif; ?>
				<div class="ukiyo-trip-card__foot">
					<?php if ( $price ) : ?>
						<div class="ukiyo-trip-card__price"><small>Desde</small><?php echo esc_html( $price ); ?></div>
					<?php endif; ?>
					<span class="ukiyo-trip-card__btn">
						<?php echo esc_html( $atts['cta'] ); ?>
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
					</span>
				</div>
			</div>
		</a>
		<?php
		return (string) ob_get_clean();
	}
}

add_shortcode( 'ukiyo_trip_card', 'ukiyo_shortcode_trip_card' );
