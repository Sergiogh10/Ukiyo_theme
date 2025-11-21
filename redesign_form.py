#!/usr/bin/env python3
"""
Script to transform the old single-page form into a new multi-step redesigned form
"""

# Read the original file
with open('page-planifica-tu-viaje.php.backup', 'r', encoding='utf-8') as f:
    content = f.read()

# Find positions
form_start_pos = content.find('<form method="post" class="ukiyo-form')
form_end_pos = content.find('</form>', form_start_pos) + len('</form>')

# Extract parts
before_form = content[:form_start_pos]
after_form = content[form_end_pos:]

# The new multi-step redesigned form HTML
new_form = '''<!-- Google Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&family=Satoshi:wght@300;400;500;700&display=swap" rel="stylesheet">

      <!-- Progress Bar -->
      <div class="w-full max-w-3xl mx-auto mb-3">
        <div class="h-0.5 bg-gray-100 rounded-full overflow-hidden">
          <div id="progress-bar" class="h-full bg-gradient-to-r from-primary via-accent to-primary-dark transition-all duration-700 ease-out" style="width: 11%"></div>
        </div>
      </div>

      <form method="post" id="ukiyo-multistep-form" class="ukiyo-form bg-white/95 backdrop-blur-md rounded-3xl border border-gray-100 shadow-xl p-4 sm:p-6 relative max-w-3xl mx-auto">
        <?php wp_nonce_field('ukiyo_trip_submit', 'ukiyo_trip_nonce'); ?>
        <input type="text" name="ukiyo_pot" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />

        <!-- Step Indicator -->
        <div class="absolute top-3 right-4 text-[9px] font-bold text-gray-400 uppercase tracking-wider">
           <span id="step-count">1</span>/9
        </div>

        <!-- STEP 1: Regions -->
        <div class="form-step active" data-step="1">
          <h3 class="text-2xl md:text-3xl font-rowdies text-text-primary mb-5 text-center leading-tight">¿Qué destino te llama? 🌍</h3>
          <?php
          $regions_all = ['Indonesia','Colombia','Marruecos','Cuba','Costa Rica'];
          $regions_sel = isset($regions)? $regions : [];
          ?>
          <div class="grid grid-cols-5 gap-2">
            <?php foreach($regions_all as $r): ?>
              <label class="ukiyo-option group">
                <input type="checkbox" name="regions[]" value="<?php echo esc_attr($r); ?>" <?php checked(in_array($r,$regions_sel)); ?> class="sr-only peer">
                <span class="text-[11px] font-satoshi font-bold text-center"><?php echo esc_html($r); ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- STEP 2: Duration -->
        <div class="form-step hidden" data-step="2">
          <h3 class="text-2xl md:text-3xl font-rowdies text-text-primary mb-5 text-center leading-tight">¿Cuánto tiempo tienes? ⏳</h3>
          <?php $duration_sel = isset($duration) ? $duration : ''; ?>
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5">
            <?php 
              $durations = [
                ['val' => '1 semana', 'label' => '1 semana'],
                ['val' => '10-12 días', 'label' => '10-12 días'],
                ['val' => '2 semanas', 'label' => '2 semanas'],
                ['val' => '3+ semanas', 'label' => '3+ semanas']
              ];
              foreach ($durations as $d): 
            ?>
            <label class="ukiyo-option group">
              <input type="radio" name="duration" value="<?php echo esc_attr($d['val']); ?>" class="sr-only peer" <?php checked($duration_sel, $d['val']); ?>>
              <span class="text-xs font-satoshi font-bold text-center"><?php echo esc_html($d['label']); ?></span>
            </label>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- STEP 3: Travelers -->
        <div class="form-step hidden" data-step="3">
          <h3 class="text-2xl md:text-3xl font-rowdies text-text-primary mb-5 text-center leading-tight">¿Quiénes viajan? 👥</h3>
          <?php $travelers_sel = isset($travelers) ? $travelers : ''; ?>
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5">
             <?php 
              $traveler_opts = [
                ['val' => 'Solo', 'label' => 'Solo/a'],
                ['val' => 'Pareja', 'label' => 'En Pareja'],
                ['val' => 'Amigos', 'label' => 'Con Amigos'],
                ['val' => 'Familia', 'label' => 'En Familia']
              ];
              foreach ($traveler_opts as $t): 
            ?>
            <label class="ukiyo-option group">
              <input type="radio" name="travelers" value="<?php echo esc_attr($t['val']); ?>" class="sr-only peer" <?php checked($travelers_sel, $t['val']); ?>>
              <span class="text-xs font-satoshi font-bold text-center"><?php echo esc_html($t['label']); ?></span>
            </label>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- STEP 4: Pace -->
        <div class="form-step hidden" data-step="4">
          <h3 class="text-2xl md:text-3xl font-rowdies text-text-primary mb-5 text-center leading-tight">¿Qué ritmo prefieres? 🏃‍♂️</h3>
          <?php $pace_sel = isset($pace) ? $pace : ''; ?>
          <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 max-w-2xl mx-auto">
             <?php 
              $pace_opts = [
                ['val' => 'Relax', 'label' => 'Relax Total', 'desc' => 'Sin prisas'],
                ['val' => 'Equilibrado', 'label' => 'Equilibrado', 'desc' => 'Un poco de todo'],
                ['val' => 'Intenso', 'label' => 'Non-stop', 'desc' => 'A tope']
              ];
              foreach ($pace_opts as $p): 
            ?>
            <label class="ukiyo-option-tall group">
              <input type="radio" name="pace" value="<?php echo esc_attr($p['val']); ?>" class="sr-only peer" <?php checked($pace_sel, $p['val']); ?>>
              <span class="text-sm font-satoshi font-extrabold mb-0.5"><?php echo esc_html($p['label']); ?></span>
              <span class="text-[10px] font-satoshi text-gray-500"><?php echo esc_html($p['desc']); ?></span>
            </label>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- STEP 5: Driving -->
        <div class="form-step hidden" data-step="5">
          <h3 class="text-2xl md:text-3xl font-rowdies text-text-primary mb-5 text-center leading-tight">¿Te animas a conducir? 🚗</h3>
          <?php $drive_sel = isset($drive_abroad) ? $drive_abroad : ''; ?>
          <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 max-w-2xl mx-auto">
            <label class="ukiyo-option-tall group">
              <input type="radio" name="drive_abroad" value="si" class="sr-only peer" <?php checked($drive_sel, 'si'); ?>>
              <span class="text-sm font-satoshi font-bold">Sí, sin problema</span>
            </label>
            <label class="ukiyo-option-tall group">
              <input type="radio" name="drive_abroad" value="depende" class="sr-only peer" <?php checked($drive_sel, 'depende'); ?>>
              <span class="text-sm font-satoshi font-bold">Depende</span>
            </label>
            <label class="ukiyo-option-tall group">
              <input type="radio" name="drive_abroad" value="no" class="sr-only peer" <?php checked($drive_sel, 'no'); ?>>
              <span class="text-sm font-satoshi font-bold">No, gracias</span>
            </label>
          </div>
        </div>

        <!-- STEP 6: Vehicle (Conditional) -->
        <div class="form-step hidden" data-step="6">
           <h3 class="text-2xl md:text-3xl font-rowdies text-text-primary mb-5 text-center leading-tight">¿Qué vehículo prefieres? 🛵</h3>
           <?php $vehicle_sel = isset($vehicle_types) ? $vehicle_types : []; ?>
           <div class="grid grid-cols-2 gap-2.5 max-w-sm mx-auto">
             <?php
                $opts = [['value'=>'Coche'], ['value'=>'Moto 125cc']];
                foreach ($opts as $o):
                $checked = in_array($o['value'], $vehicle_sel, true);
             ?>
             <label class="ukiyo-option group">
                <input type="checkbox" name="vehicle_types[]" value="<?php echo esc_attr($o['value']); ?>" class="sr-only peer" <?php checked($checked); ?>>
                <span class="text-xs font-satoshi font-bold"><?php echo esc_html($o['value']); ?></span>
             </label>
             <?php endforeach; ?>
           </div>
        </div>

        <!-- STEP 7: Styles -->
        <div class="form-step hidden" data-step="7">
          <h3 class="text-2xl md:text-3xl font-rowdies text-text-primary mb-5 text-center leading-tight">¿Qué estilo buscas? ✨</h3>
          <?php
              $styles_all = ['Inmersión cultural','Naturaleza','Gastronomía','Aventura suave','Lujo con sentido','Roadtrip','Slow travel','Fotografía'];
              $styles_sel = isset($styles)? $styles : [];
          ?>
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
              <?php foreach($styles_all as $s): ?>
              <label class="ukiyo-option group">
                  <input type="checkbox" name="styles[]" value="<?php echo esc_attr($s); ?>" <?php checked(in_array($s,$styles_sel)); ?> class="sr-only peer">
                  <span class="text-[10px] sm:text-xs font-satoshi font-bold text-center leading-tight"><?php echo esc_html($s); ?></span>
              </label>
              <?php endforeach; ?>
          </div>
        </div>

        <!-- STEP 8: Vibe -->
        <div class="form-step hidden" data-step="8">
          <h3 class="text-2xl md:text-3xl font-rowdies text-text-primary mb-5 text-center leading-tight">¿Cuál es el vibe? 🔮</h3>
          <?php
          $vibes = [
          'Conexión profunda',
          'Exploración creativa',
          'Aventura consciente',
          'Bienestar y calma',
          'Lujo discreto',
          ];
          $vibe_sel = isset($trip_vibe)? $trip_vibe : '';
          ?>
          <div class="grid grid-cols-5 gap-2">
              <?php foreach($vibes as $label): ?>
              <label class="ukiyo-option group">
              <input type="radio" name="trip_vibe" value="<?php echo esc_attr($label); ?>" <?php checked($vibe_sel, $label); ?> class="sr-only peer">
              <span class="text-[10px] sm:text-[11px] font-satoshi font-bold text-center leading-tight"><?php echo esc_html($label); ?></span>
              </label>
              <?php endforeach; ?>
          </div>
        </div>

        <!-- STEP 9: Contact -->
        <div class="form-step hidden" data-step="9">
          <h3 class="text-2xl md:text-3xl font-rowdies text-text-primary mb-5 text-center leading-tight">¡Último paso! 🚀</h3>
          <div class="space-y-3.5 max-w-md mx-auto">
            <div>
              <label class="block text-xs font-satoshi font-bold text-text-primary mb-1.5">Email *</label>
              <input type="email" name="email" required class="w-full px-3 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-1 focus:ring-primary/20 font-satoshi text-sm transition-all" value="<?php echo isset($email)? esc_attr($email):''; ?>" placeholder="tucorreo@ejemplo.com" />
            </div>
            <div>
              <label class="block text-xs font-satoshi font-bold text-text-primary mb-1.5">Teléfono (WhatsApp) *</label>
              <input type="text" name="whatsapp" required class="w-full px-3 py-2.5 rounded-xl border border-gray-200 focus:border-primary focus:ring-1 focus:ring-primary/20 font-satoshi text-sm transition-all" value="<?php echo isset($whatsapp)? esc_attr($whatsapp):''; ?>" placeholder="+34 600 000 000" />
            </div>
            
            <div class="px-3 py-2.5 bg-gray-50 rounded-xl border border-gray-100">
              <label class="flex items-start gap-2 cursor-pointer">
                <input type="checkbox" name="gdpr" value="1" required <?php checked( isset($gdpr) && $gdpr ); ?> class="mt-0.5 w-3.5 h-3.5 text-primary border-gray-300 rounded focus:ring-primary">
                <span class="text-[10px] font-satoshi text-gray-600 leading-snug">
                  Acepto la <a href="<?php echo esc_url( get_permalink( get_page_by_path('privacidad') ) ); ?>" class="text-primary underline hover:text-primary-dark">política de privacidad</a>.
                </span>
              </label>
            </div>
          </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="mt-6 flex justify-between items-center gap-3">
          <button type="button" id="prevBtn" class="hidden text-gray-400 font-rowdies font-bold hover:text-primary transition-colors text-xs px-2 py-1.5">
            ← Volver
          </button>
          
          <button type="button" id="nextBtn" class="ml-auto px-6 py-2.5 rounded-full bg-gradient-to-r from-primary to-primary-dark text-white font-rowdies font-bold hover:shadow-lg hover:scale-[1.02] transition-all duration-300 text-base shadow-md">
            Siguiente
          </button>

          <button type="submit" id="submitBtn" class="hidden ml-auto px-6 py-2.5 rounded-full bg-gradient-to-r from-primary to-primary-dark text-white font-rowdies font-bold hover:shadow-lg hover:scale-[1.02] transition-all duration-300 text-base shadow-md">
            Enviar ✨
          </button>
        </div>

        <style>
          .font-rowdies { font-family: 'Rowdies', cursive; }
          .font-satoshi { font-family: 'Satoshi', sans-serif; }
          
          .ukiyo-option {
            @apply aspect-square flex flex-col items-center justify-center p-2.5 rounded-xl border border-gray-200 bg-white cursor-pointer transition-all duration-200;
          }
          
          .ukiyo-option:hover {
            @apply border-primary/40 shadow-sm scale-[1.01];
          }
          
          .ukiyo-option:has(input:checked) { 
            @apply border-primary bg-primary/5 shadow-sm;
          }
          
          .ukiyo-option span {
            @apply text-gray-700 transition-colors;
          }
          
          .ukiyo-option:hover span {
            @apply text-primary;
          }
          
          .ukiyo-option:has(input:checked) span {
            @apply text-primary font-extrabold;
          }
          
          .ukiyo-option-tall {
            @apply w-full flex flex-col items-center justify-center p-3.5 rounded-xl border border-gray-200 bg-white cursor-pointer transition-all duration-200 aspect-[5/3];
          }
          
          .ukiyo-option-tall:hover {
            @apply border-primary/40 shadow-sm scale-[1.01];
          }
          
          .ukiyo-option-tall:has(input:checked) { 
            @apply border-primary bg-primary/5 shadow-sm;
          }
          
          .ukiyo-option-tall span {
            @apply text-gray-700 text-center transition-colors;
          }
          
          .ukiyo-option-tall:hover span {
            @apply text-primary;
          }
          
          .ukiyo-option-tall:has(input:checked) span {
            @apply text-primary font-extrabold;
          }
          
          /* Animation for steps */
          .form-step { 
            animation: fadeInUp 0.4s cubic-bezier(0.16, 1, 0.3, 1); 
          }
          
          @keyframes fadeInUp { 
            from { opacity: 0; transform: translateY(12px); } 
            to { opacity: 1; transform: translateY(0); } 
          }
        </style>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
          const form = document.getElementById('ukiyo-multistep-form');
          const steps = Array.from(form.querySelectorAll('.form-step'));
          const prevBtn = document.getElementById('prevBtn');
          const nextBtn = document.getElementById('nextBtn');
          const submitBtn = document.getElementById('submitBtn');
          const progressBar = document.getElementById('progress-bar');
          const stepCount = document.getElementById('step-count');
          
          let currentStep = 0;
          const totalSteps = steps.length;

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

            const progress = ((currentStep + 1) / totalSteps) * 100;
            progressBar.style.width = `${progress}%`;
            stepCount.textContent = currentStep + 1;

            prevBtn.classList.toggle('hidden', currentStep === 0);
            
            if (currentStep === totalSteps - 1) {
              nextBtn.classList.add('hidden');
              submitBtn.classList.remove('hidden');
            } else {
              nextBtn.classList.remove('hidden');
              submitBtn.classList.add('hidden');
            }

            form.scrollIntoView({ behavior: 'smooth', block: 'center' });
          }

          function validateStep(stepIndex) {
            const currentStepEl = steps[stepIndex];
            const requiredInputs = currentStepEl.querySelectorAll('input[required], textarea[required], select[required]');
            let isValid = true;

            requiredInputs.forEach(input => {
              if (!input.value.trim() || (input.type === 'checkbox' && !input.checked)) {
                isValid = false;
                input.classList.add('border-red-400', 'ring-1', 'ring-red-400');
                input.addEventListener('input', function() {
                  this.classList.remove('border-red-400', 'ring-1', 'ring-red-400');
                }, { once: true });
              }
            });
            
            const emailInput = currentStepEl.querySelector('input[type="email"]');
            if (emailInput && emailInput.value && !emailInput.value.includes('@')) {
               isValid = false;
               emailInput.classList.add('border-red-400', 'ring-1', 'ring-red-400');
            }

            const stepId = parseInt(currentStepEl.dataset.step);
            const requiredSteps = [1, 2, 3, 4, 5, 8];
            
            if (requiredSteps.includes(stepId)) {
               const inputs = currentStepEl.querySelectorAll('input[type="radio"], input[type="checkbox"]');
               if (inputs.length > 0) {
                   const isChecked = Array.from(inputs).some(i => i.checked);
                   if (!isChecked) {
                       isValid = false;
                       const grid = currentStepEl.querySelector('.grid');
                       if(grid) {
                           grid.classList.add('animate-pulse', 'ring-1', 'ring-red-400', 'rounded-xl', 'p-1.5');
                           setTimeout(() => grid.classList.remove('animate-pulse', 'ring-1', 'ring-red-400', 'rounded-xl', 'p-1.5'), 800);
                       }
                   }
               }
            }

            return isValid;
          }

          function shouldSkipStep(stepIndex) {
             if (stepIndex === 5) {
                 const driveOption = document.querySelector('input[name="drive_abroad"]:checked');
                 if (driveOption && driveOption.value === 'no') {
                     return true;
                 }
             }
             return false;
          }

          nextBtn.addEventListener('click', () => {
            if (validateStep(currentStep)) {
              let nextStepIndex = currentStep + 1;
              
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
              
              if (shouldSkipStep(prevStepIndex)) {
                  prevStepIndex--;
              }
              
              currentStep = prevStepIndex;
              updateUI();
            }
          });

          updateUI();
        });
        </script>
      </form>'''

# Assemble the new file
new_content = before_form + new_form + after_form

# Write to the file
with open('page-planifica-tu-viaje.php', 'w', encoding='utf-8') as f:
    f.write(new_content)

print("✅ Form completed redesigned successfully!")
print(f"New file size: {len(new_content)} characters")
