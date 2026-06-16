<?php
/**
 * [ukiyo_seasons] / [ukiyo_season] — Grid de 4 quadrantes (calendario o
 * cualquier comparativa de 4 elementos).
 *
 * Uso típico:
 *   [ukiyo_seasons]
 *     [ukiyo_season label="Junio – Agosto"      text="Alta temporada · Cielos despejados"]
 *     [ukiyo_season label="Mayo · Septiembre"   text="Sweet spot: menos gente, buen clima"]
 *     [ukiyo_season label="Octubre – Noviembre" text="Transición · lluvias breves al atardecer"]
 *     [ukiyo_season label="Diciembre – Marzo"   text="Lluvias intensas · evita Ubud"]
 *   [/ukiyo_seasons]
 *
 * Cada [ukiyo_season] dentro genera un .keys__item del diseño.
 * Funciona también con 2, 3 ó N elementos, pero el grid está optimizado para 4.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'ukiyo_shortcode_seasons' ) ) {
	function ukiyo_shortcode_seasons( $atts, $content = '' ) {
		$content = do_shortcode( (string) $content );
		// Quitamos los <p></p> que WordPress añade automáticamente entre shortcodes.
		$content = preg_replace( '#<p>\s*(<div class="ukiyo-season__item")#', '$1', $content );
		$content = preg_replace( '#(</div>)\s*</p>#', '$1', $content );
		$content = trim( $content );

		if ( '' === $content ) {
			return '';
		}

		return '<div class="ukiyo-seasons">' . $content . '</div>';
	}
}

if ( ! function_exists( 'ukiyo_shortcode_season' ) ) {
	function ukiyo_shortcode_season( $atts, $content = '' ) {
		$atts = shortcode_atts(
			[
				'label' => '',
				'text'  => '',
			],
			$atts,
			'ukiyo_season'
		);

		// Si no se usaron atributos, se permite que el contenido del shortcode
		// sea "label || text" o que se use el shortcode con $content como text.
		$label = trim( (string) $atts['label'] );
		$text  = trim( (string) $atts['text'] );

		if ( '' === $text && '' !== trim( (string) $content ) ) {
			$text = trim( wp_strip_all_tags( $content ) );
		}

		if ( '' === $label && '' === $text ) {
			return '';
		}

		return sprintf(
			'<div class="ukiyo-season__item"><span class="ukiyo-season__k">%s</span><span class="ukiyo-season__v">%s</span></div>',
			esc_html( $label ),
			esc_html( $text )
		);
	}
}

add_shortcode( 'ukiyo_seasons', 'ukiyo_shortcode_seasons' );
add_shortcode( 'ukiyo_season', 'ukiyo_shortcode_season' );
