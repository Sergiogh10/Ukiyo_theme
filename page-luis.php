<?php
/*
 * Template Name: Viaje de Autor – Luis
 * Description: Ficha de viaje de autor (Luis – Pantanal).
 */
get_header();
$uri = get_template_directory_uri();
?>
<main id="primary" class="relative">
  <!-- HERO -->
  <!-- HERO -->
<section class="relative">
    <div class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/pantanal6.jpg"
             alt="Bromo"
             class="w-full h-full object-cover" 
             loading="lazy"
             onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        
        <!-- Content Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-12">
            <div class="container mx-auto max-w-4xl">
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">15 días</span>
                    <span class="bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">Grupos reducidos</span>
                    <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-medium">Plazas limitadas</span>
                </div>
                <h1 class="text-4xl lg:text-6xl font-crimson text-white mb-4">
                    Pantanal: <span class="text-accent">tras el rastro del jaguar</span>
                </h1>
                <p class="text-xl text-white/90 max-w-3xl">
                Recorreremos con Luis, fotógrafo y guía profesional, los humedales infinitos de Brasil, disfrutando de amaneceres en bote, con la paciencia que requiere el instante.</p>
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
          <h2 class="mt-4 text-xl font-semibold text-text-primary">Luis acuña</h2>
          <p class="text-sm text-text-secondary">Guía costarricense y fotógrafo profesional. Conoce los diferentes sonidos de la selva y localiza a los animales más escurridizo</p>
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
          <h3 class="font-semibold text-text-primary">Amaneceres en bote</h3>
          <p class="mt-2 text-text-secondary">Luz baja, bancos de niebla y aves. Ritmo pausado para esperar al jaguar sin invadir su territorio.</p>
        </div>
        <div class="rounded-2xl ring-1 ring-border/60 bg-white/70 backdrop-blur-md p-6">
          <h3 class="font-semibold text-text-primary">Lectura del hábitat</h3>
          <p class="mt-2 text-text-secondary">Entender rastros y movimientos. Ética fotográfica y respeto a la fauna.</p>
        </div>
        <div class="rounded-2xl ring-1 ring-border/60 bg-white/70 backdrop-blur-md p-6">
          <h3 class="font-semibold text-text-primary">Alojamiento con sentido</h3>
          <p class="mt-2 text-text-secondary">Lodges seleccionados por ubicación y silencio, no por lujo superfluo.</p>
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
            <li>Guía/autor (Luis) durante todo el viaje</li>
            <li>Navegaciones y permisos locales</li>
            <li>Alojamiento en lodge seleccionado</li>
            <li>Asesoría fotográfica en campo</li>
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
        <img src="<?php echo esc_url($uri.'/images/viajesautor/luis-g1.jpg'); ?>" alt="Pantanal 1" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo esc_url($uri.'/images/viajesautor/luis-g2.jpg'); ?>" alt="Pantanal 2" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo esc_url($uri.'/images/viajesautor/luis-g3.jpg'); ?>" alt="Pantanal 3" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="bg-surface">
    <div class="container mx-auto px-6 md:px-8 pb-16">
      <div class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md p-6">
        <h3 class="font-semibold text-text-primary">Preguntas frecuentes</h3>
        <div class="mt-4 grid gap-3 md:grid-cols-2">
          <details class="group rounded-lg ring-1 ring-border/60 bg-white/70 p-4"><summary class="cursor-pointer font-medium text-text-primary">¿Fechas?</summary><div class="mt-2 text-sm text-text-secondary">Bajo demanda. Recomendado de mayo a octubre.</div></details>
          <details class="group rounded-lg ring-1 ring-border/60 bg-white/70 p-4"><summary class="cursor-pointer font-medium text-text-primary">¿Precio?</summary><div class="mt-2 text-sm text-text-secondary">Dependiendo de duración y grupo. Te lo detallamos al consultar.</div></details>
          <details class="group rounded-lg ring-1 ring-border/60 bg-white/70 p-4"><summary class="cursor-pointer font-medium text-text-primary">¿Equipo?</summary><div class="mt-2 text-sm text-text-secondary">Teleobjetivo recomendado (300mm+), protección contra humedad, ropa ligera.</div></details>
          <details class="group rounded-lg ring-1 ring-border/60 bg-white/70 p-4"><summary class="cursor-pointer font-medium text-text-primary">¿Dificultad?</summary><div class="mt-2 text-sm text-text-secondary">Baja. Jornadas en bote y caminatas cortas.</div></details>
        </div>
        <div class="mt-6"><a href="<?php echo esc_url( home_url('/contacto') ); ?>" class="inline-flex items-center rounded-lg bg-amber-600/90 hover:bg-amber-600 text-white px-5 py-3 text-sm font-medium">Reservar ahora</a></div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>