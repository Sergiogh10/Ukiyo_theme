<?php
/**
 * Template Name: Pricing
 */
get_header();
$template_uri = get_template_directory_uri();
?>

  <!-- HERO -->
<style>
  .hero-responsive { height: 100vh; }
  @media (min-width: 1024px) {
    .hero-responsive { height: auto !important; min-height: 50vh !important; }
  }
</style>
  <section class="hero-responsive relative flex items-center justify-center overflow-hidden pt-32 pb-16">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full">
      <img src="<?php echo get_template_directory_uri(); ?>/images/heroimages/viajes-autor-ukiyo-indonesiaplaya.jpg" 
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
            Precios
          </span>
          <h1 class="text-hero md:text-6xl lg:text-hero font-rowdies text-white mb-6 text-shadow">
            Invertir en <span class="text-accent-300">recuerdos</span>
          </h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
            En UKIYO no vendemos paquetes ni vacaciones: creamos experiencias personales, honestas y llenas de sentido.
            Cada viaje está diseñado con cuidado, respeto y detalle. Lo auténtico no tiene precio, pero sí un valor.          
          </p>
        </div>
      </div>
    </div>
  </section>

<!-- ===================== FILOSOFÍA ===================== -->
<section class="py-12 bg-background">
  <div class="container mx-auto px-6">
    <header class="text-center max-w-3xl mx-auto mb-12">
      <h2 class="text-4xl font-rowdies text-text-primary tracking-tight">
        Nuestra filosofía de <span class="text-secondary">servicio</span>
      </h2>
      <p class="mt-4 text-lg text-text-secondary leading-relaxed">
        Un buen viaje necesita tiempo, atención y presencia. Trabajamos por <strong>día organizado</strong> para que cada experiencia
        se viva con calma y con el nivel de inmersión que tú elijas. Te acompañamos antes, durante y después del viaje.
      </p>
    </header>

    <ul role="list" class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-primary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
        </div>
        <h3 class="text-xl font-rowdies text-text-primary mb-2">Conocimiento local</h3>
        <p class="text-text-secondary">Red de guías, artesanos y comunidades. Conexiones reales, construidas desde el respeto.</p>
      </li>
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-secondary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </div>
        <h3 class="text-xl font-rowdies text-text-primary mb-2">Personalización total</h3>
        <p class="text-text-secondary">Cada viaje se diseña desde cero. Se adapta a tu forma de viajar, tus intereses y tu ritmo.</p>
      </li>
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-accent/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
        <h3 class="text-xl font-rowdies text-text-primary mb-2">Acompañamiento constante</h3>
        <p class="text-text-secondary">Estamos contigo en cada paso: planificación, viaje y regreso. Cuidamos los detalles de verdad.</p>
      </li>
    </ul>
  </div>
</section>


<!-- ===================== TIERS ===================== -->
<section class="min-h-screen flex justify-center items-center py-12 bg-background">
  <div class="container mx-auto px-6">
    <!-- Header -->
    <div class="text-center max-w-3xl mx-auto mb-16">
      <h2 class="text-4xl font-rowdies">
        <span class="text-primary tracking-wide">Planes </span>
        <span class="text-text-primary">Flexibles</span>
      </h2>
      <p class="mt-4 text-lg text-text-secondary leading-relaxed">
        Elige el plan que mejor se adapte a ti y a tu forma de viajar.
      </p>
    </div>

    <!-- Pricing Cards -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
      
      <!-- Basic Card -->
      <article class="group rounded-2xl border-2 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
        <!-- Image Header -->
        <div class="relative h-64 w-full overflow-hidden" style="-webkit-mask-image: linear-gradient(to bottom, black 80%, transparent 100%); mask-image: linear-gradient(to bottom, black 80%, transparent 100%);">
            <img src="<?php echo get_template_directory_uri(); ?>/images/heroimages/viajes-autor-ukiyo-viajeros2.jpg" 
                 alt="Espíritu mochilero" 
                 class="absolute inset-0 w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 scale-100 group-hover:scale-110" />
            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-all duration-500"></div>
            <div class="absolute inset-0 flex items-center justify-center p-4">
                <h2 class="text-4xl font-rowdies font-bold text-white text-center drop-shadow-md text-shadow">Espíritu mochilero</h2>
            </div>
        </div>
        
        <!-- Content -->
        <div class="px-8 pb-8 pt-2 flex-grow flex flex-col">
          <div class="text-center mb-6">
            <p class="pt-2 tracking-wide text-secondary">
              <br>
              <span class="align-top text-lg">€ </span>
              <span class="text-4xl font-bold">60</span>
              <span class="text-sm font-medium opacity-80">/ día</span>
            </p>
            <hr class="mt-6 border-secondary/20 w-16 mx-auto">
          </div>

          <div class="flex-grow space-y-4">
            <p class="font-medium text-text-secondary text-left flex items-start">
                <svg class="w-5 h-5 text-secondary mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="pl-2">
                Comienza con <span class="text-text-primary font-semibold">videollamadas</span>
                </span>
            </p>
            <p class="font-medium text-text-secondary text-left flex items-start">
                <svg class="w-5 h-5 text-secondary mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="pl-2">
                <span class="text-text-primary font-semibold">Programa completo</span> del viaje
                </span>
            </p>
            <p class="font-medium text-text-secondary text-left flex items-start">
                <svg class="w-5 h-5 text-secondary mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="pl-2">
                Apoyo <span class="text-text-primary font-semibold">24/7</span>
                </span>
            </p>
          </div>

          <a href="#consultation" class="block w-full mt-8">
            <div class="w-full py-4 border-2 btn-primary text-text-secondary rounded-full font-semibold hover:bg-secondary hover:text-white transition-all duration-300 flex items-center justify-center group-hover:shadow-lg">
              <span>Elegir Plan</span>
              <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
              </svg>
            </div>
          </a>
        </div>
      </article>

      <!-- Startup Card (Popular) -->
      <article class="group rounded-2xl border-2 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
        <div class="absolute top-4 right-4 z-30">
             <span class="bg-primary text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-sm">Popular</span>
        </div>
        
        <!-- Image Header -->
        <div class="relative h-64 w-full overflow-hidden" style="-webkit-mask-image: linear-gradient(to bottom, black 80%, transparent 100%); mask-image: linear-gradient(to bottom, black 80%, transparent 100%);">
            <img src="<?php echo get_template_directory_uri(); ?>/images/heroimages/viajes-personalizados-ukiyo-viajeros3.jpg" 
                 alt="Aventura premium" 
                 class="absolute inset-0 w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 scale-100 group-hover:scale-110" />
            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-all duration-500"></div>
            <div class="absolute inset-0 flex items-center justify-center p-4">
                <h2 class="text-4xl font-rowdies font-bold text-white text-center drop-shadow-md text-shadow">Aventura premium</h2>
            </div>
        </div>
        
        <!-- Content -->
        <div class="px-8 pb-8 pt-2 flex-grow flex flex-col">
          <div class="text-center mb-6">
            <p class="pt-2 tracking-wide text-primary">
              <br>
              <span class="text-4xl font-bold">15%</span>
              <span class="text-sm font-medium opacity-80">/ viaje</span>
            </p>
            <hr class="mt-6 border-primary/20 w-16 mx-auto">
          </div>

          <div class="flex-grow space-y-4">
            <p class="font-medium text-text-secondary text-left flex items-start">
                <svg class="w-5 h-5 text-primary mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="pl-2">
                Todo en <span class="text-text-primary font-semibold">Espíritu mochilero</span>
                </span>
            </p>
            <p class="font-medium text-text-secondary text-left flex items-start">
                <svg class="w-5 h-5 text-primary mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="pl-2">
                <span class="text-text-primary font-semibold">Vuelos y traslados</span>
                </span>
            </p>
            <p class="font-medium text-text-secondary text-left flex items-start">
                <svg class="w-5 h-5 text-primary mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="pl-2">
                <span class="text-text-primary font-semibold">Alojamientos</span> seleccionados
                </span>
            </p>
          </div>

          <a href="#consultation" class="block w-full mt-8">
            <div class="w-full py-4 btn-primary text-text-secondary rounded-full font-semibold hover:bg-primary-700 transition-all duration-300 flex items-center justify-center shadow-md group-hover:shadow-lg">
              <span>Elegir Plan</span>
              <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
              </svg>
            </div>
          </a>
        </div>
      </article>

      <!-- Enterprise Card -->
      <article class="group rounded-2xl border-2 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
        <!-- Image Header -->
        <div class="relative h-64 w-full overflow-hidden" style="-webkit-mask-image: linear-gradient(to bottom, black 80%, transparent 100%); mask-image: linear-gradient(to bottom, black 80%, transparent 100%);">
            <img src="<?php echo get_template_directory_uri(); ?>/images/heroimages/viajes-autor-ukiyo-indonesiaplaya.jpg" 
                 alt="Mundo flotante" 
                 class="absolute inset-0 w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 scale-100 group-hover:scale-110" />
            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-all duration-500"></div>
            <div class="absolute inset-0 flex items-center justify-center p-4">
                <h2 class="text-4xl font-rowdies font-bold text-white text-center drop-shadow-md text-shadow">Mundo flotante</h2>
            </div>
        </div>
        
        <!-- Content -->
        <div class="px-8 pb-8 pt-2 flex-grow flex flex-col">
          <div class="text-center mb-6">
            <p class="pt-2 tracking-wide text-accent">
              <br>
              <span class="text-4xl font-bold">Próximamente</span>
            </p>
            <hr class="mt-6 border-accent/20 w-16 mx-auto">
          </div>

          <div class="flex-grow space-y-4">
            <p class="font-medium text-text-secondary text-left flex items-start">
                <svg class="w-5 h-5 text-accent mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="pl-2">
                Todo en <span class="text-text-primary font-semibold">Aventura premium</span>
                </span>
            </p>
            <p class="font-medium text-text-secondary text-left flex items-start">
                <svg class="w-5 h-5 text-accent mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="pl-2">
                Experiencias de <span class="text-text-primary font-semibold">lujo sostenible</span>
                </span>
            </p>
            <p class="font-medium text-text-secondary text-left flex items-start">
                <svg class="w-5 h-5 text-accent mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="pl-2">
                <span class="text-text-primary font-semibold">Excursiones</span> privadas
                </span>
            </p>
          </div>

          <a href="#consultation" class="block w-full mt-8">
            <div class="w-full py-4 border-2 btn-primary text-text-secondary rounded-full font-semibold hover:bg-accent hover:text-white transition-all duration-300 flex items-center justify-center group-hover:shadow-lg">
              <span>Elegir Plan</span>
              <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
              </svg>
            </div>
          </a>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- ===================== RESERVA / CALENDAR ===================== -->
<section id="consultation" class="py-12 bg-background">
  <div class="container mx-auto px-6">
    <header class="text-center max-w-2xl mx-auto mb-8">
      <h2 class="text-4xl font-rowdies text-text-primary">Reserva una <span class="text-primary">videollamada</span></h2>
      <p class="mt-3 text-lg text-text-secondary">Coordina una conversación y vemos juntos el alcance, el ritmo y el presupuesto.</p>
    </header>

    <div class="text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 hover:bg-accent-600 w-full text-center block">
      <!-- Calendly inline widget begin -->
  <div class="calendly-inline-widget" data-url="https://calendly.com/viajesukiyo-info/el-viaje-de-tu-vida?hide_gdpr_banner=1&background_color=fefcf8&text_color=6b6b6b&primary_color=f6cf66" style="min-width:320px;height:1000px;"></div>
  <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
  <!-- Calendly inline widget end -->
    </div>
  </div>
</section>

<!-- ===================== SCRIPTS ===================== -->
<script>
  // Itinerarios: toggle accesible e idempotente
  function toggleSampleItinerary(key){
    var el = document.getElementById(key + '-itinerary');
    if(!el) return;
    var hidden = el.classList.toggle('hidden');
    if(!hidden){ el.setAttribute('tabindex','-1'); el.focus({preventScroll:true}); }
  }
</script>

<?php get_footer(); ?>
