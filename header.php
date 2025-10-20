<?php
/**
 * Header global de UKIYO
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-background text-text-primary'); ?>>
<?php wp_body_open(); ?>

<!-- Navigation Header -->
<header class="fixed top-0 w-full z-50 bg-background/90 backdrop-blur-md border-b border-surface">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo/logoukiyo.png"
                         alt="<?php bloginfo('name'); ?> Logo"
                         class="h-8 md:h-10 lg:h-12 w-auto" />
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="<?php echo esc_url( home_url('/') ); ?>" 
                    class="text-text-secondary hover:text-primary transition-colors duration-300">Inicio</a>

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" 
                    class="text-text-secondary hover:text-primary transition-colors duration-300">Destinos</a>

              <!-- <a href="<?php echo esc_url( get_permalink( get_page_by_path('guias') ) ); ?>" 
                   class="text-text-secondary hover:text-primary transition-colors duration-300">Guías</a> -->

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('pricing') ) ); ?>" 
                   class="text-text-secondary hover:text-primary transition-colors duration-300">Precios</a>

              <!--  <a href="<?php echo esc_url( site_url('/sustainability') ); ?>" 
                   class="text-text-secondary hover:text-primary transition-colors duration-300">Sostenibilidad</a> -->

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('nosotros') ) ); ?>"  
                   class="text-text-secondary hover:text-primary transition-colors duration-300">Nosotros</a>
                
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>"  
                   class="text-text-secondary hover:text-primary transition-colors duration-300">Reseñas</a>
            </div>

            <!-- CTA Button -->
            <div class="hidden lg:block">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>"
                   class="btn-primary">Planifica tu Viaje</a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden p-2" id="mobile-menu-btn">
                <svg class="w-6 h-6 text-text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div class="lg:hidden hidden mt-4 pb-4 border-t border-surface" id="mobile-menu">
            <div class="flex flex-col space-y-4 mt-4">
                <a href="<?php echo esc_url( home_url('/') ); ?>" class="text-primary font-medium">Inicio</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" class="text-text-secondary">Destinos</a>
               <!-- <a href="<?php echo esc_url( get_permalink( get_page_by_path('guias') ) ); ?>" class="text-text-secondary">Guías</a> -->
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('pricing') ) ); ?>" class="text-text-secondary">Precios</a>
               <!-- <a href="<?php echo esc_url( site_url('/sustainability') ); ?>" class="text-text-secondary">Sostenibilidad</a> -->
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('nosotros') ) ); ?>" class="text-text-secondary">Nosotros</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" class="text-text-secondary">Reseñas</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" 
                   class="btn-primary mt-4 inline-block text-center">Planifica tu Viaje</a>
            </div>
        </div>
    </nav>
</header>