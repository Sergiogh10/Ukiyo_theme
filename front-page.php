<?php
/**
 * Template: Front Page (Inicio)
 * Muestra la homepage estática de UKIYO
 */
get_header(); ?>

<main>

    <!-- Hero Section with Video Background -->
    <section class="relative h-screen overflow-hidden">
        <!-- Video Background -->
        <div class="absolute inset-0 w-full h-full">
            <img src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-personalizados-ukiyo-portada.jpg" 
                 alt="Artesano tradicional trabajando" 
                 class="w-full h-full object-cover" loading="lazy"
                 onerror="this.src='https://images.pexels.com/photos/1450360/pexels-photo-1450360.jpeg?auto=compress&cs=tinysrgb&w=2940&h=1960&dpr=2'; this.onerror=null;" />
            <div class="absolute inset-0 bg-gradient-to-r from-primary-900/70 via-primary-800/50 to-transparent"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 h-full flex items-center">
            <div class="container mx-auto px-6">
                <div class="max-w-3xl">
                    <h1 class="text-hero font-satoshi text-white mb-6 text-shadow-soft animate-fade-in">
                        Queremos que tu viaje,<br />
                        <span class="text-accent-300">te mueva por dentro</span>
                    </h1>
                    <p class="text-xl text-white/90 mb-8 max-w-2xl leading-relaxed animate-slide-up">
                        Creamos viajes personales, lejos del turismo masivo.
                        Experiencias auténticas, sostenibles y pensadas al detalle para que vivas el viaje, no solo lo hagas.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 animate-slide-up">
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="btn-primary text-lg px-8 py-4">
                            Diseña tu aventura
                        </a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" class="bg-white/20 backdrop-blur-sm text-white px-8 py-4 rounded-lg font-semibold hover:bg-white/30 transition-all duration-300">
                            Historias de Viajeros
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white/70 animate-bounce">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    <!-- Emotion-Based Navigation -->
    <section class="py-20 bg-gradient-warm">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-display font-satoshi text-text-primary mb-4">
                    Explora a través de las <span class="text-primary">emociones</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    Cada destino despierta algo distinto.
En algunos lugares el tiempo se detiene, en otros el corazón late más rápido.
Elige lo que quieres sentir y deja que el viaje haga el resto.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Transformación Cultural -->
                <div class="group cursor-pointer" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('indonesia') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-personalizados-ukiyo-artesano-balines.jpg"
                            alt="Artesano balinés trabajando en un taller local"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Transformación cultural</h3>
                            <p class="text-white/80 text-sm">Tradiciones vivas, templos, ceremonias y una espiritualidad en el aire.
Viajar aquí no es ver otra cultura, es dejar que te cambie un poco la tuya.</p>
                        </div>
                    </div>
                </div>

                <!-- Aventuras Sostenibles -->
                <div class="group cursor-pointer" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('costarica') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-personalizados-ukiyo-guacamayo.jpg"
                            alt="Guacamayo observado en la selva tropical durante un viaje personalizado con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-secondary-900/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Renovación natural</h3>
                            <p class="text-white/80 text-sm">Selvas, volcanes y mares donde la naturaleza te devuelve la calma.
Aquí se respira lento. Aquí todo vuelve a su sitio.</p>
                        </div>
                    </div>
                </div>

                <!-- Experiencias Ocultas -->
               <div class="group cursor-pointer" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('colombia') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/emotion-based/viajes-personalizados-ukiyo-palanquera.jpg"
                            alt="Palanquera en Cartagena de Indias durante un viaje personalizado a Colombia con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-accent-900/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Alegría vibrante</h3>
                            <p class="text-white/80 text-sm">Colores, ritmos y gente que te saluda como si te conociera de siempre.
Colombia no se visita, se vive bailando.</p>
                        </div>
                    </div>
                </div>

                <!-- Tu Viaje Soñado -->
                <div class="group cursor-pointer" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('marruecos') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/marruecos/viajes-personalizados-ukiyo-camello-marruecos.jpg"
                            alt="Camello en el desierto de Merzouga durante un viaje personalizado a Marruecos con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-700/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Misterio sensorial</h3>
                            <p class="text-white/80 text-sm">Desiertos que hipnotizan, calles que huelen a especias y sonidos que te atrapan.
Marruecos es una aventura que se siente con los cinco sentidos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Destination Mood Boards -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-display font-satoshi text-text-primary mb-4">
                    Elige tu manera de <span class="text-secondary">viajar</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    No todos viajamos igual.
Por eso diseñamos tu experiencia a medida: fiel a tu ritmo, tus ganas y tu forma de sentir el mundo.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Despertar Espiritual -->
                <div class="card group cursor-pointer hover:shadow-card-hover" onclick="window.location.href='<?php echo esc_url( site_url('/experiences') ); ?>'">
                    <div class="relative overflow-hidden rounded-lg mb-6 aspect-video">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-a-medida-ukiyo-aventurero-bali.jpg"
                            alt="Viajero explorando los arrozales de Bali en un viaje de aventura personalizado con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy" />
                    </div>
                    <h3 class="text-xl font-satoshi text-text-primary mb-3">Aventura y naturaleza</h3>
                    <p class="text-text-secondary mb-4">
Selvas, volcanes, océanos y caminos que te devuelven al origen.
Para quienes buscan sentir la tierra bajo los pies y la libertad en cada paso.                    </p>
                    <div class="flex items-center text-primary font-medium">
                        <span>Explorar experiencias</span>
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>

                <!-- Conexión Auténtica -->
                <div class="card group cursor-pointer hover:shadow-card-hover" onclick="window.location.href='<?php echo esc_url( site_url('/experiences') ); ?>'">
                    <div class="relative overflow-hidden rounded-lg mb-6 aspect-video">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-a-medida-ukiyo-anciana-indonesia.jpg"
                            alt="Anciana indonesia sonriendo en un mercado local durante un viaje cultural con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy" />
                    </div>
                    <h3 class="text-xl font-satoshi text-text-primary mb-3">Cultura y Tradición</h3>
                    <p class="text-text-secondary mb-4">
Conversaciones con artesanos, aromas de mercados y templos que cuentan historias.
Para quienes viajan para comprender, no solo para mirar.                    </p>
                    <div class="flex items-center text-primary font-medium">
                        <span>Explorar experiencias</span>
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>

                <!-- Lujo Consciente -->
                <div class="card group cursor-pointer hover:shadow-card-hover" onclick="window.location.href='<?php echo esc_url( site_url('/sustainability') ); ?>'">
                    <div class="relative overflow-hidden rounded-lg mb-6 aspect-video">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-a-medida-ukiyo-pareja-acantilado.jpg"
                            alt="Pareja contemplando un acantilado en un viaje romántico personalizado con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy" />
                    </div>
                    <h3 class="text-xl font-satoshi text-text-primary mb-3">Sueño en pareja</h3>
                    <p class="text-text-secondary mb-4">
Experiencias pensadas para compartir sin prisa: cenas bajo las estrellas, templos al amanecer, lugares que se vuelven recuerdos.
Porque algunos viajes se viven mejor compartiéndolos con tu persona favorita.                    </p>
                    <div class="flex items-center text-primary font-medium">
                        <span>Explorar experiencias</span>
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Traveler Story Carousel -->
    <section class="py-20 bg-surface">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-display font-satoshi text-text-primary mb-4">
                    Historias que <span class="text-accent">dejan huella</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    Cada viaje con UKIYO se convierte en algo más que una ruta: es una historia personal, llena de momentos que se quedan contigo.

Descubre las experiencias de quienes ya viajaron con nosotros.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Story Content -->
                <div class="order-2 lg:order-1">
                    <div class="mb-8">
                        <blockquote class="text-xl font-satoshi text-text-primary mb-6 leading-relaxed">
                            “Mi viaje a Indonesia con UKIYO no fue solo turismo, fue descubrir el país de verdad. Recorrer los arrozales de Ubud, nadar con mantas raya oceánicas y ver el amanecer en las islas de Komodo. Sin duda, el viaje de mi vida.”
                        </blockquote>
                        <div class="flex items-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/travellers/sergio.jpg"
                                alt="Sergio García-Heras"
                                class="w-12 h-12 rounded-full object-cover mr-4"
                                loading="lazy" />
                            <div>
                                <p class="font-semibold text-text-primary">Sergio García-Heras</p>
                                <p class="text-text-secondary text-sm">Madrid</p>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" class="btn-secondary">Leer Más Historias</a>
                </div>

                <!-- Story Image -->
                <div class="order-1 lg:order-2">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/3]">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/travellers/experiencias-reales-ukiyo-isla-padar.jpg"
                            alt="Isla Padar vista desde el mirador durante un viaje personalizado por Indonesia con Ukiyo"
                            class="w-full h-full object-cover"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/30 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Builder CTA -->
    <section class="py-20 bg-gradient-primary text-white">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-display font-satoshi mb-6">
                    Tu aventura empieza aquí
                </h2>
                <p class="text-xl mb-8 opacity-90">
Todo gran viaje nace de una idea, una emoción o una simple curiosidad.
Cuéntanos qué te mueve y diseñaremos una experiencia que te haga sentir el mundo de verdad.                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300">
                        Diseña tu aventura
                    </a>
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path('nosotros') ) ); ?>" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300">
                        Conoce UKIYO
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>