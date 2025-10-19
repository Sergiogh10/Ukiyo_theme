<?php
/**
 * Template Name: Reviews
 * Página de reseñas — estilo UKIYO
 */
get_header();
$uri = get_template_directory_uri();

/**
 * Fuente de datos simple (puedes sustituir por ACF o CPT en el futuro)
 * Coloca tus imágenes en /images/reviews/
 */
$reviews = [
  [
    'name' => 'María & Javier',
    'meta' => 'Viaje a Colombia · 12 días',
    'img'  => $uri . '/images/reviews/maria-javier.jpg',
    'alt'  => 'María y Javier en Cartagena',
    'text' => 'Queríamos un viaje “de verdad” y lo conseguimos: gente local, música, comida y calma. Nada de prisas ni turisteo. Volvimos con amigos y con ganas de repetir.',
    'rating' => 5
  ],
  [
    'name' => 'Irene R.',
    'meta' => 'Indonesia · 15 días',
    'img'  => $uri . '/images/reviews/irene.jpg',
    'alt'  => 'Irene en terrazas de arroz',
    'text' => 'El itinerario fue una pasada y se notó la mano local. Lo mejor: las conversaciones con familias y artesanos. Sentí que viajaba, no que “visitaba”.',
    'rating' => 5
  ],
  [
    'name' => 'David & Laura',
    'meta' => 'Costa Rica · 10 días',
    'img'  => $uri . '/images/reviews/david-laura.jpg',
    'alt'  => 'David y Laura en bosque nuboso',
    'text' => 'Naturaleza brutal y alojamientos con mucho encanto. Todo fluyó sin pensar en logística. Simplemente disfrutamos.',
    'rating' => 5
  ],
  [
    'name' => 'Sofía M.',
    'meta' => 'Marruecos · 8 días',
    'img'  => $uri . '/images/reviews/sofia.jpg',
    'alt'  => 'Sofía en medina',
    'text' => 'Cercanía, respeto y experiencias fuera de lo obvio. Me sentí acompañada en todo momento.',
    'rating' => 4.8
  ],
];
?>

<!-- ===================== HERO ===================== -->
<section class="relative pt-24 pb-20 overflow-hidden font-satoshi">
  <!-- Fondo con imagen al 20% -->
  <div class="absolute inset-0 pointer-events-none">
    <img
      src="<?php echo $uri; ?>/images/colombia/ballenasnuqui.jpg"
      alt=""
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
        Reviews
      </span>
      <h1 class="text-hero font-satoshi-bold text-text-primary mb-6">
        Historias de <span class="text-primary">viajeros</span>
      </h1>
      <p class="text-xl font-satoshi text-text-secondary max-w-3xl mx-auto leading-relaxed">
                Opiniones reales de viajeros que confiaron en UKIYO. Experiencias auténticas, sostenibles y creadas a medida.
      </p>
    </div>
  </div>
</section>

<section class="py-14 bg-surface">
  <div class="container mx-auto px-6">

    <!-- Puedes añadir, quitar u ordenar reviews editando el array $reviews al inicio del archivo -->

    <ul role="list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($reviews as $i => $r): ?>
        <li class="group relative rounded-2xl bg-white/70 backdrop-blur-[2px] ring-1 ring-border/60 hover:ring-border transition overflow-hidden">
          <article class="h-full flex flex-col">
            <figure class="aspect-[4/3] overflow-hidden">
              <img
                src="<?php echo esc_url($r['img']); ?>"
                alt="<?php echo esc_attr($r['alt']); ?>"
                class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-700 ease-out"
                loading="lazy"
                decoding="async"
                onerror="this.src='https://images.pexels.com/photos/1430117/pexels-photo-1430117.jpeg'; this.onerror=null;">
            </figure>

            <div class="p-6 flex-1 flex flex-col">
              <!-- Rating visual estático -->
              <div class="flex items-center gap-1 mb-3" aria-label="Valoración">
                <?php
                  $full = floor($r['rating']);
                  $half = ($r['rating'] - $full) >= 0.5 ? 1 : 0;
                  for ($s=0; $s < $full; $s++) {
                    echo '<svg class="w-4 h-4 text-amber-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.803 2.036a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.803-2.036a1 1 0 00-1.175 0l-2.803 2.036c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
                  }
                  if ($half) {
                    echo '<svg class="w-4 h-4 text-amber-500" viewBox="0 0 24 24" aria-hidden="true"><defs><linearGradient id="half"><stop offset="50%" stop-color="currentColor"/><stop offset="50%" stop-color="transparent"/></linearGradient></defs><path fill="url(#half)" d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896l-7.335 3.869 1.401-8.168L.132 9.21l8.2-1.192z"/></svg>';
                  }
                ?>
                <span class="ml-2 text-xs text-text-tertiary"><?php echo number_format($r['rating'], 1); ?>/5</span>
              </div>

              <blockquote class="text-base text-text-primary leading-relaxed">
                “<?php echo esc_html($r['text']); ?>”
              </blockquote>

              <footer class="mt-5 flex items-center gap-3">
                <div class="size-10 rounded-full overflow-hidden ring-1 ring-border/60">
                  <img src="<?php echo esc_url($r['img']); ?>" alt="" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div>
                  <p class="text-sm font-satoshi text-text-primary">
                    <?php echo esc_html($r['name']); ?>
                  </p>
                  <p class="text-xs text-text-tertiary">
                    <?php echo esc_html($r['meta']); ?>
                  </p>
                </div>
              </footer>
            </div>
          </article>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- CTA -->
    <div class="mt-16 text-center">
      <a href="<?php echo esc_url( site_url('/planifica-tu-viaje') ); ?>"
         class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-primary text-white font-semibold hover:bg-primary/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-primary transition">
        Diseña tu aventura
        <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none">
          <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
      <p class="mt-3 text-sm text-text-tertiary">Sin compromiso. Empezamos con una conversación.</p>
    </div>
  </div>
</section>

<!-- Accesibilidad: reducir animaciones si el usuario lo prefiera -->
<style>
@media (prefers-reduced-motion: reduce) {
  .group:hover img { transform:none !important; transition:none !important; }
}
</style>

<?php get_footer(); ?>