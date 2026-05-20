<?php
/**
 * Template Name: Italia Experience
 */

get_header();

if ( ! function_exists( 'ukiyo_italia_asset_url' ) ) {
	function ukiyo_italia_asset_url( $relative_path ) {
		$relative_path = '/' . ltrim( $relative_path, '/' );
		$file_path     = get_template_directory() . $relative_path;

		if ( file_exists( $file_path ) ) {
			return get_template_directory_uri() . $relative_path;
		}

		return '';
	}
}

if ( ! function_exists( 'ukiyo_italia_background_style' ) ) {
	function ukiyo_italia_background_style( $relative_path, $fallback_gradient ) {
		$image_url = ukiyo_italia_asset_url( $relative_path );

		if ( $image_url ) {
			return "background: linear-gradient(to bottom, rgba(0,0,0,0.18), rgba(0,0,0,0.72)), url('{$image_url}'); background-size: cover; background-position: center;";
		}

		return "background: {$fallback_gradient};";
	}
}

$hero_background = ukiyo_italia_background_style(
	'/images/italia/viajes-a-italia-personalizados-dolomitas.webp',
	'radial-gradient(circle at 20% 20%, rgba(214, 131, 84, 0.42), transparent 32%), radial-gradient(circle at 80% 15%, rgba(255, 233, 190, 0.22), transparent 24%), linear-gradient(135deg, #3f332f 0%, #8a5b46 46%, #d0b08f 100%)'
);

$features_data = [
	[
		'id'          => '1',
		'title'       => 'Ritmo y belleza',
		'description' => 'Italia tiene el don de hacer que incluso los trayectos formen parte del viaje. Se vive despacio, con gusto y con intención.',
		'icon'        => 'local_cafe',
	],
	[
		'id'          => '2',
		'title'       => 'Arte cotidiano',
		'description' => 'Roma, Florencia o Venecia no se visitan: se atraviesan como museos vivos donde la historia aparece en cada esquina.',
		'icon'        => 'museum',
	],
	[
		'id'          => '3',
		'title'       => 'Paisajes cambiantes',
		'description' => 'Dolomitas, lagos alpinos, costas mediterráneas y colinas infinitas. Un mismo país con muchos viajes posibles.',
		'icon'        => 'landscape',
	],
	[
		'id'          => '4',
		'title'       => 'Gastronomía con raíz',
		'description' => 'Aquí comer bien no es un extra. Es parte esencial de la experiencia y una forma de entender cada región.',
		'icon'        => 'restaurant',
	],
	[
		'id'          => '5',
		'title'       => 'Pueblos con alma',
		'description' => 'Borgos suspendidos en el tiempo, plazas pequeñas y alojamientos llenos de carácter para bajar el ritmo.',
		'icon'        => 'holiday_village',
	],
	[
		'id'          => '6',
		'title'       => 'Viajes a medida',
		'description' => 'Italia funciona especialmente bien cuando se diseña con criterio: menos saltos, más profundidad y mucho sentido estético.',
		'icon'        => 'route',
	],
];

$ukiyo_carousel_items = [
	[
		'id'          => '1',
		'title'       => 'Dolomitas',
		'description' => 'Montañas dramáticas, refugios con encanto y rutas escénicas para una Italia más limpia, vertical y silenciosa.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-dolomitas.webp',
		'tag'         => 'Norte alpino',
		'fallback'    => 'linear-gradient(160deg, #42515e 0%, #8e7b68 45%, #d9c0a2 100%)',
	],
	[
		'id'          => '2',
		'title'       => 'Toscana',
		'description' => 'Colinas onduladas, cipreses, vino y pueblos de piedra. Un clásico que solo funciona bien cuando se vive sin prisa.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-toscana.jpg',
		'tag'         => 'Centro histórico',
		'fallback'    => 'linear-gradient(160deg, #8e6842 0%, #c9a06d 48%, #f0dcc1 100%)',
	],
	[
		'id'          => '2b',
		'title'       => 'Florencia',
		'description' => 'La ciudad donde el arte y la proporción parecen estar en todas partes. Ideal para vivirla con calma, no solo para tacharla.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-florencia.jpg',
		'tag'         => 'Renacimiento',
		'fallback'    => 'linear-gradient(160deg, #6f4b3e 0%, #b47b5b 46%, #e7cfb0 100%)',
	],
	[
		'id'          => '3',
		'title'       => 'Costa Amalfitana',
		'description' => 'Carreteras imposibles, terrazas frente al mar y pueblos suspendidos sobre acantilados bañados por luz mediterránea.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-costa-amalfitana.webp',
		'tag'         => 'Sur mediterráneo',
		'fallback'    => 'linear-gradient(160deg, #2f626e 0%, #5ca9a8 44%, #d8c9aa 100%)',
	],
	[
		'id'          => '3b',
		'title'       => 'Cinque Terre',
		'description' => 'Senderos sobre el mar, pueblos verticales y luz ligur. Funciona especialmente bien combinado con bases tranquilas y buen ritmo.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-cinque-terre.jpg',
		'tag'         => 'Liguria',
		'fallback'    => 'linear-gradient(160deg, #2f5461 0%, #5f8ea2 42%, #e0c7a4 100%)',
	],
	[
		'id'          => '4',
		'title'       => 'Sicilia',
		'description' => 'Una isla de capas: barroco, volcanes, mar, mercados y una energía más intensa, caótica y profundamente seductora.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-sicilia.jpeg',
		'tag'         => 'Isla con carácter',
		'fallback'    => 'linear-gradient(160deg, #5c4035 0%, #b66b45 42%, #f2c782 100%)',
	],
	[
		'id'          => '5',
		'title'       => 'Venecia',
		'description' => 'La mejor versión aparece cuando se duerme allí, se madruga y se explora más allá de las rutas obvias.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-venecia.avif',
		'tag'         => 'Laguna veneciana',
		'fallback'    => 'linear-gradient(160deg, #3f4f66 0%, #7d9bb4 44%, #d9cab4 100%)',
	],
	[
		'id'          => '6',
		'title'       => 'Roma',
		'description' => 'Capas históricas, trattorias de barrio y belleza monumental. Una ciudad que exige selección para no quedarse en la superficie.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-roma.webp',
		'tag'         => 'Eterna',
		'fallback'    => 'linear-gradient(160deg, #54413c 0%, #9c6f55 44%, #dcc3a0 100%)',
	],
	[
		'id'          => '6b',
		'title'       => 'Nápoles',
		'description' => 'Más cruda, más viva y más intensa. Una ciudad para entrar en la energía del sur y asomarse a Pompeya o la costa.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-napoles.jpg',
		'tag'         => 'Campania',
		'fallback'    => 'linear-gradient(160deg, #4b3a34 0%, #945d47 44%, #dcb58d 100%)',
	],
	[
		'id'          => '7',
		'title'       => 'Puglia',
		'description' => 'Masserias, calas luminosas y pueblos blancos. Una Italia más relajada, solar y todavía menos transitada.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-puglia.webp',
		'tag'         => 'Adriático',
		'fallback'    => 'linear-gradient(160deg, #3e6a64 0%, #82b6a7 46%, #efe0c7 100%)',
	],
	[
		'id'          => '7b',
		'title'       => 'Siena',
		'description' => 'Una de las ciudades más elegantes de la Toscana: ladrillo, plazas perfectas y una escala mucho más habitable que otras grandes iconos.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-siena.jpg',
		'tag'         => 'Toscana interior',
		'fallback'    => 'linear-gradient(160deg, #70493d 0%, #b17657 44%, #ebd0b2 100%)',
	],
	[
		'id'          => '8',
		'title'       => 'Lagos del norte',
		'description' => 'Villas elegantes, jardines, pueblos junto al agua y una atmósfera serena para un viaje más contemplativo.',
		'imagePath'   => '/images/italia/viajes-a-italia-personalizados-lago-di-como.jpeg',
		'tag'         => 'Lagos italianos',
		'fallback'    => 'linear-gradient(160deg, #35576a 0%, #7faab3 45%, #d7d0bf 100%)',
	],
];
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
  <div class="absolute inset-0" style="<?php echo esc_attr( $hero_background ); ?>"></div>
  <div class="absolute inset-0 hero-gradient flex flex-col items-center justify-center text-center px-4">
    <?php
    ukiyo_render_breadcrumbs([
		'class'      => 'mb-6 justify-center text-white/80',
		'link_class' => 'text-white/80 hover:text-white transition-colors',
    ]);
    ?>
    <span class="text-white/80 uppercase tracking-[0.3em] text-sm mb-4">Europa · Mediterráneo</span>
    <h1 class="text-6xl md:text-8xl font-rowdies text-white font-bold mb-2 text-shadow">ITALIA</h1>
    <p class="text-2xl md:text-4xl font-satoshi text-white/90 italic font-light">Dolce vita con criterio</p>
    <div class="mt-8 max-w-2xl text-white/80 text-lg md:text-xl font-light leading-relaxed">
      Arte, gastronomía, pueblos con encanto y paisajes muy distintos para un viaje que se diseña mejor cuando tiene ritmo.
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
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Abr - Jun · Sep - Oct</p>
      </div>
    </div>
    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'currency_exchange' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Moneda</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Euro</p>
      </div>
    </div>
    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'language' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Idioma</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Italiano</p>
      </div>
    </div>
    <div class="w-px h-12 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
    <div class="flex items-center gap-4 flex-1 md:min-w-[200px]">
      <div class="p-3 bg-primary/10 rounded-full text-primary">
        <?php echo ukiyo_icon( 'thermostat' ); ?>
      </div>
      <div>
        <h4 class="text-xs uppercase text-gray-500 dark:text-gray-400 font-bold tracking-wide">Clima</h4>
        <p class="font-satoshi text-lg text-gray-900 dark:text-white">Mediterráneo y alpino</p>
      </div>
    </div>
  </div>
</div>

<section class="py-24 px-4 container mx-auto">
  <div class="max-w-3xl mx-auto text-center space-y-8">
    <h2 class="text-4xl md:text-5xl font-rowdies text-secondary dark:text-white font-medium leading-tight">
      Donde la belleza <span class="text-primary italic">marca el ritmo</span>
    </h2>
    <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-light">
      <span class="font-bold text-gray-800 dark:text-gray-100">Italia</span> no necesita presentaciones, pero sí una buena lectura. Es un país que puede caer en lo obvio si se aborda sin intención y que, en cambio, se vuelve extraordinario cuando se mezcla bien el arte, el paisaje, la gastronomía y los tiempos. En UKIYO la pensamos como un viaje de capas: menos checklists, más barrios, mesas, carreteras secundarias y lugares con alma.
    </p>
    <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
  </div>
</section>

<section class="py-12 bg-white dark:bg-gray-900">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-rowdies text-gray-900 dark:text-white mb-4">Lo que hace <span class="text-primary">única</span> a Italia</h2>
      <p class="text-gray-600 dark:text-gray-400">Razones para recorrerla con una propuesta bien pensada, no a golpe de lista infinita.</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
      <?php foreach ( $features_data as $feature ) : ?>
      <div class="bg-background-light dark:bg-surface-dark p-4 md:p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-lg transition duration-300 group text-center md:text-left">
        <div class="w-14 h-14 bg-amber-50 dark:bg-amber-900/30 rounded-full flex items-center justify-center mb-4 md:mb-6 group-hover:scale-110 transition mx-auto md:mx-0">
          <?php echo ukiyo_icon( $feature['icon'], 'text-amber-700 dark:text-amber-400 text-3xl' ); ?>
        </div>
        <h3 class="text-xl font-satoshi font-bold text-gray-900 dark:text-white mb-3"><?php echo esc_html( $feature['title'] ); ?></h3>
        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed"><?php echo esc_html( $feature['description'] ); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

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

    <?php foreach ( $ukiyo_carousel_items as $exp_item ) : ?>
      <?php $background_style = ukiyo_italia_background_style( $exp_item['imagePath'], $exp_item['fallback'] ); ?>
      <div
        style="
          flex-shrink: 0;
          width: 85vw;
          max-width: 400px;
          height: 500px;
          <?php echo esc_attr( $background_style ); ?>
          border-radius: 1.5rem;
          overflow: hidden;
          position: relative;
        "
        class="carousel-card snap-center cursor-pointer"
      >
        <div class="carousel-card-content" style="position: absolute; bottom: 0; left: 0; padding: 2rem; width: 100%; transition: transform 0.3s ease; text-align: center;">
          <div style="color: #FF8C42; font-size: 12px; text-transform: uppercase; margin-bottom: 0.5rem; font-weight: 600;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline;">
              <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
              <circle cx="12" cy="10" r="3"/>
            </svg>
            <?php echo esc_html( $exp_item['tag'] ); ?>
          </div>
          <h3 style="font-family: 'Rowdies', sans-serif; font-size: 2rem; margin-bottom: 0.75rem; color: white; font-weight: 600;"><?php echo esc_html( $exp_item['title'] ); ?></h3>
          <p style="color: rgba(255,255,255,0.82); line-height: 1.6;">
            <?php echo esc_html( $exp_item['description'] ); ?>
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
                return firstCard.offsetWidth + 24;
            }
            return 424;
        }

        leftBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
        });

        function handleAutoplay() {
            if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 10) {
                carousel.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                carousel.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
            }
        }

        let autoPlayInterval = setInterval(handleAutoplay, 4000);

        rightBtn.addEventListener('click', () => {
            if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 10) {
                carousel.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                carousel.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
            }
        });

        [leftBtn, rightBtn, carousel].forEach((element) => {
            element.addEventListener('mousedown', resetTimer);
            element.addEventListener('touchstart', resetTimer);
        });

        function resetTimer() {
            clearInterval(autoPlayInterval);
            autoPlayInterval = setInterval(handleAutoplay, 4000);
        }
    }
});
</script>

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
            <span class="text-gray-600 dark:text-gray-300 text-sm">Capas versátiles: Italia cambia mucho entre regiones, altitudes y franjas horarias.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Buen calzado para caminar ciudades históricas, estaciones y pueblos con suelo irregular.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Una maleta ligera siempre ayuda: moverse entre alojamientos es parte del viaje.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'check_circle', 'text-primary text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Si incluyes costa o lagos, añade ropa cómoda para barco, playa y cenas más arregladas.</span>
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
            <span class="text-gray-600 dark:text-gray-300 text-sm">Italia se disfruta mejor con menos bases y mejor elegidas. Querer abarcar demasiado le resta profundidad.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-amber-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Conviene reservar con antelación trenes, museos y mesas clave, sobre todo en primavera y otoño.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-amber-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">La experiencia cambia mucho según la temporada: en verano hay más densidad y temperaturas altas.</span>
          </li>
          <li class="flex items-start gap-3">
            <?php echo ukiyo_icon( 'info', 'text-secondary dark:text-amber-400 text-xl flex-shrink-0 mt-0.5' ); ?>
            <span class="text-gray-600 dark:text-gray-300 text-sm">Para nosotros funciona especialmente bien combinar grandes iconos con una segunda capa más íntima y local.</span>
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
    'intro'   => 'Para quienes quieren gastronomía, cultura y rutas pausadas, estos destinos conectan de forma natural con un viaje a medida a Italia.',
    'current' => 'destination_italia',
    'keys'    => [ 'destination_lanzarote', 'destination_marruecos', 'destination_indonesia', 'destination_colombia' ],
  ]
);

ukiyo_render_destination_blog_posts(
  [
    'title'           => 'Guías para preparar tu viaje a Italia',
    'intro'           => 'Presupuesto, ruta, lugares imprescindibles y mejor época para viajar a Italia sin caer en lo obvio.',
    'destination_key' => 'destination_italia',
    'category'        => 'italia',
  ]
);
?>

<section class="py-24 text-center bg-background-light dark:bg-background-dark">
  <div class="container mx-auto px-4">
    <h2 class="text-4xl md:text-5xl font-satoshi text-gray-900 dark:text-white mb-6">¿Listo para vivir Italia?</h2>
    <p class="text-lg text-gray-600 dark:text-gray-400 mb-10 max-w-2xl mx-auto">
      Si quieres una Italia bonita de verdad, bien medida y sin lugares metidos con calzador, la diseñamos contigo.
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
