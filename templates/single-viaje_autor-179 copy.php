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
          <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">5 días / 4 noches</span>
          <span class="bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">Atlas + Sahara</span>
          <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-medium">Plazas limitadas</span>
        </div>

        <div class="hero-overlay-box">
          <h1 class="text-3xl md:text-4xl lg:text-6xl font-rowdies text-white mb-4 pl-4">
            Marruecos: <br>
            <span class="text-accent">del Alto Atlas al corazón de Merzouga</span>
          </h1>

          <p class="text-xl text-white/90 max-w-3xl pl-4">
            “Cinco días recorriendo kasbahs históricas, valles infinitos y las dunas doradas de Erg Chebbi, 
            viviendo la magia auténtica del desierto junto a la cultura bereber.”
          </p>

          <!-- Precio -->
          <div class="hero-overlay-box pl-4">
            <span class="text-sm mr-2">Desde</span>
            <span class="text-2xl font-semibold">450 €</span>
            <span class="text-xs ml-2">/persona</span>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- NARRATIVA / HIGHLIGHTS -->
<section class="py-16 bg-gradient-warm">
  <div class="container mx-auto px-6">
    <header class="text-center max-w-3xl mx-auto mb-12">
      <h2 class="text-4xl font-satoshi text-text-primary tracking-tight">
        Una aventura <span class="text-secondary">inolvidable</span>
      </h2>
      <p class="mt-4 text-lg text-text-secondary leading-relaxed">
        Este viaje al desierto de Marruecos te lleva durante cinco días por algunos de los paisajes más
        impresionantes del país: montañas imponentes, valles verdes, kasbahs ancestrales y las dunas
        infinitas de Merzouga.  
        Recorrerás el Alto Atlas, Ait Ben Haddou, el Valle del Draa, las Gargantas del Todra y el Valle del Dades,
        mientras descubres la hospitalidad bereber y la magia del Sahara.  
        Noches bajo las estrellas, música gnawa, oasis, pueblos nómadas y puestas de sol inolvidables hacen de
        esta ruta una experiencia única que conecta con la esencia más auténtica del sur marroquí.
      </p>
    </header>

    <ul role="list" class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Punto 1 -->
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-primary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Paisajes que impresionan</h3>
        <p class="text-text-secondary">
          Cruza el Alto Atlas por el mítico puerto de Tizi N’Tichka, explora Ait Ben Haddou, recorre valles
          inmensos y admira los contrastes naturales que conducen hasta las dunas de Erg Chebbi.
        </p>
      </li>

      <!-- Punto 2 -->
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-secondary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Experiencias únicas</h3>
        <p class="text-text-secondary">
          Paseo en dromedario al atardecer, noche en jaima tradicional, música gnawa en Khamlia,
          visita a familias nómadas y caminatas por las Gargantas del Todra.  
          Momentos que solo se viven en el Sahara.
        </p>
      </li>

      <!-- Punto 3 -->
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-accent/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Cultura y cercanía</h3>
        <p class="text-text-secondary">
          Acompañado por un guía de habla hispana, conocerás la historia del sur de Marruecos, las
          tradiciones bereberes, su gastronomía y su forma de vida nómada en una ruta creada desde la autenticidad.
        </p>
      </li>

    </ul>
  </div>
</section>

<section class="py-20 bg-white">
    <!-- Contenido -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-30 container mx-auto px-6 md:px-8 py-10 md:py-14 max-w-8xl">
    <div class="flex flex-col items-start">
      <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viaje-de-autor-a-marruecos-con-guia-local-moha.jpg"
           alt="Moha, guía local amazigh experto del desierto"
           class="w-40 h-40 md:w-56 md:h-56 rounded-full object-cover ring-1 ring-border/60 bg-white/80" />
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
<section class="py-2 bg-white">
  <div class="container mx-auto">
    <nav class="trip-nav ukiyo-nav flex justify-center border-surface bg-background/80 backdrop-blur-sm py-4">
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
        Recogida a las 8:30 h en tu hotel, riad o punto acordado en Marrakech. 
        Desde aquí ponemos rumbo hacia el sur, cruzando las montañas del Alto Atlas por el 
        puerto de Tizi N’Tichka y comenzando la ruta hacia el desierto.
      </p>
    </li>

    <!-- DÍA 1 -->
    <li class="experienceItemList">
      <button class="decorativeCircleList accordion-trigger">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
      </button>

      <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
        1. MARRAKECH · ALTO ATLAS · AIT BEN HADDOU · OUARZAZATE
        <span class="h3-subtitle">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
          1 noche
        </span>
      </h3>

      <div class="exp-content">
        <div class="experienceSplit">
          <div class="experienceSplit-text">
            <p>
              Comenzamos cruzando el Alto Atlas por el puerto de Tizi N’Tichka, el paso de montaña más alto de Marruecos, 
              con varias paradas para disfrutar de las vistas y fotografiar los paisajes.  
              En ruta visitamos una cooperativa de aceite de argán, donde conocerás su proceso de elaboración y sus usos 
              tradicionales.  
              Continuamos hacia la icónica kasbah de Ait Ben Haddou, declarada Patrimonio de la Humanidad por la UNESCO 
              y escenario de películas como <em>Gladiator</em> o <em>La joya del Nilo</em>.  
              Tras el almuerzo seguimos hasta Ouarzazate, conocida como la “puerta del desierto”, donde cenarás y pasarás la noche.
            </p>
          </div>
          <figure class="experienceSplit-media">
            <img
              src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-ait.jpg"
              alt="Kasbah de Ait Ben Haddou y vistas del Alto Atlas" />
          </figure>
        </div>
        <br>

        <!-- ALOJAMIENTO -->
        <div class="decorativeCircleListinside mt-10">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
        </div>
        <h3 class="text-2xl font-rowdies">
          <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
          Hotel o riad en Ouarzazate
        </h3>

        <p class="text-text-primary mt-1">
          Noche en hotel o riad seleccionado en Ouarzazate, en régimen de media pensión (cena y desayuno).
        </p>
      </div>
    </li>

    <!-- DÍA 2 -->
    <li class="experienceItemList">
      <button class="decorativeCircleList accordion-trigger">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
      </button>

      <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
        2. OUARZAZATE · VALLE DEL DRAA · ALNIF · MERZOUGA
        <span class="h3-subtitle">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
          1 noche
        </span>
      </h3>

      <div class="exp-content">
        <div class="experienceSplit">
          <div class="experienceSplit-text">
            <p>
              Después del desayuno partimos hacia el Valle del Draa, uno de los más largos de Marruecos, 
              repleto de palmerales, pueblos bereberes y antiguas kasbahs de adobe.  
              Seguimos hacia Alnif, donde haremos una parada para almorzar, y tras unas horas de ruta el paisaje 
              se vuelve cada vez más desértico hasta llegar a las dunas de Merzouga.  
              A tu llegada te recibirán con un té de bienvenida. Tras dejar el equipaje principal en el albergue, 
              iniciarás un paseo en dromedario de aproximadamente una hora y media hasta el campamento en pleno desierto, 
              disfrutando de un atardecer inolvidable sobre las dunas de Erg Chebbi.  
              Cena bajo las estrellas y noche en jaima tradicional.
            </p>
          </div>
          <figure class="experienceSplit-media">
            <img
              src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-valle.jpg"
              alt="Valle del Draa y llegada a las dunas de Merzouga" />
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
          Noche en jaimas totalmente equipadas en un campamento bereber en las dunas de Erg Chebbi, 
          con cena tradicional y cielo estrellado.
        </p>
      </div>
    </li>

    <!-- DÍA 3 -->
    <li class="experienceItemList">
      <button class="decorativeCircleList accordion-trigger">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
      </button>

      <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
        3. MERZOUGA · KHAMLIA · NÓMADAS · MERZOUGA
        <span class="h3-subtitle">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
          1 noche
        </span>
      </h3>

      <div class="exp-content">
        <div class="experienceSplit">
          <div class="experienceSplit-text">
            <p>
              El día comienza contemplando el amanecer sobre las dunas.  
              Tras el desayuno y una ducha, saldremos a explorar los alrededores de Erg Chebbi en vehículo, 
              visitando un oasis en el desierto y el asentamiento de familias nómadas para conocer de cerca 
              su forma de vida.  
              A continuación nos dirigiremos a Khamlia, un pueblo de origen maliense, donde disfrutarás de un 
              concierto de música gnawa mientras tomas un té.  
              La tarde queda libre para subir a las dunas, descansar en el alojamiento o simplemente admirar 
              el paisaje cambiando de color al atardecer.  
              Por la noche, cena y espectáculo de tambores bereberes.
            </p>
          </div>
          <figure class="experienceSplit-media">
            <img
              src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-ruta.jpg"
              alt="Exploración de Merzouga, Khamlia y familias nómadas" />
          </figure>
        </div>
        <br>

        <!-- ALOJAMIENTO -->
        <div class="decorativeCircleListinside mt-10">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
        </div>
        <h3 class="text-2xl font-rowdies">
          <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
          Alojamiento en la zona de Merzouga
        </h3>

        <p class="text-text-primary mt-1">
          Noche en albergue u hotel en la zona de Merzouga, en régimen de media pensión.
        </p>
      </div>
    </li>

    <!-- DÍA 4 -->
    <li class="experienceItemList">
      <button class="decorativeCircleList accordion-trigger">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
      </button>

      <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
        4. MERZOUGA · RISSANI · ERFOUD · GARGANTAS DEL TODRA · VALLE DEL DADES
        <span class="h3-subtitle">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
          1 noche
        </span>
      </h3>

      <div class="exp-content">
        <div class="experienceSplit">
          <div class="experienceSplit-text">
            <p>
              Tras el desayuno, dejamos la zona del desierto y ponemos rumbo a Rissani, 
              donde podremos conocer su animada medina tradicional.  
              Continuamos hacia Erfoud para visitar una fábrica de mármol fosilizado, famosa por sus fósiles 
              prehistóricos trabajados de manera artesanal.  
              Seguimos la ruta hacia las impresionantes Gargantas del Todra, un desfiladero de paredes verticales 
              de hasta 300 metros de altura, ideal para los amantes de la naturaleza y la escalada.  
              Dispondremos de tiempo para una caminata de aproximadamente media hora y para almorzar en la zona.  
              Por la tarde, continuaremos hasta el Valle del Dades, pasando por Boumalne, donde cenaremos y 
              pasaremos la noche.
            </p>
          </div>
          <figure class="experienceSplit-media">
            <img
              src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-valle.jpg"
              alt="Gargantas del Todra y Valle del Dades" />
          </figure>
        </div>
        <br>

        <!-- ALOJAMIENTO -->
        <div class="decorativeCircleListinside mt-10">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
        </div>
        <h3 class="text-2xl font-rowdies">
          <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
          Riad u hotel en el Valle del Dades
        </h3>

        <p class="text-text-primary mt-1">
          Noche en riad u hotel en el Valle del Dades, rodeado de formaciones rocosas y paisaje de montaña, 
          en régimen de media pensión.
        </p>
      </div>
    </li>

    <!-- DÍA 5 -->
    <li class="experienceItemList">
      <button class="decorativeCircleList accordion-trigger">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
      </button>

      <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
        5. VALLE DEL DADES · SKOURA · OUARZAZATE · MARRAKECH
      </h3>

      <div class="exp-content">
        <div class="experienceSplit">
          <div class="experienceSplit-text">
            <p>
              En el último día seguimos la llamada “Ruta de las Mil Kasbahs”, atravesando paisajes de adobe y 
              pequeños pueblos hasta llegar al Valle de las Rosas y al gran palmeral de Skoura.  
              Continuamos hacia Ouarzazate, donde podremos visitar la kasbah de Taourirt, antigua residencia 
              del Pachá de Marrakech.  
              Tras el almuerzo, cruzaremos de nuevo las montañas del Alto Atlas por el puerto de Tizi N’Tichka 
              en dirección a Marrakech, donde llegaremos alrededor de las 17:00 h.  
              Fin del recorrido y traslado a tu hotel o riad.
            </p>
          </div>
          <figure class="experienceSplit-media">
            <img
              src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-ruta.jpg"
              alt="Ruta de las Mil Kasbahs y regreso a Marrakech" />
          </figure>
        </div>
      </div>
    </li>

  </ol>
</div>
</section>

<!-- ¿Qué incluye? -->
<section id="includes" class="py-2 bg-white">
  <div class="container mx-auto py-12 md:py-16">
    <div class="grid gap-8 md:grid-cols-2">

      <!-- INCLUYE -->
      <article class="group relative rounded-2xl overflow-hidden border-2 border-secondary bg-white shadow-sm hover:shadow-lg transition flex flex-col">
        <div class="text-center p-8">
          <div class="w-20 h-20 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-5">
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
              <span class="text-text-secondary">
                Recogida y traslado al inicio y fin del tour en Marrakech (hotel, riad o punto acordado)
              </span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">
                Vehículo 4×4 o minivan con aire acondicionado durante todo el recorrido
              </span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">
                Conductor y guía local de habla hispana durante todo el viaje
              </span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">
                Alojamiento en media pensión (desayuno y cena) durante 4 noches: Ouarzazate, desierto de Merzouga, zona Merzouga y Valle del Dades
              </span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">
                Paseo en dromedario al atardecer y noche en jaima tradicional en el desierto de Erg Chebbi
              </span>
            </li>

          </ul>
        </div>
      </article>

      <!-- NO INCLUYE -->
      <article
        class="group relative rounded-2xl overflow-hidden border-2 bg-white shadow-sm hover:shadow-lg transition flex flex-col"
        style="border-color: #8B1E3F;">
        <div class="text-center p-8">
          <div class="w-20 h-20 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-5">
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
              <span class="text-text-secondary">Comidas del mediodía durante el recorrido</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Bebidas y consumiciones adicionales</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Entradas a monumentos, kasbahs y estudios de cine</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Propinas, gastos personales y seguro de viaje (recomendado)</span>
            </li>

          </ul>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- FAQs -->
<section id="faqs" class="py-12 bg-white">
  <div class="container mx-auto px-6 md:px-8 pb-12">
    <h2 class="text-display font-satoshi-bold mb-6 text-center">Preguntas frecuentes</h2>

    <div data-accordion class="space-y-3 max-w-3xl mx-auto">

      <!-- Item 1: jaimas -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
        <button data-accordion-btn
                class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-1" id="faq-1-h">
          <span class="font-medium text-text-primary">¿Qué nivel de comodidad tienen las jaimas?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
              viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-1" role="region" aria-labelledby="faq-1-h"
            data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          Las jaimas del campamento están completamente equipadas, con camas cómodas, ropa de cama, electricidad y, 
          en la opción confort, baño privado.  
          Ofrecen una experiencia auténtica en el desierto sin renunciar a la comodidad.
        </div>
      </div>

      <!-- Item 2: dromedarios -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
        <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-2" id="faq-2-h">
          <span class="font-medium text-text-primary">¿Es necesaria experiencia previa para montar en dromedarios?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-2" role="region" aria-labelledby="faq-2-h"
             data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          No, no necesitas experiencia previa.  
          La ruta en dromedario es tranquila y está guiada en todo momento por personal local, 
          que te ayudará a subir y bajar con seguridad y marcará un ritmo cómodo.
        </div>
      </div>

      <!-- Item 3: mejor época -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
        <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-3" id="faq-3-h">
          <span class="font-medium text-text-primary">¿Cuál es la mejor época para realizar este tour?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-3" role="region" aria-labelledby="faq-3-h"
             data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          La mejor época para hacer este recorrido es en <strong>primavera y otoño</strong>, 
          cuando las temperaturas en el desierto son más suaves tanto de día como de noche.  
          En verano el calor puede ser muy intenso y en invierno las noches pueden ser frías.
        </div>
      </div>

      <!-- Item 4: comida -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
        <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-4" id="faq-4-h">
          <span class="font-medium text-text-primary">¿Qué tipo de comida se sirve durante el tour?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-4" role="region" aria-labelledby="faq-4-h"
             data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          Se ofrecen platos tradicionales marroquíes, como <strong>tagine</strong>, <strong>cuscús</strong>, 
          ensaladas, sopas y postres locales, acompañados de pan y té.  
          Siempre que sea posible se adaptan los menús a tus preferencias o necesidades dietéticas
          (vegetariano, intolerancias, etc.) si nos lo indicas con antelación.
        </div>
      </div>

      <!-- Item 5: familias -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
        <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-5" id="faq-5-h">
          <span class="font-medium text-text-primary">¿Es apto para familias con niños pequeños?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-5" role="region" aria-labelledby="faq-5-h"
             data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          Sí, el itinerario es <strong>apto para familias</strong> y puede adaptarse al ritmo de los más pequeños,
          realizando más paradas o acortando ciertos trayectos si es necesario.  
          Cuéntanos la edad de los niños para ajustar mejor la experiencia.
        </div>
      </div>

      <!-- Item 6: equipaje -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
        <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-6" id="faq-6-h">
          <span class="font-medium text-text-primary">¿Cómo se gestiona el equipaje durante la excursión?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-6" role="region" aria-labelledby="faq-6-h"
             data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          El equipaje principal viaja en el vehículo durante todo el recorrido.  
          Para la noche en el desierto solo llevarás una mochila pequeña con lo imprescindible en el paseo en dromedario, 
          y el resto se quedará seguro en el albergue.  
          <br><br>
          Es recomendable llevar <strong>efectivo en dirhams marroquíes</strong> para los servicios no incluidos, 
          ya que no siempre es posible pagar con tarjeta en todos los puntos del recorrido.
        </div>
      </div>

      <!-- Item 7: precio del viaje -->
      <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
        <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                aria-expanded="false" aria-controls="faq-7" id="faq-7-h">
          <span class="font-medium text-text-primary">¿Cuál es el precio del viaje?</span>
          <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
               viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </button>
        <div id="faq-7" role="region" aria-labelledby="faq-7-h"
             data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
          El precio final depende del tamaño del grupo:

          <ul class="mt-3 space-y-1 text-text-primary">
            <li>— <strong>4 personas:</strong> 450 € por persona</li>
            <li>— <strong>3 personas:</strong> 490 € por persona</li>
            <li>— <strong>2 personas:</strong> 590 € por persona</li>
          </ul>

          Estos importes incluyen el itinerario detallado, alojamiento en media pensión, transporte y 
          actividades indicadas en el programa.
        </div>
      </div>

    </div>
  </div>
</section>

  <!-- Best Time
  <section id="best-time" class="py-12 bg-white">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-rowdies text-text-primary mb-4 text-center">Mejor época para viajar</h2>
      <div class="best-time-carousel mt-10">
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Enero</h3>
            <span class="best-time-badge bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full">Ideal</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada seca</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Febrero</h3>
            <span class="best-time-badge bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full">Ideal</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada seca</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Marzo</h3>
            <span class="best-time-badge bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full">Ideal</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada seca</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Abril</h3>
            <span class="best-time-badge bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full">Ideal</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada seca</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Mayo</h3>
            <span class="best-time-badge bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Bueno</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada de lluvias</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Junio</h3>
            <span class="best-time-badge bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Bueno</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada de lluvias</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Julio</h3>
            <span class="best-time-badge bg-red-100 text-red-700 text-xs font-semibold px-2 py-1 rounded-full">Malo</span>
          </div>
          <p class="text-sm text-text-secondary">Turismo masivo</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Agosto</h3>
            <span class="best-time-badge bg-red-100 text-red-700 text-xs font-semibold px-2 py-1 rounded-full">Malo</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada de lluvias</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Septiembre</h3>
            <span class="best-time-badge bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Bueno</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada de lluvias</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Octubre</h3>
            <span class="best-time-badge bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Bueno</span>
          </div>
          <p class="text-sm text-text-secondary">Temporada de lluvias</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
          <div class="text-center mb-2">
            <h3 class="font-semibold text-text-primary">Noviembre</h3>
            <span class="best-time-badge bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full">Ideal</span>
          </div>
          <p class="text-sm text-text-secondary">Transición seca</p>
        </article>
        <article class="best-time-card p-5 border border-surface rounded-2xl bg-white shadow-sm">
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
  <section class="py-20 bg-surface">
    <div class="container mx-auto px-6 md:px-8 pb-12 md:pb-16">
      <div class="grid gap-4 md:grid-cols-3">
        <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-marrakech.jpg" alt="Luis Acuña durante el viaje de autor al Pantanal" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-mercado.jpg" alt="Amanecer en el río durante un viaje de autor al Pantanal con Ukiyo" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-desierto-noche.jpg" alt="Aves del Pantanal en un viaje de autor con guía experto" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
      </div>
    </div>
  </section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-primary text-white text-center">
    <div class="container mx-auto px-6 max-w-3xl">
        <div class="max-w-3xl mx-auto">

            <h2 class="text-xl mb-8 opacity-90">
                No es un viaje cualquiera: es el Desierto de Marruecos vivido de forma auténtica
            </h2>

            <p class="text-xl mb-8 opacity-90">
                Tres días diseñados para sentir la inmensidad del Sahara, recorrer pueblos bereberes 
                y dormir bajo un cielo estrellado imposible de olvidar. Un itinerario pensado para 
                saborear cada momento: desde las gargantas del Todra hasta las dunas doradas de Erg Chebbi.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" 
                   class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-white/80 transition">
                    Quiero vivir Marruecos
                </a>

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" 
                   class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-white/80 transition">
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