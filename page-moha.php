<?php
/*
 * Template Name: Viaje de Autor – Moha
 * Description: Ficha de viaje de autor (Moha – Merzouga).
 */
get_header();
$uri = get_template_directory_uri();
?>
<main id="primary" class="relative">
  <!-- HERO -->
<section class="relative">
    <div class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        <img src="<?php echo get_template_directory_uri(); ?>/images/guides/montebromo.jpg"
             alt="Bromo"
             class="w-full h-full object-cover" 
             loading="lazy"
             onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        
        <!-- Content Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-12">
            <div class="container mx-auto max-w-4xl">
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">5 días</span>
                    <span class="bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">Grupos reducidos</span>
                    <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-medium">Plazas limitadas</span>
                </div>
                <h1 class="text-4xl lg:text-6xl font-crimson text-white mb-4">
                    Merzouga íntimo: <span class="text-accent">desierto, medinas y hospitalidad bereber</span>
                </h1>
                <p class="text-xl text-white/90 max-w-3xl">
                Recorreremos con Moha un Marruecos que combina zocos, kasbahs y noches bajo cielos de estrellas, con paradas que tienen sentido.</p>
                <div class="mt-6 flex gap-3">
                    <a href="<?php echo esc_url( home_url('/contacto') ); ?>" class="inline-flex items-center rounded-lg bg-amber-600/90 hover:bg-amber-600 text-white px-5 py-3 text-sm font-medium">Reservar ahora</a>
                    <a href="<?php echo esc_url( home_url('/contacto') ); ?>" class="inline-flex items-center rounded-lg bg-amber-600/90 hover:bg-amber-600 text-white px-5 py-3 text-sm font-medium">Consultar precio</a>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- AUTOR -->
  <section class="py-20 bg-gradient-warm">
    <div class="container mx-auto px-6 md:px-8 py-10 md:py-14">
      <div class="grid gap-8 md:grid-cols-3">
        <div class="md:col-span-1">
          <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/luisacuña.png" alt="Moha" class="w-28 h-28 rounded-full object-cover ring-1 ring-border/60" />
          <h2 class="mt-4 text-xl font-semibold text-text-primary">Moha</h2>
          <p class="text-sm text-text-secondary">Guía marroquí. Conoce el desierto por dentro y el ritmo real de las medinas.</p>
        </div>
        <div class="md:col-span-2">
          <div class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md p-6">
            <p class="text-text-secondary">“El desierto no se corre: se escucha. Hay silencios que valen más que cualquier itinerario. Te enseño a encontrar esos momentos”.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- NARRATIVA / HIGHLIGHTS -->
  <section class="bg-surface">
    <div class="container mx-auto px-6 md:px-8 pb-12 md:pb-16">
      <div class="grid gap-6 md:grid-cols-3">
        <div class="rounded-2xl ring-1 ring-border/60 bg-white/70 backdrop-blur-md p-6">
          <h3 class="font-semibold text-text-primary">Dunas y estrellas</h3>
          <p class="mt-2 text-text-secondary">Noches en campamentos escogidos por su silencio. Amaneceres en la arena.</p>
        </div>
        <div class="rounded-2xl ring-1 ring-border/60 bg-white/70 backdrop-blur-md p-6">
          <h3 class="font-semibold text-text-primary">Medinas con calma</h3>
          <p class="mt-2 text-text-secondary">Paradas donde tiene sentido, sin prisas, con los encuentros que importan.</p>
        </div>
        <div class="rounded-2xl ring-1 ring-border/60 bg-white/70 backdrop-blur-md p-6">
          <h3 class="font-semibold text-text-primary">Hospitalidad bereber</h3>
          <p class="mt-2 text-text-secondary">Casas familiares, té a la menta y rutas que Moha conoce desde niño.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- INCLUYE / NO INCLUYE -->
  <section class="bg-surface">
    <div class="container mx-auto px-6 md:px-8 pb-12 md:pb-16">
      <div class="grid gap-6 md:grid-cols-2">
        <div class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md p-6">
          <h3 class="font-semibold text-text-primary">Incluye</h3>
          <ul class="mt-3 list-disc list-inside text-text-secondary space-y-1">
            <li>Guía/autor (Moha) durante todo el viaje</li>
            <li>Alojamiento en riads/campamentos seleccionados</li>
            <li>Traslados internos según itinerario</li>
            <li>Experiencias locales seleccionadas</li>
          </ul>
        </div>
        <div class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md p-6">
          <h3 class="font-semibold text-text-primary">No incluye</h3>
          <ul class="mt-3 list-disc list-inside text-text-secondary space-y-1">
            <li>Vuelos internacionales</li>
            <li>Seguro de viaje</li>
            <li>Comidas no especificadas</li>
            <li>Gastos personales y propinas</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- GALERÍA SIMPLE -->
  <section class="bg-surface">
    <div class="container mx-auto px-6 md:px-8 pb-12 md:pb-16">
      <div class="grid gap-4 md:grid-cols-3">
        <img src="<?php echo esc_url($uri.'/images/viajesautor/moha-g1.jpg'); ?>" alt="Merzouga 1" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo esc_url($uri.'/images/viajesautor/moha-g2.jpg'); ?>" alt="Merzouga 2" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo esc_url($uri.'/images/viajesautor/moha-g3.jpg'); ?>" alt="Merzouga 3" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="bg-surface">
    <div class="container mx-auto px-6 md:px-8 pb-16">
      <div class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md p-6">
        <h3 class="font-semibold text-text-primary">Preguntas frecuentes</h3>
        <div class="mt-4 grid gap-3 md:grid-cols-2">
          <details class="group rounded-lg ring-1 ring-border/60 bg-white/70 p-4"><summary class="cursor-pointer font-medium text-text-primary">¿Fechas?</summary><div class="mt-2 text-sm text-text-secondary">Bajo demanda durante todo el año. Recomendado otoño y primavera.</div></details>
          <details class="group rounded-lg ring-1 ring-border/60 bg-white/70 p-4"><summary class="cursor-pointer font-medium text-text-primary">¿Precio?</summary><div class="mt-2 text-sm text-text-secondary">Completo en propuesta según grupo, alojamientos y duración.</div></details>
          <details class="group rounded-lg ring-1 ring-border/60 bg-white/70 p-4"><summary class="cursor-pointer font-medium text-text-primary">¿Nivel de confort?</summary><div class="mt-2 text-sm text-text-secondary">Riad boutique y campamentos seleccionados por silencio y autenticidad.</div></details>
          <details class="group rounded-lg ring-1 ring-border/60 bg-white/70 p-4"><summary class="cursor-pointer font-medium text-text-primary">¿Dificultad?</summary><div class="mt-2 text-sm text-text-secondary">Baja. Trayectos por carretera y caminatas cortas.</div></details>
        </div>
        <div class="mt-6"><a href="<?php echo esc_url( home_url('/contacto') ); ?>" class="inline-flex items-center rounded-lg bg-amber-600/90 hover:bg-amber-600 text-white px-5 py-3 text-sm font-medium">Reservar ahora</a></div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>