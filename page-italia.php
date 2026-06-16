<?php
/**
 * Template Name: Italia Experience
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

// Features icons (Italia: ritmo, arte, paisaje, gastro, pueblos, viajes a medida).
$ico_cafe    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8h14v6a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4V8Z"/><path d="M18 10h2a2 2 0 0 1 0 4h-2"/><path d="M7 3v3M11 3v3"/></svg>';
$ico_museum  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 22h18"/><path d="M3 22V11l9-7 9 7v11"/><path d="M9 22V14h6v8"/></svg>';
$ico_landscape='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m3 20 6-8 4 5 3-4 5 7"/><circle cx="18" cy="6" r="2"/></svg>';
$ico_resto   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2v20M2 2v6a4 4 0 0 0 4 4M18 14V2c-2 0-4 1-4 5 0 5 4 5 4 5v8"/></svg>';
$ico_village = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 22V12l5-4 5 4v10"/><path d="M13 22V14l4-3 4 3v8"/><path d="M3 22h18"/></svg>';
$ico_route   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="19" r="2"/><circle cx="18" cy="5" r="2"/><path d="M6 17V9a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v0"/></svg>';

ukiyo_render_destination_v2( [
	'slug'             => 'it',
	'breadcrumb'       => 'Italia',
	'eyebrow'          => 'Europa · Mediterráneo · La dolce vita',
	'hero_title'       => 'Viajes a medida a Italia,<br/>la <em>dolce vita</em><br/>con criterio.',
	'hero_sub'         => 'Arte, gastronomía, pueblos con encanto y paisajes muy distintos para un viaje que se diseña mejor cuando tiene ritmo.',
	'hero_image'       => $img . '/italia/viajes-a-italia-personalizados-dolomitas.webp',
	'cta_primary'      => 'Diseñar mi viaje a Italia',
	'scroll_label'     => 'Piano piano',

	'key_facts' => [
		[ 'icon' => $ico_calendar, 'lbl' => 'Mejor época',    'val' => 'Abr-Jun · Sep-Oct' ],
		[ 'icon' => $ico_temp,     'lbl' => 'Clima',          'val' => 'Mediterráneo / alpino' ],
		[ 'icon' => $ico_lang,     'lbl' => 'Idioma',         'val' => 'Italiano' ],
		[ 'icon' => $ico_clock,    'lbl' => 'Duración ideal', 'val' => '10 — 18 días' ],
		[ 'icon' => $ico_money,    'lbl' => 'Moneda',         'val' => 'Euro' ],
	],

	'intro' => [
		'title_html' => '<span class="dot"></span> Donde la belleza<br/><em>marca el ritmo.</em>',
		'lede_html'  => '<strong>Italia</strong> no necesita presentaciones, pero sí una buena lectura.',
		'paragraphs' => [
			'Es un país que puede caer en lo obvio si se aborda sin intención y que, en cambio, se vuelve extraordinario cuando se mezcla bien el arte, el paisaje, la gastronomía y los tiempos.',
			'En Ukiyo lo pensamos como un viaje de capas: menos checklists, más barrios, mesas, carreteras secundarias y lugares con alma.',
		],
		'marks' => [
			[ 'n_html' => '20', 'l' => 'Regiones · 20 cocinas' ],
			[ 'n_html' => '58', 'l' => 'Sitios UNESCO' ],
			[ 'n_html' => '7K+', 'l' => 'Km de costa' ],
			[ 'n_html' => '<em>~3M</em>', 'l' => 'Años de Lascaux a Caravaggio' ],
		],
		'main_img' => $img . '/italia/viajes-a-italia-personalizados-toscana.webp',
		'pip_img'  => $img . '/italia/viajes-a-italia-personalizados-florencia.webp',
		'stamp'    => '道 · Piano piano',
	],

	'features_title_html' => 'Lo que hace <em>única</em><br/>a Italia.',
	'features_sub'        => 'Razones para recorrerla con una propuesta bien pensada, no a golpe de lista infinita.',
	'features' => [
		[ 'title' => 'Ritmo y belleza',        'description' => 'Italia tiene el don de hacer que incluso los trayectos formen parte del viaje. Se vive despacio, con gusto y con intención.', 'icon_svg' => $ico_cafe ],
		[ 'title' => 'Arte cotidiano',         'description' => 'Roma, Florencia o Venecia no se visitan: se atraviesan como museos vivos donde la historia aparece en cada esquina.',         'icon_svg' => $ico_museum ],
		[ 'title' => 'Paisajes cambiantes',    'description' => 'Dolomitas, lagos alpinos, costas mediterráneas y colinas infinitas. Un mismo país con muchos viajes posibles.',                'icon_svg' => $ico_landscape ],
		[ 'title' => 'Gastronomía con raíz',   'description' => 'Aquí comer bien no es un extra. Es parte esencial de la experiencia y una forma de entender cada región.',                       'icon_svg' => $ico_resto ],
		[ 'title' => 'Pueblos con alma',       'description' => 'Borgos suspendidos en el tiempo, plazas pequeñas y alojamientos llenos de carácter para bajar el ritmo.',                       'icon_svg' => $ico_village ],
		[ 'title' => 'Viajes a medida',        'description' => 'Italia funciona especialmente bien cuando se diseña con criterio: menos saltos, más profundidad y mucho sentido estético.',     'icon_svg' => $ico_route ],
	],

	'carousel_meta'       => 'Itinerario abierto',
	'carousel_title_html' => 'Doce lugares<br/>que <em>marcan</em> la ruta.',
	'carousel_sub'        => 'De las Dolomitas al sur mediterráneo. Cada ruta es única; estos son los puntos sobre los que conversamos contigo.',
	'carousel_items' => [
		[ 'title' => 'Dolomitas',         'description' => 'Montañas dramáticas, refugios con encanto y rutas escénicas para una Italia más limpia, vertical y silenciosa.',                      'imagePath' => '/images/italia/viajes-a-italia-personalizados-dolomitas.webp',         'tag' => 'Norte alpino' ],
		[ 'title' => 'Toscana',           'description' => 'Colinas onduladas, cipreses, vino y pueblos de piedra. Un clásico que solo funciona bien cuando se vive sin prisa.',                   'imagePath' => '/images/italia/viajes-a-italia-personalizados-toscana.webp',           'tag' => 'Centro histórico' ],
		[ 'title' => 'Florencia',         'description' => 'La ciudad donde el arte y la proporción parecen estar en todas partes. Ideal para vivirla con calma, no solo para tacharla.',          'imagePath' => '/images/italia/viajes-a-italia-personalizados-florencia.webp',         'tag' => 'Renacimiento' ],
		[ 'title' => 'Costa Amalfitana',  'description' => 'Carreteras imposibles, terrazas frente al mar y pueblos suspendidos sobre acantilados bañados por luz mediterránea.',                  'imagePath' => '/images/italia/viajes-a-italia-personalizados-costa-amalfitana.webp',  'tag' => 'Sur mediterráneo' ],
		[ 'title' => 'Cinque Terre',      'description' => 'Senderos sobre el mar, pueblos verticales y luz ligur. Funciona especialmente bien combinado con bases tranquilas y buen ritmo.',     'imagePath' => '/images/italia/viajes-a-italia-personalizados-cinque-terre.webp',      'tag' => 'Liguria' ],
		[ 'title' => 'Sicilia',           'description' => 'Una isla de capas: barroco, volcanes, mar, mercados y una energía más intensa, caótica y profundamente seductora.',                    'imagePath' => '/images/italia/viajes-a-italia-personalizados-sicilia.webp',           'tag' => 'Isla con carácter' ],
		[ 'title' => 'Venecia',           'description' => 'La mejor versión aparece cuando se duerme allí, se madruga y se explora más allá de las rutas obvias.',                                  'imagePath' => '/images/italia/viajes-a-italia-personalizados-venecia.avif',           'tag' => 'Laguna veneciana' ],
		[ 'title' => 'Roma',              'description' => 'Capas históricas, trattorias de barrio y belleza monumental. Una ciudad que exige selección para no quedarse en la superficie.',       'imagePath' => '/images/italia/viajes-a-italia-personalizados-roma.webp',              'tag' => 'Eterna' ],
		[ 'title' => 'Nápoles',           'description' => 'Más cruda, más viva y más intensa. Una ciudad para entrar en la energía del sur y asomarse a Pompeya o la costa.',                     'imagePath' => '/images/italia/viajes-a-italia-personalizados-napoles.webp',           'tag' => 'Campania' ],
		[ 'title' => 'Puglia',            'description' => 'Masserias, calas luminosas y pueblos blancos. Una Italia más relajada, solar y todavía menos transitada.',                              'imagePath' => '/images/italia/viajes-a-italia-personalizados-puglia.webp',            'tag' => 'Adriático' ],
		[ 'title' => 'Siena',             'description' => 'Una de las ciudades más elegantes de la Toscana: ladrillo, plazas perfectas y una escala mucho más habitable.',                          'imagePath' => '/images/italia/viajes-a-italia-personalizados-siena.webp',             'tag' => 'Toscana interior' ],
		[ 'title' => 'Lagos del norte',   'description' => 'Villas elegantes, jardines, pueblos junto al agua y una atmósfera serena para un viaje más contemplativo.',                            'imagePath' => '/images/italia/viajes-a-italia-personalizados-lago-di-como.webp',      'tag' => 'Lagos italianos' ],
	],

	// Italia no tenía sección de anfitriones en el .php original.
	'hosts' => [],

	'tips_chip'       => 'Antes de salir',
	'tips_title_html' => 'Recomendaciones <em>Ukiyo</em>',
	'tips_sub'        => 'Lo que nos parece esencial para que Italia te llegue como debe.',
	'tips_prep' => [
		'badge' => 'Preparación',
		'title' => 'Equipaje esencial',
		'sub'   => 'Pensar bien las capas: Italia cambia mucho entre regiones, altitudes y franjas horarias.',
		'items_html' => [
			'<strong>Capas versátiles</strong>: el clima varía entre regiones y horas del día.',
			'<strong>Buen calzado</strong> para caminar ciudades históricas, estaciones y pueblos con suelo irregular.',
			'<strong>Una maleta ligera</strong> siempre ayuda: moverse entre alojamientos es parte del viaje.',
			'Si incluyes costa o lagos, añade ropa cómoda para barco, playa y cenas más arregladas.',
		],
	],
	'tips_notes' => [
		'badge' => 'A tener en cuenta',
		'title' => 'Notas importantes',
		'sub'   => 'Tres avisos honestos para que el viaje sea lo que esperas.',
		'items_html' => [
			'Italia se disfruta mejor con <strong>menos bases y mejor elegidas</strong>. Querer abarcar demasiado le resta profundidad.',
			'Conviene reservar con antelación <strong>trenes, museos y mesas clave</strong>, sobre todo en primavera y otoño.',
			'La experiencia cambia mucho según la <strong>temporada</strong>: en verano hay más densidad y temperaturas altas.',
			'Para nosotros funciona especialmente bien combinar grandes iconos con una <strong>segunda capa</strong> más íntima y local.',
		],
	],

	'cta_bg'           => $img . '/italia/viajes-a-italia-personalizados-costa-amalfitana.webp',
	'cta_title_html'   => '¿Listo para vivir<br/><em>Italia?</em>',
	'cta_text'         => 'Si quieres una Italia bonita de verdad, bien medida y sin lugares metidos con calzador, la diseñamos contigo.',
	'cta_primary_btn'  => 'Diseñar mi viaje a Italia',

	'destination_key'  => 'destination_italia',
	'destination_name' => 'Italia',
	'related_keys'     => [ 'destination_lanzarote', 'destination_marruecos', 'destination_indonesia', 'destination_colombia' ],
	'related_intro'    => 'Para quienes quieren gastronomía, cultura y rutas pausadas, estos destinos conectan de forma natural con un viaje a medida a Italia.',
	'blog_title'       => 'Guías para preparar tu viaje a Italia',
	'blog_intro'       => 'Presupuesto, ruta, lugares imprescindibles y mejor época para viajar a Italia sin caer en lo obvio.',
	'blog_category'    => 'italia',
] );

get_footer();
