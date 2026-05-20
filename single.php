<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header();

while ( have_posts() ) :
	the_post();

    // GET FIELDS
    $feat_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	$author_id    = get_the_author_meta( 'ID' );
    $author_name  = get_the_author();
    $author_avatar = get_avatar_url( $author_id );
    $date         = get_the_date( 'd \d\e F, Y' ); // "12 de Octubre, 2023" format
    $intro_text   = ukiyo_get_post_intro( get_the_ID() );
    
    // Calculate Read Time
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil( $word_count / 200 ); // avg 200 words per minute

    // Category
    $cats = get_the_category();
    $cat_name = !empty($cats) ? $cats[0]->name : 'Blog';

    // NEXT / PREV
    $prev_post = get_previous_post();
    $next_post = get_next_post();
?>

<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        colors: {
          primary: "#A0522D", // Terracotta-like accent
          secondary: "#1B4D3E", // Deep forest green
          "background-light": "#F9F8F6", // Off-white
          "background-dark": "#1a202c", // Dark gray/slate
          "surface-light": "#FFFFFF",
          "surface-dark": "#2D3748",
        },
        fontFamily: {
          display: ["'Rowdies'", "sans-serif"],
          sans: ["'Satoshi'", "sans-serif"],
          rowdies: ["'Rowdies'", "sans-serif"],
        },
        borderRadius: {
          DEFAULT: "0.5rem",
          xl: "1rem",
          '2xl': "1.5rem",
        },
      },
    },
  };
</script>
<style>
  .hero-gradient {
    background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.6) 100%);
  }
  .text-shadow {
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  body.single-post #site-logo {
    height: 1.75rem !important;
    max-height: 1.75rem;
  }
  @media (min-width: 768px) {
    body.single-post #site-logo {
      height: 2rem !important;
      max-height: 2rem;
    }
  }
  @media (min-width: 1024px) {
    body.single-post #site-logo {
      height: 2.25rem !important;
      max-height: 2.25rem;
    }
  }
  .hero-responsive { height: 85vh; }
  .blog-hero-title {
    inline-size: min(980px, calc(100vw - 2rem));
    max-inline-size: calc(100vw - 2rem);
    font-size: clamp(2rem, 4vw, 3.5rem);
    line-height: 1.08;
    overflow-wrap: normal;
    word-break: normal;
    hyphens: manual;
    white-space: normal;
  }
  .blog-related-title,
  .blog-related-excerpt {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .blog-related-title {
    -webkit-line-clamp: 2;
    line-clamp: 2;
    min-height: 3.5rem;
  }
  .blog-related-excerpt {
    -webkit-line-clamp: 3;
    line-clamp: 3;
    min-height: 5.25rem;
  }
  @media (min-width: 1024px) {
    .hero-responsive { height: 85vh !important; }
  }
</style>

<!-- HEADER HERO (Marruecos Style) -->
<header class="hero-responsive relative w-full overflow-hidden">
    <img 
        alt="<?php the_title_attribute(); ?>" 
        class="absolute inset-0 w-full h-full object-cover" 
        src="<?php echo esc_url($feat_img_url ? $feat_img_url : 'https://via.placeholder.com/1920x1080'); ?>"
        loading="eager"
        fetchpriority="high"
        decoding="async"
    />
    <div class="absolute inset-0 hero-gradient flex flex-col items-center justify-center text-center px-4">
        <?php
        ukiyo_render_breadcrumbs([
            'class'      => 'mb-6 justify-center text-white/80',
            'link_class' => 'text-white/80 hover:text-white transition-colors',
        ]);
        ?>
        <span class="text-white/80 uppercase tracking-[0.3em] text-sm mb-4 font-satoshi">
            <?php echo esc_html($cat_name); ?>
        </span>
        <h1 class="blog-hero-title min-w-0 mx-auto font-rowdies text-white font-bold mb-2 text-shadow text-center px-4">
            <?php
            $hero_title = wp_strip_all_tags( get_the_title() );
            $hero_title = str_replace( "\xc2\xa0", ' ', $hero_title );
            $hero_title = preg_replace( '/([,:;])\s+/u', '$1<wbr> ', $hero_title );
            echo wp_kses( $hero_title, [ 'wbr' => [] ] );
            ?>
        </h1>
    </div>
</header>

<!-- FLOATING META BAR (Exact Marruecos Style) -->
<div class="bg-white dark:bg-gray-900">
<div class="relative -mt-16 container mx-auto px-4 z-20 mb-6">
  <div class="bg-surface-light dark:bg-surface-dark shadow-xl rounded-2xl p-6 md:p-8 flex flex-wrap justify-between items-center gap-6 border border-gray-100 dark:border-gray-700">
    
    <!-- Date -->
    <div class="flex items-center gap-4 flex-1 min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'calendar_month' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Publicado</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white"><?php echo esc_html($date); ?></p>
      </div>
    </div>
    
    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    
    <!-- Author -->
    <div class="flex items-center gap-4 flex-1 min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'person' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Autor</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white"><?php echo esc_html( $author_name ); ?></p>
      </div>
    </div>

    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>

    <!-- Category -->
    <div class="flex items-center gap-4 flex-1 min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'label' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Categoría</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white"><?php echo esc_html($cat_name); ?></p>
      </div>
    </div>

    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    
    <!-- Reading Time -->
    <div class="flex items-center gap-4 flex-1 min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'thermostat' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Lectura</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white"><?php echo $reading_time; ?> min</p>
      </div>
    </div>
    
  </div>
</div>

<main class="relative bg-white dark:bg-gray-900 pb-24">
    <article class="max-w-4xl xl:max-w-5xl mx-auto px-4 sm:px-6">

        <?php if ( $intro_text ) : ?>
        <section class="mb-12 rounded-2xl bg-background-light dark:bg-gray-800 border border-gray-100 dark:border-gray-700 p-6 md:p-8">
            <p class="text-lg md:text-xl leading-relaxed text-gray-700 dark:text-gray-200 font-satoshi">
                <?php echo esc_html( $intro_text ); ?>
            </p>
        </section>
        <?php endif; ?>

        <!-- MAIN CONTENT PROSE -->
        <div class="prose prose-lg prose-stone dark:prose-invert prose-headings:font-rowdies prose-headings:font-bold prose-p:font-satoshi prose-p:leading-8 prose-img:rounded-xl max-w-none">
            <?php 
            // Logic to inject the Related Trip Card
            $related_trip_id = get_post_meta( get_the_ID(), 'ukiyo_related_trip_id', true );
            $content_html = apply_filters( 'the_content', get_the_content() );
            $prepared_post_content = ukiyo_prepare_post_content( $content_html );
            $content_html = $prepared_post_content['content'];
            $toc_items = $prepared_post_content['toc'];

            if ( $related_trip_id ) {
                $trip = get_post( $related_trip_id );
                if ( $trip && $trip->post_type === 'viaje_autor' ) {
                    // Fetch Data
                    $hero_url = get_post_meta( $trip->ID, 'hero_image', true );
                    $thumb_url = get_the_post_thumbnail_url( $trip->ID, 'large' );
                    $trip_img = $hero_url ? $hero_url : $thumb_url;
                    
                    // Smart Fallback if no image found
                    if ( ! $trip_img ) {
                        $trip_title_lower = strtolower( $trip->post_title );
                        $theme_dir = get_template_directory_uri();
                        
                        if ( strpos( $trip_title_lower, 'marruecos' ) !== false ) {
                            $trip_img = $theme_dir . '/images/autores/moha/viajes-a-marruecos-personalizados-erg-chebbi-hero.jpg';
                        } elseif ( strpos( $trip_title_lower, 'costa rica' ) !== false ) {
                            $trip_img = $theme_dir . '/images/costarica/viajes-costa-rica-hero.jpg';
                        } elseif ( strpos( $trip_title_lower, 'colombia' ) !== false ) {
                            $trip_img = $theme_dir . '/images/colombia/viajes-colombia-hero.jpg';
                        } else {
                            // Generic Fallback
                            $trip_img = $theme_dir . '/images/destination-mood/viajes-a-medida-ukiyo-pareja-acantilado.jpg';
                        }
                    }

                    $trip_price = get_post_meta( $trip->ID, 'precio_final', true );
                    $trip_link  = get_permalink( $trip->ID );
                    
                    // Description Hierarchy: Hero Subtitle -> Excerpt -> Content
                    $hero_subtitle = get_post_meta( $trip->ID, 'hero_subtitle', true );
                    $trip_desc = $hero_subtitle ? $hero_subtitle : get_the_excerpt( $trip->ID );
                    
                    if ( ! $trip_desc ) {
                         $trip_desc = wp_trim_words( strip_tags( $trip->post_content ), 20 );
                    }

                    // Build Card HTML
                    $card_html = '
                    <div class="not-prose my-12">
                        <div class="bg-white dark:bg-gray-800 border border-primary/20 rounded-xl p-6 md:p-8 shadow-xl flex flex-col md:flex-row gap-6 items-center md:items-start relative overflow-hidden group">
                            <div class="absolute top-0 left-0 w-1 h-full bg-primary"></div>
                            <div class="flex-shrink-0 w-full md:w-48 h-48 rounded-lg overflow-hidden relative">
                                <img alt="' . esc_attr($trip->post_title) . '" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="' . esc_url($trip_img) . '"/>
                            </div>
                            <div class="flex-1 text-center md:text-left">
                                <span class="text-xs font-bold text-primary tracking-widest uppercase mb-2 block">Experiencia Ukiyo</span>
                                <h3 class="font-rowdies text-2xl font-bold text-gray-900 dark:text-white mb-2 leading-tight">' . esc_html($trip->post_title) . '</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 line-clamp-2 font-satoshi">' . esc_html($trip_desc) . '</p>
                                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-16">
                                    <span class="text-lg font-display italic text-gray-900 dark:text-gray-100 font-satoshi">Precio <span class="text-2xl font-bold not-italic font-sans">' . esc_html($trip_price) . '</span></span>
                                    <button onclick="window.location.href=\'' . esc_url($trip_link) . '\'" class="bg-gray-900 dark:bg-primary text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-primary dark:hover:bg-white dark:hover:text-primary transition-colors w-full sm:w-auto">
                                        Ver Itinerario
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>';

                    // Inject after 2nd paragraph
                    $paragraphs = explode( '</p>', $content_html );
                    if ( count( $paragraphs ) > 2 ) {
                        // Append card to 2nd paragraph (index 1) which creates a gap before index 2
                        // Actually, explode removes '</p>'. We need to re-add it.
                        // Better approach:
                        // $paragraphs[1] .= '</p>' . $card_html;
                        // But implode will add '</p>' back.
                        // So we insert a new array element? No, array elements are paragraphs content.
                        // We can just append the card to the content of the 2nd paragraph, but outside the p tag?
                        // "explode" separates by delimiter.
                        // Input: <p>P1</p><p>P2</p><p>P3</p>
                        // Explode: [ "<p>P1", "<p>P2", "<p>P3" ] (Assuming closing p)
                        // Wait, simpler:
                        // array_splice inserts an element. If we insert the card HTML as a separate element, when we implode with '</p>', it will be:
                        // "<p>P1" . "</p>" . "<p>P2" . "</p>" . "CARD_HTML" . "</p>" . "<p>P3" ...
                        // The CARD_HTML will be followed by a closing </p> which is wrong if CARD_HTML is a div.
                        // Correct logic:
                        // $paragraphs[1] .= $card_html;
                        // Then implode adds </p> AFTER the card HTML? No.
                        // The formatting is usually: <p>text</p> \n <p>text</p>
                        
                        // Robust logic:
                        $closing_p = '</p>';
                        $chunks = explode( $closing_p, $content_html, 3 );
                        if ( count( $chunks ) > 2 ) {
                            // chunks[0] is First P (without closing p)
                            // chunks[1] is Second P (without closing p)
                            // chunks[2] is Rest
                            $content_html = $chunks[0] . $closing_p . $chunks[1] . $closing_p . $card_html . $chunks[2];
                        } else {
                            $content_html .= $card_html;
                        }
                    } else {
                         $content_html .= $card_html;
                    }
                }
            }

            if ( ! empty( $toc_items ) && count( $toc_items ) >= 2 ) :
            ?>
            <aside class="not-prose mb-8">
                <details class="group rounded-xl border border-gray-100 dark:border-gray-800 bg-gray-50/70 dark:bg-gray-800/50 px-4 py-3 text-sm shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-3 font-satoshi text-xs font-bold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-300">
                        <span>En este artículo</span>
                        <?php echo ukiyo_icon( 'expand_more', 'text-base text-primary transition-transform group-open:rotate-180' ); ?>
                    </summary>
                    <ol class="mt-4 max-h-72 space-y-2 overflow-y-auto border-t border-gray-100 dark:border-gray-700 pt-4">
                        <?php foreach ( $toc_items as $item ) : ?>
                            <li class="<?php echo 'h3' === $item['level'] ? 'pl-4' : ''; ?>">
                                <a
                                    href="#<?php echo esc_attr( $item['id'] ); ?>"
                                    class="block truncate font-satoshi text-sm text-gray-500 dark:text-gray-300 hover:text-primary transition-colors"
                                >
                                    <?php echo esc_html( $item['label'] ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </details>
            </aside>
            <?php
            endif;
            
            echo $content_html;
            ?>
        </div>

        <!-- TAGS -->
        <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-800 flex flex-wrap gap-2">
            <?php
            $tags = get_the_tags();
            if ( $tags ) {
                foreach( $tags as $tag ) {
                    echo '<span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 text-xs uppercase tracking-wide font-bold text-gray-600 dark:text-gray-400 rounded-sm">' . esc_html($tag->name) . '</span>';
                }
            } else {
                 echo '<span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 text-xs uppercase tracking-wide font-bold text-gray-600 dark:text-gray-400 rounded-sm">' . esc_html($cat_name) . '</span>';
            }
            ?>
        </div>

        <?php ukiyo_render_blog_destination_links( get_the_ID() ); ?>

        <?php
        $manual_related_posts = get_post_meta( get_the_ID(), 'ukiyo_related_posts', true );
        $manual_related_posts = is_array( $manual_related_posts ) ? array_values( array_filter( array_map( 'intval', $manual_related_posts ) ) ) : [];

        if ( ! empty( $manual_related_posts ) ) :
            $related_posts_query = new WP_Query( [
                'post_type'           => 'post',
                'post_status'         => 'publish',
                'post__in'            => $manual_related_posts,
                'orderby'             => 'post__in',
                'posts_per_page'      => count( $manual_related_posts ),
                'ignore_sticky_posts' => true,
            ] );

            if ( $related_posts_query->have_posts() ) :
        ?>
        <section class="mt-16 pt-10 border-t border-gray-200 dark:border-gray-800">
            <div class="flex items-center gap-3 mb-8">
                <span class="w-8 h-px bg-primary"></span>
                <h2 class="font-rowdies text-2xl md:text-3xl text-gray-900 dark:text-white">Artículos relacionados</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php while ( $related_posts_query->have_posts() ) : $related_posts_query->the_post(); ?>
                    <?php
                    $related_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                    $related_cats  = get_the_category();
                    $related_cat   = ! empty( $related_cats ) ? $related_cats[0]->name : 'Blog';
                    ?>
                    <article class="group rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800 bg-white dark:bg-gray-800 shadow-sm hover:shadow-lg transition-all h-full">
                        <a href="<?php the_permalink(); ?>" class="flex h-full flex-col">
                            <div class="relative aspect-[4/3] overflow-hidden">
                                <img
                                    alt="<?php the_title_attribute(); ?>"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                    src="<?php echo esc_url( $related_image ? $related_image : 'https://via.placeholder.com/800x600' ); ?>"
                                    loading="lazy"
                                    decoding="async"
                                />
                                <div class="absolute top-4 left-4 bg-white/90 dark:bg-black/80 px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary rounded-sm backdrop-blur-sm shadow-sm">
                                    <?php echo esc_html( $related_cat ); ?>
                                </div>
                            </div>
                            <div class="p-5 flex flex-1 flex-col">
                                <h3 class="blog-related-title font-rowdies text-xl text-gray-900 dark:text-white mb-3 leading-tight group-hover:text-primary transition-colors">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="blog-related-excerpt text-sm text-gray-600 dark:text-gray-300 leading-relaxed font-satoshi">
                                    <?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?>
                                </p>
                                <div class="mt-auto pt-4 border-t border-gray-100 dark:border-gray-700 flex items-center justify-between">
                                    <span class="text-xs text-gray-400 font-satoshi"><?php echo esc_html( get_the_date( 'd M Y' ) ); ?></span>
                                    <span class="text-primary text-xs font-bold uppercase tracking-wide flex items-center">
                                        Seguir leyendo <?php echo ukiyo_icon( 'east', 'text-sm ml-1 transition-transform group-hover:translate-x-1' ); ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
        </section>
        <?php
            endif;
            wp_reset_postdata();
        endif;
        ?>

        <!-- COUNTRY DISCOVERY / AUTHOR BOX -->
        <?php 
        $related_country = get_post_meta( get_the_ID(), 'ukiyo_related_country', true );
        
        if ( $related_country ) :
            // Definition of Country Data
            $country_data = [
                'costa-rica' => [
                    'name' => 'Costa Rica',
                    'url'  => ukiyo_get_route_url('destination_costa_rica'),
                    'img'  => get_template_directory_uri() . '/images/costarica/viajes-costa-rica-hero.jpg',
                    'anchor' => 'Viaje a medida a Costa Rica',
                    'desc' => 'Adéntrate en el santuario de la biodiversidad. Volcanes, playas salvajes y selva virgen te esperan.',
                ],
                'marruecos' => [
                    'name' => 'Marruecos',
                    'url'  => ukiyo_get_route_url('destination_marruecos'),
                    'img'  => get_template_directory_uri() . '/images/autores/moha/viajes-a-marruecos-personalizados-erg-chebbi-hero.jpg',
                    'anchor' => 'Viaje a medida a Marruecos',
                    'desc' => 'Déjate envolver por la magia del desierto, los aromas de las medinas y la hospitalidad bereber.',
                ],
                'colombia' => [
                    'name' => 'Colombia',
                    'url'  => ukiyo_get_route_url('destination_colombia'),
                    'img'  => get_template_directory_uri() . '/images/colombia/viajes-colombia-hero.jpg',
                    'anchor' => 'Viaje a medida a Colombia',
                    'desc' => 'Descubre el realismo mágico, desde el Caribe hasta los Andes. Cultura, café y paisajes infinitos.',
                ],
                'indonesia' => [
                    'name' => 'Indonesia',
                    'url'  => ukiyo_get_route_url('destination_indonesia'),
                    'img'  => get_template_directory_uri() . '/images/destination-mood/viajes-a-medida-ukiyo-aventurero-bali.jpg', // Fallback or specific
                    'anchor' => 'Viaje a medida a Indonesia',
                    'desc' => 'Islas de dioses y dragones. Arrozales eternos, templos milenarios y playas de ensueño.',
                ],
                'italia' => [
                    'name' => 'Italia',
                    'url'  => ukiyo_get_route_url('destination_italia'),
                    'img'  => get_template_directory_uri() . '/images/italia/viajes-a-italia-personalizados-toscana.jpg',
                    'anchor' => 'Viaje a medida a Italia',
                    'desc' => 'Cultura, gastronomía y rutas pausadas por Roma, Toscana, costa y pueblos con carácter.',
                ],
                'lanzarote' => [
                    'name' => 'Lanzarote',
                    'url'  => ukiyo_get_route_url('destination_lanzarote'),
                    'img'  => get_template_directory_uri() . '/images/spain/lanzarote/vista-aerea-lanzarote.webp',
                    'anchor' => 'Viaje a medida a Lanzarote',
                    'desc' => 'Paisajes volcánicos, Atlántico, bodegas y pueblos blancos para una escapada con calma.',
                ],
            ];

            $c_info = isset($country_data[$related_country]) ? $country_data[$related_country] : null;
        endif;

        if ( $related_country && $c_info ) : 
        ?>
            <div class="mt-16 bg-gray-50 dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col sm:flex-row items-center sm:items-start gap-6 text-center sm:text-left group cursor-pointer hover:shadow-md transition-shadow" onclick="window.location.href='<?php echo esc_url($c_info['url']); ?>'">
                <div class="flex-shrink-0 relative w-24 h-24 rounded-full overflow-hidden ring-4 ring-primary/20">
                    <img 
                        alt="<?php echo esc_attr($c_info['name']); ?>" 
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                        src="<?php echo esc_url($c_info['img']); ?>"
                    /> 
                </div>
                <div>
                    <h4 class="font-rowdies text-xl font-bold text-gray-900 dark:text-white mb-2">
                        Descubre <?php echo esc_html($c_info['name']); ?> con Ukiyo
                    </h4>
                    <p class="text-gray-600 dark:text-gray-300 font-satoshi text-sm leading-relaxed mb-4 max-w-lg">
                        <?php echo esc_html($c_info['desc']); ?>
                    </p>
                    <a class="text-primary text-sm font-bold uppercase tracking-wider hover:underline flex items-center justify-center sm:justify-start gap-1" href="<?php echo esc_url($c_info['url']); ?>">
                        <?php echo esc_html( $c_info['anchor'] ); ?>
                        <?php echo ukiyo_icon( 'arrow_forward', 'text-sm' ); ?>
                    </a>
                </div>
            </div>
        <?php else : ?>
            <!-- FALLBACK AUTHOR BOX -->
            <div class="mt-16 bg-gray-50 dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col sm:flex-row items-center sm:items-start gap-6 text-center sm:text-left">
                <div class="flex-shrink-0 relative">
                    <img 
                        alt="<?php echo esc_attr($author_name); ?>" 
                        class="w-24 h-24 rounded-full object-cover ring-4 ring-primary/20" 
                        src="<?php echo esc_url($author_avatar); ?>"
                    /> 
                </div>
                <div>
                    <h4 class="font-rowdies text-xl font-bold text-gray-900 dark:text-white mb-2">Sobre <?php echo esc_html($author_name); ?></h4>
                    <p class="text-gray-600 dark:text-gray-300 font-satoshi text-sm leading-relaxed mb-4">
                        <?php echo get_the_author_meta('description') ? get_the_author_meta('description') : 'Apasionado por descubrir nuevos horizontes y compartir historias que inspiran.'; ?>
                    </p>
                    <a class="text-primary text-sm font-bold uppercase tracking-wider hover:underline" href="<?php echo get_author_posts_url($author_id); ?>">Ver más artículos</a>
                </div>
            </div>
        <?php endif; ?>

    </article>
</main>
</div>

<!-- PREV / NEXT NAV -->
<section class="grid grid-cols-1 md:grid-cols-2 border-t border-gray-200 dark:border-gray-800">
    <?php if ( $prev_post ) : 
        $prev_img = get_the_post_thumbnail_url($prev_post->ID, 'large');
    ?>
    <a class="group relative h-64 md:h-80 overflow-hidden flex items-center justify-center" href="<?php echo get_permalink($prev_post->ID); ?>">
        <div class="absolute inset-0">
            <img 
                alt="<?php echo esc_attr($prev_post->post_title); ?>" 
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                src="<?php echo esc_url($prev_img ? $prev_img : 'https://via.placeholder.com/800x600'); ?>"
            />
            <div class="absolute inset-0 bg-black/60 group-hover:bg-black/50 transition-colors"></div>
        </div>
        <div class="relative z-10 text-center px-8">
            <span class="block text-xs font-bold text-white uppercase tracking-widest mb-2 group-hover:translate-y-[-4px] transition-transform">Post Anterior</span>
            <h3 class="font-rowdies text-2xl md:text-3xl font-bold text-white group-hover:underline decoration-white decoration-2 underline-offset-4">
                <?php echo esc_html($prev_post->post_title); ?>
            </h3>
        </div>
    </a>
    <?php else: ?>
        <div class="hidden md:block bg-gray-100 dark:bg-gray-900 h-64 md:h-80"></div>
    <?php endif; ?>

    <?php if ( $next_post ) : 
        $next_img = get_the_post_thumbnail_url($next_post->ID, 'large');
    ?>
    <a class="group relative h-64 md:h-80 overflow-hidden flex items-center justify-center border-l border-white/10" href="<?php echo get_permalink($next_post->ID); ?>">
        <div class="absolute inset-0">
            <img 
                alt="<?php echo esc_attr($next_post->post_title); ?>" 
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                src="<?php echo esc_url($next_img ? $next_img : 'https://via.placeholder.com/800x600'); ?>"
            />
            <div class="absolute inset-0 bg-black/60 group-hover:bg-black/50 transition-colors"></div>
        </div>
        <div class="relative z-10 text-center px-8">
            <span class="block text-xs font-bold text-white uppercase tracking-widest mb-2 group-hover:translate-y-[-4px] transition-transform">Siguiente Post</span>
            <h3 class="font-rowdies text-2xl md:text-3xl font-bold text-white group-hover:underline decoration-white decoration-2 underline-offset-4">
                <?php echo esc_html($next_post->post_title); ?>
            </h3>
        </div>
    </a>
    <?php else: ?>
        <!-- FINAL CTA FALLBACK -->
        <div class="h-auto md:h-80 bg-background text-text-secondary flex items-center justify-center p-8 border-l border-white/10 text-center">
            <div class="max-w-md">
                <h2 class="text-xl md:text-2xl font-rowdies mb-4 text-gray-900 dark:text-white">
                    ¿No encuentras tu viaje ideal?
                </h2>
                <p class="text-sm md:text-base mb-6 opacity-90 text-gray-600 dark:text-gray-300 font-satoshi">
                    Cada persona viaja a su manera.
                    Cuéntanos qué te mueve y crearemos juntos una experiencia que encaje contigo.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://wa.me/message/CS2LNI6YHSETO1" target="_blank" class="btn-primary text-text-secondary flex items-center gap-2 justify-center">
                        <img width="64" height="64" src="https://img.icons8.com/cotton/64/whatsapp--v4.png" alt="Contactar con Viajes Ukiyo por WhatsApp" class="w-6 h-6"/>
                        Escríbenos
                    </a>
                    <a href="<?php echo esc_url( ukiyo_get_route_url( 'viajes_autor' ) ); ?>" class="btn-primary text-text-secondary">
                        Ver viajes de autor de Ukiyo
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php
endwhile; // End of the loop.
get_footer();
