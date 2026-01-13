<?php
/**
 * Funciones del tema UKIYO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Seguridad
}

require_once __DIR__ . '/inc/cpt-viaje-autor.php';
require_once __DIR__ . '/inc/meta-viaje-autor.php';

/**
 * CSS crítico mínimo para evitar FOUC (header + logo + nav)
 * Ojo: esto NO sustituye a tu CSS, solo estabiliza el primer render.
 */
add_action('wp_head', function () {
    echo "<style>
      html{opacity:0; transition:opacity .08s ease;}
      html.css-ready{opacity:1;}
      /* Si no hay JS, no ocultamos nada */
      noscript + style { display:none; }
    </style>
    <noscript></noscript>\n";
}, 0);

/**
 * Devuelve versión basada en filemtime para cache busting.
 */
function ukiyo_asset_ver( $path ) {
    $file = get_template_directory() . $path;
    return file_exists( $file ) ? filemtime( $file ) : '1.0';
}

/**
 * Enqueue CSS y JS del tema
 */
function ukiyo_enqueue_assets() {

    // CSS
    wp_enqueue_style(
        'ukiyo-tailwind',
        get_template_directory_uri() . '/assets/css/tailwind.css',
        array(),
        ukiyo_asset_ver('/assets/css/tailwind.css')
    );

    wp_enqueue_style(
        'ukiyo-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array('ukiyo-tailwind'),
        ukiyo_asset_ver('/assets/css/main.css')
    );

    // JS principal del tema (menu toggle, parallax, smooth scroll)
    wp_enqueue_script(
        'ukiyo-scripts',
        get_template_directory_uri() . '/assets/js/scripts.js',
        array(),
        ukiyo_asset_ver('/assets/js/scripts.js'),
        true
    );

    // Script externo dhws-data-injector
    wp_enqueue_script(
        'ukiyo-data-injector',
        get_template_directory_uri() . '/public/dhws-data-injector.js',
        array(),
        ukiyo_asset_ver('/public/dhws-data-injector.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'ukiyo_enqueue_assets');

/**
 * Leaflet solo en page-experiences.php
 */
function ukiyo_enqueue_leaflet_experiences() {
    if ( is_page_template('page-experiences.php') ) {

        // Leaflet CSS
        wp_enqueue_style(
            'leaflet-css',
            'https://unpkg.com/leaflet/dist/leaflet.css',
            array(),
            null
        );

        // Leaflet JS
        wp_enqueue_script(
            'leaflet-js',
            'https://unpkg.com/leaflet/dist/leaflet.js',
            array(),
            null,
            true
        );

        // Nuestro script personalizado para el mapa
        wp_enqueue_script(
            'experiences-map',
            get_template_directory_uri() . '/assets/js/experiences-map.js',
            array('leaflet-js'),
            ukiyo_asset_ver('/assets/js/experiences-map.js'),
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'ukiyo_enqueue_leaflet_experiences' );

/**
 * Preconnect para recursos externos (solo donde toca)
 */
add_action('wp_head', function () {
    if ( is_page_template('page-experiences.php') ) {
        echo "<link rel='preconnect' href='https://unpkg.com' crossorigin>\n";
    }
}, 1);

/**
 * Hacer CSS no-bloqueante (reduce render-blocking).
 * IMPORTANTE: solo lo aplicamos a tus 2 CSS grandes.
 */
add_filter('style_loader_tag', function ($html, $handle, $href, $media) {

    $media_attr = $media ? $media : 'all';

    // Tailwind: bloqueante (para que la base salga bien siempre)
    if ($handle === 'ukiyo-tailwind') {
        return "<link rel='stylesheet' href='" . esc_url($href) . "' media='" . esc_attr($media_attr) . "' />\n";
    }

    // main.css: no bloqueante, y cuando carga mostramos la página
    if ($handle === 'ukiyo-main') {
        $out  = "<link rel='preload' as='style' href='" . esc_url($href) . "' />\n";
        $out .= "<link rel='stylesheet' href='" . esc_url($href) . "' media='print'
          onload=\"this.media='" . esc_attr($media_attr) . "';document.documentElement.classList.add('css-ready');\" />\n";
        $out .= "<noscript><link rel='stylesheet' href='" . esc_url($href) . "' media='" . esc_attr($media_attr) . "' /></noscript>\n";
        // Si por lo que sea el onload falla, aseguramos que se muestre igualmente
        $out .= "<script>setTimeout(()=>document.documentElement.classList.add('css-ready'),1500);</script>\n";
        return $out;
    }

    return $html;

}, 10, 4);

/**
 * Añadir defer a scripts seleccionados.
 */
add_filter('script_loader_tag', function ($tag, $handle, $src) {

    $defer_handles = array(
        'ukiyo-scripts',
        'ukiyo-data-injector',
        'leaflet-js',
        'experiences-map',
    );

    if ( in_array($handle, $defer_handles, true) ) {
        return "<script src='" . esc_url($src) . "' defer></script>\n";
    }

    return $tag;

}, 10, 3);

/**
 * Soporte de menús, logo, thumbnails
 */
function ukiyo_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    register_nav_menus(array(
        'primary' => __('Menú Principal', 'ukiyo'),
        'footer'  => __('Menú Footer', 'ukiyo'),
    ));
}
add_action('after_setup_theme', 'ukiyo_setup');

/**
 * SEO Meta Tags
 * Añade etiquetas meta para SEO, Open Graph y Twitter Cards
 */
function ukiyo_add_seo_meta_tags() {
    global $post;

    $description = '';

    if ( is_front_page() || is_home() ) {
        $description = get_bloginfo('description');
        if ( empty($description) ) {
            $description = "Viajes personalizados y de autor con alma. Descubre Indonesia, Costa Rica, Colombia y Marruecos lejos del turismo de masas. Diseñamos tu aventura a medida.";
        }
    } elseif ( is_single() || is_page() ) {
        if ( has_excerpt() ) {
            $description = strip_tags( get_the_excerpt() );
        } elseif ( ! empty($post->post_content) ) {
            $content = strip_tags( $post->post_content );
            $description = mb_substr( $content, 0, 160 ) . '...';
        }
    } elseif ( is_category() ) {
        $description = category_description();
    }

    if ( ! empty( $description ) ) {
        echo '<meta name="description" content="' . esc_attr( $description ) . '" />' . "\n";
    }

    // Canonical URL
    $url = get_permalink();
    if ( is_front_page() ) {
        $url = home_url('/');
    }
    echo '<link rel="canonical" href="' . esc_url( $url ) . '" />' . "\n";

    // Open Graph
    echo '<meta property="og:locale" content="' . esc_attr( get_locale() ) . '" />' . "\n";
    echo '<meta property="og:type" content="' . ( is_single() ? 'article' : 'website' ) . '" />' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( get_the_title() . ' - ' . get_bloginfo('name') ) . '" />' . "\n";
    if ( ! empty( $description ) ) {
        echo '<meta property="og:description" content="' . esc_attr( $description ) . '" />' . "\n";
    }
    echo '<meta property="og:url" content="' . esc_url( $url ) . '" />' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo('name') ) . '" />' . "\n";

    // Imagen OG
    if ( is_singular() && isset($post->ID) && has_post_thumbnail( $post->ID ) ) {
        $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
        if ( $img_src ) {
            echo '<meta property="og:image' . "' content='" . esc_url( $img_src[0] ) . "' />\n";
        }
    } else {
        echo '<meta property="og:image" content="' . esc_url( get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-indonesiavolcan.jpg' ) . '" />' . "\n";
    }

    // Twitter Cards
    echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr( get_the_title() . ' - ' . get_bloginfo('name') ) . '" />' . "\n";
    if ( ! empty( $description ) ) {
        echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '" />' . "\n";
    }
}
add_action( 'wp_head', 'ukiyo_add_seo_meta_tags', 5 );