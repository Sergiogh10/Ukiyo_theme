<?php
/*
 * Single template for viaje_autor post ID 58
 * Description: Ficha de viaje de autor (Luis – Pantanal).
 */
get_header();
$uri = get_template_directory_uri();
?>

  <!-- HERO -->
<section class="relative">
    <div class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/viaje-de-autor-al-pantanal-con-guia-experto-jaguar-hero.jpg"
             alt="Jaguar en el Pantanal durante un viaje de autor con guía experto (Luis)"
             class="w-full h-full object-cover object-bottom mask-image" 
             loading="lazy"
             onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'; this.onerror=null;" />
        <!-- Content Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-12">
            <div class="container mx-auto max-w-4xl">
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">8 días</span>
                    <span class="bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">Grupos reducidos</span>
                    <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-medium">Plazas limitadas</span>
                </div>
                <h1 class="text-4xl font-rowdies mb-4">
                    Pantanal: <span>tras el rastro del jaguar</span>
                </h1>
                <p class="text-xl max-w-3xl">
                Recorreremos con Luis, fotógrafo y guía profesional, los humedales infinitos de Brasil, disfrutando de amaneceres en bote, con la paciencia que requiere el instante.</p>
                <div class="inline-flex items-baseline rounded-lg bg-white/80 backdrop-blur-md ring-1 ring-border/60 py-2">
                  <span class="text-sm mr-2">Desde</span>
                  <span class="text-2xl font-semibold">3400€</span>
                  <span class="text-xs ml-2">/persona</span>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- NARRATIVA / HIGHLIGHTS -->
<section class="py-16 bg-gradient-warm">
  <div class="container mx-auto px-6">
    <header class="text-center max-w-3xl mx-auto mb-12">
      <h2 class="text-4xl font-satoshi text-text-primary tracking-tight">
        Una aventura <span class="text-secondary">única</span>
      </h2>
      <p class="mt-4 text-lg text-text-secondary leading-relaxed">
        Viajar con Luis no es hacer un safari más: es aprender a mirar.
Cada día tiene un propósito —no una lista de lugares—, y cada salida está pensada para aumentar tus posibilidades de ver al jaguar en su entorno natural, sin forzarlo.
Conocerás a las personas que hacen posible la conservación de la zona.
      </p>
    </header>

    <ul role="list" class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-primary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Amanecer en los humedales</h3>
        <p class="text-text-secondary">Cuando la niebla cubre el agua y los monos despiertan, empieza la jornada. Salidas en bote con primeras luces, cámaras listas y silencio absoluto.</p>
      </li>
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-secondary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Rastros y paciencia</h3>
        <p class="text-text-secondary">Luis te enseñará cómo interpretar señales, huellas y sonidos. Aquí no se trata de suerte, sino de aprender a entender el ritmo del Pantanal.</p>
      </li>
      <li class="text-center bg-white/60 backdrop-blur-sm rounded-2xl p-8 ring-1 ring-border/60">
        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-accent/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
        <h3 class="text-xl font-satoshi text-text-primary mb-2">Conversaciones al final del día</h3>
        <p class="text-text-secondary">De vuelta al lodge, las charlas giran en torno a lo vivido, la fotografía y las historias del lugar. Sin prisas, sin grupos grandes, solo lo esencial.</p>
      </li>
    </ul>
  </div>
</section>

<section class="py-20 bg-white">
    <!-- Contenido -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-30 container mx-auto px-6 md:px-8 py-10 md:py-14 max-w-8xl">
    <div class="flex flex-col items-start">
      <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/viaje-de-autor-al-pantanal-con-guia-experto-luis-acuna.jpg"
           alt="Luis Acuña, guía experto en naturaleza y fotografía del Pantanal"
           class="w-40 h-40 md:w-56 md:h-56 rounded-full object-cover ring-1 ring-border/60 bg-white/80" />
      <h2 class="mt-4 text-xl font-semibold text-text-primary">Luis Acuña</h2>
      <p class="mt-1 text-sm text-text-secondary max-w-xs">Guía costarricense y fotógrafo profesional. Conoce los diferentes sonidos de la selva y localiza a los animales más escurridizos.</p>
    </div>
    <div class="text-text-secondary text-[15px] space-y-4">
      <p>“Soy Luis, un guía turístico y fotógrafo de vida silvestre con experiencia. Estoy decidido a hacer un impacto positivo en las personas y el planeta.</p>
      <p>Imagino cada tour de vida silvestre como una semilla, plantada en el corazón de cada viajero que pone un pie en el paraíso biodiverso de Costa Rica. Es por eso que visualizo un legado que trasciende fronteras y generaciones; pronto entenderás.</p>
      <p>A medida que los viajeros se unen a mí en un viaje por las impresionantes regiones de Corcovado y Osa, les ayudo a ver que no son meros observadores, son participantes en una gran danza interconectada de la vida. Disfruto mostrando a las personas animales en su hábitat y su comportamiento en diferentes situaciones. Cada fotografía que mis clientes toman es un testimonio de la belleza que prospera en estas tierras, una belleza que exige ser preservada.</p>
    </div>
    <div class="text-text-secondary text-[15px] space-y-4">
      <p>Cuando cae la noche, la sinfonía de la naturaleza continúa — sí, ChatGPT me ayudó con esa frase —. Pero es cierto, resuena conmigo porque mis tours nocturnos se centran en observar reptiles y anfibios, estos fascinantes seres ofrecen un vistazo a un mundo a menudo pasado por alto. Por la noche hay más historias esperando ser descubiertas y contadas a tus seres queridos.</p>
      <p>Cuando los viajeros regresan a sus países, llevan consigo más que recuerdos y fotografías. Llevan un respeto y amor renovados o nuevos — depende — por la naturaleza, una chispa encendida por sus experiencias. La verdad es que más a menudo de lo que piensas, las personas me dicen que quieren volver a visitar Costa Rica. Es esta chispa la que espero que encienda una llama, inspirándolos a ellos y a quienes los rodean a unirse en el esfuerzo por proteger y preservar a la Madre Naturaleza.</p>
      <p>En esencia, mi misión no es solo guiar, sino iluminar, inspirar e inculcar un sentido de responsabilidad hacia nuestro planeta. Un tour a la vez, estoy sembrando semillas de cambio, cultivando un jardín global de defensores de la naturaleza. Este es mi legado, mi contribución a un futuro donde la armonía entre humanos y naturaleza no es solo un sueño, sino una realidad”.</p>
    </div>
  </div>
</section>

  <!-- INCLUYE / NO INCLUYE -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <header class="text-center max-w-2xl mx-auto mb-24">
        <h2 class="text-4xl font-satoshi text-text-primary tracking-tight">Nuestras <span class="text-primary">aventuras</span></h2>
      </header>
      <br>
    </div>
    <div class="container mx-auto px-6 md:px-8 py-12 md:py-16">
      <div class="grid gap-8 md:grid-cols-2">
        <article class="group relative rounded-2xl overflow-hidden border-2 border-secondary bg-white shadow-sm hover:shadow-lg transition flex flex-col">
          <div class="text-center p-8">
            <div class="w-20 h-20 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-5">
              <svg class="w-10 h-10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#4CAF50">
                <path d="M7.29417 12.9577L10.5048 16.1681L17.6729 9" stroke="#4CAF50" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <circle cx="12" cy="12" r="10" stroke="#4CAF50" stroke-width="2"></circle>
              </svg>            
            </div>
            <h3 class="text-2xl font-satoshi text-text-primary mb-1">La aventura incluye</h3>
          </div>

          <div class="px-8">
            <ul class="space-y-2 text-center mb-4">
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Guía/autor (Luis) durante todo el viaje</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Navegaciones y permisos locales</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Alojamiento seleccionado</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">7 noches en régimen pensión completa</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Safari en 4x4 o bote</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Almuerzo y cena del primer día</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Seguro de viaje</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-success mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Asesoría fotográfica en campo</span></li>
            </ul>
          </div>
        </article>
        <article
          class="group relative rounded-2xl overflow-hidden border-2 bg-white shadow-sm hover:shadow-lg transition flex flex-col"
          style="border-color: #8B1E3F;">          <div class="text-center p-8">
            <div class="w-20 h-20 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-5">
             <svg class="w-10 h-10" fill="#8B1E3F" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 16q0 3.264 1.28 6.208t3.392 5.12 5.12 3.424 6.208 1.248 6.208-1.248 5.12-3.424 3.392-5.12 1.28-6.208-1.28-6.208-3.392-5.12-5.088-3.392-6.24-1.28q-3.264 0-6.208 1.28t-5.12 3.392-3.392 5.12-1.28 6.208zM4 16q0-3.264 1.6-6.016t4.384-4.352 6.016-1.632 6.016 1.632 4.384 4.352 1.6 6.016-1.6 6.048-4.384 4.352-6.016 1.6-6.016-1.6-4.384-4.352-1.6-6.048zM9.76 20.256q0 0.832 0.576 1.408t1.44 0.608 1.408-0.608l2.816-2.816 2.816 2.816q0.576 0.608 1.408 0.608t1.44-0.608 0.576-1.408-0.576-1.408l-2.848-2.848 2.848-2.816q0.576-0.576 0.576-1.408t-0.576-1.408-1.44-0.608-1.408 0.608l-2.816 2.816-2.816-2.816q-0.576-0.608-1.408-0.608t-1.44 0.608-0.576 1.408 0.576 1.408l2.848 2.816-2.848 2.848q-0.576 0.576-0.576 1.408z"></path>
             </svg>            
            </div>
              <h3 class="text-2xl font-satoshi text-text-primary mb-1">
                La aventura <span class="font-bold" style="color: #8B1E3F;">NO</span> incluye
              </h3>          
            </div>
          <div class="px-8">
            <ul class="space-y-2 text-center mb-4">
              <li class="flex justify-center"><svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Vuelos internacionales</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Seguro de viaje</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Comidas no especificadas</span></li>
              <li class="flex justify-center"><svg class="w-5 h-5 text-error mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm2.828-10.828a1 1 0 00-1.414-1.414L10 8.586 8.586 7.172a1 1 0 00-1.414 1.414L8.586 10l-1.414 1.414a1 1 0 001.414 1.414L10 11.414l1.414 1.414a1 1 0 001.414-1.414L11.414 10l1.414-1.414z" clip-rule="evenodd"/></svg><span class="text-text-secondary">Gastos personales</span></li>
            </ul>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- GALERÍA SIMPLE -->
  <section class="py-20 bg-surface">
    <div class="container mx-auto px-6 md:px-8 pb-12 md:pb-16">
      <div class="grid gap-4 md:grid-cols-3">
        <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/viaje-de-autor-al-pantanal-con-guia-experto-luis-acuna-campo.jpg" alt="Luis Acuña durante el viaje de autor al Pantanal" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/viaje-de-autor-al-pantanal-con-guia-experto-rio-amanecer.jpg" alt="Amanecer en el río durante un viaje de autor al Pantanal con Ukiyo" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
        <img src="<?php echo get_template_directory_uri(); ?>/images/autores/luis/viaje-de-autor-al-pantanal-con-guia-experto-fauna-aves.jpg" alt="Aves del Pantanal en un viaje de autor con guía experto" class="rounded-xl ring-1 ring-border/50 object-cover w-full h-64" loading="lazy">
      </div>
    </div>
  </section>

 <!-- FAQ -->
 <!--<section class="py-20 bg-gradient-secondary text-white font-satoshi">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-display font-satoshi-bold mb-6">Preguntas frecuentes</h2>

      <div data-accordion class="space-y-3"> -->

        <!-- Item 1 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn
                  class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-1" id="faq-1-h">
            <span class="font-medium text-text-primary">¿Cómo me apunto a la expedición?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
            </svg>
          </button>
          <div id="faq-1" role="region" aria-labelledby="faq-1-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            Haz clic en “Reservar ahora” o “Consultar precio” y completa el formulario.
            Confirmamos disponibilidad por email (o llamada si lo prefieres). La plaza
            queda bloqueada al realizar el depósito de reserva.
          </div>
        </div> -->

        <!-- Item 2 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-2" id="faq-2-h">
            <span class="font-medium text-text-primary">¿Cuándo y cómo tengo que pagar?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-2" role="region" aria-labelledby="faq-2-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            Depósito para confirmar plaza y resto antes de la salida (fecha en la confirmación).
            Aceptamos transferencia y tarjeta. Recibirás factura y justificante.
          </div>
        </div> -->

        <!-- Item 3 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-3" id="faq-3-h">
            <span class="font-medium text-text-primary">¿Cómo hago para llegar al punto de inicio de la expedición?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary"
                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-3" role="region" aria-labelledby="faq-3-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            Tras reservar, enviamos dossier con aeropuerto recomendado, horarios y opciones de traslado.
            Podemos coordinar tu llegada o darte instrucciones para el punto de encuentro.
          </div>
        </div> -->

        <!-- Repite los demás con el mismo patrón -->
        <!-- 4 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-4" id="faq-4-h">
            <span class="font-medium text-text-primary">¿Una vez llegue al destino qué debo hacer?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-4" role="region" aria-labelledby="faq-4-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            En la confirmación tienes el contacto del coordinador. A la llegada, dirígete al punto acordado.
            Hacemos briefing de bienvenida: seguridad, plan del día y recomendaciones de equipo.
          </div>
        </div> -->

        <!-- 5 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-5" id="faq-5-h">
            <span class="font-medium text-text-primary">No puedo llegar el día exacto del inicio de la expedición. ¿Puedo ir igualmente?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-5" role="region" aria-labelledby="faq-5-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            Si la operativa lo permite, puedes incorporarte más tarde. Coordinamos traslado (puede tener coste).
            Los servicios no disfrutados del inicio no son reembolsables.
          </div>
        </div> -->

        <!-- 6 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-6" id="faq-6-h">
            <span class="font-medium text-text-primary">Información sobre Habitaciones y Dormitorios en Nuestras Expediciones</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-6" role="region" aria-labelledby="faq-6-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            Lodges pequeños y seleccionados. Por defecto, habitación doble/twin compartida.
            Individual disponible con suplemento y según disponibilidad. En zonas remotas puede haber baños compartidos.
          </div>
        </div> -->

        <!-- 7 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-7" id="faq-7-h">
            <span class="font-medium text-text-primary">Si he pagado y finalmente no puedo ir… ¿hacéis devoluciones?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-7" role="region" aria-labelledby="faq-7-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            Política de cancelación clara: el depósito puede no ser reembolsable; el resto depende de la antelación.
            Te enviaremos condiciones exactas. Recomendamos seguro con cobertura de cancelación.
          </div>
        </div> -->

        <!-- 8 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-8" id="faq-8-h">
            <span class="font-medium text-text-primary">¿Hay algún límite de edad?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-8" role="region" aria-labelledby="faq-8-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            Recomendado a partir de 12 años (menores con adulto). Para mayores de 70,
            aconsejamos certificado médico y comentar necesidades específicas.
          </div>
        </div> -->

        <!-- 9 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-9" id="faq-9-h">
            <span class="font-medium text-text-primary">Tengo una discapacidad ¿Puedo acudir?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-9" role="region" aria-labelledby="faq-9-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            Depende del itinerario. Hay navegación y pasarelas en naturaleza. Escríbenos para evaluar
            adaptaciones razonables; algunas zonas pueden no ser accesibles.
          </div>
        </div> -->

        <!-- 10 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-10" id="faq-10-h">
            <span class="font-medium text-text-primary">¿Alguna actividad requiere experiencia previa?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-10" role="region" aria-labelledby="faq-10-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            No. Caminatas sencillas y navegación. Talleres de fotografía para todos los niveles.
            Si alguna actividad exige técnica, lo indicamos con antelación.
          </div>
        </div> -->

        <!-- 11 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-11" id="faq-11-h">
            <span class="font-medium text-text-primary">¿Las expediciones incluyen seguro de viaje?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-11" role="region" aria-labelledby="faq-11-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            Por defecto, no está incluido salvo que se indique en la ficha. Podemos gestionarlo
            con coberturas adecuadas para la actividad.
          </div>
        </div> -->

        <!-- 12 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-12" id="faq-12-h">
            <span class="font-medium text-text-primary">¿Qué coberturas y condiciones tiene el seguro incluido?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-12" role="region" aria-labelledby="faq-12-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            Depende de la póliza: asistencia médica, repatriación, equipaje, RC y, opcionalmente,
            cancelación por causas justificadas. Enviamos la póliza con límites y exclusiones.
          </div>
        </div> -->

        <!-- 13 
        <div data-accordion-item class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md">
          <button data-accordion-btn class="w-full flex items-center justify-between text-left px-5 py-4"
                  aria-expanded="false" aria-controls="faq-13" id="faq-13-h">
            <span class="font-medium text-text-primary">¿Recomiendan contratar algún seguro de viaje y pertenencias?</span>
            <svg class="w-5 h-5 flex-shrink-0 transition-transform duration-200 text-text-secondary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="faq-13" role="region" aria-labelledby="faq-13-h"
               data-accordion-panel class="hidden px-5 pb-5 text-sm text-text-primary">
            Sí. Recomendamos seguro con asistencia médica, equipaje y opción de cancelación.
            Si quieres, lo gestionamos y te ayudamos a elegir la mejor cobertura para tus fechas y equipo.
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- CTA Section -->
<section class="py-20 bg-gradient-warm">
    <div class="container mx-auto px-6 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-display font-crimson mb-6">
                No sólo es una búsqueda del jaguar, es una experiencia apasionante
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Con UKIYO y Luis, cada amanecer, cada reflejo en el río y cada silencio compartido 
                se transforma en una experiencia única de observación, paciencia y conexión con la vida salvaje.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" 
                   class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 transition-all duration-300 shadow-soft">
                    Descubre el pantanal con Luis
                </a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" 
                   class="bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent-50 transition-all duration-300 shadow-soft">
                    Ver más viajes de autor
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
document.addEventListener('click', (e) => {
  const btn = e.target.closest('[data-accordion-btn]');
  if (!btn) return;
  const item = btn.closest('[data-accordion-item]');
  const panel = item.querySelector('[data-accordion-panel]');
  const group = item.parentElement;

  // Cerrar los que estén abiertos (acordeón exclusivo)
  group.querySelectorAll('[data-accordion-btn][aria-expanded="true"]').forEach(b => {
    if (b !== btn) {
      b.setAttribute('aria-expanded', 'false');
      const p = b.closest('[data-accordion-item]').querySelector('[data-accordion-panel]');
      p.classList.add('hidden');
      b.querySelector('svg')?.classList.remove('rotate-180');
    }
  });

  // Toggle actual
  const open = btn.getAttribute('aria-expanded') === 'true';
  btn.setAttribute('aria-expanded', String(!open));
  panel.classList.toggle('hidden', open);
  btn.querySelector('svg')?.classList.toggle('rotate-180', !open);
});
</script>