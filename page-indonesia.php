<?php
/**
 * Template Name: Indonesia Experience
 *
 * Implementa el layout Claude Design "Destino-Costa-Rica.html" vía el helper
 * `ukiyo_render_destination_v2()`. Mantiene los textos del .php anterior.
 */
get_header();

$img = get_template_directory_uri() . '/images';

// SVGs reutilizables para key facts.
$ico_calendar = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>';
$ico_money    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M9 9h4.5a2.5 2.5 0 0 1 0 5H9m0-5v8m0-3h5"/></svg>';
$ico_lang     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2c3 3.5 3 16 0 20M12 2c-3 3.5-3 16 0 20"/></svg>';
$ico_temp     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12c4-6 7-6 10 0s6 6 10 0"/><path d="M2 6c4-6 7-6 10 0s6 6 10 0"/><path d="M2 18c4-6 7-6 10 0s6 6 10 0"/></svg>';
$ico_clock    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 6v6l3 1"/></svg>';

// SVGs reutilizables para features (estilo del export Costa Rica).
$ico_temple = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 4 6h16L12 2Z"/><path d="M5 6v3h14V6"/><path d="M6 9v11h12V9"/><path d="M10 20v-6h4v6"/></svg>';
$ico_rice   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12c2-2 4-2 6 0s4 2 6 0 4-2 6 0"/><path d="M3 18c2-2 4-2 6 0s4 2 6 0 4-2 6 0"/><path d="M12 2v6"/><circle cx="12" cy="3" r="1"/></svg>';
$ico_people = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="7" r="3"/><circle cx="17" cy="9" r="2"/><circle cx="6" cy="14" r="2"/><path d="M2 21c2-3 5-4 8-4s6 1 8 4"/></svg>';
$ico_beach  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="10" r="3"/><path d="M6 13v9"/><path d="M2 22h20"/><path d="M14 22c0-4 4-7 8-7"/></svg>';
$ico_volcano= '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c-3 4-3 8 0 12 3-4 3-8 0-12Z"/><path d="M5 22c0-4 3-7 7-7s7 3 7 7"/><path d="M9 18l-2-2M15 18l2-2"/></svg>';
$ico_paw    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="5" cy="9" r="2"/><circle cx="9" cy="5" r="2"/><circle cx="15" cy="5" r="2"/><circle cx="19" cy="9" r="2"/><path d="M5 18a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v0a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3v0Z"/></svg>';

ukiyo_render_destination_v2( [
	'slug'             => 'id',
	'breadcrumb'       => 'Indonesia',
	'eyebrow'          => 'Sudeste Asiático · インドネシア · Selamat datang',
	'hero_title'       => 'Viajes a medida a Indonesia,<br/>el archipiélago de <em>los mil matices.</em>',
	'hero_sub'         => 'Bali, Java, Komodo o Raja Ampat pueden combinarse de muchas formas. Diseñamos rutas con ritmo, sin prisas, para que cada isla cuente.',
	'hero_image'       => $img . '/indonesia/viajes-autor-ukiyo-indonesiamanta.webp',
	'cta_primary'      => 'Diseñar mi viaje a Indonesia',
	'scroll_label'     => 'Selamat datang',

	'key_facts' => [
		[ 'icon' => $ico_calendar, 'lbl' => 'Mejor época',       'val' => 'May — Sep' ],
		[ 'icon' => $ico_temp,     'lbl' => 'Clima',             'val' => 'Tropical · 25-31°C' ],
		[ 'icon' => $ico_lang,     'lbl' => 'Idioma',            'val' => 'Bahasa Indonesia' ],
		[ 'icon' => $ico_clock,    'lbl' => 'Duración ideal',    'val' => '14 — 21 días' ],
		[ 'icon' => $ico_money,    'lbl' => 'Moneda',            'val' => 'Rupia (IDR)' ],
	],

	'intro' => [
		'title_html' => '<span class="dot"></span> Entre islas, templos<br/><em>y volcanes.</em>',
		'lede_html'  => '<strong>Indonesia</strong> pide una ruta bien pensada: más de 17.000 islas, varias culturas vivas y diferencias enormes entre regiones.',
		'paragraphs' => [
			'Ajustamos tiempos, traslados y experiencias para que el viaje tenga ritmo sin ir con prisa. Combinamos templos balineses, arrozales infinitos, navegaciones por Komodo y arrecifes que cuesta creer.',
			'No es un viaje de check-list. Aquí se trata de elegir bien: menos saltos entre islas, más profundidad en las que pisas.',
		],
		'marks' => [
			[ 'n_html' => '17K+', 'l' => 'Islas en el archipiélago' ],
			[ 'n_html' => '5',    'l' => 'Religiones reconocidas' ],
			[ 'n_html' => '700+', 'l' => 'Lenguas y dialectos' ],
			[ 'n_html' => '<em>3°</em>', 'l' => 'Sobre el ecuador' ],
		],
		'main_img' => $img . '/indonesia/viajes-a-indonesia-personalizados-bali.webp',
		'pip_img'  => $img . '/indonesia/viajes-a-indonesia-personalizados-bali-tirta-empul.webp',
		'stamp'    => '道 · Selamat datang',
	],

	'features_title_html' => 'Lo que hace <em>única</em><br/>a Indonesia.',
	'features_sub'        => 'El archipiélago de los mil matices: razones por las que diseñar Indonesia a medida es muy distinto de cualquier ruta estándar.',
	'features' => [
		[ 'title' => 'Templos y ceremonias',   'description' => 'Borobudur, Prambanan y templos balineses de agua, con tiempo para entender el contexto local.', 'icon_svg' => $ico_temple ],
		[ 'title' => 'Arrozales y pueblos',    'description' => 'Terrazas verdes, caminos rurales y escenas cotidianas que dan otra lectura al viaje.',         'icon_svg' => $ico_rice ],
		[ 'title' => 'Cultura balinesa',       'description' => 'Danzas, ofrendas diarias y ceremonias vivas, siempre desde el respeto al lugar.',                'icon_svg' => $ico_people ],
		[ 'title' => 'Islas y arrecifes',      'description' => 'De Nusa Penida a Raja Ampat: playas, snorkel y mar con buena planificación logística.',          'icon_svg' => $ico_beach ],
		[ 'title' => 'Volcanes activos',       'description' => 'Bromo y Batur, con amaneceres y rutas adaptadas a tu nivel físico.',                              'icon_svg' => $ico_volcano ],
		[ 'title' => 'Fauna única',            'description' => 'Dragones de Komodo, orangutanes y mantarrayas gigantes. Vida salvaje sin parques temáticos.',    'icon_svg' => $ico_paw ],
	],

	'carousel_meta'        => 'Itinerario abierto',
	'carousel_title_html'  => 'Ocho lugares<br/>que <em>marcan</em> la ruta.',
	'carousel_sub'         => 'De Bromo a Raja Ampat. Cada ruta es única, pero estos son los puntos sobre los que conversamos para diseñar tu viaje a medida.',
	'carousel_items' => [
		[ 'title' => 'Monte Bromo',     'description' => 'Amanecer entre nubes y volcanes activos. El jeep 4x4 te lleva al mirador para ver el sol salir sobre el cráter humeante.', 'imagePath' => '/images/guides/viajes-a-indonesia-personalizados-monte-bromo.webp', 'tag' => 'Java Oriental' ],
		[ 'title' => 'Bali',            'description' => 'La isla de los dioses: arrozales de Ubud, templos de agua, ceremonias vivas y atardeceres en Tanah Lot.',                  'imagePath' => '/images/indonesia/viajes-a-indonesia-personalizados-bali.webp',         'tag' => 'Isla de Bali' ],
		[ 'title' => 'Nusa Penida',     'description' => 'Acantilados impresionantes, Kelingking Beach y aguas turquesas. Snorkel con mantarrayas en Crystal Bay.',                  'imagePath' => '/images/indonesia/viajes-a-indonesia-personalizados-nusa-penida-2.webp', 'tag' => 'Islas Nusa' ],
		[ 'title' => 'Parque Komodo',   'description' => 'El hogar del dragón de Komodo. Navegación entre islas, Playa Rosa y encuentros con fauna prehistórica.',                   'imagePath' => '/images/indonesia/viajes-a-indonesia-personalizados-komodo-2.webp',      'tag' => 'Flores' ],
		[ 'title' => 'Lombok',          'description' => 'La Bali auténtica: Monte Rinjani, Gili Islands sin coches y playas de surf salvaje en Kuta.',                                'imagePath' => '/images/indonesia/viajes-a-indonesia-personalizados-lombok-volcan-batur.webp', 'tag' => 'Isla de Lombok' ],
		[ 'title' => 'Raja Ampat',      'description' => 'El último paraíso: arrecifes de coral, biodiversidad marina única y kayak entre islas vírgenes.',                          'imagePath' => '/images/indonesia/viajes-a-indonesia-personalizados-raja-ampat.webp',    'tag' => 'Papúa Occidental' ],
		[ 'title' => 'Tirta Empul',     'description' => 'Ritual de purificación en aguas sagradas. Templo balinés donde locales y viajeros se conectan con lo divino.',             'imagePath' => '/images/indonesia/viajes-a-indonesia-personalizados-bali-tirta-empul-2.webp', 'tag' => 'Templos de Bali' ],
		[ 'title' => 'Kelingking Beach','description' => 'El icono de Nusa Penida: acantilado en forma de T-Rex y descenso épico a la playa virgen.',                                 'imagePath' => '/images/indonesia/viajes-a-indonesia-personalizados-kilingkin.webp',     'tag' => 'Nusa Penida' ],
	],

	'hosts_chip'       => 'La gente de la ruta',
	'hosts_title_html' => 'Conoce a nuestros<br/><em>anfitriones.</em>',
	'hosts_sub'        => 'Un viaje no son solo lugares: son personas. En Indonesia trabajamos con guías que no solo muestran el camino, comparten su isla.',
	'hosts' => [
		[
			'badge'     => 'Bali · Indonesia',
			'role'      => 'Guía & emprendedor balinés',
			'name_html' => 'David · <em>el conductor</em>',
			'bio'       => 'Conoce cada carretera y atajo de la isla. Su empresa de transporte es sinónimo de seguridad y sonrisas, llevándote a los rincones secretos de Bali lejos del tráfico habitual.',
			'image'     => $img . '/autores/david/autor-david.png',
			'meta'      => [
				[ 'l' => 'Especialidad', 'v' => 'Rutas privadas' ],
				[ 'l' => 'Idiomas',      'v' => 'ES · EN · ID' ],
				[ 'l' => 'Base',         'v' => 'Ubud' ],
			],
		],
	],

	'tips_chip'       => 'Antes de salir',
	'tips_title_html' => 'Recomendaciones <em>Ukiyo</em>',
	'tips_sub'        => 'Lo que llevamos en la mochila y lo que nos gustaría que tuvieras en mente antes de aterrizar.',
	'tips_prep' => [
		'badge' => 'Preparación',
		'title' => 'Equipaje esencial',
		'sub'   => 'Pesa poco, pero piensa bien lo que va dentro.',
		'items_html' => [
			'<strong>Ropa cómoda y respetuosa</strong> para templos (hombros y rodillas cubiertos).',
			'<strong>Calzado cómodo</strong> para caminar ciudades y trekking ligero.',
			'<strong>Protector solar biodegradable</strong> y repelente natural.',
			'<strong>Bolsa estanca</strong> para proteger cámara y móvil de la humedad.',
			'<strong>Mente abierta</strong> para experiencias culturales auténticas.',
		],
	],
	'tips_notes' => [
		'badge' => 'A tener en cuenta',
		'title' => 'Notas importantes',
		'sub'   => 'Avisos honestos para que el viaje sea lo que esperas.',
		'items_html' => [
			'Nivel físico <strong>moderado</strong> requerido para algunas actividades (volcanes, snorkel).',
			'<strong>Respeto absoluto</strong> por las tradiciones y ceremonias locales.',
			'Grupos <strong>siempre pequeños</strong> (máx. 8) para una experiencia íntima.',
			'<strong>Seguro de viaje recomendado</strong> con cobertura médica completa.',
		],
	],

	'cta_bg'           => $img . '/indonesia/viajes-a-indonesia-personalizados-bali.webp',
	'cta_title_html'   => '¿Listo para vivir<br/><em>Indonesia?</em>',
	'cta_text'         => 'Cuéntanos qué islas te atraen y diseñamos una ruta por Indonesia con tiempos realistas, buenos traslados y experiencias cuidadas.',
	'cta_primary_btn'  => 'Diseñar mi viaje a Indonesia',

	'destination_key'  => 'destination_indonesia',
	'destination_name' => 'Indonesia',
	'related_keys'     => [ 'destination_costa_rica', 'destination_colombia', 'destination_marruecos', 'destination_italia' ],
	'related_intro'    => 'Si te atraen las islas, los paisajes vivos y los viajes con naturaleza y cultura local, estos destinos encajan con la lógica de un viaje a medida a Indonesia.',
	'blog_title'       => 'Guías para preparar tu viaje a Indonesia',
	'blog_intro'       => 'Presupuesto, ruta, lugares imprescindibles y mejor época para diseñar un viaje a Indonesia con criterio.',
	'blog_category'    => 'indonesia',
] );

get_footer();
