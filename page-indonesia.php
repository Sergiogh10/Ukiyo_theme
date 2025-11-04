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
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">JAVA</h1>
                                <p class="mb-6"> Cuando la mayoría piensa en Indonesia, imagina Bali. Pero si te alejas solo un poco, cruzando el estrecho, te espera Java, una isla que late con la fuerza del fuego y la calma de los templos. Aquí no vienes a desconectar… vienes a sentir. </p>
                                <p>Java es donde todo empieza: los volcanes más imponentes del país, las ciudades coloniales que conservan el alma de Indonesia y una espiritualidad tan presente que se respira en cada amanecer entre arrozales.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">JAVA</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Monte Bromo:</strong> Taller de tejido de bambú sostenible</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Ijen:</strong> Creación de ofrendas ceremoniales</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Prambanan:</strong> Intercambio cultural con la comunidad</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Borobudur:</strong> Intercambio cultural con la comunidad</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/guides/viajes-a-indonesia-personalizados-monte-bromo.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
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
                                src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-bali.jpg"
                                alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo"
                                class="w-full h-full object-cover mask-right"
                                loading="lazy"
                                onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;"
                            />
                        </div>

                        <!-- Texto a la derecha -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">BALI</h1>
                                <p class="mb-6"> Cuando la mayoría piensa en Indonesia, imagina Bali. Pero si te alejas solo un poco, cruzando el estrecho, te espera Java, una isla que late con la fuerza del fuego y la calma de los templos. Aquí no vienes a desconectar… vienes a sentir. </p>
                                <p>Java es donde todo empieza: los volcanes más imponentes del país, las ciudades coloniales que conservan el alma de Indonesia y una espiritualidad tan presente que se respira en cada amanecer entre arrozales.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">JAVA</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Monte Bromo:</strong> Taller de tejido de bambú sostenible</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Ijen:</strong> Creación de ofrendas ceremoniales</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Prambanan:</strong> Intercambio cultural con la comunidad</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Borobudur:</strong> Intercambio cultural con la comunidad</span>
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
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">NUSA PENIDA</h1>
                                <p class="mb-6"> Cuando la mayoría piensa en Indonesia, imagina Bali. Pero si te alejas solo un poco, cruzando el estrecho, te espera Java, una isla que late con la fuerza del fuego y la calma de los templos. Aquí no vienes a desconectar… vienes a sentir. </p>
                                <p>Java es donde todo empieza: los volcanes más imponentes del país, las ciudades coloniales que conservan el alma de Indonesia y una espiritualidad tan presente que se respira en cada amanecer entre arrozales.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">JAVA</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Monte Bromo:</strong> Taller de tejido de bambú sostenible</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Ijen:</strong> Creación de ofrendas ceremoniales</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Prambanan:</strong> Intercambio cultural con la comunidad</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Borobudur:</strong> Intercambio cultural con la comunidad</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-kilingkin.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
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
                                src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-nusa-penida.jpg"
                                alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo"
                                class="w-full h-full object-cover mask-right"
                                loading="lazy"
                                onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;"
                            />
                        </div>

                        <!-- Texto a la derecha -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">FLORES</h1>
                                <p class="mb-6"> Cuando la mayoría piensa en Indonesia, imagina Bali. Pero si te alejas solo un poco, cruzando el estrecho, te espera Java, una isla que late con la fuerza del fuego y la calma de los templos. Aquí no vienes a desconectar… vienes a sentir. </p>
                                <p>Java es donde todo empieza: los volcanes más imponentes del país, las ciudades coloniales que conservan el alma de Indonesia y una espiritualidad tan presente que se respira en cada amanecer entre arrozales.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">JAVA</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Monte Bromo:</strong> Taller de tejido de bambú sostenible</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Ijen:</strong> Creación de ofrendas ceremoniales</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Prambanan:</strong> Intercambio cultural con la comunidad</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Borobudur:</strong> Intercambio cultural con la comunidad</span>
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
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">LOMBOK</h1>
                                <p class="mb-6"> Cuando la mayoría piensa en Indonesia, imagina Bali. Pero si te alejas solo un poco, cruzando el estrecho, te espera Java, una isla que late con la fuerza del fuego y la calma de los templos. Aquí no vienes a desconectar… vienes a sentir. </p>
                                <p>Java es donde todo empieza: los volcanes más imponentes del país, las ciudades coloniales que conservan el alma de Indonesia y una espiritualidad tan presente que se respira en cada amanecer entre arrozales.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">JAVA</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Monte Bromo:</strong> Taller de tejido de bambú sostenible</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Ijen:</strong> Creación de ofrendas ceremoniales</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Prambanan:</strong> Intercambio cultural con la comunidad</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Borobudur:</strong> Intercambio cultural con la comunidad</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-lombok-volcan-batur.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
                            <div class="absolute"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Day 6 -->

            <div class="mb-12">
                <div class="bg-white/90 border border-surface/40 rounded-2xl overflow-hidden shadow-soft">
                    <div class="grid lg:grid-cols-2 gap-8 items-stretch">
                        
                        <!-- Imagen a la izquierda -->
                        <div class="relative min-h-[280px] lg:min-h-full overflow-hidden">
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-raja-ampat.jpg"
                                alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo"
                                class="w-full h-full object-cover mask-right"
                                loading="lazy"
                                onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;"
                            />
                        </div>

                        <!-- Texto a la derecha -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">RAJA AMPAT</h1>
                                <p class="mb-6"> Cuando la mayoría piensa en Indonesia, imagina Bali. Pero si te alejas solo un poco, cruzando el estrecho, te espera Java, una isla que late con la fuerza del fuego y la calma de los templos. Aquí no vienes a desconectar… vienes a sentir. </p>
                                <p>Java es donde todo empieza: los volcanes más imponentes del país, las ciudades coloniales que conservan el alma de Indonesia y una espiritualidad tan presente que se respira en cada amanecer entre arrozales.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">JAVA</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Monte Bromo:</strong> Taller de tejido de bambú sostenible</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Ijen:</strong> Creación de ofrendas ceremoniales</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Prambanan:</strong> Intercambio cultural con la comunidad</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Borobudur:</strong> Intercambio cultural con la comunidad</span>
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