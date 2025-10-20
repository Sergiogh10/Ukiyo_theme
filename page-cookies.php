

<?php
/*
 * Template Name: Política de Cookies
 * Description: Página de cookies con estilo UKIYO, índice sticky y tarjeta glass.
 */

get_header();
?>

<main id="primary" class="relative">
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
        Cookies
      </span>
      <h1 class="text-hero font-satoshi-bold text-text-primary mb-6">
        Política de <span class="text-primary">cookies</span>
      </h1>
    </div>
  </div>
</section>

  <!-- Índice + Contenido en dos columnas -->
  <section class="bg-surface">
    <div class="container mx-auto px-6 md:px-8 py-10 md:py-14 lg:grid lg:grid-cols-12 lg:gap-10">

      <!-- Índice lateral fijo -->
      <aside class="lg:col-span-4 mb-8 lg:mb-0">
        <nav aria-label="Índice" class="sticky top-24 rounded-xl ring-1 ring-border/60 bg-white/70 backdrop-blur-md p-4 md:p-5 shadow-sm">
          <p class="text-sm font-medium text-text-tertiary mb-2">Contenido</p>
          <ul class="space-y-1 text-sm">
            <li><a class="hover:underline" href="#que-son">1. ¿Qué son las cookies?</a></li>
            <li><a class="hover:underline" href="#responsable">2. Responsable</a></li>
            <li><a class="hover:underline" href="#tipos">3. Tipos de cookies</a></li>
            <li><a class="hover:underline" href="#finalidades">4. Finalidades y base legal</a></li>
            <li><a class="hover:underline" href="#gestor">5. Gestor de consentimiento</a></li>
            <li><a class="hover:underline" href="#configuracion">6. Cómo configurar o desactivar</a></li>
            <li><a class="hover:underline" href="#terceros">7. Cookies de terceros</a></li>
            <li><a class="hover:underline" href="#retencion">8. Periodo de conservación</a></li>
            <li><a class="hover:underline" href="#tabla">9. Tabla de cookies</a></li>
            <li><a class="hover:underline" href="#cambios">10. Cambios en la política</a></li>
            <li><a class="hover:underline" href="#contacto">11. Contacto</a></li>
          </ul>
        </nav>
      </aside>

      <!-- Contenido -->
      <div class="lg:col-span-8">
        <div class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md shadow-sm p-6 md:p-8">
          <div class="prose max-w-none prose-headings:text-text-primary prose-p:text-text-secondary prose-li:text-text-secondary leading-relaxed">

            <h2 id="que-son" class="scroll-mt-28">1. ¿Qué son las cookies?</h2>
            <p>Las cookies son pequeños archivos de datos que se almacenan en tu dispositivo cuando visitas un sitio web. Permiten que el sitio recuerde tus acciones y preferencias durante un tiempo y pueden servir para fines técnicos, analíticos o de personalización.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="responsable" class="scroll-mt-28">2. Responsable</h2>
            <p><strong><?php echo esc_html( get_bloginfo('name') ); ?></strong> ("UKIYO").</p>
            <ul>
              <li><strong>Email:</strong> <a href="mailto:<?php echo antispambot( get_option('admin_email') ); ?>"><?php echo antispambot( get_option('admin_email') ); ?></a></li>
              <li><strong>Dirección:</strong> <em>Indica aquí tu dirección fiscal</em></li>
            </ul>

            <hr class="my-8 border-border/50" />

            <h2 id="tipos" class="scroll-mt-28">3. Tipos de cookies</h2>
            <ul>
              <li><strong>Técnicas o necesarias:</strong> imprescindibles para el funcionamiento del sitio (iniciar sesión, seguridad, carga de contenido). <em>No requieren consentimiento.</em></li>
              <li><strong>Preferencias o personalización:</strong> recuerdan tus opciones (idioma, región).</li>
              <li><strong>Analíticas o de medición:</strong> nos ayudan a entender cómo se usa el sitio (páginas visitadas, tiempo de visita) de forma agregada.</li>
              <li><strong>Publicitarias/remarketing:</strong> muestran anuncios relevantes basados en tu navegación (solo si lo aceptas).</li>
            </ul>

            <hr class="my-8 border-border/50" />

            <h2 id="finalidades" class="scroll-mt-28">4. Finalidades y base legal</h2>
            <ul>
              <li><strong>Operar el sitio y prestar el servicio</strong> (base legal: interés legítimo / necesidad técnica).</li>
              <li><strong>Medición y analítica</strong> (base legal: consentimiento).</li>
              <li><strong>Personalización de la experiencia</strong> (base legal: consentimiento).</li>
              <li><strong>Publicidad comportamental</strong> (base legal: consentimiento).</li>
            </ul>

            <hr class="my-8 border-border/50" />

            <h2 id="gestor" class="scroll-mt-28">5. Gestor de consentimiento</h2>
            <p>Al acceder al sitio verás un banner que te permite <strong>aceptar, rechazar o configurar</strong> las cookies no esenciales. Puedes modificar tu elección en cualquier momento desde el enlace <em>“Configurar cookies”</em> situado en el pie de página.</p>
            <p>Hasta que no otorgues consentimiento, no cargaremos cookies analíticas ni publicitarias.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="configuracion" class="scroll-mt-28">6. Cómo configurar o desactivar las cookies</h2>
            <p>Puedes:</p>
            <ul>
              <li>Usar nuestro <strong>gestor de consentimiento</strong> (banner o enlace del pie).</li>
              <li>Configurar tu navegador para bloquear o eliminar cookies. Ten en cuenta que algunas funciones podrían no estar disponibles si bloqueas las necesarias.</li>
            </ul>
            <details class="mt-3">
              <summary class="cursor-pointer text-sm text-text-secondary">Guías rápidas por navegador</summary>
              <ul class="text-sm">
                <li>Chrome (ordenador y móvil) → Preferencias &gt; Privacidad y seguridad &gt; Cookies.</li>
                <li>Safari (macOS/iOS) → Preferencias &gt; Privacidad &gt; Bloquear todas las cookies / Gestionar datos.</li>
                <li>Firefox → Preferencias &gt; Privacidad &amp; Seguridad &gt; Cookies y datos del sitio.</li>
                <li>Edge → Configuración &gt; Cookies y permisos de sitio.</li>
              </ul>
            </details>

            <hr class="my-8 border-border/50" />

            <h2 id="terceros" class="scroll-mt-28">7. Cookies de terceros</h2>
            <p>Algunas cookies pueden establecerse por terceros (por ejemplo, herramientas de analítica, mapas o reproductores embebidos). Estos terceros son responsables de sus propias políticas de privacidad/cookies.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="retencion" class="scroll-mt-28">8. Periodo de conservación</h2>
            <p>Las cookies de sesión se eliminan al cerrar el navegador. Las persistentes permanecen durante un periodo definido que no excederá lo necesario para su finalidad (consulta la tabla siguiente).</p>

            <hr class="my-8 border-border/50" />

            <h2 id="tabla" class="scroll-mt-28">9. Tabla de cookies utilizadas</h2>
            <p class="text-sm">Esta tabla es orientativa; actualízala según tu implementación real.</p>
            <div class="overflow-x-auto ring-1 ring-border/50 rounded-lg mt-3">
              <table class="min-w-full text-sm">
                <thead class="bg-surface/60">
                  <tr>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Proveedor</th>
                    <th class="px-4 py-2 text-left">Finalidad</th>
                    <th class="px-4 py-2 text-left">Tipo</th>
                    <th class="px-4 py-2 text-left">Duración</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-border/40">
                  <tr>
                    <td class="px-4 py-2">ukiyo_consent</td>
                    <td class="px-4 py-2">UKIYO</td>
                    <td class="px-4 py-2">Almacena tus preferencias de consentimiento de cookies.</td>
                    <td class="px-4 py-2">Técnica</td>
                    <td class="px-4 py-2">6 meses</td>
                  </tr>
                  <tr>
                    <td class="px-4 py-2">_ga</td>
                    <td class="px-4 py-2">Google</td>
                    <td class="px-4 py-2">Métricas anónimas de uso del sitio.</td>
                    <td class="px-4 py-2">Analítica</td>
                    <td class="px-4 py-2">2 años</td>
                  </tr>
                  <tr>
                    <td class="px-4 py-2">_gid</td>
                    <td class="px-4 py-2">Google</td>
                    <td class="px-4 py-2">Distinguir usuarios.</td>
                    <td class="px-4 py-2">Analítica</td>
                    <td class="px-4 py-2">24 horas</td>
                  </tr>
                  <tr>
                    <td class="px-4 py-2">_gat</td>
                    <td class="px-4 py-2">Google</td>
                    <td class="px-4 py-2">Limitar solicitudes.</td>
                    <td class="px-4 py-2">Analítica</td>
                    <td class="px-4 py-2">1 minuto</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <p class="mt-3 text-xs text-text-tertiary">Si cambias de herramienta de analítica o añades integraciones (mapas, vídeo, chat), recuerda actualizar esta tabla.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="cambios" class="scroll-mt-28">10. Cambios en la política</h2>
            <p>Podemos actualizar esta política para reflejar cambios legales, técnicos o de servicio. Publicaremos la versión vigente en esta página.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="contacto" class="scroll-mt-28">11. Contacto</h2>
            <p>Para cualquier duda, escríbenos a <a href="mailto:<?php echo antispambot( get_option('admin_email') ); ?>"><?php echo antispambot( get_option('admin_email') ); ?></a>.</p>

          </div>
        </div>

        <!-- Enlace volver arriba -->
        <div class="mt-8 flex justify-end">
          <a href="#primary" class="text-sm underline underline-offset-4 text-text-secondary hover:text-text-primary">Volver arriba ↑</a>
        </div>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>