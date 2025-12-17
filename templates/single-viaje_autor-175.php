<?php
/*
 * Single template for viaje_autor post ID 175
 * Description: Ficha de viaje de autor (Luis – Costa Rica).
 */
get_header();
$uri = get_template_directory_uri();
?>

  <!-- HERO -->
<section class="relative">
    <div class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-guacamayo.jpg"
             alt="Tucán en Costa Rica durante un viaje de autor con guía experto (Luis)"
             class="w-full h-full object-cover object-bottom mask-image" 
             loading="lazy"
             onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;" />
        <!-- Content Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 lg:p-12">
            <div class="container mx-auto max-w-4xl">
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="btn-primary text-white px-3 py-1 rounded-full text-sm font-medium">12 días</span>
                    <span class="btn-primary text-white px-3 py-1 rounded-full text-sm font-medium">Grupos reducidos</span>
                    <span class="btn-primary text-white px-3 py-1 rounded-full text-sm font-medium">Plazas limitadas</span>
                </div>
                <div class="hero-overlay-box">
                  <h1 class="text-3xl md:text-4xl lg:text-6xl font-rowdies text-white mb-4 pl-4">
                      Costa Rica: <br>
                    <span class="text-accent">viaje a la biodiversidad más rica del planeta</span>
                  </h1>
                  <p class="text-xl text-white/90 max-w-3xl pl-4">
                “La ruta definitiva por Costa Rica, diseñada para vivir su naturaleza más auténtica con guía experto durante todo el viaje.”</p>
                <div class="hero-overlay-box pl-4">
                  <span class="text-sm mr-2">Desde</span>
                  <span class="text-2xl font-semibold">2.400€</span>
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
        Este viaje de autor por Costa Rica es una inmersión total en algunos de los ecosistemas 
        más vivos del planeta. Desde los bosques nubosos de Dota hasta las playas remotas de Tortuguero, 
        pasando por la selva profunda de Corcovado, cada día está diseñado para conectar contigo mismo, 
        con la naturaleza y con la esencia salvaje del país.  
        Acompañados por el autor del viaje, explorarás lugares únicos, aprenderás sobre fauna, 
        conservación y cultura local, y vivirás experiencias que solo Costa Rica puede ofrecer.
      </p>
    </header>

    <ul role="list" class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Punto 1 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-primary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Ecosistemas que cambian la mirada</h3>
        <p class="text-text-secondary">
          Bosque nuboso, selva tropical, manglares, canales, playas remotas…  
          En un solo viaje atraviesas algunos de los ambientes más diversos del país, 
          cada uno con su propia vida y personalidad.
        </p>
      </li>

      <!-- Punto 2 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-secondary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Experiencias auténticas</h3>
        <p class="text-text-secondary">
          Caminarás entre la neblina en busca del quetzal, navegarás manglares repletos de vida, 
          dormirás dentro de Corcovado, observarás tortugas anidando en Tortuguero 
          y descubrirás la Costa Rica que solo los locales conocen.
        </p>
      </li>

      <!-- Punto 3 -->
      <li class="text-center bg-background backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-accent/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Acompañamiento cercano</h3>
        <p class="text-text-secondary">
          Durante todo el itinerario viajarás con el autor del viaje, que comparte cada experiencia, 
          explica la fauna, ayuda a interpretar la naturaleza y hace que la ruta cobre sentido en cada paso.
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
           alt="Moha, guía local amazigh experto del desierto"
           class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] bg-background"
      <h2 class="mt-4 text-xl font-semibold text-text-primary">Luis Acuña</h2>
      <p class="mt-1 text-sm text-text-secondary max-w-xs">Guía costarricense y fotógrafo profesional. Conoce los diferentes sonidos de la selva y localiza a los animales más escurridizos.</p>
    </div>
    <div class="text-text-secondary text-[15px] space-y-4">
      <p>“Soy Luis, un guía turístico y fotógrafo de vida silvestre con experiencia. Estoy decidido a hacer un impacto positivo en las personas y el planeta.</p>
      <div id="bio-hidden-1" class="hidden lg:block space-y-4">
        <p>Imagino cada tour de vida silvestre como una semilla, plantada en el corazón de cada viajero que pone un pie en el paraíso biodiverso de Costa Rica. Es por eso que visualizo un legado que trasciende fronteras y generaciones; pronto entenderás.</p>
        <p>A medida que los viajeros se unen a mí en un viaje por las impresionantes regiones de Corcovado y Osa, les ayudo a ver que no son meros observadores, son participantes en una gran danza interconectada de la vida. Disfruto mostrando a las personas animales en su hábitat y su comportamiento en diferentes situaciones. Cada fotografía que mis clientes toman es un testimonio de la belleza que prospera en estas tierras, una belleza que exige ser preservada.</p>
      </div>
    </div>
    <div id="bio-hidden-2" class="text-text-secondary text-[15px] space-y-4 hidden lg:block">
      <p>Cuando cae la noche, la sinfonía de la naturaleza continúa — sí, ChatGPT me ayudó con esa frase —. Pero es cierto, resuena conmigo porque mis tours nocturnos se centran en observar reptiles y anfibios, estos fascinantes seres ofrecen un vistazo a un mundo a menudo pasado por alto. Por la noche hay más historias esperando ser descubiertas y contadas a tus seres queridos.</p>
      <p>Cuando los viajeros regresan a sus países, llevan consigo más que recuerdos y fotografías. Llevan un respeto y amor renovados o nuevos — depende — por la naturaleza, una chispa encendida por sus experiencias. La verdad es que más a menudo de lo que piensas, las personas me dicen que quieren volver a visitar Costa Rica. Es esta chispa la que espero que encienda una llama, inspirándolos a ellos y a quienes los rodean a unirse en el esfuerzo por proteger y preservar a la Madre Naturaleza.</p>
      <p>En esencia, mi misión no es solo guiar, sino iluminar, inspirar e inculcar un sentido de responsabilidad hacia nuestro planeta. Un tour a la vez, estoy sembrando semillas de cambio, cultivando un jardín global de defensores de la naturaleza. Este es mi legado, mi contribución a un futuro donde la armonía entre humanos y naturaleza no es solo un sueño, sino una realidad”.</p>
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
          AEROPUERTO INTERNACIONAL JUAN SANTAMARÍA (SJO)
        </h3>
        <p class="mt-2 text-text-secondary max-w-xl">
          Llegada a San José y primer encuentro con el grupo y el autor del viaje. Traslado hacia la zona de montaña
          para iniciar la aventura en el bosque nuboso.
        </p>
      </li>

      <!-- 1. SAN GERARDO DE DOTA -->
      <li class="experienceItemList">
        <button class="decorativeCircleList accordion-trigger">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
        </button>

        <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
          1. SAN GERARDO DE DOTA
          <span class="h3-subtitle">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
            2 noches
          </span>
        </h3>

        <div class="exp-content">
          <div class="experienceSplit">
            <div class="experienceSplit-text">
              <p>
                Empezamos en el corazón del bosque nuboso costarricense. San Gerardo de Dota es uno de los mejores lugares del país
                para observar colibríes, tangaras y, sobre todo, el quetzal resplandeciente. Tendremos amaneceres dedicados a buscarlo
                con guías locales, y una tarde para disfrutar del paisaje a caballo.
              </p>
            </div>
            <figure class="experienceSplit-media">
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-monteverde.jpg"
                alt="Bosque nuboso en San Gerardo de Dota" />
            </figure>
          </div>
          <br>

          <!-- ALOJAMIENTO -->
          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
          </div>
          <h3 class="text-2xl font-rowdies">
            <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
            Cabañas Mirian’s
          </h3>

          <p class="text-text-primary mt-1">
            Cabañas de montaña rodeadas de bosque nuboso. Un lugar perfecto para descansar con naturaleza alrededor
            y salir a primera hora a buscar quetzales.
          </p>

          <!-- ACTIVIDADES -->
          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
          </div>
          <h3 class="text-2xl font-rowdies">Actividades</h3>

          <div class="ukiyo-activities-wrapper relative mt-4">
            <div class="ukiyo-activities-slider">

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-queztal.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>4h</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Amanecer en busca del quetzal</h4>
                  <p class="mt-1 text-gray-600 text-justify">
                    Salida temprana por senderos de montaña para localizar al quetzal resplandeciente
                    y otras aves típicas del bosque nuboso.
                  </p>
                </div>
              </div>

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-monteverde-bosque-nuboso.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>2h 30m</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Cabalgata entre montañas</h4>
                  <p class="mt-1 text-gray-600 text-justify">
                    Paseo a caballo por valles y bosques de altura para disfrutar del paisaje y la vida local.
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
            2 noches
          </span>
        </h3>

        <div class="exp-content">
          <div class="experienceSplit">
            <div class="experienceSplit-text">
              <p>
                Bajamos hacia la Península de Osa. Puerto Jiménez es la puerta de entrada a Corcovado,
                y nuestra base antes y después de dormir dentro del parque. En ruta exploraremos los manglares de Sierpe,
                un santuario natural lleno de aves y mamíferos.
              </p>
            </div>
            <figure class="experienceSplit-media">
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.jpg"
                alt="Puerto Jiménez, Península de Osa" />
            </figure>
          </div>
          <br>

          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
          </div>
          <h3 class="text-2xl font-rowdies">
            <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
            Hotel Nereus
          </h3>

          <p class="text-text-primary mt-1">
            Hotel cómodo y práctico en Puerto Jiménez, ideal para organizar la logística hacia Corcovado
            y descansar tras la selva.
          </p>

          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
          </div>
          <h3 class="text-2xl font-rowdies">Actividades</h3>

          <div class="ukiyo-activities-wrapper relative mt-4">
            <div class="ukiyo-activities-slider">

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-caiman.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>3h</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Tour por manglares de Sierpe</h4>
                  <p class="mt-1 text-gray-600">
                    Navegación por canales naturales para avistar aves, monos y fauna adaptada al manglar.
                  </p>
                </div>
              </div>

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-personalizados-ukiyo-guacamayo.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>Tarde libre</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Tiempo de descanso en la costa</h4>
                  <p class="mt-1 text-gray-600">
                    Tarde para relajarse, pasear por la playa y preparar la entrada a Corcovado.
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
          3. PARQUE NACIONAL CORCOVADO
          <span class="h3-subtitle">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
            1 noche
          </span>
        </h3>

        <div class="exp-content">
          <div class="experienceSplit">
            <div class="experienceSplit-text">
              <p>
                Entramos en uno de los lugares con mayor biodiversidad del planeta.
                Caminaremos por senderos donde la fauna es protagonista: tapires, monos, pecaríes y aves tropicales.
                Dormir dentro del parque nos permite vivir Corcovado con luz de amanecer y atardecer,
                cuando la selva está más activa.
              </p>
            </div>
            <figure class="experienceSplit-media">
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-guacamayo.jpg"
                alt="Selva profunda en Corcovado" />
            </figure>
          </div>
          <br>

          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
          </div>
          <h3 class="text-2xl font-rowdies">
            <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
            Estación Sirena
          </h3>

          <p class="text-text-primary mt-1">
            Alojamiento básico dentro del parque, una experiencia única para sentir la selva
            sin interrupciones y salir directo a los senderos.
          </p>

          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
          </div>
          <h3 class="text-2xl font-rowdies">Actividades</h3>

          <div class="ukiyo-activities-wrapper relative mt-4">
            <div class="ukiyo-activities-slider">

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-tapir.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>6h</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Trekking por la selva</h4>
                  <p class="mt-1 text-gray-600">
                    Caminata guiada para rastrear fauna y entender el ecosistema más salvaje de Costa Rica.
                  </p>
                </div>
              </div>

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-mono.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>3h</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Salida al amanecer</h4>
                  <p class="mt-1 text-gray-600">
                    Recorrido temprano para aprovechar la actividad máxima de mamíferos y aves.
                  </p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </li>

      <!-- 4. OROTINA – CERRO LODGE -->
      <li class="experienceItemList">
        <button class="decorativeCircleList accordion-trigger">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
        </button>

        <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
          4. OROTINA
          <span class="h3-subtitle">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
            1 noche
          </span>
        </h3>

        <div class="exp-content">
          <div class="experienceSplit">
            <div class="experienceSplit-text">
              <p>
                Tras la intensidad de la selva, llegamos a Cerro Lodge para descansar.
                La tarde es tranquila para disfrutar del entorno, y al día siguiente navegaremos el Río Tárcoles,
                hogar de la mayor población de cocodrilos del país.
              </p>
            </div>
            <figure class="experienceSplit-media">
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-perezoso.jpg"
                alt="Cerro Lodge, Orotina" />
            </figure>
          </div>
          <br>

          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
          </div>
          <h3 class="text-2xl font-rowdies">
            <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
            Cerro Lodge
          </h3>

          <p class="text-text-primary mt-1">
            Lodge rodeado de naturaleza, perfecto para una tarde de descanso antes del tour en el río.
          </p>

          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
          </div>
          <h3 class="text-2xl font-rowdies">Actividades</h3>

          <div class="ukiyo-activities-wrapper relative mt-4">
            <div class="ukiyo-activities-slider">

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-momoto.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>2h</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Tour en barco Río Tárcoles</h4>
                  <p class="mt-1 text-gray-600">
                    Navegación para observar cocodrilos gigantes y aves ribereñas en un entorno único.
                  </p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </li>

      <!-- 5. PIERELLA GARDEN ECOLODGE -->
      <li class="experienceItemList">
        <button class="decorativeCircleList accordion-trigger">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
        </button>

        <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
          5. RIO SARAPIQUÍ
          <span class="h3-subtitle">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
            2 noches
          </span>
        </h3>

        <div class="exp-content">
          <div class="experienceSplit">
            <div class="experienceSplit-text">
              <p>
                Pierella Garden es una eco-finca dedicada a la cría y conservación de mariposas.
                Nos alojamos dos noches en este entorno reforestado, con visitas al Río Sarapiquí,
                caminatas nocturnas y un tour para entender el fascinante ciclo de estas especies.
              </p>
            </div>
            <figure class="experienceSplit-media">
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-osa-corcovado-hero.jpg"
                alt="Pierella Garden Ecolodge" />
            </figure>
          </div>
          <br>

          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
          </div>
          <h3 class="text-2xl font-rowdies">
            <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
            Pierella Garden Ecolodge
          </h3>

          <p class="text-text-primary mt-1">
            Ecolodge inmerso en naturaleza, referencia en conservación de mariposas y biodiversidad del Caribe norte.
          </p>

          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
          </div>
          <h3 class="text-2xl font-rowdies">Actividades</h3>

          <div class="ukiyo-activities-wrapper relative mt-4">
            <div class="ukiyo-activities-slider">

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-iguana.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>3h</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Visita al Río Sarapiquí</h4>
                  <p class="mt-1 text-gray-600">
                    Exploración de ribera tropical para observar fauna y paisaje del norte caribeño.
                  </p>
                </div>
              </div>

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-whitebat.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>2h</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Tour de mariposas</h4>
                  <p class="mt-1 text-gray-600">
                    Visita guiada para conocer el ciclo de vida de mariposas y su papel en la conservación del bosque.
                  </p>
                </div>
              </div>

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-rana.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>2h</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Caminata nocturna</h4>
                  <p class="mt-1 text-gray-600">
                    Paseo nocturno por la propiedad para descubrir la fauna activa al caer el sol.
                  </p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </li>

      <!-- 6. TORTUGUERO -->
      <li class="experienceItemList">
        <button class="decorativeCircleList accordion-trigger">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-plus.svg" alt="" />
        </button>

        <h3 class="experienceTitle accordion-trigger text-2xl font-rowdies text-text-primary mb-1">
          6. TORTUGUERO
          <span class="h3-subtitle">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-nights.svg" alt="" />
            2 noches
          </span>
        </h3>

        <div class="exp-content">
          <div class="experienceSplit">
            <div class="experienceSplit-text">
              <p>
                Cerramos la ruta en el Caribe más remoto. Tortuguero solo se alcanza en bote o avioneta,
                y sus canales son uno de los grandes santuarios de vida silvestre del país.
                Navegaremos en canoa entre selva y agua, y por la noche viviremos el momento más esperado:
                el anidamiento de tortugas marinas.
              </p>
            </div>
            <figure class="experienceSplit-media">
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.jpg"
                alt="Canales de Tortuguero" />
            </figure>
          </div>
          <br>

          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-hotel-bell.svg">
          </div>
          <h3 class="text-2xl font-rowdies">
            <span class="block text-sm text-text-secondary font-satoshi">Alojamiento</span>
            Hotel frente a la playa
          </h3>

          <p class="text-text-primary mt-1">
            Alojamiento en plena costa caribeña, con acceso directo a playa y canales.
          </p>

          <div class="decorativeCircleListinside mt-10">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-active.svg" class="ukiyo-icon">
          </div>
          <h3 class="text-2xl font-rowdies">Actividades</h3>

          <div class="ukiyo-activities-wrapper relative mt-4">
            <div class="ukiyo-activities-slider">

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-mono.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>3h</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Canoa por los canales</h4>
                  <p class="mt-1 text-gray-600">
                    Navegación silenciosa entre canales para observar fauna y paisaje caribeño.
                  </p>
                </div>
              </div>

              <div class="ukiyo-activity-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-murcielago.jpg" alt="" class="activity-cover mask-image">
                <div class="p-4">
                  <div class="flex items-center gap-2 text-sm text-gray-500">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-clock.svg" width="14">
                    <span>Noche</span>
                  </div>
                  <h4 class="mt-1 text-lg font-semibold">Anidamiento de tortugas</h4>
                  <p class="mt-1 text-gray-600">
                    Salida nocturna para presenciar el desove de tortugas marinas, una experiencia única en Costa Rica.
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
              <span class="text-text-secondary">Alojamiento durante todo el viaje en habitaciones compartidas dobles o triples</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Comidas incluidas según el itinerario (desayunos, almuerzos y cenas indicadas)</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Entradas a parques nacionales, reservas privadas y actividades descritas en la ruta</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Vehículo privado, combustible y conductor durante todo el recorrido</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Guía/autor del viaje y guías certificados bilingües especializados en fauna y fotografía</span>
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
              <span class="text-text-secondary">Vuelos internacionales</span>
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
              <span class="text-text-secondary">Comidas no especificadas en el itinerario</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Propinas</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Gastos personales (bebidas, compras, etc.)</span>
            </li>

            <li class="flex justify-center">
              <svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/>
              </svg>
              <span class="text-text-secondary">Cualquier actividad extra o cambio de ruta no contemplado en el programa</span>
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
          No. Este es un <strong>viaje en grupo</strong> con plazas limitadas.  
          Una vez se llenan, no se añaden más participantes para mantener la experiencia cercana y controlada.
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
          No. La ruta está <strong>diseñada específicamente</strong> para maximizar las probabilidades de avistamiento 
          y fotografía de fauna. Cada ubicación, horario y transición forma parte de un itinerario optimizado.
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
          Sí. El <strong>Autor del viaje</strong> estará con vosotros durante todo el itinerario, acompañando cada salida, 
          resolviendo dudas y ayudando en la fotografía de fauna en campo.
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
          El precio final del viaje es de <strong>3.100 € por persona</strong>, en base a habitación triple compartida.
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
          Para asegurar tu plaza se requiere un <strong>depósito de 500 €</strong>.  
          El resto del pago se realiza antes del inicio del viaje según las instrucciones de la organización.
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
        <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/viaje-de-autor-al-pantanal-con-guia-experto-luis-acuna-campo.jpg" alt="Luis Acuña durante el viaje de autor al Pantanal" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-orotina.jpg" alt="Amanecer en el río durante un viaje de autor al Pantanal con Ukiyo" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-volcan.jpg" alt="Aves del Pantanal en un viaje de autor con guía experto" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
      </div>
    </div>
  </section>

<!-- CTA Section -->
  <section class="py-20 bg-background text-text-secondary">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
              <h2 class="text-display font-satoshi mb-6 reveal-on-scroll">
                    No es un viaje cualquiera: es la Costa Rica más salvaje, guiada por su autor
                </h2>
              <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Una ruta diseñada para sentir la selva, descubrir sus ritmos y conectar con ecosistemas 
                únicos: desde el bosque nuboso de Dota hasta la profundidad de Corcovado y los canales 
                del Caribe. Cada paso, cada sonido y cada encuentro con la fauna se vive desde la cercanía 
                y el acompañamiento del autor del viaje.
                </p>
              <div class="flex flex-col sm:flex-row gap-4 justify-center reveal-on-scroll delay-200">
                  <a href="<?php echo esc_url( get_permalink( get_page_by_path('formularioautor') ) ); ?>" 
                    class="btn-primary text-text-secondary">
                      Quiero vivir Costa Rica
                  </a>
                  <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" 
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