<?php
/**
 * Template: Blog Home (page.php for posts index).
 *
 * Implementación del export "Blog.html" de Claude Design.
 *
 * Decisiones:
 *   - Header/footer del tema (get_header / get_footer). Nav y footer del export omitidos.
 *   - CSS scoped a .ukiyo-blog para no contaminar otras plantillas.
 *   - Hero usa imagen del banco del tema (no /assets/blog/).
 *   - Filters: enlaces a las categorías de WP existentes (filter server-side, no JS).
 *   - Quicklinks: 8 enlaces hardcoded apuntando a destinos / viajes de autor.
 *   - Featured: el post sticky más reciente; fallback al post más reciente.
 *   - Lista: WP_Query estándar de la home del blog con paginación nativa.
 *   - WhatsApp: icono icons8 PNG ya existente en el tema.
 */
get_header();

$img_base       = get_template_directory_uri() . '/images';
$wa_url         = 'https://wa.me/message/CS2LNI6YHSETO1';
$wa_icon        = 'https://img.icons8.com/cotton/64/whatsapp--v4.png';
$destinos_url   = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destinations' ) : home_url( '/' );
$autor_url      = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'viajes_autor' ) : home_url( '/' );
$plan_trip_url  = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'plan_trip' ) : home_url( '/' );
$hero_image     = $img_base . '/heroimages/viajes-personalizados-ukiyo-marruecos.webp';
$fallback_image = $img_base . '/heroimages/viajes-personalizados-ukiyo-indonesia.webp';

// Filtro activo (si hay).
$active_category = is_category() ? get_queried_object() : null;
$active_slug     = $active_category ? $active_category->slug : 'all';

// Quicklinks: 8 atajos curados a destinos / tipo de viaje.
$quicklinks = [
	[ 'label' => 'Viajes a medida',     'url' => $destinos_url ],
	[ 'label' => 'Viajes de autor',     'url' => $autor_url ],
	[ 'label' => 'Costa Rica a medida', 'url' => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destination_costa_rica' ) : $destinos_url ],
	[ 'label' => 'Indonesia a medida',  'url' => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destination_indonesia' ) : $destinos_url ],
	[ 'label' => 'Marruecos a medida',  'url' => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destination_marruecos' ) : $destinos_url ],
	[ 'label' => 'Colombia a medida',   'url' => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destination_colombia' ) : $destinos_url ],
	[ 'label' => 'Lanzarote a medida',  'url' => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destination_lanzarote' ) : $destinos_url ],
	[ 'label' => 'Italia a medida',     'url' => function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destination_italia' ) : $destinos_url ],
];

// Categorías del blog para los filtros (top-level con posts).
$blog_categories = get_categories( [
	'hide_empty' => true,
	'orderby'    => 'count',
	'order'      => 'DESC',
] );

// Featured post: el primer sticky publicado; fallback al más reciente.
$sticky_ids = get_option( 'sticky_posts' );
$featured = null;
if ( ! empty( $sticky_ids ) ) {
	$featured_q = new WP_Query( [
		'post__in'       => $sticky_ids,
		'posts_per_page' => 1,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'no_found_rows'  => true,
	] );
	if ( $featured_q->have_posts() ) {
		$featured_q->the_post();
		$featured = get_post();
		wp_reset_postdata();
	}
}
if ( ! $featured ) {
	$latest_q = new WP_Query( [
		'posts_per_page' => 1,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'no_found_rows'  => true,
	] );
	if ( $latest_q->have_posts() ) {
		$latest_q->the_post();
		$featured = get_post();
		wp_reset_postdata();
	}
}
$featured_id = $featured ? $featured->ID : 0;

// Lista de posts (excluyendo el featured, paginada).
$paged       = max( 1, (int) get_query_var( 'paged' ) ?: (int) get_query_var( 'page' ) );
$query_args  = [
	'post_type'      => 'post',
	'posts_per_page' => 9,
	'post_status'    => 'publish',
	'paged'          => $paged,
	'post__not_in'   => $featured_id ? [ $featured_id ] : [],
];
if ( $active_category ) {
	$query_args['category_name'] = $active_slug;
}
$posts_query = new WP_Query( $query_args );

// Total para el contador (toda la lista, con o sin filtro).
$count_args = [
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'fields'         => 'ids',
	'post__not_in'   => $featured_id ? [ $featured_id ] : [],
];
if ( $active_category ) {
	$count_args['category_name'] = $active_slug;
}
$total_posts = count( get_posts( $count_args ) );

// Helper de reading time.
$reading_time = function ( $post_id ) {
	if ( function_exists( 'ukiyo_get_post_reading_time' ) ) {
		return ukiyo_get_post_reading_time( $post_id );
	}
	$content = get_post_field( 'post_content', $post_id );
	$words   = preg_match_all( '/\\S+/u', wp_strip_all_tags( strip_shortcodes( $content ) ) ) ?: 0;
	return max( 1, (int) ceil( $words / 220 ) );
};

// WP-CLI solo asigna imagen destacada si el JSON trae featured_image_id.
$post_card_image = function ( $post_id ) use ( $fallback_image ) {
	$thumbnail = get_the_post_thumbnail_url( $post_id, 'large' );
	if ( $thumbnail ) {
		return $thumbnail;
	}

	$og_image_id = absint( get_post_meta( $post_id, 'ukiyo_og_image_id', true ) );
	if ( $og_image_id ) {
		$og_attachment = wp_get_attachment_image_url( $og_image_id, 'large' );
		if ( $og_attachment ) {
			return $og_attachment;
		}
	}

	$og_image = get_post_meta( $post_id, 'ukiyo_og_image', true );
	if ( $og_image ) {
		return esc_url_raw( $og_image );
	}

	$content = get_post_field( 'post_content', $post_id );
	if ( preg_match( '/<img[^>]+src=["\']([^"\']+)["\']/i', (string) $content, $matches ) ) {
		return esc_url_raw( html_entity_decode( $matches[1], ENT_QUOTES, 'UTF-8' ) );
	}

	return $fallback_image;
};
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap">

<style>
  .ukiyo-blog{
    --primary:#8B4513; --primary-50:#FDF7F3; --primary-100:#F9E8D9; --primary-300:#E8B48D; --primary-700:#6B3410;
    --secondary:#9CAF88; --secondary-700:#5E6952;
    --accent:#D4A574; --accent-300:#EBD2AE; --accent-50:#FDF9F4;
    --bg:#FEFCF8; --surface:#F5F2ED; --paper:#F8F2E7;
    --ink:#2C2C2C; --ink-soft:#6B6B6B; --line:#E8E0D2;
    --font-sans:'Satoshi','Inter',system-ui,sans-serif;
    --font-display:'Rowdies',serif;
    --font-mono:'DM Mono',ui-monospace,monospace;
    --section-y:6rem;
    --radius:18px;
    background:var(--bg); color:var(--ink); font-family:var(--font-sans);
    font-weight:400; font-size:17px; line-height:1.6;
    -webkit-font-smoothing:antialiased;
  }
  .ukiyo-blog *{box-sizing:border-box}
  .ukiyo-blog img{max-width:100%;display:block}
  .ukiyo-blog a{color:inherit;text-decoration:none}
  .ukiyo-blog h1,.ukiyo-blog h2,.ukiyo-blog h3,.ukiyo-blog h4{font-family:var(--font-display);font-weight:400;letter-spacing:-0.01em;line-height:1.1;margin:0}
  .ukiyo-blog .container{max-width:1240px;margin:0 auto;padding:0 1.75rem}

  /* HERO */
  .ukiyo-blog .hero{position:relative;min-height:88vh;display:flex;align-items:center;color:#fff;overflow:hidden;padding:8rem 0 5rem}
  .ukiyo-blog .hero__bg{position:absolute;inset:0;z-index:0}
  .ukiyo-blog .hero__bg img{width:100%;height:100%;object-fit:cover}
  .ukiyo-blog .hero__bg::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg, rgba(0,0,0,.55) 0%, rgba(0,0,0,.25) 40%, rgba(0,0,0,.65) 100%)}
  .ukiyo-blog .hero__inner{position:relative;z-index:1;width:100%;text-align:center}
  .ukiyo-blog .breadcrumbs{display:flex;gap:.5rem;font-size:.85rem;opacity:.85;justify-content:center;margin-bottom:1.6rem;letter-spacing:.02em}
  .ukiyo-blog .breadcrumbs span{opacity:.6}
  .ukiyo-blog .eyebrow{display:inline-flex;align-items:center;gap:.6rem;padding:.45rem 1rem;border-radius:999px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.28);backdrop-filter:blur(8px);font-size:.78rem;letter-spacing:.16em;text-transform:uppercase}
  .ukiyo-blog .eyebrow .dot{width:6px;height:6px;border-radius:50%;background:var(--accent-300)}
  .ukiyo-blog .hero__title{font-size:clamp(2.6rem, 6.2vw, 5.2rem);font-weight:300;letter-spacing:-0.02em;line-height:1.02;margin:1.4rem auto 1.3rem;max-width:20ch;text-shadow:0 2px 24px rgba(0,0,0,.3)}
  .ukiyo-blog .hero__title em{font-style:italic;color:var(--accent-300);font-weight:400}
  .ukiyo-blog .hero__sub{max-width:42rem;margin:0 auto;font-size:1.15rem;line-height:1.55;opacity:.95;text-shadow:0 2px 12px rgba(0,0,0,.4)}

  /* FILTERS (sticky) */
  .ukiyo-blog .filters{position:sticky;top:0;z-index:30;background:rgba(254,252,248,.95);backdrop-filter:blur(12px);border-bottom:1px solid var(--line);padding:1rem 0}
  .ukiyo-blog .filters__row{display:flex;justify-content:center;align-items:center;gap:2.4rem;flex-wrap:wrap;overflow-x:auto}
  .ukiyo-blog .filter{font-family:var(--font-display);font-size:1.05rem;font-weight:300;color:var(--ink-soft);padding:.45rem .2rem;border-bottom:2px solid transparent;letter-spacing:-0.01em;transition:all .25s;white-space:nowrap}
  .ukiyo-blog .filter.is-active{color:var(--primary);border-color:var(--primary);font-style:italic}
  .ukiyo-blog .filter:hover{color:var(--primary)}
  @media (max-width:760px){
    .ukiyo-blog .filters{padding:.85rem 0}
    .ukiyo-blog .filters__row{justify-content:flex-start;padding:0 1rem;gap:1.4rem}
    .ukiyo-blog .filter{font-size:.95rem}
  }

  /* QUICKLINKS */
  .ukiyo-blog .quicklinks{background:var(--paper);padding:3.2rem 0;border-bottom:1px solid var(--line)}
  .ukiyo-blog .quicklinks__head{margin-bottom:1.5rem}
  .ukiyo-blog .quicklinks__head .kicker{display:inline-block;font-family:var(--font-mono);font-size:.74rem;color:var(--primary);letter-spacing:.22em;text-transform:uppercase;font-weight:600;margin-bottom:.6rem}
  .ukiyo-blog .quicklinks__head h2{font-size:clamp(1.6rem, 3vw, 2.2rem);font-weight:300;letter-spacing:-0.01em}
  .ukiyo-blog .quicklinks__head h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-blog .quicklinks__grid{display:grid;grid-template-columns:repeat(4,1fr);gap:.85rem}
  .ukiyo-blog .qlink{display:flex;align-items:center;justify-content:space-between;gap:.6rem;padding:1.05rem 1.3rem;background:#fff;border:1px solid var(--line);border-radius:14px;font-weight:500;font-size:.95rem;color:var(--ink);transition:all .25s}
  .ukiyo-blog .qlink:hover{border-color:var(--primary-300);color:var(--primary);transform:translateY(-2px);box-shadow:0 12px 28px -16px rgba(139,69,19,.2)}
  .ukiyo-blog .qlink svg{flex-shrink:0;width:14px;height:14px;opacity:.6;transition:transform .25s, opacity .25s}
  .ukiyo-blog .qlink:hover svg{transform:translateX(4px);opacity:1}
  @media (max-width:980px){.ukiyo-blog .quicklinks__grid{grid-template-columns:1fr 1fr}}
  @media (max-width:560px){.ukiyo-blog .quicklinks__grid{grid-template-columns:1fr}}

  /* FEATURED */
  .ukiyo-blog .featured{padding:6rem 0 2rem;background:var(--bg)}
  .ukiyo-blog .featured__wrap{display:grid;grid-template-columns:1.05fr 1fr;gap:4.5rem;align-items:center;max-width:1140px;margin:0 auto}
  .ukiyo-blog .featured__media{display:block;width:100%;position:relative;aspect-ratio:4/3;border-radius:24px;overflow:hidden;box-shadow:0 30px 70px -35px rgba(44,44,44,.4)}
  .ukiyo-blog .featured__media img{display:block;width:100%;height:100%;object-fit:cover;transition:transform .9s cubic-bezier(.4,0,.2,1)}
  .ukiyo-blog .featured__wrap:hover .featured__media img{transform:scale(1.04)}
  .ukiyo-blog .featured__media .cat{position:absolute;top:1.2rem;left:1.2rem;z-index:2;background:rgba(255,255,255,.94);color:var(--primary);font-family:var(--font-mono);font-size:.7rem;letter-spacing:.18em;text-transform:uppercase;padding:.4rem .8rem;border-radius:6px;font-weight:600;backdrop-filter:blur(4px)}
  .ukiyo-blog .featured__copy .mark{display:flex;align-items:center;gap:.75rem;font-size:.78rem;font-weight:600;color:var(--primary);letter-spacing:.2em;text-transform:uppercase;margin-bottom:1.5rem;font-family:var(--font-mono)}
  .ukiyo-blog .featured__copy .mark::before{content:"";width:32px;height:1px;background:var(--primary)}
  .ukiyo-blog .featured__copy h2{font-size:clamp(2.2rem, 4.2vw, 3.4rem);font-weight:400;letter-spacing:-0.02em;line-height:1.05;margin-bottom:1.2rem;color:var(--ink)}
  .ukiyo-blog .featured__copy h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-blog .featured__meta{display:flex;align-items:center;gap:.6rem;color:var(--ink-soft);font-size:.88rem;margin-bottom:1.4rem;flex-wrap:wrap}
  .ukiyo-blog .featured__meta strong{color:var(--ink);font-weight:600}
  .ukiyo-blog .featured__excerpt{font-size:1.08rem;color:var(--ink-soft);line-height:1.65;margin-bottom:2.2rem;max-width:30rem}
  .ukiyo-blog .featured__cta{display:inline-flex;align-items:center;gap:.7rem;padding:.95rem 1.6rem;border-radius:999px;font-weight:600;font-size:.92rem;border:1.5px solid var(--ink);color:var(--ink);transition:all .25s}
  .ukiyo-blog .featured__cta:hover{background:var(--primary);border-color:var(--primary);color:#fff;transform:translateY(-2px);box-shadow:0 12px 30px -10px rgba(139,69,19,.45)}
  @media (max-width:880px){
    .ukiyo-blog .featured__wrap{grid-template-columns:1fr;gap:2.2rem}
    .ukiyo-blog .featured__media{aspect-ratio:16/10}
  }

  /* POSTS GRID */
  .ukiyo-blog .posts{background:linear-gradient(180deg, var(--bg) 0%, var(--surface) 100%);padding:5rem 0 var(--section-y)}
  .ukiyo-blog .posts__head{display:flex;justify-content:space-between;align-items:flex-end;gap:2rem;margin-bottom:2.8rem;flex-wrap:wrap}
  .ukiyo-blog .posts__head h2{font-size:clamp(1.8rem, 3.2vw, 2.6rem);font-weight:300;letter-spacing:-0.015em}
  .ukiyo-blog .posts__head h2 em{font-style:italic;color:var(--primary);font-weight:300}
  .ukiyo-blog .posts__count{font-family:var(--font-mono);font-size:.82rem;color:var(--ink-soft);letter-spacing:.06em}
  .ukiyo-blog .posts__count strong{color:var(--primary);font-weight:700}
  .ukiyo-blog .posts__grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.6rem}
  @media (max-width:980px){.ukiyo-blog .posts__grid{grid-template-columns:1fr 1fr}}
  @media (max-width:620px){.ukiyo-blog .posts__grid{grid-template-columns:1fr;max-width:30rem;margin:0 auto}}

  .ukiyo-blog .post{background:#fff;border:1px solid var(--line);border-radius:22px;overflow:hidden;display:flex;flex-direction:column;transition:transform .45s cubic-bezier(.175,.885,.32,1.275), box-shadow .45s, border-color .45s}
  .ukiyo-blog .post:hover{transform:translateY(-8px);box-shadow:0 30px 60px -30px rgba(44,44,44,.25);border-color:var(--primary-100)}
  .ukiyo-blog .post__media{position:relative;aspect-ratio:5/3.4;overflow:hidden}
  .ukiyo-blog .post__media img{width:100%;height:100%;object-fit:cover;transition:transform .9s cubic-bezier(.4,0,.2,1)}
  .ukiyo-blog .post:hover .post__media img{transform:scale(1.08)}
  .ukiyo-blog .post__media::after{content:"";position:absolute;left:0;right:0;bottom:0;height:60%;background:linear-gradient(to top, rgba(0,0,0,.18), transparent);pointer-events:none}
  .ukiyo-blog .post__cat{position:absolute;top:1rem;left:1rem;background:rgba(255,255,255,.94);color:var(--primary);font-family:var(--font-mono);font-size:.68rem;letter-spacing:.18em;text-transform:uppercase;padding:.32rem .65rem;border-radius:6px;font-weight:700;backdrop-filter:blur(6px);z-index:2}
  .ukiyo-blog .post__body{padding:1.5rem 1.5rem 1.4rem;display:flex;flex-direction:column;flex:1}
  .ukiyo-blog .post__head{display:flex;gap:.85rem;margin-bottom:1rem}
  .ukiyo-blog .post__avatar{width:44px;height:44px;border-radius:50%;overflow:hidden;border:2px solid #fff;box-shadow:0 4px 10px rgba(0,0,0,.1);flex-shrink:0}
  .ukiyo-blog .post__avatar img{width:100%;height:100%;object-fit:cover}
  .ukiyo-blog .post__head__txt{padding-top:.15rem;flex:1;min-width:0}
  .ukiyo-blog .post__title{font-family:var(--font-display);font-size:1.25rem;line-height:1.15;font-weight:400;color:var(--ink);margin-bottom:.2rem;letter-spacing:-0.01em;transition:color .25s}
  .ukiyo-blog .post:hover .post__title{color:var(--primary)}
  .ukiyo-blog .post__byline{font-family:var(--font-mono);font-size:.7rem;color:var(--ink-soft);letter-spacing:.12em;text-transform:uppercase}
  .ukiyo-blog .post__excerpt{font-size:.92rem;color:var(--ink-soft);line-height:1.55;margin-bottom:1.6rem;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}
  .ukiyo-blog .post__foot{margin-top:auto;padding-top:1.1rem;border-top:1px solid var(--line);display:flex;justify-content:space-between;align-items:center}
  .ukiyo-blog .post__date{font-family:var(--font-mono);font-size:.72rem;color:var(--ink-soft);letter-spacing:.04em;display:flex;align-items:center;gap:.5rem}
  .ukiyo-blog .post__readtime{font-family:var(--font-mono);font-size:.72rem;color:var(--ink-soft);letter-spacing:.04em;display:flex;align-items:center;gap:.4rem}
  .ukiyo-blog .post__readtime::before{content:"";width:3px;height:3px;border-radius:50%;background:var(--ink-soft);opacity:.5}
  .ukiyo-blog .post__more{color:var(--primary);font-size:.72rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;font-family:var(--font-mono);display:inline-flex;align-items:center;gap:.4rem;transition:gap .25s}
  .ukiyo-blog .post:hover .post__more{gap:.65rem}

  /* PAGER */
  .ukiyo-blog .pager{display:flex;justify-content:center;align-items:center;gap:.6rem;margin-top:3.5rem;flex-wrap:wrap}
  .ukiyo-blog .pager a,
  .ukiyo-blog .pager span{min-width:44px;height:44px;border-radius:50%;border:1px solid var(--line);background:#fff;color:var(--ink);font-family:var(--font-mono);font-size:.85rem;font-weight:600;display:grid;place-items:center;padding:0 .8rem;transition:all .25s}
  .ukiyo-blog .pager a:hover{background:var(--primary-50);border-color:var(--primary-300);color:var(--primary)}
  .ukiyo-blog .pager .current{background:var(--primary);color:#fff;border-color:var(--primary)}
  .ukiyo-blog .pager .dots{border:0;background:transparent}

  /* CTA */
  .ukiyo-blog .cta{background:linear-gradient(160deg, var(--paper) 0%, #FDF7F3 100%);position:relative;overflow:hidden;padding:var(--section-y) 0}
  .ukiyo-blog .cta__box{max-width:760px;margin:0 auto;text-align:center;position:relative;z-index:1}
  .ukiyo-blog .cta__stamp{display:inline-flex;align-items:center;gap:.6rem;font-family:var(--font-mono);font-size:.78rem;color:var(--primary);letter-spacing:.18em;text-transform:uppercase;margin-bottom:1.2rem}
  .ukiyo-blog .cta__stamp .dot{width:6px;height:6px;border-radius:50%;background:var(--primary)}
  .ukiyo-blog .cta h2{font-size:clamp(2.2rem, 4.2vw, 3.4rem);font-weight:300;letter-spacing:-0.02em;line-height:1.05;margin-bottom:1.2rem}
  .ukiyo-blog .cta h2 em{font-style:italic;color:var(--primary)}
  .ukiyo-blog .cta p{font-size:1.1rem;color:var(--ink-soft);margin-bottom:2.2rem;line-height:1.55;max-width:34rem;margin-left:auto;margin-right:auto}
  .ukiyo-blog .cta__buttons{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap}
  .ukiyo-blog .cta::before{content:"";position:absolute;top:-200px;right:-200px;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle, rgba(212,165,116,.25), transparent 70%);z-index:0}
  .ukiyo-blog .cta::after{content:"";position:absolute;bottom:-200px;left:-200px;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle, rgba(156,175,136,.18), transparent 70%);z-index:0}
  .ukiyo-blog .btn{display:inline-flex;align-items:center;gap:.7rem;padding:1rem 1.6rem;border-radius:999px;font-weight:600;font-size:.95rem;transition:transform .25s, box-shadow .25s, background .25s;border:1.5px solid transparent}
  .ukiyo-blog .btn:hover{transform:translateY(-2px)}
  .ukiyo-blog .btn-primary{background:var(--primary);color:#fff;box-shadow:0 10px 30px -10px rgba(139,69,19,.5)}
  .ukiyo-blog .btn-primary:hover{background:var(--primary-700);box-shadow:0 14px 40px -10px rgba(139,69,19,.6)}
  .ukiyo-blog .btn-outline{border-color:var(--ink);color:var(--ink)}
  .ukiyo-blog .btn-outline:hover{background:var(--ink);color:#fff}
  .ukiyo-blog .btn img.wa-icon{width:24px;height:24px}
</style>

<div class="ukiyo-blog">

  <!-- HERO -->
  <section class="hero">
    <div class="hero__bg"><img src="<?php echo esc_url( $hero_image ); ?>" alt="Blog de viajes Ukiyo" width="1920" height="1080" loading="eager" fetchpriority="high" decoding="async" /></div>
    <div class="container hero__inner">
      <div class="breadcrumbs">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a><span>/</span><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>">Blog</a><?php if ( $active_category ) : ?><span>/</span><span><?php echo esc_html( $active_category->name ); ?></span><?php endif; ?>
      </div>
      <span class="eyebrow"><span class="dot"></span>霊感 · Inspiración</span>
      <?php if ( $active_category ) : ?>
        <h1 class="hero__title">Guías de viaje<br/>a <em><?php echo esc_html( $active_category->name ); ?>.</em></h1>
        <p class="hero__sub">Rutas, mejor época, presupuesto e itinerarios reales para preparar tu viaje a <?php echo esc_html( $active_category->name ); ?> con más criterio.</p>
      <?php else : ?>
        <h1 class="hero__title">Blog de viajes a medida<br/>y <em>guías de destino.</em></h1>
        <p class="hero__sub">Guías, rutas y consejos prácticos para preparar tu viaje con más criterio: mejor época, presupuesto, itinerarios y lugares que merece la pena conocer.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- FILTERS (sticky) -->
  <?php if ( ! empty( $blog_categories ) ) : ?>
  <nav class="filters" aria-label="Categorías del blog">
    <div class="container filters__row">
      <a class="filter<?php echo 'all' === $active_slug ? ' is-active' : ''; ?>" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>">Todos</a>
      <?php foreach ( $blog_categories as $cat ) : ?>
        <a class="filter<?php echo $active_slug === $cat->slug ? ' is-active' : ''; ?>" href="<?php echo esc_url( get_category_link( $cat ) ); ?>"><?php echo esc_html( $cat->name ); ?></a>
      <?php endforeach; ?>
    </div>
  </nav>
  <?php endif; ?>

  <!-- QUICKLINKS -->
  <section class="quicklinks">
    <div class="container">
      <div class="quicklinks__head">
        <span class="kicker">Sigue explorando</span>
        <h2>Empieza por el tipo de viaje o por <em>destino.</em></h2>
      </div>
      <div class="quicklinks__grid">
        <?php foreach ( $quicklinks as $ql ) : ?>
          <a class="qlink" href="<?php echo esc_url( $ql['url'] ); ?>">
            <?php echo esc_html( $ql['label'] ); ?>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- FEATURED -->
  <?php if ( $featured ) :
    $f_thumb  = $post_card_image( $featured_id );
    $f_cats   = get_the_category( $featured_id );
    $f_cat_l  = ! empty( $f_cats ) ? $f_cats[0]->name : '';
    $f_author = get_the_author_meta( 'display_name', (int) $featured->post_author );
    $f_excerpt = has_excerpt( $featured_id )
        ? wp_strip_all_tags( get_the_excerpt( $featured ) )
        : wp_trim_words( wp_strip_all_tags( strip_shortcodes( $featured->post_content ) ), 38 );
    $f_read   = $reading_time( $featured_id );
    ?>
  <section class="featured">
    <div class="container">
      <div class="featured__wrap">
        <a class="featured__media" href="<?php echo esc_url( get_permalink( $featured_id ) ); ?>">
          <?php if ( $f_cat_l ) : ?>
            <span class="cat"><?php echo esc_html( $f_cat_l ); ?></span>
          <?php endif; ?>
          <?php if ( $f_thumb ) : ?>
            <img src="<?php echo esc_url( $f_thumb ); ?>" alt="<?php echo esc_attr( get_the_title( $featured_id ) ); ?>" width="1200" height="800" loading="lazy" decoding="async" />
          <?php endif; ?>
        </a>
        <div class="featured__copy">
          <span class="mark">Artículo destacado</span>
          <h2><a href="<?php echo esc_url( get_permalink( $featured_id ) ); ?>"><?php echo wp_kses( get_the_title( $featured_id ), [ 'em' => [], 'strong' => [] ] ); ?></a></h2>
          <div class="featured__meta">
            <span>Por <strong><?php echo esc_html( $f_author ); ?></strong></span>
            <span>·</span>
            <span><?php echo esc_html( get_the_date( 'd M Y', $featured_id ) ); ?></span>
            <span>·</span>
            <span><?php echo esc_html( $f_read ); ?> min de lectura</span>
          </div>
          <?php if ( $f_excerpt ) : ?>
            <p class="featured__excerpt"><?php echo esc_html( $f_excerpt ); ?></p>
          <?php endif; ?>
          <a class="featured__cta" href="<?php echo esc_url( get_permalink( $featured_id ) ); ?>">Continuar leyendo
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- POSTS GRID -->
  <section class="posts">
    <div class="container">
      <div class="posts__head">
        <h2>Últimas <em>guías y crónicas.</em></h2>
        <span class="posts__count"><strong><?php echo esc_html( $total_posts ); ?></strong> <?php echo 1 === (int) $total_posts ? 'artículo' : 'artículos'; ?> · ordenados por fecha</span>
      </div>

      <?php if ( $posts_query->have_posts() ) : ?>
        <div class="posts__grid">
          <?php while ( $posts_query->have_posts() ) : $posts_query->the_post();
            $pid     = get_the_ID();
            $p_thumb = $post_card_image( $pid );
            $p_cats  = get_the_category( $pid );
            $p_cat_l = ! empty( $p_cats ) ? $p_cats[0]->name : '';
            $p_excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words( wp_strip_all_tags( strip_shortcodes( get_the_content() ) ), 26 );
            $p_read    = $reading_time( $pid );
            $p_author  = get_the_author();
            $p_author_id = (int) get_post_field( 'post_author', $pid );
            ?>
            <a class="post" href="<?php the_permalink(); ?>">
              <div class="post__media">
                <?php if ( $p_cat_l ) : ?>
                  <span class="post__cat"><?php echo esc_html( $p_cat_l ); ?></span>
                <?php endif; ?>
                <?php if ( $p_thumb ) : ?>
                  <img src="<?php echo esc_url( $p_thumb ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" width="800" height="600" loading="lazy" decoding="async" />
                <?php endif; ?>
              </div>
              <div class="post__body">
                <div class="post__head">
                  <div class="post__avatar"><?php echo get_avatar( $p_author_id, 88 ); ?></div>
                  <div class="post__head__txt">
                    <h3 class="post__title"><?php the_title(); ?></h3>
                    <span class="post__byline">Por <?php echo esc_html( $p_author ); ?></span>
                  </div>
                </div>
                <?php if ( $p_excerpt ) : ?>
                  <p class="post__excerpt"><?php echo esc_html( $p_excerpt ); ?></p>
                <?php endif; ?>
                <div class="post__foot">
                  <span class="post__date"><?php echo esc_html( get_the_date( 'd M Y' ) ); ?><span class="post__readtime"><?php echo esc_html( $p_read ); ?> min</span></span>
                  <span class="post__more">Leer →</span>
                </div>
              </div>
            </a>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php
        $total_pages = (int) $posts_query->max_num_pages;
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
              <?php foreach ( $links as $link ) echo $link; ?>
            </nav>
        <?php endif; endif; ?>
      <?php else : ?>
        <p style="text-align:center;color:var(--ink-soft);padding:3rem 0">Aún no hay artículos publicados. Vuelve pronto.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta" id="cta">
    <div class="container">
      <div class="cta__box">
        <span class="cta__stamp"><span class="dot"></span>道 · Empezamos juntos</span>
        <h2>¿Quieres preparar tu viaje<br/><em>con ayuda?</em></h2>
        <p>Cuéntanos qué destino tienes en mente y te orientamos con una ruta a medida, tiempos realistas y detalles cuidados.</p>
        <div class="cta__buttons">
          <a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener" class="btn btn-primary">
            <img class="wa-icon" width="24" height="24" src="<?php echo esc_url( $wa_icon ); ?>" alt="WhatsApp" />
            Diseñar mi viaje a medida
          </a>
          <a href="<?php echo esc_url( $plan_trip_url ); ?>" class="btn btn-outline">Empezar una conversación
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

</div><!-- /.ukiyo-blog -->

<?php get_footer(); ?>
