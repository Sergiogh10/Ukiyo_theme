<?php
/**
 * Template Name: Costarica Experience
 */
get_header();
?>

<!-- Hero Section -->
<section class="relative">
    <div class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-osa-corcovado-hero.jpg"
             alt="Costa Rica, Península de Osa y Corcovado en un viaje personalizado con Ukiyo"
             class="w-full h-full object-cover" 
             loading="lazy"
             onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        
        <!-- Content Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-12">
          <div class="container mx-auto max-w-4xl">
            <div class="flex flex-wrap items-center gap-3 mb-6">
              <span class="badge-elevada">Biodiversidad</span>
              <span class="badge-elevada">Inmersión cultural</span>
              <span class="badge-elevada">Aventura y paraíso</span>
            </div>
            <div class="hero-overlay-box">
              <h1 class="text-4xl lg:text-6xl font-rowdies text-white mb-4 pl-4">
                COSTA RICA: <br>
                <span class="text-accent">Biodiversidad pura</span>
              </h1>
              <p class="text-xl text-white/90 max-w-3xl pl-4">
                Explora con nosotros la Península de Osa, Corcovado y los bosques nubosos de Monteverde; amaneceres en la selva, ríos claros y encuentros respetuosos con la vida salvaje.
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
                <p class="text-text-secondary">Costa Rica</p>
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
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">CORCOVADO</h1>
                                <p class="mb-6">Corcovado es la joya de la Península de Osa y donde la naturaleza de Costa Rica se muestra sin filtros: selva primaria, playas salvajes y muchísima fauna.</p>
                                <p>Te llevamos con guía naturalista para recorrer los senderos, buscar guacamayos, monos y, con suerte, tapires, y vivir la parte más salvaje del viaje.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">CORCOVADO</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Selva primaria:</strong> uno de los lugares más biodiversos del planeta.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Avistamiento de fauna:</strong> guacamayos, monos, perezosos y más.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Senderos costeros:</strong> selva que llega hasta el mar.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Lodges sostenibles:</strong> integración total con la naturaleza.</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-rana-ojos-rojos.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
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
                                src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-monteverde.jpg"
                                alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo"
                                class="w-full h-full object-cover mask-right"
                                loading="lazy"
                                onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;"
                            />
                        </div>

                        <!-- Texto a la derecha -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">MONTEVERDE</h1>
                                <p class="mb-6">Monteverde es el bosque nuboso más conocido de Costa Rica: puentes colgantes, niebla, orquídeas y aves que solo viven aquí.</p>
                                <p>Incluimos caminata guiada y tiempo libre para disfrutar del clima fresco de montaña, cafeterías y productos locales.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">MONTEVERDE</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Bosque nuboso:</strong> senderos entre niebla y vegetación densa.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Puentes colgantes:</strong> vistas sobre el dosel del bosque.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Fauna y aves:</strong> posibilidad de ver quetzal según época.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Productos locales:</strong> café, queso y artesanía de montaña.</span>
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
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">TORTUGUERO</h1>
                                <p class="mb-6">Tortuguero es la Costa Rica de canales: selva, agua y Caribe. Solo se llega en bote o avioneta y eso lo hace especial.</p>
                                <p>Haremos el safari en bote al amanecer para ver caimanes, monos y aves, y según la temporada podrás presenciar el desove de tortugas.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">TORTUGUERO</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Canales al amanecer:</strong> observación de fauna desde el agua.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Pueblo caribeño:</strong> vida local y ritmo tranquilo.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Desove de tortugas:</strong> de julio a octubre.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Lodges en la selva:</strong> dormir rodeado de sonidos naturales.</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-atardecer.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
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
                                src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-rio-celeste.jpg"
                                alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo"
                                class="w-full h-full object-cover mask-right"
                                loading="lazy"
                                onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;"
                            />
                        </div>

                        <!-- Texto a la derecha -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">LA FORTUNA</h1>
                                <p class="mb-6">La Fortuna es la base para explorar el Volcán Arenal: cataratas, termales y rutas fáciles con vistas al volcán.</p>
                                <p>Es la parte más relajada del viaje y donde solemos dejar tiempo libre para que disfrutes del hotel o actividades opcionales.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">LA FORTUNA</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Catarata La Fortuna:</strong> baño en agua fresca.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Volcán Arenal:</strong> senderos y miradores.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Termales:</strong> relajación después de las excursiones.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Actividades:</strong> tirolina, rafting suave o puentes colgantes.</span>
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
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">PUERTO VIEJO</h1>
                                <p class="mb-6">El Caribe Sur (Puerto Viejo, Cahuita, Manzanillo) es la parte más bohemia y relajada de Costa Rica: selva pegada al mar y ritmo afrocaribeño.</p>
                                <p>Lo incluimos para que termines el viaje en la playa, con buena gastronomía y la posibilidad de visitar el Parque Nacional Cahuita.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">CARIBE SUR</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Parque Nacional Cahuita:</strong> sendero costero con fauna.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Playas de Punta Uva / Manzanillo:</strong> aguas tranquilas y paisaje.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Gastronomía afrocaribeña:</strong> rice & beans, coco y especias.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Ambiente relajado:</strong> perfecto para cerrar la ruta.</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-mono.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
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
            <h2 class="text-display font-crimson text-text-primary mb-4">
                Información <span class="text-accent">de interés</span>
            </h2>
            <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                Datos prácticos para preparar tu viaje a Costa Rica con total tranquilidad.
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
                <h3 class="text-lg font-crimson text-text-primary mb-2">Moneda</h3>
                <p class="text-text-secondary text-sm">Colón costarricense (CRC). Se acepta USD en muchas zonas turísticas. Recomendable llevar tarjeta.</p>
            </div>

            <!-- Hora local -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Hora local</h3>
                <p class="text-text-secondary text-sm">Costa Rica suele tener -7 h respecto a España (península) cuando España está en horario de verano, y -6 h el resto del año.</p>
            </div>

            <!-- Mejor época -->
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .843-3 1.882C9 10.96 10.343 12 12 12s3 .843 3 1.882C15 14.843 13.657 15 12 15m0-7c1.11 0 2.08.402 2.6 1M12 4v2m0 12v2m8-10a8 8 0 11-16 0 8 8 0 0116 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Mejor época</h3>
                <p class="text-text-secondary text-sm">De diciembre a abril es la temporada más seca. De mayo a noviembre hay más lluvia pero selva más verde.</p>
            </div>

            <!-- Visado y entrada -->
            <div class="text-center">
                <div class="w-16 h-16 bg-primary-100 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.657-1.343 3-3 3H5l-2 2V5a2 2 0 012-2h6a2 2 0 012 2v4zm0 0h2a2 2 0 012 2v1m-2 4l2 2 4-4" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Entrada al país</h3>
                <p class="text-text-secondary text-sm">Para españoles: estancia turística hasta 90 días sin visado, pasaporte en vigor y vuelo de salida.</p>
            </div>

            <!-- Electricidad -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Electricidad</h3>
                <p class="text-text-secondary text-sm">110V, enchufe tipo A/B (como EE.UU.). Necesitarás adaptador desde España.</p>
            </div>

            <!-- Salud y seguridad -->
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .843-3 1.882 0 1.04 1.343 1.882 3 1.882s3 .843 3 1.882C15 14.843 13.657 15 12 15m0-7a4 4 0 110 8 4 4 0 010-8zm0 11v2m0-18v2" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Salud y seguridad</h3>
                <p class="text-text-secondary text-sm">No hay vacunas obligatorias desde España. Recomendable seguro de viaje y repelente para zonas de selva.</p>
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
                    Recomendaciones <span class="text-primary">UKIYO</span>
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
                                <span class="text-text-secondary text-sm">Ropa ligera de secado rápido y capa impermeable</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Calzado cerrado con buena suela / botas de trekking</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Protector solar, gorra y repelente (preferible biodegradable)</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Bolsa estanca para cámara/móvil y actitud curiosa</span>
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
                                <span class="text-text-secondary text-sm">Nivel físico moderado para senderos y humedad</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Respeto por la fauna y normas de parques (no alimentar, no tocar)</span>
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
                Respira la esencia de Costa Rica.
                Aventúrate por bosques nubosos, playas salvajes y pueblos con alma tica en una experiencia personalizada creada por UKIYO.
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