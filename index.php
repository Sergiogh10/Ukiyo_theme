<?php get_header(); ?>

<main id="site-content">

    <!-- Hero Section with Video Background -->
    <section class="relative h-screen overflow-hidden">
        <!-- Video Background -->
        <div class="absolute inset-0 w-full h-full">
            <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3" 
                 alt="Artesano tradicional trabajando" 
                 class="w-full h-full object-cover" 
                 loading="lazy" 
                 onerror="this.src='https://images.pexels.com/photos/1450360/pexels-photo-1450360.jpeg?auto=compress&cs=tinysrgb&w=2940&h=1960&dpr=2'; this.onerror=null;" />
            <div class="absolute inset-0 bg-gradient-to-r from-primary-900/70 via-primary-800/50 to-transparent"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 h-full flex items-center">
            <div class="container mx-auto px-6">
                <div class="max-w-3xl">
                    <h1 class="text-hero font-crimson text-white mb-6 text-shadow-soft animate-fade-in">
                        Vive la esencia,<br />
                        <span class="text-accent-300">no la rutina</span>
                    </h1>
                    <p class="text-xl text-white/90 mb-8 max-w-2xl leading-relaxed animate-slide-up">
                        Descubre el lujo de la emoción a través de experiencias transformadoras que conectan tu alma con culturas auténticas y aventuras sostenibles.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 animate-slide-up">
                        <a href="<?php echo home_url('/planifica-tu-viaje'); ?>" class="btn-primary text-lg px-8 py-4">
                            Comienza tu Transformación
                        </a>
                        <a href="<?php echo home_url('/resenas'); ?>" class="bg-white/20 backdrop-blur-sm text-white px-8 py-4 rounded-lg font-semibold hover:bg-white/30 transition-all duration-300">
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
                <h2 class="text-display font-crimson text-text-primary mb-4">
                    Explora por <span class="text-primary">Emociones</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    Cada viaje es una historia personal. Descubre experiencias organizadas por los sentimientos que despiertan en tu alma.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Transformación Cultural -->
                <div class="group cursor-pointer" onclick="window.location.href='<?php echo home_url('/planifica-tu-viaje'); ?>'">
                    ...
                </div>

                <!-- Aventuras Sostenibles -->
                <div class="group cursor-pointer" onclick="window.location.href='<?php echo home_url('/sustainability_commitment'); ?>'">
                    ...
                </div>

                <!-- Experiencias Ocultas -->
                <div class="group cursor-pointer" onclick="window.location.href='<?php echo home_url('/planifica-tu-viaje'); ?>'">
                    ...
                </div>

                <!-- Tu Viaje Soñado -->
                <div class="group cursor-pointer" onclick="window.location.href='<?php echo home_url('/planifica-tu-viaje'); ?>'">
                    ...
                </div>
            </div>
        </div>
    </section>

    <!-- Destination Mood Boards -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            ...
            <!-- Aquí igual, sustituyes los href='planifica-tu-viaje.html' por home_url('/planifica-tu-viaje') -->
        </div>
    </section>

    <!-- Traveler Story Carousel -->
    <section class="py-20 bg-surface">
        <div class="container mx-auto px-6">
            ...
            <a href="<?php echo home_url('/resenas'); ?>" class="btn-secondary">Leer Más Historias</a>
            ...
        </div>
    </section>

    <!-- Journey Builder CTA -->
    <section class="py-20 bg-gradient-primary text-white">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-display font-crimson mb-6">
                    Tu Transformación Comienza Aquí
                </h2>
                <p class="text-xl mb-8 opacity-90">
                    Cada gran viaje comienza con un sueño. Permítenos ayudarte a convertir ese sueño en una experiencia que cambiará tu perspectiva del mundo.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo home_url('/planifica-tu-viaje'); ?>" class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 transition-all duration-300 shadow-soft">
                        Diseña tu Experiencia
                    </a>
                    <a href="<?php echo home_url('/about_ukiyo'); ?>" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300">
                        Conoce UKIYO
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>