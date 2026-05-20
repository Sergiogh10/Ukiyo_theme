<?php
/*
 * Single template for viaje_autor post ID 179
 * Description: Ficha de viaje de autor (Moha – Marruecos).
 */
get_header();
$uri = get_template_directory_uri();
?>

  <!-- HERO -->
<section class="relative">
  <div class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
    <img 
      src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-rutadesierto.jpg"
      alt="Dunas de Erg Chebbi en Merzouga durante un viaje al desierto de Marruecos"
      class="w-full h-full object-cover object-bottom mask-image"
      loading="lazy"
      onerror="this.src='https://images.pexels.com/photos/3889843/pexels-photo-3889843.jpeg'; this.onerror=null;"
    />

    <!-- Content Overlay -->
    <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 lg:p-12">
      <div class="container mx-auto max-w-4xl">
        
        <!-- Badges -->
        <div class="flex flex-wrap items-center gap-3 mb-6">
          <span class="btn-primary text-white px-3 py-1 rounded-full text-sm font-medium">5 días / 4 noches</span>
          <span class="btn-primary text-white px-3 py-1 rounded-full text-sm font-medium">Atlas + Sahara</span>
          <span class="btn-primary text-white px-3 py-1 rounded-full text-sm font-medium">Plazas limitadas</span>
        </div>

        <div class="hero-overlay-box">
          <h1 class="text-3xl md:text-4xl lg:text-6xl font-rowdies text-white mb-4 pl-4">
            Marruecos: <br>
            <span class="text-accent">Gran ruta al desierto de Merzouga</span>
          </h1>

          <p class="text-xl text-white/90 max-w-3xl pl-4">
            “Cinco días de aventura desde Marrakech, cruzando el Alto Atlas, el Valle del Draa y las dunas de Merzouga.
            Una inmersión profunda en la cultura bereber y la magia del Sahara.”
          </p>

          <!-- Precio -->
          <div class="hero-overlay-box pl-4">
            <span class="text-sm mr-2">Desde</span>
            <span class="text-2xl font-semibold">Consultar</span>
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
        Una aventura <span class="text-secondary">inolvidable</span>
      </h2>
      <p class="mt-4 text-lg text-text-secondary leading-relaxed">
        Este viaje ampliado de 5 días es la experiencia definitiva para conectar con el sur de Marruecos.
        Desde el cruce del Tizi N’Tichka hasta las profundidades del desierto de Merzouga,
        pasando por el Valle del Draa y las Gargantas del Todra.
        Disfruta de noches bajo las estrellas, música gnawa en Khamlia y la hospitalidad
        de las familias nómadas, todo ello guiado por expertos locales.
      </p>
    </header>

    <ul role="list" class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Punto 1 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-background flex items-center justify-center">
          <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Ruta de las Mil Kasbahs</h3>
        <p class="text-text-secondary">
          Descubre fortalezas de adobe milenarias como Ait Ben Haddou y Taourirt.
          Recorre el Valle de las Rosas y el palmeral de Skoura en un viaje al pasado.
        </p>
      </li>

      <!-- Punto 2 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-background flex items-center justify-center">
          <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Inmersión en el Sahara</h3>
        <p class="text-text-secondary">
          Vive la experiencia completa del desierto: paseo en dromedario al atardecer,
          noche en jaima bajo las estrellas y música tradicional bereber alrededor del fuego.
        </p>
      </li>

      <!-- Punto 3 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-background flex items-center justify-center">
          <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Cultura y Nómadas</h3>
        <p class="text-text-secondary">
          Visita el pueblo de Khamlia para escuchar música gnawa, comparte té con familias
          nómadas y descubre los secretos del Valle del Draa y Rissani.
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

      <!-- SALIDA -->
      <li class="experienceItemList">
        <div class="decorativeCircleList">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-trip-arrival.svg" alt="" />
        </div>
        <h3 class="text-2xl font-rowdies text-text-primary mb-1">
          <span class="block text-sm text-text-secondary font-satoshi">Salida</span>
          MARRAKECH
        </h3>
        <p class="mt-2 text-text-secondary max-w-xl">
          Recogida a las 8:30 AM en tu hotel, riad o punto acordado.
          Comenzamos la ruta hacia el sur cruzando el Alto Atlas por el puerto de Tizi N’Tichka.
        </p>
      </li>

      <!-- DÍA 1 -->
      <li class="experienceItemList">
        <button class="decorativeCircleList accordion-trigger">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
        </button>

        <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
          1. ALTO ATLAS · AIT BEN HADDOU · OUARZAZATE
          <span class="h3-subtitle">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
            1 noche
          </span>
        </h3>

        <div class="exp-content">
          <div class="experienceSplit">
            <div class="experienceSplit-text">
              <p>
                Cruzamos las montañas del Atlas con paradas panorámicas. Visitamos una cooperativa de aceite de argán
                y llegamos a la mítica Kasbah de Ait Ben Haddou (Patrimonio UNESCO), escenario de películas como Gladiator.
                Continuamos hasta Ouarzazate, la "puerta del desierto", para cenar y descansar.
              </p>
            </div>
            <figure class="experienceSplit-media">
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-ait.jpg"
                alt="Kasbah de Ait Ben Haddou" />
            </figure>
          </div>
          <br>

          <!-- ALOJAMIENTO -->
          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
          </div>
          <h3 class="text-2xl font-rowdies">
            <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
            Hotel/Riad en Ouarzazate
          </h3>

          <p class="text-text-primary mt-1">
            Cena y alojamiento en hotel seleccionado.
          </p>
        </div>
      </li>

      <!-- DÍA 2 -->
      <li class="experienceItemList">
        <button class="decorativeCircleList accordion-trigger">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
        </button>

        <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
          2. VALLE DEL DRAA · ALNIF · MERZOUGA
          <span class="h3-subtitle">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
            1 noche
          </span>
        </h3>

        <div class="exp-content">
          <div class="experienceSplit">
            <div class="experienceSplit-text">
              <p>
                Tras el desayuno, recorremos el Valle del Draa con sus infinitos palmerales y kasbahs.
                Pasamos por Alnif y llegamos a las dunas de Merzouga. Tras un té de bienvenida,
                dejamos las maletas y montamos en dromedario para adentrarnos en las dunas al atardecer
                hasta llegar al campamento.
              </p>
            </div>
            <figure class="experienceSplit-media">
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-valle.jpg"
                alt="Dunas de Merzouga al atardecer" />
            </figure>
          </div>
          <br>

          <!-- ALOJAMIENTO -->
          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
          </div>
          <h3 class="text-2xl font-rowdies">
            <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
            Campamento bereber en Erg Chebbi
          </h3>

          <p class="text-text-primary mt-1">
            Noche en jaima, cena bajo las estrellas y música tradicional.
          </p>
        </div>
      </li>

      <!-- DÍA 3 -->
      <li class="experienceItemList">
        <button class="decorativeCircleList accordion-trigger">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
        </button>

        <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
          3. MERZOUGA · KHAMLIA · NÓMADAS
          <span class="h3-subtitle">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
            1 noche
          </span>
        </h3>

        <div class="exp-content">
          <div class="experienceSplit">
            <div class="experienceSplit-text">
              <p>
                Madrugamos para ver el amanecer. Tras el desayuno, exploramos el desierto 4x4:
                visitamos un asentamiento nómada para conocer su vida, pasamos por Khamlia para
                escuchar música gnawa y disfrutamos de un té.
                Tarde libre para subir dunas y ver la puesta de sol.
              </p>
            </div>
            <figure class="experienceSplit-media">
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-desierto-noche.jpg"
                alt="Música Gnawa y vida nómada" />
            </figure>
          </div>
          <br>

          <!-- ALOJAMIENTO -->
          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
          </div>
          <h3 class="text-2xl font-rowdies">
            <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
            Albergue/Hotel en Merzouga
          </h3>

          <p class="text-text-primary mt-1">
            Cena con espectáculo de tambores bereberes.
          </p>
        </div>
      </li>

      <!-- DÍA 4 -->
      <li class="experienceItemList">
        <button class="decorativeCircleList accordion-trigger">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
        </button>

        <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
          4. RISSANI · GARGANTAS DEL TODRA · VALLE DEL DADES
          <span class="h3-subtitle">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
            1 noche
          </span>
        </h3>

        <div class="exp-content">
          <div class="experienceSplit">
            <div class="experienceSplit-text">
              <p>
                Pasamos por Rissani y Erfoud (fábrica de mármol fosilizado).
                Llegamos a las impresionantes Gargantas del Todra, con paredes de 300m, para dar un paseo.
                Continuamos hacia el Valle del Dades pasando por Boumalne.
              </p>
            </div>
            <figure class="experienceSplit-media">
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-ruta.jpg"
                alt="Gargantas del Todra" />
            </figure>
          </div>
          <br>

          <!-- ALOJAMIENTO -->
          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
          </div>
          <h3 class="text-2xl font-rowdies">
            <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
            Hotel/Riad en Valle del Dades
          </h3>

          <p class="text-text-primary mt-1">
            Cena y alojamiento.
          </p>
        </div>
      </li>

      <!-- DÍA 5 -->
      <li class="experienceItemList">
        <div class="decorativeCircleList">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-trip-arrival.svg" alt="" />
        </div>
        <h3 class="text-2xl font-rowdies text-text-primary mb-1">
          <span class="block text-sm text-text-secondary font-satoshi">Regreso</span>
          VALLE DE LAS ROSAS · SKOURA · MARRAKECH
        </h3>
        <p class="mt-2 text-text-secondary max-w-xl">
          Recorremos la "Ruta de las Mil Kasbahs" y el Valle de las Rosas.
          Visitamos el palmeral de Skoura y la Kasbah de Taourirt en Ouarzazate.
          Cruzamos el Tizi N’Tichka de vuelta para llegar a Marrakech sobre las 17:00h.
        </p>
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
              <span class="text-text-secondary">Transporte en vehículo 4x4 con A/C durante todo el recorrido</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Conductor y guía local de habla hispana</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Alojamiento en media pensión (desayuno y cena)</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Paseo en dromedario y noche en jaima en el desierto</span>
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
              <span class="text-text-secondary">Vuelos</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Comidas del mediodía y bebidas</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Entradas a monumentos</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Propinas</span>
            </li>

          </ul>
        </div>
      </article>

    </div>
  </div>
</section>

  <!-- FAQs -->
<section id="faqs" class="py-20 bg-background">
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
            id="faq-btn-131-1" aria-expanded="false" aria-controls="faq-panel-131-1">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Qué nivel de comodidad tienen las jaimas?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-131-1" role="region" aria-hidden="true" aria-labelledby="faq-btn-131-1" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>Las jaimas están completamente equipadas para tu confort, ofreciendo camas cómodas con ropa de cama, electricidad y baños privados o compartidos (según categoría seleccionada).</p>
            </div>
          </div>
        </div>
        
        <!-- Item 2 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-background">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-131-2" aria-expanded="false" aria-controls="faq-panel-131-2">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Es necesario experiencia para los dromedarios?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-131-2" role="region" aria-hidden="true" aria-labelledby="faq-btn-131-2" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>No, la actividad es apta para principiantes y siempre va acompañada por guías expertos (camelleros) que aseguran tu seguridad y comodidad. Si prefieres no montar, puedes ir en 4x4.</p>
            </div>
          </div>
        </div>
        
        <!-- Item 3 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-background">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-131-3" aria-expanded="false" aria-controls="faq-panel-131-3">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Cuál es la mejor época para viajar?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-131-3" role="region" aria-hidden="true" aria-labelledby="faq-btn-131-3" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>Primavera (marzo-mayo) y otoño (septiembre-noviembre) son ideales, con temperaturas agradables. El invierno es frío por la noche pero soleado, y el verano muy caluroso.</p>
            </div>
          </div>
        </div>
        
        <!-- Item 4 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-background">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-131-4" aria-expanded="false" aria-controls="faq-panel-131-4">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Qué tipo de comida se sirve?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-131-4" role="region" aria-hidden="true" aria-labelledby="faq-btn-131-4" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>Disfrutarás de platos tradicionales marroquíes como tagine, cuscús, harira y ensaladas frescas. Podemos adaptar el menú a preferencias vegetarianas o alergias si nos avisas con antelación.</p>
            </div>
          </div>
        </div>

        <!-- Item 5 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-background">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-131-5" aria-expanded="false" aria-controls="faq-panel-131-5">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Es apto para familias con niños?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-131-5" role="region" aria-hidden="true" aria-labelledby="faq-btn-131-5" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>Sí, el itinerario se puede ajustar al ritmo de los niños. El desierto es un lugar mágico para ellos y el viaje en 4x4 les suele encantar.</p>
            </div>
          </div>
        </div>

        <!-- Item 6 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-background">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-131-6" aria-expanded="false" aria-controls="faq-panel-131-6">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Cómo gestionamos el equipaje?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-131-6" role="region" aria-hidden="true" aria-labelledby="faq-btn-131-6" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>Las maletas grandes viajan en el 4x4. Para la noche en el desierto, recomendamos llevar una mochila pequeña con lo necesario (ropa de abrigo, aseo, agua), ya que el resto del equipaje se queda seguro en el vehículo o albergue.</p>
            </div>
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

  <!-- GALERÍA SIMPLE -->
  <section class="py-20 bg-background">
    <div class="container mx-auto px-6 md:px-8 pb-12 md:pb-16">
      <div class="grid gap-4 md:grid-cols-3">
        <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-marrakech.jpg" alt="Luis Acuña durante el viaje de autor al Pantanal" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-mercado.jpg" alt="Amanecer en el río durante un viaje de autor al Pantanal con Ukiyo" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-desierto-noche.jpg" alt="Aves del Pantanal en un viaje de autor con guía experto" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
      </div>
    </div>
  </section>

<!-- CTA Section -->
  <section class="py-20 bg-background text-text-secondary">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
              <h2 class="text-display font-satoshi mb-6 reveal-on-scroll">
                    No es un viaje cualquiera: es el Desierto de Marruecos vivido de forma auténtica
                </h2>
              <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Tres días diseñados para sentir la inmensidad del Sahara, recorrer pueblos bereberes 
                y dormir bajo un cielo estrellado imposible de olvidar. Un itinerario pensado para 
                saborear cada momento: desde las gargantas del Todra hasta las dunas doradas de Erg Chebbi.
                </p>
              <div class="flex flex-col sm:flex-row gap-4 justify-center reveal-on-scroll delay-200">
                  <a href="<?php echo esc_url( ukiyo_get_route_url( 'form_viaje_autor' ) ); ?>" 
                    class="btn-primary text-text-secondary">
                      Quiero vivir Marruecos
                  </a>
                  <a href="<?php echo esc_url( ukiyo_get_route_url( 'viajes_autor' ) ); ?>" 
                    class="btn-primary text-text-secondary">
                      Ver más viajes
                  </a>
              </div>
          </div>
      </div>
  </section>



<?php
if ( function_exists( 'ukiyo_render_viaje_autor_blog_resources_section' ) ) {
    ukiyo_render_viaje_autor_blog_resources_section( get_the_ID(), 'bg-white' );
}
get_footer();
?>

<script>
document.addEventListener('click', (e) => {
  const btn = e.target.closest('button[aria-controls]');
  if (!btn) return;
  
  const container = btn.closest('[data-accordion-new]');
  if (!container) return; 

  const panelId = btn.getAttribute('aria-controls');
  const panel = document.getElementById(panelId);
  if (!panel) return;
  
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

  const isOpen = (btn.getAttribute('aria-expanded') === 'true');
  btn.setAttribute('aria-expanded', String(!isOpen));
  panel.setAttribute('aria-hidden', String(isOpen));
  
  if (!isOpen) {
    panel.style.gridTemplateRows = '1fr';
    panel.style.opacity = '1';
    btn.querySelector('svg')?.classList.add('rotate-180');
  } else {
    panel.style.gridTemplateRows = '0fr';
    panel.style.opacity = '0';
    btn.querySelector('svg')?.classList.remove('rotate-180');
  }
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
