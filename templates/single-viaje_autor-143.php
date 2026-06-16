<?php
/*
 * Single template for viaje_autor post ID 143
 * Description: Ficha de viaje de autor (Moha - Merzouga).
 */
get_header();
$uri = get_template_directory_uri();
?>
  <!-- HERO -->
<section class="relative">
    <div class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viajes-a-marruecos-personalizados-erg-chebbi-merzouga.webp"
             alt="Bromo"
             class="w-full h-full object-cover mask-image" 
             loading="lazy"
             onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.webp'; this.onerror=null;" />        
        <!-- Content Overlay -->
            <!-- Content Overlay -->
    <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 lg:p-12">
      <div class="container mx-auto max-w-4xl">
        
        <!-- Badges -->
        <div class="flex flex-wrap items-center gap-3 mb-6">
          <span class="btn-primary text-white px-3 py-1 rounded-full text-sm font-medium">4 días / 3 noches</span>
          <span class="btn-primary text-white px-3 py-1 rounded-full text-sm font-medium">Atlas + Sahara</span>
          <span class="btn-primary text-white px-3 py-1 rounded-full text-sm font-medium">Plazas limitadas</span>
        </div>

        <div class="hero-overlay-box">
          <h1 class="text-3xl md:text-4xl lg:text-6xl font-rowdies text-white mb-4 pl-4">
            Marruecos: <br>
            <span class="text-accent">4 días hacia el corazón del Sahara</span>
          </h1>

          <p class="text-xl text-white/90 max-w-3xl pl-4">
            “Cuatro días de ruta imprescindible desde Marrakech, cruzando kasbahs legendarias,
            gargantas imponentes y el silencio infinito de Erg Chebbi.”
          </p>

          <!-- Precio -->
          <div class="hero-overlay-box pl-4">
            <span class="text-sm mr-2">Desde</span>
            <span class="text-2xl font-semibold">400 €</span>
            <span class="text-xs ml-2">/persona</span>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

  <!-- NARRATIVA / HIGHLIGHTS -->
<section class="py-16 bg-background">
  <div class="container mx-auto px-6">
    <header class="text-center max-w-3xl mx-auto mb-12">
      <h2 class="text-4xl font-satoshi text-text-primary tracking-tight">
        Un viaje hacia el <span class="text-secondary">Sahara</span>
      </h2>
      <p class="mt-4 text-lg text-text-secondary leading-relaxed">
        Este recorrido de 4 días hacia Merzouga es mucho más que un traslado al desierto: 
        es una travesía por el Alto Atlas, las kasbahs históricas y los valles que dan vida a Marruecos. 
        Cada día suma escenarios diferentes —montañas, gargantas, oasis y dunas infinitas— hasta llegar al 
        silencio dorado del Sahara. Aquí, la hospitalidad bereber, la calma del desierto y las noches estrelladas 
        convierten el viaje en una experiencia que permanece.
      </p>
    </header>

    <ul role="list" class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- PUNTO 1 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-primary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Amanecer en las dunas</h3>
        <p class="text-text-secondary">
          La salida del sol sobre Erg Chebbi es uno de los momentos más icónicos del viaje. 
          El desierto despierta en silencio mientras la luz transforma lentamente el paisaje.
        </p>
      </li>

      <!-- PUNTO 2 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-secondary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Ruta de kasbahs y gargantas</h3>
        <p class="text-text-secondary">
          Desde Aït Ben Haddou hasta las Gargantas del Todra, el camino revela la arquitectura 
          fortificada, oasis y valles que han marcado la historia comercial del sur de Marruecos.
        </p>
      </li>

      <!-- PUNTO 3 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-accent/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Noche en jaima</h3>
        <p class="text-text-secondary">
          Música tradicional, cena bereber y un cielo estrellado imposible de olvidar. 
          La noche en el campamento es el alma del viaje, un momento de calma absoluta y conexión.
        </p>
      </li>

    </ul>
  </div>
</section>

<section class="py-20 bg-background">
    <!-- Contenido -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-30 container mx-auto px-6 md:px-8 py-10 md:py-14 max-w-8xl">
    <div class="flex flex-col items-start">
      <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/autor-moha2.png"
           alt="Moha, guía local amazigh experto del desierto"
           class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] bg-background" />
      <h2 class="mt-4 text-xl font-semibold text-text-primary">Moha</h2>
      <p class="mt-1 text-sm text-text-secondary max-w-xs">
        Guía local amazigh nacido en Merzouga. Conoce cada duna, cada estrella y cada historia del desierto.
      </p>
    </div>

    <div class="text-text-secondary text-[15px] space-y-4">
      <p>
        “Soy Moha, nacido entre las dunas de Erg Chebbi. Para mí, el desierto es un libro abierto: cada rastro, cada viento y cada silencio cuenta una historia. Mi trabajo es enseñarte a leerlo”.
      </p>

      <div id="bio-hidden-1" class="hidden lg:block space-y-4">
        <p>
          Cuando camino por el desierto con viajeros, no busco que simplemente vean dunas; quiero que entiendan cómo se mueve la arena, cómo se orientan los nómadas y cómo cada detalle marca el ritmo de la vida en el Sahara.
        </p>
        <p>
          Durante las rutas, comparto tradiciones amazigh, visitas a familias nómadas y aprendizajes que han pasado de generación en generación. Nada aquí es forzado: el desierto decide cuándo enseñar y cuándo guardar silencio.
        </p>
      </div>
    </div>

    <div id="bio-hidden-2" class="text-text-secondary text-[15px] space-y-4 hidden lg:block">
      <p>
        Al caer la noche, las historias cambian: el fuego se enciende, el té se sirve, la música gnawa resuena y las estrellas iluminan el campamento. Para muchos, este es el momento en que realmente sienten el Sahara.
      </p>
      <p>
        Lo que más me emociona es ver cómo, al terminar el viaje, las personas se llevan algo más que fotos: se llevan calma, perspectiva y un respeto profundo por la vida en el desierto.
      </p>
      <p>
        Mi misión es sencilla: que vivas el Sahara como lo vivimos nosotros, sin prisa, sin ruido y con el corazón abierto. El desierto transforma, y me alegra compartir ese regalo con quienes llegan hasta aquí.”
      </p>
    </div>

    <button id="bio-read-more" class="lg:hidden text-primary font-semibold mt-2 hover:underline focus:outline-none">Leer más</button>

    <script>
      document.getElementById('bio-read-more').addEventListener('click', function() {
        document.getElementById('bio-hidden-1').classList.remove('hidden');
        document.getElementById('bio-hidden-2').classList.remove('hidden');
        this.style.display = 'none';
      });
    </script>
  </div>
</section>

  <!-- Trip Content -->
<section class="py-2 bg-background">
  <div class="container mx-auto">
    <nav class="trip-nav ukiyo-nav flex justify-center border-surface bg-background backdrop-blur-sm py-4">
      <ul class="flex flex-wrap justify-center space-x-4 md:space-x-10 text-sm md:text-base font-medium">
        <li><a href="#itinerary" class="font-rowdies text-sm md:text-2xl hover:text-primary transition-colors duration-300 nav-active">Itinerario</a></li>
        <li><a href="#includes" class="font-rowdies text-sm md:text-2xl hover:text-primary transition-colors duration-300">¿Qué incluye?</a></li>
        <li><a href="#faqs" class="font-rowdies text-sm md:text-2xl hover:text-primary transition-colors duration-300">FAQs</a></li>
      </ul>
    </nav>
  </div>

    <!-- Itinerary -->
    <div id="itinerary" class="experienceSection">
      <ol class="experienceList">

        <!-- LLEGADA -->
        <li class="experienceItemList">
          <div class="decorativeCircleList">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-trip-arrival.svg" alt="" />
          </div>
          <h3 class="text-2xl font-rowdies text-text-primary mb-1">
            <span class="block text-sm text-text-secondary font-satoshi">Llegada</span>
            MARRAKECH
          </h3>
          <p class="mt-2 text-text-secondary max-w-xl">
            Encuentro con vuestro guía/conductor en Marrakech e inicio de la ruta hacia el sur,
            cruzando el Alto Atlas para adentrarnos en los paisajes más auténticos de Marruecos.
          </p>
        </li>

        <!-- 1. ALTO ATLAS – AÏT BEN HADDOU – OUARZAZATE – VALLE DEL DADÈS -->
        <li class="experienceItemList">
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
          </button>

          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            1. ALTO ATLAS · AÏT BEN HADDOU · OUARZAZATE · VALLE DEL DADÈS
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              1 noche
            </span>
          </h3>

          <div class="exp-content">
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Cruzamos el espectacular puerto de Tizi N’tichka, con vistas a las cumbres del Alto Atlas,
                  y hacemos parada en Aït Ben Haddou, la kasbah más famosa del país y Patrimonio de la Unesco.
                  Tras recorrer Ouarzazate, seguimos la Ruta de las Mil Kasbahs hasta llegar al Valle del Dadès.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-marrakech.webp"
                alt="Kasbah de Ait Ben Haddou y Valle del Dades" />
              </figure>
            </div>

            <!-- ALOJAMIENTO -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies">Alojamiento</h3>
            <h4 class="text-xl font-semibold text-text-primary">Riad con encanto en el Valle del Dadès</h4>
            <p class="text-text-primary mt-1">
              Noche en riad tradicional con cena incluida, rodeados de montañas y palmerales.
            </p>

            <!-- ACTIVIDADES -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <div class="ukiyo-activities-wrapper relative mt-4">
              <div class="ukiyo-activities-slider">

                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-valle.webp" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>Día completo</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Cruce del Alto Atlas</h4>
                    <p class="mt-1 text-gray-600">
                      Recorrido panorámico por Tizi N’tichka con paradas fotográficas en pueblos bereberes.
                    </p>
                  </div>
                </div>

                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-ait.webp" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>2h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Visita a Aït Ben Haddou</h4>
                    <p class="mt-1 text-gray-600">
                      Paseo por la kasbah más icónica de Marruecos, escenario de películas y series.
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </li>

        <!-- 2. GARGANTAS DEL TODRA – MERZOUGA -->
        <li class="experienceItemList">
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
          </button>

          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            2. GARGANTAS DEL TODRA · DESIERTO DE MERZOUGA
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              1 noche
            </span>
          </h3>

          <div class="exp-content">
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Caminamos por las impresionantes Gargantas del Todra antes de poner rumbo al Sahara.
                  Al llegar a Merzouga, cambiamos el vehículo por dromedarios para entrar en Erg Chebbi al atardecer.
                  Las dunas nos llevan hasta el campamento de jaimas.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-camellossalvajes.webp"
                  alt="Dunas de Erg Chebbi" />
              </figure>
            </div>

            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies">Alojamiento</h3>
            <h4 class="text-xl font-semibold text-text-primary">Campamento bereber en jaima</h4>
            <p class="text-text-primary mt-1">
              Noche bajo las estrellas con cena tradicional y ambiente bereber en plena duna.
            </p>

            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <div class="ukiyo-activities-wrapper relative mt-4">
              <div class="ukiyo-activities-slider">

                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-camello.webp" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>1h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Paseo en dromedario al atardecer</h4>
                    <p class="mt-1 text-gray-600">
                      Entramos en las dunas al ritmo del Sahara hasta llegar al campamento con puesta de sol.
                    </p>
                  </div>
                </div>

                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-desierto-noche.webp" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>Noche</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Cena bereber y cielo estrellado</h4>
                    <p class="mt-1 text-gray-600">
                      Música, fuego y conversación bajo uno de los cielos más limpios del planeta.
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </li>

        <!-- 3. MERZOUGA – RISSANI – N’KOB – OUARZAZATE -->
        <li class="experienceItemList">
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
          </button>

          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            3. MERZOUGA · RISSANI · VALLE DEL DRAA · OUARZAZATE
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              1 noche
            </span>
          </h3>

          <div class="exp-content">
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Despertamos en el desierto para ver el amanecer sobre las dunas y regresamos a Merzouga.
                  Después visitamos la medina de Rissani y viajamos hacia Ouarzazate atravesando pueblos
                  como Alnif, Tazarine y N’kob, con desvío al Valle del Draa y su gigantesco palmeral.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-ruta.webp"
                  alt="Palmeral del Valle del Draa" />
              </figure>
            </div>

            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies">Alojamiento</h3>
            <h4 class="text-xl font-semibold text-text-primary">Hotel confortable en Ouarzazate</h4>
            <p class="text-text-primary mt-1">
              Noche con cena incluida en la capital del sur marroquí.
            </p>

            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <div class="ukiyo-activities-wrapper relative mt-4">
              <div class="ukiyo-activities-slider">

                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-te.webp" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>1h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Amanecer en Erg Chebbi</h4>
                    <p class="mt-1 text-gray-600">
                      Subimos las dunas para despedirnos del Sahara con la mejor luz del día.
                    </p>
                  </div>
                </div>

                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-mercado.webp" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>2h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Visita a Rissani</h4>
                    <p class="mt-1 text-gray-600">
                      Paseo por su medina tradicional, corazón cultural del desierto.
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </li>

        <!-- 4. OUARZAZATE – ALTO ATLAS – MARRAKECH -->
        <li class="experienceItemList">
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
          </button>

          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            4. OUARZAZATE · KASBAH TAOURIRT · REGRESO A MARRAKECH
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              Fin del viaje
            </span>
          </h3>

          <div class="exp-content">
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Última mirada al sur de Marruecos con visita opcional a la Kasbah de Taourirt,
                  una de las mejor conservadas del país. Después cruzamos de nuevo el Alto Atlas
                  rumbo a Marrakech, donde finaliza el recorrido.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-marrakech.webp"
                  alt="Kasbah de Taourirt en Ouarzazate" />
              </figure>
            </div>

            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <div class="ukiyo-activities-wrapper relative mt-4">
              <div class="ukiyo-activities-slider">

                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-templo.webp" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>1h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Kasbah de Taourirt (opcional)</h4>
                    <p class="mt-1 text-gray-600">
                      Un cierre cultural perfecto antes de emprender la vuelta al Atlas.
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </li>

      </ol>
    </div>
  </section>

<!-- ¿Qué incluye? -->
<section id="includes" class="py-2 bg-background">
  <div class="container mx-auto py-12 md:py-16">
    <div class="grid gap-8 md:grid-cols-2">

      <!-- INCLUYE -->
      <article class="group relative rounded-2xl overflow-hidden border-2 border-secondary bg-background shadow-sm hover:shadow-lg transition flex flex-col">
        <div class="text-center p-8">
          <div class="w-20 h-20 bg-background rounded-full flex items-center justify-center mx-auto mb-5">
            <svg class="w-10 h-10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#4CAF50">
              <path d="M7.29417 12.9577L10.5048 16.1681L17.6729 9" stroke="#4CAF50" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <circle cx="12" cy="12" r="10" stroke="#4CAF50" stroke-width="2"></circle>
            </svg>
          </div>
          <h3 class="text-2xl font-satoshi text-text-primary mb-1">La aventura incluye</h3>
        </div>

        <div class="px-8">
          <ul class="space-y-2 text-center mb-4">

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Transporte en 4×4 o mini van con aire acondicionado durante todo el recorrido</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Conductor/guía local de habla hispana durante todo el viaje</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Combustible y logística completa durante la ruta</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">1 noche en riad tradicional en el Valle del Dadès con cena y desayuno</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">1 noche en campamento bereber en Erg Chebbi (jaimas confort) con cena y desayuno</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">1 noche en hotel confortable en Ouarzazate con cena y desayuno</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Paseo en dromedario al atardecer hasta el campamento (opción 4×4 disponible)</span>
            </li>

          </ul>
        </div>
      </article>

      <!-- NO INCLUYE -->
      <article
        class="group relative rounded-2xl overflow-hidden border-2 bg-background shadow-sm hover:shadow-lg transition flex flex-col"
        style="border-color: #8B1E3F;">
        <div class="text-center p-8">
          <div class="w-20 h-20 bg-background rounded-full flex items-center justify-center mx-auto mb-5">
            <svg class="w-10 h-10" fill="#8B1E3F" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 16q0 3.264 1.28 6.208t3.392 5.12 5.12 3.424 6.208 1.248 6.208-1.248 5.12-3.424 3.392-5.12 1.28-6.208-1.28-6.208-3.392-5.12-5.088-3.392-6.24-1.28q-3.264 0-6.208 1.28t-5.12 3.392-3.392 5.12-1.28 6.208zM4 16q0-3.264 1.6-6.016t4.384-4.352 6.016-1.632 6.016 1.632 4.384 4.352 1.6 6.016-1.6 6.048-4.384 4.352-6.016 1.6-6.016-1.6-4.384-4.352-1.6-6.048zM9.76 20.256q0 0.832 0.576 1.408t1.44 0.608 1.408-0.608l2.816-2.816 2.816 2.816q0.576 0.608 1.408 0.608t1.44-0.608 0.576-1.408-0.576-1.408l-2.848-2.848 2.848-2.816q0.576-0.576 0.576-1.408t-0.576-1.408-1.44-0.608-1.408 0.608l-2.816 2.816-2.816-2.816q-0.576-0.608-1.408-0.608t-1.44 0.608-0.576 1.408 0.576 1.408l2.848 2.816-2.848 2.848q-0.576 0.576-0.576 1.408z"></path>
            </svg>
          </div>
          <h3 class="text-2xl font-satoshi text-text-primary mb-1">
            La aventura <span class="font-bold" style="color: #8B1E3F;">NO</span> incluye
          </h3>
        </div>

        <div class="px-8">
          <ul class="space-y-2 text-center mb-4">

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Vuelos de llegada y regreso a Marrakech</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Almuerzos durante el trayecto</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Bebidas en comidas incluidas</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Entradas a monumentos o museos (Aït Ben Haddou, Kasbah Taourirt, etc.)</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Propinas y gastos personales (snacks, compras, etc.)</span>
            </li>

          </ul>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- FAQs -->
<section id="faqs" class="py-12 bg-background">
  <div class="container mx-auto px-6 md:px-8 pb-12">
    <h2 class="text-display font-satoshi-bold mb-6 text-center">Preguntas frecuentes</h2>

    <div data-accordion class="space-y-3 max-w-3xl mx-auto">

      <!-- Item 1: viaje privado -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-background backdrop-blur-md">
        <button data-accordion-btn
                class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-1" id="faq-1-h">
          <span class="font-medium text-text-primary">¿El viaje es privado?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
              viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-1" role="region" aria-labelledby="faq-1-h"
            data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          Sí. Este viaje es totalmente <strong>privado</strong> para las personas que lo reserven.  
          No se comparte con otros viajeros y el itinerario se realiza únicamente con vuestro grupo.
        </div>
      </div>

      <!-- Item 2: modificar itinerario -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-background backdrop-blur-md">
        <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-2" id="faq-2-h">
          <span class="font-medium text-text-primary">¿Podemos modificar el itinerario?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-2" role="region" aria-labelledby="faq-2-h"
             data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          La ruta base es la de 4 días hacia Merzouga, pero al ser un viaje privado
          <strong>podemos ajustar el ritmo y algunas paradas</strong> (tiempos de visita, descansos o desvíos),
          siempre que no comprometan la logística del desierto.
        </div>
      </div>

      <!-- Item 3: documentación -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-background backdrop-blur-md">
        <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-3" id="faq-3-h">
          <span class="font-medium text-text-primary">¿Qué documentación necesito?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-3" role="region" aria-labelledby="faq-3-h"
             data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          Pasaporte vigente.  
          Ciudadanos de la Unión Europea y la mayoría de países de Latinoamérica <strong>no necesitan visado</strong> para estancias turísticas inferiores a 90 días.
        </div>
      </div>

      <!-- Item 4: asistencia -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-background backdrop-blur-md">
        <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-4" id="faq-4-h">
          <span class="font-medium text-text-primary">¿Habrá asistencia durante el viaje?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-4" role="region" aria-labelledby="faq-4-h"
             data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          Sí. Vuestro <strong>guía/conductor</strong> os acompaña durante todo el recorrido,
          y en el desierto contaréis además con el equipo bereber del campamento para la experiencia en Erg Chebbi.
        </div>
      </div>

      <!-- Item 5: precio -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-background backdrop-blur-md">
        <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-5" id="faq-5-h">
          <span class="font-medium text-text-primary">¿Cuál es el precio del viaje?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-5" role="region" aria-labelledby="faq-5-h"
             data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">

          El precio está calculado en base a grupo de 4 personas.  
          Si viajáis menos, se aplica un suplemento por persona:

          <ul class="mt-3 space-y-1 text-text-primary">
            <li>— <strong>4 personas:</strong> 400 € por persona</li>
            <li>— <strong>3 personas:</strong> 440 € por persona</li>
            <li>— <strong>2 personas:</strong> 590 € por persona</li>
          </ul>

          Todos los precios incluyen alojamiento, transporte y actividades según el programa.
        </div>
      </div>

      <!-- Item 6: depósito -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-background backdrop-blur-md">
        <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-6" id="faq-6-h">
          <span class="font-medium text-text-primary">¿Cuál es el depósito para reservar?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-6" role="region" aria-labelledby="faq-6-h"
             data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          Para confirmar la reserva se requiere un <strong>depósito de 500 €</strong>.  
          El resto del importe se abona antes del inicio del viaje siguiendo las indicaciones de la organización.
        </div>
      </div>

    </div>
  </div>
</section>

  <!-- Best Time 
  <section id="best-time" class="py-12 bg-background">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-rowdies text-text-primary mb-4 text-center">Mejor época para viajar</h2>
      <div class="best-time-carousel mt-10">
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Enero</h3>
            <span class="best-time-badge bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full">Ideal</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada seca</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Febrero</h3>
            <span class="best-time-badge bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full">Ideal</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada seca</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Marzo</h3>
            <span class="best-time-badge bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full">Ideal</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada seca</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Abril</h3>
            <span class="best-time-badge bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full">Ideal</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada seca</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Mayo</h3>
            <span class="best-time-badge bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Bueno</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada de lluvias</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Junio</h3>
            <span class="best-time-badge bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Bueno</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada de lluvias</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Julio</h3>
            <span class="best-time-badge bg-red-100 text-red-700 text-xs font-semibold px-2 py-1 rounded-full">Malo</span>
          </div>
          <p class="text-sm text-text-secondary">Turismo masivo</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Agosto</h3>
            <span class="best-time-badge bg-red-100 text-red-700 text-xs font-semibold px-2 py-1 rounded-full">Malo</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada de lluvias</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Septiembre</h3>
            <span class="best-time-badge bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Bueno</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada de lluvias</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Octubre</h3>
            <span class="best-time-badge bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Bueno</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada de lluvias</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Noviembre</h3>
            <span class="best-time-badge bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full">Ideal</span>
          </div>
          <p class="text-sm text-text-secondary">Transición seca</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-background shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Diciembre</h3>
            <span class="best-time-badge bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full">Ideal</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada seca</p>
        </article>
      </div>
    </div>
  </section> -->

<!-- CTA -->
  <section class="py-20 bg-background text-text-secondary">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
              <h2 class="text-display font-satoshi mb-6 reveal-on-scroll">
                    ¿No encuentras tu viaje ideal?
                </h2>
              <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Cada persona viaja a su manera.
        Cuéntanos qué te mueve y crearemos juntos una experiencia que encaje contigo.
                </p>
              <div class="flex flex-col sm:flex-row gap-4 justify-center reveal-on-scroll delay-200">
                  <a href="<?php echo esc_url( ukiyo_get_route_url( 'form_viaje_autor' ) ); ?>" 
                    class="btn-primary text-text-secondary">
                      Cuéntanos tu idea
                  </a>
                  <a href="<?php echo esc_url( ukiyo_get_route_url( 'viajes_autor' ) ); ?>" 
                    class="btn-primary text-text-secondary">
                      Ver más viajes
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

<script>
  document.addEventListener("click", function(e) {

    const trigger = e.target.closest(".accordion-trigger");
    if (!trigger) return;

    const li = trigger.closest(".experienceItemList");
    li.classList.toggle("open");

  });

  document.querySelectorAll('.ukiyo-activities-wrapper').forEach(wrapper => {

    const slider = wrapper.querySelector('.ukiyo-activities-slider');
    const prev = wrapper.querySelector('.prev');
    const next = wrapper.querySelector('.next');

    prev.addEventListener('click', () => {
      slider.scrollBy({
        left: -260,
        behavior: "smooth"
      });
    });

    next.addEventListener('click', () => {
      slider.scrollBy({
        left: 260,
        behavior: "smooth"
      });
    });

  });
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const navLinks = document.querySelectorAll(".trip-nav a");
  const sections = {
    itinerary: document.getElementById("itinerary"),
    includes: document.getElementById("includes"),
    faqs: document.getElementById("faqs"),
    "best-time": document.getElementById("best-time"),
  };

  function showSection(id) {
    Object.entries(sections).forEach(([key, section]) => {
      if (!section) return;
      section.style.display = key === id ? "block" : "none";
    });
  }

  showSection("itinerary");

  navLinks.forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      const target = link.getAttribute("href").replace("#", "");
      navLinks.forEach((item) => item.classList.remove("active"));
      link.classList.add("active");
      showSection(target);
    });
  });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const navLinks = document.querySelectorAll(".ukiyo-nav a");

  const sections = [...navLinks].map(link => {
    const id = link.getAttribute("href");
    return document.querySelector(id);
  });

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          navLinks.forEach(link => link.classList.remove("nav-active"));

          const activeLink = document.querySelector(`.ukiyo-nav a[href="#${entry.target.id}"]`);
          if (activeLink) activeLink.classList.add("nav-active");
        }
      });
    },
    {
      threshold: 0.4, // Se activa cuando el 40% de la sección está visible
    }
  );

  sections.forEach(section => {
    if (section) observer.observe(section);
  });
});
</script>
