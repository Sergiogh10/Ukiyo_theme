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
              <span class="badge-elevada">Biodiversidad</span>
              <span class="badge-elevada">Inmersión cultural</span>
              <span class="badge-elevada">Aventura y paraíso</span>
            </div>
            <div class="hero-overlay-box">
              <h1 class="text-4xl lg:text-6xl font-rowdies text-white mb-4 pl-4">
                INDONESIA: <br>
                <span class="text-accent">Tierra de dioses</span>
              </h1>
              <p class="text-xl text-white/90 max-w-3xl pl-4">
                Una travesía entre templos sagrados, arrozales infinitos y tradiciones vivas.
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
                                <p class="mb-6">Java es el corazón de Indonesia, una isla donde los volcanes se mezclan con templos milenarios y ciudades vibrantes. Un lugar donde cada amanecer parece encender la tierra y cada sonrisa te conecta con la esencia del país.</p>
                                <p>Desde los templos de Borobudur y Prambanan hasta el Monte Bromo, Java combina naturaleza, espiritualidad y cultura en un mismo viaje.</p>
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
                                        <span class="text-text-secondary"><strong>Monte Bromo:</strong> Amanecer entre nubes y volcanes activos.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Templo de Borobudur:</strong> Patrimonio de la Humanidad y símbolo del budismo.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Templo de Prambanan:</strong> Arte hindú entre campos de arroz.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Yogyakarta:</strong> Cultura, arte y vida local.</span>
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
                                <p class="mb-6">Bali es la isla de los dioses: una mezcla perfecta entre cultura, espiritualidad y paisajes naturales. Desde los arrozales de Ubud hasta los templos frente al mar, todo en Bali invita a la calma y a la conexión.</p>
                                <p>Su energía especial se siente en cada ceremonia, en los olores del incienso y en la hospitalidad balinesa que hace que el tiempo se detenga.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">BALI</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Ubud:</strong> Arrozales, talleres de artesanía y templos escondidos.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Tanah Lot:</strong> Puestas de sol sobre el mar.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Tirta Empul:</strong> Ritual de purificación en aguas sagradas.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Cultura balinesa:</strong> Danzas, ofrendas y tradiciones vivas.</span>
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
                                <p class="mb-6">A tan solo media hora en barco desde Bali, Nusa Penida ofrece una naturaleza salvaje y acantilados impresionantes. Es el lugar donde el azul del mar parece no tener fin.</p>
                                <p>Un paraíso para quienes buscan aventura, playas vírgenes y puntos de buceo con mantarrayas.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">NUSA PENIDA</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Kelingking Beach:</strong> Icono natural de Indonesia.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Crystal Bay:</strong> Snorkel entre corales y peces tropicales.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Broken Beach:</strong> Arco de piedra sobre el mar turquesa.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Buceo con mantarrayas:</strong> Experiencia inolvidable.</span>
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
                                <p class="mb-6">Flores es la Indonesia más auténtica, una isla donde las montañas, la selva y las aldeas tradicionales se mezclan con playas de arena rosa y un ritmo de vida pausado.</p>
                                <p>Desde aquí parten los barcos hacia el Parque Nacional de Komodo, hogar del mítico dragón.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">FLORES</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Parque Nacional de Komodo:</strong> Navegación entre islas y fauna salvaje.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Isla de Padar:</strong> Amanecer panorámico.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Playa Rosa:</strong> Arena rosada y aguas cristalinas.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Pueblos locales:</strong> Cultura, tradiciones y hospitalidad.</span>
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
                                <p class="mb-6">Lombok conserva la esencia tranquila que Bali perdió hace años. Es un destino de playas paradisíacas, arrozales y aldeas donde la vida se mueve al ritmo del sol.</p>
                                <p>Ideal para descansar, practicar surf o adentrarse en el Monte Rinjani, uno de los volcanes más impresionantes de Indonesia.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">LOMBOK</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Monte Rinjani:</strong> Trekking y vistas sobre el cráter.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Gili Islands:</strong> Playas sin coches y ambiente relajado.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Kuta Lombok:</strong> Surf y playas salvajes.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Pueblos sasak:</strong> Cultura tradicional de la isla.</span>
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
                                <p class="mb-6">Raja Ampat es el último paraíso de Indonesia, un archipiélago remoto donde el mar es tan transparente que parece irreal. Es un sueño para los amantes del buceo y la naturaleza intacta.</p>
                                <p>Sus más de 1.500 islas son hogar de una biodiversidad marina sin igual, donde la conexión con la naturaleza es total.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">RAJA AMPAT</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Buceo y snorkel:</strong> Arrecifes coralinos y fauna marina única.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Piaynemo:</strong> Vistas de islas verdes sobre aguas turquesas.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Kayak entre islas:</strong> Navega entre manglares y lagunas.</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-text-secondary"><strong>Contacto local:</strong> Comunidades papúes y su cultura.</span>
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
                Información <span class="text-accent">de interés</span>
            </h2>
            <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                Datos prácticos para organizar tu viaje por Indonesia con tranquilidad.
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
                <p class="text-text-secondary text-sm">Rupia indonesia (IDR). Es habitual pagar en efectivo, pero en zonas turísticas se acepta tarjeta. Recomendable llevar algo de efectivo al inicio.</p>
            </div>

            <!-- Hora local -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Hora local</h3>
                <p class="text-text-secondary text-sm">Indonesia tiene varios husos. Bali y Java suelen estar a +7 h respecto a España (península) cuando España está en invierno, y +6 h cuando España está en verano.</p>
            </div>

            <!-- Mejor época -->
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l1.664 9.148A2 2 0 006.64 18h10.72a2 2 0 001.976-1.852L21 7M5 7h14M9 11v4m6-4v4" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Mejor época</h3>
                <p class="text-text-secondary text-sm">La temporada seca suele ir de abril a septiembre. De octubre a marzo hay más lluvia, pero menos gente y paisajes más verdes.</p>
            </div>

            <!-- Visado -->
            <div class="text-center">
                <div class="w-16 h-16 bg-primary-100 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.657-1.343 3-3 3H5l-2 2V5a2 2 0 012-2h6a2 2 0 012 2v4zm0 0h2a2 2 0 012 2v1m-2 4l2 2 4-4" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Entrada al país</h3>
                <p class="text-text-secondary text-sm">Para españoles suele ser posible el visado "on arrival" (VOA) para estancias cortas. Pasaporte con validez mínima de 6 meses y billete de salida.</p>
            </div>

            <!-- Electricidad -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Electricidad</h3>
                <p class="text-text-secondary text-sm">220V y enchufe tipo C/F (igual que en España) en la mayoría de zonas. Normalmente no hace falta adaptador.</p>
            </div>

            <!-- Salud y cultura -->
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .843-3 1.882 0 1.04 1.343 1.882 3 1.882s3 .843 3 1.882C15 14.843 13.657 15 12 15m0-7a4 4 0 110 8 4 4 0 010-8zm0 11v2m0-18v2" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Salud y respeto</h3>
                <p class="text-text-secondary text-sm">Seguro de viaje recomendado. En templos balineses se requiere ropa que cubra hombros y piernas.</p>
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