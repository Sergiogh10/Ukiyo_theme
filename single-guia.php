<?php
if ( ! defined('ABSPATH') ) exit;
get_header();

$id = get_the_ID();
$exp_names = wp_get_post_terms($id,'experiencia',['fields'=>'names']);
$exp_badge = $exp_names ? $exp_names[0] : '';
$nivel_names = wp_get_post_terms($id,'nivel',['fields'=>'names']);
$nivel_txt_tax = $nivel_names ? $nivel_names[0] : '';

$temporada = get_post_meta($id,'guia_temporada',true);
$duracion_txt = get_post_meta($id,'guia_duracion_texto',true);
$ciudades = get_post_meta($id,'guia_ciudades',true);
$transporte = get_post_meta($id,'guia_transporte',true);
$grupo_max = get_post_meta($id,'guia_grupo_max',true);
$nivel_txt = get_post_meta($id,'guia_nivel_texto',true) ?: $nivel_txt_tax;
$idiomas = get_post_meta($id,'guia_idiomas',true);

function lines($key,$id){
  $txt = trim((string)get_post_meta($id,$key,true));
  if($txt==='') return [];
  return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/',$txt))));
}
function blocks($key,$id){
  $rows = lines($key,$id);
  $out = [];
  foreach($rows as $r){
    // "HORA — Título | Descripción | color"
    @list($hora,$rest) = array_map('trim', explode('—',$r,2));
    @list($titulo,$desc,$color) = array_map('trim', explode('|',$rest?:'',3));
    $out[] = ['hora'=>$hora,'titulo'=>$titulo,'desc'=>$desc,'color'=>strtolower($color?:'primary')];
  }
  return $out;
}
// images helper
function ph($key,$id,$fallback=''){
  $v = get_post_meta($id,$key,true);
  return $v ?: $fallback;
}
?>
<!-- Hero -->
<section class="py-16 bg-gradient-warm relative overflow-hidden">
  <div class="absolute inset-0">
    <?php if (has_post_thumbnail()): ?>
      <?php the_post_thumbnail('full',['class'=>'w-full h-full object-cover opacity-10']); ?>
    <?php endif; ?>
  </div>
  <div class="container mx-auto px-6 relative z-10">
    <div class="max-w-4xl mx-auto text-center">
      <div class="mb-6">
        <?php if($exp_badge): ?>
          <span class="inline-block bg-accent-100 text-accent px-3 py-1 rounded-full text-sm font-medium mb-4">
            <?php echo esc_html($exp_badge); ?>
          </span>
        <?php endif; ?>
        <div class="flex items-center justify-center space-x-4 mb-4">
          <?php if($duracion_txt): ?><span class="bg-white/90 text-text-primary px-3 py-1 rounded-full text-sm font-medium"><?php echo esc_html($duracion_txt); ?></span><?php endif; ?>
          <?php if($nivel_txt): ?><span class="bg-white/90 text-text-primary px-3 py-1 rounded-full text-sm font-medium">Nivel: <?php echo esc_html($nivel_txt); ?></span><?php endif; ?>
          <?php if($temporada): ?><span class="bg-white/90 text-text-primary px-3 py-1 rounded-full text-sm font-medium"><?php echo esc_html($temporada); ?></span><?php endif; ?>
        </div>
      </div>

      <h1 class="text-hero font-crimson text-white drop-shadow mb-6"><?php the_title(); ?></h1>

      <p class="text-xl text-text-secondary mb-8 max-w-3xl mx-auto leading-relaxed"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>"
                   class="btn-secondary">Personaliza tu Viaje</a>
      </div>
    </div>
  </div>
</section>

<!-- Quick Guide Overview -->
<section class="pt-8 pb-6 bg-white">
  <div class="container mx-auto px-6">
    <div class="max-w-6xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <div class="lg:col-span-1">
          <div class="bg-surface p-8 rounded-lg">
            <h3 class="text-xl font-crimson text-text-primary mb-6">Datos de la Guía</h3>
            <div class="space-y-4">
              <?php
              $stats = [
                'Duración' => $duracion_txt,
                'Ciudades' => $ciudades,
                'Transporte' => $transporte,
                'Grupo máximo' => $grupo_max,
                'Nivel físico' => $nivel_txt,
                'Idiomas' => $idiomas
              ];
              foreach($stats as $k=>$v){
                if(!$v) continue;
                echo '<div class="flex justify-between items-center py-2 border-b border-surface"><span class="text-text-secondary">'.esc_html($k).'</span><span class="font-medium text-text-primary">'.esc_html($v).'</span></div>';
              }
              ?>
            </div>
          </div>
        </div>

        <div class="lg:col-span-2">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php for($i=1;$i<=4;$i++):
              $t = get_post_meta($id,"hi{$i}_titulo",true);
              $d = get_post_meta($id,"hi{$i}_desc",true);
              $c = get_post_meta($id,"hi{$i}_color",true) ?: 'primary';
              if(!$t && !$d) continue;
              $bg = "bg-{$c}-50"; $pill = "bg-{$c}"; ?>
              <div class="<?php echo esc_attr($bg); ?> p-6 rounded-lg">
                <div class="w-12 h-12 <?php echo esc_attr($pill); ?> rounded-lg flex items-center justify-center mb-4">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/></svg>
                </div>
                <h4 class="font-crimson text-lg text-text-primary mb-3"><?php echo esc_html($t); ?></h4>
                <p class="text-text-secondary text-sm"><?php echo esc_html($d); ?></p>
              </div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Detailed Itinerary -->
<section class="pt-8 pb-6 bg-surface relative" id="itinerary">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-display font-crimson text-text-primary mb-4">Itinerario <span class="text-secondary">Detallado</span></h2>
        <p class="text-lg text-text-secondary">Cada día diseñado para maximizar la inmersión cultural.</p>
      </div>

      <?php for($d=1;$d<=3;$d++):
        $dt = get_post_meta($id,"d{$d}_titulo",true);
        $ds = get_post_meta($id,"d{$d}_sub",true);
        $blocks = blocks("d{$d}_bloques",$id);
        if(!$dt && !$ds && empty($blocks)) continue; ?>
        <div class="mb-12">
          <div class="flex items-center mb-8">
            <?php $dotClass = $d==1?'bg-primary':($d==2?'bg-secondary':'bg-accent'); ?>
            <div class="w-16 h-16 <?php echo esc_attr($dotClass); ?> rounded-full flex items-center justify-center mr-6">
              <span class="text-white font-bold text-xl"><?php echo $d; ?></span>
            </div>
            <div>
              <h3 class="text-2xl font-crimson text-text-primary"><?php echo esc_html($dt); ?></h3>
              <?php if($ds): ?><p class="text-text-secondary"><?php echo esc_html($ds); ?></p><?php endif; ?>
            </div>
          </div>

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <div class="space-y-6">
              <?php foreach($blocks as $b):
                $col = in_array($b['color'],['primary','secondary','accent']) ? $b['color'] : 'primary';
                echo '<div class="bg-white p-6 rounded-lg border-l-4 border-'.$col.'">';
                if($b['hora']) echo '<h4 class="font-semibold text-text-primary mb-2">'.esc_html($b['hora'].' - '.$b['titulo']).'</h4>';
                else echo '<h4 class="font-semibold text-text-primary mb-2">'.esc_html($b['titulo']).'</h4>';
                echo '<p class="text-text-secondary text-sm mb-0">'.esc_html($b['desc']).'</p>';
                echo '</div>';
              endforeach; ?>
            </div>
            <div class="space-y-4">
              <?php
              $im = ph("d{$d}_img_main",$id);
              $ia = ph("d{$d}_img_a",$id);
              $ib = ph("d{$d}_img_b",$id);
              if($im) echo '<img src="'.esc_url($im).'" class="w-full rounded-lg" alt="">';
              if($ia || $ib){
                echo '<div class="grid grid-cols-2 gap-2">';
                if($ia) echo '<img src="'.esc_url($ia).'" class="w-full rounded aspect-square object-cover" alt="">';
                if($ib) echo '<img src="'.esc_url($ib).'" class="w-full rounded aspect-square object-cover" alt="">';
                echo '</div>';
              }
              ?>
            </div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- Información práctica (resumen) -->
<section class="pt-8 pb-6 bg-white">
  <div class="container mx-auto px-6">
    <div class="max-w-6xl mx-auto">
      <div class="text-center mb-16">
        <h2 class="text-display font-crimson text-text-primary mb-4">Información <span class="text-primary">Práctica</span></h2>
        <p class="text-lg text-text-secondary">Todo lo que necesitas saber para vivir esta experiencia.</p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <div class="space-y-8">
          <div>
            <h3 class="text-xl font-crimson text-text-primary mb-6">Incluido en la Experiencia</h3>
            <div class="space-y-3">
              <?php foreach(lines('incluido_lista',$id) as $li): ?>
                <div class="flex items-start"><svg class="w-6 h-6 text-primary mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg><div class="text-text-secondary text-sm"><?php echo esc_html($li); ?></div></div>
              <?php endforeach; ?>
            </div>
          </div>
          <div>
            <h3 class="text-xl font-crimson text-text-primary mb-6">Para una Experiencia Óptima</h3>
            <div class="bg-accent-50 p-6 rounded-lg">
              <ul class="space-y-2 text-text-secondary text-sm">
                <?php foreach(lines('optimo_lista',$id) as $li): ?><li>• <?php echo esc_html($li); ?></li><?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>

        <div>
          <h3 class="text-xl font-crimson text-text-primary mb-6">Información de Contacto</h3>
          <div class="bg-white p-6 rounded-lg border border-surface">
            <div class="flex items-center mb-4">
              <?php $av = ph('contacto_avatar',$id); if($av): ?>
                <img src="<?php echo esc_url($av); ?>" alt="" class="w-12 h-12 rounded-full object-cover mr-4">
              <?php endif; ?>
              <div>
                <h4 class="font-medium text-text-primary"><?php echo esc_html(get_post_meta($id,'contacto_nombre',true)); ?></h4>
                <p class="text-text-secondary text-sm"><?php echo esc_html(get_post_meta($id,'contacto_rol',true)); ?></p>
              </div>
            </div>
            <div class="space-y-2 text-text-secondary text-sm">
              <?php
              $tel = get_post_meta($id,'contacto_tel',true);
              $mail= get_post_meta($id,'contacto_mail',true);
              $ig  = get_post_meta($id,'contacto_ig',true);
              if($tel)  echo '<div class="flex items-center"><span class="mr-2">📞</span>'.esc_html($tel).'</div>';
              if($mail) echo '<div class="flex items-center"><span class="mr-2">✉️</span>'.esc_html($mail).'</div>';
              if($ig)   echo '<div class="flex items-center"><span class="mr-2">📸</span>'.esc_html($ig).'</div>';
              ?>
            </div>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-12">
        <div>
          <h3 class="text-xl font-crimson text-text-primary mb-6">Qué Llevar</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <h4 class="font-medium text-text-primary mb-3">Ropa y Calzado</h4>
              <ul class="space-y-1 text-text-secondary text-sm">
                <?php foreach(lines('llevar_ropa',$id) as $li): ?><li>• <?php echo esc_html($li); ?></li><?php endforeach; ?>
              </ul>
            </div>
            <div>
              <h4 class="font-medium text-text-primary mb-3">Accesorios</h4>
              <ul class="space-y-1 text-text-secondary text-sm">
                <?php foreach(lines('llevar_acc',$id) as $li): ?><li>• <?php echo esc_html($li); ?></li><?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <div>
          <h3 class="text-xl font-crimson text-text-primary mb-6">Códigos Culturales</h3>
          <div class="space-y-4">
            <div class="bg-primary-50 p-4 rounded-lg">
              <h4 class="font-medium text-text-primary mb-2">En los Templos/Espacios Sagrados</h4>
              <ul class="text-text-secondary text-sm space-y-1">
                <?php foreach(lines('cod_templos',$id) as $li): ?><li>• <?php echo esc_html($li); ?></li><?php endforeach; ?>
              </ul>
            </div>
            <div class="bg-secondary-50 p-4 rounded-lg">
              <h4 class="font-medium text-text-primary mb-2">Con las Familias Locales</h4>
              <ul class="text-text-secondary text-sm space-y-1">
                <?php foreach(lines('cod_familias',$id) as $li): ?><li>• <?php echo esc_html($li); ?></li><?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-20 bg-gradient-secondary text-white">
  <div class="container mx-auto px-6 text-center">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-display font-crimson mb-6">¿Listo para el <span class="text-primary">viaje de tu vida</span>?</h2>
      <div class="hidden lg:block">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>"
                   class="btn-primary">Planifica tu Viaje</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer();
?>