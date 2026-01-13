<?php
/**
 * Template: Front Page (Inicio)
 * Muestra la homepage estática de UKIYO
 */

get_header(); ?>

<main>

    <!-- HERO: SLIDER DINÁMICO CON AUTOPLAY -->
    <?php
    // Array de slides para el hero
    $hero_slides = [
        [
            'image' => get_template_directory_uri() . '/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-orotina.jpg',
            'alt' => 'Viajes personalizados a Indonesia',
            'title' => 'Viajes personalizados',
            'subtitle' => 'que <span class="text-accent-300">te mueven por dentro</span>',
            'description' => 'Diseñamos contigo un viaje a medida, lejos del turismo masivo. Rutas pensadas al detalle, alojamientos con alma y personas locales que te enseñan su mundo de verdad.'
        ],
        [
            'image' => get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-costaricatucan.jpg',
            'alt' => 'Viajes personalizados a Costa Rica',
            'title' => 'Descubre Costa Rica',
            'subtitle' => 'con <span class="text-accent-300">naturaleza salvaje</span>',
            'description' => 'Selvas tropicales, volcanes activos y vida salvaje única. Un viaje para reconectar con la naturaleza y vivir experiencias auténticas en uno de los países más biodiversos del planeta.'
        ],
        [
            'image' => get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-marruecos.jpg',
            'alt' => 'Viajes personalizados a Marruecos',
            'title' => 'Explora Marruecos',
            'subtitle' => 'desde <span class="text-accent-300">el desierto al océano</span>',
            'description' => 'Desiertos infinitos, medinas llenas de vida y rutas alejadas del turismo masivo. Un viaje sensorial que te conecta con la esencia de un país fascinante.'
        ],
        [
            'image' => get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-colombiaplaya3.jpg',
            'alt' => 'Viajes personalizados a Colombia',
            'title' => 'Vive Colombia',
            'subtitle' => 'con <span class="text-accent-300">ritmo y color</span>',
            'description' => 'Música, colores vibrantes y gente que te hace sentir en casa desde el primer día. Descubre un país lleno de contrastes, desde el Caribe hasta el Pacífico colombiano.'
        ]
    ];
    ?>
    
    <section class="relative h-screen overflow-hidden">
        <!-- Slider Container -->
        <div id="heroSlider" class="relative h-full">
            <?php foreach ($hero_slides as $index => $slide) : ?>
            <!-- Slide <?php echo $index + 1; ?> -->
            <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-300 <?php echo $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'; ?>">
                <!-- Fondo -->
               <div class="absolute inset-0 w-full h-full">
                <img 
                    src="<?php echo esc_url($slide['image']); ?>"
                    alt="<?php echo esc_attr($slide['alt']); ?>"
                    class="w-full h-full object-cover"
                    fetchpriority="<?php echo $index === 0 ? 'high' : 'low'; ?>"
                    loading="<?php echo $index === 0 ? 'eager' : 'lazy'; ?>"
                    decoding="async"
                    sizes="100vw"
                    onerror="this.src='https://images.pexels.com/photos/1450360/pexels-photo-1450360.jpeg?auto=compress&cs=tinysrgb&w=2940&h=1960&dpr=2'; this.onerror=null;"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
                </div>

                <!-- Contenido Hero - Centrado -->
                <div class="relative z-10 h-full flex items-center justify-center">
                    <div class="container mx-auto px-6">
                        <div class="max-w-4xl mx-auto text-center">
                            <?php if ($index === 0) : ?>
                            <h1 class="text-4xl md:text-6xl lg:text-hero font-satoshi text-white mb-6 text-shadow">
                                <?php echo $slide['title']; ?><br />
                                <?php echo $slide['subtitle']; ?>
                            </h1>
                            <?php else : ?>
                            <div class="text-4xl md:text-6xl lg:text-hero font-satoshi text-white mb-6 text-shadow">
                                <?php echo $slide['title']; ?><br />
                                <?php echo $slide['subtitle']; ?>
                            </div>
                            <?php endif; ?>
                            <p class="hidden lg:block text-xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                                <?php echo $slide['description']; ?>
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="btn-secondary text-lg px-8 py-4">
                                    Diseña tu viaje a medida
                                </a>
                                <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" class="bg-white/20 backdrop-blur-sm text-lg text-white px-8 py-4 rounded-lg font-semibold hover:bg-white/30 transition-all duration-300">
                                    Ver viajes de autor
                                </a>
                            </div>
                            <p class="mt-6 text-sm text-white/70 hidden lg:block">
                                ¿Prefieres leer experiencias reales primero? 
                                <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" class="underline hover:text-white">Descubre las reseñas de viajeros</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Navigation Arrows -->
        <button id="prevHero" class="hidden lg:block absolute left-4 md:left-8 top-1/2 -translate-y-1/2 bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white p-3 md:p-4 rounded-full transition-all duration-300 hover:scale-110 z-40">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <button id="nextHero" class="hidden lg:block absolute right-4 md:right-8 top-1/2 -translate-y-1/2 bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white p-3 md:p-4 rounded-full transition-all duration-300 hover:scale-110 z-40">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- Pagination Dots -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex gap-3 z-40">
            <?php foreach ($hero_slides as $index => $slide) : ?>
            <button class="hero-dot h-3 rounded-full bg-white transition-all duration-300 <?php echo $index === 0 ? 'w-8' : 'w-3 opacity-50 hover:opacity-100'; ?>" data-index="<?php echo $index; ?>"></button>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Hero Slider JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.hero-slide');
        const prevBtn = document.getElementById('prevHero');
        const nextBtn = document.getElementById('nextHero');
        const dots = document.querySelectorAll('.hero-dot');
        const totalSlides = <?php echo count($hero_slides); ?>;
        let currentSlide = 0;
        let autoplayInterval;

        function goToSlide(index) {
            if (index < 0) {
                currentSlide = totalSlides - 1;
            } else if (index >= totalSlides) {
                currentSlide = 0;
            } else {
                currentSlide = index;
            }

            // Update slides
            slides.forEach((slide, i) => {
                if (i === currentSlide) {
                    slide.classList.remove('opacity-0', 'z-0');
                    slide.classList.add('opacity-100', 'z-10');
                } else {
                    slide.classList.remove('opacity-100', 'z-10');
                    slide.classList.add('opacity-0', 'z-0');
                }
            });

            // Update dots
            dots.forEach((dot, i) => {
                if (i === currentSlide) {
                    dot.classList.remove('w-3', 'opacity-50', 'hover:opacity-100');
                    dot.classList.add('w-8');
                } else {
                    dot.classList.remove('w-8');
                    dot.classList.add('w-3', 'opacity-50', 'hover:opacity-100');
                }
            });
        }

        function nextSlide() {
            goToSlide(currentSlide + 1);
        }

        function prevSlide() {
            goToSlide(currentSlide - 1);
        }

        function startAutoplay() {
            autoplayInterval = setInterval(nextSlide, 6000); // Change slide every 6 seconds
        }

        function stopAutoplay() {
            clearInterval(autoplayInterval);
        }

        // Event listeners
        nextBtn.addEventListener('click', () => {
            nextSlide();
            stopAutoplay();
            startAutoplay(); // Restart autoplay after manual interaction
        });

        prevBtn.addEventListener('click', () => {
            prevSlide();
            stopAutoplay();
            startAutoplay(); // Restart autoplay after manual interaction
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
                stopAutoplay();
                startAutoplay(); // Restart autoplay after manual interaction
            });
        });

        // Pause autoplay on hover
        document.getElementById('heroSlider').addEventListener('mouseenter', stopAutoplay);
        document.getElementById('heroSlider').addEventListener('mouseleave', startAutoplay);

        // Start autoplay
        startAutoplay();

        // Swipe support (Touch and Mouse)
        let startX = 0;
        let endX = 0;
        const sliderContainer = document.getElementById('heroSlider');

        // Touch events
        sliderContainer.addEventListener('touchstart', (e) => {
            startX = e.changedTouches[0].screenX;
        }, {passive: true});

        sliderContainer.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].screenX;
            handleSwipe();
        }, {passive: true});

        // Mouse events
        sliderContainer.addEventListener('mousedown', (e) => {
            startX = e.screenX;
        });

        sliderContainer.addEventListener('mouseup', (e) => {
            endX = e.screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50; // minimum distance for swipe
            if (endX < startX - swipeThreshold) {
                // Swipe left -> Next slide
                nextSlide();
                stopAutoplay();
                startAutoplay();
            }
            if (endX > startX + swipeThreshold) {
                // Swipe right -> Prev slide
                prevSlide();
                stopAutoplay();
                startAutoplay();
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                prevSlide();
                stopAutoplay();
                startAutoplay();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
                stopAutoplay();
                startAutoplay();
            }
        });
    });
    </script>

    <!-- SECCIÓN: VIAJES PERSONALIZADOS (EXPLICACIÓN + PASOS) -->
    <section class="py-12 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid gap-12 lg:grid-cols-2 items-center">
                <!-- Texto principal -->
                <div>
                    <h2 class="text-display font-satoshi text-text-primary mb-4 reveal-on-scroll">
                        Viajes personalizados<br><span class="text-secondary">diseñados contigo</span>
                    </h2>
                    <p class="text-lg text-text-secondary mb-6 reveal-on-scroll delay-100">
                        No vendemos paquetes cerrados. Escuchamos lo que te mueve y, a partir de ahí,
                        construimos una ruta que encaje con tu ritmo, tu presupuesto y tu forma de viajar.
                    </p>
                    <ul class="space-y-3 text-text-secondary reveal-on-scroll delay-200">
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Asesoría honesta:</strong> te contamos qué merece la pena y qué no, sin turistas en masa.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Alojamientos con alma:</strong> pequeños hoteles, lodges y casas locales que suman al viaje.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Contacto cercano:</strong> estamos contigo antes y durante el viaje por si algo se tuerce.</span>
                        </li>
                    </ul>
                    <div class="mt-8 flex flex-wrap gap-4 reveal-on-scroll delay-300">
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="btn-primary text-text-secondary">
                            Empezar mi viaje a medida
                        </a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" class="btn-primary text-text-secondary">
                            Ver ideas de viaje
                        </a>
                    </div>
                </div>

                <!-- Pasos / proceso -->
                <div class="space-y-6">
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-100">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">1</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Cuéntanos qué te apetece</h3>
                            <p class="text-text-secondary text-sm">
                                Un breve formulario o una videollamada donde nos hablas de ti, tus fechas, tu presupuesto y cómo te gusta viajar.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-200">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">2</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Diseñamos tu ruta ideal</h3>
                            <p class="text-text-secondary text-sm">
                                Te proponemos un itinerario claro, con opciones de actividades y alojamientos. Lo afinamos juntos hasta que encaje contigo.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-300">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">3</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Reservas seguras y acompañamiento</h3>
                            <p class="text-text-secondary text-sm">
                                Te ayudamos con la parte práctica y nos quedamos al otro lado del WhatsApp durante el viaje. Tú solo te ocupas de vivirlo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NAVEGACIÓN POR EMOCIONES (APOYO A VIAJES PERSONALIZADOS) -->
    <section class="py-12 bg-background">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-display font-satoshi text-text-primary mb-4 reveal-on-scroll">
                    Estos son nuestros <span class="text-primary">destinos</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto reveal-on-scroll delay-100">
                    Cada uno nos despertó algo distinto. Recorridos por completo para ofrecerte la mejor experiencia de viaje. Viajar sin preocupaciones nunca ha sido tan fácil.
                </p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
                <!-- Indonesia -->
                <div class="group cursor-pointer reveal-on-scroll delay-100" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('indonesia') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-personalizados-ukiyo-artesano-balines.jpg"
                            alt="Artesano balinés trabajando en un taller local"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Indonesia</h3>
                            <p class="text-white/80 text-sm hidden lg:block">Tradiciones vivas, templos y ceremonias. Ideal si buscas un viaje con mucha profundidad cultural.</p>
                        </div>
                    </div>
                </div>

                <!-- Costa Rica -->
                <div class="group cursor-pointer reveal-on-scroll delay-200" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('costarica') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-personalizados-ukiyo-guacamayo.jpg"
                            alt="Guacamayo observado en la selva tropical durante un viaje personalizado con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-secondary-900/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Costa Rica</h3>
                            <p class="text-white/80 text-sm hidden lg:block">Selvas, volcanes y vida salvaje. Perfecto si necesitas parar, respirar y reconectar con la naturaleza.</p>
                        </div>
                    </div>
                </div>

                <!-- Colombia -->
                <div class="group cursor-pointer reveal-on-scroll delay-300" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('colombia') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/emotion-based/viajes-personalizados-ukiyo-palanquera.jpg"
                            alt="Palanquera en Cartagena de Indias durante un viaje personalizado a Colombia con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-accent-900/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Colombia</h3>
                            <p class="text-white/80 text-sm hidden lg:block">Colores, música y gente que te hace sentir en casa desde el primer día.</p>
                        </div>
                    </div>
                </div>

                <!-- Marruecos -->
                <div class="group cursor-pointer reveal-on-scroll delay-400" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('marruecos') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/marruecos/viajes-personalizados-ukiyo-camello-marruecos.jpg"
                            alt="Camello en el desierto de Merzouga durante un viaje personalizado a Marruecos con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-700/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Marruecos</h3>
                            <p class="text-white/80 text-sm hidden lg:block">Desierto, medinas y rutas alejadas del turismo de masas. Puro viaje sensorial.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN: VIAJES DE AUTOR (EXPLICACIÓN + PASOS) -->
    <section class="py-12 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid gap-12 lg:grid-cols-2 items-center">
                <!-- Texto principal -->
                <div>
                    <h2 class="text-display font-satoshi text-text-primary mb-4 reveal-on-scroll">
                        Viajes de autor<br><span class="text-secondary">creados por locales</span>
                    </h2>
                    <p class="text-lg text-text-secondary mb-6 reveal-on-scroll delay-100">
                        Itinerarios únicos diseñados por personas que viven en el destino. 
                        No son guías turísticos, son locales apasionados que comparten su mundo contigo.
                    </p>
                    <ul class="space-y-3 text-text-secondary reveal-on-scroll delay-200">
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Experiencia auténtica:</strong> conoce el destino desde dentro, con acceso a lugares y personas que solo un local conoce.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Grupos reducidos:</strong> viajes en grupos pequeños para mantener la calidad de la experiencia y el contacto cercano.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Todo organizado:</strong> solo tienes que presentarte. Nosotros nos ocupamos de alojamientos, traslados y actividades.</span>
                        </li>
                    </ul>
                    <div class="mt-8 flex flex-wrap gap-4 reveal-on-scroll delay-300">
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" class="btn-primary text-text-secondary">
                            Ver todos los viajes de autor
                        </a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="btn-primary text-text-secondary">
                            Prefiero un viaje a medida
                        </a>
                    </div>
                </div>
                <!-- Pasos / proceso -->
                <div class="space-y-6">
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-100">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">1</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Elige tu viaje de autor</h3>
                            <p class="text-text-secondary text-sm">
                                Explora los itinerarios diseñados por personas locales que conocen cada rincón de su destino. Cada viaje tiene su propia personalidad.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-200">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">2</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Reserva tu plaza</h3>
                            <p class="text-text-secondary text-sm">
                                Los viajes de autor tienen fechas fijas y grupos reducidos. Reservas tu plaza y nosotros nos encargamos de toda la organización.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-300">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">3</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Viaja con el autor local</h3>
                            <p class="text-text-secondary text-sm">
                                Viajas acompañado por quien diseñó la ruta. Conoce el destino a través de sus ojos, sus historias y sus contactos locales.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NUEVA SECCIÓN: VIAJES DE AUTOR -->
    <section class="py-12 bg-background">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-display font-satoshi text-text-primary mb-4 reveal-on-scroll">
                    Viajes de autor <span class="text-accent">creados por personas locales</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-3xl mx-auto reveal-on-scroll delay-100">
                    Si prefieres una ruta ya diseñada, pero con el mismo cuidado y autenticidad, descubre los viajes de autor:
                    itinerarios creados por personas que conocen su destino como la palma de su mano.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <?php
                // Consulta para obtener los 3 últimos viajes de autor publicados
                $args = array(
                    'post_type' => 'viaje_autor',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                
                $viajes_query = new WP_Query($args);
                
                if ($viajes_query->have_posts()) :
                    while ($viajes_query->have_posts()) : $viajes_query->the_post();
                        // Obtener la imagen destacada
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        if (!$thumbnail_url) {
                            $thumbnail_url = get_template_directory_uri() . '/images/placeholder-viaje.jpg';
                        }
                        
                        // Obtener el extracto
                        $excerpt = get_the_excerpt();
                        if (empty($excerpt)) {
                            $excerpt = wp_trim_words(get_the_content(), 20, '...');
                        }
                        
                        // Obtener taxonomías de destino
                        $destinos = get_the_terms(get_the_ID(), 'destino');
                        $destino_text = '';
                        if ($destinos && !is_wp_error($destinos)) {
                            $destino_names = array();
                            foreach ($destinos as $destino) {
                                $destino_names[] = $destino->name;
                            }
                            $destino_text = implode(' · ', $destino_names);
                        }
                        
                        // Obtener campos personalizados
                        $autor_subtitulo = get_post_meta(get_the_ID(), 'autor_subtitulo', true);
                        $duracion = get_post_meta(get_the_ID(), 'duracion_viaje', true);
                        $grupos = get_post_meta(get_the_ID(), 'grupos_viaje', true);
                        $precio_desde = get_post_meta(get_the_ID(), 'precio_desde', true);
                ?>
                <article class="group rounded-2xl border-2 border-black bg-white/80 backdrop-blur-md shadow-sm overflow-hidden flex flex-col reveal-on-scroll delay-200">
                    <a href="<?php the_permalink(); ?>">
                        <figure class="aspect-[16/9] overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', [
                                    'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] mask-image',
                                    'loading' => 'lazy',
                                ]); ?>
                            <?php else : ?>
                                <img 
                                    src="<?php echo esc_url($thumbnail_url); ?>"
                                    alt="<?php the_title_attribute(); ?>"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] mask-image"
                                    loading="lazy"
                                />
                            <?php endif; ?>
                        </figure>
                    </a>

                    <div class="p-6 md:p-7 flex-1 flex flex-col">
                        <div>
                            <h3 class="text-xl font-rowdies">
                                <a href="<?php the_permalink(); ?>" class="text-text-primary hover:text-accent">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <?php if ($autor_subtitulo) : ?>
                                <p class="text-sm text-text-secondary font-satoshi">
                                    <?php echo esc_html($autor_subtitulo); ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <?php if (has_excerpt()) : ?>
                            <p class="mt-4 text-text-secondary">
                                <?php echo get_the_excerpt(); ?>
                            </p>
                        <?php endif; ?>

                        <!-- Meta pills + precio -->
                        <div class="flex items-center justify-between gap-4 py-2 mt-auto">
                            <!-- Pills a la izquierda -->
                            <div class="flex flex-wrap items-center gap-2 text-sm">
                                <?php if ($duracion) : ?>
                                    <span class="btn-primary text-text-secondary px-3 py-1 rounded-full text-sm font-medium">
                                        <?php echo esc_html($duracion); ?>
                                    </span>
                                <?php endif; ?>

                                <!--<?php if ($grupos) : ?>
                                    <span class="btn-primary text-text-secondary px-3 py-1 rounded-full text-sm font-medium">
                                        <?php echo esc_html($grupos); ?>
                                    </span>
                                <?php endif; ?>-->
                            </div>

                            <!-- Precio a la derecha -->
                            <?php if ($precio_desde) : ?>
                                <div class="text-2xl text-text-secondary whitespace-nowrap">
                                    Desde
                                    <span class="font-semibold text-text-primary">
                                        <?php echo esc_html($precio_desde); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-text-secondary">No hay viajes de autor disponibles en este momento.</p>
                </div>
                <?php endif; ?>
            </div>
            <br>
            <br>
            <div class="text-center mt-10">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" class="btn-primary text-text-secondary">
                    Ver todos los viajes de autor
                </a>
            </div>
        </div>
    </section>

    <!-- REVIEWS: SLIDER DINÁMICO CON AUTOPLAY -->
    <section class="py-12 bg-background" id="reviews">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-display font-satoshi text-text-primary mb-4 reveal-on-scroll">
                    Historias que <span class="text-accent">dejan huella</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto reveal-on-scroll delay-100">
                    Más allá de las fotos, lo que queda son las sensaciones. 
                    Esto es lo que cuentan algunas de las personas que ya viajaron con UKIYO.
                </p>
            </div>

            <?php
            // Array de reseñas
            $reviews = [
                [
                    "name" => "Maite y Ramón",
                    "destination" => "Bali, Indonesia",
                    "rating" => 5,
                    "review" => "Experiencia y plan de viaje con Ukiyo 200% recomendable. Fuimos de viaje de novios a Bali y la verdad es que no pudo ser mejor, no solo por el destino en sí que ofrece de todo (cultura, playas, paisajes preciosos y todo tipo de actividades), también gracias a Sergio que nos guió el viaje y nos lo cuadró todo perfectamente, además da consejos y recomendaciones que no lo suelen hacer las agencias habitualmente. Lo recomendaría una y mil veces, profesional como la copa de un pino!",
                    "date" => "Septiembre 2024",
                    "title" => "Sentimos que alguien pensó el viaje con nosotros",
                    "image" => "resena-maite-ramon-bali-indonesia-2.jpg"
                ],
                [
                    "name" => "María y Edu",
                    "destination" => "Isla de Java, Indonesia",
                    "rating" => 5,
                    "review" => "Gracias a Ukiyo no solo visitamos Indonesia, si no que la vivimos de verdad. Desde el primer día sentimos mucha tranquilidad ya que todo estaba perfectamente organizado y pudimos despreocuparnos y pensar solo en disfrutar. Cuidaron cada detalle y nos crearon un itinerario adaptado a lo que buscábamos, un viaje auténtico, con alma, lejos de lo típico y de los que te dejan huella.",
                    "date" => "Julio 2025",
                    "title" => "Un viaje auténtico, con alma",
                    "image" => "resena-maria-edu-java-indonesia.jpg"
                ],
                [
                    "name" => "Carmen y Jose Ángel",
                    "destination" => "Komodo, Indonesia",
                    "rating" => 5,
                    "review" => "Viajar a Indonesia con Ukiyo ha sido una aventura excepcional, un viaje personalizado al 100% donde hemos podido disfrutar de experiencias auténticas y humanas, sin el agobio del turismo masivo. El esfuerzo y el trabajo detrás de la organización ha hecho que nuestro viaje sea muy toppp. Muchas gracias equipo 🙌🏼 ¡Estamos deseando repetir!",
                    "date" => "Septiembre 2025",
                    "title" => "Experiencias auténticas y humanas",
                    "image" => "resena-carmen-jose-komodo-indonesia.jpg"
                ],
                [
                    "name" => "Carolina y Carmen",
                    "destination" => "Cuba",
                    "rating" => 5,
                    "review" => "Lo mejor de Cuba es su gente. La calidez, las risas, las historias compartidas sin prisa… cada conversación parecía un pequeño tesoro. Pasar una tarde aprendiendo a bailar son con una familia local fue uno de esos momentos que te reconcilian con la vida. Regresé con el corazón lleno y la sensación de haber viajado no solo a un lugar, sino a una manera distinta de vivir.",
                    "date" => "Julio 2024",
                    "title" => "La sensación de estar en casa lejos de casa",
                    "image" => "resena-carolina-carmen-cuba.jpg"
                ],
            ];
            ?>

            <!-- Slider Container -->
            <div class="relative max-w-6xl mx-auto reveal-on-scroll delay-200">
                <!-- Slider Wrapper -->
                <div class="overflow-hidden">
                    <div id="reviewsSlider" class="flex transition-transform duration-500 ease-in-out">
                        <?php foreach ($reviews as $index => $review) :
                            $img_url = get_template_directory_uri() . '/images/reviews/' . $review['image'];
                        ?>
                        <div class="w-full flex-shrink-0 px-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Imagen grande a la izquierda -->
                                <div class="relative aspect-[4/3] md:aspect-[3/4] overflow-hidden rounded-2xl">
                                    <img src="<?php echo esc_url($img_url); ?>" 
                                         alt="<?php echo esc_attr($review['name'] . ' - ' . $review['destination']); ?>"
                                         class="w-full h-full object-cover"
                                         loading="lazy"
                                         onerror="this.src='https://images.pexels.com/photos/346885/pexels-photo-346885.jpeg'; this.onerror=null;" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                    <div class="absolute">
                                        <p class="text-white font-rowdies text-lg font-medium"><?php echo esc_html($review['destination']); ?></p>
                                    </div>
                                </div>
                                
                                <!-- Contenido a la derecha -->
                                <div class="flex flex-col justify-center">
                                    <div class="flex items-center gap-1 text-accent mb-4">
                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.562-.954L10 0l2.948 5.956 6.562.954-4.755 4.635 1.123 6.545z"/>
                                        </svg>
                                        <?php endfor; ?>
                                    </div>
                                    
                                    <h3 class="text-2xl md:text-3xl font-satoshi font-semibold text-text-primary mb-4">
                                        "<?php echo esc_html($review['title']); ?>"
                                    </h3>
                                    
                                    <p class="text-text-secondary text-base md:text-lg mb-6 leading-relaxed">
                                        <?php echo esc_html($review['review']); ?>
                                    </p>
                                    
                                    <div class="pt-6 border-t border-border">
                                        <p class="font-semibold text-text-primary text-lg"><?php echo esc_html($review['name']); ?></p>
                                        <p class="text-text-secondary"><?php echo esc_html($review['date']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button id="prevReview" class="hidden lg:block absolute left-0 top-1/2 -translate-y-1/2 -translate-x-12 bg-white/90 hover:bg-white text-text-primary p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110 z-40">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button id="nextReview" class="hidden lg:block absolute right-0 top-1/2 -translate-y-1/2 translate-x-12 bg-white/90 hover:bg-white text-text-primary p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110 z-40">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Pagination Dots -->
                <div class="flex justify-center gap-2 mt-8">
                    <?php foreach ($reviews as $index => $review) : ?>
                    <button class="review-dot h-3 rounded-full bg-accent transition-all duration-300 <?php echo $index === 0 ? 'w-8' : 'w-3 opacity-50 hover:opacity-100'; ?>" data-index="<?php echo $index; ?>"></button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" class="btn-primary text-text-secondary">
                    Leer más reseñas
                </a>
            </div>
        </div>

        <!-- Slider JavaScript -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('reviewsSlider');
            const prevBtn = document.getElementById('prevReview');
            const nextBtn = document.getElementById('nextReview');
            const dots = document.querySelectorAll('.review-dot');
            const totalSlides = <?php echo count($reviews); ?>;
            let currentSlide = 0;
            let autoplayInterval;

            function goToSlide(index) {
                if (index < 0) {
                    currentSlide = totalSlides - 1;
                } else if (index >= totalSlides) {
                    currentSlide = 0;
                } else {
                    currentSlide = index;
                }

                slider.style.transform = `translateX(-${currentSlide * 100}%)`;

                // Update dots
                dots.forEach((dot, i) => {
                    if (i === currentSlide) {
                        dot.classList.remove('w-3', 'opacity-50', 'hover:opacity-100');
                        dot.classList.add('w-8');
                    } else {
                        dot.classList.remove('w-8');
                        dot.classList.add('w-3', 'opacity-50', 'hover:opacity-100');
                    }
                });
            }

            function nextSlide() {
                goToSlide(currentSlide + 1);
            }

            function prevSlide() {
                goToSlide(currentSlide - 1);
            }

            function startAutoplay() {
                autoplayInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
            }

            function stopAutoplay() {
                clearInterval(autoplayInterval);
            }

            // Event listeners
            nextBtn.addEventListener('click', () => {
                nextSlide();
                stopAutoplay();
                startAutoplay(); // Restart autoplay after manual interaction
            });

            prevBtn.addEventListener('click', () => {
                prevSlide();
                stopAutoplay();
                startAutoplay(); // Restart autoplay after manual interaction
            });

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    goToSlide(index);
                    stopAutoplay();
                    startAutoplay(); // Restart autoplay after manual interaction
                });
            });

            // Pause autoplay on hover
            slider.parentElement.addEventListener('mouseenter', stopAutoplay);
            slider.parentElement.addEventListener('mouseleave', startAutoplay);

            // Swipe support (Touch and Mouse)
            let startX = 0;
            let endX = 0;
            const sliderContainer = slider.parentElement; // Swipe on the container, not just the track

            // Touch events
            sliderContainer.addEventListener('touchstart', (e) => {
                startX = e.changedTouches[0].screenX;
            }, {passive: true});

            sliderContainer.addEventListener('touchend', (e) => {
                endX = e.changedTouches[0].screenX;
                handleSwipe();
            }, {passive: true});

            // Mouse events
            sliderContainer.addEventListener('mousedown', (e) => {
                startX = e.screenX;
            });

            sliderContainer.addEventListener('mouseup', (e) => {
                endX = e.screenX;
                handleSwipe();
            });

            function handleSwipe() {
                const swipeThreshold = 50; // minimum distance for swipe
                if (endX < startX - swipeThreshold) {
                    // Swipe left -> Next slide
                    nextSlide();
                    stopAutoplay();
                    startAutoplay();
                }
                if (endX > startX + swipeThreshold) {
                    // Swipe right -> Prev slide
                    prevSlide();
                    stopAutoplay();
                    startAutoplay();
                }
            }

            // Start autoplay
            startAutoplay();

            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    stopAutoplay();
                    startAutoplay();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    stopAutoplay();
                    startAutoplay();
                }
            });
        });
        </script>
    </section>

    <!-- CTA FINAL -->
    <section class="py-12 bg-background text-text-secondary">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-display font-satoshi mb-6 reveal-on-scroll">
                    Tu aventura empieza aquí
                </h2>
                <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Todo gran viaje nace de una idea, una emoción o una simple curiosidad.
                    Cuéntanos qué te mueve y diseñaremos una experiencia que te haga sentir el mundo de verdad.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center reveal-on-scroll delay-200">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="btn-primary text-text-secondary">
                        Diseñar mi viaje a medida
                    </a>
                    <a href="https://wa.me/message/XD2DTYOAKBIAJ1" target="_blank" class="btn-primary text-text-secondary flex items-center gap-2">
                        <img width="64" height="64" src="https://img.icons8.com/cotton/64/whatsapp--v4.png" alt="whatsapp--v4" class="w-6 h-6"/>
                        Escríbenos por WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SCRIPTS & STYLES FOR SCROLL ANIMATIONS -->
    <style>
        /* Base state for reveal elements */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
            will-change: opacity, transform;
        }

        /* Visible state */
        .reveal-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Staggered delays for children if needed */
        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-400 { transition-delay: 400ms; }
        .delay-500 { transition-delay: 500ms; }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Intersection Observer for Reveal on Scroll
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.15 // Trigger when 15% of the element is visible
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target); // Only animate once
                }
            });
        }, observerOptions);

        const revealElements = document.querySelectorAll('.reveal-on-scroll');
        revealElements.forEach(el => observer.observe(el));

        // Parallax Effect for Hero Image (Subtle movement within the sticky container)
        const heroImage = document.querySelector('.sticky img');
        if (heroImage) {
            window.addEventListener('scroll', () => {
                const scrolled = window.scrollY;
                // Move image slightly slower than scroll to create depth
                // Since the container is sticky, we translate the image slightly down
                // to make it look like it's moving deeper
                heroImage.style.transform = `translateY(${scrolled * 0.1}px) scale(1.05)`;
            });
        }
    });
    </script>

</main>

<?php get_footer(); ?>