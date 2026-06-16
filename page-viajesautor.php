<?php
/**
 * Template Name: Viajes de Autor
 *
 * Implementación del export "Viajes-Autor.html" de Claude Design.
 *
 * Decisiones:
 *   - Header/footer del tema (get_header / get_footer). Nav y footer del export omitidos.
 *   - CSS scoped a .ukiyo-trips para no contaminar otras plantillas.
 *   - Listado de trips = WP_Query del CPT viaje_autor (todos publicados).
 *   - Cómo funciona, Autores, FAQ y Otras formas: contenido del propio template
 *     (estático en el diseño; si en el futuro lo necesitas editable, se mueve a metas).
 *   - Imágenes de autores tiradas del banco /images/autores/{luis,moha,david,alexis}/.
 *   - WhatsApp en CTA final usa el icon8 PNG mantenido del .php anterior.
 */
get_header();

$autor_index   = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'viajes_autor' ) : home_url( '/' );
$destinos_url  = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destinations' ) : home_url( '/' );
$pricing_url   = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'pricing' ) : home_url( '/' );
$plan_trip_url = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'plan_trip' ) : home_url( '/' );
$autores_img   = get_template_directory_uri() . '/images/autores';
$hero_image    = get_template_directory_uri() . '/images/indonesia/viajes-autor-ukiyo-indonesia-orangutan.webp';

// Hero stats — derivables del CMS si se quieren editables luego.
$stats_max_pax        = '6–10';
$stats_active_authors = '5';
$stats_local_pct      = '100%';

// Listado de viajes de autor (CPT viaje_autor).
$paged = max( 1, (int) get_query_var( 'paged' ) ?: (int) get_query_var( 'page' ) );
$trips_query = new WP_Query( [
	'post_type'      => 'viaje_autor',
	'post_status'    => 'publish',
	'posts_per_page' => 6,
	'paged'          => $paged,
	'orderby'        => 'date',
	'order'          => 'DESC',
] );

// Catálogo de autores Ukiyo (estático — se renderiza en la sección "Las miradas").
$autores = [
	[
		'photo' => $autores_img . '/luis/autor-luis.png',
		'name'  => 'Luis',
		'tag'   => 'guía costarricense y fotógrafo',
		'role'  => 'Costa Rica · Brasil',
		'bio'   => 'Lleva años esperando la luz justa en humedales y bosques tropicales. Su Pantanal es silencio, paciencia y respeto por la fauna. Birdwatching, jaguares y tropical wildlife.',
	],
	[
		'photo' => $autores_img . '/moha/autor-moha2.webp',
		'name'  => 'Moha',
		'tag'   => 'guía marroquí',
		'role'  => 'Atlas · Sáhara',
		'bio'   => 'Nacido en el Atlas, conoce el desierto por dentro: los zocos que importan, los silencios que merecen la pena y el té en el lugar adecuado. Cultura, desierto y noches sin luna.',
	],
	[
		'photo' => $autores_img . '/david/autor-david.png',
		'name'  => 'David',
		'tag'   => 'instructor de buceo',
		'role'  => 'Bali · Komodo',
		'bio'   => 'Lleva una década en Tulamben. Conoce los arrecifes por su nombre y sabe exactamente cuándo aparece cada especie. Si te interesa lo que pasa bajo el agua, esto es para ti.',
	],
	[
		'photo' => $autores_img . '/alexis/alexis.png',
		'name'  => 'Alexis',
		'tag'   => 'conservacionista',
		'role'  => 'Tortuguero · Corcovado',
		'bio'   => 'Biólogo de campo en activo. Sus salidas incluyen acceso a estaciones de investigación y un enfoque científico real, sin teatralidad ni "tour del perezoso" de carretera.',
	],
];

// FAQ (estática — fácil de mover a meta si se quiere editable luego).
$faq = [
	[
		'q' => '¿Qué incluye una salida con autor?',
		'a' => 'Acompañamiento del autor durante todo el viaje, alojamientos seleccionados por nosotros, traslados internos, comidas indicadas en cada itinerario y las experiencias clave del programa. Los vuelos internacionales y el seguro de viaje quedan aparte y los detallamos en el presupuesto.',
	],
	[
		'q' => '¿Cómo son los grupos?',
		'a' => 'Plazas muy limitadas (entre 4 y 10 personas según la salida). Adultos viajando solos, parejas y, en algunos casos, familias con hijos mayores. Cada salida indica el perfil para el que está pensada.',
	],
	[
		'q' => '¿Hay fechas fijas o se pueden ajustar?',
		'a' => 'Trabajamos con fechas bajo demanda. Cuando hay grupo formado, se cierra la salida; si quieres una fecha distinta, podemos abrir una nueva a partir de cuatro plazas confirmadas. Nada de "intentar llenar el bus".',
	],
	[
		'q' => '¿Y si nunca he hecho un viaje así?',
		'a' => 'Más de la mitad de quienes se apuntan no había hecho nunca un viaje con autor. Cada salida lleva un nivel orientativo (cultural, físico, técnico) y nuestro equipo te ayuda a elegir la que mejor encaja con tu experiencia.',
	],
	[
		'q' => '¿Cómo se reserva?',
		'a' => 'Una primera videollamada gratuita para asegurarnos de que la salida encaja contigo, una señal del 30% para bloquear plaza y el resto pagadero hasta 30 días antes de la salida. Condiciones de cancelación específicas según el autor y la temporada.',
	],
];
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap">

<style>
  .ukiyo-trips{
    --primary:#8B4513; --primary-50:#FDF7F3; --primary-100:#F9E8D9; --primary-300:#E8B48D; --primary-700:#6B3410;
    --secondary:#9CAF88; --secondary-700:#5E6952;
    --accent:#D4A574; --accent-300:#EBD2AE; --accent-50:#FDF9F4;
    --bg:#FEFCF8; --surface:#F5F2ED; --paper:#F8F2E7;
    --ink:#2C2C2C; --ink-soft:#6B6B6B; --line:#E8E0D2;
    --font-sans:'Satoshi','Inter',system-ui,sans-serif;
    --font-display:'Rowdies',serif;
    --font-mono:'DM Mono',ui-monospace,monospace;
    --section-y:6rem;
    background:var(--bg); color:var(--ink); font-family:var(--font-sans);
    font-weight:400; font-size:17px; line-height:1.6;
    -webkit-font-smoothing:antialiased;
  }
  .ukiyo-trips *{box-sizing:border-box}
  .ukiyo-trips img{max-width:100%;display:block}
  .ukiyo-trips a{color:inherit;text-decoration:none}
  .ukiyo-trips h1,
  .ukiyo-trips h2,
  .ukiyo-trips h3,
  .ukiyo-trips h4{font-family:var(--font-display);font-weight:400;letter-spacing:-0.01em;line-height:1.15;margin:0}
  .ukiyo-trips .container{max-width:1240px;margin:0 auto;padding:0 1.75rem}

  /* HERO */
  .ukiyo-trips .hero{position:relative;min-height:88vh;display:flex;align-items:center;color:#fff;overflow:hidden;padding:8rem 0 5rem}
  .ukiyo-trips .hero__bg{position:absolute;inset:0;z-index:0}
  .ukiyo-trips .hero__bg img{width:100%;height:100%;object-fit:cover;transform:scale(1.03);animation:ukiyoTripsZoom 18s ease-in-out infinite alternate}
  @keyframes ukiyoTripsZoom{from{transform:scale(1.03)}to{transform:scale(1.09)}}
  .ukiyo-trips .hero__bg::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg, rgba(0,0,0,.45) 0%, rgba(0,0,0,.25) 45%, rgba(0,0,0,.7) 100%)}
  .ukiyo-trips .hero__inner{position:relative;z-index:1;width:100%;text-align:center}
  .ukiyo-trips .breadcrumbs{display:flex;gap:.5rem;font-size:.85rem;opacity:.85;justify-content:center;margin-bottom:1.4rem;letter-spacing:.02em}
  .ukiyo-trips .breadcrumbs span{opacity:.6}
  .ukiyo-trips .pill{display:inline-flex;align-items:center;gap:.6rem;padding:.45rem 1.1rem;border-radius:999px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.32);backdrop-filter:blur(8px);font-size:.78rem;letter-spacing:.18em;text-transform:uppercase;font-weight:500}
  .ukiyo-trips .pill .dot{width:6px;height:6px;border-radius:50%;background:var(--accent-300)}
  .ukiyo-trips .hero__title{font-size:clamp(2.6rem, 6.2vw, 5.2rem);font-weight:300;letter-spacing:-0.02em;line-height:1.02;margin:1.5rem auto 1.4rem;max-width:22ch;text-shadow:0 2px 24px rgba(0,0,0,.3)}
  .ukiyo-trips .hero__title em{font-style:italic;color:var(--accent-300);font-weight:400}
  .ukiyo-trips .hero__sub{max-width:44rem;margin:0 auto;font-size:1.15rem;line-height:1.55;opacity:.95;text-shadow:0 2px 12px rgba(0,0,0,.4)}
  .ukiyo-trips .hero__stats{display:flex;gap:3rem;justify-content:center;margin-top:2.6rem;flex-wrap:wrap}
  .ukiyo-trips .hero__stat{text-align:center}
  .ukiyo-trips .hero__stat .num{font-family:var(--font-display);font-size:2.2rem;font-weight:300;letter-spacing:-0.02em;line-height:1;color:#fff;display:block}
  .ukiyo-trips .hero__stat .num em{font-style:italic;color:var(--accent-300)}
  .ukiyo-trips .hero__stat .lbl{display:block;font-size:.68rem;letter-spacing:.18em;text-transform:uppercase;opacity:.8;margin-top:.4rem;font-family:var(--font-mono)}

  /* SECTION SHELL */
  .ukiyo-trips section.section{padding:var(--section-y) 0;position:relative}
  .ukiyo-trips .sec-head{display:grid;grid-template-columns:auto 1fr;gap:2.5rem;align-items:end;margin-bottom:3.5rem;padding-bottom:1.5rem;border-bottom:1px solid var(--line)}
  .ukiyo-trips .sec-head__num{font-family:var(--font-mono);font-size:.82rem;color:var(--primary);letter-spacing:.16em;text-transform:uppercase;font-weight:600}
  .ukiyo-trips .sec-head__title{font-size:clamp(1.9rem, 3.6vw, 3rem);font-weight:300;letter-spacing:-0.015em;line-height:1.05;margin-top:.5rem}
  .ukiyo-trips .sec-head__title em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-trips .sec-head__right{justify-self:end;text-align:right;max-width:28rem}
  .ukiyo-trips .sec-head__sub{color:var(--ink-soft);font-size:1.02rem;line-height:1.6}
  @media (max-width:760px){
    .ukiyo-trips .sec-head{grid-template-columns:1fr;gap:1rem}
    .ukiyo-trips .sec-head__right{justify-self:start;text-align:left}
  }

  /* TRIP CARDS LIST */
  .ukiyo-trips .trips{background:var(--bg)}
  .ukiyo-trips .trips__grid{display:grid;grid-template-columns:1fr 1fr;gap:1.8rem}
  .ukiyo-trips .trip{background:#fff;border:1px solid var(--line);border-radius:24px;overflow:hidden;display:flex;flex-direction:column;transition:transform .45s cubic-bezier(.175,.885,.32,1.275), box-shadow .45s, border-color .45s}
  .ukiyo-trips .trip:hover{transform:translateY(-8px);box-shadow:0 36px 70px -36px rgba(44,44,44,.25);border-color:var(--primary-100)}
  .ukiyo-trips .trip__media{position:relative;aspect-ratio:16/9;overflow:hidden}
  .ukiyo-trips .trip__media img{width:100%;height:100%;object-fit:cover;transition:transform 1s cubic-bezier(.4,0,.2,1)}
  .ukiyo-trips .trip:hover .trip__media img{transform:scale(1.06)}
  .ukiyo-trips .trip__num{position:absolute;top:1rem;left:1.1rem;font-family:var(--font-mono);font-size:.74rem;letter-spacing:.16em;color:#fff;background:rgba(0,0,0,.55);padding:.32rem .7rem;border-radius:6px;backdrop-filter:blur(4px);font-weight:500;z-index:2}
  .ukiyo-trips .trip__tag{position:absolute;top:1rem;right:1.1rem;background:rgba(255,255,255,.94);color:var(--primary);font-family:var(--font-mono);font-size:.66rem;letter-spacing:.16em;text-transform:uppercase;padding:.32rem .65rem;border-radius:6px;font-weight:700;z-index:2;backdrop-filter:blur(4px)}
  .ukiyo-trips .trip__body{padding:1.6rem 1.8rem 1.8rem;display:flex;flex-direction:column;flex:1}
  .ukiyo-trips .trip__author{display:flex;align-items:center;gap:.85rem;margin-bottom:1.2rem;padding-bottom:1.1rem;border-bottom:1px dashed var(--line)}
  .ukiyo-trips .trip__author img{width:48px;height:48px;border-radius:50%;object-fit:cover;border:2px solid #fff;box-shadow:0 4px 10px rgba(0,0,0,.1);flex:0 0 48px}
  .ukiyo-trips .trip__author .name{font-size:.78rem;font-weight:700;color:var(--primary);letter-spacing:.06em;font-family:var(--font-mono);text-transform:uppercase}
  .ukiyo-trips .trip__author .role{display:block;font-size:.82rem;color:var(--ink-soft);font-weight:500;margin-top:.1rem}
  .ukiyo-trips .trip__title{font-size:1.7rem;font-weight:400;line-height:1.15;margin-bottom:.7rem;color:var(--ink);letter-spacing:-0.015em;transition:color .25s}
  .ukiyo-trips .trip:hover .trip__title{color:var(--primary)}
  .ukiyo-trips .trip__title em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-trips .trip__desc{color:var(--ink-soft);font-size:.95rem;line-height:1.6;margin:0 0 1.5rem;flex:1}
  .ukiyo-trips .trip__meta{display:flex;flex-wrap:wrap;gap:.45rem;margin-bottom:1.3rem}
  .ukiyo-trips .trip__meta span{font-size:.72rem;font-weight:600;padding:.32rem .75rem;border-radius:999px;font-family:var(--font-mono);letter-spacing:.03em}
  .ukiyo-trips .trip__meta .m-days{background:var(--primary);color:#fff}
  .ukiyo-trips .trip__meta .m-group{background:var(--secondary);color:#fff}
  .ukiyo-trips .trip__meta .m-style{background:var(--accent-50);color:#9C7B4A;border:1px solid var(--accent-300)}
  .ukiyo-trips .trip__foot{display:flex;justify-content:space-between;align-items:center;padding-top:1.1rem;border-top:1px solid var(--line)}
  .ukiyo-trips .trip__price{font-family:var(--font-display);font-size:1.5rem;color:var(--ink);line-height:1;letter-spacing:-0.01em}
  .ukiyo-trips .trip__price small{font-family:var(--font-sans);font-size:.66rem;color:var(--ink-soft);font-weight:600;display:block;text-transform:uppercase;letter-spacing:.16em;margin-bottom:.18rem}
  .ukiyo-trips .trip__more{color:var(--primary);font-size:.78rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;font-family:var(--font-mono);display:inline-flex;align-items:center;gap:.4rem;transition:gap .25s}
  .ukiyo-trips .trip:hover .trip__more{gap:.65rem}
  @media (max-width:880px){.ukiyo-trips .trips__grid{grid-template-columns:1fr}}

  /* Pager */
  .ukiyo-trips .pager{display:flex;justify-content:center;align-items:center;gap:.6rem;margin-top:3.5rem;flex-wrap:wrap}
  .ukiyo-trips .pager a,
  .ukiyo-trips .pager span{min-width:44px;height:44px;border-radius:50%;border:1px solid var(--line);background:#fff;color:var(--ink);font-family:var(--font-mono);font-size:.85rem;font-weight:600;display:grid;place-items:center;padding:0 .8rem;transition:all .25s}
  .ukiyo-trips .pager a:hover{background:var(--primary-50);border-color:var(--primary-300);color:var(--primary)}
  .ukiyo-trips .pager .current{background:var(--primary);color:#fff;border-color:var(--primary)}
  .ukiyo-trips .pager .dots{border:0;background:transparent}

  /* CÓMO FUNCIONA */
  .ukiyo-trips .how{background:linear-gradient(180deg, var(--surface) 0%, var(--paper) 100%)}
  .ukiyo-trips .how__steps{display:grid;grid-template-columns:repeat(3, 1fr);gap:1.6rem;position:relative}
  .ukiyo-trips .how__step{position:relative;background:#fff;border:1px solid var(--line);border-radius:22px;padding:2.6rem 1.8rem 1.8rem;transition:transform .35s, box-shadow .35s, border-color .35s}
  .ukiyo-trips .how__step:hover{transform:translateY(-4px);box-shadow:0 20px 50px -25px rgba(139,69,19,.22);border-color:var(--primary-100)}
  .ukiyo-trips .how__step .bubble{position:absolute;top:-22px;left:1.6rem;display:inline-flex;align-items:center;justify-content:center;width:46px;height:46px;border-radius:50%;background:var(--accent);color:#fff;font-family:var(--font-display);font-size:1.2rem;box-shadow:0 8px 18px -6px rgba(212,165,116,.5);font-weight:400}
  .ukiyo-trips .how__step h3{font-size:1.35rem;font-weight:400;margin-bottom:.6rem;color:var(--ink);letter-spacing:-0.01em}
  .ukiyo-trips .how__step h3 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-trips .how__step p{color:var(--ink-soft);font-size:.95rem;line-height:1.6;margin:0}
  @media (max-width:880px){.ukiyo-trips .how__steps{grid-template-columns:1fr}}

  /* AUTORES BIOS */
  .ukiyo-trips .autores{background:var(--bg)}
  .ukiyo-trips .autores__grid{display:grid;grid-template-columns:1fr 1fr;gap:2rem}
  .ukiyo-trips .bio{display:grid;grid-template-columns:auto 1fr;gap:1.4rem;align-items:start;background:#fff;border:1px solid var(--line);border-radius:20px;padding:1.6rem 1.7rem;transition:transform .35s, box-shadow .35s, border-color .35s}
  .ukiyo-trips .bio:hover{transform:translateY(-3px);box-shadow:0 18px 40px -22px rgba(44,44,44,.2);border-color:var(--primary-100)}
  .ukiyo-trips .bio__photo{width:80px;height:80px;border-radius:50%;overflow:hidden;border:3px solid #fff;box-shadow:0 0 0 1.5px var(--accent-300), 0 8px 20px -8px rgba(44,44,44,.2);flex:0 0 80px}
  .ukiyo-trips .bio__photo img{width:100%;height:100%;object-fit:cover}
  .ukiyo-trips .bio h3{font-size:1.2rem;font-weight:400;margin-bottom:.2rem;color:var(--ink);letter-spacing:-0.01em}
  .ukiyo-trips .bio h3 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-trips .bio .role{display:inline-block;font-family:var(--font-mono);font-size:.7rem;color:var(--primary);letter-spacing:.16em;text-transform:uppercase;font-weight:700;margin-bottom:.7rem}
  .ukiyo-trips .bio p{color:var(--ink-soft);font-size:.92rem;line-height:1.55;margin:0}
  @media (max-width:760px){.ukiyo-trips .autores__grid{grid-template-columns:1fr}}

  /* FAQ */
  .ukiyo-trips .faq{background:var(--paper)}
  .ukiyo-trips .faq__wrap{max-width:780px;margin:0 auto;display:flex;flex-direction:column;gap:.7rem}
  .ukiyo-trips .qa{background:#fff;border:1px solid var(--line);border-radius:14px;overflow:hidden;transition:border-color .25s, box-shadow .25s}
  .ukiyo-trips .qa[open]{border-color:var(--primary-300);box-shadow:0 18px 40px -25px rgba(139,69,19,.2)}
  .ukiyo-trips .qa summary{padding:1.2rem 1.5rem;cursor:pointer;display:flex;justify-content:space-between;align-items:center;gap:1rem;font-weight:500;color:var(--ink);font-size:1rem;list-style:none;line-height:1.4}
  .ukiyo-trips .qa summary::-webkit-details-marker{display:none}
  .ukiyo-trips .qa__num{font-family:var(--font-mono);font-size:.7rem;font-weight:700;color:var(--primary);letter-spacing:.16em;margin-right:.9rem;vertical-align:middle}
  .ukiyo-trips .qa__caret{width:30px;height:30px;border-radius:50%;background:var(--primary-50);color:var(--primary);display:grid;place-items:center;flex-shrink:0;transition:transform .35s, background .25s}
  .ukiyo-trips .qa[open] .qa__caret{transform:rotate(45deg);background:var(--primary);color:#fff}
  .ukiyo-trips .qa__body{padding:0 1.5rem 1.4rem 1.5rem;color:var(--ink-soft);font-size:.95rem;line-height:1.7}
  .ukiyo-trips .qa__body p{margin:0 0 .7rem}

  /* OTRAS FORMAS */
  .ukiyo-trips .ways{background:var(--bg);border-top:1px solid var(--line)}
  .ukiyo-trips .ways__wrap{max-width:1080px;margin:0 auto}
  .ukiyo-trips .ways__intro{max-width:38rem;margin-bottom:2.5rem}
  .ukiyo-trips .ways__intro .kicker{display:inline-block;font-family:var(--font-mono);font-size:.74rem;color:var(--primary);letter-spacing:.22em;text-transform:uppercase;font-weight:700;margin-bottom:.8rem}
  .ukiyo-trips .ways__intro h2{font-size:clamp(1.8rem, 3.2vw, 2.5rem);font-weight:300;letter-spacing:-0.015em;margin-bottom:.9rem}
  .ukiyo-trips .ways__intro h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-trips .ways__intro p{color:var(--ink-soft);line-height:1.6;font-size:1rem}
  .ukiyo-trips .ways__grid{display:grid;grid-template-columns:repeat(3, 1fr);gap:1rem}
  .ukiyo-trips .way{display:block;background:var(--paper);border:1px solid var(--line);border-radius:18px;padding:1.8rem 1.6rem;transition:transform .35s, box-shadow .35s, border-color .35s;position:relative}
  .ukiyo-trips .way:hover{transform:translateY(-4px);box-shadow:0 22px 50px -25px rgba(44,44,44,.22);border-color:var(--primary-100);background:#fff}
  .ukiyo-trips .way h3{font-size:1.3rem;font-weight:400;margin-bottom:.6rem;color:var(--ink);letter-spacing:-0.01em}
  .ukiyo-trips .way p{color:var(--ink-soft);font-size:.92rem;line-height:1.55;margin:0 0 1rem}
  .ukiyo-trips .way__link{display:inline-flex;align-items:center;gap:.4rem;color:var(--primary);font-family:var(--font-mono);font-size:.74rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;transition:gap .25s}
  .ukiyo-trips .way:hover .way__link{gap:.6rem}
  @media (max-width:880px){.ukiyo-trips .ways__grid{grid-template-columns:1fr}}

  /* CTA */
  .ukiyo-trips .ctafinal{background:linear-gradient(160deg, var(--paper) 0%, #FDF7F3 100%);position:relative;overflow:hidden}
  .ukiyo-trips .ctafinal__box{max-width:760px;margin:0 auto;text-align:center;position:relative;z-index:1}
  .ukiyo-trips .ctafinal__stamp{display:inline-flex;align-items:center;gap:.6rem;font-family:var(--font-mono);font-size:.78rem;color:var(--primary);letter-spacing:.18em;text-transform:uppercase;margin-bottom:1.2rem}
  .ukiyo-trips .ctafinal__stamp .dot{width:6px;height:6px;border-radius:50%;background:var(--primary)}
  .ukiyo-trips .ctafinal h2{font-size:clamp(2.2rem, 4.5vw, 3.6rem);font-weight:300;letter-spacing:-0.02em;line-height:1.05;margin-bottom:1.2rem}
  .ukiyo-trips .ctafinal h2 em{font-style:italic;color:var(--primary)}
  .ukiyo-trips .ctafinal p{font-size:1.15rem;color:var(--ink-soft);margin-bottom:2.2rem;line-height:1.55;max-width:34rem;margin-left:auto;margin-right:auto}
  .ukiyo-trips .ctafinal__buttons{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap}
  .ukiyo-trips .ctafinal::before{content:"";position:absolute;top:-200px;right:-200px;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle, rgba(212,165,116,.25), transparent 70%);z-index:0}
  .ukiyo-trips .ctafinal::after{content:"";position:absolute;bottom:-200px;left:-200px;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle, rgba(156,175,136,.18), transparent 70%);z-index:0}
  .ukiyo-trips .btn{display:inline-flex;align-items:center;gap:.7rem;padding:1rem 1.6rem;border-radius:999px;font-weight:600;font-size:.95rem;transition:transform .25s, box-shadow .25s, background .25s;border:1.5px solid transparent}
  .ukiyo-trips .btn:hover{transform:translateY(-2px)}
  .ukiyo-trips .btn-primary{background:var(--primary);color:#fff;box-shadow:0 10px 30px -10px rgba(139,69,19,.5)}
  .ukiyo-trips .btn-primary:hover{background:var(--primary-700);box-shadow:0 14px 40px -10px rgba(139,69,19,.6)}
  .ukiyo-trips .btn-outline{border-color:var(--ink);color:var(--ink)}
  .ukiyo-trips .btn-outline:hover{background:var(--ink);color:#fff}
  .ukiyo-trips .btn img.wa-icon{width:24px;height:24px}
</style>

<div class="ukiyo-trips">

  <!-- HERO -->
  <section class="hero">
    <div class="hero__bg">
      <img src="<?php echo esc_url( $hero_image ); ?>" alt="Viajes de Autor Ukiyo" loading="eager" fetchpriority="high" decoding="async" />
    </div>
    <div class="container hero__inner">
      <div class="breadcrumbs">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a><span>/</span><span>Viajes de autor</span>
      </div>
      <span class="pill"><span class="dot"></span>作家 · sakka · premium</span>
      <h1 class="hero__title">Viajes de autor<br/>en <em>grupo reducido.</em></h1>
      <p class="hero__sub">Salidas cuidadas con autores, fotógrafos, guías locales y anfitriones que conocen el destino desde dentro. Viajes con plazas limitadas, una mirada propia y tiempo para entender cada lugar.</p>
      <div class="hero__stats">
        <div class="hero__stat"><span class="num"><em><?php echo esc_html( $stats_max_pax ); ?></em></span><span class="lbl">Personas máx.</span></div>
        <div class="hero__stat"><span class="num"><em><?php echo esc_html( $stats_active_authors ); ?></em></span><span class="lbl">Autores activos</span></div>
        <div class="hero__stat"><span class="num"><em><?php echo esc_html( $stats_local_pct ); ?></em></span><span class="lbl">Operado en destino</span></div>
      </div>
    </div>
  </section>

  <!-- LISTADO -->
  <section class="section trips" id="viajes">
    <div class="container">
      <div class="sec-head">
        <div>
          <div class="sec-head__num">01 · Salidas activas</div>
          <h2 class="sec-head__title">Próximos<br/><em>viajes de autor.</em></h2>
        </div>
        <div class="sec-head__right">
          <p class="sec-head__sub">Cada propuesta nace de una persona que conoce el destino desde dentro. Plazas limitadas y fechas bajo demanda — diseñados para vivir el lugar, no para visitarlo.</p>
        </div>
      </div>

      <?php if ( $trips_query->have_posts() ) : ?>
        <div class="trips__grid">
          <?php
          $i = 0;
          while ( $trips_query->have_posts() ) : $trips_query->the_post();
            $i++;
            $tid     = get_the_ID();
            $img     = get_post_meta( $tid, 'hero_image', true ) ?: get_the_post_thumbnail_url( $tid, 'large' );
            $tags_r  = get_post_meta( $tid, 'hero_tags', true );
            $tags    = $tags_r ? array_values( array_filter( array_map( 'trim', explode( ',', $tags_r ) ) ) ) : [];
            $subt    = get_post_meta( $tid, 'hero_subtitle', true );
            $exp_n   = get_post_meta( $tid, 'expert_name', true );
            $exp_t   = get_post_meta( $tid, 'expert_title', true );
            $exp_img = get_post_meta( $tid, 'expert_image', true );
            $dur     = get_post_meta( $tid, 'duracion_viaje', true );
            $grp     = get_post_meta( $tid, 'grupos_viaje', true );
            $price   = get_post_meta( $tid, 'precio_final', true ) ?: get_post_meta( $tid, 'precio_desde', true );

            // El "número" del card combina el orden de paginación + el primer hero_tag (categoría).
            $num_label = sprintf( '%02d', ( ( $paged - 1 ) * 6 ) + $i );
            $category_label = $tags[0] ?? '';
            $card_num = $category_label ? $num_label . ' / ' . $category_label : $num_label;
            // tag = 2 primeros tags juntos con " · " (ej. "Cultura · Desierto")
            $card_tag = implode( ' · ', array_slice( $tags, 1, 2 ) );
            if ( '' === trim( $card_tag ) ) {
              $card_tag = $category_label; // fallback
            }
            // m-style = último tag o uno simple
            $m_style = ! empty( $tags ) ? end( $tags ) : '';
            ?>
            <a class="trip" href="<?php the_permalink(); ?>">
              <div class="trip__media">
                <span class="trip__num"><?php echo esc_html( $card_num ); ?></span>
                <?php if ( $card_tag ) : ?>
                  <span class="trip__tag"><?php echo esc_html( $card_tag ); ?></span>
                <?php endif; ?>
                <?php if ( $img ) : ?>
                  <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy" decoding="async" />
                <?php endif; ?>
              </div>
              <div class="trip__body">
                <?php if ( $exp_n || $exp_img ) : ?>
                  <div class="trip__author">
                    <?php if ( $exp_img ) : ?>
                      <img src="<?php echo esc_url( $exp_img ); ?>" alt="<?php echo esc_attr( $exp_n ); ?>" loading="lazy" />
                    <?php endif; ?>
                    <div>
                      <?php if ( $exp_n ) : ?><span class="name"><?php echo esc_html( $exp_n ); ?></span><?php endif; ?>
                      <?php if ( $exp_t ) : ?><span class="role"><?php echo esc_html( $exp_t ); ?></span><?php endif; ?>
                    </div>
                  </div>
                <?php endif; ?>
                <h3 class="trip__title"><?php echo wp_kses( get_the_title(), [ 'em' => [], 'strong' => [] ] ); ?></h3>
                <?php if ( $subt ) : ?>
                  <p class="trip__desc"><?php echo esc_html( $subt ); ?></p>
                <?php endif; ?>
                <?php if ( $dur || $grp || $m_style ) : ?>
                  <div class="trip__meta">
                    <?php if ( $dur ) : ?><span class="m-days"><?php echo esc_html( $dur ); ?></span><?php endif; ?>
                    <?php if ( $grp ) : ?><span class="m-group"><?php echo esc_html( $grp ); ?></span><?php endif; ?>
                    <?php if ( $m_style && $m_style !== $dur && $m_style !== $grp ) : ?><span class="m-style"><?php echo esc_html( $m_style ); ?></span><?php endif; ?>
                  </div>
                <?php endif; ?>
                <div class="trip__foot">
                  <?php if ( $price ) : ?>
                    <div class="trip__price"><small>Desde</small><?php echo esc_html( $price ); ?></div>
                  <?php else : ?>
                    <div></div>
                  <?php endif; ?>
                  <span class="trip__more">Ver itinerario →</span>
                </div>
              </div>
            </a>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php
        // Paginador
        $total_pages = (int) $trips_query->max_num_pages;
        if ( $total_pages > 1 ) :
          $big = 999999999;
          $links = paginate_links( [
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'current'   => $paged,
            'total'     => $total_pages,
            'prev_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'next_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'type'      => 'array',
          ] );
          if ( $links ) : ?>
            <nav class="pager" aria-label="Paginación">
              <?php foreach ( $links as $link ) : echo $link; endforeach; ?>
            </nav>
        <?php endif; endif; ?>
      <?php else : ?>
        <p style="text-align:center;color:var(--ink-soft);padding:3rem 0">Aún no hay viajes de autor publicados. Vuelve pronto.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- CÓMO FUNCIONA -->
  <section class="section how">
    <div class="container">
      <div class="sec-head">
        <div>
          <div class="sec-head__num">02 · Cómo funciona</div>
          <h2 class="sec-head__title">Tres pasos<br/><em>hasta la salida.</em></h2>
        </div>
        <div class="sec-head__right">
          <p class="sec-head__sub">Un viaje de autor empieza con el autor, no con el destino. Te ayudamos a entender su mirada y, si encaja contigo, lo organizamos desde dentro.</p>
        </div>
      </div>
      <div class="how__steps">
        <div class="how__step">
          <span class="bubble">1</span>
          <h3>Conecta con el <em>autor</em></h3>
          <p>Lee su historia, mira sus fotos y entiende su mirada del destino. La salida tendrá su forma de ver y de trabajar.</p>
        </div>
        <div class="how__step">
          <span class="bubble">2</span>
          <h3>Definimos tu <em>viaje</em></h3>
          <p>Fechas bajo demanda, ritmo y enfoque a tu medida. Plazas limitadas, sin masificación y con margen para improvisar.</p>
        </div>
        <div class="how__step">
          <span class="bubble">3</span>
          <h3>Operado <em>desde dentro</em></h3>
          <p>Por gente de allí. Con la calma y la autenticidad de Ukiyo, y un autor que vive el viaje contigo del primer al último día.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- LOS AUTORES -->
  <section class="section autores">
    <div class="container">
      <div class="sec-head">
        <div>
          <div class="sec-head__num">03 · Los autores</div>
          <h2 class="sec-head__title">Las miradas que <em>hacen Ukiyo.</em></h2>
        </div>
        <div class="sec-head__right">
          <p class="sec-head__sub">No son guías turísticos: son personas que viven en el destino y comparten su mundo contigo. Sus salidas son la suma de años de trabajo en un mismo lugar.</p>
        </div>
      </div>
      <div class="autores__grid">
        <?php foreach ( $autores as $a ) : ?>
          <div class="bio">
            <div class="bio__photo"><img src="<?php echo esc_url( $a['photo'] ); ?>" alt="<?php echo esc_attr( $a['name'] ); ?>" loading="lazy" /></div>
            <div>
              <h3><?php echo esc_html( $a['name'] ); ?> · <em><?php echo esc_html( $a['tag'] ); ?></em></h3>
              <span class="role"><?php echo esc_html( $a['role'] ); ?></span>
              <p><?php echo esc_html( $a['bio'] ); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section faq">
    <div class="container">
      <div class="sec-head">
        <div>
          <div class="sec-head__num">04 · Preguntas</div>
          <h2 class="sec-head__title">Preguntas <em>frecuentes.</em></h2>
        </div>
        <div class="sec-head__right">
          <p class="sec-head__sub">Lo que más nos preguntan antes de reservar una salida con autor.</p>
        </div>
      </div>
      <div class="faq__wrap">
        <?php foreach ( $faq as $idx => $f ) : ?>
          <details class="qa"<?php echo 0 === $idx ? ' open' : ''; ?>>
            <summary>
              <span><span class="qa__num"><?php echo esc_html( sprintf( '%02d', $idx + 1 ) ); ?></span><?php echo esc_html( $f['q'] ); ?></span>
              <span class="qa__caret">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
              </span>
            </summary>
            <div class="qa__body"><p><?php echo esc_html( $f['a'] ); ?></p></div>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- OTRAS FORMAS DE VIAJAR -->
  <section class="section ways">
    <div class="container">
      <div class="ways__wrap">
        <div class="ways__intro">
          <span class="kicker">Otras formas de viajar</span>
          <h2>Elige el formato que <em>encaja contigo.</em></h2>
          <p>Un viaje de autor es una salida en grupo reducido con una mirada experta. Si prefieres una ruta privada, una propuesta completamente a medida o un grupo organizado de otra forma, estas opciones te ayudan a orientarte.</p>
        </div>
        <div class="ways__grid">
          <a class="way" href="<?php echo esc_url( $destinos_url ); ?>">
            <h3>Viajes en grupo reducido</h3>
            <p>Para compartir ruta con pocas personas, buen acompañamiento y una organización cuidada.</p>
            <span class="way__link">Ver detalles →</span>
          </a>
          <a class="way" href="<?php echo esc_url( $plan_trip_url ); ?>">
            <h3>Viajes privados</h3>
            <p>Una ruta propia para parejas, familias o amigos, sin fechas ni salidas cerradas.</p>
            <span class="way__link">Ver detalles →</span>
          </a>
          <a class="way" href="<?php echo esc_url( $plan_trip_url ); ?>">
            <h3>Viajes a medida</h3>
            <p>Un itinerario diseñado desde cero según tu destino, ritmo, intereses y forma de viajar.</p>
            <span class="way__link">Ver detalles →</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section ctafinal" id="cta">
    <div class="container">
      <div class="ctafinal__box">
        <span class="ctafinal__stamp"><span class="dot"></span>道 · Empezamos juntos</span>
        <h2>¿Quieres viajar con<br/><em>una mirada experta?</em></h2>
        <p>Todo viaje empieza con una conversación. Cuéntanos qué destino o salida te interesa y te ayudamos a elegir el formato que mejor encaja contigo.</p>
        <div class="ctafinal__buttons">
          <a href="https://wa.me/message/CS2LNI6YHSETO1" target="_blank" rel="noopener" class="btn btn-primary">
            <img class="wa-icon" width="24" height="24" src="https://img.icons8.com/cotton/64/whatsapp--v4.png" alt="WhatsApp" />
            Hablemos de tu viaje
          </a>
          <a href="<?php echo esc_url( $destinos_url ); ?>" class="btn btn-outline">Ver otros destinos
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

</div><!-- /.ukiyo-trips -->

<?php get_footer(); ?>
