<?php
/**
 * Template Name: Sobre Nosotros
 */
get_header();
?>

<!-- Hero Section -->
<section class="relative pt-24 pb-20 overflow-hidden font-satoshi bg-surface">
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
        浮世 - El Mundo Flotante
      </span>
      <h1 class="text-hero font-satoshi-bold text-text-primary mb-6">
        Creando <span class="text-primary">viajes con alma</span>
      </h1>
      <p class="text-xl font-satoshi text-text-secondary max-w-3xl mx-auto leading-relaxed">
        Inspirados en el “mundo flotante” de la cultura japonesa, creamos experiencias que celebran el momento presente y la belleza de lo efímero. UKIYO nace de una forma distinta de entender los viajes: sin prisa, sin poses y sin guiones.
Creemos que la verdadera belleza está en lo simple, en lo que sucede cuando conectas de verdad con un lugar.

Por eso creamos experiencias honestas, sostenibles y llenas de vida.
      </p>
    </div>
  </div>
</section>

<!-- Founder Story -->
<section class="py-20 bg-white font-satoshi">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-16">
        <h2 class="text-display font-satoshi-bold text-text-primary mb-4">
          De un viaje <span class="text-accent">nació una idea</span>
        </h2>
        <p class="text-lg font-satoshi text-text-secondary max-w-2xl mx-auto">
Todo empezó con una experiencia que nos hizo mirar los viajes de otra manera.
Descubrimos que lo importante no era el destino, sino lo que sucedía en el camino: las conversaciones, los silencios, las miradas.

Así nació UKIYO: para viajar distinto, para viajar de verdad.        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
        <!-- Founder -->
        <div class="lg:col-span-1">
          <div class="aspect-[3/4] rounded-lg overflow-hidden mb-6">
            <img src="<?php echo get_template_directory_uri(); ?>/images/travellers/agencia-de-viajes-personalizados-ukiyo-sergio-garcia.jpg"
                 alt="Sergio García, fundador de Ukiyo, agencia de viajes personalizados"
                 class="w-full h-full object-cover"
                 loading="lazy"
                 onerror="this.src='https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg'; this.onerror=null;" />
          </div>
          <div class="text-center">
            <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">Sergio García-Heras García</h3>
            <p class="text-text-secondary">Fundador y CEO</p>
          </div>
        </div>

        <!-- Story -->
        <div class="lg:col-span-2">
          <div class="prose prose-lg max-w-none">
            <blockquote class="text-xl font-satoshi text-text-primary mb-8 border-l-4 border-primary pl-6 italic">
              "Decidí aventurarme en UKIYO cuando descubrí que organizar un viaje no es nada fácil si quieres vivirlo de una manera diferente y alejado del turismo masivo. Quiero que la gente disfrute de experiencias personalizadas sin gastar su tiempo libre. Quiero que simplemente lleguen, descubran y vivan cada instante."
            </blockquote>
            <div class="space-y-6 text-text-secondary">
              <p>Sergio nació en Madrid y desde joven ha sentido pasión por viajar y explorar culturas distintas. A lo largo de los años, ha combinado su espíritu aventurero con un enfoque analítico y práctico...</p>
              <p>Tras descubrir lo complicado que puede ser organizar viajes verdaderamente personalizados y enriquecedores, decidió fundar UKIYO...</p>
              <p>UKIYO nace como puente entre cultura, tradición y lugares mágicos...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Team -->
<section class="py-20 bg-surface font-satoshi">
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

      <!-- Daniel -->
      <div class="card text-center group hover:shadow-card-hover">
        <div class="aspect-square rounded-full overflow-hidden mx-auto mb-6 w-32 h-32">
          <img src="<?php echo get_template_directory_uri(); ?>/images/travellers/agencia-de-viajes-personalizados-ukiyo-sergio-garcia-equipo.jpg"
               alt="Sergio García, mochilero y miembro del equipo Ukiyo"
               class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
        </div>
        <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">Sergio Garcia</h3>
        <p class="text-primary font-medium mb-3">Mochilero ante todo</p>
        <p class="text-text-secondary text-sm mb-4">
          Antes de cualquier puesto, soy amante de descubrir rincones y un gran disfrutón de cada viaje. "El mundo es demasiado bonito como para querer recorrerlo entero"
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-white font-satoshi">
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
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
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
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
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
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
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
          <svg class="w-8 h-8 text-success" viewBox="0 0 32 32" fill="currentColor">
            <path d="M30.039 2.719c-0.143-0.544-0.631-0.939-1.211-0.939-0.395 0-0.748 0.184-0.977 0.47..."/>
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

<!-- Partnership Philosophy -->
<section class="py-20 bg-gradient-secondary text-white font-satoshi">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-display font-satoshi-bold mb-6">
        Nuestra forma de <span class="text-accent-200">colaborar</span>
      </h2>
      <p class="text-xl mb-12 opacity-90 leading-relaxed">
En UKIYO no “tomamos” experiencias de las comunidades, las creamos juntos.
Cada colaboración nace desde el respeto y la confianza, con el propósito de que el viaje aporte tanto al viajero como a quienes lo hacen posible.      </p>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Partnership Principle 1 -->
        <div class="text-center">
          <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-accent-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3v1H7l5 5 5-5h-2v-1c0-1.657-1.343-3-3-3z" />
            </svg>
          </div>
          <h3 class="text-xl font-satoshi-bold mb-3">Beneficio Mutuo</h3>
          <p class="opacity-90">
Cada experiencia genera un impacto real: valor económico directo para las comunidades locales y vivencias auténticas para nuestros viajeros.          </p>
        </div>

        <!-- Partnership Principle 2 -->
        <div class="text-center">
          <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-accent-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.6-4A12 12 0 0112 2 12 12 0 013 9c0 5.6 3.8 10.3 9 11.6 5.2-1.3 9-6 9-11.6 0-1-.1-2-.4-3z" />
            </svg>
          </div>
          <h3 class="text-xl font-satoshi-bold mb-3">Respeto Cultural</h3>
          <p class="opacity-90">
Las tradiciones se comparten, no se exhiben.
Participamos desde la escucha y el reconocimiento, honrando siempre el origen de cada historia.          </p>
        </div>

        <!-- Partnership Principle 3 -->
        <div class="text-center">
          <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-accent-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
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
</section>

<!-- Partner Testimonials -->
<section class="py-20 bg-surface font-satoshi">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-display font-satoshi-bold text-text-primary mb-4">
        Nuestros <span class="text-accent">Colaboradores</span>
      </h2>
      <p class="text-lg text-text-secondary max-w-2xl mx-auto">
        Las palabras de quienes trabajan con nosotros reflejan el verdadero impacto de nuestra filosofía de colaboración.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <!-- Testimonial 1 -->
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
      </div>

      <!-- Testimonial 2 -->
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
</section>

 <!-- Company Timeline -->
<section class="py-20 bg-white font-satoshi">
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
                Tras una primera aventura en Latinoamérica, Sergio y Helena preparan un viaje que rompe los moldes de los viajes tradicionales. Se convierte en el viaje que cambia sus vidas: Indonesia.
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
                Tras vivir sus viajes desde RRSS, los primeros amigos nos preguntan sobre la posibilidad de organizar sus viajes.
              </p>
            </div>
          </div>

          <!-- 2025 -->
          <div class="relative flex items-center">
            <div class="flex-1 pr-8 text-right">
              <h3 class="text-xl font-satoshi-bold text-text-primary mb-2">2025 - ¡A la aventura!</h3>
              <p class="text-text-secondary">
                Decidimos abrir nuestra web. Desde una perspectiva humilde, y organizando sólo viajes en los que hayamos estado. Nuestra misión: asegurar una buena experiencia y calidad.
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

<!-- Call to Action -->
<section class="py-20 bg-gradient-primary text-white font-satoshi">
  <div class="container mx-auto px-6 text-center">
    <div class="max-w-3xl mx-auto">
      <h2 class="text-display font-satoshi-bold mb-6">
        Únete al Mundo Flotante
      </h2>
      <p class="text-xl mb-8 opacity-90">
Todo viaje empieza con una conversación.
Cuéntanos qué te inspira y crearemos juntos una experiencia que te haga vivir el mundo de otra forma.      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" 
           class="bg-white text-primary px-8 py-4 rounded-lg font-satoshi-bold hover:bg-accent-50 transition-all duration-300 shadow-soft">
Hablemos de tu idea        </a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" 
           class="border-2 border-white text-white px-8 py-4 rounded-lg font-satoshi-bold hover:bg-white hover:text-primary transition-all duration-300">
          Lee Nuestras Historias
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>