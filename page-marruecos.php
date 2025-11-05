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
                    <span class="badge-elevada">Desierto</span>
                    <span class="badge-elevada">Cultura y hospitalidad</span>
                    <span class="badge-elevada">Aventura y calma</span>
                </div>
                <div class="hero-overlay-box">
                    <h1 class="text-4xl lg:text-6xl font-rowdies text-white mb-4 pl-4">
                    MARRUECOS: <br>
                    <span class="text-accent">Desierto y tradición</span>
                    </h1>
                    <p class="text-xl text-white/90 max-w-3xl pl-4">
                Desde las montañas del Atlas hasta las dunas infinitas de Merzouga, Marruecos despierta los sentidos.  
                Una tierra donde la calma del desierto se entrelaza con la energía de las medinas y el aroma del té a la menta.                </p>
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
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">MARRAKECH</h1>
                                <p class="mb-6">Marrakech vibra con el color de sus zocos, el sonido de la plaza Jemaa el-Fna y la calma escondida de sus riads. Es la puerta de entrada perfecta a Marruecos: intensa, acogedora y llena de belleza.</p>
                                <p>Te llevaremos por sus jardines, palacios y medina para que descubras la parte más auténtica de la ciudad, con paradas en talleres de artesanos, terrazas con vistas al Atlas y gastronomía local.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">MARRAKECH</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary"><strong>Medina histórica:</strong> callejuelas, zocos y vida local.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary"><strong>Palacios y jardines:</strong> Bahía, Majorelle y rincones secretos.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary"><strong>Gastronomía local:</strong> cena en riad o terraza al atardecer.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary"><strong>Experiencia sensorial:</strong> té a la menta, especias y artesanía.</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
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
                                src="<?php echo get_template_directory_uri(); ?>/images/marruecos/viajes-personalizados-ukiyo-marruecos-fez.jpg"
                                alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo"
                                class="w-full h-full object-cover mask-right"
                                loading="lazy"
                                onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;"
                            />
                        </div>

                        <!-- Texto a la derecha -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">FEZ</h1>
                                <p class="mb-6">Fez es la ciudad más tradicional de Marruecos, un lugar donde la vida sigue en su ritmo de hace siglos. Su medina es un laberinto declarado Patrimonio de la Humanidad.</p>
                                <p>Te proponemos recorrerla con guía local para entender sus tenerías, sus escuelas coránicas, los oficios antiguos y la vida cotidiana de sus habitantes.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">FEZ</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary"><strong>Medina de Fez el-Bali:</strong> la más grande y auténtica del país.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary"><strong>Tenerías tradicionales:</strong> proceso de cuero único.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Artesanía y cerámica azul de Fez.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Gastronomía clásica marroquí en restaurante local.</span>
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
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">MERZOUGA</h1>
                                <p class="mb-6">Merzouga es el punto de encuentro con el Sáhara: dunas doradas, silencio absoluto y cielos estrellados. Aquí el viaje se vuelve más lento y profundo.</p>
                                <p>Incluimos la experiencia completa de desierto: dromedario al atardecer, noche en haima bereber, música local y salida de sol sobre las dunas.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">MERZOUGA</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Ruta en dromedario al atardecer.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Noche en campamento del desierto.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Amanecer en las dunas de Erg Chebbi.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Recorrido 4x4 por aldeas y oasis.</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/marruecos/viajes-personalizados-ukiyo-marruecos-merzouga.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
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
                                src="<?php echo get_template_directory_uri(); ?>/images/marruecos/viajes-personalizados-ukiyo-marruecos-aitbenhaddou.jpg"
                                alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo"
                                class="w-full h-full object-cover mask-right"
                                loading="lazy"
                                onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;"
                            />
                        </div>

                        <!-- Texto a la derecha -->
                        <div class="p-6 lg:p-10 flex flex-col justify-between gap-6">
                            <div>
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">AIT BEN HADDOU</h1>
                                <p class="mb-6">Aït Ben Haddou es uno de los ksar más bonitos de Marruecos, escenario de películas y paso histórico de caravanas. Es perfecto para conocer la arquitectura de barro del sur.</p>
                                <p>Te proponemos recorrerlo con calma, descubrir sus miradores y combinarlo con el valle de Ouarzazate y el Alto Atlas.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">AIT BEN HADDOU</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Visita guiada al ksar (UNESCO).</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Miradores con vistas al valle y al Atlas.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Paradas fotográficas en la ruta del sur.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Cultura bereber y set de cine.</span>
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
                                <h1 class="text-display font-rowdies text-text-primary tracking-tight mb-2">RISSANI</h1>
                                <p class="mb-6">Rissani es la antigua capital caravanera del Tafilalet y hoy sigue siendo un mercado vivo donde se mezcla la gente del desierto.</p>
                                <p>Es una parada ideal para conocer el Marruecos más auténtico: palmerales, kasbahs de adobe y comercio tradicional.</p>
                                <div class="h-px w-12 bg-text-secondary/30 mb-6"></div>
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Trip detail -->
                                    <div>
                                        <h4 class="text-sm font-semibold tracking-wide text-text-primary mb-3 uppercase">¿QUÉ NOS OFRECE <span class="text-primary">RISSANI</span>?</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Mercado tradicional de Rissani.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Palmerales y kasbahs de adobe.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Encuentro con familias locales.</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-text-secondary">Historia caravanera del sur de Marruecos.</span>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/images/marruecos/viajes-personalizados-ukiyo-marruecos-rissani.jpg" alt="Monte Bromo al amanecer en un viaje a Indonesia personalizado con Ukiyo" class="w-full h-full mask-left" loading="lazy" onerror="this.src='https://images.pexels.com/photos/1051075/pexels-photo-1051075.jpeg'; this.onerror=null;" />
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
                Datos prácticos para preparar tu viaje a Marruecos con tranquilidad.
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
                <p class="text-text-secondary text-sm">Dirham marroquí (MAD). Se puede cambiar en destino o sacar en cajeros. En zonas turísticas se acepta a veces EUR.</p>
            </div>

            <!-- Hora local -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Hora local</h3>
                <p class="text-text-secondary text-sm">Normalmente es -1 h respecto a España (península). En algunos periodos puede coincidir la hora.</p>
            </div>

            <!-- Mejor época -->
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l1.664 9.148A2 2 0 006.64 18h10.72a2 2 0 001.976-1.852L21 7M5 7h14M9 11v4m6-4v4" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Mejor época</h3>
                <p class="text-text-secondary text-sm">Primavera (mar–may) y otoño (sep–nov) para combinar ciudad y desierto sin calor extremo.</p>
            </div>

            <!-- Entrada al país -->
            <div class="text-center">
                <div class="w-16 h-16 bg-primary-100 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.657-1.343 3-3 3H5l-2 2V5a2 2 0 012-2h6a2 2 0 012 2v4zm0 0h2a2 2 0 012 2v1m-2 4l2 2 4-4" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Entrada al país</h3>
                <p class="text-text-secondary text-sm">Para españoles: hasta 90 días sin visado. Pasaporte con validez y alojamiento/contacto de entrada.</p>
            </div>

            <!-- Electricidad -->
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Electricidad</h3>
                <p class="text-text-secondary text-sm">220V y enchufe tipo C/E (igual que en España). No suele hacer falta adaptador.</p>
            </div>

            <!-- Cultura y vestimenta -->
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 text-accent rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .843-3 1.882 0 1.04 1.343 1.882 3 1.882s3 .843 3 1.882C15 14.843 13.657 15 12 15m0-7a4 4 0 110 8 4 4 0 010-8zm0 11v2m0-18v2" />
                    </svg>
                </div>
                <h3 class="text-lg font-crimson text-text-primary mb-2">Cultura y respeto</h3>
                <p class="text-text-secondary text-sm">País mayoritariamente musulmán. Se recomienda vestir de forma respetuosa y pedir permiso para fotografiar.</p>
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