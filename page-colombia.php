<?php
/**
 * Template Name: Colombia Experience
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

$ico_coffee = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8h14v6a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4V8Z"/><path d="M18 10h2a2 2 0 0 1 0 4h-2"/><path d="M7 3v3M11 3v3"/></svg>';
$ico_wave   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12c2-2 4-2 6 0s4 2 6 0 4-2 6 0"/><path d="M3 18c2-2 4-2 6 0s4 2 6 0 4-2 6 0"/></svg>';
$ico_people = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="7" r="3"/><circle cx="17" cy="9" r="2"/><circle cx="6" cy="14" r="2"/><path d="M2 21c2-3 5-4 8-4s6 1 8 4"/></svg>';
$ico_heart  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78Z"/></svg>';
$ico_eco    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8c-5 0-9 4-9 9 0-5-4-9-9-9 5 0 9-4 9-9 0 5 4 9 9 9Z"/></svg>';
$ico_music  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>';

ukiyo_render_destination_v2( [
	'slug'             => 'co',
	'breadcrumb'       => 'Colombia',
	'eyebrow'          => 'Suramérica · ¡Bienvenidos! · Alegría que se queda',
	'hero_title'       => 'Viajes a medida a Colombia,<br/>una alegría que <em>se queda.</em>',
	'hero_sub'         => 'Eje Cafetero, Pacífico salvaje de Nuquí y Caribe de siete colores. Diseñamos rutas que ordenan los contrastes con buen ritmo y apoyo local.',
	'hero_image'       => $img . '/colombia/viajes-colombia-hero2.webp',
	'cta_primary'      => 'Diseñar mi viaje a Colombia',
	'scroll_label'     => 'Pura vida tropical',

	'key_facts' => [
		[ 'icon' => $ico_calendar, 'lbl' => 'Mejor época',    'val' => 'Dic — Mar' ],
		[ 'icon' => $ico_temp,     'lbl' => 'Clima',          'val' => 'Variado por altitud' ],
		[ 'icon' => $ico_lang,     'lbl' => 'Idioma',         'val' => 'Español' ],
		[ 'icon' => $ico_clock,    'lbl' => 'Duración ideal', 'val' => '14 — 18 días' ],
		[ 'icon' => $ico_money,    'lbl' => 'Moneda',         'val' => 'Peso (COP)' ],
	],

	'intro' => [
		'title_html' => '<span class="dot"></span> Caribe, café y Pacífico<br/><em>en una ruta propia.</em>',
		'lede_html'  => '<strong>Colombia</strong> permite combinar Caribe, Eje Cafetero, ciudades, selva y Pacífico en un mismo viaje.',
		'paragraphs' => [
			'Diseñamos rutas flexibles para ordenar esos contrastes con buen ritmo y apoyo local. Cada región tiene una identidad propia: pasar de Medellín a Cartagena no es solo cambiar de ciudad, es cambiar de país.',
			'Trabajamos con guías locales que conocen el contexto, las comunidades y los lugares que de verdad merecen la pena.',
		],
		'marks' => [
			[ 'n_html' => '<em>2</em>', 'l' => 'Océanos · 1 país' ],
			[ 'n_html' => '32',          'l' => 'Departamentos' ],
			[ 'n_html' => '60+',         'l' => 'Parques nacionales' ],
			[ 'n_html' => '~10%',        'l' => 'Biodiversidad mundial' ],
		],
		'main_img' => $img . '/colombia/viajes-a-colombia-personalizados-eje-cafetero-valle-de-cocora.webp',
		'pip_img'  => $img . '/colombia/viajes-a-colombia-personalizados-nuqui-ballena.webp',
		'stamp'    => '道 · Pura alegría',
	],

	'features_title_html' => 'Lo que hace <em>única</em><br/>a Colombia.',
	'features_sub'        => 'Razones para diseñar Colombia con calma y buena logística.',
	'features' => [
		[ 'title' => 'Café de origen',         'description' => 'El mejor café del mundo crece aquí, en fincas entre montañas. Visita el Eje Cafetero con calma y contexto.',                'icon_svg' => $ico_coffee ],
		[ 'title' => 'Dos costas',             'description' => 'Pacífico salvaje y Caribe de siete colores en el mismo viaje. Dos océanos, dos mundos.',                                     'icon_svg' => $ico_wave ],
		[ 'title' => 'Alegría colombiana',     'description' => 'La hospitalidad más cálida de Latinoamérica te espera. Una pura vida colombiana que se contagia.',                            'icon_svg' => $ico_people ],
		[ 'title' => 'Ciudades con historia',  'description' => 'Medellín, Cartagena o Bogotá se entienden mejor con contexto, barrio y conversación local.',                                  'icon_svg' => $ico_heart ],
		[ 'title' => 'Biodiversidad tropical', 'description' => 'Selvas del Pacífico, ballenas jorobadas y aves endémicas. Naturaleza desbordante en cada región.',                            'icon_svg' => $ico_eco ],
		[ 'title' => 'Ritmo y color',          'description' => 'Salsa, vallenato y pueblos pintados en technicolor. Música y color por doquier — vivir Colombia es bailarla un poco.',       'icon_svg' => $ico_music ],
	],

	'carousel_meta'       => 'Itinerario abierto',
	'carousel_title_html' => 'Ocho lugares<br/>que <em>marcan</em> la ruta.',
	'carousel_sub'        => 'De Medellín a Providencia. Cada ruta es única, pero estos son los puntos sobre los que conversamos contigo para diseñar tu viaje.',
	'carousel_items' => [
		[ 'title' => 'Medellín',     'description' => 'La ciudad que renació: Comuna 13, arte urbano y cafés de especialidad. Transformación social hecha vida.', 'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-medellin.webp',                'tag' => 'Valle de Aburrá' ],
		[ 'title' => 'Eje Cafetero', 'description' => 'Palmas de cera en el Valle del Cocora, fincas cafeteras y pueblos de colores. La Colombia verde y pausada.', 'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-eje-cafetero-valle-de-cocora.webp', 'tag' => 'Zona Cafetera' ],
		[ 'title' => 'Nuquí',        'description' => 'Pacífico salvaje: selva que llega al mar, ballenas jorobadas y comunidades afro. Naturaleza en estado puro.', 'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-nuqui-ballena.webp',           'tag' => 'Pacífico Colombiano' ],
		[ 'title' => 'Cartagena',    'description' => 'La ciudad amurallada más romántica: balcones floridos, atardeceres caribeños y historia colonial viva.',     'imagePath' => '/images/destination-mood/viajes-a-colombia-personalizados-cartagena-ciudad-amurallada.webp', 'tag' => 'Costa Caribe' ],
		[ 'title' => 'Providencia',  'description' => 'El mar de siete colores: arrecifes, snorkel y ambiente isleño sin masificaciones. Cierre perfecto del viaje.', 'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-providencia-mar-siete-colores.webp', 'tag' => 'Caribe Insular' ],
		[ 'title' => 'Palenquera',   'description' => 'Cultura afrocaribe en su máxima expresión: tradiciones ancestrales y gastronomía que lleva siglos.',         'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-palanquera.webp',              'tag' => 'Patrimonio Cultural' ],
		[ 'title' => 'Barichara',    'description' => 'Pueblo colonial empedrado, casas blancas y arte muralista. Una Colombia auténtica fuera del circuito.',      'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-barichara.webp',               'tag' => 'Santander' ],
		[ 'title' => 'Tayrona',      'description' => 'Caribe colombiano: aguas cristalinas, palmeras y ritmos costeños bajo el sol tropical.',                     'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-tayrona.webp',                  'tag' => 'Parque Nacional' ],
	],

	// El .php original tenía la sección de autores comentada — la dejamos vacía.
	'hosts' => [],

	'tips_chip'       => 'Antes de salir',
	'tips_title_html' => 'Recomendaciones <em>Ukiyo</em>',
	'tips_sub'        => 'Lo que llevamos en la mochila y lo que nos gustaría que tuvieras en mente.',
	'tips_prep' => [
		'badge' => 'Preparación',
		'title' => 'Equipaje esencial',
		'sub'   => 'Ligero, versátil y respetuoso con el clima tropical.',
		'items_html' => [
			'<strong>Ropa ligera</strong> (clima cálido y húmedo en varias zonas).',
			'<strong>Calzado cómodo</strong> para caminar y senderos.',
			'<strong>Protector solar y repelente</strong> de insectos.',
			'<strong>Respeto</strong> por las costumbres locales y actitud abierta.',
		],
	],
	'tips_notes' => [
		'badge' => 'A tener en cuenta',
		'title' => 'Notas importantes',
		'sub'   => 'Avisos honestos para que el viaje sea lo que esperas.',
		'items_html' => [
			'Nivel físico <strong>moderado</strong> en algunas rutas (Cocora, Nuquí).',
			'<strong>Respeto</strong> por comunidades afro e indígenas — son el alma de muchas regiones.',
			'Grupos <strong>siempre pequeños</strong> (máx. 8) para una experiencia íntima.',
			'<strong>Seguro de viaje recomendado</strong> (no incluido).',
		],
	],

	'cta_bg'           => $img . '/destination-mood/viajes-a-colombia-personalizados-cartagena-ciudad-amurallada.webp',
	'cta_title_html'   => '¿Listo para vivir<br/><em>Colombia?</em>',
	'cta_text'         => 'Cuéntanos qué regiones te atraen y diseñamos una ruta por Colombia con Caribe, café, ciudades y naturaleza a tu ritmo.',
	'cta_primary_btn'  => 'Diseñar mi viaje a Colombia',

	'destination_key'  => 'destination_colombia',
	'destination_name' => 'Colombia',
	'related_keys'     => [ 'destination_costa_rica', 'destination_indonesia', 'destination_marruecos', 'destination_lanzarote' ],
	'related_intro'    => 'Para viajeros que conectan con cultura, naturaleza y rutas con alma, estos destinos amplían el universo de un viaje a medida a Colombia.',
	'blog_title'       => 'Guías para preparar tu viaje a Colombia',
	'blog_intro'       => 'Ideas claras sobre presupuesto, ruta, clima y regiones para ordenar Colombia con sentido.',
	'blog_category'    => 'colombia',
] );

get_footer();
