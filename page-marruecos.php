<?php
/**
 * Template Name: Marruecos Experience
 */
get_header();
?>

<style>
  .hero-gradient {
    background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.6) 100%);
  }
  .text-shadow {
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  .hero-responsive { height: 85vh; }
  @media (min-width: 1024px) {
    .hero-responsive { height: 85vh !important; }
  }
</style>
<header class="hero-responsive relative w-full overflow-hidden">
  <img alt="Marruecos landscape" class="absolute inset-0 w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-pareja.jpg" loading="eager" fetchpriority="high" decoding="async"/>
  <div class="absolute inset-0 hero-gradient flex flex-col items-center justify-center text-center px-4">
    <?php
    ukiyo_render_breadcrumbs([
        'class'      => 'mb-6 justify-center text-white/80',
        'link_class' => 'text-white/80 hover:text-white transition-colors',
    ]);
    ?>
    <span class="text-white/80 uppercase tracking-[0.3em] text-sm mb-4">Norte de África</span>
    <h1 class="text-6xl md:text-8xl font-rowdies text-white font-bold mb-2 text-shadow">MARRUECOS</h1>
    <p class="text-2xl md:text-4xl font-satoshi text-white/90 italic font-light">Encrucijada de culturas</p>
    <div class="mt-8 max-w-2xl text-white/80 text-lg md:text-xl font-light leading-relaxed">
      Explora zocos llenos de especias, dunas del Sahara y hospitalidad bereber.
    </div>
  </div>
</header>

cul<div class="relative -mt-16 container mx-auto px-4 z-20">
  <div class="bg-surface-light dark:bg-surface-dark shadow-xl rounded-2xl p-6 md:p-8 grid grid-cols-2 gap-4 md:flex md:flex-wrap md:justify-between md:items-center md:gap-6 border border-gray-100 dark:border-gray-700">
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'calendar_month' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Mejor Época</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Sep - May</p>
      </div>
    </div>
    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'currency_exchange' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Moneda</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Dirham (MAD)</p>
      </div>
    </div>
    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'language' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Idioma</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Árabe/Francés</p>
      </div>
    </div>
    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'thermostat' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Clima</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Variado</p>
      </div>
    </div>
  </div>
</div>

<section class="py-24 px-4 container mx-auto">
  <div class="max-w-3xl mx-auto text-center space-y-8">
    <h2 class="text-4xl md:text-5xl font-rowdies text-secondary dark:text-white font-medium leading-tight">
      Donde el <span class="text-primary italic">tiempo</span> se detiene
    </h2>
    <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-light">
      <span class="font-bold text-gray-800 dark:text-gray-100">Marruecos</span> es un mosaico de colores, sabores y sonidos. Desde los zocos de Marrakech hasta las dunas infinitas del Sahara, cada rincón cuenta una historia de mil y una noches.
    </p>
    <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
  </div>
</section>

<?php
$featuresData = [
  ['id' => '1', 'title' => 'Desierto del Sahara', 'description' => 'Dunas infinitas, noches estrelladas y amaneceres sobre el erg Chebbi. Magia del desierto.', 'icon' => 'wb_sunny'],
  ['id' => '2', 'title' => 'Medinas Milenarias', 'description' => 'Fez y Marrakech: laberintos de calles, zocos y artesanía viva. Historia en cada piedra.', 'icon' => 'location_city'],
  ['id' => '3', 'title' => 'Cultura Bereber', 'description' => 'Hospitalidad genuina, té a la menta y tradiciones ancestrales. Corazón auténtico.', 'icon' => 'diversity_3'],
  ['id' => '4', 'title' => 'Montañas del Atlas', 'description' => 'Valles verdes, pueblos bereberes y paisajes de película. Naturaleza imponente.', 'icon' => 'landscape'],
  ['id' => '5', 'title' => 'Gastronomía Única', 'description' => 'Tajines, cuscús y sabores que mezclan especias con tradición. Fiesta de sabores.', 'icon' => 'restaurant'],
  ['id' => '6', 'title' => 'Kasbahs Históricas', 'description' => 'Fortalezas de adobe que cuentan siglos de historia. Testigos del tiempo.', 'icon' => 'castle']
];
?>

<section class="py-12 bg-white dark:bg-gray-900">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-rowdies text-gray-900 dark:text-white mb-4">Lo que hace <span class="text-primary">único</span> a Marruecos</h2>
      <p class="text-gray-600 dark:text-gray-400">La puerta de África con alma mediterránea.</p>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
      <?php foreach ($featuresData as $feature): ?>
      <div class="bg-background-light dark:bg-surface-dark p-4 md:p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-lg transition duration-300 group text-center md:text-left">
        <div class="w-14 h-14 bg-green-50 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-4 md:mb-6 group-hover:scale-110 transition mx-auto md:mx-0">
          <?php echo ukiyo_icon( $feature['icon'], 'text-green-700 dark:text-green-400 text-3xl' ); ?>
        </div>
        <h3 class="text-xl font-satoshi font-bold text-gray-900 dark:text-white mb-3"><?php echo $feature['title']; ?></h3>
        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed"><?php echo $feature['description']; ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Experiences Carousel Section -->
<?php
$ukiyoCarouselItems = [
    [
        'id' => '1',
        'title' => 'Marrakech',
        'description' => 'La Perla del Sur: Djemaa el-Fna, zocos laberínticos, jardines secretos y arquitectura que te transporta a otra época.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.jpg',
        'tag' => 'Ciudad Imperial'
    ],
    [
        'id' => '2',
        'title' => 'Fez',
        'description' => 'La medina más antigua del mundo: curtidurías, artesanos y callejuelas donde el tiempo se detuvo hace siglos.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-fez.jpg',
        'tag' => 'Capital Espiritual'
    ],
    [
        'id' => '3',
        'title' => 'Merzouga',
        'description' => 'Dunas del Erg Chebbi: atardeceres en camello, noches bajo haimas bereberes y amaneceres sobre el desierto infinito.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-merzouga.jpg',
        'tag' => 'Sahara Marroquí'
    ],
    [
        'id' => '4',
        'title' => 'Ait Ben Haddou',
        'description' => 'La kasbah más fotogénica: adobe rojo, fortalezas de película y vistas al Alto Atlas desde lo alto.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-aitbenhaddou.jpg',
        'tag' => 'Patrimonio UNESCO'
    ],
    [
        'id' => '5',
        'title' => 'Rissani',
        'description' => 'Puerta del desierto: zocos auténticos, kasbahs olvidadas y el espíritu más puro del sur marroquí.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-rissani.jpg',
        'tag' => 'Oasis del Sur'
    ],
    [
        'id' => '6',
        'title' => 'Desierto en Camello',
        'description' => 'La experiencia definitiva: atravesar dunas doradas al atardecer, té a la menta bajo las estrellas.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-camello-marruecos.jpg',
        'tag' => 'Experiencia Nómada'
    ],
    [
        'id' => '7',
        'title' => 'Valle del Draa',
        'description' => 'Oasis de palmeras, kasbahs fortificadas y pistas que cruzan el Atlas hacia el desierto.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-draa.jpg',
        'tag' => 'Ruta del Sur'
    ],
    [
        'id' => '8',
        'title' => 'Azrou',
        'description' => 'El alma del Atlas Medio: bosques de cedros milenarios, macacos en libertad y la autenticidad bereber de Azrou.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-azrou.jpg',
        'tag' => 'Atlas medio'
    ]
];
?>

<section class="py-24 bg-background overflow-hidden relative">
    <div class="container mx-auto px-4 mb-12 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
    <div>
      <span class="uppercase tracking-widest text-primary text-sm font-bold">Experiencias Únicas</span>
      <h3 class="text-3xl font-rowdies text-gray-900 dark:text-white mt-2">Momentos Inolvidables</h3>
    </div>
        <div class="flex gap-4 self-end md:self-auto">
            <button id="scroll-left" class="p-3 border border-text-primary/20 rounded-full hover:bg-primary hover:text-white text-text-primary transition-colors duration-300" aria-label="Anterior">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m12 19-7-7 7-7"/>
                    <path d="M19 12H5"/>
                </svg>
            </button>
            <button id="scroll-right" class="p-3 border border-text-primary/20 rounded-full hover:bg-primary hover:text-white text-text-primary transition-colors duration-300" aria-label="Siguiente">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"/>
                    <path d="m12 5 7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Carousel Container -->
    <div 
        id="experiences-carousel"
        class="flex gap-6 px-4 md:px-8 pb-12 pt-8"
        style="overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none; scroll-behavior: smooth;"
    >
        <style>
            #experiences-carousel::-webkit-scrollbar {
                display: none;
            }
            .carousel-card {
                transition: transform 0.3s ease;
            }
            .carousel-card:hover {
                transform: translateY(-10px);
            }
            .carousel-card:hover .carousel-card-content {
                transform: translateY(-10px);
            }
        </style>

        <?php 

        foreach ($ukiyoCarouselItems as $expItem): 

            $imageUrl = get_template_directory_uri() . $expItem['imagePath'];
        ?>
        <div 
            style="
                flex-shrink: 0;
                width: 85vw;
                max-width: 400px;
                height: 500px;
                background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.8)), url('<?php echo esc_url($imageUrl); ?>');
                background-size: cover;
                background-position: center;
                border-radius: 1.5rem;
                overflow: hidden;
                position: relative;
            "
            class="carousel-card snap-center cursor-pointer"
        >
            <!-- Content -->
            <div class="carousel-card-content" style="position: absolute; bottom: 0; left: 0; padding: 2rem; width: 100%; transition: transform 0.3s ease; text-align: center;">
                <div style="color: #FF8C42; font-size: 12px; text-transform: uppercase; margin-bottom: 0.5rem; font-weight: 600;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline;">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    <?php echo esc_html($expItem['tag']); ?>
                </div>
                <h3 style="font-family: 'Rowdies', sans-serif; font-size: 2rem; margin-bottom: 0.75rem; color: white; font-weight: 600;"><?php echo esc_html($expItem['title']); ?></h3>
                <p style="color: rgba(255,255,255,0.8); line-height: 1.6;">
                    <?php echo esc_html($expItem['description']); ?>
                </p>

            </div>
        </div>
        <?php endforeach; ?>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('experiences-carousel');
    const leftBtn = document.getElementById('scroll-left');
    const rightBtn = document.getElementById('scroll-right');

    if (carousel && leftBtn && rightBtn) {
        // Calculate scroll amount based on card width + gap
        function getScrollAmount() {
            const firstCard = carousel.querySelector('.carousel-card');
            if (firstCard) {
                const cardWidth = firstCard.offsetWidth;
                const gap = 24; // gap-6 = 24px
                return cardWidth + gap;
            }
            return 424; // fallback: 400px card + 24px gap
        }

        leftBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
        });

        // Autoplay
        function handleAutoplay() {
            // Check if we are at the end
            if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 10) {
                 carousel.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                 rightBtn.click();
            }
        }

        let autoPlayInterval = setInterval(handleAutoplay, 4000);

        // Loop logic for button
        rightBtn.addEventListener('click', () => {
             if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 10) {
                 carousel.scrollTo({ left: 0, behavior: 'smooth' });
             } else {
                 carousel.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
             }
        });

        // Pause/Reset on interaction
        [leftBtn, rightBtn, carousel].forEach(el => {
            el.addEventListener('mousedown', resetTimer);
            el.addEventListener('touchstart', resetTimer);
        });

        function resetTimer() {
            clearInterval(autoPlayInterval);
            autoPlayInterval = setInterval(handleAutoplay, 4000);
        }
    }
});
</script>

<!-- AUTORES (mini bios) -->
  <section class="py-20 bg-background">
  <div class="container mx-auto px-6">
    
    <div class="text-center mb-16">
      <h2 class="text-4xl font-rowdies text-text-primary mb-4">Conoce a nuestros <span class="text-primary">anfitriones</span></h2>
      <p class="text-text-secondary max-w-xl mx-auto">Un viaje no son solo lugares, son personas. En Ukiyo, trabajamos con guías que no solo muestran el camino, sino que comparten su alma y el amor por su tierra.</p>
    </div>

    <div class="grid gap-8 md:grid-cols-4">

      <!-- CARD MOHA -->
      <article class="rounded-2xl border-1 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <div class="aspect-[3/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/autor-moha2.webp"
            alt="Moha, guía marroquí"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] bg-background mask-image"
          />
        </div>

        <div class="p-4">
          <h3 class="text-base font-semibold text-text-primary">
            Moha · Guía marroquí
          </h3>
          <p class="text-text-secondary mt-1 text-sm leading-relaxed">
            Nacido en el Atlas, conoce el desierto por dentro: los zocos que importan, 
            los silencios que merecen la pena y el té en el lugar adecuado.
          </p>
        </div>
      </article>
      <article class="rounded-2xl border-1 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <div class="aspect-[3/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/Mohamed.png"
            alt="Mohamed, guía marroquí"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] bg-background mask-image"
          />
        </div>

        <div class="p-4">
          <h3 class="text-base font-semibold text-text-primary">
            Mohamed · Guía marroquí
          </h3>
          <p class="text-text-secondary mt-1 text-sm leading-relaxed">
            Nacido en el Atlas, conoce el desierto por dentro: los zocos que importan, 
            los silencios que merecen la pena y el té en el lugar adecuado.
          </p>
        </div>
      </article>
      <article class="rounded-2xl border-1 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <div class="aspect-[3/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/Hassan.png"
            alt="Hassan, guía marroquí"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] bg-background mask-image"
          />
        </div>

        <div class="p-4">
          <h3 class="text-base font-semibold text-text-primary">
            Hassan · Guía marroquí
          </h3>
          <p class="text-text-secondary mt-1 text-sm leading-relaxed">
            Nacido en el Atlas, conoce el desierto por dentro: los zocos que importan, 
            los silencios que merecen la pena y el té en el lugar adecuado.
          </p>
        </div>
      </article>
    </div>
  </div>
</section>


<!-- Practical Information -->
<section class="py-24 bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl md:text-4xl font-rowdies text-center mb-16 text-gray-900 dark:text-white">Recomendaciones <span class="text-primary">UKIYO</span></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-5xl mx-auto">
      <div class="bg-background-light dark:bg-surface-dark p-8 rounded-2xl border border-dashed border-gray-300 dark:border-gray-600 relative">
        <div class="absolute -top-5 left-8 bg-primary text-white px-4 py-1 rounded-full text-sm font-bold tracking-wide shadow-md">
          Preparación
        </div>
        <h3 class="text-xl font-rowdies mb-6 mt-2 text-gray-800 dark:text-white flex items-center gap-2">
          Equipaje Esencial
        </h3>
        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Ropa cómoda y respetuosa (cubrir hombros y rodillas).</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Calzado cómodo para calles empedradas de medinas.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Protector solar y sombrero para el desierto.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Apertura a regatear en zocos (es parte de la cultura).</span>
          </li>
        </ul>
      </div>
      <div class="bg-background-light dark:bg-surface-dark p-8 rounded-2xl border border-dashed border-gray-300 dark:border-gray-600 relative">
        <div class="absolute -top-5 left-8 bg-secondary text-white px-4 py-1 rounded-full text-sm font-bold tracking-wide shadow-md">
          A tener en cuenta
        </div>
        <h3 class="text-xl font-rowdies mb-6 mt-2 text-gray-800 dark:text-white flex items-center gap-2">
          Notas Importantes
        </h3>
        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-green-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Nivel físico moderado (Atlas y desierto).</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-green-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Respeto por tradiciones musulmanas (especialmente durante Ramadán).</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-green-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Medidas muy restrictivas con el uso del dron</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-green-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Seguro de viaje recomendado (no incluido).</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php
ukiyo_render_related_internal_links(
  [
    'title'   => 'Otros viajes relacionados',
    'intro'   => 'Si buscas cultura, paisajes potentes y una ruta con identidad, estos destinos son buenas alternativas a un viaje a medida a Marruecos.',
    'current' => 'destination_marruecos',
    'keys'    => [ 'destination_italia', 'destination_lanzarote', 'destination_colombia', 'destination_indonesia' ],
  ]
);

ukiyo_render_destination_blog_posts(
  [
    'title'           => 'Guías para preparar tu viaje a Marruecos',
    'intro'           => 'Presupuesto, ruta, medinas, desierto y época ideal para entender qué Marruecos encaja contigo.',
    'destination_key' => 'destination_marruecos',
    'category'        => 'marruecos',
  ]
);
?>

<section class="py-24 text-center bg-background-light dark:bg-background-dark">
  <div class="container mx-auto px-4">
    <h2 class="text-4xl md:text-5xl font-rowdies text-gray-900 dark:text-white mb-6">¿Listo para vivir Marruecos?</h2>
    <p class="text-lg text-gray-600 dark:text-gray-400 mb-10 max-w-2xl mx-auto">
      Piérdete en los zocos de Marrakech, duerme bajo las estrellas del Sahara y déjate llevar por la hospitalidad bereber.
    </p>
    <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
      <a href="https://wa.me/message/CS2LNI6YHSETO1" target="_blank" class="btn-primary text-text-secondary flex items-center shadow-md hover:shadow-lg justify-center gap-2">
        <img width="64" height="64" src="https://img.icons8.com/cotton/64/whatsapp--v4.png" alt="Contactar con Viajes Ukiyo por WhatsApp" class="w-6 h-6"/>
        Escríbenos por WhatsApp
      </a>
      <a href="<?php echo esc_url( ukiyo_get_route_url( 'destinations' ) ); ?>" class="bg-white dark:bg-surface-dark hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-900 dark:text-white border border-gray-200 dark:border-gray-600 font-medium py-4 px-8 rounded-full shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
        Explorar destinos a medida
      </a>
    </div>
  </div>
</section>
  
<?php get_footer(); ?>
