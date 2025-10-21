<?php
/**
 * Template Name: Pricing
 */
get_header();
$template_uri = get_template_directory_uri();
?>

<!-- ===================== HERO ===================== -->
<section class="relative pt-24 pb-20 overflow-hidden font-satoshi">
  <!-- Fondo con imagen al 20% -->
  <div class="absolute inset-0 pointer-events-none">
    <img
      src="<?php echo $template_uri; ?>/images/destination-mood/aventura.jpg"
      alt="Precio"
      class="w-full h-full object-cover opacity-20"
      loading="lazy"
      decoding="async"
      aria-hidden="true"
      onerror="this.src='https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg'; this.onerror=null;">
  </div>
  <div class="absolute inset-0 opacity-5">
    <svg class="w-full h-full" viewBox="0 0 100 100" fill="currentColor">
      <pattern id="cultural-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
        <circle cx="10" cy="10" r="2" opacity="0.3"/>
        <path d="M5 5l10 10M15 5l-10 10" stroke="currentColor" stroke-width="0.5" opacity="0.2"/>
      </pattern>
      <rect width="100%" height="100%" fill="url(#cultural-pattern)"/>
    </svg>
  </div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="max-w-4xl mx-auto text-center">
      <span class="inline-block px-4 py-2 bg-primary-100 text-primary rounded-full text-sm font-satoshi font-medium mb-6">
        Comienza tu aventura
      </span>
      <h1 class="text-hero font-satoshi-bold text-text-primary mb-6">
        Invertir en <span class="text-primary">recuerdos</span>
      </h1>
      <p class="text-xl font-satoshi text-text-secondary max-w-3xl mx-auto leading-relaxed">
        En UKIYO no vendemos paquetes ni vacaciones: creamos experiencias personales, honestas y llenas de sentido.
        Cada viaje está diseñado con cuidado, respeto y detalle. Lo auténtico no tiene precio, pero sí un valor.
      </p>
      <figure class="mt-8 inline-flex">
        <blockquote class="bg-black/10 backdrop-blur-sm border border-white/20 text-black italic px-5 py-3 rounded-lg">
  «Lo importante no es cuánto cuesta un viaje, sino lo que te deja dentro».
        </blockquote>
      </figure>
    </div>
  </div>
</section>

<!-- ===================== FILOSOFÍA ===================== -->
<section class="py-16 bg-gradient-warm">
  <div class="container mx-auto px-6">
    <header class="text-center max-w-3xl mx-auto mb-12">
      <h2 class="text-4xl font-satoshi text-text-primary tracking-tight">
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
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Conocimiento local</h3>
        <p class="text-text-secondary">Red de guías, artesanos y comunidades. Conexiones reales, construidas desde el respeto.</p>
      </li>
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-secondary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Personalización total</h3>
        <p class="text-text-secondary">Cada viaje se diseña desde cero. Se adapta a tu forma de viajar, tus intereses y tu ritmo.</p>
      </li>
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-accent/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Acompañamiento constante</h3>
        <p class="text-text-secondary">Estamos contigo en cada paso: planificación, viaje y regreso. Cuidamos los detalles de verdad.</p>
      </li>
    </ul>
  </div>
</section>

<!-- ===================== TIERS ===================== -->
<section class="py-20 bg-white">
  <div class="container mx-auto px-6">
    <header class="text-center max-w-2xl mx-auto mb-24">
      <h2 class="text-4xl font-satoshi text-text-primary tracking-tight">Niveles de <span class="text-primary">aventura</span></h2>
      <p class="mt-3 text-lg text-text-secondary">Tres niveles pensados para formas distintas de viajar.</p>
    </header>
    <br>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">

      <!-- Tier 1 -->
      <article class="group relative rounded-2xl overflow-hidden ring-1 ring-border/60 hover:ring-border transition bg-surface/50 flex flex-col">
        <div class="text-center p-8">
          <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-5">
            <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
          </div>
          <h3 class="text-2xl font-satoshi text-text-primary mb-1">Aventura premium</h3>
          <p class="text-primary text-lg">Una experiencia integral</p>
        </div>

        <div class="px-8">
          <div class="text-center mb-4">
            <div class="text-3xl font-satoshi text-primary">Consultar precio</div>
            <p class="text-sm text-text-tertiary">viaje completo</p>
          </div>
          <p class="text-text-secondary text-center mb-6 leading-relaxed">
          Para quienes buscan comodidad y personalización, manteniendo autenticidad y contacto local.
          </p>
        </div>

        <div class="px-8 pb-6">
          <h4 class="font-satoshi text-lg text-text-primary mb-3">Incluye</h4>
          <ul class="space-y-2">
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Todo del nivel “Espíritu mochilero”</span></li>
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Vuelos y traslados</span></li>
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Alojamientos seleccionados</span></li>
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Gastronomía local auténtica</span></li>
          </ul>
        </div>

        <div class="mt-auto p-8 pt-0">
        </div>
      </article>

      <!-- Tier 2 (Popular) -->
      <article class="group relative rounded-2xl overflow-hidden border-2 border-secondary bg-white shadow-sm hover:shadow-lg transition flex flex-col">
        <div class="absolute -top-3 left-1/2 -translate-x-1/2">
          <br>
          <span class="bg-secondary text-white px-4 py-1 rounded-full text-sm font-semibold">Más popular</span>
        </div>

        <div class="text-center p-8">
          <div class="w-20 h-20 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-5">
            <svg class="w-10 h-10 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <h3 class="text-2xl font-satoshi text-text-primary mb-1">Espíritu mochilero</h3>
          <p class="text-secondary text-lg">La guía experta</p>
        </div>

        <div class="px-8">
          <div class="text-center mb-4">
            <div class="text-3xl font-satoshi text-secondary">60 €</div>
            <p class="text-sm text-text-tertiary">por día organizado</p>
          </div>
          <p class="text-text-secondary text-center mb-6 leading-relaxed">
          Organización experta de experiencias auténticas. Tú llevas la logística; nosotros abrimos puertas locales.
          </p>
        </div>

        <div class="px-8 pb-6">
          <h4 class="font-satoshi text-lg text-text-primary mb-3">Incluye</h4>
          <ul class="space-y-2">
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Videollamadas de organización</span></li>
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Programa completo</span></li>
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Asesoramiento logístico y cultural</span></li>
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Apoyo 24/7 durante la experiencia</span></li>
          </ul>
        </div>

        <div class="mt-auto p-8 pt-0">
        </div>
      </article>

      <!-- Tier 3 -->
      <article class="group relative rounded-2xl overflow-hidden ring-1 ring-accent/30 hover:ring-accent transition bg-white flex flex-col">
        <div class="text-center p-8">
          <div class="w-20 h-20 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-5">
            <svg class="w-10 h-10 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
          </div>
          <h3 class="text-2xl font-satoshi text-text-primary mb-1">Mundo flotante</h3>
          <p class="text-accent text-lg">Vive la aventura de tu vida</p>
        </div>

        <div class="px-8">
          <div class="text-center mb-4">
            <div class="text-3xl font-satoshi text-accent">Consultar precio</div>
            <p class="text-sm text-text-tertiary">viaje completo</p>
          </div>
          <p class="text-text-secondary text-center mb-6 leading-relaxed">
            Entrega total a una experiencia de lujo consciente. Ideal para lunas de miel, aniversarios o viajes-vida.
          </p>
        </div>

        <div class="px-8 pb-6">
          <h4 class="font-satoshi text-lg text-text-primary mb-3">Incluye</h4>
          <ul class="space-y-2">
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Todo del nivel “Aventura premium”</span></li>
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Lujo sostenible</span></li>
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Excursiones privadas</span></li>
            <li class="flex items-start"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Experiencias gastronómicas</span></li>
          </ul>
        </div>

        <div class="mt-auto p-8 pt-0">
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ===================== RESERVA / CALENDAR ===================== -->
<section id="consultation" class="py-16 bg-surface">
  <div class="container mx-auto px-6">
    <header class="text-center max-w-2xl mx-auto mb-8">
      <h2 class="text-4xl font-satoshi text-text-primary">Reserva una <span class="text-primary">videollamada</span></h2>
      <p class="mt-3 text-lg text-text-secondary">Coordina una conversación y vemos juntos el alcance, el ritmo y el presupuesto.</p>
    </header>

    <div class="text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 hover:bg-accent-600 w-full text-center block">
      <!-- Google Calendar Appointment Scheduling begin -->
      <link href="https://calendar.google.com/calendar/scheduling-button-script.css" rel="stylesheet">
      <script src="https://calendar.google.com/calendar/scheduling-button-script.js" async></script>
      <script>
        (function() {
          var target = document.currentScript;
          window.addEventListener('load', function() {
            if (!window.calendar || !calendar.schedulingButton) return;
            calendar.schedulingButton.load({
              url: 'https://calendar.google.com/calendar/appointments/schedules/AcZssZ0oQLbKSl4opWsa7UsNMaKHpbeLYSCjP0Dp5Rpkjcn009psVtBSzV0U2Z162p5nlBQPT0lH4b8e?gv=true',
              color: '#8b4512',
              label: 'Reservar una cita',
              target: target
            });
          }, { once: true });
        })();
      </script>
      <!-- end Google Calendar Appointment Scheduling -->
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