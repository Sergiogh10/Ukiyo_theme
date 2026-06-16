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
          <circle cx="10" cy="10" r="2" opacity="0.3" />
          <path d="M5 5l10 10M15 5l-10 10" stroke="currentColor" stroke-width="0.5" opacity="0.2" />
        </pattern>
        <rect width="100%" height="100%" fill="url(#cultural-pattern)" />
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
                  src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.webp"
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.webp" alt="" class="activity-cover">
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.webp" alt="" class="activity-cover">
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-caribe-sur-cahuita.webp" alt="" class="activity-cover">
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
                  src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.webp"
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.webp" alt="" class="activity-cover">
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.webp" alt="" class="activity-cover">
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-caribe-sur-cahuita.webp" alt="" class="activity-cover">
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
                  src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.webp"
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.webp" alt="" class="activity-cover">
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.webp" alt="" class="activity-cover">
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-caribe-sur-cahuita.webp" alt="" class="activity-cover">
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
                  src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.webp"
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.webp" alt="" class="activity-cover">
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.webp" alt="" class="activity-cover">
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
                  <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-caribe-sur-cahuita.webp" alt="" class="activity-cover">
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




</main>


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
