<?php
/**
 * Template Name: Experiencias
 *
 * Implementación del export "Destinos.html" de Claude Design.
 *
 * Decisiones:
 *   - Header/footer del tema (get_header / get_footer). Nav y footer del export omitidos.
 *   - CSS scoped a .ukiyo-destinos para no contaminar otras plantillas.
 *   - Catálogo de destinos hardcoded en este template (es contenido de marca).
 *   - Imágenes desde el banco /images/ del tema (todas .webp).
 *   - Enlaces a destinos individuales vía ukiyo_get_route_url() (ya registradas).
 *   - WhatsApp en CTA final usa el icon8 PNG mantenido del .php anterior.
 */
get_header();

$img_base       = get_template_directory_uri() . '/images';
$pricing_url    = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'pricing' ) : home_url( '/' );
$wa_url         = 'https://wa.me/message/CS2LNI6YHSETO1';
$wa_icon        = 'https://img.icons8.com/cotton/64/whatsapp--v4.png';

$route_url = function ( $key ) {
	return function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( $key ) : home_url( '/' );
};

// Destinos internacionales (4 cards).
$dest_inter = [
	[
		'num'   => '01 · インドネシア',
		'tag'   => 'Tierra de dioses',
		'title' => 'Indonesia',
		'desc'  => 'Templos milenarios, arrozales infinitos y fondos marinos que quitan el aliento. Un viaje que transforma.',
		'image' => $img_base . '/indonesia/viajes-a-indonesia-personalizados-bali.webp',
		'alt'   => 'Indonesia · Bali',
		'url'   => $route_url( 'destination_indonesia' ),
	],
	[
		'num'   => '02 · プラビダ',
		'tag'   => 'Biodiversidad pura',
		'title' => 'Costa Rica',
		'desc'  => 'Selvas infinitas, volcanes activos y playas vírgenes bañadas por dos océanos. Pura vida en estado puro.',
		'image' => $img_base . '/costarica/viajes-a-costa-rica-personalizados-bahia-drake.webp',
		'alt'   => 'Costa Rica · Bahía Drake',
		'url'   => $route_url( 'destination_costa_rica' ),
	],
	[
		'num'   => '03 · コロンビア',
		'tag'   => 'Alegría que se queda',
		'title' => 'Colombia',
		'desc'  => 'Ciudades coloniales, selva amazónica y costas caribeñas. Un país que abraza y no suelta.',
		'image' => $img_base . '/colombia/viajes-a-colombia-personalizados-eje-cafetero-valle-de-cocora.webp',
		'alt'   => 'Colombia · Valle de Cocora',
		'url'   => $route_url( 'destination_colombia' ),
	],
	[
		'num'   => '04 · المغرب',
		'tag'   => 'Encrucijada de culturas',
		'title' => 'Marruecos',
		'desc'  => 'Medinas laberínticas, desierto del Sáhara y montañas del Atlas. Donde África y Europa se dan la mano.',
		'image' => $img_base . '/marruecos/viajes-marruecos-hero2.webp',
		'alt'   => 'Marruecos · Erg Chebbi',
		'url'   => $route_url( 'destination_marruecos' ),
	],
];

// Destino nacional (Lanzarote · Europa).
$dest_nac = [
	[
		'num'   => '05 · Islas Canarias',
		'tag'   => 'Volcanes y océano',
		'title' => 'Lanzarote',
		'desc'  => 'Paisajes lunares, playas de arena negra, La Graciosa y la huella de Manrique. Una isla que parece otro planeta — sin coger un vuelo largo.',
		'image' => $img_base . '/spain/lanzarote/Hervideros_Lanzarote.webp',
		'alt'   => 'Lanzarote · Los Hervideros',
		'url'   => $route_url( 'destination_lanzarote' ),
		'eu'    => true,
	],
];

// Destino europeo (Italia).
$dest_eu = [
	[
		'num'   => '06 · Italia',
		'tag'   => 'Dolce vita',
		'title' => 'Italia',
		'desc'  => 'Arte, gastronomía y pueblos con encanto, de los Dolomitas a Sicilia. La belleza convertida en forma de vida.',
		'image' => $img_base . '/italia/viajes-a-italia-personalizados-dolomitas.webp',
		'alt'   => 'Italia · Dolomitas',
		'url'   => $route_url( 'destination_italia' ),
		'eu'    => true,
	],
];

// Hero principal (panorama).
$hero_image = $img_base . '/indonesia/viajes-a-indonesia-personalizados-islas.webp';

// Stats del hero.
$stats = [
	[ 'num' => '6',    'lbl' => 'Destinos vivos' ],
	[ 'num' => '3',    'lbl' => 'Continentes' ],
	[ 'num' => '+200', 'lbl' => 'Viajes diseñados' ],
	[ 'num' => '100%', 'lbl' => 'Pisados por nosotros' ],
];
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap">

<style>
  .ukiyo-destinos{
    --primary:#8B4513; --primary-50:#FDF7F3; --primary-100:#F9E8D9; --primary-300:#E8B48D; --primary-700:#6B3410;
    --secondary:#9CAF88; --secondary-700:#5E6952;
    --accent:#D4A574; --accent-300:#EBD2AE; --accent-50:#FDF9F4;
    --bg:#FEFCF8; --surface:#F5F2ED; --paper:#F8F2E7;
    --ink:#2C2C2C; --ink-soft:#6B6B6B; --line:#E8E0D2;
    --font-sans:'Satoshi','Inter',system-ui,sans-serif;
    --font-display:'Rowdies',serif;
    --font-mono:'DM Mono',ui-monospace,monospace;
    --section-y:6.5rem;
    background:var(--bg); color:var(--ink); font-family:var(--font-sans);
    font-weight:400; font-size:17px; line-height:1.6;
    -webkit-font-smoothing:antialiased;
  }
  .ukiyo-destinos *{box-sizing:border-box}
  .ukiyo-destinos img{max-width:100%;display:block}
  .ukiyo-destinos a{color:inherit;text-decoration:none}
  .ukiyo-destinos h1,
  .ukiyo-destinos h2,
  .ukiyo-destinos h3,
  .ukiyo-destinos h4{font-family:var(--font-display);font-weight:400;letter-spacing:-0.01em;line-height:1.1;margin:0}
  .ukiyo-destinos .container{max-width:1240px;margin:0 auto;padding:0 1.75rem}

  /* HERO */
  .ukiyo-destinos .hero{position:relative;min-height:88vh;display:flex;align-items:center;color:#fff;overflow:hidden;padding:7rem 0 5rem}
  .ukiyo-destinos .hero__bg{position:absolute;inset:0;z-index:0}
  .ukiyo-destinos .hero__bg img{width:100%;height:100%;object-fit:cover;transform:scale(1.02);animation:ukiyoDestZoom 16s ease-in-out infinite alternate}
  @keyframes ukiyoDestZoom{from{transform:scale(1.02)}to{transform:scale(1.08)}}
  .ukiyo-destinos .hero__bg::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg, rgba(0,0,0,.5) 0%, rgba(0,0,0,.2) 40%, rgba(0,0,0,.65) 100%)}
  .ukiyo-destinos .hero__inner{position:relative;z-index:1;width:100%;text-align:center}
  .ukiyo-destinos .breadcrumbs{display:flex;gap:.5rem;font-size:.85rem;opacity:.85;justify-content:center;margin-bottom:1.6rem;letter-spacing:.02em}
  .ukiyo-destinos .breadcrumbs span{opacity:.6}
  .ukiyo-destinos .eyebrow{display:inline-flex;align-items:center;gap:.6rem;padding:.45rem 1rem;border-radius:999px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.28);backdrop-filter:blur(8px);font-size:.78rem;letter-spacing:.16em;text-transform:uppercase}
  .ukiyo-destinos .eyebrow .dot{width:6px;height:6px;border-radius:50%;background:var(--accent-300)}
  .ukiyo-destinos .hero__title{font-size:clamp(2.8rem, 7vw, 6rem);font-weight:300;letter-spacing:-0.02em;line-height:.98;margin:1.5rem auto 1.4rem;max-width:22ch;text-shadow:0 2px 24px rgba(0,0,0,.3)}
  .ukiyo-destinos .hero__title em{font-style:italic;color:var(--accent-300);font-weight:400}
  .ukiyo-destinos .hero__sub{max-width:42rem;margin:0 auto;font-size:1.18rem;line-height:1.55;opacity:.95;text-shadow:0 2px 12px rgba(0,0,0,.4)}
  .ukiyo-destinos .hero__stats{display:flex;gap:3rem;justify-content:center;margin-top:3rem;flex-wrap:wrap}
  .ukiyo-destinos .hero__stat{text-align:center}
  .ukiyo-destinos .hero__stat .num{font-family:var(--font-display);font-size:2.6rem;font-weight:300;letter-spacing:-0.02em;line-height:1;color:#fff;display:block}
  .ukiyo-destinos .hero__stat .num em{font-style:italic;color:var(--accent-300)}
  .ukiyo-destinos .hero__stat .lbl{display:block;font-size:.72rem;letter-spacing:.18em;text-transform:uppercase;opacity:.8;margin-top:.4rem;font-family:var(--font-mono)}
  .ukiyo-destinos .hero__scroll{position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);z-index:1;display:flex;flex-direction:column;align-items:center;gap:.5rem;font-size:.72rem;letter-spacing:.3em;text-transform:uppercase;opacity:.8}
  .ukiyo-destinos .hero__scroll .line{width:1px;height:36px;background:#fff;animation:ukiyoDestPulse 2.4s ease-in-out infinite;transform-origin:top}
  @keyframes ukiyoDestPulse{0%,100%{transform:scaleY(.3);opacity:.4}50%{transform:scaleY(1);opacity:1}}

  /* SECTION SHELL */
  .ukiyo-destinos section.section{padding:var(--section-y) 0;position:relative}
  .ukiyo-destinos .sec-head{text-align:center;max-width:48rem;margin:0 auto 4rem}
  .ukiyo-destinos .sec-head__chip{display:inline-flex;align-items:center;gap:.5rem;padding:.4rem .9rem;border-radius:999px;font-family:var(--font-mono);font-size:.74rem;letter-spacing:.16em;text-transform:uppercase;font-weight:500;margin-bottom:1.2rem}
  .ukiyo-destinos .sec-head__chip--terra{background:var(--primary-50);color:var(--primary)}
  .ukiyo-destinos .sec-head__chip--sage{background:rgba(156,175,136,.16);color:var(--secondary-700)}
  .ukiyo-destinos .sec-head__chip--accent{background:var(--accent-50);color:#9C7B4A}
  .ukiyo-destinos .sec-head__chip .star{width:6px;height:6px;border-radius:50%;background:currentColor}
  .ukiyo-destinos .sec-head h2{font-size:clamp(2.2rem, 4vw, 3.4rem);font-weight:300;letter-spacing:-0.015em;line-height:1.05;margin-bottom:1.2rem}
  .ukiyo-destinos .sec-head h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-destinos .sec-head--sage h2 em{color:var(--secondary-700)}
  .ukiyo-destinos .sec-head__sub{color:var(--ink-soft);font-size:1.05rem;line-height:1.6}
  .ukiyo-destinos .sec-head__divider{width:60px;height:4px;border-radius:2px;background:var(--primary);margin:1.6rem auto 0}
  .ukiyo-destinos .sec-head--sage .sec-head__divider{background:var(--secondary-700)}
  .ukiyo-destinos .sec-head--accent .sec-head__divider{background:var(--accent)}

  /* MAP STRIP */
  .ukiyo-destinos .mapstrip{background:var(--paper);padding:2.4rem 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line)}
  .ukiyo-destinos .mapstrip__wrap{display:grid;grid-template-columns:auto 1fr;gap:3rem;align-items:center}
  .ukiyo-destinos .mapstrip__intro{max-width:18rem}
  .ukiyo-destinos .mapstrip__intro h3{font-size:1.3rem;font-weight:400;margin-bottom:.4rem;letter-spacing:-0.01em}
  .ukiyo-destinos .mapstrip__intro p{font-size:.88rem;color:var(--ink-soft);line-height:1.5;margin:0}
  .ukiyo-destinos .mapstrip__route{position:relative;height:170px}
  .ukiyo-destinos .mapstrip__route svg{position:absolute;inset:0;width:100%;height:100%;overflow:visible}
  .ukiyo-destinos .mapstrip__pin{position:absolute;transform:translate(-50%,-50%);text-align:center;cursor:pointer;transition:transform .3s ease}
  .ukiyo-destinos .mapstrip__pin:hover{transform:translate(-50%,-50%) scale(1.08);z-index:5}
  .ukiyo-destinos .mapstrip__pin .dot{width:18px;height:18px;border-radius:50%;background:var(--primary);border:3px solid #fff;box-shadow:0 4px 14px rgba(139,69,19,.4);margin:0 auto;position:relative}
  .ukiyo-destinos .mapstrip__pin.eu .dot{background:var(--secondary-700)}
  .ukiyo-destinos .mapstrip__pin .dot::before{content:"";position:absolute;inset:-6px;border-radius:50%;border:2px solid var(--primary);opacity:.3;animation:ukiyoDestPulseRing 2.5s ease-out infinite}
  .ukiyo-destinos .mapstrip__pin.eu .dot::before{border-color:var(--secondary-700)}
  @keyframes ukiyoDestPulseRing{0%{transform:scale(1);opacity:.5}100%{transform:scale(1.9);opacity:0}}
  .ukiyo-destinos .mapstrip__pin .name{display:block;font-family:var(--font-mono);font-size:.7rem;font-weight:600;color:var(--ink);margin-top:.4rem;letter-spacing:.06em;text-transform:uppercase;white-space:nowrap;background:#fff;padding:.2rem .5rem;border-radius:6px;border:1px solid var(--line)}
  @media (max-width:880px){
    .ukiyo-destinos .mapstrip__wrap{grid-template-columns:1fr;gap:1.5rem}
    .ukiyo-destinos .mapstrip__intro{max-width:none;text-align:center}
    .ukiyo-destinos .mapstrip__route{height:140px}
  }

  /* DESTINATION CARDS */
  .ukiyo-destinos .dest-grid{display:grid;grid-template-columns:repeat(4, 1fr);gap:1.4rem}
  .ukiyo-destinos .dest-grid.cols-1{grid-template-columns:minmax(0, 580px);justify-content:center}
  .ukiyo-destinos .dcard{position:relative;height:520px;border-radius:24px;overflow:hidden;display:block;color:#fff;background:#000;transition:transform .5s cubic-bezier(.4,0,.2,1), box-shadow .5s}
  .ukiyo-destinos .dcard:hover{transform:translateY(-10px);box-shadow:0 40px 60px -30px rgba(0,0,0,.45)}
  .ukiyo-destinos .dcard__img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:transform 1s cubic-bezier(.4,0,.2,1)}
  .ukiyo-destinos .dcard:hover .dcard__img{transform:scale(1.08)}
  .ukiyo-destinos .dcard::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg, rgba(0,0,0,.05) 0%, rgba(0,0,0,.35) 55%, rgba(0,0,0,.85) 100%);transition:background .5s}
  .ukiyo-destinos .dcard:hover::after{background:linear-gradient(180deg, rgba(0,0,0,.05) 0%, rgba(0,0,0,.45) 50%, rgba(0,0,0,.9) 100%)}
  .ukiyo-destinos .dcard__num{position:absolute;top:1.4rem;left:1.5rem;font-family:var(--font-mono);font-size:.78rem;letter-spacing:.18em;opacity:.8;z-index:2}
  .ukiyo-destinos .dcard__eu{position:absolute;top:1.3rem;right:1.3rem;background:rgba(255,255,255,.94);color:var(--primary-700);font-family:var(--font-mono);font-size:.66rem;letter-spacing:.14em;text-transform:uppercase;padding:.3rem .7rem;border-radius:999px;z-index:2;font-weight:600;display:inline-flex;align-items:center;gap:.35rem}
  .ukiyo-destinos .dcard__body{position:absolute;left:0;right:0;bottom:0;padding:1.8rem 1.8rem 1.9rem;text-align:center;z-index:2}
  .ukiyo-destinos .dcard__tag{display:inline-flex;align-items:center;gap:.45rem;color:var(--accent-300);font-family:var(--font-mono);font-size:.72rem;font-weight:600;letter-spacing:.16em;text-transform:uppercase;margin-bottom:.65rem}
  .ukiyo-destinos .dcard__tag svg{width:13px;height:13px}
  .ukiyo-destinos .dcard__title{font-size:2.1rem;font-weight:400;letter-spacing:-0.02em;line-height:1;margin-bottom:0;text-shadow:0 2px 14px rgba(0,0,0,.35);transition:margin-bottom .4s ease}
  .ukiyo-destinos .dcard:hover .dcard__title{margin-bottom:.9rem}
  .ukiyo-destinos .dcard__desc{max-height:0;opacity:0;overflow:hidden;font-size:.92rem;line-height:1.5;color:rgba(255,255,255,.92);transition:max-height .55s ease, opacity .4s ease .1s;max-width:24rem;margin:0 auto}
  .ukiyo-destinos .dcard:hover .dcard__desc{max-height:140px;opacity:1}
  .ukiyo-destinos .dcard__arrow{display:inline-grid;place-items:center;width:46px;height:46px;border-radius:50%;border:1.5px solid rgba(255,255,255,.5);color:#fff;margin-top:1.1rem;opacity:0;transform:translateY(8px);transition:opacity .4s ease .15s, transform .4s ease .15s, background .25s, border-color .25s}
  .ukiyo-destinos .dcard__arrow:hover{background:var(--accent);border-color:var(--accent)}
  .ukiyo-destinos .dcard:hover .dcard__arrow{opacity:1;transform:translateY(0)}
  .ukiyo-destinos .dcard__arrow svg{width:18px;height:18px}
  @media (max-width:980px){.ukiyo-destinos .dest-grid{grid-template-columns:repeat(2, 1fr)}}
  @media (max-width:600px){
    .ukiyo-destinos .dest-grid,
    .ukiyo-destinos .dest-grid.cols-1{grid-template-columns:1fr}
    .ukiyo-destinos .dcard{height:440px}
    .ukiyo-destinos .dcard__title{font-size:1.8rem}
    .ukiyo-destinos .dcard__desc{max-height:140px;opacity:1}
    .ukiyo-destinos .dcard__arrow{opacity:1;transform:translateY(0)}
  }

  /* SECTION VARIANTS */
  .ukiyo-destinos .dsec--inter{background:var(--bg)}
  .ukiyo-destinos .dsec--nac{background:linear-gradient(180deg, var(--surface) 0%, var(--paper) 100%)}
  .ukiyo-destinos .dsec--eu{background:var(--bg)}
  .ukiyo-destinos .dsec__more{text-align:center;margin-top:2.2rem}
  .ukiyo-destinos .dsec__more p{color:var(--ink-soft);font-size:.92rem;font-style:italic;margin:0}
  .ukiyo-destinos .dsec__more p a{color:var(--primary);font-weight:600;font-style:normal;border-bottom:1px solid var(--primary-300);padding-bottom:1px;transition:border-color .25s}
  .ukiyo-destinos .dsec__more p a:hover{border-color:var(--primary)}

  /* CTA */
  .ukiyo-destinos .ctafinal{background:linear-gradient(160deg, var(--paper) 0%, #FDF7F3 100%);position:relative;overflow:hidden}
  .ukiyo-destinos .ctafinal__box{max-width:760px;margin:0 auto;text-align:center;position:relative;z-index:1;padding:1rem 0}
  .ukiyo-destinos .ctafinal__stamp{display:inline-flex;align-items:center;gap:.6rem;font-family:var(--font-mono);font-size:.78rem;color:var(--primary);letter-spacing:.18em;text-transform:uppercase;margin-bottom:1.2rem}
  .ukiyo-destinos .ctafinal__stamp .dot{width:6px;height:6px;border-radius:50%;background:var(--primary)}
  .ukiyo-destinos .ctafinal h2{font-size:clamp(2.2rem, 4.5vw, 3.6rem);font-weight:300;letter-spacing:-0.02em;line-height:1.05;margin-bottom:1.2rem}
  .ukiyo-destinos .ctafinal h2 em{font-style:italic;color:var(--primary)}
  .ukiyo-destinos .ctafinal p{font-size:1.15rem;color:var(--ink-soft);margin-bottom:2.2rem;line-height:1.55;max-width:34rem;margin-left:auto;margin-right:auto}
  .ukiyo-destinos .ctafinal__buttons{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap}
  .ukiyo-destinos .ctafinal::before{content:"";position:absolute;top:-200px;right:-200px;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle, rgba(212,165,116,.25), transparent 70%);z-index:0}
  .ukiyo-destinos .ctafinal::after{content:"";position:absolute;bottom:-200px;left:-200px;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle, rgba(156,175,136,.18), transparent 70%);z-index:0}
  .ukiyo-destinos .btn{display:inline-flex;align-items:center;gap:.7rem;padding:1rem 1.6rem;border-radius:999px;font-weight:600;font-size:.95rem;transition:transform .25s, box-shadow .25s, background .25s;border:1.5px solid transparent}
  .ukiyo-destinos .btn:hover{transform:translateY(-2px)}
  .ukiyo-destinos .btn-primary{background:var(--primary);color:#fff;box-shadow:0 10px 30px -10px rgba(139,69,19,.5)}
  .ukiyo-destinos .btn-primary:hover{background:var(--primary-700);box-shadow:0 14px 40px -10px rgba(139,69,19,.6)}
  .ukiyo-destinos .btn-outline{border-color:var(--ink);color:var(--ink)}
  .ukiyo-destinos .btn-outline:hover{background:var(--ink);color:#fff}
  .ukiyo-destinos .btn img.wa-icon{width:24px;height:24px}
</style>

<?php
// Helper inline para renderizar un card de destino, evitando duplicación.
$render_dcard = function ( $d ) {
	$has_eu = ! empty( $d['eu'] );
	?>
	<a class="dcard" href="<?php echo esc_url( $d['url'] ); ?>">
		<?php if ( $has_eu ) : ?>
			<span class="dcard__eu">🇪🇺 Europa · 390 €</span>
		<?php endif; ?>
		<img class="dcard__img" src="<?php echo esc_url( $d['image'] ); ?>" alt="<?php echo esc_attr( $d['alt'] ); ?>" loading="lazy" decoding="async" />
		<span class="dcard__num"><?php echo esc_html( $d['num'] ); ?></span>
		<div class="dcard__body">
			<span class="dcard__tag">
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
				<?php echo esc_html( $d['tag'] ); ?>
			</span>
			<h3 class="dcard__title"><?php echo esc_html( $d['title'] ); ?></h3>
			<p class="dcard__desc"><?php echo esc_html( $d['desc'] ); ?></p>
			<span class="dcard__arrow">
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
			</span>
		</div>
	</a>
	<?php
};
?>

<div class="ukiyo-destinos">

  <!-- HERO -->
  <section class="hero">
    <div class="hero__bg">
      <img src="<?php echo esc_url( $hero_image ); ?>" alt="Destinos Ukiyo" loading="eager" fetchpriority="high" decoding="async" />
    </div>
    <div class="container hero__inner">
      <div class="breadcrumbs">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a><span>/</span><span>Destinos</span>
      </div>
      <span class="eyebrow"><span class="dot"></span>世界 · sekai · El mundo</span>
      <h1 class="hero__title">Destinos para el viaje<br/>de tu <em>vida.</em></h1>
      <p class="hero__sub">Descubre los destinos que ya conocemos profundamente, para poder organizarte un viaje de ensueño sin atajos, sin catálogos, sin sorpresas.</p>
      <div class="hero__stats">
        <?php foreach ( $stats as $s ) : ?>
          <div class="hero__stat">
            <span class="num"><em><?php echo esc_html( $s['num'] ); ?></em></span>
            <span class="lbl"><?php echo esc_html( $s['lbl'] ); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="hero__scroll"><span>Explora</span><div class="line"></div></div>
  </section>

  <!-- MAP STRIP -->
  <section class="mapstrip">
    <div class="container">
      <div class="mapstrip__wrap">
        <div class="mapstrip__intro">
          <h3>Por dónde nos movemos</h3>
          <p>Tres continentes, dos hemisferios, un mismo modo de viajar: pausado, curioso, sin postales.</p>
        </div>
        <div class="mapstrip__route">
          <svg viewBox="0 0 1000 170" preserveAspectRatio="none" aria-hidden="true">
            <path d="M 60 110 Q 200 30 360 90 T 720 80 T 940 100"
                  stroke="var(--primary)" stroke-width="1.6" stroke-dasharray="4 6" fill="none" opacity=".4" />
          </svg>
          <a class="mapstrip__pin" style="left:6%;top:62%" href="<?php echo esc_url( $dest_inter[1]['url'] ); ?>"><span class="dot"></span><span class="name">Costa Rica</span></a>
          <a class="mapstrip__pin" style="left:14%;top:48%" href="<?php echo esc_url( $dest_inter[2]['url'] ); ?>"><span class="dot"></span><span class="name">Colombia</span></a>
          <a class="mapstrip__pin" style="left:33%;top:42%" href="<?php echo esc_url( $dest_inter[3]['url'] ); ?>"><span class="dot"></span><span class="name">Marruecos</span></a>
          <a class="mapstrip__pin eu" style="left:39%;top:30%" href="<?php echo esc_url( $dest_eu[0]['url'] ); ?>"><span class="dot"></span><span class="name">Italia · 🇪🇺</span></a>
          <a class="mapstrip__pin eu" style="left:28%;top:54%" href="<?php echo esc_url( $dest_nac[0]['url'] ); ?>"><span class="dot"></span><span class="name">Lanzarote · 🇪🇺</span></a>
          <a class="mapstrip__pin" style="left:78%;top:64%" href="<?php echo esc_url( $dest_inter[0]['url'] ); ?>"><span class="dot"></span><span class="name">Indonesia</span></a>
        </div>
      </div>
    </div>
  </section>

  <!-- INTERNACIONALES -->
  <section class="section dsec--inter" id="internacionales">
    <div class="container">
      <div class="sec-head">
        <span class="sec-head__chip sec-head__chip--terra"><span class="star"></span>Aventura global</span>
        <h2>Destinos<br/><em>internacionales.</em></h2>
        <p class="sec-head__sub">Lugares que conocemos profundamente y que han marcado nuestra historia. Selecciona un destino para descubrir su esencia y ver una propuesta diseñada para conectar.</p>
        <div class="sec-head__divider"></div>
      </div>
      <div class="dest-grid">
        <?php foreach ( $dest_inter as $d ) $render_dcard( $d ); ?>
      </div>
    </div>
  </section>

  <!-- NACIONALES -->
  <section class="section dsec--nac" id="nacionales">
    <div class="container">
      <div class="sec-head sec-head--sage">
        <span class="sec-head__chip sec-head__chip--sage"><span class="star"></span>España · 390 € de diseño</span>
        <h2>Destinos<br/><em>nacionales.</em></h2>
        <p class="sec-head__sub">No hace falta cruzar el océano para vivir algo extraordinario. España esconde rincones que merecen ser descubiertos con otra mirada.</p>
        <div class="sec-head__divider"></div>
      </div>
      <div class="dest-grid cols-1">
        <?php foreach ( $dest_nac as $d ) $render_dcard( $d ); ?>
      </div>
      <div class="dsec__more">
        <p>Próximamente más destinos nacionales · ¿Tienes uno en mente? <a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener">Cuéntanoslo</a></p>
      </div>
    </div>
  </section>

  <!-- EUROPEOS -->
  <section class="section dsec--eu" id="europeos">
    <div class="container">
      <div class="sec-head">
        <span class="sec-head__chip sec-head__chip--accent"><span class="star"></span>Europa · 390 € de diseño</span>
        <h2>Destinos<br/><em>europeos.</em></h2>
        <p class="sec-head__sub">Europa vista desde otra perspectiva. Itinerarios diseñados para viajeros que buscan profundidad, no solo turismo de selfie.</p>
        <div class="sec-head__divider"></div>
      </div>
      <div class="dest-grid cols-1">
        <?php foreach ( $dest_eu as $d ) $render_dcard( $d ); ?>
      </div>
      <div class="dsec__more">
        <p>Nuevos destinos europeos en preparación · <a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener">Solicita información</a></p>
      </div>
    </div>
  </section>

  <!-- CTA FINAL -->
  <section class="section ctafinal" id="cta">
    <div class="container">
      <div class="ctafinal__box">
        <span class="ctafinal__stamp"><span class="dot"></span>道 · Empezamos juntos</span>
        <h2>¿No encuentras<br/><em>tu viaje ideal?</em></h2>
        <p>Cada persona viaja a su manera. Cuéntanos qué te mueve y crearemos juntos una experiencia que encaje contigo.</p>
        <div class="ctafinal__buttons">
          <a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener" class="btn btn-primary">
            <img class="wa-icon" width="24" height="24" src="<?php echo esc_url( $wa_icon ); ?>" alt="WhatsApp" />
            Cuéntanos tu idea
          </a>
          <a href="<?php echo esc_url( $pricing_url ); ?>" class="btn btn-outline">Ver precios del diseño
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

</div><!-- /.ukiyo-destinos -->

<?php get_footer(); ?>
