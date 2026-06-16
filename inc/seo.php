<?php
/**
 * SEO foundation for the UKIYO theme.
 *
 * Centralizes reusable metadata, social tags and base schema graph.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Avoid duplicate metadata when a dedicated SEO plugin is rendering the head.
 */
function ukiyo_has_active_seo_plugin() {
    return defined( 'WPSEO_VERSION' )
        || class_exists( 'WPSEO_Frontend' )
        || defined( 'RANK_MATH_VERSION' )
        || defined( 'AIOSEO_VERSION' );
}

/**
 * Template-level SEO overrides for the pages with the highest business value.
 */
function ukiyo_get_seo_overrides() {
    $overrides = [
        'front_page' => [
            'title'       => 'Agencia de viajes a medida y personalizados | UKIYO',
            'description' => 'Agencia de viajes a medida especializada en Costa Rica, Indonesia, Marruecos, Colombia y más. Rutas personalizadas diseñadas por quienes las han vivido.',
            'image'       => get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-costaricatucan.webp',
        ],
        'page-experiences.php' => [
            'title'       => 'Destinos para viajes a medida en Costa Rica, Colombia, Indonesia y Marruecos | UKIYO',
            'description' => 'Descubre destinos para viajes a medida con ideas de ruta, mejor época y experiencias auténticas en Costa Rica, Colombia, Indonesia y Marruecos.',
        ],
        'page-pricing.php' => [
            'title'       => 'Precios de viajes a medida y qué incluye cada servicio | UKIYO',
            'description' => 'Descubre cuánto cuesta organizar un viaje a medida con UKIYO, qué incluye cada servicio y cuál encaja mejor con tu forma de viajar.',
        ],
        'page-reviews2.php' => [
            'title'       => 'Opiniones reales y reseñas de viajes a medida | UKIYO',
            'description' => 'Lee reseñas reales de viajeros que ya han vivido viajes a medida con UKIYO en Indonesia, Costa Rica, Colombia y Marruecos.',
        ],
        'page-viajesautor.php' => [
            'title'       => 'Viajes de autor en grupo reducido | UKIYO',
            'description' => 'Viajes de autor en grupo reducido con expertos locales, fotógrafos y anfitriones que conocen el destino desde dentro. Salidas cuidadas y plazas limitadas.',
        ],
        'page-costarica.php' => [
            'title'       => 'Viajes a medida a Costa Rica | Naturaleza y biodiversidad con UKIYO',
            'description' => 'Organizamos viajes personalizados a Costa Rica con selva, fauna, volcanes y experiencias auténticas lejos del turismo masivo.',
        ],
        'page-colombia.php' => [
            'title'       => 'Viajes a medida a Colombia | Caribe, café y Pacífico con UKIYO',
            'description' => 'Diseñamos viajes personalizados a Colombia con rutas auténticas por el Caribe, el Eje Cafetero y rincones menos masificados.',
        ],
        'page-indonesia.php' => [
            'title'       => 'Viajes a medida a Indonesia | Islas, templos y naturaleza con UKIYO',
            'description' => 'Viajes personalizados a Indonesia para descubrir Bali, Java y otras islas con una mirada auténtica, pausada y a medida.',
        ],
        'page-marruecos.php' => [
            'title'       => 'Viajes a medida a Marruecos | Desierto, medinas y cultura con UKIYO',
            'description' => 'Creamos viajes personalizados a Marruecos con rutas auténticas por medinas, Atlas y desierto, lejos del turismo más masivo.',
        ],
        'page-about.php' => [
            'title'       => 'Quiénes somos | UKIYO, agencia de viajes a medida',
            'description' => 'Conoce al equipo de UKIYO y nuestra forma de diseñar viajes a medida auténticos, sostenibles y alejados del turismo masivo.',
        ],
        'page-planifica-tu-viaje.php' => [
            'title'       => 'Planifica tu viaje a medida | Cuéntanos tu idea | UKIYO',
            'description' => 'Rellena el formulario y cuéntanos cómo imaginas tu viaje a medida. Diseñaremos una propuesta personalizada para Costa Rica, Colombia, Indonesia o Marruecos.',
        ],
        'page-formautor.php' => [
            'title'       => 'Reserva tu viaje de autor | Formulario UKIYO',
            'description' => 'Solicita información o reserva tu plaza en un viaje de autor de UKIYO. Te ayudamos a elegir la experiencia adecuada para ti.',
        ],
    ];

    return apply_filters( 'ukiyo_seo_overrides', $overrides );
}

/**
 * Destination page SEO map keyed by page slug.
 *
 * Keep destination-specific title/meta data here so adding a new destination is
 * a one-line extension without duplicating head output logic.
 */
function ukiyo_get_destination_page_seo_overrides() {
    return [
        'viajes-a-medida-indonesia' => [
            'title' => 'Viajes a medida a Indonesia: rutas | Viajes Ukiyo',
            'meta'  => 'Diseñamos viajes a medida a Indonesia con Bali, Java, Komodo y playas remotas, adaptados a tu ritmo, intereses y forma de viajar.',
            'image' => get_template_directory_uri() . '/images/destination-mood/viajes-a-medida-ukiyo-aventurero-bali.webp',
        ],
        'viajes-a-medida-costa-rica' => [
            'title' => 'Viajes a medida a Costa Rica: naturaleza | Viajes Ukiyo',
            'meta'  => 'Creamos viajes a medida a Costa Rica con selva, volcanes, fauna y playas salvajes, diseñados con calma y conocimiento real del destino.',
            'image' => get_template_directory_uri() . '/images/costarica/viajes-costa-rica-hero.webp',
        ],
        'viajes-a-medida-colombia' => [
            'title' => 'Viajes a medida a Colombia: Caribe y café | Viajes Ukiyo',
            'meta'  => 'Diseñamos viajes a medida a Colombia entre Caribe, Andes, Eje Cafetero y cultura local, con rutas flexibles y experiencias auténticas.',
            'image' => get_template_directory_uri() . '/images/colombia/viajes-colombia-hero.webp',
        ],
        'viajes-a-medida-marruecos' => [
            'title' => 'Viajes a medida a Marruecos: ruta país completa | Viajes Ukiyo',
            'meta'  => 'Creamos viajes a medida por Marruecos con ruta multi-ciudad: Fez, Atlas, kasbahs, desierto y la costa atlántica. Diseñamos cada etapa sin prisas.',
            'image' => get_template_directory_uri() . '/images/autores/moha/viajes-a-marruecos-personalizados-erg-chebbi-hero.webp',
        ],
        'viajes-a-medida-italia' => [
            'title' => 'Viajes a medida a Italia: rutas con calma | Viajes Ukiyo',
            'meta'  => 'Diseñamos viajes a medida a Italia con Roma, Toscana, costa y gastronomía, ordenando cada etapa para viajar sin prisas ni lugares de relleno.',
            'image' => get_template_directory_uri() . '/images/italia/viajes-a-italia-personalizados-toscana.webp',
        ],
        'viajes-a-medida-lanzarote' => [
            'title' => 'Viajes a medida a Lanzarote: volcanes | Viajes Ukiyo',
            'meta'  => 'Creamos viajes a medida a Lanzarote con volcanes, playas atlánticas, arte, vino y calma insular, adaptados a tu ritmo de viaje.',
            'image' => get_template_directory_uri() . '/images/spain/lanzarote/vista-aerea-lanzarote.webp',
        ],
        'viajes-a-medida-marrakech' => [
            'title' => 'Viajes a Marrakech a medida: medina, riads y Atlas | Viajes Ukiyo',
            'meta'  => 'Viaje a Marrakech como base: riads en la medina, escapadas al Atlas y a Esauira. Diseñamos tu estancia en la ciudad roja sin rutas estándar.',
            'image' => get_template_directory_uri() . '/images/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.webp',
        ],
        'viajes-a-medida-bali' => [
            'title' => 'Viajes a Bali a medida: arroz, templos y océano | Viajes Ukiyo',
            'meta'  => 'Diseñamos viajes a Bali a medida con Ubud, el norte sin masificación, templos al amanecer y rutas privadas con guías locales.',
            'image' => get_template_directory_uri() . '/images/indonesia/bali/viajes-a-indonesia-bali-13.webp',
        ],
    ];
}

/**
 * Returns the current template filename when a page template is in use.
 */
function ukiyo_get_current_template_slug() {
    $template = '';

    if ( is_singular() ) {
        $template = get_page_template_slug( get_queried_object_id() );
    }

    if ( ! $template ) {
        $template = get_page_template();
    }

    return $template ? basename( $template ) : '';
}

/**
 * Returns the override array that matches the current request.
 */
function ukiyo_get_current_seo_override() {
    $runtime_override = apply_filters( 'ukiyo_current_seo_override', [] );

    if ( is_array( $runtime_override ) && ! empty( array_filter( $runtime_override ) ) ) {
        return $runtime_override;
    }

    $overrides = ukiyo_get_seo_overrides();

    if ( is_front_page() && isset( $overrides['front_page'] ) ) {
        return $overrides['front_page'];
    }

    if ( is_page() ) {
        $page = get_post( get_queried_object_id() );
        $destination_overrides = ukiyo_get_destination_page_seo_overrides();

        if ( $page instanceof WP_Post && function_exists( 'ukiyo_get_service_page_data' ) ) {
            $service_page = ukiyo_get_service_page_data( $page->post_name );

            if ( is_array( $service_page ) ) {
                return [
                    'title'       => $service_page['title'],
                    'description' => $service_page['description'],
                    'image'       => $service_page['image'],
                    'canonical'   => get_permalink( $page ),
                ];
            }
        }

        if ( $page instanceof WP_Post && isset( $destination_overrides[ $page->post_name ] ) ) {
            return [
                'title'       => $destination_overrides[ $page->post_name ]['title'],
                'description' => $destination_overrides[ $page->post_name ]['meta'],
                'image'       => $destination_overrides[ $page->post_name ]['image'],
            ];
        }
    }

    $template = ukiyo_get_current_template_slug();
    if ( $template && isset( $overrides[ $template ] ) ) {
        return $overrides[ $template ];
    }

    if ( is_category() ) {
        $term = get_queried_object();
        if ( $term instanceof WP_Term ) {
            return ukiyo_build_category_seo_override( $term );
        }
    }

    return [];
}

/**
 * Builds title + description for a `/blog/{slug}/` category archive.
 *
 * Uses a per-destination map so the topical hubs target the informational
 * KWs from the architecture spreadsheet without canibalizing the destination
 * landings (transactional intent).
 */
function ukiyo_build_category_seo_override( WP_Term $term ) {
    $map = [
        'costa-rica' => [
            'title' => 'Guías de viaje a Costa Rica: rutas, época y consejos | UKIYO',
            'desc'  => 'Itinerarios, mejor época, presupuesto y consejos reales para viajar a Costa Rica. Guías escritas por viajeros que conocen el país de primera mano.',
        ],
        'marruecos' => [
            'title' => 'Guías de viaje a Marruecos: rutas, desierto y medinas | UKIYO',
            'desc'  => 'Rutas por Marruecos, mejor época, itinerarios al desierto y consejos prácticos para preparar tu viaje a Marrakech, Fez o el Atlas.',
        ],
        'indonesia' => [
            'title' => 'Guías de viaje a Indonesia: Bali, Java y rutas | UKIYO',
            'desc'  => 'Itinerarios por Indonesia, mejor época, consejos para Bali, Java o Komodo. Guías reales para preparar tu viaje sin prisas.',
        ],
        'colombia' => [
            'title' => 'Guías de viaje a Colombia: rutas, café y Caribe | UKIYO',
            'desc'  => 'Rutas por Colombia, mejor época y consejos para diseñar un itinerario por el Caribe, el Eje Cafetero y los Andes con criterio.',
        ],
        'italia' => [
            'title' => 'Guías de viaje a Italia: rutas, gastronomía y cultura | UKIYO',
            'desc'  => 'Itinerarios por Italia, mejor época y consejos para Toscana, Roma, costa y pueblos con alma. Guías para preparar tu viaje sin lugares de relleno.',
        ],
        'lanzarote' => [
            'title' => 'Guías de viaje a Lanzarote: volcanes, playas y arte | UKIYO',
            'desc'  => 'Rutas por Lanzarote, mejor época, gastronomía volcánica y consejos para visitar Timanfaya, La Geria o La Graciosa con calma.',
        ],
        'consejos' => [
            'title' => 'Consejos para viajar a medida y con criterio | UKIYO',
            'desc'  => 'Consejos prácticos para preparar viajes a medida: equipaje, presupuesto, seguros, salud, fotografía y planificación con tiempo.',
        ],
    ];

    if ( isset( $map[ $term->slug ] ) ) {
        return [
            'title'       => $map[ $term->slug ]['title'],
            'description' => $map[ $term->slug ]['desc'],
            'canonical'   => get_category_link( $term ),
        ];
    }

    return [
        'title'       => sprintf( 'Guías de viaje: %s | UKIYO', $term->name ),
        'description' => sprintf( 'Guías, rutas y consejos para viajar a %s con UKIYO. Itinerarios reales escritos por viajeros.', $term->name ),
        'canonical'   => get_category_link( $term ),
    ];
}

/**
 * Returns a sanitized custom SEO meta value for standard posts.
 */
function ukiyo_get_post_seo_meta_value( $key, $post_id = 0 ) {
    $post_id = $post_id ?: get_queried_object_id();

    if ( ! $post_id || 'post' !== get_post_type( $post_id ) ) {
        return '';
    }

    return trim( wp_strip_all_tags( (string) get_post_meta( $post_id, $key, true ) ) );
}

/**
 * Returns a sanitized social/Open Graph custom field for any public singular
 * object that supports previews.
 */
function ukiyo_get_social_meta_value( $key, $post_id = 0 ) {
    $post_id = $post_id ?: get_queried_object_id();

    if ( ! $post_id || ! is_singular() ) {
        return '';
    }

    return trim( wp_strip_all_tags( (string) get_post_meta( $post_id, $key, true ) ) );
}

/**
 * Adds the site name to titles when needed.
 */
function ukiyo_format_seo_title( $title ) {
    $site_name = get_bloginfo( 'name' );

    if ( '' === trim( (string) $title ) ) {
        return $site_name;
    }

    if ( false !== mb_stripos( $title, $site_name ) ) {
        return $title;
    }

    return sprintf( '%s | %s', $title, $site_name );
}

/**
 * Builds a stable SEO title for the current request.
 */
function ukiyo_get_meta_title() {
    $override = ukiyo_get_current_seo_override();

    if ( ! empty( $override['title'] ) ) {
        return ukiyo_format_seo_title( $override['title'] );
    }

    if ( is_singular( 'post' ) ) {
        $custom_title = ukiyo_get_post_seo_meta_value( 'ukiyo_seo_title' );
        if ( '' !== $custom_title ) {
            return ukiyo_format_seo_title( $custom_title );
        }
    }

    if ( is_front_page() ) {
        return ukiyo_format_seo_title( get_bloginfo( 'description' ) ?: 'Viajes a medida auténticos y sostenibles' );
    }

    if ( is_singular() ) {
        return ukiyo_format_seo_title( single_post_title( '', false ) );
    }

    if ( is_home() ) {
        return ukiyo_format_seo_title( 'Blog de viajes a medida y guías de destino' );
    }

    if ( is_post_type_archive( 'viaje_autor' ) ) {
        return ukiyo_format_seo_title( 'Viajes de autor' );
    }

    if ( is_category() || is_tag() || is_tax() ) {
        return ukiyo_format_seo_title( single_term_title( '', false ) );
    }

    if ( is_search() ) {
        return ukiyo_format_seo_title( sprintf( 'Resultados de búsqueda para "%s"', get_search_query() ) );
    }

    return ukiyo_format_seo_title( wp_get_document_title() );
}

/**
 * Creates a meta description with a clear fallback chain.
 */
function ukiyo_get_meta_description() {
    global $post;

    $override = ukiyo_get_current_seo_override();
    if ( ! empty( $override['description'] ) ) {
        return $override['description'];
    }

    if ( is_singular( 'post' ) ) {
        $custom_description = ukiyo_get_post_seo_meta_value( 'ukiyo_meta_description' );
        if ( '' !== $custom_description ) {
            return $custom_description;
        }
    }

    if ( is_singular( 'viaje_autor' ) && $post instanceof WP_Post ) {
        $rank_math_description = trim( wp_strip_all_tags( (string) get_post_meta( $post->ID, 'rank_math_description', true ) ) );
        if ( '' !== $rank_math_description ) {
            return $rank_math_description;
        }

        if ( function_exists( 'ukiyo_get_viaje_autor_generated_meta_description' ) ) {
            return ukiyo_get_viaje_autor_generated_meta_description( $post->ID );
        }
    }

    if ( is_singular() && $post instanceof WP_Post ) {
        if ( has_excerpt( $post ) ) {
            return wp_strip_all_tags( get_the_excerpt( $post ) );
        }

        if ( 'post' === $post->post_type ) {
            $intro = ukiyo_get_post_intro( $post->ID );
            if ( '' !== $intro ) {
                return wp_trim_words( $intro, 28, '…' );
            }
        }

        if ( ! empty( $post->post_content ) ) {
            return wp_trim_words( wp_strip_all_tags( $post->post_content ), 28, '…' );
        }
    }

    if ( is_home() ) {
        return 'Guías, rutas y consejos prácticos para preparar viajes a medida con mejor época, presupuesto, itinerarios y lugares que merece la pena conocer.';
    }

    if ( is_category() || is_tag() || is_tax() ) {
        $term = get_queried_object();

        if ( $term instanceof WP_Term && 'category' === $term->taxonomy ) {
            $category_descriptions = [
                'indonesia'  => 'Guías, rutas y consejos para preparar un viaje a medida a Indonesia con Bali, Java, Komodo y experiencias auténticas.',
                'costa-rica' => 'Guías para viajar a Costa Rica con selva, volcanes, fauna, playas salvajes y rutas diseñadas con calma.',
                'colombia'   => 'Ideas y guías para viajar a Colombia entre Caribe, Andes, Eje Cafetero, cultura local y naturaleza.',
                'marruecos'  => 'Guías para preparar un viaje a Marruecos con medinas, Atlas, desierto, kasbahs y alojamientos con carácter.',
                'italia'     => 'Rutas, consejos y guías para viajar a Italia con ciudades históricas, Toscana, costa y gastronomía sin prisas.',
                'lanzarote'  => 'Guías para viajar a Lanzarote entre volcanes, playas atlánticas, arte de Manrique, vino y calma insular.',
            ];

            if ( isset( $category_descriptions[ $term->slug ] ) ) {
                return $category_descriptions[ $term->slug ];
            }
        }

        $term_description = term_description();
        if ( $term_description ) {
            return wp_strip_all_tags( $term_description );
        }
    }

    return 'Viajes personalizados y sostenibles a Costa Rica, Colombia, Indonesia y Marruecos, diseñados desde la experiencia real.';
}

/**
 * 301 redirect from legacy post URLs ("/{slug}/") to the new "/blog/{slug}/"
 * structure after the permalink migration.
 *
 * Fires only on 404 with single-segment paths that match an existing published
 * post. Pages, archives and anything already under /blog/ are not affected.
 */
function ukiyo_legacy_post_slug_redirect() {
    if ( ! is_404() || is_admin() ) {
        return;
    }

    $path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) : '';
    if ( ! $path ) {
        return;
    }

    $segments = array_values( array_filter( explode( '/', $path ) ) );
    if ( count( $segments ) !== 1 ) {
        return;
    }

    $slug = sanitize_title( $segments[0] );
    if ( ! $slug ) {
        return;
    }

    $post = get_page_by_path( $slug, OBJECT, 'post' );
    if ( ! $post instanceof WP_Post || 'publish' !== $post->post_status ) {
        return;
    }

    wp_safe_redirect( get_permalink( $post ), 301 );
    exit;
}
add_action( 'template_redirect', 'ukiyo_legacy_post_slug_redirect', 5 );

/**
 * Returns whether the current request should be excluded from the index.
 */
function ukiyo_should_noindex_current_request() {
    if ( is_search() || is_404() ) {
        return true;
    }

    // Tag/date/author/destino archives compete with the commercial destination
    // pages for the same queries; keep them out of the index. Category archives
    // serve `/blog/{cat}/` topical hubs and are indexable on purpose.
    if ( is_tag() || is_date() || is_author() || is_tax( 'destino' ) ) {
        return true;
    }

    $template = ukiyo_get_current_template_slug();
    if ( in_array( $template, [ 'page-privacidad.php', 'page-cookies.php', 'page-terminos.php' ], true ) ) {
        return true;
    }

    if ( function_exists( 'ukiyo_is_legacy_route_alias' ) && ukiyo_is_legacy_route_alias( [ 'about', 'plan_trip', 'privacy', 'terms', 'cookies', 'reviews', 'form_viaje_autor' ] ) ) {
        return true;
    }

    return false;
}

/**
 * Archive URLs have no template in this theme (index.php is intentionally
 * empty), so they would render as blank 200 pages. Redirect each archive to
 * the page that owns its topic: destination categories and `destino` terms go
 * to the matching destination page, the rest to the blog.
 */
function ukiyo_redirect_templateless_archives() {
    if ( is_admin() || is_feed() ) {
        return;
    }

    // Category archives now have their own template (category.php) and live as
    // /blog/{slug}/ topical hubs, so they must NOT be redirected.
    if ( ! ( is_tag() || is_date() || is_author() || is_tax( 'destino' ) ) ) {
        return;
    }

    $target = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'blog' ) : home_url( '/blog/' );

    $term = get_queried_object();
    if ( $term instanceof WP_Term && function_exists( 'ukiyo_get_route_url' ) ) {
        $route_key = 'destination_' . str_replace( '-', '_', $term->slug );
        $routes    = function_exists( 'ukiyo_get_route_candidates' ) ? ukiyo_get_route_candidates() : [];

        if ( isset( $routes[ $route_key ] ) ) {
            $target = ukiyo_get_route_url( $route_key );
        } elseif ( 'destino' === $term->taxonomy ) {
            $target = ukiyo_get_route_url( 'viajes_autor' );
        }
    }

    wp_safe_redirect( $target, 301 );
    exit;
}
add_action( 'template_redirect', 'ukiyo_redirect_templateless_archives' );

/**
 * Allows two posts/pages to share the same slug when they are in different
 * Polylang languages (e.g. ES "blog" + EN "blog").
 *
 * WordPress core enforces unique slugs globally and appends "-2" when it finds
 * a collision. Polylang Free does not patch this. The filter restores the
 * original slug if the only conflicting post is in a different language, since
 * the final URL is already namespaced by language (/blog/ vs /en/blog/).
 */
function ukiyo_pll_allow_cross_language_slug( $slug, $post_id, $post_status, $post_type, $post_parent, $original_slug ) {
    if ( ! function_exists( 'pll_get_post_language' ) || $slug === $original_slug ) {
        return $slug;
    }

    $current_lang = pll_get_post_language( $post_id );
    if ( ! $current_lang ) {
        return $slug;
    }

    global $wpdb;

    $blocking_ids = $wpdb->get_col( $wpdb->prepare(
        "SELECT ID FROM {$wpdb->posts}
         WHERE post_name = %s
           AND post_type = %s
           AND ID != %d
           AND post_status NOT IN ('trash','auto-draft')",
        $original_slug,
        $post_type,
        $post_id
    ) );

    if ( empty( $blocking_ids ) ) {
        return $original_slug;
    }

    foreach ( $blocking_ids as $blocking_id ) {
        $blocking_lang = pll_get_post_language( (int) $blocking_id );

        if ( ! $blocking_lang || $blocking_lang === $current_lang ) {
            return $slug;
        }
    }

    return $original_slug;
}
add_filter( 'wp_unique_post_slug', 'ukiyo_pll_allow_cross_language_slug', 10, 6 );

/**
 * Replaces the generic `blog/(.+?)` category rewrite with a specific one that
 * matches only existing category slugs.
 *
 * With `category_base = blog` AND permalink `/blog/%postname%/`, the default
 * category rule swallows every URL under /blog/ and posts 404. Limiting the
 * regex to the actual category slugs lets post URLs fall through correctly.
 * Rules are cached in wp_options#rewrite_rules until the user edits a
 * category; the cache hook below handles that.
 */
function ukiyo_category_rewrite_rules_specific( $rules ) {
    $cats = get_categories( [ 'hide_empty' => false, 'fields' => 'slugs' ] );

    if ( empty( $cats ) ) {
        return $rules;
    }

    $pattern = implode( '|', array_map( 'preg_quote', $cats ) );

    $kept = [];
    foreach ( $rules as $match => $query ) {
        $is_generic_category = (
            ( false !== strpos( $match, 'blog/(.+?)' ) || false !== strpos( $match, 'blog/(.+)' ) )
            && false !== strpos( $query, 'category_name' )
        );

        if ( ! $is_generic_category ) {
            $kept[ $match ] = $query;
        }
    }

    $kept[ "blog/({$pattern})/?$" ]                                = 'index.php?category_name=$matches[1]';
    $kept[ "blog/({$pattern})/page/?([0-9]{1,})/?$" ]              = 'index.php?category_name=$matches[1]&paged=$matches[2]';
    $kept[ "blog/({$pattern})/feed/(feed|rdf|rss|rss2|atom)/?$" ]  = 'index.php?category_name=$matches[1]&feed=$matches[2]';

    return $kept;
}
add_filter( 'category_rewrite_rules', 'ukiyo_category_rewrite_rules_specific' );

/**
 * Invalidates the rewrite-rules cache whenever a category is created, edited or
 * removed, so the specific regex above always lists the current slugs.
 */
function ukiyo_flush_rewrites_on_category_change() {
    flush_rewrite_rules( false );
}
add_action( 'created_category', 'ukiyo_flush_rewrites_on_category_change' );
add_action( 'edited_category',  'ukiyo_flush_rewrites_on_category_change' );
add_action( 'delete_category',  'ukiyo_flush_rewrites_on_category_change' );

/**
 * Returns the best canonical URL available for the current request.
 */
function ukiyo_get_canonical_url() {
    $override = ukiyo_get_current_seo_override();

    if ( ! empty( $override['canonical'] ) ) {
        return esc_url_raw( $override['canonical'] );
    }

    $paged = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );

    if ( $paged > 1 ) {
        return get_pagenum_link( $paged );
    }

    if ( is_front_page() ) {
        if ( function_exists( 'pll_home_url' ) ) {
            return pll_home_url();
        }

        return home_url( '/' );
    }

    if ( is_home() && get_option( 'page_for_posts' ) ) {
        return get_permalink( (int) get_option( 'page_for_posts' ) );
    }

    if ( is_singular() ) {
        return get_permalink( get_queried_object_id() );
    }

    if ( is_post_type_archive() ) {
        return get_post_type_archive_link( get_query_var( 'post_type' ) );
    }

    if ( is_category() || is_tag() || is_tax() ) {
        return get_term_link( get_queried_object() );
    }

    if ( is_search() ) {
        return get_search_link();
    }

    if ( is_author() ) {
        return get_author_posts_url( (int) get_query_var( 'author' ) );
    }

    if ( is_date() ) {
        return get_pagenum_link( 1 );
    }

    return home_url( add_query_arg( [], $GLOBALS['wp']->request ?? '' ) );
}

/**
 * Returns a representative image for OG/Twitter cards.
 */
function ukiyo_get_seo_image_url() {
    $override = ukiyo_get_current_seo_override();

    if ( ! empty( $override['image'] ) ) {
        return $override['image'];
    }

    if ( is_singular() && has_post_thumbnail( get_queried_object_id() ) ) {
        $image = wp_get_attachment_image_url( get_post_thumbnail_id( get_queried_object_id() ), 'full' );
        if ( $image ) {
            return $image;
        }
    }

    return get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-costaricatucan.webp';
}

/**
 * Returns normalized social image data for OG/Twitter cards.
 */
function ukiyo_get_seo_image_data() {
    $override = ukiyo_get_current_seo_override();

    if ( ! empty( $override['image'] ) ) {
        return [
            'url'    => (string) $override['image'],
            'width'  => ! empty( $override['image_width'] ) ? (int) $override['image_width'] : 0,
            'height' => ! empty( $override['image_height'] ) ? (int) $override['image_height'] : 0,
            'type'   => ! empty( $override['image_type'] ) ? (string) $override['image_type'] : '',
        ];
    }

    if ( is_singular() && has_post_thumbnail( get_queried_object_id() ) ) {
        $thumbnail_id  = get_post_thumbnail_id( get_queried_object_id() );
        $thumbnail_src = $thumbnail_id ? wp_get_attachment_image_src( $thumbnail_id, 'full' ) : false;

        if ( $thumbnail_src ) {
            return [
                'url'    => (string) $thumbnail_src[0],
                'width'  => ! empty( $thumbnail_src[1] ) ? (int) $thumbnail_src[1] : 0,
                'height' => ! empty( $thumbnail_src[2] ) ? (int) $thumbnail_src[2] : 0,
                'type'   => $thumbnail_id ? (string) get_post_mime_type( $thumbnail_id ) : '',
            ];
        }
    }

    return [
        'url'    => get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-costaricatucan.webp',
        'width'  => 0,
        'height' => 0,
        'type'   => 'image/jpeg',
    ];
}

/**
 * Returns custom OG image data from the editable fields when present.
 */
function ukiyo_get_custom_og_image_data( $post_id = 0 ) {
    $post_id = $post_id ?: get_queried_object_id();

    if ( ! $post_id || ! is_singular() ) {
        return [];
    }

    $image_id  = absint( get_post_meta( $post_id, 'ukiyo_og_image_id', true ) );
    $image_id  = $image_id ?: absint( get_post_meta( $post_id, 'og_image_id', true ) );
    $image_url = '';
    $width     = 0;
    $height    = 0;
    $type      = '';

    if ( $image_id ) {
        $image_src = wp_get_attachment_image_src( $image_id, 'full' );
        if ( $image_src ) {
            $image_url = (string) $image_src[0];
            $width     = ! empty( $image_src[1] ) ? (int) $image_src[1] : 0;
            $height    = ! empty( $image_src[2] ) ? (int) $image_src[2] : 0;
            $type      = (string) get_post_mime_type( $image_id );
        }
    }

    if ( ! $image_url ) {
        $manual_url = esc_url_raw( (string) get_post_meta( $post_id, 'ukiyo_og_image', true ) );
        $manual_url = $manual_url ?: esc_url_raw( (string) get_post_meta( $post_id, 'og_image', true ) );
        if ( $manual_url ) {
            $image_url = $manual_url;
        }
    }

    if ( ! $image_url ) {
        return [];
    }

    return [
        'url'    => $image_url,
        'width'  => $width,
        'height' => $height,
        'type'   => $type,
    ];
}

/**
 * Central Open Graph/Twitter Card data helper.
 *
 * Priority:
 * 1. Custom OG fields from the edit screen.
 * 2. Existing SEO title/meta logic.
 * 3. Featured image/template image/default image.
 */
function ukiyo_get_og_data() {
    $title       = ukiyo_get_meta_title();
    $description = ukiyo_get_meta_description();
    $image_data  = ukiyo_get_seo_image_data();
    $canonical   = ukiyo_get_canonical_url();

    if ( is_singular() ) {
        $post_id = get_queried_object_id();

        $custom_title = ukiyo_get_social_meta_value( 'ukiyo_og_title', $post_id );
        $custom_title = $custom_title ?: ukiyo_get_social_meta_value( 'og_title', $post_id );
        if ( '' !== $custom_title ) {
            $title = $custom_title;
        }

        $custom_description = ukiyo_get_social_meta_value( 'ukiyo_og_description', $post_id );
        $custom_description = $custom_description ?: ukiyo_get_social_meta_value( 'og_description', $post_id );
        if ( '' !== $custom_description ) {
            $description = $custom_description;
        }

        $custom_image_data = ukiyo_get_custom_og_image_data( $post_id );
        if ( ! empty( $custom_image_data['url'] ) ) {
            $image_data = $custom_image_data;
        }
    }

    return [
        'title'       => $title,
        'description' => $description,
        'image'       => ! empty( $image_data['url'] ) ? $image_data['url'] : ukiyo_get_seo_image_url(),
        'image_data'  => $image_data,
        'image_alt'   => $title,
        'url'         => $canonical,
        'type'        => ukiyo_get_social_og_type(),
        'site_name'   => 'UKIYO',
    ];
}

/**
 * Filters the document title while preserving WordPress title-tag support.
 */
function ukiyo_filter_document_title( $title ) {
    if ( ukiyo_has_active_seo_plugin() ) {
        return $title;
    }

    return ukiyo_get_meta_title();
}
add_filter( 'pre_get_document_title', 'ukiyo_filter_document_title' );

/**
 * Outputs base SEO metadata, canonical and social tags.
 */
function ukiyo_output_head_meta() {
    if ( ukiyo_has_active_seo_plugin() ) {
        return;
    }

    $title        = ukiyo_get_meta_title();
    $description  = ukiyo_get_meta_description();
    $canonical    = ukiyo_get_canonical_url();
    $og_data      = ukiyo_get_og_data();
    $image_data   = $og_data['image_data'];
    $image        = $og_data['image'];

    echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<link rel="canonical" href="' . esc_url( $canonical ) . '">' . "\n";

    if ( ukiyo_should_noindex_current_request() ) {
        echo '<meta name="robots" content="noindex,follow">' . "\n";
    }

    echo '<meta property="og:locale" content="' . esc_attr( str_replace( '-', '_', get_locale() ) ) . '">' . "\n";
    echo '<meta property="og:type" content="' . esc_attr( $og_data['type'] ) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $og_data['title'] ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $og_data['description'] ) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $og_data['url'] ) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr( $og_data['site_name'] ) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
    echo '<meta property="og:image:secure_url" content="' . esc_url( set_url_scheme( $image, 'https' ) ) . '">' . "\n";
    if ( ! empty( $image_data['type'] ) ) {
        echo '<meta property="og:image:type" content="' . esc_attr( $image_data['type'] ) . '">' . "\n";
    }
    if ( ! empty( $image_data['width'] ) ) {
        echo '<meta property="og:image:width" content="' . esc_attr( (string) $image_data['width'] ) . '">' . "\n";
    }
    if ( ! empty( $image_data['height'] ) ) {
        echo '<meta property="og:image:height" content="' . esc_attr( (string) $image_data['height'] ) . '">' . "\n";
    }
    echo '<meta property="og:image:alt" content="' . esc_attr( $og_data['image_alt'] ) . '">' . "\n";

    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr( $og_data['title'] ) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr( $og_data['description'] ) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url( $image ) . '">' . "\n";
    echo '<meta name="twitter:image:alt" content="' . esc_attr( $og_data['image_alt'] ) . '">' . "\n";

    if ( 'article' === $og_data['type'] && is_singular() ) {
        echo '<meta property="article:published_time" content="' . esc_attr( get_the_date( DATE_W3C, get_queried_object_id() ) ) . '">' . "\n";
        echo '<meta property="article:modified_time" content="' . esc_attr( get_the_modified_date( DATE_W3C, get_queried_object_id() ) ) . '">' . "\n";
    }
}
add_action( 'wp_head', 'ukiyo_output_head_meta', 5 );

/**
 * Outputs the x-default hreflang link.
 *
 * Polylang already emits per-language <link rel="alternate" hreflang>, but it
 * doesn't include x-default. We add only that one to avoid duplicates while
 * still telling Google the Spanish version is the fallback for unmatched
 * locales.
 */
function ukiyo_output_hreflang_tags() {
    if ( ! function_exists( 'pll_home_url' ) ) {
        return;
    }

    $default_slug = defined( 'PLL_DEFAULT_LANG' ) ? PLL_DEFAULT_LANG : 'es';
    $default_url  = pll_home_url( $default_slug );

    if ( ! $default_url ) {
        return;
    }

    printf(
        '<link rel="alternate" hreflang="x-default" href="%s">' . "\n",
        esc_url( $default_url )
    );
}
add_action( 'wp_head', 'ukiyo_output_hreflang_tags', 6 );

/**
 * Returns the Open Graph type used by the theme fallback SEO layer.
 */
function ukiyo_get_social_og_type() {
    return ( is_singular( 'post' ) || is_singular( 'viaje_autor' ) ) ? 'article' : 'website';
}

/**
 * Returns a stable JSON-LD node id.
 */
function ukiyo_schema_id( $fragment, $url = '' ) {
    $base = $url ? $url : home_url( '/' );

    return trailingslashit( $base ) . '#' . ltrim( (string) $fragment, '#' );
}

/**
 * Returns image data for schema from the same source used by OG/Twitter tags.
 */
function ukiyo_get_schema_image_data() {
    $image_data = ukiyo_get_seo_image_data();
    $image_url  = ! empty( $image_data['url'] ) ? $image_data['url'] : ukiyo_get_seo_image_url();

    return [
        '@type'  => 'ImageObject',
        '@id'    => ukiyo_schema_id( 'primaryimage', ukiyo_get_canonical_url() ),
        'url'    => $image_url,
        'width'  => ! empty( $image_data['width'] ) ? (int) $image_data['width'] : null,
        'height' => ! empty( $image_data['height'] ) ? (int) $image_data['height'] : null,
        'caption' => ukiyo_get_meta_title(),
    ];
}

/**
 * Destination data used by TouristDestination and Service nodes.
 */
function ukiyo_get_schema_destination_map() {
    $theme_uri = get_template_directory_uri();

    return [
        'destination_indonesia' => [
            'template'    => 'page-indonesia.php',
            'name'        => 'Indonesia',
            'country'     => 'Indonesia',
            'url'         => ukiyo_get_route_url( 'destination_indonesia' ),
            'image'       => $theme_uri . '/images/destination-mood/viajes-a-medida-ukiyo-aventurero-bali.webp',
            'description' => 'Indonesia como destino de viaje a medida: Bali, Java, Komodo, templos, arrozales, volcanes, cultura local e islas con rutas diseñadas sin prisas.',
        ],
        'destination_costa_rica' => [
            'template'    => 'page-costarica.php',
            'name'        => 'Costa Rica',
            'country'     => 'Costa Rica',
            'url'         => ukiyo_get_route_url( 'destination_costa_rica' ),
            'image'       => $theme_uri . '/images/costarica/viajes-costa-rica-hero.webp',
            'description' => 'Costa Rica como destino de naturaleza a medida: volcanes, bosque nuboso, selva, fauna, playas salvajes y rutas equilibradas entre Caribe y Pacífico.',
        ],
        'destination_colombia' => [
            'template'    => 'page-colombia.php',
            'name'        => 'Colombia',
            'country'     => 'Colombia',
            'url'         => ukiyo_get_route_url( 'destination_colombia' ),
            'image'       => $theme_uri . '/images/colombia/viajes-colombia-hero.webp',
            'description' => 'Colombia como destino de viaje personalizado: Caribe, Andes, Eje Cafetero, cultura local, pueblos coloniales y naturaleza con logística cuidada.',
        ],
        'destination_marruecos' => [
            'template'    => 'page-marruecos.php',
            'name'        => 'Marruecos',
            'country'     => 'Marruecos',
            'url'         => ukiyo_get_route_url( 'destination_marruecos' ),
            'image'       => $theme_uri . '/images/autores/moha/viajes-a-marruecos-personalizados-erg-chebbi-hero.webp',
            'description' => 'Marruecos como destino de viaje privado: Marrakech, medinas, Atlas, kasbahs, desierto del Sahara, pueblos bereberes y alojamientos con carácter.',
        ],
        'destination_italia' => [
            'template'    => 'page-italia.php',
            'name'        => 'Italia',
            'country'     => 'Italia',
            'url'         => ukiyo_get_route_url( 'destination_italia' ),
            'image'       => $theme_uri . '/images/italia/viajes-a-italia-personalizados-toscana.webp',
            'description' => 'Italia como destino de viaje a medida: Roma, Toscana, Florencia, Venecia, costa, gastronomía, pueblos con alma y rutas diseñadas con criterio.',
        ],
        'destination_lanzarote' => [
            'template'    => 'page-lanzarote.php',
            'name'        => 'Lanzarote',
            'country'     => 'España',
            'url'         => ukiyo_get_route_url( 'destination_lanzarote' ),
            'image'       => $theme_uri . '/images/spain/lanzarote/vista-aerea-lanzarote.webp',
            'description' => 'Lanzarote como destino de viaje a medida en España: volcanes, playas atlánticas, arte de César Manrique, vino, pueblos blancos y calma insular.',
        ],
        'destination_marrakech' => [
            'template'    => 'page-marrakech.php',
            'name'        => 'Marrakech',
            'country'     => 'Marruecos',
            'url'         => ukiyo_get_route_url( 'destination_marrakech' ),
            'image'       => $theme_uri . '/images/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.webp',
            'description' => 'Marrakech como base del viaje a medida a Marruecos: medina viva, riads con patio, rutas al Atlas, Esauira y el desierto del Sahara.',
        ],
        'destination_bali' => [
            'template'    => 'page-bali.php',
            'name'        => 'Bali',
            'country'     => 'Indonesia',
            'url'         => ukiyo_get_route_url( 'destination_bali' ),
            'image'       => $theme_uri . '/images/indonesia/bali/viajes-a-indonesia-bali-13.webp',
            'description' => 'Bali como destino de viaje a medida en Indonesia: arrozales de Ubud, templos hindúes, norte sin masificación y rutas con guías locales.',
        ],
    ];
}

/**
 * Returns current destination schema data when the request is destination-led.
 */
function ukiyo_get_current_schema_destination() {
    $template = ukiyo_get_current_template_slug();

    foreach ( ukiyo_get_schema_destination_map() as $key => $destination ) {
        if ( $template && $template === $destination['template'] ) {
            $destination['key'] = $key;
            return $destination;
        }
    }

    if ( is_singular( 'post' ) && function_exists( 'ukiyo_get_post_related_destination_keys' ) ) {
        $keys = ukiyo_get_post_related_destination_keys( get_queried_object_id() );
        $map  = ukiyo_get_schema_destination_map();
        $key  = ! empty( $keys[0] ) ? $keys[0] : '';

        if ( isset( $map[ $key ] ) ) {
            $map[ $key ]['key'] = $key;
            return $map[ $key ];
        }
    }

    return null;
}

/**
 * Detects travel-service pages/posts where Service schema adds context.
 */
function ukiyo_should_add_travel_service_schema() {
    $template = ukiyo_get_current_template_slug();
    $destination_templates = wp_list_pluck( ukiyo_get_schema_destination_map(), 'template' );

    if ( $template && in_array( $template, $destination_templates, true ) ) {
        return true;
    }

    if ( is_singular( 'post' ) ) {
        $post_id = get_queried_object_id();
        $text    = sanitize_title( get_the_title( $post_id ) . ' ' . get_post_field( 'post_name', $post_id ) );

        return (bool) preg_match( '/(ruta|itinerario|viajar|viaje|cuanto-cuesta|presupuesto|dias)/', $text );
    }

    if ( is_singular( 'viaje_autor' ) ) {
        return true;
    }

    return is_page_template( [ 'page-planifica-tu-viaje.php', 'page-pricing.php', 'page-viajesautor.php' ] );
}

/**
 * Returns the base JSON-LD graph. Templates can extend it via filter later.
 */
function ukiyo_get_base_schema_graph() {
    $site_url    = home_url( '/' );
    $logo_id     = get_theme_mod( 'custom_logo' );
    $logo_url    = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : get_template_directory_uri() . '/images/logo/logoukiyo.png';
    $canonical   = ukiyo_get_canonical_url();
    $title       = ukiyo_get_meta_title();
    $description = ukiyo_get_meta_description();
    $image       = ukiyo_get_schema_image_data();
    $agency_id   = ukiyo_schema_id( 'organization' );
    $website_id  = ukiyo_schema_id( 'website' );
    $webpage_id  = ukiyo_schema_id( 'webpage', $canonical );

    $graph = [
        [
            '@type'       => 'TravelAgency',
            '@id'         => $agency_id,
            'name'        => 'Viajes Ukiyo',
            'alternateName' => [ 'UKIYO', 'Ukiyo Viajes' ],
            'url'         => $site_url,
            'logo'        => [
                '@type' => 'ImageObject',
                '@id'   => ukiyo_schema_id( 'logo' ),
                'url'   => $logo_url,
            ],
            'image'       => [
                '@id' => ukiyo_schema_id( 'logo' ),
            ],
            'email'       => 'info@viajesukiyo.com',
            'telephone'   => '+34 635 300 441',
            'description' => 'Viajes Ukiyo es una agencia de viajes a medida que diseña rutas personalizadas desde cero para viajeros que buscan experiencias auténticas, ritmo natural y destinos conocidos desde dentro, lejos del turismo masivo.',
            'slogan'      => 'Viajes a medida para quienes buscan algo más.',
            'foundingLocation' => [
                '@type' => 'Place',
                'name'  => 'España',
            ],
            'areaServed'  => [
                [ '@type' => 'Country', 'name' => 'Indonesia' ],
                [ '@type' => 'Country', 'name' => 'Costa Rica' ],
                [ '@type' => 'Country', 'name' => 'Colombia' ],
                [ '@type' => 'Country', 'name' => 'Marruecos' ],
                [ '@type' => 'Country', 'name' => 'Italia' ],
                [ '@type' => 'Country', 'name' => 'España' ],
            ],
            'contactPoint' => [
                [
                    '@type'       => 'ContactPoint',
                    'contactType' => 'customer service',
                    'email'       => 'info@viajesukiyo.com',
                    'telephone'   => '+34 635 300 441',
                    'availableLanguage' => [ 'es' ],
                    'areaServed'  => [ 'ES' ],
                ],
            ],
            'sameAs'      => apply_filters(
                'ukiyo_schema_same_as',
                [
                    'https://instagram.com/viajes.ukiyo',
                ]
            ),
            'knowsAbout'  => [
                'viajes a medida',
                'viajes personalizados',
                'rutas privadas',
                'turismo responsable',
                'Indonesia',
                'Costa Rica',
                'Colombia',
                'Marruecos',
                'Italia',
                'Lanzarote',
            ],
            'makesOffer'  => [
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type'       => 'Service',
                        '@id'         => ukiyo_schema_id( 'travel-design-service' ),
                        'name'        => 'Diseño de viajes a medida',
                        'serviceType' => 'Planificación y diseño de viajes personalizados',
                        'provider'    => [ '@id' => $agency_id ],
                    ],
                ],
            ],
        ],
        [
            '@type'       => 'WebSite',
            '@id'         => $website_id,
            'url'         => $site_url,
            'name'        => 'Viajes Ukiyo',
            'alternateName' => 'UKIYO',
            'description' => get_bloginfo( 'description' ) ?: $description,
            'inLanguage'  => 'es',
            'publisher'   => [
                '@id' => $agency_id,
            ],
            'about'       => [
                '@id' => $agency_id,
            ],
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => home_url( '/?s={search_term_string}' ),
                'query-input' => 'required name=search_term_string',
            ],
        ],
        [
            '@type'       => 'WebPage',
            '@id'         => $webpage_id,
            'url'         => $canonical,
            'name'        => $title,
            'description' => $description,
            'inLanguage'  => 'es',
            'isPartOf'    => [
                '@id' => $website_id,
            ],
            'about'       => [
                '@id' => $agency_id,
            ],
            'publisher'   => [
                '@id' => $agency_id,
            ],
            'primaryImageOfPage' => [
                '@id' => $image['@id'],
            ],
        ],
        array_filter( $image ),
    ];

    $destination = ukiyo_get_current_schema_destination();
    if ( $destination && ! is_singular( 'post' ) ) {
        $destination_id = ukiyo_schema_id( 'tourist-destination', $destination['url'] );
        $graph[] = [
            '@type'       => 'TouristDestination',
            '@id'         => $destination_id,
            'name'        => $destination['name'],
            'url'         => $destination['url'],
            'description' => $destination['description'],
            'image'       => [
                '@type' => 'ImageObject',
                'url'   => $destination['image'],
            ],
            'touristType' => [
                'viajeros que buscan viajes a medida',
                'viajeros interesados en cultura local',
                'viajeros de naturaleza y experiencias auténticas',
            ],
            'containedInPlace' => [
                '@type' => 'Country',
                'name'  => $destination['country'],
            ],
        ];

        $graph[2]['mainEntity'] = [
            '@id' => $destination_id,
        ];
    }

    if ( ukiyo_should_add_travel_service_schema() ) {
        $service_destination = $destination;
        $service_name        = is_singular() ? wp_strip_all_tags( get_the_title( get_queried_object_id() ) ) : 'Diseño de viajes a medida';
        $service_description = $description;

        if ( $service_destination ) {
            $service_name = false === stripos( $service_name, $service_destination['name'] )
                ? 'Viaje a medida a ' . $service_destination['name']
                : $service_name;
        }

        $graph[] = [
            '@type'       => 'Service',
            '@id'         => ukiyo_schema_id( 'service', $canonical ),
            'name'        => $service_name,
            'serviceType' => 'Viaje a medida personalizado',
            'description' => $service_description,
            'provider'    => [
                '@id' => $agency_id,
            ],
            'areaServed'  => $service_destination
                ? [ '@type' => 'Country', 'name' => $service_destination['country'] ]
                : [ '@type' => 'Country', 'name' => 'España' ],
            'audience'    => [
                '@type' => 'Audience',
                'audienceType' => 'Viajeros que buscan viajes personalizados y experiencias auténticas',
            ],
            'url'         => $canonical,
        ];
    }

    if ( is_singular( 'post' ) ) {
        $post_id     = get_queried_object_id();
        $author_id   = (int) get_post_field( 'post_author', $post_id );
        $categories  = get_the_category( $post_id );
        $tags        = get_the_tags( $post_id );
        $word_count  = str_word_count( wp_strip_all_tags( (string) get_post_field( 'post_content', $post_id ) ) );
        $article     = [
            '@type'            => 'BlogPosting',
            '@id'              => trailingslashit( $canonical ) . '#article',
            'headline'         => wp_strip_all_tags( get_the_title( $post_id ) ),
            'description'      => $description,
            'datePublished'    => get_the_date( DATE_W3C, $post_id ),
            'dateModified'     => get_the_modified_date( DATE_W3C, $post_id ),
            'mainEntityOfPage' => [
                '@id' => $webpage_id,
            ],
            'author'           => [
                '@type' => 'Person',
                'name'  => $author_id ? get_the_author_meta( 'display_name', $author_id ) : get_bloginfo( 'name' ),
            ],
            'publisher'        => [
                '@id' => $agency_id,
            ],
            'image'            => [
                '@id' => $image['@id'],
            ],
        ];

        if ( ! empty( $categories ) ) {
            $article['articleSection'] = $categories[0]->name;
        }

        if ( ! empty( $tags ) ) {
            $article['keywords'] = implode(
                ', ',
                array_map(
                    static function ( $tag ) {
                        return $tag->name;
                    },
                    $tags
                )
            );
        } elseif ( $primary_keyword = ukiyo_get_post_seo_meta_value( 'ukiyo_primary_keyword', $post_id ) ) {
            $article['keywords'] = $primary_keyword;
        }

        if ( $word_count > 0 ) {
            $article['wordCount'] = $word_count;
        }

        $graph[] = $article;
    }

    return apply_filters( 'ukiyo_json_ld_graph', $graph );
}

/**
 * Prints the JSON-LD graph in the document head.
 */
function ukiyo_output_schema_graph() {
    if ( ukiyo_has_active_seo_plugin() ) {
        return;
    }

    $graph = array_values( array_filter( ukiyo_get_base_schema_graph() ) );

    if ( empty( $graph ) ) {
        return;
    }

    $payload = [
        '@context' => 'https://schema.org',
        '@graph'   => $graph,
    ];

    echo '<script type="application/ld+json">' . wp_json_encode( $payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'ukiyo_output_schema_graph', 20 );
