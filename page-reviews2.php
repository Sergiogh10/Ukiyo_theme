<?php
/**
 * Template Name: Reviews 2
 *
 * Implementación 1:1 del export "Reseñas.html" de Claude Design.
 *
 * Decisiones del cliente:
 *   - Header/footer del tema. Nav y footer del export omitidos.
 *   - CSS scoped a .ukiyo-rev2 para no contaminar otras plantillas.
 *   - Hero usa la imagen ya existente del .php anterior (no /assets/reviews/).
 *   - Las 6 reseñas se preservan tal cual: solo el TEXTO de cada review
 *     se mantiene literal del .php anterior. El resto de copy (hero, stats,
 *     trust strip, CTA) se toma íntegro del HTML del Designs.
 *   - WhatsApp en CTA usa el icono icons8 PNG, no el SVG circle verde del export.
 *   - Trust strip muestra plataformas de reseña con enlaces neutros (#) hasta
 *     que la marca decida los perfiles públicos definitivos.
 *
 * Nota técnica:
 *   - El export usa `.reveal { opacity:0 }` + IntersectionObserver para fade-in.
 *     Aquí dejamos las cosas visibles por defecto y añadimos el observer al final;
 *     si el JS no se ejecuta, el contenido se ve igualmente (no se queda en blanco).
 */
get_header();

$img              = get_template_directory_uri() . '/images';
$plan_trip_url    = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'plan_trip' ) : home_url( '/' );
$destinations_url = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destinations' ) : home_url( '/' );
$wa_url           = 'https://wa.me/message/CS2LNI6YHSETO1';
$wa_icon          = 'https://img.icons8.com/cotton/64/whatsapp--v4.png';
$hero_image       = $img . '/heroimages/viajes-autor-ukiyo-reviewfinal.webp';

// Reviews originales del .php anterior (mantenemos texto, nombre, fecha e imagen).
// Los campos `pin` y `dest_short` corresponden al diseño Claude (badge sobre la
// imagen + sub-línea narrativa bajo el nombre).
$reviews = [
	[
		'name'        => 'Carmen y Jose Ángel',
		'pin'         => 'Komodo, Indonesia',
		'dest_short'  => 'Komodo',
		'date'        => 'Septiembre 2025',
		'image'       => 'resena-carmen-jose-komodo-indonesia.webp',
		'review'      => 'Viajar a Indonesia con Ukiyo ha sido una aventura excepcional, un viaje personalizado al 100% donde hemos podido disfrutar de experiencias auténticas y humanas, sin el agobio del turismo masivo. El esfuerzo y el trabajo detrás de la organización ha hecho que nuestro viaje sea muy toppp. Muchas gracias equipo 🙌🏼 ¡Estamos deseando repetir!',
		'size'        => 'size-feature',
		'featured'    => true,
	],
	[
		'name'       => 'María y Edu',
		'pin'        => 'Java, Indonesia',
		'dest_short' => 'Isla de Java',
		'date'       => 'Julio 2025',
		'image'      => 'resena-maria-edu-java-indonesia.webp',
		'review'     => 'Gracias a Ukiyo no solo visitamos Indonesia, si no que la vivimos de verdad. Desde el primer día sentimos mucha tranquilidad ya que todo estaba perfectamente organizado y pudimos despreocuparnos y pensar solo en disfrutar. Cuidaron cada detalle y nos crearon un itinerario adaptado a lo que buscábamos, un viaje auténtico, con alma, lejos de lo típico y de los que te dejan huella. Sin duda lo fue y al recordarlo seguimos emocionándonos. Estamos deseando repetir con ellos en nuestro próximo destino!',
		'size'       => 'size-tall',
	],
	[
		'name'       => 'Maite y Ramón',
		'pin'        => 'Bali, Indonesia',
		'dest_short' => 'Viaje de novios · Bali',
		'date'       => 'Septiembre 2024',
		'image'      => 'resena-maite-ramon-bali-indonesia-2.webp',
		'review'     => 'Experiencia y plan de viaje con Ukiyo 200% recomendable. Fuimos de viaje de novios a Bali y la verdad es que no pudo ser mejor, no solo por el destino en sí que ofrece de todo (cultura, playas, paisajes preciosos y todo tipo de actividades), también gracias a Sergio que nos guió el viaje y nos lo cuadró todo perfectamente, además da consejos y recomendaciones que no lo suelen hacer las agencias habitualmente. Lo recomendaría una y mil veces, profesional como la copa de un pino!',
		'size'       => 'size-tall',
	],
	[
		'name'       => 'Carolina y Carmen',
		'pin'        => 'Cuba',
		'dest_short' => 'Cuba',
		'date'       => 'Julio 2024',
		'image'      => 'resena-carolina-carmen-cuba.webp',
		'review'     => 'Lo mejor de Cuba es su gente. La calidez, las risas, las historias compartidas sin prisa… cada conversación parecía un pequeño tesoro. Pasar una tarde aprendiendo a bailar son con una familia local fue uno de esos momentos que te reconcilian con la vida. Regresé con el corazón lleno y la sensación de haber viajado no solo a un lugar, sino a una manera distinta de vivir.',
		'size'       => 'size-tall',
	],
	[
		'name'       => 'Berta y Rubén',
		'pin'        => 'Marruecos',
		'dest_short' => 'Marruecos',
		'date'       => 'Febrero 2024',
		'image'      => 'resena-berta-ruben-marruecos.webp',
		'review'     => 'Viajar a Marruecos fue como abrir una puerta a otro mundo, pero la noche en el desierto fue directamente magia. Cruzar las dunas en dromedario al atardecer, ver cómo el cielo se tiñe de naranja y escuchar solo el silencio fue una sensación que nunca olvidaré.',
		'size'       => 'size-tall',
	],
];

$star_svg   = '<svg viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.562-.954L10 0l2.948 5.956 6.562.954-4.755 4.635 1.123 6.545z"/></svg>';
$stars_html = str_repeat( $star_svg, 5 );
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap">

<style>
  .ukiyo-rev2{
    --primary:#8B4513; --primary-50:#FDF7F3; --primary-100:#F9E8D9; --primary-300:#E8B48D; --primary-700:#6B3410;
    --secondary:#9CAF88; --secondary-50:#F4F6F0; --secondary-100:#E6ECDD;
    --secondary-300:#B9C9A4; --secondary-700:#5E6952; --secondary-900:#3F4836;
    --accent:#D4A574; --accent-300:#EBD2AE; --accent-50:#FDF9F4;
    --bg:#FEFCF8; --surface:#F5F2ED; --paper:#F8F2E7;
    --ink:#2C2C2C; --ink-soft:#6B6B6B; --line:#E8E0D2;
    --font-sans:'Satoshi','Inter',system-ui,sans-serif;
    --font-display:'Rowdies',serif;
    --font-mono:'DM Mono',ui-monospace,monospace;
    --maxw:1240px; --section-y:6.5rem; --radius:18px;
    background:var(--bg); color:var(--ink); font-family:var(--font-sans);
    font-weight:400; font-size:17px; line-height:1.6;
    -webkit-font-smoothing:antialiased;
  }
  .ukiyo-rev2 *{box-sizing:border-box}
  .ukiyo-rev2 img{max-width:100%;display:block}
  .ukiyo-rev2 a{color:inherit;text-decoration:none}
  .ukiyo-rev2 h1,.ukiyo-rev2 h2,.ukiyo-rev2 h3,.ukiyo-rev2 h4{font-family:var(--font-display);font-weight:400;letter-spacing:-0.01em;line-height:1.1;margin:0}
  .ukiyo-rev2 .container{max-width:var(--maxw);margin:0 auto;padding:0 1.75rem}

  /* Botones */
  .ukiyo-rev2 .btn{display:inline-flex;align-items:center;gap:.7rem;padding:1rem 1.6rem;border-radius:999px;font-weight:600;font-size:.95rem;transition:transform .25s,box-shadow .25s,background .25s,color .25s;border:1.5px solid transparent;cursor:pointer}
  .ukiyo-rev2 .btn:hover{transform:translateY(-2px)}
  .ukiyo-rev2 .btn-sage{background:var(--secondary-700);color:#fff;box-shadow:0 10px 30px -10px rgba(94,105,82,.45)}
  .ukiyo-rev2 .btn-sage:hover{background:var(--secondary-900)}
  .ukiyo-rev2 .btn-outline{border-color:rgba(255,255,255,.4);color:#fff}
  .ukiyo-rev2 .btn-outline:hover{background:#fff;color:var(--secondary-900)}
  .ukiyo-rev2 .btn img.wa-icon{width:24px;height:24px}

  /* HERO */
  .ukiyo-rev2 .hero{position:relative;min-height:88vh;display:flex;align-items:center;color:#fff;overflow:hidden;padding:8rem 0;text-align:center}
  .ukiyo-rev2 .hero__bg{position:absolute;inset:0;z-index:0}
  .ukiyo-rev2 .hero__bg img{width:100%;height:100%;object-fit:cover;transform:scale(1.02);animation:ukiyoRev2Zoom 20s ease-in-out infinite alternate}
  @keyframes ukiyoRev2Zoom{from{transform:scale(1.02)}to{transform:scale(1.1)}}
  .ukiyo-rev2 .hero__bg::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(20,28,18,.55) 0%,rgba(20,28,18,.25) 40%,rgba(20,28,18,.78) 100%)}
  .ukiyo-rev2 .hero__inner{position:relative;z-index:1;width:100%}
  .ukiyo-rev2 .breadcrumbs{display:flex;gap:.5rem;font-size:.85rem;opacity:.85;justify-content:center;margin-bottom:1.6rem;letter-spacing:.02em}
  .ukiyo-rev2 .breadcrumbs span{opacity:.6}
  .ukiyo-rev2 .eyebrow{display:inline-flex;align-items:center;gap:.6rem;padding:.45rem 1rem;border-radius:999px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.28);backdrop-filter:blur(8px);font-size:.78rem;letter-spacing:.16em;text-transform:uppercase}
  .ukiyo-rev2 .eyebrow .dot{width:6px;height:6px;border-radius:50%;background:var(--accent-300)}
  .ukiyo-rev2 .hero__title{font-size:clamp(2.8rem,7.6vw,6.8rem);font-weight:300;letter-spacing:-0.02em;line-height:.98;margin:1.6rem auto 1.4rem;max-width:17ch;text-shadow:0 2px 24px rgba(0,0,0,.3)}
  .ukiyo-rev2 .hero__title em{font-style:italic;color:var(--accent-300);font-weight:400}
  .ukiyo-rev2 .hero__sub{max-width:42rem;margin:0 auto;font-size:1.15rem;line-height:1.55;opacity:.94;text-shadow:0 2px 12px rgba(0,0,0,.4)}

  /* STATS */
  .ukiyo-rev2 .stats{position:relative;margin-top:-5rem;z-index:3}
  .ukiyo-rev2 .stats__inner{background:#fff;border-radius:24px;box-shadow:0 30px 80px -30px rgba(20,28,18,.32),0 0 0 1px var(--line);padding:1.8rem 2rem;display:grid;grid-template-columns:repeat(4,1fr);align-items:stretch}
  .ukiyo-rev2 .stat{display:flex;flex-direction:column;align-items:center;text-align:center;padding:.4rem 1.2rem;position:relative;min-height:90px;justify-content:center;gap:.3rem}
  .ukiyo-rev2 .stat:not(:last-child)::after{content:"";position:absolute;right:0;top:18%;height:64%;width:1px;background:var(--line)}
  .ukiyo-rev2 .stat__val{font-family:var(--font-display);font-size:2.4rem;font-weight:300;color:var(--ink);letter-spacing:-0.02em;line-height:1;display:inline-flex;align-items:baseline;gap:.2rem}
  .ukiyo-rev2 .stat__val em{font-style:italic;color:var(--secondary-700);font-weight:300}
  .ukiyo-rev2 .stat__val .star{width:22px;height:22px;color:var(--accent);flex-shrink:0;align-self:center}
  .ukiyo-rev2 .stat__lbl{font-family:var(--font-mono);font-size:.7rem;color:var(--ink-soft);letter-spacing:.16em;text-transform:uppercase}
  @media (max-width:880px){
    .ukiyo-rev2 .stats__inner{grid-template-columns:repeat(2,1fr);padding:1.2rem .8rem}
    .ukiyo-rev2 .stat:nth-child(-n+2)::after,.ukiyo-rev2 .stat:nth-child(odd)::after{display:none}
  }

  /* SECTION HEAD */
  .ukiyo-rev2 section.section{padding:var(--section-y) 0;position:relative}
  .ukiyo-rev2 .sec-head{text-align:center;max-width:48rem;margin:0 auto 4rem}
  .ukiyo-rev2 .sec-head__chip{display:inline-flex;align-items:center;gap:.5rem;padding:.4rem .9rem;border-radius:999px;font-family:var(--font-mono);font-size:.74rem;letter-spacing:.16em;text-transform:uppercase;font-weight:500;margin-bottom:1.2rem;background:var(--accent-50);color:#9C7B4A}
  .ukiyo-rev2 .sec-head__chip .star{width:6px;height:6px;border-radius:50%;background:currentColor}
  .ukiyo-rev2 .sec-head h2{font-size:clamp(2.2rem,4.2vw,3.6rem);font-weight:300;letter-spacing:-0.015em;line-height:1.05;margin-bottom:1.2rem}
  .ukiyo-rev2 .sec-head h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-rev2 .sec-head__sub{color:var(--ink-soft);font-size:1.05rem;line-height:1.6}
  .ukiyo-rev2 .sec-head__divider{width:60px;height:4px;border-radius:2px;background:var(--accent);margin:1.6rem auto 0}

  /* REVIEWS GRID (bento) */
  .ukiyo-rev2 .reviews{background:var(--bg)}
  .ukiyo-rev2 .reviews__grid{display:grid;grid-template-columns:repeat(6,1fr);gap:1.6rem}
  .ukiyo-rev2 .rcard{background:#fff;border:1px solid var(--line);border-radius:22px;overflow:hidden;display:flex;flex-direction:column;transition:transform .45s cubic-bezier(.4,0,.2,1),box-shadow .45s,border-color .45s;position:relative}
  .ukiyo-rev2 .rcard:hover{transform:translateY(-6px);box-shadow:0 32px 60px -30px rgba(20,28,18,.25);border-color:var(--accent-300)}
  .ukiyo-rev2 .rcard__media{position:relative;overflow:hidden;background:var(--secondary-100);aspect-ratio:4/5}
  .ukiyo-rev2 .rcard__media img{width:100%;height:100%;object-fit:cover;transition:transform 1.2s cubic-bezier(.4,0,.2,1)}
  .ukiyo-rev2 .rcard:hover .rcard__media img{transform:scale(1.06)}
  .ukiyo-rev2 .rcard__pin{position:absolute;top:1rem;left:1rem;display:inline-flex;align-items:center;gap:.4rem;background:rgba(255,255,255,.94);color:var(--secondary-900);font-family:var(--font-mono);font-size:.65rem;letter-spacing:.14em;text-transform:uppercase;padding:.35rem .75rem;border-radius:999px;z-index:2;font-weight:600;backdrop-filter:blur(6px)}
  .ukiyo-rev2 .rcard__pin svg{width:11px;height:11px;color:var(--primary)}
  .ukiyo-rev2 .rcard__date{position:absolute;bottom:1rem;right:1rem;background:rgba(0,0,0,.5);color:#fff;font-family:var(--font-mono);font-size:.65rem;letter-spacing:.12em;padding:.35rem .7rem;border-radius:999px;backdrop-filter:blur(6px);z-index:2}
  .ukiyo-rev2 .rcard__body{padding:1.8rem;display:flex;flex-direction:column;gap:1rem;flex:1}
  .ukiyo-rev2 .rcard__head{display:flex;justify-content:space-between;align-items:flex-start;gap:1rem}
  .ukiyo-rev2 .rcard__name{font-family:var(--font-display);font-weight:400;font-size:1.4rem;letter-spacing:-0.01em;color:var(--ink);line-height:1.15;margin:0 0 .15rem}
  .ukiyo-rev2 .rcard__dest{font-family:var(--font-sans);font-size:.85rem;color:var(--ink-soft);font-style:italic;display:flex;align-items:center;gap:.4rem}
  .ukiyo-rev2 .rcard__dest svg{width:11px;height:11px;color:var(--accent);flex-shrink:0}
  .ukiyo-rev2 .rcard__stars{display:inline-flex;gap:.15rem;color:var(--accent);flex-shrink:0}
  .ukiyo-rev2 .rcard__stars svg{width:15px;height:15px;fill:currentColor}
  .ukiyo-rev2 .rcard__quote{position:absolute;top:1.5rem;right:1.8rem;font-family:var(--font-display);font-size:4rem;line-height:1;color:var(--accent-50);font-weight:700;pointer-events:none;z-index:0}
  .ukiyo-rev2 .rcard__text{color:var(--ink-soft);font-size:.95rem;line-height:1.65;margin:0;position:relative;z-index:1}
  .ukiyo-rev2 .rcard__text::before{content:"\201C";font-family:var(--font-display);color:var(--accent);font-size:1.2rem;font-weight:700;margin-right:.15rem;line-height:0}

  .ukiyo-rev2 .rcard.size-feature{grid-column:span 4;flex-direction:row}
  .ukiyo-rev2 .rcard.size-feature .rcard__media{aspect-ratio:auto;width:48%;flex-shrink:0;min-height:480px;background:var(--secondary-100)}
  .ukiyo-rev2 .rcard.size-feature .rcard__media img{object-fit:cover;object-position:center}
  .ukiyo-rev2 .rcard.size-feature .rcard__body{padding:2.4rem 2.4rem 2.4rem 2.2rem;gap:1.2rem}
  .ukiyo-rev2 .rcard.size-feature .rcard__name{font-size:1.9rem}
  .ukiyo-rev2 .rcard.size-feature .rcard__text{font-size:1.02rem;line-height:1.7}
  .ukiyo-rev2 .rcard.size-feature .rcard__quote{font-size:5.5rem;top:2rem;right:2.4rem}
  .ukiyo-rev2 .rcard__featured-chip{display:inline-flex;align-items:center;gap:.4rem;padding:.35rem .8rem;border-radius:999px;font-family:var(--font-mono);font-size:.66rem;letter-spacing:.16em;text-transform:uppercase;font-weight:600;background:var(--primary);color:#fff;align-self:flex-start;margin-bottom:.2rem}
  .ukiyo-rev2 .rcard__featured-chip .dot{width:6px;height:6px;border-radius:50%;background:var(--accent-300)}
  .ukiyo-rev2 .rcard.size-tall{grid-column:span 2}

  @media (max-width:1080px){
    .ukiyo-rev2 .reviews__grid{grid-template-columns:repeat(4,1fr)}
    .ukiyo-rev2 .rcard.size-feature{grid-column:span 4;flex-direction:column}
    .ukiyo-rev2 .rcard.size-feature .rcard__media{width:100%;aspect-ratio:16/9;min-height:auto}
    .ukiyo-rev2 .rcard.size-tall{grid-column:span 2}
  }
  @media (max-width:680px){
    .ukiyo-rev2 .reviews__grid{grid-template-columns:1fr;gap:1.2rem}
    .ukiyo-rev2 .rcard.size-feature,.ukiyo-rev2 .rcard.size-tall{grid-column:span 1}
    .ukiyo-rev2 .rcard.size-feature .rcard__body{padding:1.8rem}
    .ukiyo-rev2 .rcard.size-feature .rcard__name{font-size:1.5rem}
    .ukiyo-rev2 .rcard.size-feature .rcard__text{font-size:.95rem}
  }

  /* TRUST */
  .ukiyo-rev2 .trust{padding:5rem 0;background:var(--paper);border-top:1px solid var(--line);border-bottom:1px solid var(--line);position:relative;overflow:hidden}
  .ukiyo-rev2 .trust__inner{display:grid;grid-template-columns:auto 1fr;gap:3.5rem;align-items:center}
  .ukiyo-rev2 .trust__lbl{font-family:var(--font-mono);font-size:.74rem;color:var(--ink-soft);letter-spacing:.18em;text-transform:uppercase;line-height:1.5;max-width:14rem}
  .ukiyo-rev2 .trust__lbl strong{display:block;font-family:var(--font-display);font-size:1.3rem;font-weight:400;color:var(--ink);letter-spacing:-0.01em;text-transform:none;margin-bottom:.4rem;line-height:1.15}
  .ukiyo-rev2 .trust__lbl em{font-style:italic;color:var(--secondary-700);font-family:var(--font-display)}
  .ukiyo-rev2 .trust__platforms{display:flex;flex-wrap:wrap;gap:1.4rem;justify-content:flex-end}
  .ukiyo-rev2 .platform{display:flex;align-items:center;gap:1rem;padding:1.2rem 1.5rem;background:#fff;border:1px solid var(--line);border-radius:18px;transition:transform .3s ease,border-color .3s,box-shadow .3s;min-width:200px}
  .ukiyo-rev2 .platform:hover{transform:translateY(-3px);border-color:var(--accent-300);box-shadow:0 18px 36px -22px rgba(20,28,18,.2)}
  .ukiyo-rev2 .platform__icon{width:42px;height:42px;border-radius:12px;display:grid;place-items:center;flex-shrink:0;font-weight:700;font-family:var(--font-display);color:#fff;font-size:1.1rem}
  .ukiyo-rev2 .platform__icon.google{background:linear-gradient(135deg,#4285F4 0%,#34A853 100%)}
  .ukiyo-rev2 .platform__icon.trustpilot{background:#00B67A}
  .ukiyo-rev2 .platform__icon.tripadvisor{background:#34E0A1;color:#1a1a1a}
  .ukiyo-rev2 .platform__icon svg{width:22px;height:22px}
  .ukiyo-rev2 .platform__meta{display:flex;flex-direction:column;line-height:1.2}
  .ukiyo-rev2 .platform__name{font-family:var(--font-mono);font-size:.66rem;color:var(--ink-soft);letter-spacing:.14em;text-transform:uppercase;margin-bottom:.3rem}
  .ukiyo-rev2 .platform__score{display:flex;align-items:center;gap:.4rem;font-family:var(--font-display);font-size:1.1rem;color:var(--ink);font-weight:400;letter-spacing:-0.01em}
  .ukiyo-rev2 .platform__score .stars{display:inline-flex;gap:1px;color:var(--accent)}
  .ukiyo-rev2 .platform__score .stars svg{width:13px;height:13px;fill:currentColor}
  @media (max-width:880px){
    .ukiyo-rev2 .trust__inner{grid-template-columns:1fr;text-align:center;gap:1.6rem}
    .ukiyo-rev2 .trust__lbl{max-width:none}
    .ukiyo-rev2 .trust__platforms{justify-content:center}
  }

  /* CTA */
  .ukiyo-rev2 .ctafinal{background:linear-gradient(160deg,#1F2A18 0%,#2A3622 60%,#1F2A18 100%);position:relative;overflow:hidden;color:#fff}
  .ukiyo-rev2 .ctafinal__bg{position:absolute;inset:0;background-size:cover;background-position:center;opacity:.18;z-index:0;filter:saturate(1.1)}
  .ukiyo-rev2 .ctafinal::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(31,42,24,.6) 0%,rgba(31,42,24,.92) 100%);z-index:0}
  .ukiyo-rev2 .ctafinal__box{max-width:760px;margin:0 auto;text-align:center;position:relative;z-index:1;padding:1rem 0}
  .ukiyo-rev2 .ctafinal__stamp{display:inline-flex;align-items:center;gap:.6rem;font-family:var(--font-mono);font-size:.78rem;color:var(--secondary-300);letter-spacing:.18em;text-transform:uppercase;margin-bottom:1.2rem}
  .ukiyo-rev2 .ctafinal__stamp .dot{width:6px;height:6px;border-radius:50%;background:var(--secondary-300)}
  .ukiyo-rev2 .ctafinal h2{font-size:clamp(2.4rem,5vw,4rem);font-weight:300;letter-spacing:-0.02em;line-height:1.02;margin-bottom:1.4rem;color:#fff}
  .ukiyo-rev2 .ctafinal h2 em{font-style:italic;color:var(--secondary-300)}
  .ukiyo-rev2 .ctafinal p{font-size:1.18rem;color:rgba(255,255,255,.85);margin-bottom:2.4rem;line-height:1.55;max-width:38rem;margin-left:auto;margin-right:auto}
  .ukiyo-rev2 .ctafinal__buttons{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap}

  /* REVEAL — visible por defecto (sin JS también se ve).
     El IntersectionObserver del final solo añade un fade-in suave si está disponible. */
  .ukiyo-rev2 .reveal{opacity:1;transform:none}
  .ukiyo-rev2 .reveal.js-reveal{opacity:0;transform:translateY(28px);transition:opacity .85s ease,transform .85s ease;will-change:opacity,transform}
  .ukiyo-rev2 .reveal.js-reveal.is-visible{opacity:1;transform:translateY(0)}
  @media (prefers-reduced-motion:reduce){
    .ukiyo-rev2 .reveal,.ukiyo-rev2 .reveal.js-reveal{opacity:1;transform:none;transition:none}
    .ukiyo-rev2 .hero__bg img{animation:none}
  }
</style>

<div class="ukiyo-rev2">

  <!-- HERO -->
  <section class="hero">
    <div class="hero__bg"><img src="<?php echo esc_url( $hero_image ); ?>" alt="Viajeros Ukiyo" loading="eager" fetchpriority="high" decoding="async" /></div>
    <div class="container hero__inner">
      <div class="breadcrumbs">
        <a href="<?php echo esc_url( home_url('/') ); ?>">Inicio</a><span>/</span><span>Reseñas</span>
      </div>
      <span class="eyebrow"><span class="dot"></span>Reviews · Historias reales</span>
      <h1 class="hero__title">Historias de nuestros <em>viajeros.</em></h1>
      <p class="hero__sub">Opiniones reales de quienes confiaron en Ukiyo. Experiencias auténticas, sostenibles y diseñadas a medida — contadas por quienes las vivieron.</p>
    </div>
  </section>

  <!-- STATS STRIP -->
  <section class="stats">
    <div class="container">
      <div class="stats__inner reveal">
        <div class="stat">
          <span class="stat__val">4.9<svg class="star" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></span>
          <span class="stat__lbl">Valoración media</span>
        </div>
        <div class="stat">
          <span class="stat__val"><em>+250</em></span>
          <span class="stat__lbl">Viajeros felices</span>
        </div>
        <div class="stat">
          <span class="stat__val">98<span style="font-size:1.6rem;color:var(--ink-soft);font-weight:400">%</span></span>
          <span class="stat__lbl">Repetiría con nosotros</span>
        </div>
        <div class="stat">
          <span class="stat__val">12</span>
          <span class="stat__lbl">Países diseñados</span>
        </div>
      </div>
    </div>
  </section>

  <!-- REVIEWS GRID -->
  <section class="section reviews">
    <div class="container">

      <div class="sec-head reveal">
        <span class="sec-head__chip"><span class="star"></span>Recuerdos únicos</span>
        <h2>Lo que <em>cuentan</em><br/>quienes ya viajaron.</h2>
        <p class="sec-head__sub">Cada historia es distinta — coinciden en una cosa: el viaje no terminó al volver a casa.</p>
        <div class="sec-head__divider"></div>
      </div>

      <div class="reviews__grid">
        <?php foreach ( $reviews as $r ) :
          $r       = wp_parse_args( $r, [
            'name' => '', 'pin' => '', 'dest_short' => '', 'date' => '',
            'image' => '', 'review' => '', 'size' => 'size-tall', 'featured' => false,
          ] );
          $img_url = $img . '/reviews/' . $r['image'];
          $alt     = $r['name'] . ' - ' . $r['pin'] . ' | Viaje personalizado con Ukiyo';
        ?>
        <article class="rcard <?php echo esc_attr( $r['size'] ); ?> reveal">
          <div class="rcard__media">
            <span class="rcard__pin">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
              <?php echo esc_html( $r['pin'] ); ?>
            </span>
            <span class="rcard__date"><?php echo esc_html( $r['date'] ); ?></span>
            <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" loading="lazy" decoding="async" />
          </div>
          <div class="rcard__body">
            <?php if ( $r['featured'] ) : ?>
              <span class="rcard__featured-chip"><span class="dot"></span>Reseña destacada</span>
            <?php endif; ?>
            <span class="rcard__quote" aria-hidden="true">"</span>
            <header class="rcard__head">
              <div>
                <h3 class="rcard__name"><?php echo esc_html( $r['name'] ); ?></h3>
                <span class="rcard__dest">
                  <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="5"/></svg>
                  <?php echo esc_html( $r['dest_short'] ); ?>
                </span>
              </div>
              <div class="rcard__stars" aria-label="5 de 5">
                <?php echo $stars_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              </div>
            </header>
            <p class="rcard__text"><?php echo esc_html( $r['review'] ); ?></p>
          </div>
        </article>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- TRUST STRIP -->
  <section class="trust">
    <div class="container">
      <div class="trust__inner reveal">
        <div class="trust__lbl">
          <strong>También nos <em>encuentras</em> aquí</strong>
          Reseñas verificadas en plataformas independientes
        </div>
        <div class="trust__platforms">
          <a class="platform" href="https://www.google.com/search?kgmid=/g/11n9t8jq8f&hl=es-ES&q=Viajes+Ukiyo&shem=rimspwouoe&shndl=30&source=sh/x/loc/osrp/m5/1&kgs=ba0c1b84cceb4c8a&utm_source=rimspwouoe,sh/x/loc/osrp/m5/1" target="_blank" rel="noopener" aria-label="Reseñas en Google">
            <span class="platform__icon google">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M21.35 11.1H12v2.8h5.35c-.23 1.46-1.7 4.28-5.35 4.28-3.22 0-5.85-2.67-5.85-5.95s2.63-5.95 5.85-5.95c1.83 0 3.06.78 3.76 1.45l2.57-2.47C16.7 3.78 14.6 3 12 3 6.99 3 3 6.99 3 12s3.99 9 9 9c5.2 0 8.65-3.65 8.65-8.79 0-.59-.07-1.04-.15-1.51Z"/></svg>
            </span>
            <div class="platform__meta">
              <span class="platform__name">Google Reviews</span>
              <span class="platform__score">5.0<span class="stars"><?php echo $stars_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></span>
            </div>
          </a>
          <a class="platform" href="https://es.trustpilot.com/review/viajesukiyo.com" target="_blank" rel="noopener" aria-label="Reseñas en Trustpilot">
            <span class="platform__icon trustpilot">
              <svg viewBox="0 0 20 20" fill="currentColor"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.562-.954L10 0l2.948 5.956 6.562.954-4.755 4.635 1.123 6.545z"/></svg>
            </span>
            <div class="platform__meta">
              <span class="platform__name">Trustpilot</span>
              <span class="platform__score">5.0<span class="stars"><?php echo $stars_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></span>
            </div>
          </a>
          <a class="platform" href="https://www.tripadvisor.es/Attraction_Review-g187514-d34178062-Reviews-Viajes_UKIYO-Madrid.html" target="_blank" rel="noopener" aria-label="Reseñas en Tripadvisor">
            <span class="platform__icon tripadvisor">
              <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="3"/><circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="2"/></svg>
            </span>
            <div class="platform__meta">
              <span class="platform__name">Tripadvisor</span>
              <span class="platform__score">5.0<span class="stars"><?php echo $stars_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span></span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA FINAL -->
  <section class="section ctafinal" id="cta">
    <div class="ctafinal__bg" style="background-image:url('<?php echo esc_url( $img . '/reviews/resena-maria-edu-java-indonesia.webp' ); ?>');"></div>
    <div class="container">
      <div class="ctafinal__box reveal">
        <span class="ctafinal__stamp"><span class="dot"></span>道 · Empezamos juntos</span>
        <h2>Tu aventura<br/>empieza <em>aquí.</em></h2>
        <p>Todo gran viaje nace de una idea, una emoción o una simple curiosidad. Cuéntanos qué te mueve y diseñaremos una experiencia que te haga sentir el mundo de verdad.</p>
        <div class="ctafinal__buttons">
          <a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener" class="btn btn-sage">
            <img class="wa-icon" width="24" height="24" src="<?php echo esc_url( $wa_icon ); ?>" alt="WhatsApp" />
            Hablemos de tu viaje
          </a>
          <a href="<?php echo esc_url( $destinations_url ); ?>" class="btn btn-outline">Diseñar tu aventura
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

</div><!-- /.ukiyo-rev2 -->

<script>
(function(){
  // Fade-in opcional. Las cosas ya están visibles por defecto; este observer
  // sólo añade un toque de animación cuando entran en el viewport.
  if (!('IntersectionObserver' in window)) return;
  document.addEventListener('DOMContentLoaded', function () {
    var els = document.querySelectorAll('.ukiyo-rev2 .reveal');
    els.forEach(function(el){ el.classList.add('js-reveal'); });
    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if (e.isIntersecting) { e.target.classList.add('is-visible'); io.unobserve(e.target); }
      });
    }, { threshold: .12 });
    els.forEach(function(el){ io.observe(el); });
  });
})();
</script>

<?php get_footer(); ?>
