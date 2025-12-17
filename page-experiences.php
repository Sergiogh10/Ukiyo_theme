<?php
/**
 * Template Name: Experiencias
 * Página de experiencias de UKIYO
 */
get_header();
?>

<!-- HERO -->
  <section class="relative flex items-center justify-center overflow-hidden" style="min-height: 50vh; padding-top: 8rem; padding-bottom: 4rem;">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full">
      <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-islas.jpg" 
           alt="Viajes de autor" 
           class="w-full h-full object-cover mask-image" 
           loading="eager" />
      <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
    </div>

    <!-- Contenido Hero - Centrado -->
    <div class="relative z-10 w-full">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
          <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">
            Premium
          </span>
          <h1 class="text-hero md:text-6xl lg:text-hero font-satoshi text-white mb-6 text-shadow">
            El viaje de tu <span class="text-accent-300">vida</span>
          </h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
          Descubre los destinos que ya conocemos profundamente, para poderte organizar un viaje de ensueño 
          </p>
        </div>
      </div>
    </div>
  </section>

<!-- Interactive Map 
<section class="mb-12" aria-labelledby="map-title">
  <h2 id="map-title" class="sr-only">Mapa de destinos</h2>
  <div id="map" class="w-full h-[480px] rounded-2xl shadow-lg ring-1 ring-border/60"></div>
</section> -->

<!-- Experience Cards Grid -->
<!-- Curated Destinations Accordion -->
<style>
    /* Critical styles for Accordion visibility without Tailwind build */
    .ukiyo-accordion-container {
        display: flex;
        flex-direction: column;
        gap: 0;
        width: 100%;
        height: auto;
    }
    .ukiyo-accordion-card {
        position: relative;
        flex: 1;
        height: 300px; /* Mobile height */
        border-radius: 0; /* Default no radius for continuity */
        overflow: hidden;
        cursor: pointer;
        transition: all 0.5s ease-in-out;
        display: flex;
        align-items: flex-end; /* Align content to bottom */
        box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1); /* shadow-xl */
    }

    /* Mobile: Top corners for first, Bottom corners for last */
    .ukiyo-accordion-card:first-child {
        border-radius: 1rem 1rem 0 0;
    }
    .ukiyo-accordion-card:last-child {
        border-radius: 0 0 1rem 1rem;
    }
    
    @media (min-width: 1024px) {
        .ukiyo-accordion-container {
            flex-direction: row;
            height: 600px; /* Desktop fixed height */
        }
        .ukiyo-accordion-card {
            height: auto; /* Stretch to fill container */
        }
        .ukiyo-accordion-card:hover {
            flex-grow: 3; /* Expand on hover */
        }

        /* Desktop: Left corners for first, Right corners for last */
        .ukiyo-accordion-card {
            border-radius: 0; /* Reset for desktop switch */
        }
        
        /* Prevent text wrapping/squashing by enforcing min-width on the text container */
        .ukiyo-accordion-card .absolute.p-8 {
            min-width: 400px;
        }

        .ukiyo-accordion-card:first-child {
            border-radius: 1rem 0 0 1rem;
        }
        .ukiyo-accordion-card:last-child {
            border-radius: 0 1rem 1rem 0;
        }
    }
    
    /* Overlay transition */
    .ukiyo-overlay {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.4);
        transition: background-color 0.5s ease;
    }
    .ukiyo-accordion-card:hover .ukiyo-overlay {
        background-color: rgba(0, 0, 0, 0);
    }
</style>

  <section class="py-20 bg-background">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-display font-satoshi text-text-primary mb-4">
          Destinos <span class="text-primary">UKIYO</span>
        </h2>
        <p class="text-text-secondary max-w-2xl mx-auto">Lugares que conocemos profundamente y que han marcado nuestra historia. Selecciona un destino para descubrir su esencia y ver una propuesta de viaje diseñada para conectar.</p>
      </div>

    <!-- Horizontal Accordion Layout -->
    <div class="ukiyo-accordion-container">
        <?php
        $countries = [
            [
                'id' => 'indonesia',
                'name' => 'Indonesia',
                'tagline' => 'Tierra de dioses',
                'image' => '/images/indonesia/viajes-a-indonesia-personalizados-nusa-penida.jpg',
                'link' => get_permalink( get_page_by_path('indonesia') )
            ],
            [
                'id' => 'costarica',
                'name' => 'Costa Rica',
                'tagline' => 'Biodiversidad pura',
                'image' => '/images/costarica/viajes-a-costa-rica-personalizados-rio-celeste.jpg',
                'link' => get_permalink( get_page_by_path('costarica') )
            ],
            [
                'id' => 'colombia',
                'name' => 'Colombia',
                'tagline' => 'Alegría que se queda',
                'image' => '/images/destination-mood/viajes-a-colombia-personalizados-cartagena-ciudad-amurallada.jpg',
                'link' => get_permalink( get_page_by_path('colombia') )
            ],
            [
                'id' => 'marruecos',
                'name' => 'Marruecos',
                'tagline' => 'Encrucijada de culturas',
                'image' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-aitbenhaddou.jpg',
                'link' => get_permalink( get_page_by_path('marruecos') )
            ]
        ];

        foreach ($countries as $country): 
        ?>
            <a 
                href="<?php echo esc_url($country['link']); ?>"
                class="ukiyo-accordion-card group ring-1 ring-slate-900/5 block"
            >
                <!-- Background Image -->
                <img 
                    src="<?php echo get_template_directory_uri() . $country['image']; ?>" 
                    alt="<?php echo esc_attr($country['name']); ?>"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />
                
                <!-- Overlays -->
                <div class="ukiyo-overlay"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 lg:opacity-60 lg:group-hover:opacity-80 transition-opacity duration-300"></div>

                <!-- Text Content -->
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 p-8 flex flex-col justify-end items-center text-center">
                    <div class="transform transition-all duration-300 translate-y-0 w-full flex flex-col items-center">

                        <!-- Title (Always visible) -->
                        <h3 style="font-size: 2rem; margin-bottom: 0px; color: white; font-weight: 600; line-height: 1.1;" class="transition-all duration-300 group-hover:mb-3 whitespace-nowrap">
                            <?php echo esc_html($country['name']); ?>
                        </h3>

                        <!-- Description & Button (Hidden by default, expands down on hover) -->
                        <div class="max-h-0 opacity-0 group-hover:max-h-[200px] group-hover:opacity-100 transition-all duration-500 ease-out overflow-hidden">
                            <p style="color: rgba(255,255,255,0.8); line-height: 1.6; font-size: 15px; margin-bottom: 1rem;">
                                <?php echo esc_html($country['tagline']); ?>. Descubre los secretos de <?php echo esc_html($country['name']); ?> con un itinerario personalizado.
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>

    <!-- CTA FINAL -->
    <section class="py-20 bg-background text-text-secondary">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-display font-satoshi mb-6 reveal-on-scroll">
                    ¿No encuentras tu viaje ideal?
                </h2>
                <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Cada persona viaja a su manera.
                    Cuéntanos qué te mueve y crearemos juntos una experiencia que encaje contigo.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center reveal-on-scroll delay-200">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="btn-primary text-text-secondary">
                        Cuéntanos tu idea
                    </a>
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" class="btn-primary text-text-secondary">
                        Explora nuestros viajes
                    </a>
                </div>
            </div>
        </div>
    </section>
<style>
/* Accesibilidad: clase sr-only por si Tailwind la purgó */
.sr-only{
  position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;
  clip:rect(0,0,0,0);white-space:nowrap;border:0;
}
/* Fallback de altura del mapa (si Tailwind purga h-[480px]) */
#map{ min-height:480px; }

@media (prefers-reduced-motion: reduce) {
  .group:hover img { transform: none !important; transition: none !important; }
}
</style>

<!-- <script>
(function(){
  function initUkiyoMap(){
    var el = document.getElementById('map');
    if (!el) return;

    // Fallback de altura por si Tailwind purga h-[480px]
    if (getComputedStyle(el).height === '0px') el.style.minHeight = '480px';

    // Si Leaflet no está cargado, salir pero dejando el contenedor visible
    if (typeof L === 'undefined') {
      console.warn('[UKIYO] Leaflet no está disponible. Revisa el enqueue en functions.php.');
      return;
    }

    // Si ya es un contenedor Leaflet, no reiniciar
    if (el.classList.contains('leaflet-container')) return;

    var map = L.map(el, { scrollWheelZoom: false, tap: true });

    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
      attribution: '&copy; OpenStreetMap, &copy; CARTO'
    }).addTo(map);

    var puntos = [
      { name: 'Costa Rica', lat: 9.7489,  lng: -83.7534, url: '<?php echo esc_url( get_permalink( get_page_by_path("costarica") ) ); ?>' },
      { name: 'Colombia',   lat: 4.7110,  lng: -74.0721, url: '<?php echo esc_url( get_permalink( get_page_by_path("colombia") ) ); ?>' },
      { name: 'Indonesia',  lat: -6.1754, lng: 106.8272, url: '<?php echo esc_url( get_permalink( get_page_by_path("indonesia") ) ); ?>' },
      { name: 'Marruecos',  lat: 31.6295, lng: -7.9811,  url: '<?php echo esc_url( get_permalink( get_page_by_path("marruecos") ) ); ?>' }
    ];

    var markers = puntos.map(function(p){
      var m = L.marker([p.lat, p.lng]).addTo(map).bindPopup(p.name);
      m.on('click', function(){ window.location.href = p.url; });
      return m;
    });

    var group = new L.featureGroup(markers);
    map.fitBounds(group.getBounds().pad(0.4));

    el.setAttribute('tabindex','0');
    el.setAttribute('role','region');
    el.setAttribute('aria-label','Mapa interactivo de destinos UKIYO');
  }

  // Ejecutar una sola vez cuando todo ha cargado
  if (document.readyState === 'complete') {
    initUkiyoMap();
  } else {
    window.addEventListener('load', initUkiyoMap, { once: true });
  }
})();
</script> -->

<?php get_footer(); ?>
