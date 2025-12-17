<?php
/*
 * Template Name: Viajes de Autor
 * Description: Landing premium de viajes de autor con estilo UKIYO.
 */
get_header();
?>

<main id="primary" class="relative">
  <!-- HERO -->
  <section class="relative flex items-center justify-center overflow-hidden" style="min-height: 50vh; padding-top: 8rem; padding-bottom: 4rem;">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full">
      <img src="<?php echo get_template_directory_uri(); ?>/images/heroimages/viajes-autor-ukiyo-pantanal4.jpg" 
           alt="Viajes de autor" 
           class="w-full h-full object-cover mask-image" 
           loading="eager" />
      <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
    </div>

    <!-- Contenido Hero - Centrado -->
    <div class="relative z-10 w-full">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
          <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">
            Premium
          </span>
          <h1 class="text-hero md:text-6xl lg:text-hero font-satoshi text-white mb-6 text-shadow">
            Viajes de <span class="text-accent-300">autor</span>
          </h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
            No son tours. Son relatos vivos: el ojo del fotógrafo que espera la luz, la voz del guía que creció allí, el aroma del café al amanecer y la conversación con un artesano local. La historia te lleva; el "reservar ahora" surge solo.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- LISTADO AUTORES / VIAJES -->
<section id="viajes" class="bg-background">
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

          <article class="group rounded-2xl border-2 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">
            <a href="<?php the_permalink(); ?>">
              <figure class="aspect-[16/9] overflow-hidden bg-surface">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'large', [
                    'class'   => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] mask-image',
                    'loading' => 'lazy',
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
                  <h3 class="text-xl font-satoshi font-semibold">
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
                    <span class="btn-primary text-text-secondary px-3 py-1 rounded-full text-sm font-medium">
                      <?php echo esc_html( $duracion ); ?>
                    </span>
                  <?php endif; ?>

                  <?php if ( $grupos ) : ?>
                    <span class="btn-primary text-text-secondary px-3 py-1 rounded-full text-sm font-medium">
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
      <div class="mt-10 flex justify-center margin-top-8">
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

  <section class="py-20 bg-background">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-display font-satoshi text-text-primary mb-4">
          Cómo <span class="text-primary">funciona</span>
        </h2>
        <p class="text-text-secondary max-w-2xl mx-auto">Tu viaje en 4 pasos sencillos</p>
      </div>

      <!-- Process Steps -->
      <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          
          <!-- Step 1: Solicitud -->
          <div class="relative group">
            <div class="bg-background rounded-3xl p-8 border-2 hover:shadow-xl hover:-translate-y-2 h-full flex flex-col transition-all duration-300" style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
              <!-- Step Number -->
              <div class="absolute -top-4 -left-4 w-16 h-16 bg-text-primary text-white rounded-full flex items-center justify-center font-satoshi font-bold text-2xl shadow-lg">
                01
              </div>
              
              <!-- Icon -->
              <div class="w-16 h-16 mx-auto mb-6 mt-4 bg-white/30 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-text-primary" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                  <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                  <path d="M8 10h.01M12 10h.01M16 10h.01"/>
                </svg>
              </div>
              
              <!-- Content -->
              <h3 class="text-2xl font-bold text-text-primary mb-3 text-center font-satoshi">Solicitud</h3>
              <p class="text-text-primary/80 text-center leading-relaxed">Rellenas el formulario con tus datos</p>
            </div>
          </div>

          <!-- Step 2: Reserva -->
          <div class="relative group">
            <div class="bg-background rounded-3xl p-8 border-2 hover:shadow-xl hover:-translate-y-2 h-full flex flex-col transition-all duration-300" style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
              <!-- Step Number -->
              <div class="absolute -top-4 -left-4 w-16 h-16 bg-text-primary text-white rounded-full flex items-center justify-center font-satoshi font-bold text-2xl shadow-lg">
                02
              </div>
              
              <!-- Icon -->
              <div class="w-16 h-16 mx-auto mb-6 mt-4 bg-white/30 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-text-primary" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                  <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                  <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
              </div>
              
              <!-- Content -->
              <h3 class="text-2xl font-bold text-text-primary mb-3 text-center font-satoshi">Reserva</h3>
              <p class="text-text-primary/80 text-center leading-relaxed">Abonas el depósito y aseguras tu plaza</p>
            </div>
          </div>

          <!-- Step 3: Confirmación -->
          <div class="relative group">
            <div class="bg-background rounded-3xl p-8 border-2 hover:shadow-xl hover:-translate-y-2 h-full flex flex-col transition-all duration-300" style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
              <!-- Step Number -->
              <div class="absolute -top-4 -left-4 w-16 h-16 bg-text-primary text-white rounded-full flex items-center justify-center font-satoshi font-bold text-2xl shadow-lg">
                03
              </div>
              
              <!-- Icon -->
              <div class="w-16 h-16 mx-auto mb-6 mt-4 bg-white/30 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-text-primary" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                  <polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
              </div>
              
              <!-- Content -->
              <h3 class="text-2xl font-bold text-text-primary mb-3 text-center font-satoshi">Confirmación</h3>
              <p class="text-text-primary/80 text-center leading-relaxed">En menos de 24 horas comprobamos disponibilidad</p>
            </div>
          </div>

          <!-- Step 4: Contacto -->
          <div class="relative group">
            <div class="bg-background rounded-3xl p-8 border-2 hover:shadow-xl hover:-translate-y-2 h-full flex flex-col transition-all duration-300" style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
              <!-- Step Number -->
              <div class="absolute -top-4 -left-4 w-16 h-16 bg-text-primary text-white rounded-full flex items-center justify-center font-satoshi font-bold text-2xl shadow-lg">
                04
              </div>
              
              <!-- Icon -->
              <div class="w-16 h-16 mx-auto mb-6 mt-4 bg-white/30 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-text-primary" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                  <path d="M12 2v20M2 12h20"/>
                  <circle cx="12" cy="12" r="10"/>
                </svg>
              </div>
              
              <!-- Content -->
              <h3 class="text-2xl font-bold text-text-primary mb-3 text-center font-satoshi">Contacto</h3>
              <p class="text-text-primary/80 text-center leading-relaxed">El autor te escribe personalmente y te guía desde el inicio</p>
            </div>
          </div>

        </div>

        <!-- CTA Button -->
        <div class="text-center mt-12 mb-4">
          <a href="<?php echo esc_url( get_permalink( get_page_by_path('formularioautor') ) ); ?>" 
             class="btn-primary text-text-secondary inline-block">
            Completa el formulario
          </a>
        </div>

        <!-- Connection Line (visible on desktop) -->
        <div class="hidden lg:block relative pointer-events-none">
          <svg class="w-full h-2" style="margin-top: 4rem;">
            <line x1="12%" y1="0" x2="88%" y2="0" stroke="#F6CF66" stroke-width="3" stroke-dasharray="8,8" opacity="0.3"/>
          </svg>
        </div>
      </div>
    </div>
  </section>

  <!-- AUTORES (mini bios) -->
  <section class="py-10 bg-background">
  <div class="container mx-auto px-6">
    
    <div class="text-center">
      <h2 class="text-display font-satoshi text-text-primary mb-2">
        Los <span class="text-primary">autores</span>
      </h2>
    </div>

    <div class="grid gap-8 md:grid-cols-4">

      <!-- CARD LUIS -->
      <article class="rounded-2xl border-1 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <!-- Imagen más pequeña -->
        <div class="aspect-[5/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/autor-luis.png"
            alt="Luis Acuña, guía costarricense"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] bg-background mask-image"
          />
        </div>

        <!-- Texto más compacto -->
        <div class="p-4">
          <h3 class="text-base font-semibold text-text-primary">
            Luis · Guía costarricense y fotógrafo
          </h3>
          <p class="text-text-secondary mt-1 text-sm leading-relaxed">
            Lleva años esperando la luz justa en humedales y bosques tropicales. 
            Su Pantanal es silencio, paciencia y respeto por la fauna.
          </p>
        </div>

      </article>


      <!-- CARD MOHA -->
      <article class="rounded-2xl border-1 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <div class="aspect-[5/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/autor-moha2.png"
            alt="Moha, guía marroquí"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] bg-background mask-image"
          />
        </div>

        <div class="p-4">
          <h3 class="text-base font-semibold text-text-primary">
            Moha · Guía marroquí
          </h3>
          <p class="text-text-secondary mt-1 text-sm leading-relaxed">
            Nacido en el Atlas, conoce el desierto por dentro: los zocos que importan, 
            los silencios que merecen la pena y el té en el lugar adecuado.
          </p>
        </div>

      </article>

      <!-- CARD DAVID -->
      <article class="rounded-2xl border-1 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <div class="aspect-[5/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/david/autor-david.png"
            alt="David, emprendedor balines"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] bg-background mask-image"
          />
        </div>

        <div class="p-4">
          <h3 class="text-base font-semibold text-text-primary">
            David · Guía y emprendedor balinés
          </h3>
          <p class="text-text-secondary mt-1 text-sm leading-relaxed">
            Conoce cada carretera y atajo de la isla. Su empresa de transporte es sinónimo de seguridad y sonrisas, llevándote a los rincones secretos de Bali lejos del tráfico habitual.
          </p>
        </div>

      </article>

    </div>

  </div>
</section>

  <!-- FAQ -->
 <section class="py-20 bg-background">
  <div class="container mx-auto px-6">
    
    <div class="text-center mb-16">
      <h2 class="text-display font-satoshi text-text-primary mb-2">
        Preguntas <span class="text-primary">frecuentes</span>
      </h2>
    </div>

      <div class="flex w-full flex-col gap-4 overflow-hidden" data-accordion-new>
        
        <!-- Item 1 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-background">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-1" aria-expanded="false" aria-controls="faq-panel-1">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Cómo me apunto a la expedición?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-1" role="region" aria-hidden="true" aria-labelledby="faq-btn-1" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>Haz clic en “Reservar ahora” o “Consultar precio” y completa el formulario. Confirmamos disponibilidad por email (o llamada si lo prefieres). La plaza queda bloqueada al realizar el depósito de reserva.</p>
            </div>
          </div>
        </div>

        <!-- Item 2 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-gray-50">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-2" aria-expanded="false" aria-controls="faq-panel-2">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Cuándo y cómo tengo que pagar?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-2" role="region" aria-hidden="true" aria-labelledby="faq-btn-2" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>Depósito para confirmar plaza y resto antes de la salida (fecha en la confirmación). Aceptamos transferencia y tarjeta. Recibirás factura y justificante.</p>
            </div>
          </div>
        </div>

        <!-- Item 3 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-gray-50">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-3" aria-expanded="false" aria-controls="faq-panel-3">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Cómo hago para llegar al punto de inicio de la expedición?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-3" role="region" aria-hidden="true" aria-labelledby="faq-btn-3" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>Tras reservar, enviamos dossier con aeropuerto recomendado, horarios y opciones de traslado. Podemos coordinar tu llegada o darte instrucciones para el punto de encuentro.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-20 bg-background text-text-secondary">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
              <h2 class="text-display font-satoshi mb-6 reveal-on-scroll">
                    ¿Listo para el viaje de tu vida?
                </h2>
              <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Todo viaje empieza con una conversación.
                  Cuéntanos qué te inspira y crearemos juntos una experiencia que te haga vivir el mundo de otra forma.
                </p>
              <div class="flex flex-col sm:flex-row gap-4 justify-center reveal-on-scroll delay-200">
                  <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" 
                    class="btn-primary text-text-secondary">
                      Hablemos de tu viaje
                  </a>
                  <a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" 
                    class="btn-primary text-text-secondary">
                      Ver más destinos
                  </a>
              </div>
          </div>
      </div>
  </section>

<?php get_footer(); ?>

<script>
document.addEventListener('click', (e) => {
  // Buscar el botón closest que tenga aria-controls (para nuestra nueva estructura)
  const btn = e.target.closest('button[aria-controls]');
  if (!btn) return;
  
  // Ver si es parte de nuestro nuevo acordeón
  const container = btn.closest('[data-accordion-new]');
  if (!container) return; // Si no es de nuestro acordeón, salir (para no interferir con otros scripts si los hay)

  const panelId = btn.getAttribute('aria-controls');
  const panel = document.getElementById(panelId);
  if (!panel) return;
  
  // Cerrar otros (accordion behavior)
  container.querySelectorAll('button[aria-expanded="true"]').forEach(otherBtn => {
    if (otherBtn !== btn) {
      otherBtn.setAttribute('aria-expanded', 'false');
      const otherPanel = document.getElementById(otherBtn.getAttribute('aria-controls'));
      if (otherPanel) {
        otherPanel.style.gridTemplateRows = '0fr';
        otherPanel.style.opacity = '0';
        otherPanel.setAttribute('aria-hidden', 'true');
        otherBtn.querySelector('svg')?.classList.remove('rotate-180');
      }
    }
  });

  // Toggle actual
  const isOpen = (btn.getAttribute('aria-expanded') === 'true');
  btn.setAttribute('aria-expanded', String(!isOpen));
  panel.setAttribute('aria-hidden', String(isOpen));
  
  if (!isOpen) {
    // Abrir
    panel.style.gridTemplateRows = '1fr';
    panel.style.opacity = '1';
    btn.querySelector('svg')?.classList.add('rotate-180');
  } else {
    // Cerrar
    panel.style.gridTemplateRows = '0fr';
    panel.style.opacity = '0';
    btn.querySelector('svg')?.classList.remove('rotate-180');
  }
});
</script>
