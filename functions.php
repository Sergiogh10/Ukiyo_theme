<?php
/**
 * Funciones del tema UKIYO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Seguridad
}

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

// === CPT Guías + taxonomías ===
add_action('init', function () {
  register_post_type('guia', [
    'label' => 'Guías',
    'labels' => [
      'name' => 'Guías',
      'singular_name' => 'Guía',
      'add_new_item' => 'Añadir nueva guía',
      'edit_item' => 'Editar guía',
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'guias'],
    'menu_icon' => 'dashicons-location-alt',
    'supports' => ['title','editor','excerpt','thumbnail','author','revisions'],
    'show_in_rest' => true,
  ]);

  register_taxonomy('region', 'guia', [
    'label' => 'Regiones',
    'hierarchical' => true,
    'rewrite' => ['slug' => 'region'],
    'show_in_rest' => true,
  ]);
  register_taxonomy('experiencia', 'guia', [
    'label' => 'Tipo de experiencia',
    'hierarchical' => true,
    'rewrite' => ['slug' => 'experiencia'],
    'show_in_rest' => true,
  ]);
  register_taxonomy('nivel', 'guia', [
    'label' => 'Nivel',
    'hierarchical' => true,
    'rewrite' => ['slug' => 'nivel'],
    'show_in_rest' => true,
  ]);
  register_taxonomy('duracion', 'guia', [
    'label' => 'Duración',
    'hierarchical' => true,
    'rewrite' => ['slug' => 'duracion'],
    'show_in_rest' => true,
  ]);
});

// Tamaños de imagen sugeridos
add_action('after_setup_theme', function () {
  add_image_size('guia-hero', 1600, 900, true);
  add_image_size('guia-card', 1000, 625, true);
});

/**
 * Permitir query vars personalizadas para filtros
 */
add_filter('query_vars', function($vars){
    $vars[] = 'region';
    $vars[] = 'duracion';
    $vars[] = 'nivel';
    $vars[] = 'experiencia';
    return $vars;
});

/**
 * Aplicar filtros en el archivo de guías
 */
add_action('pre_get_posts', function($q){
    if ( is_admin() || ! $q->is_main_query() ) return;

    // Archivo de CPT 'guia' (ajusta si usaste otro slug)
    if ( $q->is_post_type_archive('guia') ) {

        // Búsqueda (campo s ya lo gestiona WP si viene en la URL)
        // TaxQuery a partir de los GET
        $tax_query = [];

        $map = [
            'region'      => 'region',       // tax slug => query var
            'duracion'    => 'duracion',
            'nivel'       => 'nivel',
            'experiencia' => 'experiencia',
        ];

        foreach ($map as $qv => $tax) {
            $val = get_query_var($qv);
            if ( !empty($val) ) {
                $tax_query[] = [
                    'taxonomy' => $tax,
                    'field'    => 'slug',
                    'terms'    => array_map('sanitize_title', (array)$val),
                ];
            }
        }

        if (!empty($tax_query)) {
            $q->set('tax_query', $tax_query);
        }

        // Orden por fecha (ajústalo si quieres popularidad, título, etc.)
        $q->set('orderby', 'date');
        $q->set('order', 'DESC');

        // Paginación (WP lo maneja solo con paged, esto asegura que lo lea)
        if ( get_query_var('paged') ) {
            $q->set('paged', get_query_var('paged'));
        }
    }
});

// === Metabox: Datos de la Guía (sin plugins) ===
add_action('add_meta_boxes', function () {
    add_meta_box(
        'ukiyo_guia_meta',
        'Datos de la Guía',
        'ukiyo_guia_meta_cb',
        'guia',
        'normal',
        'high'
    );
});

function ukiyo_field($id,$label,$type='text',$help=''){
    $v = get_post_meta(get_the_ID(), $id, true);
    echo '<p style="margin:12px 0">';
    echo "<label style='display:block;font-weight:600;margin-bottom:6px' for='{$id}'>{$label}</label>";
    if ($type==='textarea') {
        echo "<textarea id='{$id}' name='{$id}' rows='4' style='width:100%'>".esc_textarea($v)."</textarea>";
    } else {
        echo "<input type='{$type}' id='{$id}' name='{$id}' value='".esc_attr($v)."' style='width:100%'>";
    }
    if ($help) echo "<small style='color:#666'>{$help}</small>";
    echo '</p>';
}

function ukiyo_guia_meta_cb() {
    wp_nonce_field('ukiyo_guia_meta_save','ukiyo_guia_nonce');

    echo "<h3 style='margin-top:0'>Hero</h3>";
    ukiyo_field('guia_temporada', 'Temporada (p.ej. “Todo el año”)');

    echo "<hr><h3>Datos rápidos</h3>";
    ukiyo_field('guia_duracion_texto', 'Duración (texto, p.ej. “3 días / 2 noches”)');
    ukiyo_field('guia_ciudades',       'Ciudades (p.ej. “Bogotá y alrededores”)');
    ukiyo_field('guia_transporte',     'Transporte (p.ej. “Público y privado”)');
    ukiyo_field('guia_grupo_max',      'Grupo máximo (número o texto)');
    ukiyo_field('guia_nivel_texto',    'Nivel físico (texto, p.ej. “Moderado”)');
    ukiyo_field('guia_idiomas',        'Idiomas (p.ej. “Español, Inglés”)');

    echo "<hr><h3>Highlights (4)</h3>";
    for($i=1;$i<=4;$i++){
        echo "<h4>Highlight {$i}</h4>";
        ukiyo_field("hi{$i}_titulo","Título");
        ukiyo_field("hi{$i}_desc","Descripción",'textarea');
        ukiyo_field("hi{$i}_color","Color (primary|secondary|accent)");
    }

    echo "<hr><h3>Itinerario (3 días)</h3>";
    for($d=1;$d<=3;$d++){
        echo "<h4>Día {$d}</h4>";
        ukiyo_field("d{$d}_titulo","Título del día (p.ej. “Día {$d}: ...”)");
        ukiyo_field("d{$d}_sub","Subtítulo (lugar/tema)");
        ukiyo_field("d{$d}_bloques","Bloques horarios (una línea por ítem: HORA — Título | Descripción | color(primary|secondary|accent))",'textarea',
            'Ej: 8:00 — Encuentro | Café y contexto | primary');
        ukiyo_field("d{$d}_img_main","Imagen principal (URL)");
        ukiyo_field("d{$d}_img_a","Imagen cuadrada A (URL)");
        ukiyo_field("d{$d}_img_b","Imagen cuadrada B (URL)");
        if ($d<3) echo "<br>";
    }

    echo "<hr><h3>Información práctica</h3>";
    ukiyo_field('incluido_lista','Incluido (una línea por ítem)','textarea');
    ukiyo_field('optimo_lista','Para experiencia óptima (una línea por ítem)','textarea');
    ukiyo_field('llevar_ropa','Qué llevar: Ropa y calzado (una línea por ítem)','textarea');
    ukiyo_field('llevar_acc','Qué llevar: Accesorios (una línea por ítem)','textarea');
    ukiyo_field('cod_templos','Códigos culturales: Templos (una línea por ítem)','textarea');
    ukiyo_field('cod_familias','Códigos culturales: Familias (una línea por ítem)','textarea');

    echo "<hr><h3>Contacto</h3>";
    ukiyo_field('contacto_nombre','Nombre');
    ukiyo_field('contacto_rol','Rol/Título');
    ukiyo_field('contacto_tel','Teléfono');
    ukiyo_field('contacto_mail','Email');
    ukiyo_field('contacto_ig','Instagram (usuario con @ o texto)');
    ukiyo_field('contacto_avatar','Avatar (URL 60x60 aprox)');
}

add_action('save_post_guia', function($post_id){
    if (!isset($_POST['ukiyo_guia_nonce']) || !wp_verify_nonce($_POST['ukiyo_guia_nonce'],'ukiyo_guia_meta_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post',$post_id)) return;

    $keys = [
        'guia_temporada','guia_duracion_texto','guia_ciudades','guia_transporte','guia_grupo_max','guia_nivel_texto','guia_idiomas',
        'incluido_lista','optimo_lista','llevar_ropa','llevar_acc','cod_templos','cod_familias',
        'contacto_nombre','contacto_rol','contacto_tel','contacto_mail','contacto_ig','contacto_avatar'
    ];
    for($i=1;$i<=4;$i++){
        $keys[]="hi{$i}_titulo"; $keys[]="hi{$i}_desc"; $keys[]="hi{$i}_color";
    }
    for($d=1;$d<=3;$d++){
        foreach(['titulo','sub','bloques','img_main','img_a','img_b'] as $s){
            $keys[]="d{$d}_{$s}";
        }
    }
    foreach($keys as $k){
        if (isset($_POST[$k])) {
            $val = is_string($_POST[$k]) ? wp_kses_post($_POST[$k]) : $_POST[$k];
            update_post_meta($post_id, $k, $val);
        }
    }
});
