<?php
/**
 * Template Name: Planifica tu viaje
 * Description: Página con formulario divertido para conocer a futuros viajeros y recibir su solicitud por email.
 */

if ( ! defined('ABSPATH') ) exit;

// ---------- Procesamiento del formulario ----------
$sent = false;
$errors = [];
$success_msg = '';
$recipient = apply_filters('ukiyo_trip_form_recipient', get_option('admin_email')); // Cambiable por filtro si quieres

if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['ukiyo_trip_nonce']) ) {
    // Anti-spam: honeypot (no debería venir relleno)
    if ( ! empty($_POST['ukiyo_pot']) ) {
        $errors[] = 'Error de validación.';
    }

    // Verifica nonce
    if ( ! wp_verify_nonce( $_POST['ukiyo_trip_nonce'], 'ukiyo_trip_submit' ) ) {
        $errors[] = 'Sesión no válida. Recarga e inténtalo de nuevo.';
    }

    // Recoge y sanea
    $traveller_name         = isset($_POST['traveller_name']) ? sanitize_text_field($_POST['traveller_name']) : '';
    $email        = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $whatsapp     = isset($_POST['whatsapp']) ? sanitize_text_field($_POST['whatsapp']) : '';
    $country      = isset($_POST['country']) ? sanitize_text_field($_POST['country']) : '';
    $start_date   = isset($_POST['start_date']) ? sanitize_text_field($_POST['start_date']) : '';
    $end_date     = isset($_POST['end_date']) ? sanitize_text_field($_POST['end_date']) : '';
    $budget       = isset($_POST['budget']) ? sanitize_text_field($_POST['budget']) : '';
    $travelers    = isset($_POST['travelers']) ? intval($_POST['travelers']) : 1;
    $pace         = isset($_POST['pace']) ? intval($_POST['pace']) : 3;
    $styles       = isset($_POST['styles']) && is_array($_POST['styles']) ? array_map('sanitize_text_field', $_POST['styles']) : [];
    $interests    = isset($_POST['interests']) && is_array($_POST['interests']) ? array_map('sanitize_text_field', $_POST['interests']) : [];
    $regions      = isset($_POST['regions']) && is_array($_POST['regions']) ? array_map('sanitize_text_field', $_POST['regions']) : [];
    $prev_trips   = isset($_POST['prev_trips']) ? sanitize_textarea_field($_POST['prev_trips']) : '';
    $trip_vibe    = isset($_POST['trip_vibe']) ? sanitize_text_field($_POST['trip_vibe']) : '';
    $notes        = isset($_POST['notes']) ? sanitize_textarea_field($_POST['notes']) : '';
    $gdpr         = isset($_POST['gdpr']) ? sanitize_text_field($_POST['gdpr']) : '';
    $drive_abroad   = isset($_POST['drive_abroad']) ? sanitize_text_field($_POST['drive_abroad']) : ''; // 'si' | 'no' | 'depende'
    $vehicle_types  = isset($_POST['vehicle_types']) && is_array($_POST['vehicle_types']) ? array_map('sanitize_text_field', $_POST['vehicle_types']) : [];

    // Validaciones mínimas
    if ( empty($traveller_name) )   { $errors[] = 'Por favor, dinos tu nombre.'; }
    if ( empty($email) || ! is_email($email) ) { $errors[] = 'Necesitamos un email válido para contactarte.'; }
    if ( empty($gdpr) )   { $errors[] = 'Debes aceptar la política de privacidad.'; }

    if ( empty($errors) ) {
        // Construye el email
        $subject = sprintf('🗺️ Nueva solicitud de viaje - %s', $traveller_name);
        $body_lines = [
            "Nombre: $traveller_name",
            "Email: $email",
            "WhatsApp/Telegram: $whatsapp",
            "País/ciudad: $country",
            "Fechas: $start_date ➜ $end_date",
            "Presupuesto aprox.: $budget",
            "Nº viajeros: $travelers",
            "Ritmo del viaje (1-chill / 5-intenso): $pace",
            "Estilos de viaje: " . ( $styles ? implode(', ', $styles) : '—' ),
            "Intereses: " . ( $interests ? implode(', ', $interests) : '—' ),
            "Regiones de interés: " . ( $regions ? implode(', ', $regions) : '—' ),
            "Vibe del viaje: $trip_vibe",
            "Conducir/Alquilar en destino: " . ( $drive_abroad ?: '—' ),
            "Tipo(s) de vehículo: " . ( $vehicle_types ? implode(', ', $vehicle_types) : '—' ),
            "Viajes previos / referencia:",
            $prev_trips ?: '—',
            "Notas adicionales:",
            $notes ?: '—',
            "Consentimiento: " . ( $gdpr ? 'Aceptado' : 'No' ),
            "",
            "Enviado desde: " . home_url(),
        ];
        $body = implode("\n", $body_lines);

        // Cabeceras
        $headers = [];
        $headers[] = 'Content-Type: text/plain; charset=UTF-8';
        if ( $email ) {
            $headers[] = 'Reply-To: ' . $traveller_name . ' <' . $email . '>';
        }

        // Envía
        $sent = wp_mail( $recipient, $subject, $body, $headers );

        if ( $sent ) {
            $success_msg = '¡Gracias! Hemos recibido tu info. Te escribiremos muy pronto para diseñar tu aventura ✨';
        } else {
            $errors[] = 'Uy… no hemos podido enviar el correo. Inténtalo de nuevo en unos minutos.';
        }
    }
}

get_header();
?>

<!-- HERO / Intro -->
<section class="relative pt-24 pb-16 overflow-hidden bg-gradient-to-br from-primary-50 via-accent-50 to-secondary-50">
  <div class="absolute inset-0 opacity-10 pointer-events-none">
    <svg class="w-full h-full" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <rect width="100%" height="100%" fill="url(#ukiyo-pattern)"/>
    </svg>
  </div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="max-w-3xl mx-auto text-center">
      <span class="inline-block bg-primary-100 text-primary px-4 py-2 rounded-full text-sm font-satoshi mb-4">Planifica tu viaje</span>
      <h1 class="text-4xl sm:text-5xl lg:text-6xl font-crimson text-text-primary leading-tight mb-4">
        Cuéntanos <span class="text-transparent bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text">cómo viajas</span>
      </h1>
      <p class="text-lg text-text-secondary max-w-2xl mx-auto font-satoshi">
        Con estas preguntas rápidas te conocemos mejor y diseñamos una experiencia auténtica, sin turismo masivo. Es ameno, prometido 😄
      </p>
    </div>
  </div>
</section>

<!-- FORM -->
<section class="py-12 bg-white">
  <div class="container mx-auto px-6">
    <div class="max-w-5xl mx-auto">

      <?php if ( ! empty($errors) ) : ?>
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-800 font-satoshi">
          <ul class="list-disc pl-6">
            <?php foreach ($errors as $e): ?>
              <li><?php echo esc_html($e); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if ( $sent && $success_msg ) : ?>
        <div class="mb-8 rounded-2xl border border-success-200 bg-success-50 p-6 text-success-900 shadow-card">
          <p class="font-satoshi font-semibold"><?php echo esc_html($success_msg); ?></p>
        </div>
      <?php endif; ?>

      <form method="post" class="ukiyo-form bg-white/90 backdrop-blur-sm rounded-2xl border border-surface shadow-card p-6 sm:p-10 font-satoshi">
        <?php wp_nonce_field('ukiyo_trip_submit', 'ukiyo_trip_nonce'); ?>
        <input type="text" name="ukiyo_pot" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />

        <!-- Datos básicos -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-text-primary mb-2">Nombre y apellidos</label>
            <input type="text" name="traveller_name" required class="w-full p-3 rounded-lg border border-surface focus:border-primary focus:ring-2 focus:ring-primary/20" value="<?php echo isset($traveller_name)? esc_attr($traveller_name):''; ?>" placeholder="Tu nombre" />
          </div>
          <div>
            <label class="block text-sm font-medium text-text-primary mb-2">Email</label>
            <input type="email" name="email" required class="w-full p-3 rounded-lg border border-surface focus:border-primary focus:ring-2 focus:ring-primary/20" value="<?php echo isset($email)? esc_attr($email):''; ?>" placeholder="tucorreo@ejemplo.com" />
          </div>
          <div>
            <label class="block text-sm font-medium text-text-primary mb-2">WhatsApp / Telegram (opcional)</label>
            <input type="text" name="whatsapp" class="w-full p-3 rounded-lg border border-surface focus:border-primary focus:ring-2 focus:ring-primary/20" value="<?php echo isset($whatsapp)? esc_attr($whatsapp):''; ?>" placeholder="+34 600 000 000" />
          </div>
          <div>
            <label class="block text-sm font-medium text-text-primary mb-2">Ciudad / País</label>
            <input type="text" name="country" class="w-full p-3 rounded-lg border border-surface focus:border-primary focus:ring-2 focus:ring-primary/20" value="<?php echo isset($country)? esc_attr($country):''; ?>" placeholder="Madrid, España" />
          </div>
        </div>

        <!-- Fechas y presupuesto -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
          <div>
            <label class="block text-sm font-medium text-text-primary mb-2">Fecha de inicio</label>
            <input type="date" name="start_date" class="w-full p-3 rounded-lg border border-surface focus:border-primary focus:ring-2 focus:ring-primary/20" value="<?php echo isset($start_date)? esc_attr($start_date):''; ?>" />
          </div>
          <div>
            <label class="block text-sm font-medium text-text-primary mb-2">Fecha de fin</label>
            <input type="date" name="end_date" class="w-full p-3 rounded-lg border border-surface focus:border-primary focus:ring-2 focus:ring-primary/20" value="<?php echo isset($end_date)? esc_attr($end_date):''; ?>" />
          </div>
        </div>

        <!-- Nº viajeros y ritmo -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
        <div>
            <label class="block text-sm font-medium text-text-primary mb-2">¿Cuántas personas viajan?</label>
            <input type="number" min="1" name="travelers"
                class="w-full p-3 rounded-lg border border-surface focus:border-primary focus:ring-2 focus:ring-primary/20"
                value="<?php echo isset($travelers)? esc_attr($travelers): 1; ?>" />
        </div>

        <div>
            <label class="block text-sm font-medium text-text-primary mb-2">
            Ritmo del viaje <span id="paceValue" class="ml-1 font-semibold">3</span>/5
            </label>
            <input type="range" name="pace" min="1" max="5"
                value="<?php echo isset($pace)? esc_attr($pace):3; ?>"
                class="w-full ukiyo-range"
                oninput="document.getElementById('paceValue').textContent=this.value" />
            <div class="flex justify-between text-xs text-text-secondary mt-1">
            <span>🧘 Chill</span><span>⚡ Intenso</span>
            </div>
        </div>
        </div> <!-- ← Cerramos el grid aquí -->

        <!-- Conducir / Alquilar vehículo -->
        <div class="mt-12 space-y-6">
        <label class="block text-sm font-medium text-text-primary mb-3">
            ¿Te planteas conducir o alquilar vehículo en destino?
        </label>

        <?php
            $drive_sel   = isset($drive_abroad) ? $drive_abroad : '';
            $vehicle_sel = isset($vehicle_types) ? $vehicle_types : [];
        ?>

        <!-- Radios (disposición) -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <!-- Sí -->
            <label class="ukiyo-tile">
            <input type="radio" name="drive_abroad" value="si"
                    class="sr-only peer"
                    <?php checked($drive_sel, 'si'); ?>>
            <span class="text-2xl">🚗</span>
            <span class="text-sm font-medium peer-checked:text-primary">Sí, sin problema</span>
            </label>

            <!-- Depende -->
            <label class="ukiyo-tile">
            <input type="radio" name="drive_abroad" value="depende"
                    class="sr-only peer"
                    <?php checked($drive_sel, 'depende'); ?>>
            <span class="text-2xl">🤔</span>
            <span class="text-sm font-medium peer-checked:text-primary">Depende del lugar</span>
            </label>

            <!-- No -->
            <label class="ukiyo-tile">
            <input type="radio" name="drive_abroad" value="no"
                    class="sr-only peer"
                    <?php checked($drive_sel, 'no'); ?>>
            <span class="text-2xl">🙅‍♂️</span>
            <span class="text-sm font-medium peer-checked:text-primary">No, prefiero no conducir</span>
            </label>
        </div>

        <!-- Tipos de vehículo (solo si Sí/Depende) -->
        <div id="vehicle-types-block"
            class="mt-6 <?php echo ($drive_sel==='si' || $drive_sel==='depende') ? '' : 'hidden'; ?>">
            <p class="text-sm text-text-secondary mb-3">¿Con qué vehículo(s) te sentirías cómodo?</p>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3">
            <?php
                $opts = [
                ['value'=>'Coche',      'emoji'=>'🚗'],
                ['value'=>'Moto 125cc', 'emoji'=>'🛵'],
                ];
                foreach ($opts as $o):
                $checked = in_array($o['value'], $vehicle_sel, true);
            ?>
                <label class="ukiyo-tile">
                <input type="checkbox" name="vehicle_types[]"
                        value="<?php echo esc_attr($o['value']); ?>"
                        class="sr-only peer"
                        <?php checked($checked); ?>>
                <span class="text-2xl"><?php echo esc_html($o['emoji']); ?></span>
                <span class="text-xs sm:text-sm font-medium peer-checked:text-primary">
                    <?php echo esc_html($o['value']); ?>
                </span>
                </label>
            <?php endforeach; ?>
            </div>

            <p class="text-xs text-text-secondary mt-3">
            * Nos adaptamos a tu comodidad (y a licencias/seguros del país).
            </p>
        </div>
        </div>

        <!-- Estilos de viaje (chips) -->
        <div class="mt-12 space-y-6">
        <label class="block text-sm font-medium text-text-primary mb-3">
            ¿Qué estilos de viaje te van? (elige varios)
        </label>
        <?php
            $styles_all = ['Inmersión cultural','Naturaleza','Gastronomía','Aventura suave','Lujo con sentido','Roadtrip','Slow travel','Fotografía'];
            $styles_sel = isset($styles)? $styles : [];
        ?>
        <div class="flex flex-wrap gap-2">
            <?php foreach($styles_all as $s): ?>
            <label class="inline-flex items-center gap-2 px-3 py-2 rounded-full border border-surface hover:border-primary cursor-pointer bg-white">
                <input type="checkbox" name="styles[]" value="<?php echo esc_attr($s); ?>"
                    <?php checked(in_array($s,$styles_sel)); ?> class="sr-only peer">
                <span class="text-sm peer-checked:text-primary"><?php echo esc_html($s); ?></span>
            </label>
            <?php endforeach; ?>
        </div>
        </div>

        <!-- Regiones -->
        <div class="mt-8">
          <label class="block text-sm font-medium text-text-primary mb-3">¿Qué países te gustaría visitar?</label>
          <?php
          $regions_all = ['Indonesia','Colombia','Marruecos','Cuba','Costa Rica'];
          $regions_sel = isset($regions)? $regions : [];
          ?>
          <div class="flex flex-wrap gap-2">
            <?php foreach($regions_all as $r): ?>
              <label class="inline-flex items-center gap-2 px-3 py-2 rounded-full border border-surface hover:border-primary cursor-pointer bg-white">
                <input type="checkbox" name="regions[]" value="<?php echo esc_attr($r); ?>" <?php checked(in_array($r,$regions_sel)); ?> class="sr-only peer">
                <span class="text-sm peer-checked:text-primary"><?php echo esc_html($r); ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Vibe -->
        <div class="mt-8">
            <label class="block text-sm font-medium text-text-primary mb-3"> Elige el “vibe” del viaje </label>
        <?php
        $vibes = [
        'Conexión profunda' => '💞',
        'Exploración creativa' => '🎨',
        'Aventura consciente' => '🧭',
        'Bienestar y calma' => '🧘‍♀️',
        'Lujo discreto' => '✨',
        ];
        $vibe_sel = isset($trip_vibe)? $trip_vibe : '';
        ?>

        <div class="flex flex-wrap justify-center gap-4">
            <?php foreach($vibes as $label => $emoji): ?>
            <label class="
            group flex flex-col items-center justify-center
            w-40 p-4 rounded-2xl border border-surface bg-white
            text-text-primary text-center cursor-pointer
            transition-all duration-300
            hover:shadow-md hover:border-primary/60
            peer-checked:border-primary peer-checked:bg-primary/10
            peer-checked:shadow-lg peer-checked:scale-105
            ">
            <input 
            type="radio" 
            name="trip_vibe" 
            value="<?php echo esc_attr($label); ?>" 
            <?php checked($vibe_sel, $label); ?> 
            class="hidden peer"
            >
            
            <span class="text-2xl mb-2"><?php echo esc_html($emoji); ?></span>
            <span class="text-sm font-medium peer-checked:text-primary group-hover:text-primary">
            <?php echo esc_html($label); ?>
            </span>
            </label>
            <?php endforeach; ?>
        </div>
        </div>

        <!-- Texto libre -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-text-primary mb-2">Cuéntanos viajes previos que amaste (y por qué)</label>
            <textarea name="prev_trips" rows="4" class="w-full p-3 rounded-lg border border-surface focus:border-primary focus:ring-2 focus:ring-primary/20" placeholder="Ej: Ruta por Bali en moto, la ceremonia de agua en Tirta Empul..."><?php echo isset($prev_trips)? esc_textarea($prev_trips):''; ?></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium text-text-primary mb-2">Notas o necesidades (alergias, ritmos, “no-go”, etc.)</label>
            <textarea name="notes" rows="4" class="w-full p-3 rounded-lg border border-surface focus:border-primary focus:ring-2 focus:ring-primary/20" placeholder="Todo lo que debamos saber para cuidarte mejor ✨"><?php echo isset($notes)? esc_textarea($notes):''; ?></textarea>
          </div>
        </div>

        <!-- Consentimiento -->
        <div class="mt-8">
          <label class="inline-flex items-start gap-3">
            <input type="checkbox" name="gdpr" value="1" <?php checked( isset($gdpr) && $gdpr ); ?> class="mt-1">
            <span class="text-sm text-text-secondary">
              Acepto la <a href="<?php echo esc_url( site_url('/privacidad') ); ?>" class="text-primary underline">política de privacidad</a> y que me contactéis para diseñar mi viaje.
            </span>
          </label>
        </div>

        <!-- CTA -->
        <div class="mt-10 flex flex-col sm:flex-row gap-4">
          <button type="submit" class="btn-primary px-8 py-4 text-lg inline-flex items-center justify-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            Enviar y diseñar mi aventura
          </button>

          <a href="<?php echo esc_url( site_url('/experiencias') ); ?>" class="btn-secondary px-8 py-4 text-lg inline-flex items-center justify-center">
            Ver experiencias ejemplo
          </a>
        </div>
        <script>
        document.addEventListener('change', function(e){
        if(e.target.name === 'drive_abroad'){
            const show = (e.target.value === 'si' || e.target.value === 'depende');
            const block = document.getElementById('vehicle-types-block');
            if(block){ block.classList.toggle('hidden', !show); }
        }
        });
        </script>
      </form>
    </div>
  </div>
</section>

<!-- FAQ rápido / cierre -->
<section class="py-12 bg-surface">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl font-crimson text-text-primary mb-4">¿Qué pasa después?</h2>
      <p class="text-text-secondary">
        Te respondemos en breve con preguntas afinadas y una propuesta inicial. Ajustamos contigo hasta que el viaje sea 100% tú. Sin turismo masivo, sin guías enlatadas. 💫
      </p>
    </div>
  </div>
</section>

<?php get_footer(); ?>