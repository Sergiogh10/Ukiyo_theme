<?php
/**
 * Template Name: Sobre Nosotros
 */
get_header();
?>

  <!-- HERO -->
  <section class="relative flex items-center justify-center overflow-hidden" style="min-height: 50vh; padding-top: 8rem; padding-bottom: 4rem;">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full">
      <img src="<?php echo get_template_directory_uri(); ?>/images/heroimages/viajes-autor-ukiyo-viajeros2.jpg" 
           alt="Viajes de autor" 
           class="w-full h-full object-cover mask-image" 
           loading="eager" />
      <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
    </div>

    <!-- Contenido Hero - Centrado -->
    <div class="relative z-10 w-full">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
          <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">
            浮世 - El Mundo Flotante
          </span>
          <h1 class="text-hero md:text-6xl lg:text-hero font-satoshi text-white mb-6 text-shadow">
            Creando viajes con <span class="text-accent-300">alma</span>
          </h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
          Inspirados en el “mundo flotante” de la cultura japonesa, creamos experiencias que celebran el momento presente y la belleza de lo efímero. UKIYO nace de una forma distinta de entender los viajes: sin prisa, sin poses y sin guiones.
          Creemos que la verdadera belleza está en lo simple, en lo que sucede cuando conectas de verdad con un lugar.

          Por eso creamos experiencias honestas, sostenibles y llenas de vida.          
          </p>
        </div>
      </div>
    </div>
  </section>

<!-- Founder Story -->
<section class="py-20 bg-background font-satoshi">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-16">
        <h2 class="text-display font-satoshi-bold text-text-primary mb-4">
          De un viaje <span class="text-accent">nació una idea</span>
        </h2>
        <p class="text-lg font-satoshi text-text-secondary max-w-2xl mx-auto">
Así nació UKIYO.
De la unión entre la mirada creativa de Víctor, capaz de transformar cualquier destino en emoción visual, y mi obsesión por viajar de forma auténtica, tranquila y consciente, acompañado siempre por Helena, que ha sido parte esencial de este camino.       </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
        <!-- Founder -->
        <div class="lg:col-span-1">
          <div class="aspect-[3/4] rounded-lg overflow-hidden mb-6">
            <img src="<?php echo get_template_directory_uri(); ?>/images/travellers/agencia-de-viajes-personalizados-ukiyo-fundadores.jpg"
                 alt="Sergio García-Heras y Víctor García-Heras, fundadores de Ukiyo, agencia de viajes personalizados"
                 class="w-full h-full object-cover"
                 loading="lazy"
                 onerror="this.src='https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg'; this.onerror=null;" />
          </div>
          <div class="text-center">
            <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">Victor y Sergio</h3>
            <p class="text-text-secondary">Fundadores</p>
          </div>
        </div>

        <!-- Story -->
        <div class="lg:col-span-2">
          <div class="prose prose-lg max-w-none">
            <blockquote class="text-xl font-satoshi text-text-primary mb-8 border-l-4 border-primary pl-6 italic">
              "Hoy, UKIYO no es solo nuestra agencia:
es la suma de nuestras pasiones, nuestras formas de viajar y nuestra manera de entender el mundo.
Un proyecto familiar que busca que otras personas puedan vivir viajes reales, cuidados, lejos de lo masivo y cerca de lo esencial."
            </blockquote>
            <div class="space-y-6 text-text-secondary">
              <p>Somos dos hermanos con caminos muy distintos, pero unidos por una misma forma de ver el mundo.</p>
              <p>Víctor, creador de contenido y eterno buscador de historias, lleva años capturando momentos que inspiran a viajar.</p>
              <p>Sergio, un viajero apasionado que recorre el mundo junto a Helena y que ha encontrado en cada viaje una forma de vida, una manera de comprender la belleza de lo auténtico.</p>
              <p>Durante años viajamos por separado, aprendiendo, descubriendo y viviendo experiencias que, sin saberlo, nos estaban llevando exactamente al mismo lugar: crear algo juntos.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Team -->
<section class="py-20 bg-background font-satoshi">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-display font-satoshi-bold text-text-primary mb-4">
        Nuestros <span class="text-primary">especialistas</span>
      </h2>
      <p class="text-lg text-text-secondary max-w-2xl mx-auto">
        Cada miembro de nuestro equipo es apasionado, experto y comprometido con ofrecer experiencias únicas.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Helena -->
      <div class="card text-center group hover:shadow-card-hover">
        <div class="aspect-square rounded-full overflow-hidden mx-auto mb-6 w-32 h-32">
          <img src="<?php echo get_template_directory_uri(); ?>/images/travellers/agencia-de-viajes-personalizados-ukiyo-helena-valenzuela.jpg"
               alt="Helena Valenzuela, coordinadora experta en Ukiyo"
               class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
        </div>
        <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">Helena Valenzuela</h3>
        <p class="text-primary font-medium mb-3">Coordinadora experta</p>
        <p class="text-text-secondary text-sm mb-4">
          Más de 10 años viviendo aventuras. Apasionada de la naturaleza y la gente de América del Sur.
        </p>
      </div>

      <!-- Victor -->
      <div class="card text-center group hover:shadow-card-hover">
        <div class="aspect-square rounded-full overflow-hidden mx-auto mb-6 w-32 h-32">
          <img src="<?php echo get_template_directory_uri(); ?>/images/travellers/agencia-de-viajes-personalizados-ukiyo-victor-garcia-heras.jpg"
               alt="Víctor García-Heras, creador de contenido en Ukiyo"
               class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
        </div>
        <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">Victor García-Heras</h3>
        <p class="text-primary font-medium mb-3">Aventurero intrépido y creador de contenido</p>
        <p class="text-text-secondary text-sm mb-4">
          Apasionado de la historia y de crear recuerdos en su diario de viajes de Youtube.
        </p>
      </div>

      <!-- Sergio -->
      <div class="card text-center group hover:shadow-card-hover">
        <div class="aspect-square rounded-full overflow-hidden mx-auto mb-6 w-32 h-32">
          <img src="<?php echo get_template_directory_uri(); ?>/images/travellers/agencia-de-viajes-personalizados-ukiyo-sergio-garcia-equipo.jpg"
               alt="Sergio García, mochilero y miembro del equipo Ukiyo"
               class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
        </div>
        <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">Sergio Garcia</h3>
        <p class="text-primary font-medium mb-3">Mochilero ante todo</p>
        <p class="text-text-secondary text-sm mb-4">
          Amante de descubrir rincones y un gran disfrutón de cada viaje. "El mundo es demasiado bonito como para no querer recorrerlo entero"
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-background font-satoshi">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-display font-satoshi-bold text-text-primary mb-4">
        Nuestros <span class="text-secondary">Valores</span>
      </h2>
      <p class="text-lg text-text-secondary max-w-2xl mx-auto">
Cada viaje que creamos parte de los mismos principios:
respeto, coherencia y humanidad.
Buscamos que cada experiencia honre tanto al viajero como a las comunidades que nos abren sus puertas.      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <!-- Autenticidad -->
      <div class="text-center group">
        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-primary-200 transition-colors duration-300">
          <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi-bold text-text-primary mb-3">Autenticidad</h3>
        <p class="text-text-secondary">
Diseñamos experiencias reales, lejos del turismo masivo.
Queremos que conectes con la esencia de cada lugar: su gente, sus historias y su ritmo.        </p>
      </div>

      <!-- Sostenibilidad -->
      <div class="text-center group">
        <div class="w-16 h-16 bg-secondary-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-secondary-200 transition-colors duration-300">
          <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi-bold text-text-primary mb-3">Sostenibilidad</h3>
        <p class="text-text-secondary">
Colaboramos con proyectos locales y promovemos un turismo que cuida.
Cuidar el entorno, las culturas y las personas es la base de todo lo que hacemos.        </p>
      </div>

      <!-- Transparencia -->
      <div class="text-center group">
        <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-accent-200 transition-colors duration-300">
          <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi-bold text-text-primary mb-3">Transparencia</h3>
        <p class="text-text-secondary">
Creemos que la confianza se gana con honestidad.
Por eso cada decisión, recomendación o proveedor se elige con claridad y coherencia desde el primer día.        </p>
      </div>

      <!-- Bienestar -->
      <div class="text-center group">
        <div class="w-16 h-16 bg-success-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-success-200 transition-colors duration-300">
          <svg class="w-8 h-8 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
          </svg>
        </div>
        <h3 class="text-xl font-satoshi-bold text-text-primary mb-3">Bienestar</h3>
        <p class="text-text-secondary">
Más que viajes, creamos momentos que inspiran y enriquecen.
Experiencias pensadas para disfrutar, reconectar y volver con una mirada diferente.        </p>
      </div>
    </div>
  </div>
</section>

<!-- Partnership Philosophy 
<section class="py-20 bg-background font-satoshi">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-display font-satoshi-bold text-text-primary mb-4">
        Nuestra forma de <span class="text-secondary">colaborar</span>
      </h2>
      <p class="text-lg text-text-secondary max-w-2xl mx-auto">
En UKIYO no “tomamos” experiencias de las comunidades, las creamos juntos.
Cada colaboración nace desde el respeto y la confianza, con el propósito de que el viaje aporte tanto al viajero como a quienes lo hacen posible.      </p>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8"> -->
        <!-- Partnership Principle 1 
        <div class="text-center">
          <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-accent-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
            </svg>
          </div>
          <h3 class="text-xl font-satoshi-bold mb-3">Beneficio Mutuo</h3>
          <p class="opacity-90">
Cada experiencia genera un impacto real: valor económico directo para las comunidades locales y vivencias auténticas para nuestros viajeros.          </p>
        </div> -->

        <!-- Partnership Principle 2 
        <div class="text-center">
          <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-accent-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <h3 class="text-xl font-satoshi-bold mb-3">Respeto Cultural</h3>
          <p class="opacity-90">
Las tradiciones se comparten, no se exhiben.
Participamos desde la escucha y el reconocimiento, honrando siempre el origen de cada historia.          </p>
        </div> -->

        <!-- Partnership Principle 3 
        <div class="text-center">
          <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-accent-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 8l8 8M16 8l-8 8" opacity="0.3" />
            </svg>
          </div>
          <h3 class="text-xl font-satoshi-bold mb-3">Impacto Duradero</h3>
          <p class="opacity-90">
No buscamos relaciones pasajeras, sino vínculos que crecen con el tiempo.
Queremos que cada viaje deje una huella positiva que permanezca mucho después del regreso.          </p>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- Partner Testimonials 
<section class="py-20 bg-background font-satoshi">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-display font-satoshi-bold text-text-primary mb-4">
        Nuestros <span class="text-accent">Colaboradores</span>
      </h2>
      <p class="text-lg text-text-secondary max-w-2xl mx-auto">
        Las palabras de quienes trabajan con nosotros reflejan el verdadero impacto de nuestra filosofía de colaboración.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12"> -->
      <!-- Testimonial 1 
      <div class="card">
        <div class="flex items-start space-x-4 mb-6">
          <img src="<?php echo get_template_directory_uri(); ?>/images/travellers/colaborador-ukiyo-david-tulamben-bali.jpg
          "
               alt="David Tulamben, emprendedor local en Bali y colaborador de Ukiyo"
               class="w-16 h-16 rounded-full object-cover"
               loading="lazy"
               onerror="this.src='https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg'; this.onerror=null;" />
          <div>
            <h4 class="font-satoshi-bold text-lg text-text-primary">David Tulamben</h4>
            <p class="text-text-secondary text-sm">Emprendedor local</p>
          </div>
        </div>
        <blockquote class="text-text-secondary italic mb-4">
          David es un emprendedor balinés que fundó su propia empresa de transportes. 
          Su conocimiento de la isla y su compromiso con la hospitalidad hacen que los traslados 
          sean mucho más que simples recorridos: son la puerta de entrada a la cultura y calidez de Bali.
        </blockquote>
        <div class="flex items-center text-primary">
          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 
                     1.18 6.88L12 17.77l-6.18 3.25L7 
                     14.14 2 9.27l6.91-1.01L12 2z"/>
          </svg>
          <span class="text-sm font-medium">Colaborador desde 2023</span>
        </div>
      </div> -->

      <!-- Testimonial 2 
      <div class="card">
        <div class="flex items-start space-x-4 mb-6">
          <img src="<?php echo get_template_directory_uri(); ?>/images/travellers/colaborador-ukiyo-alexis-tortuguero-conservacionista.jpg"
               alt="Alexis, biólogo conservacionista en Tortuguero y colaborador de Ukiyo"
               class="w-16 h-16 rounded-full object-cover"
               loading="lazy"
               onerror="this.src='https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg'; this.onerror=null;" />
          <div>
            <h4 class="font-satoshi-bold text-lg text-text-primary">Alexis Tortuguero</h4>
            <p class="text-text-secondary text-sm">Conservacionista y biólogo</p>
          </div>
        </div>
        <blockquote class="text-text-secondary italic mb-4">
          Alexis es biólogo y apasionado de la conservación, dedicado a proteger la biodiversidad de Tortuguero. 
          A través de su trabajo con proyectos locales, comparte con los viajeros la importancia de cuidar los ecosistemas 
          y ofrece experiencias únicas en contacto directo con la naturaleza.
        </blockquote>
        <div class="flex items-center text-primary">
          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 
                     1.18 6.88L12 17.77l-6.18 3.25L7 
                     14.14 2 9.27l6.91-1.01L12 2z"/>
          </svg>
          <span class="text-sm font-medium">Colaborador desde 2022</span>
        </div>
      </div>
    </div>
  </div>
</section> -->

 <!-- Company Timeline -->
<section class="py-20 bg-background font-satoshi">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-display font-satoshi-bold text-text-primary mb-4">
        Nuestro <span class="text-secondary">Viaje de Crecimiento</span>
      </h2>
      <p class="text-lg text-text-secondary max-w-2xl mx-auto">
        Un trayecto que se convirtió en proyecto
      </p>
    </div>

    <div class="max-w-4xl mx-auto">
      <div class="relative">
        <!-- Timeline Line -->
        <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-primary-200"></div>

        <!-- Timeline Items -->
        <div class="space-y-12">
          <!-- 2021 -->
          <div class="relative flex items-center">
            <div class="flex-1 pr-8 text-right">
              <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">2021 - El Despertar</h3>
              <p class="text-text-secondary">
                Tras un periodo de cambios, Sergio conoce a Helena, su alma gemela, quien le transmite su ilusión por viajar y conocer culturas completamente diferentes a la nuestra.
              </p>
            </div>
            <div class="w-4 h-4 bg-primary rounded-full border-4 border-white shadow-soft relative z-10"></div>
            <div class="flex-1 pl-8"></div>
          </div>

          <!-- 2022 -->
          <div class="relative flex items-center">
            <div class="flex-1 pr-8"></div>
            <div class="w-4 h-4 bg-secondary rounded-full border-4 border-white shadow-soft relative z-10"></div>
            <div class="flex-1 pl-8">
              <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">2022 - Conociendo Costa Rica</h3>
              <p class="text-text-secondary">
                Llega su primera aventura juntos, Costa Rica, donde disfrutan de la naturaleza al estilo "Pura Vida".
              </p>
            </div>
          </div>

          <!-- 2023 -->
          <div class="relative flex items-center">
            <div class="flex-1 pr-8 text-right">
              <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">2023 - Abriendo horizontes</h3>
              <p class="text-text-secondary">
                Tras una primera aventura en Latinoamérica, Sergio y Helena preparan un viaje que rompe los moldes de los viajes tradicionales. Se convierte en el viaje que cambia sus vidas: Indonesia. Mientras tanto, Víctor comienza a involucrarse desde la creatividad, documentando y dando forma visual a cada una de sus experiencias a través de Youtube.
              </p>
            </div>
            <div class="w-4 h-4 bg-accent rounded-full border-4 border-white shadow-soft relative z-10"></div>
            <div class="flex-1 pl-8"></div>
          </div>

          <!-- 2024 -->
          <div class="relative flex items-center">
            <div class="flex-1 pr-8"></div>
            <div class="w-4 h-4 bg-success rounded-full border-4 border-white shadow-soft relative z-10"></div>
            <div class="flex-1 pl-8">
              <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">2024 - Primeros viajes organizados</h3>
              <p class="text-text-secondary">
                A través de redes sociales, amigos y conocidos empiezan a interesarse por sus rutas y experiencias. Les piden ayuda para organizar sus propios viajes, y aquí —sin planearlo— comienza a formarse la semilla de un proyecto.
              </p>
            </div>
          </div>

          <!-- 2025 -->
          <div class="relative flex items-center">
            <div class="flex-1 pr-8 text-right">
              <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">2025 - ¡A la aventura!</h3>
              <p class="text-text-secondary">
                Sergio, Helena y Víctor dan el paso definitivo y nace la web de UKIYO. Lo hacen desde la humildad, organizando únicamente viajes que conocen de primera mano, fieles a un principio innegociable: ofrecer experiencias reales, cuidadas y de calidad.
              </p>
            </div>
            <div class="w-4 h-4 bg-primary rounded-full border-4 border-white shadow-soft relative z-10"></div>
            <div class="flex-1 pl-8"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- CTA Section -->
<section class="py-20 bg-background text-text-secondary">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
              <h2 class="text-display font-satoshi mb-6 reveal-on-scroll">
                    ¿Listo para el viaje de tu vida?
                </h2>
              <p class="text-xl mb-8 opacity-90 reveal-on-scroll delay-100">
                    Todo viaje empieza con una conversación.
                  Cuéntanos qué te inspira y crearemos juntos una experiencia que te haga vivir el mundo de otra forma.
                </p>
              <div class="flex flex-col sm:flex-row gap-4 justify-center reveal-on-scroll delay-200">
                  <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" 
                    class="btn-primary text-text-secondary">
                      Hablemos de tu viaje
                  </a>
                  <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" 
                    class="btn-primary text-text-secondary">
                      Lee nuestras Historias
                  </a>
              </div>
          </div>
      </div>
</section>

<?php get_footer(); ?>