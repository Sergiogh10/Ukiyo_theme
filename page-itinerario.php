<?php
/*
 * Template Name: Itinerario
 * Description: Itinerario
 */

get_header();
?>

<main>

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
        Itinerario
      </span>
      <h1 class="text-hero font-satoshi-bold text-text-primary mb-6">
        Visualiza tu <span class="text-primary">viaje</span>
      </h1>
    </div>
  </div>
</section>

<!-- Itinerario -->
<section class="py-20 bg-white">
  <div class="container mx-auto px-6">
    <nav class="flex justify-center border-b border-surface bg-background/80 backdrop-blur-sm py-4">
      <ul class="flex flex-wrap justify-center space-x-6 text-sm md:text-base font-medium">
        <li><a href="#itinerary" class="text-text-secondary hover:text-primary transition-colors duration-300">Itinerario</a></li>
        <li><a href="#includes" class="text-text-secondary hover:text-primary transition-colors duration-300">¿Qué incluye?</a></li>
        <li><a href="#faqs" class="text-text-secondary hover:text-primary transition-colors duration-300">FAQs</a></li>
        <li><a href="#best-time" class="text-text-secondary hover:text-primary transition-colors duration-300">Mejores épocas</a></li>
      </ul>
    </nav>
  </div>

<!-- Trip Route / Timeline -->
<section id="trip-route" class="py-16 bg-white">
  <div class="container mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-display font-crimson text-text-primary mb-3">
        Ruta del <span class="text-primary">Viaje</span>
      </h2>
      <p class="text-lg text-text-secondary max-w-2xl mx-auto">
        Etapas conectadas en un recorrido claro. Abre cada “stop” para ver estancia, introducción y actividades.
      </p>
    </div>

    <div class="timeline space-y-10">

    <!-- Llegada -->
      <article class="timeline-item border-surface rounded-lg overlow-hidden mb-12 text-center">
        <!-- rail + dot -->
        <div class="timeline-rail" aria-hidden="true">
          <div class="timeline-icon absolute inset-x-0 mx-auto translate-x-[6px] z-10 top-[84px]">
            <svg fill="#f0f0f0" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-55.54 -55.54 666.48 666.48" xml:space="preserve" stroke="#f0f0f0" class="w-12 h-12">
              <g id="SVGRepo_bgCarrier" stroke-width="0">
                <rect x="-55.54" y="-55.54" width="666.48" height="666.48" rx="333.24" fill="#8b4512" strokewidth="0"></rect>
              </g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <g>
                  <g>
                    <path d="M554.048,185.274c-7.838-19.746-67.729-26.958-97.809-15.248c-19.825,7.716-79.059,31.442-79.059,31.442l-128.373,51.04 l-145.854,58.006L6.555,268.949c-2.072-0.881-4.477-0.186-5.744,1.697c-1.267,1.861-1.032,4.372,0.572,5.953l67.313,67.032 c-1.485,7.404,1.354,11.841,1.354,11.841c-5.604,2.557-8.298,9.043-6.017,14.824c2.32,5.807,8.774,8.679,14.619,6.638 c0.663,0.706,4.23,4.193,8.041,7.879c6.182,5.998,15.302,7.825,23.322,4.679l194.513-76.312l-47.371,51.486 c-3.188,3.478-3.099,8.815,0.203,12.187c1.546,1.564,3.108,3.146,4.667,4.723c3.128,3.146,8.07,3.479,11.599,0.82l160.66-121.336 l51.174-20.12C534.999,222.317,561.899,205.026,554.048,185.274z"></path>
                    <path d="M203.877,238.87l48.356,3.54l112.981-44.925l-161.461,17.201c-4.405,0.47-7.778,4.106-7.907,8.533 c-0.063,2.213-0.123,4.433-0.175,6.64C195.571,234.571,199.174,238.534,203.877,238.87z"></path>
                  </g>
                </g>
              </g>
            </svg>
          </div>
        </div>

        <!-- content -->
        <div class="card overflow-hidden">
          <!-- Header -->
          <header class="flex items-center justify-start border-surface cursor-pointer select-none bg-white hover:bg-surface/50 transition-colors" onclick="toggleTripSection(this)">
            <h3 class="text-xl font-crimson text-text-primary text-center">Llegada a Denpasar (Bali)</h3>
          </header>
        </div>
      </article>

      <!-- STOP 1 -->
      <article class="timeline-item border-surface rounded-lg overlow-hidden mb-12">
        <!-- rail + dot -->
        <div class="timeline-rail relative">
          <div class="timeline-icon absolute inset-x-0 mx-auto translate-x-[50%] z-10 top-[84px]">
            <svg
              fill="#fcfbfa"
              viewBox="-51.2 -51.2 614.40 614.40"
              id="_x30_1"
              version="1.1"
              xml:space="preserve"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              stroke="#fcfbfa"
              class="w-12 h-12"
            >
              <g id="SVGRepo_bgCarrier" stroke-width="0">
                <rect
                  x="-51.2"
                  y="-51.2"
                  width="614.40"
                  height="614.40"
                  rx="307.2"
                  fill="#8b4512"
                  strokewidth="0"
                ></rect>
              </g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <g>
                  <path
                    d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z
                    M350.797,328.86 L275.9,403.757C270.622,409.035,263.464,412,256,412c-7.464,0-14.622-2.965-19.9-8.243l-74.896-74.897
                    c-52.355-52.355-52.355-137.239,0-189.594l0,0c52.354-52.355,137.238-52.355,189.593,0l0,0
                    C403.151,191.621,403.151,276.505,350.797,328.86z"
                  ></path>
                  <circle cx="256" cy="234.062" r="48.75"></circle>
                </g>
              </g>
            </svg>
          </div>
        </div>

        <!-- content -->
        <div class="card overflow-hidden">
          <!-- Header -->
          <header class="flex items-center justify-start border-surface cursor-pointer select-none bg-white hover:bg-surface/50 transition-colors" onclick="toggleTripSection(this)">
            <div class="flex">
              <!-- icon -->
              <div>
                <h3 class="text-xl font-crimson text-text-primary">Ubud, Bali</h3>
                <p class="text-text-secondary">3 noches</p>
              </div>
              <button
                type="button"
                class="accordion-trigger inline-flex items-center justify-center w-8 h-8 text-primary"
                aria-expanded="false"
                aria-controls="ubud-panel"
                onclick="toggleTripSection(this)">
                <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
              </button>
            </div>
          </header>

          <!-- Hero / Panorámica -->
          <div id="ubud-panel" class="trip-hidden-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white">
              <!-- Hero / Panorámica -->
              <div class="aspect-[16/9] w-full overflow-hidden rounded-lg">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/indonesia/indonesia1.jpg"
                  alt="Panorámica de arrozales en Ubud"
                  class="w-full h-full object-cover"
                  loading="lazy"
                  onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;"
                />
              </div>

          <!-- Body -->
          <div class="p-6 space-y-8">
            <!-- Introduction -->
            <section>
              <h4 class="font-semibold text-text-primary mb-2">Introducción</h4>
              <p class="text-text-secondary">
                Bienvenido al corazón cultural de Bali. Entre templos, talleres artesanales y arrozales, Ubud es la base perfecta
                para sumergirte sin prisas en la espiritualidad balinesa.
              </p>
            </section>

            <!-- Your Stay -->
            <section>
              <h4 class="font-semibold text-text-primary mb-2">Hospedaje</h4>
              <p class="text-text-secondary">
                Eco-guesthouse boutique a 10 min del centro. Habitaciones con ventilación natural, desayuno local y
                jardín privado. Traslados incluidos.
              </p>
            </section>

            <!-- Activities (carousel version) -->
            <section id="ubud-details" class="relative">
              <div class="flex items-center justify-between mb-3">
                <h4 class="font-semibold text-text-primary">Actividades</h4>
                <span class="text-xs text-text-secondary">Encontrarás más en el PDF</span>
              </div>

              <!-- Carousel wrapper -->
              <div id="ubud-activities-carousel" class="group relative">
                <!-- Track -->
                <div class="carousel-track flex gap-4 overflow-hidden snap-x snap-mandatory scroll-smooth pb-2 -mx-6 px-6">
                  <!-- card -->
                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-primary" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3-8a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Ceremonia en Tirta Empul</p>
                    </div>
                    <p class="text-xs text-text-secondary">Ritual de purificación guiado por un sacerdote local.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-secondary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 7h18M3 12h18M3 17h18"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Taller de Batik</p>
                    </div>
                    <p class="text-xs text-text-secondary">Aprende técnicas de cera y tintes naturales con maestros artesanos.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v8m-4-4h8"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Cocina con familia local</p>
                    </div>
                    <p class="text-xs text-text-secondary">Recorrido por huerto y clase de cocina tradicional balinesa.</p>
                  </div>

                  <!-- Test cards for horizontal scrolling -->
                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-secondary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2v-6H3v6a2 2 0 002 2z"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Mercado de Ubud</p>
                    </div>
                    <p class="text-xs text-text-secondary">Paseo temprano entre puestos de fruta, flores y artesanía local.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3v7h6v-7c0-1.657-1.343-3-3-3zM6 11h12"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Bosque de los Monos</p>
                    </div>
                    <p class="text-xs text-text-secondary">Sendero sombreado entre templos y macacos. Recomendado con guía.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l3-2 3 2 3-2 3 2 3-2 3 2v6H3z"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Campuhan Ridge Walk</p>
                    </div>
                    <p class="text-xs text-text-secondary">Ruta panorámica al atardecer entre colinas y arrozales.</p>
                  </div>
                </div>

                <!-- Controls -->
                <button type="button"
                  class="carousel-prev opacity-0 group-hover:opacity-100 transition-opacity absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 bg-white/90 border border-surface shadow-sm rounded-full w-8 h-8 flex items-center justify-center"
                  aria-label="Anterior">
                  <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                  </svg>
                </button>
                <button type="button"
                  class="carousel-next opacity-0 group-hover:opacity-100 transition-opacity absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 bg-white/90 border border-surface shadow-sm rounded-full w-8 h-8 flex items-center justify-center"
                  aria-label="Siguiente">
                  <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
                </button>
              </div>
            </section>
          </div>
        </div>
      </article>

      <!-- STOP 2 -->
      <article class="timeline-item border-surface rounded-lg overlow-hidden mb-12">
        <!-- rail + dot -->
        <div class="timeline-rail relative">
          <div class="timeline-icon absolute inset-x-0 mx-auto translate-x-[50%] z-10 top-[84px]">
            <svg
              fill="#fcfbfa"
              viewBox="-51.2 -51.2 614.40 614.40"
              id="_x30_1"
              version="1.1"
              xml:space="preserve"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              stroke="#fcfbfa"
              class="w-12 h-12"
            >
              <g id="SVGRepo_bgCarrier" stroke-width="0">
                <rect
                  x="-51.2"
                  y="-51.2"
                  width="614.40"
                  height="614.40"
                  rx="307.2"
                  fill="#8b4512"
                  strokewidth="0"
                ></rect>
              </g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <g>
                  <path
                    d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z
                    M350.797,328.86 L275.9,403.757C270.622,409.035,263.464,412,256,412c-7.464,0-14.622-2.965-19.9-8.243l-74.896-74.897
                    c-52.355-52.355-52.355-137.239,0-189.594l0,0c52.354-52.355,137.238-52.355,189.593,0l0,0
                    C403.151,191.621,403.151,276.505,350.797,328.86z"
                  ></path>
                  <circle cx="256" cy="234.062" r="48.75"></circle>
                </g>
              </g>
            </svg>
          </div>
        </div>

        <!-- content -->
        <div class="card overflow-hidden">
          <!-- Header -->
          <header class="flex items-center justify-start border-surface cursor-pointer select-none bg-white hover:bg-surface/50 transition-colors" onclick="toggleTripSection(this)">
            <div class="flex">
              <!-- icon -->
              <div>
                <h3 class="text-xl font-crimson text-text-primary">Ubud, Bali</h3>
                <p class="text-text-secondary">3 noches</p>
              </div>
              <button
                type="button"
                class="accordion-trigger inline-flex items-center justify-center w-8 h-8 text-primary"
                aria-expanded="false"
                aria-controls="ubud-panel"
                onclick="toggleTripSection(this)">
                <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
              </button>
            </div>
          </header>

          <!-- Hero / Panorámica -->
          <div id="ubud-panel" class="trip-hidden-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white">
              <!-- Hero / Panorámica -->
              <div class="aspect-[16/9] w-full overflow-hidden rounded-lg">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/indonesia/indonesia1.jpg"
                  alt="Panorámica de arrozales en Ubud"
                  class="w-full h-full object-cover"
                  loading="lazy"
                  onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;"
                />
              </div>

          <!-- Body -->
          <div class="p-6 space-y-8">
            <!-- Introduction -->
            <section>
              <h4 class="font-semibold text-text-primary mb-2">Introducción</h4>
              <p class="text-text-secondary">
                Bienvenido al corazón cultural de Bali. Entre templos, talleres artesanales y arrozales, Ubud es la base perfecta
                para sumergirte sin prisas en la espiritualidad balinesa.
              </p>
            </section>

            <!-- Your Stay -->
            <section>
              <h4 class="font-semibold text-text-primary mb-2">Hospedaje</h4>
              <p class="text-text-secondary">
                Eco-guesthouse boutique a 10 min del centro. Habitaciones con ventilación natural, desayuno local y
                jardín privado. Traslados incluidos.
              </p>
            </section>

            <!-- Activities (carousel version) -->
            <section id="ubud-details" class="relative">
              <div class="flex items-center justify-between mb-3">
                <h4 class="font-semibold text-text-primary">Actividades</h4>
                <span class="text-xs text-text-secondary">Encontrarás más en el PDF</span>
              </div>

              <!-- Carousel wrapper -->
              <div id="ubud-activities-carousel" class="group relative">
                <!-- Track -->
                <div class="carousel-track flex gap-4 overflow-hidden snap-x snap-mandatory scroll-smooth pb-2 -mx-6 px-6">
                  <!-- card -->
                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-primary" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3-8a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Ceremonia en Tirta Empul</p>
                    </div>
                    <p class="text-xs text-text-secondary">Ritual de purificación guiado por un sacerdote local.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-secondary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 7h18M3 12h18M3 17h18"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Taller de Batik</p>
                    </div>
                    <p class="text-xs text-text-secondary">Aprende técnicas de cera y tintes naturales con maestros artesanos.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v8m-4-4h8"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Cocina con familia local</p>
                    </div>
                    <p class="text-xs text-text-secondary">Recorrido por huerto y clase de cocina tradicional balinesa.</p>
                  </div>

                  <!-- Test cards for horizontal scrolling -->
                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-secondary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2v-6H3v6a2 2 0 002 2z"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Mercado de Ubud</p>
                    </div>
                    <p class="text-xs text-text-secondary">Paseo temprano entre puestos de fruta, flores y artesanía local.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3v7h6v-7c0-1.657-1.343-3-3-3zM6 11h12"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Bosque de los Monos</p>
                    </div>
                    <p class="text-xs text-text-secondary">Sendero sombreado entre templos y macacos. Recomendado con guía.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l3-2 3 2 3-2 3 2 3-2 3 2v6H3z"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Campuhan Ridge Walk</p>
                    </div>
                    <p class="text-xs text-text-secondary">Ruta panorámica al atardecer entre colinas y arrozales.</p>
                  </div>
                </div>

                <!-- Controls -->
                <button type="button"
                  class="carousel-prev opacity-0 group-hover:opacity-100 transition-opacity absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 bg-white/90 border border-surface shadow-sm rounded-full w-8 h-8 flex items-center justify-center"
                  aria-label="Anterior">
                  <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                  </svg>
                </button>
                <button type="button"
                  class="carousel-next opacity-0 group-hover:opacity-100 transition-opacity absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 bg-white/90 border border-surface shadow-sm rounded-full w-8 h-8 flex items-center justify-center"
                  aria-label="Siguiente">
                  <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
                </button>
              </div>
            </section>
          </div>
        </div>
      </article>

      <!-- STOP 3 -->
      <article class="timeline-item border-surface rounded-lg overlow-hidden mb-12">
        <!-- rail + dot -->
        <div class="timeline-rail relative">
          <div class="timeline-icon absolute inset-x-0 mx-auto translate-x-[50%] z-10 top-[84px]">
            <svg
              fill="#fcfbfa"
              viewBox="-51.2 -51.2 614.40 614.40"
              id="_x30_1"
              version="1.1"
              xml:space="preserve"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              stroke="#fcfbfa"
              class="w-12 h-12"
            >
              <g id="SVGRepo_bgCarrier" stroke-width="0">
                <rect
                  x="-51.2"
                  y="-51.2"
                  width="614.40"
                  height="614.40"
                  rx="307.2"
                  fill="#8b4512"
                  strokewidth="0"
                ></rect>
              </g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <g>
                  <path
                    d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z
                    M350.797,328.86 L275.9,403.757C270.622,409.035,263.464,412,256,412c-7.464,0-14.622-2.965-19.9-8.243l-74.896-74.897
                    c-52.355-52.355-52.355-137.239,0-189.594l0,0c52.354-52.355,137.238-52.355,189.593,0l0,0
                    C403.151,191.621,403.151,276.505,350.797,328.86z"
                  ></path>
                  <circle cx="256" cy="234.062" r="48.75"></circle>
                </g>
              </g>
            </svg>
          </div>
        </div>

        <!-- content -->
        <div class="card overflow-hidden">
          <!-- Header -->
          <header class="flex items-center justify-start border-surface cursor-pointer select-none bg-white hover:bg-surface/50 transition-colors" onclick="toggleTripSection(this)">
            <div class="flex">
              <!-- icon -->
              <div>
                <h3 class="text-xl font-crimson text-text-primary">Ubud, Bali</h3>
                <p class="text-text-secondary">3 noches</p>
              </div>
              <button
                type="button"
                class="accordion-trigger inline-flex items-center justify-center w-8 h-8 text-primary"
                aria-expanded="false"
                aria-controls="ubud-panel"
                onclick="toggleTripSection(this)">
                <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
              </button>
            </div>
          </header>

          <!-- Hero / Panorámica -->
          <div id="ubud-panel" class="trip-hidden-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white">
              <!-- Hero / Panorámica -->
              <div class="aspect-[16/9] w-full overflow-hidden rounded-lg">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/indonesia/indonesia1.jpg"
                  alt="Panorámica de arrozales en Ubud"
                  class="w-full h-full object-cover"
                  loading="lazy"
                  onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;"
                />
              </div>

          <!-- Body -->
          <div class="p-6 space-y-8">
            <!-- Introduction -->
            <section>
              <h4 class="font-semibold text-text-primary mb-2">Introducción</h4>
              <p class="text-text-secondary">
                Bienvenido al corazón cultural de Bali. Entre templos, talleres artesanales y arrozales, Ubud es la base perfecta
                para sumergirte sin prisas en la espiritualidad balinesa.
              </p>
            </section>

            <!-- Your Stay -->
            <section>
              <h4 class="font-semibold text-text-primary mb-2">Hospedaje</h4>
              <p class="text-text-secondary">
                Eco-guesthouse boutique a 10 min del centro. Habitaciones con ventilación natural, desayuno local y
                jardín privado. Traslados incluidos.
              </p>
            </section>

            <!-- Activities (carousel version) -->
            <section id="ubud-details" class="relative">
              <div class="flex items-center justify-between mb-3">
                <h4 class="font-semibold text-text-primary">Actividades</h4>
                <span class="text-xs text-text-secondary">Encontrarás más en el PDF</span>
              </div>

              <!-- Carousel wrapper -->
              <div id="ubud-activities-carousel" class="group relative">
                <!-- Track -->
                <div class="carousel-track flex gap-4 overflow-hidden snap-x snap-mandatory scroll-smooth pb-2 -mx-6 px-6">
                  <!-- card -->
                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-primary" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3-8a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Ceremonia en Tirta Empul</p>
                    </div>
                    <p class="text-xs text-text-secondary">Ritual de purificación guiado por un sacerdote local.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-secondary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 7h18M3 12h18M3 17h18"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Taller de Batik</p>
                    </div>
                    <p class="text-xs text-text-secondary">Aprende técnicas de cera y tintes naturales con maestros artesanos.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v8m-4-4h8"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Cocina con familia local</p>
                    </div>
                    <p class="text-xs text-text-secondary">Recorrido por huerto y clase de cocina tradicional balinesa.</p>
                  </div>

                  <!-- Test cards for horizontal scrolling -->
                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-secondary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2v-6H3v6a2 2 0 002 2z"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Mercado de Ubud</p>
                    </div>
                    <p class="text-xs text-text-secondary">Paseo temprano entre puestos de fruta, flores y artesanía local.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3v7h6v-7c0-1.657-1.343-3-3-3zM6 11h12"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Bosque de los Monos</p>
                    </div>
                    <p class="text-xs text-text-secondary">Sendero sombreado entre templos y macacos. Recomendado con guía.</p>
                  </div>

                  <div class="carousel-card snap-start shrink-0 p-4 rounded-lg border border-surface bg-surface/50">
                    <div class="flex items-center gap-2 mb-2">
                      <svg class="w-4 h-4 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l3-2 3 2 3-2 3 2 3-2 3 2v6H3z"/>
                      </svg>
                      <p class="font-medium text-text-primary text-sm">Campuhan Ridge Walk</p>
                    </div>
                    <p class="text-xs text-text-secondary">Ruta panorámica al atardecer entre colinas y arrozales.</p>
                  </div>
                </div>

                <!-- Controls -->
                <button type="button"
                  class="carousel-prev opacity-0 group-hover:opacity-100 transition-opacity absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 bg-white/90 border border-surface shadow-sm rounded-full w-8 h-8 flex items-center justify-center"
                  aria-label="Anterior">
                  <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                  </svg>
                </button>
                <button type="button"
                  class="carousel-next opacity-0 group-hover:opacity-100 transition-opacity absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 bg-white/90 border border-surface shadow-sm rounded-full w-8 h-8 flex items-center justify-center"
                  aria-label="Siguiente">
                  <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
                </button>
              </div>
            </section>
          </div>
        </div>
      </article>

</main>


<?php get_footer(); ?>

<script>
function toggleTripSection(btn){
  const content = document.getElementById(btn.getAttribute('aria-controls'));
  const expanded = btn.getAttribute('aria-expanded') === 'true';
  // cerrar si estaba abierto
  if (expanded) {
    btn.setAttribute('aria-expanded', 'false');
    content.style.maxHeight = '0';
    content.classList.remove('open');
    btn.querySelector('svg').style.transform = 'rotate(0deg)';
  } else {
    // si quieres que solo haya uno abierto, cierra los demás:
    document.querySelectorAll('.accordion-trigger[aria-expanded="true"]').forEach(otherBtn => {
      otherBtn.setAttribute('aria-expanded','false');
      const otherPanel = document.getElementById(otherBtn.getAttribute('aria-controls'));
      otherPanel.style.maxHeight = '0';
      otherPanel.classList.remove('open');
      otherBtn.querySelector('svg').style.transform = 'rotate(0deg)';
    });
    // abrir este
    btn.setAttribute('aria-expanded', 'true');
    content.style.maxHeight = content.scrollHeight + 'px';
    content.classList.add('open');
    btn.querySelector('svg').style.transform = 'rotate(180deg)';
  }
}
// re-calcula altura si cambian contenidos (por ej., imágenes cargadas)
window.addEventListener('load', () => {
  document.querySelectorAll('.trip-hidden-content.open').forEach(panel => {
    panel.style.maxHeight = panel.scrollHeight + 'px';
  });
});
</script>

<script>
function positionTimelineIcons() {
  document.querySelectorAll('.timeline-item').forEach(item => {
    const rail   = item.querySelector('.timeline-rail');
    const icon   = rail && rail.querySelector('.timeline-icon');
    const header = item.querySelector('header');        // el header que contiene el h3
    const h3     = header ? header.querySelector('h3') : null;
    if (!rail || !icon || !header || !h3) return;

    // Top del icono = alineado con el centro vertical del H3 (ajústalo a tu gusto)
    const headerTop   = header.offsetTop;
    const h3Top       = h3.offsetTop;
    const h3Middle    = h3Top + (h3.offsetHeight / 2);
    const targetTop   = headerTop + h3Middle;

    // Ajuste fino opcional por tipografía/óptica (px). Cambia a 0 si lo quieres exacto.
    const tweak = -2;

    icon.style.top = (targetTop + tweak) + 'px';

    // Asegura que el icono está centrado horizontalmente en el rail
    icon.style.left = '0';
    icon.style.right = '0';
    icon.style.marginLeft = 'auto';
    icon.style.marginRight = 'auto';
  });
}

window.addEventListener('load', positionTimelineIcons);
window.addEventListener('resize', positionTimelineIcons);
// si tu fuente carga tarde:
if (document.fonts && document.fonts.ready) {
  document.fonts.ready.then(positionTimelineIcons);
}
</script>

<style>
/* Hide horizontal scrollbar where supported */
.no-scrollbar::-webkit-scrollbar { display: none; }
.no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<style>
  /* Carousel layout: show 2 cards per view on desktop, 1 on mobile */
  .carousel-track { scroll-behavior: smooth; }
  .carousel-card { flex: 0 0 calc(50% - 0.5rem); } /* two cards per view (gap = 1rem) */
  @media (max-width: 768px){
    .carousel-card { flex: 0 0 100%; } /* one card per view on mobile */
  }
</style>

<script>
(function(){
  function attachCarousel(root){
    const track = root.querySelector('.carousel-track');
    if (!track) return;
    const prev = root.querySelector('.carousel-prev');
    const next = root.querySelector('.carousel-next');

    function getStep(){
      // visible width of the track (viewport)
      return track.clientWidth; 
    }

    function scrollByStep(dir){
      track.scrollBy({ left: dir * getStep(), behavior: 'smooth' });
    }

    function updateButtons(){
      const maxScroll = track.scrollWidth - track.clientWidth - 1; // tolerance
      if (prev){
        prev.disabled = track.scrollLeft <= 1;
        prev.classList.toggle('opacity-40', prev.disabled);
        prev.classList.toggle('pointer-events-none', prev.disabled);
      }
      if (next){
        next.disabled = track.scrollLeft >= maxScroll;
        next.classList.toggle('opacity-40', next.disabled);
        next.classList.toggle('pointer-events-none', next.disabled);
      }
    }

    prev && prev.addEventListener('click', () => { scrollByStep(-1); });
    next && next.addEventListener('click', () => { scrollByStep(1); });

    track.addEventListener('scroll', updateButtons);
    window.addEventListener('resize', updateButtons);
    // init
    updateButtons();
  }

  document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('#ubud-activities-carousel, [data-carousel]').forEach(attachCarousel);
  });
})();
</script>