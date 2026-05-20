<?php
/**
 * Template Name: Costarica Experience
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
  <img alt="Toucan in Costa Rican rainforest" class="absolute inset-0 w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-a-costa-rica-personalizados-monteverde-bosque-nuboso.jpg" loading="eager" fetchpriority="high" decoding="async"/>
  <div class="absolute inset-0 hero-gradient flex flex-col items-center justify-center text-center px-4">
    <?php
    ukiyo_render_breadcrumbs([
        'class'      => 'mb-6 justify-center text-white/80',
        'link_class' => 'text-white/80 hover:text-white transition-colors',
    ]);
    ?>
    <span class="text-white/80 uppercase tracking-[0.3em] text-sm mb-4">América Central</span>
    <h1 class="text-6xl md:text-8xl font-rowdies text-white font-bold mb-2 text-shadow">COSTA RICA</h1>
    <p class="text-2xl md:text-4xl font-satoshi text-white/90 italic font-light">Biodiversidad Pura</p>
    <div class="mt-8 max-w-2xl text-white/80 text-lg md:text-xl font-light leading-relaxed">
      Explora la Península de Osa, Corcovado y los bosques nubosos de Monteverde.
    </div>
  </div>
</header>

<div class="relative -mt-16 container mx-auto px-4 z-20">
  <div class="bg-surface-light dark:bg-surface-dark shadow-xl rounded-2xl p-6 md:p-8 grid grid-cols-2 gap-4 md:flex md:flex-wrap md:justify-between md:items-center md:gap-6 border border-gray-100 dark:border-gray-700">
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'calendar_month' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Mejor Época</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Dic - Abr</p>
      </div>
    </div>
    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'currency_exchange' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Moneda</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Colón (CRC)</p>
      </div>
    </div>
    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'language' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Idioma</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Español</p>
      </div>
    </div>
    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'thermostat' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Clima</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Tropical</p>
      </div>
    </div>
  </div>
</div>

<section class="py-24 px-4 container mx-auto">
  <div class="max-w-3xl mx-auto text-center space-y-8">
    <h2 class="text-4xl md:text-5xl font-rowdies text-secondary dark:text-white font-medium leading-tight">
      Donde la naturaleza <span class="text-primary italic">manda</span>
    </h2>
    <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-light">
      <span class="font-bold text-gray-800 dark:text-gray-100">Costa Rica</span> no es solo un destino, es un estado mental. Es un país donde selvas infinitas tocan volcanes activos, donde la fauna salvaje se pasea libremente y playas vírgenes bañan ambos océanos. Es el destino perfecto para viajeros que buscan una conexión real con la vida local, lejos del ruido y cerca de la esencia.
    </p>
    <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
  </div>
</section>

<!-- Features Section -->
<?php
$featuresData = [
  ['id' => '1', 'title' => 'Naturaleza Salvaje', 'description' => 'El 5% de la biodiversidad mundial concentrada en un solo lugar. Observa perezosos, tucanes y jaguares en su hábitat natural.', 'icon' => 'eco'],
  ['id' => '2', 'title' => 'Dos Océanos', 'description' => 'Despierta con el amanecer caribeño y despide el día con el atardecer del Pacífico. Dos mundos acuáticos en el mismo viaje.', 'icon' => 'water_drop'],
  ['id' => '3', 'title' => 'Cultura "Pura Vida"', 'description' => 'La auténtica hospitalidad tica te espera. Pioneros en ecoturismo y sostenibilidad, aprende a vivir con menos prisa.', 'icon' => 'diversity_3'],
  ['id' => '4', 'title' => 'Aventura Real', 'description' => 'Rafting de clase mundial, canopy entre nubes y trekking volcánico.', 'icon' => 'explore'],
  ['id' => '5', 'title' => 'Biodiversidad', 'description' => 'Observa perezosos, tucanes y jaguares en su hábitat.', 'icon' => 'park'],
  ['id' => '6', 'title' => 'Viaje Responsable', 'description' => 'Pioneros en ecoturismo y sostenibilidad global.', 'icon' => 'favorite']
];
?>

<section class="py-12 bg-white dark:bg-gray-900">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-rowdies text-gray-900 dark:text-white mb-4">Lo que hace <span class="text-primary">única</span> a Costa Rica</h2>
      <p class="text-gray-600 dark:text-gray-400">Razones para perderse y encontrarse con UKIYO en Costa Rica.</p>
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
        'title' => 'Corcovado',
        'description' => 'La joya de la Península de Osa: selva primaria, playas salvajes y muchísima fauna. El lugar más intenso biológicamente.',
        'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-mono.jpg',
        'tag' => 'Península de Osa'
    ],
    [
        'id' => '2',
        'title' => 'Monteverde',
        'description' => 'El bosque nuboso más conocido: puentes colgantes, niebla, orquídeas y aves únicas en un clima fresco.',
        'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-monteverde.jpg',
        'tag' => 'Bosque Nuboso'
    ],
    [
        'id' => '3',
        'title' => 'Tortuguero',
        'description' => 'La Costa Rica de canales: selva, agua y Caribe. Safaris en bote y desove de tortugas en temporada.',
        'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-atardecer.jpg',
        'tag' => 'Caribe Norte'
    ],
    [
        'id' => '4',
        'title' => 'La Fortuna',
        'description' => 'Base para explorar el Volcán Arenal: cataratas, termales relajantes y rutas de senderismo con vistas.',
        'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-rio-celeste.jpg',
        'tag' => 'Volcán Arenal'
    ],
    [
        'id' => '5',
        'title' => 'Puerto Viejo',
        'description' => 'El Caribe Sur más bohemio: selva pegada al mar, ritmo afrocaribeño y el Parque Nacional Cahuita.',
        'imagePath' => '/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-mono.jpg',
        'tag' => 'Caribe Sur'
    ],
    [
        'id' => '6',
        'title' => 'Manuel Antonio',
        'description' => 'Playas paradisíacas y selva tropical en perfecta armonía. Monos capuchinos y perezosos a metros del mar.',
        'imagePath' => '/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-tucanazul.jpg',
        'tag' => 'Pacífico Central'
    ],
    [
        'id' => '7',
        'title' => 'Cañón Jurásico',
        'description' => 'El río de aguas turquesas más impresionante del país. Naturaleza volcánica en estado puro.',
        'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-cañonjurasico.jpg',
        'tag' => 'Tenorio'
    ],
    [
        'id' => '8',
        'title' => 'Guanacaste',
        'description' => 'Playas vírgenes del Pacífico, surf de clase mundial y atardeceres inolvidables.',
        'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-guanacaste.jpg',
        'tag' => 'Pacífico Norte'
    ]
];
?>

<section class="py-12 bg-white dark:bg-gray-900 overflow-hidden relative">
  <div class="container mx-auto px-4 mb-12 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
    <div>
      <span class="uppercase tracking-widest text-primary text-sm font-bold">Experiencias Únicas</span>
      <h3 class="text-3xl font-rowdies text-gray-900 dark:text-white mt-2">Momentos Inolvidables</h3>
    </div>
    <div class="flex gap-4 self-end md:self-auto">
      <button id="scroll-left" class="p-3 border border-gray-200 dark:border-gray-700 rounded-full hover:bg-primary hover:text-white text-gray-900 dark:text-white transition-colors duration-300" aria-label="Anterior">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m12 19-7-7 7-7"/>
          <path d="M19 12H5"/>
        </svg>
      </button>
      <button id="scroll-right" class="p-3 border border-gray-200 dark:border-gray-700 rounded-full hover:bg-primary hover:text-white text-gray-900 dark:text-white transition-colors duration-300" aria-label="Siguiente">
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
        // Debug: Check if carousel is scrollable
        console.log('Carousel dimensions:', {
            scrollWidth: carousel.scrollWidth,
            clientWidth: carousel.clientWidth,
            isScrollable: carousel.scrollWidth > carousel.clientWidth,
            overflowX: window.getComputedStyle(carousel).overflowX
        });

        // Calculate scroll amount based on card width + gap
        function getScrollAmount() {
            const firstCard = carousel.querySelector('.carousel-card');
            if (firstCard) {
                const cardWidth = firstCard.offsetWidth;
                const gap = 24; // gap-6 = 24px
                console.log('Card width:', cardWidth, 'Gap:', gap, 'Total:', cardWidth + gap);
                return cardWidth + gap;
            }
            return 424; // fallback: 400px card + 24px gap
        }

        leftBtn.addEventListener('click', () => {
            const amount = getScrollAmount();
            console.log('Scroll left:', amount, 'Current scroll:', carousel.scrollLeft);
            carousel.scrollBy({ left: -amount, behavior: 'smooth' });
            setTimeout(() => {
                console.log('After scroll left, new position:', carousel.scrollLeft);
            }, 500);
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
             const amount = getScrollAmount();
             if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 10) {
                 carousel.scrollTo({ left: 0, behavior: 'smooth' });
             } else {
                 carousel.scrollBy({ left: amount, behavior: 'smooth' });
             }
             setTimeout(() => {
                 console.log('After scroll right, new position:', carousel.scrollLeft);
             }, 500);
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

      <!-- CARD LUIS -->
      <article class="rounded-2xl border-1 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <!-- Imagen más alta -->
        <div class="aspect-[3/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/autor-luis.png"
            alt="Luis Acuña, guía costarricense"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] bg-background mask-image"
          />
        </div>

        <!-- Texto más compacto -->
        <div class="p-4">
          <h3 class="text-base font-semibold text-text-primary">
            Luis · Guía costarricense y fotógrafo
          </h3>
          <p class="text-text-secondary mt-1 text-sm leading-relaxed">
            Lleva años esperando la luz justa en humedales y bosques tropicales. 
            Su Pantanal es silencio, paciencia y respeto por la fauna.
          </p>
        </div>

      </article>

      <article class="rounded-2xl border-1 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <!-- Imagen más alta -->
        <div class="aspect-[3/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/alexis/alexis.png"
            alt="Alexis Torres, conservacionista costarricense"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] bg-background mask-image"
          />
        </div>

        <!-- Texto más compacto -->
        <div class="p-4">
          <h3 class="text-base font-semibold text-text-primary">
            Alexis · Conservacionista y guía
          </h3>
          <p class="text-text-secondary mt-1 text-sm leading-relaxed">
            Amante de los animales y de su país. 
            Tiene un santuario de perezosos donde los cuida y rehabilita.
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
            <span class="text-gray-600 dark:text-gray-300 text-sm">Ropa ligera de secado rápido y capa impermeable (poncho/chubasquero).</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Calzado cerrado con buena suela (botas de trekking ya domadas).</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Protector solar biodegradable y repelente de insectos fuerte.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Bolsa estanca para proteger cámara y móvil de la humedad.</span>
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
            <span class="text-gray-600 dark:text-gray-300 text-sm">Se requiere un nivel físico moderado para los senderos húmedos y el calor.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-green-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Respeto absoluto por la fauna: no alimentar ni tocar animales.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-green-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Nuestros grupos son pequeños (máx. 8) para asegurar una experiencia íntima.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-green-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Se recomienda encarecidamente seguro de viaje con cobertura médica.</span>
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
    'intro'   => 'Si buscas naturaleza intensa, fauna y rutas con mucho ritmo local, estos destinos conectan bien con un viaje a medida a Costa Rica.',
    'current' => 'destination_costa_rica',
    'keys'    => [ 'destination_colombia', 'destination_indonesia', 'destination_lanzarote', 'destination_marruecos' ],
  ]
);

ukiyo_render_destination_blog_posts(
  [
    'title'           => 'Guías para preparar tu viaje a Costa Rica',
    'intro'           => 'Clima, presupuesto, ruta y lugares clave para organizar Costa Rica sin convertir el viaje en una carrera.',
    'destination_key' => 'destination_costa_rica',
    'category'        => 'costa-rica',
  ]
);
?>

<section class="py-24 text-center bg-background-light dark:bg-background-dark">
  <div class="container mx-auto px-4">
    <h2 class="text-4xl md:text-5xl font-satoshi text-gray-900 dark:text-white mb-6">¿Listo para vivir Costa Rica?</h2>
    <p class="text-lg text-gray-600 dark:text-gray-400 mb-10 max-w-2xl mx-auto">
      Deja de soñarlo y empieza a vivirlo. Estamos listos para diseñar tu aventura perfecta en Costa Rica a medida.
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
