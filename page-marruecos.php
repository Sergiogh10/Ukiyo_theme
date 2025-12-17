<?php
/**
 * Template Name: Marruecos Experience
 */
get_header();
?>

  <!-- HERO -->
  <section class="relative flex items-center justify-center overflow-hidden" style="min-height: 50vh; padding-top: 8rem; padding-bottom: 4rem;">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full">
      <img src="<?php echo get_template_directory_uri(); ?>/images/marruecos/viajes-marruecos-hero3.jpg" 
           alt="Marruecos Viajes Ukiyo" 
           class="w-full h-full object-cover mask-image" 
           loading="eager" />
      <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
    </div>

    <!-- Contenido Hero - Centrado -->
    <div class="relative z-10 w-full">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center gap-3 mb-6">
            <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">Desierto del Sahara</span>
            <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">Medinas milenarias</span>
            <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">Hospitalidad bereber</span>
          <h1 class="text-hero md:text-6xl lg:text-hero font-satoshi text-white mb-6 text-shadow">
            MARRUECOS
            <br>
             <span class="text-accent-300">Encrucijada de culturas</span>
          </h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
            Explora Marrakech, Fez, las dunas de Merzouga y las kasbahs del Atlas. Zocos llenos de especias, té a la menta bajo las estrellas y hospitalidad que te hace sentir como en casa. Marruecos es color, historia y alma.
          </p>
        </div>
      </div>
    </div>
  </section>

<!-- Intro Text Section -->

<section class="py-24 px-6 md:px-12 max-w-4xl mx-auto text-center bg-background">
      <div class="w-px h-16 bg-secondary/30 mx-auto mb-8"></div>
      <p class="text-2xl md:text-3xl font-satoshi leading-relaxed text-text-secondary">
        <span class="font-bold italic">Marruecos</span> es un mosaico de colores, sabores y sonidos. Desde los zocos de Marrakech hasta las dunas infinitas del Sahara, cada rincón cuenta una historia de mil y una noches.
      </p>
</section>

<!-- Features Section -->
<?php
$featuresData = [
  ['id' => '1', 'title' => 'Desierto del Sahara', 'description' => 'Dunas infinitas, noches estrelladas y amaneceres sobre el erg Chebbi.', 'icon' => '<path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>'],
  ['id' => '2', 'title' => 'Medinas Milenarias', 'description' => 'Fez y Marrakech: laberintos de calles, zocos y artesanía viva.', 'icon' => '<path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>'],
  ['id' => '3', 'title' => 'Cultura Bereber', 'description' => 'Hospitalidad genuina, té a la menta y tradiciones ancestrales.', 'icon' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>'],
  ['id' => '4', 'title' => 'Montañas del Atlas', 'description' => 'Valles verdes, pueblos bereberes y paisajes de película.', 'icon' => '<path d="M3 20l9-11 9 11"/><path d="m3 20 3-7 3 7"/><path d="m18 13 3 7"/>'],
  ['id' => '5', 'title' => 'Gastronomía Única', 'description' => 'Tajines, cuscús y sabores que mezclan especias con tradición.', 'icon' => '<circle cx="12" cy="8" r="6"/><path d="M8.5 14.5A4 4 0 0 0 12 18a4 4 0 0 0 3.5-3.5M12 2v6"/>'],
  ['id' => '6', 'title' => 'Kasbahs Históricas', 'description' => 'Fortalezas de adobe que cuentan siglos de historia.', 'icon' => '<path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>']
];
?>

<section class="py-20 bg-background">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-satoshi text-text-primary mb-4">Lo que hace <span class="text-primary">único</span> a Marruecos</h2>
      <p class="text-text-secondary max-w-xl mx-auto">La puerta de África con alma mediterránea.</p>
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
        'title' => 'Marrakech',
        'description' => 'La Perla del Sur: Djemaa el-Fna, zocos laberínticos, jardines secretos y arquitectura que te transporta a otra época.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.jpg',
        'tag' => 'Ciudad Imperial'
    ],
    [
        'id' => '2',
        'title' => 'Fez',
        'description' => 'La medina más antigua del mundo: curtidurías, artesanos y callejuelas donde el tiempo se detuvo hace siglos.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-fez.jpg',
        'tag' => 'Capital Espiritual'
    ],
    [
        'id' => '3',
        'title' => 'Merzouga',
        'description' => 'Dunas del Erg Chebbi: atardeceres en camello, noches bajo haimas bereberes y amaneceres sobre el desierto infinito.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-merzouga.jpg',
        'tag' => 'Sahara Marroquí'
    ],
    [
        'id' => '4',
        'title' => 'Ait Ben Haddou',
        'description' => 'La kasbah más fotogénica: adobe rojo, fortalezas de película y vistas al Alto Atlas desde lo alto.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-aitbenhaddou.jpg',
        'tag' => 'Patrimonio UNESCO'
    ],
    [
        'id' => '5',
        'title' => 'Rissani',
        'description' => 'Puerta del desierto: zocos auténticos, kasbahs olvidadas y el espíritu más puro del sur marroquí.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-rissani.jpg',
        'tag' => 'Oasis del Sur'
    ],
    [
        'id' => '6',
        'title' => 'Desierto en Camello',
        'description' => 'La experiencia definitiva: atravesar dunas doradas al atardecer, té a la menta bajo las estrellas.',
        'imagePath' => '/images/marruecos/viajes-personalizados-ukiyo-camello-marruecos.jpg',
        'tag' => 'Experiencia Nómada'
    ],
    [
        'id' => '7',
        'title' => 'Valle del Draa',
        'description' => 'Oasis de palmeras, kasbahs fortificadas y pistas que cruzan el Atlas hacia el desierto.',
        'imagePath' => '/images/autores/moha/viajes-a-marruecos-personalizados-pistas-oasis-4x4.jpg',
        'tag' => 'Ruta del Sur'
    ],
    [
        'id' => '8',
        'title' => 'Música Gnawa',
        'description' => 'La banda sonora del desierto: ritmos bereberes, khamlia y la esencia espiritual de Marruecos.',
        'imagePath' => '/images/autores/moha/viajes-a-marruecos-personalizados-khamlia-musica-gnawa.jpg',
        'tag' => 'Cultura Viva'
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

<!-- AUTORES (mini bios) -->
  <section class="py-20 bg-background">
  <div class="container mx-auto px-6">
    
    <div class="text-center mb-16">
      <h2 class="text-4xl font-satoshi text-text-primary mb-4">Conoce a nuestros <span class="text-primary">anfitriones</span></h2>
      <p class="text-text-secondary max-w-xl mx-auto">Un viaje no son solo lugares, son personas. En Ukiyo, trabajamos con guías que no solo muestran el camino, sino que comparten su alma y el amor por su tierra.</p>
    </div>

    <div class="grid gap-8 md:grid-cols-4">

      <!-- CARD MOHA -->
      <article class="rounded-2xl border-1 border-black bg-background backdrop-blur-md shadow-sm overflow-hidden flex flex-col">

        <div class="aspect-[5/3]">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/autores/moha/autor-moha2.png"
            alt="Moha, guía marroquí"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] bg-background mask-image"
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
    </div>
  </div>
</section>


<!-- Practical Information -->
<section class="py-20 bg-background">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-display font-satoshi text-text-primary mb-4">
                    Recomendaciones <span class="text-primary">UKIYO</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    Todo lo que necesitas saber para prepararte para esta aventura marroquí.
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
                                <span class="text-text-secondary text-sm">Ropa cómoda y respetuosa (cubrir hombros y rodillas)</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Calzado cómodo para calles empedradas de medinas</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Protector solar y sombrero para el desierto</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Apertura a regatear en zocos (es parte de la cultura)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Important Notes -->
                    <div class="card">
                        <h3 class="text-xl font-satoshi text-text-primary mb-4">Consideraciones Importantes</h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z " clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Nivel físico moderado (Atlas y desierto)</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1 a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Respeto por tradiciones musulmanas (especialmente durante Ramadán)</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Grupos pequeños para experiencia auténtica</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-secondary mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-text-secondary text-sm">Seguro de viaje recomendado</span>
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
                    ¿Listo para vivir Marruecos?
                </h2>
              <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Piérdete en los zocos de Marrakech, duerme bajo las estrellas del Sahara y déjate llevar por la hospitalidad bereber.
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
