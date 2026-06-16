<?php
/**
 * Template: Single Viaje de Autor (CPT viaje_autor).
 *
 * Implementación del export "Marruecos Profundo - viaje de autor.html" de Claude Design.
 *
 * Decisiones:
 *   - Header/footer del tema (get_header / get_footer). Nav y footer del export omitidos.
 *   - CSS scoped a .ukiyo-trip para no contaminar otras plantillas.
 *   - Reusa los meta fields existentes del CPT (ver inc/meta-viaje-autor.php).
 *   - Metas nuevos integrados: expert_languages, fecha_salida.
 *   - Stepper sticky + Route map se generan del itinerary_days (campo JSON existente).
 *   - Días alternados con scene--flip por índice (par/impar).
 *   - Hero con byline del experto, glance card con Duración/Grupo/Salida/Precio.
 *   - Carta del experto (.letter) usa expert_quote + intro libre opcional.
 *   - Stays gallery (.stays): grid de alojamientos extraído del itinerary_days.
 *   - Sticky bookbar al hacer scroll, oculta en el footer/FAQ.
 *
 * NOTA: las plantillas custom por ID (templates/single-viaje_autor-{ID}.php)
 * siguen ganando si existen — esto solo afecta a viajes sin plantilla específica.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

if ( ! have_posts() ) {
	get_footer();
	return;
}

the_post();

$post_id          = get_the_ID();
$title            = get_the_title();
// Hero: meta `hero_image` → featured image → fallback genérico (último recurso).
$hero_image       = get_post_meta( $post_id, 'hero_image', true )
    ?: get_the_post_thumbnail_url( $post_id, 'full' )
    ?: get_template_directory_uri() . '/images/heroimages/viajes-autor-ukiyo-viajeros2.webp';
$hero_subtitle    = get_post_meta( $post_id, 'hero_subtitle', true );
$hero_tags_raw    = get_post_meta( $post_id, 'hero_tags', true );
$hero_tags        = $hero_tags_raw ? array_values( array_filter( array_map( 'trim', explode( ',', $hero_tags_raw ) ) ) ) : [];

$expert_name      = get_post_meta( $post_id, 'expert_name', true );
$expert_title     = get_post_meta( $post_id, 'expert_title', true );
$expert_image     = get_post_meta( $post_id, 'expert_image', true );
$expert_quote     = get_post_meta( $post_id, 'expert_quote', true );
$expert_specialty = get_post_meta( $post_id, 'expert_specialty', true );
$expert_focus     = get_post_meta( $post_id, 'expert_focus', true );
$expert_languages = get_post_meta( $post_id, 'expert_languages', true );
$expert_letter    = get_post_meta( $post_id, 'expert_letter', true ); // opcional: carta larga
$expert_origin    = get_post_meta( $post_id, 'expert_origin', true ); // opcional: "Atlas, Imilchil"
$expert_years     = get_post_meta( $post_id, 'expert_years', true );  // opcional: "12 años"

$duracion         = get_post_meta( $post_id, 'duracion_viaje', true );
$grupos           = get_post_meta( $post_id, 'grupos_viaje', true );
$precio_final     = get_post_meta( $post_id, 'precio_final', true ) ?: get_post_meta( $post_id, 'precio_desde', true );
$fecha_salida     = get_post_meta( $post_id, 'fecha_salida', true );

// El glance ya pinta su propio label "Desde". Si el meta ya lo incluye, lo
// quitamos para no duplicar (acepta "Desde 1.290 €", "desde 1290 €", etc.).
if ( $precio_final ) {
	$precio_final = trim( preg_replace( '/^\s*desde\s+/i', '', $precio_final ) );
}

$trip_includes_raw = get_post_meta( $post_id, 'trip_includes', true );
$trip_excludes_raw = get_post_meta( $post_id, 'trip_excludes', true );

// Parsear includes / excludes: pueden venir separados por | o salto de línea.
$parse_list = static function ( $raw ) {
	if ( ! is_string( $raw ) || '' === trim( $raw ) ) return [];
	$parts = preg_split( '/[|\r\n]+/', $raw );
	return array_values( array_filter( array_map( 'trim', $parts ), 'strlen' ) );
};
$trip_includes = $parse_list( $trip_includes_raw );
$trip_excludes = $parse_list( $trip_excludes_raw );

// Itinerario (JSON).
$itinerary_raw = get_post_meta( $post_id, 'itinerary_days', true );
$itinerary     = $itinerary_raw ? json_decode( $itinerary_raw, true ) : [];
$itinerary     = is_array( $itinerary ) ? $itinerary : [];

// FAQ (JSON), agrupada por categoría.
$faq_raw  = get_post_meta( $post_id, 'faq_items', true );
$faq_list = $faq_raw ? json_decode( $faq_raw, true ) : [];
$faq_list = is_array( $faq_list ) ? $faq_list : [];
$faq_groups = [
	'general'       => [ 'label' => 'General', 'items' => [] ],
	'documentation' => [ 'label' => 'Reserva y pago', 'items' => [] ],
];
foreach ( $faq_list as $faq_item ) {
	$cat = $faq_item['category'] ?? 'general';
	if ( ! isset( $faq_groups[ $cat ] ) ) {
		$faq_groups[ $cat ] = [ 'label' => ucfirst( $cat ), 'items' => [] ];
	}
	$faq_groups[ $cat ]['items'][] = $faq_item;
}

// Rutas.
$autor_index = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'viajes_autor' ) : home_url( '/' );
$wa_url      = 'https://wa.me/message/CS2LNI6YHSETO1';

// Helper para experiencia: el repeater guarda images como CSV.
$first_image_from_csv = static function ( $csv ) {
	if ( ! is_string( $csv ) || '' === trim( $csv ) ) return '';
	$parts = array_filter( array_map( 'trim', explode( ',', $csv ) ) );
	return $parts ? reset( $parts ) : '';
};
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap">

<style>
  .ukiyo-trip{
    --primary:#8B4513; --primary-50:#FDF7F3; --primary-100:#F9E8D9; --primary-300:#E8B48D; --primary-700:#6B3410;
    --secondary:#9CAF88; --secondary-50:#F4F6F0; --secondary-100:#E6ECDD; --secondary-300:#B9C9A4;
    --secondary-700:#5E6952; --secondary-900:#3F4836;
    --accent:#D4A574; --accent-300:#EBD2AE; --accent-50:#FDF9F4;
    --bg:#FEFCF8; --paper:#F8F2E7; --surface:#F5F2ED;
    --ink:#2C2C2C; --ink-soft:#6B6B6B; --line:#E8E0D2;
    --font-sans:'Satoshi','Inter',system-ui,sans-serif;
    --font-display:'Rowdies',serif;
    --font-mono:'DM Mono',ui-monospace,monospace;
    --maxw:1280px; --section-y:7rem;
    background:var(--bg); color:var(--ink); font-family:var(--font-sans);
    font-weight:400; font-size:17px; line-height:1.6;
    -webkit-font-smoothing:antialiased;
  }
  .ukiyo-trip *{box-sizing:border-box}
  .ukiyo-trip img{max-width:100%;display:block}
  .ukiyo-trip a{color:inherit;text-decoration:none}
  .ukiyo-trip button{font-family:inherit;cursor:pointer;border:none;background:none}
  .ukiyo-trip h1,
  .ukiyo-trip h2,
  .ukiyo-trip h3,
  .ukiyo-trip h4{font-family:var(--font-display);font-weight:400;letter-spacing:-0.01em;line-height:1.05;margin:0}
  .ukiyo-trip .container{max-width:var(--maxw);margin:0 auto;padding:0 2rem}

  /* HERO */
  .ukiyo-trip .hero{position:relative;min-height:100vh;display:flex;align-items:flex-end;color:#fff;overflow:hidden;padding:8rem 0 5rem}
  .ukiyo-trip .hero__bg{position:absolute;inset:0;z-index:0}
  .ukiyo-trip .hero__bg img{width:100%;height:100%;object-fit:cover;transform:scale(1.02);animation:ukiyoTripSlow 22s ease-in-out infinite alternate}
  @keyframes ukiyoTripSlow{from{transform:scale(1.02)}to{transform:scale(1.1)}}
  .ukiyo-trip .hero__bg::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg, rgba(20,16,12,.4) 0%, rgba(20,16,12,.15) 35%, rgba(20,16,12,.88) 100%)}
  .ukiyo-trip .hero__inner{position:relative;z-index:2;width:100%;display:grid;grid-template-columns:1.4fr 1fr;gap:3rem;align-items:end}
  .ukiyo-trip .crumb{font-family:var(--font-mono);font-size:.78rem;letter-spacing:.14em;text-transform:uppercase;opacity:.85;display:flex;gap:.6rem;margin-bottom:1.2rem;flex-wrap:wrap}
  .ukiyo-trip .crumb span{opacity:.55}
  .ukiyo-trip .hero__byline{display:inline-flex;align-items:center;gap:.7rem;padding:.4rem .9rem;border-radius:999px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.28);backdrop-filter:blur(8px);font-family:var(--font-mono);font-size:.76rem;letter-spacing:.16em;text-transform:uppercase;margin-bottom:1.4rem}
  .ukiyo-trip .hero__byline img{width:26px;height:26px;border-radius:50%;object-fit:cover;border:1.5px solid rgba(255,255,255,.5)}
  .ukiyo-trip .hero__byline em{font-style:italic;opacity:.9;text-transform:none;letter-spacing:0;font-family:var(--font-sans);font-weight:400}
  .ukiyo-trip .hero__title{font-size:clamp(3rem, 9.5vw, 8.4rem);font-weight:300;line-height:.9;letter-spacing:-0.03em;margin:0 0 1rem;text-shadow:0 2px 30px rgba(0,0,0,.4)}
  .ukiyo-trip .hero__title em{font-style:italic;color:var(--accent-300);font-weight:300}
  .ukiyo-trip .hero__sub{font-family:var(--font-display);font-size:clamp(1.2rem, 2.2vw, 1.7rem);font-weight:300;letter-spacing:-.005em;opacity:.94;max-width:34rem;line-height:1.25;text-shadow:0 2px 12px rgba(0,0,0,.4)}
  .ukiyo-trip .hero__meta{display:flex;flex-direction:column;gap:1rem;align-items:flex-end;text-align:right}
  .ukiyo-trip .hero__meta .row{display:flex;gap:1.5rem;align-items:center;font-family:var(--font-mono);font-size:.78rem;letter-spacing:.14em;text-transform:uppercase;opacity:.88}
  .ukiyo-trip .hero__meta .row .dot{width:4px;height:4px;border-radius:50%;background:var(--accent-300)}
  .ukiyo-trip .hero__scroll{position:absolute;left:50%;bottom:1.4rem;transform:translateX(-50%);z-index:3;font-family:var(--font-mono);font-size:.68rem;letter-spacing:.3em;text-transform:uppercase;opacity:.7;display:flex;flex-direction:column;align-items:center;gap:.4rem;color:#fff}
  .ukiyo-trip .hero__scroll .line{width:1px;height:32px;background:#fff;animation:ukiyoTripPulse 2.4s ease-in-out infinite;transform-origin:top}
  @keyframes ukiyoTripPulse{0%,100%{transform:scaleY(.3);opacity:.4}50%{transform:scaleY(1);opacity:1}}
  @media (max-width:880px){
    .ukiyo-trip .hero__inner{grid-template-columns:1fr;gap:1.5rem}
    .ukiyo-trip .hero__meta{align-items:flex-start;text-align:left}
    .ukiyo-trip .hero__meta .row{flex-wrap:wrap;gap:.8rem}
  }

  /* AUTHOR LETTER */
  .ukiyo-trip .letter{padding:8rem 0 6rem;background:var(--bg);position:relative}
  .ukiyo-trip .letter::before{content:"";position:absolute;left:0;right:0;top:0;height:1px;background:linear-gradient(90deg, transparent, var(--line), transparent)}
  .ukiyo-trip .letter__grid{display:grid;grid-template-columns:.95fr 1.3fr;gap:5rem;align-items:center}

  /* HOST BIO CARD */
  .ukiyo-trip .hostcard{position:relative;background:#fff;border:1px solid var(--line);border-radius:22px;padding:1.1rem 1.1rem 1.6rem;box-shadow:0 30px 60px -30px rgba(20,16,12,.32)}
  .ukiyo-trip .hostcard__ref{position:absolute;top:1.6rem;left:1.6rem;font-family:var(--font-mono);font-size:.66rem;letter-spacing:.18em;color:rgba(255,255,255,.85);text-transform:uppercase;z-index:3;mix-blend-mode:luminosity}
  .ukiyo-trip .hostcard__ref span{opacity:.6}
  .ukiyo-trip .hostcard__media{position:relative;aspect-ratio:4/5;overflow:hidden;border-radius:16px;background:linear-gradient(160deg, var(--paper) 0%, #E8DCC6 100%)}
  .ukiyo-trip .hostcard__media img{width:100%;height:100%;object-fit:cover;object-position:center 12%}
  .ukiyo-trip .hostcard__media::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg, rgba(20,16,12,.25) 0%, transparent 25%);pointer-events:none}
  .ukiyo-trip .hostcard__stamp{position:absolute;top:-22px;right:-14px;width:96px;height:96px;border-radius:50%;background:var(--primary);color:#fff;display:grid;place-items:center;font-family:var(--font-mono);font-size:.6rem;letter-spacing:.14em;text-transform:uppercase;text-align:center;line-height:1.2;padding:.6rem;transform:rotate(-8deg);box-shadow:0 18px 30px -14px rgba(139,69,19,.55), inset 0 0 0 2px rgba(255,255,255,.18);z-index:4}
  .ukiyo-trip .hostcard__stamp::before{content:"";position:absolute;inset:6px;border-radius:50%;border:1px dashed rgba(255,255,255,.5)}
  .ukiyo-trip .hostcard__stamp strong{display:block;font-family:var(--font-display);font-size:1.1rem;font-weight:400;line-height:1;margin-bottom:.2rem;letter-spacing:-0.01em}
  .ukiyo-trip .hostcard__stamp em{font-style:italic;color:var(--accent-300);font-weight:300}
  .ukiyo-trip .hostcard__bio{padding:1.5rem .8rem .2rem}
  .ukiyo-trip .hostcard__eyebrow{display:inline-flex;align-items:center;gap:.5rem;font-family:var(--font-mono);font-size:.66rem;letter-spacing:.18em;text-transform:uppercase;color:var(--primary);margin-bottom:.6rem}
  .ukiyo-trip .hostcard__eyebrow::before{content:"";width:18px;height:1px;background:var(--primary)}
  .ukiyo-trip .hostcard__name{font-family:var(--font-display);font-size:1.8rem;font-weight:400;letter-spacing:-0.015em;line-height:1;color:var(--ink);margin:0 0 .35rem}
  .ukiyo-trip .hostcard__name em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-trip .hostcard__tagline{font-family:var(--font-sans);font-size:.92rem;color:var(--ink-soft);font-style:italic;margin:0 0 1.2rem;line-height:1.4}
  .ukiyo-trip .hostcard__meta{display:grid;grid-template-columns:1fr 1fr 1fr;gap:0;border-top:1px dashed var(--line);padding-top:1rem;margin-top:.4rem}
  .ukiyo-trip .hostcard__meta div{padding:.2rem .8rem;position:relative}
  .ukiyo-trip .hostcard__meta div + div::before{content:"";position:absolute;left:0;top:25%;bottom:25%;width:1px;background:var(--line)}
  .ukiyo-trip .hostcard__meta div:first-child{padding-left:0}
  .ukiyo-trip .hostcard__meta .l{display:block;font-family:var(--font-mono);font-size:.6rem;letter-spacing:.14em;text-transform:uppercase;color:var(--ink-soft);margin-bottom:.3rem}
  .ukiyo-trip .hostcard__meta .v{display:block;font-family:var(--font-display);font-size:1rem;font-weight:400;color:var(--ink);line-height:1.1;letter-spacing:-0.005em}
  .ukiyo-trip .hostcard__meta .v small{font-family:var(--font-mono);font-size:.66rem;color:var(--ink-soft);font-weight:400;letter-spacing:.04em}

  .ukiyo-trip .letter__chip{font-family:var(--font-mono);font-size:.72rem;letter-spacing:.18em;text-transform:uppercase;color:var(--primary);display:inline-flex;align-items:center;gap:.5rem;margin-bottom:1.4rem}
  .ukiyo-trip .letter__chip::before{content:"";width:24px;height:1px;background:var(--primary)}
  .ukiyo-trip .letter h2{font-size:clamp(2.4rem, 4.6vw, 4rem);font-weight:300;line-height:1;letter-spacing:-0.02em;margin-bottom:1.5rem}
  .ukiyo-trip .letter h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-trip .letter blockquote{font-family:var(--font-display);font-style:italic;font-size:clamp(1.2rem, 1.8vw, 1.5rem);font-weight:300;line-height:1.4;color:var(--ink);margin:0 0 1.8rem;padding-left:1.6rem;border-left:3px solid var(--primary);max-width:36rem}
  .ukiyo-trip .letter p{color:var(--ink-soft);font-size:1.02rem;line-height:1.7;margin:0 0 1rem;max-width:36rem}
  .ukiyo-trip .letter__sig{margin-top:2rem;display:flex;gap:1rem;align-items:center;padding-top:1.4rem;border-top:1px dashed var(--line)}
  .ukiyo-trip .letter__sig__nm{font-family:var(--font-display);font-size:1.1rem;font-weight:400;letter-spacing:-0.01em;color:var(--ink)}
  .ukiyo-trip .letter__sig__role{font-family:var(--font-mono);font-size:.72rem;color:var(--ink-soft);letter-spacing:.12em;text-transform:uppercase}
  @media (max-width:880px){
    .ukiyo-trip .letter__grid{grid-template-columns:1fr;gap:2.4rem}
    .ukiyo-trip .hostcard__stamp{width:80px;height:80px;font-size:.55rem}
    .ukiyo-trip .hostcard__stamp strong{font-size:.95rem}
  }

  /* AT A GLANCE */
  .ukiyo-trip .glance{padding:0 0 5rem;background:var(--bg)}
  .ukiyo-trip .glance__inner{background:var(--paper);border:1px solid var(--line);border-radius:28px;padding:2rem 2.4rem;display:flex;align-items:center;gap:2rem;flex-wrap:nowrap;box-shadow:0 30px 80px -40px rgba(20,16,12,.22)}
  .ukiyo-trip .glance__inner > .gl{flex:0 0 auto}
  .ukiyo-trip .glance__inner > .glance__price{flex:0 0 auto;margin-left:auto;padding-left:2rem;border-left:1px solid var(--line);padding-right:.4rem}
  .ukiyo-trip .glance__inner > .glance__cta{flex:0 0 auto}
  .ukiyo-trip .gl{display:flex;align-items:center;gap:.9rem}
  .ukiyo-trip .gl__ico{width:44px;height:44px;border-radius:12px;background:#fff;color:var(--primary);display:grid;place-items:center;border:1px solid var(--line);flex-shrink:0}
  .ukiyo-trip .gl__ico svg{width:20px;height:20px}
  .ukiyo-trip .gl__l{display:block;font-family:var(--font-mono);font-size:.62rem;letter-spacing:.16em;text-transform:uppercase;color:var(--ink-soft);margin-bottom:.15rem}
  .ukiyo-trip .gl__v{display:block;font-family:var(--font-display);font-size:1.05rem;font-weight:400;color:var(--ink);letter-spacing:-0.005em;line-height:1.1}
  .ukiyo-trip .gl__sep{width:1px;height:36px;background:var(--line)}
  .ukiyo-trip .glance__price{text-align:right}
  .ukiyo-trip .glance__price__l{font-family:var(--font-mono);font-size:.62rem;letter-spacing:.16em;text-transform:uppercase;color:var(--ink-soft)}
  .ukiyo-trip .glance__price__v{display:block;font-family:var(--font-display);font-size:2rem;font-weight:400;color:var(--ink);letter-spacing:-0.02em;line-height:1;margin:.2rem 0}
  .ukiyo-trip .glance__price__v em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-trip .glance__price__per{font-family:var(--font-mono);font-size:.66rem;letter-spacing:.1em;color:var(--ink-soft)}
  .ukiyo-trip .glance__cta{display:inline-flex;align-items:center;gap:.6rem;padding:1rem 1.8rem;border-radius:999px;background:var(--primary);color:#fff;font-weight:600;font-size:.95rem;box-shadow:0 14px 30px -12px rgba(139,69,19,.55);transition:transform .25s, box-shadow .25s, background .25s}
  .ukiyo-trip .glance__cta:hover{background:var(--primary-700);transform:translateY(-2px);box-shadow:0 20px 40px -12px rgba(139,69,19,.7)}
  .ukiyo-trip .glance__price--mobile{display:none;align-items:center;justify-content:space-between;gap:1rem;width:100%;padding-top:1.4rem;border-top:1px dashed var(--line)}
  @media (max-width:1080px){
    .ukiyo-trip .glance__inner{flex-wrap:wrap;padding:1.8rem;gap:1.4rem}
    .ukiyo-trip .gl__sep,.ukiyo-trip .glance__inner > .glance__price{display:none}
    .ukiyo-trip .glance__price--mobile{display:flex}
  }

  /* ROUTE MAP */
  .ukiyo-trip .route{padding:var(--section-y) 0 4rem;background:var(--bg);position:relative}
  .ukiyo-trip .route__head{text-align:center;max-width:42rem;margin:0 auto 4rem}
  .ukiyo-trip .route__chip{font-family:var(--font-mono);font-size:.72rem;letter-spacing:.18em;text-transform:uppercase;color:var(--primary);display:inline-flex;align-items:center;gap:.5rem;margin-bottom:1rem}
  .ukiyo-trip .route__chip::before,.ukiyo-trip .route__chip::after{content:"";width:24px;height:1px;background:var(--primary)}
  .ukiyo-trip .route h2{font-size:clamp(2.2rem, 4.2vw, 3.4rem);font-weight:300;line-height:1.05;letter-spacing:-0.015em;margin-bottom:1rem}
  .ukiyo-trip .route h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-trip .route__head p{color:var(--ink-soft);font-size:1rem;line-height:1.6;margin:0}
  .ukiyo-trip .arc{position:relative;padding:5rem 1rem 1rem;overflow-x:auto;scrollbar-width:none;-ms-overflow-style:none}
  .ukiyo-trip .arc::-webkit-scrollbar{display:none}
  .ukiyo-trip .arc__inner{position:relative;min-width:1100px;height:280px;margin:0 auto}
  .ukiyo-trip .arc__svg{position:absolute;left:0;right:0;top:30px;width:100%;height:140px;overflow:visible}
  .ukiyo-trip .arc__path{stroke:var(--primary);stroke-width:1.5;fill:none;stroke-dasharray:5 6;opacity:.45}
  .ukiyo-trip .arc__nodes{position:absolute;inset:0;display:grid;align-items:start}
  .ukiyo-trip .node{position:relative;text-align:center;cursor:pointer}
  .ukiyo-trip .node__num{position:absolute;top:46px;left:50%;transform:translateX(-50%);width:44px;height:44px;border-radius:50%;background:#fff;border:2px solid var(--primary);color:var(--primary);display:grid;place-items:center;font-family:var(--font-display);font-size:1rem;font-weight:700;z-index:2;transition:transform .3s ease, background .3s, color .3s, box-shadow .3s}
  .ukiyo-trip .node:hover .node__num{transform:translateX(-50%) scale(1.12);background:var(--primary);color:#fff;box-shadow:0 12px 24px -10px rgba(139,69,19,.5)}
  .ukiyo-trip .node__name{display:block;margin-top:114px;font-family:var(--font-display);font-size:1.1rem;font-weight:400;color:var(--ink);letter-spacing:-0.01em;line-height:1.15}
  .ukiyo-trip .node__sub{display:block;margin-top:.2rem;font-family:var(--font-mono);font-size:.66rem;color:var(--ink-soft);letter-spacing:.14em;text-transform:uppercase}
  .ukiyo-trip .node--start .node__num,.ukiyo-trip .node--end .node__num{background:var(--primary);color:#fff;border-color:var(--primary)}
  .ukiyo-trip .node--end .node__num::after{content:"";position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:18px;height:18px;border-radius:50%;background:#fff;opacity:.25}

  /* STICKY STEPPER */
  .ukiyo-trip .stepper{position:sticky;top:74px;z-index:55;background:rgba(254,252,248,.92);backdrop-filter:blur(14px) saturate(1.1);-webkit-backdrop-filter:blur(14px) saturate(1.1);border-top:1px solid var(--line);border-bottom:1px solid var(--line);padding:.85rem 0;transition:transform .35s ease, opacity .35s ease, box-shadow .3s}
  .ukiyo-trip .stepper.is-active{box-shadow:0 10px 30px -20px rgba(20,16,12,.2)}
  .ukiyo-trip .stepper__row{display:flex;align-items:center;gap:1rem;overflow-x:auto;scrollbar-width:none}
  .ukiyo-trip .stepper__row::-webkit-scrollbar{display:none}
  .ukiyo-trip .stepper__lbl{font-family:var(--font-mono);font-size:.7rem;letter-spacing:.16em;text-transform:uppercase;color:var(--ink-soft);white-space:nowrap;padding-right:1.2rem;border-right:1px solid var(--line);flex-shrink:0}
  .ukiyo-trip .stepper__row a{display:inline-flex;align-items:center;gap:.55rem;padding:.5rem .9rem;border-radius:999px;font-family:var(--font-mono);font-size:.74rem;letter-spacing:.06em;color:var(--ink-soft);transition:background .25s, color .25s;white-space:nowrap;flex-shrink:0}
  .ukiyo-trip .stepper__row a:hover{background:var(--surface);color:var(--ink)}
  .ukiyo-trip .stepper__row a.is-current{background:var(--primary);color:#fff}
  .ukiyo-trip .stepper__row a .n{font-family:var(--font-display);font-weight:700;font-size:.82rem;letter-spacing:0}
  .ukiyo-trip .stepper__row a.is-current .n{color:var(--accent-300)}

  /* DAY SCENES */
  .ukiyo-trip .days{background:var(--bg);padding-bottom:5rem}
  .ukiyo-trip .scene{position:relative;padding:6rem 0;scroll-margin-top:160px}
  .ukiyo-trip .scene + .scene{border-top:1px dashed var(--line)}
  .ukiyo-trip .scene__grid{display:grid;grid-template-columns:1fr 1fr;gap:3.5rem;align-items:center;position:relative}
  .ukiyo-trip .scene--flip .scene__grid{direction:rtl}
  .ukiyo-trip .scene--flip .scene__grid > *{direction:ltr}
  .ukiyo-trip .scene__num{position:absolute;top:-3.5rem;left:0;font-family:var(--font-display);font-size:clamp(8rem, 18vw, 16rem);font-weight:300;color:transparent;-webkit-text-stroke:1.5px var(--primary-300);letter-spacing:-0.05em;line-height:.85;pointer-events:none;opacity:.7;z-index:0;user-select:none}
  .ukiyo-trip .scene--flip .scene__num{left:auto;right:0}
  .ukiyo-trip .scene__media{position:relative;border-radius:22px;overflow:hidden;aspect-ratio:5/6;box-shadow:0 30px 60px -30px rgba(20,16,12,.32)}
  .ukiyo-trip .scene__media img{width:100%;height:100%;object-fit:cover;transition:transform 1.4s cubic-bezier(.4,0,.2,1)}
  .ukiyo-trip .scene__media:hover img{transform:scale(1.04)}
  .ukiyo-trip .scene__media .caption{position:absolute;left:1rem;bottom:1rem;background:rgba(20,16,12,.6);color:#fff;padding:.45rem .85rem;border-radius:999px;font-family:var(--font-mono);font-size:.66rem;letter-spacing:.14em;text-transform:uppercase;backdrop-filter:blur(8px)}
  .ukiyo-trip .scene__media__pin{position:absolute;top:1rem;left:1rem;background:rgba(255,255,255,.95);color:var(--primary);font-family:var(--font-mono);font-size:.62rem;letter-spacing:.14em;text-transform:uppercase;padding:.4rem .8rem;border-radius:999px;font-weight:600;display:inline-flex;align-items:center;gap:.4rem;z-index:2}
  .ukiyo-trip .scene__media__pin svg{width:10px;height:10px}
  .ukiyo-trip .scene__body{position:relative;z-index:1}
  .ukiyo-trip .scene__kicker{font-family:var(--font-mono);font-size:.74rem;letter-spacing:.18em;text-transform:uppercase;color:var(--primary);display:inline-flex;align-items:center;gap:.5rem;margin-bottom:1.2rem}
  .ukiyo-trip .scene__kicker::before{content:"";width:24px;height:1px;background:var(--primary)}
  .ukiyo-trip .scene__title{font-size:clamp(2.2rem, 3.6vw, 3.2rem);font-weight:300;letter-spacing:-0.02em;line-height:1.02;margin:0 0 1.4rem}
  .ukiyo-trip .scene__title em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-trip .scene__intro{color:var(--ink);font-size:1.1rem;line-height:1.6;margin:0 0 1.4rem;font-weight:400}
  .ukiyo-trip .scene__body p{color:var(--ink-soft);font-size:.98rem;line-height:1.7;margin:0 0 1rem}
  .ukiyo-trip .scene__body p strong{color:var(--ink);font-weight:700}
  .ukiyo-trip .scene__body p em{font-style:italic}
  .ukiyo-trip .scene__lodge{margin-top:1.8rem;display:grid;grid-template-columns:auto 1fr;gap:1.2rem;align-items:flex-start;padding:1.4rem;background:var(--paper);border:1px solid var(--line);border-radius:18px}
  .ukiyo-trip .scene__lodge__ico{width:44px;height:44px;border-radius:12px;background:#fff;color:var(--secondary-700);display:grid;place-items:center;border:1px solid var(--line);flex-shrink:0}
  .ukiyo-trip .scene__lodge__ico svg{width:20px;height:20px}
  .ukiyo-trip .scene__lodge__name{font-family:var(--font-display);font-size:1.15rem;font-weight:400;color:var(--ink);letter-spacing:-0.01em;line-height:1.15;margin-bottom:.2rem;display:block}
  .ukiyo-trip .scene__lodge__kind{font-family:var(--font-mono);font-size:.66rem;letter-spacing:.14em;text-transform:uppercase;color:var(--ink-soft);margin-bottom:.6rem;display:block}
  .ukiyo-trip .scene__lodge__note{color:var(--ink-soft);font-size:.88rem;line-height:1.55;margin:0}
  @media (max-width:880px){
    .ukiyo-trip .scene{padding:4rem 0}
    .ukiyo-trip .scene__grid{grid-template-columns:1fr;gap:2rem;direction:ltr}
    .ukiyo-trip .scene--flip .scene__grid{direction:ltr}
    .ukiyo-trip .scene__num{top:-2rem;font-size:8rem}
  }

  /* LODGE GALLERY */
  .ukiyo-trip .stays{background:var(--paper);padding:var(--section-y) 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line)}
  .ukiyo-trip .stays__head{text-align:center;margin-bottom:4rem;max-width:44rem;margin-left:auto;margin-right:auto}
  .ukiyo-trip .stays__chip{font-family:var(--font-mono);font-size:.72rem;letter-spacing:.18em;text-transform:uppercase;color:var(--secondary-700);display:inline-flex;align-items:center;gap:.5rem;margin-bottom:1rem}
  .ukiyo-trip .stays__chip::before,.ukiyo-trip .stays__chip::after{content:"";width:24px;height:1px;background:var(--secondary-700)}
  .ukiyo-trip .stays h2{font-size:clamp(2.2rem, 4.2vw, 3.4rem);font-weight:300;line-height:1.05;letter-spacing:-0.015em;margin-bottom:1rem}
  .ukiyo-trip .stays h2 em{font-style:italic;color:var(--secondary-700);font-weight:300}
  .ukiyo-trip .stays__head p{color:var(--ink-soft);font-size:1rem;line-height:1.6}
  .ukiyo-trip .stays__grid{display:grid;grid-template-columns:repeat(4, 1fr);gap:1.2rem}
  .ukiyo-trip .stay{background:#fff;border:1px solid var(--line);border-radius:18px;overflow:hidden;display:flex;flex-direction:column;transition:transform .4s cubic-bezier(.4,0,.2,1), box-shadow .4s}
  .ukiyo-trip .stay:hover{transform:translateY(-4px);box-shadow:0 24px 40px -20px rgba(20,16,12,.2)}
  .ukiyo-trip .stay__media{aspect-ratio:1/1;overflow:hidden;position:relative}
  .ukiyo-trip .stay__media img{width:100%;height:100%;object-fit:cover;transition:transform 1s cubic-bezier(.4,0,.2,1)}
  .ukiyo-trip .stay:hover .stay__media img{transform:scale(1.06)}
  .ukiyo-trip .stay__media__n{position:absolute;top:.8rem;left:.8rem;font-family:var(--font-mono);font-size:.66rem;letter-spacing:.14em;text-transform:uppercase;background:rgba(20,16,12,.55);color:#fff;padding:.3rem .65rem;border-radius:999px;backdrop-filter:blur(6px)}
  .ukiyo-trip .stay__body{padding:1.1rem 1.2rem 1.3rem}
  .ukiyo-trip .stay__nm{font-family:var(--font-display);font-size:1.05rem;font-weight:400;color:var(--ink);letter-spacing:-0.01em;line-height:1.2;margin-bottom:.25rem}
  .ukiyo-trip .stay__kind{font-family:var(--font-mono);font-size:.62rem;letter-spacing:.14em;text-transform:uppercase;color:var(--ink-soft)}
  @media (max-width:980px){.ukiyo-trip .stays__grid{grid-template-columns:repeat(2, 1fr)}}
  @media (max-width:560px){.ukiyo-trip .stays__grid{grid-template-columns:1fr}}

  /* INCLUDES */
  .ukiyo-trip .incx{background:var(--bg);padding:var(--section-y) 0}
  .ukiyo-trip .incx__head{text-align:center;max-width:40rem;margin:0 auto 4rem}
  .ukiyo-trip .incx__chip{font-family:var(--font-mono);font-size:.72rem;letter-spacing:.18em;text-transform:uppercase;color:var(--primary);display:inline-flex;align-items:center;gap:.5rem;margin-bottom:1rem}
  .ukiyo-trip .incx__chip::before,.ukiyo-trip .incx__chip::after{content:"";width:24px;height:1px;background:var(--primary)}
  .ukiyo-trip .incx h2{font-size:clamp(2.2rem, 4.2vw, 3.4rem);font-weight:300;line-height:1.05;letter-spacing:-0.015em;margin-bottom:1rem}
  .ukiyo-trip .incx h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-trip .incx__grid{display:grid;grid-template-columns:1fr 1fr;gap:1.4rem}
  .ukiyo-trip .incx__col{background:#fff;border:1px solid var(--line);border-radius:22px;padding:2.4rem}
  .ukiyo-trip .incx__col h3{display:flex;align-items:center;gap:.8rem;font-family:var(--font-display);font-size:1.4rem;font-weight:400;color:var(--ink);letter-spacing:-0.01em;margin-bottom:1.8rem;padding-bottom:1.2rem;border-bottom:1px dashed var(--line)}
  .ukiyo-trip .incx__col h3 .b{width:38px;height:38px;border-radius:50%;display:grid;place-items:center;color:#fff;flex-shrink:0}
  .ukiyo-trip .incx__col.in h3 .b{background:var(--secondary-700)}
  .ukiyo-trip .incx__col.out h3 .b{background:var(--ink-soft)}
  .ukiyo-trip .incx__col h3 .b svg{width:18px;height:18px}
  .ukiyo-trip .incx__col ul{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:.9rem}
  .ukiyo-trip .incx__col li{display:flex;gap:.8rem;align-items:flex-start;font-size:.96rem;color:var(--ink);line-height:1.55}
  .ukiyo-trip .incx__col li svg{width:20px;height:20px;flex-shrink:0;margin-top:.15rem}
  .ukiyo-trip .incx__col.in li svg{color:var(--secondary-700)}
  .ukiyo-trip .incx__col.out li svg{color:var(--ink-soft)}
  @media (max-width:760px){.ukiyo-trip .incx__grid{grid-template-columns:1fr}}

  /* FAQ */
  .ukiyo-trip .faq{background:var(--paper);padding:var(--section-y) 0;border-top:1px solid var(--line)}
  .ukiyo-trip .faq__head{text-align:center;max-width:40rem;margin:0 auto 4rem}
  .ukiyo-trip .faq__chip{font-family:var(--font-mono);font-size:.72rem;letter-spacing:.18em;text-transform:uppercase;color:var(--secondary-700);display:inline-flex;align-items:center;gap:.5rem;margin-bottom:1rem}
  .ukiyo-trip .faq__chip::before,.ukiyo-trip .faq__chip::after{content:"";width:24px;height:1px;background:var(--secondary-700)}
  .ukiyo-trip .faq h2{font-size:clamp(2.2rem, 4.2vw, 3.4rem);font-weight:300;line-height:1.05;letter-spacing:-0.015em;margin-bottom:1rem}
  .ukiyo-trip .faq h2 em{font-style:italic;color:var(--secondary-700);font-weight:300}
  .ukiyo-trip .faq__group{max-width:780px;margin:0 auto 2.4rem}
  .ukiyo-trip .faq__group h4{font-family:var(--font-mono);font-size:.74rem;letter-spacing:.18em;text-transform:uppercase;color:var(--ink-soft);margin-bottom:1rem;font-weight:500}
  .ukiyo-trip .qa{background:#fff;border:1px solid var(--line);border-radius:14px;margin-bottom:.7rem;overflow:hidden;transition:border-color .25s}
  .ukiyo-trip .qa[open]{border-color:var(--primary-300)}
  .ukiyo-trip .qa summary{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:1.1rem 1.3rem;cursor:pointer;list-style:none;font-size:1rem;font-weight:600;color:var(--ink);transition:background .2s}
  .ukiyo-trip .qa summary::-webkit-details-marker{display:none}
  .ukiyo-trip .qa summary:hover{background:var(--surface)}
  .ukiyo-trip .qa__caret{display:grid;place-items:center;width:30px;height:30px;border-radius:50%;border:1px solid var(--line);color:var(--ink-soft);transition:transform .3s, background .25s, color .25s, border-color .25s;flex-shrink:0}
  .ukiyo-trip .qa[open] .qa__caret{transform:rotate(45deg);background:var(--primary);color:#fff;border-color:var(--primary)}
  .ukiyo-trip .qa__body{padding:0 1.3rem 1.2rem;color:var(--ink-soft);font-size:.95rem;line-height:1.65}
  .ukiyo-trip .qa__body p{margin:0 0 .6rem}

  /* STICKY BOOK BAR */
  .ukiyo-trip .bookbar{position:fixed;left:50%;bottom:1.2rem;transform:translateX(-50%) translateY(150%);z-index:58;background:var(--ink);color:#fff;border-radius:999px;padding:.5rem .6rem .5rem 1.6rem;display:flex;align-items:center;gap:1.4rem;box-shadow:0 24px 40px -16px rgba(20,16,12,.45);transition:transform .45s cubic-bezier(.4,0,.2,1);max-width:calc(100vw - 2rem)}
  .ukiyo-trip .bookbar.is-visible{transform:translateX(-50%) translateY(0)}
  .ukiyo-trip .bookbar__l{display:flex;align-items:center;gap:1.2rem;font-family:var(--font-mono);font-size:.74rem;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.72)}
  .ukiyo-trip .bookbar__l strong{color:#fff;font-family:var(--font-display);font-size:1.1rem;letter-spacing:-0.01em;font-weight:400;text-transform:none}
  .ukiyo-trip .bookbar__l .sep{width:1px;height:14px;background:rgba(255,255,255,.2)}
  .ukiyo-trip .bookbar__cta{display:inline-flex;align-items:center;gap:.5rem;padding:.8rem 1.4rem;border-radius:999px;background:var(--primary);color:#fff;font-weight:600;font-size:.92rem;transition:background .25s, transform .25s}
  .ukiyo-trip .bookbar__cta:hover{background:var(--primary-700);transform:translateY(-1px)}
  @media (max-width:680px){
    .ukiyo-trip .bookbar__l{display:none}
    .ukiyo-trip .bookbar{padding:.4rem .5rem .4rem 1.4rem}
  }

  /* REVEAL */
  .ukiyo-trip .reveal{opacity:0;transform:translateY(28px);transition:opacity .85s ease, transform .85s ease}
  .ukiyo-trip .reveal.is-visible{opacity:1;transform:translateY(0)}
  @media (prefers-reduced-motion:reduce){
    .ukiyo-trip .reveal{opacity:1;transform:none;transition:none}
    .ukiyo-trip .hero__bg img{animation:none}
    .ukiyo-trip .hero__scroll .line{animation:none}
  }
</style>

<div class="ukiyo-trip">

  <!-- HERO -->
  <section class="hero">
    <div class="hero__bg">
      <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="eager" fetchpriority="high" decoding="async" />
    </div>
    <div class="container hero__inner">
      <div>
        <div class="crumb">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a><span>/</span>
          <a href="<?php echo esc_url( $autor_index ); ?>">Viajes de autor</a><span>/</span>
          <span><?php echo esc_html( $title ); ?></span>
        </div>
        <?php if ( $expert_name ) : ?>
          <div class="hero__byline">
            <?php if ( $expert_image ) : ?>
              <img src="<?php echo esc_url( $expert_image ); ?>" alt="<?php echo esc_attr( $expert_name ); ?>" />
            <?php endif; ?>
            Por <em><?php echo esc_html( $expert_name ); ?></em>
          </div>
        <?php endif; ?>
        <h1 class="hero__title"><?php echo wp_kses( $title, [ 'em' => [], 'strong' => [], 'br' => [] ] ); ?></h1>
        <?php if ( $hero_subtitle ) : ?>
          <p class="hero__sub"><?php echo esc_html( $hero_subtitle ); ?></p>
        <?php endif; ?>
      </div>
      <div class="hero__meta">
        <?php if ( $duracion || $grupos ) : ?>
          <div class="row">
            <?php if ( $duracion ) : ?><span><?php echo esc_html( $duracion ); ?></span><?php endif; ?>
            <?php if ( $duracion && $grupos ) : ?><span class="dot"></span><?php endif; ?>
            <?php if ( $grupos ) : ?><span><?php echo esc_html( $grupos ); ?></span><?php endif; ?>
          </div>
        <?php endif; ?>
        <?php if ( $fecha_salida || $precio_final ) : ?>
          <div class="row">
            <?php if ( $fecha_salida ) : ?><span><?php echo esc_html( $fecha_salida ); ?></span><?php endif; ?>
            <?php if ( $fecha_salida && $precio_final ) : ?><span class="dot"></span><?php endif; ?>
            <?php if ( $precio_final ) : ?><span>Desde <?php echo esc_html( $precio_final ); ?></span><?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="hero__scroll"><span>Empieza el viaje</span><div class="line"></div></div>
  </section>

  <!-- AUTHOR LETTER -->
  <?php if ( $expert_name && ( $expert_quote || $expert_letter ) ) : ?>
  <section class="letter">
    <div class="container letter__grid">
      <div class="hostcard reveal">
        <span class="hostcard__ref">UKIYO <span>/</span> HOST <?php echo esc_html( str_pad( $post_id % 1000, 3, '0', STR_PAD_LEFT ) ); ?></span>
        <div class="hostcard__stamp">
          <strong><?php echo esc_html( explode( ' ', $expert_name )[0] ); ?></strong>
          <em>Anfitrión</em>
        </div>
        <div class="hostcard__media">
          <?php if ( $expert_image ) : ?>
            <img src="<?php echo esc_url( $expert_image ); ?>" alt="<?php echo esc_attr( $expert_name ); ?>" />
          <?php endif; ?>
        </div>
        <div class="hostcard__bio">
          <?php if ( $expert_title ) : ?>
            <span class="hostcard__eyebrow"><?php echo esc_html( $expert_title ); ?></span>
          <?php endif; ?>
          <h3 class="hostcard__name"><?php echo wp_kses( $expert_name, [ 'em' => [] ] ); ?></h3>
          <?php if ( $expert_quote ) : ?>
            <p class="hostcard__tagline">&ldquo;<?php echo esc_html( $expert_quote ); ?>&rdquo;</p>
          <?php endif; ?>
          <?php if ( $expert_origin || $expert_years || $expert_languages || $expert_specialty || $expert_focus ) : ?>
            <div class="hostcard__meta">
              <?php
              $meta_items = [];
              if ( $expert_origin ) {
                $meta_items[] = [ 'l' => 'Origen', 'v' => $expert_origin ];
              } elseif ( $expert_specialty ) {
                $meta_items[] = [ 'l' => 'Especialidad', 'v' => $expert_specialty ];
              }
              if ( $expert_years ) {
                $meta_items[] = [ 'l' => 'Guiando', 'v' => $expert_years ];
              } elseif ( $expert_focus ) {
                $meta_items[] = [ 'l' => 'Enfoque', 'v' => $expert_focus ];
              }
              if ( $expert_languages ) {
                $meta_items[] = [ 'l' => 'Idiomas', 'v' => $expert_languages ];
              }
              foreach ( array_slice( $meta_items, 0, 3 ) as $mi ) : ?>
                <div>
                  <span class="l"><?php echo esc_html( $mi['l'] ); ?></span>
                  <span class="v"><?php echo wp_kses( $mi['v'], [ 'br' => [], 'small' => [] ] ); ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="reveal">
        <span class="letter__chip">Carta del experto</span>
        <h2>Una mirada<br/>desde <em>dentro</em>.</h2>
        <?php if ( $expert_quote ) : ?>
          <blockquote>&ldquo;<?php echo esc_html( $expert_quote ); ?>&rdquo;</blockquote>
        <?php endif; ?>
        <?php if ( $expert_letter ) :
          $letter_paragraphs = preg_split( "/\r?\n\r?\n/", trim( $expert_letter ) );
          foreach ( $letter_paragraphs as $p ) :
            if ( '' === trim( $p ) ) continue; ?>
            <p><?php echo wp_kses( $p, [ 'strong' => [], 'em' => [], 'br' => [] ] ); ?></p>
          <?php endforeach; ?>
        <?php endif; ?>
        <div class="letter__sig">
          <div>
            <div class="letter__sig__nm"><?php echo esc_html( $expert_name ); ?> · firma de salida</div>
            <?php if ( $expert_title ) : ?>
              <div class="letter__sig__role"><?php echo esc_html( $expert_title ); ?></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- AT A GLANCE / BOOKING -->
  <?php if ( $duracion || $grupos || $fecha_salida || $precio_final ) : ?>
  <section class="glance" id="reserva">
    <div class="container">
      <div class="glance__inner reveal">
        <?php if ( $duracion ) : ?>
          <div class="gl">
            <div class="gl__ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div>
            <div><span class="gl__l">Duración</span><span class="gl__v"><?php echo esc_html( $duracion ); ?></span></div>
          </div>
        <?php endif; ?>
        <?php if ( $duracion && $grupos ) : ?><div class="gl__sep"></div><?php endif; ?>
        <?php if ( $grupos ) : ?>
          <div class="gl">
            <div class="gl__ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="9" r="2.5"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6M14 20c0-2.4 1.6-4.5 3.8-5.2"/></svg></div>
            <div><span class="gl__l">Grupo</span><span class="gl__v"><?php echo esc_html( $grupos ); ?></span></div>
          </div>
        <?php endif; ?>
        <?php if ( ( $duracion || $grupos ) && $fecha_salida ) : ?><div class="gl__sep"></div><?php endif; ?>
        <?php if ( $fecha_salida ) : ?>
          <div class="gl">
            <div class="gl__ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></div>
            <div><span class="gl__l">Próxima salida</span><span class="gl__v"><?php echo esc_html( $fecha_salida ); ?></span></div>
          </div>
        <?php endif; ?>
        <?php if ( $precio_final ) : ?>
          <div class="glance__price">
            <span class="glance__price__l">Desde</span>
            <span class="glance__price__v"><em><?php echo esc_html( preg_replace( '/\s*€\s*$/u', '', $precio_final ) ); ?></em> €</span>
            <span class="glance__price__per">por persona · vuelos aparte</span>
          </div>
        <?php endif; ?>
        <a class="glance__cta" href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener">
          Más información
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <?php if ( $precio_final ) : ?>
          <div class="glance__price--mobile">
            <div class="glance__price" style="text-align:left">
              <span class="glance__price__l">Desde</span>
              <span class="glance__price__v"><em><?php echo esc_html( preg_replace( '/\s*€\s*$/u', '', $precio_final ) ); ?></em> €</span>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ROUTE MAP -->
  <?php if ( count( $itinerary ) >= 2 ) :
    $route_nodes_count = count( $itinerary );
  ?>
  <section class="route">
    <div class="container">
      <div class="route__head reveal">
        <span class="route__chip">La ruta del viaje</span>
        <h2>El recorrido,<br/>de <em>principio a fin</em>.</h2>
        <p><?php echo esc_html( $route_nodes_count ); ?> paradas. Pulsa cualquier nodo para ver ese día.</p>
      </div>
      <div class="arc reveal">
        <div class="arc__inner">
          <svg class="arc__svg" viewBox="0 0 1100 140" preserveAspectRatio="none">
            <path class="arc__path" d="M 50,90 Q 200,10 360,80 T 700,90 T 1050,90"></path>
          </svg>
          <div class="arc__nodes" style="grid-template-columns:repeat(<?php echo esc_attr( $route_nodes_count ); ?>, 1fr)">
            <?php foreach ( $itinerary as $idx => $day ) :
              $day_id = $day['day_id'] ?? ( 'dia-' . ( $idx + 1 ) );
              $node_n = sprintf( '%02d', $idx + 1 );
              $node_name = $day['day_title'] ?? ( $day['day_label'] ?? ( 'Día ' . ( $idx + 1 ) ) );
              // Cortamos el título por la primera coma/em o tomamos las 2 primeras palabras para el nodo.
              $node_short = trim( preg_replace( '/[,–—:].*$/u', '', wp_strip_all_tags( $node_name ) ) );
              $node_short_words = explode( ' ', $node_short );
              if ( count( $node_short_words ) > 2 ) {
                $node_short = implode( ' ', array_slice( $node_short_words, 0, 2 ) );
              }
              $node_sub = $day['day_label'] ?? '';
              // Quita "Día NN ·" del sub si está.
              $node_sub = trim( preg_replace( '/^Día\s*\d+\s*[·\-]\s*/iu', '', $node_sub ) );
              $class = '';
              if ( 0 === $idx ) { $class = ' node--start'; }
              elseif ( $idx === $route_nodes_count - 1 ) { $class = ' node--end'; }
              ?>
              <a class="node<?php echo $class; ?>" href="#<?php echo esc_attr( $day_id ); ?>">
                <span class="node__num"><?php echo esc_html( $node_n ); ?></span>
                <span class="node__name"><?php echo esc_html( $node_short ?: ( 'Día ' . ( $idx + 1 ) ) ); ?></span>
                <?php if ( $node_sub ) : ?>
                  <span class="node__sub"><?php echo esc_html( $node_sub ); ?></span>
                <?php endif; ?>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- STICKY STEPPER -->
  <?php if ( ! empty( $itinerary ) ) : ?>
  <div class="stepper" id="stepper">
    <div class="container">
      <div class="stepper__row">
        <span class="stepper__lbl">Itinerario</span>
        <?php foreach ( $itinerary as $idx => $day ) :
          $day_id    = $day['day_id'] ?? ( 'dia-' . ( $idx + 1 ) );
          $step_n    = sprintf( '%02d', $idx + 1 );
          $step_name = $day['day_title'] ?? ( $day['day_label'] ?? ( 'Día ' . ( $idx + 1 ) ) );
          $step_short = trim( preg_replace( '/[,–—:].*$/u', '', wp_strip_all_tags( $step_name ) ) );
          $step_words = explode( ' ', $step_short );
          if ( count( $step_words ) > 2 ) {
            $step_short = implode( ' ', array_slice( $step_words, 0, 2 ) );
          }
          ?>
          <a href="#<?php echo esc_attr( $day_id ); ?>" data-step="<?php echo (int) ( $idx + 1 ); ?>">
            <span class="n"><?php echo esc_html( $step_n ); ?></span> <?php echo esc_html( $step_short ); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <!-- DAYS -->
  <?php if ( ! empty( $itinerary ) ) : ?>
  <main class="days">
    <div class="container">
      <?php foreach ( $itinerary as $idx => $day ) :
        $day_id     = $day['day_id'] ?? ( 'dia-' . ( $idx + 1 ) );
        $day_label  = $day['day_label'] ?? ( 'Día ' . sprintf( '%02d', $idx + 1 ) );
        $day_title  = $day['day_title'] ?? '';
        $day_intro  = $day['day_intro'] ?? ( $day['day_description'] ?? '' );
        $lodge_name = $day['accommodation_name'] ?? '';
        $lodge_type = $day['accommodation_type'] ?? '';
        $lodge_high = $day['accommodation_highlight'] ?? '';
        $experiences = isset( $day['experiences'] ) && is_array( $day['experiences'] ) ? $day['experiences'] : [];
        $scene_pin = $day['pin'] ?? $day['day_title'] ?? '';
        $scene_pin = trim( preg_replace( '/[,–—:].*$/u', '', wp_strip_all_tags( $scene_pin ) ) );

        // Imagen principal del día: la primera experiencia con imagen.
        $scene_img = '';
        foreach ( $experiences as $exp_ ) {
          $candidate = $first_image_from_csv( $exp_['images'] ?? '' );
          if ( $candidate ) { $scene_img = $candidate; break; }
        }

        // Body: combinamos descripciones de experiences en párrafos.
        $body_paragraphs = [];
        foreach ( $experiences as $exp_ ) {
          $exp_desc = trim( (string) ( $exp_['description'] ?? '' ) );
          if ( $exp_desc ) {
            foreach ( preg_split( "/\r?\n\r?\n/", $exp_desc ) as $p ) {
              if ( '' !== trim( $p ) ) {
                $body_paragraphs[] = $p;
              }
            }
          }
        }

        $is_flip = ( $idx % 2 ) === 1;
        ?>
        <section class="scene<?php echo $is_flip ? ' scene--flip' : ''; ?>" id="<?php echo esc_attr( $day_id ); ?>">
          <span class="scene__num" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $idx + 1 ) ); ?></span>
          <div class="scene__grid">
            <div class="scene__media reveal">
              <?php if ( $scene_pin ) : ?>
                <span class="scene__media__pin">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                  <?php echo esc_html( $scene_pin ); ?>
                </span>
              <?php endif; ?>
              <?php if ( $scene_img ) : ?>
                <img src="<?php echo esc_url( $scene_img ); ?>" alt="<?php echo esc_attr( $day_title ?: $day_label ); ?>" loading="lazy" />
              <?php endif; ?>
            </div>
            <div class="scene__body reveal">
              <?php if ( $day_label ) : ?>
                <span class="scene__kicker"><?php echo esc_html( $day_label ); ?></span>
              <?php endif; ?>
              <?php if ( $day_title ) : ?>
                <h2 class="scene__title"><?php echo wp_kses( $day_title, [ 'em' => [], 'strong' => [], 'br' => [] ] ); ?></h2>
              <?php endif; ?>
              <?php if ( $day_intro ) : ?>
                <p class="scene__intro"><?php echo esc_html( $day_intro ); ?></p>
              <?php endif; ?>
              <?php foreach ( $body_paragraphs as $p ) : ?>
                <p><?php echo wp_kses( $p, [ 'strong' => [], 'em' => [], 'br' => [] ] ); ?></p>
              <?php endforeach; ?>
              <?php if ( $lodge_name || $lodge_type || $lodge_high ) : ?>
                <div class="scene__lodge">
                  <div class="scene__lodge__ico">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 11l9-8 9 8M5 10v10h14V10" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </div>
                  <div>
                    <?php if ( $lodge_name ) : ?>
                      <span class="scene__lodge__name"><?php echo esc_html( $lodge_name ); ?></span>
                    <?php endif; ?>
                    <?php if ( $lodge_type ) : ?>
                      <span class="scene__lodge__kind"><?php echo esc_html( $lodge_type ); ?></span>
                    <?php endif; ?>
                    <?php if ( $lodge_high ) : ?>
                      <p class="scene__lodge__note"><?php echo esc_html( $lodge_high ); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </section>
      <?php endforeach; ?>
    </div>
  </main>
  <?php endif; ?>

  <!-- LODGE GALLERY -->
  <?php
  // Recopilar alojamientos únicos del itinerario para el grid.
  $stays = [];
  foreach ( $itinerary as $idx => $day ) {
    $lodge_name = trim( (string) ( $day['accommodation_name'] ?? '' ) );
    if ( ! $lodge_name ) continue;
    $lodge_img = '';
    if ( ! empty( $day['experiences'] ) && is_array( $day['experiences'] ) ) {
      foreach ( $day['experiences'] as $exp_ ) {
        $candidate = $first_image_from_csv( $exp_['images'] ?? '' );
        if ( $candidate ) { $lodge_img = $candidate; break; }
      }
    }
    $stays[] = [
      'n'    => $idx + 1,
      'name' => $lodge_name,
      'kind' => $day['accommodation_type'] ?? '',
      'img'  => $lodge_img,
    ];
  }
  if ( ! empty( $stays ) ) :
  ?>
  <section class="stays">
    <div class="container">
      <div class="stays__head reveal">
        <span class="stays__chip">Dónde dormirás</span>
        <h2>Casas con <em>dueño</em>.</h2>
        <p>Cada noche en un lugar elegido a mano: riads, kasbahs, casas familiares y lugares con historia propia.</p>
      </div>
      <div class="stays__grid">
        <?php foreach ( $stays as $stay ) : ?>
          <article class="stay reveal">
            <div class="stay__media">
              <span class="stay__media__n">Noche <?php echo esc_html( sprintf( '%02d', $stay['n'] ) ); ?></span>
              <?php if ( $stay['img'] ) : ?>
                <img src="<?php echo esc_url( $stay['img'] ); ?>" alt="<?php echo esc_attr( $stay['name'] ); ?>" loading="lazy" />
              <?php endif; ?>
            </div>
            <div class="stay__body">
              <h3 class="stay__nm"><?php echo esc_html( $stay['name'] ); ?></h3>
              <?php if ( $stay['kind'] ) : ?>
                <span class="stay__kind"><?php echo esc_html( $stay['kind'] ); ?></span>
              <?php endif; ?>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- INCLUDES / EXCLUDES -->
  <?php if ( ! empty( $trip_includes ) || ! empty( $trip_excludes ) ) : ?>
  <section class="incx" id="includes">
    <div class="container">
      <div class="incx__head reveal">
        <span class="incx__chip">Transparencia total</span>
        <h2>Sin <em>letra pequeña</em></h2>
      </div>
      <div class="incx__grid">
        <?php if ( ! empty( $trip_includes ) ) : ?>
          <div class="incx__col in reveal">
            <h3>
              <span class="b"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
              Lo que incluye
            </h3>
            <ul>
              <?php foreach ( $trip_includes as $item ) : ?>
                <li>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <?php echo esc_html( $item ); ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
        <?php if ( ! empty( $trip_excludes ) ) : ?>
          <div class="incx__col out reveal">
            <h3>
              <span class="b"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M18 6L6 18M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
              Lo que no
            </h3>
            <ul>
              <?php foreach ( $trip_excludes as $item ) : ?>
                <li>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9 9l6 6M15 9l-6 6" stroke-linecap="round"/></svg>
                  <?php echo esc_html( $item ); ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- FAQ -->
  <?php if ( ! empty( $faq_list ) ) : ?>
  <section class="faq" id="faq">
    <div class="container">
      <div class="faq__head reveal">
        <span class="faq__chip">Lo que más me preguntáis</span>
        <h2>Dudas <em>honestas</em></h2>
      </div>
      <?php foreach ( $faq_groups as $group_key => $group ) :
        if ( empty( $group['items'] ) ) continue; ?>
        <div class="faq__group reveal">
          <h4><?php echo esc_html( $group['label'] ); ?></h4>
          <?php foreach ( $group['items'] as $faq_idx => $faq_item ) :
            $question = $faq_item['question'] ?? '';
            $answer   = $faq_item['answer'] ?? '';
            if ( ! $question ) continue;
            ?>
            <details class="qa"<?php echo 0 === $faq_idx && 'general' === $group_key ? ' open' : ''; ?>>
              <summary>
                <span><?php echo esc_html( $question ); ?></span>
                <span class="qa__caret">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
                </span>
              </summary>
              <div class="qa__body">
                <?php
                $paragraphs = preg_split( "/\r?\n\r?\n/", trim( $answer ) );
                foreach ( $paragraphs as $p ) :
                  if ( '' === trim( $p ) ) continue; ?>
                  <p><?php echo wp_kses( $p, [ 'strong' => [], 'em' => [], 'br' => [], 'a' => [ 'href' => [], 'rel' => [], 'target' => [] ] ] ); ?></p>
                <?php endforeach; ?>
              </div>
            </details>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endif; ?>

  <!-- STICKY BOOK BAR -->
  <?php if ( $precio_final ) : ?>
  <div class="bookbar" id="bookbar" aria-hidden="true">
    <div class="bookbar__l">
      <span><strong><?php echo esc_html( $title ); ?></strong></span>
      <?php if ( $duracion ) : ?>
        <span class="sep"></span>
        <span><?php echo esc_html( $duracion ); ?></span>
      <?php endif; ?>
      <span class="sep"></span>
      <span>Desde <strong style="font-family:var(--font-display)"><?php echo esc_html( $precio_final ); ?></strong></span>
    </div>
    <a class="bookbar__cta" href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener">
      Más información
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
  <?php endif; ?>

</div><!-- /.ukiyo-trip -->

<script>
(function(){
  const root = document.querySelector('.ukiyo-trip');
  if (!root) return;

  // Reveal on scroll
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{
        if (e.isIntersecting) { e.target.classList.add('is-visible'); io.unobserve(e.target); }
      });
    }, { threshold: .1 });
    root.querySelectorAll('.reveal').forEach(el => io.observe(el));
  } else {
    root.querySelectorAll('.reveal').forEach(el => el.classList.add('is-visible'));
  }

  // Stepper active state — track scenes
  const scenes = root.querySelectorAll('.scene[id^="dia-"]');
  const stepLinks = root.querySelectorAll('.stepper__row a');
  if (scenes.length && stepLinks.length && 'IntersectionObserver' in window) {
    const stepMap = new Map();
    stepLinks.forEach(a => stepMap.set(a.getAttribute('href').slice(1), a));
    const sceneIO = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        const link = stepMap.get(e.target.id);
        if (!link) return;
        if (e.isIntersecting) {
          stepLinks.forEach(l => l.classList.remove('is-current'));
          link.classList.add('is-current');
          const row = root.querySelector('.stepper__row');
          if (row) {
            const r = link.getBoundingClientRect();
            const rr = row.getBoundingClientRect();
            if (r.left < rr.left + 100 || r.right > rr.right - 40) {
              row.scrollTo({ left: link.offsetLeft - rr.width/2 + r.width/2, behavior: 'smooth' });
            }
          }
        }
      });
    }, { rootMargin: '-35% 0px -55% 0px', threshold: 0 });
    scenes.forEach(s => sceneIO.observe(s));
  }

  // Sticky stepper visual state
  const stepper = root.querySelector('#stepper');
  if (stepper) {
    const onStep = () => {
      const r = stepper.getBoundingClientRect();
      stepper.classList.toggle('is-active', r.top <= 75);
    };
    window.addEventListener('scroll', onStep, { passive: true });
    onStep();
  }

  // Sticky booking bar
  const bar = root.querySelector('#bookbar');
  const glance = root.querySelector('.glance');
  const faq = root.querySelector('.faq');
  if (bar && glance) {
    function tick(){
      const gRect = glance.getBoundingClientRect();
      const fRect = faq ? faq.getBoundingClientRect() : { top: Infinity };
      const passedGlance = gRect.bottom < 0;
      const reachedFaq = fRect.top < window.innerHeight * 0.4;
      const show = passedGlance && !reachedFaq;
      bar.classList.toggle('is-visible', show);
      bar.setAttribute('aria-hidden', show ? 'false' : 'true');
    }
    window.addEventListener('scroll', tick, { passive: true });
    window.addEventListener('resize', tick);
    tick();
  }
})();
</script>

<?php get_footer(); ?>
