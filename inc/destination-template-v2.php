<?php
/**
 * Destination Template v2.
 *
 * Implementa el diseño Claude Design "Destino-Costa-Rica.html" como helper
 * reutilizable para las páginas de cada destino: Costa Rica, Indonesia, Italia,
 * Colombia, Marruecos y Lanzarote.
 *
 * Uso desde una page-{destino}.php:
 *
 *   ukiyo_render_destination_v2( [
 *     'slug'         => 'in',                 // wrapper class .ukiyo-dest-v2 + data-dest
 *     'breadcrumb'   => 'Indonesia',
 *     'eyebrow'      => 'Sudeste Asiático · インドネシア · Indonesia',
 *     'hero_title'   => 'Indonesia,<br/>el archipiélago de <em>los mil matices.</em>',
 *     'hero_sub'     => '...',
 *     'hero_image'   => $url,
 *     'cta_primary'  => 'Diseñar mi viaje a Indonesia',
 *     'scroll_label' => 'Selamat datang',
 *     'key_facts'    => [ [...], [...], ... ],
 *     'intro'        => [ 'title_html' => '...', 'lede_html' => '...', 'paragraphs' => [...], 'marks' => [...], 'main_img' => '...', 'pip_img' => '...', 'stamp' => '...' ],
 *     'features_chip' => 'Razones para venir',
 *     'features_title_html' => 'Lo que hace <em>única</em><br/>a Indonesia.',
 *     'features_sub' => '...',
 *     'features'     => [ [...], ... ],            // 6 items con span 3,3,2,2,2,4
 *     'carousel_meta'  => 'Itinerario abierto',
 *     'carousel_title_html' => 'Ocho lugares<br/>que <em>marcan</em> la ruta.',
 *     'carousel_items' => [ [...], ... ],          // {title, description, imagePath, tag}
 *     'hosts_chip'  => 'La gente de la ruta',
 *     'hosts_title_html' => 'Conoce a nuestros<br/><em>anfitriones.</em>',
 *     'hosts_sub'   => '...',
 *     'hosts'       => [ [...], ... ],             // {badge, role, name_html, bio, meta:[{l,v}], image}
 *     'tips_chip'   => 'Antes de salir',
 *     'tips_title_html' => 'Recomendaciones <em>Ukiyo</em>',
 *     'tips_sub'    => '...',
 *     'tips_prep'   => [ 'title' => 'Equipaje esencial', 'sub' => '...', 'items_html' => [ '...', '...' ] ],
 *     'tips_notes'  => [ 'title' => 'Notas importantes', 'sub' => '...', 'items_html' => [ '...', '...' ] ],
 *     'cta_bg'      => $url,
 *     'cta_title_html' => '¿Listo para vivir<br/><em>Indonesia?</em>',
 *     'cta_text'    => '...',
 *     'cta_primary_btn' => 'Diseñar mi viaje a Indonesia',
 *     'destination_key' => 'destination_indonesia',  // para los helpers de tema
 *     'destination_name' => 'Indonesia',
 *     'related_keys'    => [ 'destination_costa_rica', ... ],
 *     'related_intro'   => '...',
 *     'blog_intro'      => '...',
 *     'blog_category'   => 'indonesia',
 *   ] );
 *
 * Imprime una sola vez el CSS por petición; los renders posteriores omiten <style>.
 */

if ( ! function_exists( 'ukiyo_render_destination_v2' ) ) {

	function ukiyo_render_destination_v2( array $cfg ) {
		static $css_printed = false;

		// Defaults seguros para no romper si falta algo.
		$cfg = wp_parse_args( $cfg, [
			'slug'                => 'dest',
			'breadcrumb'          => '',
			'eyebrow'             => '',
			'hero_title'          => '',
			'hero_sub'            => '',
			'hero_image'          => '',
			'cta_primary'         => 'Diseñar mi viaje',
			'cta_secondary'       => 'Ver lugares',
			'scroll_label'        => '',
			'key_facts'           => [],
			'intro'               => [],
			'features_chip'       => 'Razones para venir',
			'features_title_html' => '',
			'features_sub'        => '',
			'features'            => [],
			'carousel_meta'       => 'Itinerario abierto',
			'carousel_title_html' => '',
			'carousel_sub'        => '',
			'carousel_items'      => [],
			'hosts_chip'          => 'La gente de la ruta',
			'hosts_title_html'    => '',
			'hosts_sub'           => '',
			'hosts'               => [],
			'tips_chip'           => 'Antes de salir',
			'tips_title_html'     => 'Recomendaciones <em>Ukiyo</em>',
			'tips_sub'            => '',
			'tips_prep'           => null,
			'tips_notes'          => null,
			'cta_bg'              => '',
			'cta_title_html'      => '',
			'cta_text'            => '',
			'cta_primary_btn'     => 'Diseñar mi viaje',
			'destination_key'     => '',
			'destination_name'    => '',
			'related_title'       => 'Otros viajes que encajan con esta ruta',
			'related_keys'        => [],
			'related_intro'       => '',
			'blog_title'          => '',
			'blog_intro'          => '',
			'blog_category'       => '',
		] );

		$wa_url   = 'https://wa.me/message/CS2LNI6YHSETO1';
		$wa_icon  = 'https://img.icons8.com/cotton/64/whatsapp--v4.png';
		$home_url = home_url( '/' );
		$dest_url = function_exists( 'ukiyo_get_route_url' ) ? ukiyo_get_route_url( 'destinations' ) : $home_url;

		if ( ! $css_printed ) {
			$css_printed = true;
			ukiyo_destination_v2_styles();
		}

		$slug = sanitize_html_class( $cfg['slug'] ) ?: 'dest';
		?>

<div class="ukiyo-dest-v2" data-dest="<?php echo esc_attr( $slug ); ?>">

  <!-- HERO -->
  <section class="hero">
    <div class="hero__bg">
      <?php if ( $cfg['hero_image'] ) : ?>
        <img src="<?php echo esc_url( $cfg['hero_image'] ); ?>" alt="<?php echo esc_attr( $cfg['breadcrumb'] ); ?>" loading="eager" fetchpriority="high" decoding="async" />
      <?php endif; ?>
    </div>
    <div class="container hero__inner">
      <div class="breadcrumbs">
        <a href="<?php echo esc_url( $home_url ); ?>">Inicio</a><span>/</span><a href="<?php echo esc_url( $dest_url ); ?>">Destinos</a><span>/</span><span><?php echo esc_html( $cfg['breadcrumb'] ); ?></span>
      </div>
      <?php if ( $cfg['eyebrow'] ) : ?>
        <span class="eyebrow"><span class="dot"></span><?php echo esc_html( $cfg['eyebrow'] ); ?></span>
      <?php endif; ?>
      <h1 class="hero__title"><?php echo wp_kses( $cfg['hero_title'], [ 'em' => [], 'br' => [] ] ); ?></h1>
      <p class="hero__sub"><?php echo esc_html( $cfg['hero_sub'] ); ?></p>
      <div class="hero__ctas">
        <a href="#cta" class="btn btn-primary"><?php echo esc_html( $cfg['cta_primary'] ); ?>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a href="#lugares" class="btn btn-ghost"><?php echo esc_html( $cfg['cta_secondary'] ); ?>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12l7 7 7-7" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>
    <?php if ( $cfg['scroll_label'] ) : ?>
      <div class="hero__scroll"><span><?php echo esc_html( $cfg['scroll_label'] ); ?></span><div class="line"></div></div>
    <?php endif; ?>
  </section>

  <!-- KEY FACTS -->
  <?php if ( ! empty( $cfg['key_facts'] ) ) : ?>
  <section class="keyfacts">
    <div class="container">
      <div class="keyfacts__inner reveal">
        <?php foreach ( $cfg['key_facts'] as $kf ) :
          $kf = wp_parse_args( $kf, [ 'icon' => '', 'lbl' => '', 'val' => '' ] );
        ?>
          <div class="kf">
            <div class="kf__ico"><?php echo $kf['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
            <div><span class="kf__lbl"><?php echo esc_html( $kf['lbl'] ); ?></span><span class="kf__val"><?php echo esc_html( $kf['val'] ); ?></span></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- INTRO -->
  <?php if ( ! empty( $cfg['intro'] ) ) :
    $intro = wp_parse_args( $cfg['intro'], [
      'title_html' => '', 'lede_html' => '', 'paragraphs' => [],
      'marks' => [], 'main_img' => '', 'pip_img' => '', 'stamp' => '道 · Ukiyo',
    ] );
  ?>
  <section class="section intro">
    <div class="container">
      <div class="intro__wrap">
        <div class="intro__copy reveal">
          <h2><?php echo wp_kses( $intro['title_html'], [ 'span' => [ 'class' => [] ], 'em' => [], 'br' => [] ] ); ?></h2>
          <?php if ( $intro['lede_html'] ) : ?>
            <p class="lede"><?php echo wp_kses_post( $intro['lede_html'] ); ?></p>
          <?php endif; ?>
          <?php foreach ( $intro['paragraphs'] as $p ) : ?>
            <p><?php echo esc_html( $p ); ?></p>
          <?php endforeach; ?>
          <?php if ( ! empty( $intro['marks'] ) ) : ?>
            <div class="marks">
              <?php foreach ( $intro['marks'] as $m ) :
                $m = wp_parse_args( $m, [ 'n_html' => '', 'l' => '' ] );
              ?>
                <div class="intro__mark"><span class="n"><?php echo wp_kses( $m['n_html'], [ 'em' => [] ] ); ?></span><span class="l"><?php echo esc_html( $m['l'] ); ?></span></div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="intro__visual reveal">
          <?php if ( $intro['stamp'] ) : ?>
            <span class="iv-stamp"><?php echo esc_html( $intro['stamp'] ); ?></span>
          <?php endif; ?>
          <?php if ( $intro['main_img'] ) : ?>
            <img class="iv-main" src="<?php echo esc_url( $intro['main_img'] ); ?>" alt="<?php echo esc_attr( $cfg['breadcrumb'] ); ?>" loading="lazy" />
          <?php endif; ?>
          <?php if ( $intro['pip_img'] ) : ?>
            <img class="iv-pip" src="<?php echo esc_url( $intro['pip_img'] ); ?>" alt="" loading="lazy" />
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- FEATURES -->
  <?php if ( ! empty( $cfg['features'] ) ) :
    $spans = [ 'span-3', 'span-3', 'span-2', 'span-2', 'span-2', 'span-4' ];
    $accent_cycle = [ '', 'feat--terra', '', 'feat--accent', 'feat--accent', '' ];
  ?>
  <section class="section feats">
    <div class="container">
      <div class="sec-head reveal">
        <span class="sec-head__chip"><span class="star"></span><?php echo esc_html( $cfg['features_chip'] ); ?></span>
        <h2><?php echo wp_kses( $cfg['features_title_html'], [ 'em' => [], 'br' => [] ] ); ?></h2>
        <?php if ( $cfg['features_sub'] ) : ?>
          <p class="sec-head__sub"><?php echo esc_html( $cfg['features_sub'] ); ?></p>
        <?php endif; ?>
        <div class="sec-head__divider"></div>
      </div>
      <div class="feats__grid">
        <?php foreach ( array_values( $cfg['features'] ) as $i => $f ) :
          $f = wp_parse_args( $f, [ 'title' => '', 'description' => '', 'icon_svg' => '' ] );
          $span   = $spans[ $i % 6 ];
          $accent = $accent_cycle[ $i % 6 ];
        ?>
          <article class="feat <?php echo esc_attr( $span ); ?> reveal <?php echo esc_attr( $accent ); ?>">
            <span class="feat__num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
            <div class="feat__ico"><?php echo $f['icon_svg']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
            <h3><?php echo esc_html( $f['title'] ); ?></h3>
            <p><?php echo esc_html( $f['description'] ); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- EXPERIENCES CAROUSEL -->
  <?php if ( ! empty( $cfg['carousel_items'] ) ) : ?>
  <section id="lugares" class="exp-carousel-wrap">
    <div class="container exp-carousel-head reveal">
      <div>
        <span class="meta"><?php echo esc_html( $cfg['carousel_meta'] ); ?></span>
        <h3><?php echo wp_kses( $cfg['carousel_title_html'], [ 'em' => [], 'br' => [] ] ); ?></h3>
        <?php if ( $cfg['carousel_sub'] ) : ?>
          <p style="color:var(--ink-soft);font-size:1rem;line-height:1.6;margin:.8rem 0 0;max-width:32rem"><?php echo esc_html( $cfg['carousel_sub'] ); ?></p>
        <?php endif; ?>
      </div>
      <div class="exp-arrows">
        <button class="exp-arrow exp-prev" aria-label="Anterior">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
        </button>
        <button class="exp-arrow exp-next" aria-label="Siguiente">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </button>
      </div>
    </div>

    <div class="exp-carousel-track">
      <?php foreach ( $cfg['carousel_items'] as $item ) :
        $item     = wp_parse_args( $item, [ 'title' => '', 'description' => '', 'imagePath' => '', 'image' => '', 'tag' => '' ] );
        $image_url = $item['image']
          ? $item['image']
          : get_template_directory_uri() . $item['imagePath'];
      ?>
        <div class="carousel-card">
          <div class="card-bg" style="background-image:url('<?php echo esc_url( $image_url ); ?>');"></div>
          <div class="carousel-card-content">
            <div class="ctag">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
              <?php echo esc_html( $item['tag'] ); ?>
            </div>
            <h3><?php echo esc_html( $item['title'] ); ?></h3>
            <p><?php echo esc_html( $item['description'] ); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endif; ?>

  <!-- HOSTS -->
  <?php if ( ! empty( $cfg['hosts'] ) ) : ?>
  <section class="section hosts">
    <div class="container">
      <div class="sec-head sec-head--terra reveal">
        <span class="sec-head__chip sec-head__chip--terra"><span class="star"></span><?php echo esc_html( $cfg['hosts_chip'] ); ?></span>
        <h2><?php echo wp_kses( $cfg['hosts_title_html'], [ 'em' => [], 'br' => [] ] ); ?></h2>
        <?php if ( $cfg['hosts_sub'] ) : ?>
          <p class="sec-head__sub"><?php echo esc_html( $cfg['hosts_sub'] ); ?></p>
        <?php endif; ?>
        <div class="sec-head__divider"></div>
      </div>
      <div class="hosts__grid hosts__grid--<?php echo esc_attr( count( $cfg['hosts'] ) ); ?>">
        <?php foreach ( $cfg['hosts'] as $h ) :
          $h = wp_parse_args( $h, [ 'badge' => '', 'role' => '', 'name_html' => '', 'bio' => '', 'meta' => [], 'image' => '' ] );
        ?>
          <article class="host reveal">
            <div class="host__media">
              <?php if ( $h['badge'] ) : ?>
                <span class="host__badge"><?php echo esc_html( $h['badge'] ); ?></span>
              <?php endif; ?>
              <?php if ( $h['image'] ) : ?>
                <img src="<?php echo esc_url( $h['image'] ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $h['name_html'] ) ); ?>" loading="lazy" />
              <?php endif; ?>
            </div>
            <div class="host__body">
              <?php if ( $h['role'] ) : ?>
                <span class="host__role"><?php echo esc_html( $h['role'] ); ?></span>
              <?php endif; ?>
              <h3><?php echo wp_kses( $h['name_html'], [ 'em' => [] ] ); ?></h3>
              <?php if ( $h['bio'] ) : ?>
                <p><?php echo esc_html( $h['bio'] ); ?></p>
              <?php endif; ?>
              <?php if ( ! empty( $h['meta'] ) ) : ?>
                <div class="host__meta">
                  <?php foreach ( $h['meta'] as $m ) :
                    $m = wp_parse_args( $m, [ 'l' => '', 'v' => '' ] );
                  ?>
                    <div><span class="l"><?php echo esc_html( $m['l'] ); ?></span><span class="v"><?php echo esc_html( $m['v'] ); ?></span></div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- TIPS -->
  <?php if ( $cfg['tips_prep'] || $cfg['tips_notes'] ) : ?>
  <section class="section tips">
    <div class="container">
      <div class="sec-head sec-head--terra reveal">
        <span class="sec-head__chip sec-head__chip--terra"><span class="star"></span><?php echo esc_html( $cfg['tips_chip'] ); ?></span>
        <h2><?php echo wp_kses( $cfg['tips_title_html'], [ 'em' => [] ] ); ?></h2>
        <?php if ( $cfg['tips_sub'] ) : ?>
          <p class="sec-head__sub"><?php echo esc_html( $cfg['tips_sub'] ); ?></p>
        <?php endif; ?>
        <div class="sec-head__divider"></div>
      </div>
      <div class="tips__grid">
        <?php
        foreach ( [ 'prep' => 'tips_prep', 'note' => 'tips_notes' ] as $kind => $key ) :
          $tip = $cfg[ $key ];
          if ( ! $tip ) { continue; }
          $tip = wp_parse_args( $tip, [ 'badge' => '', 'title' => '', 'sub' => '', 'items_html' => [] ] );
          $icon = 'prep' === $kind
            ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>'
            : '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>';
        ?>
        <article class="tip tip--<?php echo esc_attr( $kind ); ?> reveal">
          <span class="tip__badge"><?php echo esc_html( $tip['badge'] ); ?></span>
          <h3><?php echo esc_html( $tip['title'] ); ?></h3>
          <?php if ( $tip['sub'] ) : ?>
            <p class="tip__sub"><?php echo esc_html( $tip['sub'] ); ?></p>
          <?php endif; ?>
          <ul>
            <?php foreach ( $tip['items_html'] as $li ) : ?>
              <li><?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span><?php echo wp_kses( $li, [ 'strong' => [], 'em' => [] ] ); ?></span></li>
            <?php endforeach; ?>
          </ul>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

</div><!-- /.ukiyo-dest-v2 -->

<?php
// Helpers existentes del tema (rutas relacionadas + posts del blog).
if ( $cfg['destination_name'] && function_exists( 'ukiyo_render_destination_service_options' ) ) {
	ukiyo_render_destination_service_options( [ 'destination' => $cfg['destination_name'] ] );
}

if ( ! empty( $cfg['related_keys'] ) && function_exists( 'ukiyo_render_related_internal_links' ) ) {
	ukiyo_render_related_internal_links( [
		'title'   => $cfg['related_title'],
		'intro'   => $cfg['related_intro'],
		'current' => $cfg['destination_key'],
		'keys'    => $cfg['related_keys'],
	] );
}

if ( $cfg['destination_key'] && $cfg['blog_category'] && function_exists( 'ukiyo_render_destination_blog_posts' ) ) {
	ukiyo_render_destination_blog_posts( [
		'title'           => $cfg['blog_title'],
		'intro'           => $cfg['blog_intro'],
		'destination_key' => $cfg['destination_key'],
		'category'        => $cfg['blog_category'],
	] );
}
?>

<div class="ukiyo-dest-v2" data-dest="<?php echo esc_attr( $slug ); ?>">
  <!-- CTA FINAL -->
  <section class="ctafinal" id="cta">
    <?php if ( $cfg['cta_bg'] ) : ?>
      <div class="ctafinal__bg" style="background-image:url('<?php echo esc_url( $cfg['cta_bg'] ); ?>');"></div>
    <?php endif; ?>
    <div class="container">
      <div class="ctafinal__box reveal">
        <span class="ctafinal__stamp"><span class="dot"></span>道 · Empezamos juntos</span>
        <h2><?php echo wp_kses( $cfg['cta_title_html'], [ 'em' => [], 'br' => [] ] ); ?></h2>
        <p><?php echo esc_html( $cfg['cta_text'] ); ?></p>
        <div class="ctafinal__buttons">
          <a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener" class="btn btn-sage">
            <img class="wa-icon" width="24" height="24" src="<?php echo esc_url( $wa_icon ); ?>" alt="WhatsApp" />
            <?php echo esc_html( $cfg['cta_primary_btn'] ); ?>
          </a>
          <a href="<?php echo esc_url( $dest_url ); ?>" class="btn btn-outline">Ver otros destinos
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
(function(){
  // Carousel autoplay + flechas. Hace falta uno por sección porque cada
  // página solo monta una. Si en el futuro hubiera más, generalizar a forEach.
  document.addEventListener('DOMContentLoaded', function() {
    var wrap   = document.querySelector('.ukiyo-dest-v2 .exp-carousel-track');
    var prev   = document.querySelector('.ukiyo-dest-v2 .exp-prev');
    var next   = document.querySelector('.ukiyo-dest-v2 .exp-next');
    if (!wrap || !prev || !next) return;
    function step() {
      var card = wrap.querySelector('.carousel-card');
      return card ? card.offsetWidth + 24 : 424;
    }
    prev.addEventListener('click', function(){ wrap.scrollBy({left:-step(), behavior:'smooth'}); });
    function autoplay() {
      if (wrap.scrollLeft + wrap.clientWidth >= wrap.scrollWidth - 10) {
        wrap.scrollTo({left:0, behavior:'smooth'});
      } else {
        next.click();
      }
    }
    var timer = setInterval(autoplay, 4000);
    next.addEventListener('click', function(){
      if (wrap.scrollLeft + wrap.clientWidth >= wrap.scrollWidth - 10) {
        wrap.scrollTo({left:0, behavior:'smooth'});
      } else {
        wrap.scrollBy({left:step(), behavior:'smooth'});
      }
    });
    function reset(){ clearInterval(timer); timer = setInterval(autoplay, 4000); }
    [prev, next, wrap].forEach(function(el){
      el.addEventListener('mousedown', reset);
      el.addEventListener('touchstart', reset, { passive: true });
    });
  });
})();
</script>
<?php
	}
}

if ( ! function_exists( 'ukiyo_destination_v2_styles' ) ) {
	function ukiyo_destination_v2_styles() {
		?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700,900&display=swap">
<style>
  .ukiyo-dest-v2{
    --primary:#8B4513; --primary-50:#FDF7F3; --primary-100:#F9E8D9; --primary-300:#E8B48D; --primary-700:#6B3410;
    --secondary:#9CAF88; --secondary-50:#F4F6F0; --secondary-100:#E6ECDD;
    --secondary-300:#B9C9A4; --secondary-700:#5E6952; --secondary-900:#3F4836;
    --accent:#D4A574; --accent-300:#EBD2AE; --accent-50:#FDF9F4;
    --bg:#FEFCF8; --surface:#F5F2ED; --paper:#F8F2E7;
    --ink:#2C2C2C; --ink-soft:#6B6B6B; --line:#E8E0D2;
    --font-sans:'Satoshi','Inter',system-ui,sans-serif;
    --font-display:'Rowdies',serif;
    --font-mono:'DM Mono',ui-monospace,monospace;
    --maxw:1240px; --section-y:6.5rem;
    background:var(--bg); color:var(--ink); font-family:var(--font-sans);
    font-weight:400; font-size:17px; line-height:1.6;
    -webkit-font-smoothing:antialiased;
  }
  .ukiyo-dest-v2 *{box-sizing:border-box}
  .ukiyo-dest-v2 img{max-width:100%;display:block}
  .ukiyo-dest-v2 a{color:inherit;text-decoration:none}
  .ukiyo-dest-v2 h1,.ukiyo-dest-v2 h2,.ukiyo-dest-v2 h3,.ukiyo-dest-v2 h4{font-family:var(--font-display);font-weight:400;letter-spacing:-0.01em;line-height:1.1;margin:0}
  .ukiyo-dest-v2 .container{max-width:var(--maxw);margin:0 auto;padding:0 1.75rem}

  .ukiyo-dest-v2 .btn{display:inline-flex;align-items:center;gap:.7rem;padding:1rem 1.6rem;border-radius:999px;font-weight:600;font-size:.95rem;transition:transform .25s,box-shadow .25s,background .25s,color .25s;border:1.5px solid transparent;cursor:pointer}
  .ukiyo-dest-v2 .btn:hover{transform:translateY(-2px)}
  .ukiyo-dest-v2 .btn-primary{background:var(--primary);color:#fff;box-shadow:0 10px 30px -10px rgba(139,69,19,.5)}
  .ukiyo-dest-v2 .btn-primary:hover{background:var(--primary-700)}
  .ukiyo-dest-v2 .btn-sage{background:var(--secondary-700);color:#fff;box-shadow:0 10px 30px -10px rgba(94,105,82,.45)}
  .ukiyo-dest-v2 .btn-sage:hover{background:var(--secondary-900)}
  .ukiyo-dest-v2 .btn-ghost{border-color:rgba(255,255,255,.5);color:#fff;backdrop-filter:blur(6px)}
  .ukiyo-dest-v2 .btn-ghost:hover{background:rgba(255,255,255,.12)}
  .ukiyo-dest-v2 .btn-outline{border-color:rgba(255,255,255,.4);color:#fff}
  .ukiyo-dest-v2 .btn-outline:hover{background:#fff;color:var(--secondary-900)}
  .ukiyo-dest-v2 .btn img.wa-icon{width:24px;height:24px}

  /* HERO */
  .ukiyo-dest-v2 .hero{position:relative;min-height:88vh;display:flex;align-items:center;color:#fff;overflow:hidden;padding:8rem 0 9rem}
  .ukiyo-dest-v2 .hero__bg{position:absolute;inset:0;z-index:0}
  .ukiyo-dest-v2 .hero__bg img{width:100%;height:100%;object-fit:cover;transform:scale(1.02);animation:ukiyoDestZoom 20s ease-in-out infinite alternate}
  @keyframes ukiyoDestZoom{from{transform:scale(1.02)}to{transform:scale(1.1)}}
  .ukiyo-dest-v2 .hero__bg::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(20,28,18,.55) 0%,rgba(20,28,18,.2) 38%,rgba(20,28,18,.78) 100%)}
  .ukiyo-dest-v2 .hero__inner{position:relative;z-index:1;width:100%;text-align:center}
  .ukiyo-dest-v2 .breadcrumbs{display:flex;gap:.5rem;font-size:.85rem;opacity:.85;justify-content:center;margin-bottom:1.6rem;letter-spacing:.02em}
  .ukiyo-dest-v2 .breadcrumbs span{opacity:.6}
  .ukiyo-dest-v2 .eyebrow{display:inline-flex;align-items:center;gap:.6rem;padding:.45rem 1rem;border-radius:999px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.28);backdrop-filter:blur(8px);font-size:.78rem;letter-spacing:.16em;text-transform:uppercase}
  .ukiyo-dest-v2 .eyebrow .dot{width:6px;height:6px;border-radius:50%;background:var(--secondary-300)}
  .ukiyo-dest-v2 .hero__title{font-size:clamp(3rem,8.5vw,7.4rem);font-weight:300;letter-spacing:-0.02em;line-height:.95;margin:1.6rem auto 1.4rem;max-width:14ch;text-shadow:0 2px 24px rgba(0,0,0,.3)}
  .ukiyo-dest-v2 .hero__title em{font-style:italic;color:var(--secondary-300);font-weight:400}
  .ukiyo-dest-v2 .hero__sub{max-width:42rem;margin:0 auto;font-size:1.18rem;line-height:1.55;opacity:.95;text-shadow:0 2px 12px rgba(0,0,0,.4)}
  .ukiyo-dest-v2 .hero__ctas{display:flex;gap:1rem;justify-content:center;margin:2.6rem auto 0;flex-wrap:wrap;width:100%}
  .ukiyo-dest-v2 .hero__scroll{position:absolute;bottom:6rem;left:50%;transform:translateX(-50%);z-index:1;display:flex;flex-direction:column;align-items:center;gap:.5rem;font-size:.72rem;letter-spacing:.3em;text-transform:uppercase;opacity:.85;color:#fff}
  .ukiyo-dest-v2 .hero__scroll .line{width:1px;height:36px;background:#fff;animation:ukiyoDestScrollPulse 2.4s ease-in-out infinite;transform-origin:top}
  @keyframes ukiyoDestScrollPulse{0%,100%{transform:scaleY(.3);opacity:.4}50%{transform:scaleY(1);opacity:1}}

  /* KEY FACTS */
  .ukiyo-dest-v2 .keyfacts{position:relative;margin-top:-5.5rem;z-index:3}
  .ukiyo-dest-v2 .keyfacts__inner{background:#fff;border-radius:24px;box-shadow:0 30px 80px -30px rgba(20,28,18,.32),0 0 0 1px var(--line);padding:1.6rem 2rem;display:grid;grid-template-columns:repeat(5,1fr);align-items:stretch}
  .ukiyo-dest-v2 .kf{display:flex;align-items:center;gap:1rem;padding:.6rem 1.4rem;position:relative;min-height:80px}
  .ukiyo-dest-v2 .kf:not(:last-child)::after{content:"";position:absolute;right:0;top:18%;height:64%;width:1px;background:var(--line)}
  .ukiyo-dest-v2 .kf__ico{width:46px;height:46px;border-radius:14px;background:var(--secondary-50);color:var(--secondary-700);display:grid;place-items:center;flex-shrink:0}
  .ukiyo-dest-v2 .kf__ico svg{width:22px;height:22px}
  .ukiyo-dest-v2 .kf__lbl{display:block;font-family:var(--font-mono);font-size:.68rem;color:var(--ink-soft);letter-spacing:.16em;text-transform:uppercase;margin-bottom:.15rem}
  .ukiyo-dest-v2 .kf__val{display:block;font-family:var(--font-display);font-size:1.15rem;font-weight:400;color:var(--ink);letter-spacing:-0.01em}
  @media (max-width:1100px){.ukiyo-dest-v2 .keyfacts__inner{grid-template-columns:repeat(4,1fr)}.ukiyo-dest-v2 .kf:nth-child(5){display:none}}
  @media (max-width:980px){
    .ukiyo-dest-v2 .keyfacts__inner{grid-template-columns:repeat(2,1fr);padding:1.2rem}
    .ukiyo-dest-v2 .kf{padding:.6rem .8rem}
    .ukiyo-dest-v2 .kf:not(:last-child)::after{display:none}
  }

  /* SECTION HEADS */
  .ukiyo-dest-v2 section.section{padding:var(--section-y) 0;position:relative}
  .ukiyo-dest-v2 .sec-head{text-align:center;max-width:48rem;margin:0 auto 4rem}
  .ukiyo-dest-v2 .sec-head__chip{display:inline-flex;align-items:center;gap:.5rem;padding:.4rem .9rem;border-radius:999px;font-family:var(--font-mono);font-size:.74rem;letter-spacing:.16em;text-transform:uppercase;font-weight:500;margin-bottom:1.2rem;background:var(--secondary-100);color:var(--secondary-700)}
  .ukiyo-dest-v2 .sec-head__chip--terra{background:var(--primary-50);color:var(--primary)}
  .ukiyo-dest-v2 .sec-head__chip .star{width:6px;height:6px;border-radius:50%;background:currentColor}
  .ukiyo-dest-v2 .sec-head h2{font-size:clamp(2.2rem,4.2vw,3.6rem);font-weight:300;letter-spacing:-0.015em;line-height:1.05;margin-bottom:1.2rem}
  .ukiyo-dest-v2 .sec-head h2 em{font-style:italic;color:var(--secondary-700);font-weight:300}
  .ukiyo-dest-v2 .sec-head--terra h2 em{color:var(--primary)}
  .ukiyo-dest-v2 .sec-head__sub{color:var(--ink-soft);font-size:1.05rem;line-height:1.6}
  .ukiyo-dest-v2 .sec-head__divider{width:60px;height:4px;border-radius:2px;background:var(--secondary-700);margin:1.6rem auto 0}
  .ukiyo-dest-v2 .sec-head--terra .sec-head__divider{background:var(--primary)}

  /* INTRO */
  .ukiyo-dest-v2 .intro{background:var(--bg)}
  .ukiyo-dest-v2 .intro__wrap{display:grid;grid-template-columns:1.05fr .85fr;gap:5rem;align-items:center}
  .ukiyo-dest-v2 .intro__copy h2{font-size:clamp(2.4rem,4.4vw,3.8rem);font-weight:300;letter-spacing:-0.02em;line-height:1.02;margin-bottom:1.8rem}
  .ukiyo-dest-v2 .intro__copy h2 em{font-style:italic;color:var(--secondary-700);font-weight:300}
  .ukiyo-dest-v2 .intro__copy h2 .dot{display:inline-block;width:14px;height:14px;border-radius:50%;background:var(--primary);margin-right:.2rem;vertical-align:middle;transform:translateY(-.3em)}
  .ukiyo-dest-v2 .intro__copy .lede{font-size:1.18rem;line-height:1.6;color:var(--ink);margin-bottom:1.4rem;font-weight:400}
  .ukiyo-dest-v2 .intro__copy .lede strong{color:var(--secondary-900);font-weight:700}
  .ukiyo-dest-v2 .intro__copy p{font-size:1.02rem;color:var(--ink-soft);line-height:1.65;margin:0 0 1.2rem}
  .ukiyo-dest-v2 .intro__copy .marks{display:flex;gap:1.6rem;margin-top:2rem;padding-top:1.6rem;border-top:1px dashed var(--line);flex-wrap:wrap}
  .ukiyo-dest-v2 .intro__mark{display:flex;flex-direction:column;line-height:1.1}
  .ukiyo-dest-v2 .intro__mark .n{font-family:var(--font-display);font-size:2.2rem;font-weight:300;color:var(--secondary-700);letter-spacing:-0.02em}
  .ukiyo-dest-v2 .intro__mark .n em{font-style:italic;color:var(--primary)}
  .ukiyo-dest-v2 .intro__mark .l{font-family:var(--font-mono);font-size:.7rem;color:var(--ink-soft);text-transform:uppercase;letter-spacing:.14em;margin-top:.35rem}
  .ukiyo-dest-v2 .intro__visual{position:relative;height:560px}
  .ukiyo-dest-v2 .intro__visual img{position:absolute;border-radius:18px;object-fit:cover;box-shadow:0 26px 60px -28px rgba(20,28,18,.3)}
  .ukiyo-dest-v2 .intro__visual .iv-main{inset:0;width:100%;height:100%}
  .ukiyo-dest-v2 .intro__visual .iv-pip{width:200px;height:240px;bottom:-30px;left:-40px;border:6px solid var(--bg);z-index:2}
  .ukiyo-dest-v2 .intro__visual .iv-stamp{position:absolute;top:-26px;right:-12px;background:var(--paper);border:1px solid var(--line);border-radius:999px;padding:.45rem 1rem;font-family:var(--font-mono);font-size:.72rem;color:var(--primary);letter-spacing:.14em;text-transform:uppercase;box-shadow:0 8px 22px -10px rgba(20,28,18,.18);z-index:3}
  .ukiyo-dest-v2 .intro__visual .iv-stamp::before{content:"";display:inline-block;width:6px;height:6px;border-radius:50%;background:currentColor;margin-right:.55rem;vertical-align:middle}
  @media (max-width:980px){
    .ukiyo-dest-v2 .intro__wrap{grid-template-columns:1fr;gap:3rem}
    .ukiyo-dest-v2 .intro__visual{height:440px}
    .ukiyo-dest-v2 .intro__visual .iv-pip{width:140px;height:170px;bottom:-20px;left:-12px}
  }

  /* FEATURES */
  .ukiyo-dest-v2 .feats{background:linear-gradient(180deg,var(--paper) 0%,var(--bg) 100%);position:relative;overflow:hidden}
  .ukiyo-dest-v2 .feats::before{content:"";position:absolute;top:-200px;right:-180px;width:520px;height:520px;border-radius:50%;background:radial-gradient(circle,rgba(156,175,136,.18),transparent 70%);z-index:0}
  .ukiyo-dest-v2 .feats .container{position:relative;z-index:1}
  .ukiyo-dest-v2 .feats__grid{display:grid;grid-template-columns:repeat(6,1fr);gap:1.2rem}
  .ukiyo-dest-v2 .feat{background:#fff;border:1px solid var(--line);border-radius:22px;padding:2rem;transition:transform .4s,box-shadow .4s,border-color .4s;position:relative;overflow:hidden}
  .ukiyo-dest-v2 .feat:hover{transform:translateY(-6px);box-shadow:0 30px 50px -30px rgba(20,28,18,.22);border-color:var(--secondary-300)}
  .ukiyo-dest-v2 .feat__ico{width:54px;height:54px;border-radius:16px;background:var(--secondary-100);color:var(--secondary-700);display:grid;place-items:center;margin-bottom:1.5rem;transition:transform .4s}
  .ukiyo-dest-v2 .feat:hover .feat__ico{transform:scale(1.08) rotate(-4deg)}
  .ukiyo-dest-v2 .feat__ico svg{width:26px;height:26px}
  .ukiyo-dest-v2 .feat__num{position:absolute;top:1.4rem;right:1.4rem;font-family:var(--font-mono);font-size:.72rem;color:var(--ink-soft);letter-spacing:.12em}
  .ukiyo-dest-v2 .feat h3{font-family:var(--font-sans);font-size:1.1rem;font-weight:700;color:var(--ink);margin-bottom:.6rem;letter-spacing:-0.01em}
  .ukiyo-dest-v2 .feat p{font-size:.93rem;color:var(--ink-soft);line-height:1.55;margin:0}
  .ukiyo-dest-v2 .feat--terra .feat__ico{background:var(--primary-50);color:var(--primary)}
  .ukiyo-dest-v2 .feat--accent .feat__ico{background:var(--accent-50);color:#9C7B4A}
  .ukiyo-dest-v2 .feat.span-3{grid-column:span 3}
  .ukiyo-dest-v2 .feat.span-2{grid-column:span 2}
  .ukiyo-dest-v2 .feat.span-4{grid-column:span 4}
  @media (max-width:980px){.ukiyo-dest-v2 .feats__grid{grid-template-columns:repeat(2,1fr)}.ukiyo-dest-v2 .feat.span-3,.ukiyo-dest-v2 .feat.span-2,.ukiyo-dest-v2 .feat.span-4{grid-column:span 2}}
  @media (max-width:560px){.ukiyo-dest-v2 .feats__grid{grid-template-columns:1fr}.ukiyo-dest-v2 .feat.span-3,.ukiyo-dest-v2 .feat.span-2,.ukiyo-dest-v2 .feat.span-4{grid-column:span 1}}

  /* CAROUSEL */
  .ukiyo-dest-v2 .exp-carousel-wrap{padding:5.5rem 0 6rem;background:var(--bg);overflow:hidden;position:relative}
  .ukiyo-dest-v2 .exp-carousel-head{display:flex;justify-content:space-between;align-items:end;gap:2rem;margin-bottom:3rem;flex-wrap:wrap}
  .ukiyo-dest-v2 .exp-carousel-head .meta{font-family:var(--font-mono);font-size:.75rem;color:var(--primary);letter-spacing:.18em;text-transform:uppercase;display:inline-flex;align-items:center;gap:.5rem;margin-bottom:.8rem}
  .ukiyo-dest-v2 .exp-carousel-head .meta::before{content:"";width:24px;height:1px;background:var(--primary)}
  .ukiyo-dest-v2 .exp-carousel-head h3{font-size:clamp(2rem,3.4vw,2.6rem);font-weight:300;letter-spacing:-0.015em;line-height:1.05;max-width:22ch}
  .ukiyo-dest-v2 .exp-carousel-head h3 em{font-style:italic;color:var(--secondary-700);font-weight:300}
  .ukiyo-dest-v2 .exp-arrows{display:flex;gap:.55rem}
  .ukiyo-dest-v2 .exp-arrow{width:48px;height:48px;border-radius:50%;background:#fff;border:1px solid var(--line);color:var(--ink);display:grid;place-items:center;transition:all .25s;cursor:pointer}
  .ukiyo-dest-v2 .exp-arrow:hover{background:var(--secondary-700);border-color:var(--secondary-700);color:#fff;transform:scale(1.06);box-shadow:0 14px 28px -14px rgba(94,105,82,.5)}
  .ukiyo-dest-v2 .exp-arrow svg{width:18px;height:18px}
  .ukiyo-dest-v2 .exp-carousel-track{display:flex;gap:1.4rem;padding:2rem 1.75rem;overflow-x:auto;scroll-behavior:smooth;scrollbar-width:none;-ms-overflow-style:none}
  .ukiyo-dest-v2 .exp-carousel-track::-webkit-scrollbar{display:none}
  .ukiyo-dest-v2 .carousel-card{flex-shrink:0;width:85vw;max-width:400px;height:520px;border-radius:24px;overflow:hidden;position:relative;background:#1a1f15;transition:transform .55s cubic-bezier(.4,0,.2,1),box-shadow .55s;scroll-snap-align:start;cursor:pointer}
  .ukiyo-dest-v2 .carousel-card:hover{transform:translateY(-8px);box-shadow:0 40px 60px -30px rgba(20,28,18,.45)}
  .ukiyo-dest-v2 .carousel-card .card-bg{position:absolute;inset:0;background-size:cover;background-position:center;transition:transform 1.4s cubic-bezier(.4,0,.2,1)}
  .ukiyo-dest-v2 .carousel-card:hover .card-bg{transform:scale(1.08)}
  .ukiyo-dest-v2 .carousel-card::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(20,28,18,.12) 0%,rgba(20,28,18,.45) 50%,rgba(20,28,18,.92) 100%)}
  .ukiyo-dest-v2 .carousel-card-content{position:absolute;left:0;right:0;bottom:0;padding:1.8rem 2rem 2rem;z-index:2;text-align:left;color:#fff}
  .ukiyo-dest-v2 .carousel-card-content .ctag{display:inline-flex;align-items:center;gap:.4rem;background:rgba(255,255,255,.94);color:var(--secondary-900);font-family:var(--font-mono);font-size:.66rem;letter-spacing:.14em;text-transform:uppercase;padding:.35rem .75rem;border-radius:999px;font-weight:600;margin-bottom:1rem}
  .ukiyo-dest-v2 .carousel-card-content .ctag svg{width:11px;height:11px}
  .ukiyo-dest-v2 .carousel-card-content h3{font-family:var(--font-display);font-size:2rem;font-weight:400;letter-spacing:-0.01em;line-height:1;margin:0 0 .7rem;text-shadow:0 2px 14px rgba(0,0,0,.35)}
  .ukiyo-dest-v2 .carousel-card-content p{font-size:.95rem;line-height:1.55;opacity:.9;margin:0;max-width:22rem}

  /* HOSTS */
  .ukiyo-dest-v2 .hosts{background:linear-gradient(180deg,var(--bg) 0%,var(--paper) 100%);position:relative;overflow:hidden}
  .ukiyo-dest-v2 .hosts__grid{display:grid;gap:2rem;margin-top:1rem}
  .ukiyo-dest-v2 .hosts__grid--1{grid-template-columns:minmax(0,640px);justify-content:center}
  .ukiyo-dest-v2 .hosts__grid--2{grid-template-columns:1fr 1fr}
  .ukiyo-dest-v2 .hosts__grid--3{grid-template-columns:repeat(3,1fr)}
  .ukiyo-dest-v2 .hosts__grid--4{grid-template-columns:repeat(4,1fr)}
  .ukiyo-dest-v2 .host{display:grid;grid-template-columns:.85fr 1.15fr;gap:0;background:#fff;border:1px solid var(--line);border-radius:24px;overflow:hidden;transition:transform .45s,box-shadow .45s}
  .ukiyo-dest-v2 .hosts__grid--3 .host,.ukiyo-dest-v2 .hosts__grid--4 .host{grid-template-columns:1fr}
  .ukiyo-dest-v2 .host:hover{transform:translateY(-4px);box-shadow:0 30px 50px -30px rgba(20,28,18,.22)}
  .ukiyo-dest-v2 .host__media{position:relative;background:var(--secondary-100);overflow:hidden}
  .ukiyo-dest-v2 .host__media img{width:100%;height:100%;object-fit:cover;object-position:center top;min-height:340px}
  .ukiyo-dest-v2 .host__media::after{content:"";position:absolute;inset:0;background:linear-gradient(120deg,transparent 70%,rgba(20,28,18,.15) 100%)}
  .ukiyo-dest-v2 .host__badge{position:absolute;top:1rem;left:1rem;background:rgba(255,255,255,.92);color:var(--secondary-900);font-family:var(--font-mono);font-size:.66rem;letter-spacing:.14em;text-transform:uppercase;padding:.3rem .7rem;border-radius:999px;font-weight:600;z-index:2}
  .ukiyo-dest-v2 .host__body{padding:2rem 2rem 1.8rem;display:flex;flex-direction:column}
  .ukiyo-dest-v2 .host__role{font-family:var(--font-mono);font-size:.72rem;color:var(--primary);letter-spacing:.16em;text-transform:uppercase;margin-bottom:.7rem}
  .ukiyo-dest-v2 .host__body h3{font-size:1.7rem;font-weight:400;letter-spacing:-0.01em;margin-bottom:.7rem;color:var(--ink)}
  .ukiyo-dest-v2 .host__body h3 em{font-style:italic;color:var(--secondary-700);font-weight:300}
  .ukiyo-dest-v2 .host__body p{font-size:.95rem;color:var(--ink-soft);line-height:1.6;margin:0 0 1.2rem}
  .ukiyo-dest-v2 .host__meta{margin-top:auto;display:flex;gap:1.2rem;flex-wrap:wrap;padding-top:1rem;border-top:1px dashed var(--line)}
  .ukiyo-dest-v2 .host__meta div{display:flex;flex-direction:column;line-height:1.1}
  .ukiyo-dest-v2 .host__meta .l{font-family:var(--font-mono);font-size:.62rem;color:var(--ink-soft);letter-spacing:.12em;text-transform:uppercase;margin-bottom:.2rem}
  .ukiyo-dest-v2 .host__meta .v{font-size:.92rem;color:var(--ink);font-weight:600}
  @media (max-width:980px){
    .ukiyo-dest-v2 .hosts__grid--2,.ukiyo-dest-v2 .hosts__grid--3,.ukiyo-dest-v2 .hosts__grid--4{grid-template-columns:1fr}
    .ukiyo-dest-v2 .host{grid-template-columns:1fr}
    .ukiyo-dest-v2 .host__media img{min-height:280px}
  }

  /* TIPS */
  .ukiyo-dest-v2 .tips{background:var(--bg)}
  .ukiyo-dest-v2 .tips__grid{display:grid;grid-template-columns:1fr 1fr;gap:2rem;max-width:1080px;margin:0 auto}
  .ukiyo-dest-v2 .tip{background:var(--bg);border:1px dashed var(--line);border-radius:22px;padding:2.5rem 2.2rem 2.2rem;position:relative}
  .ukiyo-dest-v2 .tip__badge{position:absolute;top:-16px;left:1.8rem;padding:.5rem 1rem;border-radius:999px;font-family:var(--font-mono);font-size:.7rem;letter-spacing:.14em;text-transform:uppercase;font-weight:600;color:#fff;box-shadow:0 8px 22px -10px rgba(20,28,18,.25)}
  .ukiyo-dest-v2 .tip--prep .tip__badge{background:var(--primary)}
  .ukiyo-dest-v2 .tip--note .tip__badge{background:var(--secondary-700)}
  .ukiyo-dest-v2 .tip h3{font-size:1.4rem;font-weight:400;letter-spacing:-0.01em;margin-bottom:.4rem;color:var(--ink)}
  .ukiyo-dest-v2 .tip__sub{color:var(--ink-soft);font-size:.92rem;margin:0 0 1.6rem;line-height:1.5}
  .ukiyo-dest-v2 .tip ul{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:1rem}
  .ukiyo-dest-v2 .tip li{display:flex;gap:.85rem;align-items:flex-start;font-size:.95rem;color:var(--ink);line-height:1.5}
  .ukiyo-dest-v2 .tip li svg{flex-shrink:0;width:22px;height:22px;margin-top:.1rem}
  .ukiyo-dest-v2 .tip--prep li svg{color:var(--primary)}
  .ukiyo-dest-v2 .tip--note li svg{color:var(--secondary-700)}
  .ukiyo-dest-v2 .tip li strong{color:var(--secondary-900);font-weight:700}
  @media (max-width:880px){.ukiyo-dest-v2 .tips__grid{grid-template-columns:1fr}}

  /* CTA FINAL */
  .ukiyo-dest-v2 .ctafinal{background:linear-gradient(160deg,#1F2A18 0%,#2A3622 60%,#1F2A18 100%);position:relative;overflow:hidden;color:#fff;padding:var(--section-y) 0}
  .ukiyo-dest-v2 .ctafinal__bg{position:absolute;inset:0;background-size:cover;background-position:center;opacity:.18;z-index:0;filter:saturate(1.1)}
  .ukiyo-dest-v2 .ctafinal::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(31,42,24,.6) 0%,rgba(31,42,24,.92) 100%);z-index:0}
  .ukiyo-dest-v2 .ctafinal__box{max-width:760px;margin:0 auto;text-align:center;position:relative;z-index:1;padding:1rem 0}
  .ukiyo-dest-v2 .ctafinal__stamp{display:inline-flex;align-items:center;gap:.6rem;font-family:var(--font-mono);font-size:.78rem;color:var(--secondary-300);letter-spacing:.18em;text-transform:uppercase;margin-bottom:1.2rem}
  .ukiyo-dest-v2 .ctafinal__stamp .dot{width:6px;height:6px;border-radius:50%;background:var(--secondary-300)}
  .ukiyo-dest-v2 .ctafinal h2{font-size:clamp(2.4rem,5vw,4rem);font-weight:300;letter-spacing:-0.02em;line-height:1.02;margin-bottom:1.4rem;color:#fff}
  .ukiyo-dest-v2 .ctafinal h2 em{font-style:italic;color:var(--secondary-300)}
  .ukiyo-dest-v2 .ctafinal p{font-size:1.18rem;color:rgba(255,255,255,.85);margin-bottom:2.4rem;line-height:1.55;max-width:36rem;margin-left:auto;margin-right:auto}
  .ukiyo-dest-v2 .ctafinal__buttons{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap}

  /* REVEAL (no JS by default — instant) */
  .ukiyo-dest-v2 .reveal{opacity:1;transform:none}
</style>
		<?php
	}
}
