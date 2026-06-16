<?php
/**
 * [ukiyo_h2] — Título de sección con eyebrow numérico.
 *
 * Uso:
 *   [ukiyo_h2 num="01" kicker="Calendario" id="mejor-epoca"]
 *     ¿Cuál es la <em>mejor época</em> para ir?
 *   [/ukiyo_h2]
 *
 * Atributos:
 *   num     — número del eyebrow (ej. "01"). Si vacío, no se pinta.
 *   kicker  — texto del eyebrow tras el número (ej. "Calendario").
 *   id      — id HTML para enlazar desde TOC. Si vacío se autogenera de
 *             ukiyo_prepare_post_content() en single.php.
 *
 * El contenido se permite con <em> y <strong> para los énfasis del diseño.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'ukiyo_shortcode_h2' ) ) {
	function ukiyo_shortcode_h2( $atts, $content = '' ) {
		$atts = shortcode_atts(
			[
				'num'    => '',
				'kicker' => '',
				'id'     => '',
			],
			$atts,
			'ukiyo_h2'
		);

		$content = trim( wp_kses(
			(string) $content,
			[
				'em'     => [],
				'strong' => [],
			]
		) );

		if ( '' === $content ) {
			return '';
		}

		// Si no se pasó ID, lo derivamos del texto plano.
		$id = trim( (string) $atts['id'] );
		if ( '' === $id ) {
			$plain = wp_strip_all_tags( $content );
			$id    = sanitize_title( $plain ) ?: 'seccion';
		}

		$eyebrow = '';
		$num     = trim( (string) $atts['num'] );
		$kicker  = trim( (string) $atts['kicker'] );

		if ( '' !== $num || '' !== $kicker ) {
			$parts = array_filter( [ $num, $kicker ], 'strlen' );
			$eyebrow = '<span class="num">' . esc_html( implode( ' · ', $parts ) ) . '</span>';
		}

		return sprintf(
			'<h2 id="%s" class="ukiyo-h2">%s%s</h2>',
			esc_attr( $id ),
			$eyebrow,
			$content
		);
	}
}

add_shortcode( 'ukiyo_h2', 'ukiyo_shortcode_h2' );
