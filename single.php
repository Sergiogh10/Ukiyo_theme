<?php
/**
 * Template: Single Post (Blog · Artículo).
 *
 * Implementación del export "Articulo-Bali.html" de Claude Design.
 *
 * Decisiones:
 *   - Header/footer del tema (get_header / get_footer). Nav y footer del export omitidos.
 *   - CSS scoped a .ukiyo-article para no contaminar otras plantillas.
 *   - TOC sticky generado server-side por ukiyo_prepare_post_content() (ya existe).
 *   - Intro highlight tira de ukiyo_get_post_intro() (meta ukiyo_intro o excerpt).
 *   - Imágenes inline del post: editor de WordPress + media library.
 *   - Featured image del post = hero del artículo.
 *   - Related articles desde meta ukiyo_related_posts (existente), con fallback a misma categoría.
 *   - Prev/next nav usa thumbnails del post anterior/siguiente.
 *
 * Shortcodes editoriales (registrados en inc/shortcodes/loader.php):
 *   [ukiyo_callout], [ukiyo_h2], [ukiyo_seasons]/[ukiyo_season],
 *   [ukiyo_quote], [ukiyo_trip_card]
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

$post_id         = get_the_ID();
$category        = get_the_category();
$primary_cat     = ! empty( $category ) ? $category[0] : null;
$cat_label       = $primary_cat ? $primary_cat->name : '';
$tags            = get_the_tags();
$author_id       = (int) get_post_field( 'post_author', $post_id );
$author_name     = get_the_author_meta( 'display_name', $author_id );
$author_bio      = get_the_author_meta( 'description', $author_id );
$reading_time    = function_exists( 'ukiyo_get_post_reading_time' ) ? ukiyo_get_post_reading_time( $post_id ) : 5;
$intro           = function_exists( 'ukiyo_get_post_intro' ) ? ukiyo_get_post_intro( $post_id ) : '';
$hero_image      = get_the_post_thumbnail_url( $post_id, 'full' );
$blog_home_url   = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'blog' ) : home_url( '/' );
$about_url       = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'about' ) : home_url( '/' );

// Preparo el contenido con IDs estables en h2/h3 y obtengo el TOC.
$prepared = function_exists( 'ukiyo_prepare_post_content' )
	? ukiyo_prepare_post_content( apply_filters( 'the_content', get_the_content() ) )
	: [ 'content' => apply_filters( 'the_content', get_the_content() ), 'toc' => [] ];

$content_html = $prepared['content'];
$toc          = array_values( array_filter( $prepared['toc'], static function ( $item ) {
	return isset( $item['level'] ) && 'h2' === $item['level'];
} ) );

$related_trip_id   = (int) get_post_meta( $post_id, 'ukiyo_related_trip_id', true );
$related_trip_link = $related_trip_id ? get_permalink( $related_trip_id ) : '';

$related_posts_ids = get_post_meta( $post_id, 'ukiyo_related_posts', true );
$related_posts_ids = is_array( $related_posts_ids ) ? array_map( 'intval', $related_posts_ids ) : [];
$related_posts_ids = array_filter( $related_posts_ids, static function ( $id ) use ( $post_id ) {
	return $id && $id !== $post_id;
} );

if ( count( $related_posts_ids ) < 2 && $primary_cat ) {
	$fallback = get_posts(
		[
			'post_type'      => 'post',
			'posts_per_page' => 4,
			'post__not_in'   => array_merge( [ $post_id ], $related_posts_ids ),
			'category__in'   => [ $primary_cat->term_id ],
			'fields'         => 'ids',
			'orderby'        => 'date',
			'order'          => 'DESC',
		]
	);
	$related_posts_ids = array_merge( $related_posts_ids, $fallback );
}
$related_posts_ids = array_slice( array_unique( $related_posts_ids ), 0, 2 );

$prev_post = get_previous_post();
$next_post = get_next_post();
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap">

<style>
  .ukiyo-article{
    --primary:#8B4513; --primary-50:#FDF7F3; --primary-100:#F9E8D9; --primary-300:#E8B48D; --primary-700:#6B3410;
    --secondary:#9CAF88; --secondary-700:#5E6952;
    --accent:#D4A574; --accent-300:#EBD2AE; --accent-50:#FDF9F4;
    --bg:#FEFCF8; --surface:#F5F2ED; --paper:#F8F2E7;
    --ink:#2C2C2C; --ink-soft:#6B6B6B; --line:#E8E0D2;
    --font-sans:'Satoshi','Inter',system-ui,sans-serif;
    --font-display:'Rowdies',serif;
    --font-mono:'DM Mono',ui-monospace,monospace;
    --maxw:1240px;
    --radius:18px;
    background:var(--bg);
    color:var(--ink);
    font-family:var(--font-sans);
    font-weight:400;
    font-size:17px;
    line-height:1.7;
    -webkit-font-smoothing:antialiased;
    text-rendering:optimizeLegibility;
  }
  .ukiyo-article *{box-sizing:border-box}
  .ukiyo-article img{max-width:100%;display:block}
  .ukiyo-article a{color:inherit;text-decoration:none}
  .ukiyo-article h1,
  .ukiyo-article h2,
  .ukiyo-article h3,
  .ukiyo-article h4{font-family:var(--font-display);font-weight:400;letter-spacing:-0.01em;line-height:1.15;margin:0}
  .ukiyo-article .container{max-width:var(--maxw);margin:0 auto;padding:0 1.75rem}

  /* HERO */
  .ukiyo-article .hero{position:relative;min-height:88vh;display:flex;align-items:center;color:#fff;overflow:hidden;padding:7rem 0 9rem}
  .ukiyo-article .hero__bg{position:absolute;inset:0;z-index:0}
  .ukiyo-article .hero__bg img{width:100%;height:100%;object-fit:cover}
  .ukiyo-article .hero__bg::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg, rgba(0,0,0,.35) 0%, rgba(0,0,0,.4) 50%, rgba(0,0,0,.75) 100%)}
  .ukiyo-article .hero__inner{position:relative;z-index:1;width:100%;text-align:center}
  .ukiyo-article .breadcrumbs{display:flex;gap:.5rem;font-size:.85rem;opacity:.85;justify-content:center;margin-bottom:1.4rem;letter-spacing:.02em;flex-wrap:wrap}
  .ukiyo-article .breadcrumbs span{opacity:.6}
  .ukiyo-article .breadcrumbs a:hover{opacity:1;text-decoration:underline}
  .ukiyo-article .hero__cat{display:inline-block;font-family:var(--font-mono);font-size:.78rem;letter-spacing:.32em;text-transform:uppercase;color:var(--accent-300);margin-bottom:1.1rem;font-weight:500}
  .ukiyo-article .hero__title{font-size:clamp(2.6rem, 5.6vw, 4.6rem);font-weight:300;letter-spacing:-0.025em;line-height:1.05;margin:0 auto;max-width:24ch;text-shadow:0 2px 24px rgba(0,0,0,.4)}
  .ukiyo-article .hero__title em{font-style:italic;color:var(--accent-300);font-weight:400}

  /* METABAR */
  .ukiyo-article .metabar-wrap{position:relative;margin-top:-3rem;z-index:5}
  .ukiyo-article .metabar{
    background:#fff;border-radius:24px;
    box-shadow:0 30px 80px -30px rgba(20,28,18,.32),0 0 0 1px var(--line);
    padding:1.6rem 2rem;
    display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;
    max-width:1080px;margin-left:auto;margin-right:auto;
  }
  .ukiyo-article .metabar__cell{display:flex;align-items:center;gap:.9rem;padding:0 .5rem;position:relative}
  .ukiyo-article .metabar__cell+.metabar__cell::before{content:"";position:absolute;left:0;top:50%;transform:translateY(-50%);width:1px;height:42px;background:var(--line)}
  .ukiyo-article .metabar__icon{width:44px;height:44px;border-radius:50%;background:var(--primary-50);color:var(--primary);display:grid;place-items:center;flex-shrink:0}
  .ukiyo-article .metabar__icon svg{width:20px;height:20px}
  .ukiyo-article .metabar__txt h4{font-size:.7rem;text-transform:uppercase;letter-spacing:.16em;color:var(--ink-soft);font-weight:700;font-family:var(--font-sans);margin-bottom:.18rem}
  .ukiyo-article .metabar__txt p{font-family:var(--font-display);font-size:1.05rem;color:var(--ink);font-weight:300;letter-spacing:-0.01em;margin:0;line-height:1.2}
  @media (max-width:880px){
    .ukiyo-article .metabar-wrap{margin-top:-2rem}
    .ukiyo-article .metabar{grid-template-columns:1fr 1fr;gap:1.4rem 1rem;padding:1.6rem 1.4rem}
    .ukiyo-article .metabar__cell+.metabar__cell::before{display:none}
  }

  /* ARTICLE BODY + TOC */
  .ukiyo-article .article{padding:4rem 0 5rem;background:var(--bg)}
  .ukiyo-article .article__layout{display:grid;grid-template-columns:240px 1fr;gap:4rem;max-width:1080px;margin:0 auto}
  .ukiyo-article .toc{position:sticky;top:6rem;align-self:start;font-size:.88rem;line-height:1.5}
  .ukiyo-article .toc__label{display:inline-block;font-family:var(--font-mono);font-size:.7rem;color:var(--primary);letter-spacing:.2em;text-transform:uppercase;font-weight:700;margin-bottom:1.1rem;padding-bottom:.6rem;border-bottom:2px solid var(--primary-100);width:100%}
  .ukiyo-article .toc ol{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:.5rem;counter-reset:toc}
  .ukiyo-article .toc li{counter-increment:toc;position:relative;padding-left:2rem}
  .ukiyo-article .toc li::before{content:counter(toc, decimal-leading-zero);position:absolute;left:0;top:.1rem;font-family:var(--font-mono);font-size:.72rem;color:var(--ink-soft);font-weight:500;letter-spacing:.04em}
  .ukiyo-article .toc a{color:var(--ink-soft);transition:color .25s, transform .25s;display:inline-block}
  .ukiyo-article .toc a:hover,
  .ukiyo-article .toc a.is-current{color:var(--primary);transform:translateX(2px)}
  .ukiyo-article .toc__divider{height:1px;background:var(--line);margin:1.4rem 0}
  .ukiyo-article .toc__cta{font-family:var(--font-mono);font-size:.74rem;color:var(--primary);letter-spacing:.14em;text-transform:uppercase;font-weight:700;display:inline-flex;align-items:center;gap:.4rem;transition:gap .25s}
  .ukiyo-article .toc__cta:hover{gap:.6rem}
  @media (max-width:980px){
    .ukiyo-article .article__layout{grid-template-columns:1fr;gap:2rem}
    .ukiyo-article .toc{position:relative;top:auto;background:var(--paper);padding:1.4rem 1.6rem;border-radius:14px;border:1px solid var(--line)}
    .ukiyo-article .toc__divider{margin:1.2rem 0}
  }

  .ukiyo-article .article__content{max-width:42rem;min-width:0}

  /* Intro highlight + callout */
  .ukiyo-article .intro,
  .ukiyo-article .ukiyo-callout{
    background:var(--paper);border:1px solid var(--line);border-radius:18px;
    padding:1.8rem 2rem;margin-bottom:3rem;position:relative;
  }
  .ukiyo-article .intro::before,
  .ukiyo-article .ukiyo-callout::before{content:"";position:absolute;left:0;top:1.6rem;bottom:1.6rem;width:3px;background:var(--primary);border-radius:0 4px 4px 0}
  .ukiyo-article .ukiyo-callout--sage::before{background:var(--secondary-700)}
  .ukiyo-article .ukiyo-callout--accent::before{background:var(--accent)}
  .ukiyo-article .intro p,
  .ukiyo-article .ukiyo-callout p{font-size:1.18rem;line-height:1.65;color:var(--ink);margin:0 0 .8rem;font-weight:400}
  .ukiyo-article .intro p:last-child,
  .ukiyo-article .ukiyo-callout p:last-child{margin-bottom:0}

  /* Prose */
  .ukiyo-article .prose h2{
    font-family:var(--font-display);font-size:clamp(1.7rem,3vw,2.3rem);font-weight:400;letter-spacing:-0.015em;
    margin:3rem 0 1.2rem;color:var(--ink);scroll-margin-top:5rem
  }
  .ukiyo-article .prose h2:first-child{margin-top:0}
  .ukiyo-article .prose h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-article .prose h2 .num{font-family:var(--font-mono);font-size:.78rem;color:var(--primary);letter-spacing:.18em;text-transform:uppercase;display:block;margin-bottom:.5rem;font-weight:600}
  .ukiyo-article .prose h3{font-family:var(--font-display);font-size:1.35rem;font-weight:400;margin:2.2rem 0 .8rem;color:var(--ink);letter-spacing:-0.01em}
  .ukiyo-article .prose p{margin:0 0 1.25rem;color:var(--ink);font-size:1.05rem;line-height:1.75}
  .ukiyo-article .prose p strong{color:var(--ink);font-weight:600}
  .ukiyo-article .prose p a{color:var(--primary);border-bottom:1px solid var(--primary-300);transition:border-color .25s}
  .ukiyo-article .prose p a:hover{border-color:var(--primary)}
  .ukiyo-article .prose ul,
  .ukiyo-article .prose ol{margin:0 0 1.5rem;padding:0 0 0 1.4rem}
  .ukiyo-article .prose ul li,
  .ukiyo-article .prose ol li{margin-bottom:.5rem;line-height:1.7}
  .ukiyo-article .prose ul li::marker{color:var(--primary)}
  .ukiyo-article .prose figure,
  .ukiyo-article .prose .wp-caption{margin:2.4rem 0;border-radius:18px;overflow:hidden}
  .ukiyo-article .prose figure img,
  .ukiyo-article .prose .wp-caption img{width:100%;height:auto;display:block;border-radius:18px}
  .ukiyo-article .prose figcaption,
  .ukiyo-article .prose .wp-caption-text{font-family:var(--font-mono);font-size:.78rem;color:var(--ink-soft);text-align:center;letter-spacing:.04em;margin-top:.8rem}

  /* Quote (shortcode) */
  .ukiyo-article .ukiyo-quote{
    border-left:0;margin:2.4rem 0;padding:1.6rem 2rem;background:var(--accent-50);border-radius:14px;position:relative;
    font-family:var(--font-display);font-size:1.25rem;line-height:1.4;color:var(--ink);font-weight:300;font-style:italic;
  }
  .ukiyo-article .ukiyo-quote::before{content:"\201C";position:absolute;top:-.6rem;left:1.2rem;font-family:var(--font-display);font-size:4rem;color:var(--primary-300);line-height:1}
  .ukiyo-article .ukiyo-quote cite{display:block;margin-top:.8rem;font-family:var(--font-mono);font-size:.74rem;color:var(--ink-soft);letter-spacing:.14em;text-transform:uppercase;font-style:normal;font-weight:600}
  .ukiyo-article .ukiyo-quote cite::before{content:"\2014 "}

  /* Seasons grid (shortcode) */
  .ukiyo-article .ukiyo-seasons{
    display:grid;grid-template-columns:1fr 1fr;gap:.8rem;margin:1.8rem 0 2.6rem;
    background:linear-gradient(160deg, var(--accent-50) 0%, var(--paper) 100%);
    padding:1.6rem 1.8rem;border:1px solid var(--line);border-radius:16px;
  }
  .ukiyo-article .ukiyo-season__item{display:flex;flex-direction:column;gap:.18rem;padding:.4rem .6rem .4rem 1rem;border-left:2px solid var(--primary)}
  .ukiyo-article .ukiyo-season__k{font-family:var(--font-mono);font-size:.66rem;color:var(--primary);letter-spacing:.16em;text-transform:uppercase;font-weight:700}
  .ukiyo-article .ukiyo-season__v{font-family:var(--font-display);font-size:1.1rem;color:var(--ink);font-weight:400;letter-spacing:-0.01em}
  @media (max-width:600px){.ukiyo-article .ukiyo-seasons{grid-template-columns:1fr}}

  /* Trip card embedded (shortcode) */
  .ukiyo-article .ukiyo-trip-card{
    background:#fff;border:1px solid var(--primary-100);border-radius:20px;overflow:hidden;
    box-shadow:0 24px 50px -30px rgba(139,69,19,.3);
    display:grid;grid-template-columns:200px 1fr;gap:1.5rem;padding:1.5rem;margin:2.6rem 0;position:relative;
  }
  .ukiyo-article .ukiyo-trip-card::before{content:"";position:absolute;left:0;top:0;bottom:0;width:4px;background:var(--primary)}
  .ukiyo-article .ukiyo-trip-card__img{aspect-ratio:1;border-radius:14px;overflow:hidden}
  .ukiyo-article .ukiyo-trip-card__img img{width:100%;height:100%;object-fit:cover;transition:transform .8s}
  .ukiyo-article .ukiyo-trip-card:hover .ukiyo-trip-card__img img{transform:scale(1.06)}
  .ukiyo-article .ukiyo-trip-card__body{display:flex;flex-direction:column;justify-content:space-between;padding:.3rem 0}
  .ukiyo-article .ukiyo-trip-card__kicker{font-family:var(--font-mono);font-size:.7rem;color:var(--primary);letter-spacing:.2em;text-transform:uppercase;font-weight:700;margin-bottom:.5rem}
  .ukiyo-article .ukiyo-trip-card h3{font-family:var(--font-display);font-size:1.45rem;font-weight:400;color:var(--ink);margin-bottom:.6rem;line-height:1.15;letter-spacing:-0.01em}
  .ukiyo-article .ukiyo-trip-card p{font-size:.92rem;color:var(--ink-soft);line-height:1.5;margin:0 0 1rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
  .ukiyo-article .ukiyo-trip-card__foot{display:flex;justify-content:space-between;align-items:center;gap:1rem;flex-wrap:wrap}
  .ukiyo-article .ukiyo-trip-card__price{font-family:var(--font-display);font-size:1.5rem;color:var(--ink);letter-spacing:-0.01em}
  .ukiyo-article .ukiyo-trip-card__price small{font-size:.7rem;color:var(--ink-soft);font-family:var(--font-mono);letter-spacing:.14em;text-transform:uppercase;font-weight:600;display:block}
  .ukiyo-article .ukiyo-trip-card__btn{display:inline-flex;align-items:center;gap:.5rem;background:var(--ink);color:#fff;padding:.7rem 1.2rem;border-radius:999px;font-weight:600;font-size:.85rem;transition:all .25s}
  .ukiyo-article .ukiyo-trip-card__btn:hover{background:var(--primary);transform:translateY(-2px);box-shadow:0 12px 24px -10px rgba(139,69,19,.4)}
  @media (max-width:760px){
    .ukiyo-article .ukiyo-trip-card{grid-template-columns:1fr;text-align:center}
    .ukiyo-article .ukiyo-trip-card::before{height:4px;width:auto;left:0;right:0;top:0;bottom:auto}
    .ukiyo-article .ukiyo-trip-card__img{aspect-ratio:16/10;max-height:200px}
    .ukiyo-article .ukiyo-trip-card__foot{justify-content:center}
  }

  /* Tags + author box */
  .ukiyo-article .tags{display:flex;flex-wrap:wrap;gap:.5rem;margin-top:3rem;padding-top:2.4rem;border-top:1px solid var(--line)}
  .ukiyo-article .tag{padding:.35rem .8rem;background:var(--surface);color:var(--ink-soft);font-family:var(--font-mono);font-size:.7rem;letter-spacing:.1em;text-transform:uppercase;font-weight:600;border-radius:999px;border:1px solid var(--line);transition:all .25s}
  .ukiyo-article .tag:hover{background:var(--primary-50);color:var(--primary);border-color:var(--primary-300)}
  .ukiyo-article .authorbox{
    margin-top:3rem;background:var(--paper);border:1px solid var(--line);border-radius:20px;
    padding:2rem;display:grid;grid-template-columns:auto 1fr;gap:1.6rem;align-items:center;
  }
  .ukiyo-article .authorbox__avatar{width:88px;height:88px;border-radius:50%;overflow:hidden;border:3px solid #fff;box-shadow:0 0 0 2px var(--accent-300), 0 12px 30px -10px rgba(44,44,44,.2)}
  .ukiyo-article .authorbox__avatar img{width:100%;height:100%;object-fit:cover}
  .ukiyo-article .authorbox h4{font-size:1.25rem;margin-bottom:.4rem;font-weight:400;letter-spacing:-0.01em}
  .ukiyo-article .authorbox p{margin:0 0 .8rem;color:var(--ink-soft);font-size:.95rem;line-height:1.55}
  .ukiyo-article .authorbox a.more{font-family:var(--font-mono);font-size:.74rem;color:var(--primary);letter-spacing:.14em;text-transform:uppercase;font-weight:700;display:inline-flex;align-items:center;gap:.35rem;transition:gap .25s}
  .ukiyo-article .authorbox a.more:hover{gap:.55rem}
  @media (max-width:600px){
    .ukiyo-article .authorbox{grid-template-columns:1fr;text-align:center;padding:1.6rem}
    .ukiyo-article .authorbox__avatar{margin:0 auto}
  }

  /* Related */
  .ukiyo-article .related{padding:5rem 0;background:var(--surface);border-top:1px solid var(--line)}
  .ukiyo-article .related__head{display:flex;align-items:center;gap:.85rem;margin-bottom:2.4rem;max-width:1080px;margin-left:auto;margin-right:auto}
  .ukiyo-article .related__head::before{content:"";width:36px;height:1px;background:var(--primary)}
  .ukiyo-article .related__head h2{font-size:clamp(1.7rem,3vw,2.4rem);font-weight:300;letter-spacing:-0.015em}
  .ukiyo-article .related__head h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-article .related__grid{display:grid;grid-template-columns:1fr 1fr;gap:1.6rem;max-width:1080px;margin:0 auto}
  .ukiyo-article .rcard{background:#fff;border:1px solid var(--line);border-radius:20px;overflow:hidden;cursor:pointer;transition:transform .45s, box-shadow .45s, border-color .45s;display:grid;grid-template-columns:200px 1fr}
  .ukiyo-article .rcard:hover{transform:translateY(-4px);box-shadow:0 24px 50px -25px rgba(44,44,44,.22);border-color:var(--primary-100)}
  .ukiyo-article .rcard__media{position:relative;overflow:hidden}
  .ukiyo-article .rcard__media img{width:100%;height:100%;object-fit:cover;transition:transform .8s}
  .ukiyo-article .rcard:hover .rcard__media img{transform:scale(1.08)}
  .ukiyo-article .rcard__cat{position:absolute;top:.7rem;left:.7rem;background:rgba(255,255,255,.94);color:var(--primary);font-family:var(--font-mono);font-size:.6rem;letter-spacing:.16em;text-transform:uppercase;padding:.22rem .55rem;border-radius:5px;font-weight:700}
  .ukiyo-article .rcard__body{padding:1.2rem 1.3rem;display:flex;flex-direction:column}
  .ukiyo-article .rcard__title{font-family:var(--font-display);font-size:1.1rem;line-height:1.2;font-weight:400;margin-bottom:.5rem;color:var(--ink)}
  .ukiyo-article .rcard__excerpt{font-size:.85rem;color:var(--ink-soft);line-height:1.5;margin:0 0 1rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
  .ukiyo-article .rcard__foot{margin-top:auto;padding-top:.7rem;border-top:1px solid var(--line);display:flex;justify-content:space-between;align-items:center}
  .ukiyo-article .rcard__date{font-family:var(--font-mono);font-size:.7rem;color:var(--ink-soft)}
  .ukiyo-article .rcard__more{color:var(--primary);font-size:.7rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;font-family:var(--font-mono)}
  @media (max-width:760px){
    .ukiyo-article .related__grid{grid-template-columns:1fr}
    .ukiyo-article .rcard{grid-template-columns:1fr}
    .ukiyo-article .rcard__media{aspect-ratio:16/10}
  }

  /* Prev / next nav */
  .ukiyo-article .pnnav{display:grid;grid-template-columns:1fr 1fr;border-top:1px solid var(--line);background:#000;color:#fff}
  .ukiyo-article .pnnav a{position:relative;display:flex;align-items:center;justify-content:center;text-align:center;padding:4rem 2rem;overflow:hidden;min-height:320px;transition:background .35s}
  .ukiyo-article .pnnav a::before{content:"";position:absolute;inset:0;background-size:cover;background-position:center;transition:transform .8s;z-index:0;background-image:var(--pnnav-img)}
  .ukiyo-article .pnnav a::after{content:"";position:absolute;inset:0;background:rgba(0,0,0,.6);transition:background .35s;z-index:1}
  .ukiyo-article .pnnav a:hover::after{background:rgba(0,0,0,.45)}
  .ukiyo-article .pnnav a:hover::before{transform:scale(1.08)}
  .ukiyo-article .pnnav a > *{position:relative;z-index:2}
  .ukiyo-article .pnnav .label{display:inline-flex;align-items:center;gap:.6rem;font-family:var(--font-mono);font-size:.74rem;letter-spacing:.22em;text-transform:uppercase;color:rgba(255,255,255,.8);margin-bottom:1rem;font-weight:600}
  .ukiyo-article .pnnav .label svg{width:14px;height:14px}
  .ukiyo-article .pnnav h3{font-size:clamp(1.3rem,2.4vw,1.9rem);font-weight:400;letter-spacing:-0.01em;max-width:24rem;margin:0 auto;text-shadow:0 2px 14px rgba(0,0,0,.35)}
  .ukiyo-article .pnnav .next{border-left:1px solid rgba(255,255,255,.1)}
  @media (max-width:760px){
    .ukiyo-article .pnnav{grid-template-columns:1fr}
    .ukiyo-article .pnnav a{min-height:240px;padding:3rem 1.5rem}
    .ukiyo-article .pnnav .next{border-left:0;border-top:1px solid rgba(255,255,255,.1)}
  }
</style>

<div class="ukiyo-article">

  <header class="hero">
    <?php if ( $hero_image ) : ?>
      <div class="hero__bg">
        <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="eager" fetchpriority="high" decoding="async" />
      </div>
    <?php endif; ?>
    <div class="container hero__inner">
      <div class="breadcrumbs">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a><span>/</span>
        <a href="<?php echo esc_url( $blog_home_url ); ?>">Blog</a>
        <?php if ( $cat_label ) : ?>
          <span>/</span>
          <a href="<?php echo esc_url( get_category_link( $primary_cat->term_id ) ); ?>"><?php echo esc_html( $cat_label ); ?></a>
        <?php endif; ?>
      </div>
      <?php if ( $cat_label ) : ?>
        <span class="hero__cat"><?php echo esc_html( $cat_label ); ?></span>
      <?php endif; ?>
      <h1 class="hero__title"><?php echo wp_kses( get_the_title(), [ 'em' => [], 'strong' => [] ] ); ?></h1>
    </div>
  </header>

  <div class="metabar-wrap">
    <div class="container">
      <div class="metabar">
        <div class="metabar__cell">
          <div class="metabar__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          </div>
          <div class="metabar__txt"><h4>Publicado</h4><p><?php echo esc_html( get_the_date( 'd \d\e F, Y' ) ); ?></p></div>
        </div>
        <div class="metabar__cell">
          <div class="metabar__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>
          </div>
          <div class="metabar__txt"><h4>Autor</h4><p><?php echo esc_html( $author_name ); ?></p></div>
        </div>
        <?php if ( $cat_label ) : ?>
        <div class="metabar__cell">
          <div class="metabar__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41 13.41 20.6a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><circle cx="7" cy="7" r="1.5"/></svg>
          </div>
          <div class="metabar__txt"><h4>Categoría</h4><p><?php echo esc_html( $cat_label ); ?></p></div>
        </div>
        <?php endif; ?>
        <div class="metabar__cell">
          <div class="metabar__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
          </div>
          <div class="metabar__txt"><h4>Lectura</h4><p><?php echo esc_html( $reading_time ); ?> min</p></div>
        </div>
      </div>
    </div>
  </div>

  <main class="article">
    <div class="container article__layout">

      <aside class="toc" aria-label="Índice del artículo">
        <span class="toc__label">En este artículo</span>
        <?php if ( ! empty( $toc ) ) : ?>
          <ol>
            <?php foreach ( $toc as $item ) : ?>
              <li><a href="#<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a></li>
            <?php endforeach; ?>
          </ol>
        <?php endif; ?>
        <?php if ( $related_trip_link ) : ?>
          <div class="toc__divider"></div>
          <a href="<?php echo esc_url( $related_trip_link ); ?>" class="toc__cta">
            Ver viaje a medida
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        <?php endif; ?>
      </aside>

      <article class="article__content">

        <?php if ( '' !== $intro ) : ?>
          <section class="intro">
            <p><?php echo wp_kses( $intro, [ 'strong' => [], 'em' => [], 'br' => [], 'a' => [ 'href' => [], 'rel' => [], 'target' => [] ] ] ); ?></p>
          </section>
        <?php endif; ?>

        <div class="prose">
          <?php echo $content_html; // ya pasó por apply_filters('the_content') + ukiyo_prepare_post_content() ?>
        </div>

        <?php if ( $tags ) : ?>
          <div class="tags">
            <?php foreach ( $tags as $tag ) : ?>
              <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="tag"><?php echo esc_html( $tag->name ); ?></a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <div class="authorbox">
          <div class="authorbox__avatar">
            <?php echo get_avatar( $author_id, 96 ); ?>
          </div>
          <div>
            <h4>Sobre <?php echo esc_html( $author_name ); ?></h4>
            <?php if ( $author_bio ) : ?>
              <p><?php echo esc_html( $author_bio ); ?></p>
            <?php endif; ?>
            <a class="more" href="<?php echo esc_url( $about_url ); ?>">Conocer al equipo
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
        </div>

      </article>
    </div>
  </main>

  <?php if ( ! empty( $related_posts_ids ) ) : ?>
    <section class="related">
      <div class="container">
        <div class="related__head">
          <h2>Artículos <em>relacionados.</em></h2>
        </div>
        <div class="related__grid">
          <?php foreach ( $related_posts_ids as $rid ) :
            $r_thumb = get_the_post_thumbnail_url( $rid, 'large' );
            $r_cat   = get_the_category( $rid );
            $r_cat_l = ! empty( $r_cat ) ? $r_cat[0]->name : '';
            ?>
            <a class="rcard" href="<?php echo esc_url( get_permalink( $rid ) ); ?>">
              <?php if ( $r_thumb ) : ?>
                <div class="rcard__media">
                  <?php if ( $r_cat_l ) : ?>
                    <span class="rcard__cat"><?php echo esc_html( $r_cat_l ); ?></span>
                  <?php endif; ?>
                  <img src="<?php echo esc_url( $r_thumb ); ?>" alt="<?php echo esc_attr( get_the_title( $rid ) ); ?>" loading="lazy" />
                </div>
              <?php endif; ?>
              <div class="rcard__body">
                <h3 class="rcard__title"><?php echo esc_html( get_the_title( $rid ) ); ?></h3>
                <?php $r_excerpt = get_the_excerpt( $rid ); if ( $r_excerpt ) : ?>
                  <p class="rcard__excerpt"><?php echo esc_html( wp_trim_words( $r_excerpt, 22 ) ); ?></p>
                <?php endif; ?>
                <div class="rcard__foot">
                  <span class="rcard__date"><?php echo esc_html( get_the_date( 'd M Y', $rid ) ); ?></span>
                  <span class="rcard__more">Leer →</span>
                </div>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if ( $prev_post || $next_post ) : ?>
    <nav class="pnnav">
      <?php if ( $prev_post ) :
        $p_thumb = get_the_post_thumbnail_url( $prev_post->ID, 'large' );
        ?>
        <a class="prev" href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>"<?php echo $p_thumb ? ' style="--pnnav-img: url(\'' . esc_url( $p_thumb ) . '\')"' : ''; ?>>
          <div>
            <span class="label">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/></svg>
              Post anterior
            </span>
            <h3><?php echo esc_html( get_the_title( $prev_post ) ); ?></h3>
          </div>
        </a>
      <?php endif; ?>
      <?php if ( $next_post ) :
        $n_thumb = get_the_post_thumbnail_url( $next_post->ID, 'large' );
        ?>
        <a class="next" href="<?php echo esc_url( get_permalink( $next_post ) ); ?>"<?php echo $n_thumb ? ' style="--pnnav-img: url(\'' . esc_url( $n_thumb ) . '\')"' : ''; ?>>
          <div>
            <span class="label">
              Siguiente post
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <h3><?php echo esc_html( get_the_title( $next_post ) ); ?></h3>
          </div>
        </a>
      <?php endif; ?>
    </nav>
  <?php endif; ?>

</div><!-- /.ukiyo-article -->

<script>
(function(){
  const root = document.querySelector('.ukiyo-article');
  if(!root) return;
  const links = root.querySelectorAll('.toc a[href^="#"]');
  const map = new Map();
  links.forEach(a => {
    const id = a.getAttribute('href').slice(1);
    const target = document.getElementById(id);
    if (target) map.set(target, a);
  });
  if (map.size === 0) return;
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      const link = map.get(e.target);
      if (!link) return;
      if (e.isIntersecting) {
        links.forEach(l => l.classList.remove('is-current'));
        link.classList.add('is-current');
      }
    });
  }, { rootMargin: '-30% 0px -55% 0px', threshold: 0 });
  map.forEach((_link, section) => io.observe(section));
})();
</script>

<?php get_footer(); ?>
