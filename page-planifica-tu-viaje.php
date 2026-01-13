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
$recipient = apply_filters('ukiyo_trip_form_recipient', 'info@viajesukiyo.com');

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
    $duration    = isset($_POST['duration']) ? sanitize_text_field($_POST['duration']) : '';
    $start_date   = isset($_POST['start_date']) ? sanitize_text_field($_POST['start_date']) : '';
    $end_date     = isset($_POST['end_date']) ? sanitize_text_field($_POST['end_date']) : '';
    $budget       = isset($_POST['budget']) ? sanitize_text_field($_POST['budget']) : '';
    $travelers    = isset($_POST['travelers']) ? intval($_POST['travelers']) : 1;
    $pace         = isset($_POST['pace']) ? intval($_POST['pace']) : 3;
    $styles       = isset($_POST['styles']) && is_array($_POST['styles']) ? array_map('sanitize_text_field', $_POST['styles']) : [];
    $interests    = isset($_POST['interests']) && is_array($_POST['interests']) ? array_map('sanitize_text_field', $_POST['interests']) : [];
    $regions      = isset($_POST['regions']) && is_array($_POST['regions']) ? array_map('sanitize_text_field', $_POST['regions']) : [];
    $prev_trips   = isset($_POST['prev_trips']) ? sanitize_textarea_field($_POST['prev_trips']) : '';
    $trip_vibe    = isset($_POST['trip_vibe']) && is_array($_POST['trip_vibe']) ? array_map('sanitize_text_field', $_POST['trip_vibe']) : [];
    $notes        = isset($_POST['notes']) ? sanitize_textarea_field($_POST['notes']) : '';
    $gdpr         = isset($_POST['gdpr']) ? sanitize_text_field($_POST['gdpr']) : '';

    // Validaciones mínimas
    if ( empty($traveller_name) )   { $errors[] = 'Por favor, dinos tu nombre.'; }
    if ( empty($email) || ! is_email($email) ) { $errors[] = 'Necesitamos un email válido para contactarte.'; }
    if ( empty($gdpr) )   { $errors[] = 'Debes aceptar la política de privacidad.'; }

    if ( empty($errors) ) {
        // Construye el email HTML
        $subject = sprintf('✨ Nueva solicitud de viaje - %s', $traveller_name);
        
        // Build HTML email
        $body = '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Solicitud de Viaje</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif; background-color: #f5f2ed; color: #2c2c2c;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color: #f5f2ed; padding: 40px 20px;">
        <tr>
            <td align="center">
                <!-- Main Container -->
                <table cellpadding="0" cellspacing="0" border="0" width="600" style="max-width: 600px; background-color: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 4px 20px rgba(139, 69, 19, 0.08);">
                    
                    <!-- Header with gradient -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #F6CF66 0%, #E8B48D 100%); padding: 40px 40px 30px; text-align: center;">
                            <h1 style="margin: 0; font-size: 32px; font-weight: 700; color: #2c2c2c; letter-spacing: -0.5px;">✨ Nueva Solicitud de Viaje</h1>
                            <p style="margin: 10px 0 0; font-size: 16px; color: #2c2c2c; opacity: 0.9;">Un futuro viajero quiere explorar el mundo contigo</p>
                        </td>
                    </tr>
                    
                    <!-- Traveler Info Section -->
                    <tr>
                        <td style="padding: 40px 40px 20px;">
                            <div style="background-color: #fffbf0; border-left: 4px solid #F6CF66; padding: 20px; border-radius: 12px; margin-bottom: 30px;">
                                <h2 style="margin: 0 0 15px; font-size: 20px; font-weight: 600; color: #2c2c2c;">👤 Datos del Viajero</h2>
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                    <tr>
                                        <td style="padding: 8px 0; font-size: 15px; color: #6b6b6b; width: 40%;">Nombre:</td>
                                        <td style="padding: 8px 0; font-size: 15px; font-weight: 600; color: #2c2c2c;">' . esc_html($traveller_name) . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 0; font-size: 15px; color: #6b6b6b;">Email:</td>
                                        <td style="padding: 8px 0; font-size: 15px; font-weight: 600; color: #2c2c2c;"><a href="mailto:' . esc_attr($email) . '" style="color: #2c2c2c; text-decoration: none;">' . esc_html($email) . '</a></td>
                                    </tr>
                                </table>
                            </div>
                            
                            <!-- Destinations Section -->
                            <div style="margin-bottom: 30px;">
                                <h2 style="margin: 0 0 15px; font-size: 20px; font-weight: 600; color: #2c2c2c; border-bottom: 2px solid #F6CF66; padding-bottom: 10px;">🌍 Destinos de Interés</h2>
                                <p style="margin: 0; font-size: 16px; color: #2c2c2c; background-color: #fffbf0; padding: 15px; border-radius: 8px; font-weight: 500;">' . ( $regions ? esc_html(implode(', ', $regions)) : '—' ) . '</p>
                            </div>
                            
                            <!-- Trip Details Grid -->
                            <div style="margin-bottom: 30px;">
                                <h2 style="margin: 0 0 15px; font-size: 20px; font-weight: 600; color: #2c2c2c; border-bottom: 2px solid #E8B48D; padding-bottom: 10px;">✈️ Detalles del Viaje</h2>
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                    <tr>
                                        <td style="padding: 12px; background-color: #f9f9f9; border-radius: 8px; width: 48%; vertical-align: top;" valign="top">
                                            <p style="margin: 0; font-size: 13px; color: #6b6b6b; text-transform: uppercase; letter-spacing: 0.5px;">Duración</p>
                                            <p style="margin: 5px 0 0; font-size: 16px; font-weight: 600; color: #2c2c2c;">' . esc_html($duration) . '</p>
                                        </td>
                                        <td style="width: 4%;"></td>
                                        <td style="padding: 12px; background-color: #f9f9f9; border-radius: 8px; width: 48%; vertical-align: top;" valign="top">
                                            <p style="margin: 0; font-size: 13px; color: #6b6b6b; text-transform: uppercase; letter-spacing: 0.5px;">Viajeros</p>
                                            <p style="margin: 5px 0 0; font-size: 16px; font-weight: 600; color: #2c2c2c;">' . esc_html($travelers) . '</p>
                                        </td>
                                    </tr>
                                    <tr><td colspan="3" style="height: 12px;"></td></tr>
                                    <tr>
                                        <td style="padding: 12px; background-color: #f9f9f9; border-radius: 8px; width: 48%; vertical-align: top;" valign="top">
                                            <p style="margin: 0; font-size: 13px; color: #6b6b6b; text-transform: uppercase; letter-spacing: 0.5px;">Ritmo</p>
                                            <p style="margin: 5px 0 0; font-size: 16px; font-weight: 600; color: #2c2c2c;">' . esc_html($pace) . '</p>
                                        </td>
                                        <td style="width: 4%;"></td>
                                        <td style="padding: 12px; background-color: #f9f9f9; border-radius: 8px; width: 48%; vertical-align: top;" valign="top">
                                            <p style="margin: 0; font-size: 13px; color: #6b6b6b; text-transform: uppercase; letter-spacing: 0.5px;">Vibe</p>
                                            <p style="margin: 5px 0 0; font-size: 16px; font-weight: 600; color: #2c2c2c;">' . ( $trip_vibe ? esc_html(implode(', ', $trip_vibe)) : '—' ) . '</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                            <!-- Preferences Section -->
                            <div style="margin-bottom: 20px;">
                                <h2 style="margin: 0 0 15px; font-size: 20px; font-weight: 600; color: #2c2c2c; border-bottom: 2px solid #C9D8BA; padding-bottom: 10px;">🎨 Preferencias de Viaje</h2>
                                <div style="margin-bottom: 15px;">
                                    <p style="margin: 0 0 8px; font-size: 14px; color: #6b6b6b; font-weight: 500;">Estilos:</p>
                                    <p style="margin: 0; font-size: 15px; color: #2c2c2c; background-color: #f0f4ed; padding: 12px; border-radius: 8px;">' . ( $styles ? esc_html(implode(', ', $styles)) : '—' ) . '</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #2c2c2c; padding: 30px 40px; text-align: center;">
                            <p style="margin: 0 0 10px; font-size: 14px; color: #f5f2ed; opacity: 0.8;">Solicitud enviada desde</p>
                            <a href="' . esc_url(home_url()) . '" style="color: #F6CF66; text-decoration: none; font-size: 16px; font-weight: 600;">' . esc_html(home_url()) . '</a>
                            <p style="margin: 15px 0 0; font-size: 13px; color: #f5f2ed; opacity: 0.6;">Ukiyo - Viajes que Transforman</p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';

        // Cabeceras para HTML
        $headers = [];
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: Ukiyo Viajes <info@viajesukiyo.com>';
        $headers[] = 'MIME-Version: 1.0';
        if ( $email ) {
            $headers[] = 'Reply-To: ' . $traveller_name . ' <' . $email . '>';
        }

        // Envía
        $sent = wp_mail( $recipient, $subject, $body, $headers );

        if ( $sent ) {
            $success_msg = '¡Gracias! Hemos recibido tu info. Te escribiremos muy pronto para diseñar tu aventura';
        } else {
            $errors[] = 'Uy… no hemos podido enviar el correo. Inténtalo de nuevo en unos minutos.';
        }
    }

    // Redirect to WhatsApp if requested and no errors
    if ( empty($errors) && $sent && isset($_POST['submit_action']) && $_POST['submit_action'] === 'whatsapp' ) {
        // Redirigir a WhatsApp
        // Usamos el mismo enlace que en el CTA de la home
        wp_redirect('https://wa.me/message/XD2DTYOAKBIAJ1');
        exit;
    }
}

get_header();
?>

<!-- HERO STYLE -->
<style>
  .hero-experiences { height: 50vh; }
  @media (min-width: 1024px) {
    .hero-experiences { height: auto !important; min-height: 50vh !important; }
  }
</style>

<section class="hero-experiences relative flex items-center justify-center overflow-hidden pt-32 pb-16 mb-12">
  <!-- Background Image -->
  <div class="absolute inset-0 w-full h-full">
    <img src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/viajes-a-colombia-personalizados-cartagena-ciudad-amurallada.jpg" 
         alt="Planifica tu viaje" 
         class="w-full h-full object-cover mask-image" 
         loading="eager" />
    <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
  </div>

  <!-- Contenido Hero - Centrado -->
  <div class="relative z-10 w-full">
    <div class="container mx-auto px-6">
      <div class="max-w-4xl mx-auto text-center">
        <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">
          A medida
        </span>
        <h1 class="text-hero md:text-6xl lg:text-hero font-satoshi text-white mb-6 text-shadow">
          Cuéntanos <span class="text-accent-300">cómo viajas</span>
        </h1>
        <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
          Con estas preguntas rápidas te conocemos mejor y diseñamos una experiencia auténtica. Es ameno, prometido.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- FORM -->

<section class="py-12 bg-background">
  <div class="container mx-auto px-6">
    <div class="max-w-5xl mx-auto">

      <?php if ( ! empty($errors) ) : ?>
        <div class="mb-6 rounded-xl border border-red-200 bg-background p-4 text-red-800 font-satoshi">
          <ul class="list-disc pl-6">
            <?php foreach ($errors as $e): ?>
              <li><?php echo esc_html($e); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if ( $sent && $success_msg ) : ?>
        <div class="mb-8 rounded-2xl border border-success-200 bg-background p-6 text-success-900 shadow-card">
          <p class="font-satoshi font-semibold"><?php echo esc_html($success_msg); ?></p>
        </div>
      <?php endif; ?>

      <!-- Progress Bar -->
      <div class="w-full max-w-5xl mx-auto mb-6 px-4">
        <div class="h-1 bg-background rounded-full overflow-hidden">
          <div id="progress-bar" class="h-full bg-background transition-all duration-500 ease-out" style="width: 10%"></div>
        </div>
        <div class="flex justify-between mt-2 text-xs font-medium text-gray-400 uppercase tracking-wider">
            <span>Progreso</span>
            <span id="step-count">1/10</span>
        </div>
      </div>

      <form method="post" id="ukiyo-v2-form" class="ukiyo-form w-full max-w-6xl mx-auto bg-surface rounded-3xl shadow-xl relative min-h-[600px] flex flex-col lg:overflow-hidden">
        <?php wp_nonce_field('ukiyo_trip_submit', 'ukiyo_trip_nonce'); ?>
        <input type="text" name="ukiyo_pot" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />

        <!-- STEPS CONTAINER -->
        <div class="flex-grow bg-background relative p-6 md:p-10 lg:overflow-hidden">
            
            <!-- STEP 1: Regions -->
            <div class="form-step active flex flex-col h-full" data-step="1">
                <h3 class="text-4xl md:text-6xl font-satoshi text-text-primary mb-6 text-shadow">¿Qué destino te llama?</h3>
                <p class="text-text-secondary mb-8">Desliza y elige uno o varios destinos para tu aventura.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-col items-center lg:flex-row lg:flex-nowrap lg:overflow-x-auto lg:snap-x lg:snap-mandatory lg:items-start gap-6 pb-8 px-2 scrollbar-hide" style="-webkit-overflow-scrolling: touch;">
                        <?php
                        $regions_all = [
                            [
                                'name' => 'Indonesia', 
                                'img' => '/images/indonesia/viajes-a-indonesia-personalizados-bali.jpg'
                            ],
                            [
                                'name' => 'Colombia', 
                                'img' => '/images/colombia/viajes-a-colombia-personalizados-eje-cafetero-valle-de-cocora.jpg'
                            ],
                            [
                                'name' => 'Marruecos', 
                                'img' => '/images/marruecos/viajes-personalizados-ukiyo-marruecos-merzouga.jpg'
                            ],
                            [
                                'name' => 'Cuba', 
                                'img' => '/images/reviews/resena-carolina-carmen-cuba.jpg' // Placeholder or specific image if available
                            ],
                            [
                                'name' => 'Costa Rica', 
                                'img' => '/images/costarica/viajes-a-costa-rica-personalizados-monteverde.jpg'
                            ],
                        ];
                        foreach($regions_all as $r): 
                            $bg_image = get_template_directory_uri() . $r['img'];
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0 group">
                            <input type="checkbox" name="regions[]" value="<?php echo esc_attr($r['name']); ?>" class="peer sr-only">
                            
                            <!-- Background Image -->
                            <img src="<?php echo esc_url($bg_image); ?>" 
                                 alt="<?php echo esc_attr($r['name']); ?>" 
                                 class="absolute inset-0 w-full h-full object-cover opacity-20 transition-transform duration-500 group-hover:scale-110 z-0">

                            <div class="ukiyo-card-content relative z-10">
                                <span class="hidden mb-4"></span>
                                <span class="text-xl font-bold font-satoshi text-text-primary"><?php echo esc_html($r['name']); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- STEP 2: Duration -->
            <div class="form-step hidden flex flex-col h-full" data-step="2">
                <h3 class="text-4xl md:text-6xl font-satoshi text-text-primary mb-6 text-shadow">¿Cuánto tiempo tienes?</h3>
                <p class="text-text-secondary mb-8">Selecciona la duración ideal para tu viaje.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-col items-center lg:flex-row lg:flex-nowrap lg:overflow-x-auto lg:snap-x lg:snap-mandatory lg:items-start gap-6 pb-8 px-2 scrollbar-hide">
                        <?php 
                        $durations = [
                            ['val' => '1 semana', 'emoji' => ''],
                            ['val' => '10-12 días', 'emoji' => ''],
                            ['val' => '2 semanas', 'emoji' => ''],
                            ['val' => '3+ semanas', 'emoji' => '']
                        ];
                        foreach ($durations as $d): 
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="radio" name="duration" value="<?php echo esc_attr($d['val']); ?>" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="hidden mb-4"><?php echo $d['emoji']; ?></span>
                                <span class="text-xl font-bold font-satoshi text-text-primary"><?php echo esc_html($d['val']); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Travelers -->
            <div class="form-step hidden flex flex-col h-full" data-step="3">
                <h3 class="text-4xl md:text-6xl font-satoshi text-text-primary mb-6 text-shadow">¿Quiénes viajan?</h3>
                <p class="text-text-secondary mb-8">Cuéntanos con quién compartirás esta experiencia.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-col items-center lg:flex-row lg:flex-nowrap lg:overflow-x-auto lg:snap-x lg:snap-mandatory lg:items-start gap-6 pb-8 px-2 scrollbar-hide">
                        <?php 
                        $travelers = [
                            ['val' => 'Solo', 'label' => 'Solo/a', 'emoji' => ''],
                            ['val' => 'Pareja', 'label' => 'En Pareja', 'emoji' => ''],
                            ['val' => 'Amigos', 'label' => 'Con Amigos', 'emoji' => ''],
                            ['val' => 'Familia', 'label' => 'En Familia', 'emoji' => '']
                        ];
                        foreach ($travelers as $t): 
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="radio" name="travelers" value="<?php echo esc_attr($t['val']); ?>" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="hidden mb-4"><?php echo $t['emoji']; ?></span>
                                <span class="text-xl font-bold font-satoshi text-text-primary"><?php echo esc_html($t['label']); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- STEP 4: Pace -->
            <div class="form-step hidden flex flex-col h-full" data-step="4">
                <h3 class="text-4xl md:text-6xl font-satoshi text-text-primary mb-6 text-shadow">¿Qué ritmo prefieres?</h3>
                <p class="text-text-secondary mb-8">Elige la intensidad de tu viaje.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-col items-center lg:flex-row lg:flex-nowrap lg:overflow-x-auto lg:snap-x lg:snap-mandatory lg:items-start gap-6 pb-8 px-2 scrollbar-hide">
                        <?php 
                        $paces = [
                            ['val' => 'Relax', 'label' => 'Relax Total', 'desc' => 'Sin prisas, disfrutar del momento', 'emoji' => ''],
                            ['val' => 'Equilibrado', 'label' => 'Equilibrado', 'desc' => 'Un poco de todo, sin agobios', 'emoji' => ''],
                            ['val' => 'Intenso', 'label' => 'Non-stop', 'desc' => 'Verlo todo, dormir poco', 'emoji' => '']
                        ];
                        foreach ($paces as $p): 
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="radio" name="pace" value="<?php echo esc_attr($p['val']); ?>" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="hidden mb-4"><?php echo $p['emoji']; ?></span>
                                <span class="text-xl font-bold font-satoshi text-text-primary mb-2"><?php echo esc_html($p['label']); ?></span>
                                <span class="text-sm text-text-secondary font-normal"><?php echo esc_html($p['desc']); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>



            <!-- STEP 5: Styles -->
            <div class="form-step hidden flex flex-col h-full" data-step="5">
                <h3 class="text-4xl md:text-6xl font-satoshi text-text-primary mb-6 text-shadow">¿Qué estilo buscas?</h3>
                <p class="text-text-secondary mb-8">Selecciona lo que más te inspire. Puedes marcar varios.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-col items-center lg:flex-row lg:flex-nowrap lg:overflow-x-auto lg:snap-x lg:snap-mandatory lg:items-start gap-6 pb-8 px-2 scrollbar-hide">
                        <?php
                        $styles_all = ['Inmersión cultural','Naturaleza','Gastronomía','Aventura suave'];
                        foreach($styles_all as $s): 
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="checkbox" name="styles[]" value="<?php echo esc_attr($s); ?>" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="hidden mb-4"></span>
                                <span class="text-xl font-bold font-satoshi text-text-primary"><?php echo esc_html($s); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- STEP 6: Vibe -->
            <div class="form-step hidden flex flex-col h-full" data-step="6">
                <h3 class="text-4xl md:text-6xl font-satoshi text-text-primary mb-6 text-shadow">¿Cuál es el vibe?</h3>
                <p class="text-text-secondary mb-8">La esencia de tu viaje. Elige una o varias.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-col items-center lg:flex-row lg:flex-nowrap lg:overflow-x-auto lg:snap-x lg:snap-mandatory lg:items-start gap-6 pb-8 px-2 scrollbar-hide">
                        <?php
                        $vibes = [
                            'Conexión profunda' => '',
                            'Exploración creativa' => '',
                            'Aventura consciente' => '',
                            'Bienestar y calma' => '',
                            'Lujo discreto' => '',
                        ];
                        foreach($vibes as $label => $emoji): 
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="checkbox" name="trip_vibe[]" value="<?php echo esc_attr($label); ?>" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="hidden mb-4"><?php echo $emoji; ?></span>
                                <span class="text-xl font-bold font-satoshi text-text-primary"><?php echo esc_html($label); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>



            <!-- STEP 7: Contact -->
            <div class="form-step hidden flex flex-col h-full" data-step="7">
                <h3 class="text-4xl md:text-6xl font-satoshi text-text-primary mb-6 text-shadow">¡Último paso!</h3>
                <p class="text-text-secondary mb-8">Déjanos tus datos para contactarte.</p>
                
                <div class="space-y-6">
                    <h3 class="text-xl font-satoshi font-semibold text-text-primary border-b border-gray-200 pb-2">1. Tus datos</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-2">Nombre completo *</label>
                        <input type="text" name="traveller_name" required
                            value="<?php echo isset($_POST['traveller_name']) ? esc_attr($_POST['traveller_name']) : ''; ?>"
                            class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                            style="border-color: rgb(246, 207, 102); background-color: var(--color-background);"
                            placeholder="Tu nombre">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-2">Teléfono / WhatsApp</label>
                        <input type="tel" name="phone"
                            value="<?php echo isset($_POST['phone']) ? esc_attr($_POST['phone']) : ''; ?>"
                            class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                            style="border-color: rgb(246, 207, 102); background-color: var(--color-background);"
                            placeholder="+34 600 000 000">
                    </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-2">Email *</label>
                        <input type="email" name="email" required
                            value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>"
                            class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                            style="border-color: rgb(246, 207, 102); background-color: var(--color-background);"
                            placeholder="hola@ejemplo.com">
                    </div>
                </div>
                <br>
                <div class="pt-4">
                    <label class="flex items-start gap-3 cursor-pointer p-4 rounded-2xl border border-gray-100 bg-gray-50 hover:bg-gray-100 transition-colors">
                        <input type="checkbox" name="gdpr" value="1" required class="mt-1 w-5 h-5 text-primary border-gray-300 rounded-2xl focus:ring-primary">
                        <span class="text-sm text-gray-600">
                            Acepto la <a href="<?php echo esc_url( get_permalink( get_page_by_path('privacidad') ) ); ?>" class="text-primary underline font-bold">política de privacidad</a> y quiero que diseñéis mi viaje.
                        </span>
                    </label>
                </div>
            </div>

        </div>

        <!-- NAVIGATION FOOTER -->
        <div class="bg-background p-6 border-t flex justify-between items-center">
            <button type="button" id="prevBtn" class="hidden px-6 py-3 btn-primary text-text-secondary font-bold hover:text-primary transition-colors">
                ← Atrás
            </button>
            
            <button type="button" id="nextBtn" class="ml-auto px-8 py-3 rounded-full btn-primary text-text-secondary font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                Siguiente
            </button>

            <button type="submit" id="submitBtn" name="submit_action" value="email" class="hidden ml-auto px-8 py-3 rounded-full btn-primary text-text-secondary font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                Enviar ✨
            </button>
            <button type="submit" id="submitWhatsappBtn" name="submit_action" value="whatsapp" class="hidden ml-auto px-8 py-3 rounded-full btn-primary text-text-secondary font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all flex items-center gap-2">
                <img width="64" height="64" src="https://img.icons8.com/cotton/64/whatsapp--v4.png" alt="whatsapp--v4" class="w-6 h-6"/>
                Enviar y WhatsApp
            </button>
        </div>

        <style>
            .sr-only {
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0, 0, 0, 0);
                white-space: nowrap;
                border-width: 0;
            }

            .ukiyo-card-v2 {
                width: 300px;
                height: 120px; /* Mobile height */
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background: white;
                border: 2px solid #2b2b2b;
                border-radius: 1.5rem;
                cursor: pointer;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
            }

            .ukiyo-card-v2:hover {
                border-color: rgb(246, 207, 102);
                transform: translateY(-4px);
                box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.1);
            }

            @media (min-width: 1024px) {
                .ukiyo-card-v2 {
                    height: 300px;
                }
            }

            .ukiyo-card-content {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
                padding: 2rem;
                z-index: 10;
            }

            /* Selected State */
            .ukiyo-card-v2:has(input:checked) {
                border-color: rgb(246, 207, 102);
                background-color: #fffbf0; /* Light primary tint */
                box-shadow: 0 0 0 2px rgb(246, 207, 102);
            }

            .ukiyo-card-v2:has(input:checked) .ukiyo-card-content {
                transform: scale(1.05);
            }

            /* Scrollbar Hide */
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }
            .scrollbar-hide {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            /* Animations */
            .form-step {
                animation: fadeIn 0.5s ease-out;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('ukiyo-v2-form');
            const steps = Array.from(form.querySelectorAll('.form-step'));
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');
            const progressBar = document.getElementById('progress-bar');
            const stepCount = document.getElementById('step-count');
            
            let currentStep = 0;
            const totalSteps = steps.length;

            // Update UI based on current step
            function updateUI() {
                steps.forEach((step, index) => {
                    if (index === currentStep) {
                        step.classList.remove('hidden');
                        step.classList.add('active');
                    } else {
                        step.classList.add('hidden');
                        step.classList.remove('active');
                    }
                });

                // Progress Bar
                const progress = ((currentStep + 1) / totalSteps) * 100;
                progressBar.style.width = `${progress}%`;
                stepCount.textContent = `${currentStep + 1}/${totalSteps}`;

                // Buttons
                prevBtn.classList.toggle('hidden', currentStep === 0);
                
                if (currentStep === totalSteps - 1) {
                    nextBtn.classList.add('hidden');
                    submitBtn.classList.remove('hidden');
                    document.getElementById('submitWhatsappBtn').classList.remove('hidden'); // Show WhatsApp button
                } else {
                    nextBtn.classList.remove('hidden');
                    submitBtn.classList.add('hidden');
                    document.getElementById('submitWhatsappBtn').classList.add('hidden'); // Hide WhatsApp button
                }

                // Scroll to top of form
                form.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

            // Validation Logic
            function validateStep(stepIndex) {
                const currentStepEl = steps[stepIndex];
                const stepNum = parseInt(currentStepEl.dataset.step);
                
                // Steps 1-6: Card Selection (Mandatory)
                if (stepNum >= 1 && stepNum <= 6) {
                    const inputs = currentStepEl.querySelectorAll('input[type="radio"], input[type="checkbox"]');
                    // If there are inputs, check if at least one is checked
                    if (inputs.length > 0) {
                        const isChecked = Array.from(inputs).some(i => i.checked);
                        if (!isChecked) {
                            alert('Por favor, selecciona al menos una opción para continuar.');
                            return false;
                        }
                    }
                }

                // Step 7: Contact Info
                if (stepNum === 7) {
                    const requiredInputs = currentStepEl.querySelectorAll('input[required]');
                    let isValid = true;
                    requiredInputs.forEach(input => {
                        if (!input.value.trim() || (input.type === 'checkbox' && !input.checked)) {
                            isValid = false;
                            input.classList.add('border-red-500');
                        } else {
                            input.classList.remove('border-red-500');
                        }
                    });
                    if (!isValid) return false;
                }

                return true;
            }

            // Auto-advance on card selection
            function setupAutoAdvance() {
                steps.forEach((step, index) => {
                    const stepNum = parseInt(step.dataset.step);
                    
                    // Only for card selection steps (1-6), not the contact form
                    if (stepNum >= 1 && stepNum <= 6) {
                        const inputs = step.querySelectorAll('input[type="radio"], input[type="checkbox"]');
                        
                        inputs.forEach(input => {
                            input.addEventListener('change', () => {
                                // Skip auto-advance for checkboxes (steps 1 and 5) to allow multi-selection
                                if (input.type === 'checkbox') return;

                                // Small delay for better UX (let user see the selection)
                                setTimeout(() => {
                                    if (index === currentStep && currentStep < totalSteps - 1) {
                                        currentStep++;
                                        updateUI();
                                    }
                                }, 300);
                            });
                        });
                    }
                });
            }

            // Event Listeners
            nextBtn.addEventListener('click', () => {
                if (validateStep(currentStep)) {
                    let nextStepIndex = currentStep + 1;
                    if (nextStepIndex < totalSteps) {
                        currentStep = nextStepIndex;
                        updateUI();
                    }
                }
            });

            prevBtn.addEventListener('click', () => {
                if (currentStep > 0) {
                    let prevStepIndex = currentStep - 1;
                    currentStep = prevStepIndex;
                    updateUI();
                }
            });

            // Initialize
            updateUI();
            setupAutoAdvance();
        });
        </script>
      </form>
    </div>
  </div>
</section>

<!-- FAQ rápido / cierre -->
<section class="py-12 bg-background">
  <div class="container mx-auto px-6">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-display font-satoshi text-text-primary mb-6 reveal-on-scroll">¿Qué pasa después?</h2>
      <p class="text-xl text-text-secondary mb-8 opacity-90 reveal-on-scroll delay-100">
        Te respondemos en breve con preguntas afinadas y una propuesta inicial. Ajustamos contigo hasta que el viaje sea 100% tú. Sin turismo masivo, sin guías enlatadas. 💫
      </p>
    </div>
  </div>
</section>

<?php get_footer(); ?>