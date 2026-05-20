<?php
/**
 * Meta boxes para Viajes de Autor - Ukiyo Theme
 * Campos personalizados para crear páginas de viaje dinámicas
 */

if (!defined('ABSPATH')) exit;

/**
 * Registrar meta boxes
 */
add_action('add_meta_boxes', function () {
    // Hero Section
    add_meta_box(
        'viaje_autor_hero',
        '🖼️ Sección Hero',
        'ukiyo_render_hero_metabox',
        'viaje_autor',
        'normal',
        'high'
    );

    // Expert Section
    add_meta_box(
        'viaje_autor_expert',
        '👤 Autor / Guía Experto',
        'ukiyo_render_expert_metabox',
        'viaje_autor',
        'normal',
        'high'
    );

    // Pricing Section
    add_meta_box(
        'viaje_autor_pricing',
        '💰 Precio y Detalles',
        'ukiyo_render_pricing_metabox',
        'viaje_autor',
        'normal',
        'high'
    );

    // Itinerary Section
    add_meta_box(
        'viaje_autor_itinerary',
        '📅 Itinerario (Días)',
        'ukiyo_render_itinerary_metabox',
        'viaje_autor',
        'normal',
        'high'
    );

    // FAQ Section
    add_meta_box(
        'viaje_autor_faq',
        '❓ Preguntas Frecuentes',
        'ukiyo_render_faq_metabox',
        'viaje_autor',
        'normal',
        'default'
    );
});

/**
 * Estilos comunes para meta boxes
 */
function ukiyo_metabox_styles() {
    ?>
    <style>
        .ukiyo-metabox-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px; }
        .ukiyo-metabox-field { margin-bottom: 16px; }
        .ukiyo-metabox-field label { font-weight: 600; display: block; margin-bottom: 6px; color: #1e1e1e; }
        .ukiyo-metabox-field input[type="text"],
        .ukiyo-metabox-field input[type="url"],
        .ukiyo-metabox-field input[type="number"],
        .ukiyo-metabox-field textarea { width: 100%; padding: 8px 12px; border: 1px solid #8c8f94; border-radius: 4px; }
        .ukiyo-metabox-field textarea { min-height: 100px; resize: vertical; }
        .ukiyo-metabox-hint { font-size: 12px; color: #666; margin-top: 4px; }
        .ukiyo-metabox-row { display: flex; gap: 16px; flex-wrap: wrap; }
        .ukiyo-metabox-row > .ukiyo-metabox-field { flex: 1; min-width: 200px; }
        .ukiyo-media-preview { max-width: 200px; max-height: 150px; margin-top: 8px; border-radius: 8px; display: none; }
        .ukiyo-media-preview.has-image { display: block; }
        .ukiyo-repeater-item { background: #f0f0f0; padding: 16px; margin-bottom: 12px; border-radius: 8px; border: 1px solid #ddd; position: relative; }
        .ukiyo-repeater-item .remove-item { position: absolute; top: 8px; right: 8px; background: #d63638; color: white; border: none; border-radius: 4px; padding: 4px 8px; cursor: pointer; font-size: 12px; }
        .ukiyo-repeater-item .remove-item:hover { background: #b32d2e; }
        .ukiyo-add-item { margin-top: 12px; }
        .ukiyo-section-divider { border-top: 1px solid #ddd; margin: 20px 0; padding-top: 16px; }
        .ukiyo-collapsible-header { background: #2271b1; color: white; padding: 12px 16px; border-radius: 6px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
        .ukiyo-collapsible-header:hover { background: #135e96; }
        .ukiyo-collapsible-content { display: none; }
        .ukiyo-collapsible-content.open { display: block; }
        body.post-type-viaje_autor #postdivrich { display: none; }
    </style>
    <?php
}

/**
 * Render individual experience item (nested within itinerary day)
 */
function ukiyo_render_experience_item($day_index, $exp_index, $exp) {
    $exp = wp_parse_args($exp, [
        'title' => '',
        'description' => '',
        'images' => ''
    ]);
    ?>
    <div class="experience-item" style="background: #f9f9f9; padding: 16px; margin-bottom: 12px; border-radius: 8px; border: 1px solid #e0e0e0; position: relative;">
        <button type="button" class="remove-experience" style="position: absolute; top: 10px; right: 10px; background: #d63638; color: white; border: none; border-radius: 4px; padding: 4px 10px; cursor: pointer; font-size: 12px;">✕ Eliminar</button>
        
        <div class="ukiyo-metabox-field" style="margin-bottom: 12px;">
            <label>Título de la experiencia</label>
            <input type="text" name="itinerary[<?php echo $day_index; ?>][experiences][<?php echo $exp_index; ?>][title]" value="<?php echo esc_attr($exp['title']); ?>" placeholder="Título de esta experiencia" style="width: 100%;">
        </div>
        
        <div class="ukiyo-metabox-field" style="margin-bottom: 12px;">
            <label>Descripción de la experiencia</label>
            <textarea name="itinerary[<?php echo $day_index; ?>][experiences][<?php echo $exp_index; ?>][description]" placeholder="Describe la experiencia de este día..."><?php echo esc_textarea($exp['description']); ?></textarea>
        </div>
        
        <div class="ukiyo-metabox-field">
            <label>Imágenes de la experiencia</label>
            <input type="hidden" name="itinerary[<?php echo $day_index; ?>][experiences][<?php echo $exp_index; ?>][images]" class="experience-images-input" value="<?php echo esc_attr($exp['images']); ?>">
            <button type="button" class="button experience-gallery-upload">+ Añadir imágenes</button>
            <div class="experience-gallery-preview" style="display: flex; flex-wrap: wrap; gap: 8px; margin-top: 12px;">
                <?php 
                $img_str = is_string($exp['images']) ? $exp['images'] : '';
                if (!empty($img_str)) {
                    $images = array_filter(array_map('trim', explode(',', $img_str)));
                    foreach ($images as $img_url) {
                        echo '<div class="gallery-item" style="position: relative; width: 80px; height: 80px;">';
                        echo '<img src="' . esc_url($img_url) . '" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">';
                        echo '<button type="button" class="remove-experience-image" style="position: absolute; top: -6px; right: -6px; background: #d63638; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer; font-size: 10px; line-height: 1;">✕</button>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <p class="ukiyo-metabox-hint">Click para seleccionar múltiples imágenes de la biblioteca</p>
        </div>
    </div>
    <?php
}

/**
 * Builds an editorial body for SEO plugins from the same metabox fields that
 * power the visual template. The public template does not call the editor body,
 * but Rank Math/Yoast can analyze this synchronized content.
 */
function ukiyo_build_viaje_autor_seo_content( $post_id ) {
    if ( ! $post_id || 'viaje_autor' !== get_post_type( $post_id ) ) {
        return '';
    }

    $title         = get_the_title( $post_id );
    $subtitle      = get_post_meta( $post_id, 'hero_subtitle', true );
    $tags          = get_post_meta( $post_id, 'hero_tags', true );
    $expert_name   = get_post_meta( $post_id, 'expert_name', true );
    $expert_title  = get_post_meta( $post_id, 'expert_title', true );
    $expert_quote  = get_post_meta( $post_id, 'expert_quote', true );
    $duration      = get_post_meta( $post_id, 'duracion_viaje', true );
    $group         = get_post_meta( $post_id, 'grupos_viaje', true );
    $price         = get_post_meta( $post_id, 'precio_final', true ) ?: get_post_meta( $post_id, 'precio_desde', true );
    $includes      = get_post_meta( $post_id, 'trip_includes', true );
    $excludes      = get_post_meta( $post_id, 'trip_excludes', true );
    $focus_keyword = trim( (string) get_post_meta( $post_id, 'rank_math_focus_keyword', true ) );
    $itinerary_raw = get_post_meta( $post_id, 'itinerary_days', true );
    $faq_raw       = get_post_meta( $post_id, 'faq_items', true );
    $itinerary     = $itinerary_raw ? json_decode( $itinerary_raw, true ) : [];
    $faqs          = $faq_raw ? json_decode( $faq_raw, true ) : [];

    $parts = [];
    $parts[] = '<h2>' . esc_html( $title ) . '</h2>';

    $intro = trim( $title . '. ' . $subtitle );
    if ( $focus_keyword ) {
        $intro .= ' Si buscas ' . $focus_keyword . ', esta página reúne la ruta, el enfoque del viaje y los detalles prácticos para entender si encaja contigo.';
    }
    if ( $intro ) {
        $parts[] = '<p>' . esc_html( $intro ) . '</p>';
    }

    $detail_bits = array_filter( [ $duration, $group, $price, $tags ] );
    if ( ! empty( $detail_bits ) ) {
        $parts[] = '<p>Este viaje de autor se diseña con una estructura cuidada: ' . esc_html( implode( ', ', $detail_bits ) ) . '. La ruta combina acompañamiento experto, logística organizada y experiencias en destino con ritmo propio.</p>';
    }

    if ( $expert_name || $expert_title || $expert_quote ) {
        $expert_text = trim( $expert_name . ' ' . $expert_title . '. ' . $expert_quote );
        $parts[] = '<p>' . esc_html( $expert_text ) . '</p>';
    }

    if ( is_array( $itinerary ) && ! empty( $itinerary ) ) {
        $parts[] = '<h2>Itinerario del viaje</h2>';

        foreach ( $itinerary as $index => $day ) {
            $day_title = $day['day_title'] ?? '';
            $day_intro = $day['day_intro'] ?? '';
            $day_desc  = $day['day_description'] ?? '';

            if ( $day_title ) {
                $parts[] = '<h3>Día ' . esc_html( (string) ( $index + 1 ) ) . ': ' . esc_html( $day_title ) . '</h3>';
            }

            $day_text = trim( $day_intro . ' ' . $day_desc );
            if ( $day_text ) {
                $parts[] = '<p>' . esc_html( $day_text ) . '</p>';
            }

            if ( ! empty( $day['experiences'] ) && is_array( $day['experiences'] ) ) {
                foreach ( $day['experiences'] as $experience ) {
                    $experience_text = trim( ( $experience['title'] ?? '' ) . '. ' . ( $experience['description'] ?? '' ) );
                    if ( $experience_text ) {
                        $parts[] = '<p>' . esc_html( $experience_text ) . '</p>';
                    }
                }
            }

            if ( ! empty( $day['accommodation_name'] ) || ! empty( $day['accommodation_highlight'] ) ) {
                $parts[] = '<p>Alojamiento: ' . esc_html( trim( ( $day['accommodation_name'] ?? '' ) . '. ' . ( $day['accommodation_highlight'] ?? '' ) ) ) . '</p>';
            }
        }
    }

    if ( $includes ) {
        $parts[] = '<h2>Qué incluye el viaje</h2><p>' . esc_html( str_replace( '|', ', ', $includes ) ) . '</p>';
    }

    if ( $excludes ) {
        $parts[] = '<h2>Qué no incluye</h2><p>' . esc_html( str_replace( '|', ', ', $excludes ) ) . '</p>';
    }

    if ( is_array( $faqs ) && ! empty( $faqs ) ) {
        $parts[] = '<h2>Preguntas frecuentes</h2>';
        foreach ( $faqs as $faq ) {
            if ( ! empty( $faq['question'] ) ) {
                $parts[] = '<h3>' . esc_html( $faq['question'] ) . '</h3>';
            }
            if ( ! empty( $faq['answer'] ) ) {
                $parts[] = '<p>' . wp_kses_post( $faq['answer'] ) . '</p>';
            }
        }
    }

    if ( function_exists( 'ukiyo_get_viaje_autor_destination_keys' ) ) {
        $destination_keys = ukiyo_get_viaje_autor_destination_keys( $post_id );
        $destination_items = function_exists( 'ukiyo_get_destination_link_items' ) ? ukiyo_get_destination_link_items() : [];

        foreach ( $destination_keys as $destination_key ) {
            if ( empty( $destination_items[ $destination_key ] ) ) {
                continue;
            }

            $destination = $destination_items[ $destination_key ];
            $parts[] = '<p>Para ampliar la planificación, puedes consultar el <a href="' . esc_url( $destination['url'] ) . '">' . esc_html( strtolower( $destination['anchor'] ) ) . '</a> y las guías del destino.</p>';

            foreach ( ukiyo_get_destination_blog_post_slugs( $destination_key ) as $slug ) {
                $resource = get_page_by_path( $slug, OBJECT, 'post' );
                if ( $resource instanceof WP_Post && 'publish' === $resource->post_status ) {
                    $parts[] = '<p><a href="' . esc_url( get_permalink( $resource ) ) . '">' . esc_html( get_the_title( $resource ) ) . '</a></p>';
                }
            }
        }
    }

    return implode( "\n\n", array_filter( $parts ) );
}

function ukiyo_get_viaje_autor_generated_meta_description( $post_id ) {
    $title    = get_the_title( $post_id );
    $subtitle = get_post_meta( $post_id, 'hero_subtitle', true );
    $duration = get_post_meta( $post_id, 'duracion_viaje', true );
    $price    = get_post_meta( $post_id, 'precio_final', true ) ?: get_post_meta( $post_id, 'precio_desde', true );
    $focus_keyword = trim( (string) get_post_meta( $post_id, 'rank_math_focus_keyword', true ) );

    $description = trim( $title . ': ' . $subtitle );
    if ( $focus_keyword && false === stripos( $description, $focus_keyword ) ) {
        $description = $focus_keyword . ' - ' . $description;
    }
    if ( $duration || $price ) {
        $description .= '. ' . trim( $duration . ' ' . $price );
    }
    $description .= '. Viaje de autor diseñado por UKIYO con ruta cuidada, acompañamiento experto y experiencias auténticas.';

    return wp_trim_words( wp_strip_all_tags( $description ), 28, '' );
}

function ukiyo_sync_viaje_autor_seo_content( $post_id ) {
    $seo_content = ukiyo_build_viaje_autor_seo_content( $post_id );

    if ( '' === trim( wp_strip_all_tags( $seo_content ) ) ) {
        return;
    }

    $post = get_post( $post_id );
    if ( ! $post instanceof WP_Post ) {
        return;
    }

    $updates = [ 'ID' => $post_id ];

    if ( trim( (string) $post->post_content ) !== trim( $seo_content ) ) {
        $updates['post_content'] = $seo_content;
    }

    if ( ! has_excerpt( $post ) ) {
        $updates['post_excerpt'] = ukiyo_get_viaje_autor_generated_meta_description( $post_id );
    }

    $rank_math_description = get_post_meta( $post_id, 'rank_math_description', true );
    if ( '' === trim( (string) $rank_math_description ) ) {
        update_post_meta( $post_id, 'rank_math_description', ukiyo_get_viaje_autor_generated_meta_description( $post_id ) );
    }

    if ( count( $updates ) > 1 ) {
        wp_update_post( wp_slash( $updates ) );
    }
}



/**
 * Hero Section Metabox
 */
function ukiyo_render_hero_metabox($post) {
    wp_nonce_field('ukiyo_viaje_autor_nonce_action', 'ukiyo_viaje_autor_nonce');
    ukiyo_metabox_styles();
    
    $hero_image = get_post_meta($post->ID, 'hero_image', true);
    $hero_subtitle = get_post_meta($post->ID, 'hero_subtitle', true);
    $hero_tags = get_post_meta($post->ID, 'hero_tags', true);
    ?>
    <div class="ukiyo-metabox-grid">
        <div class="ukiyo-metabox-field">
            <label for="hero_image">Imagen de fondo del Hero</label>
            <input type="url" id="hero_image" name="hero_image" value="<?php echo esc_attr($hero_image); ?>" placeholder="URL de la imagen o usar botón...">
            <button type="button" class="button ukiyo-upload-image" data-target="hero_image">Seleccionar imagen</button>
            <img id="hero_image_preview" class="ukiyo-media-preview <?php echo $hero_image ? 'has-image' : ''; ?>" src="<?php echo esc_url($hero_image); ?>">
            <p class="ukiyo-metabox-hint">Imagen principal del viaje (recomendado: 1920x1080)</p>
        </div>
        <div class="ukiyo-metabox-field">
            <label for="hero_subtitle">Subtítulo del viaje</label>
            <input type="text" id="hero_subtitle" name="hero_subtitle" value="<?php echo esc_attr($hero_subtitle); ?>" placeholder="viaje a la biodiversidad más rica del planeta">
            <p class="ukiyo-metabox-hint">Texto cursiva bajo el título principal</p>
        </div>
        <div class="ukiyo-metabox-field">
            <label for="hero_tags">Etiquetas del Hero</label>
            <input type="text" id="hero_tags" name="hero_tags" value="<?php echo esc_attr($hero_tags); ?>" placeholder="11 Días, Grupos Reducidos, Plazas Limitadas">
            <p class="ukiyo-metabox-hint">Separadas por comas. Aparecen como badges sobre la imagen.</p>
        </div>
    </div>
    <?php
}

/**
 * Expert Section Metabox
 */
function ukiyo_render_expert_metabox($post) {
    $expert_name = get_post_meta($post->ID, 'expert_name', true);
    $expert_title = get_post_meta($post->ID, 'expert_title', true);
    $expert_image = get_post_meta($post->ID, 'expert_image', true);
    $expert_quote = get_post_meta($post->ID, 'expert_quote', true);
    $expert_specialty = get_post_meta($post->ID, 'expert_specialty', true);
    $expert_focus = get_post_meta($post->ID, 'expert_focus', true);
    ?>
    <div class="ukiyo-metabox-row">
        <div class="ukiyo-metabox-field">
            <label for="expert_name">Nombre del guía</label>
            <input type="text" id="expert_name" name="expert_name" value="<?php echo esc_attr($expert_name); ?>" placeholder="Luis Acuña">
        </div>
        <div class="ukiyo-metabox-field">
            <label for="expert_title">Título/Profesión</label>
            <input type="text" id="expert_title" name="expert_title" value="<?php echo esc_attr($expert_title); ?>" placeholder="Guía Costarricense & Fotógrafo">
        </div>
    </div>
    <div class="ukiyo-metabox-row">
        <div class="ukiyo-metabox-field">
            <label for="expert_image">Foto del guía</label>
            <input type="url" id="expert_image" name="expert_image" value="<?php echo esc_attr($expert_image); ?>" placeholder="URL de la imagen...">
            <button type="button" class="button ukiyo-upload-image" data-target="expert_image">Seleccionar imagen</button>
            <img id="expert_image_preview" class="ukiyo-media-preview <?php echo $expert_image ? 'has-image' : ''; ?>" src="<?php echo esc_url($expert_image); ?>">
        </div>
    </div>
    <div class="ukiyo-metabox-field">
        <label for="expert_quote">Cita del guía</label>
        <textarea id="expert_quote" name="expert_quote" placeholder="Texto inspiracional del guía..."><?php echo esc_textarea($expert_quote); ?></textarea>
    </div>
    <div class="ukiyo-metabox-row">
        <div class="ukiyo-metabox-field">
            <label for="expert_specialty">Especialidad</label>
            <input type="text" id="expert_specialty" name="expert_specialty" value="<?php echo esc_attr($expert_specialty); ?>" placeholder="Corcovado & Osa">
        </div>
        <div class="ukiyo-metabox-field">
            <label for="expert_focus">Enfoque</label>
            <input type="text" id="expert_focus" name="expert_focus" value="<?php echo esc_attr($expert_focus); ?>" placeholder="Fotografía Fauna">
        </div>
    </div>
    <?php
}

/**
 * Pricing Section Metabox
 */
function ukiyo_render_pricing_metabox($post) {
    $duracion_viaje = get_post_meta($post->ID, 'duracion_viaje', true);
    $grupos_viaje = get_post_meta($post->ID, 'grupos_viaje', true);
    $precio_desde = get_post_meta($post->ID, 'precio_desde', true);
    $precio_final = get_post_meta($post->ID, 'precio_final', true);
    $precio_habitacion = get_post_meta($post->ID, 'precio_habitacion', true);
    $trip_includes = get_post_meta($post->ID, 'trip_includes', true);
    $trip_excludes = get_post_meta($post->ID, 'trip_excludes', true);
    ?>
    <div class="ukiyo-metabox-row">
        <div class="ukiyo-metabox-field">
            <label for="duracion_viaje">Duración</label>
            <input type="text" id="duracion_viaje" name="duracion_viaje" value="<?php echo esc_attr($duracion_viaje); ?>" placeholder="11 días">
        </div>
        <div class="ukiyo-metabox-field">
            <label for="grupos_viaje">Tipo de grupo</label>
            <input type="text" id="grupos_viaje" name="grupos_viaje" value="<?php echo esc_attr($grupos_viaje); ?>" placeholder="Reducido">
        </div>
    </div>
    <div class="ukiyo-metabox-row">
        <div class="ukiyo-metabox-field">
            <label for="precio_final">Precio final (€)</label>
            <input type="text" id="precio_final" name="precio_final" value="<?php echo esc_attr($precio_final); ?>" placeholder="3.100€">
        </div>
    </div>
    <div class="ukiyo-metabox-row">
        <div class="ukiyo-metabox-field">
            <label for="trip_includes">Incluye (Global)</label>
            <textarea id="trip_includes" name="trip_includes" placeholder="Vuelos | Alojamiento | Guía..." style="width:100%;height:100px;"><?php echo esc_textarea($trip_includes); ?></textarea>
            <p class="ukiyo-metabox-hint">Separar items por salto de línea o barra vertical |</p>
        </div>
        <div class="ukiyo-metabox-field">
            <label for="trip_excludes">No Incluye (Global)</label>
            <textarea id="trip_excludes" name="trip_excludes" placeholder="Propinas | Seguro..." style="width:100%;height:100px;"><?php echo esc_textarea($trip_excludes); ?></textarea>
            <p class="ukiyo-metabox-hint">Separar items por salto de línea o barra vertical |</p>
        </div>
    </div>
    <?php
}

/**
 * Itinerary Section Metabox
 */
function ukiyo_render_itinerary_metabox($post) {
    $itinerary = get_post_meta($post->ID, 'itinerary_days', true);
    $itinerary = $itinerary ? json_decode($itinerary, true) : [];
    ?>
    <p class="ukiyo-metabox-hint" style="margin-bottom: 16px;">Añade cada día o sección del itinerario. Puedes añadir múltiples imágenes para el carrusel.</p>
    
    <div id="itinerary-repeater">
        <?php 
        if (!empty($itinerary)) {
            foreach ($itinerary as $index => $day) {
                ukiyo_render_itinerary_item($index, $day);
            }
        }
        ?>
    </div>
    
    <button type="button" class="button button-primary ukiyo-add-item" id="add-itinerary-day">+ Añadir día al itinerario</button>
    
    <script type="text/template" id="itinerary-template">
        <?php ukiyo_render_itinerary_item('__INDEX__', []); ?>
    </script>
    <?php
}

function ukiyo_render_itinerary_item($index, $day) {
    $day = wp_parse_args($day, [
        'day_label' => '',
        'day_title' => '',
        'day_id' => '',
        'day_description' => '',
        'day_intro' => '',
        'accommodation_name' => '',
        'accommodation_type' => '',
        'accommodation_highlight' => '',
        'accommodation_icons' => ''
    ]);
    ?>
    <div class="ukiyo-repeater-item" data-index="<?php echo $index; ?>">
        <button type="button" class="remove-item">✕ Eliminar</button>
        
        <div class="ukiyo-collapsible-header" onclick="this.nextElementSibling.classList.toggle('open')">
            <span class="day-title-preview"><?php echo $day['day_title'] ?: 'Nuevo día'; ?></span>
            <span>▼</span>
        </div>
        
        <div class="ukiyo-collapsible-content open">
            <div class="ukiyo-metabox-row">
                <div class="ukiyo-metabox-field">
                    <label>Etiqueta del día</label>
                    <input type="text" name="itinerary[<?php echo $index; ?>][day_label]" value="<?php echo esc_attr($day['day_label']); ?>" placeholder="Días 1-2 • Bosque Nuboso">
                </div>
                <div class="ukiyo-metabox-field">
                    <label>Título / Ubicación</label>
                    <input type="text" name="itinerary[<?php echo $index; ?>][day_title]" value="<?php echo esc_attr($day['day_title']); ?>" placeholder="San Gerardo de Dota" class="day-title-input">
                </div>
                <div class="ukiyo-metabox-field">
                    <label>ID para navegación</label>
                    <input type="text" name="itinerary[<?php echo $index; ?>][day_id]" value="<?php echo esc_attr($day['day_id']); ?>" placeholder="dia-1">
                    <p class="ukiyo-metabox-hint">Usado para el menú lateral (ej: dia-1, dia-2)</p>
                </div>
            </div>

            <div class="ukiyo-metabox-row">
                <div class="ukiyo-metabox-field" style="width: 100%;">
                    <label>Descripción general del día/sección</label>
                    <textarea name="itinerary[<?php echo $index; ?>][day_intro]" placeholder="Introducción o resumen general del día (opcional)..." style="width: 100%; height: 80px;"><?php echo esc_textarea(isset($day['day_intro']) ? $day['day_intro'] : ''); ?></textarea>
                </div>
            </div>
            
            <div class="ukiyo-section-divider">
                <strong>🎯 Experiencias del día</strong>
            </div>
            
            <div class="experiences-container" data-day-index="<?php echo $index; ?>">
                <?php 
                // MIGRATION / NORMALIZATION LOGIC
                // If we have old data (day_description/day_images) but no experiences, populate first experience
                $experiences = isset($day['experiences']) ? $day['experiences'] : [];
                
                if (empty($experiences) && (!empty($day['day_description']) || !empty($day['day_images']))) {
                     $experiences = [
                         [
                             'title' => '', // Default title for migrated content
                             'description' => isset($day['day_description']) ? $day['day_description'] : '',
                             'images' => isset($day['day_images']) ? $day['day_images'] : ''
                         ]
                     ];
                }

                if (!empty($experiences) && is_array($experiences)) {
                    foreach ($experiences as $exp_index => $exp) {
                        ukiyo_render_experience_item($index, $exp_index, $exp);
                    }
                }
                ?>
            </div>
            <button type="button" class="button add-experience" data-day-index="<?php echo $index; ?>" style="margin-bottom: 16px;">+ Añadir experiencia</button>

            <!-- Template for New Experience (Hidden Div to avoid nested script tags) -->
            <!-- Template for New Experience (Hidden Div to avoid nested script tags) -->
            <div id="experience-template-<?php echo $index; ?>" style="display:none;">
                <?php 
                    // Buffer output to add 'disabled' attribute to inputs
                    ob_start();
                    ukiyo_render_experience_item($index, '__EXP_INDEX__', []);
                    $exp_html = ob_get_clean();
                    // Add disabled attribute to all inputs, textareas, and selects
                    echo str_replace(
                        ['<input', '<textarea', '<select'],
                        ['<input disabled', '<textarea disabled', '<select disabled'],
                        $exp_html
                    );
                ?>
            </div>
            
            <div class="ukiyo-section-divider">
                <strong>🏨 Alojamiento</strong>
            </div>
            
            <div class="ukiyo-metabox-row">
                <div class="ukiyo-metabox-field">
                    <label>Nombre del alojamiento</label>
                    <input type="text" name="itinerary[<?php echo $index; ?>][accommodation_name]" value="<?php echo esc_attr($day['accommodation_name']); ?>" placeholder="Cabañas Mirian's">
                </div>
                <div class="ukiyo-metabox-field">
                    <label>Tipo</label>
                    <input type="text" name="itinerary[<?php echo $index; ?>][accommodation_type]" value="<?php echo esc_attr($day['accommodation_type']); ?>" placeholder="Cabañas de Montaña">
                </div>
            </div>
            <div class="ukiyo-metabox-row">
                <div class="ukiyo-metabox-field">
                    <label>Destacado</label>
                    <input type="text" name="itinerary[<?php echo $index; ?>][accommodation_highlight]" value="<?php echo esc_attr($day['accommodation_highlight']); ?>" placeholder="Rodeadas de bosque nuboso...">
                </div>
                <div class="ukiyo-metabox-field">
                    <label>Iconos Material (separados por |)</label>
                    <input type="text" name="itinerary[<?php echo $index; ?>][accommodation_icons]" value="<?php echo esc_attr($day['accommodation_icons']); ?>" placeholder="forest | wb_twilight">
                    <p class="ukiyo-metabox-hint"><a href="https://fonts.google.com/icons" target="_blank">Ver iconos disponibles</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * FAQ Section Metabox
 */
function ukiyo_render_faq_metabox($post) {
    $faqs = get_post_meta($post->ID, 'faq_items', true);
    $faqs = $faqs ? json_decode($faqs, true) : [];
    ?>
    <p class="ukiyo-metabox-hint" style="margin-bottom: 16px;">Añade las preguntas frecuentes para este viaje.</p>
    
    <div id="faq-repeater">
        <?php 
        if (!empty($faqs)) {
            foreach ($faqs as $index => $faq) {
                ukiyo_render_faq_item($index, $faq);
            }
        }
        ?>
    </div>
    
    <button type="button" class="button button-primary ukiyo-add-item" id="add-faq-item">+ Añadir pregunta</button>
    
    <script type="text/template" id="faq-template">
        <?php ukiyo_render_faq_item('__INDEX__', []); ?>
    </script>
    <?php
}

function ukiyo_render_faq_item($index, $faq) {
    $faq = wp_parse_args($faq, [
        'question' => '',
        'answer' => '',
        'category' => 'general'
    ]);
    ?>
    <div class="ukiyo-repeater-item" data-index="<?php echo $index; ?>">
        <button type="button" class="remove-item">✕ Eliminar</button>
        
        <div class="ukiyo-metabox-row">
            <div class="ukiyo-metabox-field" style="flex: 2;">
                <label>Pregunta</label>
                <input type="text" name="faq[<?php echo $index; ?>][question]" value="<?php echo esc_attr($faq['question']); ?>" placeholder="¿Puedo reservar como viaje privado?">
            </div>
            <div class="ukiyo-metabox-field" style="flex: 1;">
                <label>Categoría</label>
                <select name="faq[<?php echo $index; ?>][category]">
                    <option value="general" <?php selected($faq['category'], 'general'); ?>>General</option>
                    <option value="documentation" <?php selected($faq['category'], 'documentation'); ?>>Documentación y Precio</option>
                </select>
            </div>
        </div>
        <div class="ukiyo-metabox-field">
            <label>Respuesta</label>
            <textarea name="faq[<?php echo $index; ?>][answer]" placeholder="Respuesta a la pregunta..."><?php echo esc_textarea($faq['answer']); ?></textarea>
        </div>
    </div>
    <?php
}

/**
 * Guardar todos los campos meta
 */
add_action('save_post_viaje_autor', function ($post_id) {
    // Verificar nonce
    if (!isset($_POST['ukiyo_viaje_autor_nonce']) ||
        !wp_verify_nonce($_POST['ukiyo_viaje_autor_nonce'], 'ukiyo_viaje_autor_nonce_action')) {
        return;
    }

    // Evitar autosaves
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Verificar permisos
    if (!current_user_can('edit_post', $post_id)) return;

    // Campos simples (texto de una línea)
    $simple_fields = [
        'hero_image', 'hero_subtitle', 'hero_tags',
        'expert_name', 'expert_title', 'expert_image', 'expert_specialty', 'expert_focus',
        'duracion_viaje', 'grupos_viaje', 'precio_desde', 'precio_final', 'precio_habitacion'
    ];

    foreach ($simple_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field(wp_unslash($_POST[$field])));
        }
    }

    // Campos de texto (textarea)
    if (isset($_POST['expert_quote'])) {
        update_post_meta($post_id, 'expert_quote', sanitize_textarea_field(wp_unslash($_POST['expert_quote'])));
    }

    // Global Includes/Excludes (Textarea)
    if (isset($_POST['trip_includes'])) update_post_meta($post_id, 'trip_includes', sanitize_textarea_field(wp_unslash($_POST['trip_includes'])));
    if (isset($_POST['trip_excludes'])) update_post_meta($post_id, 'trip_excludes', sanitize_textarea_field(wp_unslash($_POST['trip_excludes'])));

    // Itinerario (array -> JSON)
    if (isset($_POST['itinerary']) && is_array($_POST['itinerary'])) {
        $itinerary_raw = wp_unslash($_POST['itinerary']);
        $itinerary = [];
        foreach ($itinerary_raw as $day) {
            $clean_day = [];
            foreach ($day as $key => $val) {
                if ($key === 'experiences' && is_array($val)) {
                    $clean_exps = [];
                    foreach ($val as $exp_key => $exp) {
                        // Skip template placeholder if it somehow gets submitted
                        if ($exp_key === '__EXP_INDEX__') continue;
                        // Sanitize each field in experience
                        $clean_exp = [];
                        foreach ($exp as $e_key => $e_val) {
                             $clean_exp[$e_key] = sanitize_textarea_field($e_val);
                        }
                        $clean_exps[] = $clean_exp;
                    }
                    $clean_day[$key] = $clean_exps;
                } else {
                    // Handle scalar values safely
                    $clean_day[$key] = is_array($val) ? '' : sanitize_textarea_field($val);
                }
            }
            $itinerary[] = $clean_day;
        }
        update_post_meta($post_id, 'itinerary_days', json_encode($itinerary, JSON_UNESCAPED_UNICODE));
    } else {
        delete_post_meta($post_id, 'itinerary_days');
    }

    // FAQs (array -> JSON)
    if (isset($_POST['faq']) && is_array($_POST['faq'])) {
        $faqs_raw = wp_unslash($_POST['faq']);
        $faqs = [];
        foreach ($faqs_raw as $faq) { 
            $clean_faq = []; 
            foreach ($faq as $key => $val) {
                // Sanitize each field of the FAQ item
                $clean_faq[$key] = sanitize_textarea_field($val);
            }
            $faqs[] = $clean_faq; 
        }
        update_post_meta($post_id, 'faq_items', json_encode($faqs, JSON_UNESCAPED_UNICODE));
    } else {
        delete_post_meta($post_id, 'faq_items');
    }

    ukiyo_sync_viaje_autor_seo_content( $post_id );
});

add_action( 'init', function () {
    $sync_version = '2026-05-02-viaje-autor-seo-content-v1';

    if ( get_option( 'ukiyo_viaje_autor_seo_content_sync_version' ) === $sync_version ) {
        return;
    }

    $viajes = get_posts(
        [
            'post_type'      => 'viaje_autor',
            'post_status'    => [ 'publish', 'draft', 'pending', 'future', 'private' ],
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'no_found_rows'  => true,
        ]
    );

    foreach ( $viajes as $viaje_id ) {
        ukiyo_sync_viaje_autor_seo_content( (int) $viaje_id );
    }

    update_option( 'ukiyo_viaje_autor_seo_content_sync_version', $sync_version );
}, 40 );

/**
 * Scripts para el admin (media uploader + repeaters)
 */
add_action('admin_footer', function () {
    global $post_type;
    if ($post_type !== 'viaje_autor') return;
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Media Uploader
        $('.ukiyo-upload-image').on('click', function(e) {
            e.preventDefault();
            var targetId = $(this).data('target');
            var mediaUploader = wp.media({
                title: 'Seleccionar imagen',
                button: { text: 'Usar esta imagen' },
                multiple: false
            });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#' + targetId).val(attachment.url);
                $('#' + targetId + '_preview').attr('src', attachment.url).addClass('has-image');
            });
            mediaUploader.open();
        });

        // Add Itinerary Day
        $('#add-itinerary-day').on('click', function() {
            var index = $('#itinerary-repeater .ukiyo-repeater-item').length;
            var template = $('#itinerary-template').html();
            template = template.replace(/__INDEX__/g, index);
            $('#itinerary-repeater').append(template);
        });

        // Add FAQ Item
        $('#add-faq-item').on('click', function() {
            var index = $('#faq-repeater .ukiyo-repeater-item').length;
            var template = $('#faq-template').html();
            template = template.replace(/__INDEX__/g, index);
            $('#faq-repeater').append(template);
        });

        // Remove Item
        $(document).on('click', '.remove-item', function() {
            if (confirm('¿Eliminar este elemento?')) {
                $(this).closest('.ukiyo-repeater-item').remove();
            }
        });

        // Update day title preview
        $(document).on('input', '.day-title-input', function() {
            var title = $(this).val() || 'Nuevo día';
            $(this).closest('.ukiyo-repeater-item').find('.day-title-preview').text(title);
        });

        // Experience Repeater - Counters
        var experienceCounters = {};
        $('.experiences-container').each(function() {
            var dayIndex = $(this).data('day-index');
            experienceCounters[dayIndex] = $(this).find('.experience-item').length;
        });

        // Experience Repeater - Add
        $(document).on('click', '.add-experience', function() {
            var dayIndex = $(this).data('day-index');
            var template = $('#experience-template-' + dayIndex).html();
            if (!experienceCounters[dayIndex]) experienceCounters[dayIndex] = 0;
            template = template.replace(/__EXP_INDEX__/g, experienceCounters[dayIndex]);
            
            // Remove 'disabled' attributes from the template string before appending
            // The simple str_replace in PHP might leave "disabled" string in the HTML, 
            // but we can also do it after appending using jQuery for safety.
            var $newItem = $(template);
            $newItem.find(':input').prop('disabled', false);
            
            $('[data-day-index="' + dayIndex + '"].experiences-container').append($newItem);
            experienceCounters[dayIndex]++;
        });

        // Experience Repeater - Remove
        $(document).on('click', '.remove-experience', function() {
            if (confirm('¿Eliminar esta experiencia?')) {
                $(this).closest('.experience-item').remove();
            }
        });

        // Experience Gallery Uploader
        $(document).on('click', '.experience-gallery-upload', function(e) {
            e.preventDefault();
            var $button = $(this);
            var $container = $button.closest('.ukiyo-metabox-field');
            var $input = $container.find('.experience-images-input');
            var $preview = $container.find('.experience-gallery-preview');
            
            var expGalleryUploader = wp.media({
                title: 'Seleccionar imágenes',
                button: { text: 'Añadir imágenes' },
                multiple: true,
                library: { type: 'image' }
            });
            
            expGalleryUploader.on('select', function() {
                var attachments = expGalleryUploader.state().get('selection').toJSON();
                var currentUrls = $input.val() ? $input.val().split(',').map(u => u.trim()).filter(u => u) : [];
                
                attachments.forEach(function(attachment) {
                    currentUrls.push(attachment.url);
                    $preview.append(
                        '<div class="gallery-item" style="position: relative; width: 80px; height: 80px;">' +
                        '<img src="' + attachment.url + '" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">' +
                        '<button type="button" class="remove-experience-image" style="position: absolute; top: -6px; right: -6px; background: #d63638; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer; font-size: 10px; line-height: 1;">✕</button>' +
                        '</div>'
                    );
                });
                $input.val(currentUrls.join(', '));
            });
            expGalleryUploader.open();
        });

        // Remove experience gallery image
        $(document).on('click', '.remove-experience-image', function(e) {
            e.preventDefault();
            var $item = $(this).closest('.gallery-item');
            var $container = $item.closest('.ukiyo-metabox-field');
            var $input = $container.find('.experience-images-input');
            var imgUrl = $item.find('img').attr('src');
            
            var urls = $input.val().split(',').map(u => u.trim()).filter(u => u && u !== imgUrl);
            $input.val(urls.join(', '));
            $item.remove();
        });

        // Compatibility for old gallery uploader (using same class but different context logic)
        $(document).on('click', '.ukiyo-gallery-upload:not(.experience-gallery-upload)', function(e) {
             // Fallback or keep specific logic if needed, but the experience one covers the class if unique
             // Actually, original code had ukiyo-gallery-upload for day images.
             // We should keep the original logic for day images if still used, but since we migrated, 
             // let's ensure we support both if needed.
             // For now, replacing the whole block with the NEW comprehensive handlers which include experience-gallery-upload.
             // But wait, day images used 'gallery-images-input'. Experience uses 'experience-images-input'.
             // My new block (above) has 'experience-gallery-upload'.
             // I REMOVED the old 'ukiyo-gallery-upload' logic in this replacement block!
             // I MUST INCLUDE IT if I want to support adding images to the migrated day_images field if it still exists?
             // No, the migrated day_images field is now hidden? No, in my render logic:
             /*
                'images' => isset($day['day_images']) ? $day['day_images'] : ''
             */
             // The old 'day_images' field is GONE from the repeater template in favor of 'experience-images-input'.
             // So I don't need the legacy uploader.
             // BUT, the 'gallery-images-input' class might be used elsewhere? 
             // In my new render function, I use 'experience-images-input'.
             // So safe to replace.
        });
    });
    </script>
    <?php
});

/**
 * Expose viaje_autor scalar meta fields via the REST API.
 *
 * Only scalar fields are registered here. The repeater / serialized fields
 * (itinerary_days, faq_items, hero_tags, trip_includes, trip_excludes) require
 * a custom REST schema and will be added in a later pass when UKIYO OS needs
 * to write them.
 *
 * `auth_callback` requires `edit_posts` so only logged-in users with at least
 * Author/Editor role can write through the REST API (used with Application
 * Passwords by UKIYO OS).
 */
add_action('init', function () {
    $auth = function () {
        return current_user_can('edit_posts');
    };

    $scalar_meta = [
        'hero_image'         => 'string',
        'hero_subtitle'      => 'string',
        'expert_name'        => 'string',
        'expert_title'       => 'string',
        'expert_specialty'   => 'string',
        'expert_focus'       => 'string',
        'expert_image'       => 'string',
        'expert_quote'       => 'string',
        'precio_desde'       => 'string',
        'precio_final'       => 'string',
        'precio_habitacion'  => 'string',
        'duracion_viaje'     => 'string',
        'grupos_viaje'       => 'string',
    ];

    foreach ($scalar_meta as $key => $type) {
        register_post_meta('viaje_autor', $key, [
            'show_in_rest'  => true,
            'single'        => true,
            'type'          => $type,
            'auth_callback' => $auth,
        ]);
    }
});
