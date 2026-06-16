<?php
/**
 * Content helpers for blog posts.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Estima el tiempo de lectura de un post en minutos.
 *
 * Promedio asumido: 220 palabras/minuto (lectura cómoda en castellano).
 * Mínimo: 1 min.
 */
function ukiyo_get_post_reading_time( $post_id ) {
	$content = get_post_field( 'post_content', $post_id );
	if ( ! $content ) {
		return 1;
	}
	$plain = wp_strip_all_tags( strip_shortcodes( $content ) );
	$words = preg_match_all( '/\\S+/u', $plain ) ?: 0;
	$mins  = (int) ceil( $words / 220 );
	return max( 1, $mins );
}

/**
 * Returns a sanitized editorial intro for a blog post.
 */
function ukiyo_get_post_intro( $post_id ) {
    $intro = trim( (string) get_post_meta( $post_id, 'ukiyo_intro', true ) );

    if ( '' !== $intro ) {
        return $intro;
    }

    if ( has_excerpt( $post_id ) ) {
        return trim( wp_strip_all_tags( get_the_excerpt( $post_id ) ) );
    }

    return '';
}

/**
 * Adds stable IDs to headings and returns a table of contents payload.
 */
function ukiyo_prepare_post_content( $html ) {
    $html = (string) $html;

    if ( '' === trim( $html ) || ! class_exists( 'DOMDocument' ) ) {
        return [
            'content' => $html,
            'toc'     => [],
        ];
    }

    $previous_state = libxml_use_internal_errors( true );

    $dom = new DOMDocument();
    $dom->loadHTML(
        '<?xml encoding="utf-8" ?><div id="ukiyo-post-content-root">' . mb_convert_encoding( $html, 'HTML-ENTITIES', 'UTF-8' ) . '</div>',
        LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
    );

    $toc        = [];
    $used_ids   = [];
    $headings   = $dom->getElementsByTagName( '*' );
    $root       = $dom->getElementById( 'ukiyo-post-content-root' );

    foreach ( $headings as $node ) {
        if ( ! in_array( strtolower( $node->nodeName ), [ 'h2', 'h3' ], true ) ) {
            continue;
        }

        $label = trim( wp_strip_all_tags( $node->textContent ) );
        if ( '' === $label ) {
            continue;
        }

        $id = $node->getAttribute( 'id' );
        if ( '' === $id ) {
            $base_id = sanitize_title( $label ) ?: 'seccion';
            $id      = $base_id;
            $suffix  = 2;

            while ( isset( $used_ids[ $id ] ) ) {
                $id = $base_id . '-' . $suffix;
                $suffix++;
            }

            $node->setAttribute( 'id', $id );
        }

        $used_ids[ $id ] = true;
        $toc[] = [
            'id'    => $id,
            'label' => $label,
            'level' => strtolower( $node->nodeName ),
        ];
    }

    $content = '';
    if ( $root ) {
        foreach ( $root->childNodes as $child ) {
            $content .= $dom->saveHTML( $child );
        }
    } else {
        $content = $html;
    }

    libxml_clear_errors();
    libxml_use_internal_errors( $previous_state );

    return [
        'content' => $content,
        'toc'     => $toc,
    ];
}
