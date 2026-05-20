<?php
/* Template Name: Reviews 2 */
get_header();
?>

<main class="min-h-screen bg-background">

  <!-- HERO -->
<style>
  .hero-responsive { height: 100vh; }
  @media (min-width: 1024px) {
    .hero-responsive { height: auto !important; min-height: 50vh !important; }
  }
</style>
  <section class="hero-responsive relative flex items-center justify-center overflow-hidden pt-32 pb-16">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full">
      <img src="<?php echo get_template_directory_uri(); ?>/images/heroimages/viajes-autor-ukiyo-reviewfinal.jpg" 
           alt="Viajes de autor" 
           class="w-full h-full object-cover mask-image" 
           loading="eager"
           fetchpriority="high"
           decoding="async" />
      <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
    </div>

    <!-- Contenido Hero - Centrado -->
    <div class="relative z-10 w-full">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
          <?php
          ukiyo_render_breadcrumbs([
              'class'      => 'mb-6 justify-center text-white/80',
              'link_class' => 'text-white/80 hover:text-white transition-colors',
          ]);
          ?>
          <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">
            Reviews
          </span>
          <h1 class="text-hero md:text-6xl lg:text-hero font-rowdies text-white mb-6 text-shadow">
            Historias de nuestros <span class="text-accent-300">viajeros</span>
          </h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
          Opiniones reales de viajeros que confiaron en UKIYO. Experiencias auténticas, sostenibles y creadas a medida.       
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Reviews -->
<section class="py-16 bg-background font-satoshi md:py-24 px-4">
    <div class="container mx-auto max-w-7xl">
        <div class="text-center mb-16">
            <h2 class="text-display font-rowdies text-text-primary mb-4">
                Recuerdos <span class="text-primary">únicos</span>
            </h2>
        </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
          $reviews = [
            [
              "name" => "Maite y Ramón",
              "destination" => "Bali, Indonesia",
              "rating" => 5,
              "review" => "Experiencia y plan de viaje con Ukiyo 200% recomendable. Fuimos de viaje de novios a Bali y la verdad es que no pudo ser mejor, no solo por el destino en sí que ofrece de todo (cultura, playas, paisajes preciosos y todo tipo de actividades), también gracias a Sergio que nos guió el viaje y nos lo cuadró todo perfectamente, además da consejos y recomendaciones que no lo suelen hacer las agencias habitualmente. Lo recomendaría una y mil veces, profesional como la copa de un pino!",
              "date" => "Septiembre 2024",
              "image" => "resena-maite-ramon-bali-indonesia-2.jpg"
            ],
            [
              "name" => "María y Edu",
              "destination" => "Isla de Java, Indonesia",
              "rating" => 5,
              "review" => "Gracias a Ukiyo no solo visitamos Indonesia, si no que la vivimos de verdad. Desde el primer día sentimos mucha tranquilidad ya que todo estaba perfectamente organizado y pudimos despreocuparnos y pensar solo en disfrutar. Cuidaron cada detalle y nos crearon un itinerario adaptado a lo que buscábamos, un viaje auténtico, con alma, lejos de lo típico y de los que te dejan huella. Sin duda lo fue y al recordarlo seguimos emocionándonos. Estamos deseando repetir con ellos en nuestro próximo destino!",
              "date" => "Julio 2025",
              "image" => "resena-maria-edu-java-indonesia.jpg"
            ],
            [
              "name" => "Carmen y Jose Ángel",
              "destination" => "Komodo, Indonesia",
              "rating" => 5,
              "review" => "Viajar a Indonesia con Ukiyo ha sido una aventura excepcional, un viaje personalizado al 100% donde hemos podido disfrutar de experiencias auténticas y humanas, sin el agobio del turismo masivo. El esfuerzo y el trabajo detrás de la organización ha hecho que nuestro viaje sea muy toppp. Muchas gracias equipo 🙌🏼 ¡Estamos deseando repetir!",
              "date" => "Septiembre 2025",
              "image" => "resena-carmen-jose-komodo-indonesia.jpg"
            ],
            [
              "name" => "Carolina y Carmen",
              "destination" => "Cuba",
              "rating" => 5,
              "review" => "Lo mejor de Cuba es su gente. La calidez, las risas, las historias compartidas sin prisa… cada conversación parecía un pequeño tesoro. Pasar una tarde aprendiendo a bailar son con una familia local fue uno de esos momentos que te reconcilian con la vida. Regresé con el corazón lleno y la sensación de haber viajado no solo a un lugar, sino a una manera distinta de vivir.",
              "date" => "Julio 2024",
              "image" => "resena-carolina-carmen-cuba.jpg"
            ],
            [
              "name" => "Sergio y Helena",
              "destination" => "Costa Rica",
              "rating" => 5,
              "review" => "Cada día era una aventura diferente: caminatas entre selvas que parecen respirar, amaneceres acompañados por el sonido de los monos aulladores y encuentros con animales que jamás imaginamos ver tan cerca. Fue imposible no emocionarnos. Volvimos a casa con la sensación de haber vivido algo auténtico, profundo y transformador. Costa Rica no solo es un destino; es un viaje que se queda en el corazón.",
              "date" => "Mayo 2023",
              "image" => "resena-sergio-helena-costa-rica.jpg"
            ],
            [
              "name" => "Berta y Rubén",
              "destination" => "Marruecos",
              "rating" => 5,
              "review" => "Viajar a Marruecos fue como abrir una puerta a otro mundo, pero la noche en el desierto fue directamente magia. Cruzar las dunas en dromedario al atardecer, ver cómo el cielo se tiñe de naranja y escuchar solo el silencio fue una sensación que nunca olvidaré.",
              "date" => "Febrero 2024",
              "image" => "resena-berta-ruben-marruecos.jpg"
            ],
          ];

          function ukiyo_render_stars($count = 5) {
            $svg = '<svg class="w-4 h-4 fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.562-.954L10 0l2.948 5.956 6.562.954-4.755 4.635 1.123 6.545z"/></svg>';
            return str_repeat($svg, $count);
          }

          foreach ($reviews as $r) :
            $img = get_template_directory_uri() . '/images/reviews/' . $r['image'];
        ?>
          <article class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md shadow-sm overflow-hidden flex flex-col">
            <div class="aspect-[4/5] w-full overflow-hidden group cursor-pointer">
              <img
                src="<?php echo esc_url($img); ?>"
                alt="<?php echo esc_attr($r['name'] . ' - ' . $r['destination'] . ' | Viaje personalizado con Ukiyo'); ?>"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 mask-image"
                loading="lazy"
                decoding="async"
              />
            </div>
            <div class="p-6 space-y-3">
              <header class="flex items-start justify-between gap-4">
                <div>
                  <h3 class="text-lg font-semibold text-text-primary"><?php echo esc_html($r['name']); ?></h3>
                  <p class="text-sm text-text-secondary italic"><?php echo esc_html($r['destination']); ?> · <?php echo esc_html($r['date']); ?></p>
                </div>
                <div class="flex items-center gap-1 text-accent" aria-label="<?php echo esc_attr($r['rating']); ?> de 5">
                  <?php echo ukiyo_render_stars(5); ?>
                </div>
              </header>
              <p class="text-text-secondary leading-relaxed"><?php echo esc_html($r['review']); ?></p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
</section>

    <!-- CTA FINAL -->
    <section class="py-12 bg-background text-text-secondary">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-display font-rowdies mb-6 reveal-on-scroll">
                    Tu aventura empieza aquí
                </h2>
                <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Todo gran viaje nace de una idea, una emoción o una simple curiosidad.
                    Cuéntanos qué te mueve y diseñaremos una experiencia que te haga sentir el mundo de verdad.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center reveal-on-scroll delay-200">
                    <a href="<?php echo esc_url( ukiyo_get_route_url( 'plan_trip' ) ); ?>" class="btn-primary text-text-secondary">
                        Diseñar tu aventura
                    </a>
                    <a href="https://wa.me/message/CS2LNI6YHSETO1" target="_blank" class="btn-primary text-text-secondary flex items-center gap-2">
                        <img width="64" height="64" src="https://img.icons8.com/cotton/64/whatsapp--v4.png" alt="Contactar con Viajes Ukiyo por WhatsApp" class="w-6 h-6"/>
                        Hablemos de tu viaje
                  </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
