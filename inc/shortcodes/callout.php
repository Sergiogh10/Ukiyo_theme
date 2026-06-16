<?php
/**
 * [ukiyo_callout] — Bloque destacado (intro highlight).
 *
 * Uso:
 *   [ukiyo_callout]Texto del callout, soporta <strong>HTML básico</strong>.[/ukiyo_callout]
 *
 * Atributos opcionales:
 *   tone="sage"      — variantes: sage (default) | terracota | accent
 *
 * Markup generado coincide con .ukiyo-article .intro del CSS del template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'ukiyo_shortcode_callout' ) ) {
	function ukiyo_shortcode_callout( $atts, $content = '' ) {
		$atts = shortcode_atts(
			[
				'tone' => 'sage',
			],
			$atts,
			'ukiyo_callout'
		);

		$tone = in_array( $atts['tone'], [ 'sage', 'terracota', 'accent' ], true ) ? $atts['tone'] : 'sage';

		// El contenido puede llevar inline HTML básico y otros shortcodes.
		$content = do_shortcode( $content );
		$content = wp_kses(
			$content,
			[
				'strong' => [],
				'em'     => [],
				'br'     => [],
				'a'      => [ 'href' => [], 'rel' => [], 'target' => [], 'title' => [] ],
				'p'      => [],
			]
		);

		// Si el contenido no envuelve párrafos, lo hago.
		if ( '' === trim( $content ) ) {
			return '';
		}
		if ( false === stripos( $content, '<p>' ) ) {
			$content = '<p>' . $content . '</p>';
		}

		return sprintf(
			'<aside class="ukiyo-callout ukiyo-callout--%s">%s</aside>',
			esc_attr( $tone ),
			$content
		);
	}
}

add_shortcode( 'ukiyo_callout', 'ukiyo_shortcode_callout' );
