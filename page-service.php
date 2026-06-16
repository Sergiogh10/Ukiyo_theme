<?php
/**
 * Template Name: Servicio SEO
 * Description: Plantilla reutilizable para landings de servicios UKIYO.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$service_slug  = get_post_field( 'post_name', get_the_ID() );
$service       = function_exists( 'ukiyo_get_service_page_data' ) ? ukiyo_get_service_page_data( $service_slug ) : null;
$plan_trip_url = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'plan_trip' ) : home_url( '/planifica-tu-viaje-a-medida/' );
$destinos_url  = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destinations' ) : home_url( '/destinos/' );
$is_en         = function_exists( 'pll_current_language' ) && 'en' === pll_current_language();

if ( ! is_array( $service ) ) : ?>
	<main id="primary" class="bg-background pt-32 pb-20">
		<div class="container mx-auto px-6 max-w-4xl">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		</div>
	</main>
	<?php
	get_footer();
	return;
endif;

$secondary_cta = isset( $service['secondary_cta'] ) && is_array( $service['secondary_cta'] ) ? $service['secondary_cta'] : [];
$secondary_url = '';

if ( ! empty( $secondary_cta['route'] ) && function_exists( 'ukiyo_get_route_url' ) ) {
	$secondary_url = ukiyo_get_route_url( $secondary_cta['route'] );
}

	$hero_titles = [
		'viajes-a-medida'  => 'Viajes a medida<br/><em>y personalizados.</em>',
		'viajes-de-novios' => 'Viajes de novios<br/><em>personalizados.</em>',
		'viajes-en-grupo'  => 'Viajes en<br/><em>grupo reducido.</em>',
		'viajes-privados'  => 'Viajes privados<br/><em>a medida.</em>',
		'tailor-made-travel' => 'Tailor-made<br/><em>personal trips.</em>',
		'honeymoon-travel' => 'Personal<br/><em>honeymoon travel.</em>',
		'small-group-trips' => 'Small<br/><em>group trips.</em>',
		'private-trips' => 'Private trips<br/><em>designed around you.</em>',
	];

$hero_title = isset( $hero_titles[ $service_slug ] ) ? $hero_titles[ $service_slug ] : esc_html( $service['h1'] );

	$related_services = $is_en ? [
		[
			'label' => 'Tailor-made travel',
			'url'   => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'service_custom_travel' ) : home_url( '/en/tailor-made-travel/' ),
		],
		[
			'label' => 'Private trips',
			'url'   => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'service_private' ) : home_url( '/en/private-trips/' ),
		],
		[
			'label' => 'Honeymoon travel',
			'url'   => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'service_honeymoon' ) : home_url( '/en/honeymoon-travel/' ),
		],
		[
			'label' => 'Small group trips',
			'url'   => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'service_group_travel' ) : home_url( '/en/small-group-trips/' ),
		],
	] : [
		[
			'label' => 'Viajes a medida',
		'url'   => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'service_custom_travel' ) : home_url( '/viajes-a-medida/' ),
	],
	[
		'label' => 'Viajes privados',
		'url'   => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'service_private' ) : home_url( '/viajes-privados/' ),
	],
	[
		'label' => 'Viajes de novios',
		'url'   => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'service_honeymoon' ) : home_url( '/viajes-de-novios/' ),
	],
	[
		'label' => 'Viajes en grupo reducido',
		'url'   => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'service_group_travel' ) : home_url( '/viajes-en-grupo/' ),
		],
	];

	$service_labels = $is_en
		? [
			'home' => 'Home',
			'view_destinations' => 'View destinations',
			'scroll' => 'Scroll',
			'approach_num' => '01 · Approach',
			'approach_title' => 'A way of traveling<br/><em>thought through.</em>',
			'approach_sub' => 'The route, rhythm and details should support the trip, not fill it with noise.',
			'quote' => 'Every decision follows a simple idea: the journey should make sense for the person who will live it.',
			'care_num' => '02 · What we care for',
			'care_title' => 'Details that make<br/><em>travel easier.</em>',
			'care_sub' => 'No empty promises: judgement, clarity and a proposal you can understand from the beginning.',
			'process_num' => '03 · Process',
			'process_title' => 'How we<br/><em>work with you.</em>',
			'process_sub' => 'An ordered process for making good decisions without turning trip planning into a burden.',
			'destinations_num' => '04 · Destinations',
			'destinations_title' => 'Destinations that may<br/><em>fit you.</em>',
			'other_ways' => 'Other ways to travel',
			'choose_trip' => 'Choose the type of trip<br/>that <em>fits best.</em>',
			'faq_num' => '05 · Questions',
			'faq_title' => 'What is useful<br/><em>to know.</em>',
			'faq_sub' => 'Common questions before starting to design this kind of trip.',
			'first_step' => 'The first step',
			'final_title' => 'Tell us how<br/><em>you want to travel.</em>',
			'final_copy' => 'We will guide you with a clear proposal before building the route with you.',
		]
		: [
			'home' => 'Inicio',
			'view_destinations' => 'Ver destinos',
			'scroll' => 'Desliza',
			'approach_num' => '01 · Enfoque',
			'approach_title' => 'Una forma de viajar<br/><em>bien pensada.</em>',
			'approach_sub' => 'La ruta, el ritmo y los detalles deben acompañar al viaje, no llenarlo de ruido.',
			'quote' => 'Cada decisión se toma con una idea sencilla: que el viaje tenga sentido para quien lo va a vivir.',
			'care_num' => '02 · Lo que cuidamos',
			'care_title' => 'Detalles que hacen<br/><em>más fácil viajar.</em>',
			'care_sub' => 'Sin promesas vacías: criterio, claridad y una propuesta que puedas entender desde el primer momento.',
			'process_num' => '03 · Proceso',
			'process_title' => 'Cómo lo<br/><em>trabajamos contigo.</em>',
			'process_sub' => 'Un proceso ordenado para tomar buenas decisiones sin convertir la preparación del viaje en una carga.',
			'destinations_num' => '04 · Destinos',
			'destinations_title' => 'Destinos que pueden<br/><em>encajar contigo.</em>',
			'other_ways' => 'Otras formas de viajar',
			'choose_trip' => 'Elige el tipo de viaje<br/>que <em>mejor encaja.</em>',
			'faq_num' => '05 · Preguntas frecuentes',
			'faq_title' => 'Lo que conviene<br/><em>tener claro.</em>',
			'faq_sub' => 'Dudas habituales antes de empezar a diseñar este tipo de viaje.',
			'first_step' => 'El primer paso',
			'final_title' => 'Cuéntanos cómo<br/><em>quieres viajar.</em>',
			'final_copy' => 'Te orientaremos con una propuesta clara antes de construir la ruta contigo.',
		];
	?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap">

<style>
  .ukiyo-service{
    --primary:#8B4513; --primary-50:#FDF7F3; --primary-100:#F9E8D9; --primary-300:#E8B48D; --primary-700:#6B3410;
    --secondary:#9CAF88; --secondary-700:#5E6952;
    --accent:#D4A574; --accent-300:#EBD2AE; --accent-50:#FDF9F4;
    --bg:#FEFCF8; --surface:#F5F2ED; --paper:#F8F2E7;
    --ink:#2C2C2C; --ink-soft:#6B6B6B; --line:#E8E0D2;
    --font-sans:'Satoshi','Inter',system-ui,sans-serif;
    --font-display:'Rowdies',serif;
    --font-mono:'DM Mono',ui-monospace,monospace;
    --section-y:6.5rem;
    --radius:18px;
    background:var(--bg); color:var(--ink); font-family:var(--font-sans);
    font-weight:400; font-size:17px; line-height:1.6;
    -webkit-font-smoothing:antialiased;
  }
  .ukiyo-service *{box-sizing:border-box}
  .ukiyo-service img{max-width:100%;display:block}
  .ukiyo-service a{color:inherit;text-decoration:none}
  .ukiyo-service button{font-family:inherit}
  .ukiyo-service h1,.ukiyo-service h2,.ukiyo-service h3,.ukiyo-service h4{font-family:var(--font-display);font-weight:400;letter-spacing:-0.01em;line-height:1.1;margin:0}
  .ukiyo-service .container{max-width:1240px;margin:0 auto;padding:0 1.75rem}
  .ukiyo-service .mono{font-family:var(--font-mono);letter-spacing:.16em;text-transform:uppercase}

  .ukiyo-service .hero{position:relative;min-height:88vh;display:flex;align-items:center;color:#fff;overflow:hidden;padding:7rem 0 5rem}
  .ukiyo-service .hero__bg{position:absolute;inset:0;z-index:0}
  .ukiyo-service .hero__bg img{width:100%;height:100%;object-fit:cover;transform:scale(1.03);animation:ukiyoServiceZoom 18s ease-in-out infinite alternate}
  @keyframes ukiyoServiceZoom{from{transform:scale(1.03)}to{transform:scale(1.09)}}
  .ukiyo-service .hero__bg::after{
    content:"";position:absolute;inset:0;
    background:
      linear-gradient(180deg, rgba(0,0,0,.58) 0%, rgba(0,0,0,.28) 42%, rgba(0,0,0,.68) 100%),
      radial-gradient(ellipse at 22% 78%, rgba(139,69,19,.34), transparent 60%);
  }
  .ukiyo-service .hero__inner{position:relative;z-index:1;width:100%;text-align:center}
  .ukiyo-service .breadcrumbs{display:flex;gap:.5rem;font-size:.85rem;opacity:.85;justify-content:center;margin-bottom:1.6rem;letter-spacing:.02em}
  .ukiyo-service .breadcrumbs a{color:rgba(255,255,255,.85);transition:color .25s}
  .ukiyo-service .breadcrumbs a:hover{color:#fff}
  .ukiyo-service .breadcrumbs span{opacity:.6}
  .ukiyo-service .eyebrow{display:inline-flex;align-items:center;gap:.6rem;padding:.45rem 1rem;border-radius:999px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.28);backdrop-filter:blur(8px);font-family:var(--font-mono);font-size:.78rem;letter-spacing:.16em;text-transform:uppercase}
  .ukiyo-service .eyebrow .dot{width:6px;height:6px;border-radius:50%;background:var(--accent-300)}
  .ukiyo-service .hero__title{font-size:clamp(2.7rem, 7vw, 6rem);font-weight:300;letter-spacing:-0.02em;line-height:.98;margin:1.5rem auto 1.4rem;max-width:20ch;text-shadow:0 2px 24px rgba(0,0,0,.3)}
  .ukiyo-service .hero__title em{font-style:italic;color:var(--accent-300);font-weight:400}
  .ukiyo-service .hero__sub{max-width:46rem;margin:0 auto;font-size:1.18rem;line-height:1.55;opacity:.95;text-shadow:0 2px 12px rgba(0,0,0,.4)}
  .ukiyo-service .hero__cta{display:flex;gap:1rem;justify-content:center;margin-top:2.4rem;flex-wrap:wrap}
  .ukiyo-service .hero__scroll{position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);z-index:1;display:flex;flex-direction:column;align-items:center;gap:.55rem;font-family:var(--font-mono);font-size:.72rem;letter-spacing:.3em;text-transform:uppercase;opacity:.82}
  .ukiyo-service .hero__scroll .line{width:1px;height:36px;background:#fff;animation:ukiyoServiceScroll 2.4s ease-in-out infinite;transform-origin:top}
  @keyframes ukiyoServiceScroll{0%,100%{transform:scaleY(.3);opacity:.4}50%{transform:scaleY(1);opacity:1}}

  .ukiyo-service .btn{display:inline-flex;align-items:center;gap:.7rem;padding:1rem 1.6rem;border-radius:999px;font-weight:600;font-size:.95rem;transition:transform .25s, box-shadow .25s, background .25s, border-color .25s;color:inherit;border:1.5px solid transparent}
  .ukiyo-service .btn:hover{transform:translateY(-2px)}
  .ukiyo-service .btn-primary{background:var(--primary);color:#fff;box-shadow:0 10px 30px -10px rgba(139,69,19,.5)}
  .ukiyo-service .btn-primary:hover{background:var(--primary-700);box-shadow:0 14px 40px -10px rgba(139,69,19,.6)}
  .ukiyo-service .btn-ghost{border-color:rgba(255,255,255,.5);color:#fff;backdrop-filter:blur(6px)}
  .ukiyo-service .btn-ghost:hover{background:rgba(255,255,255,.12)}
  .ukiyo-service .btn-outline{border-color:var(--ink);color:var(--ink)}
  .ukiyo-service .btn-outline:hover{background:var(--ink);color:#fff}

  .ukiyo-service section.section{padding:var(--section-y) 0;position:relative}
  .ukiyo-service .section-head{display:grid;grid-template-columns:auto 1fr;gap:2.5rem;align-items:end;margin-bottom:3.5rem;padding-bottom:1.5rem;border-bottom:1px solid var(--line)}
  .ukiyo-service .section-head__num{font-family:var(--font-mono);font-size:.85rem;color:var(--primary);letter-spacing:.12em;text-transform:uppercase}
  .ukiyo-service .section-head__title{font-size:clamp(1.9rem, 3.6vw, 3rem);font-weight:300;letter-spacing:-0.015em;color:var(--ink)}
  .ukiyo-service .section-head__title em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-service .section-head__sub{color:var(--ink-soft);max-width:36rem;margin-top:.8rem}
  .ukiyo-service .section-head__right{justify-self:end;text-align:right;max-width:28rem}

  .ukiyo-service .intro{background:linear-gradient(180deg,var(--bg) 0%,var(--paper) 100%)}
  .ukiyo-service .intro__grid{display:grid;grid-template-columns:1.05fr .95fr;gap:3rem;align-items:start}
  .ukiyo-service .intro__copy{font-size:1.16rem;color:var(--ink-soft);line-height:1.75;max-width:40rem}
  .ukiyo-service .intro__quote{margin-top:2rem;background:#fff;border:1px solid var(--line);border-left:4px solid var(--primary);border-radius:18px;padding:1.8rem 2rem;color:var(--ink);font-family:var(--font-display);font-size:clamp(1.25rem,2vw,1.55rem);line-height:1.35;font-style:italic;box-shadow:0 18px 45px -32px rgba(44,44,44,.28)}
  .ukiyo-service .highlights{display:grid;gap:1rem}
  .ukiyo-service .highlight{background:#fff;border:1px solid var(--line);border-radius:18px;padding:1.35rem 1.45rem;display:grid;grid-template-columns:auto 1fr;gap:1rem;align-items:start;transition:transform .3s, box-shadow .3s, border-color .3s}
  .ukiyo-service .highlight:hover{transform:translateY(-3px);box-shadow:0 24px 45px -32px rgba(139,69,19,.28);border-color:var(--primary-100)}
  .ukiyo-service .highlight__num{width:42px;height:42px;border-radius:50%;display:grid;place-items:center;border:1px solid var(--primary-300);color:var(--primary);font-family:var(--font-mono);font-weight:600;font-size:.78rem;letter-spacing:.02em}
  .ukiyo-service .highlight p{margin:0;color:var(--ink-soft);line-height:1.55}

  .ukiyo-service .features{background:var(--bg)}
  .ukiyo-service .feature-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem}
  .ukiyo-service .feature-card{background:#fff;border:1px solid var(--line);border-radius:22px;padding:2rem 1.8rem;min-height:100%;position:relative;overflow:hidden;transition:transform .4s, box-shadow .4s, border-color .4s}
  .ukiyo-service .feature-card:hover{transform:translateY(-6px);box-shadow:0 30px 55px -30px rgba(44,44,44,.24);border-color:var(--primary-100)}
  .ukiyo-service .feature-card__num{display:block;font-family:var(--font-mono);font-size:.72rem;color:var(--primary);letter-spacing:.16em;margin-bottom:1.2rem}
  .ukiyo-service .feature-card h3{font-size:1.45rem;font-weight:400;margin-bottom:.85rem;color:var(--ink)}
  .ukiyo-service .feature-card p{margin:0;color:var(--ink-soft);font-size:.96rem;line-height:1.62}
  .ukiyo-service .feature-card::after{content:"";position:absolute;right:1rem;bottom:.4rem;width:52px;height:52px;border-radius:50%;background:var(--primary-50);opacity:.65}

  .ukiyo-service .process{background:var(--surface)}
  .ukiyo-service .steps{display:grid;grid-template-columns:repeat(4,1fr);gap:1.25rem}
  .ukiyo-service .step{background:#fff;border:1px solid var(--line);border-radius:20px;padding:2.1rem 1.5rem 1.6rem;position:relative;min-height:100%}
  .ukiyo-service .step__badge{position:absolute;top:-1.1rem;left:1.5rem;width:52px;height:52px;border-radius:50%;display:grid;place-items:center;background:var(--accent);color:#fff;font-family:var(--font-display);font-size:1.35rem;box-shadow:0 12px 25px -14px rgba(139,69,19,.55)}
  .ukiyo-service .step p{margin:1rem 0 0;color:var(--ink-soft);line-height:1.58}

  .ukiyo-service .destinations{background:var(--bg)}
  .ukiyo-service .destination-box{display:grid;grid-template-columns:.9fr 1.1fr;gap:2.5rem;align-items:start;background:linear-gradient(160deg,var(--paper) 0%,#fff 100%);border:1px solid var(--line);border-radius:24px;padding:2.4rem}
  .ukiyo-service .destination-box h2{font-size:clamp(1.8rem,3vw,2.7rem);font-weight:300}
  .ukiyo-service .destination-box h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-service .destination-list{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
  .ukiyo-service .destination-item{background:#fff;border:1px solid var(--line);border-radius:16px;padding:1.2rem 1.25rem;color:var(--ink-soft);line-height:1.52}

  .ukiyo-service .links{background:var(--paper);border-top:1px solid var(--line);border-bottom:1px solid var(--line);padding:3.5rem 0}
  .ukiyo-service .links__head{margin-bottom:1.5rem}
  .ukiyo-service .links__head .kicker{display:inline-block;font-family:var(--font-mono);font-size:.74rem;color:var(--primary);letter-spacing:.22em;text-transform:uppercase;font-weight:600;margin-bottom:.6rem}
  .ukiyo-service .links__head h2{font-size:clamp(1.6rem,3vw,2.2rem);font-weight:300;letter-spacing:-0.01em}
  .ukiyo-service .links__head h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-service .links__grid{display:grid;grid-template-columns:repeat(4,1fr);gap:.85rem}
  .ukiyo-service .service-link{display:flex;align-items:center;justify-content:space-between;gap:.6rem;padding:1.05rem 1.3rem;background:#fff;border:1px solid var(--line);border-radius:14px;font-weight:500;font-size:.95rem;color:var(--ink);transition:all .25s}
  .ukiyo-service .service-link:hover{border-color:var(--primary-300);color:var(--primary);transform:translateY(-2px);box-shadow:0 12px 28px -16px rgba(139,69,19,.2)}
  .ukiyo-service .service-link span:last-child{font-size:1.1rem;color:var(--ink-soft);transition:transform .25s,color .25s}
  .ukiyo-service .service-link:hover span:last-child{transform:translateX(4px);color:var(--primary)}

  .ukiyo-service .faq{background:var(--bg)}
  .ukiyo-service .faq-list{max-width:840px;margin:0 auto;display:grid;gap:1rem}
  .ukiyo-service .faq-item{background:#fff;border:1px solid var(--line);border-radius:18px;overflow:hidden;transition:border-color .25s, box-shadow .25s}
  .ukiyo-service .faq-item[open]{border-color:var(--primary-300);box-shadow:0 18px 45px -34px rgba(139,69,19,.28)}
  .ukiyo-service .faq-item summary{cursor:pointer;list-style:none;display:grid;grid-template-columns:auto 1fr auto;gap:1rem;align-items:center;padding:1.35rem 1.5rem;color:var(--ink);font-weight:600}
  .ukiyo-service .faq-item summary::-webkit-details-marker{display:none}
  .ukiyo-service .faq-item__num{font-family:var(--font-mono);font-size:.78rem;color:var(--primary);letter-spacing:.08em}
  .ukiyo-service .faq-item__icon{width:34px;height:34px;border-radius:50%;display:grid;place-items:center;background:var(--primary-50);color:var(--primary);font-size:1.2rem;line-height:1}
  .ukiyo-service .faq-item[open] .faq-item__icon{background:var(--primary);color:#fff}
  .ukiyo-service .faq-item[open] .faq-item__icon span{transform:rotate(45deg)}
  .ukiyo-service .faq-item__icon span{display:block;transition:transform .25s}
  .ukiyo-service .faq-item p{margin:0;padding:0 1.5rem 1.5rem 4.4rem;color:var(--ink-soft);line-height:1.65}

  .ukiyo-service .final-cta{background:#171717;color:#fff;padding:var(--section-y) 0;position:relative;overflow:hidden}
  .ukiyo-service .final-cta::before{content:"";position:absolute;inset:auto -16rem -20rem auto;width:42rem;height:42rem;border-radius:50%;background:radial-gradient(circle,rgba(212,165,116,.24),transparent 70%)}
  .ukiyo-service .final-cta__box{position:relative;z-index:1;max-width:820px;margin:0 auto;text-align:center}
  .ukiyo-service .final-cta .kicker{display:inline-flex;align-items:center;gap:.6rem;font-family:var(--font-mono);font-size:.78rem;color:var(--accent-300);letter-spacing:.18em;text-transform:uppercase;margin-bottom:1.2rem}
  .ukiyo-service .final-cta .kicker .dot{width:6px;height:6px;border-radius:50%;background:var(--accent-300)}
  .ukiyo-service .final-cta h2{font-size:clamp(2.2rem,4.4vw,3.7rem);font-weight:300;letter-spacing:-0.02em;line-height:1.04;margin-bottom:1.2rem}
  .ukiyo-service .final-cta h2 em{font-style:italic;color:var(--accent-300)}
  .ukiyo-service .final-cta p{max-width:36rem;margin:0 auto 2.2rem;color:rgba(255,255,255,.74);font-size:1.08rem;line-height:1.6}

  @media (max-width:980px){
    .ukiyo-service .intro__grid,
    .ukiyo-service .destination-box{grid-template-columns:1fr}
    .ukiyo-service .feature-grid{grid-template-columns:1fr}
    .ukiyo-service .steps{grid-template-columns:1fr 1fr;gap:2rem 1rem}
    .ukiyo-service .links__grid{grid-template-columns:1fr 1fr}
  }
  @media (max-width:760px){
    .ukiyo-service{--section-y:4.5rem}
    .ukiyo-service .hero{min-height:84vh;padding:6rem 0 5rem}
    .ukiyo-service .hero__title{font-size:clamp(2.35rem,11vw,3.8rem)}
    .ukiyo-service .hero__sub{font-size:1rem}
    .ukiyo-service .section-head{grid-template-columns:1fr;gap:1rem;margin-bottom:2.4rem}
    .ukiyo-service .section-head__right{justify-self:start;text-align:left}
    .ukiyo-service .steps,
    .ukiyo-service .destination-list,
    .ukiyo-service .links__grid{grid-template-columns:1fr}
    .ukiyo-service .destination-box{padding:1.5rem}
    .ukiyo-service .faq-item summary{grid-template-columns:auto 1fr;position:relative;padding-right:4rem}
    .ukiyo-service .faq-item__icon{position:absolute;right:1.1rem}
    .ukiyo-service .faq-item p{padding-left:1.5rem}
  }
</style>

<main id="primary" class="ukiyo-service">
	<section class="hero">
		<div class="hero__bg">
			<img
				src="<?php echo esc_url( $service['image'] ); ?>"
				alt="<?php echo esc_attr( $service['h1'] ); ?>"
				loading="eager"
				fetchpriority="high"
				decoding="async"
				sizes="100vw"
			/>
		</div>
		<div class="hero__inner">
			<div class="container">
				<nav class="breadcrumbs" aria-label="Breadcrumb">
						<a href="<?php echo esc_url( function_exists( 'ukiyo_get_home_url' ) ? ukiyo_get_home_url() : home_url( '/' ) ); ?>"><?php echo esc_html( $service_labels['home'] ); ?></a>
					<span>/</span>
					<span><?php echo esc_html( $service['eyebrow'] ); ?></span>
				</nav>
				<span class="eyebrow"><span class="dot"></span><?php echo esc_html( $service['eyebrow'] ); ?></span>
				<h1 class="hero__title"><?php echo wp_kses( $hero_title, [ 'br' => [], 'em' => [] ] ); ?></h1>
				<p class="hero__sub"><?php echo esc_html( $service['lead'] ); ?></p>
				<div class="hero__cta">
					<a href="<?php echo esc_url( $plan_trip_url ); ?>" class="btn btn-primary">
						<?php echo esc_html( $service['primary_cta'] ); ?>
						<span aria-hidden="true">→</span>
					</a>
					<?php if ( $secondary_url && ! empty( $secondary_cta['label'] ) ) : ?>
						<a href="<?php echo esc_url( $secondary_url ); ?>" class="btn btn-ghost">
							<?php echo esc_html( $secondary_cta['label'] ); ?>
							<span aria-hidden="true">→</span>
						</a>
					<?php else : ?>
						<a href="<?php echo esc_url( $destinos_url ); ?>" class="btn btn-ghost">
								<?php echo esc_html( $service_labels['view_destinations'] ); ?>
							<span aria-hidden="true">→</span>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
			<div class="hero__scroll"><span><?php echo esc_html( $service_labels['scroll'] ); ?></span><div class="line"></div></div>
	</section>

	<section class="section intro">
		<div class="container">
			<div class="section-head">
				<div>
						<div class="section-head__num"><?php echo esc_html( $service_labels['approach_num'] ); ?></div>
						<h2 class="section-head__title"><?php echo wp_kses( $service_labels['approach_title'], [ 'br' => [], 'em' => [] ] ); ?></h2>
				</div>
				<div class="section-head__right">
						<p class="section-head__sub"><?php echo esc_html( $service_labels['approach_sub'] ); ?></p>
				</div>
			</div>

			<div class="intro__grid">
				<div>
					<p class="intro__copy"><?php echo esc_html( $service['intro'] ); ?></p>
					<div class="intro__quote">
							<?php echo esc_html( $service_labels['quote'] ); ?>
					</div>
				</div>
				<div class="highlights">
					<?php foreach ( $service['highlights'] as $index => $highlight ) : ?>
						<article class="highlight">
							<span class="highlight__num"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<p><?php echo esc_html( $highlight ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="section features">
		<div class="container">
			<div class="section-head">
				<div>
						<div class="section-head__num"><?php echo esc_html( $service_labels['care_num'] ); ?></div>
						<h2 class="section-head__title"><?php echo wp_kses( $service_labels['care_title'], [ 'br' => [], 'em' => [] ] ); ?></h2>
				</div>
				<div class="section-head__right">
						<p class="section-head__sub"><?php echo esc_html( $service_labels['care_sub'] ); ?></p>
				</div>
			</div>

			<div class="feature-grid">
				<?php foreach ( $service['features'] as $index => $feature ) : ?>
					<article class="feature-card">
						<span class="feature-card__num"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
						<h3><?php echo esc_html( $feature['title'] ); ?></h3>
						<p><?php echo esc_html( $feature['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section process">
		<div class="container">
			<div class="section-head">
				<div>
						<div class="section-head__num"><?php echo esc_html( $service_labels['process_num'] ); ?></div>
						<h2 class="section-head__title"><?php echo wp_kses( $service_labels['process_title'], [ 'br' => [], 'em' => [] ] ); ?></h2>
				</div>
				<div class="section-head__right">
						<p class="section-head__sub"><?php echo esc_html( $service_labels['process_sub'] ); ?></p>
				</div>
			</div>

			<div class="steps">
				<?php foreach ( $service['steps'] as $index => $step ) : ?>
					<article class="step">
						<span class="step__badge"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
						<p><?php echo esc_html( $step ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section destinations">
		<div class="container">
			<div class="destination-box">
				<div>
						<div class="section-head__num"><?php echo esc_html( $service_labels['destinations_num'] ); ?></div>
						<h2><?php echo wp_kses( $service_labels['destinations_title'], [ 'br' => [], 'em' => [] ] ); ?></h2>
				</div>
				<div class="destination-list">
					<?php foreach ( $service['destinations'] as $destination ) : ?>
						<div class="destination-item"><?php echo esc_html( $destination ); ?></div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="links">
		<div class="container">
			<div class="links__head">
					<span class="kicker"><?php echo esc_html( $service_labels['other_ways'] ); ?></span>
					<h2><?php echo wp_kses( $service_labels['choose_trip'], [ 'br' => [], 'em' => [] ] ); ?></h2>
			</div>
			<div class="links__grid">
				<?php foreach ( $related_services as $related_service ) : ?>
					<a class="service-link" href="<?php echo esc_url( $related_service['url'] ); ?>">
						<span><?php echo esc_html( $related_service['label'] ); ?></span>
						<span aria-hidden="true">→</span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section faq">
		<div class="container">
			<div class="section-head">
				<div>
						<div class="section-head__num"><?php echo esc_html( $service_labels['faq_num'] ); ?></div>
						<h2 class="section-head__title"><?php echo wp_kses( $service_labels['faq_title'], [ 'br' => [], 'em' => [] ] ); ?></h2>
				</div>
				<div class="section-head__right">
						<p class="section-head__sub"><?php echo esc_html( $service_labels['faq_sub'] ); ?></p>
				</div>
			</div>

			<div class="faq-list">
				<?php foreach ( $service['faqs'] as $index => $faq ) : ?>
					<details class="faq-item" <?php echo 0 === $index ? 'open' : ''; ?>>
						<summary>
							<span class="faq-item__num"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<span><?php echo esc_html( $faq['question'] ); ?></span>
							<span class="faq-item__icon" aria-hidden="true"><span>+</span></span>
						</summary>
						<p><?php echo esc_html( $faq['answer'] ); ?></p>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="final-cta">
		<div class="container">
			<div class="final-cta__box">
					<span class="kicker"><span class="dot"></span><?php echo esc_html( $service_labels['first_step'] ); ?></span>
					<h2><?php echo wp_kses( $service_labels['final_title'], [ 'br' => [], 'em' => [] ] ); ?></h2>
					<p><?php echo esc_html( $service_labels['final_copy'] ); ?></p>
				<a href="<?php echo esc_url( $plan_trip_url ); ?>" class="btn btn-primary">
					<?php echo esc_html( $service['primary_cta'] ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
