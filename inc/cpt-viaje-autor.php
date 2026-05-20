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
        // REST API enabled so UKIYO OS (and other internal tools) can create
        // viaje_autor drafts. The classic editor is preserved via the
        // `use_block_editor_for_post_type` filter below — Gutenberg stays off
        // so the existing metaboxes keep working.
        'show_in_rest' => true,
        'rest_base'    => 'viaje_autor',
        'show_in_menu' => true,
        // The public listing is the curated page /viajes-de-autor/.
        // Keeping the CPT archive enabled exposes /viajes/, which redirects and
        // can appear as a 3XX URL in XML sitemaps.
        'has_archive' => false,
        'menu_icon' => 'dashicons-airplane',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields'],
        'rewrite' => ['slug' => 'viajes', 'with_front' => false],
    ]);
});

add_action('init', function () {
    $rewrite_version = '2026-05-02-disable-viaje-autor-archive';

    if ( get_option( 'ukiyo_viaje_autor_rewrite_version' ) === $rewrite_version ) {
        return;
    }

    flush_rewrite_rules( false );
    update_option( 'ukiyo_viaje_autor_rewrite_version', $rewrite_version );
}, 30);

add_action('init', function () {
    register_taxonomy('destino', ['viaje_autor'], [
        'label' => 'Destinos',
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'destino'],
    ]);
});

// Keep the classic editor for viaje_autor even though show_in_rest is true.
// The existing metaboxes (`inc/meta-viaje-autor.php`) rely on it.
add_filter('use_block_editor_for_post_type', function ($use, $post_type) {
    if ($post_type === 'viaje_autor') {
        return false;
    }
    return $use;
}, 10, 2);

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
