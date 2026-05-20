<?php
/*
 * Template Name: Viajes de Autor
 * Description: Landing premium de viajes de autor con estilo UKIYO.
 */
get_header();
?>

<main id="primary" class="relative">
  <!-- HERO -->
<style>
  .hero-responsive { height: 100vh; }
  @media (min-width: 1024px) {
    .hero-responsive { height: auto !important; min-height: 50vh !important; }
  }
</style>
<section class="hero-responsive relative flex items-center justify-center overflow-hidden pt-32 pb-16 font-satoshi">
  <div class="absolute inset-0 w-full h-full">
    <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-autor-ukiyo-indonesia-orangutan.jpg"
         alt="Viajes de autor"
         class="w-full h-full object-cover mask-image"
         loading="eager"
         fetchpriority="high"
         decoding="async" />
    <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
  </div>

  <div class="relative z-10 w-full">
    <div class="container mx-auto px-6">
      <div class="max-w-4xl mx-auto text-center">
      <?php
      ukiyo_render_breadcrumbs([
          'class'      => 'mb-6 justify-center text-white/80',
          'link_class' => 'text-white/80 hover:text-white transition-colors',
      ]);
      ?>
      <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">
        Premium
      </span>
      <h1 class="text-hero md:text-6xl lg:text-hero font-rowdies text-white mb-6 text-shadow">
        Viajes de <span class="text-accent-300">autor</span>
      </h1>
      <p class="text-xl font-satoshi text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
        No son tours. Son relatos vivos: el ojo del fotógrafo que espera la luz, la voz del guía que creció allí, el aroma del café al amanecer y la conversación con un artesano local. La historia te lleva; el “reservar ahora” surge solo.
      </p>
    </div>
  </div>
</section>

  <!-- LISTADO AUTORES / VIAJES -->
<section id="viajes" class="bg-surface">
  <div class="container mx-auto px-6 md:px-8 py-12 md:py-16">

    <?php
    // Paginación: página actual
    $paged = max( 1, get_query_var('paged'), get_query_var('page') );

    $viajes_query = new WP_Query([
      'post_type'      => 'viaje_autor',
      'post_status'    => 'publish',
      'posts_per_page' => 6,
      'paged'          => $paged,
      'orderby'        => 'date',
      'order'          => 'DESC',
    ]);
    ?>

    <?php if ( $viajes_query->have_posts() ) : ?>
      <div class="grid gap-8 md:grid-cols-2">
        <?php while ( $viajes_query->have_posts() ) : $viajes_query->the_post(); ?>

          <?php
          // Opcionales: campos personalizados (si los quieres usar luego)
          $autor_subtitulo = get_post_meta( get_the_ID(), 'autor_subtitulo', true ); // ej: "Guía costarricense y fotógrafo..."
          $duracion        = get_post_meta( get_the_ID(), 'duracion_viaje', true );   // ej: "8 días"
          $grupos          = get_post_meta( get_the_ID(), 'grupos_viaje', true );     // ej: "Grupos reducidos"
          $precio_desde = get_post_meta( get_the_ID(), 'precio_desde', true );
          ?>

          <article class="group rounded-2xl border-2 border-black bg-white/80 backdrop-blur-md shadow-sm overflow-hidden flex flex-col">
            <a href="<?php the_permalink(); ?>">
              <figure class="aspect-[16/9] overflow-hidden">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'large', [
                    'class'   => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] mask-image',
                    'loading' => 'lazy',
                    'decoding' => 'async',
                  ] ); ?>
                <?php else : ?>
                  <img 
                    src="<?php echo get_template_directory_uri(); ?>/images/placeholders/viaje-autor-placeholder.jpg"
                    alt="<?php the_title_attribute(); ?>"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] mask-image"
                    loading="lazy"
                  />
                <?php endif; ?>
              </figure>
            </a>

            <div class="p-6 md:p-7 flex-1 flex flex-col">
              <div class="flex items-center gap-3">
                <?php
                // Avatar opcional: si algún día quieres usar un campo personalizado 'autor_avatar'
                $autor_avatar = get_post_meta( get_the_ID(), 'autor_avatar', true );
                if ( $autor_avatar ) : ?>
                  <img 
                    src="<?php echo esc_url( $autor_avatar ); ?>"
                    alt="<?php the_title_attribute(); ?>"
                    class="w-12 h-12 rounded-full object-cover ring-1 ring-border/60"
                    loading="lazy"
                  />
                <?php endif; ?>

                <div>
                  <h3 class="text-xl font-rowdies">
                    <a href="<?php the_permalink(); ?>" 
                      class="text-text-primary hover:text-accent">
                      <?php the_title(); ?>
                    </a>
                  </h3>
                  <p class="text-sm text-text-secondary font-satoshi">
                    <?php
                    if ( $autor_subtitulo ) {
                      echo esc_html( $autor_subtitulo );
                    } else {
                      // Fallback: nombre del autor de WP
                      printf( 'Por %s', esc_html( get_the_author() ) );
                    }
                    ?>
                  </p>
                </div>
              </div>

              <?php if ( has_excerpt() ) : ?>
                <p class="mt-4 text-text-secondary">
                  <?php echo get_the_excerpt(); ?>
                </p>
              <?php endif; ?>

              <!-- Meta pills + precio -->
              <div class="flex items-center justify-between gap-4 py-2">
                <!-- Pills a la izquierda -->
                <div class="flex flex-wrap items-center gap-2 text-sm">
                  <?php if ( $duracion ) : ?>
                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">
                      <?php echo esc_html( $duracion ); ?>
                    </span>
                  <?php endif; ?>

                  <?php if ( $grupos ) : ?>
                    <span class="bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">
                      <?php echo esc_html( $grupos ); ?>
                    </span>
                  <?php endif; ?>
                </div>

                <!-- Precio a la derecha -->
                <?php if ( $precio_desde ) : ?>
                  <div class="text-2xl text-text-secondary whitespace-nowrap">
                    Desde
                    <span class="font-semibold text-text-primary">
                      <?php echo esc_html( $precio_desde ); ?>
                    </span>
                  </div>
                <?php endif; ?>
              </div>
          </article>

        <?php endwhile; ?>
      </div>

      <!-- Paginación -->
      <div class="mt-10 flex justify-center">
        <?php
        $links = paginate_links([
          'total'     => $viajes_query->max_num_pages,
          'current'   => $paged,
          'mid_size'  => 1,
          'prev_text' => '&laquo; Anterior',
          'next_text' => 'Siguiente &raquo;',
          'type'      => 'list', // 🔹 esto hace que devuelva <ul><li>...</li></ul>
        ]);

        if ( $links ) {
          echo '<nav class="pagination" aria-label="Paginación de viajes de autor">';
          echo $links;
          echo '</nav>';
        }
        ?>
      </div>

    <?php else : ?>
      <p class="text-text-secondary">
        Aún no hay viajes de autor publicados. Pronto habrá aventuras por aquí.
      </p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
  </div>
</section>

  <section class="py-20 bg-surface">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-display font-satoshi text-text-primary mb-4">
          Cómo <span class="text-primary">funciona</span>
        </h2>
        <br>
        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8 relative">
          <!-- Step 1 -->
          <div class="relative rounded-2xl bg-white shadow-sm ring-1 ring-border/60 p-6">
            <!-- number bubble -->
            <span class="absolute -top-4 left-6 inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#D4A574] text-white font-semibold">1</span>
            <h3 class="mt-3 font-semibold text-text-primary text-lg">Conecta con el autor</h3>
            <p class="mt-2 text-text-secondary text-sm leading-relaxed">Lee su historia, mira sus fotos y entiende su mirada del destino.</p>
            <!-- arrow to next (desktop) -->
            <span class="hidden md:block absolute top-1/2 -right-5 -translate-y-1/2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#D4A574]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
              </svg>
            </span>
          </div>

          <!-- Step 2 -->
          <div class="relative rounded-2xl bg-white shadow-sm ring-1 ring-border/60 p-6">
            <span class="absolute -top-4 left-6 inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#D4A574] text-white font-semibold">2</span>
            <h3 class="mt-3 font-semibold text-text-primary text-lg">Definimos tu viaje</h3>
            <p class="mt-2 text-text-secondary text-sm leading-relaxed">Fechas bajo demanda, ritmo y enfoque a tu medida. Plazas limitadas.</p>
            <span class="hidden md:block absolute top-1/2 -right-5 -translate-y-1/2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#D4A574]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
              </svg>
            </span>
          </div>

          <!-- Step 3 -->
          <div class="relative rounded-2xl bg-white shadow-sm ring-1 ring-border/60 p-6">
            <span class="absolute -top-4 left-6 inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#D4A574] text-white font-semibold">3</span>
            <h3 class="mt-3 font-semibold text-text-primary text-lg">Lo organizamos desde dentro</h3>
            <p class="mt-2 text-text-secondary text-sm leading-relaxed">Operado por gente de allí, con la calma y la autenticidad de UKIYO.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- AUTORES (mini bios) -->
  <section class="py-20 bg-surface">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-display font-satoshi text-text-primary mb-4">
          Los <span class="text-primary">autores</span>
        </h2>
        <br>
        <div class="mt-6 grid gap-6 md:grid-cols-2">
          <div class="flex gap-4 items-start">
            <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/viaje-de-autor-al-pantanal-con-guia-experto-luis-acuna.jpg" alt="Luis Acuña, guía costarricense y fotógrafo de naturaleza" class="w-16 h-16 rounded-full object-cover ring-1 ring-border/60" />
            <div>
              <h3 class="font-semibold text-text-primary">Luis · Guía costarricense y fotógrafo</h3>
              <p class="text-text-secondary">Lleva años esperando la luz justa en humedales y bosques tropicales. Su Pantanal es silencio, paciencia y respeto por la fauna.</p>
            </div>
          </div>
          <div class="flex gap-4 items-start">
            <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viaje-de-autor-a-marruecos-con-guia-local-moha.jpg" alt="Moha, guía marroquí y anfitrión local" class="w-16 h-16 rounded-full object-cover ring-1 ring-border/60" />
            <div>
              <h3 class="font-semibold text-text-primary">Moha · Guía marroquí</h3>
              <p class="text-text-secondary">Nacido en el Atlas, conoce el desierto por dentro: los zocos que importan, los silencios que merecen la pena y el té en el lugar adecuado.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="bg-surface">
    <div class="container mx-auto px-6 md:px-8 pb-12">
      <h2 class="text-display font-satoshi-bold mb-6">Preguntas frecuentes</h2>

      <?php $viajes_autor_faqs = ukiyo_get_viajes_autor_faqs(); ?>
      <div data-accordion class="space-y-3">
        <?php foreach ( $viajes_autor_faqs as $index => $faq ) : ?>
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn
                  class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-<?php echo esc_attr( $index + 1 ); ?>" id="faq-<?php echo esc_attr( $index + 1 ); ?>-h">
            <span class="font-medium text-text-primary"><?php echo esc_html( $faq['question'] ); ?></span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
            </svg>
          </button>
          <div id="faq-<?php echo esc_attr( $index + 1 ); ?>" role="region" aria-labelledby="faq-<?php echo esc_attr( $index + 1 ); ?>-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            <?php echo esc_html( $faq['answer'] ); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-20 bg-gradient-primary text-white">
      <div class="container mx-auto px-6 text-center">
          <div class="max-w-3xl mx-auto">
              <h2 class="text-display font-crimson mb-6">
                  ¿Listo para el viaje de tu vida?
              </h2>
              <p class="text-xl mb-8 opacity-90">
                  Todo viaje empieza con una conversación.
                  Cuéntanos qué te inspira y crearemos juntos una experiencia que te haga vivir el mundo de otra forma.
              </p>
              <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                  <a href="<?php echo esc_url( ukiyo_get_route_url('plan_trip') ); ?>" 
                    class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 transition-all duration-300 shadow-soft">
                      Hablemos de tu viaje
                  </a>
                  <a href="<?php echo esc_url( ukiyo_get_route_url('destinations') ); ?>" 
                    class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300">
                      Explorar destinos a medida
                  </a>
              </div>
          </div>
      </div>
  </section>

<?php get_footer(); ?>

<script>
document.addEventListener('click', (e) => {
  const btn = e.target.closest('[data-accordion-btn]');
  if (!btn) return;
  const item = btn.closest('[data-accordion-item]');
  const panel = item.querySelector('[data-accordion-panel]');
  const group = item.parentElement;

  // Cerrar los que estén abiertos (acordeón exclusivo)
  group.querySelectorAll('[data-accordion-btn][aria-expanded="true"]').forEach(b => {
    if (b !== btn) {
      b.setAttribute('aria-expanded', 'false');
      const p = b.closest('[data-accordion-item]').querySelector('[data-accordion-panel]');
      p.classList.add('hidden');
      b.querySelector('svg')?.classList.remove('rotate-180');
    }
  });

  // Toggle actual
  const open = btn.getAttribute('aria-expanded') === 'true';
  btn.setAttribute('aria-expanded', String(!open));
  panel.classList.toggle('hidden', open);
  btn.querySelector('svg')?.classList.toggle('rotate-180', !open);
});
</script>
