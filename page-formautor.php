<?php
/**
 * Template Name: Formulario Viaje Autor
 * Description: Formulario específico para interesados en Viajes de Autor.
 */

if ( ! defined('ABSPATH') ) exit;

/**


/**
 * ==========================
 * PROCESAMIENTO FORM
 * ==========================
 */
$sent = false;
$errors = [];
$success_msg = '';
$recipient = apply_filters('ukiyo_trip_form_recipient', 'info@viajesukiyo.com');

if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['ukiyo_autor_nonce']) ) {

    // Anti-spam: honeypot
    if ( ! empty($_POST['ukiyo_pot']) ) {
        $errors[] = 'Error de validación.';
    }

    // Verifica nonce
    if ( ! wp_verify_nonce( $_POST['ukiyo_autor_nonce'], 'ukiyo_autor_submit' ) ) {
        $errors[] = 'Sesión no válida. Recarga e inténtalo de nuevo.';
    }



    // Recoge y sanea
    $traveller_name  = isset($_POST['traveller_name']) ? sanitize_text_field($_POST['traveller_name']) : '';
    $email           = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone           = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $interested_trip = isset($_POST['interested_trip']) ? sanitize_text_field($_POST['interested_trip']) : '';
    $travelers       = isset($_POST['travelers']) ? intval($_POST['travelers']) : 1;
    $notes           = isset($_POST['notes']) ? sanitize_textarea_field($_POST['notes']) : '';
    $gdpr            = isset($_POST['gdpr']) ? sanitize_text_field($_POST['gdpr']) : '';

    // Validaciones
    if ( empty($traveller_name) ) { $errors[] = 'Por favor, indícanos tu nombre.'; }
    if ( empty($email) || ! is_email($email) ) { $errors[] = 'Necesitamos un email válido para contactarte.'; }
    if ( empty($gdpr) ) { $errors[] = 'Debes aceptar la política de privacidad.'; }

    // Envío
    if ( empty($errors) ) {
        $subject = sprintf('✨ Interés en Viaje de Autor - %s', $traveller_name);

        $body = '
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interés Viaje de Autor</title>
</head>
<body style="margin:0;padding:0;font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,\'Helvetica Neue\',Arial,sans-serif;background-color:#f5f2ed;color:#2c2c2c;">
  <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#f5f2ed;padding:40px 20px;">
    <tr>
      <td align="center">
        <table cellpadding="0" cellspacing="0" border="0" width="600" style="max-width:600px;background-color:#ffffff;border-radius:24px;overflow:hidden;box-shadow:0 4px 20px rgba(139,69,19,0.08);">
          <tr>
            <td style="background:linear-gradient(135deg,#F6CF66 0%,#E8B48D 100%);padding:40px 40px 30px;text-align:center;">
              <h1 style="margin:0;font-size:32px;font-weight:700;color:#2c2c2c;letter-spacing:-0.5px;">✨ Interés en Viaje de Autor</h1>
              <p style="margin:10px 0 0;font-size:16px;color:#2c2c2c;opacity:0.9;">Alguien quiere unirse a una de tus aventuras exclusivas</p>
            </td>
          </tr>

          <tr>
            <td style="padding:40px 40px 20px;">
              <div style="background-color:#fffbf0;border-left:4px solid #F6CF66;padding:20px;border-radius:12px;margin-bottom:30px;">
                <h2 style="margin:0 0 15px;font-size:20px;font-weight:600;color:#2c2c2c;">👤 Datos del Viajero</h2>
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                  <tr>
                    <td style="padding:8px 0;font-size:15px;color:#6b6b6b;width:40%;">Nombre:</td>
                    <td style="padding:8px 0;font-size:15px;font-weight:600;color:#2c2c2c;">' . esc_html($traveller_name) . '</td>
                  </tr>
                  <tr>
                    <td style="padding:8px 0;font-size:15px;color:#6b6b6b;">Email:</td>
                    <td style="padding:8px 0;font-size:15px;font-weight:600;color:#2c2c2c;">
                      <a href="mailto:' . esc_attr($email) . '" style="color:#2c2c2c;text-decoration:none;">' . esc_html($email) . '</a>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding:8px 0;font-size:15px;color:#6b6b6b;">Teléfono/WhatsApp:</td>
                    <td style="padding:8px 0;font-size:15px;font-weight:600;color:#2c2c2c;">' . esc_html($phone) . '</td>
                  </tr>
                </table>
              </div>

              <div style="margin-bottom:30px;">
                <h2 style="margin:0 0 15px;font-size:20px;font-weight:600;color:#2c2c2c;border-bottom:2px solid #F6CF66;padding-bottom:10px;">🗺️ Viaje de Interés</h2>
                <p style="margin:0 0 10px;font-size:15px;"><strong>Viaje seleccionado:</strong> ' . esc_html($interested_trip) . '</p>
                <p style="margin:0;font-size:15px;"><strong>Número de personas:</strong> ' . esc_html($travelers) . '</p>
              </div>

              <div style="margin-bottom:30px;">
                <h2 style="margin:0 0 15px;font-size:20px;font-weight:600;color:#2c2c2c;border-bottom:2px solid #F6CF66;padding-bottom:10px;">💬 Mensaje / Dudas</h2>
                <p style="margin:0;font-size:15px;line-height:1.6;color:#4a4a4a;">' . nl2br(esc_html($notes)) . '</p>
              </div>
            </td>
          </tr>

          <tr>
            <td style="background-color:#2c2c2c;padding:30px 40px;text-align:center;border-bottom-left-radius:24px;border-bottom-right-radius:24px;">
              <p style="margin:0;color:#F6CF66;font-size:14px;font-weight:600;">Viajes UKIYO</p>
              <p style="margin:5px 0 0;color:#888888;font-size:12px;">El arte de viajar despacio.</p>
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
            $headers[] = 'Reply-To: ' . $traveller_name . ' <' . $email . '>';
        }

        $sent = wp_mail( $recipient, $subject, $body, $headers );

        if ( $sent ) {
            $success_msg = '¡Gracias! Hemos recibido tu solicitud. Te contactaremos muy pronto para hablar sobre esta aventura.';
        } else {
            $errors[] = 'Hubo un problema al enviar el mensaje. Por favor intenta de nuevo.';
        }
    }
}

get_header();

// Consultar viajes de autor para el desplegable
$viajes_query = new WP_Query([
    'post_type'      => 'viaje_autor',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'title',
    'order'          => 'ASC',
]);
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
            Únete
          </span>
          <h1 class="text-hero md:text-6xl lg:text-hero font-satoshi text-white mb-6 text-shadow">
            Viajes con <span class="text-accent-300">Alma</span>
          </h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed text-shadow">
            Estás a un paso de vivir una experiencia única. Rellena este formulario y contactaremos contigo.
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
          <h3 class="text-3xl font-satoshi font-bold text-text-primary mb-4">¡Mensaje recibido!</h3>
          <p class="text-lg text-text-secondary mb-8"><?php echo esc_html($success_msg); ?></p>
          <a href="<?php echo esc_url( home_url('/viajes-de-autor') ); ?>" class="btn-primary text-text-secondary inline-block">Ver más viajes</a>
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
          <?php wp_nonce_field('ukiyo_autor_submit', 'ukiyo_autor_nonce'); ?>

          <!-- Honeypot -->
          <div style="display:none;">
            <label for="ukiyo_pot">No rellenar si eres humano:</label>
            <input type="text" name="ukiyo_pot" id="ukiyo_pot" value="">
          </div>

          <!-- Datos Personales -->
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
                <label class="block text-sm font-medium text-text-primary mb-2">Email *</label>
                <input type="email" name="email" required
                       value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>"
                       class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                       style="border-color: rgb(246, 207, 102); background-color: var(--color-background);"
                       placeholder="hola@ejemplo.com">
              </div>
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

          <!-- Datos del Viaje -->
          <div class="space-y-6">
            <h3 class="text-xl font-satoshi font-semibold text-text-primary border-b border-gray-200 pb-2">2. El viaje</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-text-primary mb-2">¿Qué viaje te interesa?</label>
                <div class="relative">
                  <select name="interested_trip"
                          class="h-[54px] w-full text-base rounded-2xl border-2 focus:border-primary focus:ring-primary px-4 bg-white/50 backdrop-blur-sm appearance-none transition-shadow"
                          style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
                    <option value="" disabled <?php echo empty($_POST['interested_trip']) ? 'selected' : ''; ?>>Selecciona una opción...</option>

                    <?php if ( $viajes_query->have_posts() ) : ?>
                      <?php while ( $viajes_query->have_posts() ) : $viajes_query->the_post(); ?>
                        <?php $t = get_the_title(); ?>
                        <option value="<?php echo esc_attr($t); ?>" <?php selected(($_POST['interested_trip'] ?? ''), $t); ?>>
                          <?php echo esc_html($t); ?>
                        </option>
                      <?php endwhile; ?>
                    <?php endif; ?>

                    <option value="Otro / No estoy seguro" <?php selected(($_POST['interested_trip'] ?? ''), 'Otro / No estoy seguro'); ?>>
                      Otro / Aún no lo sé
                    </option>
                  </select>
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium text-text-primary mb-2">Número de personas</label>
                <input name="travelers"
                       value="<?php echo isset($_POST['travelers']) ? esc_attr($_POST['travelers']) : ''; ?>"
                       placeholder="Escribe un número..."
                       class="h-[54px] w-full text-base rounded-2xl border-2 focus:border-primary focus:ring-primary px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                       style="border-color: rgb(246, 207, 102); background-color: var(--color-background);">
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-text-primary mb-2">¿Tienes alguna duda o comentario?</label>
              <textarea name="notes" rows="4"
                        class="w-full rounded-2xl border-2 focus:border-primary focus:ring-primary py-3 px-4 bg-white/50 backdrop-blur-sm transition-shadow"
                        style="border-color: rgb(246, 207, 102); background-color: var(--color-background);"
                        placeholder="Cuéntanos si tienes fechas preferidas, dudas sobre el itinerario, etc."><?php echo isset($_POST['notes']) ? esc_textarea($_POST['notes']) : ''; ?></textarea>
            </div>
          </div>

          <!-- Legal -->
          <div class="pt-4 border-t border-gray-100">
            <label class="flex items-start gap-3 cursor-pointer group">
              <input type="checkbox" name="gdpr" required class="mt-1 rounded border-gray-300 text-primary focus:ring-primary" <?php checked(!empty($_POST['gdpr'])); ?>>
              <span class="text-sm text-text-secondary">
                He leído y acepto la <a href="<?php echo esc_url( home_url('/politica-de-privacidad') ); ?>" target="_blank" class="text-primary hover:underline">política de privacidad</a>.
                Entiendo que mis datos se usarán para gestionar esta solicitud.
              </span>
            </label>
          </div>



          <button type="submit"
                  class="w-full py-4 rounded-xl btn-primary text-text-secondary font-bold text-lg shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            Enviar Solicitud
          </button>

        </form>

      <?php endif; ?>

      <?php wp_reset_postdata(); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>