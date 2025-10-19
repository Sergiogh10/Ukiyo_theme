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
    'name' => 'Maite & Ramón',
    'meta' => 'Viaje a Indonesia · 15 días',
    'img'  => $uri . '/images/reviews/caballos.jpg',
    'alt'  => 'María y Javier en Cartagena',
    'text' => 'Queríamos un viaje “de verdad” y lo conseguimos: gente local, música, comida y calma. Nada de prisas ni turisteo. Volvimos con amigos y con ganas de repetir.',
    'rating' => 5
  ],
  [
    'name' => 'Cristina',
    'meta' => 'Indonesia · 15 días',
    'img'  => $uri . '/images/reviews/costaricareview.jpg',
    'alt'  => 'Irene en terrazas de arroz',
    'text' => 'El itinerario fue una pasada y se notó la mano local. Lo mejor: las conversaciones con familias y artesanos. Sentí que viajaba, no que “visitaba”.',
    'rating' => 5
  ],
  [
    'name' => 'Carmen & Jose Ángel',
    'meta' => 'Indonesia · 18 días',
    'img'  => $uri . '/images/reviews/indonesiareview.jpg',
    'alt'  => 'David y Laura en bosque nuboso',
    'text' => 'Naturaleza brutal y alojamientos con mucho encanto. Todo fluyó sin pensar en logística. Simplemente disfrutamos.',
    'rating' => 5
  ],
  [
    'name' => 'María R.',
    'meta' => 'Indonesia (Java) · 4 días',
    'img'  => $uri . '/images/reviews/costarica2review.jpg',
    'alt'  => 'Sofía en medina',
    'text' => 'Cercanía, respeto y experiencias fuera de lo obvio. Me sentí acompañada en todo momento.',
    'rating' => 4.8
  ],
  [
    'name' => 'Carolina & Carmen',
    'meta' => 'Cuba · 15 días',
    'img'  => $uri . '/images/reviews/conjulian.jpg',
    'alt'  => 'Greta en La Sierra',
    'text' => 'Un lugar cómodo para desconectar y disfrutar sin prisas. Trato cercano y auténtico; volveré seguro.',
    'rating' => 5
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

<style>
/* Scoped fixes for Reviews layout */
.ukiyo-rg .rg-inner{display:grid;grid-gap:1.5rem;grid-template-rows:repeat(2,22rem);grid-template-columns:repeat(4,minmax(0,1fr));}
.ukiyo-rg .rg-pos-a{grid-column:1/3;grid-row:1/2;}
.ukiyo-rg .rg-pos-b{grid-column:3/4;grid-row:1/2;}
.ukiyo-rg .rg-pos-c{grid-column:4/5;grid-row:1/3;}
.ukiyo-rg .rg-pos-d{grid-column:2/4;grid-row:2/3;}
.ukiyo-rg .rg-pos-e{grid-column:1/2;grid-row:2/3;}
@media (max-width:1000px){
  .ukiyo-rg .rg-inner{grid-template-columns:repeat(2,minmax(0,1fr));grid-template-rows:none;}
  .ukiyo-rg .rg-pos-a,.ukiyo-rg .rg-pos-b,.ukiyo-rg .rg-pos-c,.ukiyo-rg .rg-pos-d,.ukiyo-rg .rg-pos-e{grid-column:1/3;grid-row:auto;}
}
@media (max-width:640px){
  .ukiyo-rg .rg-inner{display:flex;flex-direction:column;}
}
/* Color/contrast adjustments using your palette variables already in main.css */
.ukiyo-rg .rg-card--green .rg-name,
.ukiyo-rg .rg-card--gold .rg-name,
.ukiyo-rg .rg-card--green .rg-title,
.ukiyo-rg .rg-card--gold .rg-title,
.ukiyo-rg .rg-card--green .rg-text,
.ukiyo-rg .rg-card--gold .rg-text{color:#FFFFFF;}
.ukiyo-rg .rg-card--green .rg-designation,
.ukiyo-rg .rg-card--gold .rg-designation,
.ukiyo-rg .rg-card--green .rg-score,
.ukiyo-rg .rg-card--gold .rg-score{color:#FFFFFF;opacity:.85;}
</style>

<section class="py-14 bg-surface">
  <div class="ukiyo-rg">
    <div class="rg-inner">
      <?php
        // Paletas de tarjeta (rota entre varias)
        $paletas = ['green','green','green','green','green'];
        $posiciones = ['pos-a','pos-b','pos-c','pos-d','pos-e'];
        foreach ($reviews as $i => $r):
          $palette = $paletas[$i % count($paletas)];
          $pos = $posiciones[$i % count($posiciones)];
      ?>
        <article class="rg-card rg-card--<?php echo esc_attr($palette); ?> rg-<?php echo esc_attr($pos); ?>"
          style="background-image:url('<?php echo esc_url($r['img']); ?>'); background-size:cover; background-position:center; background-blend-mode: multiply;">        
          <!-- Cabecera: avatar opcional eliminado; dejamos nombre + meta -->
        <header class="rg-header">
          <div class="rg-user">
            <div class="rg-user-box">
              <!-- Si quisieras iniciales en un circulito, descomenta:
              <div class="rg-initials"><?php echo strtoupper(substr($r['name'],0,1)); ?></div>
              -->
            </div>
            <div class="rg-detbox">
              <p class="rg-name"><?php echo esc_html($r['name']); ?></p>
              <p class="rg-designation"><?php echo esc_html($r['meta']); ?></p>
            </div>
          </div>

          <!-- Rating -->
          <div class="rg-rating" aria-label="Valoración">
            <?php
              $full = floor($r['rating']);
              $half = ($r['rating'] - $full) >= 0.5 ? 1 : 0;
              for ($s=0; $s < $full; $s++) {
                echo '<svg class="rg-star" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.803 2.036a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.803-2.036a1 1 0 00-1.175 0l-2.803 2.036c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
              }
              if ($half) {
                echo '<svg class="rg-star" viewBox="0 0 24 24" aria-hidden="true"><defs><linearGradient id="rg-half"><stop offset="50%" stop-color="currentColor"/><stop offset="50%" stop-color="transparent"/></linearGradient></defs><path fill="url(#rg-half)" d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896l-7.335 3.869 1.401-8.168L.132 9.21l8.2-1.192z"/></svg>';
              }
            ?>
            <span class="rg-score"><?php echo number_format($r['rating'], 1); ?>/5</span>
          </div>
        </header>

        <!-- Texto -->
        <div class="rg-review">
          <h4 class="rg-title">
            <?php
              // Primeras frases del texto como “titulo corto”
              $titulo = wp_trim_words($r['text'], 18, '…');
              echo esc_html($titulo);
            ?>
          </h4>
          <p class="rg-text">“ <?php echo esc_html($r['text']); ?> ”</p>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
    <!-- CTA -->
     
<section class="py-20 bg-gradient-primary text-white text-center">
    <div class="container mx-auto px-6 max-w-3xl">
        <h2 class="text-display font-telma mb-6">¿No encuentras tu viaje ideal?</h2>
        <p class="text-xl mb-8 opacity-90">Cada persona viaja a su manera.
Cuéntanos qué te mueve y crearemos juntos una experiencia que encaje contigo.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo esc_url( site_url('/planifica-tu-viaje') ); ?>" class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-white/80 transition" aria-label="Abrir formulario para contarnos tu idea">
  Cuéntanos tu idea
</a>
            <!-- <a href="<?php echo esc_url( site_url('/about') ); ?>" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition">Hablar con un Curador</a> -->
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