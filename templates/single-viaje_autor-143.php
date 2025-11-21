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
        <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viajes-a-marruecos-personalizados-erg-chebbi-merzouga.jpg"
             alt="Bromo"
             class="w-full h-full object-cover mask-image" 
             loading="lazy"
             onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;" />        
        <!-- Content Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-12">
            <div class="container mx-auto max-w-4xl">
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">A medida</span>
                    <span class="bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">Grupos reducidos</span>
                    <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-medium">Plazas limitadas</span>
                </div>
                <div class="hero-overlay-box">
                    <h1 class="text-4xl lg:text-6xl font-rowdies text-white mb-4 pl-4">
                    Merzouga: <br>
                    <span class="text-accent">Territorio bereber</span>
                    </h1>
                    <p class="text-xl text-white/90 max-w-3xl pl-4">
                Recorreremos con <strong>Moha</strong>, guía bereber de Merzouga, las dunas de <em>Erg Chebbi</em>, los palmerales y los oasis; atardeceres en el desierto y noches bajo un cielo de millones de estrellas.</p>
                <div class="hero-overlay-box pl-4">
                  <span class="text-sm mr-2">Desde</span>
                  <span class="text-2xl font-semibold">600€</span>
                  <span class="text-xs ml-2">/persona</span>
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
        Una aventura en <span class="text-secondary">Merzouga</span>
      </h2>
      <p class="mt-4 text-lg text-text-secondary leading-relaxed">
        Viajar con <strong>Moha</strong> no es un tour más: es aprender a leer el desierto. Cada día tiene un propósito —no una lista de “checkpoints”—: orientarte entre dunas, conocer familias nómadas y entender la vida amazigh. Aquí el ritmo lo marca el sol, el viento y la arena.
      </p>
    </header>

    <ul role="list" class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-primary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Amanecer en Erg Chebbi</h3>
        <p class="text-text-secondary">Antes de la primera luz, subimos a las dunas para ver cómo el sol enciende el horizonte. Silencio, horizonte limpio y té al amanecer en el campamento.</p>
      </li>
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-secondary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Rastros y orientación</h3>
        <p class="text-text-secondary">Moha te enseñará a leer el desierto: huellas de dromedario y zorro del desierto, dirección del viento y caminos invisibles entre dunas.</p>
      </li>
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-accent/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Té y historias bajo las estrellas</h3>
        <p class="text-text-secondary">Al caer el sol, cena en haima, música gnawa y conversación sobre la cultura amazigh y la antigua ruta de caravanas.</p>
      </li>
    </ul>
  </div>
</section>

<section class="py-20 bg-white">
    <!-- Contenido -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-30 container mx-auto px-6 md:px-8 py-10 md:py-14 max-w-8xl">
    <div class="flex flex-col items-start">
      <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viaje-de-autor-a-marruecos-con-guia-local-moha.jpg"
           alt="Luis Acuña"
           class="w-40 h-40 md:w-56 md:h-56 rounded-full object-cover ring-1 ring-border/60 bg-white/80" />
      <h2 class="mt-4 text-xl font-semibold text-text-primary">Moha</h2>
      <p class="mt-1 text-sm text-text-secondary max-w-xs">Guía bereber de Merzouga. Conoce cada duna de Erg Chebbi y comparte las tradiciones amazigh con respeto y cercanía.</p>
    </div>
    <div class="text-text-secondary text-[15px] space-y-4">
      <p>“Me llamo Moha y nací en una pequeña jaima a los pies de las dunas de Erg Chebbi, cerca de Merzouga. Mi familia es amazigh, descendiente de nómadas que recorrían el desierto con sus dromedarios, guiándose por las estrellas y el viento. Desde niño, el desierto fue mi escuela: aprendí a orientarme por la forma en que se curva una duna, a reconocer las huellas en la arena y a escuchar el silencio como si hablara.</p>
      <p>Cuando tenía ocho años, acompañé por primera vez a mi padre en una ruta de tres días con una pequeña caravana. Recuerdo que al anochecer, mientras preparábamos el fuego, él me dijo: “El desierto no se conquista, se respeta. Si lo escuchas, siempre te mostrará el camino.” Esa frase me marcó para siempre.</p>
      <p>A los quince años empecé a ayudar como guía para pequeños grupos de viajeros que llegaban curiosos por ver el amanecer sobre las dunas. No hablaba mucho su idioma, pero descubrí que una sonrisa, un buen té y una buena historia podían cruzar cualquier frontera. Con el tiempo aprendí español, francés e inglés, no en una escuela, sino alrededor del fuego, conversando con quienes venían de lejos.</p>
    </div>
    <div class="text-text-secondary text-[15px] space-y-4">
      <p>Hoy dedico mi vida a mostrar mi hogar con orgullo, pero también con respeto. No llevo a la gente solo a hacer una ruta en dromedario: les explico por qué el té se sirve tres veces, qué significan los tatuajes tradicionales, cómo los antiguos nómadas leían las estrellas y qué siente alguien que, como yo, ha crecido donde el cielo parece tocar la arena.</p>
      <p>Me gusta caminar descalzo sobre la duna más alta al atardecer y ver cómo el desierto cambia de color. A veces, cuando estoy con viajeros que se sientan en silencio, sé que empiezan a entender lo que mi padre me enseñó: aquí no se necesita prisa, solo dejar que el desierto te hable.</p>
      <p>Ser guía para mí no es un trabajo. Es una forma de compartir raíces, mostrar que detrás de cada huella hay una historia y que Erg Chebbi no es solo un lugar bonito, sino un hogar lleno de vida y memoria".</p>
    </div>
  </div>
</section>

  <!-- Trip Content -->
  <section class="py-2 bg-white">
    <div class="container mx-auto">
      <nav class="trip-nav flex justify-center border-b border-surface bg-background/80 backdrop-blur-sm py-4">
        <ul class="flex flex-wrap justify-center space-x-10 text-sm md:text-base font-medium">
          <li><a href="#itinerary" class="font-rowdies text-xl hover:text-primary transition-colors duration-300 active">Itinerario</a></li>
          <li><a href="#includes" class="font-rowdies text-xl hover:text-primary transition-colors duration-300">¿Qué incluye?</a></li>
          <li><a href="#faqs" class="font-rowdies text-xl hover:text-primary transition-colors duration-300">FAQs</a></li>
          <li><a href="#best-time" class="font-rowdies text-xl hover:text-primary transition-colors duration-300">Mejores épocas</a></li>
        </ul>
      </nav>
    </div>

    <!-- Itinerary -->
    <div id="itinerary" class="experienceSection">
      <ol class="experienceList">
        <li class="experienceItemList">
          <div class="decorativeCircleList">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-trip-arrival.svg" alt="" />
          </div>
          <h3 class="text-2xl font-rowdies text-text-primary mb-1"><span class="block text-sm text-text-secondary font-satoshi">Llegada</span>AEROPUERTO DE SAN JOSÉ (SJO)</h3>

        <li class="experienceItemList">

          <!-- ICONO -->
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-arrow-right.svg" alt="" />
          </button>

          <!-- TÍTULO (también abre/cierra el acordeón al hacer clic) -->
          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            1. TORTUGUERO
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              2 noches
            </span>
          </h3>

          <!-- ACCORDION CONTENT -->
          <div class="exp-content">
            <!-- EXPERIENCE SPLIT (SE MUESTRA DENTRO DEL ACORDEÓN) -->
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Obtén acceso a más de 30 páginas, incluyendo un diseño de panel de
                  control, gráficos, tablero de tareas, calendario y páginas de
                  comercio electrónico y marketing.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.jpg"
                  alt="Recorrido por los canales de Tortuguero" />
              </figure>
            </div>
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies">Alojamiento</h3>

            <h4 class="text-xl font-semibold text-text-primary">Onguma The Fort</h4>
            <p class="text-text-primary mt-1">Exclusive scenery and stylish suites complimented with modern functionality</p>
            <!-- Activities -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <!-- Slider -->
            <div class="ukiyo-activities-wrapper relative mt-4">
              <!-- SLIDER TRACK -->
              <div class="ukiyo-activities-slider">

                <!-- ACTIVITY CARD 1 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>5h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Full Day Game Drive</h4>
                    <p class="mt-1 text-gray-600">Embark on a captivating game drive...</p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 2 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>4</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>3h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Boat Tour in the Canals</h4>
                    <p class="mt-1 text-gray-600">Navigate the lush channels of Tortuguero...</p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 3 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-caribe-sur-cahuita.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>10</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>2h 10m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Hiking Through Cahuita</h4>
                    <p class="mt-1 text-gray-600">Explore pristine jungle trails near Cahuita...</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li class="experienceItemList">

          <!-- ICONO -->
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-arrow-right.svg" alt="" />
          </button>

          <!-- TÍTULO (también abre/cierra el acordeón al hacer clic) -->
          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            1. TORTUGUERO
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              2 noches
            </span>
          </h3>

          <!-- ACCORDION CONTENT -->
          <div class="exp-content">
            <!-- EXPERIENCE SPLIT (SE MUESTRA DENTRO DEL ACORDEÓN) -->
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Obtén acceso a más de 30 páginas, incluyendo un diseño de panel de
                  control, gráficos, tablero de tareas, calendario y páginas de
                  comercio electrónico y marketing.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.jpg"
                  alt="Recorrido por los canales de Tortuguero" />
              </figure>
            </div>
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies">Alojamiento</h3>

            <h4 class="text-xl font-semibold text-text-primary">Onguma The Fort</h4>
            <p class="text-text-primary mt-1">Exclusive scenery and stylish suites complimented with modern functionality</p>
            <!-- Activities -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <!-- Slider -->
            <div class="ukiyo-activities-wrapper relative mt-4">
              <!-- SLIDER TRACK -->
              <div class="ukiyo-activities-slider">

                <!-- ACTIVITY CARD 1 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>5h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Full Day Game Drive</h4>
                    <p class="mt-1 text-gray-600">Embark on a captivating game drive...</p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 2 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>4</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>3h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Boat Tour in the Canals</h4>
                    <p class="mt-1 text-gray-600">Navigate the lush channels of Tortuguero...</p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 3 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-caribe-sur-cahuita.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>10</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>2h 10m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Hiking Through Cahuita</h4>
                    <p class="mt-1 text-gray-600">Explore pristine jungle trails near Cahuita...</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li class="experienceItemList">

          <!-- ICONO -->
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-arrow-right.svg" alt="" />
          </button>

          <!-- TÍTULO (también abre/cierra el acordeón al hacer clic) -->
          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            1. TORTUGUERO
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              2 noches
            </span>
          </h3>

          <!-- ACCORDION CONTENT -->
          <div class="exp-content">
            <!-- EXPERIENCE SPLIT (SE MUESTRA DENTRO DEL ACORDEÓN) -->
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Obtén acceso a más de 30 páginas, incluyendo un diseño de panel de
                  control, gráficos, tablero de tareas, calendario y páginas de
                  comercio electrónico y marketing.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.jpg"
                  alt="Recorrido por los canales de Tortuguero" />
              </figure>
            </div>
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies">Alojamiento</h3>

            <h4 class="text-xl font-semibold text-text-primary">Onguma The Fort</h4>
            <p class="text-text-primary mt-1">Exclusive scenery and stylish suites complimented with modern functionality</p>
            <!-- Activities -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <!-- Slider -->
            <div class="ukiyo-activities-wrapper relative mt-4">
              <!-- SLIDER TRACK -->
              <div class="ukiyo-activities-slider">

                <!-- ACTIVITY CARD 1 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>5h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Full Day Game Drive</h4>
                    <p class="mt-1 text-gray-600">Embark on a captivating game drive...</p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 2 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>4</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>3h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Boat Tour in the Canals</h4>
                    <p class="mt-1 text-gray-600">Navigate the lush channels of Tortuguero...</p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 3 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-caribe-sur-cahuita.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>10</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>2h 10m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Hiking Through Cahuita</h4>
                    <p class="mt-1 text-gray-600">Explore pristine jungle trails near Cahuita...</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li class="experienceItemList">

          <!-- ICONO -->
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-arrow-right.svg" alt="" />
          </button>

          <!-- TÍTULO (también abre/cierra el acordeón al hacer clic) -->
          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            1. TORTUGUERO
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              2 noches
            </span>
          </h3>

          <!-- ACCORDION CONTENT -->
          <div class="exp-content">
            <!-- EXPERIENCE SPLIT (SE MUESTRA DENTRO DEL ACORDEÓN) -->
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Obtén acceso a más de 30 páginas, incluyendo un diseño de panel de
                  control, gráficos, tablero de tareas, calendario y páginas de
                  comercio electrónico y marketing.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.jpg"
                  alt="Recorrido por los canales de Tortuguero" />
              </figure>
            </div>
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies">Alojamiento</h3>

            <h4 class="text-xl font-semibold text-text-primary">Onguma The Fort</h4>
            <p class="text-text-primary mt-1">Exclusive scenery and stylish suites complimented with modern functionality</p>
            <!-- Activities -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <!-- Slider -->
            <div class="ukiyo-activities-wrapper relative mt-4">
              <!-- SLIDER TRACK -->
              <div class="ukiyo-activities-slider">

                <!-- ACTIVITY CARD 1 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>5h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Full Day Game Drive</h4>
                    <p class="mt-1 text-gray-600">Embark on a captivating game drive...</p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 2 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>4</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>3h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Boat Tour in the Canals</h4>
                    <p class="mt-1 text-gray-600">Navigate the lush channels of Tortuguero...</p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 3 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-caribe-sur-cahuita.jpg" alt="" class="activity-cover">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>10</span>
                      <span>•</span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>2h 10m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Hiking Through Cahuita</h4>
                    <p class="mt-1 text-gray-600">Explore pristine jungle trails near Cahuita...</p>
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
  <section id="includes" class="py-2 bg-white">
    <div class="container mx-auto py-12 md:py-16">
      <div class="grid gap-8 md:grid-cols-2">
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
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Guía/autor (Luis) durante todo el viaje</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Navegaciones y permisos locales</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Alojamiento en lodge seleccionado</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Asesoría fotográfica en campo</span></li>
            </ul>
          </div>
        </article>
        <article
          class="group relative rounded-2xl overflow-hidden border-2 bg-white shadow-sm hover:shadow-lg transition flex flex-col"
          style="border-color: #8B1E3F;">          <div class="text-center p-8">
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
              <li class="flex justify-center"><svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Vuelos internacionales</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Seguro de viaje</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Comidas no especificadas</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Gastos personales</span></li>
            </ul>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- FAQs -->
  <section id="faqs" class="py-12 bg-white">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-rowdies text-text-primary mb-8 text-center">Preguntas frecuentes</h2>
      <div class="space-y-4 max-w-3xl mx-auto">
        <details class="p-5 border border-surface rounded-xl bg-white">
          <summary class="cursor-pointer font-semibold text-text-primary">¿El viaje es privado?</summary>
          <p class="mt-2 text-text-secondary">Sí, la ruta se diseña únicamente para tu grupo y los traslados son exclusivos.</p>
        </details>
        <details class="p-5 border border-surface rounded-xl bg-white">
          <summary class="cursor-pointer font-semibold text-text-primary">¿Podemos modificar el itinerario?</summary>
          <p class="mt-2 text-text-secondary">Puedes ajustar noches, hoteles y excursiones antes de confirmar la reserva.</p>
        </details>
        <details class="p-5 border border-surface rounded-xl bg-white">
          <summary class="cursor-pointer font-semibold text-text-primary">¿Qué documentación necesito?</summary>
          <p class="mt-2 text-text-secondary">Pasaporte vigente. Ciudadanos UE/Latam no necesitan visado para estancias turísticas menores a 90 días.</p>
        </details>
        <details class="p-5 border border-surface rounded-xl bg-white">
          <summary class="cursor-pointer font-semibold text-text-primary">¿Hay asistencia durante el viaje?</summary>
          <p class="mt-2 text-text-secondary">Nuestro Travel Concierge está disponible por WhatsApp y teléfono 24/7 para cualquier imprevisto.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- Best Time -->
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
  </section>

<!-- CTA -->
<section class="py-20 bg-gradient-primary text-white text-center">
    <div class="container mx-auto px-6 max-w-3xl">
        <h2 class="text-display font-satoshi mb-6">¿No encuentras tu viaje ideal?</h2>
        <p class="text-xl mb-8 opacity-90">Cada persona viaja a su manera.
        Cuéntanos qué te mueve y crearemos juntos una experiencia que encaje contigo.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo esc_url( site_url('/planifica-tu-viaje') ); ?>" class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-white/80 transition" aria-label="Abrir formulario para contarnos tu idea">
            Cuéntanos tu idea
            </a>
            <!-- <a href="<?php echo esc_url( site_url('/about') ); ?>" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition">Hablar con un Curador</a> -->
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