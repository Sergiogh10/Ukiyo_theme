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

<?php
// Detectar si estamos en la front-page
$is_front_page = is_front_page();
?>

<?php if ($is_front_page) : ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const header = document.getElementById('site-header');
    const navLinks = header.querySelectorAll('.nav-link');
    const logo = document.getElementById('site-logo');

    function updateHeaderOnScroll() {
      const isScrolled = window.scrollY > 50;

      if (isScrolled) {
        // ---- Estado SCROLLED ----
        header.classList.remove('bg-transparent', 'border-transparent');
        header.classList.add('bg-background/90', 'backdrop-blur-md', 'border-b', 'border-surface');

        // Links oscuros
        navLinks.forEach(link => {
          link.classList.remove('text-white');
          link.classList.add('text-text-secondary');
        });

        // LOGO oscuro / original
        logo.src = "<?php echo get_template_directory_uri(); ?>/images/logo/logoukiyo.png";

      } else {
        // ---- Estado TOP ----
        header.classList.add('bg-transparent', 'border-transparent');
        header.classList.remove('bg-background/90', 'backdrop-blur-md', 'border-b', 'border-surface');

        // Links blancos
        navLinks.forEach(link => {
          link.classList.remove('text-text-secondary');
          link.classList.add('text-white');
        });

        // LOGO blanco
        logo.src = "<?php echo get_template_directory_uri(); ?>/images/logo/logoblanconuevo.png";
      }
    }

    updateHeaderOnScroll();
    window.addEventListener('scroll', updateHeaderOnScroll);
  });
</script>
<?php endif; ?>


<body <?php body_class('bg-background text-text-primary'); ?>>
<?php wp_body_open(); ?>

<!-- Navigation Header -->
<header id="site-header" class="fixed top-0 w-full z-50 <?php echo $is_front_page ? 'bg-transparent border-transparent' : 'bg-background/90 backdrop-blur-md border-b border-surface'; ?> transition-all duration-300">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img 
                        id="site-logo"
                        src="<?php echo get_template_directory_uri(); ?>/images/logo/<?php echo $is_front_page ? 'logoblanconuevo.png' : 'logoukiyo.png'; ?>"
                        alt="<?php bloginfo('name'); ?> Logo"
                        class="h-8 md:h-10 lg:h-12 w-auto transition-all duration-300"
                    />
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="<?php echo esc_url( home_url('/') ); ?>" 
                    class="nav-link <?php echo $is_front_page ? 'text-white' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Inicio</a>

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" 
                    class="nav-link <?php echo $is_front_page ? 'text-white' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Destinos</a>

              <!-- <a href="<?php echo esc_url( get_permalink( get_page_by_path('guias') ) ); ?>" 
                   class="nav-link <?php echo $is_front_page ? 'text-white' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Guías</a> -->

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('pricing') ) ); ?>" 
                   class="nav-link <?php echo $is_front_page ? 'text-white' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Precios</a>

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" 
                   class="nav-link <?php echo $is_front_page ? 'text-white' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Viajes de autor</a>

              <!--  <a href="<?php echo esc_url( site_url('/sustainability') ); ?>" 
                   class="nav-link <?php echo $is_front_page ? 'text-white' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Sostenibilidad</a> -->

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('nosotros') ) ); ?>"  
                   class="nav-link <?php echo $is_front_page ? 'text-white' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Nosotros</a>
                
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>"  
                   class="nav-link <?php echo $is_front_page ? 'text-white' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Reseñas</a>
            </div>

            <!-- CTA Button -->
            <div class="hidden lg:block">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>"
                   class="btn-secondary">Planifica tu Viaje</a>
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
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" class="text-text-secondary">Viajes de autor</a>
               <!-- <a href="<?php echo esc_url( site_url('/sustainability') ); ?>" class="text-text-secondary">Sostenibilidad</a> -->
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('nosotros') ) ); ?>" class="text-text-secondary">Nosotros</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" class="text-text-secondary">Reseñas</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" 
                   class="btn-primary mt-4 inline-block text-center">Planifica tu Viaje</a>
            </div>
        </div>
    </nav>
</header>