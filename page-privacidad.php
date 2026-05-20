

<?php
/*
 * Template Name: Política de Privacidad
 * Description: Página de política de privacidad con estilo UKIYO.
 */

get_header();
?>

<main id="primary" class="relative">
<!-- Hero Section -->
<section class="relative pt-24 pb-20 overflow-hidden font-satoshi bg-background">
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
      <span class="inline-block px-4 py-2 btn-primary text-text-secondary rounded-full text-sm font-satoshi font-medium mb-6">
        Privacidad
      </span>
      <h1 class="text-hero font-rowdies text-text-primary mb-6">
        Política de <span class="text-primary">privacidad</span>
      </h1>
    </div>
  </div>
</section>
  <!-- Índice + Contenido en diseño de dos columnas -->
  <section class="bg-background">
    <div class="container mx-auto px-6 md:px-8 py-10 md:py-14 lg:grid lg:grid-cols-12 lg:gap-10">

      <!-- Índice lateral fijo -->
      <aside class="lg:col-span-4 mb-8 lg:mb-0">
        <nav aria-label="Índice" class="sticky top-24 rounded-xl ring-1 ring-border/60 bg-white/70 backdrop-blur-md p-4 md:p-5 shadow-sm">
          <p class="text-sm font-medium text-text-tertiary mb-2">Contenido</p>
          <ul class="space-y-1 text-sm">
            <li><a class="hover:underline" href="#responsable">1. Responsable</a></li>
            <li><a class="hover:underline" href="#datos">2. Datos que recopilamos</a></li>
            <li><a class="hover:underline" href="#finalidades">3. Finalidades y base legal</a></li>
            <li><a class="hover:underline" href="#conservacion">4. Plazos de conservación</a></li>
            <li><a class="hover:underline" href="#destinatarios">5. Destinatarios</a></li>
            <li><a class="hover:underline" href="#transferencias">6. Transferencias internacionales</a></li>
            <li><a class="hover:underline" href="#derechos">7. Derechos de las personas</a></li>
            <li><a class="hover:underline" href="#cookies">8. Cookies</a></li>
            <li><a class="hover:underline" href="#seguridad">9. Seguridad</a></li>
            <li><a class="hover:underline" href="#menores">10. Menores de edad</a></li>
            <li><a class="hover:underline" href="#cambios">11. Cambios en la política</a></li>
            <li><a class="hover:underline" href="#contacto">12. Contacto</a></li>
          </ul>
        </nav>
      </aside>

      <!-- Contenido -->
      <div class="lg:col-span-8">
        <div class="rounded-2xl ring-1 ring-border/60 bg-background backdrop-blur-md shadow-sm p-6 md:p-8">
          <div class="prose max-w-none prose-headings:text-text-primary prose-p:text-text-secondary prose-li:text-text-secondary prose-h2:mt-12 prose-h2:pt-8 leading-relaxed">

            <h2 id="responsable" class="scroll-mt-28">1. Responsable del tratamiento</h2>
            <p><strong><?php echo esc_html( get_bloginfo('name') ); ?></strong> (en adelante, “UKIYO”).</p>
            <ul>
              <li><strong>Email:</strong> <a href="mailto:<?php echo antispambot( 'info@viajesukiyo.com' ); ?>"><?php echo antispambot( 'info@viajesukiyo.com' ); ?></a></li>
            </ul>

            <hr class="my-12 mb-4 border-border/50" />

            <h2 id="datos" class="scroll-mt-28">2. Datos que recopilamos</h2>
            <ul>
              <li><strong>Identificativos y de contacto:</strong> nombre, apellidos, email, teléfono.</li>
              <li><strong>Datos de viaje y preferencias:</strong> destinos, fechas, intereses, restricciones.</li>
              <li><strong>Transaccionales:</strong> si contratas servicios, datos de facturación (no almacenamos tarjetas; los pagos se procesan por pasarela segura).</li>
              <li><strong>Navegación:</strong> IP, dispositivo, páginas visitadas, cookies (ver apartado 8).</li>
              <li><strong>Comunicación:</strong> mensajes enviados mediante formularios o email.</li>
            </ul>

            <hr class="my-12 mb-4 border-border/50" />

            <h2 id="finalidades" class="scroll-mt-28">3. Finalidades y base legal</h2>
            <ul>
              <li><strong>Responder a tus consultas y preparar propuestas personalizadas</strong> (art. 6.1.b RGPD: medidas precontractuales a petición del interesado).</li>
              <li><strong>Prestación de servicios contratados</strong> (art. 6.1.b RGPD: ejecución de contrato).</li>
              <li><strong>Atención al cliente y postventa</strong> (art. 6.1.b y 6.1.f RGPD: interés legítimo).</li>
              <li><strong>Comunicaciones informativas y marketing propio</strong> (art. 6.1.a RGPD: consentimiento; podrás darte de baja en cualquier momento).</li>
              <li><strong>Mejora del sitio y seguridad</strong> (art. 6.1.f RGPD: interés legítimo en mantener la web segura y funcional).</li>
              <li><strong>Obligaciones legales</strong> (art. 6.1.c RGPD: cumplimiento normativo fiscal y contable).</li>
            </ul>

            <hr class="my-12 mb-4 border-border/50" />

            <h2 id="conservacion" class="scroll-mt-28">4. Plazos de conservación</h2>
            <p>Conservamos los datos durante el tiempo necesario para cumplir las finalidades indicadas y, posteriormente, durante los plazos exigidos por ley. En comunicaciones comerciales basadas en consentimiento, hasta que lo revoques.</p>

            <hr class="my-12 mb-4 border-border/50" />

            <h2 id="destinatarios" class="scroll-mt-28">5. Destinatarios</h2>
            <p>No cedemos datos a terceros salvo obligación legal o cuando sea necesario para prestarte el servicio (por ejemplo, proveedores locales, alojamientos, seguros de viaje o pasarelas de pago). En ese caso, firmamos los contratos de encargo de tratamiento correspondientes.</p>

            <hr class="my-12 mb-4 border-border/50" />

            <h2 id="transferencias" class="scroll-mt-28">6. Transferencias internacionales</h2>
            <p>Cuando nuestros proveedores estén ubicados fuera del EEE, garantizamos un nivel adecuado de protección mediante cláusulas contractuales tipo de la Comisión Europea u otros mecanismos válidos.</p>

            <hr class="my-12 mb-4 border-border/50" />

            <h2 id="derechos" class="scroll-mt-28">7. Derechos de las personas</h2>
            <p>Puedes ejercer tus derechos de acceso, rectificación, supresión, oposición, limitación del tratamiento y portabilidad, así como retirar tu consentimiento.</p>
            <ul>
              <li>Escríbenos a <a href="mailto:<?php echo antispambot( 'info@viajesukiyo.com' ); ?>"><?php echo antispambot( 'info@viajesukiyo.com' ); ?></a> indicando “Protección de datos”.</li>
              <li>Si no estás de acuerdo con nuestra respuesta, puedes reclamar ante la autoridad de control competente.</li>
            </ul>

            <hr class="my-12 mb-4 border-border/50" />

            <h2 id="cookies" class="scroll-mt-28">8. Cookies</h2>
            <p>Utilizamos cookies propias y de terceros con fines técnicos, de personalización y analíticos. Puedes configurar o rechazar las cookies no esenciales desde nuestro banner/gestor de cookies. Para más información, consulta la <a href="<?php echo esc_url( ukiyo_get_route_url( 'cookies' ) ); ?>">Política de Cookies</a>.</p>

            <hr class="my-12 mb-4 border-border/50" />

            <h2 id="seguridad" class="scroll-mt-28">9. Seguridad</h2>
            <p>Aplicamos medidas técnicas y organizativas apropiadas para proteger los datos frente a accesos no autorizados, pérdida o alteración. Aun así, ninguna transmisión o almacenamiento es 100% seguro.</p>

            <hr class="my-12 mb-4 border-border/50" />

            <h2 id="menores" class="scroll-mt-28">10. Menores de edad</h2>
            <p>Nuesta web y servicios no están dirigidos a menores de 14 años. Si detectamos datos de menores sin autorización, los eliminaremos de forma diligente.</p>

            <hr class="my-12 mb-4 border-border/50" />

            <h2 id="cambios" class="scroll-mt-28">11. Cambios en la política</h2>
            <p>Podemos actualizar esta política para reflejar cambios legales o de servicio. Publicaremos la versión vigente en esta misma página.</p>

            <hr class="my-12 mb-4 border-border/50" />

            <h2 id="contacto" class="scroll-mt-28">12. Contacto</h2>
            <p>Para cualquier duda sobre esta política o el tratamiento de tus datos, escríbenos a <a href="mailto:<?php echo antispambot( 'info@viajesukiyo.com' ); ?>"><?php echo antispambot( 'info@viajesukiyo.com' ); ?></a>.</p>

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
