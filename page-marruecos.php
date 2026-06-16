<?php
/**
 * Template Name: Marruecos Experience
 *
 * Implementa el layout Claude Design "Destino-Costa-Rica.html" vía el helper
 * `ukiyo_render_destination_v2()`. Mantiene los textos del .php anterior.
 */
get_header();

$img = get_template_directory_uri() . '/images';

$ico_calendar = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>';
$ico_money    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M9 9h4.5a2.5 2.5 0 0 1 0 5H9m0-5v8m0-3h5"/></svg>';
$ico_lang     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2c3 3.5 3 16 0 20M12 2c-3 3.5-3 16 0 20"/></svg>';
$ico_temp     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12c4-6 7-6 10 0s6 6 10 0"/><path d="M2 6c4-6 7-6 10 0s6 6 10 0"/><path d="M2 18c4-6 7-6 10 0s6 6 10 0"/></svg>';
$ico_clock    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 6v6l3 1"/></svg>';

$ico_sun     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M5 5l2 2M17 17l2 2M5 19l2-2M17 7l2-2"/></svg>';
$ico_city    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 22V8l6-5 6 5v14"/><path d="M9 22v-6h6v6"/><path d="M15 13h6v9h-6"/></svg>';
$ico_people  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="7" r="3"/><circle cx="17" cy="9" r="2"/><circle cx="6" cy="14" r="2"/><path d="M2 21c2-3 5-4 8-4s6 1 8 4"/></svg>';
$ico_mountain= '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m3 20 6-10 4 6 3-3 5 7"/></svg>';
$ico_tagine  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14h16"/><path d="M5 14a7 7 0 0 1 14 0"/><path d="M12 7V3"/><path d="M10 3h4"/><path d="M3 18h18"/></svg>';
$ico_castle  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V8l3 1V5l3 1V3l3 2 3-2v3l3-1v4l3-1v13"/><path d="M10 21v-5h4v5"/></svg>';

ukiyo_render_destination_v2( [
	'slug'             => 'ma',
	'breadcrumb'       => 'Marruecos',
	'eyebrow'          => 'Norte de África · مرحبا · Encrucijada de culturas',
	'hero_title'       => 'Viajes a medida a Marruecos,<br/>medinas, Atlas y <em>desierto.</em>',
	'hero_sub'         => 'Zocos de especias, dunas del Sahara y hospitalidad bereber. Diseñamos rutas con tiempo para mirar, conversar y descansar.',
	'hero_image'       => $img . '/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-pareja.webp',
	'cta_primary'      => 'Diseñar mi viaje a Marruecos',
	'scroll_label'     => 'Marhaba',

	'key_facts' => [
		[ 'icon' => $ico_calendar, 'lbl' => 'Mejor época',    'val' => 'Sep — May' ],
		[ 'icon' => $ico_temp,     'lbl' => 'Clima',          'val' => 'Variado · seco' ],
		[ 'icon' => $ico_lang,     'lbl' => 'Idioma',         'val' => 'Árabe · Francés' ],
		[ 'icon' => $ico_clock,    'lbl' => 'Duración ideal', 'val' => '8 — 14 días' ],
		[ 'icon' => $ico_money,    'lbl' => 'Moneda',         'val' => 'Dírham (MAD)' ],
	],

	'intro' => [
		'title_html' => '<span class="dot"></span> Medinas, Atlas<br/><em>y desierto con calma.</em>',
		'lede_html'  => '<strong>Marruecos</strong> se disfruta mejor con una ruta bien ordenada: medinas, pueblos del Atlas, desierto y alojamientos con carácter.',
		'paragraphs' => [
			'Diseñamos el viaje para que haya tiempo de mirar, conversar y descansar. No queremos cruzar Marruecos en línea recta: queremos detenernos donde merece la pena.',
			'Trabajamos con guías bereberes que conocen no solo el camino, también la lengua, la cocina y el ritmo de cada lugar.',
		],
		'marks' => [
			[ 'n_html' => '4',     'l' => 'Ciudades imperiales' ],
			[ 'n_html' => '<em>9</em>',  'l' => 'Sitios UNESCO' ],
			[ 'n_html' => '4K+',   'l' => 'Metros · Toubkal' ],
			[ 'n_html' => '12+',   'l' => 'Siglos de medina viva' ],
		],
		'main_img' => $img . '/marruecos/viajes-personalizados-ukiyo-marruecos-merzouga.webp',
		'pip_img'  => $img . '/marruecos/viajes-personalizados-ukiyo-marruecos-aitbenhaddou.webp',
		'stamp'    => '道 · Marhaba',
	],

	'features_title_html' => 'Lo que hace <em>único</em><br/>a Marruecos.',
	'features_sub'        => 'La puerta de África con alma mediterránea: razones para diseñar la ruta a medida.',
	'features' => [
		[ 'title' => 'Desierto del Sahara',  'description' => 'Dunas, noches estrelladas y amaneceres sobre el erg Chebbi, con una logística cuidada.',                'icon_svg' => $ico_sun ],
		[ 'title' => 'Medinas milenarias',   'description' => 'Fez y Marrakech: laberintos de calles, zocos y artesanía viva. Historia en cada piedra.',                'icon_svg' => $ico_city ],
		[ 'title' => 'Cultura bereber',      'description' => 'Hospitalidad, té a la menta y tradiciones locales explicadas por quienes viven allí.',                   'icon_svg' => $ico_people ],
		[ 'title' => 'Montañas del Atlas',   'description' => 'Valles, pueblos bereberes y paisajes de montaña para bajar el ritmo del viaje.',                          'icon_svg' => $ico_mountain ],
		[ 'title' => 'Gastronomía local',    'description' => 'Tajines, cuscús, panes y especias con contexto, no solo como una parada más.',                            'icon_svg' => $ico_tagine ],
		[ 'title' => 'Kasbahs históricas',   'description' => 'Fortalezas de adobe que cuentan siglos de historia. Testigos silenciosos del tiempo.',                    'icon_svg' => $ico_castle ],
	],

	'carousel_meta'       => 'Itinerario abierto',
	'carousel_title_html' => 'Ocho lugares<br/>que <em>marcan</em> la ruta.',
	'carousel_sub'        => 'De Marrakech al Atlas medio. Cada ruta es única; estos son los puntos sobre los que conversamos contigo.',
	'carousel_items' => [
		[ 'title' => 'Marrakech',         'description' => 'La Perla del Sur: Djemaa el-Fna, zocos laberínticos, jardines secretos y arquitectura que te transporta a otra época.',  'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.webp',     'tag' => 'Ciudad Imperial' ],
		[ 'title' => 'Fez',               'description' => 'La medina más antigua del mundo: curtidurías, artesanos y callejuelas donde el tiempo se detuvo hace siglos.',           'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-fez.webp',           'tag' => 'Capital Espiritual' ],
		[ 'title' => 'Merzouga',          'description' => 'Dunas del Erg Chebbi: atardeceres en camello, noches bajo haimas bereberes y amaneceres sobre el desierto infinito.',     'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-merzouga.webp',      'tag' => 'Sahara Marroquí' ],
		[ 'title' => 'Ait Ben Haddou',    'description' => 'La kasbah más fotogénica: adobe rojo, fortalezas de película y vistas al Alto Atlas desde lo alto.',                       'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-aitbenhaddou.webp',  'tag' => 'Patrimonio UNESCO' ],
		[ 'title' => 'Rissani',           'description' => 'Puerta del desierto: zocos auténticos, kasbahs olvidadas y el espíritu más puro del sur marroquí.',                       'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-rissani.webp',       'tag' => 'Oasis del Sur' ],
		[ 'title' => 'Desierto en camello','description' => 'La experiencia definitiva: atravesar dunas doradas al atardecer, té a la menta bajo las estrellas.',                     'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-camello-marruecos.webp',       'tag' => 'Experiencia Nómada' ],
		[ 'title' => 'Valle del Draa',    'description' => 'Oasis de palmeras, kasbahs fortificadas y pistas que cruzan el Atlas hacia el desierto.',                                 'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-draa.webp',          'tag' => 'Ruta del Sur' ],
		[ 'title' => 'Azrou',             'description' => 'El alma del Atlas Medio: bosques de cedros milenarios, macacos en libertad y la autenticidad bereber.',                   'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-azrou.webp',         'tag' => 'Atlas medio' ],
	],

	'hosts_chip'       => 'La gente de la ruta',
	'hosts_title_html' => 'Conoce a nuestros<br/><em>anfitriones.</em>',
	'hosts_sub'        => 'Un viaje no son solo lugares: son personas. En Marruecos trabajamos con guías que no enseñan el camino — comparten su tierra.',
	'hosts' => [
		[
			'badge'     => 'Atlas · Desierto',
			'role'      => 'Guía bereber',
			'name_html' => 'Moha · <em>el del Atlas</em>',
			'bio'       => 'Nacido en el Atlas, conoce el desierto por dentro: los zocos que importan, los silencios que merecen la pena y el té en el lugar adecuado.',
			'image'     => $img . '/autores/moha/autor-moha2.webp',
			'meta'      => [
				[ 'l' => 'Especialidad', 'v' => 'Desierto y Atlas' ],
				[ 'l' => 'Idiomas',      'v' => 'ES · FR · AR' ],
				[ 'l' => 'Base',         'v' => 'Marrakech' ],
			],
		],
		[
			'badge'     => 'Sahara',
			'role'      => 'Guía nómada',
			'name_html' => 'Mohamed · <em>el de las dunas</em>',
			'bio'       => 'Conoce el sur por instinto: dónde dormir en el desierto, qué jaima merece la pena y qué silencio dura más. Su Marruecos es lento, profundo y respetuoso.',
			'image'     => $img . '/autores/moha/Mohamed.png',
			'meta'      => [
				[ 'l' => 'Especialidad', 'v' => 'Rutas en 4x4' ],
				[ 'l' => 'Idiomas',      'v' => 'ES · FR · AR' ],
				[ 'l' => 'Base',         'v' => 'Merzouga' ],
			],
		],
		[
			'badge'     => 'Medinas',
			'role'      => 'Guía urbano',
			'name_html' => 'Hassan · <em>el de los zocos</em>',
			'bio'       => 'De familia de artesanos, conoce los zocos por dentro y los talleres que aún hacen las cosas bien. Su Marrakech y Fez son los que el visitante no encuentra.',
			'image'     => $img . '/autores/moha/Hassan.png',
			'meta'      => [
				[ 'l' => 'Especialidad', 'v' => 'Medinas vivas' ],
				[ 'l' => 'Idiomas',      'v' => 'ES · FR · AR' ],
				[ 'l' => 'Base',         'v' => 'Fez' ],
			],
		],
	],

	'tips_chip'       => 'Antes de salir',
	'tips_title_html' => 'Recomendaciones <em>Ukiyo</em>',
	'tips_sub'        => 'Lo que llevamos en la mochila y lo que conviene saber antes de aterrizar.',
	'tips_prep' => [
		'badge' => 'Preparación',
		'title' => 'Equipaje esencial',
		'sub'   => 'Cómoda, respetuosa y ligera.',
		'items_html' => [
			'<strong>Ropa cómoda y respetuosa</strong> (cubrir hombros y rodillas en medinas y mezquitas).',
			'<strong>Calzado cómodo</strong> para calles empedradas de medinas.',
			'<strong>Protector solar y sombrero</strong> para el desierto.',
			'<strong>Apertura para regatear</strong> en zocos (es parte de la cultura).',
		],
	],
	'tips_notes' => [
		'badge' => 'A tener en cuenta',
		'title' => 'Notas importantes',
		'sub'   => 'Pequeños avisos para que la ruta fluya.',
		'items_html' => [
			'Nivel físico <strong>moderado</strong> (Atlas y desierto).',
			'<strong>Respeto</strong> por tradiciones musulmanas (especialmente durante Ramadán).',
			'Medidas muy restrictivas con el uso del <strong>dron</strong>.',
			'<strong>Seguro de viaje recomendado</strong> (no incluido).',
		],
	],

	'cta_bg'           => $img . '/marruecos/viajes-personalizados-ukiyo-marruecos-merzouga.webp',
	'cta_title_html'   => '¿Listo para vivir<br/><em>Marruecos?</em>',
	'cta_text'         => 'Cuéntanos qué Marruecos quieres conocer y diseñamos una ruta con medinas, Atlas, desierto y alojamientos con carácter.',
	'cta_primary_btn'  => 'Diseñar mi viaje a Marruecos',

	'destination_key'  => 'destination_marruecos',
	'destination_name' => 'Marruecos',
	'related_keys'     => [ 'destination_italia', 'destination_lanzarote', 'destination_colombia', 'destination_indonesia' ],
	'related_intro'    => 'Si buscas cultura, paisajes potentes y una ruta con identidad, estos destinos son buenas alternativas a un viaje a medida a Marruecos.',
	'blog_title'       => 'Guías para preparar tu viaje a Marruecos',
	'blog_intro'       => 'Presupuesto, ruta, medinas, desierto y época ideal para entender qué Marruecos encaja contigo.',
	'blog_category'    => 'marruecos',
] );

get_footer();
