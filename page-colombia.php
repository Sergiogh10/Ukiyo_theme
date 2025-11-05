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
                    <span class="badge-elevada">Café de origen</span>
                    <span class="badge-elevada">Pacífico &amp; Caribe</span>
                    <span class="badge-elevada">Alegría vibrante</span>
                </div>
                <div class="hero-overlay-box">
                    <h1 class="text-4xl lg:text-6xl font-rowdies text-white mb-4 pl-4">
                        COLOMBIA: <br>
                        <span class="text-accent">Alegría que se queda</span>
                    </h1>
                    <p class="text-xl text-white/90 max-w-3xl pl-4">
                        Del Paisaje Cafetero al Caribe: Medellín, Eje Cafetero, Nuquí, Cartagena y Providencia. Colores, música y sabores — con gente que te hace sentir en casa desde el primer día.
                    </p>
                </div>
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
    <div class="relative mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-display font-crimson text-text-primary mb-4">
                Nuestros <span class="text-primary">imprescindibles</span>
            </h2>
            <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                Cada uno de estos lugares dejó un maravilloso recuerdo en nuestras retinas
            </p>
        </div>

            <!-- Day 1 -->
            <div class="mb-12">
                <div class="bg-white/90 border border-surface/40 rounded-2xl overflow-hidden shadow-soft">
                    <div class="grid lg:grid-cols-2 gap-8 items-stretch">
                        <!-- Left content -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">MEDELLÍN</h1>
                                <p class="mb-6">Medellín es la Colombia creativa, la de los barrios que se transformaron en arte urbano, cafés de especialidad y miradores a un valle verde. Es la base perfecta para empezar el viaje.</p>
                                <p>Te proponemos conocer su centro histórico, subir al Metrocable para ver la ciudad desde arriba y visitar Guatapé si quieres una excursión de día completo.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">MEDELLÍN</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Comuna 13:</strong> arte urbano y transformación social.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Metrocable:</strong> vistas completas del valle.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Centro y Plaza Botero:</strong> historia y arte colombiano.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Excursión a Guatapé:</strong> casas de colores y la Piedra del Peñol.</span>
                                    </div>
                                </div>
                                    <!-- Services provided
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">Incluye</h4>
                                        <ul class="space-y-2 text-sm text-text-secondary">
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Jeep 4x4 al amanecer
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Guía local
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Miradores principales
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Asistencia Ukiyo
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Right image -->
                        <div class="relative min-h-[280px] lg:min-h-full overflow-hidden">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/colombia/viajes-a-colombia-personalizados-medellin.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                            <div class="absolute"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Day 2 y 3 -->

            <div class="mb-12">
                <div class="bg-white/90 border border-surface/40 rounded-2xl overflow-hidden shadow-soft">
                    <div class="grid lg:grid-cols-2 gap-8 items-stretch">
                        
                        <!-- Imagen a la izquierda -->
                        <div class="relative min-h-[280px] lg:min-h-full overflow-hidden">
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/images/colombia/viajes-a-colombia-personalizados-eje-cafetero-valle-de-cocora.jpg"
                                alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo"
                                class="w-full h-full object-cover mask-right"
                                loading="lazy"
                                onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;"
                            />
                        </div>

                        <!-- Texto a la derecha -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">EJE CAFETERO</h1>
                                <p class="mb-6">El Eje Cafetero es la parte más verde y pausada del viaje: fincas cafeteras, pueblos de colores y el Valle del Cocora con palmas de cera gigantes.</p>
                                <p>Incluimos visita a finca de café, recorrido por Salento o Filandia y caminata ligera para disfrutar del paisaje.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">EL EJE CAFETERO</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Valle del Cocora:</strong> palmas de cera y senderos.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Finca cafetera:</strong> proceso completo del café de origen.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Salento / Filandia:</strong> pueblos coloridos y artesanía.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Miradores:</strong> vistas a cafetales y montañas.</span>
                                    </div>
                                </div>
                                    <!-- Services provided
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">Incluye</h4>
                                        <ul class="space-y-2 text-sm text-text-secondary">
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Jeep 4x4 al amanecer
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Guía local
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Miradores principales
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Asistencia Ukiyo
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-12">
                <div class="bg-white/90 border border-surface/40 rounded-2xl overflow-hidden shadow-soft">
                    <div class="grid lg:grid-cols-2 gap-8 items-stretch">
                        <!-- Left content -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">NUQUÍ</h1>
                                <p class="mb-6">Nuquí es el Pacífico colombiano más puro: selva que llega al mar, playas vacías y comunidades afro que mantienen vivas sus tradiciones.</p>
                                <p>Según la época, podrás avistar ballenas, hacer caminatas a cascadas en la selva y vivir la gastronomía del Pacífico.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">NUQUÍ</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Avistamiento de ballenas:</strong> temporada jul-oct.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Cascadas en selva húmeda:</strong> caminatas cortas con guía local.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Playas salvajes:</strong> mar cálido y poca gente.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Cultura del Pacífico:</strong> cocina tradicional y música.</span>
                                    </div>
                                </div>
                                    <!-- Services provided
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">Incluye</h4>
                                        <ul class="space-y-2 text-sm text-text-secondary">
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Jeep 4x4 al amanecer
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Guía local
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Miradores principales
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Asistencia Ukiyo
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Right image -->
                        <div class="relative min-h-[280px] lg:min-h-full overflow-hidden">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/colombia/viajes-a-colombia-personalizados-nuqui-ballena.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                            <div class="absolute"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Day 4 y 5 -->

            <div class="mb-12">
                <div class="bg-white/90 border border-surface/40 rounded-2xl overflow-hidden shadow-soft">
                    <div class="grid lg:grid-cols-2 gap-8 items-stretch">
                        
                        <!-- Imagen a la izquierda -->
                        <div class="relative min-h-[280px] lg:min-h-full overflow-hidden">
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-personalizados-por-el-mundo-colombia.jpg"
                                alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo"
                                class="w-full h-full object-cover mask-right"
                                loading="lazy"
                                onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;"
                            />
                        </div>

                        <!-- Texto a la derecha -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">CARTAGENA</h1>
                                <p class="mb-6">Cartagena es la parte más romántica del viaje: ciudad amurallada, balcones floridos y atardeceres frente al Caribe. Ideal para cerrar la ruta.</p>
                                <p>Te sugerimos combinar el casco histórico con salidas en lancha a islas cercanas y una cena especial en el centro.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">CARTAGENA</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Ciudad amurallada:</strong> historia colonial y arquitectura.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Getsemaní:</strong> arte urbano y ambiente local.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Islas del Rosario:</strong> día de mar opcional.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Gastronomía caribeña:</strong> cocina creativa y fresca.</span>
                                    </div>
                                </div>
                                    <!-- Services provided
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">Incluye</h4>
                                        <ul class="space-y-2 text-sm text-text-secondary">
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Jeep 4x4 al amanecer
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Guía local
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Miradores principales
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Asistencia Ukiyo
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-12">
                <div class="bg-white/90 border border-surface/40 rounded-2xl overflow-hidden shadow-soft">
                    <div class="grid lg:grid-cols-2 gap-8 items-stretch">
                        <!-- Left content -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">PROVIDENCIA</h1>
                                <p class="mb-6">Providencia es el Caribe más tranquilo de Colombia: mar de siete colores, arrecifes y ritmo isleño sin masificaciones.</p>
                                <p>Es perfecta para bucear, hacer snorkel y terminar el viaje descansando en una isla auténtica.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">PROVIDENCIA</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Mar de siete colores:</strong> ideal para snorkel.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Arrecifes y bancos de arena:</strong> salidas en bote.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Ambiente isleño:</strong> calma y autenticidad.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Cierre perfecto:</strong> relax tras ruta por Colombia.</span>
                                    </div>
                                </div>
                                    <!-- Services provided
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">Incluye</h4>
                                        <ul class="space-y-2 text-sm text-text-secondary">
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Jeep 4x4 al amanecer
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Guía local
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Miradores principales
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs">●</span>
                                                Asistencia Ukiyo
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Right image -->
                        <div class="relative min-h-[280px] lg:min-h-full overflow-hidden">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/colombia/viajes-a-colombia-personalizados-providencia-mar-siete-colores.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                            <div class="absolute"></div>
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
                Información <span class="text-accent">de interés</span>
            </h2>
            <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                Datos prácticos para organizar tu viaje por Colombia con tranquilidad.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Moneda local -->
            <div class="text-center">
                <div class="w-16 h-16 bg-primary-100 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .843-3 1.882 0 1.04 1.343 1.882 3 1.882s3 .843 3 1.882C15 14.843 13.657 15 12 15m0-7c1.11 0 2.08.402 2.6 1M12 4v2m0 12v2m8-10a8 8 0 11-16 0 8 8 0 0116 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-satoshi text-text-primary mb-2">Moneda</h3>
                <p class="text-text-secondary text-sm">Peso colombiano (COP). Se puede pagar con tarjeta en ciudades, pero es útil llevar efectivo para pueblos y mercados.</p>
            </div>

            <!-- Hora local -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-satoshi text-text-primary mb-2">Hora local</h3>
                <p class="text-text-secondary text-sm">Colombia suele estar a -6 h de España (península) cuando España está en invierno y a -7 h cuando España está en verano.</p>
            </div>

            <!-- Mejor época -->
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l1.664 9.148A2 2 0 006.64 18h10.72a2 2 0 001.976-1.852L21 7M5 7h14M9 11v4m6-4v4" />
                    </svg>
                </div>
                <h3 class="text-lg font-satoshi text-text-primary mb-2">Mejor época</h3>
                <p class="text-text-secondary text-sm">Colombia es un destino todo el año. Para combinar café + Caribe suelen ir bien diciembre–marzo y julio–septiembre.</p>
            </div>

            <!-- Entrada al país -->
            <div class="text-center">
                <div class="w-16 h-16 bg-primary-100 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.657-1.343 3-3 3H5l-2 2V5a2 2 0 012-2h6a2 2 0 012 2v4zm0 0h2a2 2 0 012 2v1m-2 4l2 2 4-4" />
                    </svg>
                </div>
                <h3 class="text-lg font-satoshi text-text-primary mb-2">Entrada al país</h3>
                <p class="text-text-secondary text-sm">Para españoles: estancia turística hasta 90 días sin visado. Pasaporte vigente y a veces billete de salida.</p>
            </div>

            <!-- Electricidad -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-satoshi text-text-primary mb-2">Electricidad</h3>
                <p class="text-text-secondary text-sm">110V y enchufe tipo A/B (como EE.UU.). Desde España necesitarás adaptador.</p>
            </div>

            <!-- Salud y seguridad -->
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .843-3 1.882 0 1.04 1.343 1.882 3 1.882s3 .843 3 1.882C15 14.843 13.657 15 12 15m0-7a4 4 0 110 8 4 4 0 010-8zm0 11v2m0-18v2" />
                    </svg>
                </div>
                <h3 class="text-lg font-satoshi text-text-primary mb-2">Salud y seguridad</h3>
                <p class="text-text-secondary text-sm">No hay vacunas obligatorias desde España. Recomendable seguro de viaje y seguir las indicaciones del guía en zonas rurales.</p>
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
                    Recomendaciones <span class="text-primary">UKIYO</span>
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