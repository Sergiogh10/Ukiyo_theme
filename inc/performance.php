<?php
/**
 * Performance helpers for critical resources.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Adds preconnect hints for external resources used by the theme.
 */
function ukiyo_add_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' !== $relation_type ) {
        return $urls;
    }

    if ( is_page_template( 'page-experiences.php' ) ) {
        $urls[] = [
            'href'        => 'https://unpkg.com',
            'crossorigin' => 'anonymous',
        ];
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'ukiyo_add_resource_hints', 10, 2 );

/**
 * Returns the best LCP image candidate for the current request.
 */
function ukiyo_get_lcp_image_preload_url() {
    $template = ukiyo_get_current_template_slug();
    $uri      = get_template_directory_uri();

    $map = [
        'front_page'           => $uri . '/images/heroimages/viajes-personalizados-ukiyo-costaricatucan.jpg',
        'page-experiences.php' => $uri . '/images/indonesia/viajes-a-indonesia-personalizados-islas.jpg',
        'page-pricing.php'     => $uri . '/images/heroimages/viajes-autor-ukiyo-indonesiaplaya.jpg',
        'page-reviews2.php'    => $uri . '/images/heroimages/viajes-autor-ukiyo-reviewfinal.jpg',
        'page-viajesautor.php' => null,
        'page-costarica.php'   => $uri . '/images/costarica/viajes-a-costa-rica-personalizados-monteverde-bosque-nuboso.jpg',
        'page-colombia.php'    => $uri . '/images/colombia/viajes-colombia-hero2.jpg',
        'page-indonesia.php'   => $uri . '/images/indonesia/viajes-autor-ukiyo-indonesiamanta.jpg',
        'page-marruecos.php'   => $uri . '/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-pareja.jpg',
    ];

    if ( is_front_page() ) {
        return $map['front_page'];
    }

    if ( is_singular( 'viaje_autor' ) ) {
        return get_post_meta( get_queried_object_id(), 'hero_image', true ) ?: $uri . '/images/heroimages/default-hero.jpg';
    }

    if ( isset( $map[ $template ] ) ) {
        return $map[ $template ];
    }

    return '';
}

/**
 * Preloads the current LCP image when it is deterministic.
 */
function ukiyo_output_lcp_preload() {
    $image_url = ukiyo_get_lcp_image_preload_url();

    if ( ! $image_url ) {
        return;
    }

    if ( function_exists( 'ukiyo_get_webp_image_url' ) ) {
        $webp_url = ukiyo_get_webp_image_url( $image_url );
        if ( $webp_url ) {
            echo '<link rel="preload" as="image" href="' . esc_url( $webp_url ) . '" type="image/webp" fetchpriority="high">' . "\n";
            return;
        }
    }

    echo '<link rel="preload" as="image" href="' . esc_url( $image_url ) . '" fetchpriority="high">' . "\n";
}
add_action( 'wp_head', 'ukiyo_output_lcp_preload', 2 );

/**
 * Normalizes image URLs for comparisons without query strings.
 */
function ukiyo_normalize_image_url_path( $src ) {
    $path = wp_parse_url( (string) $src, PHP_URL_PATH );

    if ( ! is_string( $path ) || '' === $path ) {
        return '';
    }

    return '/' . ltrim( rawurldecode( $path ), '/' );
}

/**
 * Resolves local theme/upload image paths so dimensions can be added server-side.
 */
function ukiyo_image_src_to_local_path( $src ) {
    $path = ukiyo_normalize_image_url_path( $src );

    if ( ! $path ) {
        return '';
    }

    $template_path = ukiyo_normalize_image_url_path( get_template_directory_uri() );
    if ( $template_path && 0 === strpos( $path, $template_path . '/' ) ) {
        $relative = substr( $path, strlen( $template_path ) );
        $file     = get_template_directory() . $relative;

        return file_exists( $file ) ? $file : '';
    }

    $uploads = wp_upload_dir( null, false );
    if ( ! empty( $uploads['baseurl'] ) && ! empty( $uploads['basedir'] ) ) {
        $uploads_path = ukiyo_normalize_image_url_path( $uploads['baseurl'] );
        if ( $uploads_path && 0 === strpos( $path, $uploads_path . '/' ) ) {
            $relative = substr( $path, strlen( $uploads_path ) );
            $file     = untrailingslashit( $uploads['basedir'] ) . $relative;

            return file_exists( $file ) ? $file : '';
        }
    }

    if ( defined( 'ABSPATH' ) ) {
        $file = untrailingslashit( ABSPATH ) . $path;

        return file_exists( $file ) ? $file : '';
    }

    return '';
}

/**
 * Returns real local image dimensions when available.
 */
function ukiyo_get_local_image_dimensions( $src ) {
    static $cache = [];

    $file = ukiyo_image_src_to_local_path( $src );
    if ( ! $file ) {
        return null;
    }

    if ( array_key_exists( $file, $cache ) ) {
        return $cache[ $file ];
    }

    $size = @getimagesize( $file );
    if ( ! is_array( $size ) || empty( $size[0] ) || empty( $size[1] ) ) {
        $cache[ $file ] = null;
        return null;
    }

    $cache[ $file ] = [
        'width'  => (int) $size[0],
        'height' => (int) $size[1],
    ];

    return $cache[ $file ];
}

/**
 * Returns a sibling WebP URL for local JPG/PNG images when one exists.
 */
function ukiyo_get_webp_image_url( $src ) {
    $path = ukiyo_normalize_image_url_path( $src );
    if ( ! $path || ! preg_match( '/\\.(?:jpe?g|png)$/i', $path ) ) {
        return '';
    }

    $source_file = ukiyo_image_src_to_local_path( $src );
    if ( ! $source_file ) {
        return '';
    }

    $webp_path = preg_replace( '/\\.(?:jpe?g|png)$/i', '.webp', $path );
    if ( ! is_string( $webp_path ) ) {
        return '';
    }

    $webp_file = preg_replace( '/\\.(?:jpe?g|png)$/i', '.webp', $source_file );
    if ( ! is_string( $webp_file ) || ! file_exists( $webp_file ) ) {
        $theme_path = ukiyo_normalize_image_url_path( get_template_directory_uri() );
        if ( ! $theme_path || 0 !== strpos( $path, $theme_path . '/' ) ) {
            return '';
        }

        $relative_path       = ltrim( substr( $path, strlen( $theme_path ) ), '/' );
        $fallback_webp_path  = preg_replace( '/\\.(?:jpe?g|png)$/i', '.webp', $relative_path );
        $fallback_webp_file  = get_template_directory() . '/assets/optimized-webp/' . $fallback_webp_path;
        $fallback_webp_url   = get_template_directory_uri() . '/assets/optimized-webp/' . $fallback_webp_path;

        if ( ! is_string( $fallback_webp_path ) || ! file_exists( $fallback_webp_file ) ) {
            return '';
        }

        return $fallback_webp_url;
    }

    $parsed = wp_parse_url( (string) $src );
    if ( is_array( $parsed ) && ! empty( $parsed['scheme'] ) && ! empty( $parsed['host'] ) ) {
        $url = $parsed['scheme'] . '://' . $parsed['host'] . $webp_path;

        return ! empty( $parsed['query'] ) ? $url . '?' . $parsed['query'] : $url;
    }

    return $webp_path;
}

/**
 * Parses attributes from an HTML tag while preserving the original attribute names.
 */
function ukiyo_parse_html_tag_attributes( $tag ) {
    $attributes = [];

    $source = preg_replace( '/^<\\s*[A-Za-z0-9:_-]+\\b/', '', trim( $tag ) );
    $source = preg_replace( '/\\/?\\s*>$/', '', (string) $source );
    $length = strlen( $source );
    $offset = 0;

    while ( $offset < $length ) {
        while ( $offset < $length && ctype_space( $source[ $offset ] ) ) {
            $offset++;
        }

        if ( $offset >= $length || '/' === $source[ $offset ] ) {
            break;
        }

        $name_start = $offset;
        while ( $offset < $length && preg_match( '/[A-Za-z0-9_:\\.-]/', $source[ $offset ] ) ) {
            $offset++;
        }

        if ( $name_start === $offset ) {
            $offset++;
            continue;
        }

        $name = substr( $source, $name_start, $offset - $name_start );

        while ( $offset < $length && ctype_space( $source[ $offset ] ) ) {
            $offset++;
        }

        $value = '';
        if ( $offset < $length && '=' === $source[ $offset ] ) {
            $offset++;

            while ( $offset < $length && ctype_space( $source[ $offset ] ) ) {
                $offset++;
            }

            if ( $offset < $length && ( '"' === $source[ $offset ] || "'" === $source[ $offset ] ) ) {
                $quote = $source[ $offset ];
                $offset++;
                $value_start = $offset;

                while ( $offset < $length && $source[ $offset ] !== $quote ) {
                    $offset++;
                }

                $value = substr( $source, $value_start, $offset - $value_start );
                if ( $offset < $length ) {
                    $offset++;
                }
            } else {
                $value_start = $offset;
                while ( $offset < $length && ! ctype_space( $source[ $offset ] ) ) {
                    $offset++;
                }

                $value = substr( $source, $value_start, $offset - $value_start );
            }
        }

        $attributes[ strtolower( $name ) ] = [
            'name'  => $name,
            'value' => html_entity_decode( $value, ENT_QUOTES, 'UTF-8' ),
        ];
    }

    return $attributes;
}

function ukiyo_get_html_attr_value( $attributes, $name, $default = '' ) {
    $key = strtolower( $name );

    return isset( $attributes[ $key ] ) ? (string) $attributes[ $key ]['value'] : $default;
}

function ukiyo_set_html_attr_value( &$attributes, $name, $value ) {
    $attributes[ strtolower( $name ) ] = [
        'name'  => $name,
        'value' => (string) $value,
    ];
}

function ukiyo_rebuild_html_tag( $tag_name, $attributes ) {
    $html = '<' . $tag_name;

    foreach ( $attributes as $attribute ) {
        $html .= ' ' . $attribute['name'] . '="' . esc_attr( $attribute['value'] ) . '"';
    }

    return $html . '>';
}

function ukiyo_append_css_declaration( $style, $property, $value ) {
    if ( false !== stripos( $style, $property . ':' ) ) {
        return $style;
    }

    $style = trim( $style );
    if ( '' !== $style && ';' !== substr( $style, -1 ) ) {
        $style .= ';';
    }

    return trim( $style . ' ' . $property . ': ' . $value . ';' );
}

function ukiyo_humanize_image_filename( $src ) {
    $path = ukiyo_normalize_image_url_path( $src );
    $name = pathinfo( $path, PATHINFO_FILENAME );

    $name = preg_replace( '/-[0-9]+x[0-9]+$/', '', $name );
    $name = preg_replace( '/\\b(?:ukiyo|viajes|personalizados|personalizado|medida|autor|final|scaled|webp|jpg|jpeg|png)\\b/i', '', $name );
    $name = preg_replace( '/[-_]+/', ' ', $name );
    $name = trim( preg_replace( '/\\s+/', ' ', $name ) );

    return $name ? ucfirst( $name ) : '';
}

function ukiyo_image_destination_label( $src ) {
    $haystack = strtolower( remove_accents( ukiyo_normalize_image_url_path( $src ) ) );

    $destinations = [
        'costa-rica' => 'Costa Rica',
        'costarica'  => 'Costa Rica',
        'colombia'   => 'Colombia',
        'indonesia'  => 'Indonesia',
        'bali'       => 'Bali',
        'marruecos'  => 'Marruecos',
        'morocco'    => 'Marruecos',
        'lanzarote'  => 'Lanzarote',
        'italia'     => 'Italia',
        'komodo'     => 'Komodo',
        'borneo'     => 'Borneo',
        'java'       => 'Java',
        'sulawesi'   => 'Sulawesi',
        'lombok'     => 'Lombok',
        'gilis'      => 'islas Gili',
        'raja-ampat' => 'Raja Ampat',
    ];

    foreach ( $destinations as $needle => $label ) {
        if ( false !== strpos( $haystack, $needle ) ) {
            return $label;
        }
    }

    return '';
}

function ukiyo_is_decorative_image_src( $src ) {
    $path = strtolower( remove_accents( ukiyo_normalize_image_url_path( $src ) ) );

    foreach ( [ 'stamp-', 'sello', 'separator', 'decor' ] as $needle ) {
        if ( false !== strpos( $path, $needle ) ) {
            return true;
        }
    }

    return false;
}

function ukiyo_is_logo_image_src( $src ) {
    $path = strtolower( remove_accents( ukiyo_normalize_image_url_path( $src ) ) );

    return false !== strpos( $path, 'logo' ) || false !== strpos( $path, 'turismo_' );
}

function ukiyo_image_has_css_layout_sizing( $attributes ) {
    $class = ' ' . strtolower( ukiyo_get_html_attr_value( $attributes, 'class' ) ) . ' ';
    $style = strtolower( ukiyo_get_html_attr_value( $attributes, 'style' ) );

    if ( preg_match( '/\\s(?:w|h|min-w|min-h|max-w|max-h|size|aspect)-[^\\s]+/', $class ) ) {
        return true;
    }

    foreach ( [ 'object-cover', 'object-contain', 'absolute', 'fixed', 'inset-', 'top-', 'right-', 'bottom-', 'left-' ] as $needle ) {
        if ( false !== strpos( $class, ' ' . $needle ) || false !== strpos( $class, $needle ) ) {
            return true;
        }
    }

    return false !== strpos( $style, 'width:' )
        || false !== strpos( $style, 'height:' )
        || false !== strpos( $style, 'aspect-ratio:' )
        || false !== strpos( $style, 'object-fit:' );
}

function ukiyo_generate_image_alt( $src, $attributes = [] ) {
    $path        = strtolower( remove_accents( ukiyo_normalize_image_url_path( $src ) ) );
    $destination = ukiyo_image_destination_label( $src );

    if ( ukiyo_is_decorative_image_src( $src ) ) {
        return '';
    }

    if ( false !== strpos( $path, 'whatsapp--v4' ) || false !== strpos( $path, 'icons8.com/cotton/64/whatsapp' ) ) {
        return 'Contactar con Viajes Ukiyo por WhatsApp';
    }

    if ( false !== strpos( $path, 'turismo_colombia' ) ) {
        return 'Logo oficial de turismo de Colombia';
    }

    if ( false !== strpos( $path, 'turismo_costarica' ) ) {
        return 'Logo oficial de turismo de Costa Rica';
    }

    if ( false !== strpos( $path, 'turismo_indonesia' ) ) {
        return 'Logo oficial de turismo de Indonesia';
    }

    if ( false !== strpos( $path, 'turismo_marruecos' ) ) {
        return 'Logo oficial de turismo de Marruecos';
    }

    if ( false !== strpos( $path, 'logo' ) ) {
        return 'Logo de Viajes Ukiyo';
    }

    if ( false !== strpos( $path, 'autor-' ) || false !== strpos( $path, '/autores/' ) ) {
        $name = ukiyo_humanize_image_filename( $src );

        return $name ? 'Autor local de Viajes Ukiyo: ' . $name : 'Autor local de un viaje de autor de Viajes Ukiyo';
    }

    if ( false !== strpos( $path, 'resena' ) || false !== strpos( $path, 'reviews' ) ) {
        return $destination ? 'Viajeros de Viajes Ukiyo durante una experiencia en ' . $destination : 'Viajeros de Viajes Ukiyo durante una experiencia personalizada';
    }

    if ( false !== strpos( $path, 'viajes-de-autor' ) ) {
        return $destination ? 'Viaje de autor en ' . $destination . ' con Viajes Ukiyo' : 'Viaje de autor con Viajes Ukiyo';
    }

    if ( $destination ) {
        return 'Viaje a medida a ' . $destination . ' con Viajes Ukiyo';
    }

    $fallback = ukiyo_humanize_image_filename( $src );

    return $fallback ? $fallback . ' con Viajes Ukiyo' : 'Experiencia de viaje a medida con Viajes Ukiyo';
}

function ukiyo_is_generic_image_alt( $alt ) {
    $normalized = strtolower( trim( remove_accents( (string) $alt ) ) );

    return in_array(
        $normalized,
        [ '', 'image', 'imagen', 'foto', 'photo', 'whatsapp', 'whatsapp--v4', 'logo', 'ukiyo logo' ],
        true
    );
}

function ukiyo_is_lcp_image_src( $src ) {
    $lcp_url = function_exists( 'ukiyo_get_lcp_image_preload_url' ) ? ukiyo_get_lcp_image_preload_url() : '';

    if ( ! $lcp_url ) {
        return false;
    }

    $src_path = ukiyo_normalize_image_url_path( $src );
    $lcp_path = ukiyo_normalize_image_url_path( $lcp_url );
    $webp_lcp = ukiyo_get_webp_image_url( $lcp_url );

    return $src_path === $lcp_path || ( $webp_lcp && $src_path === ukiyo_normalize_image_url_path( $webp_lcp ) );
}

function ukiyo_optimize_image_tag( $tag ) {
    $attributes = ukiyo_parse_html_tag_attributes( $tag );
    $src        = ukiyo_get_html_attr_value( $attributes, 'src' );

    if ( ! $src ) {
        return $tag;
    }

    $original_src = $src;
    $is_lcp = ukiyo_is_lcp_image_src( $original_src );
    $alt    = ukiyo_get_html_attr_value( $attributes, 'alt', null );

    if ( null === $alt || ukiyo_is_generic_image_alt( $alt ) ) {
        ukiyo_set_html_attr_value( $attributes, 'alt', ukiyo_generate_image_alt( $original_src, $attributes ) );
    }

    $width  = ukiyo_get_html_attr_value( $attributes, 'width' );
    $height = ukiyo_get_html_attr_value( $attributes, 'height' );
    $style  = ukiyo_get_html_attr_value( $attributes, 'style' );
    $has_css_layout_sizing = ukiyo_image_has_css_layout_sizing( $attributes );

    if ( ! $has_css_layout_sizing && ! ukiyo_is_logo_image_src( $original_src ) && ( ! $width || ! $height || 'auto' === strtolower( $width ) || 'auto' === strtolower( $height ) ) ) {
        $dimensions = ukiyo_get_local_image_dimensions( $original_src ) ?: ukiyo_get_local_image_dimensions( $src );
        if ( $dimensions ) {
            ukiyo_set_html_attr_value( $attributes, 'width', (string) $dimensions['width'] );
            ukiyo_set_html_attr_value( $attributes, 'height', (string) $dimensions['height'] );
        } else {
            $style = ukiyo_append_css_declaration( $style, 'aspect-ratio', '4 / 3' );
            ukiyo_set_html_attr_value( $attributes, 'style', $style );
        }
    }

    if ( ! ukiyo_get_html_attr_value( $attributes, 'decoding' ) ) {
        ukiyo_set_html_attr_value( $attributes, 'decoding', 'async' );
    }

    if ( $is_lcp ) {
        ukiyo_set_html_attr_value( $attributes, 'loading', 'eager' );
        ukiyo_set_html_attr_value( $attributes, 'fetchpriority', 'high' );
    } elseif ( ! ukiyo_get_html_attr_value( $attributes, 'loading' ) && ! ukiyo_is_logo_image_src( $original_src ) ) {
        ukiyo_set_html_attr_value( $attributes, 'loading', 'lazy' );
    }

    return ukiyo_rebuild_html_tag( 'img', $attributes );
}

function ukiyo_generate_image_link_label( $href, $img_tag ) {
    $href_path  = strtolower( remove_accents( ukiyo_normalize_image_url_path( $href ) ) );
    $img_attrs  = ukiyo_parse_html_tag_attributes( $img_tag );
    $img_alt    = trim( ukiyo_get_html_attr_value( $img_attrs, 'alt' ) );
    $image_src  = ukiyo_get_html_attr_value( $img_attrs, 'src' );
    $destination = ukiyo_image_destination_label( $href ?: $image_src );

    if ( '/' === $href_path || '' === trim( $href_path, '/' ) ) {
        return 'Ir a la página de inicio de Viajes Ukiyo';
    }

    if ( false !== strpos( $href_path, 'planifica' ) ) {
        return 'Planificar un viaje a medida con Viajes Ukiyo';
    }

    if ( false !== strpos( $href_path, 'viajes-de-autor' ) ) {
        return 'Ver viajes de autor de Viajes Ukiyo';
    }

    if ( false !== strpos( $href_path, '/viajes/' ) ) {
        return $destination ? 'Ver viaje de autor en ' . $destination : 'Ver detalle del viaje de autor';
    }

    if ( $destination ) {
        return 'Ver viajes a medida a ' . $destination;
    }

    if ( $img_alt && ! ukiyo_is_generic_image_alt( $img_alt ) ) {
        return 'Ver ' . $img_alt;
    }

    return 'Abrir enlace relacionado con Viajes Ukiyo';
}

function ukiyo_add_image_only_link_labels( $html ) {
    return preg_replace_callback(
        '#<a\\b(?![^>]*\\baria-label\\s*=)([^>]*)>\\s*(<img\\b[^>]*>)\\s*</a>#is',
        static function ( $matches ) {
            $attributes = ukiyo_parse_html_tag_attributes( '<a ' . $matches[1] . '>' );
            $href       = ukiyo_get_html_attr_value( $attributes, 'href' );
            $label      = ukiyo_generate_image_link_label( $href, $matches[2] );

            ukiyo_set_html_attr_value( $attributes, 'aria-label', $label );

            return ukiyo_rebuild_html_tag( 'a', $attributes ) . $matches[2] . '</a>';
        },
        $html
    );
}

/**
 * Applies SEO, accessibility and CLS-safe defaults to every front-end image.
 */
function ukiyo_optimize_images_in_html( $html ) {
    if ( ! is_string( $html ) ) {
        return $html;
    }

    if ( false !== stripos( $html, '<img' ) ) {
        $pictures = [];
        $html     = preg_replace_callback(
            '#<picture\\b.*?</picture>#is',
            static function ( $matches ) use ( &$pictures ) {
                $key              = '%%UKIYO_PICTURE_' . count( $pictures ) . '%%';
                $pictures[ $key ] = $matches[0];

                return $key;
            },
            $html
        );

        $html = ukiyo_add_image_only_link_labels( $html );

        $html = preg_replace_callback(
            '#<img\\b[^>]*>#i',
            static function ( $matches ) {
                return ukiyo_optimize_image_tag( $matches[0] );
            },
            $html
        );

        if ( ! empty( $pictures ) ) {
            $html = strtr( $html, $pictures );
        }
    }

    return $html;
}

function ukiyo_start_image_optimization_buffer() {
    if ( is_admin() || is_feed() || is_preview() || wp_doing_ajax() || wp_is_json_request() ) {
        return;
    }

    ob_start( 'ukiyo_optimize_images_in_html' );
}
add_action( 'template_redirect', 'ukiyo_start_image_optimization_buffer', 20 );

function ukiyo_start_ajax_image_optimization_buffer() {
    if ( ! wp_doing_ajax() ) {
        return;
    }

    $action = isset( $_REQUEST['action'] ) ? sanitize_key( wp_unslash( $_REQUEST['action'] ) ) : '';
    if ( ! in_array( $action, [ 'ukiyo_filter_blog' ], true ) ) {
        return;
    }

    ob_start( 'ukiyo_optimize_images_in_html' );
}
add_action( 'init', 'ukiyo_start_ajax_image_optimization_buffer', 0 );

/**
 * Keeps WordPress-generated attachment images aligned with the same rules before
 * the final HTML buffer sees them.
 */
function ukiyo_attachment_image_seo_attributes( $attr, $attachment, $size ) {
    if ( empty( $attr['alt'] ) ) {
        $attachment_alt = trim( (string) get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ) );
        $attr['alt']    = $attachment_alt ?: get_the_title( $attachment );
    }

    if ( empty( $attr['decoding'] ) ) {
        $attr['decoding'] = 'async';
    }

    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'ukiyo_attachment_image_seo_attributes', 10, 3 );
