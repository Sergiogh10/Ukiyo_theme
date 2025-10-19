<?php
/**
 * Template Name: Guías
 * Description: Página estática de Guías/Consejos con hero, destacados, categorías y newsletter.
 */
if ( ! defined('ABSPATH') ) exit;
get_header();
?>

<!-- Hero Section -->
<section class="pt-24 pb-16 bg-gradient-warm">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto text-center">
      <h1 class="text-hero font-crimson text-text-primary mb-6">
        Guías y <span class="text-primary">Consejos</span> de Viaje
      </h1>
      <p class="text-xl text-text-secondary mb-8 max-w-3xl mx-auto leading-relaxed">
        Descubre destinos únicos con nuestras guías expertas. Consejos prácticos, secretos locales y
        experiencias auténticas para transformar cada viaje en una aventura cultural memorable.
      </p>

      <!-- Search & Filter Refined -->
      <div class="flex flex-col md:flex-row gap-4 max-w-3xl mx-auto mt-10">
        
        <!-- Search Input -->
        <div class="relative flex-1">
          <input 
            type="text" 
            id="search-input"
            placeholder="Busca una guía o destino..."
            class="w-full pl-12 pr-4 py-3 bg-white/80 backdrop-blur-sm border border-surface rounded-xl shadow-sm 
                  focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary/60 
                  text-text-primary placeholder-text-secondary/60 transition-all duration-300" 
          />
          <svg 
            class="w-5 h-5 text-text-secondary/70 absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none"
            fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </div>

        <!-- Region Filter -->
        <div class="relative">
          <select 
            id="region-filter"
            class="appearance-none w-full md:w-56 pl-4 pr-10 py-3 bg-white/80 backdrop-blur-sm border border-surface 
                  rounded-xl shadow-sm text-text-primary font-medium 
                  focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary/60 
                  transition-all duration-300">
            <option value="">🌍 Todas las regiones</option>
            <option value="asia">Asia</option>
            <option value="america">América</option>
            <option value="europa">Europa</option>
            <option value="africa">África</option>
            <option value="oceania">Oceanía</option>
          </select>
        </div>

        <!-- Duration Filter -->
        <div class="relative">
          <select 
            id="duration-filter"
            class="appearance-none w-full md:w-56 pl-4 pr-10 py-3 bg-white/80 backdrop-blur-sm border border-surface 
                  rounded-xl shadow-sm cursor-pointer text-text-primary font-medium 
                  focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary/60 
                  transition-all duration-300">
            <option value="">⏳ Duración del viaje</option>
            <option value="1-3">1–3 días</option>
            <option value="4-7">4–7 días</option>
            <option value="8-14">8–14 días</option>
            <option value="15+">15+ días</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured Guides Section -->
<section class="py-16 bg-surface">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-display font-crimson text-text-primary mb-4">
        Guías <span class="text-secondary">Destacadas</span>
      </h2>
      <p class="text-lg text-text-secondary max-w-2xl mx-auto">
        Nuestras guías más completas y populares, creadas por expertos locales con años de experiencia curando experiencias auténticas.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
      <!-- Bali Guide -->
      <article class="group cursor-pointer"
        onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('bali-5-dias') ?: get_page_by_path('5_day_bali_cultural_immersion_guide') ) ?: '#'); ?>'">
        <div class="relative overflow-hidden rounded-2xl mb-6 aspect-[16/10]">
          <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?q=80&w=1000&auto=format&fit=crop"
               alt="Inmersión cultural en Bali"
               class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
               loading="lazy"
               onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;" />
          <div class="absolute inset-0 bg-gradient-to-t from-primary-900/80 via-transparent to-transparent"></div>

          <!-- Badges -->
          <div class="absolute top-4 left-4 flex flex-wrap gap-2">
            <span class="bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium">5 Días</span>
            <span class="bg-secondary-100 text-secondary px-3 py-1 rounded-full text-sm font-medium">Inmersión Cultural</span>
          </div>

          <!-- Content Overlay -->
          <div class="absolute bottom-0 left-0 right-0 p-6">
            <div class="flex items-center mb-3">
              <div class="flex text-yellow-400" aria-hidden="true">
                <?php for($i=0;$i<5;$i++): ?>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <?php endfor; ?>
              </div>
              <span class="text-white ml-2 text-sm">4.9 (127 reviews)</span>
            </div>
            <h3 class="text-2xl font-crimson text-white mb-3">Inmersión Cultural de 5 Días en Bali</h3>
            <p class="text-white/90 mb-4">
              Descubre la auténtica Bali a través de ceremonias sagradas, talleres de arte tradicional y encuentros con maestros espirituales locales.
            </p>
            <div class="flex flex-wrap items-center gap-4 text-white/80 text-sm">
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                5 días completos
              </div>
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Ubud, Bali
              </div>
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg>
                Nivel: Intermedio
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- Colombia Guide -->
      <article class="group cursor-pointer" onclick="navigateToGuide('<?php echo esc_js( esc_url( get_permalink( get_page_by_path('colombia-3-dias') ?: get_page_by_path('3_day_colombia_hidden_gems_guide') ) ?: '#' ) ); ?>')">
        <div class="relative overflow-hidden rounded-2xl mb-6 aspect-[16/10]">
          <img src="https://images.unsplash.com/photo-1585464231875-d9ef1f5ad396?q=80&w=1000&auto=format&fit=crop"
               alt="Colombia hidden gems"
               class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
               loading="lazy"
               onerror="this.src='https://images.pexels.com/photos/3408744/pexels-photo-3408744.jpeg'; this.onerror=null;" />
          <div class="absolute inset-0 bg-gradient-to-t from-accent-900/80 via-transparent to-transparent"></div>

          <!-- Badges -->
          <div class="absolute top-4 left-4 flex flex-wrap gap-2">
            <span class="bg-accent-100 text-accent px-3 py-1 rounded-full text-sm font-medium">3 Días</span>
            <span class="bg-primary-100 text-primary px-3 py-1 rounded-full text-sm font-medium">Joyas Ocultas</span>
          </div>

          <!-- Content Overlay -->
          <div class="absolute bottom-0 left-0 right-0 p-6">
            <div class="flex items-center mb-3">
              <div class="flex text-yellow-400" aria-hidden="true">
                <?php for($i=0;$i<5;$i++): ?>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <?php endfor; ?>
              </div>
              <span class="text-white ml-2 text-sm">4.8 (94 reviews)</span>
            </div>
            <h3 class="text-2xl font-crimson text-white mb-3">Joyas Ocultas de Colombia en 3 Días</h3>
            <p class="text-white/90 mb-4">
              Explora pueblos coloniales secretos, cascadas vírgenes y tradiciones ancestrales en una aventura fuera de los circuitos turísticos tradicionales.
            </p>
            <div class="flex flex-wrap items-center gap-4 text-white/80 text-sm">
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                3 días intensos
              </div>
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Eje Cafetero
              </div>
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                Nivel: Aventurero
              </div>
            </div>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- Travel Tips Section -->
<section class="py-20 bg-white">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-display font-crimson text-text-primary mb-4">
        Consejos <span class="text-primary">Esenciales</span>
      </h2>
      <p class="text-lg text-text-secondary max-w-2xl mx-auto">
        Conocimientos prácticos y secretos locales para maximizar cada experiencia de viaje.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Cultural Etiquette -->
      <article class="card hover:shadow-card-hover transition-all duration-300">
        <div class="mb-6">
          <div class="w-12 h-12 bg-primary-100 text-primary rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
          </div>
          <h3 class="text-xl font-crimson text-text-primary mb-3">Etiqueta Cultural</h3>
          <p class="text-text-secondary mb-4">Aprende los códigos de respeto y las costumbres locales para conectar auténticamente con cada cultura.</p>
        </div>
        <div class="space-y-2">
          <?php
          $tips1 = ['Gestos y saludos apropiados','Vestimenta según contexto','Tradiciones religiosas'];
          foreach ($tips1 as $t): ?>
            <div class="flex items-start">
              <svg class="w-4 h-4 text-primary mt-1 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
              <span class="text-text-secondary text-sm"><?php echo esc_html($t); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </article>

      <!-- Sustainable Travel -->
      <article class="card hover:shadow-card-hover transition-all duration-300">
        <div class="mb-6">
          <div class="w-12 h-12 bg-accent-100 text-accent rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
          </div>
          <h3 class="text-xl font-crimson text-text-primary mb-3">Viaje Sostenible</h3>
          <p class="text-text-secondary mb-4">Estrategias para minimizar tu impacto ambiental mientras maximizas el beneficio para las comunidades locales.</p>
        </div>
        <div class="space-y-2">
          <?php
          $tips2 = ['Alojamientos eco-friendly','Transporte responsable','Turismo comunitario'];
          foreach ($tips2 as $t): ?>
            <div class="flex items-start">
              <svg class="w-4 h-4 text-accent mt-1 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
              <span class="text-text-secondary text-sm"><?php echo esc_html($t); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </article>

      <!-- Packing & Preparation -->
      <article class="card hover:shadow-card-hover transition-all duration-300">
        <div class="mb-6">
          <div class="w-12 h-12 bg-secondary-100 text-secondary rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
          </div>
          <h3 class="text-xl font-crimson text-text-primary mb-3">Preparación Inteligente</h3>
          <p class="text-text-secondary mb-4">Listas de equipaje específicas por destino y consejos para una preparación eficiente y sin estrés.</p>
        </div>
        <div class="space-y-2">
          <?php
          $tips3 = ['Equipaje por clima y actividad','Documentación esencial','Apps y herramientas útiles'];
          foreach ($tips3 as $t): ?>
            <div class="flex items-start">
              <svg class="w-4 h-4 text-secondary mt-1 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
              <span class="text-text-secondary text-sm"><?php echo esc_html($t); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- Newsletter CTA -->
<section class="py-20 bg-gradient-primary text-white">
  <div class="container mx-auto px-6 text-center">
    <div class="max-w-3xl mx-auto">
      <h2 class="text-display font-crimson mb-6">Recibe Guías Exclusivas</h2>
      <p class="text-xl mb-8 opacity-90">Suscríbete para acceder a guías secretas, ofertas especiales y consejos de expertos locales directamente en tu bandeja de entrada.</p>
      <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto" id="newsletter-form">
        <input type="email" placeholder="Tu email" class="flex-1 px-4 py-3 rounded-lg text-text-primary" required />
        <button type="submit" class="bg-white text-primary px-6 py-3 rounded-lg font-semibold hover:bg-accent-50 transition-all duration-300 shadow-soft">Suscribirse</button>
      </form>
      <p class="text-sm opacity-70 mt-4">Sin spam. Cancela cuando quieras.</p>
    </div>
  </div>
</section>

<script>
// Search & Filters (maqueta)
const searchInput = document.getElementById('search-input');
const regionFilter = document.getElementById('region-filter');
const durationFilter = document.getElementById('duration-filter');

function filterGuides(){
  const searchTerm = (searchInput?.value || '').toLowerCase();
  const selectedRegion = regionFilter?.value || '';
  const selectedDuration = durationFilter?.value || '';
  console.log('Filtering guides:', { searchTerm, selectedRegion, selectedDuration });
}
searchInput?.addEventListener('input', filterGuides);
regionFilter?.addEventListener('change', filterGuides);
durationFilter?.addEventListener('change', filterGuides);

// Category chips
document.querySelectorAll('[data-filter]').forEach(btn=>{
  btn.addEventListener('click', function(){
    const t = this.dataset.filter, v = this.dataset.value;
    if(t==='duration' && durationFilter) durationFilter.value = v;
    if(t==='region'   && regionFilter)   regionFilter.value   = v;
    filterGuides();
    const grid = document.querySelector('.grid');
    grid && grid.scrollIntoView({behavior:'smooth', block:'start'});
  });
});

// Colombia nav (placeholder si no existe la página)
function navigateToGuide(url){
  if(url && url !== '#'){ window.location.href = url; return; }
  alert('La guía de Colombia estará disponible próximamente. ¡Gracias por tu interés!');
}

// Newsletter form
document.getElementById('newsletter-form')?.addEventListener('submit', function(e){
  e.preventDefault();
  const email = this.querySelector('input[type="email"]')?.value || '';
  if(email){ alert('¡Gracias por suscribirte! Pronto recibirás nuestras mejores guías.'); this.reset(); }
});
</script>

<?php get_footer(); ?>