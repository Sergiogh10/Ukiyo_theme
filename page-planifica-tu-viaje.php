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
    $trip_vibe    = isset($_POST['trip_vibe']) ? sanitize_text_field($_POST['trip_vibe']) : '';
    $notes        = isset($_POST['notes']) ? sanitize_textarea_field($_POST['notes']) : '';
    $gdpr         = isset($_POST['gdpr']) ? sanitize_text_field($_POST['gdpr']) : '';

    // Validaciones mínimas
    if ( empty($traveller_name) )   { $errors[] = 'Por favor, dinos tu nombre.'; }
    if ( empty($email) || ! is_email($email) ) { $errors[] = 'Necesitamos un email válido para contactarte.'; }
    if ( empty($gdpr) )   { $errors[] = 'Debes aceptar la política de privacidad.'; }

    if ( empty($errors) ) {
        // Construye el email
        $subject = sprintf('Nueva solicitud de viaje - %s', $traveller_name);
        $body_lines = [
            "Nombre: $traveller_name",
            "Email: $email",
            "WhatsApp/Telegram: $whatsapp",
            "País/ciudad: $country",
            "Duración prevista: $duration",
            "Presupuesto aprox.: $budget",
            "Nº viajeros: $travelers",
            "Ritmo del viaje (1-chill / 5-intenso): $pace",
            "Estilos de viaje: " . ( $styles ? implode(', ', $styles) : '—' ),
            "Intereses: " . ( $interests ? implode(', ', $interests) : '—' ),
            "Regiones de interés: " . ( $regions ? implode(', ', $regions) : '—' ),
            "Vibe del viaje: $trip_vibe",
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
            $success_msg = '¡Gracias! Hemos recibido tu info. Te escribiremos muy pronto para diseñar tu aventura';
        } else {
            $errors[] = 'Uy… no hemos podido enviar el correo. Inténtalo de nuevo en unos minutos.';
        }
    }
}

get_header();
?>

<!-- HERO / Intro -->
<section class="relative pt-24 pb-16 overflow-hidden bg-surface from-primary-50 via-accent-50 to-secondary-50">
  <div class="absolute inset-0 opacity-10 pointer-events-none">
    <svg class="w-full h-full" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <rect width="100%" height="100%" fill="url(#ukiyo-pattern)"/>
    </svg>
  </div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="max-w-3xl mx-auto text-center">
      <span class="inline-block bg-surface text-primary px-4 py-2 rounded-full text-sm font-satoshi mb-4">Planifica tu viaje</span>
      <h1 class="text-4xl sm:text-5xl lg:text-6xl font-crimson text-text-primary leading-tight mb-4">
        Cuéntanos <span class="text-transparent bg-surface from-primary via-secondary to-accent bg-clip-text">cómo viajas</span>
      </h1>
      <p class="text-lg text-text-secondary max-w-2xl mx-auto font-satoshi">
        Con estas preguntas rápidas te conocemos mejor y diseñamos una experiencia auténtica, sin turismo masivo. Es ameno, prometido
      </p>
    </div>
  </div>
</section>

<!-- FORM -->
<section class="py-12 bg-surface">
  <div class="container mx-auto px-6">
    <div class="max-w-5xl mx-auto">

      <?php if ( ! empty($errors) ) : ?>
        <div class="mb-6 rounded-xl border border-red-200 bg-surface p-4 text-red-800 font-satoshi">
          <ul class="list-disc pl-6">
            <?php foreach ($errors as $e): ?>
              <li><?php echo esc_html($e); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if ( $sent && $success_msg ) : ?>
        <div class="mb-8 rounded-2xl border border-success-200 bg-surface p-6 text-success-900 shadow-card">
          <p class="font-satoshi font-semibold"><?php echo esc_html($success_msg); ?></p>
        </div>
      <?php endif; ?>

      <!-- Progress Bar -->
      <div class="w-full max-w-5xl mx-auto mb-6 px-4">
        <div class="h-1 bg-surface rounded-full overflow-hidden">
          <div id="progress-bar" class="h-full bg-primary transition-all duration-500 ease-out" style="width: 10%"></div>
        </div>
        <div class="flex justify-between mt-2 text-xs font-medium text-gray-400 uppercase tracking-wider">
            <span>Progreso</span>
            <span id="step-count">1/10</span>
        </div>
      </div>

      <form method="post" id="ukiyo-v2-form" class="ukiyo-form w-full max-w-6xl mx-auto bg-surface rounded-3xl shadow-xl overflow-hidden relative min-h-[600px] flex flex-col">
        <?php wp_nonce_field('ukiyo_trip_submit', 'ukiyo_trip_nonce'); ?>
        <input type="text" name="ukiyo_pot" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />

        <!-- STEPS CONTAINER -->
        <div class="flex-grow bg-surface relative p-6 md:p-10 overflow-hidden">
            
            <!-- STEP 1: Regions -->
            <div class="form-step active flex flex-col h-full" data-step="1">
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Qué destino te llama?</h3>
                <p class="text-text-secondary mb-8">Desliza y elige uno o varios destinos para tu aventura.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide" style="-webkit-overflow-scrolling: touch;">
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
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Cuánto tiempo tienes?</h3>
                <p class="text-text-secondary mb-8">Selecciona la duración ideal para tu viaje.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
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
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Quiénes viajan?</h3>
                <p class="text-text-secondary mb-8">Cuéntanos con quién compartirás esta experiencia.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
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
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Qué ritmo prefieres?</h3>
                <p class="text-text-secondary mb-8">Elige la intensidad de tu viaje.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
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
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Qué estilo buscas?</h3>
                <p class="text-text-secondary mb-8">Selecciona lo que más te inspire.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
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
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Cuál es el vibe?</h3>
                <p class="text-text-secondary mb-8">La esencia de tu viaje.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
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
                            <input type="radio" name="trip_vibe" value="<?php echo esc_attr($label); ?>" class="peer sr-only">
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
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¡Último paso!</h3>
                <p class="text-text-secondary mb-8">Déjanos tus datos para contactarte.</p>
                
                <div class="max-w-2xl mx-auto w-full space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block rounded-2xl text-sm font-bold text-text-primary mb-2">Nombre completo *</label>
                            <input type="text" name="traveller_name" required class="w-full p-4 rounded-2xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20">
                        </div>
                        <div>
                            <label class="block rounded-2xl text-sm font-bold text-text-primary mb-2">Email *</label>
                            <input type="email" name="email" required class="w-full p-4 rounded-2xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20">
                        </div>
                        <!--<div>
                            <label class="block rounded-2xl text-sm font-bold text-text-primary mb-2">WhatsApp *</label>
                            <input type="text" name="whatsapp" required class="w-full p-4 rounded-2xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20">
                        </div>
                        <div>
                            <label class="block rounded-2xl text-sm font-bold text-text-primary mb-2">Ciudad / País</label>
                            <input type="text" name="country" class="w-full p-4 rounded-2xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20">
                        </div>-->
                    </div>

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

        </div>

        <!-- NAVIGATION FOOTER -->
        <div class="bg-gray-50 p-6 border-t border-gray-100 flex justify-between items-center">
            <button type="button" id="prevBtn" class="hidden px-6 py-3 text-gray-500 font-bold hover:text-primary transition-colors">
                ← Atrás
            </button>
            
            <button type="button" id="nextBtn" class="ml-auto px-8 py-3 rounded-full bg-primary text-white font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                Siguiente
            </button>

            <button type="submit" id="submitBtn" class="hidden ml-auto px-8 py-3 rounded-full bg-primary text-white font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                Enviar Solicitud ✨
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
                height: 300px;
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
                border-color: var(--color-primary);
                transform: translateY(-4px);
                box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.1);
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
                border-color: var(--color-primary);
                background-color: #fffbf0; /* Light primary tint */
                box-shadow: 0 0 0 2px var(--color-primary);
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
                } else {
                    nextBtn.classList.remove('hidden');
                    submitBtn.classList.add('hidden');
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