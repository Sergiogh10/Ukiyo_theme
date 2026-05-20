<?php
/**
 * SEO helpers for breadcrumbs and rich result extensions.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Shared FAQs for the Viajes de Autor landing.
 */
function ukiyo_get_viajes_autor_faqs() {
    return [
        [
            'question' => '¿Cómo me apunto a la expedición?',
            'answer'   => 'Haz clic en “Reservar ahora” o “Consultar precio” y completa el formulario. Confirmamos disponibilidad por email o llamada, y la plaza queda bloqueada al realizar el depósito de reserva.',
        ],
        [
            'question' => '¿Cuándo y cómo tengo que pagar?',
            'answer'   => 'Pedimos un depósito para confirmar plaza y el resto antes de la salida, en la fecha indicada en la confirmación. Aceptamos transferencia y tarjeta, y recibirás factura y justificante.',
        ],
        [
            'question' => '¿Cómo hago para llegar al punto de inicio de la expedición?',
            'answer'   => 'Tras reservar, te enviamos un dossier con aeropuerto recomendado, horarios y opciones de traslado. También podemos coordinar tu llegada o indicarte el punto de encuentro.',
        ],
    ];
}

/**
 * Central destination map for contextual internal links.
 */
function ukiyo_get_destination_link_items() {
    $theme_uri = get_template_directory_uri();

    return [
        'destination_indonesia' => [
            'name'        => 'Indonesia',
            'anchor'      => 'Viaje a medida a Indonesia',
            'url'         => ukiyo_get_route_url( 'destination_indonesia' ),
            'description' => 'Bali, Java, Komodo y playas remotas en un itinerario personalizado.',
            'image'       => $theme_uri . '/images/indonesia/flores-komodo/viajes-a-indonesia-flores-komodo-komodo-8.webp',
        ],
        'destination_costa_rica' => [
            'name'        => 'Costa Rica',
            'anchor'      => 'Viaje a medida a Costa Rica',
            'url'         => ukiyo_get_route_url( 'destination_costa_rica' ),
            'description' => 'Selva, volcanes, fauna y playas salvajes con ritmo propio.',
            'image'       => $theme_uri . '/images/costarica/viajes-a-costa-rica-personalizados-9.webp',
        ],
        'destination_colombia' => [
            'name'        => 'Colombia',
            'anchor'      => 'Viaje a medida a Colombia',
            'url'         => ukiyo_get_route_url( 'destination_colombia' ),
            'description' => 'Caribe, Andes, Eje Cafetero y cultura local en una ruta flexible.',
            'image'       => $theme_uri . '/images/colombia/viajes-a-colombia-personalizados-9.webp',
        ],
        'destination_marruecos' => [
            'name'        => 'Marruecos',
            'anchor'      => 'Viaje a medida a Marruecos',
            'url'         => ukiyo_get_route_url( 'destination_marruecos' ),
            'description' => 'Medinas, desierto, pueblos bereberes y alojamientos con carácter.',
            'image'       => $theme_uri . '/images/marruecos/viajes-personalizados-ukiyo-marruecos-azrou.webp',
        ],
        'destination_italia' => [
            'name'        => 'Italia',
            'anchor'      => 'Viaje a medida a Italia',
            'url'         => ukiyo_get_route_url( 'destination_italia' ),
            'description' => 'Roma, Toscana, costa y experiencias gastronómicas sin prisas.',
            'image'       => $theme_uri . '/images/italia/viajes-a-italia-personalizados-toscana.jpg',
        ],
        'destination_lanzarote' => [
            'name'        => 'Lanzarote',
            'anchor'      => 'Viaje a medida a Lanzarote',
            'url'         => ukiyo_get_route_url( 'destination_lanzarote' ),
            'description' => 'Volcanes, playas atlánticas, arte, vino y calma insular.',
            'image'       => $theme_uri . '/images/spain/lanzarote/vista-aerea-lanzarote.webp',
        ],
    ];
}

/**
 * Strategic destination relationships for SEO and conversion.
 */
function ukiyo_get_related_destination_keys( $current = '' ) {
    $relations = [
        'destination_indonesia'  => [ 'destination_costa_rica', 'destination_colombia', 'destination_marruecos', 'destination_italia' ],
        'destination_costa_rica' => [ 'destination_colombia', 'destination_indonesia', 'destination_lanzarote', 'destination_marruecos' ],
        'destination_colombia'   => [ 'destination_costa_rica', 'destination_indonesia', 'destination_marruecos', 'destination_lanzarote' ],
        'destination_marruecos'  => [ 'destination_italia', 'destination_lanzarote', 'destination_colombia', 'destination_indonesia' ],
        'destination_italia'     => [ 'destination_lanzarote', 'destination_marruecos', 'destination_indonesia', 'destination_colombia' ],
        'destination_lanzarote'  => [ 'destination_marruecos', 'destination_italia', 'destination_costa_rica', 'destination_colombia' ],
    ];

    if ( isset( $relations[ $current ] ) ) {
        return $relations[ $current ];
    }

    return [ 'destination_indonesia', 'destination_costa_rica', 'destination_colombia', 'destination_marruecos', 'destination_italia', 'destination_lanzarote' ];
}

/**
 * Renders a reusable related destination block.
 */
function ukiyo_render_related_internal_links( $args = [] ) {
    $defaults = [
        'title'       => 'También te puede interesar',
        'eyebrow'     => 'Otros destinos UKIYO',
        'intro'       => '',
        'current'     => '',
        'keys'        => [],
        'limit'       => 4,
        'variant'     => 'section',
        'class'       => '',
        'echo'        => true,
    ];
    $args = wp_parse_args( $args, $defaults );

    $items = ukiyo_get_destination_link_items();
    $keys  = ! empty( $args['keys'] ) ? (array) $args['keys'] : ukiyo_get_related_destination_keys( $args['current'] );
    $keys  = array_values(
        array_filter(
            array_unique( $keys ),
            static function ( $key ) use ( $items, $args ) {
                return isset( $items[ $key ] ) && $key !== $args['current'];
            }
        )
    );

    if ( $args['limit'] > 0 ) {
        $keys = array_slice( $keys, 0, (int) $args['limit'] );
    }

    if ( empty( $keys ) ) {
        return '';
    }

    $is_compact    = 'compact' === $args['variant'];
    $section_class = $is_compact
        ? 'not-prose mt-16 pt-10 border-t border-gray-200 dark:border-gray-800'
        : 'py-16 bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800';
    $section_class = trim( $section_class . ' ' . $args['class'] );

    ob_start();
    ?>
    <section class="<?php echo esc_attr( $section_class ); ?>">
        <?php if ( ! $is_compact ) : ?>
            <style>
                .ukiyo-related-dest-card{position:relative;width:100%;height:500px;border-radius:1.5rem;overflow:hidden;cursor:pointer;transition:transform .4s cubic-bezier(.25,.46,.45,.94),box-shadow .4s ease;display:block}
                .ukiyo-related-dest-card:hover{transform:translateY(-10px);box-shadow:0 25px 50px -12px rgba(0,0,0,.35)}
                .ukiyo-related-dest-card .ukiyo-related-dest-bg{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:transform .7s cubic-bezier(.25,.46,.45,.94)}
                .ukiyo-related-dest-card:hover .ukiyo-related-dest-bg{transform:scale(1.08)}
                .ukiyo-related-dest-card .ukiyo-related-dest-overlay{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(0,0,0,.15) 0%,rgba(0,0,0,.75) 100%);transition:background .4s ease}
                .ukiyo-related-dest-card:hover .ukiyo-related-dest-overlay{background:linear-gradient(to bottom,rgba(0,0,0,.05) 0%,rgba(0,0,0,.85) 100%)}
                .ukiyo-related-dest-card .ukiyo-related-dest-content{position:absolute;bottom:0;left:0;width:100%;padding:2rem;text-align:center;transition:transform .3s ease}
                .ukiyo-related-dest-card:hover .ukiyo-related-dest-content{transform:translateY(-8px)}
                .ukiyo-related-dest-card .ukiyo-related-dest-tag{color:#FF8C42;font-size:12px;text-transform:uppercase;letter-spacing:.15em;margin-bottom:.5rem;font-weight:700;display:flex;align-items:center;justify-content:center;gap:6px}
                .ukiyo-related-dest-card .ukiyo-related-dest-title{display:block;font-family:'Rowdies',sans-serif;font-size:2rem;color:#fff;font-weight:600;margin-bottom:0;transition:margin-bottom .3s ease;line-height:1.1}
                .ukiyo-related-dest-card:hover .ukiyo-related-dest-title{margin-bottom:.75rem}
                .ukiyo-related-dest-card .ukiyo-related-dest-desc{display:block;color:rgba(255,255,255,.85);line-height:1.6;font-size:15px;max-height:0;opacity:0;overflow:hidden;transition:max-height .5s ease,opacity .4s ease .1s}
                .ukiyo-related-dest-card:hover .ukiyo-related-dest-desc{max-height:120px;opacity:1}
                .ukiyo-related-dest-card .ukiyo-related-dest-arrow{display:inline-flex;align-items:center;justify-content:center;margin-top:1rem;width:44px;height:44px;border-radius:50%;border:2px solid rgba(255,255,255,.4);color:#fff;opacity:0;transform:translateY(10px);transition:opacity .4s ease .15s,transform .4s ease .15s,border-color .3s ease,background-color .3s ease}
                .ukiyo-related-dest-card:hover .ukiyo-related-dest-arrow{opacity:1;transform:translateY(0)}
                .ukiyo-related-dest-card .ukiyo-related-dest-arrow:hover{background-color:var(--color-primary,#FF8C42);border-color:var(--color-primary,#FF8C42)}
                @media(max-width:767px){.ukiyo-related-dest-card{height:400px}.ukiyo-related-dest-card .ukiyo-related-dest-desc{max-height:120px;opacity:1}.ukiyo-related-dest-card .ukiyo-related-dest-arrow{opacity:1;transform:translateY(0)}}
            </style>
        <?php endif; ?>
        <div class="<?php echo $is_compact ? '' : 'container mx-auto px-4'; ?>">
            <div class="<?php echo $is_compact ? '' : 'max-w-6xl mx-auto'; ?>">
                <div class="<?php echo $is_compact ? 'mb-8' : 'text-center mb-10'; ?>">
                    <?php if ( $args['eyebrow'] ) : ?>
                        <span class="text-primary uppercase tracking-[0.24em] text-xs font-bold font-satoshi">
                            <?php echo esc_html( $args['eyebrow'] ); ?>
                        </span>
                    <?php endif; ?>
                    <h2 class="mt-3 text-3xl md:text-4xl font-rowdies text-gray-900 dark:text-white">
                        <?php echo esc_html( $args['title'] ); ?>
                    </h2>
                    <?php if ( $args['intro'] ) : ?>
                        <p class="mt-4 text-base md:text-lg text-gray-600 dark:text-gray-300 font-satoshi leading-relaxed <?php echo $is_compact ? '' : 'max-w-3xl mx-auto'; ?>">
                            <?php echo esc_html( $args['intro'] ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 <?php echo count( $keys ) >= 3 ? 'lg:grid-cols-4' : ''; ?> gap-6">
                    <?php foreach ( $keys as $key ) : ?>
                        <?php $item = $items[ $key ]; ?>
                        <?php if ( $is_compact ) : ?>
                            <a
                                href="<?php echo esc_url( $item['url'] ); ?>"
                                class="group flex flex-col rounded-2xl border border-gray-100 dark:border-gray-800 bg-background-light dark:bg-gray-800 text-left shadow-sm hover:shadow-md transition-all hover:-translate-y-0.5 overflow-hidden"
                                style="height:360px;"
                                aria-label="<?php echo esc_attr( $item['anchor'] ); ?>"
                            >
                                <span class="relative block overflow-hidden bg-gray-100 dark:bg-gray-700" style="height:160px;">
                                    <img
                                        src="<?php echo esc_url( $item['image'] ); ?>"
                                        alt="<?php echo esc_attr( $item['anchor'] ); ?>"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                    <span class="absolute top-4 left-4 rounded-sm bg-white/95 dark:bg-gray-900/90 px-3 py-1 text-[10px] uppercase tracking-[0.18em] text-primary font-bold font-satoshi shadow-sm">
                                        <?php echo esc_html( $item['name'] ); ?>
                                    </span>
                                </span>
                                <span class="flex min-h-0 flex-1 flex-col p-5">
                                    <span class="block text-[10px] uppercase tracking-[0.18em] text-primary font-bold font-satoshi">Destino relacionado</span>
                                    <span class="block mt-2 font-rowdies text-lg leading-tight text-gray-900 dark:text-white group-hover:text-primary transition-colors" style="display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;line-clamp:2;overflow:hidden;min-height:2.75rem;">
                                        <?php echo esc_html( $item['anchor'] ); ?>
                                    </span>
                                    <span class="block mt-3 text-sm text-gray-600 dark:text-gray-300 leading-relaxed font-satoshi" style="display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:3;line-clamp:3;overflow:hidden;">
                                        <?php echo esc_html( $item['description'] ); ?>
                                    </span>
                                </span>
                            </a>
                        <?php else : ?>
                            <a href="<?php echo esc_url( $item['url'] ); ?>" class="ukiyo-related-dest-card group" aria-label="<?php echo esc_attr( $item['anchor'] ); ?>">
                                <img
                                    src="<?php echo esc_url( $item['image'] ); ?>"
                                    alt="<?php echo esc_attr( $item['anchor'] ); ?>"
                                    class="ukiyo-related-dest-bg"
                                    loading="lazy"
                                    decoding="async"
                                />
                                <span class="ukiyo-related-dest-overlay"></span>
                                <span class="ukiyo-related-dest-content">
                                    <span class="ukiyo-related-dest-tag">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                            <circle cx="12" cy="10" r="3"/>
                                        </svg>
                                        <?php echo esc_html( $item['name'] ); ?>
                                    </span>
                                    <span class="ukiyo-related-dest-title"><?php echo esc_html( $item['anchor'] ); ?></span>
                                    <span class="ukiyo-related-dest-desc"><?php echo esc_html( $item['description'] ); ?></span>
                                    <span class="ukiyo-related-dest-arrow" aria-hidden="true">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"/>
                                            <path d="m12 5 7 7-7 7"/>
                                        </svg>
                                    </span>
                                </span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    $html = trim( ob_get_clean() );

    if ( $args['echo'] ) {
        echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

    return $html;
}

/**
 * Returns strategic blog post slugs for each destination pillar.
 */
function ukiyo_get_destination_blog_post_slugs( $destination_key ) {
    $clusters = [
        'destination_indonesia'  => [
            'cuanto-cuesta-viajar-a-indonesia',
            'ruta-indonesia-15-dias',
            'que-ver-en-indonesia',
            'mejor-epoca-para-viajar-a-indonesia',
        ],
        'destination_costa_rica' => [
            'cuanto-cuesta-viajar-a-costa-rica',
            'ruta-costa-rica-15-dias',
            'que-ver-en-costa-rica',
            'mejor-epoca-para-viajar-a-costa-rica',
        ],
        'destination_colombia'   => [
            'cuanto-cuesta-viajar-a-colombia',
            'ruta-colombia-15-dias',
            'que-ver-en-colombia',
            'mejor-epoca-para-viajar-a-colombia',
        ],
        'destination_marruecos'  => [
            'cuanto-cuesta-viajar-a-marruecos',
            'ruta-marruecos-10-dias',
            'que-ver-en-marruecos',
            'mejor-epoca-para-viajar-a-marruecos',
        ],
        'destination_italia'     => [
            'cuanto-cuesta-viajar-a-italia',
            'ruta-por-italia-en-15-dias',
            'ruta-italia-15-dias',
            'que-ver-en-italia',
            'mejor-epoca-para-viajar-a-italia',
        ],
        'destination_lanzarote'  => [
            'cuanto-cuesta-viajar-a-lanzarote',
            'ruta-lanzarote-7-dias',
            'que-ver-en-lanzarote',
            'mejor-epoca-para-viajar-a-lanzarote',
        ],
    ];

    return isset( $clusters[ $destination_key ] ) ? $clusters[ $destination_key ] : [];
}

/**
 * Renders destination-specific blog posts using the compact destination card style.
 */
function ukiyo_render_destination_blog_posts( $args = [] ) {
    $defaults = [
        'title'           => 'Guías para preparar tu viaje',
        'eyebrow'         => 'Artículos relacionados',
        'intro'           => '',
        'destination_key' => '',
        'category'        => '',
        'limit'           => 4,
        'class'           => '',
        'echo'            => true,
    ];
    $args = wp_parse_args( $args, $defaults );

    if ( empty( $args['destination_key'] ) ) {
        return '';
    }

    $destination_items = ukiyo_get_destination_link_items();
    $destination_item  = isset( $destination_items[ $args['destination_key'] ] ) ? $destination_items[ $args['destination_key'] ] : null;
    $slugs             = ukiyo_get_destination_blog_post_slugs( $args['destination_key'] );
    $posts             = [];
    $seen_ids          = [];
    $limit             = max( 1, (int) $args['limit'] );

    if ( ! empty( $slugs ) ) {
        $cluster_query = new WP_Query(
            [
                'post_type'           => 'post',
                'post_status'         => 'publish',
                'posts_per_page'      => $limit,
                'post_name__in'       => $slugs,
                'orderby'             => 'post_name__in',
                'ignore_sticky_posts' => true,
            ]
        );

        foreach ( $cluster_query->posts as $post ) {
            $posts[]               = $post;
            $seen_ids[ $post->ID ] = true;
        }

        wp_reset_postdata();
    }

    if ( count( $posts ) < $limit && ! empty( $args['category'] ) ) {
        $fallback_query = new WP_Query(
            [
                'post_type'           => 'post',
                'post_status'         => 'publish',
                'posts_per_page'      => $limit - count( $posts ),
                'category_name'       => sanitize_title( $args['category'] ),
                'post__not_in'        => array_keys( $seen_ids ),
                'ignore_sticky_posts' => true,
            ]
        );

        foreach ( $fallback_query->posts as $post ) {
            $posts[] = $post;
        }

        wp_reset_postdata();
    }

    if ( empty( $posts ) ) {
        return '';
    }

    $section_class = trim( 'py-16 bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 ' . $args['class'] );
    $grid_cols     = count( $posts ) >= 3 ? 'lg:grid-cols-4' : 'lg:grid-cols-2';

    ob_start();
    ?>
    <section class="<?php echo esc_attr( $section_class ); ?>">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-10">
                    <?php if ( $args['eyebrow'] ) : ?>
                        <span class="text-primary uppercase tracking-[0.24em] text-xs font-bold font-satoshi">
                            <?php echo esc_html( $args['eyebrow'] ); ?>
                        </span>
                    <?php endif; ?>
                    <h2 class="mt-3 text-3xl md:text-4xl font-rowdies text-gray-900 dark:text-white">
                        <?php echo esc_html( $args['title'] ); ?>
                    </h2>
                    <?php if ( $args['intro'] ) : ?>
                        <p class="mt-4 text-base md:text-lg text-gray-600 dark:text-gray-300 font-satoshi leading-relaxed max-w-3xl mx-auto">
                            <?php echo esc_html( $args['intro'] ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 <?php echo esc_attr( $grid_cols ); ?> gap-6">
                    <?php foreach ( $posts as $post ) : ?>
                        <?php
                        $post_id   = $post->ID;
                        $permalink = get_permalink( $post_id );
                        $title     = get_the_title( $post_id );
                        $excerpt   = get_the_excerpt( $post_id );
                        $image     = has_post_thumbnail( $post_id ) ? get_the_post_thumbnail_url( $post_id, 'large' ) : '';
                        if ( ! $image && $destination_item ) {
                            $image = $destination_item['image'];
                        }
                        $badge = $destination_item ? $destination_item['name'] : 'Guía';
                        ?>
                        <a
                            href="<?php echo esc_url( $permalink ); ?>"
                            class="group flex flex-col rounded-2xl border border-gray-100 dark:border-gray-800 bg-background-light dark:bg-gray-800 text-left shadow-sm hover:shadow-md transition-all hover:-translate-y-0.5 overflow-hidden"
                            style="height:520px;"
                            aria-label="<?php echo esc_attr( $title ); ?>"
                        >
                            <span class="relative block overflow-hidden bg-gray-100 dark:bg-gray-700" style="height:220px;flex:0 0 220px;">
                                <?php if ( $image ) : ?>
                                    <img
                                        src="<?php echo esc_url( $image ); ?>"
                                        alt="<?php echo esc_attr( $title ); ?>"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                <?php endif; ?>
                                <span class="absolute top-6 left-6 rounded-sm bg-white/95 dark:bg-gray-900/90 px-5 py-3 text-primary font-bold font-satoshi shadow-sm" style="font-size:12px;letter-spacing:.24em;text-transform:uppercase;">
                                    <?php echo esc_html( $badge ); ?>
                                </span>
                            </span>
                            <span class="flex min-h-0 flex-1 flex-col p-8">
                                <span class="block text-primary font-bold font-satoshi" style="font-size:12px;letter-spacing:.24em;text-transform:uppercase;">Guía del destino</span>
                                <span class="block mt-5 font-rowdies text-gray-900 dark:text-white group-hover:text-primary transition-colors" style="display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;line-clamp:2;overflow:hidden;min-height:3.5rem;font-size:1.5rem;line-height:1.15;">
                                    <?php echo esc_html( $title ); ?>
                                </span>
                                <span class="block mt-6 text-gray-600 dark:text-gray-300 font-satoshi" style="display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:4;line-clamp:4;overflow:hidden;font-size:1.125rem;line-height:1.55;">
                                    <?php echo esc_html( wp_trim_words( $excerpt, 22 ) ); ?>
                                </span>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    $html = trim( ob_get_clean() );

    if ( $args['echo'] ) {
        echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

    return $html;
}

/**
 * Detects destination context for a viaje_autor from taxonomy, meta fields,
 * itinerary fields and title. This keeps SEO/content helpers aligned with the
 * visible template even when the body editor is not used.
 */
function ukiyo_get_viaje_autor_destination_keys( $post_id ) {
    if ( ! $post_id || 'viaje_autor' !== get_post_type( $post_id ) ) {
        return [];
    }

    $text = get_the_title( $post_id ) . ' ' . get_post_field( 'post_name', $post_id ) . ' ' . get_post_field( 'post_content', $post_id );

    $meta_fields = [
        'hero_subtitle',
        'hero_tags',
        'expert_name',
        'expert_title',
        'expert_quote',
        'expert_specialty',
        'expert_focus',
        'duracion_viaje',
        'grupos_viaje',
        'trip_includes',
        'trip_excludes',
    ];

    foreach ( $meta_fields as $field ) {
        $text .= ' ' . get_post_meta( $post_id, $field, true );
    }

    $terms = wp_get_post_terms( $post_id, 'destino', [ 'fields' => 'names' ] );
    if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
        $text .= ' ' . implode( ' ', $terms );
    }

    $itinerary_json = get_post_meta( $post_id, 'itinerary_days', true );
    $itinerary      = $itinerary_json ? json_decode( $itinerary_json, true ) : [];

    if ( is_array( $itinerary ) ) {
        foreach ( $itinerary as $day ) {
            $text .= ' ' . ( $day['day_label'] ?? '' ) . ' ' . ( $day['day_title'] ?? '' ) . ' ' . ( $day['day_intro'] ?? '' ) . ' ' . ( $day['day_description'] ?? '' );

            if ( ! empty( $day['experiences'] ) && is_array( $day['experiences'] ) ) {
                foreach ( $day['experiences'] as $experience ) {
                    $text .= ' ' . ( $experience['title'] ?? '' ) . ' ' . ( $experience['description'] ?? '' );
                }
            }
        }
    }

    return ukiyo_detect_destination_keys_from_text( $text );
}

function ukiyo_render_viaje_autor_blog_resources_section( $post_id = 0, $class = 'bg-white' ) {
    $post_id = $post_id ?: get_queried_object_id();

    if ( ! $post_id || 'viaje_autor' !== get_post_type( $post_id ) ) {
        return;
    }

    $destination_keys  = ukiyo_get_viaje_autor_destination_keys( $post_id );
    $destination_items = ukiyo_get_destination_link_items();

    foreach ( $destination_keys as $destination_key ) {
        if ( empty( $destination_items[ $destination_key ] ) ) {
            continue;
        }

        ukiyo_render_destination_blog_posts(
            [
                'title'           => 'Recursos para preparar tu viaje a ' . $destination_items[ $destination_key ]['name'],
                'eyebrow'         => 'Guías del destino',
                'intro'           => 'Ideas útiles para entender presupuesto, ruta, lugares clave y mejor época antes de decidir si este viaje encaja contigo.',
                'destination_key' => $destination_key,
                'category'        => sanitize_title( $destination_items[ $destination_key ]['name'] ),
                'limit'           => 4,
                'class'           => $class,
            ]
        );
    }
}

/**
 * Detects likely destination entities in editorial content.
 */
function ukiyo_detect_destination_keys_from_text( $text ) {
    $text = wp_strip_all_tags( (string) $text );
    $text = function_exists( 'mb_strtolower' ) ? mb_strtolower( $text, 'UTF-8' ) : strtolower( $text );

    $patterns = [
        'destination_indonesia'  => [ 'indonesia', 'bali', 'java', 'komodo', 'raja ampat', 'sumatra' ],
        'destination_costa_rica' => [ 'costa rica', 'manuel antonio', 'tortuguero', 'arenal', 'monteverde', 'pura vida' ],
        'destination_colombia'   => [ 'colombia', 'cartagena', 'medellin', 'medellín', 'eje cafetero', 'providencia', 'nuqui', 'nuquí' ],
        'destination_marruecos'  => [ 'marruecos', 'marrakech', 'merzouga', 'erg chebbi', 'sahara', 'bereber' ],
        'destination_italia'     => [ 'italia', 'roma', 'toscana', 'florencia', 'sicilia', 'puglia', 'venecia' ],
        'destination_lanzarote'  => [ 'lanzarote', 'canarias', 'timanfaya', 'famara', 'la geria', 'jameos' ],
    ];

    $matches = [];
    foreach ( $patterns as $key => $needles ) {
        foreach ( $needles as $needle ) {
            if ( false !== strpos( $text, $needle ) ) {
                $matches[] = $key;
                break;
            }
        }
    }

    return array_values( array_unique( $matches ) );
}

/**
 * Returns destination links related to a post using meta, taxonomy and text signals.
 */
function ukiyo_get_post_related_destination_keys( $post_id ) {
    $keys = [];

    $legacy_country_map = [
        'indonesia'  => 'destination_indonesia',
        'costa-rica' => 'destination_costa_rica',
        'colombia'   => 'destination_colombia',
        'marruecos'  => 'destination_marruecos',
        'italia'     => 'destination_italia',
        'lanzarote'  => 'destination_lanzarote',
    ];

    $related_country = get_post_meta( $post_id, 'ukiyo_related_country', true );
    if ( isset( $legacy_country_map[ $related_country ] ) ) {
        $keys[] = $legacy_country_map[ $related_country ];
    }

    $terms_text = '';
    $terms      = wp_get_post_terms( $post_id, [ 'category', 'post_tag' ], [ 'fields' => 'names' ] );
    if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
        $terms_text = implode( ' ', $terms );
    }

    $text = get_the_title( $post_id ) . ' ' . get_the_excerpt( $post_id ) . ' ' . get_post_field( 'post_content', $post_id ) . ' ' . $terms_text;
    $keys = array_merge( $keys, ukiyo_detect_destination_keys_from_text( $text ) );

    if ( empty( $keys ) ) {
        $keys = [ 'destination_indonesia', 'destination_costa_rica', 'destination_colombia', 'destination_marruecos' ];
    }

    return array_values( array_unique( $keys ) );
}

/**
 * Renders contextual destination links for blog posts.
 */
function ukiyo_render_blog_destination_links( $post_id ) {
    $keys = ukiyo_get_post_related_destination_keys( $post_id );

    foreach ( $keys as $key ) {
        $keys = array_merge( $keys, ukiyo_get_related_destination_keys( $key ) );
    }

    return ukiyo_render_related_internal_links(
        [
            'title'   => 'También te puede interesar',
            'eyebrow' => 'Destinos conectados',
            'intro'   => 'Si este artículo encaja con tu forma de viajar, estos destinos ayudan a seguir explorando rutas a medida con el mismo enfoque.',
            'keys'    => $keys,
            'limit'   => 4,
            'variant' => 'compact',
        ]
    );
}

/**
 * Returns breadcrumb items for the current request.
 */
function ukiyo_get_breadcrumb_items() {
    $items   = [];
    $home    = home_url( '/' );
    $current = ukiyo_get_canonical_url();

    $items[] = [
        'label' => 'Inicio',
        'url'   => $home,
    ];

    if ( is_front_page() ) {
        return $items;
    }

    if ( is_page_template( 'page-costarica.php' ) || is_page_template( 'page-colombia.php' ) || is_page_template( 'page-indonesia.php' ) || is_page_template( 'page-marruecos.php' ) || is_page_template( 'page-italia.php' ) || is_page_template( 'page-lanzarote.php' ) ) {
        $items[] = [
            'label' => 'Destinos',
            'url'   => ukiyo_get_route_url( 'destinations' ),
        ];
    }

    if ( is_page_template( 'page-viajesautor.php' ) ) {
        $items[] = [
            'label' => 'Viajes de autor',
            'url'   => $current,
        ];

        return $items;
    }

    if ( is_singular( 'viaje_autor' ) ) {
        $items[] = [
            'label' => 'Viajes de autor',
            'url'   => ukiyo_get_route_url( 'viajes_autor' ),
        ];
        $items[] = [
            'label' => single_post_title( '', false ),
            'url'   => $current,
        ];

        return $items;
    }

    if ( is_page() ) {
        $ancestors = array_reverse( get_post_ancestors( get_queried_object_id() ) );
        foreach ( $ancestors as $ancestor_id ) {
            $items[] = [
                'label' => get_the_title( $ancestor_id ),
                'url'   => get_permalink( $ancestor_id ),
            ];
        }

        $items[] = [
            'label' => single_post_title( '', false ),
            'url'   => $current,
        ];

        return $items;
    }

    if ( is_single() ) {
        $posts_page_id = (int) get_option( 'page_for_posts' );
        if ( $posts_page_id ) {
            $items[] = [
                'label' => get_the_title( $posts_page_id ),
                'url'   => get_permalink( $posts_page_id ),
            ];
        }

        $items[] = [
            'label' => single_post_title( '', false ),
            'url'   => $current,
        ];
    }

    return $items;
}

/**
 * Renders visible breadcrumbs.
 */
function ukiyo_render_breadcrumbs( $args = [] ) {
    $defaults = [
        'class'      => '',
        'link_class' => '',
        'echo'       => true,
    ];
    $args = wp_parse_args( $args, $defaults );

    $items = ukiyo_get_breadcrumb_items();
    if ( count( $items ) < 2 ) {
        return '';
    }

    $wrapper_class = 'text-sm';
    $list_class    = trim( $args['class'] );
    $link_class    = trim( $args['link_class'] );

    ob_start();
    ?>
    <nav aria-label="Breadcrumb" class="<?php echo esc_attr( $wrapper_class ); ?>">
        <ol class="flex flex-wrap items-center gap-2 <?php echo esc_attr( $list_class ); ?>">
            <?php foreach ( $items as $index => $item ) : ?>
                <?php $is_last = $index === array_key_last( $items ); ?>
                <li class="inline-flex items-center gap-2">
                    <?php if ( ! $is_last ) : ?>
                        <a href="<?php echo esc_url( $item['url'] ); ?>" class="<?php echo esc_attr( $link_class ); ?>">
                            <?php echo esc_html( $item['label'] ); ?>
                        </a>
                        <span aria-hidden="true">/</span>
                    <?php else : ?>
                        <span aria-current="page"><?php echo esc_html( $item['label'] ); ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
    <?php
    $html = trim( ob_get_clean() );

    if ( $args['echo'] ) {
        echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

    return $html;
}

/**
 * Returns FAQ items valid for FAQPage schema on the current request.
 */
function ukiyo_get_current_faq_items() {
    if ( is_page_template( 'page-viajesautor.php' ) ) {
        return ukiyo_get_viajes_autor_faqs();
    }

    if ( is_singular( 'viaje_autor' ) ) {
        $faq_json = get_post_meta( get_queried_object_id(), 'faq_items', true );
        $faqs     = $faq_json ? json_decode( $faq_json, true ) : [];

        return array_values(
            array_filter(
                array_map(
                    static function ( $faq ) {
                        $question = isset( $faq['question'] ) ? trim( wp_strip_all_tags( (string) $faq['question'] ) ) : '';
                        $answer   = isset( $faq['answer'] ) ? trim( wp_strip_all_tags( (string) $faq['answer'] ) ) : '';

                        if ( '' === $question || '' === $answer ) {
                            return null;
                        }

                        return [
                            'question' => $question,
                            'answer'   => $answer,
                        ];
                    },
                    is_array( $faqs ) ? $faqs : []
                )
            )
        );
    }

    return [];
}

/**
 * Extends the base graph with BreadcrumbList and FAQPage where applicable.
 */
function ukiyo_extend_schema_graph( $graph ) {
    $breadcrumbs = ukiyo_get_breadcrumb_items();
    if ( count( $breadcrumbs ) > 1 ) {
        $breadcrumb_id = trailingslashit( ukiyo_get_canonical_url() ) . '#breadcrumb';

        foreach ( $graph as &$node ) {
            if ( ! is_array( $node ) || empty( $node['@type'] ) || 'WebPage' !== $node['@type'] ) {
                continue;
            }

            $node['breadcrumb'] = [
                '@id' => $breadcrumb_id,
            ];
            break;
        }
        unset( $node );

        $graph[] = [
            '@type'           => 'BreadcrumbList',
            '@id'             => $breadcrumb_id,
            'itemListElement' => array_map(
                static function ( $item, $index ) {
                    return [
                        '@type'    => 'ListItem',
                        'position' => $index + 1,
                        'name'     => $item['label'],
                        'item'     => $item['url'],
                    ];
                },
                $breadcrumbs,
                array_keys( $breadcrumbs )
            ),
        ];
    }

    $faqs = ukiyo_get_current_faq_items();
    if ( ! empty( $faqs ) ) {
        $graph[] = [
            '@type'      => 'FAQPage',
            '@id'        => trailingslashit( ukiyo_get_canonical_url() ) . '#faq',
            'mainEntity' => array_map(
                static function ( $faq ) {
                    return [
                        '@type'          => 'Question',
                        'name'           => $faq['question'],
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text'  => $faq['answer'],
                        ],
                    ];
                },
                $faqs
            ),
        ];
    }

    return $graph;
}
add_filter( 'ukiyo_json_ld_graph', 'ukiyo_extend_schema_graph' );
