<?php

add_action('after_switch_theme', function () {
    // Asegura que el CPT esté registrado antes de flushear:
    do_action('init');
    flush_rewrite_rules();
});

add_action('init', function () {
    $labels = [
        'name' => 'Viajes de autor',
        'singular_name' => 'Viaje de autor',
        'add_new_item' => 'Añadir viaje de autor',
        'edit_item' => 'Editar viaje de autor',
        'new_item' => 'Nuevo viaje de autor',
        'view_item' => 'Ver viaje de autor',
        'search_items' => 'Buscar viajes de autor',
        'not_found' => 'No se han encontrado viajes',
        'not_found_in_trash' => 'No hay viajes en la papelera',
    ];

    register_post_type('viaje_autor', [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true, // Gutenberg + API
        'show_in_menu' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-airplane',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
        'rewrite' => ['slug' => 'viajes', 'with_front' => false],
    ]);
});

add_action('init', function () {
    register_taxonomy('destino', ['viaje_autor'], [
        'label' => 'Destinos',
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'destino'],
    ]);
});

add_filter('single_template', 'load_post_template_by_id');

function load_post_template_by_id($single_template)
{
    global $post;

    if (!$post) {
        error_log('⚠️ load_post_template_by_id: $post es null');
        return $single_template;
    }

    error_log('🔎 SINGLE TEMPLATE → post_type: ' . $post->post_type . ' | ID: ' . $post->ID);

    if ('viaje_autor' === $post->post_type) {
        $tmp_template = get_template_directory() . '/templates/single-' . $post->post_type . '-' . $post->ID . '.php';

        error_log('🧩 Buscando plantilla por ID: ' . $tmp_template);
        error_log('📁 ¿Existe archivo?: ' . (file_exists($tmp_template) ? 'SÍ' : 'NO'));

        if (file_exists($tmp_template)) {
            error_log('✅ Usando plantilla personalizada por ID');
            $single_template = $tmp_template;
        } else {
            error_log('➡️ No existe plantilla por ID, se mantiene la que venía: ' . $single_template);
        }
    } else {
        error_log('ℹ️ No es viaje_autor, se mantiene plantilla: ' . $single_template);
    }

    return $single_template;
}