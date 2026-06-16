<?php
/**
 * Template Name: Bali Experience
 *
 * Landing transaccional para el cluster Bali (22.350 vol/mes). Posiciona Bali
 * como destino propio sin canibalizar la landing más amplia de Indonesia.
 */
get_header();

$img = get_template_directory_uri() . '/images';

$ico_calendar = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>';
$ico_temp     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12c4-6 7-6 10 0s6 6 10 0"/><path d="M2 6c4-6 7-6 10 0s6 6 10 0"/><path d="M2 18c4-6 7-6 10 0s6 6 10 0"/></svg>';
$ico_lang     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2c3 3.5 3 16 0 20M12 2c-3 3.5-3 16 0 20"/></svg>';
$ico_clock    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 6v6l3 1"/></svg>';
$ico_plane    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9 0-1.2.3L2 8.4l8 4-3 3-3-.5L2 16.5l6 1.5 1.5 6 1.8-1.8L11 19l3-3 4 8 1.9-1.6c.3-.3.4-.7.3-1.2Z"/></svg>';

$ico_temple   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 4 8v14h16V8l-8-6Z"/><path d="M10 22v-6h4v6"/><path d="M6 12h12"/></svg>';
$ico_rice     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21c0-6 4-9 9-9s9 3 9 9"/><path d="M12 3v9"/><path d="M9 7c1 1 2 2 3 2s2-1 3-2"/></svg>';
$ico_wave     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12c2-2 4-2 6 0s4 2 6 0 4-2 6 0"/><path d="M3 18c2-2 4-2 6 0s4 2 6 0 4-2 6 0"/></svg>';
$ico_yoga     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="4" r="2"/><path d="M12 6v6"/><path d="M8 18l4-6 4 6"/><path d="M5 14l7-2 7 2"/></svg>';
$ico_volcano  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c-3 4-3 8 0 12 3-4 3-8 0-12Z"/><path d="M5 22c0-4 3-7 7-7s7 3 7 7"/></svg>';
$ico_diver    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="7" r="3"/><path d="M9 10l-4 6 4 4 3-5 3 5 4-4-4-6"/></svg>';

ukiyo_render_destination_v2( [
	'slug'             => 'bl',
	'breadcrumb'       => 'Bali',
	'eyebrow'          => 'Indonesia · ᬩᬮᬶ · La isla de los dioses',
	'hero_title'       => 'Viajes a medida a Bali,<br/>arroz, templos y <em>océano.</em>',
	'hero_sub'         => 'Arrozales de Ubud, templos al amanecer, playas del sur y rincones que aún se pueden vivir despacio. Diseñamos rutas que evitan el ruido turístico.',
	'hero_image'       => $img . '/indonesia/bali/viajes-a-indonesia-bali-13.webp',
	'cta_primary'      => 'Diseñar mi viaje a Bali',
	'scroll_label'     => 'Selamat datang',

	'key_facts' => [
		[ 'icon' => $ico_calendar, 'lbl' => 'Mejor época',    'val' => 'Abr — Oct (seca)' ],
		[ 'icon' => $ico_temp,     'lbl' => 'Clima',          'val' => 'Tropical · 26-32°C' ],
		[ 'icon' => $ico_lang,     'lbl' => 'Idioma',         'val' => 'Indonesio · Balinés' ],
		[ 'icon' => $ico_clock,    'lbl' => 'Duración ideal', 'val' => '10 — 16 días' ],
		[ 'icon' => $ico_plane,    'lbl' => 'Vuelo',          'val' => '~17 h (1 escala)' ],
	],

	'intro' => [
		'title_html' => '<span class="dot"></span> La isla de los <em>dioses</em><br/>vivida sin prisa.',
		'lede_html'  => '<strong>Bali</strong> está más viva que su fama. Por debajo de los reels de Canggu hay arrozales, ceremonias hindúes diarias y un norte casi vacío que aún reconoce al viajero.',
		'paragraphs' => [
			'Diseñamos rutas privadas con base en Ubud o el norte, evitando los puntos más saturados del sur. Templos al amanecer, casas tradicionales con familias locales y caminatas entre los terrazados de Tegalalang o Jatiluwih.',
			'No es un viaje de check-list. Es un cambio de ritmo: aprender a ofrecer canang sari por la mañana, mojarse en una cascada cubierta de musgo y descubrir que la isla es más grande de lo que parecía.',
		],
		'marks' => [
			[ 'n_html' => '<em>20.000+</em>', 'l' => 'Templos en la isla' ],
			[ 'n_html' => '3.000+',            'l' => 'Metros · Volcán Agung' ],
			[ 'n_html' => '5',                 'l' => 'Direcciones · cosmología balinesa' ],
			[ 'n_html' => '+90%',              'l' => 'Población hinduista' ],
		],
		'main_img' => $img . '/indonesia/viajes-a-indonesia-personalizados-bali-tirta-empul.webp',
		'pip_img'  => $img . '/indonesia/bali/viajes-a-indonesia-bali-13.webp',
		'stamp'    => '道 · Om Swastiastu',
	],

	'features_chip'       => 'Razones para venir',
	'features_title_html' => 'Lo que hace <em>única</em><br/>a Bali.',
	'features_sub'        => 'Seis razones por las que un viaje a medida a Bali se parece poco a las fotos del feed.',
	'features' => [
		[ 'title' => 'Templos vivos',           'description' => 'Tirta Empul, Besakih, Tanah Lot, Uluwatu. No son monumentos: son lugares de culto donde se hacen ceremonias diarias.',                  'icon_svg' => $ico_temple ],
		[ 'title' => 'Arrozales en terraza',    'description' => 'Tegalalang, Jatiluwih o Sidemen. Caminatas entre verde infinito y agua corriente con sistema subak, patrimonio UNESCO.',                 'icon_svg' => $ico_rice ],
		[ 'title' => 'Norte y este auténticos', 'description' => 'Amed, Lovina, Munduk. Bali sin masificación: pescadores, café, cascadas y volcanes a la puerta.',                                          'icon_svg' => $ico_volcano ],
		[ 'title' => 'Yoga y bienestar real',   'description' => 'Ubud es la capital sin máscaras: retiros serios, profesores reconocidos y un ecosistema espiritual que la isla cultiva desde hace décadas.', 'icon_svg' => $ico_yoga ],
		[ 'title' => 'Playas y surf',           'description' => 'Bingin, Padang Padang, Balian. Olas para todos los niveles y atardeceres en acantilados sin reloj.',                                       'icon_svg' => $ico_wave ],
		[ 'title' => 'Buceo y snorkel',         'description' => 'Tulamben (USS Liberty), Menjangan y Nusa Penida. Aguas claras, manta rays y arrecifes que conservan vida.',                                'icon_svg' => $ico_diver ],
	],

	'carousel_meta'       => 'Itinerario abierto',
	'carousel_title_html' => 'Ocho lugares<br/>que <em>marcan</em> la ruta.',
	'carousel_sub'        => 'De Ubud al norte. Cada ruta es única; estos son los puntos sobre los que conversamos contigo para diseñar tu viaje.',
	'carousel_items' => [
		[ 'title' => 'Ubud',           'description' => 'La capital cultural: arrozales, templos, mercados y una escena gastronómica seria. Base ideal para 3-5 noches.',                                  'imagePath' => '/images/indonesia/bali/viajes-a-indonesia-bali-13.webp',                          'tag' => 'Centro cultural' ],
		[ 'title' => 'Tirta Empul',    'description' => 'Templo del agua sagrada: ceremonia de purificación en manantiales que llevan siglos llenándose. Mejor al amanecer.',                                  'imagePath' => '/images/indonesia/viajes-a-indonesia-personalizados-bali-tirta-empul.webp',         'tag' => 'Templo del agua' ],
		[ 'title' => 'Tegalalang',     'description' => 'Los arrozales más fotografiados, pero hay caminos de tres horas que se quedan solos. Te llevamos al inicio correcto.',                                 'imagePath' => '/images/indonesia/bali/viajes-a-indonesia-bali-11.webp',                          'tag' => 'Arrozales' ],
		[ 'title' => 'Munduk',         'description' => 'El norte de montaña: cascadas, plantaciones de café y temperatura templada. Bali sin coches de alquiler.',                                              'imagePath' => '/images/indonesia/bali/viajes-a-indonesia-bali-nung-nung-waterfall-2-come2indonesia.webp', 'tag' => 'Norte verde' ],
		[ 'title' => 'Uluwatu',        'description' => 'Acantilados al sur, danza Kecak al atardecer y olas legendarias. Un día perfecto si vienes desde el aeropuerto.',                                      'imagePath' => '/images/indonesia/bali/viajes-a-indonesia-bali-uluwatu-come2indonesia-3.webp',     'tag' => 'Acantilados' ],
		[ 'title' => 'Sidemen',        'description' => 'Valle agrícola entre el Agung y el mar. Casas de bambú y caminatas entre arrozales sin un solo turista.',                                              'imagePath' => '/images/indonesia/bali/viajes-a-indonesia-bali-52.webp',                          'tag' => 'Valle escondido' ],
		[ 'title' => 'Amed · este',    'description' => 'Pueblo pescador, snorkel con manta rays y buceo al USS Liberty en Tulamben. El este aún no ha cambiado.',                                              'imagePath' => '/images/indonesia/bali/viajes-a-indonesia-bali-3.webp',                           'tag' => 'Buceo y mar' ],
		[ 'title' => 'Nusa Penida',    'description' => 'Una hora en barco desde Sanur: acantilados verticales, mantas en Manta Bay y playas como Kelingking. Ideal para 2 noches.',                            'imagePath' => '/images/indonesia/bali/viajes-a-indonesia-bali-15.webp',                          'tag' => 'Isla satélite' ],
	],
] );

get_footer();
