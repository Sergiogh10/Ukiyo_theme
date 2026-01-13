<?php
/**
 * Template Name: Formulario Alta Cliente
 * Description: Formulario de alta de clientes con diseño glassmorphism (estilo Viajes de Autor).
 */

if ( ! defined('ABSPATH') ) exit;

/**
 * ==========================
 * CONFIGURACIÓN
 * ==========================
 */

/**
 * ==========================
 * PROCESAMIENTO FORM
 * ==========================
 */
$sent = false;
$errors = [];
$success_msg = '';
$recipient = apply_filters('ukiyo_trip_form_recipient', 'info@viajesukiyo.com');

if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['ukiyo_client_nonce']) ) {

    // Anti-spam: honeypot
    if ( ! empty($_POST['ukiyo_pot']) ) {
        $errors[] = 'Error de validación.';
    }

    // Verifica nonce
    if ( ! wp_verify_nonce( $_POST['ukiyo_client_nonce'], 'ukiyo_client_submit' ) ) {
        $errors[] = 'Sesión no válida. Recarga e inténtalo de nuevo.';
    }

    // Verificación de bot básica (Honeypot + Nonce ya hecho arriba)

    // Recoge y sanea
    $nombre      = sanitize_text_field($_POST['nombre'] ?? '');
    $apellidos   = sanitize_text_field($_POST['apellidos'] ?? '');
    $dni         = sanitize_text_field($_POST['dni'] ?? '');
    $pasaporte   = sanitize_text_field($_POST['pasaporte'] ?? '');
    $caducidad   = sanitize_text_field($_POST['caducidad'] ?? '');
    $direccion   = sanitize_text_field($_POST['direccion'] ?? '');
    $localidad   = sanitize_text_field($_POST['localidad'] ?? '');
    $provincia   = sanitize_text_field($_POST['provincia'] ?? '');
    $cp          = sanitize_text_field($_POST['cp'] ?? '');
    $email       = sanitize_email($_POST['email'] ?? '');
    $telefono    = sanitize_text_field($_POST['telefono'] ?? '');
    $gdpr        = sanitize_text_field($_POST['gdpr'] ?? '');

    // Validaciones
    if ( empty($nombre) ) { $errors[] = 'Por favor, indícanos tu nombre.'; }
    if ( empty($email) || ! is_email($email) ) { $errors[] = 'Necesitamos un email válido.'; }
    if ( empty($gdpr) ) { $errors[] = 'Debes aceptar la política de privacidad.'; }

    // Envío
    if ( empty($errors) ) {
        $subject = sprintf('✨ Alta Nuevo Cliente - %s %s', $nombre, $apellidos);

        // Template HTML similar al de viajes autor
        $body = '
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alta Cliente</title>
</head>
<body style="margin:0;padding:0;font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,\'Helvetica Neue\',Arial,sans-serif;background-color:#f5f2ed;color:#2c2c2c;">
  <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#f5f2ed;padding:40px 20px;">
    <tr>
      <td align="center">
        <table cellpadding="0" cellspacing="0" border="0" width="600" style="max-width:600px;background-color:#ffffff;border-radius:24px;overflow:hidden;box-shadow:0 4px 20px rgba(139,69,19,0.08);">
          <tr>
            <td style="background:linear-gradient(135deg,#F6CF66 0%,#E8B48D 100%);padding:40px 40px 30px;text-align:center;">
              <h1 style="margin:0;font-size:32px;font-weight:700;color:#2c2c2c;letter-spacing:-0.5px;">✨ Alta Nuevo Cliente</h1>
            </td>
          </tr>

          <tr>
            <td style="padding:40px 40px 20px;">
              <div style="background-color:#fffbf0;border-left:4px solid #F6CF66;padding:20px;border-radius:12px;margin-bottom:30px;">
                <h2 style="margin:0 0 15px;font-size:20px;font-weight:600;color:#2c2c2c;">👤 Datos Personales</h2>
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                  <tr>
                    <td style="padding:8px 0;font-size:15px;color:#6b6b6b;width:40%;">Nombre Completo:</td>
                    <td style="padding:8px 0;font-size:15px;font-weight:600;color:#2c2c2c;">' . esc_html($nombre . ' ' . $apellidos) . '</td>
                  </tr>
                  <tr>
                    <td style="padding:8px 0;font-size:15px;color:#6b6b6b;">DNI / NIE:</td>
                    <td style="padding:8px 0;font-size:15px;font-weight:600;color:#2c2c2c;">' . esc_html($dni) . '</td>
                  </tr>
                  <tr>
                    <td style="padding:8px 0;font-size:15px;color:#6b6b6b;">Pasaporte:</td>
                    <td style="padding:8px 0;font-size:15px;font-weight:600;color:#2c2c2c;">' . esc_html($pasaporte) . ' (Cad: ' . esc_html($caducidad) . ')</td>
                  </tr>
                </table>
              </div>

              <div style="background-color:#f9f9f9;border-left:4px solid #cccccc;padding:20px;border-radius:12px;margin-bottom:30px;">
                <h2 style="margin:0 0 15px;font-size:20px;font-weight:600;color:#2c2c2c;">📍 Dirección</h2>
                <p style="margin:0 0 5px;font-size:15px;">' . esc_html($direccion) . '</p>
                <p style="margin:0;font-size:15px;">' . esc_html($cp . ' - ' . $localidad . ' (' . $provincia . ')') . '</p>
              </div>

              <div style="margin-bottom:30px;">
                <h2 style="margin:0 0 15px;font-size:20px;font-weight:600;color:#2c2c2c;border-bottom:2px solid #F6CF66;padding-bottom:10px;">📞 Contacto</h2>
                <p style="margin:0 0 5px;font-size:15px;"><strong>Email:</strong> <a href="mailto:' . esc_attr($email) . '" style="color:#2c2c2c;text-decoration:none;">' . esc_html($email) . '</a></p>
                <p style="margin:0;font-size:15px;"><strong>Teléfono:</strong> ' . esc_html($telefono) . '</p>
              </div>
            </td>
          </tr>

          <tr>
            <td style="background-color:#2c2c2c;padding:30px 40px;text-align:center;border-bottom-left-radius:24px;border-bottom-right-radius:24px;">
              <p style="margin:0;color:#F6CF66;font-size:14px;font-weight:600;">Viajes UKIYO</p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>';

        $headers = [];
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: Ukiyo Viajes <info@viajesukiyo.com>';
        $headers[] = 'MIME-Version: 1.0';
        if ( $email ) {
            $headers[] = 'Reply-To: ' . $nombre . ' <' . $email . '>';
        }

        $sent = wp_mail( $recipient, $subject, $body, $headers );

        if ( $sent ) {
            $success_msg = '¡Gracias! Hemos recibido tus datos correctamente.';
        } else {
            $errors[] = 'Hubo un problema al enviar los datos. Por favor intenta de nuevo.';
        }
    }
}

get_header();
?>

<main id="primary" class="bg-background relative min-h-screen">

  <!-- HERO STYLE -->
  <style>
    .hero-experiences { height: 50vh; }
    @media (min-width: 1024px) {
      .hero-experiences { height: auto !important; min-height: 50vh !important; }
    }
  </style>

  <section class="hero-experiences relative flex items-center justify-center overflow-hidden pt-32 pb-16 mb-12">
    <div class="absolute inset-0 w-full h-full">
      <img src="<?php echo get_template_directory_uri(); ?>/images/heroimages/viajes-autor-ukiyo-viajeros2.jpg"
           alt="Viajes de autor"
           class="w-full h-full object-cover mask-image"
           loading="eager" />
      <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-black/50"></div>
    </div>

    <div class="relative z-10 w-full">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
          <span class="inline-block px-4 py-2 btn-secondary backdrop-blur-sm text-white rounded-full text-sm font-satoshi font-medium mb-6 text-shadow">
            Registro
          </span>
          <h1 class="text-hero md:text-6xl lg:text-hero font-satoshi text-white mb-6 text-shadow">
            Alta de <span class="text-accent-300">Cliente</span>
          </h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
            Rellena este formulario con tus datos para formar parte de la familia Ukiyo.
          </p>
        </div>
      </div>
    </div>
  </section>

  <div class="container mx-auto px-6 pb-20 relative z-10">
    <div class="max-w-3xl mx-auto bg-white/80 backdrop-blur-md rounded-2xl shadow-xl border border-white/50 p-8 md:p-12">

      <?php if ( $sent ) : ?>
        <div class="text-center py-12">
          <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6" style="background-color: var(--color-surface); border: 2px solid rgb(246, 207, 102);">
            <svg class="w-10 h-10" style="color: var(--color-text-secondary); stroke: var(--color-text-secondary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <h3 class="text-3xl font-satoshi font-bold text-text-primary mb-4">¡Datos Recibidos!</h3>
          <p class="text-lg text-text-secondary mb-8"><?php echo esc_html($success_msg); ?></p>
          <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn-primary text-text-secondary inline-block">Volver al Inicio</a>
        </div>
      <?php else : ?>

        <?php if ( ! empty($errors) ) : ?>
          <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8 rounded-r">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
              </div>
              <div class="ml-3">
                <ul class="list-disc pl-5 space-y-1">
                  <?php foreach($errors as $err) : ?>
                    <li class="text-sm text-red-700"><?php echo esc_html($err); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        <?php endif; ?>



        <form action="" method="POST" class="space-y-8">
          <?php wp_nonce_field('ukiyo_client_submit', 'ukiyo_client_nonce'); ?>

          <!-- Honeypot -->
          <div style="display:none;">
            <label for="ukiyo_pot">No rellenar:</label>
            <input type="text" name="ukiyo_pot" id="ukiyo_pot" value="">
          </div>

          <!-- Datos Personales -->
          <div class="space-y-6">
            <h3 class="text-xl font-satoshi font-semibold text-text-primary border-b border-gray-200 pb-2">1. Datos Personales</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-text-primary mb-2">Nombre *</label>
                <input type="text" name="nombre" required
                       value="<?php echo isset($_POST['nombre']) ? esc_attr($_POST['nombre']) : ''; ?>"
                       class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                       style="border-color: rgb(246, 207, 102); background-color: var(--color-background);"
                       placeholder="Tu nombre">
              </div>
              <div>
                <label class="block text-sm font-medium text-text-primary mb-2">Apellidos *</label>
                <input type="text" name="apellidos" required
                       value="<?php echo isset($_POST['apellidos']) ? esc_attr($_POST['apellidos']) : ''; ?>"
                       class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                       style="border-color: rgb(246, 207, 102); background-color: var(--color-background);"
                       placeholder="Tus apellidos">
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-2">DNI / NIE</label>
                    <input type="text" name="dni"
                           value="<?php echo isset($_POST['dni']) ? esc_attr($_POST['dni']) : ''; ?>"
                           class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                           style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-2">Pasaporte</label>
                    <input type="text" name="pasaporte"
                           value="<?php echo isset($_POST['pasaporte']) ? esc_attr($_POST['pasaporte']) : ''; ?>"
                           class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                           style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-2">Caducidad</label>
                    <input type="text" name="caducidad"
                           value="<?php echo isset($_POST['caducidad']) ? esc_attr($_POST['caducidad']) : ''; ?>"
                           placeholder="DD/MM/AAAA"
                           class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                           style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
                </div>
            </div>
          </div>

          <!-- Dirección -->
          <div class="space-y-6">
            <h3 class="text-xl font-satoshi font-semibold text-text-primary border-b border-gray-200 pb-2">2. Dirección</h3>

            <div>
                <label class="block text-sm font-medium text-text-primary mb-2">Dirección Completa</label>
                <input type="text" name="direccion"
                       value="<?php echo isset($_POST['direccion']) ? esc_attr($_POST['direccion']) : ''; ?>"
                       class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                       style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-2">Localidad</label>
                    <input type="text" name="localidad"
                           value="<?php echo isset($_POST['localidad']) ? esc_attr($_POST['localidad']) : ''; ?>"
                           class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                           style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-2">Provincia</label>
                    <input type="text" name="provincia"
                           value="<?php echo isset($_POST['provincia']) ? esc_attr($_POST['provincia']) : ''; ?>"
                           class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                           style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-2">Código Postal</label>
                    <input type="text" name="cp"
                           value="<?php echo isset($_POST['cp']) ? esc_attr($_POST['cp']) : ''; ?>"
                           class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                           style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
                </div>
            </div>
          </div>

          <!-- Contacto -->
          <div class="space-y-6">
            <h3 class="text-xl font-satoshi font-semibold text-text-primary border-b border-gray-200 pb-2">3. Contacto</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-text-primary mb-2">Email *</label>
                <input type="email" name="email" required
                       value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>"
                       class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                       style="border-color: rgb(246, 207, 102); background-color: var(--color-background);"
                       placeholder="hola@ejemplo.com">
              </div>
              <div>
                <label class="block text-sm font-medium text-text-primary mb-2">Teléfono</label>
                <input type="tel" name="telefono"
                       value="<?php echo isset($_POST['telefono']) ? esc_attr($_POST['telefono']) : ''; ?>"
                       class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                       style="border-color: rgb(246, 207, 102); background-color: var(--color-background);"
                       placeholder="+34 600 000 000">
              </div>
            </div>
          </div>

          <!-- Legal -->
          <div class="pt-6 border-t border-gray-100 space-y-4">
            <label class="flex items-start gap-3 cursor-pointer group">
              <input type="checkbox" name="gdpr" required class="mt-1 rounded border-gray-300 text-primary focus:ring-primary" <?php checked(!empty($_POST['gdpr'])); ?>>
              <span class="text-sm text-text-secondary">
                He leído y acepto la <a href="<?php echo esc_url( home_url('/politica-de-privacidad') ); ?>" target="_blank" class="text-primary hover:underline">política de privacidad</a>.
              </span>
            </label>

            <!-- Texto Legal Completo -->
            <div class="text-xs text-slate-500 leading-relaxed space-y-2 text-justify bg-slate-50 p-4 rounded-lg">
                <p class="font-bold text-slate-700">Protección de Datos (RGPD)</p>
                <p>
                    De acuerdo con el Reglamento (UE) 2016/679, General de Protección de Datos (RGPD), y con la Ley Orgánica 3/2018, de Protección de Datos Personales y garantía de los derechos digitales, le informamos de que los datos facilitados serán tratados con la finalidad de gestionar administrativa y contractualmente su viaje, así como para enviarle comunicaciones relacionadas con los servicios contratados.
                </p>
                <p>
                    Los datos se conservarán mientras exista una relación contractual con usted o durante los plazos legalmente establecidos. No se cederán a terceros, salvo obligación legal.
                </p>
                <p>
                    Podrá ejercer sus derechos de acceso, rectificación, supresión, limitación del tratamiento, oposición y portabilidad enviando una solicitud a <strong class="text-slate-700">info@viajesukiyo.com</strong>.
                </p>
            </div>
          </div>



          <button type="submit"
                  class="w-full py-4 rounded-xl btn-primary text-text-secondary font-bold text-lg shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            Enviar Alta
          </button>

        </form>

      <?php endif; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>