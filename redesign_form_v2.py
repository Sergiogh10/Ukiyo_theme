#!/usr/bin/env python3
"""
Script to transform the form into V2 Multi-Step Redesign
"""

import os

# Read the original file (using the backup or current if backup exists)
source_file = 'page-planifica-tu-viaje.php'
if os.path.exists('page-planifica-tu-viaje.php.backup'):
    # If we have a backup, use it as source to ensure we have the original context if needed
    # But actually, the current file has the correct PHP header logic, so let's use the current file
    # and just replace the form section.
    pass

with open(source_file, 'r', encoding='utf-8') as f:
    content = f.read()

# Find positions to replace
# We look for the form start and end
form_start_marker = '<form method="post"'
form_end_marker = '</form>'

start_pos = content.find(form_start_marker)
# Find the closing tag of the form. 
# We need to be careful to find the matching closing tag if there are nested forms (unlikely here)
# or just the first closing tag after start.
end_pos = content.find(form_end_marker, start_pos) + len(form_end_marker)

# Also need to remove the progress bar if it exists outside the form from previous edit
# It was added before the form in previous edit: <div class="w-full max-w-3xl mx-auto mb-3">...</div>
# Let's look for "<!-- Progress Bar -->"
prog_start = content.find('<!-- Progress Bar -->')
if prog_start != -1 and prog_start < start_pos:
    # Adjust start_pos to include the progress bar section to replace it
    start_pos = prog_start

# Extract parts
before_form = content[:start_pos]
after_form = content[end_pos:]

# Define the new V2 Form HTML
new_form_html = '''<!-- Progress Bar -->
      <div class="w-full max-w-5xl mx-auto mb-6 px-4">
        <div class="h-1 bg-gray-100 rounded-full overflow-hidden">
          <div id="progress-bar" class="h-full bg-primary transition-all duration-500 ease-out" style="width: 10%"></div>
        </div>
        <div class="flex justify-between mt-2 text-xs font-medium text-gray-400 uppercase tracking-wider">
            <span>Progreso</span>
            <span id="step-count">1/10</span>
        </div>
      </div>

      <form method="post" id="ukiyo-v2-form" class="ukiyo-form w-full max-w-6xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden relative min-h-[600px] flex flex-col">
        <?php wp_nonce_field('ukiyo_trip_submit', 'ukiyo_trip_nonce'); ?>
        <input type="text" name="ukiyo_pot" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />

        <!-- STEPS CONTAINER -->
        <div class="flex-grow relative p-6 md:p-10 overflow-hidden">
            
            <!-- STEP 1: Regions -->
            <div class="form-step active flex flex-col h-full" data-step="1">
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Qué destino te llama? 🌍</h3>
                <p class="text-text-secondary mb-8">Desliza y elige uno o varios destinos para tu aventura.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide" style="-webkit-overflow-scrolling: touch;">
                        <?php
                        $regions_all = ['Indonesia','Colombia','Marruecos','Cuba','Costa Rica'];
                        foreach($regions_all as $r): 
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="checkbox" name="regions[]" value="<?php echo esc_attr($r); ?>" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="text-4xl mb-4">🗺️</span>
                                <span class="text-xl font-bold font-satoshi text-text-primary"><?php echo esc_html($r); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- STEP 2: Duration -->
            <div class="form-step hidden flex flex-col h-full" data-step="2">
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Cuánto tiempo tienes? ⏳</h3>
                <p class="text-text-secondary mb-8">Selecciona la duración ideal para tu viaje.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
                        <?php 
                        $durations = [
                            ['val' => '1 semana', 'emoji' => '⚡'],
                            ['val' => '10-12 días', 'emoji' => '📅'],
                            ['val' => '2 semanas', 'emoji' => '🏖️'],
                            ['val' => '3+ semanas', 'emoji' => '🚀']
                        ];
                        foreach ($durations as $d): 
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="radio" name="duration" value="<?php echo esc_attr($d['val']); ?>" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="text-4xl mb-4"><?php echo $d['emoji']; ?></span>
                                <span class="text-xl font-bold font-satoshi text-text-primary"><?php echo esc_html($d['val']); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Travelers -->
            <div class="form-step hidden flex flex-col h-full" data-step="3">
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Quiénes viajan? 👥</h3>
                <p class="text-text-secondary mb-8">Cuéntanos con quién compartirás esta experiencia.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
                        <?php 
                        $travelers = [
                            ['val' => 'Solo', 'label' => 'Solo/a', 'emoji' => '🎒'],
                            ['val' => 'Pareja', 'label' => 'En Pareja', 'emoji' => '💑'],
                            ['val' => 'Amigos', 'label' => 'Con Amigos', 'emoji' => '👯'],
                            ['val' => 'Familia', 'label' => 'En Familia', 'emoji' => '👨‍👩‍👧‍👦']
                        ];
                        foreach ($travelers as $t): 
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="radio" name="travelers" value="<?php echo esc_attr($t['val']); ?>" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="text-4xl mb-4"><?php echo $t['emoji']; ?></span>
                                <span class="text-xl font-bold font-satoshi text-text-primary"><?php echo esc_html($t['label']); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- STEP 4: Pace -->
            <div class="form-step hidden flex flex-col h-full" data-step="4">
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Qué ritmo prefieres? 🏃‍♂️</h3>
                <p class="text-text-secondary mb-8">Elige la intensidad de tu viaje.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
                        <?php 
                        $paces = [
                            ['val' => 'Relax', 'label' => 'Relax Total', 'desc' => 'Sin prisas, disfrutar del momento', 'emoji' => '🧘'],
                            ['val' => 'Equilibrado', 'label' => 'Equilibrado', 'desc' => 'Un poco de todo, sin agobios', 'emoji' => '⚖️'],
                            ['val' => 'Intenso', 'label' => 'Non-stop', 'desc' => 'Verlo todo, dormir poco', 'emoji' => '⚡']
                        ];
                        foreach ($paces as $p): 
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="radio" name="pace" value="<?php echo esc_attr($p['val']); ?>" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="text-4xl mb-4"><?php echo $p['emoji']; ?></span>
                                <span class="text-xl font-bold font-satoshi text-text-primary mb-2"><?php echo esc_html($p['label']); ?></span>
                                <span class="text-sm text-text-secondary font-normal"><?php echo esc_html($p['desc']); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- STEP 5: Driving -->
            <div class="form-step hidden flex flex-col h-full" data-step="5">
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Te animas a conducir? 🚗</h3>
                <p class="text-text-secondary mb-8">Para saber si incluir rutas por carretera.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="radio" name="drive_abroad" value="si" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="text-4xl mb-4">👍</span>
                                <span class="text-xl font-bold font-satoshi text-text-primary">Sí, sin problema</span>
                            </div>
                        </label>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="radio" name="drive_abroad" value="depende" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="text-4xl mb-4">🤔</span>
                                <span class="text-xl font-bold font-satoshi text-text-primary">Depende del lugar</span>
                            </div>
                        </label>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="radio" name="drive_abroad" value="no" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="text-4xl mb-4">🙅‍♂️</span>
                                <span class="text-xl font-bold font-satoshi text-text-primary">No, prefiero no</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- STEP 6: Vehicle (Conditional) -->
            <div class="form-step hidden flex flex-col h-full" data-step="6">
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Qué vehículo prefieres? 🛵</h3>
                <p class="text-text-secondary mb-8">Elige tu compañero de ruta.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="checkbox" name="vehicle_types[]" value="Coche" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="text-4xl mb-4">🚗</span>
                                <span class="text-xl font-bold font-satoshi text-text-primary">Coche</span>
                            </div>
                        </label>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="checkbox" name="vehicle_types[]" value="Moto 125cc" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="text-4xl mb-4">🛵</span>
                                <span class="text-xl font-bold font-satoshi text-text-primary">Moto 125cc</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- STEP 7: Styles -->
            <div class="form-step hidden flex flex-col h-full" data-step="7">
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Qué estilo buscas? ✨</h3>
                <p class="text-text-secondary mb-8">Selecciona lo que más te inspire.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
                        <?php
                        $styles_all = ['Inmersión cultural','Naturaleza','Gastronomía','Aventura suave','Lujo con sentido','Roadtrip','Slow travel','Fotografía'];
                        foreach($styles_all as $s): 
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="checkbox" name="styles[]" value="<?php echo esc_attr($s); ?>" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="text-4xl mb-4">✨</span>
                                <span class="text-xl font-bold font-satoshi text-text-primary"><?php echo esc_html($s); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- STEP 8: Vibe -->
            <div class="form-step hidden flex flex-col h-full" data-step="8">
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¿Cuál es el vibe? 🔮</h3>
                <p class="text-text-secondary mb-8">La esencia de tu viaje.</p>
                
                <div class="flex-grow flex items-center">
                    <div class="w-full flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-6 pb-8 px-2 scrollbar-hide">
                        <?php
                        $vibes = [
                            'Conexión profunda' => '💞',
                            'Exploración creativa' => '🎨',
                            'Aventura consciente' => '🧭',
                            'Bienestar y calma' => '🧘‍♀️',
                            'Lujo discreto' => '✨',
                        ];
                        foreach($vibes as $label => $emoji): 
                        ?>
                        <label class="ukiyo-card-v2 snap-center shrink-0">
                            <input type="radio" name="trip_vibe" value="<?php echo esc_attr($label); ?>" class="peer sr-only">
                            <div class="ukiyo-card-content">
                                <span class="text-4xl mb-4"><?php echo $emoji; ?></span>
                                <span class="text-xl font-bold font-satoshi text-text-primary"><?php echo esc_html($label); ?></span>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- STEP 9: Text Inputs -->
            <div class="form-step hidden flex flex-col h-full" data-step="9">
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">Cuéntanos más ✍️</h3>
                <p class="text-text-secondary mb-8">Detalles que marcan la diferencia.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto w-full">
                    <div>
                        <label class="block text-sm font-bold text-text-primary mb-3">Viajes previos que amaste</label>
                        <textarea name="prev_trips" rows="6" class="w-full p-4 rounded-2xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none" placeholder="Ej: Ruta por Bali en moto..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-text-primary mb-3">Notas o necesidades</label>
                        <textarea name="notes" rows="6" class="w-full p-4 rounded-2xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none" placeholder="Alergias, preferencias..."></textarea>
                    </div>
                </div>
            </div>

            <!-- STEP 10: Contact -->
            <div class="form-step hidden flex flex-col h-full" data-step="10">
                <h3 class="text-3xl md:text-4xl font-crimson text-text-primary mb-2">¡Último paso! 🚀</h3>
                <p class="text-text-secondary mb-8">Déjanos tus datos para contactarte.</p>
                
                <div class="max-w-2xl mx-auto w-full space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-text-primary mb-2">Nombre completo *</label>
                            <input type="text" name="traveller_name" required class="w-full p-4 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-text-primary mb-2">Email *</label>
                            <input type="email" name="email" required class="w-full p-4 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-text-primary mb-2">WhatsApp *</label>
                            <input type="text" name="whatsapp" required class="w-full p-4 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-text-primary mb-2">Ciudad / País</label>
                            <input type="text" name="country" class="w-full p-4 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20">
                        </div>
                    </div>

                    <div class="pt-4">
                        <label class="flex items-start gap-3 cursor-pointer p-4 rounded-xl border border-gray-100 bg-gray-50 hover:bg-gray-100 transition-colors">
                            <input type="checkbox" name="gdpr" value="1" required class="mt-1 w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary">
                            <span class="text-sm text-gray-600">
                                Acepto la <a href="#" class="text-primary underline font-bold">política de privacidad</a> y quiero que diseñéis mi viaje.
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
            .ukiyo-card-v2 {
                width: 300px;
                height: 300px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background: white;
                border: 2px solid #f3f4f6;
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
                
                // Steps 1-8: Card Selection (Mandatory)
                if (stepNum >= 1 && stepNum <= 8) {
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

                // Step 10: Contact Info (HTML5 validation handles this mostly, but let's be sure)
                if (stepNum === 10) {
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

            // Skip Logic (Vehicle Step)
            function shouldSkipStep(stepIndex) {
                // Step 6 is Vehicle. If Step 5 (Driving) is 'no', skip Step 6.
                // Note: stepIndex is 0-based. Step 6 is index 5.
                if (stepIndex === 5) { 
                    const driveOption = document.querySelector('input[name="drive_abroad"]:checked');
                    if (driveOption && driveOption.value === 'no') {
                        return true;
                    }
                }
                return false;
            }

            // Event Listeners
            nextBtn.addEventListener('click', () => {
                if (validateStep(currentStep)) {
                    let nextStepIndex = currentStep + 1;
                    
                    // Check for skip
                    if (nextStepIndex < totalSteps && shouldSkipStep(nextStepIndex)) {
                        nextStepIndex++;
                    }

                    if (nextStepIndex < totalSteps) {
                        currentStep = nextStepIndex;
                        updateUI();
                    }
                }
            });

            prevBtn.addEventListener('click', () => {
                if (currentStep > 0) {
                    let prevStepIndex = currentStep - 1;
                    
                    // Check for skip (backwards)
                    if (shouldSkipStep(prevStepIndex)) {
                        prevStepIndex--;
                    }
                    
                    currentStep = prevStepIndex;
                    updateUI();
                }
            });

            // Initialize
            updateUI();
        });
        </script>
      </form>'''

# Assemble the new file
new_content = before_form + new_form_html + after_form

# Write to the file
with open('page-planifica-tu-viaje.php', 'w', encoding='utf-8') as f:
    f.write(new_content)

print("✅ V2 Form Redesign Applied Successfully!")
