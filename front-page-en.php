<?php
/**
 * Template: English Front Page
 * English homepage for UKIYO. Loaded from front-page.php when Polylang language is en.
 */

get_header(); ?>

<?php
$plan_trip_url            = ukiyo_get_route_url( 'plan_trip' );
$viajes_autor_url         = ukiyo_get_route_url( 'viajes_autor' );
$destinations_url         = ukiyo_get_route_url( 'destinations' );
$reviews_url              = ukiyo_get_route_url( 'reviews' );
$destination_indonesia    = ukiyo_get_route_url( 'destination_indonesia' );
$destination_costa_rica   = ukiyo_get_route_url( 'destination_costa_rica' );
$destination_colombia     = ukiyo_get_route_url( 'destination_colombia' );
$destination_marruecos    = ukiyo_get_route_url( 'destination_marruecos' );

if ( ! function_exists( 'ukiyo_english_signature_trip_text' ) ) {
    function ukiyo_english_signature_trip_text( $post_id, $field, $fallback = '' ) {
        $translations = [
            1266 => [
                'title'          => 'Essences of Indonesia: Java, Bali, Lombok and Komodo',
                'hero_subtitle'  => 'From volcanoes to the sea',
                'expert_title'   => 'Local entrepreneur and Bali route expert',
                'autor_fallback' => 'By UKIYO',
                'excerpt'        => 'A carefully designed author trip through Java, Bali, Lombok and Komodo, from volcanic landscapes to the sea.',
            ],
            239 => [
                'title'          => 'Essential Morocco',
                'hero_subtitle'  => 'a route from the Atlas to the Sahara',
                'expert_title'   => 'Local Amazigh guide',
                'autor_subtitulo'=> 'By Moha · Berber guide',
                'excerpt'        => 'A small-group route through Morocco with the Atlas, the desert and local guidance throughout the journey.',
            ],
            234 => [
                'title'          => 'Essential Costa Rica',
                'hero_subtitle'  => 'a journey into biodiversity',
                'expert_title'   => 'Costa Rican guide and photographer',
                'autor_fallback' => 'By UKIYO',
                'excerpt'        => 'An author trip through Costa Rica focused on nature, biodiversity and local knowledge.',
            ],
        ];

        if ( isset( $translations[ $post_id ][ $field ] ) ) {
            return $translations[ $post_id ][ $field ];
        }

        if ( 'duracion_viaje' === $field ) {
            return str_replace( [ ' días', ' día' ], [ ' days', ' day' ], $fallback );
        }

        if ( 'grupos_viaje' === $field ) {
            $groups = [
                'Privado'  => 'Private',
                'Grupo'    => 'Group',
                'Reducido' => 'Small group',
            ];

            return $groups[ $fallback ] ?? $fallback;
        }

        return $fallback;
    }
}
?>

<style>
  .hero-responsive { height: 100vh; }
  @media (min-width: 1024px) {
    .hero-responsive { height: auto !important; min-height: 50vh !important; }
  }
  
  .text-shadow {
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  
  /* Forced Custom Styles for Cards */
  .ukiyo-card {
      border-radius: 30px !important;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08) !important;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
      background: white;
      border: 1px solid #f3f4f6;
  }
  .ukiyo-card:hover {
      box-shadow: 0 25px 50px rgba(0,0,0,0.15) !important;
      transform: translateY(-8px) !important;
      border-color: #e5e7eb;
  }
</style>

<main>

    <!-- HERO: AUTOPLAY SLIDER -->
    <?php
    // Array de slides para el hero
    $hero_slides = [
        [
            'image' => get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-costaricatucan.webp',
            'alt' => 'Tailor-made trips to Costa Rica',
        ],
        [
            'image' => get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-marruecos.webp',
            'alt' => 'Tailor-made trips to Morocco',
        ],
        [
            'image' => get_template_directory_uri() . '/images/heroimages/viajes-personalizados-ukiyo-colombiaplaya3.webp',
            'alt' => 'Tailor-made trips to Colombia',
        ]
    ];
    ?>
    
    <section class="relative h-screen overflow-hidden">
        <!-- Slider Container -->
        <div id="heroSlider" class="relative h-full">
            <?php foreach ($hero_slides as $index => $slide) : ?>
            <!-- Slide <?php echo $index + 1; ?> -->
            <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-300 <?php echo $index === 0 ? 'opacity-100 z-1' : 'opacity-0 z-0'; ?>">
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
                    width="1600"
                    height="1067"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- STATIC CONTENT OVERLAY -->
            <div class="absolute inset-0 z-50 flex flex-col items-center justify-center text-center px-4 pointer-events-none">
                
                <!-- Main title -->
                <h1 class="text-hero md:text-6xl font-rowdies text-white font-bold mb-4 text-shadow leading-none">
                <span class="text-accent italic">Tailor-made trips</span> for travelers looking for something more personal
                </h1>
                
                <!-- Subtitle -->
                <p class="text-xl font-satoshi text-white/90 italic font-light mb-6 text-shadow">
                    We only design trips in places we know first-hand. That changes everything.
                </p>
                
                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-5 justify-center pointer-events-auto">
                    <a href="<?php echo esc_url( $plan_trip_url ); ?>" 
                       class="group relative overflow-hidden px-8 py-4 rounded-full font-semibold text-white transition-all duration-300"
                       style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border: 1.5px solid rgba(255,255,255,0.4);">
                        <span class="relative z-10">Design your tailor-made trip</span>
                        <div class="absolute inset-0 bg-white/20 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                    <a href="<?php echo esc_url( $viajes_autor_url ); ?>" 
                       class="px-8 py-4 text-white font-medium transition-all duration-300 hover:text-white/80"
                       style="letter-spacing: 0.05em;">
                        View signature trips →
                    </a>
                </div>
            </div>
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
                    slide.classList.add('opacity-100', 'z-1');
                } else {
                    slide.classList.remove('opacity-100', 'z-1');
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

    <!-- VALUE PROPOSITION -->
    <section class="py-16" style="background-color: #f5f8f1ff;">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                
                <!-- Column 1: Title -->
                <div class="lg:col-span-1">
                    <h2 class="relative font-rowdies text-4xl md:text-5xl leading-tight text-text-primary inline-block">
                        <span class="relative z-10">
                            <span class="italic text-[#1B4E38]">Why</span> travel<br>
                            with us?
                        </span>
                    </h2>
                </div>

                <!-- Columna 2 -->
                <div class="lg:col-span-1">
                    <div class="relative mb-4">
                        <h3 class="font-satoshi font-semibold text-lg text-text-primary relative z-10">We know the places we design</h3>
                        <svg class="absolute -bottom-2 left-0 w-24 h-2 text-[#C4D9C8]" viewBox="0 0 100 10" preserveAspectRatio="none">
                             <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="2" fill="none" />
                        </svg>
                    </div>
                    <p class="font-satoshi font-bold text-[#1B4E38] text-sm mb-2">More than a travel agency</p>
                    <p class="font-satoshi text-text-secondary text-sm leading-relaxed">
                        We design trips in places we have lived, explored and understood.
                        No generic catalogues. Just real knowledge, practical judgement and care.
                    </p>
                </div>

                <!-- Columna 3 -->
                <div class="lg:col-span-1">
                    <div class="relative mb-4">
                        <h3 class="font-satoshi font-semibold text-lg text-text-primary relative z-10">Trips shaped around you</h3>
                        <svg class="absolute -bottom-2 left-0 w-24 h-2 text-[#C4D9C8]" viewBox="0 0 100 10" preserveAspectRatio="none">
                             <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="2" fill="none" />
                        </svg>
                    </div>
                    <p class="font-satoshi font-bold text-[#1B4E38] text-sm mb-2">Designed with you, from scratch</p>
                    <p class="font-satoshi text-text-secondary text-sm leading-relaxed">
                        Every trip is different because every traveler is different.
                        We listen, propose and refine each itinerary so it fits your pace, priorities and way of traveling.
                    </p>
                </div>

                <!-- Columna 4 -->
                <div class="lg:col-span-1">
                    <div class="relative mb-4">
                        <h3 class="font-satoshi font-semibold text-lg text-text-primary relative z-10">Fewer trips, more care</h3>
                        <svg class="absolute -bottom-2 left-0 w-24 h-2 text-[#C4D9C8]" viewBox="0 0 100 10" preserveAspectRatio="none">
                             <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="2" fill="none" />
                        </svg>
                    </div>
                    <p class="font-satoshi font-bold text-[#1B4E38] text-sm mb-2">Less volume. More intention.</p>
                    <p class="font-satoshi text-text-secondary text-sm leading-relaxed">
                        We prefer to design fewer trips and do them well.
                        No rush, no mass travel and enough time to make every detail make sense.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- TAILOR-MADE TRAVEL -->
    <section class="py-12 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid gap-12 lg:grid-cols-2 items-center">
                <!-- Texto principal -->
                <div>
                    <h2 class="text-display font-rowdies text-text-primary mb-4 reveal-on-scroll">
                        Tailor-made travel<br><span class="text-secondary">designed with you</span>
                    </h2>
                    <p class="text-lg text-text-secondary mb-6 reveal-on-scroll delay-100">
                        We do not sell fixed packages. We listen to what you want from the trip and build an itinerary
                        around your pace, budget and way of traveling.
                    </p>
                    <ul class="space-y-3 text-text-secondary reveal-on-scroll delay-200">
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Honest guidance:</strong> we tell you what is worth it, what is not and how to avoid the obvious route.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Places with character:</strong> small hotels, lodges and local stays that add something real to the journey.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Close support:</strong> we stay in touch before and during the trip in case plans need adjusting.</span>
                        </li>
                    </ul>
                    <div class="mt-8 flex flex-wrap gap-4 reveal-on-scroll delay-300">
                        <a href="<?php echo esc_url( $plan_trip_url ); ?>" class="btn-primary text-text-secondary">
                            Start my tailor-made trip
                        </a>
                        <a href="<?php echo esc_url( $destinations_url ); ?>" class="btn-primary text-text-secondary">
                            See trip ideas
                        </a>
                    </div>
                </div>

                <!-- Pasos / proceso -->
                <div class="space-y-6">
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-100">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">1</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Tell us what you have in mind</h3>
                            <p class="text-text-secondary text-sm">
                                A short form or video call where you tell us about your dates, budget, interests and travel style.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-200">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">2</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">We design your route</h3>
                            <p class="text-text-secondary text-sm">
                                We propose a clear itinerary with accommodation and experience options, then refine it with you until it feels right.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-300">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">3</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Bookings and support</h3>
                            <p class="text-text-secondary text-sm">
                                We help with the practical side and remain available during the trip. You focus on enjoying it.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DESTINATIONS -->
    <section class="py-12 bg-background">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-display font-rowdies text-text-primary mb-4 reveal-on-scroll">
                    Our <span class="text-primary">destinations</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto reveal-on-scroll delay-100">
                    Places we know well and design with care. Each destination offers a different rhythm, landscape and way of connecting with local life.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
                <!-- Indonesia -->
                <div 
                    style="
                        width: 100%;
                        height: 500px;
                        background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.8)), url('<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-personalizados-ukiyo-artesano-balines.webp');
                        background-size: cover;
                        background-position: center;
                        border-radius: 1.5rem;
                        overflow: hidden;
                        position: relative;
                        cursor: pointer;
                    "
                    class="reveal-on-scroll delay-100"
                    onclick="window.location.href='<?php echo esc_url( $destination_indonesia ); ?>'"
                >
                    <div style="position: absolute; bottom: 0; left: 0; padding: 2rem; width: 100%;">
                        <div style="color: #FF8C42; font-size: 12px; text-transform: uppercase; margin-bottom: 0.5rem; font-weight: 600;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline;">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            Southeast Asia
                        </div>
                        <h3 class="text-card-title font-rowdies text-white font-semibold mb-3">Indonesia</h3>
                        <p style="color: rgba(255,255,255,0.8); line-height: 1.6; font-size: 0.875rem;">
                            Living traditions, temples and ceremonies. A strong choice if you want a trip with real cultural depth.
                        </p>
                    </div>
                </div>

                <!-- Costa Rica -->
                <div 
                    style="
                        width: 100%;
                        height: 500px;
                        background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.8)), url('<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-personalizados-ukiyo-guacamayo.webp');
                        background-size: cover;
                        background-position: center;
                        border-radius: 1.5rem;
                        overflow: hidden;
                        position: relative;
                        cursor: pointer;
                    "
                    class="reveal-on-scroll delay-200"
                    onclick="window.location.href='<?php echo esc_url( $destination_costa_rica ); ?>'"
                >
                    <div style="position: absolute; bottom: 0; left: 0; padding: 2rem; width: 100%;">
                        <div style="color: #FF8C42; font-size: 12px; text-transform: uppercase; margin-bottom: 0.5rem; font-weight: 600;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline;">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            Central America
                        </div>
                        <h3 class="text-card-title font-rowdies text-white font-semibold mb-3">Costa Rica</h3>
                        <p style="color: rgba(255,255,255,0.8); line-height: 1.6; font-size: 0.875rem;">
                            Rainforests, volcanoes and wildlife. Ideal if you want to slow down, breathe and reconnect with nature.
                        </p>
                    </div>
                </div>

                <!-- Colombia -->
                <div 
                    style="
                        width: 100%;
                        height: 500px;
                        background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.8)), url('<?php echo get_template_directory_uri(); ?>/images/emotion-based/viajes-personalizados-ukiyo-palanquera.webp');
                        background-size: cover;
                        background-position: center;
                        border-radius: 1.5rem;
                        overflow: hidden;
                        position: relative;
                        cursor: pointer;
                    "
                    class="reveal-on-scroll delay-300"
                    onclick="window.location.href='<?php echo esc_url( $destination_colombia ); ?>'"
                >
                    <div style="position: absolute; bottom: 0; left: 0; padding: 2rem; width: 100%;">
                        <div style="color: #FF8C42; font-size: 12px; text-transform: uppercase; margin-bottom: 0.5rem; font-weight: 600;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline;">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            South America
                        </div>
                        <h3 class="text-card-title font-rowdies text-white font-semibold mb-3">Colombia</h3>
                        <p style="color: rgba(255,255,255,0.8); line-height: 1.6; font-size: 0.875rem;">
                            Color, music and people who make you feel welcome from day one. Perfect if you want a lively, warm and energetic trip.
                        </p>
                    </div>
                </div>

                <!-- Morocco -->
                <div 
                    style="
                        width: 100%;
                        height: 500px;
                        background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.8)), url('<?php echo get_template_directory_uri(); ?>/images/marruecos/viajes-personalizados-ukiyo-camello-marruecos.webp');
                        background-size: cover;
                        background-position: center;
                        border-radius: 1.5rem;
                        overflow: hidden;
                        position: relative;
                        cursor: pointer;
                    "
                    class="reveal-on-scroll delay-400"
                    onclick="window.location.href='<?php echo esc_url( $destination_marruecos ); ?>'"
                >
                    <div style="position: absolute; bottom: 0; left: 0; padding: 2rem; width: 100%;">
                        <div style="color: #FF8C42; font-size: 12px; text-transform: uppercase; margin-bottom: 0.5rem; font-weight: 600;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline;">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            North Africa
                        </div>
                        <h3 class="text-card-title font-rowdies text-white font-semibold mb-3">Morocco</h3>
                        <p style="color: rgba(255,255,255,0.8); line-height: 1.6; font-size: 0.875rem;">
                            Desert, medinas and routes away from mass tourism. Ideal if you want a sensory trip that helps you switch off.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SIGNATURE TRIPS -->
    <section class="py-12 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid gap-12 lg:grid-cols-2 items-center">
                <!-- Texto principal -->
                <div>
                    <h2 class="text-display font-rowdies text-text-primary mb-4 reveal-on-scroll">
                        Signature trips<br><span class="text-secondary">created by locals</span>
                    </h2>
                    <p class="text-lg text-text-secondary mb-6 reveal-on-scroll delay-100">
                        Unique itineraries designed by people who live in the destination.
                        They are not standard tours: they are personal routes led by locals who share their world with you.
                    </p>
                    <ul class="space-y-3 text-text-secondary reveal-on-scroll delay-200">
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Local perspective:</strong> discover the destination from the inside, with access to places and people only a local would know.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Small groups:</strong> limited departures designed to keep the experience personal and well cared for.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Everything arranged:</strong> accommodation, transfers and experiences are taken care of. You just show up and travel.</span>
                        </li>
                    </ul>
                    <div class="mt-8 flex flex-wrap gap-4 reveal-on-scroll delay-300">
                        <a href="<?php echo esc_url( $viajes_autor_url ); ?>" class="btn-primary text-text-secondary">
                            View all signature trips
                        </a>
                        <a href="<?php echo esc_url( $plan_trip_url ); ?>" class="btn-primary text-text-secondary">
                            I prefer a tailor-made trip
                        </a>
                    </div>
                </div>
                <!-- Pasos / proceso -->
                <div class="space-y-6">
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-100">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">1</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Choose your signature trip</h3>
                            <p class="text-text-secondary text-sm">
                                Explore itineraries designed by locals who know their destination deeply. Each trip has its own character.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-200">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">2</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Reserve your place</h3>
                            <p class="text-text-secondary text-sm">
                                Signature trips have fixed dates and small groups. You reserve your place and we handle the organization.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start bg-background reveal-on-scroll delay-300">
                        <div class="w-10 h-10 rounded-full btn-primary flex items-center justify-center text-secondary font-semibold">3</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Travel with the local host</h3>
                            <p class="text-text-secondary text-sm">
                                You travel with the person who designed the route, seeing the destination through their stories, contacts and local knowledge.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SIGNATURE TRIPS LIST -->
    <section class="py-12 bg-background">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-display font-rowdies text-text-primary mb-4 reveal-on-scroll">
                    Signature trips <span class="text-accent">created by local people</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-3xl mx-auto reveal-on-scroll delay-100">
                    If you prefer an already designed route, but with the same care and local insight,
                    explore our signature trips: itineraries created by people who know their destination from the inside.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <?php
                $args = array(
                    'post_type'        => 'viaje_autor',
                    'posts_per_page'   => 3,
                    'post_status'      => 'publish',
                    'orderby'          => 'date',
                    'order'            => 'DESC',
                );

                $viajes_query = new WP_Query( $args );

                if ( $viajes_query->have_posts() ) :
                    while ( $viajes_query->have_posts() ) : $viajes_query->the_post();
                        $post_id         = get_the_ID();
                        $autor_subtitulo = get_post_meta( $post_id, 'autor_subtitulo', true );
                        $hero_subtitle   = get_post_meta( $post_id, 'hero_subtitle', true );
                        $duracion        = get_post_meta( $post_id, 'duracion_viaje', true );
                        $grupos          = get_post_meta( $post_id, 'grupos_viaje', true );
                        $precio_final    = get_post_meta( $post_id, 'precio_final', true );
                        $expert_name     = get_post_meta( $post_id, 'expert_name', true );
                        $expert_title    = get_post_meta( $post_id, 'expert_title', true );
                        $expert_image    = get_post_meta( $post_id, 'expert_image', true );
                        $trip_title      = ukiyo_english_signature_trip_text( $post_id, 'title', get_the_title() );
                        $trip_subtitle   = ukiyo_english_signature_trip_text( $post_id, 'hero_subtitle', $hero_subtitle );
                        $expert_title_en = ukiyo_english_signature_trip_text( $post_id, 'expert_title', $expert_title );
                        $autor_sub_en    = ukiyo_english_signature_trip_text( $post_id, 'autor_subtitulo', $autor_subtitulo );
                        $duration_en     = ukiyo_english_signature_trip_text( $post_id, 'duracion_viaje', $duracion );
                        $groups_en       = ukiyo_english_signature_trip_text( $post_id, 'grupos_viaje', $grupos );
                        $excerpt_en      = ukiyo_english_signature_trip_text( $post_id, 'excerpt', get_the_excerpt() );
                ?>
                <article class="ukiyo-card group overflow-hidden flex flex-col bg-white border-2 border-transparent hover:border-black transition-all duration-300 rounded-2xl shadow-sm">
                    <a href="<?php the_permalink(); ?>" class="block relative h-48 overflow-hidden">
                        <?php
                        $hero_img = get_post_meta( $post_id, 'hero_image', true );
                        if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large', [
                                'class'   => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105',
                                'loading' => 'lazy',
                            ] ); ?>
                        <?php elseif ( $hero_img ) : ?>
                            <img
                                src="<?php echo esc_url( $hero_img ); ?>"
                                alt="<?php echo esc_attr( $trip_title ); ?>"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy"
                            />
                        <?php else : ?>
                            <img
                                src="<?php echo esc_url( get_template_directory_uri() . '/images/heroimages/viajes-autor-ukiyo-viajeros2.webp' ); ?>"
                                alt="<?php echo esc_attr( $trip_title ); ?>"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy"
                            />
                        <?php endif; ?>
                        <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-white to-transparent opacity-20"></div>
                    </a>

                    <div class="p-6 flex-1 flex flex-col bg-white">
                        <div class="flex items-start gap-3 mb-6">
                            <?php if ( $expert_image ) : ?>
                                <div class="flex-shrink-0 relative rounded-full overflow-hidden border-2 border-white shadow-md" style="width: 48px; height: 48px; min-width: 48px;">
                                    <img
                                        src="<?php echo esc_url( $expert_image ); ?>"
                                        alt="<?php echo esc_attr( $expert_name ); ?>"
                                        class="w-full h-full object-cover"
                                        loading="lazy"
                                    />
                                </div>
                            <?php endif; ?>

                            <div class="pt-0.5">
                                <h3 class="text-xl font-rowdies font-black text-gray-900 leading-tight mb-1">
                                    <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-primary transition-colors">
                                        <?php echo esc_html( $trip_title ); ?><?php echo $trip_subtitle ? ': ' . esc_html( $trip_subtitle ) : ''; ?>
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-500 font-satoshi font-medium">
                                    <?php
                                    if ( $expert_name ) {
                                        echo '<span class="text-[#B08D55] font-bold">' . esc_html( $expert_name ) . '</span>';
                                        if ( $expert_title_en ) {
                                            echo ' · ' . esc_html( $expert_title_en );
                                        }
                                    } elseif ( $autor_sub_en ) {
                                        echo esc_html( $autor_sub_en );
                                    } else {
                                        printf( 'By %s', esc_html( get_the_author() ) );
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>

                        <?php if ( has_excerpt() ) : ?>
                            <p class="mt-2 mb-6 text-gray-600 text-sm leading-relaxed line-clamp-2 hidden">
                                <?php echo esc_html( $excerpt_en ); ?>
                            </p>
                        <?php endif; ?>

                        <div class="mt-auto flex items-end justify-between gap-4 pt-4 border-t border-gray-50">
                            <div class="flex flex-wrap items-center gap-2 text-sm mt-4">
                                <?php if ( $duration_en ) : ?>
                                    <span class="px-4 py-1.5 rounded-full text-xs font-bold text-gray-700 border-2 border-[#F6CF66] bg-transparent">
                                        <?php echo esc_html( $duration_en ); ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ( $groups_en ) : ?>
                                    <span class="px-4 py-1.5 rounded-full text-xs font-bold text-gray-700 border-2 border-[#F6CF66] bg-transparent">
                                        <?php echo esc_html( $groups_en ); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <?php if ( $precio_final ) : ?>
                                <div class="text-right mt-4">
                                    <span class="text-xl font-rowdies font-bold text-gray-900 leading-none">
                                        <?php echo esc_html( $precio_final ); ?>
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
                    <p class="text-text-secondary">No signature trips are available right now.</p>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="text-center mt-12">
                <a href="<?php echo esc_url( $viajes_autor_url ); ?>" class="btn-primary text-text-secondary inline-flex items-center gap-2">
                    View all trips
                    <?php echo ukiyo_icon( 'arrow_forward', 'text-sm' ); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- REVIEWS: AUTOPLAY SLIDER -->
    <section class="py-12 bg-background" id="reviews">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-display font-rowdies text-text-primary mb-4 reveal-on-scroll">
                    Stories that <span class="text-accent">stay with you</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto reveal-on-scroll delay-100">
                    Beyond the photos, what remains is how the trip felt.
                    This is what some of the travelers who planned their journey with UKIYO have shared.
                </p>
            </div>

            <?php
            // Reviews.
            $reviews = [
                [
                    "name" => "Maite and Ramon",
                    "destination" => "Bali, Indonesia",
                    "rating" => 5,
                    "review" => "Our experience and travel plan with Ukiyo were completely recommendable. We went to Bali for our honeymoon and it could not have been better: not only because the destination has everything, from culture and beaches to beautiful landscapes and activities, but also because Sergio guided the trip, adjusted everything perfectly and gave us the kind of honest advice agencies do not usually give.",
                    "date" => "September 2024",
                    "title" => "It felt like someone had really thought the trip through with us",
                    "image" => "resena-maite-ramon-bali-indonesia-2.webp"
                ],
                [
                    "name" => "Maria and Edu",
                    "destination" => "Java Island, Indonesia",
                    "rating" => 5,
                    "review" => "Thanks to Ukiyo, we did not just visit Indonesia: we truly experienced it. From day one we felt calm because everything was perfectly organized, so we could stop worrying and simply enjoy. They took care of every detail and created an itinerary adapted to what we were looking for: authentic, soulful and far from the typical route.",
                    "date" => "July 2025",
                    "title" => "An authentic trip with soul",
                    "image" => "resena-maria-edu-java-indonesia.webp"
                ],
                [
                    "name" => "Carmen and Jose Angel",
                    "destination" => "Komodo, Indonesia",
                    "rating" => 5,
                    "review" => "Traveling to Indonesia with Ukiyo was an exceptional adventure: a fully personalized trip where we could enjoy authentic, human experiences without the pressure of mass tourism. The care and work behind the organization made the trip truly special. Thank you, team. We cannot wait to repeat it.",
                    "date" => "September 2025",
                    "title" => "Authentic, human experiences",
                    "image" => "resena-carmen-jose-komodo-indonesia.webp"
                ],
                [
                    "name" => "Carolina and Carmen",
                    "destination" => "Cuba",
                    "rating" => 5,
                    "review" => "The best thing about Cuba is its people: the warmth, the laughter and the unhurried stories. Every conversation felt like a small treasure. Spending an afternoon learning to dance son with a local family was one of those moments that stays with you. I came back with a full heart and the feeling of having traveled not only to a place, but to a different way of living.",
                    "date" => "July 2024",
                    "title" => "Feeling at home far from home",
                    "image" => "resena-carolina-carmen-cuba.webp"
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
                                <!-- Large image on the left -->
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
                                
                                <!-- Content on the right -->
                                <div class="flex flex-col justify-center">
                                    <div class="flex items-center gap-1 text-accent mb-4">
                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.562-.954L10 0l2.948 5.956 6.562.954-4.755 4.635 1.123 6.545z"/>
                                        </svg>
                                        <?php endfor; ?>
                                    </div>
                                    
                                    <h3 class="text-2xl md:text-3xl font-rowdies font-semibold text-text-primary mb-4">
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
                <a href="<?php echo esc_url( $reviews_url ); ?>" class="btn-primary text-text-secondary">
                    Read more reviews
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

    <!-- FINAL CTA -->
    <section class="py-12 text-text-secondary" style="background-color: #f5f8f1ff;">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-display font-rowdies mb-6 reveal-on-scroll">
                    Your journey starts here
                </h2>
                <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Every meaningful trip starts with an idea, a feeling or simple curiosity.
                    Tell us what moves you and we will design a journey that helps you experience the world more deeply.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center reveal-on-scroll delay-200">
                    <a href="<?php echo esc_url( $plan_trip_url ); ?>" class="btn-primary text-text-secondary">
                        Design my tailor-made trip
                    </a>
                    <a href="https://wa.me/message/CS2LNI6YHSETO1" target="_blank" class="btn-primary text-text-secondary flex items-center justify-center gap-2">
                        <img width="64" height="64" src="https://img.icons8.com/cotton/64/whatsapp--v4.png" alt="Contact Viajes Ukiyo on WhatsApp" class="w-6 h-6"/>
                        Message us on WhatsApp
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
