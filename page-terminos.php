

<?php
/*
 * Template Name: Términos y Condiciones
 * Description: Página de términos y condiciones con estilo UKIYO, índice sticky y tarjeta glass.
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
        Términos
      </span>
      <h1 class="text-hero font-satoshi-bold text-text-primary mb-6">
        Términos y <span class="text-primary">condiciones</span>
      </h1>
    </div>
  </div>
</section>

  <!-- Índice + Contenido en diseño de dos columnas -->
  <section class="bg-surface">
    <div class="container mx-auto px-6 md:px-8 py-10 md:py-14 lg:grid lg:grid-cols-12 lg:gap-10">

      <!-- Índice lateral fijo -->
      <aside class="lg:col-span-4 mb-8 lg:mb-0">
        <nav aria-label="Índice" class="sticky top-24 rounded-xl ring-1 ring-border/60 bg-white/70 backdrop-blur-md p-4 md:p-5 shadow-sm">
          <p class="text-sm font-medium text-text-tertiary mb-2">Contenido</p>
          <ul class="space-y-1 text-sm">
            <li><a class="hover:underline" href="#identificacion">1. Identificación</a></li>
            <li><a class="hover:underline" href="#objeto">2. Objeto del sitio</a></li>
            <li><a class="hover:underline" href="#uso">3. Condiciones de uso</a></li>
            <li><a class="hover:underline" href="#cuentas">4. Cuenta y acceso</a></li>
            <li><a class="hover:underline" href="#reservas">5. Reservas y pagos</a></li>
            <li><a class="hover:underline" href="#precios">6. Precios y modificaciones</a></li>
            <li><a class="hover:underline" href="#cancelaciones">7. Cancelaciones y cambios</a></li>
            <li><a class="hover:underline" href="#responsabilidad">8. Responsabilidad</a></li>
            <li><a class="hover:underline" href="#terceros">9. Proveedores y terceros</a></li>
            <li><a class="hover:underline" href="#propiedad">10. Propiedad intelectual</a></li>
            <li><a class="hover:underline" href="#enlaces">11. Enlaces externos</a></li>
            <li><a class="hover:underline" href="#datos">12. Protección de datos</a></li>
            <li><a class="hover:underline" href="#cookies">13. Cookies</a></li>
            <li><a class="hover:underline" href="#seguridad">14. Seguridad</a></li>
            <li><a class="hover:underline" href="#fuerza">15. Fuerza mayor</a></li>
            <li><a class="hover:underline" href="#reclamaciones">16. Reclamaciones y atención al cliente</a></li>
            <li><a class="hover:underline" href="#ley">17. Ley aplicable y jurisdicción</a></li>
            <li><a class="hover:underline" href="#cambios">18. Modificaciones de los términos</a></li>
            <li><a class="hover:underline" href="#contacto">19. Contacto</a></li>
          </ul>
        </nav>
      </aside>

      <!-- Contenido -->
      <div class="lg:col-span-8">
        <div class="rounded-2xl ring-1 ring-border/60 bg-white/80 backdrop-blur-md shadow-sm p-6 md:p-8">
          <div class="prose max-w-none prose-headings:text-text-primary prose-p:text-text-secondary prose-li:text-text-secondary leading-relaxed">

            <h2 id="identificacion" class="scroll-mt-28">1. Identificación</h2>
            <p><strong><?php echo esc_html( get_bloginfo('name') ); ?></strong> ("UKIYO").</p>
            <ul>
              <li><strong>Email:</strong> <a href="mailto:<?php echo antispambot( get_option('admin_email') ); ?>"><?php echo antispambot( get_option('admin_email') ); ?></a></li>
              <li><strong>Dirección:</strong> <em>Indica aquí tu dirección fiscal</em></li>
              <li><strong>Identificación fiscal:</strong> <em>NIF/CIF</em></li>
            </ul>

            <hr class="my-8 border-border/50" />

            <h2 id="objeto" class="scroll-mt-28">2. Objeto del sitio</h2>
            <p>Este sitio ofrece información y servicios de consultoría y organización de viajes personalizados, experiencias culturales y asesoramiento en destinos. La navegación por el sitio implica la aceptación de estos términos.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="uso" class="scroll-mt-28">3. Condiciones de uso</h2>
            <ul>
              <li>Te comprometes a utilizar el sitio de forma lícita y respetuosa, sin vulnerar derechos de terceros.</li>
              <li>No está permitido introducir malware, intentos de intrusión o uso automatizado abusivo.</li>
              <li>Podemos limitar o denegar el acceso si detectamos uso contrario a estos términos.</li>
            </ul>

            <hr class="my-8 border-border/50" />

            <h2 id="cuentas" class="scroll-mt-28">4. Cuenta y acceso</h2>
            <p>Algunas áreas privadas (p. ej., portales de itinerarios) requieren cuenta. Eres responsable de mantener la confidencialidad de tus credenciales y de la actividad realizada con ellas. Notifícanos cualquier acceso no autorizado.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="reservas" class="scroll-mt-28">5. Reservas y pagos</h2>
            <ul>
              <li>Las propuestas personalizadas detallan precios, inclusiones, exclusiones y formas de pago.</li>
              <li>En caso de pagos por pasarelas externas, estas procesan la transacción de forma segura; UKIYO no almacena datos de tarjeta.</li>
              <li>Para bloquear disponibilidad, puede solicitarse un anticipo o depósito.</li>
            </ul>

            <hr class="my-8 border-border/50" />

            <h2 id="precios" class="scroll-mt-28">6. Precios y modificaciones</h2>
            <ul>
              <li>Los precios pueden variar por cambios en divisas, tarifas de proveedores o impuestos.</li>
              <li>Si se producen cambios relevantes antes del pago final, te lo comunicaremos y podrás aceptar o cancelar sin penalización si el cambio es sustancial.</li>
            </ul>

            <hr class="my-8 border-border/50" />

            <h2 id="cancelaciones" class="scroll-mt-28">7. Cancelaciones y cambios</h2>
            <ul>
              <li>Las condiciones de cancelación dependen de cada proveedor (alojamientos, transportes, actividades). Se detallan en la propuesta.</li>
              <li>Intentaremos gestionar cambios razonables, sujetos a disponibilidad y posibles diferencias de precio.</li>
              <li>Las devoluciones, si proceden, se tramitan por el mismo medio de pago utilizado.</li>
            </ul>

            <hr class="my-8 border-border/50" />

            <h2 id="responsabilidad" class="scroll-mt-28">8. Responsabilidad</h2>
            <ul>
              <li>UKIYO actúa como consultor/organizador y, en su caso, como intermediario entre el viajero y proveedores locales.</li>
              <li>No somos responsables por incumplimientos atribuibles a terceros, circunstancias imprevisibles o fuerza mayor (clima, decisiones gubernamentales, huelgas, etc.).</li>
              <li>Respondemos de forma diligente a la organización, selección de proveedores y atención al viajero.</li>
            </ul>

            <hr class="my-8 border-border/50" />

            <h2 id="terceros" class="scroll-mt-28">9. Proveedores y terceros</h2>
            <p>Determinadas experiencias son operadas por terceros (guías, transportes, alojamientos). Sus términos se aplican adicionalmente. Te informaremos de las condiciones relevantes al confirmarse la reserva.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="propiedad" class="scroll-mt-28">10. Propiedad intelectual</h2>
            <p>El contenido del sitio (textos, imágenes, marcas, logotipos, diseños, código) es titularidad de UKIYO o de sus licenciantes. No se permite su reproducción o uso más allá del ámbito personal sin autorización expresa.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="enlaces" class="scroll-mt-28">11. Enlaces externos</h2>
            <p>Este sitio puede enlazar a webs de terceros. UKIYO no controla su contenido ni asume responsabilidad por ellos. El uso de esos sitios queda bajo tu propia responsabilidad.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="datos" class="scroll-mt-28">12. Protección de datos</h2>
            <p>Tratamos los datos conforme al RGPD y normativa aplicable. Para más información, consulta nuestra <a href="<?php echo esc_url( home_url('/politica-de-privacidad') ); ?>">Política de Privacidad</a>.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="cookies" class="scroll-mt-28">13. Cookies</h2>
            <p>Utilizamos cookies propias y de terceros para fines técnicos y analíticos. Puedes gestionar tus preferencias en la <a href="<?php echo esc_url( home_url('/politica-de-cookies') ); ?>">Política de Cookies</a>.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="seguridad" class="scroll-mt-28">14. Seguridad</h2>
            <p>Aplicamos medidas técnicas y organizativas razonables para proteger el sitio y la información, aunque ningún sistema es completamente seguro.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="fuerza" class="scroll-mt-28">15. Fuerza mayor</h2>
            <p>No seremos responsables por retrasos o incumplimientos debidos a causas fuera de nuestro control razonable (fuerza mayor, caso fortuito).</p>

            <hr class="my-8 border-border/50" />

            <h2 id="reclamaciones" class="scroll-mt-28">16. Reclamaciones y atención al cliente</h2>
            <p>Puedes dirigir reclamaciones o solicitudes de información a <a href="mailto:<?php echo antispambot( get_option('admin_email') ); ?>"><?php echo antispambot( get_option('admin_email') ); ?></a>. Responderemos con la mayor diligencia posible.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="ley" class="scroll-mt-28">17. Ley aplicable y jurisdicción</h2>
            <p>Estos términos se rigen por la legislación española. Salvo norma imperativa, las partes se someten a los juzgados y tribunales del domicilio del consumidor o, en su defecto, de Madrid (España).</p>

            <hr class="my-8 border-border/50" />

            <h2 id="cambios" class="scroll-mt-28">18. Modificaciones de los términos</h2>
            <p>Podemos actualizar estas condiciones por motivos legales o de servicio. Publicaremos la versión vigente en esta página e indicaremos la fecha de actualización.</p>

            <hr class="my-8 border-border/50" />

            <h2 id="contacto" class="scroll-mt-28">19. Contacto</h2>
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