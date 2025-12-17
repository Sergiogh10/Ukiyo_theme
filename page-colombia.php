<?php
/**
 * Template Name: Colombia Experience
 */
get_header();
?>

  <!-- HERO -->
  <section class="relative flex items-center justify-center overflow-hidden" style="min-height: 50vh; padding-top: 8rem; padding-bottom: 4rem;">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full">
      <img src="<?php echo get_template_directory_uri(); ?>/images/colombia/viajes-colombia-hero2.jpg" 
           alt="Colombia Viajes Ukiyo" 
           class="w-full h-full object-cover mask-image" 
           loading="eager" />
      <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
    </div>

    <!-- Contenido Hero - Centrado -->
    <div class="relative z-10 w-full">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center gap-3 mb-6">
            <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">Café de origen</span>
            <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">Transformación social</span>
            <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">Dos costas</span>
          <h1 class="text-hero md:text-6xl lg:text-hero font-satoshi text-white mb-6 text-shadow">
            COLOMBIA
            <br>
             <span class="text-accent-300">Alegría que se queda</span>
          </h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
            Explora el Eje Cafetero, el Pacífico salvaje de Nuquí, la ciudad amurallada de Cartagena y el Caribe de siete colores en Providencia. Colombia es café, color y transformación.
          </p>
        </div>
      </div>
    </div>
  </section>

<!-- Intro Text Section -->

<section class="py-24 px-6 md:px-12 max-w-4xl mx-auto text-center bg-background">
      <div class="w-px h-16 bg-secondary/30 mx-auto mb-8"></div>
      <p class="text-2xl md:text-3xl font-satoshi leading-relaxed text-text-secondary">
        <span class="font-bold italic">Colombia</span> es alegría que se queda: café de origen, Pacífico y Caribe, música en cada esquina y gente que te hace sentir en casa desde el primer día. Un país lleno de colores, contrastes y autenticidad.
      </p>
</section>

<!-- Features Section -->
<?php
$featuresData = [
  ['id' => '1', 'title' => 'Café de Origen', 'description' => 'El mejor café del mundo crece aquí, en fincas entre montañas.', 'icon' => '<path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/>'],
  ['id' => '2', 'title' => 'Dos Costas', 'description' => 'Pacífico salvaje y Caribe de siete colores en el mismo viaje.', 'icon' => '<path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 12c.6.5 1.2 1 2.5 1C7 13 7 11 9.5 11c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/><path d="M2 18c.6.5 1.2 1 2.5 1C7 19 7 17 9.5 17c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/>'],
  ['id' => '3', 'title' => 'Alegría Colombiana', 'description' => 'La hospitalidad más cálida de Latinoamérica te espera.', 'icon' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>'],
  ['id' => '4', 'title' => 'Transformación Social', 'description' => 'Un país que ha cambiado su historia con arte y creatividad.', 'icon' => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>'],
  ['id' => '5', 'title' => 'Biodiversidad Tropical', 'description' => 'Selvas del Pacífico, ballenas jorobadas y aves endémicas.', 'icon' => '<path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 6.5-2 11l-3 3"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>'],
  ['id' => '6', 'title' => 'Ritmo y Color', 'description' => 'Salsa, vallenato y pueblos pintados en technicolor.', 'icon' => '<circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/>']
];
?>

<section class="py-20 bg-background">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-satoshi text-text-primary mb-4">Lo que hace <span class="text-primary">única</span> a Colombia</h2>
      <p class="text-text-secondary max-w-xl mx-auto">Razones para enamorarse de este país vibrante.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($featuresData as $feature): ?>
      <div class="group p-8 border border-gray-100 hover:border-primary/30 rounded-2xl bg-surface/20 hover:bg-white transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
        <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mb-6 transition-colors" style="transition: all 0.3s ease;">
          <svg class="w-6 h-6 transition-colors" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <?php echo $feature['icon']; ?>
          </svg>
        </div>
        <style>
          .group:hover .w-12.h-12 {
            background-color: var(--color-surface) !important;
            border: 2px solid rgb(246, 207, 102) !important;
          }
          .group:hover .w-12.h-12 svg {
            color: var(--color-text-secondary) !important;
            stroke: var(--color-text-secondary) !important;
          }
        </style>
        <h3 class="text-xl font-bold text-text-primary mb-3 font-satoshi"><?php echo $feature['title']; ?></h3>
        <p class="text-text-secondary leading-relaxed"><?php echo $feature['description']; ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Experiences Carousel Section -->
<?php
$ukiyoCarouselItems = [
    [
        'id' => '1',
        'title' => 'Medellín',
        'description' => 'La ciudad que renació: Comuna 13, arte urbano y cafés de especialidad. Transformación social hecha vida.',
        'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-medellin.jpg',
        'tag' => 'Valle de Aburrá'
    ],
    [
        'id' => '2',
        'title' => 'Eje Cafetero',
        'description' => 'Palmas de cera en el Valle del Cocora, fincas cafeteras y pueblos de colores. La Colombia verde y pausada.',
        'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-eje-cafetero-valle-de-cocora.jpg',
        'tag' => 'Zona Cafetera'
    ],
    [
        'id' => '3',
        'title' => 'Nuquí',
        'description' => 'Pacífico salvaje: selva que llega al mar, ballenas jorobadas y comunidades afro. Naturaleza en estado puro.',
        'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-nuqui-ballena.jpg',
        'tag' => 'Pacífico Colombiano'
    ],
    [
        'id' => '4',
        'title' => 'Cartagena',
        'description' => 'La ciudad amurallada más romántica: balcones floridos, atardeceres caribeños y historia colonial viva.',
        'imagePath' => '/images/destination-mood/viajes-a-colombia-personalizados-cartagena-ciudad-amurallada.jpg',
        'tag' => 'Costa Caribe'
    ],
    [
        'id' => '5',
        'title' => 'Providencia',
        'description' => 'El mar de siete colores: arrecifes, snorkel y ambiente isleño sin masificaciones. Cierre perfecto del viaje.',
        'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-providencia-mar-siete-colores.jpg',
        'tag' => 'Caribe Insular'
    ],
    [
        'id' => '6',
        'title' => 'Palenquera',
        'description' => 'Cultura afrocaribe en su máxima expresión: tradiciones ancestrales y gastronomía que lleva siglos.',
        'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-palanquera.jpg',
        'tag' => 'Patrimonio Cultural'
    ],
    [
        'id' => '7',
        'title' => 'Nuquí Pacífico',
        'description' => 'Playas vírgenes donde la selva abraza el océano. Cascadas ocultas y absoluta desconexión.',
        'imagePath' => '/images/colombia/viajes-a-colombia-personalizados-nuqui-pacifico-colombiano.jpg',
        'tag' => 'Chocó Biogeográfico'
    ],
    [
        'id' => '8',
        'title' => 'Playa Colombiana',
        'description' => 'Caribe colombiano: aguas cristalinas, palmeras y ritmos costeños bajo el sol tropical.',
        'imagePath' => '/images/heroimages/viajes-personalizados-ukiyo-colombiaplaya.jpg',
        'tag' => 'Costa Atlántica'
    ]
];
?>

<section class="py-24 bg-background overflow-hidden relative">
    <div class="container mx-auto px-4 mb-12 flex flex-col md:flex-row justify-between items-end gap-6">
        <div>
            <span class="uppercase tracking-widest text-primary text-sm font-semibold mb-2 block font-satoshi">Imperdibles</span>
            <h2 class="text-4xl md:text-5xl font-satoshi text-text-primary">Experiencias Ukiyo</h2>

        </div>
        <div class="flex gap-4">
            <button id="scroll-left" class="p-3 border border-text-primary/20 rounded-full hover:bg-primary hover:text-white text-text-primary transition-colors duration-300" aria-label="Anterior">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m12 19-7-7 7-7"/>
                    <path d="M19 12H5"/>
                </svg>
            </button>
            <button id="scroll-right" class="p-3 border border-text-primary/20 rounded-full hover:bg-primary hover:text-white text-text-primary transition-colors duration-300" aria-label="Siguiente">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"/>
                    <path d="m12 5 7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Carousel Container -->
    <div 
        id="experiences-carousel"
        class="flex gap-6 px-4 md:px-8 pb-12 pt-8"
        style="overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none; scroll-behavior: smooth;"
    >
        <style>
            #experiences-carousel::-webkit-scrollbar {
                display: none;
            }
            .carousel-card {
                transition: transform 0.3s ease;
            }
            .carousel-card:hover {
                transform: translateY(-10px);
            }
            .carousel-card:hover .carousel-card-content {
                transform: translateY(-10px);
            }
        </style>

        <?php 

        foreach ($ukiyoCarouselItems as $expItem): 

            $imageUrl = get_template_directory_uri() . $expItem['imagePath'];
        ?>
        <div 
            style="
                flex-shrink: 0;
                width: 85vw;
                max-width: 400px;
                height: 500px;
                background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.8)), url('<?php echo esc_url($imageUrl); ?>');
                background-size: cover;
                background-position: center;
                border-radius: 1.5rem;
                overflow: hidden;
                position: relative;
            "
            class="carousel-card snap-center cursor-pointer"
        >
            <!-- Content -->
            <div class="carousel-card-content" style="position: absolute; bottom: 0; left: 0; padding: 2rem; width: 100%; transition: transform 0.3s ease;">
                <div style="color: #ff6b6b; font-size: 12px; text-transform: uppercase; margin-bottom: 0.5rem; font-weight: 600;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline;">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    <?php echo esc_html($expItem['tag']); ?>
                </div>
                <h3 style="font-size: 2rem; margin-bottom: 0.75rem; color: white; font-weight: 600;"><?php echo esc_html($expItem['title']); ?></h3>
                <p style="color: rgba(255,255,255,0.8); line-height: 1.6;">
                    <?php echo esc_html($expItem['description']); ?>
                </p>

            </div>
        </div>
        <?php endforeach; ?>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('experiences-carousel');
    const leftBtn = document.getElementById('scroll-left');
    const rightBtn = document.getElementById('scroll-right');

    if (carousel && leftBtn && rightBtn) {
        // Calculate scroll amount based on card width + gap
        function getScrollAmount() {
            const firstCard = carousel.querySelector('.carousel-card');
            if (firstCard) {
                const cardWidth = firstCard.offsetWidth;
                const gap = 24; // gap-6 = 24px
                return cardWidth + gap;
            }
            return 424; // fallback: 400px card + 24px gap
        }

        leftBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
        });

        rightBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
        });
    }
});
</script>

<!-- AUTORES (mini bios) 
  <section class="py-20 bg-background">
  <div class="container mx-auto px-6">
    
    <div class="text-center mb-16">
      <h2 class="text-4xl font-satoshi text-text-primary mb-4">Conoce a nuestros <span class="text-primary">anfitriones</span></h2>
      <p class="text-text-secondary max-w-xl mx-auto">Un viaje no son solo lugares, son personas. En Ukiyo, trabajamos con guías que no solo muestran el camino, sino que comparten su alma y el amor por su tierra.</p>
    </div>

    <div class="grid gap-8 md:grid-cols-4">

      <!-- CARD LUIS 
      <article class="rounded-2xl border-2 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <!-- Imagen más pequeña 
        <div class="aspect-[4/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/viaje-de-autor-al-pantanal-con-guia-experto-luis-acuna.jpg"
            alt="Luis Acuña, guía costarricense"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] mask-image"
          />
        </div>

        <!-- Texto más compacto 
        <div class="p-4">
          <h3 class="text-base font-semibold text-text-primary">
            Luis · Guía costarricense y fotógrafo
          </h3>
          <p class="text-text-secondary mt-1 text-sm leading-relaxed">
            Lleva años esperando la luz justa en humedales y bosques tropicales. 
            Su Pantanal es silencio, paciencia y respeto por la fauna.
          </p>
        </div>

      </article>


      <!-- CARD MOHA 
      <article class="rounded-2xl border-2 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <div class="aspect-[4/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/viaje-de-autor-a-marruecos-con-guia-local-moha.jpg"
            alt="Moha, guía marroquí"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] mask-image"
          />
        </div>

        <div class="p-4">
          <h3 class="text-base font-semibold text-text-primary">
            Moha · Guía marroquí
          </h3>
          <p class="text-text-secondary mt-1 text-sm leading-relaxed">
            Nacido en el Atlas, conoce el desierto por dentro: los zocos que importan, 
            los silencios que merecen la pena y el té en el lugar adecuado.
          </p>
        </div>

      </article>

      <!-- CARD DAVID 
      <article class="rounded-2xl border-2 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <div class="aspect-[4/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/david/viaje-de-autor-bali-david.jpg"
            alt="David, emprendedor balines"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] mask-image"
          />
        </div>

        <div class="p-4">
          <h3 class="text-base font-semibold text-text-primary">
            David · Guía y emprendedor balinés
          </h3>
          <p class="text-text-secondary mt-1 text-sm leading-relaxed">
            Conoce cada carretera y atajo de la isla. Su empresa de transporte es sinónimo de seguridad y sonrisas, llevándote a los rincones secretos de Bali lejos del tráfico habitual.
          </p>
        </div>

      </article>

    </div>

  </div>
</section> -->


<!-- Practical Information -->
<section class="py-20 bg-background">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-display font-satoshi text-text-primary mb-4">
                    Recomendaciones <span class="text-primary">UKIYO</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    Todo lo que necesitas saber para prepararte para esta experiencia auténtica.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Preparation -->
                    <div class="card">
                        <h3 class="text-xl font-satoshi text-text-primary mb-4">Preparación Recomendada</h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Ropa ligera (clima cálido y húmedo en varias zonas)</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Calzado cómodo para caminar y senderos</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Protector solar y repelente</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Respeto por las costumbres locales</span>
                            </div>
                        </div>
                    </div>

                    <!-- Important Notes -->
                    <div class="card">
                        <h3 class="text-xl font-satoshi text-text-primary mb-4">Consideraciones Importantes</h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Nivel físico moderado en algunas rutas (Cocora, Nuquí)</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Respeto por comunidades afro e indígenas</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Grupos pequeños (máximo 8 personas) para experiencia íntima</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Seguro de viaje recomendado (no incluido)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <section class="py-20 bg-background text-text-secondary">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
              <h2 class="text-display font-satoshi mb-6 reveal-on-scroll">
                    ¿Listo para vivir Colombia?
                </h2>
              <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Conecta con la esencia de Colombia. Déjate guiar por UKIYO a través de Medellín, el Eje Cafetero, Nuquí, Cartagena y Providencia en un recorrido creado solo para ti.
                </p>
              <div class="flex flex-col sm:flex-row gap-4 justify-center reveal-on-scroll delay-200">
                  <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" 
                    class="btn-primary text-text-secondary">
                      Hablemos de tu viaje
                  </a>
                  <a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" 
                    class="btn-primary text-text-secondary">
                      Ver más destinos
                  </a>
              </div>
          </div>
      </div>
  </section>

<?php get_footer(); ?>