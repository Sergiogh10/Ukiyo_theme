<?php
/*
 * Template Name: Viajes de Autor
 * Description: Landing premium de viajes de autor con estilo UKIYO.
 */
get_header();
$uri = get_template_directory_uri();
?>

<main id="primary" class="relative">
  <!-- HERO -->
<section class="relative pt-24 pb-20 overflow-hidden font-satoshi bg-surface">
  <div class="absolute inset-0 opacity-5">
    <svg class="w-full h-full" viewBox="0 0 100 100" fill="currentColor">
      <pattern id="cultural-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
        <circle cx="10" cy="10" r="2" opacity="0.3"/>
        <path d="M5 5l10 10M15 5l-10 10" stroke="currentColor" stroke-width="0.5" opacity="0.2"/>
      </pattern>
      <rect width="100%" height="100%" fill="url(#cultural-pattern)"/>
    </svg>
  </div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="max-w-4xl mx-auto text-center">
      <span class="inline-block px-4 py-2 bg-primary-100 text-primary rounded-full text-sm font-satoshi font-medium mb-6">
        Premium
      </span>
      <h1 class="text-hero font-satoshi-bold text-text-primary mb-6">
        Viajes de <span class="text-primary">autor</span>
      </h1>
      <p class="text-xl font-satoshi text-text-secondary max-w-3xl mx-auto leading-relaxed">
        No son tours. Son relatos vivos: el ojo del fotógrafo que espera la luz, la voz del guía que creció allí, el aroma del café al amanecer y la conversación con un artesano local. La historia te lleva; el “reservar ahora” surge solo.
      </p>
    </div>
  </div>
</section>

  <!-- LISTADO AUTORES / VIAJES -->
  <section id="viajes" class="bg-surface">
    <div class="container mx-auto px-6 md:px-8 py-12 md:py-16">
      <div class="grid gap-8 md:grid-cols-2">
        <!-- Card Luis -->
        <article class="group rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md shadow-sm overflow-hidden flex flex-col">
          <figure class="aspect-[16/9] overflow-hidden">
            <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/pantanal6.jpg" alt="Fotografía en Pantanal por Luis" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02]" loading="lazy" />
          </figure>
          <div class="p-6 md:p-7 flex-1 flex flex-col">
            <div class="flex items-center gap-3">
              <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/luisacuña.png" alt="Luis, guía y fotógrafo" class="w-12 h-12 rounded-full object-cover ring-1 ring-border/60" loading="lazy" />
              <div>
                <h3 class="text-xl font-semibold text-text-primary">Pantanal de Brasil, tras el rastro del jaguar</h3>
                <p class="text-sm text-text-secondary">Por Luis · Guía costarricense y fotógrafo de naturaleza</p>
              </div>
            </div>
            <p class="mt-4 text-text-secondary">Un viaje fotográfico de campo: madrugadas en bote, humedales infinitos y la paciencia necesaria para ese instante en el que aparece el jaguar. Bajo demanda, ritmo pausado y enfoque naturalista.</p>
            <div class="mt-5 flex items-center gap-3 text-sm text-text-tertiary">
              <span>Duración sugerida: 8–10 días</span>
              <span class="px-2">·</span>
              <span>Grupos reducidos</span>
            </div>
            <div class="mt-6 flex items-center gap-3">
              <a href="<?php echo esc_url( get_permalink( get_page_by_path('pantanal') ) ); ?>" class="inline-flex items-center rounded-lg ring-1 ring-border/70 bg-white/80 backdrop-blur-md text-text-primary hover:bg-white px-4 py-2.5 text-sm">Descubre su aventura</a>
              <!-- <a href="<?php echo esc_url( home_url('/contacto') ); ?>" class="inline-flex items-center rounded-lg ring-1 ring-border/70 bg-white/80 backdrop-blur-md text-text-primary hover:bg-white px-4 py-2.5 text-sm">Consultar precio</a> -->
            </div>
          </div>
        </article>

        <!-- Card Moha -->
        <article class="group rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md shadow-sm overflow-hidden flex flex-col">
          <figure class="aspect-[16/9] overflow-hidden">
            <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/marruecos7.jpg" alt="Dunas del Sáhara en Merzouga con Moha" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02]" loading="lazy" />
          </figure>
          <div class="p-6 md:p-7 flex-1 flex flex-col">
            <div class="flex items-center gap-3">
              <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/luisacuña.png" alt="Moha, guía bereber" class="w-12 h-12 rounded-full object-cover ring-1 ring-border/60" loading="lazy" />
              <div>
                <h3 class="text-xl font-semibold text-text-primary">Merzouga íntimo: desierto, medinas y hospitalidad bereber</h3>
                <p class="text-sm text-text-secondary">Por Moha · Guía marroquí, nacido en el Atlas</p>
              </div>
            </div>
            <p class="mt-4 text-text-secondary">Entre kasbahs, té a la menta y cielos que crujen de estrellas. Ritmo sin prisas, paradas donde tiene sentido y noches en campamentos escogidos por su silencio.</p>
            <div class="mt-5 flex items-center gap-3 text-sm text-text-tertiary">
              <span>Duración sugerida: 5 días</span>
              <span class="px-2">·</span>
              <span>Grupos reducidos</span>
            </div>
            <div class="mt-6 flex items-center gap-3">
              <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajedeautormoha') ) ); ?>" class="inline-flex items-center rounded-lg ring-1 ring-border/70 bg-white/80 backdrop-blur-md text-text-primary hover:bg-white px-4 py-2.5 text-sm">Descubre su aventura</a>
              <!-- <a href="<?php echo esc_url( home_url('/contacto') ); ?>" class="inline-flex items-center rounded-lg ring-1 ring-border/70 bg-white/80 backdrop-blur-md text-text-primary hover:bg-white px-4 py-2.5 text-sm">Consultar precio</a> -->
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- CÓMO FUNCIONA -->
  <section class="bg-surface">
    <div class="container mx-auto px-6 md:px-8 py-12 md:py-16">
      <div class="max-w-5xl mx-auto">
        <h2 class="text-2xl md:text-3xl font-semibold text-text-primary">Cómo funciona</h2>
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
  <section class="bg-surface">
    <div class="container mx-auto px-6 md:px-8 pb-12 md:pb-16">
      <div class="rounded-2xl ring-1 ring-border/60 bg-white/70 backdrop-blur-md p-6">
        <h2 class="text-2xl md:text-3xl font-semibold text-text-primary">Los autores</h2>
        <div class="mt-6 grid gap-6 md:grid-cols-2">
          <div class="flex gap-4 items-start">
            <img src="<?php echo esc_url($uri.'/images/viajesautor/luis.jpg'); ?>" alt="Luis" class="w-16 h-16 rounded-full object-cover ring-1 ring-border/60" />
            <div>
              <h3 class="font-semibold text-text-primary">Luis · Guía costarricense y fotógrafo</h3>
              <p class="text-text-secondary">Lleva años esperando la luz justa en humedales y bosques tropicales. Su Pantanal es silencio, paciencia y respeto por la fauna.</p>
            </div>
          </div>
          <div class="flex gap-4 items-start">
            <img src="<?php echo esc_url($uri.'/images/viajesautor/moha.jpg'); ?>" alt="Moha" class="w-16 h-16 rounded-full object-cover ring-1 ring-border/60" />
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
    <div class="container mx-auto px-6 md:px-8 pb-16">
      <div class="grid gap-8 md:grid-cols-2">
        <div class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md p-6">
          <h3 class="font-semibold text-text-primary">Preguntas frecuentes</h3>
          <div class="mt-4 space-y-3">
            <details class="group rounded-lg ring-1 ring-border/60 bg-white/70 p-4">
              <summary class="cursor-pointer font-medium text-text-primary">¿Las fechas son fijas?</summary>
              <div class="mt-2 text-sm text-text-secondary">No. Son bajo demanda. Ajustamos ritmo y duración a tu disponibilidad.</div>
            </details>
            <details class="group rounded-lg ring-1 ring-border/60 bg-white/70 p-4">
              <summary class="cursor-pointer font-medium text-text-primary">¿Cómo reservo?</summary>
              <div class="mt-2 text-sm text-text-secondary">Escríbenos o solicita “Descubrir su aventura”. Te contactaremos para definir fechas, alcance y logística.</div>
            </details>
            <details class="group rounded-lg ring-1 ring-border/60 bg-white/70 p-4">
              <summary class="cursor-pointer font-medium text-text-primary">¿Hay plazas limitadas?</summary>
              <div class="mt-2 text-sm text-text-secondary">Sí. Grupos reducidos para mantener la experiencia íntima.</div>
            </details>
          </div>
        </div>
        <div class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md p-6">
          <h3 class="font-semibold text-text-primary">¿Prefieres hablarlo?</h3>
          <p class="mt-2 text-text-secondary">Cuéntanos qué buscas y diseñamos tu experiencia con el autor que mejor encaje.</p>
          <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="inline-flex items-center rounded-lg ring-1 ring-border/70 bg-white/80 backdrop-blur-md text-text-primary hover:bg-white px-4 py-2.5 text-sm">Planifica tu viaje</a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
