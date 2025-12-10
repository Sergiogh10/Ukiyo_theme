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
      <img src="<?php echo get_template_directory_uri(); ?>/images/heroimages/viajes-autor-ukiyo-indonesiaarrozal.jpg" 
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
          <h2 class="text-hero md:text-6xl lg:text-hero font-satoshi text-white mb-6 text-shadow">
            El viaje de tu <span class="text-accent-300">vida</span>
          </h2>
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
<section class="py-12 bg-background">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Costa Rica -->
            <article class="group relative text-center rounded-2xl overflow-hidden ring-1 ring-border/60 hover:ring-border transition">
              <a href="<?php echo esc_url( get_permalink( get_page_by_path('costarica') ) ); ?>" class="block focus:outline-none focus-visible:ring-2 focus-visible:ring-primary/60 rounded-2xl">
                <figure class="aspect-[16/9] overflow-hidden relative">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-personalizados-por-el-mundo-costa-rica.jpg"
                    alt="Viaje personalizado a Costa Rica con Ukiyo: selva, volcanes y océano"
                    class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-700 ease-out mask-image"
                    loading="lazy" decoding="async" />
                  <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/40 via-black/0 to-black/0"></div>
                </figure>
                <div class="p-6">
                  <h3 class="text-2xl font-rowdies text-text-primary group-hover:text-primary transition">Costa Rica</h3>
                  <p class="mt-2 text-sm text-text-secondary">Selva, volcanes y océano. Pura vida sin prisas.</p>
                </div>
              </a>
            </article>

            <!-- Colombia -->
            <article class="group relative text-center rounded-2xl overflow-hidden ring-1 ring-border/60 hover:ring-border transition">
              <a href="<?php echo esc_url( get_permalink( get_page_by_path('colombia') ) ); ?>" class="block focus:outline-none focus-visible:ring-2 focus-visible:ring-primary/60 rounded-2xl">
                <figure class="aspect-[16/9] overflow-hidden relative">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-personalizados-por-el-mundo-colombia.jpg"
                    alt="Viaje personalizado a Colombia con Ukiyo: Cartagena, color y aroma a café"
                    class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-700 ease-out mask-image"
                    loading="lazy" decoding="async" />
                  <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/40 via-black/0 to-black/0"></div>
                </figure>
                <div class="p-6">
                  <h3 class="text-2xl font-rowdies text-text-primary group-hover:text-primary transition">Colombia</h3>
                  <p class="mt-2 text-sm text-text-secondary">Ritmo, color y aroma a café. Un país que se vive.</p>
                </div>
              </a>
            </article>

            <!-- Indonesia -->
            <article class="group relative text-center rounded-2xl overflow-hidden ring-1 ring-border/60 hover:ring-border transition">
              <a href="<?php echo esc_url( get_permalink( get_page_by_path('indonesia') ) ); ?>" class="block focus:outline-none focus-visible:ring-2 focus-visible:ring-primary/60 rounded-2xl">
                <figure class="aspect-[16/9] overflow-hidden relative">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-personalizados-por-el-mundo-indonesia.jpg"
                    alt="Viaje personalizado a Indonesia con Ukiyo: tradición, naturaleza y mar de islas"
                    class="w-full h-full object-cover object-center group-hover:scale-[1.03] transition duration-700 ease-out mask-image"
                    loading="lazy" decoding="async" />
                  <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/40 via-black/0 to-black/0"></div>
                </figure>
                <div class="p-6">
                  <h3 class="text-2xl font-rowdies text-text-primary group-hover:text-primary transition">Indonesia</h3>
                  <p class="mt-2 text-sm text-text-secondary">Espiritualidad, tradición y paisajes que impresionan.</p>
                </div>
              </a>
            </article>

            <!-- Marruecos -->
            <article class="group relative text-center rounded-2xl overflow-hidden ring-1 ring-border/60 hover:ring-border transition">
              <a href="<?php echo esc_url( get_permalink( get_page_by_path('marruecos') ) ); ?>" class="block focus:outline-none focus-visible:ring-2 focus-visible:ring-primary/60 rounded-2xl">
                <figure class="aspect-[16/9] overflow-hidden relative">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-personalizados-por-el-mundo-marruecos.jpg"
                    alt="Viaje personalizado a Marruecos con Ukiyo: dunas, zocos y hospitalidad bereber"
                    class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-700 ease-out mask-image"
                    loading="lazy" decoding="async" />
                  <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/40 via-black/0 to-black/0"></div>
                </figure>
                <div class="p-6">
                  <h3 class="text-2xl font-rowdies text-text-primary group-hover:text-primary transition">Marruecos</h3>
                  <p class="mt-2 text-sm text-text-secondary">Zocos, desierto y una hospitalidad que no se olvida.</p>
                </div>
              </a>
            </article>
        </div>
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
