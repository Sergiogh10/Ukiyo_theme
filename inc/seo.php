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
            'title'       => 'Viajes a medida a Costa Rica, Colombia, Indonesia y Marruecos | UKIYO',
            'description' => 'Agencia de viajes personalizados a Costa Rica, Colombia, Indonesia y Marruecos. Diseñamos rutas auténticas, sostenibles y lejos del turismo masivo.',
            'image'       => get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-costaricatucan.jpg',
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
            'title'       => 'Viajes de autor en grupos reducidos con expertos | UKIYO',
            'description' => 'Descubre viajes de autor en grupos reducidos con expertos y autores que conocen el destino desde dentro. Salidas con alma, mirada propia y plazas limitadas.',
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
            'image' => get_template_directory_uri() . '/images/destination-mood/viajes-a-medida-ukiyo-aventurero-bali.jpg',
        ],
        'viajes-a-medida-costa-rica' => [
            'title' => 'Viajes a medida a Costa Rica: naturaleza | Viajes Ukiyo',
            'meta'  => 'Creamos viajes a medida a Costa Rica con selva, volcanes, fauna y playas salvajes, diseñados con calma y conocimiento real del destino.',
            'image' => get_template_directory_uri() . '/images/costarica/viajes-costa-rica-hero.jpg',
        ],
        'viajes-a-medida-colombia' => [
            'title' => 'Viajes a medida a Colombia: Caribe y café | Viajes Ukiyo',
            'meta'  => 'Diseñamos viajes a medida a Colombia entre Caribe, Andes, Eje Cafetero y cultura local, con rutas flexibles y experiencias auténticas.',
            'image' => get_template_directory_uri() . '/images/colombia/viajes-colombia-hero.jpg',
        ],
        'viajes-a-medida-marruecos' => [
            'title' => 'Viajes a medida a Marruecos: desierto | Viajes Ukiyo',
            'meta'  => 'Creamos viajes a medida a Marruecos con medinas, Atlas, desierto y alojamientos con carácter, lejos del viaje estándar y sin prisas.',
            'image' => get_template_directory_uri() . '/images/autores/moha/viajes-a-marruecos-personalizados-erg-chebbi-hero.jpg',
        ],
        'viajes-a-medida-italia' => [
            'title' => 'Viajes a medida a Italia: rutas con calma | Viajes Ukiyo',
            'meta'  => 'Diseñamos viajes a medida a Italia con Roma, Toscana, costa y gastronomía, ordenando cada etapa para viajar sin prisas ni lugares de relleno.',
            'image' => get_template_directory_uri() . '/images/italia/viajes-a-italia-personalizados-toscana.jpg',
        ],
        'viajes-a-medida-lanzarote' => [
            'title' => 'Viajes a medida a Lanzarote: volcanes | Viajes Ukiyo',
            'meta'  => 'Creamos viajes a medida a Lanzarote con volcanes, playas atlánticas, arte, vino y calma insular, adaptados a tu ritmo de viaje.',
            'image' => get_template_directory_uri() . '/images/spain/lanzarote/vista-aerea-lanzarote.webp',
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

    return [];
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
        return ukiyo_format_seo_title( 'Blog de viajes auténticos' );
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
        return 'Historias, consejos y rutas para viajar de forma más auténtica, consciente y personalizada.';
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
 * Returns whether the current request should be excluded from the index.
 */
function ukiyo_should_noindex_current_request() {
    if ( is_search() || is_404() ) {
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

    return get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-costaricatucan.jpg';
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
        'url'    => get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-costaricatucan.jpg',
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
 * Completes social metadata generated by SEO plugins when they omit images or
 * classify archive pages as articles.
 */
function ukiyo_get_social_og_type() {
    return ( is_singular( 'post' ) || is_singular( 'viaje_autor' ) ) ? 'article' : 'website';
}

function ukiyo_filter_plugin_og_type( $type ) {
    $og_data = ukiyo_get_og_data();

    return ! empty( $og_data['type'] ) ? $og_data['type'] : $type;
}
add_filter( 'wpseo_opengraph_type', 'ukiyo_filter_plugin_og_type', 20 );
add_filter( 'rank_math/opengraph/facebook/og_type', 'ukiyo_filter_plugin_og_type', 20 );

/**
 * Fills the standard meta description when an SEO plugin is active but its
 * field is empty. This avoids duplicate tags while keeping our centralized
 * fallback chain for posts, destination pages, blog and taxonomy archives.
 */
function ukiyo_filter_plugin_meta_description( $description ) {
    $generated = ukiyo_get_meta_description();

    return $generated ?: $description;
}
add_filter( 'wpseo_metadesc', 'ukiyo_filter_plugin_meta_description', 20 );
add_filter( 'rank_math/frontend/description', 'ukiyo_filter_plugin_meta_description', 20 );
add_filter( 'aioseo_description', 'ukiyo_filter_plugin_meta_description', 20 );

function ukiyo_filter_plugin_social_title( $title ) {
    $og_data = ukiyo_get_og_data();
    $generated = ! empty( $og_data['title'] ) ? $og_data['title'] : '';

    return $generated ?: $title;
}
add_filter( 'wpseo_opengraph_title', 'ukiyo_filter_plugin_social_title', 20 );
add_filter( 'wpseo_twitter_title', 'ukiyo_filter_plugin_social_title', 20 );
add_filter( 'rank_math/opengraph/facebook/title', 'ukiyo_filter_plugin_social_title', 20 );
add_filter( 'rank_math/opengraph/twitter/title', 'ukiyo_filter_plugin_social_title', 20 );

function ukiyo_filter_plugin_social_description( $description ) {
    $og_data = ukiyo_get_og_data();
    $generated = ! empty( $og_data['description'] ) ? $og_data['description'] : '';

    return $generated ?: $description;
}
add_filter( 'wpseo_opengraph_desc', 'ukiyo_filter_plugin_social_description', 20 );
add_filter( 'wpseo_twitter_description', 'ukiyo_filter_plugin_social_description', 20 );
add_filter( 'rank_math/opengraph/facebook/description', 'ukiyo_filter_plugin_social_description', 20 );
add_filter( 'rank_math/opengraph/twitter/description', 'ukiyo_filter_plugin_social_description', 20 );

function ukiyo_filter_plugin_social_image( $image ) {
    $og_data = ukiyo_get_og_data();

    return ! empty( $og_data['image'] ) ? $og_data['image'] : $image;
}
add_filter( 'wpseo_opengraph_image', 'ukiyo_filter_plugin_social_image', 20 );
add_filter( 'wpseo_twitter_image', 'ukiyo_filter_plugin_social_image', 20 );
add_filter( 'rank_math/opengraph/facebook/image', 'ukiyo_filter_plugin_social_image', 20 );
add_filter( 'rank_math/opengraph/twitter/image', 'ukiyo_filter_plugin_social_image', 20 );

function ukiyo_filter_plugin_social_url( $url ) {
    $og_data = ukiyo_get_og_data();
    $canonical = ! empty( $og_data['url'] ) ? $og_data['url'] : '';

    return $canonical ?: $url;
}
add_filter( 'wpseo_opengraph_url', 'ukiyo_filter_plugin_social_url', 20 );
add_filter( 'rank_math/opengraph/facebook/og_url', 'ukiyo_filter_plugin_social_url', 20 );

function ukiyo_filter_plugin_social_site_name( $site_name ) {
    $og_data = ukiyo_get_og_data();

    return ! empty( $og_data['site_name'] ) ? $og_data['site_name'] : $site_name;
}
add_filter( 'wpseo_opengraph_site_name', 'ukiyo_filter_plugin_social_site_name', 20 );
add_filter( 'rank_math/opengraph/facebook/og_site_name', 'ukiyo_filter_plugin_social_site_name', 20 );

/**
 * Disables plugin-rendered JSON-LD when the theme outputs the canonical graph.
 *
 * Metadata can still be handled by Yoast/RankMath/AIOSEO. We only take over
 * structured data to keep one strong TravelAgency entity and avoid duplicates.
 */
add_filter( 'wpseo_json_ld_output', '__return_false', 99 );
add_filter( 'rank_math/json_ld', '__return_empty_array', 99 );
add_filter( 'aioseo_schema_disable', '__return_true', 99 );

/**
 * Prevents redirected legacy/CPT archive URLs from being listed in XML sitemaps.
 *
 * The viaje_autor archive used to live at /viajes/, but that public URL now
 * redirects to the curated /viajes-de-autor/ landing. Sitemaps must only expose
 * final 200 URLs, so the post type archive is excluded while individual
 * viaje_autor posts remain indexable under /viajes/{slug}/.
 */
function ukiyo_exclude_redirected_post_type_archives_from_sitemap( $archive_link, $post_type = '' ) {
    if ( 'viaje_autor' !== $post_type ) {
        return $archive_link;
    }

    return false;
}
add_filter( 'wpseo_sitemap_post_type_archive_link', 'ukiyo_exclude_redirected_post_type_archives_from_sitemap', 20, 2 );
add_filter( 'rank_math/sitemap/post_type_archive_link', 'ukiyo_exclude_redirected_post_type_archives_from_sitemap', 20, 2 );

function ukiyo_should_exclude_sitemap_loc( $loc ) {
    if ( ! $loc ) {
        return false;
    }

    $path = trim( (string) wp_parse_url( $loc, PHP_URL_PATH ), '/' );

    return in_array(
        $path,
        [
            'viajes',
            'category/consejos',
        ],
        true
    );
}

function ukiyo_filter_non_indexable_sitemap_entry( $url, $type = '', $object = null ) {
    $loc = '';

    if ( is_array( $url ) && ! empty( $url['loc'] ) ) {
        $loc = (string) $url['loc'];
    } elseif ( is_string( $url ) ) {
        $loc = $url;
    }

    if ( ukiyo_should_exclude_sitemap_loc( $loc ) ) {
        return false;
    }

    return $url;
}
add_filter( 'wpseo_sitemap_entry', 'ukiyo_filter_non_indexable_sitemap_entry', 20, 3 );
add_filter( 'rank_math/sitemap/entry', 'ukiyo_filter_non_indexable_sitemap_entry', 20, 3 );

function ukiyo_exclude_noindex_terms_from_sitemap( $exclude, $term = null ) {
    if ( $term instanceof WP_Term && 'category' === $term->taxonomy && 'consejos' === $term->slug ) {
        return true;
    }

    return $exclude;
}
add_filter( 'rank_math/sitemap/exclude_term', 'ukiyo_exclude_noindex_terms_from_sitemap', 20, 2 );

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
            'image'       => $theme_uri . '/images/destination-mood/viajes-a-medida-ukiyo-aventurero-bali.jpg',
            'description' => 'Indonesia como destino de viaje a medida: Bali, Java, Komodo, templos, arrozales, volcanes, cultura local e islas con rutas diseñadas sin prisas.',
        ],
        'destination_costa_rica' => [
            'template'    => 'page-costarica.php',
            'name'        => 'Costa Rica',
            'country'     => 'Costa Rica',
            'url'         => ukiyo_get_route_url( 'destination_costa_rica' ),
            'image'       => $theme_uri . '/images/costarica/viajes-costa-rica-hero.jpg',
            'description' => 'Costa Rica como destino de naturaleza a medida: volcanes, bosque nuboso, selva, fauna, playas salvajes y rutas equilibradas entre Caribe y Pacífico.',
        ],
        'destination_colombia' => [
            'template'    => 'page-colombia.php',
            'name'        => 'Colombia',
            'country'     => 'Colombia',
            'url'         => ukiyo_get_route_url( 'destination_colombia' ),
            'image'       => $theme_uri . '/images/colombia/viajes-colombia-hero.jpg',
            'description' => 'Colombia como destino de viaje personalizado: Caribe, Andes, Eje Cafetero, cultura local, pueblos coloniales y naturaleza con logística cuidada.',
        ],
        'destination_marruecos' => [
            'template'    => 'page-marruecos.php',
            'name'        => 'Marruecos',
            'country'     => 'Marruecos',
            'url'         => ukiyo_get_route_url( 'destination_marruecos' ),
            'image'       => $theme_uri . '/images/autores/moha/viajes-a-marruecos-personalizados-erg-chebbi-hero.jpg',
            'description' => 'Marruecos como destino de viaje privado: Marrakech, medinas, Atlas, kasbahs, desierto del Sahara, pueblos bereberes y alojamientos con carácter.',
        ],
        'destination_italia' => [
            'template'    => 'page-italia.php',
            'name'        => 'Italia',
            'country'     => 'Italia',
            'url'         => ukiyo_get_route_url( 'destination_italia' ),
            'image'       => $theme_uri . '/images/italia/viajes-a-italia-personalizados-toscana.jpg',
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
