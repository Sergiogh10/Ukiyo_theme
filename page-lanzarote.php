<?php
/**
 * Template Name: Lanzarote Experience
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
$ico_plane    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9 0-1.2.3L2 8.4l8 4-3 3-3-.5L2 16.5l6 1.5 1.5 6 1.8-1.8L11 19l3-3 4 8 1.9-1.6c.3-.3.4-.7.3-1.2Z"/></svg>';

$ico_landscape='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m3 20 6-8 4 5 3-4 5 7"/><circle cx="18" cy="6" r="2"/></svg>';
$ico_palette = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path d="M12 2a10 10 0 1 0 0 20c.6 0 1-.4 1-1l-.5-1c-.4-.7.1-1.5 1-1.5h2c2.5 0 4.5-2 4.5-4.5 0-5-4.5-9-8-9Z"/></svg>';
$ico_beach   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="10" r="3"/><path d="M6 13v9"/><path d="M2 22h20"/><path d="M14 22c0-4 4-7 8-7"/></svg>';
$ico_grapes  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="6" r="2"/><circle cx="9" cy="11" r="2"/><circle cx="15" cy="11" r="2"/><circle cx="6" cy="16" r="2"/><circle cx="12" cy="16" r="2"/><circle cx="18" cy="16" r="2"/></svg>';
$ico_sailing = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v16"/><path d="M12 4 4 18h8"/><path d="M12 8l8 10h-8"/><path d="M2 22h20"/></svg>';
$ico_eco     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8c-5 0-9 4-9 9 0-5-4-9-9-9 5 0 9-4 9-9 0 5 4 9 9 9Z"/></svg>';

ukiyo_render_destination_v2( [
	'slug'             => 'lz',
	'breadcrumb'       => 'Lanzarote',
	'eyebrow'          => 'Islas Canarias · España · Volcanes y océano',
	'hero_title'       => 'Viajes a medida a Lanzarote,<br/><em>volcanes</em> y océano.',
	'hero_sub'         => 'Paisajes lunares, arte de Manrique y playas salvajes en la isla más singular de Canarias. Diseñamos rutas para vivirla sin prisa.',
	'hero_image'       => $img . '/spain/lanzarote/vista-aerea-lanzarote.webp',
	'cta_primary'      => 'Diseñar mi viaje a Lanzarote',
	'scroll_label'     => 'Con calma',

	'key_facts' => [
		[ 'icon' => $ico_calendar, 'lbl' => 'Mejor época',    'val' => 'Todo el año' ],
		[ 'icon' => $ico_temp,     'lbl' => 'Clima',          'val' => 'Subtropical seco' ],
		[ 'icon' => $ico_lang,     'lbl' => 'Idioma',         'val' => 'Español' ],
		[ 'icon' => $ico_plane,    'lbl' => 'Vuelo',          'val' => '~2,5 h desde Madrid' ],
		[ 'icon' => $ico_money,    'lbl' => 'Moneda',         'val' => 'Euro' ],
	],

	'intro' => [
		'title_html' => '<span class="dot"></span> Volcanes, mar<br/><em>y calma atlántica.</em>',
		'lede_html'  => '<strong>Lanzarote</strong> combina paisaje volcánico, arte, vino, pueblos blancos y playas atlánticas.',
		'paragraphs' => [
			'Diseñamos la ruta para disfrutar la isla sin prisas, con alojamientos y experiencias que encajen con tu forma de viajar.',
			'No es Canarias de hotel grande y "todo incluido". Es la versión más estética y consciente del archipiélago.',
		],
		'marks' => [
			[ 'n_html' => '<em>100%</em>', 'l' => 'Reserva de la Biosfera' ],
			[ 'n_html' => '300+',           'l' => 'Volcanes en la isla' ],
			[ 'n_html' => '1730',           'l' => 'Erupción de Timanfaya' ],
			[ 'n_html' => '8',              'l' => 'Islas Canarias · 1 archipiélago' ],
		],
		'main_img' => $img . '/spain/lanzarote/Jameos_Lanzarote.webp',
		'pip_img'  => $img . '/spain/lanzarote/Volcan_Cuervo_Lanzarote.webp',
		'stamp'    => '道 · Con calma',
	],

	'features_title_html' => 'Lo que hace <em>única</em><br/>a Lanzarote.',
	'features_sub'        => 'Razones para vivir la isla con calma, criterio y buena planificación.',
	'features' => [
		[ 'title' => 'Paisajes volcánicos',     'description' => 'Timanfaya, el Volcán del Cuervo y campos de lava para entender la isla desde su origen.',                          'icon_svg' => $ico_landscape ],
		[ 'title' => 'Legado de Manrique',      'description' => 'Los Jameos del Agua, el Mirador del Río y la Fundación. Arte y naturaleza fundidos en una sola visión.',           'icon_svg' => $ico_palette ],
		[ 'title' => 'Playas salvajes',         'description' => 'Papagayo, Las Conchas y Famara. Arena dorada, negra y aguas cristalinas en calas protegidas del viento.',          'icon_svg' => $ico_beach ],
		[ 'title' => 'Gastronomía volcánica',   'description' => 'Vinos de La Geria, quesos artesanales y pescado del día. Sabores únicos nacidos de la tierra volcánica.',         'icon_svg' => $ico_grapes ],
		[ 'title' => 'La Graciosa',             'description' => 'La octava isla canaria: sin asfalto, sin prisas, solo arena blanca y un mar turquesa que parece el Caribe.',      'icon_svg' => $ico_sailing ],
		[ 'title' => 'Reserva de la Biosfera',  'description' => 'Toda la isla reconocida por la UNESCO. Un modelo de desarrollo sostenible y respeto por el entorno.',              'icon_svg' => $ico_eco ],
	],

	'carousel_meta'       => 'Itinerario abierto',
	'carousel_title_html' => 'Ocho lugares<br/>que <em>marcan</em> la ruta.',
	'carousel_sub'        => 'De Timanfaya a La Geria. Cada ruta es única, pero estos son los puntos sobre los que conversamos contigo para diseñar tu viaje.',
	'carousel_items' => [
		[ 'title' => 'Timanfaya',          'description' => 'El Parque Nacional de los volcanes: geiseres, coladas de lava y paisajes imposibles. La ruta de los volcanes es imprescindible.', 'imagePath' => '/images/spain/lanzarote/Volcan_Cuervo_Lanzarote.webp',           'tag' => 'Parque Nacional' ],
		[ 'title' => 'La Graciosa',        'description' => 'La isla más pequeña de Canarias. Playas vírgenes de arena blanca, aguas turquesas y caminos de tierra sin un solo semáforo.',     'imagePath' => '/images/spain/lanzarote/La_Graciosa.webp',                       'tag' => 'Archipiélago Chinijo' ],
		[ 'title' => 'Jameos del Agua',    'description' => 'La obra maestra de César Manrique: una cueva volcánica transformada en espacio cultural con piscina natural y auditorio.',         'imagePath' => '/images/spain/lanzarote/Jameos_Lanzarote.webp',                  'tag' => 'Arte y Naturaleza' ],
		[ 'title' => 'Playa de Papagayo',  'description' => 'Las calas más espectaculares de la isla: arena dorada, aguas cristalinas y acantilados protegidos del viento.',                    'imagePath' => '/images/spain/lanzarote/playa-papagayo-en-el-sur-de-lanzarote-islas-canarias-s1713915070.avif', 'tag' => 'Monumento Natural' ],
		[ 'title' => 'Teguise',            'description' => 'La antigua capital de la isla: arquitectura colonial, mercadillo dominical y la esencia de la Lanzarote más auténtica.',           'imagePath' => '/images/spain/lanzarote/Teguise_Lanzarote.webp',                 'tag' => 'Casco Histórico' ],
		[ 'title' => 'Cueva de los Verdes','description' => 'Un túnel volcánico de más de 6 km formado por la erupción del Volcán de la Corona. Una catedral subterránea natural.',             'imagePath' => '/images/spain/lanzarote/Cueva_Verdes_Lanzarote.webp',            'tag' => 'Geología' ],
		[ 'title' => 'Mirador del Río',    'description' => 'La obra de Manrique con las vistas más impresionantes: toda La Graciosa y el archipiélago Chinijo a tus pies.',                    'imagePath' => '/images/spain/lanzarote/miradorrisco_lanzarote.webp',            'tag' => 'Vistas Panorámicas' ],
		[ 'title' => 'La Geria',           'description' => 'El paisaje vinícola más insólito del mundo: viñas plantadas en hoyos volcánicos protegidas por muros de piedra semicirculares.',  'imagePath' => '/images/spain/lanzarote/stratvs_lanzarote.webp',                 'tag' => 'Enoturismo' ],
	],

	'hosts' => [],

	'tips_chip'       => 'Antes de salir',
	'tips_title_html' => 'Recomendaciones <em>Ukiyo</em>',
	'tips_sub'        => 'Lo que conviene llevar y lo que conviene saber.',
	'tips_prep' => [
		'badge' => 'Preparación',
		'title' => 'Equipaje esencial',
		'sub'   => 'Ligero, con capas y protección solar real.',
		'items_html' => [
			'<strong>Ropa ligera y cortavientos</strong>: el viento alisio sopla con frecuencia.',
			'<strong>Calzado cómodo</strong> con buena suela para caminar sobre terreno volcánico.',
			'<strong>Protección solar alta</strong> y gafas de sol: la radiación es intensa todo el año.',
			'<strong>Bañador y escarpines</strong> para las playas rocosas y calas.',
		],
	],
	'tips_notes' => [
		'badge' => 'A tener en cuenta',
		'title' => 'Notas importantes',
		'sub'   => 'Logística básica para que la isla fluya.',
		'items_html' => [
			'Es imprescindible <strong>coche de alquiler</strong> para recorrer la isla a tu ritmo.',
			'Reserva la entrada a <strong>Timanfaya</strong> con antelación, especialmente en temporada alta.',
			'Para <strong>La Graciosa</strong>, el ferry sale desde Órzola y conviene reservar con antelación.',
			'Respeta el entorno volcánico: <strong>no salirse de los senderos</strong> marcados en los parques naturales.',
		],
	],

	'cta_bg'           => $img . '/spain/lanzarote/Jameos_Lanzarote.webp',
	'cta_title_html'   => '¿Listo para vivir<br/><em>Lanzarote?</em>',
	'cta_text'         => 'Cuéntanos qué ritmo de viaje buscas y diseñamos una ruta por Lanzarote con volcanes, mar, vino y tiempo para disfrutar.',
	'cta_primary_btn'  => 'Diseñar mi viaje a Lanzarote',

	'destination_key'  => 'destination_lanzarote',
	'destination_name' => 'Lanzarote',
	'related_keys'     => [ 'destination_marruecos', 'destination_italia', 'destination_costa_rica', 'destination_colombia' ],
	'related_intro'    => 'Si te atraen las islas, el paisaje volcánico y los viajes tranquilos, estos destinos refuerzan la misma intención que un viaje a medida a Lanzarote.',
	'blog_title'       => 'Guías para preparar tu viaje a Lanzarote',
	'blog_intro'       => 'Clima, ruta, presupuesto y lugares imprescindibles para vivir Lanzarote con calma y buena lectura de la isla.',
	'blog_category'    => 'lanzarote',
] );

get_footer();
