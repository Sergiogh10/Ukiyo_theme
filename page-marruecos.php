<?php
/**
 * Template Name: Marruecos Experience
 */
get_header();
?>

<!-- Hero Section -->
<section class="relative">
    <div class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viajes-a-marruecos-personalizados-erg-chebbi-hero.jpg"
             alt="Desierto de Merzouga (Erg Chebbi) en un viaje a Marruecos personalizado con Ukiyo"
             class="w-full h-full object-cover" 
             loading="lazy"
             onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        
        <!-- Content Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-12">
            <div class="container mx-auto max-w-4xl">
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">Desierto</span>
                    <span class="bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">Cultura y hospitalidad</span>
                    <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-medium">Aventura y calma</span>
                </div>
                <h1 class="text-4xl lg:text-6xl font-crimson text-white mb-4">
                    MARRUECOS <span class="text-accent">Desierto y tradición</span>
                </h1>
                <p class="text-xl text-white/90 max-w-3xl">
                Desde las montañas del Atlas hasta las dunas infinitas de Merzouga, Marruecos despierta los sentidos.  
                Una tierra donde la calma del desierto se entrelaza con la energía de las medinas y el aroma del té a la menta.                </p>
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
                <p class="text-text-secondary">5–8 días</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-secondary-100 text-secondary rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="font-crimson text-lg text-text-primary">Ubicación</h3>
                <p class="text-text-secondary">Marruecos</p>
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
                <p class="text-text-secondary">Oct–Abr</p>
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
            <!-- Aquí incluyes tus días 1 a 5 tal cual los pasaste -->
            <div class="mb-12">
                <div class="card hover:shadow-card-hover transition-all duration-300">
                    <div class="flex flex-col lg:flex-row gap-8">
                        <div class="lg:w-1/3">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viajes-a-marruecos-personalizados-erg-chebbi-merzouga.jpg" alt="Erg Chebbi en Merzouga durante un viaje a Marruecos personalizado con Ukiyo" class="w-full h-64 lg:h-full object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                        </div>
                        <div class="lg:w-2/3">
                            <div class="flex items-center mb-4">
                                <div class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-semibold mr-4">1</div>
                                <h3 class="text-2xl font-crimson text-text-primary">ERG CHEBBI (Merzouga)</h3>
                            </div>
                            <div class="mb-6">
                                <span class="inline-block bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium mr-2">Dunas</span>
                                <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium">Atardecer</span>
                            </div>
                            <p class="text-text-secondary mb-6">
                              Llegada a Merzouga y primer contacto con el Sahara. Subimos a las dunas de Erg Chebbi para ver cómo el sol tiñe de oro el horizonte. Té de bienvenida en haima y cena tradicional.
                            </p>
                            <div class="space-y-3">
                                <span class="text-text-secondary"><strong>5:00 PM:</strong> Paseo por las dunas y puesta de sol</span>
                                <span class="text-text-secondary"><strong>7:30 PM:</strong> Cena bereber en campamento</span>
                                <span class="text-text-secondary"><strong>10:00 PM:</strong> Cielo estrellado y silencio del desierto</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viajes-a-marruecos-personalizados-khamlia-musica-gnawa.jpg" alt="Música gnawa en Khamlia durante un viaje a Marruecos personalizado" class="w-full h-64 lg:h-full object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                        </div>
                        <div class="lg:w-2/3">
                            <div class="flex items-center mb-4">
                                <div class="w-8 h-8 bg-secondary text-white rounded-full flex items-center justify-center font-semibold mr-4">2</div>
                                <h3 class="text-2xl font-crimson text-text-primary">KHAMLIA & ALREDEDORES</h3>
                            </div>
                            <div class="mb-6">
                                <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium mr-2">Música Gnawa</span>
                                <span class="inline-block bg-accent-100 text-accent px-3 py-1 rounded-full text-sm font-medium">Cultura</span>
                            </div>
                            <p class="text-text-secondary mb-6">
                              Visita a Khamlia para disfrutar de música gnawa y conocer su historia. Paseo por palmerales y ksar cercanos. Almuerzo local y tiempo para fotos con la luz suave de la tarde.
                            </p>
                            <div class="space-y-3">
                                <span class="text-text-secondary"><strong>10:00 AM:</strong> Concierto gnawa y conversación</span>
                                <span class="text-text-secondary"><strong>1:30 PM:</strong> Almuerzo local</span>
                                <span class="text-text-secondary"><strong>4:30 PM:</strong> Paseo por palmeral y ksar</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viajes-a-marruecos-personalizados-pistas-oasis-4x4.jpg" alt="Ruta 4x4 entre pistas y oasis en un viaje a Marruecos personalizado" class="w-full h-64 lg:h-full object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                        </div>
                        <div class="lg:w-2/3">
                            <div class="flex items-center mb-4">
                                <div class="w-8 h-8 bg-accent text-white rounded-full flex items-center justify-center font-semibold mr-4">3</div>
                                <h3 class="text-2xl font-crimson text-text-primary">PISTAS & OASIS EN 4x4</h3>
                            </div>
                            <div class="mb-6">
                                <span class="inline-block bg-accent-100 text-accent px-3 py-1 rounded-full text-sm font-medium mr-2">Aventura</span>
                                <span class="inline-block bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium">Oasis</span>
                            </div>
                            <p class="text-text-secondary mb-6">
                              Jornada en 4x4 por hamadas y pistas del desierto. Paradas en oasis, encuentro con familias nómadas y té bajo la sombra de las acacias. Fotografía de paisaje y texturas.
                            </p>
                            <div class="space-y-3">
                                <span class="text-text-secondary"><strong>9:00 AM:</strong> Ruta 4x4 hacia oasis</span>
                                <span class="text-text-secondary"><strong>1:00 PM:</strong> Té con familia nómada</span>
                                <span class="text-text-secondary"><strong>5:00 PM:</strong> Regreso a Merzouga</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viajes-a-marruecos-personalizados-rissani-kasbahs.jpg" alt="Mercado de Rissani y kasbahs en un viaje a Marruecos personalizado" class="w-full h-64 lg:h-full object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                        </div>
                        <div class="lg:w-2/3">
                            <div class="flex items-center mb-4">
                                <div class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-semibold mr-4">4</div>
                                <h3 class="text-2xl font-crimson text-text-primary">RISSANI & KASBAHS</h3>
                            </div>
                            <div class="mb-6">
                                <span class="inline-block bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium mr-2">Mercado</span>
                                <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium">Arquitectura</span>
                            </div>
                            <p class="text-text-secondary mb-6">
                              Mañana en el mercado de Rissani entre especias, dátiles y artesanía. Visita a kasbahs de adobe y ksour históricos. Regreso al desierto para un atardecer tranquilo.
                            </p>
                            <div class="space-y-3">
                                <span class="text-text-secondary"><strong>9:00 AM:</strong> Mercado de Rissani</span>
                                <span class="text-text-secondary"><strong>12:30 PM:</strong> Kasbahs y ksour</span>
                                <span class="text-text-secondary"><strong>6:30 PM:</strong> Atardecer en Erg Chebbi</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viajes-a-marruecos-personalizados-merzouga-cielo-nocturno-haima.jpg" alt="Cielo nocturno en Merzouga desde la haima en un viaje a Marruecos personalizado" class="w-full h-64 lg:h-full object-cover rounded-lg" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                        </div>
                        <div class="lg:w-2/3">
                            <div class="flex items-center mb-4">
                                <div class="w-8 h-8 bg-secondary text-white rounded-full flex items-center justify-center font-semibold mr-4">5</div>
                                <h3 class="text-2xl font-crimson text-text-primary">NOCHES DE HAIMA</h3>
                            </div>
                            <div class="mb-6">
                                <span class="inline-block bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium mr-2">Cielo Estrellado</span>
                                <span class="inline-block bg-accent-100 text-accent px-3 py-1 rounded-full text-sm font-medium">Haima</span>
                            </div>
                            <p class="text-text-secondary mb-6">
                              Tiempo para descansar, paseo en dromedario opcional y observación del cielo nocturno. Historias junto al fuego y música tradicional. Cierre del viaje con calma.
                            </p>
                            <div class="space-y-3">
                                <span class="text-text-secondary"><strong>8:00 AM:</strong> Mañana libre / dromedario opcional</span>
                                <span class="text-text-secondary"><strong>5:30 PM:</strong> Caminata suave por las dunas</span>
                                <span class="text-text-secondary"><strong>9:30 PM:</strong> Estrellas y té en la haima</span>
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
                    <p class="text-text-secondary text-sm">Campamentos en haimas y riad/bivouac seleccionados en Merzouga y alrededores</p>
                </div>

                <!-- Meals -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-crimson text-text-primary mb-2">Gastronomía Completa</h3>
                    <p class="text-text-secondary text-sm">Desayunos y cenas incluidas en el desierto; cocina local y opciones vegetarianas</p>
                </div>

                <!-- Transportation -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-crimson text-text-primary mb-2">Transporte Privado</h3>
                    <p class="text-text-secondary text-sm">Traslados 4x4/dromedario según actividad y vehículo privado entre puntos</p>
                </div>

                <!-- Guide -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary-100 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-crimson text-text-primary mb-2">Guía Cultural Experto</h3>
                    <p class="text-text-secondary text-sm">Guía local bilingüe, especialista en cultura amazigh y vida en el desierto</p>
                </div>

                <!-- Activities -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-crimson text-text-primary mb-2">Todas las Actividades</h3>
                    <p class="text-text-secondary text-sm">Paseos por dunas, música gnawa, visitas a palmerales/ksar y observación de estrellas</p>
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
                                <span class="text-text-secondary text-sm">Ropa ligera, pañuelo/bufanda para el viento y capa para la noche</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Calzado cerrado con buena suela para arena y roca</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Protector solar, gafas de sol y cantimplora reutilizable</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Efectivo para compras locales y té</span>
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
                                <span class="text-text-secondary text-sm">Clima desértico: noches frescas y días secos</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Respeto por las costumbres locales (vestimenta y fotografía)</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Grupos pequeños (máx. 8) para experiencia íntima</span>
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
                Descubre el alma de Marruecos entre desiertos, medinas y montañas.
                UKIYO diseña para ti un viaje auténtico, lleno de cultura, calma y experiencias que van más allá del turismo convencional.
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