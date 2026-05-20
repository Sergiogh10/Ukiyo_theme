<?php
/**
 * Funciones del tema UKIYO
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Seguridad
}

require_once __DIR__ . '/inc/cpt-viaje-autor.php';
require_once __DIR__ . '/inc/meta-viaje-autor.php';
require_once __DIR__ . '/inc/meta-posts.php';
require_once __DIR__ . '/inc/post-content.php';
require_once __DIR__ . '/inc/icons.php';
require_once __DIR__ . '/inc/routes.php';
require_once __DIR__ . '/inc/portal/bootstrap.php';
require_once __DIR__ . '/inc/seo.php';
require_once __DIR__ . '/inc/seo-helpers.php';
require_once __DIR__ . '/inc/performance.php';

/**
 * Remitente global de emails del sitio.
 */
function ukiyo_mail_from_email() {
    return 'info@viajesukiyo.com';
}

function ukiyo_mail_from_name() {
    return 'Viajes Ukiyo';
}

add_filter(
    'wp_mail_from',
    function () {
        return ukiyo_mail_from_email();
    }
);

add_filter(
    'wp_mail_from_name',
    function () {
        return ukiyo_mail_from_name();
    }
);

add_action(
    'phpmailer_init',
    function ( $phpmailer ) {
        $from_email = ukiyo_mail_from_email();
        $from_name  = ukiyo_mail_from_name();

        $phpmailer->From     = $from_email;
        $phpmailer->FromName = $from_name;
        $phpmailer->Sender   = $from_email;

        if ( method_exists( $phpmailer, 'clearReplyTos' ) && empty( $phpmailer->getReplyToAddresses() ) ) {
            $phpmailer->addReplyTo( $from_email, $from_name );
        }
    }
);

/**
 * Enqueue media uploader for viaje_autor admin
 */
add_action('admin_enqueue_scripts', function($hook) {
    global $post_type;
    if (($hook === 'post.php' || $hook === 'post-new.php') && $post_type === 'viaje_autor') {
        wp_enqueue_media();
    }
});
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
 * Tokens críticos del tema.
 *
 * El archivo tailwind.css era una petición bloqueante en móvil y, además,
 * contenía directivas de build (@tailwind/@apply) que el navegador no puede
 * ejecutar. Dejamos aquí solo las variables que necesita el CSS compilado.
 */
add_action(
    'wp_head',
    function () {
        echo "<style id=\"ukiyo-critical-tokens\">:root{--color-primary:#8B4513;--color-primary-50:#FDF7F3;--color-primary-100:#F9E8D9;--color-primary-200:#F2D1B3;--color-primary-300:#E8B48D;--color-primary-400:#D19767;--color-primary-500:#B8794A;--color-primary-600:#8B4513;--color-primary-700:#6B3410;--color-primary-800:#4A240B;--color-primary-900:#2A1406;--color-secondary:#9CAF88;--color-secondary-50:#F7F9F5;--color-secondary-100:#EDF2E8;--color-secondary-200:#DBE5D1;--color-secondary-300:#C9D8BA;--color-secondary-400:#B7CBA3;--color-secondary-500:#9CAF88;--color-secondary-600:#7D8C6D;--color-secondary-700:#5E6952;--color-secondary-800:#3F4637;--color-secondary-900:#20231C;--color-accent:#D4A574;--color-accent-50:#FDF9F4;--color-accent-100:#F9F0E4;--color-accent-200:#F2E1C9;--color-accent-300:#EBD2AE;--color-accent-400:#E4C393;--color-accent-500:#D4A574;--color-accent-600:#B8905F;--color-accent-700:#9C7B4A;--color-accent-800:#806635;--color-accent-900:#645120;--color-background:#FEFCF8;--color-surface:#F5F2ED;--color-text-primary:#2C2C2C;--color-text-secondary:#6B6B6B;--color-success:#7A9471;--color-warning:#C4915C;--color-error:#A0674B;--font-sans:'Satoshi',system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;--font-display:'Rowdies',sans-serif}body{background-color:var(--color-background);color:var(--color-text-primary);font-family:var(--font-sans)}</style>\n";
    },
    1
);

/**
 * Expone los archivos LLMs para crawlers y herramientas de IA.
 */
add_action(
    'wp_head',
    function () {
        echo '<link rel="alternate" type="text/plain" href="/llms.txt">' . "\n";
        echo '<link rel="alternate" type="text/plain" href="/llms-full.txt">' . "\n";
    },
    3
);

/**
 * Evita indexar categorías editoriales genéricas que no aportan como landing SEO.
 */
function ukiyo_should_noindex_generic_category() {
    return is_category( 'consejos' );
}

add_filter(
    'wpseo_robots',
    function ( $robots ) {
        return ukiyo_should_noindex_generic_category() ? 'noindex, follow' : $robots;
    },
    20
);

add_filter(
    'rank_math/frontend/robots',
    function ( $robots ) {
        if ( ukiyo_should_noindex_generic_category() ) {
            $robots['index']  = 'noindex';
            $robots['follow'] = 'follow';
        }

        return $robots;
    },
    20
);

add_action(
    'wp_head',
    function () {
        if ( ! ukiyo_should_noindex_generic_category() ) {
            return;
        }

        if ( function_exists( 'ukiyo_has_active_seo_plugin' ) && ukiyo_has_active_seo_plugin() ) {
            return;
        }

        echo '<meta name="robots" content="noindex,follow">' . "\n";
    },
    5
);

/**
 * Aísla el banner de consentimiento para reducir reflows sobre el documento.
 */
add_action(
    'wp_head',
    function () {
        echo '<style id="ukiyo-consent-performance">.cmplz-cookiebanner,.cmplz-soft-cookiewall{contain:layout paint style;will-change:transform,opacity;}</style>' . "\n";
    },
    4
);

/**
 * Devuelve versión basada en filemtime para cache busting.
 */
function ukiyo_asset_ver( $path ) {
    $file = get_template_directory() . $path;
    return file_exists( $file ) ? filemtime( $file ) : '1.0';
}

/**
 * Returns the minified asset path when it exists, keeping the source file as a
 * readable fallback for development.
 */
function ukiyo_minified_asset_path( $path ) {
    $extension = pathinfo( $path, PATHINFO_EXTENSION );

    if ( ! in_array( $extension, [ 'css', 'js' ], true ) ) {
        return $path;
    }

    $min_path = preg_replace( '/\.' . preg_quote( $extension, '/' ) . '$/', '.min.' . $extension, $path );

    return file_exists( get_template_directory() . $min_path ) ? $min_path : $path;
}

/**
 * Convierte assets exportados por React Email en URLs absolutas versionadas.
 */
function ukiyo_email_static_asset_url( $asset_path ) {
    $normalized_path = ltrim( (string) $asset_path, '/' );
    $local_path      = get_template_directory() . '/emails/out/static/' . $normalized_path;
    $asset_url       = trailingslashit( get_template_directory_uri() ) . 'emails/out/static/' . $normalized_path;

    if ( file_exists( $local_path ) ) {
        $asset_url = add_query_arg( 'v', (string) filemtime( $local_path ), $asset_url );
    }

    return $asset_url;
}

function ukiyo_email_replace_static_urls( $html ) {
    if ( ! is_string( $html ) || '' === $html ) {
        return $html;
    }

    return preg_replace_callback(
        '#/static/([A-Za-z0-9._/\-]+)#',
        function ( $matches ) {
            return ukiyo_email_static_asset_url( $matches[1] );
        },
        $html
    );
}

function ukiyo_email_static_asset_path_from_reference( $reference ) {
    if ( ! is_string( $reference ) || '' === $reference ) {
        return '';
    }

    $reference = html_entity_decode( trim( $reference ), ENT_QUOTES, 'UTF-8' );
    $path      = wp_parse_url( $reference, PHP_URL_PATH );

    if ( ! is_string( $path ) || '' === $path ) {
        $path = $reference;
    }

    $path = rawurldecode( $path );

    if ( ! preg_match( '#(?:^|/)(?:emails/out/)?static/([A-Za-z0-9._/\-]+)$#', $path, $matches ) ) {
        return '';
    }

    $local_path = get_template_directory() . '/emails/out/static/' . ltrim( $matches[1], '/' );

    return file_exists( $local_path ) ? $local_path : '';
}

function ukiyo_email_embed_static_images( $html ) {
    if ( ! is_string( $html ) || '' === $html ) {
        return [
            'html'   => $html,
            'embeds' => [],
        ];
    }

    $embeds = [];

    $processed_html = preg_replace_callback(
        '#(<img\b[^>]*\ssrc=["\'])([^"\']+)(["\'])#i',
        function ( $matches ) use ( &$embeds ) {
            $prefix    = $matches[1];
            $source    = $matches[2];
            $suffix    = $matches[3];
            $local_path = ukiyo_email_static_asset_path_from_reference( $source );

            if ( ! $local_path ) {
                return $matches[0];
            }

            if ( ! isset( $embeds[ $local_path ] ) ) {
                $filetype = wp_check_filetype( basename( $local_path ) );

                $embeds[ $local_path ] = [
                    'path' => $local_path,
                    'cid'  => 'ukiyo-email-' . md5( $local_path ),
                    'mime' => ! empty( $filetype['type'] ) ? $filetype['type'] : 'application/octet-stream',
                ];
            }

            return $prefix . 'cid:' . $embeds[ $local_path ]['cid'] . $suffix;
        },
        $html
    );

    return [
        'html'   => is_string( $processed_html ) ? $processed_html : $html,
        'embeds' => array_values( $embeds ),
    ];
}

add_filter(
    'wp_mail',
    function ( $args ) {
        if ( empty( $GLOBALS['ukiyo_email_embed_queue'] ) || ! is_array( $GLOBALS['ukiyo_email_embed_queue'] ) ) {
            $GLOBALS['ukiyo_email_embed_queue'] = [];
        }

        $result = ukiyo_email_embed_static_images( isset( $args['message'] ) ? $args['message'] : '' );

        $args['message']                    = $result['html'];
        $GLOBALS['ukiyo_email_embed_queue'][] = $result['embeds'];

        return $args;
    }
);

add_action(
    'phpmailer_init',
    function ( $phpmailer ) {
        $queue  = isset( $GLOBALS['ukiyo_email_embed_queue'] ) && is_array( $GLOBALS['ukiyo_email_embed_queue'] ) ? $GLOBALS['ukiyo_email_embed_queue'] : [];
        $embeds = ! empty( $queue ) ? array_shift( $queue ) : [];

        $GLOBALS['ukiyo_email_embed_queue'] = $queue;

        if ( empty( $embeds ) || ! method_exists( $phpmailer, 'addEmbeddedImage' ) ) {
            return;
        }

        foreach ( $embeds as $embed ) {
            if ( empty( $embed['path'] ) || empty( $embed['cid'] ) || ! file_exists( $embed['path'] ) ) {
                continue;
            }

            $phpmailer->addEmbeddedImage(
                $embed['path'],
                $embed['cid'],
                basename( $embed['path'] ),
                'base64',
                ! empty( $embed['mime'] ) ? $embed['mime'] : 'application/octet-stream'
            );
        }
    },
    20
);

/**
 * Enqueue CSS y JS del tema
 */
function ukiyo_enqueue_assets() {
    $main_css     = ukiyo_minified_asset_path( '/assets/css/main.css' );
    $legacy_css   = ukiyo_minified_asset_path( '/assets/css/legacy-tailwind-compat.css' );
    $scripts_js   = ukiyo_minified_asset_path( '/assets/js/scripts.js' );
    $injector_js  = ukiyo_minified_asset_path( '/public/dhws-data-injector.js' );

    // CSS
    wp_enqueue_style(
        'ukiyo-main',
        get_template_directory_uri() . $main_css,
        array(),
        ukiyo_asset_ver( $main_css )
    );

    wp_enqueue_style(
        'ukiyo-legacy-tailwind-compat',
        get_template_directory_uri() . $legacy_css,
        array('ukiyo-main'),
        ukiyo_asset_ver( $legacy_css )
    );

    // JS principal del tema (menu toggle, parallax, smooth scroll)
    wp_enqueue_script(
        'ukiyo-scripts',
        get_template_directory_uri() . $scripts_js,
        array(),
        ukiyo_asset_ver( $scripts_js ),
        true
    );

    // Herramienta de depuración: no debe ejecutarse para usuarios ni PageSpeed.
    if ( current_user_can( 'manage_options' ) && isset( $_GET['ukiyo_component_debug'] ) ) {
        wp_enqueue_script(
            'ukiyo-data-injector',
            get_template_directory_uri() . $injector_js,
            array(),
            ukiyo_asset_ver( $injector_js ),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'ukiyo_enqueue_assets');

/**
 * Carga Contentsquare fuera de la ventana crítica móvil.
 */
function ukiyo_output_delayed_contentsquare_tag() {
    if ( is_admin() ) {
        return;
    }
    ?>
    <script>
    (function () {
      var loaded = false;

      function loadContentSquare() {
        if (loaded || document.querySelector('script[data-ukiyo-contentsquare]')) {
          return;
        }

        if (navigator.connection && navigator.connection.saveData) {
          return;
        }

        loaded = true;

        var script = document.createElement('script');
        script.src = 'https://t.contentsquare.net/uxa/7553120230801.js';
        script.async = true;
        script.defer = true;
        script.dataset.ukiyoContentsquare = 'true';
        document.head.appendChild(script);
      }

      function scheduleAfterInteraction() {
        setTimeout(loadContentSquare, 1200);
      }

      ['pointerdown', 'keydown', 'touchstart', 'scroll'].forEach(function (eventName) {
        window.addEventListener(eventName, scheduleAfterInteraction, { once: true, passive: true });
      });

      window.addEventListener('load', function () {
        if ('requestIdleCallback' in window) {
          requestIdleCallback(function () {
            setTimeout(loadContentSquare, 12000);
          }, { timeout: 12000 });
          return;
        }

        setTimeout(loadContentSquare, 12000);
      }, { once: true });
    })();
    </script>
    <?php
}
add_action( 'wp_footer', 'ukiyo_output_delayed_contentsquare_tag', 30 );

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
 * Detecta si la página actual contiene un feed de Instagram.
 */
function ukiyo_current_request_uses_instagram_feed() {
    if ( is_admin() ) {
        return true;
    }

    if ( is_singular() ) {
        $post = get_post( get_queried_object_id() );
        if ( $post instanceof WP_Post ) {
            $content = (string) $post->post_content;

            return has_shortcode( $content, 'instagram-feed' )
                || has_shortcode( $content, 'instagram_feed' )
                || has_block( 'instagram-feed/sbi-feed-block', $post )
                || false !== stripos( $content, 'sbi_' )
                || false !== stripos( $content, 'sb_instagram' );
        }
    }

    return false;
}

/**
 * Limpia assets globales de plugins/bloques que no se usan en estas plantillas.
 */
function ukiyo_cleanup_non_critical_frontend_assets() {
    if ( is_admin() || is_feed() || wp_doing_ajax() ) {
        return;
    }

    $style_handles = [
        'wp-block-library',
        'wp-block-library-theme',
        'classic-theme-styles',
        'global-styles',
    ];

    if ( ! ukiyo_current_request_uses_instagram_feed() ) {
        $style_handles[] = 'sbi_styles';
        wp_dequeue_script( 'sbi_scripts' );
        wp_deregister_script( 'sbi_scripts' );
    }

    foreach ( $style_handles as $handle ) {
        wp_dequeue_style( $handle );
        wp_deregister_style( $handle );
    }

    global $wp_styles, $wp_scripts;

    if ( $wp_styles instanceof WP_Styles ) {
        foreach ( (array) $wp_styles->queue as $handle ) {
            $registered = isset( $wp_styles->registered[ $handle ] ) ? $wp_styles->registered[ $handle ] : null;
            $src        = $registered && ! empty( $registered->src ) ? (string) $registered->src : '';

            if ( false !== strpos( $src, '/blocks/subscription' ) ) {
                wp_dequeue_style( $handle );
                wp_deregister_style( $handle );
            }
        }
    }

    if ( $wp_scripts instanceof WP_Scripts ) {
        foreach ( (array) $wp_scripts->queue as $handle ) {
            $registered = isset( $wp_scripts->registered[ $handle ] ) ? $wp_scripts->registered[ $handle ] : null;
            $src        = $registered && ! empty( $registered->src ) ? (string) $registered->src : '';

            if ( false !== strpos( $src, '/blocks/subscription' ) ) {
                wp_dequeue_script( $handle );
                wp_deregister_script( $handle );
            }
        }
    }
}
add_action( 'wp_enqueue_scripts', 'ukiyo_cleanup_non_critical_frontend_assets', 100 );
add_action( 'wp_print_styles', 'ukiyo_cleanup_non_critical_frontend_assets', 1 );
add_action( 'wp_print_scripts', 'ukiyo_cleanup_non_critical_frontend_assets', 1 );

/**
 * Hacer CSS no-bloqueante (reduce render-blocking).
 * IMPORTANTE: solo lo aplicamos a tus 2 CSS grandes.
 */
add_filter('style_loader_tag', function ($html, $handle, $href, $media) {

    $media_attr = $media ? $media : 'all';

    // main.css y compatibilidad: no bloqueantes, y cuando carga main mostramos la página
    if ($handle === 'ukiyo-main' || $handle === 'ukiyo-legacy-tailwind-compat') {
        $out  = "<link rel='preload' as='style' href='" . esc_url($href) . "' />\n";
        $out .= "<link rel='stylesheet' href='" . esc_url($href) . "' media='print'
          onload=\"this.media='" . esc_attr($media_attr) . "';document.documentElement.classList.add('css-ready');\" />\n";
        $out .= "<noscript><link rel='stylesheet' href='" . esc_url($href) . "' media='" . esc_attr($media_attr) . "' /></noscript>\n";
        // Si por lo que sea el onload falla, aseguramos que se muestre igualmente
        if ($handle === 'ukiyo-main') {
            $out .= "<script>setTimeout(()=>document.documentElement.classList.add('css-ready'),1500);</script>\n";
        }
        return $out;
    }

    $defer_css_handles = [
        'cmplz-general',
        'cmplz-cookiebanner',
        'sbi_styles',
    ];

    $defer_css_fragments = [
        'complianz-gdpr/assets/css/cookieblocker',
        'instagram-feed/css/sbi-styles',
        '/blocks/subscription',
    ];

    $should_defer = in_array( $handle, $defer_css_handles, true );
    foreach ( $defer_css_fragments as $fragment ) {
        if ( false !== strpos( (string) $href, $fragment ) ) {
            $should_defer = true;
            break;
        }
    }

    if ( $should_defer ) {
        return "<link rel='stylesheet' href='" . esc_url( $href ) . "' media='print' onload=\"this.media='" . esc_attr( $media_attr ) . "'\" />\n"
            . "<noscript><link rel='stylesheet' href='" . esc_url( $href ) . "' media='" . esc_attr( $media_attr ) . "' /></noscript>\n";
    }

    return $html;

}, 10, 4);

/**
 * Devuelve un loader diferido para scripts de marketing/analítica.
 */
function ukiyo_delayed_external_script_tag( $src, $key, $delay = 6500 ) {
    $src_json   = wp_json_encode( esc_url_raw( $src ) );
    $key_attr   = esc_attr( sanitize_key( $key ) );
    $delay_attr = absint( $delay );

    return "<script data-ukiyo-delayed-script='" . $key_attr . "'>
(function(){
  var loaded=false,src=" . $src_json . ";
  function load(){
    if(loaded||!src){return;}
    if(navigator.connection&&navigator.connection.saveData){return;}
    loaded=true;
    var s=document.createElement('script');
    s.src=src;
    s.async=true;
    s.defer=true;
    document.head.appendChild(s);
  }
  function schedule(){setTimeout(load,900);}
  ['pointerdown','keydown','touchstart','scroll'].forEach(function(e){
    window.addEventListener(e,schedule,{once:true,passive:true});
  });
  window.addEventListener('load',function(){setTimeout(load," . $delay_attr . ");},{once:true});
})();
</script>\n";
}

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

    $delayed_src_fragments = array(
        'googletagmanager.com/gtag/js' => 'gtag',
        'googletagmanager.com/gtm.js'  => 'gtm',
        'pagead2.googlesyndication.com' => 'google-ads',
        'googlesyndication.com/pagead' => 'google-ads',
        'doubleclick.net'              => 'doubleclick',
    );

    foreach ( $delayed_src_fragments as $fragment => $key ) {
        if ( false !== strpos( (string) $src, $fragment ) ) {
            return ukiyo_delayed_external_script_tag( $src, $key, 8000 );
        }
    }

    $defer_src_fragments = array(
        'complianz-gdpr/cookiebanner/js/complianz.min.js',
        't.contentsquare.net/uxa/',
        '/blocks/subscription',
        'instagram-feed/js/sbi-scripts',
    );

    foreach ( $defer_src_fragments as $fragment ) {
        if ( false === strpos( (string) $src, $fragment ) ) {
            continue;
        }

        if ( false === strpos( $tag, ' defer' ) ) {
            $tag = str_replace( '<script ', '<script defer ', $tag );
        }

        if ( false === strpos( $tag, ' async' ) && false !== strpos( (string) $src, 'googletagmanager.com' ) ) {
            $tag = str_replace( '<script ', '<script async ', $tag );
        }

        return $tag;
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
 * AJAX Handler for Blog Filtering
 * Returns the HTML for the masonry grid based on category ID.
 */
add_action('wp_ajax_ukiyo_filter_blog', 'ukiyo_filter_blog_handler');
add_action('wp_ajax_nopriv_ukiyo_filter_blog', 'ukiyo_filter_blog_handler');

function ukiyo_filter_blog_handler() {
    $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : '';
    
    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 6, // Or more?
        'paged'          => 1, // Reset pagination on filter
    );

    // If category is selected, add tax_query
    if ( ! empty($cat_id) ) {
        $args['cat'] = $cat_id;
        // Don't offset if filtering by specific category? 
        // usually "Featured" is global. If filtering, we likely want to see the latest of THAT category.
        // For simplicity, let's just show top 6 of that category.
    } else {
        // If "All", we might want to keep the offset=1 to respect the Featured one? 
        // User asked to filter "entries", implies the list.
        // Let's keep offset=1 ONLY for 'All' so we don't duplicate the featured one which is still visible.
        $args['offset'] = 1; 
    }

    $query = new WP_Query($args);

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
            $grid_img_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
            $cats = get_the_category();
            $cat_name = !empty($cats) ? $cats[0]->name : 'Blog';
            ?>
            
            <article class="masonry-item break-inside-avoid mb-8 ukiyo-card group flex flex-col relative overflow-hidden" onclick="window.location.href='<?php the_permalink(); ?>'" style="cursor: pointer;">
                
                <!-- Image Section (Matched to page-viajesautor.php) -->
                <div class="relative h-64 overflow-hidden">
                     <img 
                        alt="<?php the_title_attribute(); ?>" 
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" 
                        src="<?php echo esc_url($grid_img_url ? $grid_img_url : 'https://via.placeholder.com/600x400'); ?>"
                    />
                    <!-- Gradient Overlay from Viajes Autor -->
                    <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-white/20 to-transparent"></div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4 bg-white/90 dark:bg-black/80 px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary rounded-sm backdrop-blur-sm shadow-sm">
                        <?php echo esc_html($cat_name); ?>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="p-6 flex-1 flex flex-col bg-white dark:bg-gray-900">
                    
                    <!-- Header with Avatar (Matched to Viajes Autor) -->
                    <div class="flex items-start gap-4 mb-4">
                        <div class="flex-shrink-0 relative rounded-full overflow-hidden border-2 border-white dark:border-gray-800 shadow-md w-12 h-12">
                            <img 
                                src="<?php echo get_avatar_url( get_the_author_meta('ID') ); ?>" 
                                alt="<?php the_author(); ?>"
                                class="w-full h-full object-cover"
                            />
                        </div>
                        <div class="pt-1">
                             <h3 class="font-rowdies text-xl md:text-2xl font-bold text-gray-900 dark:text-white leading-tight mb-1 group-hover:text-primary transition-colors">
                                <?php the_title(); ?>
                            </h3>
                             <p class="text-xs text-gray-500 dark:text-gray-400 font-satoshi font-medium uppercase tracking-wide">
                                Por <span class="text-primary font-bold"><?php the_author(); ?></span>
                             </p>
                        </div>
                    </div>
                    
                    <!-- Excerpt -->
                    <div class="text-gray-500 dark:text-gray-400 mb-6 text-sm leading-relaxed line-clamp-3 font-satoshi">
                        <?php the_excerpt(); ?>
                    </div>

                    <!-- Footer -->
                    <div class="mt-auto border-t border-gray-100 dark:border-gray-800 pt-8 flex items-center justify-between">
                        <span class="text-xs text-gray-400 font-satoshi"><?php echo get_the_date('d M Y'); ?></span>
                        <span class="text-primary text-xs font-bold uppercase tracking-wide group-hover:text-primary transition-colors flex items-center">
                            Seguir leyendo <?php echo ukiyo_icon( 'east', 'text-sm ml-1 transform group-hover:translate-x-1 transition-transform' ); ?>
                        </span>
                    </div>
                </div>
            </article>

            <?php
        endwhile;
        wp_reset_postdata();
    else:
        echo '<p class="text-center text-gray-500 py-8">No se encontraron artículos en esta categoría.</p>';
    endif;

    die(); // Important for AJAX
}
