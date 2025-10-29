<?php
/**
 * Template Name: Indonesia Experience
 */
get_header();
?>

<!-- Hero Section -->
<section class="relative">
    <div class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        <img src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-personalizados-por-el-mundo-indonesia.jpg"
             alt="Parque Nacional de Komodo en un viaje a Indonesia personalizado con Ukiyo"
             class="w-full h-full object-cover" 
             loading="lazy"
             onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        
        <!-- Content Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-12">
            <div class="container mx-auto max-w-4xl">
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">Biodiversidad</span>
                    <span class="bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">Inmersión Cultural</span>
                    <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-medium">Aventura y paraíso</span>
                </div>
                <h1 class="text-4xl lg:text-6xl font-crimson text-white mb-4">
                    INDONESIA <span class="text-accent">Tierra de dioses</span>
                </h1>
                <p class="text-xl text-white/90 max-w-3xl">
                    Una travesía entre templos sagrados, arrozales infinitos y tradiciones vivas.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Quick Info Bar -->
<section class="bg-white py-8 border-b border-surface">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="w-12 h-12 bg-primary-100 text-primary rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-crimson text-lg text-text-primary">Recomendación</h3>
                <p class="text-text-secondary">+15 días</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-secondary-100 text-secondary rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="font-crimson text-lg text-text-primary">Ubicación</h3>
                <p class="text-text-secondary">Indonesia</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-accent-100 text-accent rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                    </svg>
                </div>
                <h3 class="font-crimson text-lg text-text-primary">Grupo</h3>
                <p class="text-text-secondary">En solitario, en pareja o en amigos</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-primary-100 text-primary rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="font-crimson text-lg text-text-primary">Mejor Época</h3>
                <p class="text-text-secondary">Abr-Sep</p>
            </div>
        </div>
    </div>
</section>

<!-- Day-by-Day Itinerary -->
<section class="py-20 bg-surface">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-display font-crimson text-text-primary mb-4">
                Nuestros <span class="text-primary">imprescindibles</span>
            </h2>
            <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                Cada uno de estos lugares dejó un maravilloso recuerdo en nuestras retinas
            </p>
        </div>

        <div class="max-w-4xl mx-auto">

            <!-- Day 1 -->
            <div class="mb-12">
                    <div class="card hover:shadow-card-hover transition-all duration-300">
                        <div class="flex flex-col lg:flex-row gap-8">
                            <div class="lg:w-1/3">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/guides/viajes-a-indonesia-personalizados-monte-bromo.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-64 lg:h-full object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                            </div>
                            <div class="lg:w-2/3">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-semibold mr-4">1</div>
                                    <h3 class="text-2xl font-crimson text-text-primary">MONTE BROMO</h3>
                                </div>
                                <div class="mb-6">
                                    <span class="inline-block bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium mr-2">Arte Tradicional</span>
                                    <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium">Agricultura Orgánica</span>
                                </div>
                                <p class="text-text-secondary mb-6">
                                    Comenzamos nuestro viaje en el corazón cultural de Bali. Participa en un taller de pintura tradicional con maestros locales, aprende sobre los pigmentos naturales y las técnicas ancestrales. Por la tarde, visita una granja orgánica familiar donde comprenderás la filosofía Tri Hita Karana.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>9:00 AM:</strong> Taller de pintura tradicional balinesa</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>2:00 PM:</strong> Visita a granja orgánica familiar</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>6:00 PM:</strong> Cena vegana con ingredientes de la granja</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Day 2 -->
                <div class="mb-12">
                    <div class="card hover:shadow-card-hover transition-all duration-300">
                        <div class="flex flex-col lg:flex-row-reverse gap-8">
                            <div class="lg:w-1/3">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-bali-tirta-empul.jpg" alt="Templo Tirta Empul en Bali durante un viaje a Indonesia personalizado" class="w-full h-64 lg:h-full object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                            </div>
                            <div class="lg:w-2/3">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-secondary text-white rounded-full flex items-center justify-center font-semibold mr-4">2</div>
                                    <h3 class="text-2xl font-crimson text-text-primary">BALI</h3>
                                </div>
                                <div class="mb-6">
                                    <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium mr-2">Espiritualidad</span>
                                    <span class="inline-block bg-accent-100 text-accent px-3 py-1 rounded-full text-sm font-medium">Meditación</span>
                                </div>
                                <p class="text-text-secondary mb-6">
                                    Despierta antes del amanecer para participar en una auténtica ceremonia en el templo Pura Tirta Empul. Acompañado de un guía espiritual local, aprende sobre los rituales de purificación y participa en la meditación matutina junto a los devotos locales.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>5:30 AM:</strong> Ceremonia de purificación en Tirta Empul</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>10:00 AM:</strong> Sesión de meditación con maestro local</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>3:00 PM:</strong> Reflexión y diario personal en jardines sagrados</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Day 3 -->
                <div class="mb-12">
                    <div class="card hover:shadow-card-hover transition-all duration-300">
                        <div class="flex flex-col lg:flex-row gap-8">
                            <div class="lg:w-1/3">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-nusa-penida.jpg" alt="Nusa Penida y sus acantilados en un viaje a Indonesia personalizado" class="w-full h-64 lg:h-full object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                            </div>
                            <div class="lg:w-2/3">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-accent text-white rounded-full flex items-center justify-center font-semibold mr-4">3</div>
                                    <h3 class="text-2xl font-crimson text-text-primary">NUSA PENIDA</h3>
                                </div>
                                <div class="mb-6">
                                    <span class="inline-block bg-accent-100 text-accent px-3 py-1 rounded-full text-sm font-medium mr-2">Gastronomía</span>
                                    <span class="inline-block bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium">Cocina Tradicional</span>
                                </div>
                                <p class="text-text-secondary mb-6">
                                    Acompáñanos en una experiencia culinaria completa. Comienza con una visita al mercado tradicional de Ubud para seleccionar ingredientes frescos y locales, seguido de una clase de cocina práctica con una familia balinesa en su hogar.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-accent mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>7:00 AM:</strong> Tour guiado por el mercado tradicional</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-accent mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>10:00 AM:</strong> Clase de cocina práctica con familia local</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-accent mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>1:00 PM:</strong> Comida comunitaria y compartir historias</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Day 4 -->
                <div class="mb-12">
                    <div class="card hover:shadow-card-hover transition-all duration-300">
                        <div class="flex flex-col lg:flex-row-reverse gap-8">
                            <div class="lg:w-1/3">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-komodo-islas.jpg" alt="Islas de Komodo en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-64 lg:h-full object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                            </div>
                            <div class="lg:w-2/3">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-semibold mr-4">4</div>
                                    <h3 class="text-2xl font-crimson text-text-primary">KOMODO</h3>
                                </div>
                                <div class="mb-6">
                                    <span class="inline-block bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium mr-2">Sostenibilidad</span>
                                    <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium">Comunidad</span>
                                </div>
                                <p class="text-text-secondary mb-6">
                                    Dedica este día a aprender técnicas artesanales sostenibles mientras contribuyes directamente a la economía local. Participa en talleres de tejido de bambú y creación de ofrendas tradicionales, y conéctate profundamente con la comunidad local.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>9:00 AM:</strong> Taller de tejido de bambú sostenible</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>2:00 PM:</strong> Creación de ofrendas ceremoniales</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>5:00 PM:</strong> Intercambio cultural con la comunidad</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Day 5 -->
                <div class="mb-12">
                    <div class="card hover:shadow-card-hover transition-all duration-300">
                        <div class="flex flex-col lg:flex-row gap-8">
                            <div class="lg:w-1/3">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-lombok-volcan-batur.jpg" alt="Amanecer en el volcán Batur durante un viaje a Indonesia personalizado" class="w-full h-64 lg:h-full object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                            </div>
                            <div class="lg:w-2/3">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-secondary text-white rounded-full flex items-center justify-center font-semibold mr-4">5</div>
                                    <h3 class="text-2xl font-crimson text-text-primary">LOMBOK</h3>
                                </div>
                                <div class="mb-6">
                                    <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium mr-2">Naturaleza</span>
                                    <span class="inline-block bg-accent-100 text-accent px-3 py-1 rounded-full text-sm font-medium">Reflexión</span>
                                </div>
                                <p class="text-text-secondary mb-6">
                                    Culmina tu experiencia con un trekking al amanecer en el volcán Batur, seguido de una ceremonia de reflexión y cierre. Este día te permitirá integrar todas las experiencias vividas y establecer intenciones para tu regreso a casa.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>4:00 AM:</strong> Trekking al volcán Batur para el amanecer</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>10:00 AM:</strong> Ceremonia de reflexión y cierre</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>2:00 PM:</strong> Integración y establecimiento de intenciones</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- What's Included Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-display font-crimson text-text-primary mb-4">
                ¿Qué <span class="text-accent">Incluye</span>?
            </h2>
            <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                Todo lo necesario para una experiencia transformadora y sin preocupaciones.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Accommodation -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary-100 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-crimson text-text-primary mb-2">Alojamiento Premium</h3>
                    <p class="text-text-secondary text-sm">4 noches en resort eco-sostenible en el corazón de Ubud con vista a los arrozales</p>
                </div>

                <!-- Meals -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-crimson text-text-primary mb-2">Gastronomía Completa</h3>
                    <p class="text-text-secondary text-sm">Todas las comidas incluidas con opciones vegetarianas, ingredientes orgánicos locales</p>
                </div>

                <!-- Transportation -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-crimson text-text-primary mb-2">Transporte Privado</h3>
                    <p class="text-text-secondary text-sm">Todos los traslados en vehículo privado con conductor local experimentado</p>
                </div>

                <!-- Guide -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary-100 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-crimson text-text-primary mb-2">Guía Cultural Experto</h3>
                    <p class="text-text-secondary text-sm">Guía local bilingüe especializado en cultura balinesa y prácticas espirituales</p>
                </div>

                <!-- Activities -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-crimson text-text-primary mb-2">Todas las Actividades</h3>
                    <p class="text-text-secondary text-sm">Talleres, ceremonias, clases de cocina, materiales y entradas incluidas</p>
                </div>

                <!-- Support -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-crimson text-text-primary mb-2">Soporte 24/7</h3>
                    <p class="text-text-secondary text-sm">Asistencia completa durante todo el viaje y coordinador UKIYO disponible</p>
                </div>
            </div>
        </div>
    </section>


<!-- Practical Information -->
<section class="py-20 bg-surface">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-display font-crimson text-text-primary mb-4">
                    Información <span class="text-primary">Práctica</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    Todo lo que necesitas saber para prepararte para esta experiencia transformadora.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Preparation -->
                    <div class="card">
                        <h3 class="text-xl font-crimson text-text-primary mb-4">Preparación Recomendada</h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Ropa cómoda y respetuosa para templos</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Calzado cómodo para caminar y trekking ligero</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Protector solar biodegradable y repelente natural</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Mente abierta para experiencias culturales auténticas</span>
                            </div>
                        </div>
                    </div>

                    <!-- Important Notes -->
                    <div class="card">
                        <h3 class="text-xl font-crimson text-text-primary mb-4">Consideraciones Importantes</h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Nivel físico moderado requerido para algunas actividades</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Respeto absoluto por las tradiciones locales</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Grupos pequeños (máximo 8 personas) para experiencia íntima</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Seguro de viaje recomendado (no incluido)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-primary text-white">
    <div class="container mx-auto px-6 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-display font-crimson mb-6">
                ¿Listo para el viaje de tu vida?
            </h2>
            <p class="text-xl mb-8 opacity-90">
                No solo viajes a Bali, vívelo.
                Con UKIYO, cada templo, cada arrozal y cada sonrisa local se convierte en parte de una experiencia creada exclusivamente para ti.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" 
                   class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 transition-all duration-300 shadow-soft">
                    Hablemos de tu viaje
                </a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300">
                    Ver más destinos
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>