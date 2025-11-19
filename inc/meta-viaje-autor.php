<?php
// inc/meta-viaje-autor.php

/**
 * Metabox para campos personalizados de Viajes de autor
 */

add_action( 'add_meta_boxes', function () {
    add_meta_box(
        'viaje_autor_detalles',
        'Detalles del viaje de autor',
        'ukiyo_render_viaje_autor_metabox',
        'viaje_autor',
        'normal',
        'high'
    );
} );

function ukiyo_render_viaje_autor_metabox( $post ) {
    // Seguridad
    wp_nonce_field( 'ukiyo_viaje_autor_nonce_action', 'ukiyo_viaje_autor_nonce' );

    // Valores actuales
    $autor_subtitulo = get_post_meta( $post->ID, 'autor_subtitulo', true );
    $duracion_viaje  = get_post_meta( $post->ID, 'duracion_viaje', true );
    $grupos_viaje    = get_post_meta( $post->ID, 'grupos_viaje', true );
    $autor_avatar    = get_post_meta( $post->ID, 'autor_avatar', true );
    ?>
    
    <style>
        .ukiyo-metabox-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }
        .ukiyo-metabox-field label {
            font-weight: 600;
            margin-bottom: 4px;
            display: block;
        }
        .ukiyo-metabox-field input[type="text"] {
            width: 100%;
            max-width: 600px;
        }
        .ukiyo-metabox-hint {
            font-size: 12px;
            color: #666;
            margin-top: 2px;
        }
    </style>

    <div class="ukiyo-metabox-grid">
        <div class="ukiyo-metabox-field">
            <label for="autor_subtitulo">Subtítulo del autor</label>
            <input
                type="text"
                id="autor_subtitulo"
                name="autor_subtitulo"
                value="<?php echo esc_attr( $autor_subtitulo ); ?>"
            />
            <p class="ukiyo-metabox-hint">
                Ejemplo: “Por Luis · Guía costarricense y fotógrafo de naturaleza”.
            </p>
        </div>

        <div class="ukiyo-metabox-field">
            <label for="duracion_viaje">Duración del viaje</label>
            <input
                type="text"
                id="duracion_viaje"
                name="duracion_viaje"
                value="<?php echo esc_attr( $duracion_viaje ); ?>"
            />
            <p class="ukiyo-metabox-hint">
                Ejemplo: “8 días”, “10 días / 9 noches” (se muestra en la pill azul).
            </p>
        </div>

        <div class="ukiyo-metabox-field">
            <label for="grupos_viaje">Tamaño de grupo / modalidad</label>
            <input
                type="text"
                id="grupos_viaje"
                name="grupos_viaje"
                value="<?php echo esc_attr( $grupos_viaje ); ?>"
            />
            <p class="ukiyo-metabox-hint">
                Ejemplo: “Grupos reducidos”, “Viaje privado”, “Bajo demanda”.
            </p>
        </div>

        <div class="ukiyo-metabox-field">
            <label for="autor_avatar">URL del avatar del autor</label>
            <input
                type="text"
                id="autor_avatar"
                name="autor_avatar"
                value="<?php echo esc_attr( $autor_avatar ); ?>"
            />
            <p class="ukiyo-metabox-hint">
                URL de la foto circular del guía (ideal 400x400). 
                Puedes subir la imagen a la biblioteca y pegar aquí la URL.
            </p>
        </div>
    </div>
    <?php
}

/**
 * Guardar los campos
 */
add_action( 'save_post_viaje_autor', function ( $post_id ) {
    // Comprobar nonce
    if ( ! isset( $_POST['ukiyo_viaje_autor_nonce'] ) ||
         ! wp_verify_nonce( $_POST['ukiyo_viaje_autor_nonce'], 'ukiyo_viaje_autor_nonce_action' ) ) {
        return;
    }

    // Evitar autosaves
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Comprobar permisos
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Campos a guardar
    $fields = [
        'autor_subtitulo',
        'duracion_viaje',
        'grupos_viaje',
        'autor_avatar',
    ];

    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            $value = sanitize_text_field( $_POST[ $field ] );
            update_post_meta( $post_id, $field, $value );
        } else {
            // Si viene vacío, borra el meta
            delete_post_meta( $post_id, $field );
        }
    }
} );