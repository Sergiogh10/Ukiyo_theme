<?php
/**
 * Template Name: Sobre Nosotros
 *
 * Implementación del export "Nosotros.html" de Claude Design.
 *
 * Decisiones:
 *   - Header/footer del tema (get_header / get_footer). Nav y footer del export omitidos.
 *   - CSS scoped a .ukiyo-about para no contaminar otras plantillas.
 *   - Imágenes del banco /images/travellers/ (.webp).
 *   - Fundadores y equipo hardcoded en el template (contenido de marca).
 *   - WhatsApp en CTA usa el icon8 PNG ya presente en el tema.
 */
get_header();

$img_base   = get_template_directory_uri() . '/images';
$blog_url   = home_url( '/blog/' );
$wa_url     = 'https://wa.me/message/CS2LNI6YHSETO1';
$wa_icon    = 'https://img.icons8.com/cotton/64/whatsapp--v4.png';

$hero_image = $img_base . '/italia/viajes-a-italia-personalizados-toscana.webp';
$fundadores = $img_base . '/travellers/agencia-de-viajes-personalizados-ukiyo-fundadores.webp';

$team = [
	[
		'photo' => $img_base . '/travellers/agencia-de-viajes-personalizados-ukiyo-helena-valenzuela.webp',
		'name'  => 'Helena Valenzuela',
		'role'  => 'Coordinadora experta',
		'bio'   => 'Más de 10 años viviendo aventuras. Apasionada de la naturaleza y de la gente de América del Sur — su brújula emocional del equipo.',
		'quote' => 'Cada viaje empieza por entender a quien lo va a vivir.',
	],
	[
		'photo' => $img_base . '/travellers/agencia-de-viajes-personalizados-ukiyo-victor-garcia-heras.webp',
		'name'  => 'Víctor García-Heras',
		'role'  => 'Creador de contenido',
		'bio'   => 'Aventurero intrépido apasionado de la historia. Cuenta sus rutas en su diario de viajes de YouTube y convierte cada destino en emoción visual.',
		'quote' => 'Si no lo he vivido yo, no te lo puedo contar bien.',
	],
	[
		'photo' => $img_base . '/travellers/agencia-de-viajes-personalizados-ukiyo-sergio-garcia.webp',
		'name'  => 'Sergio García',
		'role'  => 'Mochilero · Diseño de rutas',
		'bio'   => 'Amante de descubrir rincones y un gran disfrutón de cada viaje. Diseña las rutas con criterio de quien lleva la mochila puesta.',
		'quote' => 'El mundo es demasiado bonito como para no recorrerlo entero.',
	],
];

$values = [
	[
		'title' => 'Autenticidad',
		'kanji' => '真',
		'desc'  => 'Diseñamos experiencias reales, lejos del turismo masivo. Queremos que conectes con la esencia de cada lugar: su gente, sus historias y su ritmo.',
		'icon'  => '<path d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>',
	],
	[
		'title' => 'Sostenibilidad',
		'kanji' => '和',
		'desc'  => 'Colaboramos con proyectos locales y promovemos un turismo que cuida. El entorno, las culturas y las personas son la base de todo lo que hacemos.',
		'icon'  => '<path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>',
	],
	[
		'title' => 'Transparencia',
		'kanji' => '信',
		'desc'  => 'La confianza se gana con honestidad. Cada decisión, recomendación o proveedor se elige con claridad y coherencia desde el primer día.',
		'icon'  => '<circle cx="12" cy="12" r="3"/><path d="M2.5 12C3.7 7.9 7.5 5 12 5s8.3 2.9 9.5 7c-1.2 4.1-5 7-9.5 7s-8.3-2.9-9.5-7z"/>',
	],
	[
		'title' => 'Bienestar',
		'kanji' => '心',
		'desc'  => 'Más que viajes, creamos momentos que inspiran y enriquecen. Experiencias pensadas para disfrutar, reconectar y volver con una mirada diferente.',
		'icon'  => '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>',
	],
];

$timeline = [
	[ 'side' => 'left',  'year' => '2021 · El despertar',   'title' => 'Sergio conoce a Helena',          'text' => 'Tras un periodo de cambios, Sergio conoce a Helena. Ella le transmite su ilusión por viajar y por conocer culturas completamente distintas a la nuestra.' ],
	[ 'side' => 'right', 'year' => '2022 · Pura Vida',      'title' => 'Conociendo Costa Rica',           'text' => 'Llega su primera aventura juntos: Costa Rica. Selvas, volcanes y una manera de habitar el tiempo que marca el tono de todo lo que vendría después.' ],
	[ 'side' => 'left',  'year' => '2023 · Indonesia',      'title' => 'Abriendo horizontes',             'text' => 'Sergio y Helena preparan un viaje que rompe los moldes de los viajes tradicionales. Indonesia les cambia la vida. Víctor empieza a documentar todo en YouTube.' ],
	[ 'side' => 'right', 'year' => '2024 · La semilla',     'title' => 'Primeros viajes organizados',     'text' => 'Amigos y conocidos empiezan a pedir ayuda para organizar sus propios viajes. Sin planearlo, empieza a formarse la semilla de Ukiyo.' ],
	[ 'side' => 'left',  'year' => '2025 · ¡A la aventura!', 'title' => 'Nace Ukiyo',                     'text' => 'Sergio, Helena y Víctor dan el paso definitivo. Nace la web, desde la humildad y con un principio innegociable: organizar solo viajes que conocemos de primera mano.' ],
];
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap">

<style>
  .ukiyo-about{
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
  .ukiyo-about *{box-sizing:border-box}
  .ukiyo-about img{max-width:100%;display:block}
  .ukiyo-about a{color:inherit;text-decoration:none}
  .ukiyo-about h1,.ukiyo-about h2,.ukiyo-about h3,.ukiyo-about h4{font-family:var(--font-display);font-weight:400;letter-spacing:-0.01em;line-height:1.1;margin:0}
  .ukiyo-about .container{max-width:1240px;margin:0 auto;padding:0 1.75rem}

  /* HERO */
  .ukiyo-about .hero{position:relative;min-height:88vh;display:flex;align-items:center;color:#fff;overflow:hidden;padding:7rem 0 5rem}
  .ukiyo-about .hero__bg{position:absolute;inset:0;z-index:0}
  .ukiyo-about .hero__bg img{width:100%;height:100%;object-fit:cover;transform:scale(1.03);animation:ukiyoAboutZoom 18s ease-in-out infinite alternate}
  @keyframes ukiyoAboutZoom{from{transform:scale(1.03)}to{transform:scale(1.09)}}
  .ukiyo-about .hero__bg::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg, rgba(0,0,0,.55) 0%, rgba(0,0,0,.25) 40%, rgba(0,0,0,.65) 100%)}
  .ukiyo-about .hero__inner{position:relative;z-index:1;width:100%;text-align:center}
  .ukiyo-about .breadcrumbs{display:flex;gap:.5rem;font-size:.85rem;opacity:.85;justify-content:center;margin-bottom:1.6rem;letter-spacing:.02em}
  .ukiyo-about .breadcrumbs span{opacity:.6}
  .ukiyo-about .eyebrow{display:inline-flex;align-items:center;gap:.6rem;padding:.45rem 1rem;border-radius:999px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.28);backdrop-filter:blur(8px);font-size:.78rem;letter-spacing:.16em;text-transform:uppercase}
  .ukiyo-about .eyebrow .dot{width:6px;height:6px;border-radius:50%;background:var(--accent-300)}
  .ukiyo-about .hero__title{font-size:clamp(2.8rem, 7vw, 6rem);font-weight:300;letter-spacing:-0.02em;line-height:.98;margin:1.5rem auto 1.4rem;max-width:18ch;text-shadow:0 2px 24px rgba(0,0,0,.3)}
  .ukiyo-about .hero__title em{font-style:italic;color:var(--accent-300);font-weight:400}
  .ukiyo-about .hero__sub{max-width:42rem;margin:0 auto;font-size:1.18rem;line-height:1.55;opacity:.95;text-shadow:0 2px 12px rgba(0,0,0,.4)}
  .ukiyo-about .hero__sub em{font-style:italic;color:var(--accent-300)}
  .ukiyo-about .hero__kanji{position:absolute;font-family:var(--font-display);color:rgba(255,255,255,.06);font-size:34vw;line-height:1;top:50%;left:50%;transform:translate(-50%,-50%);z-index:0;pointer-events:none;user-select:none;letter-spacing:-.05em}

  /* SECTION SHELL */
  .ukiyo-about section.section{padding:var(--section-y) 0;position:relative}
  .ukiyo-about .sec-head{text-align:center;max-width:48rem;margin:0 auto 4rem}
  .ukiyo-about .sec-head__chip{display:inline-flex;align-items:center;gap:.5rem;padding:.4rem .9rem;border-radius:999px;font-family:var(--font-mono);font-size:.74rem;letter-spacing:.16em;text-transform:uppercase;font-weight:500;margin-bottom:1.2rem;background:var(--primary-50);color:var(--primary)}
  .ukiyo-about .sec-head__chip--sage{background:rgba(156,175,136,.16);color:var(--secondary-700)}
  .ukiyo-about .sec-head__chip--accent{background:var(--accent-50);color:#9C7B4A}
  .ukiyo-about .sec-head__chip .star{width:6px;height:6px;border-radius:50%;background:currentColor}
  .ukiyo-about .sec-head h2{font-size:clamp(2.2rem, 4vw, 3.4rem);font-weight:300;letter-spacing:-0.015em;line-height:1.05;margin-bottom:1.2rem}
  .ukiyo-about .sec-head h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-about .sec-head--sage h2 em{color:var(--secondary-700)}
  .ukiyo-about .sec-head__sub{color:var(--ink-soft);font-size:1.05rem;line-height:1.6}
  .ukiyo-about .sec-head__divider{width:60px;height:4px;border-radius:2px;background:var(--primary);margin:1.6rem auto 0}
  .ukiyo-about .sec-head--sage .sec-head__divider{background:var(--secondary-700)}

  /* STORY */
  .ukiyo-about .story{background:linear-gradient(180deg, var(--bg) 0%, var(--paper) 100%)}
  .ukiyo-about .story__intro{text-align:center;max-width:48rem;margin:0 auto 3.5rem}
  .ukiyo-about .story__intro h2{font-size:clamp(2.2rem, 4vw, 3.4rem);font-weight:300;letter-spacing:-0.015em;line-height:1.05;margin-bottom:1.2rem}
  .ukiyo-about .story__intro h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-about .story__intro p{color:var(--ink-soft);font-size:1.06rem;line-height:1.65;max-width:38rem;margin:0 auto}
  .ukiyo-about .story__wrap{display:grid;grid-template-columns:1fr 1.45fr;gap:3.5rem;align-items:start;max-width:1080px;margin:0 auto}
  .ukiyo-about .story__media{position:relative}
  .ukiyo-about .story__media__frame{aspect-ratio:3/4;border-radius:20px;overflow:hidden;border:1px solid var(--line);background:#000;box-shadow:0 30px 60px -35px rgba(44,44,44,.35);transform:rotate(-1deg)}
  .ukiyo-about .story__media__frame img{width:100%;height:100%;object-fit:cover}
  .ukiyo-about .story__media__caption{margin-top:1.5rem;text-align:center}
  .ukiyo-about .story__media__caption h3{font-size:1.35rem;font-weight:400;margin-bottom:.2rem}
  .ukiyo-about .story__media__caption span{font-family:var(--font-mono);font-size:.75rem;color:var(--ink-soft);letter-spacing:.16em;text-transform:uppercase}
  .ukiyo-about .story__media__stamp{position:absolute;top:-1.4rem;right:-1.4rem;width:90px;height:90px;border-radius:50%;background:var(--primary);color:#fff;display:grid;place-items:center;transform:rotate(8deg);box-shadow:0 14px 30px -10px rgba(139,69,19,.5);font-family:var(--font-display);font-size:.78rem;text-align:center;line-height:1.1;padding:.4rem}
  .ukiyo-about .story__media__stamp small{display:block;font-family:var(--font-mono);font-size:.6rem;opacity:.85;letter-spacing:.16em;margin-top:.15rem}
  .ukiyo-about .story__copy blockquote{font-family:var(--font-display);font-size:clamp(1.3rem, 2.2vw, 1.7rem);font-weight:300;line-height:1.3;color:var(--ink);margin:0 0 2.5rem;padding:0 0 0 1.6rem;border-left:3px solid var(--primary);font-style:italic;letter-spacing:-0.01em}
  .ukiyo-about .story__copy p{color:var(--ink-soft);margin:0 0 1.1rem;line-height:1.7;font-size:1.02rem}
  .ukiyo-about .story__copy p strong{color:var(--ink);font-weight:600}
  @media (max-width:880px){
    .ukiyo-about .story__wrap{grid-template-columns:1fr;gap:2.5rem}
    .ukiyo-about .story__media__frame{transform:none;max-width:360px;margin:0 auto}
    .ukiyo-about .story__media__stamp{right:0}
  }

  /* TEAM */
  .ukiyo-about .team{background:var(--bg)}
  .ukiyo-about .team__grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.6rem;max-width:1080px;margin:0 auto}
  .ukiyo-about .member{background:#fff;border:1px solid var(--line);border-radius:22px;padding:2.2rem 1.8rem 2rem;text-align:center;transition:transform .4s, box-shadow .4s, border-color .4s;position:relative;overflow:hidden}
  .ukiyo-about .member:hover{transform:translateY(-6px);box-shadow:0 30px 50px -30px rgba(139,69,19,.25);border-color:var(--primary-100)}
  .ukiyo-about .member__num{position:absolute;top:1rem;right:1.4rem;font-family:var(--font-mono);font-size:.72rem;letter-spacing:.18em;color:var(--ink-soft);opacity:.6}
  .ukiyo-about .member__photo{position:relative;width:140px;height:140px;border-radius:50%;overflow:hidden;margin:0 auto 1.5rem;border:4px solid #fff;box-shadow:0 16px 40px -18px rgba(44,44,44,.35)}
  .ukiyo-about .member__photo::after{content:"";position:absolute;inset:-3px;border:1px dashed var(--accent-300);border-radius:50%;pointer-events:none}
  .ukiyo-about .member__photo img{width:100%;height:100%;object-fit:cover;transition:transform .6s}
  .ukiyo-about .member:hover .member__photo img{transform:scale(1.05)}
  .ukiyo-about .member h3{font-size:1.45rem;font-weight:400;margin-bottom:.35rem;color:var(--ink)}
  .ukiyo-about .member__role{display:block;font-family:var(--font-mono);font-size:.74rem;font-weight:600;color:var(--primary);letter-spacing:.14em;text-transform:uppercase;margin-bottom:1rem}
  .ukiyo-about .member p{color:var(--ink-soft);font-size:.93rem;line-height:1.55;margin:0 0 1.4rem;min-height:5.5em}
  .ukiyo-about .member__quote{display:block;font-family:var(--font-display);font-size:.92rem;color:var(--ink);font-style:italic;line-height:1.4;padding-top:2rem;border-top:1px dashed var(--line);position:relative}
  .ukiyo-about .member__quote::before{content:"\201C";font-family:var(--font-display);font-size:2rem;color:var(--primary-300);line-height:0;position:absolute;top:1.4rem;left:0;right:0;text-align:center;letter-spacing:0}
  @media (max-width:880px){.ukiyo-about .team__grid{grid-template-columns:1fr;max-width:24rem}}

  /* VALUES */
  .ukiyo-about .values{background:linear-gradient(180deg, var(--paper) 0%, var(--bg) 100%)}
  .ukiyo-about .values__grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1.4rem}
  .ukiyo-about .vcard{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:2rem 1.6rem 1.9rem;transition:transform .35s, box-shadow .35s, border-color .35s;position:relative;overflow:hidden}
  .ukiyo-about .vcard:hover{transform:translateY(-4px);box-shadow:0 20px 50px -25px rgba(139,69,19,.22);border-color:var(--primary-100)}
  .ukiyo-about .vcard__num{font-family:var(--font-mono);font-size:.72rem;color:var(--ink-soft);letter-spacing:.16em;margin-bottom:1.1rem;display:block}
  .ukiyo-about .vcard__icon{width:54px;height:54px;border-radius:16px;display:grid;place-items:center;background:var(--primary-50);color:var(--primary);margin-bottom:1.2rem}
  .ukiyo-about .vcard:nth-child(2) .vcard__icon{background:rgba(156,175,136,.18);color:var(--secondary-700)}
  .ukiyo-about .vcard:nth-child(3) .vcard__icon{background:var(--accent-50);color:#9C7B4A}
  .ukiyo-about .vcard:nth-child(4) .vcard__icon{background:#FEF1EC;color:var(--primary-700)}
  .ukiyo-about .vcard h3{font-size:1.35rem;font-weight:400;margin-bottom:.6rem;color:var(--ink)}
  .ukiyo-about .vcard p{color:var(--ink-soft);font-size:.93rem;line-height:1.55;margin:0}
  .ukiyo-about .vcard__kanji{position:absolute;bottom:.5rem;right:1rem;font-family:var(--font-display);color:var(--surface);font-size:3.6rem;line-height:1;pointer-events:none;user-select:none}
  @media (max-width:980px){.ukiyo-about .values__grid{grid-template-columns:1fr 1fr}}
  @media (max-width:560px){.ukiyo-about .values__grid{grid-template-columns:1fr}}

  /* TIMELINE */
  .ukiyo-about .timeline{background:var(--surface)}
  .ukiyo-about .tl{max-width:920px;margin:0 auto;position:relative}
  .ukiyo-about .tl::before{content:"";position:absolute;left:50%;top:0;bottom:0;width:2px;background:linear-gradient(180deg, transparent 0%, var(--primary-300) 12%, var(--primary-300) 88%, transparent 100%);transform:translateX(-50%);z-index:0}
  .ukiyo-about .tl__row{display:grid;grid-template-columns:1fr auto 1fr;gap:2rem;align-items:center;margin-bottom:3rem;position:relative}
  .ukiyo-about .tl__row:last-child{margin-bottom:0}
  .ukiyo-about .tl__side .card{background:#fff;border:1px solid var(--line);border-radius:18px;padding:1.6rem 1.7rem;transition:transform .35s, box-shadow .35s, border-color .35s;box-shadow:0 14px 30px -22px rgba(44,44,44,.18)}
  .ukiyo-about .tl__side .card:hover{transform:translateY(-3px);box-shadow:0 24px 40px -22px rgba(139,69,19,.25);border-color:var(--primary-100)}
  .ukiyo-about .tl__side .yr{font-family:var(--font-mono);font-size:.72rem;letter-spacing:.18em;color:var(--primary);text-transform:uppercase;display:inline-block;margin-bottom:.5rem;font-weight:600;background:var(--primary-50);padding:.3rem .65rem;border-radius:999px}
  .ukiyo-about .tl__side h3{font-size:1.35rem;font-weight:400;margin-bottom:.5rem;color:var(--ink);line-height:1.2}
  .ukiyo-about .tl__side p{color:var(--ink-soft);font-size:.93rem;line-height:1.55;margin:0}
  .ukiyo-about .tl__side--left{text-align:right}
  .ukiyo-about .tl__side--left .card{margin-left:auto}
  .ukiyo-about .tl__side--right{text-align:left}
  .ukiyo-about .tl__side--right .card{margin-right:auto}
  .ukiyo-about .tl__side--empty{visibility:hidden}
  .ukiyo-about .tl__dot{width:18px;height:18px;border-radius:50%;background:var(--primary);border:3px solid #fff;box-shadow:0 0 0 1px var(--primary-300), 0 4px 14px rgba(139,69,19,.35);z-index:2;position:relative}
  .ukiyo-about .tl__row:nth-child(2) .tl__dot{background:var(--secondary-700)}
  .ukiyo-about .tl__row:nth-child(3) .tl__dot{background:var(--accent)}
  .ukiyo-about .tl__row:nth-child(4) .tl__dot{background:#7A9D7A}
  .ukiyo-about .tl__row:nth-child(5) .tl__dot{background:var(--primary)}
  @media (max-width:760px){
    .ukiyo-about .tl::before{left:1.2rem}
    .ukiyo-about .tl__row{grid-template-columns:auto 1fr;gap:1rem;margin-bottom:2rem}
    .ukiyo-about .tl__dot{order:1}
    .ukiyo-about .tl__side--left,
    .ukiyo-about .tl__side--right{order:2;text-align:left}
    .ukiyo-about .tl__side--left .card,
    .ukiyo-about .tl__side--right .card{margin:0}
    .ukiyo-about .tl__side--empty{display:none}
  }

  /* CTA */
  .ukiyo-about .btn{display:inline-flex;align-items:center;gap:.7rem;padding:1rem 1.6rem;border-radius:999px;font-weight:600;font-size:.95rem;transition:transform .25s, box-shadow .25s, background .25s;border:1.5px solid transparent}
  .ukiyo-about .btn:hover{transform:translateY(-2px)}
  .ukiyo-about .btn-primary{background:var(--primary);color:#fff;box-shadow:0 10px 30px -10px rgba(139,69,19,.5)}
  .ukiyo-about .btn-primary:hover{background:var(--primary-700);box-shadow:0 14px 40px -10px rgba(139,69,19,.6)}
  .ukiyo-about .btn-outline{border-color:var(--ink);color:var(--ink)}
  .ukiyo-about .btn-outline:hover{background:var(--ink);color:#fff}
  .ukiyo-about .ctafinal{background:linear-gradient(160deg, var(--paper) 0%, #FDF7F3 100%);position:relative;overflow:hidden}
  .ukiyo-about .ctafinal__box{max-width:760px;margin:0 auto;text-align:center;position:relative;z-index:1;padding:1rem 0}
  .ukiyo-about .ctafinal__stamp{display:inline-flex;align-items:center;gap:.6rem;font-family:var(--font-mono);font-size:.78rem;color:var(--primary);letter-spacing:.18em;text-transform:uppercase;margin-bottom:1.2rem}
  .ukiyo-about .ctafinal__stamp .dot{width:6px;height:6px;border-radius:50%;background:var(--primary)}
  .ukiyo-about .ctafinal h2{font-size:clamp(2.2rem, 4.5vw, 3.6rem);font-weight:300;letter-spacing:-0.02em;line-height:1.05;margin-bottom:1.2rem}
  .ukiyo-about .ctafinal h2 em{font-style:italic;color:var(--primary)}
  .ukiyo-about .ctafinal p{font-size:1.15rem;color:var(--ink-soft);margin-bottom:2.2rem;line-height:1.55;max-width:34rem;margin-left:auto;margin-right:auto}
  .ukiyo-about .ctafinal__buttons{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap}
  .ukiyo-about .ctafinal::before{content:"";position:absolute;top:-200px;right:-200px;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle, rgba(212,165,116,.25), transparent 70%);z-index:0}
  .ukiyo-about .ctafinal::after{content:"";position:absolute;bottom:-200px;left:-200px;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle, rgba(156,175,136,.18), transparent 70%);z-index:0}
  .ukiyo-about .btn img.wa-icon{width:24px;height:24px}
</style>

<div class="ukiyo-about">

  <!-- HERO -->
  <section class="hero">
    <div class="hero__bg"><img src="<?php echo esc_url( $hero_image ); ?>" alt="Equipo Ukiyo viajando" loading="eager" fetchpriority="high" decoding="async" /></div>
    <span class="hero__kanji" aria-hidden="true">浮世</span>
    <div class="container hero__inner">
      <div class="breadcrumbs">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a><span>/</span><span>Nosotros</span>
      </div>
      <span class="eyebrow"><span class="dot"></span>浮世 · Ukiyo · El Mundo Flotante</span>
      <h1 class="hero__title">Creando viajes<br/>con <em>alma.</em></h1>
      <p class="hero__sub">Inspirados en lo efímero del <em>mundo flotante</em>, celebramos el presente. Sin prisas ni guiones, buscamos la belleza en la conexión real con cada lugar. Experiencias honestas, sostenibles y vivas.</p>
    </div>
  </section>

  <!-- STORY -->
  <section class="section story">
    <div class="container">
      <div class="story__intro">
        <h2>De un viaje<br/><em>nació una idea.</em></h2>
        <p>Así nació Ukiyo. De la unión entre la mirada creativa de Víctor, capaz de transformar cualquier destino en emoción visual, y la búsqueda de Sergio por viajes auténticos y conscientes, acompañado siempre por Helena.</p>
      </div>

      <div class="story__wrap">
        <div class="story__media">
          <div class="story__media__frame">
            <img src="<?php echo esc_url( $fundadores ); ?>" alt="Sergio y Víctor García-Heras, fundadores de Ukiyo" loading="lazy" />
          </div>
          <div class="story__media__stamp">UKIYO<small>est. 2025</small></div>
          <div class="story__media__caption">
            <h3>Víctor y Sergio</h3>
            <span>Hermanos · Fundadores</span>
          </div>
        </div>

        <div class="story__copy">
          <blockquote>
            "Hoy, Ukiyo no es solo nuestra agencia: es la suma de nuestras pasiones, nuestras formas de viajar y nuestra manera de entender el mundo. Un proyecto familiar para que otras personas puedan vivir viajes reales, lejos de lo masivo y cerca de lo esencial."
          </blockquote>
          <p>Somos dos <strong>hermanos</strong> con caminos muy distintos, pero unidos por una misma forma de ver el mundo.</p>
          <p><strong>Víctor</strong>, creador de contenido y eterno buscador de historias, lleva años capturando momentos que inspiran a viajar.</p>
          <p><strong>Sergio</strong>, un viajero apasionado que recorre el mundo junto a Helena y que ha encontrado en cada viaje una forma de vida, una manera de comprender la belleza de lo auténtico.</p>
          <p>Durante años viajamos por separado, aprendiendo, descubriendo y viviendo experiencias que, sin saberlo, nos estaban llevando exactamente al mismo lugar: <strong>crear algo juntos</strong>.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- TEAM -->
  <section class="section team">
    <div class="container">
      <div class="sec-head">
        <span class="sec-head__chip"><span class="star"></span>El equipo · 仲間</span>
        <h2>Nuestros<br/><em>especialistas.</em></h2>
        <p class="sec-head__sub">Cada miembro del equipo es apasionado, experto y comprometido con ofrecer experiencias únicas.</p>
        <div class="sec-head__divider"></div>
      </div>
      <div class="team__grid">
        <?php foreach ( $team as $idx => $m ) : ?>
          <article class="member">
            <span class="member__num"><?php echo esc_html( sprintf( '%02d', $idx + 1 ) ); ?></span>
            <div class="member__photo"><img src="<?php echo esc_url( $m['photo'] ); ?>" alt="<?php echo esc_attr( $m['name'] ); ?>" loading="lazy" /></div>
            <h3><?php echo esc_html( $m['name'] ); ?></h3>
            <span class="member__role"><?php echo esc_html( $m['role'] ); ?></span>
            <p><?php echo esc_html( $m['bio'] ); ?></p>
            <span class="member__quote"><?php echo esc_html( $m['quote'] ); ?></span>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- VALUES -->
  <section class="section values">
    <div class="container">
      <div class="sec-head sec-head--sage">
        <span class="sec-head__chip sec-head__chip--sage"><span class="star"></span>Nuestros valores · 価値観</span>
        <h2>Cada viaje parte<br/>de los mismos <em>principios.</em></h2>
        <p class="sec-head__sub">Respeto, coherencia y humanidad. Cada experiencia honra tanto al viajero como a las comunidades que nos abren sus puertas.</p>
        <div class="sec-head__divider"></div>
      </div>
      <div class="values__grid">
        <?php foreach ( $values as $idx => $v ) : ?>
          <article class="vcard">
            <span class="vcard__num"><?php echo esc_html( sprintf( '%02d', $idx + 1 ) ); ?></span>
            <div class="vcard__icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?php echo $v['icon']; ?></svg>
            </div>
            <h3><?php echo esc_html( $v['title'] ); ?></h3>
            <p><?php echo esc_html( $v['desc'] ); ?></p>
            <span class="vcard__kanji" aria-hidden="true"><?php echo esc_html( $v['kanji'] ); ?></span>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- TIMELINE -->
  <section class="section timeline">
    <div class="container">
      <div class="sec-head">
        <span class="sec-head__chip sec-head__chip--accent"><span class="star"></span>El viaje · 旅</span>
        <h2>Nuestro viaje<br/>de <em>crecimiento.</em></h2>
        <p class="sec-head__sub">Un trayecto que se convirtió en proyecto.</p>
        <div class="sec-head__divider" style="background:var(--accent)"></div>
      </div>
      <div class="tl">
        <?php foreach ( $timeline as $row ) :
          $is_left = 'left' === $row['side'];
          ?>
          <div class="tl__row">
            <?php if ( $is_left ) : ?>
              <div class="tl__side tl__side--left">
                <div class="card">
                  <span class="yr"><?php echo esc_html( $row['year'] ); ?></span>
                  <h3><?php echo esc_html( $row['title'] ); ?></h3>
                  <p><?php echo esc_html( $row['text'] ); ?></p>
                </div>
              </div>
              <div class="tl__dot"></div>
              <div class="tl__side tl__side--empty"></div>
            <?php else : ?>
              <div class="tl__side tl__side--empty"></div>
              <div class="tl__dot"></div>
              <div class="tl__side tl__side--right">
                <div class="card">
                  <span class="yr"><?php echo esc_html( $row['year'] ); ?></span>
                  <h3><?php echo esc_html( $row['title'] ); ?></h3>
                  <p><?php echo esc_html( $row['text'] ); ?></p>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CTA FINAL -->
  <section class="section ctafinal" id="cta">
    <div class="container">
      <div class="ctafinal__box">
        <span class="ctafinal__stamp"><span class="dot"></span>道 · Empezamos juntos</span>
        <h2>¿Listo para el<br/><em>viaje de tu vida?</em></h2>
        <p>Todo viaje empieza con una conversación. Cuéntanos qué te inspira y crearemos juntos una experiencia que te haga vivir el mundo de otra forma.</p>
        <div class="ctafinal__buttons">
          <a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener" class="btn btn-primary">
            <img class="wa-icon" width="24" height="24" src="<?php echo esc_url( $wa_icon ); ?>" alt="WhatsApp" />
            Hablemos de tu viaje
          </a>
          <a href="<?php echo esc_url( $blog_url ); ?>" class="btn btn-outline">Lee nuestras historias
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

</div><!-- /.ukiyo-about -->

<?php get_footer(); ?>
