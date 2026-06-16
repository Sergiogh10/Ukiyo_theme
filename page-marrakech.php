<?php
/**
 * Template Name: Marrakech Experience
 *
 * Landing transaccional para la KW "viajes marrakech" (cluster 33.300 vol/mes).
 * Reutiliza el helper `ukiyo_render_destination_v2()` con foco en la ciudad
 * como base del viaje a medida a Marruecos (medina, riads, desierto cercano).
 */
get_header();

$img = get_template_directory_uri() . '/images';

$ico_calendar = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>';
$ico_temp     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12c4-6 7-6 10 0s6 6 10 0"/><path d="M2 6c4-6 7-6 10 0s6 6 10 0"/><path d="M2 18c4-6 7-6 10 0s6 6 10 0"/></svg>';
$ico_lang     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2c3 3.5 3 16 0 20M12 2c-3 3.5-3 16 0 20"/></svg>';
$ico_clock    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 6v6l3 1"/></svg>';
$ico_plane    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9 0-1.2.3L2 8.4l8 4-3 3-3-.5L2 16.5l6 1.5 1.5 6 1.8-1.8L11 19l3-3 4 8 1.9-1.6c.3-.3.4-.7.3-1.2Z"/></svg>';

$ico_medina   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 22V8l6-5 6 5v14"/><path d="M9 22v-6h6v6"/><path d="M15 13h6v9h-6"/></svg>';
$ico_souk     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9h18l-2 11H5L3 9Z"/><path d="M8 9V5a4 4 0 1 1 8 0v4"/></svg>';
$ico_desert   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M2 18c4-4 8-4 12 0s8 0 8 0"/><path d="M2 14c4-4 8-4 12 0s8 0 8 0"/><circle cx="18" cy="6" r="2"/></svg>';
$ico_riad     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22V10l8-6 8 6v12"/><path d="M9 22V14h6v8"/><path d="M4 14h16"/></svg>';
$ico_atlas    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m3 20 6-10 4 6 3-3 5 7"/></svg>';
$ico_food     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14h16"/><path d="M5 14a7 7 0 0 1 14 0"/><path d="M12 7V3"/><path d="M10 3h4"/><path d="M3 18h18"/></svg>';

ukiyo_render_destination_v2( [
	'slug'             => 'mk',
	'breadcrumb'       => 'Marrakech',
	'eyebrow'          => 'Marruecos · مرحبا · La perla del sur',
	'hero_title'       => 'Viajes a medida a Marrakech,<br/>el corazón <em>de Marruecos.</em>',
	'hero_sub'         => 'La ciudad roja como base de tu viaje: medina viva, riads con patio y rutas al Atlas, Esauira o el desierto. Diseñamos cada día sin prisa.',
	'hero_image'       => $img . '/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.webp',
	'cta_primary'      => 'Diseñar mi viaje a Marrakech',
	'scroll_label'     => 'Marhaba',

	'key_facts' => [
		[ 'icon' => $ico_calendar, 'lbl' => 'Mejor época',    'val' => 'Oct — Abr' ],
		[ 'icon' => $ico_temp,     'lbl' => 'Clima',          'val' => 'Cálido · 18-28°C' ],
		[ 'icon' => $ico_lang,     'lbl' => 'Idioma',         'val' => 'Árabe · Francés' ],
		[ 'icon' => $ico_clock,    'lbl' => 'Duración ideal', 'val' => '5 — 10 días' ],
		[ 'icon' => $ico_plane,    'lbl' => 'Vuelo',          'val' => '~3,5 h desde Madrid' ],
	],

	'intro' => [
		'title_html' => '<span class="dot"></span> La medina, el riad<br/>y la <em>paciencia.</em>',
		'lede_html'  => '<strong>Marrakech</strong> es la mejor puerta de entrada para un viaje a medida por Marruecos: vuelos directos, riads con carácter y rutas que salen en todas las direcciones.',
		'paragraphs' => [
			'Diseñamos el viaje empezando por la ciudad y planificamos contigo qué incluir: el Atlas en un día, el desierto de Agafay, una escapada a Esauira o una ruta más larga hacia Merzouga.',
			'Trabajamos con riads pequeños, guías locales para la medina y conductores de confianza para los traslados. La idea es vivir Marrakech sin agobios, con tiempo para perderse en los zocos y volver al patio.',
		],
		'marks' => [
			[ 'n_html' => '<em>4</em>',     'l' => 'Ciudades imperiales' ],
			[ 'n_html' => '1062',           'l' => 'Año de fundación' ],
			[ 'n_html' => '700+',           'l' => 'Riads en la medina' ],
			[ 'n_html' => '2',              'l' => 'Patrimonios UNESCO en la ciudad' ],
		],
		'main_img' => $img . '/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.webp',
		'pip_img'  => $img . '/marruecos/viajes-personalizados-ukiyo-marruecos-aitbenhaddou.webp',
		'stamp'    => '道 · Marhaba',
	],

	'features_chip'       => 'Razones para venir',
	'features_title_html' => 'Lo que hace <em>única</em><br/>a Marrakech.',
	'features_sub'        => 'Seis razones por las que diseñar la ruta a medida desde Marrakech es muy distinto de cualquier viaje al norte de África.',
	'features' => [
		[ 'title' => 'Medina viva',           'description' => 'Djemaa el-Fna, zocos laberínticos y artesanos en cada esquina. Una ciudad de 12 siglos que sigue funcionando como tal.',                       'icon_svg' => $ico_medina ],
		[ 'title' => 'Riads con patio',        'description' => 'Antiguas casas señoriales convertidas en alojamientos íntimos. Pocas habitaciones, patio interior y silencio en mitad de la medina.',         'icon_svg' => $ico_riad ],
		[ 'title' => 'Salida al desierto',     'description' => 'Desde Agafay (1 noche) hasta Merzouga (3-4 noches). Distintas combinaciones según los días que tengas y el ritmo que busques.',                'icon_svg' => $ico_desert ],
		[ 'title' => 'Zocos y artesanía',      'description' => 'Babuchas, alfombras, cerámica, lámparas. Te llevamos a los talleres reales, no a los puestos del circuito turístico.',                          'icon_svg' => $ico_souk ],
		[ 'title' => 'Atlas a la puerta',      'description' => 'Pueblos bereberes, valles y senderismo a 90 minutos en coche. Una excursión de día o una ruta de varios.',                                       'icon_svg' => $ico_atlas ],
		[ 'title' => 'Cocina marroquí',        'description' => 'Tajines en azotea, té a la menta con vista a la Kutubía, panes recién hechos. Cenas con familias locales si quieres.',                          'icon_svg' => $ico_food ],
	],

	'carousel_meta'       => 'Itinerario abierto',
	'carousel_title_html' => 'Lugares<br/>que <em>marcan</em> la ruta.',
	'carousel_sub'        => 'De la Kutubía a Merzouga. Cada ruta es única; estos son los puntos sobre los que conversamos contigo para diseñar tu viaje.',
	'carousel_items' => [
		[ 'title' => 'Djemaa el-Fna',     'description' => 'La plaza más viva del país: contadores de historias, músicos gnawa y el atardecer que tiñe la Kutubía de rojo.',                            'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.webp',    'tag' => 'Plaza · UNESCO' ],
		[ 'title' => 'Jardín Majorelle',  'description' => 'El refugio de Yves Saint Laurent en pleno barrio de Gueliz. Azul cobalto y vegetación, paréntesis silencioso al medio día.',                'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.webp',    'tag' => 'Jardín' ],
		[ 'title' => 'Medina y zocos',    'description' => 'Laberinto de calles entre el Mellah y Bab Doukkala. Talleres de cuero, plata, especias y madera. Mejor con guía local.',                    'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.webp',    'tag' => 'Patrimonio vivo' ],
		[ 'title' => 'Atlas y bereberes', 'description' => 'Valle de Ourika, Imlil o Asni: rutas de día a pueblos del Atlas a 60-90 minutos. Té con menta y caminatas entre nogales.',                  'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-azrou.webp',         'tag' => 'Excursión de día' ],
		[ 'title' => 'Esauira',           'description' => 'Tres horas hasta el Atlántico: medina blanca, viento del Alisio y pescado fresco. Ideal para 2-3 noches después de Marrakech.',             'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-rissani.webp',       'tag' => 'Costa atlántica' ],
		[ 'title' => 'Ait Ben Haddou',    'description' => 'La kasbah de adobe rojo de las películas. Parada obligada camino al desierto, normalmente con noche en Ouarzazate.',                          'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-aitbenhaddou.webp', 'tag' => 'Patrimonio UNESCO' ],
		[ 'title' => 'Merzouga',          'description' => 'Las dunas del Erg Chebbi a 9-10 horas en coche. Camellos, jaimas y noche bajo las estrellas. Necesita 3-4 noches mínimo.',                  'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-merzouga.webp',     'tag' => 'Sahara' ],
		[ 'title' => 'Fez',               'description' => 'Si el viaje es más largo: 6-7 horas hasta la otra capital imperial. La medina más antigua del mundo, curtidurías y artesanos vivos.',         'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-fez.webp',           'tag' => 'Ciudad imperial' ],
	],
] );

get_footer();
