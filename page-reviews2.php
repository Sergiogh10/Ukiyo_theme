<?php
/* Template Name: Reviews 2 */
get_header();
?>

<main class="min-h-screen bg-background">

<!-- ===================== HERO ===================== -->
<section class="relative pt-24 pb-20 overflow-hidden font-satoshi">
  <!-- Fondo con imagen al 20% -->
  <div class="absolute inset-0 pointer-events-none">
    <img
      src="<?php echo get_template_directory_uri(); ?>/images/colombia/viajes-a-colombia-personalizados-nuqui-pacifico-colombiano.jpg"
      alt="Viajeros compartiendo sus experiencias personalizadas con Ukiyo"
      class="w-full h-full object-cover object-top mask-image opacity-20"
      loading="lazy"
      decoding="async"
      aria-hidden="true"
      onerror="this.src='https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg'; this.onerror=null;">
  </div>
  <div class="absolute inset-0 opacity-5">
    <svg class="w-full h-full" viewBox="0 0 100 100" fill="currentColor">
      <pattern id="cultural-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
        <circle cx="10" cy="10" r="2" opacity="0.3"/>
        <path d="M5 5l10 10M15 5l-10 10" stroke="currentColor" stroke-width="0.5" opacity="0.2"/>
      </pattern>
      <rect width="100%" height="100%" fill="url(#cultural-pattern)"/>
    </svg>
  </div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="max-w-4xl mx-auto text-center">
      <span class="inline-block px-4 py-2 bg-primary-100 text-primary rounded-full text-sm font-satoshi font-medium mb-6">
        Reviews
      </span>
      <h1 class="text-hero font-satoshi-bold text-text-primary mb-6">
        Historias de <span class="text-primary">viajeros</span>
      </h1>
      <p class="text-xl font-satoshi text-text-secondary max-w-3xl mx-auto leading-relaxed">
                Opiniones reales de viajeros que confiaron en UKIYO. Experiencias auténticas, sostenibles y creadas a medida.
      </p>
    </div>
  </div>
</section>

  <!-- Reviews -->
<section class="py-16 bg-white font-satoshi md:py-24 px-4">
    <div class="container mx-auto max-w-7xl">
        <div class="text-center mb-16">
            <h2 class="text-display font-satoshi-bold text-text-primary mb-4">
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
              "review" => "Itinerario equilibrado entre tradición y modernidad. Hoteles excelentes y experiencias memorables.",
              "date" => "Julio 2024",
              "image" => "resena-carolina-carmen-cuba.jpg"
            ],
            [
              "name" => "Sergio y Helena",
              "destination" => "Costa Rica",
              "rating" => 5,
              "review" => "Auroras, glaciares y cascadas espectaculares. Nos llevaron a rincones que solos no habríamos encontrado.",
              "date" => "Mayo 2023",
              "image" => "resena-sergio-helena-costa-rica.jpg"
            ],
            [
              "name" => "Berta y Rubén",
              "destination" => "Marruecos",
              "rating" => 5,
              "review" => "Viaje perfecto en familia. Actividades para los niños y relax para nosotros. Todo muy bien organizado.",
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
                onerror="this.src='https://images.pexels.com/photos/346885/pexels-photo-346885.jpeg'; this.onerror=null;"
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

<!-- Journey Builder CTA -->
 <section class="py-20 bg-gradient-primary text-white">
    <div class="container mx-auto px-6 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-display font-satoshi mb-6">
                    Tu aventura empieza aquí
            </h2>
            <p class="text-xl mb-8 opacity-90">
Todo gran viaje nace de una idea, una emoción o una simple curiosidad.
Cuéntanos qué te mueve y diseñaremos una experiencia que te haga sentir el mundo de verdad.                </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300">
                        Diseña tu aventura
                </a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('nosotros') ) ); ?>" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300">
                        Conoce UKIYO
                </a>
            </div>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
