<?php
/**
 * Template Name: Pricing
 *
 * Implementación del export "Precios.html" de Claude Design (Junio 2026).
 *
 * Decisiones:
 *   - Header/footer del tema (get_header / get_footer). Nav y footer del export omitidos.
 *   - Panel "Tweaks" (sandbox de diseño) eliminado: no debe llegar a producción.
 *   - Imágenes del banco /images/ del tema (no /assets/precios/, que era el bundle del export).
 *   - Precios oficiales: 590 € Esencial · 990 € Firma · 1.390 € Premium · 390 € Europa
 *   - Selectores body[data-*] del export reescritos a .ukiyo-precios[data-*] para no
 *     contaminar el resto del sitio.
 *   - Fuentes Rowdies + Satoshi + DM Mono cargadas en el propio template.
 */
get_header();
$img           = get_template_directory_uri() . '/images';
$plan_trip_url = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'plan_trip' ) : '#cta';
$calendly_full = 'https://calendly.com/viajesukiyo-info/el-viaje-de-tu-vida';

// Imágenes del banco del tema mapeadas semánticamente. Si en el futuro
// quieres cambiar la imagen de un plan, basta con tocar esta tabla.
$pricing_imgs = [
	'hero'          => $img . '/heroimages/viajes-personalizados-ukiyo-indonesia.webp',
	'plan_esencial' => $img . '/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.webp',
	'plan_firma'    => $img . '/indonesia/viajes-a-indonesia-personalizados-bali.webp',
	'plan_premium'  => $img . '/indonesia/viajes-a-indonesia-personalizados-raja-ampat.webp',
	'ex_indonesia'  => $img . '/indonesia/viajes-a-indonesia-personalizados-nusa-penida.webp',
	'ex_costarica'  => $img . '/costarica/viajes-costa-rica-hero.webp',
	'ex_marruecos'  => $img . '/marruecos/viajes-personalizados-ukiyo-marruecos-merzouga.webp',
];
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap">

<style>
  .ukiyo-precios{
    --primary:#8B4513;
    --primary-50:#FDF7F3;
    --primary-100:#F9E8D9;
    --primary-300:#E8B48D;
    --primary-700:#6B3410;
    --secondary:#9CAF88;
    --secondary-700:#5E6952;
    --accent:#D4A574;
    --accent-300:#EBD2AE;
    --accent-50:#FDF9F4;
    --bg:#FEFCF8;
    --surface:#F5F2ED;
    --paper:#F8F2E7;
    --ink:#2C2C2C;
    --ink-soft:#6B6B6B;
    --line:#E8E0D2;

    --font-sans:'Satoshi','Inter',system-ui,sans-serif;
    --font-display:'Rowdies',serif;
    --font-mono:'DM Mono',ui-monospace,monospace;

    --maxw:1240px;
    --section-y:7rem;
    --radius:18px;

    background:var(--bg);
    color:var(--ink);
    font-family:var(--font-sans);
    font-weight:400;
    font-size:17px;
    line-height:1.6;
    -webkit-font-smoothing:antialiased;
    text-rendering:optimizeLegibility;
  }
  .ukiyo-precios *{box-sizing:border-box}
  .ukiyo-precios img{max-width:100%;display:block}
  .ukiyo-precios a{color:inherit;text-decoration:none}
  .ukiyo-precios button{font-family:inherit;cursor:pointer;border:none;background:none}
  .ukiyo-precios h1,
  .ukiyo-precios h2,
  .ukiyo-precios h3,
  .ukiyo-precios h4{font-family:var(--font-display);font-weight:400;letter-spacing:-0.01em;line-height:1.1;margin:0}
  .ukiyo-precios .display{font-family:var(--font-display)}
  .ukiyo-precios .mono{font-family:var(--font-mono);letter-spacing:0.02em}
  .ukiyo-precios .ink-soft{color:var(--ink-soft)}
  .ukiyo-precios .container{max-width:var(--maxw);margin:0 auto;padding:0 1.75rem}

  /* ============== HERO ============== */
  .ukiyo-precios .hero{
    position:relative;min-height:88vh;display:flex;align-items:center;
    color:#fff;overflow:hidden;padding-top:6rem;padding-bottom:5rem;
  }
  .ukiyo-precios .hero__bg{position:absolute;inset:0;z-index:0}
  .ukiyo-precios .hero__bg img{width:100%;height:100%;object-fit:cover}
  .ukiyo-precios .hero__bg::after{
    content:"";position:absolute;inset:0;
    background:
      linear-gradient(180deg, rgba(0,0,0,.55) 0%, rgba(0,0,0,.25) 40%, rgba(0,0,0,.55) 100%),
      radial-gradient(ellipse at 30% 80%, rgba(139,69,19,.35), transparent 60%);
  }
  .ukiyo-precios .hero__inner{position:relative;z-index:1;width:100%}
  .ukiyo-precios .breadcrumbs{display:flex;gap:.5rem;font-size:.85rem;opacity:.85;justify-content:center;margin-bottom:1.5rem;letter-spacing:.02em}
  .ukiyo-precios .breadcrumbs span{opacity:.6}
  .ukiyo-precios .eyebrow{
    display:inline-flex;align-items:center;gap:.6rem;
    padding:.45rem 1rem;border-radius:999px;
    background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.28);
    backdrop-filter:blur(8px);font-size:.82rem;letter-spacing:.16em;text-transform:uppercase;
  }
  .ukiyo-precios .eyebrow .dot{width:6px;height:6px;border-radius:50%;background:var(--accent-300)}
  .ukiyo-precios .hero__title{
    font-size:clamp(2.6rem, 6.5vw, 5.6rem);
    font-weight:300;letter-spacing:-0.02em;line-height:.98;
    margin:1.4rem 0 1.5rem;text-align:center;
    text-shadow:0 2px 24px rgba(0,0,0,.25);
  }
  .ukiyo-precios .hero__title em{font-style:normal;color:var(--accent-300);font-weight:400}
  .ukiyo-precios .hero__title .ink-mark{position:relative;display:inline-block}
  .ukiyo-precios .hero__title .ink-mark::after{
    content:"";position:absolute;left:0;right:0;bottom:-8px;height:6px;
    background:linear-gradient(90deg,transparent,var(--accent-300),transparent);
    opacity:.7;border-radius:6px;
  }
  .ukiyo-precios .hero__sub{max-width:42rem;margin:0 auto;text-align:center;font-size:1.15rem;line-height:1.55;opacity:.95}
  .ukiyo-precios .hero__cta{display:flex;gap:1rem;justify-content:center;margin-top:2.5rem;flex-wrap:wrap}

  .ukiyo-precios .btn{
    display:inline-flex;align-items:center;gap:.7rem;
    padding:1rem 1.6rem;border-radius:999px;font-weight:600;font-size:.95rem;
    transition:transform .25s, box-shadow .25s, background .25s;
    border:1.5px solid transparent;
  }
  .ukiyo-precios .btn:hover{transform:translateY(-2px)}
  .ukiyo-precios .btn-primary{background:var(--primary);color:#fff;box-shadow:0 10px 30px -10px rgba(139,69,19,.5)}
  .ukiyo-precios .btn-primary:hover{background:var(--primary-700);box-shadow:0 14px 40px -10px rgba(139,69,19,.6)}
  .ukiyo-precios .btn-ghost{border-color:rgba(255,255,255,.5);color:#fff;backdrop-filter:blur(6px)}
  .ukiyo-precios .btn-ghost:hover{background:rgba(255,255,255,.12)}
  .ukiyo-precios .btn-outline{border-color:var(--ink);color:var(--ink)}
  .ukiyo-precios .btn-outline:hover{background:var(--ink);color:#fff}

  .ukiyo-precios .hero__scroll{
    position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);z-index:1;
    display:flex;flex-direction:column;align-items:center;gap:.5rem;
    font-size:.72rem;letter-spacing:.3em;text-transform:uppercase;opacity:.8;
  }
  .ukiyo-precios .hero__scroll .line{width:1px;height:36px;background:#fff;animation:ukiyoScrollPulse 2.4s ease-in-out infinite;transform-origin:top}
  @keyframes ukiyoScrollPulse{0%,100%{transform:scaleY(.3);opacity:.4}50%{transform:scaleY(1);opacity:1}}

  /* ============== SECTION SHELL ============== */
  .ukiyo-precios section.section{padding:var(--section-y) 0;position:relative}
  .ukiyo-precios .section-head{display:grid;grid-template-columns:auto 1fr;gap:2.5rem;align-items:end;margin-bottom:3.5rem;padding-bottom:1.5rem;border-bottom:1px solid var(--line)}
  .ukiyo-precios .section-head__num{font-family:var(--font-mono);font-size:.85rem;color:var(--primary);letter-spacing:.12em;text-transform:uppercase}
  .ukiyo-precios .section-head__title{font-size:clamp(1.9rem, 3.6vw, 3rem);font-weight:300;letter-spacing:-0.015em;color:var(--ink)}
  .ukiyo-precios .section-head__title em{font-style:normal;color:var(--primary)}
  .ukiyo-precios .section-head__sub{color:var(--ink-soft);max-width:36rem;margin-top:.8rem}
  .ukiyo-precios .section-head__right{justify-self:end;text-align:right;max-width:28rem}
  @media (max-width:760px){
    .ukiyo-precios .section-head{grid-template-columns:1fr;gap:1rem}
    .ukiyo-precios .section-head__right{justify-self:start;text-align:left}
  }

  /* ============== FILOSOFIA ============== */
  .ukiyo-precios .philosophy{background:linear-gradient(180deg,var(--bg) 0%, var(--paper) 100%)}

  /* ============== GARANTÍA ============== */
  .ukiyo-precios .guarantee{background:var(--bg);padding:0 0 var(--section-y)}
  .ukiyo-precios .guarantee__box{
    max-width:920px;margin:0 auto;
    background:linear-gradient(160deg, var(--paper) 0%, #FDF7F3 100%);
    border:2px solid var(--primary);border-radius:24px;
    padding:3rem 3rem 2.6rem;text-align:center;position:relative;overflow:hidden;
  }
  .ukiyo-precios .guarantee__box::before{
    content:"";position:absolute;inset:auto -10% -30% auto;width:280px;height:280px;
    background:radial-gradient(circle, rgba(139,69,19,.08), transparent 70%);
  }
  .ukiyo-precios .guarantee__seal{
    width:78px;height:78px;border-radius:50%;background:var(--primary);color:#fff;
    display:grid;place-items:center;margin:0 auto 1.2rem;
    box-shadow:0 12px 30px -8px rgba(139,69,19,.5);
    position:relative;z-index:1;
  }
  .ukiyo-precios .guarantee__eyebrow{font-family:var(--font-mono);font-size:.78rem;color:var(--primary);letter-spacing:.18em;text-transform:uppercase;margin-bottom:.6rem;position:relative;z-index:1}
  .ukiyo-precios .guarantee__box h2{font-family:var(--font-display);font-size:clamp(1.8rem, 3.2vw, 2.6rem);font-weight:400;color:var(--ink);margin-bottom:1.2rem;line-height:1.1;position:relative;z-index:1}
  .ukiyo-precios .guarantee__box h2 em{font-style:normal;color:var(--primary)}
  .ukiyo-precios .guarantee__box > p{font-size:1.05rem;color:var(--ink);line-height:1.6;max-width:42rem;margin:0 auto 1.5rem;position:relative;z-index:1}
  .ukiyo-precios .guarantee__box > p strong{color:var(--primary)}
  .ukiyo-precios .damaging{
    margin-top:1.8rem;padding-top:1.5rem;border-top:1px dashed var(--primary-300);
    font-size:.9rem;color:var(--ink-soft);font-style:italic;line-height:1.5;
    max-width:38rem;margin-left:auto;margin-right:auto;position:relative;z-index:1;
  }
  .ukiyo-precios .damaging b{color:var(--ink);font-style:normal;font-weight:600}

  /* ============== STACK (qué incluye) ============== */
  .ukiyo-precios .stack{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;background:#fff;border:1px solid var(--line);border-radius:var(--radius);overflow:hidden}
  .ukiyo-precios .stack__item{
    display:grid;grid-template-columns:auto 1fr auto;gap:2rem;align-items:center;
    padding:1.6rem 2rem;border-bottom:1px solid var(--line);
    transition:background .3s;
  }
  .ukiyo-precios .stack__item:last-child{border-bottom:0}
  .ukiyo-precios .stack__item:hover{background:var(--paper)}
  .ukiyo-precios .stack__num{
    font-family:var(--font-display);font-size:1.6rem;font-weight:400;
    color:var(--primary);width:54px;height:54px;display:grid;place-items:center;
    border:1px solid var(--primary-100);border-radius:50%;
  }
  .ukiyo-precios .stack__body h3{font-size:1.25rem;font-weight:400;margin:0 0 .25rem;color:var(--ink)}
  .ukiyo-precios .stack__body p{margin:0;color:var(--ink-soft);font-size:.96rem;line-height:1.55}
  .ukiyo-precios .stack__mark{font-family:var(--font-mono);font-size:.72rem;color:var(--ink-soft);letter-spacing:.12em;text-transform:uppercase;white-space:nowrap}
  @media (max-width:760px){
    .ukiyo-precios .stack__item{grid-template-columns:auto 1fr;padding:1.4rem 1.4rem}
    .ukiyo-precios .stack__mark{display:none}
  }

  /* ============== PLANES ============== */
  .ukiyo-precios .plans{background:var(--bg)}
  .ukiyo-precios .plans__grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;align-items:stretch}
  .ukiyo-precios .plan{
    position:relative;background:#fff;border:1px solid var(--line);border-radius:24px;
    overflow:hidden;display:flex;flex-direction:column;
    transition:transform .4s ease, box-shadow .4s ease, border-color .4s;
  }
  .ukiyo-precios .plan:hover{transform:translateY(-6px);box-shadow:0 30px 60px -25px rgba(44,44,44,.18)}
  .ukiyo-precios .plan--popular{border-color:var(--primary);box-shadow:0 30px 60px -30px rgba(139,69,19,.35)}
  .ukiyo-precios .plan__media{position:relative;height:240px;overflow:hidden}
  .ukiyo-precios .plan__media img{width:100%;height:100%;object-fit:cover;filter:grayscale(.6) contrast(1.05);transition:filter .6s, transform .8s}
  .ukiyo-precios .plan:hover .plan__media img{filter:grayscale(0);transform:scale(1.06)}
  .ukiyo-precios .plan__media::after{
    content:"";position:absolute;inset:0;
    background:linear-gradient(180deg, rgba(44,44,44,.1) 0%, rgba(44,44,44,.55) 100%);
  }
  .ukiyo-precios .plan__media h3{
    position:absolute;left:1.6rem;bottom:1.4rem;color:#fff;
    font-size:1.8rem;line-height:1;letter-spacing:-0.01em;z-index:1;font-weight:400;
    text-shadow:0 2px 18px rgba(0,0,0,.4);
  }
  .ukiyo-precios .plan__media .kanji{
    position:absolute;top:1.3rem;right:1.3rem;
    font-family:var(--font-display);color:#fff;opacity:.6;font-size:.85rem;letter-spacing:.18em;text-transform:uppercase;
  }
  .ukiyo-precios .plan__badge{
    position:absolute;top:1.1rem;left:1.1rem;z-index:2;
    background:var(--primary);color:#fff;
    padding:.4rem .85rem;border-radius:999px;font-size:.72rem;letter-spacing:.16em;text-transform:uppercase;font-weight:700;
    box-shadow:0 6px 18px -6px rgba(139,69,19,.6);
  }
  .ukiyo-precios .plan__body{padding:1.8rem 1.8rem 2rem;display:flex;flex-direction:column;flex:1}
  .ukiyo-precios .plan__price{display:flex;align-items:baseline;gap:.4rem;margin-bottom:.3rem;flex-wrap:wrap}
  .ukiyo-precios .plan__price .from-lbl{font-size:.78rem;color:var(--ink-soft);text-transform:uppercase;letter-spacing:.15em;margin-right:.4rem;width:100%;margin-bottom:.2rem}
  .ukiyo-precios .plan__price .amount{font-family:var(--font-display);font-size:3.2rem;line-height:1;color:var(--ink);font-weight:400}
  .ukiyo-precios .plan__price .cur{font-family:var(--font-display);font-size:1.5rem;color:var(--ink-soft)}
  .ukiyo-precios .plan__price .per{font-size:.92rem;color:var(--ink-soft);margin-left:.2rem}
  .ukiyo-precios .plan--popular .plan__price .amount{color:var(--primary)}
  .ukiyo-precios .plan__desc{color:var(--ink-soft);font-size:.95rem;margin-bottom:1.4rem;padding-bottom:1.2rem;border-bottom:1px dashed var(--line)}
  .ukiyo-precios .plan__features{list-style:none;padding:0;margin:0 0 1.8rem;display:flex;flex-direction:column;gap:.75rem;flex:1}
  .ukiyo-precios .plan__features li{display:flex;gap:.7rem;font-size:.93rem;line-height:1.45;color:var(--ink)}
  .ukiyo-precios .plan__features svg{width:18px;height:18px;flex:0 0 18px;margin-top:3px;color:var(--secondary)}
  .ukiyo-precios .plan--popular .plan__features svg{color:var(--primary)}
  .ukiyo-precios .plan__cta{
    display:flex;align-items:center;justify-content:center;gap:.6rem;
    padding:1rem;border-radius:999px;font-weight:600;
    border:1.5px solid var(--ink);color:var(--ink);transition:all .25s;
  }
  .ukiyo-precios .plan__cta:hover{background:var(--ink);color:#fff;gap:.9rem}
  .ukiyo-precios .plan--popular .plan__cta{background:var(--primary);color:#fff;border-color:var(--primary)}
  .ukiyo-precios .plan--popular .plan__cta:hover{background:var(--primary-700);border-color:var(--primary-700)}
  .ukiyo-precios .plan__cta svg{width:16px;height:16px}
  @media (max-width:980px){.ukiyo-precios .plans__grid{grid-template-columns:1fr;max-width:32rem;margin:0 auto}}
  .ukiyo-precios .plans__note{
    max-width:62rem;margin:3rem auto 0;text-align:center;
    font-size:.95rem;color:var(--ink-soft);line-height:1.7;
    display:block;
    background:#fff;border:1px solid var(--line);border-radius:var(--radius);
    padding:1.6rem 2.2rem;
  }
  .ukiyo-precios .plans__note svg{display:none}
  .ukiyo-precios .plans__note strong{color:var(--ink);font-weight:600}
  .ukiyo-precios .plans__note .eu-pill{
    display:inline-flex;align-items:center;gap:.4rem;
    background:var(--accent-50);border:1px solid var(--accent-300);
    color:var(--primary-700);font-family:var(--font-mono);
    padding:.15rem .6rem;border-radius:999px;font-size:.78rem;letter-spacing:.06em;
    margin:0 .15rem;white-space:nowrap;
  }
  @media (max-width:760px){
    .ukiyo-precios .plans__note{padding:1.4rem 1.4rem;font-size:.9rem}
  }

  /* ============== CALCULADORA ============== */
  .ukiyo-precios .calc{background:var(--paper)}
  .ukiyo-precios .calc__wrap{
    display:grid;grid-template-columns:1.05fr .95fr;gap:2.5rem;align-items:stretch;
    background:#fff;border:1px solid var(--line);border-radius:24px;overflow:hidden;
    box-shadow:0 30px 80px -40px rgba(44,44,44,.2);
  }
  .ukiyo-precios .calc__form{padding:2.5rem 2.5rem 2.8rem}
  .ukiyo-precios .calc__form h3{font-size:1.4rem;margin-bottom:.4rem;font-weight:400}
  .ukiyo-precios .calc__form p{color:var(--ink-soft);font-size:.95rem;margin:0 0 2rem}
  .ukiyo-precios .field{margin-bottom:1.6rem}
  .ukiyo-precios .field__label{display:flex;justify-content:space-between;align-items:baseline;margin-bottom:.6rem}
  .ukiyo-precios .field__label .name{font-size:.82rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--ink-soft)}
  .ukiyo-precios .field__label .value{font-family:var(--font-display);font-size:1.2rem;color:var(--primary)}
  .ukiyo-precios .seg{display:grid;grid-template-columns:repeat(4,1fr);gap:.4rem;background:var(--surface);padding:.3rem;border-radius:14px}
  .ukiyo-precios .seg button{
    padding:.6rem .4rem;border-radius:10px;font-size:.85rem;font-weight:500;color:var(--ink-soft);
    transition:all .25s;
  }
  .ukiyo-precios .seg button[aria-pressed="true"]{background:#fff;color:var(--ink);box-shadow:0 2px 6px rgba(0,0,0,.08);font-weight:600}
  .ukiyo-precios .seg.seg-2{grid-template-columns:repeat(2,1fr)}
  .ukiyo-precios .seg.seg-3{grid-template-columns:repeat(3,1fr)}
  .ukiyo-precios .field input[type=range]{
    -webkit-appearance:none;appearance:none;width:100%;height:4px;background:var(--surface);border-radius:999px;outline:none;
  }
  .ukiyo-precios .field input[type=range]::-webkit-slider-thumb{
    -webkit-appearance:none;appearance:none;width:22px;height:22px;border-radius:50%;
    background:var(--primary);cursor:pointer;border:3px solid #fff;
    box-shadow:0 2px 8px rgba(139,69,19,.4);
  }
  .ukiyo-precios .field input[type=range]::-moz-range-thumb{
    width:22px;height:22px;border-radius:50%;background:var(--primary);cursor:pointer;border:3px solid #fff;
  }
  .ukiyo-precios .range-meta{display:flex;justify-content:space-between;font-size:.75rem;color:var(--ink-soft);margin-top:.4rem;font-family:var(--font-mono)}

  .ukiyo-precios .calc__result{
    background:linear-gradient(160deg, var(--primary) 0%, var(--primary-700) 100%);
    color:#fff;padding:2.5rem;display:flex;flex-direction:column;justify-content:space-between;
    position:relative;overflow:hidden;
  }
  .ukiyo-precios .calc__result::before{
    content:"";position:absolute;inset:auto -30% -30% auto;width:380px;height:380px;
    background:radial-gradient(circle, rgba(212,165,116,.35), transparent 70%);
  }
  .ukiyo-precios .calc__result__top{position:relative;z-index:1}
  .ukiyo-precios .calc__result__top h4{font-size:.78rem;letter-spacing:.18em;text-transform:uppercase;opacity:.85;font-weight:600;font-family:var(--font-sans);margin-bottom:.8rem}
  .ukiyo-precios .calc__result__top p{opacity:.8;font-size:.92rem;line-height:1.5;max-width:24rem}
  .ukiyo-precios .calc__result__price{position:relative;z-index:1;margin:1.5rem 0 1.2rem}
  .ukiyo-precios .calc__result__price .k-label{display:block;font-size:.72rem;text-transform:uppercase;letter-spacing:.16em;opacity:.7;margin-bottom:.4rem;font-weight:600}
  .ukiyo-precios .price-row{display:flex;align-items:baseline}
  .ukiyo-precios .calc__result__price .num{
    font-family:var(--font-display);font-size:clamp(3rem, 6vw, 4.8rem);line-height:.95;font-weight:400;letter-spacing:-0.02em;
  }
  .ukiyo-precios .calc__result__price .cur{font-family:var(--font-display);font-size:1.8rem;opacity:.85;vertical-align:top;margin-right:.3rem}
  .ukiyo-precios .calc__result__price .per{display:block;font-size:.88rem;opacity:.75;letter-spacing:.04em;margin-top:.4rem}
  .ukiyo-precios .calc__fee{
    position:relative;z-index:1;padding:1.1rem 1.2rem;
    background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.18);border-radius:12px;
    margin-bottom:.8rem;
  }
  .ukiyo-precios .calc__fee__row{display:flex;justify-content:space-between;align-items:center;gap:1rem}
  .ukiyo-precios .calc__fee .k{font-size:.72rem;text-transform:uppercase;letter-spacing:.14em;opacity:.7;margin-bottom:.2rem}
  .ukiyo-precios .calc__fee .sub{font-family:var(--font-display);font-size:1.1rem}
  .ukiyo-precios .calc__fee .sub .euro-tag{display:inline-block;margin-left:.4rem;padding:.1rem .55rem;border-radius:999px;background:var(--accent-300);color:var(--primary-700);font-family:var(--font-mono);font-size:.62rem;letter-spacing:.12em;text-transform:uppercase;vertical-align:middle}
  .ukiyo-precios .calc__fee__amount{font-family:var(--font-display);font-size:1.8rem;color:var(--accent-300)}
  .ukiyo-precios .calc__fee__hint{font-size:.72rem;opacity:.65;margin-top:.6rem;letter-spacing:.04em}

  .ukiyo-precios .calc__total{
    position:relative;z-index:1;padding:1.2rem 1.2rem;
    background:rgba(255,255,255,.16);border:1px solid rgba(255,255,255,.32);border-radius:12px;
    margin-bottom:0;
  }
  .ukiyo-precios .calc__total__row{display:flex;justify-content:space-between;align-items:center;gap:1rem}
  .ukiyo-precios .calc__total .k{font-size:.72rem;text-transform:uppercase;letter-spacing:.14em;opacity:.85;margin-bottom:.25rem;font-weight:700}
  .ukiyo-precios .calc__total .sub{font-size:.78rem;opacity:.75;letter-spacing:.02em}
  .ukiyo-precios .calc__total__amount{font-family:var(--font-display);font-size:2rem;color:#fff;font-weight:400;line-height:1}
  .ukiyo-precios .calc__total__amount .cur{font-size:1.1rem;opacity:.85;margin-right:.15rem}
  .ukiyo-precios .calc__note{position:relative;z-index:1;font-size:.78rem;opacity:.7;margin-top:1.2rem;line-height:1.5}

  /* Destination carousel inside calc */
  .ukiyo-precios .dest-carousel{display:grid;grid-template-columns:36px 1fr 36px;gap:.5rem;align-items:center}
  .ukiyo-precios .dest-viewport{overflow:hidden;background:var(--surface);padding:.3rem;border-radius:14px}
  .ukiyo-precios .dest-track{display:grid;grid-auto-flow:column;grid-auto-columns:calc((100% - 1.2rem) / 4);gap:.4rem;transition:transform .4s cubic-bezier(.4,.0,.2,1)}
  .ukiyo-precios .dest-track button{padding:.6rem .3rem;border-radius:10px;font-size:.85rem;font-weight:500;color:var(--ink-soft);transition:all .25s;background:transparent;border:none;cursor:pointer;font-family:inherit;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
  .ukiyo-precios .dest-track button[aria-pressed="true"]{background:#fff;color:var(--ink);box-shadow:0 2px 6px rgba(0,0,0,.08);font-weight:600}
  .ukiyo-precios .dest-arrow{width:36px;height:36px;border-radius:50%;border:1px solid var(--line);background:#fff;color:var(--ink);display:grid;place-items:center;cursor:pointer;transition:all .25s;padding:0}
  .ukiyo-precios .dest-arrow:hover:not(:disabled){background:var(--primary);color:#fff;border-color:var(--primary);transform:scale(1.05)}
  .ukiyo-precios .dest-arrow:disabled{opacity:.3;cursor:not-allowed}
  .ukiyo-precios .dest-arrow svg{width:14px;height:14px}
  .ukiyo-precios .dest-dots{display:flex;justify-content:center;gap:.35rem;margin-top:.6rem}
  .ukiyo-precios .dest-dots span{width:5px;height:5px;border-radius:50%;background:var(--line);transition:all .25s}
  .ukiyo-precios .dest-dots span.is-on{background:var(--primary);width:14px;border-radius:3px}
  @media (max-width:980px){.ukiyo-precios .calc__wrap{grid-template-columns:1fr}}

  /* ============== INCLUYE / NO INCLUYE ============== */
  .ukiyo-precios .includes{background:var(--bg)}
  .ukiyo-precios .includes__grid{display:grid;grid-template-columns:1fr 1fr;gap:1.25rem}
  .ukiyo-precios .ilist{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:2rem 2rem 1.6rem}
  .ukiyo-precios .ilist h3{font-size:1.3rem;font-weight:400;margin-bottom:.3rem;display:flex;gap:.7rem;align-items:center}
  .ukiyo-precios .ilist h3 .mono{font-size:.72rem;color:var(--ink-soft)}
  .ukiyo-precios .ilist__sub{color:var(--ink-soft);font-size:.9rem;margin-bottom:1.4rem;padding-bottom:1.2rem;border-bottom:1px solid var(--line)}
  .ukiyo-precios .ilist ul{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:.85rem}
  .ukiyo-precios .ilist li{display:flex;gap:.8rem;font-size:.94rem;line-height:1.5}
  .ukiyo-precios .ilist li svg{width:18px;height:18px;flex:0 0 18px;margin-top:3px}
  .ukiyo-precios .ilist.yes h3{color:var(--secondary-700)}
  .ukiyo-precios .ilist.yes svg{color:var(--secondary-700)}
  .ukiyo-precios .ilist.no h3{color:var(--ink)}
  .ukiyo-precios .ilist.no svg{color:var(--ink-soft)}
  .ukiyo-precios .ilist.no li{color:var(--ink-soft)}
  @media (max-width:880px){.ukiyo-precios .includes__grid{grid-template-columns:1fr}}

  /* ============== EJEMPLOS ============== */
  .ukiyo-precios .examples{background:var(--paper)}
  .ukiyo-precios .ex-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.4rem}
  .ukiyo-precios .ex{
    background:#fff;border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;
    display:flex;flex-direction:column;transition:transform .35s, box-shadow .35s;
  }
  .ukiyo-precios .ex:hover{transform:translateY(-4px);box-shadow:0 20px 50px -25px rgba(44,44,44,.2)}
  .ukiyo-precios .ex__media{position:relative;height:220px;overflow:hidden}
  .ukiyo-precios .ex__media img{width:100%;height:100%;object-fit:cover;transition:transform .8s}
  .ukiyo-precios .ex:hover .ex__media img{transform:scale(1.06)}
  .ukiyo-precios .ex__media::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,transparent 50%, rgba(44,44,44,.35) 100%)}
  .ukiyo-precios .ex__tag{position:absolute;top:1rem;left:1rem;background:rgba(254,252,248,.95);color:var(--ink);padding:.35rem .8rem;border-radius:999px;font-size:.72rem;letter-spacing:.12em;text-transform:uppercase;font-weight:600;backdrop-filter:blur(6px);z-index:1}
  .ukiyo-precios .ex__meta{position:absolute;left:1.2rem;bottom:1rem;color:#fff;z-index:1;display:flex;gap:.8rem;font-family:var(--font-mono);font-size:.78rem;letter-spacing:.06em}
  .ukiyo-precios .ex__body{padding:1.5rem 1.5rem 1.7rem;display:flex;flex-direction:column;flex:1}
  .ukiyo-precios .ex__body h3{font-size:1.35rem;font-weight:400;margin-bottom:.5rem;line-height:1.2}
  .ukiyo-precios .ex__body p{color:var(--ink-soft);font-size:.92rem;margin:0 0 1.3rem;flex:1}
  .ukiyo-precios .ex__price{display:flex;align-items:baseline;justify-content:space-between;padding-top:1.2rem;border-top:1px dashed var(--line)}
  .ukiyo-precios .ex__price .from{font-size:.72rem;color:var(--ink-soft);text-transform:uppercase;letter-spacing:.15em;display:block;margin-bottom:.2rem}
  .ukiyo-precios .ex__price .amount{font-family:var(--font-display);font-size:1.7rem;color:var(--primary);font-weight:400}
  .ukiyo-precios .ex__price .pp{font-size:.78rem;color:var(--ink-soft);margin-left:.2rem}
  .ukiyo-precios .ex__price a{font-size:.85rem;color:var(--ink);border-bottom:1px solid var(--ink);padding-bottom:2px;font-weight:500}
  @media (max-width:980px){.ukiyo-precios .ex-grid{grid-template-columns:1fr;max-width:32rem;margin:0 auto}}

  /* ============== PAGOS ============== */
  .ukiyo-precios .payments{background:var(--bg)}
  .ukiyo-precios .pay-grid{display:grid;grid-template-columns:1fr 1fr 1fr;gap:1.2rem}
  .ukiyo-precios .pay{
    border:1px solid var(--line);border-radius:var(--radius);padding:1.8rem;
    background:#fff;
  }
  .ukiyo-precios .pay__step{font-family:var(--font-mono);font-size:.72rem;color:var(--primary);letter-spacing:.18em;text-transform:uppercase;margin-bottom:.8rem}
  .ukiyo-precios .pay__pct{font-family:var(--font-display);font-size:2.6rem;line-height:1;color:var(--ink);font-weight:400}
  .ukiyo-precios .pay__pct .small{font-size:1.2rem;color:var(--ink-soft)}
  .ukiyo-precios .pay h4{font-family:var(--font-sans);font-size:1.05rem;font-weight:600;margin:.9rem 0 .5rem;color:var(--ink)}
  .ukiyo-precios .pay p{color:var(--ink-soft);font-size:.9rem;margin:0;line-height:1.55}
  @media (max-width:880px){.ukiyo-precios .pay-grid{grid-template-columns:1fr}}

  /* ============== FAQ ============== */
  .ukiyo-precios .faq{background:var(--paper)}
  .ukiyo-precios .faq__list{display:flex;flex-direction:column;gap:.65rem;max-width:920px;margin:0 auto}
  .ukiyo-precios .qa{background:#fff;border:1px solid var(--line);border-radius:14px;overflow:hidden;transition:border-color .25s}
  .ukiyo-precios .qa[open]{border-color:var(--primary-100)}
  .ukiyo-precios .qa summary{
    list-style:none;cursor:pointer;padding:1.3rem 1.6rem;display:flex;justify-content:space-between;align-items:center;gap:1rem;
    font-weight:500;color:var(--ink);font-size:1.02rem;
  }
  .ukiyo-precios .qa summary::-webkit-details-marker{display:none}
  .ukiyo-precios .qa__num{font-family:var(--font-mono);font-size:.75rem;color:var(--primary);letter-spacing:.1em;margin-right:1rem}
  .ukiyo-precios .qa__caret{width:22px;height:22px;border-radius:50%;border:1px solid var(--line);display:grid;place-items:center;transition:transform .25s, background .25s, color .25s;color:var(--ink-soft);flex:0 0 22px}
  .ukiyo-precios .qa[open] .qa__caret{transform:rotate(45deg);background:var(--primary);color:#fff;border-color:var(--primary)}
  .ukiyo-precios .qa__body{padding:0 1.6rem 1.4rem 1.6rem;color:var(--ink-soft);font-size:.96rem;line-height:1.65;max-width:46rem}
  .ukiyo-precios .qa__body p{margin:0 0 .8rem}

  /* ============== CTA ============== */
  .ukiyo-precios .cta{
    background:linear-gradient(180deg, var(--bg) 0%, var(--paper) 100%);
    padding:var(--section-y) 0 calc(var(--section-y) - 2rem);
  }
  .ukiyo-precios .cta__panel{
    background:var(--ink);color:#fff;border-radius:28px;padding:4rem;
    display:grid;grid-template-columns:1.2fr 1fr;gap:3rem;align-items:center;
    position:relative;overflow:hidden;
  }
  .ukiyo-precios .cta__panel::before{
    content:"";position:absolute;inset:auto -10% -40% auto;width:520px;height:520px;
    background:radial-gradient(circle, rgba(212,165,116,.22), transparent 65%);
  }
  .ukiyo-precios .cta__panel h2{font-size:clamp(2rem, 4vw, 3.2rem);font-weight:300;line-height:1.05;margin-bottom:1.2rem;letter-spacing:-0.015em}
  .ukiyo-precios .cta__panel h2 em{font-style:normal;color:var(--accent-300)}
  .ukiyo-precios .cta__panel p{opacity:.78;max-width:30rem;margin:0 0 2rem;line-height:1.6}
  .ukiyo-precios .cta__panel .meta{display:flex;gap:1.5rem;font-size:.85rem;opacity:.8;flex-wrap:wrap}
  .ukiyo-precios .cta__panel .meta b{color:var(--accent-300);font-weight:600;margin-right:.3rem}
  .ukiyo-precios .cta__card{
    background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.14);
    border-radius:18px;padding:2rem;position:relative;z-index:1;
  }
  .ukiyo-precios .bonus-48h{
    display:flex;gap:.9rem;align-items:flex-start;
    background:rgba(212,165,116,.12);border:1px solid rgba(212,165,116,.35);
    border-radius:14px;padding:1.1rem 1.2rem;margin:0 0 1.5rem;
    font-size:.95rem;line-height:1.5;
  }
  .ukiyo-precios .bonus-48h__star{color:var(--accent-300);flex:0 0 auto;margin-top:1px}
  .ukiyo-precios .bonus-48h strong{color:var(--accent-300);font-weight:600}
  .ukiyo-precios .cta__card .when{font-family:var(--font-mono);font-size:.72rem;letter-spacing:.18em;text-transform:uppercase;opacity:.7;margin-bottom:.6rem}
  .ukiyo-precios .cta__card h4{font-family:var(--font-display);font-weight:400;font-size:1.4rem;margin-bottom:.6rem}
  .ukiyo-precios .cta__slots{display:grid;grid-template-columns:repeat(3,1fr);gap:.5rem;margin:1.4rem 0}
  .ukiyo-precios .cta__slots button{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.16);color:#fff;padding:.7rem;border-radius:10px;font-size:.85rem;transition:all .2s}
  .ukiyo-precios .cta__slots button:hover{background:var(--primary);border-color:var(--primary)}
  .ukiyo-precios .cta__card .full{
    display:block;text-align:center;background:var(--accent);color:var(--ink);padding:1rem;border-radius:12px;font-weight:600;transition:transform .25s;
  }
  .ukiyo-precios .cta__card .full:hover{transform:translateY(-2px)}
  @media (max-width:980px){.ukiyo-precios .cta__panel{grid-template-columns:1fr;padding:2.5rem}}

  /* ============== ANIMATIONS ============== */
  .ukiyo-precios .reveal{opacity:0;transform:translateY(20px);transition:opacity .8s ease, transform .8s ease}
  .ukiyo-precios .reveal.in{opacity:1;transform:none}

  /* ============== TWEAK MODES (data-attributes en el wrapper) ============== */
  .ukiyo-precios[data-cards=outlined] .plan{box-shadow:none;border:1.5px solid var(--ink)}
  .ukiyo-precios[data-cards=outlined] .plan--popular{border-color:var(--primary);border-width:2.5px}
  .ukiyo-precios[data-cards=outlined] .plan:hover{box-shadow:6px 6px 0 var(--ink);transform:translate(-3px,-3px)}
  .ukiyo-precios[data-cards=outlined] .plan--popular:hover{box-shadow:6px 6px 0 var(--primary)}
  .ukiyo-precios[data-cards=washi] .plan{background:var(--paper);border:1px solid var(--accent-300)}
  .ukiyo-precios[data-cards=washi] .plan__body{background:transparent}
  .ukiyo-precios[data-accent=sage]{--primary:#5E6952;--primary-50:#F7F9F5;--primary-100:#EDF2E8;--primary-700:#3F4637;--accent-300:#C9D8BA}
  .ukiyo-precios[data-accent=indigo]{--primary:#3D4A6B;--primary-50:#F2F4F8;--primary-100:#E0E4EE;--primary-700:#2A3349;--accent-300:#A8B3CC}
  .ukiyo-precios[data-density=compact]{--section-y:5rem}

  /* Edge cases */
  @media (max-width:560px){
    .ukiyo-precios .hero__title{font-size:2.4rem}
    .ukiyo-precios .calc__form,
    .ukiyo-precios .calc__result{padding:1.8rem}
    .ukiyo-precios .cta__panel{padding:2rem}
  }
</style>

<div class="ukiyo-precios" data-cards="soft" data-accent="terracotta" data-density="comfortable">

  <!-- ============== HERO ============== -->
  <section class="hero">
    <div class="hero__bg">
      <img src="<?php echo esc_url( $pricing_imgs['hero'] ); ?>" alt="" />
    </div>
    <div class="container hero__inner">
      <div class="breadcrumbs">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a><span>/</span><span>Precios</span>
      </div>
      <div style="text-align:center"><span class="eyebrow"><span class="dot"></span>価値 · kachi · valor</span></div>
      <h1 class="hero__title">El <em class="ink-mark">Precio del Diseño</em><br/>Ukiyo.</h1>
      <p class="hero__sub">
        Lo que cobramos es nuestro criterio, nuestra experiencia y el cero errores — <strong>no un porcentaje</strong> del precio de tu viaje. Diseñamos tu ruta hasta que te enamore, o te devolvemos el 100%.
      </p>
      <div class="hero__cta">
        <a class="btn btn-primary" href="#planes">Ver los tres diseños
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a class="btn btn-ghost" href="#cta">Llamada gratuita de 30 min</a>
      </div>
    </div>
    <div class="hero__scroll"><span>Desliza</span><div class="line"></div></div>
  </section>

  <!-- ============== QUÉ INCLUYE EL DISEÑO ============== -->
  <section class="section philosophy" id="filosofia">
    <div class="container">
      <div class="section-head reveal">
        <div>
          <div class="section-head__num">01 · El stack</div>
          <h2 class="section-head__title">¿Qué incluye el<br/><em>Diseño de Viaje Ukiyo?</em></h2>
        </div>
        <div class="section-head__right">
          <p class="section-head__sub">Cada pieza nació de un problema real. Podrías contratar cada una por separado — pero juntas funcionan como un solo viaje.</p>
        </div>
      </div>

      <ol class="stack">
        <li class="stack__item reveal">
          <span class="stack__num">01</span>
          <div class="stack__body">
            <h3>La Ruta de Autor</h3>
            <p>Itinerario día a día diseñado y testado en persona. No genera ChatGPT ni Lonely Planet: lo hemos pisado.</p>
          </div>
          <span class="stack__mark">道 · ruta</span>
        </li>
        <li class="stack__item reveal">
          <span class="stack__num">02</span>
          <div class="stack__body">
            <h3>Solo sitios que hemos pisado</h3>
            <p>Cada hotel, cada ruta y cada experiencia verificada por nosotros. Si no lo hemos vivido, no lo organizamos.</p>
          </div>
          <span class="stack__mark">足 · a pie</span>
        </li>
        <li class="stack__item reveal">
          <span class="stack__num">03</span>
          <div class="stack__body">
            <h3>Experiencias de Autor</h3>
            <p>2–3 experiencias exclusivas que no reservarías por tu cuenta: cena con familia local, sesión privada con artesano, ruta fuera del mapa.</p>
          </div>
          <span class="stack__mark">印 · sello</span>
        </li>
        <li class="stack__item reveal">
          <span class="stack__num">04</span>
          <div class="stack__body">
            <h3>El Dossier Ukiyo</h3>
            <p>Guía visual, mapas, restaurantes probados, frases útiles, packing list y todo lo que necesitas saber antes de salir.</p>
          </div>
          <span class="stack__mark">帖 · dossier</span>
        </li>
        <li class="stack__item reveal">
          <span class="stack__num">05</span>
          <div class="stack__body">
            <h3>Soporte WhatsApp 24/7</h3>
            <p>Disponibles durante todo el viaje por si algo se tuerce. Una respuesta humana en minutos, no un bot.</p>
          </div>
          <span class="stack__mark">伴 · contigo</span>
        </li>
      </ol>
    </div>
  </section>

  <!-- ============== PLANES ============== -->
  <section class="section plans" id="planes">
    <div class="container">
      <div class="section-head reveal">
        <div>
          <div class="section-head__num">02 · Tres diseños</div>
          <h2 class="section-head__title">Tres niveles de<br/><em>Precio del Diseño.</em></h2>
        </div>
        <div class="section-head__right">
          <p class="section-head__sub">Un precio fijo por nuestro criterio y experiencia. <strong>Nada de porcentajes</strong> sobre lo que gasta otra persona. Los costes del viaje (vuelos, hoteles, actividades) se presupuestan aparte y de forma transparente.</p>
        </div>
      </div>

      <div class="plans__grid">

        <!-- Plan 1 — Esencial -->
        <article class="plan reveal">
          <div class="plan__media">
            <img src="<?php echo esc_url( $pricing_imgs['plan_esencial'] ); ?>" alt="" />
            <span class="kanji">道 · esencial</span>
            <h3>Diseño Esencial</h3>
          </div>
          <div class="plan__body">
            <div class="plan__price">
              <span class="from-lbl">Desde</span>
              <span class="cur">€</span><span class="amount">590</span>
            </div>
            <p class="plan__desc">Un destino, hasta 8 días. Para escapadas focalizadas donde cada día cuenta.</p>
            <ul class="plan__features">
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> Itinerario día a día personalizado</li>
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> Solo alojamientos que conocemos en persona</li>
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> Recomendaciones exclusivas (no están en ninguna guía)</li>
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> Soporte WhatsApp durante el viaje</li>
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> Dossier Ukiyo digital</li>
            </ul>
            <a class="plan__cta" href="#cta">
              <span>Empezar mi Diseño Esencial</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
        </article>

        <!-- Plan 2 — Firma (popular) -->
        <article class="plan plan--popular reveal">
          <span class="plan__badge">Más elegido</span>
          <div class="plan__media">
            <img src="<?php echo esc_url( $pricing_imgs['plan_firma'] ); ?>" alt="" />
            <span class="kanji">印 · firma</span>
            <h3>Diseño Firma</h3>
          </div>
          <div class="plan__body">
            <div class="plan__price">
              <span class="from-lbl">Desde</span>
              <span class="cur">€</span><span class="amount">990</span>
            </div>
            <p class="plan__desc">Multidestino o viaje complejo. El 'sweet spot' del catálogo Ukiyo.</p>
            <ul class="plan__features">
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> <span>Todo lo del <b>Diseño Esencial</b></span></li>
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> Coordinación de vuelos y traslados internos</li>
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> Experiencias de Autor exclusivas (2–3 incluidas)</li>
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> Kit de Viajero Ukiyo (libreta + guía de bolsillo)</li>
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> <span><b>Boceto de Viaje en 48 h</b> si reservas en la llamada</span></li>
            </ul>
            <a class="plan__cta" href="#cta">
              <span>Empezar mi Diseño Firma</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
        </article>

        <!-- Plan 3 — Premium -->
        <article class="plan reveal">
          <div class="plan__media">
            <img src="<?php echo esc_url( $pricing_imgs['plan_premium'] ); ?>" alt="" />
            <span class="kanji">唯 · único</span>
            <h3>Diseño Premium</h3>
          </div>
          <div class="plan__body">
            <div class="plan__price">
              <span class="from-lbl">Desde</span>
              <span class="cur">€</span><span class="amount">1390</span>
            </div>
            <p class="plan__desc">Grupos, rutas complejas o experiencias muy especiales. Cuando lo que pides no entra en una plantilla.</p>
            <ul class="plan__features">
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> <span>Todo lo del <b>Diseño Firma</b></span></li>
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> Consultoría de viaje extendida</li>
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> Gestión completa de grupo</li>
              <li><svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.7-9.3a1 1 0 00-1.4-1.4L9 10.6 7.7 9.3a1 1 0 00-1.4 1.4l2 2a1 1 0 001.4 0l4-4z" clip-rule="evenodd"/></svg> Crédito Ukiyo de 200 € para el siguiente viaje</li>
            </ul>
            <a class="plan__cta" href="#cta">
              <span>Empezar mi Diseño Premium</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
        </article>
      </div>

      <p class="plans__note reveal">Los precios indicados son el <strong>Precio del Diseño</strong>. Los costes del viaje en destino (vuelos, hoteles, actividades) se presupuestan aparte, de forma transparente. <span class="eu-pill">🇪🇺 Destinos europeos · 390 €</span> &nbsp;como prueba de nuestro compromiso con viajar cerca.</p>
    </div>
  </section>

  <!-- ============== GARANTÍA ============== -->
  <section class="guarantee">
    <div class="container">
      <div class="guarantee__box reveal">
        <div class="guarantee__seal">
          <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l9 4v6c0 5-3.5 9.5-9 10-5.5-.5-9-5-9-10V6l9-4z" stroke-linejoin="round"/><path d="M8.5 12.5l2.5 2.5 4.5-5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <div class="guarantee__eyebrow">Garantía · cero riesgo</div>
        <h2>Itinerario que <em>enamora</em>.<br/>O te devolvemos el 100%.</h2>
        <p>Trabajamos tu itinerario hasta que te enamore.
          Si la primera propuesta no encaja, la rediseñamos sin coste hasta encontrar una ruta alineada con tu forma de viajar.
          Y si aun así no es para ti, te devolvemos el Precio del Diseño íntegro. El riesgo de planificar lo asumimos nosotros.</p>
        <p class="damaging">Diseñamos viajes para quien valora la experiencia y la autenticidad por encima de ahorrarse unos euros.</p>
      </div>
    </div>
  </section>

  <!-- ============== CALCULADORA ============== -->
  <section class="section calc" id="calc">
    <div class="container">
      <div class="section-head reveal">
        <div>
          <div class="section-head__num">03 · Calculadora</div>
          <h2 class="section-head__title">Estima tu viaje<br/>en <em>30 segundos.</em></h2>
        </div>
        <div class="section-head__right">
          <p class="section-head__sub">Una orientación honesta del coste en destino + el Precio del Diseño Ukiyo que te toca. Cifra real y final se acuerdan tras la primera videollamada.</p>
        </div>
      </div>

      <div class="calc__wrap reveal">
        <div class="calc__form">
          <h3>Cuéntanos cómo viajas.</h3>
          <p>Ajusta los parámetros para ver una estimación orientativa.</p>

          <div class="field">
            <div class="field__label"><span class="name">Destino</span><span class="value" id="lblDest">Indonesia</span></div>
            <div class="dest-carousel">
              <button class="dest-arrow" id="destPrev" aria-label="Destinos anteriores">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M15 6l-6 6 6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
              <div class="dest-viewport">
                <div class="dest-track" data-field="dest" id="destTrack">
                  <button data-val="indo" aria-pressed="true">Indonesia</button>
                  <button data-val="cr">Costa Rica</button>
                  <button data-val="col">Colombia</button>
                  <button data-val="mar">Marruecos</button>
                  <button data-val="lan">Lanzarote</button>
                  <button data-val="ita">Italia</button>
                </div>
              </div>
              <button class="dest-arrow" id="destNext" aria-label="Destinos siguientes">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M9 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
            </div>
            <div class="dest-dots" id="destDots"></div>
          </div>

          <div class="field">
            <div class="field__label"><span class="name">Complejidad de la ruta</span><span class="value" id="lblPlan">Grupo o viaje especial</span></div>
            <div class="seg seg-3" data-field="plan">
              <button data-val="esencial" aria-pressed="true">Esencial</button>
              <button data-val="firma">Firma</button>
              <button data-val="medida">Premium</button>
            </div>
          </div>

          <div class="field">
            <div class="field__label"><span class="name">Días de viaje</span><span class="value"><span id="lblDays">12</span> días</span></div>
            <input type="range" id="days" min="5" max="30" value="12" step="1" />
            <div class="range-meta"><span>5 días</span><span>30 días</span></div>
          </div>

          <div class="field">
            <div class="field__label"><span class="name">Viajeros</span><span class="value"><span id="lblPax">2</span> personas</span></div>
            <input type="range" id="pax" min="1" max="8" value="2" step="1" />
            <div class="range-meta"><span>solo</span><span>grupo de 8</span></div>
          </div>

          <div class="field">
            <div class="field__label"><span class="name">Nivel de comodidad</span><span class="value" id="lblComfort">Auténtico</span></div>
            <div class="seg seg-3" data-field="comfort">
              <button data-val="autentico" aria-pressed="true">Auténtico</button>
              <button data-val="confort">Confort</button>
              <button data-val="boutique">Boutique</button>
            </div>
          </div>
        </div>

        <aside class="calc__result">
          <div class="calc__result__top">
            <h4>Estimación orientativa</h4>
            <p>Lo de abajo es el coste medio en destino (alojamientos, transporte interno, experiencias). El Precio del Diseño Ukiyo va aparte, como una sola línea transparente.</p>
          </div>

          <div class="calc__result__price">
            <span class="k-label">Coste medio en destino</span>
            <div class="price-row">
              <span class="cur">€</span><span class="num" id="totalNum">2 040</span>
            </div>
            <span class="per"><span id="perPax">por persona</span> · <span id="totalDetail">12 días en Indonesia</span></span>
          </div>

          <div class="calc__fee">
            <div class="calc__fee__row">
              <div>
                <div class="k">Precio del Diseño Ukiyo</div>
                <div class="sub" id="feeName">Diseño Firma</div>
              </div>
              <div class="calc__fee__amount" id="feeAmount">990 €</div>
            </div>
            <div class="calc__fee__hint" id="feeHint">Precio fijo del diseño, se reparte entre los viajeros.</div>
          </div>

          <div class="calc__total">
            <div class="calc__total__row">
              <div>
                <div class="k">Total estimado por persona</div>
                <div class="sub">Coste en destino + diseño repartido</div>
              </div>
              <div class="calc__total__amount"><span class="cur">€</span><span id="totalEstimated">2 535</span></div>
            </div>
          </div>

          <p class="calc__note">* Cifras aproximadas (datos medios 2026). Vuelos internacionales y alojamientos se presupuestan aparte de forma transparente. Cerramos precio final tras la primera videollamada.</p>
        </aside>
      </div>
    </div>
  </section>

  <!-- ============== INCLUYE / NO INCLUYE ============== -->
  <section class="section includes">
    <div class="container">
      <div class="section-head reveal">
        <div>
          <div class="section-head__num">04 · Transparencia</div>
          <h2 class="section-head__title">Qué incluye, qué <em>no</em>.</h2>
        </div>
        <div class="section-head__right">
          <p class="section-head__sub">Honestidad ante todo. Te decimos exactamente qué pagas, y qué pagarás aparte.</p>
        </div>
      </div>

      <div class="includes__grid">
        <div class="ilist yes reveal">
          <h3>Sí incluye <span class="mono">+ included</span></h3>
          <p class="ilist__sub">Todo lo necesario para que el viaje funcione, sin sorpresas.</p>
          <ul>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg> Diseño del itinerario 100% personalizado</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg> Reuniones online ilimitadas en fase de diseño</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg> Documento de ruta + mapa interactivo</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg> Contactos locales verificados (guías, transporte, comidas)</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg> Soporte 24/7 durante el viaje (WhatsApp directo)</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg> Sesión de regreso (café incluido)</li>
          </ul>
        </div>

        <div class="ilist no reveal">
          <h3>No incluye <span class="mono">— optional</span></h3>
          <p class="ilist__sub">Para mantener el precio honesto y darte libertad real.</p>
          <ul>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="6" y1="6" x2="18" y2="18" stroke-linecap="round"/><line x1="18" y1="6" x2="6" y2="18" stroke-linecap="round"/></svg> Vuelos internacionales <span class="ink-soft">(salvo plan premium)</span></li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="6" y1="6" x2="18" y2="18" stroke-linecap="round"/><line x1="18" y1="6" x2="6" y2="18" stroke-linecap="round"/></svg> Visados, tasas y vacunas</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="6" y1="6" x2="18" y2="18" stroke-linecap="round"/><line x1="18" y1="6" x2="6" y2="18" stroke-linecap="round"/></svg> Comidas y bebidas no especificadas</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="6" y1="6" x2="18" y2="18" stroke-linecap="round"/><line x1="18" y1="6" x2="6" y2="18" stroke-linecap="round"/></svg> Propinas y gastos personales</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="6" y1="6" x2="18" y2="18" stroke-linecap="round"/><line x1="18" y1="6" x2="6" y2="18" stroke-linecap="round"/></svg> Seguro de viaje <span class="ink-soft">(podemos recomendarte uno)</span></li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="6" y1="6" x2="18" y2="18" stroke-linecap="round"/><line x1="18" y1="6" x2="6" y2="18" stroke-linecap="round"/></svg> Excursiones opcionales fuera del itinerario</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ============== EJEMPLOS ============== -->
  <section class="section examples">
    <div class="container">
      <div class="section-head reveal">
        <div>
          <div class="section-head__num">05 · Ejemplos reales</div>
          <h2 class="section-head__title">Viajes que hemos<br/><em>diseñado este año.</em></h2>
        </div>
        <div class="section-head__right">
          <p class="section-head__sub">Precios reales, sin maquillaje. Cifras orientativas <em>en destino</em>, sin vuelos, para dos personas.</p>
        </div>
      </div>

      <div class="ex-grid">
        <article class="ex reveal">
          <div class="ex__media">
            <span class="ex__tag">Indonesia</span>
            <img src="<?php echo esc_url( $pricing_imgs['ex_indonesia'] ); ?>" alt="" />
            <div class="ex__meta"><span>14 días</span><span>·</span><span>2 personas</span></div>
          </div>
          <div class="ex__body">
            <h3>Bali, Java y las Gilis</h3>
            <p>Templos al amanecer, volcanes, snorkel con mantas y un cooking class con familia local en Ubud.</p>
            <div class="ex__price">
              <div>
                <span class="from">Desde</span>
                <span class="amount">2 380€</span><span class="pp">/ persona</span>
              </div>
              <a href="#cta">Pedir itinerario →</a>
            </div>
          </div>
        </article>

        <article class="ex reveal">
          <div class="ex__media">
            <span class="ex__tag">Costa Rica</span>
            <img src="<?php echo esc_url( $pricing_imgs['ex_costarica'] ); ?>" alt="" />
            <div class="ex__meta"><span>12 días</span><span>·</span><span>2 personas</span></div>
          </div>
          <div class="ex__body">
            <h3>Pura vida en Pacífico y Caribe</h3>
            <p>Corcovado, Monteverde, Tortuguero y el caribe sur. Naturaleza salvaje, cabinas en la selva y ceviche.</p>
            <div class="ex__price">
              <div>
                <span class="from">Desde</span>
                <span class="amount">2 760€</span><span class="pp">/ persona</span>
              </div>
              <a href="#cta">Pedir itinerario →</a>
            </div>
          </div>
        </article>

        <article class="ex reveal">
          <div class="ex__media">
            <span class="ex__tag">Marruecos</span>
            <img src="<?php echo esc_url( $pricing_imgs['ex_marruecos'] ); ?>" alt="" />
            <div class="ex__meta"><span>9 días</span><span>·</span><span>2 personas</span></div>
          </div>
          <div class="ex__body">
            <h3>De Fez al desierto del Sahara</h3>
            <p>Medinas, riads, valle del Draa y noche bajo las estrellas en una jaima beréber en Merzouga.</p>
            <div class="ex__price">
              <div>
                <span class="from">Desde</span>
                <span class="amount">1 490€</span><span class="pp">/ persona</span>
              </div>
              <a href="#cta">Pedir itinerario →</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ============== PAGOS ============== -->
  <section class="section payments">
    <div class="container">
      <div class="section-head reveal">
        <div>
          <div class="section-head__num">06 · Formas de pago</div>
          <h2 class="section-head__title">Reserva tranquila,<br/>pago <em>fraccionado.</em></h2>
        </div>
        <div class="section-head__right">
          <p class="section-head__sub">Sin sorpresas. Tres pagos pensados para que el viaje no asfixie a tu cartera.</p>
        </div>
      </div>

      <div class="pay-grid">
        <article class="pay reveal">
          <div class="pay__step">Paso 01 · al reservar</div>
          <div class="pay__pct">20<span class="small">%</span></div>
          <h4>Confirmación del diseño</h4>
          <p>Bloqueamos fechas, abrimos el expediente y empezamos a contactar a guías y alojamientos.</p>
        </article>
        <article class="pay reveal">
          <div class="pay__step">Paso 02 · 60 días antes</div>
          <div class="pay__pct">50<span class="small">%</span></div>
          <h4>Cierre del itinerario</h4>
          <p>Recibes el dossier final con cada noche, cada guía y cada experiencia confirmada.</p>
        </article>
        <article class="pay reveal">
          <div class="pay__step">Paso 03 · 30 días antes</div>
          <div class="pay__pct">30<span class="small">%</span></div>
          <h4>Listo para volar</h4>
          <p>Pago final, briefing previo por videollamada y maleta hecha. Te entregamos el cuaderno de viaje.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ============== FAQ ============== -->
  <section class="section faq">
    <div class="container">
      <div class="section-head reveal">
        <div>
          <div class="section-head__num">07 · Preguntas frecuentes</div>
          <h2 class="section-head__title">Lo que la gente<br/><em>nos suele preguntar.</em></h2>
        </div>
        <div class="section-head__right">
          <p class="section-head__sub">Si tu duda no está aquí, escríbenos. Respondemos en menos de 24 horas (a veces antes del café).</p>
        </div>
      </div>

      <div class="faq__list">
        <details class="qa reveal">
          <summary><span><span class="qa__num">01</span>¿Por qué un precio fijo de diseño en vez de un porcentaje?</span><span class="qa__caret"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg></span></summary>
          <div class="qa__body"><p>Porque cobramos por nuestro criterio, no por el dinero que gastas. Un cliente que viaja a Marruecos y otro a Indonesia reciben las mismas horas de trabajo de diseño — y por tanto el mismo precio. No estás pagando un porcentaje sobre el precio del hotel; estás pagando por el cero errores.</p></div>
        </details>

        <details class="qa reveal">
          <summary><span><span class="qa__num">02</span>¿Cuándo se cierra el precio final?</span><span class="qa__caret"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg></span></summary>
          <div class="qa__body"><p>Tras la primera videollamada y un par de iteraciones del itinerario. Antes de pedir el primer pago, sabes exactamente qué pagas y por qué.</p></div>
        </details>

        <details class="qa reveal">
          <summary><span><span class="qa__num">03</span>¿Qué pasa si tengo que cancelar?</span><span class="qa__caret"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg></span></summary>
          <div class="qa__body"><p>El Precio del Diseño cubre el trabajo de diseño y no se reembolsa una vez entregado el itinerario aprobado. Las políticas de cancelación del viaje (hoteles, vuelos, actividades) dependen de cada proveedor; te las explicamos antes de cada pago y siempre recomendamos un seguro de cancelación.</p></div>
        </details>

        <details class="qa reveal">
          <summary><span><span class="qa__num">04</span>¿Puedo combinar destinos?</span><span class="qa__caret"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg></span></summary>
          <div class="qa__body"><p>Por supuesto. Hemos diseñado rutas que combinan Colombia + Cuba, Indonesia + Singapur, o Marruecos + España. <strong>Y no solo entre países</strong>: también <strong>dentro del propio país</strong>, saltando entre islas o regiones que requieren vuelos internos o barcos — piensa Bali → Java → las Gilis, o Lanzarote + La Graciosa. En esos casos, el diseño entra en el tier <strong>Firma</strong> o <strong>Premium</strong> según la complejidad. El precio del diseño es fijo; los costes en destino varían según los países.</p></div>
        </details>

        <details class="qa reveal">
          <summary><span><span class="qa__num">05</span>¿Tenéis viajes en grupo cerrado?</span><span class="qa__caret"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg></span></summary>
          <div class="qa__body"><p>Sí: nuestros <strong>Viajes de Autor</strong> son rutas con fecha cerrada, plazas limitadas y autor invitado (fotógrafo, escritor, chef). Tienen su propia página y precio único.</p></div>
        </details>

        <details class="qa reveal">
          <summary><span><span class="qa__num">06</span>¿La videollamada inicial es gratuita?</span><span class="qa__caret"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg></span></summary>
          <div class="qa__body"><p>Sí, sin compromiso. Charlamos 30–45 minutos sobre cómo viajas, qué te apetece y si tiene sentido trabajar juntos. Si encajamos, te pasamos una propuesta. Si no, te ayudamos a buscar otra opción.</p></div>
        </details>
      </div>
    </div>
  </section>

  <!-- ============== CTA ============== -->
  <section class="cta" id="cta">
    <div class="container">
      <div class="cta__panel reveal">
        <div>
          <div class="section-head__num" style="color:var(--accent-300)">08 · El primer paso</div>
          <h2>Empieza con una<br/><em>llamada de inspiración.</em></h2>
          <p>30 minutos para entender qué te mueve. Sin compromiso. Si encajamos, tendrás tu Boceto de Viaje en 48 horas.</p>
          <div class="bonus-48h">
            <span class="bonus-48h__star">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 7 7 .9-5.2 4.8 1.4 7.3L12 18.5 5.8 22l1.4-7.3L2 9.9 9 9z"/></svg>
            </span>
            <div>
              <strong>Bonus 48 h:</strong> si reservas durante la llamada, recibes el <strong>Boceto de Viaje</strong> en 48 h — incluido. Valorado en 300 €.
            </div>
          </div>
          <div class="meta">
            <span><b>30 min</b>duración</span>
            <span><b>Online</b>Google Meet</span>
            <span><b>Gratis</b>sin compromiso</span>
          </div>
        </div>
        <div class="cta__card">
          <div class="when">Próximos huecos · esta semana</div>
          <h4>Reserva tu llamada</h4>
          <div class="cta__slots">
            <button>Lun 10:00</button>
            <button>Mar 12:30</button>
            <button>Mié 17:00</button>
            <button>Jue 11:00</button>
            <button>Jue 19:00</button>
            <button>Vie 10:30</button>
          </div>
          <a class="full" href="<?php echo esc_url( $calendly_full ); ?>" target="_blank" rel="noopener">Abrir calendario completo</a>
        </div>
      </div>
    </div>
  </section>

</div><!-- /.ukiyo-precios -->

<script>
(function(){
  const root = document.querySelector('.ukiyo-precios');
  if(!root) return;

  // ---------- Reveal on scroll ----------
  const io = new IntersectionObserver(entries=>{
    entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); } });
  },{threshold:.12});
  root.querySelectorAll('.reveal').forEach(el=>io.observe(el));

  // ---------- Segmented controls ----------
  root.querySelectorAll('.seg').forEach(group=>{
    group.addEventListener('click', e=>{
      const b = e.target.closest('button'); if(!b) return;
      group.querySelectorAll('button').forEach(x=>x.setAttribute('aria-pressed', x===b ? 'true':'false'));
      group.dispatchEvent(new CustomEvent('change', {detail:{val:b.dataset.val}}));
    });
  });

  // ---------- Calculator ----------
  const destFactor = {indo:140, cr:165, col:120, mar:100, lan:115, ita:170};
  const destLabel  = {indo:'Indonesia', cr:'Costa Rica', col:'Colombia', mar:'Marruecos', lan:'Lanzarote', ita:'Italia'};
  const europeanDests = ['lan','ita'];
  const EU_FEE = 390;
  const comfortMul = {autentico:1, confort:1.45, boutique:2};
  const comfortLbl = {autentico:'Auténtico', confort:'Confort', boutique:'Boutique'};
  const planLbl    = {esencial:'Un destino', firma:'Multidestino', medida:'Grupo o complejo'};
  const feeNameMap = {esencial:'Diseño Esencial', firma:'Diseño Firma', medida:'Diseño Premium'};
  const feeAmount  = {esencial:590, firma:990, medida:1390};

  const state = {dest:'indo', plan:'esencial', days:12, pax:2, comfort:'autentico'};

  const $ = id => root.querySelector('#' + id);
  function fmt(n){return new Intl.NumberFormat('es-ES').format(Math.round(n));}
  function autoPlanFromDays(days){
    if(days<=8) return 'esencial';
    if(days<=15) return 'firma';
    return 'medida';
  }

  function compute(){
    const onSitePerDay = destFactor[state.dest] * comfortMul[state.comfort];
    const onSiteTotal = onSitePerDay * state.days;
    const isEU = europeanDests.includes(state.dest);
    const fee = isEU ? EU_FEE : feeAmount[state.plan];
    const designPerPax = fee / Math.max(1, state.pax);
    const totalPerPax = onSiteTotal + designPerPax;

    $('totalNum').textContent = fmt(onSiteTotal);
    $('perPax').textContent = state.pax===1 ? 'persona única' : 'por persona';
    $('totalDetail').textContent = `${state.days} días en ${destLabel[state.dest]}`;
    $('feeAmount').textContent = fmt(fee) + ' €';
    $('feeName').innerHTML = isEU
      ? feeNameMap[state.plan] + ' <span class="euro-tag">tarifa Europa</span>'
      : feeNameMap[state.plan];
    $('feeHint').textContent = isEU
      ? 'Tarifa fija de 390 € para destinos europeos, se reparte entre los viajeros.'
      : 'Precio fijo del diseño, se reparte entre los viajeros.';
    $('totalEstimated').textContent = fmt(totalPerPax);

    $('lblDest').textContent = destLabel[state.dest];
    $('lblPlan').textContent = planLbl[state.plan];
    $('lblDays').textContent = state.days;
    $('lblPax').textContent = state.pax;
    $('lblComfort').textContent = comfortLbl[state.comfort];
  }

  // ---------- Destination carousel ----------
  (function initDestCarousel(){
    const track = $('destTrack');
    const prev  = $('destPrev');
    const next  = $('destNext');
    const dotsWrap = $('destDots');
    if(!track || !prev || !next || !dotsWrap) return;

    const buttons = Array.from(track.querySelectorAll('button'));
    const VISIBLE = 4;
    const maxOffset = Math.max(0, buttons.length - VISIBLE);
    let offset = 0;

    for(let i=0;i<=maxOffset;i++){
      dotsWrap.appendChild(document.createElement('span'));
    }
    const dots = Array.from(dotsWrap.children);

    function update(){
      const buttonWidth = buttons[0].getBoundingClientRect().width;
      const gap = 0.4 * 16;
      track.style.transform = `translateX(-${offset * (buttonWidth + gap)}px)`;
      prev.disabled = offset===0;
      next.disabled = offset>=maxOffset;
      dots.forEach((d,i)=>d.classList.toggle('is-on', i===offset));
    }
    function ensureVisible(idx){
      if(idx < offset) offset = idx;
      else if(idx >= offset + VISIBLE) offset = idx - VISIBLE + 1;
      offset = Math.max(0, Math.min(maxOffset, offset));
      update();
    }
    prev.addEventListener('click', ()=>{ offset = Math.max(0, offset-1); update(); });
    next.addEventListener('click', ()=>{ offset = Math.min(maxOffset, offset+1); update(); });
    window.addEventListener('resize', update);

    track.addEventListener('click', e=>{
      const b = e.target.closest('button'); if(!b) return;
      buttons.forEach(x=>x.setAttribute('aria-pressed', x===b ? 'true':'false'));
      state.dest = b.dataset.val;
      ensureVisible(buttons.indexOf(b));
      compute();
    });

    requestAnimationFrame(update);
  })();

  const planGroup = root.querySelector('[data-field=plan]');
  const comfortGroup = root.querySelector('[data-field=comfort]');
  if(planGroup) planGroup.addEventListener('change', e=>{state.plan=e.detail.val;compute();});
  if(comfortGroup) comfortGroup.addEventListener('change', e=>{state.comfort=e.detail.val;compute();});

  const daysInput = $('days');
  const paxInput  = $('pax');
  if(daysInput){
    daysInput.addEventListener('input', e=>{
      state.days=+e.target.value;
      const suggested = autoPlanFromDays(state.days);
      if(suggested !== state.plan){
        state.plan = suggested;
        const grp = root.querySelector('[data-field=plan]');
        grp.querySelectorAll('button').forEach(b=>b.setAttribute('aria-pressed', b.dataset.val===suggested ? 'true':'false'));
      }
      compute();
    });
  }
  if(paxInput){
    paxInput.addEventListener('input', e=>{
      state.pax=+e.target.value;
      if(state.pax>=5 && state.plan!=='medida'){
        state.plan='medida';
        const grp = root.querySelector('[data-field=plan]');
        grp.querySelectorAll('button').forEach(b=>b.setAttribute('aria-pressed', b.dataset.val==='medida' ? 'true':'false'));
      }
      compute();
    });
  }

  compute();
})();
</script>

<?php get_footer(); ?>
