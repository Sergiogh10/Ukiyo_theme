<?php
/**
 * Footer global de UKIYO.
 *
 * Migrado al estilo de los exports de Claude Design (Junio 2026).
 * CSS scoped a `.ukiyo-foot` para no contaminar otras zonas del tema.
 * URLs y partners siguen viniendo de las rutas dinámicas del tema.
 */

$destination_indonesia_url   = ukiyo_get_route_url('destination_indonesia');
$destination_costa_rica_url  = ukiyo_get_route_url('destination_costa_rica');
$destination_marruecos_url   = ukiyo_get_route_url('destination_marruecos');
$destination_colombia_url    = ukiyo_get_route_url('destination_colombia');
$destination_italia_url      = ukiyo_get_route_url('destination_italia');
$destination_lanzarote_url   = ukiyo_get_route_url('destination_lanzarote');
$about_url                   = ukiyo_get_route_url('about');
$destinations_url            = ukiyo_get_route_url('destinations');
$service_custom_travel_url   = ukiyo_get_route_url('service_custom_travel');
$service_honeymoon_url       = ukiyo_get_route_url('service_honeymoon');
$service_group_travel_url    = ukiyo_get_route_url('service_group_travel');
$service_private_url         = ukiyo_get_route_url('service_private');
$viajes_autor_url            = ukiyo_get_route_url('viajes_autor');
$pricing_url                 = ukiyo_get_route_url('pricing');
$reviews_url                 = ukiyo_get_route_url('reviews');
$blog_url                    = ukiyo_get_route_url('blog');
$privacy_url                 = ukiyo_get_route_url('privacy');
$terms_url                   = ukiyo_get_route_url('terms');
$cookies_url                 = ukiyo_get_route_url('cookies');
$logo_white                  = get_template_directory_uri() . '/images/logo/logoblanconuevo.png';
$wa_url                      = 'https://wa.me/message/CS2LNI6YHSETO1';
$wa_icon                     = 'https://img.icons8.com/cotton/64/whatsapp--v4.png';
$tur_base                    = get_template_directory_uri() . '/images/logo';
$is_en                       = function_exists( 'pll_current_language' ) && 'en' === pll_current_language();
$home_url                    = function_exists( 'ukiyo_get_home_url' ) ? ukiyo_get_home_url() : home_url('/');
$foot_labels                 = $is_en
    ? [
        'tag'              => 'Authentic, mindful trips designed around you. <em>Walked first</em> by us.',
        'whatsapp'         => 'Ask us on WhatsApp',
        'email_label'      => 'Email',
        'destinations'     => 'Destinations',
        'morocco'          => 'Morocco',
        'italy'            => 'Italy',
        'services'         => 'Services',
        'custom_travel'    => 'Tailor-made travel',
        'honeymoon'        => 'Honeymoon travel',
        'group_travel'     => 'Small group trips',
        'private_travel'   => 'Private trips',
        'signature_trips'  => 'Signature trips',
        'company'          => 'Company',
        'about'            => 'About',
        'pricing'          => 'Prices',
        'reviews'          => 'Reviews',
        'partners_title'   => 'Endorsed by',
        'partners_text'    => 'Official tourism<br/>boards',
        'rights'           => 'All rights reserved.',
        'stamp'            => '道 · Made with care',
        'privacy'          => 'Privacy',
        'terms'            => 'Terms',
    ]
    : [
        'tag'              => 'Viajes auténticos, sostenibles y creados a tu medida. <em>Pisados antes</em> por nosotros.',
        'whatsapp'         => 'Pregúntanos por WhatsApp',
        'email_label'      => 'Correo',
        'destinations'     => 'Destinos',
        'morocco'          => 'Marruecos',
        'italy'            => 'Italia',
        'services'         => 'Servicios',
        'custom_travel'    => 'Viajes a medida',
        'honeymoon'        => 'Viajes de novios',
        'group_travel'     => 'Viajes en grupo reducido',
        'private_travel'   => 'Viajes privados',
        'signature_trips'  => 'Viajes de autor',
        'company'          => 'Compañía',
        'about'            => 'Nosotros',
        'pricing'          => 'Precios',
        'reviews'          => 'Reseñas',
        'partners_title'   => 'Avalados por',
        'partners_text'    => 'Organismos oficiales<br/>de turismo',
        'rights'           => 'Todos los derechos reservados.',
        'stamp'            => '道 · Hecho con calma',
        'privacy'          => 'Privacidad',
        'terms'            => 'Términos',
    ];
?>

<style>
  .ukiyo-foot{
    --foot-bg:#1A1A1A;
    --foot-line:rgba(255,255,255,.1);
    --foot-accent:#EBD2AE;
    --foot-sage:#9CAF88;
    --foot-mono:'DM Mono',ui-monospace,monospace;
    --foot-display:'Rowdies',serif;
    --foot-sans:'Satoshi','Inter',system-ui,sans-serif;
    background:var(--foot-bg);
    color:#fff;
    padding:5rem 0 2rem;
    position:relative;
    overflow:hidden;
    font-family:var(--foot-sans);
    font-size:.95rem;
    line-height:1.55;
  }
  .ukiyo-foot::before{
    content:"";position:absolute;top:0;left:50%;transform:translateX(-50%);
    width:90%;max-width:1240px;height:1px;
    background:linear-gradient(90deg,transparent,rgba(255,255,255,.15),transparent);
  }
  .ukiyo-foot a{color:inherit;text-decoration:none}
  .ukiyo-foot .container{max-width:1240px;margin:0 auto;padding:0 1.75rem}

  .ukiyo-foot__top{
    display:grid;grid-template-columns:1.8fr 1fr 1fr 1fr;gap:3rem;
    padding-bottom:3rem;border-bottom:1px solid var(--foot-line);
  }
  .ukiyo-foot__brand .ukiyo-foot__logo{height:38px;width:auto;opacity:.95;margin-bottom:1.4rem;display:block}
  .ukiyo-foot__brand .ukiyo-foot__tag{color:rgba(255,255,255,.72);font-size:1.02rem;line-height:1.55;max-width:24rem;margin:0 0 1.6rem}
  .ukiyo-foot__brand .ukiyo-foot__tag em{font-style:italic;color:var(--foot-sage);font-weight:400;font-family:var(--foot-display)}
  .ukiyo-foot__contact{display:flex;flex-direction:column;gap:.85rem}
  .ukiyo-foot__contact a{
    display:inline-flex;align-items:center;gap:.7rem;
    color:rgba(255,255,255,.68);font-size:.92rem;
    transition:color .25s, transform .25s;
  }
  .ukiyo-foot__contact a:hover{color:var(--foot-accent);transform:translateX(2px)}
  .ukiyo-foot__contact .ico{
    width:34px;height:34px;border-radius:50%;
    background:rgba(255,255,255,.06);
    display:grid;place-items:center;flex-shrink:0;
    transition:background .25s,border-color .25s;
    border:1px solid rgba(255,255,255,.1);
  }
  .ukiyo-foot__contact a:hover .ico{background:rgba(212,165,116,.18);border-color:rgba(212,165,116,.4)}
  .ukiyo-foot__contact .ico svg{width:15px;height:15px}
  .ukiyo-foot__contact .ico img{width:18px;height:18px;display:block}

  .ukiyo-foot__col h4{
    font-family:var(--foot-display);font-size:1rem;font-weight:400;color:#fff;
    letter-spacing:.06em;text-transform:uppercase;
    margin:0 0 1.3rem;position:relative;display:inline-block;padding-bottom:.6rem;
  }
  .ukiyo-foot__col h4::after{
    content:"";position:absolute;left:0;bottom:0;
    width:24px;height:2px;background:var(--foot-sage);
  }
  .ukiyo-foot__col ul{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:.7rem}
  .ukiyo-foot__col ul a{color:rgba(255,255,255,.68);font-size:.93rem;transition:color .25s,padding-left .25s}
  .ukiyo-foot__col ul a:hover{color:var(--foot-accent);padding-left:.3rem}

  .ukiyo-foot__partners{
    padding:2.4rem 0;border-bottom:1px solid var(--foot-line);
    display:grid;grid-template-columns:auto 1fr;gap:2.5rem;align-items:center;
  }
  .ukiyo-foot__partners .lbl{
    font-family:var(--foot-mono);font-size:.7rem;color:rgba(255,255,255,.5);
    letter-spacing:.18em;text-transform:uppercase;line-height:1.4;max-width:11rem;
  }
  .ukiyo-foot__partners .lbl strong{
    display:block;color:#fff;font-weight:400;font-size:.78rem;
    margin-bottom:.3rem;letter-spacing:.12em;
  }
  .ukiyo-foot__partners__row{display:flex;flex-wrap:wrap;align-items:center;gap:2.5rem;justify-content:flex-end}
  .ukiyo-foot__partners__row a{
    opacity:.55;filter:grayscale(1) brightness(1.4);
    transition:opacity .3s,filter .3s,transform .3s;display:inline-block;
  }
  .ukiyo-foot__partners__row a:hover{opacity:1;filter:grayscale(0) brightness(1);transform:translateY(-2px)}
  .ukiyo-foot__partners__row img{height:42px;width:auto;display:block}

  .ukiyo-foot__bottom{
    padding-top:2rem;display:flex;justify-content:space-between;align-items:center;
    gap:2rem;flex-wrap:wrap;
  }
  .ukiyo-foot__bottom .copy{color:rgba(255,255,255,.45);font-size:.84rem;letter-spacing:.02em;margin:0}
  .ukiyo-foot__bottom .copy strong{color:rgba(255,255,255,.7);font-weight:500}
  .ukiyo-foot__bottom .legal{display:flex;gap:1.6rem;flex-wrap:wrap}
  .ukiyo-foot__bottom .legal a{font-size:.84rem;color:rgba(255,255,255,.5);transition:color .25s}
  .ukiyo-foot__bottom .legal a:hover{color:var(--foot-accent)}
  .ukiyo-foot__stamp{
    display:inline-flex;align-items:center;gap:.6rem;
    font-family:var(--foot-mono);font-size:.72rem;color:rgba(255,255,255,.42);
    letter-spacing:.16em;text-transform:uppercase;
  }
  .ukiyo-foot__stamp .dot{width:6px;height:6px;border-radius:50%;background:var(--foot-sage)}

  @media (max-width:980px){
    .ukiyo-foot__top{grid-template-columns:1fr 1fr;gap:2.5rem}
    .ukiyo-foot__brand{grid-column:span 2}
    .ukiyo-foot__partners{grid-template-columns:1fr;gap:1.4rem;text-align:center}
    .ukiyo-foot__partners .lbl{max-width:none}
    .ukiyo-foot__partners__row{justify-content:center;gap:1.8rem}
    .ukiyo-foot__bottom{justify-content:center;text-align:center}
  }
  @media (max-width:560px){
    .ukiyo-foot__top{grid-template-columns:1fr}
    .ukiyo-foot__brand{grid-column:span 1}
    .ukiyo-foot__partners__row img{height:32px}
  }
</style>

<footer class="ukiyo-foot">
  <div class="container">

    <div class="ukiyo-foot__top">

      <div class="ukiyo-foot__brand">
        <a href="<?php echo esc_url( $home_url ); ?>">
          <img class="ukiyo-foot__logo" src="<?php echo esc_url( $logo_white ); ?>" alt="<?php bloginfo('name'); ?>" />
        </a>
        <p class="ukiyo-foot__tag"><?php echo wp_kses_post( $foot_labels['tag'] ); ?></p>
        <div class="ukiyo-foot__contact">
          <a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
            <span class="ico"><img src="<?php echo esc_url( $wa_icon ); ?>" alt="" loading="lazy" /></span>
            <span><?php echo esc_html( $foot_labels['whatsapp'] ); ?></span>
          </a>
          <a href="mailto:info@viajesukiyo.com" aria-label="<?php echo esc_attr( $foot_labels['email_label'] ); ?>">
            <span class="ico">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
            </span>
            <span>info@viajesukiyo.com</span>
          </a>
          <a href="https://www.instagram.com/viajes.ukiyo" target="_blank" rel="noopener" aria-label="Instagram">
            <span class="ico">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
            </span>
            <span>@viajes.ukiyo</span>
          </a>
        </div>
      </div>

      <div class="ukiyo-foot__col">
        <h4><?php echo esc_html( $foot_labels['destinations'] ); ?></h4>
        <ul>
          <li><a href="<?php echo esc_url( $destination_indonesia_url ); ?>">Indonesia</a></li>
          <li><a href="<?php echo esc_url( $destination_costa_rica_url ); ?>">Costa Rica</a></li>
          <li><a href="<?php echo esc_url( $destination_marruecos_url ); ?>"><?php echo esc_html( $foot_labels['morocco'] ); ?></a></li>
          <li><a href="<?php echo esc_url( $destination_colombia_url ); ?>">Colombia</a></li>
          <li><a href="<?php echo esc_url( $destination_italia_url ); ?>"><?php echo esc_html( $foot_labels['italy'] ); ?></a></li>
          <li><a href="<?php echo esc_url( $destination_lanzarote_url ); ?>">Lanzarote</a></li>
        </ul>
      </div>

      <div class="ukiyo-foot__col">
        <h4><?php echo esc_html( $foot_labels['services'] ); ?></h4>
        <ul>
          <li><a href="<?php echo esc_url( $service_custom_travel_url ); ?>"><?php echo esc_html( $foot_labels['custom_travel'] ); ?></a></li>
          <li><a href="<?php echo esc_url( $service_honeymoon_url ); ?>"><?php echo esc_html( $foot_labels['honeymoon'] ); ?></a></li>
          <li><a href="<?php echo esc_url( $service_group_travel_url ); ?>"><?php echo esc_html( $foot_labels['group_travel'] ); ?></a></li>
          <li><a href="<?php echo esc_url( $service_private_url ); ?>"><?php echo esc_html( $foot_labels['private_travel'] ); ?></a></li>
          <li><a href="<?php echo esc_url( $viajes_autor_url ); ?>"><?php echo esc_html( $foot_labels['signature_trips'] ); ?></a></li>
        </ul>
      </div>

      <div class="ukiyo-foot__col">
        <h4><?php echo esc_html( $foot_labels['company'] ); ?></h4>
        <ul>
          <li><a href="<?php echo esc_url( $about_url ); ?>"><?php echo esc_html( $foot_labels['about'] ); ?></a></li>
          <li><a href="<?php echo esc_url( $destinations_url ); ?>"><?php echo esc_html( $foot_labels['destinations'] ); ?></a></li>
          <li><a href="<?php echo esc_url( $pricing_url ); ?>"><?php echo esc_html( $foot_labels['pricing'] ); ?></a></li>
          <li><a href="<?php echo esc_url( $blog_url ); ?>">Blog</a></li>
          <li><a href="<?php echo esc_url( $reviews_url ); ?>"><?php echo esc_html( $foot_labels['reviews'] ); ?></a></li>
        </ul>
      </div>

    </div>

    <div class="ukiyo-foot__partners">
      <div class="lbl"><strong><?php echo esc_html( $foot_labels['partners_title'] ); ?></strong><?php echo wp_kses_post( $foot_labels['partners_text'] ); ?></div>
      <div class="ukiyo-foot__partners__row">
        <a href="https://www.visitcostarica.com" target="_blank" rel="noopener" aria-label="Visit Costa Rica">
          <img src="<?php echo esc_url( $tur_base . '/turismo_costarica.png' ); ?>" alt="Visit Costa Rica" />
        </a>
        <a href="https://colombia.travel" target="_blank" rel="noopener" aria-label="Colombia Travel">
          <img src="<?php echo esc_url( $tur_base . '/turismo_colombia.png' ); ?>" alt="Colombia Travel" />
        </a>
        <a href="https://www.indonesia.travel" target="_blank" rel="noopener" aria-label="Wonderful Indonesia">
          <img src="<?php echo esc_url( $tur_base . '/turismo_indonesia.png' ); ?>" alt="Wonderful Indonesia" />
        </a>
        <a href="https://www.visitmorocco.com" target="_blank" rel="noopener" aria-label="Visit Morocco">
          <img src="<?php echo esc_url( $tur_base . '/turismo_marruecos.png' ); ?>" alt="Visit Morocco" />
        </a>
      </div>
    </div>

    <div class="ukiyo-foot__bottom">
      <p class="copy">© <?php echo esc_html( date('Y') ); ?> <strong><?php bloginfo('name'); ?></strong>. <?php echo esc_html( $foot_labels['rights'] ); ?></p>
      <span class="ukiyo-foot__stamp"><span class="dot"></span><?php echo esc_html( $foot_labels['stamp'] ); ?></span>
      <div class="legal">
        <a href="<?php echo esc_url( $privacy_url ); ?>"><?php echo esc_html( $foot_labels['privacy'] ); ?></a>
        <a href="<?php echo esc_url( $terms_url ); ?>"><?php echo esc_html( $foot_labels['terms'] ); ?></a>
        <a href="<?php echo esc_url( $cookies_url ); ?>">Cookies</a>
      </div>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
