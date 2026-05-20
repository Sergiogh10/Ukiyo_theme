<?php
/**
 * Dynamic Template for Viaje de Autor posts
 * Pulls all content from custom meta fields
 */
get_header();
$uri = get_template_directory_uri();
$post_id = get_the_ID();

// Get all meta data
$hero_image = get_post_meta($post_id, 'hero_image', true) ?: $uri . '/images/heroimages/default-hero.jpg';
$hero_subtitle = get_post_meta($post_id, 'hero_subtitle', true);
$hero_tags = get_post_meta($post_id, 'hero_tags', true);
$hero_tags_arr = $hero_tags ? array_map('trim', explode(',', $hero_tags)) : [];

$expert_name = get_post_meta($post_id, 'expert_name', true);
$expert_title = get_post_meta($post_id, 'expert_title', true);
$expert_image = get_post_meta($post_id, 'expert_image', true);
$expert_quote = get_post_meta($post_id, 'expert_quote', true);
$expert_specialty = get_post_meta($post_id, 'expert_specialty', true);
$expert_focus = get_post_meta($post_id, 'expert_focus', true);

$duracion = get_post_meta($post_id, 'duracion_viaje', true);
$grupos = get_post_meta($post_id, 'grupos_viaje', true);
$precio_desde = get_post_meta($post_id, 'precio_desde', true);
$precio_final = get_post_meta($post_id, 'precio_final', true);
$precio_habitacion = get_post_meta($post_id, 'precio_habitacion', true);
$trip_includes = get_post_meta($post_id, 'trip_includes', true);
$trip_excludes = get_post_meta($post_id, 'trip_excludes', true);

$itinerary_json = get_post_meta($post_id, 'itinerary_days', true);
$itinerary = $itinerary_json ? json_decode($itinerary_json, true) : [];

$faq_json = get_post_meta($post_id, 'faq_items', true);
$faqs = $faq_json ? json_decode($faq_json, true) : [];
?>

<!-- Tailwind CDN with custom config -->
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: "#D4AF37", 
                    secondary: "#2E4A3D", 
                    "background-light": "#F9F9F7", 
                    "surface-light": "#FFFFFF",
                    "text-light": "#1A1A1A",
                },
                fontFamily: {
                    rowdies: ["Rowdies", "cursive"],
                    satoshi: ["Satoshi", "sans-serif"],
                },
            },
        },
    };
</script>

<style type="text/tailwindcss">
    @layer utilities {
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    }
    details > summary { list-style: none; }
    details > summary::-webkit-details-marker { display: none; }
    .itinerary-section { scroll-margin-top: 100px; }
    /* Carousel */
    .carousel { position: relative; overflow: hidden; }
    .carousel-track { display: flex; transition: transform 0.5s ease-in-out; }
    .carousel-slide { width: 100%; flex-shrink: 0; height: 100%; position: relative; }
    .carousel-slide img { margin: 0; display: block; width: 100%; height: 100%; object-fit: cover; }
    .carousel-btn { position: absolute; top: 50%; transform: translateY(-50%); z-index: 10; background: rgba(255,255,255,0.4); border: none; width: 32px; height: 32px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s; backdrop-filter: blur(2px); }
    .carousel-btn:hover { background: rgba(255,255,255,0.9); transform: translateY(-50%) scale(1.1); }
    .carousel-btn.prev { left: 8px; }
    .carousel-btn.next { right: 8px; }
    .carousel-dots { position: absolute; bottom: 16px; left: 50%; transform: translateX(-50%); display: flex; gap: 8px; z-index: 10; }
    .carousel-dot { width: 10px; height: 10px; border-radius: 50%; background: rgba(255,255,255,0.5); border: 2px solid white; cursor: pointer; transition: all 0.3s; }

    .carousel-dot.active { background: #D4AF37; border-color: #D4AF37; }
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
</style>

<div class="bg-background-light text-text-light font-satoshi antialiased selection:bg-primary selection:text-white transition-colors duration-300">

<!-- Header Hero -->
<header class="relative h-[80vh] w-full overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0">
        <img alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover" src="<?php echo esc_url($hero_image); ?>" loading="eager" fetchpriority="high" decoding="async"/>
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-background-light"></div>
    </div>
    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto mt-16">
        <?php
        ukiyo_render_breadcrumbs([
            'class'      => 'mb-6 justify-center text-white/80',
            'link_class' => 'text-white/80 hover:text-white transition-colors',
        ]);
        ?>
        <?php if (!empty($hero_tags_arr)) : ?>
        <div class="flex flex-wrap justify-center gap-3 mb-6">
            <?php foreach ($hero_tags_arr as $tag) : ?>
            <span class="px-4 py-1 rounded-full border border-white/30 bg-black/30 backdrop-blur-sm text-xs text-white uppercase tracking-widest"><?php echo esc_html($tag); ?></span>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <h1 class="text-6xl md:text-8xl font-rowdies text-white font-bold mb-2 text-shadow"><?php the_title(); ?></h1>
        <?php if ($hero_subtitle) : ?>
        <p class="text-3xl md:text-6xl lg:text-hero font-rowdies text-accent mb-6 text-shadow"><?php echo esc_html($hero_subtitle); ?></p>
        <?php endif; ?>
    </div>
</header>

<!-- Pricing Card -->
<div class="relative -mt-16 max-w-[95%] w-full mx-auto px-4 z-30">
    <div class="bg-white shadow-xl rounded-2xl p-6 md:p-8 flex flex-wrap justify-between items-center gap-6 border border-gray-100">
        <?php if ($duracion) : ?>
        <div class="flex items-center gap-4 flex-1 min-w-[150px]">
            <div class="p-3 bg-primary/10 rounded-full text-primary">
                <?php echo ukiyo_icon( 'schedule' ); ?>
            </div>
            <div>
                <h4 class="text-xs uppercase text-gray-500 font-bold tracking-wide">Duración</h4>
                <p class="font-rowdies text-lg text-gray-900"><?php echo esc_html($duracion); ?></p>
            </div>
        </div>
        <div class="w-px h-12 bg-gray-200 hidden md:block"></div>
        <?php endif; ?>
        
        <?php if ($grupos) : ?>
        <div class="flex items-center gap-4 flex-1 min-w-[150px]">
            <div class="p-3 bg-primary/10 rounded-full text-primary">
                <?php echo ukiyo_icon( 'groups' ); ?>
            </div>
            <div>
                <h4 class="text-xs uppercase text-gray-500 font-bold tracking-wide">Grupo</h4>
                <p class="font-rowdies text-lg text-gray-900"><?php echo esc_html($grupos); ?></p>
            </div>
        </div>
        <div class="w-px h-12 bg-gray-200 hidden md:block"></div>
        <?php endif; ?>
        
        <?php if ($precio_final) : ?>
        <div class="w-full md:w-auto flex items-center justify-center gap-6 bg-secondary/5 rounded-2xl p-4 md:px-8 border border-secondary/10">
            <div class="text-center md:text-left">
                <h4 class="text-xs uppercase text-secondary font-bold tracking-wide">Precio</h4>
                <p class="font-rowdies text-2xl md:text-3xl text-secondary font-bold"><?php echo esc_html($precio_final); ?></p>
                <span class="text-xs text-gray-500">por persona</span>
            </div>
            <a href="<?php echo esc_url( ukiyo_get_route_url( 'form_viaje_autor' ) ); ?>" class="bg-secondary text-white hover:bg-primary transition-all duration-300 px-4 py-3 md:px-8 md:py-4 rounded-full font-medium tracking-wide shadow-lg text-xs md:text-sm uppercase flex items-center gap-2 whitespace-nowrap">
                <?php echo ukiyo_icon( 'flight_takeoff', 'text-lg md:text-xl' ); ?>
                Reservar
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Main Content with Sidebar -->
<main class="relative flex flex-col lg:flex-row max-w-[1600px] mx-auto">
    
    <!-- Sidebar Navigation -->
    <aside class="lg:w-72 w-full lg:sticky lg:top-0 lg:h-screen bg-background-light z-20 border-r border-gray-200 p-8 flex flex-col justify-center overflow-y-auto hide-scrollbar">
        <p class="text-[10px] font-bold text-primary tracking-[0.3em] uppercase mb-8">Itinerario</p>
        <nav class="space-y-6">
            <?php if ($expert_name) : ?>
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all" href="#experto">
                <span class="w-8 h-8 rounded-full border border-primary/30 flex items-center justify-center text-[10px] group-hover:bg-primary group-hover:text-white transition-colors"><?php echo ukiyo_icon( 'person', 'text-sm' ); ?></span>
                <span>El Experto</span>
            </a>
            <?php endif; ?>
            
            <?php foreach ($itinerary as $index => $day) : 
                $day_num = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                $day_id = !empty($day['day_id']) ? $day['day_id'] : 'dia-' . ($index + 1);
            ?>
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all" href="#<?php echo esc_attr($day_id); ?>">
                <span class="w-8 h-8 rounded-full border border-primary/30 flex items-center justify-center text-[10px] group-hover:bg-primary group-hover:text-white transition-colors"><?php echo $day_num; ?></span>
                <span><?php echo esc_html($day['day_title']); ?></span>
            </a>
            <?php endforeach; ?>
            
            <?php 
            $has_includes = !empty($trip_includes) || !empty($trip_excludes);
            
            if ($has_includes) : ?>
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all pt-8 border-t border-gray-100" href="#includes">
                <?php echo ukiyo_icon( 'fact_check', 'text-xl text-primary' ); ?>
                <span>Lo que incluye</span>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($faqs)) : 
                $faq_class = 'group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all';
                if (!$has_includes) {
                    $faq_class .= ' pt-8 border-t border-gray-100';
                }
            ?>
            <a class="<?php echo esc_attr($faq_class); ?>" href="#faq">
                <?php echo ukiyo_icon( 'quiz', 'text-xl text-primary' ); ?>
                <span>Preguntas Frecuentes</span>
            </a>
            <?php endif; ?>
        </nav>
    </aside>

    <!-- Content Area -->
    <div class="flex-1">
        
        <?php if ($expert_name) : ?>
        <!-- Expert Section -->
        <section class="py-24 px-8 lg:px-20 border-b border-gray-100 bg-white" id="experto">
            <div class="max-w-4xl mx-auto">
                <div class="bg-background-light p-8 md:p-12 rounded-3xl border border-primary/10 flex flex-col md:flex-row items-center gap-10 shadow-sm">
                    <div class="flex-shrink-0">
                        <div class="w-48 h-48 rounded-full bg-white flex items-center justify-center border-4 border-white shadow-xl overflow-hidden relative">
                            <?php if ($expert_image) : ?>
                            <img src="<?php echo esc_url($expert_image); ?>" alt="<?php echo esc_attr($expert_name); ?>" class="w-full h-full object-cover"/>
                            <?php else : ?>
                            <span class="font-rowdies text-4xl text-primary font-bold"><?php echo esc_html(mb_substr($expert_name, 0, 2)); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="text-center md:text-left flex-1">
                        <h2 class="text-4xl md:text-5xl font-rowdies font-medium text-gray-900 mb-2"><?php echo esc_html($expert_name); ?></h2>
                        <?php if ($expert_title) : ?>
                        <p class="text-xs font-bold text-primary tracking-[0.2em] uppercase mb-6"><?php echo esc_html($expert_title); ?></p>
                        <?php endif; ?>
                        <?php if ($expert_quote) : ?>
                        <p class="text-gray-600 leading-relaxed font-light mb-8 italic">"<?php echo esc_html($expert_quote); ?>"</p>
                        <?php endif; ?>
                        <div class="flex flex-wrap justify-center md:justify-start gap-8">
                            <?php if ($expert_specialty) : ?>
                            <div class="flex items-center gap-3">
                                <?php echo ukiyo_icon( 'forest', 'text-primary' ); ?>
                                <div class="text-left">
                                    <span class="block text-[10px] font-bold uppercase tracking-wider text-gray-400">Especialidad</span>
                                    <span class="text-xs font-bold uppercase tracking-wider"><?php echo esc_html($expert_specialty); ?></span>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if ($expert_focus) : ?>
                            <div class="flex items-center gap-3">
                                <?php echo ukiyo_icon( 'photo_camera', 'text-primary' ); ?>
                                <div class="text-left">
                                    <span class="block text-[10px] font-bold uppercase tracking-wider text-gray-400">Enfoque</span>
                                    <span class="text-xs font-bold uppercase tracking-wider"><?php echo esc_html($expert_focus); ?></span>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php 
        // Itinerary Sections
        foreach ($itinerary as $index => $day) : 
            $day_id = !empty($day['day_id']) ? $day['day_id'] : 'dia-' . ($index + 1);
            $bg_class = $index % 2 === 0 ? 'bg-white' : 'bg-background-light';
            $flex_dir = $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse';
            $card_bg = $index % 2 === 0 ? 'bg-background-light' : 'bg-white';
            
            $images = !empty($day['day_images']) ? array_map('trim', explode(',', $day['day_images'])) : [];
            $images = !empty($day['day_images']) ? array_map('trim', explode(',', $day['day_images'])) : [];
            $icons = !empty($day['accommodation_icons']) ? array_map('trim', explode('|', $day['accommodation_icons'])) : [];
        ?>
        <section class="itinerary-section py-24 px-8 lg:px-20 border-b border-gray-100 <?php echo $bg_class; ?>" id="<?php echo esc_attr($day_id); ?>">
            <div class="max-w-7xl">
                <div class="flex flex-col <?php echo $flex_dir; ?> gap-12">
                    <div class="w-full md:w-2/3">
                        <?php if (!empty($day['day_label'])) : ?>
                        <span class="text-xs font-bold text-primary uppercase tracking-widest"><?php echo esc_html($day['day_label']); ?></span>
                        <?php endif; ?>
                        <h2 class="text-4xl font-rowdies font-bold mt-4 mb-8"><?php echo esc_html($day['day_title']); ?></h2>
                        
                        <?php if (!empty($day['day_intro'])) : ?>
                            <div class="prose prose-lg text-gray-600 mb-8">
                                <p><?php echo nl2br(esc_html($day['day_intro'])); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php 
                        // Normalize experiences data for backward compatibility
                        // If no experiences exist but we have old description/images, treat it as one experience
                        $experiences = !empty($day['experiences']) ? $day['experiences'] : [];
                        
                        if (empty($experiences) && (!empty($day['day_description']) || !empty($day['day_images']))) {
                            $experiences = [[
                                'title' => '',
                                'description' => isset($day['day_description']) ? $day['day_description'] : '',
                                'images' => isset($day['day_images']) ? $day['day_images'] : ''
                            ]];
                        }
                        
                        if (!empty($experiences)) : 
                            foreach ($experiences as $experience) : 
                                $exp_images = !empty($experience['images']) ? array_filter(array_map('trim', explode(',', $experience['images']))) : [];
                        ?>
                        
                        <!-- Experience Item -->
                        <div class="mb-8 last:mb-0">
                            <?php if (!empty($experience['title'])) : ?>
                            <h5 class="font-rowdies font-medium text-lg text-gray-900 mb-3"><?php echo esc_html($experience['title']); ?></h5>
                            <?php endif; ?>

                            <?php if (!empty($exp_images)) : ?>
                            <!-- Experience Carousel -->
                            <div class="carousel aspect-video mb-6 rounded-3xl" data-carousel>
                                <div class="carousel-track h-full">
                                    <?php foreach ($exp_images as $img) : ?>
                                    <div class="carousel-slide">
                                        <img alt="<?php echo esc_attr($experience['title']); ?>" class="w-full h-full object-cover" src="<?php echo esc_url($img); ?>"/>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php if (count($exp_images) > 1) : ?>
                                <button class="carousel-btn prev" aria-label="Anterior"><?php echo ukiyo_icon( 'chevron_left' ); ?></button>
                                <button class="carousel-btn next" aria-label="Siguiente"><?php echo ukiyo_icon( 'chevron_right' ); ?></button>
                                <div class="carousel-dots"></div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($experience['description'])) : ?>
                            <h4 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">La Experiencia</h4>
                            <p class="text-gray-600 leading-relaxed font-light mb-4"><?php echo esc_html($experience['description']); ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <?php endforeach; endif; ?>
                        

                    </div>
                    
                    <?php if (!empty($day['accommodation_name'])) : ?>
                    <div class="w-full md:w-1/3">
                        <div class="sticky top-24 <?php echo $card_bg; ?> p-8 rounded-3xl border border-primary/10 <?php echo $index % 2 !== 0 ? 'shadow-sm' : ''; ?>">
                            <h4 class="font-rowdies font-bold text-xl mb-6">Alojamiento</h4>
                            <div class="space-y-6">
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Nombre</p>
                                    <p class="text-sm font-medium"><?php echo esc_html($day['accommodation_name']); ?></p>
                                </div>
                                <?php if (!empty($day['accommodation_type'])) : ?>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Tipo</p>
                                    <p class="text-sm font-medium"><?php echo esc_html($day['accommodation_type']); ?></p>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty($day['accommodation_highlight'])) : ?>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Destacado</p>
                                    <p class="text-xs text-gray-500 leading-relaxed"><?php echo esc_html($day['accommodation_highlight']); ?></p>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty($icons)) : ?>
                                <div class="flex gap-2">
                                    <?php foreach ($icons as $icon) : ?>
                                    <?php echo ukiyo_icon( $icon, 'text-primary text-xl' ); ?>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endforeach; ?>

        <!-- Global Includes/Excludes Section -->
        <?php 
        $t_includes = $trip_includes ? array_filter(array_map('trim', preg_split('/[|\n\r]+/', $trip_includes))) : [];
        $t_excludes = $trip_excludes ? array_filter(array_map('trim', preg_split('/[|\n\r]+/', $trip_excludes))) : [];
        
        if (!empty($t_includes) || !empty($t_excludes)) : 
        ?>
        <section class="py-24 px-8 lg:px-20 border-b border-gray-100 bg-background-light" id="includes">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-rowdies font-bold text-center mb-16">Lo que incluye el viaje</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                    
                    <!-- Includes -->
                    <?php if (!empty($t_includes)) : ?>
                    <div class="bg-white p-8 rounded-3xl border border-green-100 shadow-sm relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-green-500"></div>
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 bg-green-50 text-green-700 rounded-full">
                                <?php echo ukiyo_icon( 'check', 'text-xl' ); ?>
                            </div>
                            <h3 class="font-rowdies font-bold text-xl text-gray-800">Incluido</h3>
                        </div>
                        <ul class="space-y-4">
                            <?php foreach ($t_includes as $item) : ?>
                            <li class="flex items-start gap-3">
                                <?php echo ukiyo_icon( 'check_circle', 'text-green-500 text-lg mt-0.5 flex-shrink-0' ); ?>
                                <span class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($item); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <!-- Excludes -->
                    <?php if (!empty($t_excludes)) : ?>
                    <div class="bg-white p-8 rounded-3xl border border-red-100 shadow-sm relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-red-500"></div>
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 bg-red-50 text-red-700 rounded-full">
                                <?php echo ukiyo_icon( 'close', 'text-xl' ); ?>
                            </div>
                            <h3 class="font-rowdies font-bold text-xl text-gray-800">No Incluido</h3>
                        </div>
                        <ul class="space-y-4">
                            <?php foreach ($t_excludes as $item) : ?>
                            <li class="flex items-start gap-3">
                                <?php echo ukiyo_icon( 'cancel', 'text-red-400 text-lg mt-0.5 flex-shrink-0' ); ?>
                                <span class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html($item); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php if (!empty($faqs)) : 
            $general_faqs = array_filter($faqs, fn($f) => ($f['category'] ?? 'general') === 'general');
            $doc_faqs = array_filter($faqs, fn($f) => ($f['category'] ?? '') === 'documentation');
        ?>

        <!-- FAQ Section -->
        <section class="py-24 px-8 lg:px-20 bg-white" id="faq">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-rowdies font-bold text-center mb-16">Preguntas Frecuentes</h2>
                
                <?php if (!empty($general_faqs)) : ?>
                <div class="mb-8">
                    <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">General</h4>
                    <div class="space-y-2">
                        <?php foreach ($general_faqs as $faq) : ?>
                        <details class="group bg-background-light rounded-2xl border border-gray-100 overflow-hidden">
                            <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition-colors">
                                <span class="font-medium"><?php echo esc_html($faq['question']); ?></span>
                                <?php echo ukiyo_icon( 'expand_more', 'text-primary group-open:rotate-180 transition-transform' ); ?>
                            </summary>
                            <div class="px-6 pb-6 text-sm text-gray-500 leading-relaxed">
                                <?php echo wp_kses_post($faq['answer']); ?>
                            </div>
                        </details>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($doc_faqs)) : ?>
                <div class="mb-8">
                    <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">Documentación y Precio</h4>
                    <div class="space-y-2">
                        <?php foreach ($doc_faqs as $faq) : ?>
                        <details class="group bg-background-light rounded-2xl border border-gray-100 overflow-hidden">
                            <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition-colors">
                                <span class="font-medium"><?php echo esc_html($faq['question']); ?></span>
                                <?php echo ukiyo_icon( 'expand_more', 'text-primary group-open:rotate-180 transition-transform' ); ?>
                            </summary>
                            <div class="px-6 pb-6 text-sm text-gray-500 leading-relaxed">
                                <?php echo wp_kses_post($faq['answer']); ?>
                            </div>
                        </details>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php
        $trip_destination_keys = function_exists( 'ukiyo_get_viaje_autor_destination_keys' )
            ? ukiyo_get_viaje_autor_destination_keys( $post_id )
            : [];
        $trip_related_keys     = $trip_destination_keys;

        if ( function_exists( 'ukiyo_render_viaje_autor_blog_resources_section' ) ) {
            ukiyo_render_viaje_autor_blog_resources_section( $post_id, 'bg-white' );
        }

        foreach ( $trip_destination_keys as $destination_key ) {
            $trip_related_keys = array_merge( $trip_related_keys, ukiyo_get_related_destination_keys( $destination_key ) );
        }

        if ( ! empty( $trip_related_keys ) ) {
            ukiyo_render_related_internal_links(
                [
                    'title'   => 'Otros viajes relacionados',
                    'eyebrow' => 'Destinos a medida',
                    'intro'   => 'Si esta experiencia encaja contigo, estos destinos amplían la misma línea de viaje con rutas privadas y diseño personalizado.',
                    'keys'    => $trip_related_keys,
                    'limit'   => 4,
                    'class'   => 'bg-background-light',
                ]
            );
        }
        ?>

    </div>
</main>

</div>

<!-- Carousel JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[data-carousel]').forEach(function(carousel) {
        const track = carousel.querySelector('.carousel-track');
        const slides = carousel.querySelectorAll('.carousel-slide');
        const prevBtn = carousel.querySelector('.carousel-btn.prev');
        const nextBtn = carousel.querySelector('.carousel-btn.next');
        const dotsContainer = carousel.querySelector('.carousel-dots');
        
        if (!track || slides.length === 0) return;
        
        let currentIndex = 0;
        const totalSlides = slides.length;
        
        if (dotsContainer) {
            slides.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.classList.add('carousel-dot');
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToSlide(index));
                dotsContainer.appendChild(dot);
            });
        }
        
        const dots = dotsContainer ? dotsContainer.querySelectorAll('.carousel-dot') : [];
        
        function updateDots() {
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }
        
        function goToSlide(index) {
            currentIndex = index;
            track.style.transform = `translateX(-${currentIndex * 100}%)`;
            updateDots();
        }
        
        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            goToSlide(currentIndex);
        }
        
        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            goToSlide(currentIndex);
        }
        
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        
        // Touch/Swipe support
        let startX = 0;
        carousel.addEventListener('touchstart', (e) => { 
            startX = e.touches[0].clientX; 
            resetAutoplay(); // Stop/Reset on touch
        }, { passive: true });
        
        carousel.addEventListener('touchend', (e) => {
            const diff = startX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 50) { diff > 0 ? nextSlide() : prevSlide(); }
        }, { passive: true });

        // Autoplay Logic
        let autoplayInterval = setInterval(nextSlide, 4000);

        function resetAutoplay() {
            clearInterval(autoplayInterval);
            autoplayInterval = setInterval(nextSlide, 4000);
        }

        // Reset on button clicks
        if (prevBtn) prevBtn.addEventListener('click', resetAutoplay);
        if (nextBtn) nextBtn.addEventListener('click', resetAutoplay);
        if (dotsContainer) dotsContainer.addEventListener('click', resetAutoplay);
    });
});
</script>

<?php get_footer(); ?>
