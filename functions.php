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
