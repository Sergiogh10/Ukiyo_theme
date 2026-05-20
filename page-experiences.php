<?php
/**
 * Template Name: Experiencias
 * Página de experiencias de UKIYO
 */
get_header();
?>

<!-- HERO -->
<style>
  .hero-experiences { height: 100vh; }
  @media (min-width: 1024px) {
    .hero-experiences { height: auto !important; min-height: 50vh !important; }
  }
</style>
  <section class="hero-experiences relative flex items-center justify-center overflow-hidden pt-32 pb-16">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full">
      <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-islas.jpg" 
           alt="Viajes de autor" 
           class="w-full h-full object-cover mask-image" 
           loading="eager"
           fetchpriority="high"
           decoding="async" />
      <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
    </div>

    <!-- Contenido Hero - Centrado -->
    <div class="relative z-10 w-full">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
          <?php
          ukiyo_render_breadcrumbs([
              'class'      => 'mb-6 justify-center text-white/80',
              'link_class' => 'text-white/80 hover:text-white transition-colors',
          ]);
          ?>
          <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">
            Premium
          </span>
          <h1 class="text-hero md:text-6xl lg:text-hero font-rowdies text-white mb-6 text-shadow">
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

<!-- Destination Cards -->
<style>
    .ukiyo-dest-card {
        position: relative;
        width: 100%;
        height: 500px;
        border-radius: 1.5rem;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.4s cubic-bezier(.25,.46,.45,.94), box-shadow 0.4s ease;
        display: block;
    }
    .ukiyo-dest-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.35);
    }
    .ukiyo-dest-card img.ukiyo-dest-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s cubic-bezier(.25,.46,.45,.94);
    }
    .ukiyo-dest-card:hover img.ukiyo-dest-bg {
        transform: scale(1.08);
    }
    .ukiyo-dest-card .ukiyo-dest-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0.75) 100%);
        transition: background 0.4s ease;
    }
    .ukiyo-dest-card:hover .ukiyo-dest-overlay {
        background: linear-gradient(to bottom, rgba(0,0,0,0.05) 0%, rgba(0,0,0,0.85) 100%);
    }
    .ukiyo-dest-card .ukiyo-dest-content {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 2rem;
        text-align: center;
        transition: transform 0.3s ease;
    }
    .ukiyo-dest-card:hover .ukiyo-dest-content {
        transform: translateY(-8px);
    }
    .ukiyo-dest-card .ukiyo-dest-tag {
        color: #FF8C42;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        margin-bottom: 0.5rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        opacity: 1;
        transform: translateY(0);
    }
    .ukiyo-dest-card .ukiyo-dest-title {
        font-family: 'Rowdies', sans-serif;
        font-size: 2rem;
        color: white;
        font-weight: 600;
        margin-bottom: 0;
        transition: margin-bottom 0.3s ease;
    }
    .ukiyo-dest-card:hover .ukiyo-dest-title {
        margin-bottom: 0.75rem;
    }
    .ukiyo-dest-card .ukiyo-dest-desc {
        color: rgba(255,255,255,0.85);
        line-height: 1.6;
        font-size: 15px;
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transition: max-height 0.5s ease, opacity 0.4s ease 0.1s;
    }
    .ukiyo-dest-card:hover .ukiyo-dest-desc {
        max-height: 120px;
        opacity: 1;
    }
    .ukiyo-dest-card .ukiyo-dest-arrow {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-top: 1rem;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,0.4);
        color: white;
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.4s ease 0.15s, transform 0.4s ease 0.15s, border-color 0.3s ease, background-color 0.3s ease;
    }
    .ukiyo-dest-card:hover .ukiyo-dest-arrow {
        opacity: 1;
        transform: translateY(0);
    }
    .ukiyo-dest-card .ukiyo-dest-arrow:hover {
        background-color: var(--color-primary, #FF8C42);
        border-color: var(--color-primary, #FF8C42);
    }
    /* Section divider */
    .ukiyo-section-divider {
        width: 60px;
        height: 4px;
        background: var(--color-primary, #FF8C42);
        border-radius: 2px;
        margin: 1.25rem auto 0;
    }

    @media (max-width: 767px) {
        .ukiyo-dest-card {
            height: 400px;
        }
        .ukiyo-dest-card .ukiyo-dest-tag {
            opacity: 1;
            transform: translateY(0);
        }
        .ukiyo-dest-card .ukiyo-dest-desc {
            max-height: 120px;
            opacity: 1;
        }
        .ukiyo-dest-card .ukiyo-dest-arrow {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<?php
// ── Data arrays ──
$countries_internacionales = [
    [
        'id' => 'indonesia',
        'name' => 'Indonesia',
        'tagline' => 'Tierra de dioses',
        'description' => 'Templos milenarios, arrozales infinitos y fondos marinos que quitan el aliento. Un viaje que transforma.',
        'image' => '/images/indonesia/viajes-a-indonesia-personalizados-nusa-penida.jpg',
        'link' => get_permalink( get_page_by_path('viajes-a-medida-indonesia') )
    ],
    [
        'id' => 'costarica',
        'name' => 'Costa Rica',
        'tagline' => 'Biodiversidad pura',
        'description' => 'Selvas infinitas, volcanes activos y playas vírgenes bañadas por dos océanos. Pura vida en estado puro.',
        'image' => '/images/costarica/viajes-a-costa-rica-personalizados-rio-celeste.jpg',
        'link' => get_permalink( get_page_by_path('viajes-a-medida-costa-rica') )
    ],
    [
        'id' => 'colombia',
        'name' => 'Colombia',
        'tagline' => 'Alegría que se queda',
        'description' => 'Ciudades coloniales, selva amazónica y costas caribeñas. Un país que abraza y no suelta.',
        'image' => '/images/destination-mood/viajes-a-colombia-personalizados-cartagena-ciudad-amurallada.jpg',
        'link' => get_permalink( get_page_by_path('viajes-a-medida-colombia') )
    ],
    [
        'id' => 'marruecos',
        'name' => 'Marruecos',
        'tagline' => 'Encrucijada de culturas',
        'description' => 'Medinas laberínticas, desierto del Sahara y montañas del Atlas. Donde África y Europa se dan la mano.',
        'image' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-aitbenhaddou.jpg',
        'link' => get_permalink( get_page_by_path('viajes-a-medida-marruecos') )
    ]
];

$destinos_nacionales = [
    [
        'id' => 'lanzarote',
        'name' => 'Lanzarote',
        'tagline' => 'Volcanes y océano',
        'description' => 'Paisajes lunares, playas de arena negra y la huella de Manrique. Una isla que parece otro planeta.',
        'image' => '/images/spain/lanzarote/Hervideros_Lanzarote.webp',
        'link' => get_permalink( get_page_by_path('viajes-a-medida-lanzarote') )
    ]
];

$destinos_europeos = [
    [
        'id' => 'italia',
        'name' => 'Italia',
        'tagline' => 'Dolce vita',
        'description' => 'Arte, gastronomía y pueblos con encanto. La belleza convertida en forma de vida.',
        'image' => '/images/italia/viajes-a-italia-personalizados-dolomitas.webp',
        'link' => get_page_by_path('viajes-a-medida-italia')
            ? get_permalink( get_page_by_path('viajes-a-medida-italia') )
            : home_url('/viajes-a-medida-italia/')
    ]
];

// ── Card rendering function ──
function ukiyo_render_dest_card($dest) {
    $imageUrl = get_template_directory_uri() . $dest['image'];
    ?>
    <a href="<?php echo esc_url($dest['link']); ?>" class="ukiyo-dest-card group">
        <img 
            src="<?php echo esc_url($imageUrl); ?>"
            alt="<?php echo esc_attr($dest['name']); ?>"
            class="ukiyo-dest-bg"
            loading="lazy"
        />
        <div class="ukiyo-dest-overlay"></div>
        <div class="ukiyo-dest-content">
            <div class="ukiyo-dest-tag">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
                <?php echo esc_html($dest['tagline']); ?>
            </div>
            <h3 class="ukiyo-dest-title"><?php echo esc_html($dest['name']); ?></h3>
            <p class="ukiyo-dest-desc"><?php echo esc_html($dest['description']); ?></p>
            <span class="ukiyo-dest-arrow">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"/>
                    <path d="m12 5 7 7-7 7"/>
                </svg>
            </span>
        </div>
    </a>
    <?php
}
?>

<!-- ═══════════════════════════════════════════════ -->
<!-- SECCIÓN 1: DESTINOS INTERNACIONALES UKIYO       -->
<!-- ═══════════════════════════════════════════════ -->
<section class="py-20 bg-background">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-full text-sm font-satoshi font-semibold mb-4 tracking-wide uppercase">Aventura Global</span>
            <h2 class="text-display font-rowdies text-text-primary mb-4">
                Destinos <span class="text-primary">Internacionales</span>
            </h2>
            <p class="text-text-secondary max-w-2xl mx-auto">Lugares que conocemos profundamente y que han marcado nuestra historia. Selecciona un destino para descubrir su esencia y ver una propuesta de viaje diseñada para conectar.</p>
            <div class="ukiyo-section-divider mt-6"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($countries_internacionales as $dest): ?>
                <?php ukiyo_render_dest_card($dest); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════ -->
<!-- SECCIÓN 2: DESTINOS NACIONALES                   -->
<!-- ═══════════════════════════════════════════════ -->
<section class="py-20 bg-surface-light dark:bg-surface-dark">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-secondary/10 text-secondary rounded-full text-sm font-satoshi font-semibold mb-4 tracking-wide uppercase">España</span>
            <h2 class="text-display font-rowdies text-text-primary mb-4">
                Destinos <span class="text-secondary">Nacionales</span>
            </h2>
            <p class="text-text-secondary max-w-2xl mx-auto">No hace falta cruzar el océano para vivir algo extraordinario. España esconde rincones que merecen ser descubiertos con otra mirada.</p>
            <div class="ukiyo-section-divider mt-6" style="background: var(--color-secondary, #2E4057);"></div>
        </div>

        <div class="max-w-md mx-auto">
            <?php foreach ($destinos_nacionales as $dest): ?>
                <?php ukiyo_render_dest_card($dest); ?>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-12">
            <p class="text-text-secondary italic text-sm">Próximamente más destinos nacionales · ¿Tienes un destino en mente? <a href="https://wa.me/message/CS2LNI6YHSETO1" target="_blank" class="text-primary hover:underline font-medium">Cuéntanoslo</a></p>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════ -->
<!-- SECCIÓN 3: DESTINOS EUROPEOS                     -->
<!-- ═══════════════════════════════════════════════ -->
<section class="py-20 bg-background">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-full text-sm font-satoshi font-semibold mb-4 tracking-wide uppercase">Europa</span>
            <h2 class="text-display font-rowdies text-text-primary mb-4">
                Destinos <span class="text-primary">Europeos</span>
            </h2>
            <p class="text-text-secondary max-w-2xl mx-auto">Europa vista desde otra perspectiva. Itinerarios diseñados para viajeros que buscan profundidad, no solo turismo.</p>
            <div class="ukiyo-section-divider mt-6"></div>
        </div>

        <div class="max-w-md mx-auto">
            <?php foreach ($destinos_europeos as $dest): ?>
                <?php ukiyo_render_dest_card($dest); ?>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-12">
            <p class="text-text-secondary italic text-sm">Nuevos destinos europeos en preparación · <a href="https://wa.me/message/CS2LNI6YHSETO1" target="_blank" class="text-primary hover:underline font-medium">Solicita información</a></p>
        </div>
    </div>
</section>

    <!-- CTA FINAL -->
    <section class="py-12 bg-background text-text-secondary">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-display font-rowdies mb-6 reveal-on-scroll">
                    ¿No encuentras tu viaje ideal?
                </h2>
                <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Cada persona viaja a su manera.
                    Cuéntanos qué te mueve y crearemos juntos una experiencia que encaje contigo.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center reveal-on-scroll delay-200">
                    <a href="https://wa.me/message/CS2LNI6YHSETO1" target="_blank" class="btn-primary text-text-secondary flex items-center gap-2">
                        <img width="64" height="64" src="https://img.icons8.com/cotton/64/whatsapp--v4.png" alt="Contactar con Viajes Ukiyo por WhatsApp" class="w-6 h-6"/>
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
      { name: 'Costa Rica', lat: 9.7489,  lng: -83.7534, url: '<?php echo esc_url( get_permalink( get_page_by_path("viajes-a-medida-costa-rica") ) ); ?>' },
      { name: 'Colombia',   lat: 4.7110,  lng: -74.0721, url: '<?php echo esc_url( get_permalink( get_page_by_path("viajes-a-medida-colombia") ) ); ?>' },
      { name: 'Indonesia',  lat: -6.1754, lng: 106.8272, url: '<?php echo esc_url( get_permalink( get_page_by_path("viajes-a-medida-indonesia") ) ); ?>' },
      { name: 'Marruecos',  lat: 31.6295, lng: -7.9811,  url: '<?php echo esc_url( get_permalink( get_page_by_path("viajes-a-medida-marruecos") ) ); ?>' }
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
