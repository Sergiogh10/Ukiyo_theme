<?php
/**
 * Meta boxes specifically for standard Posts (Blog)
 */

// Add Meta Box
function ukiyo_add_post_meta_boxes() {
    add_meta_box(
        'ukiyo_related_trip_mb',
        'Experiencia Ukiyo Relacionada',
        'ukiyo_render_related_trip_mb',
        'post',
        'side', // Show in sidebar
        'high'
    );

    add_meta_box(
        'ukiyo_post_seo_mb',
        'SEO del artículo',
        'ukiyo_render_post_seo_mb',
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ukiyo_add_post_meta_boxes' );

function ukiyo_get_og_meta_post_types() {
    return apply_filters( 'ukiyo_og_meta_post_types', [ 'post', 'page', 'viaje_autor' ] );
}

function ukiyo_add_og_meta_boxes() {
    foreach ( ukiyo_get_og_meta_post_types() as $post_type ) {
        add_meta_box(
            'ukiyo_og_meta_mb',
            'Open Graph / preview social',
            'ukiyo_render_og_meta_mb',
            $post_type,
            'normal',
            'default'
        );
    }
}
add_action( 'add_meta_boxes', 'ukiyo_add_og_meta_boxes' );

// Render Meta Box
function ukiyo_render_related_trip_mb( $post ) {
    $current_trip_id = get_post_meta( $post->ID, 'ukiyo_related_trip_id', true );
    $related_posts   = get_post_meta( $post->ID, 'ukiyo_related_posts', true );
    $related_posts   = is_array( $related_posts ) ? array_map( 'intval', $related_posts ) : [];
    
    // Fetch all Viajes de Autor
    $trips = get_posts( array(
        'post_type'      => 'viaje_autor',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC'
    ) );
    
    wp_nonce_field( 'ukiyo_save_related_trip', 'ukiyo_related_trip_nonce' );
    ?>
    <p class="description">Selecciona un viaje para mostrar la tarjeta de "Experiencia Ukiyo" dentro del artículo.</p>
    <select name="ukiyo_related_trip_id" class="widefat" style="margin-top: 10px;">
        <option value="">-- Ninguno --</option>
        <?php foreach ( $trips as $trip ) : ?>
            <option value="<?php echo esc_attr( $trip->ID ); ?>" <?php selected( $current_trip_id, $trip->ID ); ?>>
                <?php echo esc_html( $trip->post_title ); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <hr style="margin: 20px 0; border: 0; border-top: 1px solid #ddd;">

    <?php 
    $current_country = get_post_meta( $post->ID, 'ukiyo_related_country', true ); 
    ?>
    <p class="description"><strong>País / Destino Principal:</strong></p>
    <p class="description">Selecciona si este artículo pertenece a un destino específico para mostrar el enlace a su Landing Page al final del post.</p>
    <select name="ukiyo_related_country" class="widefat" style="margin-top: 5px;">
        <option value="">-- Ninguno --</option>
        <option value="costa-rica" <?php selected( $current_country, 'costa-rica' ); ?>>Costa Rica</option>
        <option value="marruecos" <?php selected( $current_country, 'marruecos' ); ?>>Marruecos</option>
        <option value="colombia" <?php selected( $current_country, 'colombia' ); ?>>Colombia</option>
        <option value="indonesia" <?php selected( $current_country, 'indonesia' ); ?>>Indonesia</option>
        <option value="italia" <?php selected( $current_country, 'italia' ); ?>>Italia</option>
        <option value="lanzarote" <?php selected( $current_country, 'lanzarote' ); ?>>Lanzarote</option>
    </select>

    <hr style="margin: 20px 0; border: 0; border-top: 1px solid #ddd;">

    <?php
    $posts = get_posts( array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'post__not_in'   => array( $post->ID ),
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
    ?>
    <p class="description"><strong>Artículos relacionados:</strong></p>
    <p class="description">Selecciona otros posts para mostrarlos al final del artículo.</p>
    <div style="margin-top: 8px; max-height: 220px; overflow-y: auto; border: 1px solid #dcdcde; border-radius: 8px; background: #fff; padding: 8px;">
        <?php if ( ! empty( $posts ) ) : ?>
            <?php foreach ( $posts as $related_post ) : ?>
                <label style="display:flex; align-items:flex-start; gap:8px; padding:8px 6px; border-bottom:1px solid #f0f0f1;">
                    <input
                        type="checkbox"
                        name="ukiyo_related_posts[]"
                        value="<?php echo esc_attr( $related_post->ID ); ?>"
                        <?php checked( in_array( (int) $related_post->ID, $related_posts, true ) ); ?>
                        style="margin-top:2px;"
                    />
                    <span style="line-height:1.35;">
                        <?php echo esc_html( $related_post->post_title ); ?>
                    </span>
                </label>
            <?php endforeach; ?>
        <?php else : ?>
            <p style="margin: 0; color: #646970;">No hay otros posts publicados todavía.</p>
        <?php endif; ?>
    </div>
    <p class="description" style="margin-top: 6px;">Puedes marcar varios artículos.</p>
    <?php
}

// Render SEO Meta Box
function ukiyo_render_post_seo_mb( $post ) {
    $seo_title       = get_post_meta( $post->ID, 'ukiyo_seo_title', true );
    $meta_desc       = get_post_meta( $post->ID, 'ukiyo_meta_description', true );
    $intro           = get_post_meta( $post->ID, 'ukiyo_intro', true );
    $primary_keyword = get_post_meta( $post->ID, 'ukiyo_primary_keyword', true );

    wp_nonce_field( 'ukiyo_save_post_seo', 'ukiyo_post_seo_nonce' );
    ?>
    <p class="description">Define el snippet SEO y una introducción editorial opcional para el artículo.</p>

    <p style="margin-top: 16px;">
        <label for="ukiyo_seo_title" style="display:block; font-weight:600; margin-bottom:6px;">SEO Title</label>
        <input
            type="text"
            id="ukiyo_seo_title"
            name="ukiyo_seo_title"
            value="<?php echo esc_attr( $seo_title ); ?>"
            class="widefat"
            maxlength="65"
            placeholder="Ej: Viajes a medida a Costa Rica: cuándo ir y qué ruta elegir"
        />
    </p>

    <p>
        <label for="ukiyo_meta_description" style="display:block; font-weight:600; margin-bottom:6px;">Meta description</label>
        <textarea
            id="ukiyo_meta_description"
            name="ukiyo_meta_description"
            class="widefat"
            rows="3"
            maxlength="160"
            placeholder="Resumen orientado a clic en Google. Ideal entre 140 y 160 caracteres."
        ><?php echo esc_textarea( $meta_desc ); ?></textarea>
    </p>

    <p>
        <label for="ukiyo_primary_keyword" style="display:block; font-weight:600; margin-bottom:6px;">Keyword principal</label>
        <input
            type="text"
            id="ukiyo_primary_keyword"
            name="ukiyo_primary_keyword"
            value="<?php echo esc_attr( $primary_keyword ); ?>"
            class="widefat"
            maxlength="100"
            placeholder="Ej: viajes a medida costa rica"
        />
    </p>

    <p>
        <label for="ukiyo_intro" style="display:block; font-weight:600; margin-bottom:6px;">Introducción destacada</label>
        <textarea
            id="ukiyo_intro"
            name="ukiyo_intro"
            class="widefat"
            rows="5"
            placeholder="Texto breve que aparecerá al inicio del post si quieres reforzar intención SEO y contexto."
        ><?php echo esc_textarea( $intro ); ?></textarea>
    </p>
    <?php
}

function ukiyo_render_og_meta_mb( $post ) {
    $og_title       = get_post_meta( $post->ID, 'ukiyo_og_title', true );
    $og_description = get_post_meta( $post->ID, 'ukiyo_og_description', true );
    $og_image_id    = absint( get_post_meta( $post->ID, 'ukiyo_og_image_id', true ) );
    $og_image       = get_post_meta( $post->ID, 'ukiyo_og_image', true );

    if ( $og_image_id ) {
        $attachment_image = wp_get_attachment_image_url( $og_image_id, 'large' );
        $og_image = $attachment_image ?: $og_image;
    }

    wp_nonce_field( 'ukiyo_save_og_meta', 'ukiyo_og_meta_nonce' );
    ?>
    <p class="description">
        Controla cómo se verá esta URL al compartirla en WhatsApp, LinkedIn, Facebook o X. Recomendado: imagen horizontal 1200x630 px, optimizada y nunca solo el logo.
    </p>

    <p style="margin-top: 16px;">
        <label for="ukiyo_og_title" style="display:block; font-weight:600; margin-bottom:6px;">OG title</label>
        <input
            type="text"
            id="ukiyo_og_title"
            name="ukiyo_og_title"
            value="<?php echo esc_attr( $og_title ); ?>"
            class="widefat"
            maxlength="90"
            placeholder="Ej: Indonesia: del fuego al mar"
        />
    </p>

    <p>
        <label for="ukiyo_og_description" style="display:block; font-weight:600; margin-bottom:6px;">OG description</label>
        <textarea
            id="ukiyo_og_description"
            name="ukiyo_og_description"
            class="widefat"
            rows="3"
            maxlength="220"
            placeholder="Ej: Un viaje que cambia en cada etapa. Diseñado contigo."
        ><?php echo esc_textarea( $og_description ); ?></textarea>
    </p>

    <p>
        <label for="ukiyo_og_image" style="display:block; font-weight:600; margin-bottom:6px;">OG image</label>
        <input type="hidden" id="ukiyo_og_image_id" name="ukiyo_og_image_id" value="<?php echo esc_attr( (string) $og_image_id ); ?>" />
        <input
            type="url"
            id="ukiyo_og_image"
            name="ukiyo_og_image"
            value="<?php echo esc_url( $og_image ); ?>"
            class="widefat"
            placeholder="https://viajesukiyo.com/wp-content/uploads/..."
        />
    </p>

    <div class="ukiyo-og-image-preview" style="<?php echo $og_image ? '' : 'display:none;'; ?> margin: 10px 0 12px;">
        <img
            src="<?php echo esc_url( $og_image ); ?>"
            alt=""
            style="display:block; width:100%; max-width:420px; aspect-ratio:1200/630; object-fit:cover; border:1px solid #dcdcde; border-radius:8px;"
        />
    </div>

    <p>
        <button type="button" class="button ukiyo-og-image-select">Seleccionar imagen</button>
        <button type="button" class="button button-link-delete ukiyo-og-image-remove" style="<?php echo $og_image ? '' : 'display:none;'; ?> margin-left:8px;">Quitar imagen</button>
    </p>
    <?php
}

// Save Meta Box
function ukiyo_save_related_trip_meta( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['ukiyo_related_trip_nonce'] ) && wp_verify_nonce( $_POST['ukiyo_related_trip_nonce'], 'ukiyo_save_related_trip' ) ) {
        if ( isset( $_POST['ukiyo_related_trip_id'] ) ) {
            update_post_meta( $post_id, 'ukiyo_related_trip_id', sanitize_text_field( $_POST['ukiyo_related_trip_id'] ) );
        } else {
            delete_post_meta( $post_id, 'ukiyo_related_trip_id' );
        }

        if ( isset( $_POST['ukiyo_related_country'] ) ) {
            update_post_meta( $post_id, 'ukiyo_related_country', sanitize_text_field( $_POST['ukiyo_related_country'] ) );
        } else {
            delete_post_meta( $post_id, 'ukiyo_related_country' );
        }

        if ( isset( $_POST['ukiyo_related_posts'] ) && is_array( $_POST['ukiyo_related_posts'] ) ) {
            $related_posts = array_values(
                array_filter(
                    array_map(
                        'intval',
                        wp_unslash( $_POST['ukiyo_related_posts'] )
                    )
                )
            );

            if ( ! empty( $related_posts ) ) {
                update_post_meta( $post_id, 'ukiyo_related_posts', $related_posts );
            } else {
                delete_post_meta( $post_id, 'ukiyo_related_posts' );
            }
        } else {
            delete_post_meta( $post_id, 'ukiyo_related_posts' );
        }
    }

    if ( isset( $_POST['ukiyo_post_seo_nonce'] ) && wp_verify_nonce( $_POST['ukiyo_post_seo_nonce'], 'ukiyo_save_post_seo' ) ) {
        $text_fields = [
            'ukiyo_seo_title',
            'ukiyo_primary_keyword',
        ];

        foreach ( $text_fields as $field ) {
            if ( isset( $_POST[ $field ] ) ) {
                $value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
                if ( '' !== $value ) {
                    update_post_meta( $post_id, $field, $value );
                } else {
                    delete_post_meta( $post_id, $field );
                }
            }
        }

        $textarea_fields = [
            'ukiyo_meta_description',
            'ukiyo_intro',
        ];

        foreach ( $textarea_fields as $field ) {
            if ( isset( $_POST[ $field ] ) ) {
                $value = sanitize_textarea_field( wp_unslash( $_POST[ $field ] ) );
                if ( '' !== $value ) {
                    update_post_meta( $post_id, $field, $value );
                } else {
                    delete_post_meta( $post_id, $field );
                }
            }
        }
    }
}
add_action( 'save_post', 'ukiyo_save_related_trip_meta' );

function ukiyo_save_og_meta( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! isset( $_POST['ukiyo_og_meta_nonce'] ) || ! wp_verify_nonce( $_POST['ukiyo_og_meta_nonce'], 'ukiyo_save_og_meta' ) ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $text_fields = [
        'ukiyo_og_title' => 'sanitize_text_field',
        'ukiyo_og_image' => 'esc_url_raw',
    ];

    foreach ( $text_fields as $field => $sanitize_callback ) {
        $value = isset( $_POST[ $field ] ) ? call_user_func( $sanitize_callback, wp_unslash( $_POST[ $field ] ) ) : '';

        if ( '' !== $value ) {
            update_post_meta( $post_id, $field, $value );
        } else {
            delete_post_meta( $post_id, $field );
        }
    }

    $description = isset( $_POST['ukiyo_og_description'] ) ? sanitize_textarea_field( wp_unslash( $_POST['ukiyo_og_description'] ) ) : '';
    if ( '' !== $description ) {
        update_post_meta( $post_id, 'ukiyo_og_description', $description );
    } else {
        delete_post_meta( $post_id, 'ukiyo_og_description' );
    }

    $image_id = isset( $_POST['ukiyo_og_image_id'] ) ? absint( $_POST['ukiyo_og_image_id'] ) : 0;
    if ( $image_id ) {
        update_post_meta( $post_id, 'ukiyo_og_image_id', $image_id );
    } else {
        delete_post_meta( $post_id, 'ukiyo_og_image_id' );
    }
}
add_action( 'save_post', 'ukiyo_save_og_meta' );

function ukiyo_enqueue_og_meta_admin_assets( $hook ) {
    if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
        return;
    }

    $screen = get_current_screen();
    if ( ! $screen || ! in_array( $screen->post_type, ukiyo_get_og_meta_post_types(), true ) ) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script( 'jquery' );

    wp_add_inline_script(
        'jquery',
        "
        jQuery(function($) {
            var frame;

            $('.ukiyo-og-image-select').on('click', function(e) {
                e.preventDefault();

                if (frame) {
                    frame.open();
                    return;
                }

                frame = wp.media({
                    title: 'Selecciona imagen Open Graph',
                    button: { text: 'Usar imagen' },
                    multiple: false
                });

                frame.on('select', function() {
                    var attachment = frame.state().get('selection').first().toJSON();
                    var url = attachment.url || '';

                    $('#ukiyo_og_image_id').val(attachment.id || '');
                    $('#ukiyo_og_image').val(url);
                    $('.ukiyo-og-image-preview img').attr('src', url);
                    $('.ukiyo-og-image-preview, .ukiyo-og-image-remove').show();
                });

                frame.open();
            });

            $('.ukiyo-og-image-remove').on('click', function(e) {
                e.preventDefault();
                $('#ukiyo_og_image_id, #ukiyo_og_image').val('');
                $('.ukiyo-og-image-preview').hide();
                $('.ukiyo-og-image-preview img').attr('src', '');
                $(this).hide();
            });
        });
        "
    );
}
add_action( 'admin_enqueue_scripts', 'ukiyo_enqueue_og_meta_admin_assets' );
