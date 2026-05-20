<?php
/**
 * Template Name: Blog / Home
 * Description: Página principal del blog (Entradas) con diseño premium.
 */
get_header();

$is_mobile_view    = wp_is_mobile();
$show_featured_post = ! $is_mobile_view;
?>

<!-- HERO SECTION (Copied from page-experiences.php) -->

<style>
  .hero-blog { height: 100vh; }
  @media (min-width: 1024px) {
    .hero-blog { height: auto !important; min-height: 50vh !important; }
  }
  /* Stable responsive post grid */
  .masonry-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
  }
  @media (min-width: 768px) {
      .masonry-grid {
          grid-template-columns: repeat(2, minmax(0, 1fr));
      }
  }
  @media (min-width: 1024px) {
      .masonry-grid {
          grid-template-columns: repeat(3, minmax(0, 1fr));
      }
  }
  .masonry-item {
      margin-bottom: 0;
      min-width: 0;
  }


  /* Forced Custom Styles for Cards (From page-viajesautor.php) */
  .ukiyo-card {
      border-radius: 30px !important;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08) !important;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
      background: white;
      border: 1px solid #f3f4f6;
  }
  .ukiyo-card:hover {
      box-shadow: 0 25px 50px rgba(0,0,0,0.15) !important;
      transform: translateY(-8px) !important;
      border-color: #e5e7eb;
  }

  .blog-mobile-filter {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      width: 100%;
      min-height: 3rem;
      border: 1px solid #d6d3d1;
      border-radius: 9999px;
      background: #fff;
      color: #44403c;
      font-family: var(--font-sans);
      font-size: 0.95rem;
      font-weight: 600;
      padding: 0.85rem 3rem 0.85rem 1rem;
      box-shadow: 0 6px 18px rgba(15, 23, 42, 0.06);
  }

  .blog-mobile-filter-wrap {
      position: relative;
      display: flex;
      align-items: center;
  }

  .blog-mobile-filter-chevron {
      position: absolute;
      top: 50%;
      right: 1.1rem;
      transform: translateY(-50%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #78716c;
      pointer-events: none;
      line-height: 1;
  }

  .blog-mobile-filter:focus {
      outline: none;
      border-color: rgb(246, 207, 102);
      box-shadow: 0 0 0 3px rgba(246, 207, 102, 0.25);
  }

  .blog-cta-button {
      display: inline-flex;
      width: 100%;
      align-items: center;
      justify-content: center;
      gap: 0.75rem;
      text-align: center;
  }

  .blog-cta-icon {
      display: block;
      width: 1.75rem;
      height: 1.75rem;
      flex-shrink: 0;
  }

  @media (min-width: 640px) {
      .blog-cta-button {
          width: auto;
      }
  }
</style>
<section class="hero-blog relative flex items-center justify-center overflow-hidden pt-32 pb-16">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full">
      <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-trabajador.jpg" 
           alt="Blog Ukiyo" 
           class="w-full h-full object-cover mask-image" 
           loading="eager" />
      <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
    </div>

    <!-- Contenido Hero - Centrado -->
    <div class="relative z-10 w-full">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
          <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">
            Inspiración
          </span>
          <h1 class="text-hero md:text-6xl lg:text-hero font-rowdies text-white mb-6 text-shadow">
            Cuaderno de <span class="text-accent-300">bitácora</span>
          </h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
            Ideas, guías y secretos de nuestros expertos para inspirar tu próxima gran aventura.
          </p>
        </div>
      </div>
    </div>
</section>

<!-- STICKY NAV -->
<div class="sticky top-20 z-40 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 py-4 shadow-sm transition-colors">
    <div class="max-w-7xl mx-auto px-4">
        <div class="md:hidden">
            <label for="blog-category-select" class="mb-2 block text-xs font-semibold uppercase text-gray-500" style="letter-spacing: 0.24em;">
                Filtrar artículos
            </label>
            <div class="blog-mobile-filter-wrap">
                <select id="blog-category-select" class="blog-mobile-filter">
                    <option value="">Todos</option>
                    <?php
                    $categories = get_categories( array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'hide_empty' => true,
                    ) );

                    foreach ( $categories as $category ) {
                        echo '<option value="' . esc_attr( $category->term_id ) . '">' . esc_html( $category->name ) . '</option>';
                    }
                    ?>
                </select>
                <div class="blog-mobile-filter-chevron" aria-hidden="true">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.168l3.71-3.938a.75.75 0 1 1 1.08 1.04l-4.25 4.51a.75.75 0 0 1-1.08 0l-4.25-4.51a.75.75 0 0 1 .02-1.06Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="hidden overflow-x-auto no-scrollbar md:block">
        <nav id="blog-category-nav" class="flex justify-center space-x-8 md:space-x-12 min-w-max">
            <!-- 'Todos' Link -->
            <a id="blog-filter-all" class="text-primary font-medium border-b-2 border-primary pb-1 font-rowdies italic text-lg" href="#">
                Todos
            </a>
            
            <?php
            foreach ( $categories as $category ) {
                echo '<a href="#" class="category-filter-link text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-colors font-rowdies text-lg" data-cat-id="' . esc_attr( $category->term_id ) . '">' . esc_html( $category->name ) . '</a>';
            }
            ?>
        </nav>
        </div>
    </div>
</div>

<?php if ( $show_featured_post ) : ?>
<?php
// QUERY: Featured Post (Latest 1)
$featured_query = new WP_Query([
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'ignore_sticky_posts' => 1
]);

if ( $featured_query->have_posts() ) :
    while ( $featured_query->have_posts() ) : $featured_query->the_post();
        $feat_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        $author_id = get_the_author_meta( 'ID' );
        $author_name = get_the_author();
        $date = get_the_date( 'd M Y' );
?>
<!-- FEATURED ARTICLE -->
<section class="container mx-auto px-6 max-w-7xl sm:px-6 lg:px-8 py-16 md:py-24">
    <div class="relative group cursor-pointer" onclick="window.location.href='<?php the_permalink(); ?>'">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-center">
            
            <!-- Image -->
            <div class="relative aspect-[4/3] lg:aspect-[3/4] xl:aspect-[4/3] overflow-hidden rounded-2xl shadow-xl">
                    <img 
                        alt="<?php the_title_attribute(); ?>" 
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" 
                        src="<?php echo esc_url($feat_img_url ? $feat_img_url : 'https://via.placeholder.com/800x600'); ?>"
                    />
            </div>

            <!-- Content -->
            <div class="flex min-w-0 max-w-[620px] flex-col justify-center space-y-6">
                <div class="flex items-center space-x-3 text-sm font-medium text-primary tracking-wider uppercase">
                    <span class="w-8 h-[1px] bg-primary"></span>
                    <span>Artículo Destacado</span>
                </div>
                
                <h2 class="max-w-[14ch] font-rowdies text-4xl md:text-5xl lg:text-6xl text-gray-900 dark:text-white font-bold leading-tight break-words">
                        <?php the_title(); ?>
                </h2>
                
                <div class="flex items-center space-x-2 text-gray-500 dark:text-gray-400 text-sm">
                    <span>Por Viajes Ukiyo</span>
                    <span>•</span>
                    <span><?php echo esc_html($date); ?></span>
                </div>
                
                <div class="text-lg text-gray-500 dark:text-gray-400 font-light leading-relaxed line-clamp-4">
                    <?php the_excerpt(); ?>
                </div>

                <div class="pt-4">
                    <button class="inline-flex items-center px-8 py-3 border border-gray-900 dark:border-white text-gray-900 dark:text-white rounded-full hover:bg-primary hover:border-primary hover:text-white dark:hover:bg-primary dark:hover:border-primary transition-all duration-300 font-medium">
                        Continuar leyendo
                        <?php echo ukiyo_icon( 'arrow_forward', 'ml-2 text-sm' ); ?>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>
<?php 
    endwhile; 
    wp_reset_postdata(); 
endif; 
?>
<?php endif; ?>

<!-- MASONRY GRID -->
<section class="container mx-auto px-6 bg-gray-50 dark:bg-gray-800 py-16 md:py-24 transition-colors">
    <div class="max-w-7xl mx-auto">
        <!-- Masonry Container identified for AJAX -->
        <div id="blog-posts-grid" class="masonry-grid">
            
            <?php
            // QUERY: Remaining Posts (Offset 1)
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 6,
                'paged'          => $paged,
                'offset'         => $show_featured_post ? 1 : 0,
            );
            
            // Fix for pagination with offset
            if ( $show_featured_post && $paged > 1 ) {
                 $args['offset'] = ( ($paged - 1) * 6 ) + 1;
            }

            $grid_query = new WP_Query( $args );

            if ( $grid_query->have_posts() ) :
                while ( $grid_query->have_posts() ) : $grid_query->the_post();
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
                    
                    <!-- Category Badge (Kept from Blog design as it's useful info) -->
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
                                Por Viajes Ukiyo
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
            else:
            ?>
                <p class="text-center w-full py-10 text-gray-500">No hay más artículos.</p>
            <?php 
            endif;
            wp_reset_postdata();
            ?>
            
        </div>
        
        <div class="text-center mt-12">
            <?php
            // Simple Pagination Link
            echo paginate_links([
                'total' => $grid_query->max_num_pages,
                'prev_text' => 'Anterior',
                'next_text' => 'Siguiente'
            ]);
            ?>
        </div>
    </div>
</section>

<!-- AJAX SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filters = document.querySelectorAll('.category-filter-link');
    const gridContainer = document.getElementById('blog-posts-grid');
    const nav = document.getElementById('blog-category-nav');
    const allLink = document.getElementById('blog-filter-all');
    const mobileSelect = document.getElementById('blog-category-select');
    
    // Prevent default on "Todos" too
    if(allLink){
        allLink.addEventListener('click', function(e){
            e.preventDefault();
            loadPosts('');
            updateActiveState(this);
        });
    }

    if (mobileSelect) {
        mobileSelect.addEventListener('change', function() {
            loadPosts(this.value);
            updateActiveStateByCategory(this.value);
        });
    }

    filters.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const catId = this.dataset.catId;
            loadPosts(catId);
            updateActiveState(this);
        });
    });

    function updateActiveState(activeLink) {
        // Reset all
        nav.querySelectorAll('a').forEach(el => {
            el.classList.remove('text-primary', 'border-b-2', 'border-primary');
            el.classList.add('text-gray-500', 'dark:text-gray-400');
        });
        // Set active
        activeLink.classList.remove('text-gray-500', 'dark:text-gray-400');
        activeLink.classList.add('text-primary', 'border-b-2', 'border-primary');

        if (mobileSelect) {
            mobileSelect.value = activeLink.id === 'blog-filter-all' ? '' : (activeLink.dataset.catId || '');
        }
    }

    function updateActiveStateByCategory(categoryId) {
        if (!nav) return;

        const activeLink = categoryId
            ? nav.querySelector('[data-cat-id="' + categoryId + '"]')
            : allLink;

        if (activeLink) {
            updateActiveState(activeLink);
        }
    }

    function loadPosts(categoryId) {
        // Add loading state
        gridContainer.style.opacity = '0.5';
        
        const data = new FormData();
        data.append('action', 'ukiyo_filter_blog');
        data.append('cat_id', categoryId);

        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            body: data
        })
        .then(response => response.text())
        .then(html => {
            gridContainer.innerHTML = html;
            gridContainer.style.opacity = '1';
            // Re-initialize any JS plugins if needed (like standard WP embeds)
        })
        .catch(err => {
            console.error('Error fetching posts:', err);
            gridContainer.style.opacity = '1';
        });
    }
});
</script>

<!-- PLAN YOUR TRIP CTA -->
<section class="py-12 bg-background text-text-secondary">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
              <h2 class="text-display font-rowdies mb-6 reveal-on-scroll">
                    ¿Listo para el viaje de tu vida?
                </h2>
              <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Diseña un viaje único y a medida. Cuéntanos tus sueños y nosotros nos encargamos de hacerlos realidad, cuidando cada detalle.
                </p>
              <div class="flex flex-col items-stretch sm:flex-row sm:items-center gap-4 justify-center reveal-on-scroll delay-200">
                  <a href="https://wa.me/message/CS2LNI6YHSETO1" target="_blank" class="btn-primary blog-cta-button text-text-secondary">
                        <img width="64" height="64" src="https://img.icons8.com/cotton/64/whatsapp--v4.png" alt="Contactar con Viajes Ukiyo por WhatsApp" class="blog-cta-icon"/>
                        <span>Planifica tu viaje ahora</span>
                  </a>
                  <a href="<?php echo esc_url( ukiyo_get_route_url( 'reviews' ) ); ?>" 
                    class="btn-primary blog-cta-button text-text-secondary">
                      Lee nuestras Historias
                  </a>
              </div>
          </div>
      </div>
</section>

<!-- INSTAGRAM MOCKUP -->
<section class="container mx-auto px-6 py-16 md:py-24 bg-[#F2EFE9] dark:bg-[#1F1F1F]">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-end mb-10">
            <div>
                <h3 class="font-rowdies text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">@viajes.ukiyo</h3>
                <p class="text-gray-500 dark:dark:text-gray-400 mt-1 font-light italic">Sigue nuestras aventuras</p>
            </div>
            <a class="sm:inline-flex items-center text-primary font-medium hover:underline" href="https://www.instagram.com/viajes.ukiyo" target="_blank" rel="noopener noreferrer">
                Ver Instagram <?php echo ukiyo_icon( 'north_east', 'text-sm ml-1' ); ?>
            </a>    
        </div>
        <div class="instagram-feed-container flex justify-center">
            <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
