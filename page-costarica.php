<?php
/**
 * Template Name: Costarica Experience
 *
 * Implementa el layout Claude Design "Destino-Costa-Rica.html" vía el helper
 * `ukiyo_render_destination_v2()`, igual que el resto de destinos
 * (Indonesia, Italia, Colombia, Marruecos, Lanzarote).
 *
 * Decisiones:
 *   - Imágenes del banco /images/costarica/ y /images/autores/ (no /assets/ del export).
 *   - WhatsApp en CTA usa el icono icons8 PNG que ya tenemos en otras plantillas.
 *   - El grid "ocho lugares" del export se sustituye por los 8 items del Experiences
 *     Carousel ya existente en la plantilla (preservados desde la versión anterior).
 *   - Related + Blog posts: helpers del tema (`ukiyo_render_related_internal_links`,
 *     `ukiyo_render_destination_blog_posts`).
 */
get_header();

$img = get_template_directory_uri() . '/images';

// SVGs para key facts (los mismos del export Destino-Costa-Rica.html).
$ico_calendar = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>';
$ico_temp     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12c4-6 7-6 10 0s6 6 10 0"/><path d="M2 6c4-6 7-6 10 0s6 6 10 0"/><path d="M2 18c4-6 7-6 10 0s6 6 10 0"/></svg>';
$ico_lang     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2c3 3.5 3 16 0 20M12 2c-3 3.5-3 16 0 20"/></svg>';
$ico_clock    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 6v6l3 1"/></svg>';
$ico_plane    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9 0-1.2.3L2 8.4l8 4-3 3-3-.5L2 16.5l6 1.5 1.5 6 1.8-1.8L11 19l3-3 4 8 1.9-1.6c.3-.3.4-.7.3-1.2Z"/></svg>';

// SVGs para features (los mismos del export Destino-Costa-Rica.html).
$ico_compass  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M2 12h20"/><path d="M5 5c3 3 3 11 0 14M19 5c-3 3-3 11 0 14M5 19c3-3 11-3 14 0M5 5c3-3 11-3 14 0"/></svg>';
$ico_ocean    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12c2-2 4-2 6 0s4 2 6 0 4-2 6 0"/><path d="M3 18c2-2 4-2 6 0s4 2 6 0 4-2 6 0"/><path d="M12 2v6"/><circle cx="12" cy="3" r="1"/></svg>';
$ico_people   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="7" r="3"/><circle cx="17" cy="9" r="2"/><circle cx="6" cy="14" r="2"/><path d="M2 21c2-3 5-4 8-4s6 1 8 4"/></svg>';
$ico_adv      = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 20l5-7 4 5 3-4 6 6"/><path d="M14 6l4-4 4 4"/><path d="M18 2v8"/></svg>';
$ico_volcano  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c-3 4-3 8 0 12 3-4 3-8 0-12Z"/><path d="M5 22c0-4 3-7 7-7s7 3 7 7"/><path d="M9 18l-2-2M15 18l2-2"/></svg>';
$ico_eco      = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8c-5 0-9 4-9 9 0-5-4-9-9-9 5 0 9-4 9-9 0 5 4 9 9 9Z"/></svg>';

ukiyo_render_destination_v2( [
	'slug'             => 'cr',
	'breadcrumb'       => 'Costa Rica',
	'eyebrow'          => 'América Central · プラビダ · Pura vida',
	'hero_title'       => 'Viajes a medida a Costa Rica,<br/>donde respira la <em>selva.</em>',
	'hero_sub'         => 'El 5% de la biodiversidad del planeta entre dos océanos, volcanes vivos y bosques nubosos. Diseñamos rutas privadas para vivirlo con calma.',
	'hero_image'       => $img . '/costarica/viajes-a-costa-rica-personalizados-monteverde-bosque-nuboso.webp',
	'cta_primary'      => 'Diseñar mi viaje a Costa Rica',
	'scroll_label'     => 'Pura vida',

	'key_facts' => [
		[ 'icon' => $ico_calendar, 'lbl' => 'Mejor época',       'val' => 'Dic — Abr' ],
		[ 'icon' => $ico_temp,     'lbl' => 'Clima',             'val' => 'Tropical · 24-32°C' ],
		[ 'icon' => $ico_lang,     'lbl' => 'Idioma',            'val' => 'Español' ],
		[ 'icon' => $ico_clock,    'lbl' => 'Duración ideal',    'val' => '12 — 16 días' ],
		[ 'icon' => $ico_plane,    'lbl' => 'Vuelo desde España','val' => '~11h directo' ],
	],

	'intro' => [
		'title_html' => '<span class="dot"></span> Donde la naturaleza<br/><em>manda.</em>',
		'lede_html'  => '<strong>Costa Rica</strong> es un país pequeño que esconde dos océanos, doce zonas de vida y media biósfera planetaria entre la niebla.',
		'paragraphs' => [
			'Aquí los días empiezan con el amanecer caribeño y terminan con el atardecer del Pacífico. Diseñamos rutas privadas que alternan selvas primarias, descansos junto al mar y encuentros con guías locales que llevan media vida en estos bosques.',
			'No es un viaje de check-list. Es un cambio de ritmo: aprender a esperar al perezoso, callar para que cante el quetzal, dejar que el día decida.',
		],
		'marks' => [
			[ 'n_html' => '<em>5%</em>', 'l' => 'Biodiversidad mundial' ],
			[ 'n_html' => '28',          'l' => 'Parques nacionales' ],
			[ 'n_html' => '2',           'l' => 'Océanos · 1 país' ],
			[ 'n_html' => '+25%',        'l' => 'Territorio protegido' ],
		],
		'main_img' => $img . '/costarica/viajes-a-costa-rica-personalizados-rio-celeste.webp',
		'pip_img'  => $img . '/costarica/viajes-a-costa-rica-personalizados-rana-ojos-rojos.webp',
		'stamp'    => '道 · Pura vida',
	],

	'features_chip'       => 'Razones para venir',
	'features_title_html' => 'Lo que hace <em>única</em><br/>a Costa Rica.',
	'features_sub'        => 'Seis razones por las que diseñar una ruta a medida por este país es muy distinto de cualquier viaje al trópico.',
	'features' => [
		[ 'title' => 'Naturaleza salvaje en estado puro', 'description' => 'El 5% de la biodiversidad del planeta concentrada en un territorio del tamaño de Suiza. Observa perezosos, tucanes y guacamayos en su hábitat real — sin zoo, sin truco.', 'icon_svg' => $ico_compass ],
		[ 'title' => 'Dos océanos en una misma ruta',     'description' => 'Despierta con el amanecer caribeño y despide el día con el atardecer del Pacífico. Dos mundos acuáticos en menos de cinco horas de carretera.',                       'icon_svg' => $ico_ocean ],
		[ 'title' => 'Cultura "Pura Vida"',               'description' => 'La hospitalidad tica auténtica. Pioneros mundiales en ecoturismo. Aprender a vivir con menos prisa es la lección de fondo.',                                          'icon_svg' => $ico_people ],
		[ 'title' => 'Aventura real',                     'description' => 'Rafting de clase mundial, canopy entre nubes y trekking volcánico. Adrenalina con guías de campo, no de catálogo.',                                                   'icon_svg' => $ico_adv ],
		[ 'title' => 'Volcanes vivos',                    'description' => 'Arenal, Poás, Tenorio, Rincón de la Vieja. Termales naturales, cráteres activos y caminos por bosques nacidos del fuego.',                                            'icon_svg' => $ico_volcano ],
		[ 'title' => 'Viaje responsable, por diseño',     'description' => 'Más del 25% del país es área protegida. Trabajamos con lodges familiares, guías comunitarios y operadores con certificación CST. Lo que pisamos lo dejamos mejor.', 'icon_svg' => $ico_eco ],
	],

	'carousel_meta'       => 'Itinerario abierto',
	'carousel_title_html' => 'Ocho lugares<br/>que <em>marcan</em> la ruta.',
	'carousel_sub'        => 'De los canales de Tortuguero al Pacífico de Guanacaste. Cada ruta es única, pero estos son los puntos sobre los que conversamos contigo para diseñar tu viaje a medida.',
	// 8 items del Experiences Carousel preservados de la implementación anterior.
	'carousel_items' => [
		[ 'title' => 'Corcovado',      'description' => 'La joya de la Península de Osa: selva primaria, playas salvajes y muchísima fauna. El lugar más intenso biológicamente.', 'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-mono.webp',          'tag' => 'Península de Osa' ],
		[ 'title' => 'Monteverde',     'description' => 'El bosque nuboso más conocido: puentes colgantes, niebla, orquídeas y aves únicas en un clima fresco.',                  'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-monteverde.webp',                'tag' => 'Bosque Nuboso' ],
		[ 'title' => 'Tortuguero',     'description' => 'La Costa Rica de canales: selva, agua y Caribe. Safaris en bote y desove de tortugas en temporada.',                     'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-atardecer.webp',     'tag' => 'Caribe Norte' ],
		[ 'title' => 'La Fortuna',     'description' => 'Base para explorar el Volcán Arenal: cataratas, termales relajantes y rutas de senderismo con vistas.',                  'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-rio-celeste.webp',              'tag' => 'Volcán Arenal' ],
		[ 'title' => 'Puerto Viejo',   'description' => 'El Caribe Sur más bohemio: selva pegada al mar, ritmo afrocaribeño y el Parque Nacional Cahuita.',                       'imagePath' => '/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-mono.webp', 'tag' => 'Caribe Sur' ],
		[ 'title' => 'Manuel Antonio', 'description' => 'Playas paradisíacas y selva tropical en perfecta armonía. Monos capuchinos y perezosos a metros del mar.',               'imagePath' => '/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-tucanazul.webp', 'tag' => 'Pacífico Central' ],
		[ 'title' => 'Cañón Jurásico', 'description' => 'El río de aguas turquesas más impresionante del país. Naturaleza volcánica en estado puro.',                              'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-cañonjurasico.webp',            'tag' => 'Tenorio' ],
		[ 'title' => 'Guanacaste',     'description' => 'Playas vírgenes del Pacífico, surf de clase mundial y atardeceres inolvidables.',                                         'imagePath' => '/images/costarica/viajes-a-costa-rica-personalizados-guanacaste.webp',               'tag' => 'Pacífico Norte' ],
	],

	'hosts_chip'       => 'La gente de la ruta',
	'hosts_title_html' => 'Conoce a nuestros<br/><em>anfitriones.</em>',
	'hosts_sub'        => 'Un viaje no son solo lugares: son personas. En Costa Rica trabajamos con guías que no enseñan el camino — comparten su tierra.',
	'hosts' => [
		[
			'badge'     => 'Tortuguero · Pacífico',
			'role'      => 'Guía & fotógrafo de naturaleza',
			'name_html' => 'Luis · <em>el ojo del bosque</em>',
			'bio'       => 'Lleva años esperando la luz justa en humedales y bosques tropicales. Su forma de guiar es silencio, paciencia y respeto absoluto por la fauna. Birdwatching, perezosos y las horas mágicas que ningún tour estándar conoce.',
			'image'     => $img . '/autores/luis/autor-luis.png',
			'meta'      => [
				[ 'l' => 'Especialidad',   'v' => 'Wildlife & aves' ],
				[ 'l' => 'Idiomas',        'v' => 'ES · EN' ],
				[ 'l' => 'Años en campo',  'v' => '+12' ],
			],
		],
		[
			'badge'     => 'Caribe · Talamanca',
			'role'      => 'Conservacionista & guía',
			'name_html' => 'Alexis · <em>el cuidador</em>',
			'bio'       => 'Amante de los animales y de su país. Lleva un santuario de perezosos donde los rehabilita y los devuelve a la selva. Con él aprendes mirando: por qué un dedo se mueve, qué dice un canto, cómo no romper lo que ves.',
			'image'     => $img . '/autores/alexis/alexis.png',
			'meta'      => [
				[ 'l' => 'Especialidad', 'v' => 'Conservación' ],
				[ 'l' => 'Idiomas',      'v' => 'ES · EN' ],
				[ 'l' => 'Santuario',    'v' => 'Propio' ],
			],
		],
	],

	'tips_chip'       => 'Antes de salir',
	'tips_title_html' => 'Recomendaciones <em>Ukiyo</em>',
	'tips_sub'        => 'Lo que llevamos en la mochila y lo que nos gustaría que tuvieras en mente. Pequeñas cosas que cambian el viaje.',
	'tips_prep' => [
		'badge' => 'Preparación',
		'title' => 'Equipaje esencial',
		'sub'   => 'Pesa poco, pero pensar bien lo que va dentro de la mochila.',
		'items_html' => [
			'<strong>Ropa ligera de secado rápido</strong> y una capa impermeable (poncho/chubasquero). Llueve sin avisar.',
			'<strong>Calzado cerrado</strong> con buena suela — botas de trekking ya domadas, no estrenadas.',
			'<strong>Protector solar biodegradable</strong> y repelente de insectos de calidad. Innegociables.',
			'<strong>Bolsa estanca</strong> para proteger cámara y móvil de la humedad y la lluvia de selva.',
			'<strong>Prismáticos</strong> ligeros — la diferencia entre ver "un punto" y ver al quetzal.',
		],
	],
	'tips_notes' => [
		'badge' => 'A tener en cuenta',
		'title' => 'Notas importantes',
		'sub'   => 'Tres avisos honestos para que el viaje sea lo que esperas.',
		'items_html' => [
			'Nivel físico <strong>moderado</strong>: senderos húmedos, raíces y calor real. Nada extremo, pero hay que andar.',
			'<strong>Respeto absoluto por la fauna</strong>: no alimentar, no tocar, no perseguir. La distancia es parte del lujo.',
			'Grupos <strong>siempre pequeños</strong> (máx. 8) — para que la experiencia sea íntima y la huella mínima.',
			'<strong>Seguro de viaje recomendado</strong> con cobertura médica completa. Lo organizamos contigo.',
			'No hace falta vacuna obligatoria. Sí <strong>antimosquitos serio</strong> y precaución con el sol del trópico.',
		],
	],

	'cta_bg'           => $img . '/costarica/viajes-a-costa-rica-personalizados-rana-ojos-rojos.webp',
	'cta_title_html'   => '¿Listo para vivir<br/><em>Costa Rica?</em>',
	'cta_text'         => 'Cuéntanos qué tipo de viaje tienes en mente — fauna, parejas, familias, fotografía — y diseñamos una ruta privada a Costa Rica a tu medida.',
	'cta_primary_btn'  => 'Diseñar mi viaje a Costa Rica',

	'destination_key'  => 'destination_costa_rica',
	'destination_name' => 'Costa Rica',
	'related_keys'     => [ 'destination_colombia', 'destination_indonesia', 'destination_lanzarote', 'destination_marruecos' ],
	'related_intro'    => 'Si buscas naturaleza intensa, fauna y rutas con ritmo local, estos destinos comparten ADN con un viaje a medida a Costa Rica.',
	'blog_title'       => 'Guías para preparar tu viaje a Costa Rica',
	'blog_intro'       => 'Clima, presupuesto, ruta y lugares clave para organizar Costa Rica sin convertir el viaje en una carrera.',
	'blog_category'    => 'costa-rica',
] );

get_footer();
