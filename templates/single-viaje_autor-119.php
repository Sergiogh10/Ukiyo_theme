<?php
/*
 * Single template for viaje_autor post ID 119
 * Description: Ficha de viaje de autor (Luis – Costa Rica).
 */
get_header();
$uri = get_template_directory_uri();
?>

  <!-- HERO -->
<section class="relative">
    <div class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-de-autor-a-costa-rica-fotografia-buitre.webp"
             alt="Buitre en Costa Rica durante un viaje de autor con guía experto (Luis)"
             class="w-full h-full object-cover object-bottom mask-image" 
             loading="lazy"
             onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.webp'; this.onerror=null;" />
        <!-- Content Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 lg:p-12">
            <div class="container mx-auto max-w-4xl">
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="btn-primary text-text-secondary px-3 py-1 rounded-full text-sm font-medium">12 días</span>
                    <span class="btn-primary text-text-secondary px-3 py-1 rounded-full text-sm font-medium">Grupos reducidos</span>
                    <span class="btn-primary text-text-secondary px-3 py-1 rounded-full text-sm font-medium">Plazas limitadas</span>
                </div>
                <div class="hero-overlay-box">
                  <h1 class="text-3xl md:text-4xl lg:text-6xl font-rowdies text-white mb-4 pl-4">
                      Wild Costa Rica: <br>
                    <span class="text-accent">el viaje fotográfico definitivo</span>
                  </h1>
                  <p class="text-xl text-white/90 max-w-3xl pl-4">
                  Una expedición única para capturar la esencia salvaje de uno de los países con mayor biodiversidad del planeta</p>
                <div class="hero-overlay-box pl-4">
                  <span class="text-sm mr-2">Desde</span>
                  <span class="text-2xl font-semibold">3.100€</span>
                  <span class="text-xs ml-2">/persona</span>
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
        Una aventura <span class="text-secondary">irrepetible</span>
      </h2>
      <p class="mt-4 text-lg text-text-secondary leading-relaxed">
        Viajar con Luis no es solo fotografiar fauna: es comprenderla.  
        Cada jornada está diseñada para maximizar encuentros auténticos con aves, mamíferos y especies únicas, desde los bosques secos de Orotina hasta la selva profunda de Corcovado.
        Aprenderás a leer la selva, a anticipar comportamientos y a disfrutar del privilegio de trabajar codo a codo con quienes protegen estos ecosistemas.
      </p>
    </header>

    <ul role="list" class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Punto 1 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-background flex items-center justify-center">
          <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Amaneceres que lo cambian todo</h3>
        <p class="text-text-secondary">
          En Orotina, San Gerardo de Dota y Boca Tapada, los primeros rayos de luz revelan el movimiento de tucanes, colibríes y quetzales. Salidas tempranas, silenciosas y muy íntimas donde cada disparo de cámara cuenta.
        </p>
      </li>

      <!-- Punto 2 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-background flex items-center justify-center">
          <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Leer la selva como un local</h3>
        <p class="text-text-secondary">
          En Corcovado y Guápiles, Luis te enseñará a interpretar rastros, sonidos y patrones de comportamiento. No es suerte: es conocimiento aplicado para encontrar tapires, monos y especies que muchos nunca llegan a ver.
        </p>
      </li>

      <!-- Punto 3 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-background flex items-center justify-center">
          <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Conversaciones que permanecen</h3>
        <p class="text-text-secondary">
          Cada tarde, de vuelta al lodge, compartiréis fotografías, aprendizajes y anécdotas con personas dedicadas a conservar estos ecosistemas. Sin prisas, sin masificación, solo conexión real.
        </p>
      </li>

    </ul>
  </div>
</section>

<section class="py-20 bg-background">
    <!-- Contenido -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-30 container mx-auto px-6 md:px-8 py-10 md:py-14 max-w-8xl">
    <div class="flex flex-col items-start">
      <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/autor-luis.png"
           alt="Luis Acuña, guía experto en naturaleza y fotografía del Pantanal"
           class="w-40 h-40 md:w-56 md:h-56 rounded-full object-cover ring-1 ring-border/60 bg-background" />
      <h2 class="mt-4 text-xl font-semibold text-text-primary">Luis Acuña</h2>
      <p class="mt-1 text-sm text-text-secondary max-w-xs">Guía costarricense y fotógrafo profesional. Conoce los diferentes sonidos de la selva y localiza a los animales más escurridizos.</p>
    </div>
    <div class="text-text-secondary text-[15px] space-y-4">
      <p>“Soy Luis, un guía turístico y fotógrafo de vida silvestre con experiencia. Estoy decidido a hacer un impacto positivo en las personas y el planeta.</p>
      <div id="bio-hidden-1" class="hidden md:block space-y-4">
        <p>Imagino cada tour de vida silvestre como una semilla, plantada en el corazón de cada viajero que pone un pie en el paraíso biodiverso de Costa Rica. Es por eso que visualizo un legado que trasciende fronteras y generaciones; pronto entenderás.</p>
        <p>A medida que los viajeros se unen a mí en un viaje por las impresionantes regiones de Corcovado y Osa, les ayudo a ver que no son meros observadores, son participantes en una gran danza interconectada de la vida. Disfruto mostrando a las personas animales en su hábitat y su comportamiento en diferentes situaciones. Cada fotografía que mis clientes toman es un testimonio de la belleza que prospera en estas tierras, una belleza que exige ser preservada.</p>
      </div>
    </div>
    <div id="bio-hidden-2" class="text-text-secondary text-[15px] space-y-4 hidden md:block">
      <p>Cuando cae la noche, la sinfonía de la naturaleza continúa — sí, ChatGPT me ayudó con esa frase —. Pero es cierto, resuena conmigo porque mis tours nocturnos se centran en observar reptiles y anfibios, estos fascinantes seres ofrecen un vistazo a un mundo a menudo pasado por alto. Por la noche hay más historias esperando ser descubiertas y contadas a tus seres queridos.</p>
      <p>Cuando los viajeros regresan a sus países, llevan consigo más que recuerdos y fotografías. Llevan un respeto y amor renovados o nuevos — depende — por la naturaleza, una chispa encendida por sus experiencias. La verdad es que más a menudo de lo que piensas, las personas me dicen que quieren volver a visitar Costa Rica. Es esta chispa la que espero que encienda una llama, inspirándolos a ellos y a quienes los rodean a unirse en el esfuerzo por proteger y preservar a la Madre Naturaleza.</p>
      <p>En esencia, mi misión no es solo guiar, sino iluminar, inspirar e inculcar un sentido de responsabilidad hacia nuestro planeta. Un tour a la vez, estoy sembrando semillas de cambio, cultivando un jardín global de defensores de la naturaleza. Este es mi legado, mi contribución a un futuro donde la armonía entre humanos y naturaleza no es solo un sueño, sino una realidad”.</p>
    </div>
    <button id="bio-read-more" class="md:hidden text-primary font-semibold mt-2 hover:underline focus:outline-none">Leer más</button>
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
          <li><a href="#itinerary" class="font-rowdies text-sm md:text-2xl hover:text-primary transition-colors duration-300 active">Itinerario</a></li>
          <li><a href="#includes" class="font-rowdies text-sm md:text-2xl hover:text-primary transition-colors duration-300">¿Qué incluye?</a></li>
          <li><a href="#faqs" class="font-rowdies text-sm md:text-2xl hover:text-primary transition-colors duration-300">FAQs</a></li>
          <!-- <li><a href="#best-time" class="font-rowdies text-sm md:text-xl hover:text-primary transition-colors duration-300">Mejores épocas</a></li> -->
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
            AEROPUERTO INTERNACIONAL JUAN SANTAMARÍA (SJO)
          </h3>
          <p class="mt-2 text-text-secondary max-w-xl">
            Llegada a San José y encuentro con el equipo. Traslado al alojamiento y primeras
            indicaciones sobre el uso del equipo, seguridad y objetivos fotográficos del viaje.
          </p>
        </li>

        <!-- 1. OROTINA – CERRO LODGE -->
        <li class="experienceItemList">
          <!-- ICONO -->
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
          </button>

          <!-- TÍTULO -->
          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            1. OROTINA
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              2 noches
            </span>
          </h3>

          <!-- CONTENIDO ACORDEÓN -->
          <div class="exp-content">
            <!-- EXPERIENCE SPLIT -->
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Empezamos el viaje en una de las zonas más especiales para la observación de aves.
                  Cerro Lodge es un imán para tucanes, guacamayas, momotos y búhos. Las primeras
                  jornadas están pensadas para afinar el ojo, ajustar el equipo y ganar confianza
                  con las especies más icónicas del Pacífico.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-monteverde.webp"
                  alt="Observación de aves en los alrededores de Orotina y Cerro Lodge" />
              </figure>
            </div>
            <br>

            <!-- ALOJAMIENTO -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies"><span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>Cerro Lodge</h3>

            <p class="text-text-primary mt-1">
              Lodge rodeado de naturaleza, con comederos, perchas y fondos ideales para fotografía,
              además de miradores con luz privilegiada al amanecer y atardecer.
            </p>

            <!-- ACTIVIDADES -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <!-- Slider -->
            <div class="ukiyo-activities-wrapper relative mt-4">
              <div class="ukiyo-activities-slider">

                <!-- ACTIVITY CARD 1 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-tucan.webp" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>10</span>
                      <span>•</span>-->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>3h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Sesión de aves al amanecer</h4>
                    <p class="mt-1 text-gray-600 text-justify">
                      Trabajo de luz suave con tucanes, momotos y otras especies residentes
                      en los alrededores del lodge.
                    </p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 2 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-buho.webp" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>10</span>
                      <span>•</span>-->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>2h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Salida nocturna de búhos</h4>
                    <p class="mt-1 text-gray-600 text-justify">
                      Búsqueda de búho chillón del Pacífico y otras especies
                      nocturnas, trabajando técnica de enfoque y control de luz artificial.
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </li>

        <!-- 2. PUERTO JIMÉNEZ -->
        <li class="experienceItemList">
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
          </button>

          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            2. PUERTO JIMÉNEZ
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              3 noches
            </span>
          </h3>

          <div class="exp-content">
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Puerto Jiménez será nuestra base en la Península de Osa. Desde aquí nos
                  preparamos para adentrarnos en Corcovado y visitamos proyectos locales
                  como jardines de perezosos y hides de buitres rey. Es el punto de transición
                  entre el confort del lodge y la intensidad de la selva profunda.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.webp"
                  alt="Puerto Jiménez, puerta de entrada a Corcovado" />
              </figure>
            </div>
            <br>

            <!-- Alojamiento -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies"><span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>Cabinas Jimenez</h3>

            <p class="text-text-primary mt-1">
              Alojamiento frente al golfo, cómodo y práctico, perfecto para organizar salidas
              tempranas hacia Corcovado y los proyectos de conservación cercanos.
            </p>

            <!-- Actividades -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <div class="ukiyo-activities-wrapper relative mt-4">
              <div class="ukiyo-activities-slider">

                <!-- ACTIVITY CARD 1 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-perezoso.webp" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>-->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>4h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Visita a La Perica Sloth Garden</h4>
                    <p class="mt-1 text-gray-600">
                      Encuentro cercano con perezosos en un proyecto local, trabajando composición,
                      retrato de fauna y respeto a la distancia mínima.
                    </p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 2 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-buitrerey.png" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>4</span>
                      <span>•</span>-->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>3h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">HikeHide de buitre rey</h4>
                    <p class="mt-1 text-gray-600">
                      Sesión en hide para fotografiar buitres rey y otras rapaces, cuidando
                      fondo, distancia focal y tiempos de espera.
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </li>

        <!-- 3. CORCOVADO -->
        <li class="experienceItemList">
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
          </button>

          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            3. CORCOVADO
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              1 noche
            </span>
          </h3>

          <div class="exp-content">
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Salimos en barco al amanecer hacia uno de los lugares con mayor densidad de vida
                  salvaje del planeta. Aquí la prioridad son mamíferos: tapires, cuatro especies de
                  monos, pecaríes y más. Dormir dentro del parque nos permite aprovechar luz de
                  primera y última hora en plena selva.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-atardecer.webp"
                  alt="Exploración y fotografía en Corcovado" />
              </figure>
            </div>
            <br>

            <!-- Alojamiento -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies"><span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>Estación Sirena</h3>

            <p class="text-text-primary mt-1">
              Alojamiento sencillo pero único: dormir en mitad de la selva, con sonidos de fauna
              nocturna y salidas directas a los senderos al amanecer.
            </p>

            <!-- Actividades -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <div class="ukiyo-activities-wrapper relative mt-4">
              <div class="ukiyo-activities-slider">

                <!-- ACTIVITY CARD 1 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-tapir.webp" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>-->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>6h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Trekking fotográfico por la selva</h4>
                    <p class="mt-1 text-gray-600">
                      Recorrido guiado para buscar tapires, monos y otras especies, trabajando
                      fotografía en condiciones de luz exigentes bajo el dosel.
                    </p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 2 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-tucanazul.webp" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>-->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>3h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Salida al amanecer</h4>
                    <p class="mt-1 text-gray-600">
                      Búsqueda de fauna activa a primera hora, trabajando sigilo, composición rápida
                      y anticipación del movimiento.
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </li>

        <!-- 4. SAN GERARDO DE DOTA -->
        <li class="experienceItemList">
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
          </button>

          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            4. SAN GERARDO DE DOTA
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              2 noches
            </span>
          </h3>

          <div class="exp-content">
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Cambiamos de ecosistema y nos adentramos en el bosque nuboso. San Gerardo de Dota
                  es el escenario perfecto para buscar al quetzal resplandeciente y trabajar con
                  colibríes y tanagras en un entorno de montaña.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-queztalvolando.webp"
                  alt="Bosque nuboso en San Gerardo de Dota" />
              </figure>
            </div>
            <br>

            <!-- Alojamiento -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies"><span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>Lodge de montaña</h3>

            <p class="text-text-primary mt-1">
              Habitaciones acogedoras rodeadas de bosque nuboso, con senderos cercanos y puntos
              estratégicos para la observación de quetzales.
            </p>

            <!-- Actividades -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <div class="ukiyo-activities-wrapper relative mt-4">
              <div class="ukiyo-activities-slider">

                <!-- ACTIVITY CARD 1 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-queztal.webp" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>-->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>4h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Salida en busca del quetzal</h4>
                    <p class="mt-1 text-gray-600">
                      Observación y fotografía del quetzal con guía local, aprendiendo a anticipar
                      sus movimientos y aprovechar la luz del bosque nuboso.
                    </p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 2 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-momoto.webp" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>-->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>3h</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Colibríes y tanagras</h4>
                    <p class="mt-1 text-gray-600">
                      Sesión dedicada a congelar vuelo, trabajar fondos limpios y experimentar con
                      velocidades altas y ráfagas controladas.
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </li>

        <!-- 5. GUÁPILES – CENTRO MANU -->
        <li class="experienceItemList">
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
          </button>

          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            5. GUÁPILES
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              2 noches
            </span>
          </h3>

          <div class="exp-content">
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Aquí el foco se desplaza hacia anfibios y reptiles. Ranas de colores, serpientes
                  y murciélagos se convierten en protagonistas, tanto en salidas nocturnas como en
                  sesiones controladas alrededor del lodge.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-iguana.webp"
                  alt="Fotografía de ranas y anfibios en Guápiles" />
              </figure>
            </div>
            <br>

            <!-- Alojamiento -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies"><span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>Centro Manu</h3>

            <p class="text-text-primary mt-1">
              Lodge especializado en herpetología, con espacios preparados para fotografía de ranas,
              serpientes y murciélagos de forma ética y segura.
            </p>

            <!-- Actividades -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <div class="ukiyo-activities-wrapper relative mt-4">
              <div class="ukiyo-activities-slider">

                <!-- ACTIVITY CARD 1 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-rana.webp" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>-->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>3h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Salida nocturna de anfibios</h4>
                    <p class="mt-1 text-gray-600">
                      Búsqueda de ranas y otros anfibios en su hábitat natural, trabajando el uso
                      del flash, la composición y el respeto por los individuos.
                    </p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 2 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-whitebat.webp" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>-->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>2h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Murciélagos blancos hondureños</h4>
                    <p class="mt-1 text-gray-600">
                      Sesión dedicada a murciélagos y pequeños mamíferos, trabajando enfoque
                      preciso y mínimos niveles de impacto.
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </li>

        <!-- 6. BOCA TAPADA – LAGARTO LODGE -->
        <li class="experienceItemList">
          <button class="decorativeCircleList accordion-trigger">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
          </button>

          <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
            6. BOCA TAPADA
            <span class="h3-subtitle">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
              2 noches
            </span>
          </h3>

          <div class="exp-content">
            <div class="experienceSplit">
              <div class="experienceSplit-text">
                <p>
                  Cerramos el viaje en uno de los mejores puntos del Caribe norte para fotografía
                  de aves. Aquí trabajaremos con tucanes, especies del Caribe y sesiones de
                  murciélagos en vuelo con mult flashes para llevar tu portfolio a otro nivel.
                </p>
              </div>
              <figure class="experienceSplit-media">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-bocatapada.webp"
                  alt="Fotografía de aves en Boca Tapada" />
              </figure>
            </div>
            <br>

            <!-- Alojamiento -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
            </div>
            <h3 class="text-2xl font-rowdies"><span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>Lagarto Lodge</h3>

            <p class="text-text-primary mt-1">
              Lodge rodeado de selva y ríos, con hides y perchas diseñadas para fotografía de aves
              y sesiones especializadas de murciélagos en vuelo.
            </p>

            <!-- Actividades -->
            <div class="decorativeCircleListinside mt-10">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
            </div>
            <h3 class="text-2xl font-rowdies">Actividades</h3>

            <div class="ukiyo-activities-wrapper relative mt-4">
              <div class="ukiyo-activities-slider">

                <!-- ACTIVITY CARD 1 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-tucan.webp" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span>-->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>3h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Sesión de tucanes y aves del Caribe</h4>
                    <p class="mt-1 text-gray-600">
                      Trabajo con varias especies de tucanes y aves frugívoras, cuidando el
                      encuadre, el fondo y el color.
                    </p>
                  </div>
                </div>

                <!-- ACTIVITY CARD 2 -->
                <div class="ukiyo-activity-card">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-murcielago.webp" alt="" class="activity-cover mask-image">
                  <div class="p-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                      <!--<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-people.svg" width="14">
                      <span>6</span>
                      <span>•</span> -->
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                      <span>2h 30m</span>
                    </div>
                    <h4 class="mt-1 text-lg font-semibold">Murciélagos en vuelo con mult flashes</h4>
                    <p class="mt-1 text-gray-600">
                      Sesión técnica con mult flashes para congelar murciélagos en pleno vuelo,
                      trabajando precisión, paciencia y coordinación.
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
              <span class="text-text-secondary">Coche, combustible y conductor durante todo el recorrido</span>
            </li>
            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Guías certificados especializados en fauna y fotografía</span>
            </li>
            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Alojamiento en habitaciones triples con desayuno incluido</span>
            </li>
            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Tours y entradas a propiedades privadas y parques nacionales según itinerario</span>
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
              <span class="text-text-secondary">Billetes de avión internacionales</span>
            </li>
            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Seguro de viaje</span>
            </li>
            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Comidas no mencionadas en el programa</span>
            </li>
            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Gastos personales (propinas, bebidas, compras, etc.)</span>
            </li>
            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Cualquier otra actividad o cambio de itinerario no especificado</span>
            </li>
          </ul>
        </div>
      </article>

    </div>
  </div>
</section>

  <!-- FAQs -->

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
            id="faq-btn-119-1" aria-expanded="false" aria-controls="faq-panel-119-1">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿El viaje es privado?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-119-1" role="region" aria-hidden="true" aria-labelledby="faq-btn-119-1" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>No. Este es un <strong>viaje en grupo</strong> con plazas limitadas.  
          Una vez se llenan, no se añaden más participantes para mantener la experiencia cercana y controlada.</p>
            </div>
          </div>
        </div>
        
        <!-- Item 2 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-background">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-119-2" aria-expanded="false" aria-controls="faq-panel-119-2">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Podemos modificar el itinerario?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-119-2" role="region" aria-hidden="true" aria-labelledby="faq-btn-119-2" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>No. La ruta está <strong>diseñada específicamente</strong> para maximizar las probabilidades de avistamiento 
          y fotografía de fauna. Cada ubicación, horario y transición forma parte de un itinerario optimizado.</p>
            </div>
          </div>
        </div>
        
        <!-- Item 3 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-background">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-119-3" aria-expanded="false" aria-controls="faq-panel-119-3">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Qué documentación necesito?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-119-3" role="region" aria-hidden="true" aria-labelledby="faq-btn-119-3" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>Pasaporte vigente.  
          Ciudadanos de la Unión Europea y la mayoría de países de Latinoamérica <strong>no necesitan visado</strong> para estancias turísticas inferiores a 90 días.</p>
            </div>
          </div>
        </div>
        
        <!-- Item 4 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-background">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-119-4" aria-expanded="false" aria-controls="faq-panel-119-4">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Habrá asistencia durante el viaje?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-119-4" role="region" aria-hidden="true" aria-labelledby="faq-btn-119-4" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>Sí. El <strong>Autor del viaje</strong> estará con vosotros durante todo el itinerario, acompañando cada salida, 
          resolviendo dudas y ayudando en la fotografía de fauna en campo.</p>
            </div>
          </div>
        </div>
        
        <!-- Item 5 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-background">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-119-5" aria-expanded="false" aria-controls="faq-panel-119-5">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Cuál es el precio del viaje?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-119-5" role="region" aria-hidden="true" aria-labelledby="faq-btn-119-5" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>El precio final del viaje es de <strong>3.100 € por persona</strong>, en base a habitación triple compartida.</p>
            </div>
          </div>
        </div>
        
        <!-- Item 6 -->
        <div class="flex flex-col items-start justify-start rounded-lg border border-slate-200 bg-background p-3 hover:cursor-pointer hover:bg-background">
          <button type="button" aria-disabled="false"
            class="group rounded-lg align-middle text-sm font-semibold transition-all duration-300 ease-in-out disabled:cursor-not-allowed stroke-slate-500 text-black min-w-[38px] gap-2 disabled:stroke-slate-400 disabled:text-slate-400 hover:opacity-80 flex h-auto w-full items-center justify-between overflow-hidden whitespace-pre-wrap p-0 text-left leading-tight"
            id="faq-btn-119-6" aria-expanded="false" aria-controls="faq-panel-119-6">
            <div>
              <div class="flex w-full items-center justify-start gap-2">
                <p class="w-full font-medium">¿Cuál es el depósito para reservar?</p>
              </div>
            </div>
            <div class="size-5">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="stroke-black transition-transform duration-300 ease-in-out">
                <path d="M5.83325 8.33325L9.99992 12.4999L14.1666 8.33325"></path>
              </svg>
            </div>
          </button>
          <div id="faq-panel-119-6" role="region" aria-hidden="true" aria-labelledby="faq-btn-119-6" 
               class="grid w-full text-xs text-slate-600 md:pr-7 text-justify"
               style="grid-template-rows: 0fr; opacity: 0; transition: grid-template-rows 300ms ease-out, opacity 300ms ease-out;">
            <div class="overflow-hidden">
              <p>Para asegurar tu plaza se requiere un <strong>depósito de 500 €</strong>.  
          El resto del pago se realiza antes del inicio del viaje según las instrucciones de la organización.</p>
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
  <section class="py-20 bg-background overflow-hidden">
    <div class="container mx-auto px-6 md:px-8 mb-12 text-center">
        <h2 class="text-3xl font-rowdies text-text-primary">Momentos <span class="text-primary">UKIYO</span></h2>
    </div>

    <style>
      .marquee-container {
        position: relative;
        width: 100%;
        max-width: 100%;
        overflow: hidden;
      }
      .marquee-inner {
        display: flex;
        width: max-content;
        animation: marqueeScroll 40s linear infinite;
      }
      .marquee-container:hover .marquee-inner {
        animation-play-state: paused;
      }
      @keyframes marqueeScroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
      }
      /* Gradient overlays to fade edges */
      .marquee-overlay-left, .marquee-overlay-right {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100px;
        z-index: 2;
        pointer-events: none;
      }
      .marquee-overlay-left {
        left: 0;
        background: linear-gradient(to right, var(--color-background, #fff), transparent);
      }
      .marquee-overlay-right {
        right: 0;
        background: linear-gradient(to left, var(--color-background, #fff), transparent);
      }
      .marquee-card {
        width: 20rem; /* w-80: 320px */
        height: 28rem; /* larger height */
      }
      @media (max-width: 768px) {
        .marquee-overlay-left, .marquee-overlay-right { width: 50px; }
      }
    </style>

    <?php
      // Definir las imágenes para el carrusel (6 únicas)
      $gallery_items = [
        [
          'src' => get_template_directory_uri() . '/images/costarica/viajes-a-costa-rica-personalizados-rio-celeste.webp',
          'title' => 'Río Celeste',
          'alt' => 'Río Celeste en Costa Rica'
        ],
        [
          'src' => get_template_directory_uri() . '/images/costarica/viajes-a-costa-rica-personalizados-tucan-corcovado.webp',
          'title' => 'Tucán en Corcovado',
          'alt' => 'Tucán en el Parque Nacional Corcovado'
        ],
        [
          'src' => get_template_directory_uri() . '/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-mono.webp',
          'title' => 'Fauna en Tortuguero',
          'alt' => 'Mono en Tortuguero'
        ],
        [
          'src' => get_template_directory_uri() . '/images/costarica/viajes-a-costa-rica-personalizados-volcan-arenal-la-fortuna.webp',
          'title' => 'Volcán Arenal',
          'alt' => 'Vista del Volcán Arenal'
        ],
        [
          'src' => get_template_directory_uri() . '/images/costarica/viajes-a-costa-rica-personalizados-rana-ojos-rojos.webp',
          'title' => 'Rana de Ojos Rojos',
          'alt' => 'Rana icónica de Costa Rica'
        ],
        [
          'src' => get_template_directory_uri() . '/images/costarica/viajes-a-costa-rica-personalizados-monteverde-bosque-nuboso.webp',
          'title' => 'Bosque Nuboso',
          'alt' => 'Bosque Nuboso de Monteverde'
        ]
      ];
      
      // Duplicar el array para crear un bucle infinito visualmente denso
      // 4 items * 4 repeticiones = 16 items en total
      $marquee_items = array_merge($gallery_items, $gallery_items, $gallery_items, $gallery_items);
    ?>

    <div class="marquee-container group">
      <!-- Gradient Overlays -->
      <div class="marquee-overlay-left"></div>
      <div class="marquee-overlay-right"></div>

      <div class="marquee-inner">
        <?php foreach ($marquee_items as $item) : ?>
          <div class="marquee-card mx-10 relative flex-shrink-0 rounded-xl overflow-hidden group/card transition-transform duration-300 hover:scale-[0.98]">
             <img src="<?php echo esc_url($item['src']); ?>" 
                  alt="<?php echo esc_attr($item['alt']); ?>" 
                  class="w-full h-full object-cover"
                  loading="lazy">
             
             <!-- Overlay con texto al hover -->
             <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/70 to-transparent flex items-end justify-center pb-6 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300">
                <p class="text-white text-lg font-semibold font-satoshi text-shadow px-4 text-center">
                  <?php echo esc_html($item['title']); ?>
                </p>
             </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

<!-- CTA Section -->
<section class="py-20 bg-background text-text-secondary text-center">
    <div class="container mx-auto px-6 max-w-3xl">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-xl mb-8 opacity-90">
                No sólo es un viaje de fotografía, es una aventura inolvidable
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Con UKIYO y Luis, cada amanecer, cada reflejo en el río y cada silencio compartido 
                se transforma en una experiencia única de observación, paciencia y conexión con la vida salvaje.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="<?php echo esc_url( ukiyo_get_route_url( 'plan_trip' ) ); ?>" 
                   class="btn-primary text-text-secondary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-white/80 transition">
                    Descubre Costa Rica con Luis
                </a>
                <a href="<?php echo esc_url( ukiyo_get_route_url( 'viajes_autor' ) ); ?>" 
                   class="btn-primary text-text-secondary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-white/80 transition">
                    Ver más viajes de autor
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>



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
