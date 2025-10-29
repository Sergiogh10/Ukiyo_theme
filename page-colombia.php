<?php
/**
 * Template Name: Colombia Experience
 */
get_header();
?>

<!-- Hero Section -->
<section class="relative">
    <div class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        <img src="<?php echo get_template_directory_uri(); ?>/images/colombia/viajes-a-colombia-personalizados-palanquera.jpg"
             alt="Valle del Cocora en un viaje a Colombia personalizado con Ukiyo"
             class="w-full h-full object-cover" 
             loading="lazy"
             onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        
        <!-- Content Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-12">
            <div class="container mx-auto max-w-4xl">
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">Café de origen</span>
                    <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-medium">Pacífico & Caribe</span>
                    <span class="bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">Alegría vibrante</span>
                </div>
                <h1 class="text-4xl lg:text-6xl font-telma text-white mb-4">
                    COLOMBIA <span class="text-accent">Alegría que se queda</span>
                </h1>
                <p class="text-xl text-white/90 max-w-3xl">
                    Del Paisaje Cafetero al Caribe: Medellín, Eje Cafetero, Nuquí, Cartagena y Providencia. Colores, música y sabores — con gente que te hace sentir en casa desde el primer día.
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
                <h3 class="font-satoshi text-lg text-text-primary">Recomendación</h3>
                <p class="text-text-secondary">10–14 días</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-secondary-100 text-secondary rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="font-satoshi text-lg text-text-primary">Ubicación</h3>
                <p class="text-text-secondary">Colombia</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-accent-100 text-accent rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                    </svg>
                </div>
                <h3 class="font-satoshi text-lg text-text-primary">Grupo</h3>
                <p class="text-text-secondary">En solitario, en pareja o con amigos</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-primary-100 text-primary rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="font-satoshi text-lg text-text-primary">Mejor Época</h3>
                <p class="text-text-secondary">Dic–Mar · Jul–Sep</p>
            </div>
        </div>
    </div>
</section>

<!-- Day-by-Day Itinerary -->
<section class="py-20 bg-surface">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-display font-satoshi text-text-primary mb-4">
                Nuestros <span class="text-primary">imprescindibles</span>
            </h2>
            <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                Cada uno de estos lugares dejó un maravilloso recuerdo en nuestras retinas
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <!-- Aquí incluyes tus días 1 a 5 tal cual los pasaste -->
            <div class="mb-12">
                    <div class="card hover:shadow-card-hover transition-all duration-300">
                        <div class="flex flex-col lg:flex-row gap-8">
                            <div class="lg:w-1/3 aspect-[4/3] overflow-hidden rounded-lg">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/colombia/viajes-a-colombia-personalizados-medellin.jpg"
                                     alt="Medellín durante un viaje a Colombia personalizado con Ukiyo" 
                                     class="w-full h-64 lg:h-full object-cover rounded-lg" 
                                     loading="lazy" 
                                     onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                            </div>
                            <div class="lg:w-2/3">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-semibold mr-4">1</div>
                                    <h3 class="text-2xl font-satoshi text-text-primary">MEDELLÍN</h3>
                                </div>
                                <div class="mb-6">
                                    <span class="inline-block bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium mr-2">Cultura urbana</span>
                                    <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium">Miradores & Comuna 13</span>
                                </div>
                                <p class="text-text-secondary mb-6">
                                    Medellín hoy late creativo: arte urbano, barrios con historia y miradores que muestran su transformación. Ruta por Comuna 13 con guía local y atardecer en un mirador.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Recorrido guiado por Comuna 13 y arte urbano</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Teleférico + mirador al atardecer</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Café especialidad con cata introductoria</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/colombia/viajes-a-colombia-personalizados-eje-cafetero-valle-de-cocora.jpg"
                                     alt="Eje Cafetero y Valle de Cocora en un viaje a Colombia personalizado" 
                                     class="w-full h-64 lg:h-full object-cover rounded-lg" 
                                     loading="lazy" 
                                     onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />                            </div>
                            <div class="lg:w-2/3">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-secondary text-white rounded-full flex items-center justify-center font-semibold mr-4">2</div>
                                    <h3 class="text-2xl font-satoshi text-text-primary">EJE CAFETERO</h3>
                                </div>
                                <div class="mb-6">
                                    <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium mr-2">Café de origen</span>
                                    <span class="inline-block bg-accent-100 text-accent px-3 py-1 rounded-full text-sm font-medium">Valle de Cocora</span>
                                </div>
                                <p class="text-text-secondary mb-6">
                                    Paisaje Cultural Cafetero: fincas, tradición y montañas verdes. Aprende el proceso del café desde la planta hasta la taza y camina entre palmas de cera en Cocora.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Visita a finca cafetera y proceso completo</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Trekking ligero en Valle de Cocora</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Termales locales para relajar cuerpo y mente</span>
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
                                <img src="<?php echo get_template_directory_uri(); ?>/images/colombia/viajes-a-colombia-personalizados-nuqui-pacifico-colombiano.jpg"
                                     alt="Nuquí, Pacífico colombiano, durante un viaje a Colombia personalizado" 
                                     class="w-full h-64 lg:h-full object-cover rounded-lg" 
                                     loading="lazy" 
                                     onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />                            </div>
                            <div class="lg:w-2/3">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-accent text-white rounded-full flex items-center justify-center font-semibold mr-4">3</div>
                                    <h3 class="text-2xl font-satoshi text-text-primary">NUQUÍ</h3>
                                </div>
                                <div class="mb-6">
                                    <span class="inline-block bg-accent-100 text-accent px-3 py-1 rounded-full text-sm font-medium mr-2">Pacífico colombiano</span>
                                    <span class="inline-block bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium">Selva & manglares</span>
                                </div>
                                <p class="text-text-secondary mb-6">
                                    Naturaleza pura entre selva y mar. Según temporada, avistamiento de ballenas, caminata por selva húmeda y baños en aguas termales naturales.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-accent mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Salida en bote y (en temporada) avistamiento de ballenas</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-accent mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Caminata guiada por selva y manglares</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-accent mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Aguas termales naturales junto al río</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-a-colombia-personalizados-cartagena-ciudad-amurallada.jpg"
                                     alt="Cartagena de Indias, ciudad amurallada, en un viaje a Colombia personalizado" 
                                     class="w-full h-64 lg:h-full object-cover rounded-lg" 
                                     loading="lazy" 
                                     onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />                            </div>
                            <div class="lg:w-2/3">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-semibold mr-4">4</div>
                                    <h3 class="text-2xl font-satoshi text-text-primary">CARTAGENA</h3>
                                </div>
                                <div class="mb-6">
                                    <span class="inline-block bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium mr-2">Ciudad amurallada</span>
                                    <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium">Getsemaní</span>
                                </div>
                                <p class="text-text-secondary mb-6">
                                    Calles coloniales, música y sabor caribe. Recorre la ciudad amurallada, el barrio de Getsemaní y disfruta de una puesta de sol frente al mar.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Paseo histórico por ciudad amurallada</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Ruta de arte y música en Getsemaní</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Atardecer en murallas o chiva caribeña</span>
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
                                <img src="<?php echo get_template_directory_uri(); ?>/images/colombia/viajes-a-colombia-personalizados-providencia-mar-siete-colores.jpg" 
                                     alt="Providencia y el mar de siete colores en un viaje a Colombia personalizado con Ukiyo" 
                                     class="w-full h-64 lg:h-full object-cover rounded-lg" 
                                     loading="lazy" 
                                     onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />                            </div>
                            <div class="lg:w-2/3">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-secondary text-white rounded-full flex items-center justify-center font-semibold mr-4">5</div>
                                    <h3 class="text-2xl font-satoshi text-text-primary">PROVIDENCIA</h3>
                                </div>
                                <div class="mb-6">
                                    <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium mr-2">Mar de siete colores</span>
                                    <span class="inline-block bg-accent-100 text-accent px-3 py-1 rounded-full text-sm font-medium">Snorkel & relax</span>
                                </div>
                                <p class="text-text-secondary mb-6">
                                    Una isla tranquila y auténtica. Coral, aguas turquesa y ritmos isleños. Ideal para desconectar y disfrutar sin prisas.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Snorkel en arrecifes y bancos de arena</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Vuelta a la isla en buggy o bicicleta</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary">Cocina isleña: rondón y sabores locales</span>
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
            <h2 class="text-display font-satoshi text-text-primary mb-4">
                ¿Qué <span class="text-accent">Incluye</span>?
            </h2>
            <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                Todo lo necesario para una experiencia auténtica y sin preocupaciones.
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
                    <h3 class="text-lg font-satoshi text-text-primary mb-2">Alojamiento Premium</h3>
                    <p class="text-text-secondary text-sm">Alojamientos boutique y eco en Medellín, Eje Cafetero, costa del Pacífico y Caribe.</p>
                </div>

                <!-- Meals -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-satoshi text-text-primary mb-2">Gastronomía Completa</h3>
                    <p class="text-text-secondary text-sm">Cocina local con opciones vegetarianas y productos de proximidad.</p>
                </div>

                <!-- Transportation -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-satoshi text-text-primary mb-2">Transporte Privado</h3>
                    <p class="text-text-secondary text-sm">Traslados privados con conductores locales en las principales rutas.</p>
                </div>

                <!-- Guide -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary-100 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-satoshi text-text-primary mb-2">Guía Cultural Experto</h3>
                    <p class="text-text-secondary text-sm">Guías locales en cada región (cultura, naturaleza y vida urbana).</p>
                </div>

                <!-- Activities -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-satoshi text-text-primary mb-2">Todas las Actividades</h3>
                    <p class="text-text-secondary text-sm">Experiencias y entradas organizadas: tours, caminatas y salidas en bote.</p>
                </div>

                <!-- Support -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-satoshi text-text-primary mb-2">Soporte 24/7</h3>
                    <p class="text-text-secondary text-sm">Asistencia durante todo el viaje y coordinación UKIYO disponible.</p>
                </div>
            </div>
        </div>
    </section>


<!-- Practical Information -->
<section class="py-20 bg-surface">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-display font-satoshi text-text-primary mb-4">
                    Información <span class="text-primary">Práctica</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    Todo lo que necesitas saber para prepararte para esta experiencia auténtica.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Preparation -->
                    <div class="card">
                        <h3 class="text-xl font-satoshi text-text-primary mb-4">Preparación Recomendada</h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Ropa ligera (clima cálido y húmedo en varias zonas)</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Calzado cómodo para caminar y senderos</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Protector solar y repelente</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Respeto por las costumbres locales</span>
                            </div>
                        </div>
                    </div>

                    <!-- Important Notes -->
                    <div class="card">
                        <h3 class="text-xl font-satoshi text-text-primary mb-4">Consideraciones Importantes</h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Nivel físico moderado en algunas rutas (Cocora, Nuquí)</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Respeto por comunidades afro e indígenas</span>
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
            <h2 class="text-display font-satoshi mb-6">
                ¿Listo para vivir Colombia?
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Conecta con la esencia de Colombia.
                Déjate guiar por UKIYO a través de Medellín, el Eje Cafetero, Nuquí, Cartagena y Providencia en un recorrido creado solo para ti.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="<?php echo site_url('/experiences'); ?>" 
                   class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 transition-all duration-300 shadow-soft">
                    Hablemos de tu viaje
                </a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300">
                    Ver más destinos
                </a>
            </div>
            <p class="text-sm opacity-70">Mejores meses: Dic–Mar · Jul–Sep</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>