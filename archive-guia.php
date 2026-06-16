<?php
if ( ! defined('ABSPATH') ) exit;
get_header();

// 1) Leer filtros del GET
$search      = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
$region      = isset($_GET['region']) ? sanitize_text_field($_GET['region']) : '';
$nivel       = isset($_GET['nivel']) ? sanitize_text_field($_GET['nivel']) : '';
$experiencia = isset($_GET['experiencia']) ? sanitize_text_field($_GET['experiencia']) : '';
$duracion    = isset($_GET['duracion']) ? sanitize_text_field($_GET['duracion']) : '';

// 2) Construir tax_query
$tax_query = ['relation' => 'AND'];
if ( $region )      $tax_query[] = ['taxonomy' => 'region',      'field' => 'slug', 'terms' => $region];
if ( $nivel )       $tax_query[] = ['taxonomy' => 'nivel',       'field' => 'slug', 'terms' => $nivel];
if ( $experiencia ) $tax_query[] = ['taxonomy' => 'experiencia', 'field' => 'slug', 'terms' => $experiencia];
// Si ninguna tax está filtrando, vaciamos tax_query para no afectar rendimiento
if ( count($tax_query) === 1 ) $tax_query = [];

// 3) Construir meta_query para “duración” (ajusta a tu meta real)
$meta_query = [];
if ( $duracion ) {
  // Ejemplo: guardas en meta_key 'duracion_dias' un INT
  $rango = [
    '1-3'   => [1, 3],
    '4-7'   => [4, 7],
    '8-14'  => [8, 14],
    '15plus'=> [15, 365]
  ];
  if ( isset($rango[$duracion]) ) {
    $meta_query[] = [
      'key'     => 'duracion_dias',
      'value'   => $rango[$duracion],
      'type'    => 'NUMERIC',
      'compare' => 'BETWEEN'
    ];
  }
}

// 4) Paginación
$paged = max(1, get_query_var('paged') ?: (int)($_GET['paged'] ?? 1));

// 5) Query principal
$args = [
  'post_type'      => 'guia',
  's'              => $search,
  'paged'          => $paged,
  'posts_per_page' => 6,
  'tax_query'      => $tax_query,
  'meta_query'     => $meta_query,
];
$query = new WP_Query($args);

// Helper para selected()
function sel($a,$b){ echo selected($a,$b,false); }
?>

<!-- Hero Section -->
<section class="pt-24 pb-16 bg-gradient-warm">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto text-center">
      <h1 class="text-hero font-crimson text-text-primary mb-6">
        Guías y <span class="text-primary">Consejos</span> de Viaje
      </h1>
      <p class="text-xl text-text-secondary mb-8 max-w-3xl mx-auto leading-relaxed">
        Descubre destinos únicos con nuestras guías expertas. Consejos prácticos, secretos locales y
        experiencias auténticas para transformar cada viaje en una aventura cultural memorable.
      </p>

  <!-- FILTROS -->
      <form id="guides-filters" class="flex flex-col md:flex-row gap-4 max-w-4xl" method="get" action="<?php echo esc_url(get_post_type_archive_link('guia')); ?>">

      <!-- Búsqueda -->
      <div class="relative flex-1">
        <input type="text" name="s" value="<?php echo esc_attr($search); ?>" placeholder="Buscar destino o guía..." class="input-field pl-12"/>
          <svg class="w-5 h-5 text-text-secondary absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
      </div>

      <!-- Región -->
      <select class="input-field md:w-48" name="region" id="region-filter">
        <option value=""><?php _e('Todas','ukiyo'); ?></option>
        <?php foreach( get_terms(['taxonomy'=>'region','hide_empty'=>true]) as $t ): ?>
        <option value="<?php echo esc_attr($t->slug); ?>" <?php sel($region,$t->slug); ?>>
        <?php echo esc_html($t->name); ?>
        </option>
        <?php endforeach; ?>
      </select>

      <!-- Duración -->
      <select class="input-field md:w-48" name="duracion" id="duration-filter">
        <option value=""><?php _e('Todas','ukiyo'); ?></option>
        <option value="1-3"    <?php sel($duracion,'1-3'); ?>>1-3 días</option>
        <option value="4-7"    <?php sel($duracion,'4-7'); ?>>4-7 días</option>
        <option value="8-14"   <?php sel($duracion,'8-14'); ?>>8-14 días</option>
        <option value="15plus" <?php sel($duracion,'15plus'); ?>>15+ días</option>
      </select>

      <!-- Nivel -->
      <select class="input-field md:w-48" name="nivel" id="nivel-filter">
        <option value=""><?php _e('Todas','ukiyo'); ?></option>
        <?php foreach( get_terms(['taxonomy'=>'nivel','hide_empty'=>true]) as $t ): ?>
        <option value="<?php echo esc_attr($t->slug); ?>" <?php sel($nivel,$t->slug); ?>>
            <?php echo esc_html($t->name); ?>
        </option>
        <?php endforeach; ?>
        </select>

        <!-- Experiencia -->
        <select class="input-field md:w-48" name="experiencia" id="exp-filter">
        <option value=""><?php _e('Todas','ukiyo'); ?></option>
        <?php foreach( get_terms(['taxonomy'=>'experiencia','hide_empty'=>true]) as $t ): ?>
        <option value="<?php echo esc_attr($t->slug); ?>" <?php sel($experiencia,$t->slug); ?>>
            <?php echo esc_html($t->name); ?>
        </option>
        <?php endforeach; ?>
        </select>

        <button class="btn-primary md:ml-2">Filtrar</button>
        <a href="<?php echo esc_url(get_post_type_archive_link('guia')); ?>" class="input-field md:w-auto flex items-center justify-center">
            Restablecer
        </a>
        </form>
    </div>
  </div>
</section>  <!-- 👈 cierre del Hero -->


<!-- LISTADO -->
<section class="py-12 bg-white">
  <div class="container mx-auto px-6">
    <div class="max-w-7xl mx-auto">

      <?php if ( $query->have_posts() ): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
          <?php while( $query->have_posts() ): $query->the_post(); 
            $duracion_dias = (int) get_post_meta(get_the_ID(),'duracion_dias',true);
            $nivel_term    = wp_get_post_terms(get_the_ID(),'nivel');
            $nivel_txt     = $nivel_term ? $nivel_term[0]->name : '';
            $exp_terms     = wp_get_post_terms(get_the_ID(),'experiencia', ['fields'=>'names']);
            $badge_duracion = $duracion_dias ? (
              $duracion_dias <= 3  ? '1-3 días' :
              ($duracion_dias <= 7 ? '4-7 días' :
              ($duracion_dias <=14 ? '8-14 días' : '15+ días'))
            ) : '';
          ?>
          <article class="group/card w-full cursor-pointer" onclick="window.location.href='<?php the_permalink(); ?>'">
            <div class="relative w-full overflow-hidden rounded-2xl mb-6 aspect-[16/10]">
              <?php if ( has_post_thumbnail() ) : ?>
                <img src="<?php echo esc_url(get_the_post_thumbnail_url(null,'large')); ?>"
                     alt="<?php the_title_attribute(); ?>"
                     class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-500">
              <?php else : ?>
                <img src="https://images.pexels.com/photos/2404370/pexels-photo-2404370.webp"
                     alt="<?php the_title_attribute(); ?>"
                     class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-500">
              <?php endif; ?>

              <div class="absolute inset-0 bg-gradient-to-t from-primary-900/80 via-transparent to-transparent"></div>

              <!-- Badges -->
              <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                <?php if ($badge_duracion): ?>
                  <span class="bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium">
                    <?php echo esc_html($badge_duracion); ?>
                  </span>
                <?php endif; ?>
                <?php if (!empty($exp_terms)): ?>
                  <span class="bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium">
                    <?php echo esc_html($exp_terms[0]); ?>
                  </span>
                <?php endif; ?>
              </div>

              <!-- Overlay -->
              <div class="absolute bottom-0 left-0 right-0 p-6">
                <h3 class="text-2xl font-crimson text-white mb-2"><?php the_title(); ?></h3>
                <div class="flex flex-wrap items-center gap-4 text-white/80 text-sm">
                  <?php if ($badge_duracion): ?>
                    <div class="flex items-center">
                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                      </svg>
                      <?php echo esc_html($badge_duracion); ?>
                    </div>
                  <?php endif; ?>
                  <?php if ($nivel_txt): ?>
                    <div class="flex items-center">
                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                      </svg>
                      Nivel: <?php echo esc_html($nivel_txt); ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </article>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <!-- Paginación -->
        <div class="mt-8">
          <?php
            echo paginate_links([
              'total'     => $query->max_num_pages,
              'current'   => $paged,
              'prev_text' => '« Anterior',
              'next_text' => 'Siguiente »',
            ]);
          ?>
        </div>

      <?php else: ?>
        <div class="max-w-2xl">
          <div class="bg-surface p-8 rounded-xl">
            <h3 class="text-xl font-medium mb-2">No encontramos guías con esos filtros</h3>
            <p class="text-text-secondary mb-4">Prueba a cambiar o limpiar los filtros.</p>
            <a class="btn-secondary" href="<?php echo esc_url(get_post_type_archive_link('guia')); ?>">Ver todas</a>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<script>
(function(){
  const form = document.getElementById('guides-filters');
  ['region-filter','duration-filter','nivel-filter','exp-filter'].forEach(id=>{
    const el=document.getElementById(id);
    if(el) el.addEventListener('change', ()=> form.submit());
  });
})();
</script>

<?php get_footer();