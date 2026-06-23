<?php
/**
 * Template: Front Page (Inicio)
 * Home rediseñada (Claude Design / Home.html) con el HEADER y el FOOTER del tema.
 * El CSS del diseño se acota al contenedor .uk-home para no afectar a la cabecera/pie.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( function_exists( 'pll_current_language' ) && 'en' === pll_current_language() ) {
    $english_front_page = __DIR__ . '/front-page-en.php';
    if ( file_exists( $english_front_page ) ) {
        require $english_front_page;
        return;
    }
}

$tpl              = get_template_directory_uri();
$destinations_url = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destinations' ) : home_url( '/destinos/' );
$pricing_url      = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'pricing' )      : home_url( '/precios/' );
$blog_url         = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'blog' )         : home_url( '/blog/' );
$about_url        = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'about' )        : home_url( '/nosotros/' );
$viajes_autor_url = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'viajes_autor' ) : home_url( '/viajes-de-autor/' );
$plan_trip_url    = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'plan_trip' )    : home_url( '/planifica-tu-viaje/' );

// Tipografias del diseno (Rowdies, DM Mono, Satoshi).
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'ukiyo-home-fonts',   'https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap', array(), null );
    wp_enqueue_style( 'ukiyo-home-satoshi', 'https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap', array(), null );
} );

get_header();
?>
<style>
.uk-home{
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
    --section-y:6.5rem;
    --radius:18px;
  }.uk-home *{box-sizing:border-box}html, .uk-home{margin:0;padding:0}html{scroll-behavior:smooth}.uk-home{background:var(--bg);color:var(--ink);font-family:var(--font-sans);font-weight:400;font-size:17px;line-height:1.6;-webkit-font-smoothing:antialiased;text-rendering:optimizeLegibility}.uk-home img{max-width:100%;display:block}.uk-home a{color:inherit;text-decoration:none}.uk-home button{font-family:inherit;cursor:pointer;border:none;background:none}.uk-home h1, .uk-home h2, .uk-home h3, .uk-home h4{font-family:var(--font-display);font-weight:400;letter-spacing:-0.01em;line-height:1.1;margin:0}.uk-home .container{max-width:var(--maxw);margin:0 auto;padding:0 1.75rem}.uk-home .nav{position:fixed;inset:0 0 auto 0;z-index:50;padding:1.1rem 0;transition:background .35s, backdrop-filter .35s, border-color .35s;border-bottom:1px solid transparent}.uk-home .nav .row{display:flex;align-items:center;justify-content:space-between;gap:2rem}.uk-home .nav.scrolled{background:rgba(254,252,248,.92);backdrop-filter:blur(14px) saturate(1.1);-webkit-backdrop-filter:blur(14px) saturate(1.1);border-bottom:1px solid var(--surface)}.uk-home .nav__logo img{height:38px;width:auto}.uk-home .nav__links{display:flex;gap:1.75rem;align-items:center}.uk-home .nav__links a{font-size:.95rem;color:#fff;transition:color .25s, opacity .25s;opacity:.92}.uk-home .nav__links a:hover{opacity:1}.uk-home .nav__links a.active{font-weight:600;border-bottom:2px solid currentColor;padding-bottom:2px}.uk-home .nav.scrolled .nav__links a{color:var(--ink-soft)}.uk-home .nav.scrolled .nav__links a:hover{color:var(--primary)}.uk-home .nav__cta{padding:.65rem 1.25rem;border-radius:999px;font-weight:600;font-size:.92rem;border:1.5px solid #fff;color:#fff;transition:all .25s}.uk-home .nav.scrolled .nav__cta{border-color:var(--secondary);color:#fff;background:var(--secondary)}.uk-home .nav__cta:hover{transform:translateY(-1px)}.uk-home .nav__mobile{display:none}
  @media (max-width:980px){.uk-home .nav__links, .uk-home .nav__cta{display:none}.uk-home .nav__mobile{display:flex;align-items:center;justify-content:center;width:40px;height:40px;color:#fff}.uk-home .nav.scrolled .nav__mobile{color:var(--ink-soft)}
  }.uk-home .hero{position:relative;height:100vh;min-height:640px;overflow:hidden;color:#fff}.uk-home .hero__slides{position:absolute;inset:0}.uk-home .hero__slide{position:absolute;inset:0;opacity:0;transition:opacity 1.1s ease;z-index:0}.uk-home .hero__slide.is-active{opacity:1;z-index:1}.uk-home .hero__slide img{width:100%;height:100%;object-fit:cover}.uk-home .hero__slide::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.55) 0%, rgba(0,0,0,.25) 38%, rgba(0,0,0,.6) 100%)}.uk-home .hero__inner{position:relative;z-index:2;height:100%;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;padding:6rem 1.5rem 7rem}.uk-home .hero__eyebrow{display:inline-flex;align-items:center;gap:.6rem;padding:.45rem 1rem;border-radius:999px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.28);backdrop-filter:blur(8px);font-size:.78rem;letter-spacing:.16em;text-transform:uppercase}.uk-home .hero__eyebrow .dot{width:6px;height:6px;border-radius:50%;background:var(--accent-300)}.uk-home .hero__title{font-size:clamp(2.8rem, 7vw, 6rem);font-weight:300;letter-spacing:-0.02em;line-height:.98;margin:1.6rem auto 1.6rem;max-width:18ch;text-shadow:0 2px 24px rgba(0,0,0,.3)}.uk-home .hero__title em{font-style:italic;color:var(--accent-300);font-weight:400}.uk-home .hero__sub{max-width:36rem;margin:0 auto;font-size:1.2rem;line-height:1.5;opacity:.95;text-shadow:0 2px 12px rgba(0,0,0,.4)}.uk-home .hero__cta{display:flex;gap:1rem;justify-content:center;margin-top:2.6rem;flex-wrap:wrap}.uk-home .btn{display:inline-flex;align-items:center;gap:.7rem;padding:1rem 1.6rem;border-radius:999px;font-weight:600;font-size:.95rem;transition:transform .25s, box-shadow .25s, background .25s;border:1.5px solid transparent}.uk-home .btn:hover{transform:translateY(-2px)}.uk-home .btn-primary{background:var(--primary);color:#fff;box-shadow:0 10px 30px -10px rgba(139,69,19,.5)}.uk-home .btn-primary:hover{background:var(--primary-700);box-shadow:0 14px 40px -10px rgba(139,69,19,.6)}.uk-home .btn-ghost{border-color:rgba(255,255,255,.5);color:#fff;backdrop-filter:blur(6px)}.uk-home .btn-ghost:hover{background:rgba(255,255,255,.12)}.uk-home .btn-outline{border-color:var(--ink);color:var(--ink)}.uk-home .btn-outline:hover{background:var(--ink);color:#fff}.uk-home .btn-soft{background:var(--surface);color:var(--ink);border:1px solid var(--line)}.uk-home .btn-soft:hover{background:#fff;border-color:var(--primary-300)}.uk-home .hero__arrows{position:absolute;inset:0;z-index:3;pointer-events:none}.uk-home .hero__arrow{position:absolute;top:50%;transform:translateY(-50%);pointer-events:auto;width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,.15);backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,.3);color:#fff;display:grid;place-items:center;transition:all .25s}.uk-home .hero__arrow:hover{background:rgba(255,255,255,.28);transform:translateY(-50%) scale(1.06)}.uk-home .hero__arrow.prev{left:1.5rem}.uk-home .hero__arrow.next{right:1.5rem}.uk-home .hero__arrow svg{width:18px;height:18px}
  @media (max-width:760px){.uk-home .hero__arrow{display:none}}.uk-home .hero__dots{position:absolute;bottom:2.4rem;left:50%;transform:translateX(-50%);display:flex;gap:.6rem;z-index:3}.uk-home .hero__dot{width:10px;height:10px;border-radius:999px;background:rgba(255,255,255,.5);transition:all .35s;cursor:pointer}.uk-home .hero__dot.is-active{background:#fff;width:30px}.uk-home section.section{padding:var(--section-y) 0;position:relative}.uk-home .section-head{display:grid;grid-template-columns:auto 1fr;gap:2.5rem;align-items:end;margin-bottom:3.5rem;padding-bottom:1.5rem;border-bottom:1px solid var(--line)}.uk-home .section-head__num{font-family:var(--font-mono);font-size:.85rem;color:var(--primary);letter-spacing:.12em;text-transform:uppercase}.uk-home .section-head__title{font-size:clamp(1.9rem, 3.6vw, 3rem);font-weight:300;letter-spacing:-0.015em;color:var(--ink)}.uk-home .section-head__title em{font-style:italic;color:var(--primary);font-weight:300}.uk-home .section-head__sub{color:var(--ink-soft);max-width:36rem;margin-top:.8rem}.uk-home .section-head__right{justify-self:end;text-align:right;max-width:28rem}
  @media (max-width:760px){.uk-home .section-head{grid-template-columns:1fr;gap:1rem}.uk-home .section-head__right{justify-self:start;text-align:left}
  }.uk-home .value{background:linear-gradient(180deg,var(--bg) 0%, var(--paper) 100%)}.uk-home .value__grid{display:grid;grid-template-columns:0.85fr 1fr 1fr 1fr;gap:3rem;align-items:start}.uk-home .value__title{font-size:clamp(2rem, 3.4vw, 2.8rem);font-weight:300;letter-spacing:-0.015em;line-height:1.05}.uk-home .value__title em{font-style:italic;color:var(--primary)}.uk-home .value__col h3{font-size:1.15rem;font-weight:600;font-family:var(--font-sans);margin:0 0 .35rem;position:relative;padding-bottom:.7rem;display:inline-block}.uk-home .value__col h3::after{content:"";position:absolute;left:0;right:-1rem;bottom:0;height:6px;background:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 8' preserveAspectRatio='none'><path d='M0 4 Q 25 0 50 4 T 100 4' stroke='%239CAF88' stroke-width='2' fill='none'/></svg>") no-repeat;background-size:100% 100%;opacity:.7}.uk-home .value__col .kicker{display:block;font-size:.82rem;font-weight:700;color:var(--primary);margin-bottom:.6rem;letter-spacing:.02em;text-transform:none}.uk-home .value__col p{color:var(--ink-soft);font-size:.95rem;line-height:1.6;margin:0}
  @media (max-width:980px){.uk-home .value__grid{grid-template-columns:1fr 1fr;gap:2rem}}
  @media (max-width:620px){.uk-home .value__grid{grid-template-columns:1fr}}.uk-home .process{background:var(--bg)}.uk-home .process__wrap{display:grid;grid-template-columns:1fr 1fr;gap:5rem;align-items:start}.uk-home .process__intro h2{font-size:clamp(2.2rem, 4vw, 3.4rem);font-weight:300;line-height:1;margin-bottom:1.4rem;letter-spacing:-0.02em}.uk-home .process__intro h2 em{font-style:italic;color:var(--secondary-700);font-weight:300}.uk-home .process__intro p{color:var(--ink-soft);margin-bottom:1.4rem;font-size:1.05rem;line-height:1.6}.uk-home .process__intro ul{list-style:none;padding:0;margin:0 0 2rem;display:flex;flex-direction:column;gap:.95rem}.uk-home .process__intro li{display:flex;align-items:flex-start;gap:.85rem;font-size:.97rem;line-height:1.5}.uk-home .process__intro li::before{content:"";flex:0 0 10px;width:10px;height:10px;border-radius:50%;background:var(--secondary);margin-top:.45rem}.uk-home .process__intro li strong{color:var(--ink);font-weight:600}.uk-home .process__intro .cta-row{display:flex;gap:.8rem;flex-wrap:wrap}.uk-home .process__steps{display:flex;flex-direction:column;gap:1.1rem}.uk-home .process__step{display:grid;grid-template-columns:auto 1fr;gap:1.4rem;background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:1.6rem 1.7rem;align-items:start;transition:transform .35s, box-shadow .35s, border-color .35s}.uk-home .process__step:hover{transform:translateY(-2px);box-shadow:0 18px 40px -25px rgba(139,69,19,.18);border-color:var(--primary-100)}.uk-home .process__num{font-family:var(--font-display);font-size:1.4rem;color:var(--primary);width:48px;height:48px;border:1px solid var(--primary-100);border-radius:50%;display:grid;place-items:center;flex-shrink:0}.uk-home .process__step h3{font-size:1.2rem;margin:0 0 .35rem;color:var(--ink)}.uk-home .process__step p{color:var(--ink-soft);font-size:.93rem;margin:0;line-height:1.55}
  @media (max-width:880px){.uk-home .process__wrap{grid-template-columns:1fr;gap:2.5rem}}.uk-home .ways{background:var(--surface)}.uk-home .ways__wrap{display:grid;grid-template-columns:0.9fr 1.1fr;gap:3rem;align-items:start}.uk-home .ways__intro p.eyebrow-text{font-family:var(--font-mono);font-size:.78rem;color:var(--primary);text-transform:uppercase;letter-spacing:.18em;margin:0 0 1rem}.uk-home .ways__intro h2{font-size:clamp(2rem, 3.8vw, 3.2rem);font-weight:300;letter-spacing:-0.015em;line-height:1.05;margin-bottom:1.2rem}.uk-home .ways__intro h2 em{font-style:italic;color:var(--primary)}.uk-home .ways__intro p{color:var(--ink-soft);font-size:1.05rem;line-height:1.6;max-width:34rem}.uk-home .ways__grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem}.uk-home .way{display:block;background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:1.8rem 1.6rem;transition:transform .35s, box-shadow .35s, border-color .35s;position:relative;overflow:hidden}.uk-home .way:hover{transform:translateY(-4px);box-shadow:0 24px 50px -28px rgba(44,44,44,.22);border-color:var(--primary-100)}.uk-home .way__icon{width:44px;height:44px;border-radius:12px;display:grid;place-items:center;background:var(--primary-50);color:var(--primary);margin-bottom:1.2rem}.uk-home .way:nth-child(2) .way__icon{background:rgba(156,175,136,.18);color:var(--secondary-700)}.uk-home .way:nth-child(3) .way__icon{background:var(--accent-50);color:#9C7B4A}.uk-home .way:nth-child(4) .way__icon{background:#FEF1EC;color:var(--primary-700)}.uk-home .way h3{font-size:1.4rem;font-weight:400;margin-bottom:.55rem;color:var(--ink)}.uk-home .way p{color:var(--ink-soft);font-size:.93rem;line-height:1.55;margin:0 0 1.2rem}.uk-home .way__link{display:inline-flex;align-items:center;gap:.45rem;color:var(--primary);font-weight:600;font-size:.88rem;transition:gap .25s}.uk-home .way:hover .way__link{gap:.7rem}
  @media (max-width:880px){.uk-home .ways__wrap{grid-template-columns:1fr;gap:2.5rem}.uk-home .ways__grid{grid-template-columns:1fr}}.uk-home .dest{background:var(--bg)}.uk-home .dest__carousel{position:relative}.uk-home .dest__viewport{overflow:hidden}.uk-home .dest__track{display:grid;grid-auto-flow:column;grid-auto-columns:calc((100% - 3 * 1.25rem) / 4);gap:1.25rem;transition:transform .55s cubic-bezier(.4,0,.2,1)}.uk-home .dest__card{position:relative;height:480px;border-radius:22px;overflow:hidden;cursor:pointer;background:#000;display:block}.uk-home .dest__card img{width:100%;height:100%;object-fit:cover;transition:transform 1s cubic-bezier(.4,0,.2,1)}.uk-home .dest__card:hover img{transform:scale(1.06)}.uk-home .dest__card::after{content:"";position:absolute;inset:0;background:linear-gradient(to bottom,rgba(0,0,0,.05) 30%, rgba(0,0,0,.78) 100%)}.uk-home .dest__body{position:absolute;left:0;right:0;bottom:0;padding:1.7rem;z-index:1;color:#fff}.uk-home .dest__region{display:inline-flex;align-items:center;gap:.4rem;font-family:var(--font-mono);color:var(--accent-300);font-size:.7rem;letter-spacing:.18em;text-transform:uppercase;margin-bottom:.5rem;font-weight:500}.uk-home .dest__region svg{width:13px;height:13px}.uk-home .dest__body h3{font-size:1.9rem;font-weight:400;line-height:1;margin-bottom:.6rem;text-shadow:0 2px 12px rgba(0,0,0,.3)}.uk-home .dest__body p{font-size:.88rem;line-height:1.5;opacity:.88;margin:0;max-width:24rem}.uk-home .dest__eu{position:absolute;top:1.2rem;right:1.2rem;background:rgba(255,255,255,.92);color:var(--primary-700);font-family:var(--font-mono);font-size:.66rem;letter-spacing:.14em;text-transform:uppercase;padding:.25rem .65rem;border-radius:999px;z-index:2;font-weight:600}.uk-home .dest__controls{display:flex;justify-content:space-between;align-items:center;margin-top:1.6rem}.uk-home .dest__dots{display:flex;gap:.4rem}.uk-home .dest__dots span{width:8px;height:8px;border-radius:50%;background:var(--line);transition:all .3s}.uk-home .dest__dots span.is-on{background:var(--primary);width:24px;border-radius:4px}.uk-home .dest__arrows{display:flex;gap:.6rem}.uk-home .dest__arrow{width:46px;height:46px;border-radius:50%;background:#fff;border:1px solid var(--line);color:var(--ink);display:grid;place-items:center;transition:all .25s}.uk-home .dest__arrow:hover:not(:disabled){background:var(--primary);color:#fff;border-color:var(--primary);transform:scale(1.06)}.uk-home .dest__arrow:disabled{opacity:.3;cursor:not-allowed}.uk-home .dest__arrow svg{width:18px;height:18px}

  @media (max-width:980px){.uk-home .dest__track{grid-auto-columns:calc((100% - 1.25rem) / 2)}
  }
  @media (max-width:620px){.uk-home .dest__track{grid-auto-columns:85%}.uk-home .dest__card{height:420px}
  }.uk-home .autor{background:var(--paper)}.uk-home .autor__grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.4rem}.uk-home .autor__card{background:#fff;border:1px solid var(--line);border-radius:22px;overflow:hidden;display:flex;flex-direction:column;transition:transform .4s, box-shadow .4s, border-color .4s;color:inherit;text-decoration:none}.uk-home .autor__card:hover{transform:translateY(-5px);box-shadow:0 30px 60px -30px rgba(44,44,44,.25);border-color:var(--primary-300)}.uk-home .autor__media{position:relative;height:220px;overflow:hidden}.uk-home .autor__media img{width:100%;height:100%;object-fit:cover;transition:transform .8s}.uk-home .autor__card:hover .autor__media img{transform:scale(1.08)}.uk-home .autor__tag{position:absolute;top:1rem;left:1rem;background:rgba(254,252,248,.92);color:var(--primary-700);font-family:var(--font-mono);font-size:.66rem;letter-spacing:.14em;text-transform:uppercase;padding:.3rem .7rem;border-radius:999px;font-weight:600;backdrop-filter:blur(6px)}.uk-home .autor__body{padding:1.5rem 1.6rem 1.7rem;display:flex;flex-direction:column;flex:1}.uk-home .autor__author{display:flex;align-items:center;gap:.7rem;margin-bottom:1rem}.uk-home .autor__author img{width:42px;height:42px;border-radius:50%;object-fit:cover;border:2px solid #fff;box-shadow:0 2px 8px rgba(0,0,0,.1);flex:0 0 42px}.uk-home .autor__author .name{font-size:.78rem;font-weight:700;color:var(--primary);letter-spacing:.04em}.uk-home .autor__author .role{display:block;font-size:.72rem;color:var(--ink-soft);font-weight:500;margin-top:1px}.uk-home .autor__title{font-size:1.3rem;font-weight:400;line-height:1.15;margin-bottom:.7rem;color:var(--ink)}.uk-home .autor__desc{color:var(--ink-soft);font-size:.92rem;line-height:1.55;margin:0 0 1.3rem;flex:1}.uk-home .autor__meta{display:flex;justify-content:space-between;align-items:center;padding-top:1.1rem;border-top:1px dashed var(--line)}.uk-home .autor__pills{display:flex;gap:.4rem;flex-wrap:wrap}.uk-home .autor__pills span{font-size:.7rem;font-weight:600;border:1.5px solid var(--accent-300);color:var(--ink);padding:.3rem .65rem;border-radius:999px;font-family:var(--font-mono);letter-spacing:.03em}.uk-home .autor__price{font-family:var(--font-display);font-size:1.3rem;color:var(--ink);line-height:1}.uk-home .autor__price small{font-family:var(--font-sans);font-size:.66rem;color:var(--ink-soft);font-weight:500;display:block;text-transform:uppercase;letter-spacing:.12em;margin-bottom:.15rem}.uk-home .autor__more{text-align:center;margin-top:3rem}
  @media (max-width:980px){.uk-home .autor__grid{grid-template-columns:1fr;max-width:36rem;margin:0 auto}}.uk-home .reviews{background:var(--bg)}.uk-home .reviews__slider{position:relative;background:#fff;border:1px solid var(--line);border-radius:24px;overflow:hidden;box-shadow:0 30px 80px -45px rgba(44,44,44,.2)}.uk-home .reviews__track{display:grid;grid-template-columns:repeat(4, 100%);transition:transform .65s cubic-bezier(.4,0,.2,1)}.uk-home .review{display:grid;grid-template-columns:1fr 1fr;min-height:480px}.uk-home .review__media{position:relative;overflow:hidden}.uk-home .review__media img{width:100%;height:100%;object-fit:cover}.uk-home .review__media::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg, rgba(0,0,0,0) 50%, rgba(0,0,0,.3) 100%)}.uk-home .review__body{padding:3rem 3rem;display:flex;flex-direction:column;justify-content:center;background:#fff;position:relative}.uk-home .review__body::before{content:"\201C";position:absolute;top:1.5rem;right:2rem;font-family:var(--font-display);font-size:7rem;color:var(--primary-100);line-height:.5;font-weight:400}.uk-home .review__stars{color:var(--accent);display:flex;gap:.25rem;margin-bottom:1.2rem}.uk-home .review__title{font-size:1.6rem;font-weight:400;line-height:1.2;margin-bottom:1rem;color:var(--ink);max-width:24rem}.uk-home .review__text{font-size:1rem;line-height:1.65;color:var(--ink-soft);margin-bottom:2rem;max-width:28rem}.uk-home .review__footer{display:flex;align-items:center;justify-content:space-between;padding-top:1.2rem;border-top:1px solid var(--line);max-width:28rem}.uk-home .review__author strong{display:block;color:var(--ink);font-weight:600;font-size:1rem}.uk-home .review__author span{color:var(--ink-soft);font-size:.85rem}.uk-home .review__date{font-family:var(--font-mono);font-size:.75rem;color:var(--ink-soft);letter-spacing:.05em}
  @media (max-width:860px){.uk-home .review{grid-template-columns:1fr;min-height:auto}.uk-home .review__media{height:260px}.uk-home .review__body{padding:2rem 1.8rem}.uk-home .review__body::before{font-size:5rem;top:1rem;right:1.4rem}
  }.uk-home .reviews__nav{display:flex;justify-content:space-between;align-items:center;margin-top:1.6rem}.uk-home .reviews__dots{display:flex;gap:.4rem}.uk-home .reviews__dots span{width:8px;height:8px;border-radius:50%;background:var(--line);transition:all .3s;cursor:pointer}.uk-home .reviews__dots span.is-on{background:var(--primary);width:24px;border-radius:4px}.uk-home .reviews__arrows{display:flex;gap:.6rem}.uk-home .reviews__arrow{width:46px;height:46px;border-radius:50%;background:#fff;border:1px solid var(--line);color:var(--ink);display:grid;place-items:center;transition:all .25s}.uk-home .reviews__arrow:hover{background:var(--primary);color:#fff;border-color:var(--primary);transform:scale(1.06)}.uk-home .reviews__arrow svg{width:18px;height:18px}.uk-home .ctafinal{background:linear-gradient(160deg, var(--paper) 0%, #FDF7F3 100%);position:relative;overflow:hidden}.uk-home .ctafinal__box{max-width:760px;margin:0 auto;text-align:center;position:relative;z-index:1;padding:1rem 0}.uk-home .ctafinal__stamp{display:inline-flex;align-items:center;gap:.6rem;font-family:var(--font-mono);font-size:.78rem;color:var(--primary);letter-spacing:.18em;text-transform:uppercase;margin-bottom:1.2rem}.uk-home .ctafinal__stamp .dot{width:6px;height:6px;border-radius:50%;background:var(--primary)}.uk-home .ctafinal h2{font-size:clamp(2.2rem, 4.5vw, 3.6rem);font-weight:300;letter-spacing:-0.02em;line-height:1.05;margin-bottom:1.2rem}.uk-home .ctafinal h2 em{font-style:italic;color:var(--primary)}.uk-home .ctafinal p{font-size:1.15rem;color:var(--ink-soft);margin-bottom:2.2rem;line-height:1.55;max-width:34rem;margin-left:auto;margin-right:auto}.uk-home .ctafinal__buttons{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap}.uk-home .ctafinal::before{content:"";position:absolute;top:-200px;right:-200px;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle, rgba(212,165,116,.25), transparent 70%);z-index:0}.uk-home .ctafinal::after{content:"";position:absolute;bottom:-200px;left:-200px;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle, rgba(156,175,136,.18), transparent 70%);z-index:0}.uk-home .wa-icon{width:22px;height:22px;display:inline-block;background:#25D366;border-radius:50%;position:relative}.uk-home .wa-icon::after{content:"";position:absolute;inset:5px;background:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'><path d='M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm0 18.15h-.01c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.264 8.264 0 0 1-1.26-4.39c0-4.54 3.7-8.24 8.25-8.24 2.2 0 4.27.86 5.83 2.42a8.183 8.183 0 0 1 2.41 5.83c0 4.55-3.7 8.24-8.24 8.24z'/></svg>") no-repeat center/contain}.uk-home footer.foot{background:var(--ink);color:#fff;padding:3.5rem 0 2rem}.uk-home .foot__row{display:flex;justify-content:space-between;align-items:center;gap:2rem;flex-wrap:wrap}.uk-home .foot__row .legal{opacity:.6;font-size:.85rem}.uk-home .foot__row img{height:34px;width:auto;opacity:.92}.uk-home .foot__row .links{display:flex;gap:1.4rem;flex-wrap:wrap}.uk-home .foot__row .links a{font-size:.92rem;opacity:.85;transition:opacity .25s}.uk-home .foot__row .links a:hover{opacity:1}.uk-home .reveal{opacity:0;transform:translateY(28px);transition:opacity .85s ease, transform .85s ease;will-change:opacity,transform}.uk-home .reveal.is-visible{opacity:1;transform:translateY(0)}
  @media (prefers-reduced-motion:reduce){.uk-home .reveal{opacity:1;transform:none;transition:none}.uk-home .hero__slide{transition:none}
  }
</style>

<main class="uk-home">
<!-- ============== HERO ============== -->
<section class="hero" id="hero">
  <div class="hero__slides" id="heroSlides">
    <div class="hero__slide is-active"><img src="<?php echo $tpl; ?>/assets/home/hero-costarica.webp" alt="Viajes personalizados a Costa Rica" /></div>
    <div class="hero__slide"><img src="<?php echo $tpl; ?>/assets/home/hero-marruecos.webp" alt="Viajes personalizados a Marruecos" /></div>
    <div class="hero__slide"><img src="<?php echo $tpl; ?>/assets/home/hero-colombia.webp" alt="Viajes personalizados a Colombia" /></div>
  </div>

  <div class="hero__inner">
    <span class="hero__eyebrow"><span class="dot"></span>浮世 · Ukiyo · El mundo flotante</span>
    <h1 class="hero__title"><em>Viajes a medida</em><br/>diseñados contigo.</h1>
    <p class="hero__sub">Diseñamos rutas en destinos que conocemos de primera mano. Nada de catálogos genéricos. Solo experiencia real.</p>
    <div class="hero__cta">
      <a class="btn btn-primary" href="#cta">Diseña tu viaje a medida
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
      <a class="btn btn-ghost" href="#autor">Ver viajes de autor</a>
    </div>
  </div>

  <div class="hero__arrows">
    <button class="hero__arrow prev" id="heroPrev" aria-label="Anterior">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <button class="hero__arrow next" id="heroNext" aria-label="Siguiente">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
  </div>
  <div class="hero__dots" id="heroDots">
    <span class="hero__dot is-active"></span>
    <span class="hero__dot"></span>
    <span class="hero__dot"></span>
  </div>
</section>

<!-- ============== VALUE ============== -->
<section class="section value">
  <div class="container">
    <div class="value__grid">
      <div class="value__col reveal">
        <h2 class="value__title"><em>¿Por qué</em><br/>somos<br/>mejores?</h2>
      </div>
      <div class="value__col reveal">
        <h3>Sabemos lo que hacemos</h3>
        <span class="kicker">Más que una agencia de viajes</span>
        <p>Solo organizamos viajes a destinos donde hemos estado, explorado y entendido cada detalle. Nada de catálogos genéricos.</p>
      </div>
      <div class="value__col reveal">
        <h3>Experiencias inolvidables</h3>
        <span class="kicker">Diseñados contigo, desde cero</span>
        <p>Cada viaje es único porque cada viajero lo es. Escuchamos, proponemos y ajustamos hasta que la ruta encaje contigo, no con un modelo predefinido.</p>
      </div>
      <div class="value__col reveal">
        <h3>Centrados en ti</h3>
        <span class="kicker">Menos cantidad. Más intención.</span>
        <p>Preferimos hacer pocos viajes bien hechos. Sin prisas, sin masificación y con el tiempo necesario para que cada viaje tenga sentido.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============== PROCESO ============== -->
<section class="section process">
  <div class="container">
    <div class="section-head reveal">
      <div>
        <div class="section-head__num">01 · Cómo trabajamos</div>
        <h2 class="section-head__title">Viajes personalizados<br/><em>diseñados contigo.</em></h2>
      </div>
      <div class="section-head__right">
        <p class="section-head__sub">No vendemos paquetes cerrados. Escuchamos lo que te mueve y construimos una ruta que encaje con tu ritmo, tu presupuesto y tu forma de viajar.</p>
      </div>
    </div>

    <div class="process__wrap">
      <div class="process__intro reveal">
        <ul>
          <li><span><strong>Asesoría honesta.</strong> Te contamos qué merece la pena y qué no. Sin turistas en masa.</span></li>
          <li><span><strong>Alojamientos con alma.</strong> Pequeños hoteles, lodges y casas locales que suman al viaje.</span></li>
          <li><span><strong>Contacto cercano.</strong> Estamos contigo antes y durante el viaje por si algo se tuerce.</span></li>
        </ul>
        <div class="cta-row">
          <a href="#cta" class="btn btn-primary">Empezar mi viaje
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <a href="<?php echo esc_url($destinations_url); ?>" class="btn btn-outline">Ver destinos</a>
        </div>
      </div>

      <div class="process__steps">
        <div class="process__step reveal">
          <span class="process__num">1</span>
          <div>
            <h3>Cuéntanos qué te apetece</h3>
            <p>Un breve formulario o una videollamada donde nos hablas de ti, tus fechas, tu presupuesto y cómo te gusta viajar.</p>
          </div>
        </div>
        <div class="process__step reveal">
          <span class="process__num">2</span>
          <div>
            <h3>Diseñamos tu ruta ideal</h3>
            <p>Te proponemos un itinerario claro, con opciones de actividades y alojamientos. Lo afinamos juntos hasta que encaje contigo.</p>
          </div>
        </div>
        <div class="process__step reveal">
          <span class="process__num">3</span>
          <div>
            <h3>Reservas seguras y acompañamiento</h3>
            <p>Te ayudamos con la parte práctica y nos quedamos al otro lado del WhatsApp durante el viaje. Tú solo te ocupas de vivirlo.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============== FORMAS DE VIAJAR ============== -->
<section class="section ways">
  <div class="container">
    <div class="ways__wrap">
      <div class="ways__intro reveal">
        <p class="eyebrow-text">02 · Elige tu forma de viajar</p>
        <h2>Cuatro formas de<br/><em>diseñar tu viaje.</em></h2>
        <p>Cada viajero necesita algo distinto. Podemos crear una ruta privada, una luna de miel, un viaje para tu grupo o una propuesta completamente a medida.</p>
      </div>

      <div class="ways__grid">
        <a href="#cta" class="way reveal">
          <div class="way__icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3l2.5 6 6.5.5-5 4.5 1.5 6.5L12 17l-5.5 3.5L8 14 3 9.5l6.5-.5L12 3z" stroke-linejoin="round" stroke-linecap="round"/></svg>
          </div>
          <h3>Viajes a medida</h3>
          <p>Rutas privadas y flexibles, pensadas desde cero para tu ritmo y tus intereses.</p>
          <span class="way__link">Diseñar mi ruta →</span>
        </a>

        <a href="#cta" class="way reveal">
          <div class="way__icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21s-7-4.5-7-11a4.5 4.5 0 0 1 7-3.7A4.5 4.5 0 0 1 19 10c0 6.5-7 11-7 11z" stroke-linejoin="round"/></svg>
          </div>
          <h3>Viajes de novios</h3>
          <p>Lunas de miel con calma, alojamientos cuidados y momentos especiales bien elegidos.</p>
          <span class="way__link">Diseñar mi luna de miel →</span>
        </a>

        <a href="#cta" class="way reveal">
          <div class="way__icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="9" r="2.5"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6M14 20c0-2.4 1.6-4.5 3.8-5.2"/></svg>
          </div>
          <h3>Viajes en grupo reducido</h3>
          <p>Viajes para compartir ruta sin perder cuidado, criterio ni cercanía con el destino.</p>
          <span class="way__link">Ver grupos abiertos →</span>
        </a>

        <a href="#cta" class="way reveal">
          <div class="way__icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4" stroke-linecap="round"/></svg>
          </div>
          <h3>Viajes privados</h3>
          <p>Una ruta propia para parejas, familias, amigos o celebraciones, sin salidas cerradas.</p>
          <span class="way__link">Diseñar viaje privado →</span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============== DESTINOS ============== -->
<section class="section dest" id="destinos">
  <div class="container">
    <div class="section-head reveal">
      <div>
        <div class="section-head__num">03 · Nuestros destinos</div>
        <h2 class="section-head__title">Estos son nuestros<br/><em>destinos.</em></h2>
      </div>
      <div class="section-head__right">
        <p class="section-head__sub">Cada uno nos despertó algo distinto. Recorridos por completo para ofrecerte la mejor experiencia de viaje, sin preocupaciones.</p>
      </div>
    </div>

    <div class="dest__carousel reveal">
      <div class="dest__viewport">
        <div class="dest__track" id="destTrack">

          <a class="dest__card" href="#cta">
            <img src="<?php echo $tpl; ?>/assets/home/dest-indonesia.webp" alt="Indonesia" />
            <div class="dest__body">
              <span class="dest__region">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                Sudeste Asiático
              </span>
              <h3>Indonesia</h3>
              <p>Tradiciones vivas, templos y ceremonias. Ideal si buscas un viaje con mucha profundidad cultural.</p>
            </div>
          </a>

          <a class="dest__card" href="#cta">
            <img src="<?php echo $tpl; ?>/assets/home/dest-costarica.webp" alt="Costa Rica" />
            <div class="dest__body">
              <span class="dest__region">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                América Central
              </span>
              <h3>Costa Rica</h3>
              <p>Selvas, volcanes y vida salvaje. Perfecto si necesitas parar, respirar y reconectar con la naturaleza.</p>
            </div>
          </a>

          <a class="dest__card" href="#cta">
            <img src="<?php echo $tpl; ?>/assets/home/dest-colombia.webp" alt="Colombia" />
            <div class="dest__body">
              <span class="dest__region">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                Sudamérica
              </span>
              <h3>Colombia</h3>
              <p>Colores, música y gente que te hace sentir en casa desde el primer día. Un viaje lleno de vida y energía.</p>
            </div>
          </a>

          <a class="dest__card" href="#cta">
            <img src="<?php echo $tpl; ?>/assets/home/dest-marruecos.webp" alt="Marruecos" />
            <div class="dest__body">
              <span class="dest__region">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                Norte de África
              </span>
              <h3>Marruecos</h3>
              <p>Desierto, medinas y rutas alejadas del turismo de masas. Un viaje sensorial que desconecta.</p>
            </div>
          </a>

          <a class="dest__card" href="#cta">
            <span class="dest__eu">🇪🇺 Europa · 390 €</span>
            <img src="<?php echo $tpl; ?>/assets/home/dest-lanzarote.webp" alt="Lanzarote" />
            <div class="dest__body">
              <span class="dest__region">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                Islas Canarias · España
              </span>
              <h3>Lanzarote</h3>
              <p>Volcanes, vino en arena negra y La Graciosa. Una isla escenográfica para desconectar sin coger un avión largo.</p>
            </div>
          </a>

          <a class="dest__card" href="#cta">
            <span class="dest__eu">🇪🇺 Europa · 390 €</span>
            <img src="<?php echo $tpl; ?>/assets/home/dest-italia.webp" alt="Italia" />
            <div class="dest__body">
              <span class="dest__region">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                Europa Mediterránea
              </span>
              <h3>Italia</h3>
              <p>De los Dolomitas a Sicilia, pasando por Puglia y la Costa Amalfitana. Sabor, arte y paisaje en un mismo viaje.</p>
            </div>
          </a>

        </div>
      </div>

      <div class="dest__controls">
        <div class="dest__dots" id="destDots"></div>
        <div class="dest__arrows">
          <button class="dest__arrow" id="destPrev" aria-label="Anterior">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
          <button class="dest__arrow" id="destNext" aria-label="Siguiente">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============== VIAJES DE AUTOR ============== -->
<section class="section autor" id="autor">
  <div class="container">
    <div class="section-head reveal">
      <div>
        <div class="section-head__num">04 · Viajes de autor</div>
        <h2 class="section-head__title">Viajes de autor<br/><em>creados por locales.</em></h2>
      </div>
      <div class="section-head__right">
        <p class="section-head__sub">Itinerarios únicos diseñados por personas que viven en el destino. No son guías turísticos: son locales que comparten su mundo contigo.</p>
      </div>
    </div>

    <?php
    // Query: 3 viajes de autor publicados más recientes (sticky priorizados si los hay).
    $home_autor_query = new WP_Query( [
      'post_type'       => 'viaje_autor',
      'post_status'     => 'publish',
      'posts_per_page'  => 3,
      'orderby'         => 'date',
      'order'           => 'DESC',
      'ignore_sticky_posts' => false,
    ] );
    ?>
    <div class="autor__grid">
      <?php if ( $home_autor_query->have_posts() ) : ?>
        <?php while ( $home_autor_query->have_posts() ) : $home_autor_query->the_post();
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
          $primary_tag = $tags[0] ?? '';
        ?>
        <a class="autor__card reveal" href="<?php the_permalink(); ?>">
          <div class="autor__media">
            <?php if ( $primary_tag ) : ?>
              <span class="autor__tag"><?php echo esc_html( $primary_tag ); ?></span>
            <?php endif; ?>
            <?php if ( $img ) : ?>
              <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy" decoding="async" />
            <?php endif; ?>
          </div>
          <div class="autor__body">
            <?php if ( $exp_n || $exp_img ) : ?>
              <div class="autor__author">
                <?php if ( $exp_img ) : ?>
                  <img src="<?php echo esc_url( $exp_img ); ?>" alt="<?php echo esc_attr( $exp_n ); ?>" loading="lazy" />
                <?php endif; ?>
                <div>
                  <?php if ( $exp_n ) : ?><span class="name"><?php echo esc_html( $exp_n ); ?></span><?php endif; ?>
                  <?php if ( $exp_t ) : ?><span class="role"><?php echo esc_html( $exp_t ); ?></span><?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
            <h3 class="autor__title"><?php echo wp_kses( get_the_title(), [ 'em' => [], 'strong' => [] ] ); ?></h3>
            <?php if ( $subt ) : ?>
              <p class="autor__desc"><?php echo esc_html( $subt ); ?></p>
            <?php endif; ?>
            <div class="autor__meta">
              <div class="autor__pills">
                <?php if ( $dur ) : ?><span><?php echo esc_html( $dur ); ?></span><?php endif; ?>
                <?php if ( $grp ) : ?><span><?php echo esc_html( $grp ); ?></span><?php endif; ?>
              </div>
              <?php if ( $price ) : ?>
                <div class="autor__price"><small>desde</small><?php echo esc_html( $price ); ?></div>
              <?php endif; ?>
            </div>
          </div>
        </a>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>

    <div class="autor__more">
      <a href="<?php echo esc_url($viajes_autor_url); ?>" class="btn btn-soft">Ver todos los viajes de autor
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- ============== RESEÑAS ============== -->
<section class="section reviews" id="reviews">
  <div class="container">
    <div class="section-head reveal">
      <div>
        <div class="section-head__num">05 · Lo que cuentan</div>
        <h2 class="section-head__title">Historias que<br/><em>dejan huella.</em></h2>
      </div>
      <div class="section-head__right">
        <p class="section-head__sub">Más allá de las fotos, lo que queda son las sensaciones. Esto cuentan algunas de las personas que ya viajaron con Ukiyo.</p>
      </div>
    </div>

    <div class="reviews__slider reveal">
      <div class="reviews__track" id="reviewsTrack">

        <div class="review">
          <div class="review__media"><img src="<?php echo $tpl; ?>/assets/home/review-maite.webp" alt="Maite y Ramón en Bali" /></div>
          <div class="review__body">
            <div class="review__stars">★★★★★</div>
            <h3 class="review__title">"Sentimos que alguien pensó el viaje con nosotros"</h3>
            <p class="review__text">Experiencia y plan de viaje con Ukiyo 200% recomendable. Fuimos de viaje de novios a Bali y la verdad es que no pudo ser mejor. Sergio nos guió el viaje, nos lo cuadró todo perfectamente y da consejos que las agencias habitualmente no dan. Profesional como la copa de un pino.</p>
            <div class="review__footer">
              <div class="review__author"><strong>Maite y Ramón</strong><span>Bali, Indonesia</span></div>
              <span class="review__date">Septiembre 2024</span>
            </div>
          </div>
        </div>

        <div class="review">
          <div class="review__media"><img src="<?php echo $tpl; ?>/assets/home/review-maria.webp" alt="María y Edu en Java" /></div>
          <div class="review__body">
            <div class="review__stars">★★★★★</div>
            <h3 class="review__title">"Un viaje auténtico, con alma"</h3>
            <p class="review__text">Gracias a Ukiyo no solo visitamos Indonesia, la vivimos de verdad. Desde el primer día sentimos mucha tranquilidad: todo estaba perfectamente organizado y pudimos despreocuparnos. Cuidaron cada detalle y nos crearon un itinerario adaptado a lo que buscábamos: un viaje auténtico, con alma, lejos de lo típico.</p>
            <div class="review__footer">
              <div class="review__author"><strong>María y Edu</strong><span>Isla de Java, Indonesia</span></div>
              <span class="review__date">Julio 2025</span>
            </div>
          </div>
        </div>

        <div class="review">
          <div class="review__media"><img src="<?php echo $tpl; ?>/assets/home/review-carmen.webp" alt="Carmen y Jose Ángel en Komodo" /></div>
          <div class="review__body">
            <div class="review__stars">★★★★★</div>
            <h3 class="review__title">"Experiencias auténticas y humanas"</h3>
            <p class="review__text">Viajar a Indonesia con Ukiyo ha sido una aventura excepcional, un viaje personalizado al 100% donde hemos podido disfrutar de experiencias auténticas y humanas, sin el agobio del turismo masivo. El esfuerzo y el trabajo detrás de la organización ha hecho que el viaje sea muy top. ¡Estamos deseando repetir!</p>
            <div class="review__footer">
              <div class="review__author"><strong>Carmen y Jose Ángel</strong><span>Komodo, Indonesia</span></div>
              <span class="review__date">Septiembre 2025</span>
            </div>
          </div>
        </div>

        <div class="review">
          <div class="review__media"><img src="<?php echo $tpl; ?>/assets/home/review-carolina.webp" alt="Carolina y Carmen en Cuba" /></div>
          <div class="review__body">
            <div class="review__stars">★★★★★</div>
            <h3 class="review__title">"Cada conversación, un pequeño tesoro"</h3>
            <p class="review__text">Lo mejor de Cuba es su gente. La calidez, las risas, las historias compartidas sin prisa… cada conversación parecía un pequeño tesoro. Pasar una tarde aprendiendo a bailar son con una familia local fue uno de esos momentos que te reconcilian con la vida.</p>
            <div class="review__footer">
              <div class="review__author"><strong>Carolina y Carmen</strong><span>Cuba</span></div>
              <span class="review__date">Marzo 2025</span>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="reviews__nav">
      <div class="reviews__dots" id="reviewsDots"></div>
      <div class="reviews__arrows">
        <button class="reviews__arrow" id="reviewsPrev" aria-label="Anterior">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
        <button class="reviews__arrow" id="reviewsNext" aria-label="Siguiente">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
      </div>
    </div>
  </div>
</section>

<!-- ============== CTA FINAL ============== -->
<section class="section ctafinal" id="cta">
  <div class="container">
    <div class="ctafinal__box reveal">
      <span class="ctafinal__stamp"><span class="dot"></span>道 · Empezamos juntos</span>
      <h2>Empezamos por<br/><em>entender tu viaje.</em></h2>
      <p>Cuéntanos qué destino tienes en mente, cómo te gusta viajar y qué ritmo necesitas. A partir de ahí diseñamos una ruta clara, cuidada y a medida.</p>
      <div class="ctafinal__buttons">
        <a href="<?php echo esc_url($plan_trip_url); ?>" class="btn btn-primary">Diseñar mi viaje a medida
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a href="https://wa.me/message/CS2LNI6YHSETO1" target="_blank" rel="noopener" class="btn btn-outline">
          <span class="wa-icon"></span> Escríbenos por WhatsApp
        </a>
      </div>
    </div>
  </div>
</section>


</main>

<script>
  // ---------- Reveal on scroll ----------
  const io = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{
      if(e.isIntersecting){e.target.classList.add('is-visible'); io.unobserve(e.target);}
    });
  }, {threshold:.12});
  document.querySelectorAll('.reveal').forEach(el=>io.observe(el));

  // ---------- HERO slider ----------
  (function(){
    const slides = document.querySelectorAll('.hero__slide');
    const dots   = document.querySelectorAll('.hero__dot');
    const prev   = document.getElementById('heroPrev');
    const next   = document.getElementById('heroNext');
    let i = 0; let timer;
    function go(n){
      i = (n + slides.length) % slides.length;
      slides.forEach((s,k)=>s.classList.toggle('is-active', k===i));
      dots.forEach((d,k)=>d.classList.toggle('is-active', k===i));
    }
    function start(){ timer = setInterval(()=>go(i+1), 6500); }
    function stop(){ clearInterval(timer); }
    prev.addEventListener('click', ()=>{go(i-1); stop(); start();});
    next.addEventListener('click', ()=>{go(i+1); stop(); start();});
    dots.forEach((d,k)=>d.addEventListener('click', ()=>{go(k); stop(); start();}));
    document.getElementById('hero').addEventListener('mouseenter', stop);
    document.getElementById('hero').addEventListener('mouseleave', start);
    // touch
    let sx=0;
    document.getElementById('hero').addEventListener('touchstart', e=>sx=e.changedTouches[0].screenX,{passive:true});
    document.getElementById('hero').addEventListener('touchend', e=>{
      const dx = e.changedTouches[0].screenX - sx;
      if(Math.abs(dx)>50){ go(dx<0 ? i+1 : i-1); stop(); start(); }
    });
    start();
  })();

  // ---------- DESTINOS carousel ----------
  (function(){
    const track = document.getElementById('destTrack');
    const prev  = document.getElementById('destPrev');
    const next  = document.getElementById('destNext');
    const dotsW = document.getElementById('destDots');
    const cards = Array.from(track.children);
    const VISIBLE = () => window.innerWidth <= 620 ? 1 : window.innerWidth <= 980 ? 2 : 4;
    let offset = 0;
    let visible = VISIBLE();
    let maxOffset = Math.max(0, cards.length - visible);

    function buildDots(){
      dotsW.innerHTML='';
      for(let k=0;k<=maxOffset;k++){
        const d = document.createElement('span');
        if(k===offset) d.classList.add('is-on');
        d.addEventListener('click', ()=>{offset=k; update();});
        dotsW.appendChild(d);
      }
    }
    function update(){
      const cardW = cards[0].getBoundingClientRect().width;
      const gap = parseFloat(getComputedStyle(track).columnGap || '20');
      track.style.transform = `translateX(-${offset * (cardW + gap)}px)`;
      prev.disabled = offset === 0;
      next.disabled = offset >= maxOffset;
      dotsW.querySelectorAll('span').forEach((d,k)=>d.classList.toggle('is-on', k===offset));
    }
    function refresh(){
      visible = VISIBLE();
      maxOffset = Math.max(0, cards.length - visible);
      offset = Math.min(offset, maxOffset);
      buildDots();
      update();
    }
    prev.addEventListener('click', ()=>{offset = Math.max(0, offset-1); update();});
    next.addEventListener('click', ()=>{offset = Math.min(maxOffset, offset+1); update();});
    window.addEventListener('resize', refresh);
    requestAnimationFrame(refresh);
  })();

  // ---------- RESEÑAS slider ----------
  (function(){
    const track = document.getElementById('reviewsTrack');
    const prev  = document.getElementById('reviewsPrev');
    const next  = document.getElementById('reviewsNext');
    const dotsW = document.getElementById('reviewsDots');
    const total = track.children.length;
    let i = 0; let timer;

    for(let k=0;k<total;k++){
      const d = document.createElement('span');
      if(k===0) d.classList.add('is-on');
      d.addEventListener('click', ()=>{i=k; update(); restart();});
      dotsW.appendChild(d);
    }
    function update(){
      track.style.transform = `translateX(-${i*100}%)`;
      dotsW.querySelectorAll('span').forEach((d,k)=>d.classList.toggle('is-on', k===i));
    }
    function go(n){ i = (n+total)%total; update(); }
    function restart(){ clearInterval(timer); timer = setInterval(()=>go(i+1), 7000); }
    prev.addEventListener('click', ()=>{go(i-1); restart();});
    next.addEventListener('click', ()=>{go(i+1); restart();});
    timer = setInterval(()=>go(i+1), 7000);
    track.parentElement.addEventListener('mouseenter', ()=>clearInterval(timer));
    track.parentElement.addEventListener('mouseleave', ()=>{timer = setInterval(()=>go(i+1), 7000);});
  })();
</script>

<?php
get_footer();
