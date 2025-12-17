<?php
/**
 * Funciones del tema UKIYO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Seguridad
}

require_once __DIR__ . '/inc/cpt-viaje-autor.php';
require_once __DIR__ . '/inc/meta-viaje-autor.php';

function ukiyo_enqueue_assets() {
    // CSS
    wp_enqueue_style(
        'ukiyo-tailwind',
        get_template_directory_uri() . '/assets/css/tailwind.css',
        array(),
        '1.0'
    );

    wp_enqueue_style(
        'ukiyo-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array('ukiyo-tailwind'),
        '1.0'
    );

    // JS principal del tema (menu toggle, parallax, smooth scroll)
    wp_enqueue_script(
        'ukiyo-scripts',
        get_template_directory_uri() . '/assets/js/scripts.js',
        array(),
        '1.0',
        true
    );

    // Script externo dhws-data-injector
    wp_enqueue_script(
        'ukiyo-data-injector',
        get_template_directory_uri() . '/public/dhws-data-injector.js',
        array(),
        null,   // null para no forzar versión
        true    // cargar en el footer
    );
}
add_action('wp_enqueue_scripts', 'ukiyo_enqueue_assets');

// Soporte de menús, logo, thumbnails
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
            null, 
            true 
        );
    }
}
add_action( 'wp_enqueue_scripts', 'ukiyo_enqueue_leaflet_experiences' );
/**
 * SEO Meta Tags
 * Añade etiquetas meta para SEO, Open Graph y Twitter Cards
 */
function ukiyo_add_seo_meta_tags() {
    global $post;

    // 1. Título y Descripción Básica
    // Nota: El título lo gestiona WordPress con add_theme_support('title-tag')
    
    $description = '';
    
    if ( is_front_page() || is_home() ) {
        $description = get_bloginfo('description');
        // Fallback si la descripción del sitio está vacía
        if ( empty($description) ) {
            $description = "Viajes personalizados y de autor con alma. Descubre Indonesia, Costa Rica, Colombia y Marruecos lejos del turismo de masas. Diseñamos tu aventura a medida.";
        }
    } elseif ( is_single() || is_page() ) {
        // Intentar obtener el extracto primero
        if ( has_excerpt() ) {
            $description = strip_tags( get_the_excerpt() );
        } elseif ( !empty($post->post_content) ) {
            // Si no, coger los primeros 160 caracteres del contenido
            $content = strip_tags( $post->post_content );
            $description = mb_substr( $content, 0, 160 ) . '...';
        }
    } elseif ( is_category() ) {
        $description = category_description();
    }

    if ( ! empty( $description ) ) {
        echo '<meta name="description" content="' . esc_attr( $description ) . '" />' . "\n";
    }

    // 2. Canonical URL
    $url = get_permalink();
    if ( is_front_page() ) {
        $url = home_url('/');
    }
    echo '<link rel="canonical" href="' . esc_url( $url ) . '" />' . "\n";

    // 3. Open Graph (Facebook, LinkedIn, WhatsApp)
    echo '<meta property="og:locale" content="' . get_locale() . '" />' . "\n";
    echo '<meta property="og:type" content="' . ( is_single() ? 'article' : 'website' ) . '" />' . "\n";
    echo '<meta property="og:title" content="' . get_the_title() . ' - ' . get_bloginfo('name') . '" />' . "\n";
    if ( ! empty( $description ) ) {
        echo '<meta property="og:description" content="' . esc_attr( $description ) . '" />' . "\n";
    }
    echo '<meta property="og:url" content="' . esc_url( $url ) . '" />' . "\n";
    echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '" />' . "\n";

    // Imagen OG
    if ( has_post_thumbnail() ) {
        $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
        if ($img_src) {
             echo '<meta property="og:image" content="' . esc_url( $img_src[0] ) . '" />' . "\n";
        }
    } else {
        // Imagen por defecto del tema si no hay destacada
        if ( is_front_page() ) {
             echo '<meta property="og:image" content="' . get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-indonesiavolcan.jpg" />' . "\n";
        } else {
             // Fallback general branding image (logo or default hero)
             echo '<meta property="og:image" content="' . get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-indonesiavolcan.jpg" />' . "\n";
        }
    }

    // 4. Twitter Cards
    echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    echo '<meta name="twitter:title" content="' . get_the_title() . ' - ' . get_bloginfo('name') . '" />' . "\n";
    if ( ! empty( $description ) ) {
        echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '" />' . "\n";
    }
}
add_action( 'wp_head', 'ukiyo_add_seo_meta_tags', 5 );
