<?php
/**
 * Template Name: Lanzarote Experience
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
  <img alt="Paisaje volcánico de Lanzarote" class="absolute inset-0 w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/images/spain/lanzarote/vista-aerea-lanzarote.webp" loading="eager" fetchpriority="high" decoding="async"/>
  <div class="absolute inset-0 hero-gradient flex flex-col items-center justify-center text-center px-4">
    <?php
    ukiyo_render_breadcrumbs([
        'class'      => 'mb-6 justify-center text-white/80',
        'link_class' => 'text-white/80 hover:text-white transition-colors',
    ]);
    ?>
    <span class="text-white/80 uppercase tracking-[0.3em] text-sm mb-4">Islas Canarias · España</span>
    <h1 class="text-6xl md:text-8xl font-rowdies text-white font-bold mb-2 text-shadow">LANZAROTE</h1>
    <p class="text-2xl md:text-4xl font-satoshi text-white/90 italic font-light">Volcanes y Océano</p>
    <div class="mt-8 max-w-2xl text-white/80 text-lg md:text-xl font-light leading-relaxed">
      Paisajes lunares, arte de Manrique y playas salvajes en la isla más singular de Canarias.
    </div>
  </div>
</header>

<!-- Info Bar -->
<div class="relative -mt-16 container mx-auto px-4 z-20">
  <div class="bg-surface-light dark:bg-surface-dark shadow-xl rounded-2xl p-6 md:p-8 grid grid-cols-2 gap-4 md:flex md:flex-wrap md:justify-between md:items-center md:gap-6 border border-gray-100 dark:border-gray-700">
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'calendar_month' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Mejor Época</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Todo el año</p>
      </div>
    </div>
    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'flight' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Vuelo</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">~2,5h desde Madrid</p>
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
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Subtropical seco</p>
      </div>
    </div>
  </div>
</div>

<!-- Intro Section -->
<section class="py-24 px-4 container mx-auto">
  <div class="max-w-3xl mx-auto text-center space-y-8">
    <h2 class="text-4xl md:text-5xl font-rowdies text-secondary dark:text-white font-medium leading-tight">
      Donde la tierra <span class="text-primary italic">respira</span>
    </h2>
    <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-light">
      <span class="font-bold text-gray-800 dark:text-gray-100">Lanzarote</span> no es solo una isla, es una obra de arte esculpida por volcanes. Un lugar donde la naturaleza más extrema convive con la visión de César Manrique, creando paisajes que parecen de otro planeta. Declarada Reserva de la Biosfera por la UNESCO, Lanzarote es el destino perfecto para viajeros que buscan belleza salvaje, cultura auténtica y una calma que no se encuentra en ningún otro lugar.
    </p>
    <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
  </div>
</section>

<!-- Features Section -->
<?php
$featuresData = [
  ['id' => '1', 'title' => 'Paisajes Volcánicos', 'description' => 'Timanfaya, el Volcán del Cuervo y campos de lava que transforman la isla en un paisaje marciano. Naturaleza en estado bruto.', 'icon' => 'landscape'],
  ['id' => '2', 'title' => 'Legado de Manrique', 'description' => 'Los Jameos del Agua, el Mirador del Río y la Fundación. Arte y naturaleza fundidos en una sola visión.', 'icon' => 'palette'],
  ['id' => '3', 'title' => 'Playas Salvajes', 'description' => 'Papagayo, Las Conchas y Famara. Arena dorada, negra y aguas cristalinas en calas protegidas del viento.', 'icon' => 'beach_access'],
  ['id' => '4', 'title' => 'Gastronomía Volcánica', 'description' => 'Vinos de La Geria, quesos artesanales y pescado fresco del día. Sabores únicos nacidos de la tierra volcánica.', 'icon' => 'restaurant'],
  ['id' => '5', 'title' => 'La Graciosa', 'description' => 'La octava isla canaria: sin asfalto, sin prisas, solo arena blanca y un mar turquesa que parece el Caribe.', 'icon' => 'sailing'],
  ['id' => '6', 'title' => 'Reserva de la Biosfera', 'description' => 'Toda la isla reconocida por la UNESCO. Un modelo de desarrollo sostenible y respeto por el entorno.', 'icon' => 'eco']
];
?>

<section class="py-12 bg-white dark:bg-gray-900">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-rowdies text-gray-900 dark:text-white mb-4">Lo que hace <span class="text-primary">única</span> a Lanzarote</h2>
      <p class="text-gray-600 dark:text-gray-400">Razones para perderse y encontrarse con UKIYO en la isla de los volcanes.</p>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
      <?php foreach ($featuresData as $feature): ?>
      <div class="bg-background-light dark:bg-surface-dark p-4 md:p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-lg transition duration-300 group text-center md:text-left">
        <div class="w-14 h-14 bg-amber-50 dark:bg-amber-900/30 rounded-full flex items-center justify-center mb-4 md:mb-6 group-hover:scale-110 transition mx-auto md:mx-0">
          <?php echo ukiyo_icon( $feature['icon'], 'text-amber-700 dark:text-amber-400 text-3xl' ); ?>
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
        'title' => 'Timanfaya',
        'description' => 'El Parque Nacional de los volcanes: geiseres, coladas de lava y paisajes imposibles. La ruta de los volcanes es imprescindible.',
        'imagePath' => '/images/spain/lanzarote/Volcan_Cuervo_Lanzarote.webp',
        'tag' => 'Parque Nacional'
    ],
    [
        'id' => '2',
        'title' => 'La Graciosa',
        'description' => 'La isla más pequeña de Canarias. Playas vírgenes de arena blanca, aguas turquesas y caminos de tierra sin un solo semáforo.',
        'imagePath' => '/images/spain/lanzarote/La_Graciosa.jpg',
        'tag' => 'Archipiélago Chinijo'
    ],
    [
        'id' => '3',
        'title' => 'Jameos del Agua',
        'description' => 'La obra maestra de César Manrique: una cueva volcánica transformada en espacio cultural con piscina natural y auditorio.',
        'imagePath' => '/images/spain/lanzarote/Jameos_Lanzarote.jpg',
        'tag' => 'Arte y Naturaleza'
    ],
    [
        'id' => '4',
        'title' => 'Playa de Papagayo',
        'description' => 'Las calas más espectaculares de la isla: arena dorada, aguas cristalinas y acantilados protegidos del viento.',
        'imagePath' => '/images/spain/lanzarote/playa-papagayo-en-el-sur-de-lanzarote-islas-canarias-s1713915070.avif',
        'tag' => 'Monumento Natural'
    ],
    [
        'id' => '5',
        'title' => 'Teguise',
        'description' => 'La antigua capital de la isla: arquitectura colonial, mercadillo dominical y la esencia de la Lanzarote más auténtica.',
        'imagePath' => '/images/spain/lanzarote/Teguise_Lanzarote.jpg',
        'tag' => 'Casco Histórico'
    ],
    [
        'id' => '6',
        'title' => 'Cueva de los Verdes',
        'description' => 'Un túnel volcánico de más de 6 km formado por la erupción del Volcán de la Corona. Una catedral subterránea natural.',
        'imagePath' => '/images/spain/lanzarote/Cueva_Verdes_Lanzarote.jpg',
        'tag' => 'Geología'
    ],
    [
        'id' => '7',
        'title' => 'Mirador del Río',
        'description' => 'La obra de Manrique con las vistas más impresionantes: toda La Graciosa y el archipiélago Chinijo a tus pies.',
        'imagePath' => '/images/spain/lanzarote/miradorrisco_lanzarote.jpg',
        'tag' => 'Vistas Panorámicas'
    ],
    [
        'id' => '8',
        'title' => 'La Geria',
        'description' => 'El paisaje vinícola más insólito del mundo: viñas plantadas en hoyos volcánicos protegidas por muros de piedra semicirculares.',
        'imagePath' => '/images/spain/lanzarote/stratvs_lanzarote.jpg',
        'tag' => 'Enoturismo'
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
        function getScrollAmount() {
            const firstCard = carousel.querySelector('.carousel-card');
            if (firstCard) {
                const cardWidth = firstCard.offsetWidth;
                const gap = 24;
                return cardWidth + gap;
            }
            return 424;
        }

        leftBtn.addEventListener('click', () => {
            const amount = getScrollAmount();
            carousel.scrollBy({ left: -amount, behavior: 'smooth' });
        });

        // Autoplay
        function handleAutoplay() {
            if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 10) {
                 carousel.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                 rightBtn.click();
            }
        }

        let autoPlayInterval = setInterval(handleAutoplay, 4000);

        rightBtn.addEventListener('click', () => {
             const amount = getScrollAmount();
             if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 10) {
                 carousel.scrollTo({ left: 0, behavior: 'smooth' });
             } else {
                 carousel.scrollBy({ left: amount, behavior: 'smooth' });
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
            <span class="text-gray-600 dark:text-gray-300 text-sm">Ropa ligera y cortavientos: el viento alisio sopla con frecuencia.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Calzado cómodo con buena suela para caminar sobre terreno volcánico.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Protección solar alta y gafas de sol: la radiación es intensa todo el año.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Bañador y escarpines para las playas rocosas y calas.</span>
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
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-amber-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Es imprescindible coche de alquiler para recorrer la isla a tu ritmo.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-amber-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Reserva la entrada a Timanfaya con antelación, especialmente en temporada alta.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-amber-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Para La Graciosa, el ferry sale desde Órzola y conviene reservar con antelación.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-amber-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Respeta el entorno volcánico: no salirse de los senderos marcados en los parques naturales.</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<?php
ukiyo_render_related_internal_links(
  [
    'title'   => 'Otros viajes relacionados',
    'intro'   => 'Si te atraen las islas, el paisaje volcánico y los viajes tranquilos, estos destinos refuerzan la misma intención que un viaje a medida a Lanzarote.',
    'current' => 'destination_lanzarote',
    'keys'    => [ 'destination_marruecos', 'destination_italia', 'destination_costa_rica', 'destination_colombia' ],
  ]
);

ukiyo_render_destination_blog_posts(
  [
    'title'           => 'Guías para preparar tu viaje a Lanzarote',
    'intro'           => 'Clima, ruta, presupuesto y lugares imprescindibles para vivir Lanzarote con calma y buena lectura de la isla.',
    'destination_key' => 'destination_lanzarote',
    'category'        => 'lanzarote',
  ]
);
?>

<section class="py-24 text-center bg-background-light dark:bg-background-dark">
  <div class="container mx-auto px-4">
    <h2 class="text-4xl md:text-5xl font-satoshi text-gray-900 dark:text-white mb-6">¿Listo para vivir Lanzarote?</h2>
    <p class="text-lg text-gray-600 dark:text-gray-400 mb-10 max-w-2xl mx-auto">
      Deja de soñarlo y empieza a vivirlo. Estamos listos para diseñar tu escapada perfecta a la isla de los volcanes.
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
