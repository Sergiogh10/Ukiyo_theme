<?php
/**
 * [ukiyo_quote] — Cita destacada con autor y rol.
 *
 * Uso:
 *   [ukiyo_quote author="Sergio García" role="Diseño de rutas Ukiyo"]
 *     En todos los viajes que hemos diseñado, los días que más recuerdan
 *     los clientes son los de Sidemen y los lagos. No los de Seminyak.
 *     Esa es la lección.
 *   [/ukiyo_quote]
 *
 * Atributos:
 *   author — nombre del autor (opcional).
 *   role   — rol o contexto (opcional, se pinta tras "·").
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'ukiyo_shortcode_quote' ) ) {
	function ukiyo_shortcode_quote( $atts, $content = '' ) {
		$atts = shortcode_atts(
			[
				'author' => '',
				'role'   => '',
			],
			$atts,
			'ukiyo_quote'
		);

		$content = trim( wp_kses(
			(string) $content,
			[
				'em'     => [],
				'strong' => [],
				'br'     => [],
			]
		) );

		if ( '' === $content ) {
			return '';
		}

		$author = trim( (string) $atts['author'] );
		$role   = trim( (string) $atts['role'] );

		$cite = '';
		if ( '' !== $author || '' !== $role ) {
			$parts = array_filter( [ $author, $role ], 'strlen' );
			$cite  = '<cite>' . esc_html( implode( ' · ', $parts ) ) . '</cite>';
		}

		return sprintf(
			'<blockquote class="ukiyo-quote">%s%s</blockquote>',
			$content,
			$cite
		);
	}
}

add_shortcode( 'ukiyo_quote', 'ukiyo_shortcode_quote' );
