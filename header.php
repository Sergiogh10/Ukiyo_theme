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
$use_transparent_header = is_front_page() 
    || is_page_template('page-viajesautor.php') 
    || is_page_template('page-pricing.php') 
    || is_page_template('page-experiences.php') 
    || is_page_template('page-reviews2.php') 
    || is_page_template('page-about.php') 
    || is_page_template('page-costarica.php') 
    || is_page_template('page-colombia.php') 
    || is_page_template('page-marruecos.php') 
    || is_page_template('page-indonesia.php') 
    || is_page_template('page-formautor.php') 
    || is_page_template('page-planifica-tu-viaje.php') 
    || is_page_template('home.php') 
    || is_singular('post') 
    || is_singular('viaje_autor')
    || ( function_exists('ukiyo_portal_is_trip_request') && ukiyo_portal_is_trip_request() )
    || ( function_exists('ukiyo_portal_is_proposal_request') && ukiyo_portal_is_proposal_request() );

$destinations_url = ukiyo_get_route_url('destinations');
$pricing_url      = ukiyo_get_route_url('pricing');
$viajes_autor_url = ukiyo_get_route_url('viajes_autor');
$about_url        = ukiyo_get_route_url('about');
$reviews_url      = ukiyo_get_route_url('reviews');
$blog_url         = ukiyo_get_route_url('blog');
$plan_trip_url    = ukiyo_get_route_url('plan_trip');
$is_blog_section  = is_home() || is_singular('post') || is_category() || is_tag() || is_author() || is_date();
$current_lang     = function_exists( 'pll_current_language' ) ? pll_current_language() : 'es';
$is_en            = 'en' === $current_lang;
$home_url         = ukiyo_get_home_url();
$nav_labels       = $is_en
    ? [
        'home'          => 'Home',
        'destinations'  => 'Destinations',
        'pricing'       => 'Prices',
        'viajes_autor'  => 'Signature trips',
        'blog'          => 'Blog',
        'about'         => 'About',
        'reviews'       => 'Reviews',
        'plan_trip'     => 'Plan your trip',
        'menu'          => 'Menu',
    ]
    : [
        'home'          => 'Inicio',
        'destinations'  => 'Destinos',
        'pricing'       => 'Precios',
        'viajes_autor'  => 'Viajes de autor',
        'blog'          => 'Blog',
        'about'         => 'Nosotros',
        'reviews'       => 'Reseñas',
        'plan_trip'     => 'Planifica tu Viaje',
        'menu'          => 'Menu',
    ];
// Logo size unificado en todo el sitio. La variante anterior para blog
// (h-7 md:h-8 lg:h-9) usaba clases no compiladas en main.css → el logo se
// renderizaba a tamaño natural. Mantenemos las clases que ya están en el build.
$logo_size_class  = 'h-8 md:h-10 lg:h-12';

$language_switcher = '';
if ( function_exists( 'pll_the_languages' ) ) {
    $languages = pll_the_languages(
        [
            'raw'                    => 1,
            'hide_if_empty'          => 0,
            'hide_if_no_translation' => 0,
        ]
    );

    if ( is_array( $languages ) && count( $languages ) > 1 ) {
        // Estilo "pill switcher" del Claude Design (Destino-Costa-Rica.html).
        // Una píldora con dos botones (ES / EN) y un fondo blanco que se desliza
        // hacia el idioma activo. Adaptado a Polylang: los botones son <a>
        // con href al idioma, y el slug activo decide la posición del fondo.
        $active_slug = 'es';
        foreach ( $languages as $language ) {
            if ( ! empty( $language['current_lang'] ) ) {
                $active_slug = $language['slug'];
                break;
            }
        }

        $language_switcher .= sprintf(
            '<div class="ukiyo-lang" data-lang="%s" role="group" aria-label="Idioma / Language">',
            esc_attr( $active_slug )
        );
        $language_switcher .= '<span class="ukiyo-lang__pill" aria-hidden="true"></span>';
        foreach ( $languages as $language ) {
            $is_current   = ! empty( $language['current_lang'] );
            $language_url = $language['url'];
            if ( is_front_page() && function_exists( 'pll_home_url' ) && ! empty( $language['slug'] ) ) {
                $language_url = pll_home_url( $language['slug'] );
            }
            $language_switcher .= sprintf(
                '<a class="ukiyo-lang__btn" href="%1$s" hreflang="%2$s" lang="%2$s" data-lang-btn="%3$s" aria-pressed="%4$s">%5$s</a>',
                esc_url( $language_url ),
                esc_attr( $language['locale'] ),
                esc_attr( $language['slug'] ),
                $is_current ? 'true' : 'false',
                esc_html( strtoupper( $language['slug'] ) )
            );
        }
        $language_switcher .= '</div>';
    }
}
?>

<style>
  /* === Language switcher "pill" (Claude Design — Destino-Costa-Rica) === */
  .ukiyo-lang{
    display:inline-flex;align-items:center;
    padding:.25rem;border-radius:999px;position:relative;
    background:rgba(255,255,255,.12);
    border:1px solid rgba(255,255,255,.28);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    font-family:'DM Mono',ui-monospace,monospace;
    transition:background .3s,border-color .3s;
  }
  #site-header.scrolled .ukiyo-lang,
  #site-header:not(.bg-transparent) .ukiyo-lang{
    background:#F5F2ED;
    border-color:#E8E0D2;
  }
  .ukiyo-lang__btn{
    position:relative;z-index:2;
    padding:.4rem .75rem;
    font-size:.7rem;letter-spacing:.14em;font-weight:600;
    color:rgba(255,255,255,.7);
    background:transparent;border:0;cursor:pointer;
    border-radius:999px;text-decoration:none;
    transition:color .25s;
  }
  .ukiyo-lang__btn[aria-pressed="true"]{color:#2C2C2C}
  .ukiyo-lang__btn:not([aria-pressed="true"]):hover{color:#fff}
  #site-header.scrolled .ukiyo-lang__btn,
  #site-header:not(.bg-transparent) .ukiyo-lang__btn{color:#6B6B6B}
  #site-header.scrolled .ukiyo-lang__btn[aria-pressed="true"],
  #site-header:not(.bg-transparent) .ukiyo-lang__btn[aria-pressed="true"]{color:#fff}
  #site-header.scrolled .ukiyo-lang__btn:not([aria-pressed="true"]):hover,
  #site-header:not(.bg-transparent) .ukiyo-lang__btn:not([aria-pressed="true"]):hover{color:#2C2C2C}
  .ukiyo-lang__pill{
    position:absolute;top:.25rem;bottom:.25rem;left:.25rem;
    width:calc(50% - .25rem);background:#fff;border-radius:999px;
    transition:transform .35s cubic-bezier(.4,0,.2,1);
    z-index:1;box-shadow:0 4px 12px -4px rgba(0,0,0,.15);
  }
  #site-header.scrolled .ukiyo-lang__pill,
  #site-header:not(.bg-transparent) .ukiyo-lang__pill{background:#5E6952}
  .ukiyo-lang[data-lang="en"] .ukiyo-lang__pill{transform:translateX(100%)}
  /* En móvil dentro del menú colapsable se ve sobre fondo claro */
  #mobile-menu .ukiyo-lang{background:#F5F2ED;border-color:#E8E0D2}
  #mobile-menu .ukiyo-lang__btn{color:#6B6B6B}
  #mobile-menu .ukiyo-lang__btn[aria-pressed="true"]{color:#fff}
  #mobile-menu .ukiyo-lang__pill{background:#5E6952}
</style>

<?php if ($use_transparent_header) : ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const header = document.getElementById('site-header');
    const navLinks = header.querySelectorAll('.nav-link');
    const logo = document.getElementById('site-logo');
    const ctaButton = header.querySelector('.btn-secondary');

    function updateHeaderOnScroll() {
      const isMobileMenuOpen = header.classList.contains('menu-open');
      const isScrolled = window.scrollY > 50;
      
      if (isScrolled || isMobileMenuOpen) {
        // ---- Estado SCROLLED o MENÚ ABIERTO ----
        header.classList.remove('bg-transparent', 'border-transparent');
        header.classList.add('bg-background/90', 'backdrop-blur-md', 'border-b', 'border-surface', 'scrolled');

        // Links oscuros
        navLinks.forEach(link => {
          link.classList.remove('text-white');
          // Habilitar hover quitando el estilo inline
          link.style.pointerEvents = '';
        });
        
        // Icono menú móvil oscuro
        const mobileIcon = document.querySelector('#mobile-menu-btn svg');
        if (mobileIcon) {
             mobileIcon.classList.remove('text-white');
             mobileIcon.classList.add('text-text-secondary');
        }

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

        // Icono menú móvil blanco
        const mobileIcon = document.querySelector('#mobile-menu-btn svg');
        if (mobileIcon) {
             mobileIcon.classList.remove('text-text-secondary');
             mobileIcon.classList.add('text-white');
        }

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
                <a href="<?php echo esc_url( $home_url ); ?>">
                    <img
                        id="site-logo"
                        src="<?php echo get_template_directory_uri(); ?>/images/logo/<?php echo $use_transparent_header ? 'logoblanconuevo.png' : 'logoukiyo.png'; ?>"
                        alt="<?php bloginfo('name'); ?> Logo"
                        width="160"
                        height="48"
                        decoding="async"
                        fetchpriority="high"
                        class="<?php echo esc_attr( $logo_size_class ); ?> w-auto transition-all duration-300"
                    />
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <?php 
                $active_class = 'font-bold border-b-2 border-current';
                $nav_base_class = $use_transparent_header ? 'text-lg' : 'text-text-secondary';
                ?>

                <a href="<?php echo esc_url( $home_url ); ?>" 
                    class="nav-link <?php echo $nav_base_class; ?> hover:text-primary transition-colors duration-300 <?php echo is_front_page() ? $active_class : ''; ?>"><?php echo esc_html( $nav_labels['home'] ); ?></a>

                <a href="<?php echo esc_url( $destinations_url ); ?>" 
                    class="nav-link <?php echo $nav_base_class; ?> hover:text-primary transition-colors duration-300 <?php echo is_page( array('experiencias', 'destinos') ) || is_page_template('page-experiences.php') ? $active_class : ''; ?>"><?php echo esc_html( $nav_labels['destinations'] ); ?></a>

                <a href="<?php echo esc_url( $pricing_url ); ?>" 
                    class="nav-link <?php echo $nav_base_class; ?> hover:text-primary transition-colors duration-300 <?php echo is_page( array('precios-viajes-a-medida', 'pricing') ) ? $active_class : ''; ?>"><?php echo esc_html( $nav_labels['pricing'] ); ?></a>

                <a href="<?php echo esc_url( $viajes_autor_url ); ?>" 
                    class="nav-link <?php echo $nav_base_class; ?> hover:text-primary transition-colors duration-300 <?php echo is_page('viajes-de-autor') ? $active_class : ''; ?>"><?php echo esc_html( $nav_labels['viajes_autor'] ); ?></a>

                <a href="<?php echo esc_url( $blog_url ); ?>"
                    class="nav-link <?php echo $nav_base_class; ?> hover:text-primary transition-colors duration-300 <?php echo $is_blog_section ? $active_class : ''; ?>"><?php echo esc_html( $nav_labels['blog'] ); ?></a>

                <a href="<?php echo esc_url( $about_url ); ?>"  
                    class="nav-link <?php echo $nav_base_class; ?> hover:text-primary transition-colors duration-300 <?php echo is_page( array('sobre-ukiyo', 'nosotros', 'about-ukiyo') ) ? $active_class : ''; ?>"><?php echo esc_html( $nav_labels['about'] ); ?></a>
                
                <a href="<?php echo esc_url( $reviews_url ); ?>"  
                    class="nav-link <?php echo $nav_base_class; ?> hover:text-primary transition-colors duration-300 <?php echo is_page( array('resenas', 'reseñas', 'reviews') ) ? $active_class : ''; ?>"><?php echo esc_html( $nav_labels['reviews'] ); ?></a>

                <?php echo $language_switcher; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>

            <!-- CTA Button -->
            <div class="hidden lg:block">
                <a href="<?php echo esc_url( $plan_trip_url ); ?>"
                   class="btn-secondary"><?php echo esc_html( $nav_labels['plan_trip'] ); ?></a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden p-2 group" id="mobile-menu-btn" aria-label="<?php echo esc_attr( $nav_labels['menu'] ); ?>">
                <svg class="w-6 h-6 <?php echo $use_transparent_header ? 'text-white' : 'text-text-secondary'; ?> transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div class="lg:hidden hidden mt-4 pb-4 border-t border-surface" id="mobile-menu">
            <div class="flex flex-col space-y-4 mt-4">
                <a href="<?php echo esc_url( $home_url ); ?>" class="<?php echo is_front_page() ? 'text-primary' : 'text-primary-900'; ?> font-semibold hover:text-primary transition-colors"><?php echo esc_html( $nav_labels['home'] ); ?></a>
                <a href="<?php echo esc_url( $destinations_url ); ?>" class="<?php echo is_page( array('experiencias', 'destinos') ) || is_page_template('page-experiences.php') ? 'text-primary font-bold' : 'text-gray-800'; ?> hover:text-primary transition-colors"><?php echo esc_html( $nav_labels['destinations'] ); ?></a>
                <a href="<?php echo esc_url( $pricing_url ); ?>" class="<?php echo is_page( array('precios-viajes-a-medida', 'pricing') ) ? 'text-primary font-bold' : 'text-gray-800'; ?> hover:text-primary transition-colors"><?php echo esc_html( $nav_labels['pricing'] ); ?></a>
                <a href="<?php echo esc_url( $viajes_autor_url ); ?>" class="<?php echo is_page('viajes-de-autor') ? 'text-primary font-bold' : 'text-gray-800'; ?> hover:text-primary transition-colors"><?php echo esc_html( $nav_labels['viajes_autor'] ); ?></a>
                <a href="<?php echo esc_url( $blog_url ); ?>" class="<?php echo $is_blog_section ? 'text-primary font-bold' : 'text-gray-800'; ?> hover:text-primary transition-colors"><?php echo esc_html( $nav_labels['blog'] ); ?></a>
                <a href="<?php echo esc_url( $about_url ); ?>" class="<?php echo is_page( array('sobre-ukiyo', 'nosotros', 'about-ukiyo') ) ? 'text-primary font-bold' : 'text-gray-800'; ?> hover:text-primary transition-colors"><?php echo esc_html( $nav_labels['about'] ); ?></a>
                <a href="<?php echo esc_url( $reviews_url ); ?>" class="<?php echo is_page( array('resenas', 'reseñas', 'reviews') ) ? 'text-primary font-bold' : 'text-gray-800'; ?> hover:text-primary transition-colors"><?php echo esc_html( $nav_labels['reviews'] ); ?></a>
                <?php if ( $language_switcher ) : ?>
                    <div class="pt-2">
                        <?php echo $language_switcher; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                <?php endif; ?>
                <a href="<?php echo esc_url( $plan_trip_url ); ?>" 
                   class="btn-primary mt-4 inline-block text-center text-text-secondary"><?php echo esc_html( $nav_labels['plan_trip'] ); ?></a>
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
                header.classList.add('menu-open');
                
                // Ensure solid background for readability
                header.classList.remove('bg-transparent', 'border-transparent');
                header.classList.add('bg-background/90', 'backdrop-blur-md', 'border-b', 'border-surface');
                
                // Ensure logo is DARK
                if (logo) logo.src = "<?php echo get_template_directory_uri(); ?>/images/logo/logoukiyo.png";
                
                // Icon dark
                const mobileIcon = mobileBtn.querySelector('svg');
                if (mobileIcon) {
                    mobileIcon.classList.remove('text-white');
                    mobileIcon.classList.add('text-text-secondary');
                }
                
            } else {
                // CLOSE MENU
                console.log('Closing menu');
                mobileMenu.classList.add('hidden');
                mobileMenu.style.display = 'none';
                mobileMenu.style.opacity = '0';
                header.classList.remove('menu-open');
                
                // Restore header state based on page and scroll position
                // Usamos la variable PHP que ya definimos arriba
                const useTransparentHeader = <?php echo $use_transparent_header ? 'true' : 'false'; ?>;
                const isScrolled = window.scrollY > 50;
                
                if (useTransparentHeader && !isScrolled) {
                    // Front page or transparent header page at top: transparent
                    header.classList.add('bg-transparent', 'border-transparent');
                    header.classList.remove('bg-background/90', 'backdrop-blur-md', 'border-b', 'border-surface');
                    if (logo) logo.src = "<?php echo get_template_directory_uri(); ?>/images/logo/logoblanconuevo.png";
                    
                    // Icon white
                    const mobileIcon = mobileBtn.querySelector('svg');
                    if (mobileIcon) {
                        mobileIcon.classList.remove('text-text-secondary');
                        mobileIcon.classList.add('text-white');
                    }
                } else {
                    // Scrolled or normal page: solid
                    header.classList.remove('bg-transparent', 'border-transparent');
                    header.classList.add('bg-background/90', 'backdrop-blur-md', 'border-b', 'border-surface');
                    if (logo) logo.src = "<?php echo get_template_directory_uri(); ?>/images/logo/logoukiyo.png";
                    
                    // Icon dark
                    const mobileIcon = mobileBtn.querySelector('svg');
                    if (mobileIcon) {
                        mobileIcon.classList.remove('text-white');
                        mobileIcon.classList.add('text-text-secondary');
                    }
                }
            }
        });
    } else {
        console.error('Mobile menu elements not found!');
    }
});
</script>
