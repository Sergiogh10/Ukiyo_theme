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
// Detectar si estamos en la front-page o en la página de viajes de autor
$use_transparent_header = is_front_page() || is_page_template('page-viajesautor.php') || is_page_template('page-pricing.php') || is_page_template('page-experiences.php');
?>

<?php if ($use_transparent_header) : ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const header = document.getElementById('site-header');
    const navLinks = header.querySelectorAll('.nav-link');
    const logo = document.getElementById('site-logo');
    const ctaButton = header.querySelector('.btn-secondary');

    function updateHeaderOnScroll() {
      const isScrolled = window.scrollY > 50;

      if (isScrolled) {
        // ---- Estado SCROLLED ----
        header.classList.remove('bg-transparent', 'border-transparent');
        header.classList.add('bg-background/90', 'backdrop-blur-md', 'border-b', 'border-surface', 'scrolled');

        // Links oscuros
        navLinks.forEach(link => {
          link.classList.remove('text-white');
          link.classList.add('text-text-secondary');
          // Habilitar hover quitando el estilo inline
          link.style.pointerEvents = '';
        });

        // CTA Button - borde y texto oscuro
        if (ctaButton) {
          ctaButton.style.borderColor = 'rgb(246, 207, 102)'; // text-secondary color
          ctaButton.style.color = 'rgb(107 114 128)'; // text-secondary color
        }

        // LOGO oscuro / original
        logo.src = "<?php echo get_template_directory_uri(); ?>/images/logo/logoukiyo.png";

      } else {
        // ---- Estado TOP ----
        header.classList.add('bg-transparent', 'border-transparent');
        header.classList.remove('bg-background/90', 'backdrop-blur-md', 'border-b', 'border-surface', 'scrolled');

        // Links blancos
        navLinks.forEach(link => {
          link.classList.remove('text-text-secondary');
          link.classList.add('text-white');
          // Deshabilitar hover visual con CSS
          link.style.pointerEvents = 'auto';
        });

        // CTA Button - borde y texto blanco
        if (ctaButton) {
          ctaButton.style.borderColor = 'white';
          ctaButton.style.color = 'white';
        }

        // LOGO blanco
        logo.src = "<?php echo get_template_directory_uri(); ?>/images/logo/logoblanconuevo.png";
      }
    }

    updateHeaderOnScroll();
    window.addEventListener('scroll', updateHeaderOnScroll);
  });
</script>
<style>
  /* Deshabilitar hover en estado TOP (sin scrolled) */
  #site-header:not(.scrolled) .nav-link:hover {
    color: white !important;
    font-weight: inherit !important;
  }
</style>
<?php endif; ?>


<body <?php body_class('bg-background text-text-primary'); ?>>
<?php wp_body_open(); ?>

<!-- Navigation Header -->
<header id="site-header" class="fixed top-0 w-full z-50 <?php echo $use_transparent_header ? 'bg-transparent border-transparent' : 'bg-background/90 backdrop-blur-md border-b border-surface'; ?> transition-all duration-300">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img 
                        id="site-logo"
                        src="<?php echo get_template_directory_uri(); ?>/images/logo/<?php echo $use_transparent_header ? 'logoblanconuevo.png' : 'logoukiyo.png'; ?>"
                        alt="<?php bloginfo('name'); ?> Logo"
                        class="h-8 md:h-10 lg:h-12 w-auto transition-all duration-300"
                    />
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="<?php echo esc_url( home_url('/') ); ?>" 
                    class="nav-link <?php echo $use_transparent_header ? 'text-lg' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Inicio</a>

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" 
                    class="nav-link <?php echo $use_transparent_header ? 'text-lg' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Destinos</a>

              <!-- <a href="<?php echo esc_url( get_permalink( get_page_by_path('guias') ) ); ?>" 
                   class="nav-link <?php echo $use_transparent_header ? 'text-lg' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Guías</a> -->

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('pricing') ) ); ?>" 
                   class="nav-link <?php echo $use_transparent_header ? 'text-lg' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Precios</a>

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" 
                   class="nav-link <?php echo $use_transparent_header ? 'text-lg' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Viajes de autor</a>

              <!--  <a href="<?php echo esc_url( site_url('/sustainability') ); ?>" 
                   class="nav-link <?php echo $use_transparent_header ? 'text-lg' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Sostenibilidad</a> -->

                <a href="<?php echo esc_url( get_permalink( get_page_by_path('nosotros') ) ); ?>"  
                   class="nav-link <?php echo $use_transparent_header ? 'text-lg' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Nosotros</a>
                
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>"  
                   class="nav-link <?php echo $use_transparent_header ? 'text-lg' : 'text-text-secondary'; ?> hover:text-primary transition-colors duration-300">Reseñas</a>
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
                <a href="<?php echo esc_url( home_url('/') ); ?>" class="text-primary-900 font-semibold hover:text-primary transition-colors">Inicio</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" class="text-gray-800 hover:text-primary transition-colors">Destinos</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('pricing') ) ); ?>" class="text-gray-800 hover:text-primary transition-colors">Precios</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" class="text-gray-800 hover:text-primary transition-colors">Viajes de autor</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('nosotros') ) ); ?>" class="text-gray-800 hover:text-primary transition-colors">Nosotros</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" class="text-gray-800 hover:text-primary transition-colors">Reseñas</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" 
                   class="btn-secondary mt-4 inline-block text-center">Planifica tu Viaje</a>
            </div>
        </div>
    </nav>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Mobile menu script loaded');
    
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const header = document.getElementById('site-header');
    const logo = document.getElementById('site-logo');
    
    console.log('Mobile button:', mobileBtn);
    console.log('Mobile menu:', mobileMenu);
    
    if (mobileBtn && mobileMenu) {
        console.log('Adding click listener to mobile button');
        
        mobileBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Mobile button clicked!');
            
            // Check if menu is currently visible by checking our inline style
            const isCurrentlyVisible = mobileMenu.style.display === 'block';
            
            console.log('Is currently visible:', isCurrentlyVisible);
            
            if (!isCurrentlyVisible) {
                // OPEN MENU
                console.log('Opening menu');
                mobileMenu.classList.remove('hidden');
                mobileMenu.style.display = 'block';
                mobileMenu.style.opacity = '1';
                
                // Ensure solid background for readability
                header.classList.remove('bg-transparent', 'border-transparent');
                header.classList.add('bg-background/90', 'backdrop-blur-md', 'border-b', 'border-surface');
                
                // Ensure logo is DARK
                if (logo) logo.src = "<?php echo get_template_directory_uri(); ?>/images/logo/logoukiyo.png";
                
            } else {
                // CLOSE MENU
                console.log('Closing menu');
                mobileMenu.classList.add('hidden');
                mobileMenu.style.display = 'none';
                mobileMenu.style.opacity = '0';
                
                // Restore header state based on page and scroll position
                // Usamos la variable PHP que ya definimos arriba
                const useTransparentHeader = <?php echo $use_transparent_header ? 'true' : 'false'; ?>;
                const isScrolled = window.scrollY > 50;
                
                if (useTransparentHeader && !isScrolled) {
                    // Front page or transparent header page at top: transparent
                    header.classList.add('bg-transparent', 'border-transparent');
                    header.classList.remove('bg-background/90', 'backdrop-blur-md', 'border-b', 'border-surface');
                    if (logo) logo.src = "<?php echo get_template_directory_uri(); ?>/images/logo/logoblanconuevo.png";
                } else {
                    // Scrolled or normal page: solid
                    header.classList.remove('bg-transparent', 'border-transparent');
                    header.classList.add('bg-background/90', 'backdrop-blur-md', 'border-b', 'border-surface');
                    if (logo) logo.src = "<?php echo get_template_directory_uri(); ?>/images/logo/logoukiyo.png";
                }
            }
        });
    } else {
        console.error('Mobile menu elements not found!');
    }
});
</script>