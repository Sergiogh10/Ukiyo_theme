<?php
/**
 * Metaboxes del Portal del Aventurero.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_portal_admin_enqueue( $hook ) {
    global $post_type;

    $is_trip_editor = ( 'post.php' === $hook || 'post-new.php' === $hook ) && 'ukiyo_viaje' === $post_type;
    $is_email_page  = 'ukiyo_viaje_page_ukiyo-portal-emails' === $hook;

    if ( ! $is_trip_editor && ! $is_email_page ) {
        return;
    }

    $dependencies = [ 'jquery' ];

    if ( $is_trip_editor ) {
        wp_enqueue_media();
        wp_enqueue_editor();
        wp_enqueue_script( 'jquery-ui-sortable' );
        $dependencies[] = 'jquery-ui-sortable';
    }

    wp_enqueue_script(
        'ukiyo-portal-admin',
        get_template_directory_uri() . '/assets/js/portal-admin.js',
        $dependencies,
        ukiyo_asset_ver( '/assets/js/portal-admin.js' ),
        true
    );

    wp_localize_script(
        'ukiyo-portal-admin',
        'ukiyoPortalAdmin',
        [
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'ukiyo_portal_admin' ),
            'placesApiConfigured' => (bool) ukiyo_portal_get_google_places_api_key(),
        ]
    );
}
add_action( 'admin_enqueue_scripts', 'ukiyo_portal_admin_enqueue' );

	function ukiyo_portal_register_metaboxes() {
	    add_meta_box( 'ukiyo_portal_general', 'Portal · Datos generales', 'ukiyo_portal_render_general_metabox', 'ukiyo_viaje', 'normal', 'high' );
	    add_meta_box( 'ukiyo_portal_proposal', 'Portal · Propuesta comercial', 'ukiyo_portal_render_proposal_metabox', 'ukiyo_viaje', 'normal', 'high' );
	    add_meta_box( 'ukiyo_portal_users', 'Portal · Usuarios autorizados', 'ukiyo_portal_render_users_metabox', 'ukiyo_viaje', 'side', 'high' );
	    add_meta_box( 'ukiyo_portal_flights', 'Portal · Vuelos', 'ukiyo_portal_render_flights_metabox', 'ukiyo_viaje', 'normal', 'default' );
	    add_meta_box( 'ukiyo_portal_documents', 'Portal · Documentación', 'ukiyo_portal_render_documents_metabox', 'ukiyo_viaje', 'normal', 'default' );
	    add_meta_box( 'ukiyo_portal_route_map', 'Portal · Mapa de ruta', 'ukiyo_portal_render_route_map_metabox', 'ukiyo_viaje', 'normal', 'default' );
	    add_meta_box( 'ukiyo_portal_itinerary', 'Portal · Itinerario', 'ukiyo_portal_render_itinerary_metabox', 'ukiyo_viaje', 'normal', 'default' );
	    add_meta_box( 'ukiyo_portal_recommendations', 'Portal · Recomendaciones', 'ukiyo_portal_render_recommendations_metabox', 'ukiyo_viaje', 'normal', 'default' );
	    add_meta_box( 'ukiyo_portal_contacts', 'Portal · Contactos y soporte', 'ukiyo_portal_render_contacts_metabox', 'ukiyo_viaje', 'normal', 'default' );
	}
add_action( 'add_meta_boxes_ukiyo_viaje', 'ukiyo_portal_register_metaboxes' );

function ukiyo_portal_admin_styles() {
    static $printed = false;

    if ( $printed ) {
        return;
    }

    $printed = true;
    ?>
    <style>
        .ukiyo-portal-admin{--portal-border:#d8d0c7;--portal-ink:#43352c;--portal-soft:#f6f0e8;--portal-soft-2:#fffaf4;--portal-sage:#9caf88;--portal-earth:#b9724f;}
        .ukiyo-portal-admin .ukiyo-field{margin-bottom:18px}
        .ukiyo-portal-admin label{display:block;margin-bottom:6px;font-weight:600;color:var(--portal-ink)}
        .ukiyo-portal-admin input[type="text"],.ukiyo-portal-admin input[type="url"],.ukiyo-portal-admin input[type="number"],.ukiyo-portal-admin input[type="email"],.ukiyo-portal-admin input[type="tel"],.ukiyo-portal-admin select,.ukiyo-portal-admin textarea{width:100%;border:1px solid var(--portal-border);border-radius:10px;padding:10px 12px}
        .ukiyo-portal-admin textarea{min-height:108px;resize:vertical}
        .ukiyo-portal-admin .ukiyo-field-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px}
        .ukiyo-portal-admin .ukiyo-field--full{grid-column:1/-1}
        .ukiyo-portal-admin .ukiyo-hint{margin-top:6px;font-size:12px;color:#6b655e}
        .ukiyo-portal-admin .ukiyo-media-control,.ukiyo-portal-admin .ukiyo-file-control{display:flex;gap:10px;align-items:center;flex-wrap:wrap}
        .ukiyo-portal-admin .ukiyo-image-preview img{display:block;width:120px;height:92px;object-fit:cover;border-radius:12px;border:1px solid var(--portal-border)}
        .ukiyo-portal-admin .ukiyo-file-preview{font-size:13px;color:#5c544c}
        .ukiyo-portal-admin .ukiyo-user-search{margin-bottom:10px}
        .ukiyo-portal-admin .ukiyo-user-list{max-height:280px;overflow:auto;border:1px solid var(--portal-border);border-radius:12px;padding:10px;background:var(--portal-soft-2)}
        .ukiyo-portal-admin .ukiyo-user-item{display:flex;gap:8px;padding:6px 2px;border-bottom:1px solid rgba(0,0,0,.05)}
        .ukiyo-portal-admin .ukiyo-user-item:last-child{border-bottom:none}
        .ukiyo-portal-admin .ukiyo-user-item label{margin:0;font-weight:500}
        .ukiyo-portal-admin .ukiyo-repeater-list{display:grid;gap:16px}
        .ukiyo-portal-admin .ukiyo-repeater-item{position:relative;padding:18px;border:1px solid var(--portal-border);background:linear-gradient(180deg,var(--portal-soft-2),#fff);border-radius:18px;box-shadow:0 8px 24px rgba(139,69,19,.06)}
        .ukiyo-portal-admin .ukiyo-repeater-top{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:16px}
        .ukiyo-portal-admin .ukiyo-repeater-title{font-size:14px;font-weight:700;letter-spacing:.03em;text-transform:uppercase;color:var(--portal-earth)}
        .ukiyo-portal-admin .ukiyo-repeater-item--nested{padding:16px;background:#fffdf9}
        .ukiyo-portal-admin .ukiyo-itinerary-place{border-radius:24px}
        .ukiyo-portal-admin .ukiyo-collapsible{padding:0;overflow:hidden}
        .ukiyo-portal-admin .ukiyo-collapsible summary{list-style:none;display:flex;align-items:center;justify-content:space-between;gap:14px;padding:18px 20px;cursor:pointer}
        .ukiyo-portal-admin .ukiyo-collapsible summary::-webkit-details-marker{display:none}
        .ukiyo-portal-admin .ukiyo-collapsible__label{display:grid;gap:4px}
        .ukiyo-portal-admin .ukiyo-collapsible__label strong{font-size:15px;color:var(--portal-ink)}
        .ukiyo-portal-admin .ukiyo-collapsible__label span{font-size:12px;letter-spacing:.08em;text-transform:uppercase;color:#7e756b}
        .ukiyo-portal-admin .ukiyo-collapsible__content{padding:0 18px 18px}
        .ukiyo-portal-admin .ukiyo-collapsible__actions{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
        .ukiyo-portal-admin .ukiyo-close-panel{border:none;background:#efe7dd;color:#5c544c;padding:8px 12px;border-radius:999px;cursor:pointer;font-weight:600}
        .ukiyo-portal-admin .ukiyo-subsection{margin-top:18px;padding-top:18px;border-top:1px dashed var(--portal-border)}
        .ukiyo-portal-admin .ukiyo-subsection-title{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:12px}
        .ukiyo-portal-admin .ukiyo-subsection-title strong{font-size:13px;letter-spacing:.08em;text-transform:uppercase;color:#6b655e}
        .ukiyo-portal-admin .ukiyo-nested-actions{display:flex;gap:10px;flex-wrap:wrap}
        .ukiyo-portal-admin .ukiyo-accommodation-preview img{display:block;width:100%;max-width:220px;height:140px;object-fit:cover;border-radius:16px;border:1px solid var(--portal-border)}
        .ukiyo-portal-admin .ukiyo-editor-shell .wp-editor-wrap{border:1px solid var(--portal-border);border-radius:12px;overflow:hidden}
        .ukiyo-portal-admin .ukiyo-editor-shell .wp-editor-container textarea{border:none;border-radius:0}
        .ukiyo-portal-admin .ukiyo-sort-handle{cursor:move;color:#7e756b;font-size:13px}
        .ukiyo-portal-admin .ukiyo-remove-row{border:none;background:#a7392a;color:#fff;padding:7px 10px;border-radius:999px;cursor:pointer}
        .ukiyo-portal-admin .ukiyo-add-row{margin-top:16px}
        .ukiyo-portal-admin .ukiyo-gallery-preview{display:flex;flex-wrap:wrap;gap:10px;margin-top:10px}
        .ukiyo-portal-admin .ukiyo-gallery-preview img{width:76px;height:76px;object-fit:cover;border-radius:12px;border:1px solid var(--portal-border)}
        .ukiyo-portal-admin .ukiyo-client-actions{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
        .ukiyo-portal-admin .ukiyo-inline-actions{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
        .ukiyo-portal-admin .ukiyo-readonly-input{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;background:#fffdf9}
        .ukiyo-portal-admin .ukiyo-link-box{padding:16px;border:1px dashed var(--portal-border);border-radius:16px;background:var(--portal-soft-2)}
        .ukiyo-portal-admin .ukiyo-link-box strong{display:block;margin-bottom:6px;color:var(--portal-ink)}
        .ukiyo-portal-admin .ukiyo-icon-button{display:inline-flex;align-items:center;justify-content:center;width:46px;height:46px;border:1px solid #cfd7e6;border-radius:14px;background:#fff;color:#0a6694;text-decoration:none;box-shadow:0 6px 16px rgba(67,53,44,.05);transition:transform .18s ease,box-shadow .18s ease,border-color .18s ease,color .18s ease}
        .ukiyo-portal-admin .ukiyo-icon-button:hover{transform:translateY(-1px);box-shadow:0 10px 18px rgba(67,53,44,.08);border-color:#0a6694}
        .ukiyo-portal-admin .ukiyo-icon-button svg{display:block;width:20px;height:20px}
        .ukiyo-portal-admin .ukiyo-icon-button--delete{color:#a7392a;border-color:#e2b5b0}
        .ukiyo-portal-admin .ukiyo-icon-button--delete:hover{border-color:#a7392a}
        .ukiyo-portal-admin .ukiyo-map-points-builder{margin-top:12px;padding:16px;border:1px solid var(--portal-border);border-radius:16px;background:var(--portal-soft-2)}
        .ukiyo-portal-admin .ukiyo-map-points-search{display:flex;gap:10px;flex-wrap:wrap;align-items:center}
        .ukiyo-portal-admin .ukiyo-map-points-search input{flex:1 1 280px}
        .ukiyo-portal-admin .ukiyo-map-points-results{display:grid;gap:10px;margin-top:12px}
        .ukiyo-portal-admin .ukiyo-map-points-result,.ukiyo-portal-admin .ukiyo-map-points-empty{display:flex;align-items:flex-start;justify-content:space-between;gap:12px;padding:12px 14px;border:1px solid rgba(67,53,44,.12);border-radius:14px;background:#fff}
        .ukiyo-portal-admin .ukiyo-map-points-result strong{display:block;margin-bottom:4px;color:var(--portal-ink)}
        .ukiyo-portal-admin .ukiyo-map-points-result span,.ukiyo-portal-admin .ukiyo-map-points-empty{font-size:12px;color:#6b655e}
        .ukiyo-portal-admin .ukiyo-map-points-result button{white-space:nowrap}
    </style>
    <?php
}

	function ukiyo_portal_render_general_metabox( $post ) {
    $data = ukiyo_portal_get_trip_data( $post );
    ukiyo_portal_admin_styles();
    wp_nonce_field( 'ukiyo_portal_save', 'ukiyo_portal_nonce' );
    ?>
    <div class="ukiyo-portal-admin">
        <div class="ukiyo-field-grid">
            <div class="ukiyo-field">
                <label for="ukiyo_portal_subtitle">Subtítulo editorial</label>
                <input type="text" id="ukiyo_portal_subtitle" name="ukiyo_portal_subtitle" value="<?php echo esc_attr( $data['subtitle'] ); ?>" />
            </div>
            <div class="ukiyo-field">
                <label for="ukiyo_portal_destination">Destino principal</label>
                <input type="text" id="ukiyo_portal_destination" name="ukiyo_portal_destination" value="<?php echo esc_attr( $data['destination'] ); ?>" />
            </div>
            <div class="ukiyo-field">
                <label for="ukiyo_portal_dates">Fechas de viaje</label>
                <input type="text" id="ukiyo_portal_dates" name="ukiyo_portal_dates" value="<?php echo esc_attr( $data['dates'] ); ?>" placeholder="14 al 25 de agosto de 2026" />
            </div>
            <div class="ukiyo-field">
                <label for="ukiyo_portal_status">Estado</label>
                <select id="ukiyo_portal_status" name="ukiyo_portal_status">
                    <?php foreach ( ukiyo_portal_get_trip_statuses() as $key => $label ) : ?>
                        <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $data['status'], $key ); ?>><?php echo esc_html( $label ); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="ukiyo-field">
                <label for="ukiyo_portal_access_type">Tipo de acceso</label>
                <select id="ukiyo_portal_access_type" name="ukiyo_portal_access_type">
                    <?php foreach ( ukiyo_portal_get_access_types() as $key => $label ) : ?>
                        <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $data['access_type'], $key ); ?>><?php echo esc_html( $label ); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="ukiyo-hint">Usa portal privado para clientes ya activados y propuesta pública para compartir una propuesta comercial sin registro.</p>
            </div>
            <div class="ukiyo-field">
                <label for="ukiyo_portal_reference">Referencia interna</label>
                <input type="text" id="ukiyo_portal_reference" name="ukiyo_portal_reference" value="<?php echo esc_attr( $data['reference'] ); ?>" />
            </div>
        </div>

        <div class="ukiyo-field">
            <label for="ukiyo_portal_travelers">Viajeros</label>
            <textarea id="ukiyo_portal_travelers" name="ukiyo_portal_travelers" placeholder="Un viajero por línea&#10;Sergio García&#10;María López"><?php echo esc_textarea( $data['travelers'] ); ?></textarea>
            <p class="ukiyo-hint">Usa nombres reales cuando el viaje ya esté cerrado. Si es una propuesta pública preliminar, podrás indicar más abajo la cantidad de viajeros y el nombre de la persona destinataria sin depender de esta lista.</p>
        </div>

        <div class="ukiyo-field">
            <label for="ukiyo_portal_welcome">Texto de bienvenida</label>
            <textarea id="ukiyo_portal_welcome" name="ukiyo_portal_welcome"><?php echo esc_textarea( $data['welcome'] ); ?></textarea>
        </div>

        <div class="ukiyo-field">
            <label for="ukiyo_portal_country_story_title">Título de la historia</label>
            <input type="text" id="ukiyo_portal_country_story_title" name="ukiyo_portal_country_story_title" value="<?php echo esc_attr( $data['country_story_title'] ); ?>" placeholder="Conociendo Costa Rica" />
        </div>

        <div class="ukiyo-field">
            <label for="ukiyo_portal_country_story_subtitle">Subtítulo de la historia</label>
            <input type="text" id="ukiyo_portal_country_story_subtitle" name="ukiyo_portal_country_story_subtitle" value="<?php echo esc_attr( $data['country_story_subtitle'] ); ?>" placeholder="Una mirada rápida antes de empezar el viaje" />
        </div>

        <div class="ukiyo-field">
            <label for="ukiyo_portal_country_story">Historia del país</label>
            <div class="ukiyo-editor-shell">
                <?php
                wp_editor(
                    $data['country_story'],
                    'ukiyo_portal_country_story',
                    [
                        'textarea_name' => 'ukiyo_portal_country_story',
                        'textarea_rows' => 10,
                        'media_buttons' => false,
                        'teeny'         => false,
                        'quicktags'     => true,
                    ]
                );
                ?>
            </div>
            <p class="ukiyo-hint">Este bloque aparece debajo del resumen, con título, subtítulo e historia editorial del destino.</p>
        </div>

        <div class="ukiyo-field">
            <label>Imagen hero opcional</label>
            <div class="ukiyo-media-control">
                <input type="hidden" name="ukiyo_portal_hero_image_id" class="ukiyo-media-input" value="<?php echo esc_attr( $data['hero_image_id'] ); ?>" />
                <button type="button" class="button button-secondary ukiyo-portal-media" data-multiple="false" data-library="image">Seleccionar imagen</button>
                <button type="button" class="button-link-delete ukiyo-clear-media">Quitar</button>
            </div>
            <div class="ukiyo-image-preview">
                <?php if ( $data['hero_image_id'] ) : ?>
                    <?php echo wp_get_attachment_image( $data['hero_image_id'], 'medium' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}

function ukiyo_portal_render_route_map_metabox( $post ) {
    $data = ukiyo_portal_get_trip_data( $post );
    ukiyo_portal_admin_styles();
    ?>
    <div class="ukiyo-portal-admin">
        <div class="ukiyo-field ukiyo-map-points-field">
            <label for="ukiyo_portal_route_map_points">Puntos exactos del mapa de ruta</label>
            <textarea id="ukiyo_portal_route_map_points" class="ukiyo-map-points-textarea" name="ukiyo_portal_route_map_points" placeholder="Tánger | https://maps.app.goo.gl/... | 35.7595 | -5.8340&#10;Asilah | https://maps.app.goo.gl/... | 35.4650 | -6.0348&#10;Tetuán | https://maps.app.goo.gl/... | 35.5716 | -5.3724"><?php echo esc_textarea( $data['route_map_points'] ); ?></textarea>
            <p class="ukiyo-hint">El mapa del portal usa este campo como fuente principal. Añade un punto por línea, del primero al último de la ruta. Si está vacío, el mapa se genera desde el itinerario como hasta ahora.</p>
            <div class="ukiyo-map-points-builder" data-map-points-builder data-map-points-context="route">
                <div class="ukiyo-map-points-search">
                    <input type="text" class="ukiyo-map-points-query" placeholder="Buscar parada de ruta: Tánger, Asilah, Fez..." />
                    <button type="button" class="button button-secondary ukiyo-map-points-search-button">Buscar lugar</button>
                </div>
                <div class="ukiyo-map-points-results" data-map-points-results></div>
            </div>
        </div>
    </div>
    <?php
}

function ukiyo_portal_render_proposal_metabox( $post ) {
    $data            = ukiyo_portal_get_trip_data( $post );
    $is_proposal     = 'proposal' === $data['access_type'];
    $can_build_link  = ! in_array( $post->post_status, [ 'auto-draft', 'draft' ], true ) && ! empty( $post->post_name );
    $proposal_token  = $is_proposal && $can_build_link ? ukiyo_portal_ensure_proposal_token( $post ) : $data['proposal']['token'];
    $proposal_url    = ( $is_proposal && $can_build_link && $proposal_token ) ? ukiyo_portal_get_proposal_url( $post, $proposal_token ) : '';
    $response_meta   = ukiyo_portal_get_proposal_response_status_meta( $data['proposal']['response_status'] );
    $reset_url       = wp_nonce_url(
        add_query_arg(
            [
                'action'  => 'ukiyo_portal_reset_proposal_response',
                'trip_id' => $post->ID,
            ],
            admin_url( 'admin-post.php' )
        ),
        'ukiyo_portal_reset_proposal_response_' . $post->ID
    );

    ukiyo_portal_admin_styles();
    ?>
    <div class="ukiyo-portal-admin" data-ukiyo-proposal-box <?php echo $is_proposal ? '' : 'hidden'; ?>>
        <div class="ukiyo-field-grid">
            <div class="ukiyo-field">
                <label for="ukiyo_portal_proposal_price">Precio del viaje</label>
                <input type="text" id="ukiyo_portal_proposal_price" name="ukiyo_portal_proposal_price" value="<?php echo esc_attr( $data['proposal']['price'] ); ?>" placeholder="Desde 2.980 € por persona" />
            </div>
            <div class="ukiyo-field">
                <label for="ukiyo_portal_proposal_price_note">Nota del precio</label>
                <input type="text" id="ukiyo_portal_proposal_price_note" name="ukiyo_portal_proposal_price_note" value="<?php echo esc_attr( $data['proposal']['price_note'] ); ?>" placeholder="Precio orientativo para 2 personas, vuelos aparte" />
            </div>
            <div class="ukiyo-field">
                <label for="ukiyo_portal_proposal_valid_until">Válida hasta</label>
                <input type="date" id="ukiyo_portal_proposal_valid_until" name="ukiyo_portal_proposal_valid_until" value="<?php echo esc_attr( $data['proposal']['valid_until'] ); ?>" />
            </div>
        </div>

        <div class="ukiyo-field-grid">
            <div class="ukiyo-field">
                <label for="ukiyo_portal_proposal_recipient_name">Nombre de la persona destinataria</label>
                <input type="text" id="ukiyo_portal_proposal_recipient_name" name="ukiyo_portal_proposal_recipient_name" value="<?php echo esc_attr( $data['proposal']['recipient_name'] ); ?>" placeholder="Marta" />
                <p class="ukiyo-hint">Se mostrará en la propuesta pública para hacerla más personalizada.</p>
            </div>
            <div class="ukiyo-field">
                <label for="ukiyo_portal_proposal_traveler_count_override">Cantidad de viajeros para la propuesta</label>
                <input type="number" min="1" step="1" id="ukiyo_portal_proposal_traveler_count_override" name="ukiyo_portal_proposal_traveler_count_override" value="<?php echo esc_attr( $data['proposal']['traveler_count_override'] ? (string) $data['proposal']['traveler_count_override'] : '' ); ?>" placeholder="2" />
                <p class="ukiyo-hint">Solo afecta a la propuesta pública. Si lo dejas vacío, se calculará con la lista general de viajeros.</p>
            </div>
        </div>

        <div class="ukiyo-field-grid">
            <div class="ukiyo-field">
                <label for="ukiyo_portal_proposal_cta_label">Texto del CTA</label>
                <input type="text" id="ukiyo_portal_proposal_cta_label" name="ukiyo_portal_proposal_cta_label" value="<?php echo esc_attr( $data['proposal']['cta_label'] ); ?>" placeholder="Quiero este viaje" />
                <p class="ukiyo-hint">El CTA abrirá siempre el canal principal de WhatsApp de UKIYO y marcará la propuesta como aprobada.</p>
            </div>
        </div>

        <div class="ukiyo-field-grid">
            <div class="ukiyo-field">
                <label for="ukiyo_portal_proposal_includes">Qué incluye</label>
                <textarea id="ukiyo_portal_proposal_includes" name="ukiyo_portal_proposal_includes" placeholder="Un elemento por línea&#10;Alojamientos seleccionados&#10;Transfers privados&#10;Ruta diseñada por UKIYO"><?php echo esc_textarea( $data['proposal']['includes'] ); ?></textarea>
            </div>
            <div class="ukiyo-field">
                <label for="ukiyo_portal_proposal_excludes">Qué no incluye</label>
                <textarea id="ukiyo_portal_proposal_excludes" name="ukiyo_portal_proposal_excludes" placeholder="Un elemento por línea&#10;Vuelos internacionales&#10;Comidas no indicadas&#10;Seguro de viaje"><?php echo esc_textarea( $data['proposal']['excludes'] ); ?></textarea>
            </div>
        </div>

        <div class="ukiyo-field">
            <label for="ukiyo_portal_proposal_price_breakdown">Desglose del precio</label>
            <textarea id="ukiyo_portal_proposal_price_breakdown" name="ukiyo_portal_proposal_price_breakdown" placeholder="Una línea por concepto&#10;Alojamientos boutique | 1.250 € | 4 días / 3 noches&#10;Vehículo de alquiler | 280 € | Categoría compacta&#10;Seguro | 95 € | Cobertura base"><?php echo esc_textarea( $data['proposal']['price_breakdown'] ); ?></textarea>
            <p class="ukiyo-hint">Formato recomendado: concepto | importe | nota opcional. Este bloque aparecerá en la propuesta pública para reforzar la transparencia del presupuesto.</p>
        </div>

        <div class="ukiyo-field">
            <div class="ukiyo-link-box">
                <strong>Enlace único de la propuesta</strong>
                <input type="hidden" name="ukiyo_portal_regenerate_token" value="0" data-ukiyo-regenerate-token-input />
                <?php if ( $proposal_url ) : ?>
                    <div class="ukiyo-inline-actions">
                        <input type="text" class="ukiyo-readonly-input" readonly value="<?php echo esc_attr( $proposal_url ); ?>" data-ukiyo-copy-source />
                        <button type="button" class="button button-secondary ukiyo-copy-link">Copiar enlace</button>
                        <a class="button button-primary" href="<?php echo esc_url( $proposal_url ); ?>" target="_blank" rel="noreferrer">Abrir propuesta</a>
                        <button type="button" class="button ukiyo-regenerate-proposal-link">Regenerar enlace</button>
                    </div>
                    <p class="ukiyo-hint">Al regenerarlo, el enlace actual dejará de funcionar y la propuesta pasará a tener una URL nueva.</p>
                <?php else : ?>
                    <p class="ukiyo-hint">Guarda o publica este viaje como propuesta pública para generar el enlace único y poder compartirlo.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="ukiyo-field">
            <div class="ukiyo-link-box">
                <strong>Estado actual de la propuesta</strong>
                <p style="margin:10px 0 0;color:<?php echo esc_attr( $response_meta['color'] ); ?>;font-weight:700;"><?php echo esc_html( $response_meta['icon'] . ' ' . $response_meta['label'] ); ?></p>
                <?php if ( ! empty( $data['proposal']['approved_at'] ) ) : ?>
                    <p class="ukiyo-hint">Aprobada el <?php echo esc_html( mysql2date( 'd/m/Y H:i', $data['proposal']['approved_at'] ) ); ?>.</p>
                <?php endif; ?>
                <?php if ( ! empty( $data['proposal']['change_requested_at'] ) ) : ?>
                    <p class="ukiyo-hint">Última propuesta de cambios el <?php echo esc_html( mysql2date( 'd/m/Y H:i', $data['proposal']['change_requested_at'] ) ); ?>.</p>
                <?php endif; ?>
                <?php if ( ! empty( $data['proposal']['change_request_message'] ) ) : ?>
                    <div style="margin-top:12px;padding:14px 16px;border-radius:14px;background:#fff;border:1px solid rgba(67,53,44,.08);color:#5c544c;line-height:1.7;">
                        <?php echo nl2br( esc_html( $data['proposal']['change_request_message'] ) ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( 'pending' !== $data['proposal']['response_status'] || ! empty( $data['proposal']['change_request_message'] ) || ! empty( $data['proposal']['approved_at'] ) || ! empty( $data['proposal']['change_requested_at'] ) ) : ?>
                    <div style="margin-top:14px;">
                        <a class="button button-secondary" href="<?php echo esc_url( $reset_url ); ?>" onclick="return window.confirm('Esto reiniciará el estado de la propuesta y borrará la aprobación o los cambios enviados. ¿Quieres continuar?');">Reiniciar estado</a>
                        <p class="ukiyo-hint" style="margin-top:8px;">Úsalo si necesitas volver la propuesta a estado pendiente y borrar la respuesta recibida.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}

function ukiyo_portal_render_users_metabox( $post ) {
    $data         = ukiyo_portal_get_trip_data( $post );
    $selected_ids = array_map( 'intval', $data['users'] );
    $clients      = ukiyo_portal_get_client_users();
    $extra_users  = ! empty( $selected_ids ) ? get_users( [ 'include' => $selected_ids ] ) : [];
    $users        = [];

    foreach ( array_merge( $clients, $extra_users ) as $user ) {
        $users[ $user->ID ] = $user;
    }

    ukiyo_portal_admin_styles();
    ?>
    <div class="ukiyo-portal-admin">
        <div class="ukiyo-field">
            <label for="ukiyo-portal-user-search">Buscar clientes del portal</label>
            <input type="text" id="ukiyo-portal-user-search" class="ukiyo-user-search" placeholder="Nombre o email..." />
            <p class="ukiyo-hint">Gestiona los clientes desde <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=ukiyo_viaje&page=ukiyo-portal-clientes' ) ); ?>">Portal del Aventurero → Clientes</a>.</p>
        </div>
        <div class="ukiyo-user-list">
            <?php if ( empty( $users ) ) : ?>
                <p>No hay clientes creados todavía.</p>
            <?php endif; ?>
            <?php foreach ( $users as $user ) : ?>
                <div class="ukiyo-user-item" data-search="<?php echo esc_attr( strtolower( $user->display_name . ' ' . $user->user_email ) ); ?>">
                    <input type="checkbox" id="ukiyo-user-<?php echo esc_attr( $user->ID ); ?>" name="ukiyo_portal_users[]" value="<?php echo esc_attr( $user->ID ); ?>" <?php checked( in_array( (int) $user->ID, array_map( 'intval', $data['users'] ), true ) ); ?> />
                    <label for="ukiyo-user-<?php echo esc_attr( $user->ID ); ?>">
                        <?php echo esc_html( $user->display_name ); ?><br />
                        <span class="ukiyo-hint"><?php echo esc_html( $user->user_email ); ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}

function ukiyo_portal_render_documents_metabox( $post ) {
    $data = ukiyo_portal_get_trip_data( $post );
    ukiyo_portal_admin_styles();
    ?>
    <div class="ukiyo-portal-admin">
        <div class="ukiyo-repeater-list" data-ukiyo-repeater="documents">
            <?php foreach ( $data['documents'] as $index => $document ) : ?>
                <?php ukiyo_portal_render_document_row( $index, $document ); ?>
            <?php endforeach; ?>
        </div>
        <button type="button" class="button button-primary ukiyo-add-row" data-template="ukiyo-portal-document-template" data-target="[data-ukiyo-repeater='documents']">Añadir documento</button>
        <script type="text/html" id="ukiyo-portal-document-template">
            <?php ukiyo_portal_render_document_row( '__INDEX__', [] ); ?>
        </script>
    </div>
    <?php
}

function ukiyo_portal_render_flights_metabox( $post ) {
    $data           = ukiyo_portal_get_trip_data( $post );
    $flights        = ukiyo_portal_normalize_flights( $data['flights'] );
    $airline_options = ukiyo_portal_get_airline_options();

    ukiyo_portal_admin_styles();
    ?>
    <div class="ukiyo-portal-admin">
        <div class="ukiyo-field-grid">
            <div class="ukiyo-field">
                <label for="ukiyo_portal_flights_airline">Aerolínea</label>
                <select id="ukiyo_portal_flights_airline" name="ukiyo_portal_flights[airline]">
                    <option value="">Selecciona una aerolínea</option>
                    <?php foreach ( $airline_options as $value => $airline ) : ?>
                        <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $flights['airline'], $value ); ?>><?php echo esc_html( $airline['label'] ); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="ukiyo-field">
                <label for="ukiyo_portal_flights_airline_custom">Otra aerolínea</label>
                <input type="text" id="ukiyo_portal_flights_airline_custom" name="ukiyo_portal_flights[airline_custom]" value="<?php echo esc_attr( $flights['airline_custom'] ); ?>" placeholder="Solo si no aparece en el selector" />
            </div>
            <div class="ukiyo-field"></div>
        </div>

        <div class="ukiyo-subsection">
            <div class="ukiyo-subsection-title">
                <strong>Vuelo de ida</strong>
            </div>
            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_outbound_departure_airport">Origen</label>
                    <input type="text" id="ukiyo_portal_flights_outbound_departure_airport" name="ukiyo_portal_flights[outbound_departure_airport]" value="<?php echo esc_attr( $flights['outbound_departure_airport'] ); ?>" placeholder="Madrid (MAD)" />
                </div>
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_outbound_arrival_airport">Destino</label>
                    <input type="text" id="ukiyo_portal_flights_outbound_arrival_airport" name="ukiyo_portal_flights[outbound_arrival_airport]" value="<?php echo esc_attr( $flights['outbound_arrival_airport'] ); ?>" placeholder="Arrecife (ACE)" />
                </div>
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_outbound_flight_number">Número de vuelo</label>
                    <input type="text" id="ukiyo_portal_flights_outbound_flight_number" name="ukiyo_portal_flights[outbound_flight_number]" value="<?php echo esc_attr( $flights['outbound_flight_number'] ); ?>" placeholder="IB1234" />
                </div>
            </div>
            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_outbound_departure_time">Salida</label>
                    <input type="datetime-local" id="ukiyo_portal_flights_outbound_departure_time" name="ukiyo_portal_flights[outbound_departure_time]" value="<?php echo esc_attr( $flights['outbound_departure_time'] ); ?>" />
                </div>
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_outbound_arrival_time">Llegada</label>
                    <input type="datetime-local" id="ukiyo_portal_flights_outbound_arrival_time" name="ukiyo_portal_flights[outbound_arrival_time]" value="<?php echo esc_attr( $flights['outbound_arrival_time'] ); ?>" />
                </div>
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_outbound_departure_timezone">Zona horaria de salida</label>
                    <select id="ukiyo_portal_flights_outbound_departure_timezone" name="ukiyo_portal_flights[outbound_departure_timezone]">
                        <option value="">Sin definir</option>
                        <?php echo wp_timezone_choice( $flights['outbound_departure_timezone'], get_user_locale() ); ?>
                    </select>
                </div>
            </div>
            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_outbound_arrival_timezone">Zona horaria de llegada</label>
                    <select id="ukiyo_portal_flights_outbound_arrival_timezone" name="ukiyo_portal_flights[outbound_arrival_timezone]">
                        <option value="">Sin definir</option>
                        <?php echo wp_timezone_choice( $flights['outbound_arrival_timezone'], get_user_locale() ); ?>
                    </select>
                    <p class="ukiyo-hint">La duración del vuelo se calcula con estas zonas horarias. Si no las defines, el portal hará una resta simple entre horas locales.</p>
                </div>
                <div class="ukiyo-field"></div>
                <div class="ukiyo-field"></div>
            </div>
        </div>

        <div class="ukiyo-subsection">
            <div class="ukiyo-subsection-title">
                <strong>Vuelo de vuelta</strong>
            </div>
            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_return_departure_airport">Origen</label>
                    <input type="text" id="ukiyo_portal_flights_return_departure_airport" name="ukiyo_portal_flights[return_departure_airport]" value="<?php echo esc_attr( $flights['return_departure_airport'] ); ?>" placeholder="Arrecife (ACE)" />
                </div>
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_return_arrival_airport">Destino</label>
                    <input type="text" id="ukiyo_portal_flights_return_arrival_airport" name="ukiyo_portal_flights[return_arrival_airport]" value="<?php echo esc_attr( $flights['return_arrival_airport'] ); ?>" placeholder="Madrid (MAD)" />
                </div>
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_return_flight_number">Número de vuelo</label>
                    <input type="text" id="ukiyo_portal_flights_return_flight_number" name="ukiyo_portal_flights[return_flight_number]" value="<?php echo esc_attr( $flights['return_flight_number'] ); ?>" placeholder="IB4321" />
                </div>
            </div>
            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_return_departure_time">Salida</label>
                    <input type="datetime-local" id="ukiyo_portal_flights_return_departure_time" name="ukiyo_portal_flights[return_departure_time]" value="<?php echo esc_attr( $flights['return_departure_time'] ); ?>" />
                </div>
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_return_arrival_time">Llegada</label>
                    <input type="datetime-local" id="ukiyo_portal_flights_return_arrival_time" name="ukiyo_portal_flights[return_arrival_time]" value="<?php echo esc_attr( $flights['return_arrival_time'] ); ?>" />
                </div>
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_return_departure_timezone">Zona horaria de salida</label>
                    <select id="ukiyo_portal_flights_return_departure_timezone" name="ukiyo_portal_flights[return_departure_timezone]">
                        <option value="">Sin definir</option>
                        <?php echo wp_timezone_choice( $flights['return_departure_timezone'], get_user_locale() ); ?>
                    </select>
                </div>
            </div>
            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label for="ukiyo_portal_flights_return_arrival_timezone">Zona horaria de llegada</label>
                    <select id="ukiyo_portal_flights_return_arrival_timezone" name="ukiyo_portal_flights[return_arrival_timezone]">
                        <option value="">Sin definir</option>
                        <?php echo wp_timezone_choice( $flights['return_arrival_timezone'], get_user_locale() ); ?>
                    </select>
                </div>
                <div class="ukiyo-field"></div>
                <div class="ukiyo-field"></div>
            </div>
        </div>
    </div>
    <?php
}

function ukiyo_portal_render_document_row( $index, $document ) {
    $document = wp_parse_args(
        (array) $document,
        [
            'name'        => '',
            'type'        => 'otros',
            'description' => '',
            'file_id'     => 0,
            'url'         => '',
            'order'       => $index,
        ]
    );
    $attachment_title = $document['file_id'] ? get_the_title( $document['file_id'] ) : '';
    ?>
    <div class="ukiyo-repeater-item" data-index="<?php echo esc_attr( $index ); ?>">
        <div class="ukiyo-repeater-top">
            <div class="ukiyo-repeater-title"><span class="ukiyo-sort-handle">↕</span> Documento</div>
            <button type="button" class="ukiyo-remove-row">Eliminar</button>
        </div>
        <div class="ukiyo-field-grid">
            <div class="ukiyo-field">
                <label>Nombre</label>
                <input type="text" name="ukiyo_portal_documents[<?php echo esc_attr( $index ); ?>][name]" value="<?php echo esc_attr( $document['name'] ); ?>" />
            </div>
            <div class="ukiyo-field">
                <label>Tipo</label>
                <select name="ukiyo_portal_documents[<?php echo esc_attr( $index ); ?>][type]">
                    <?php foreach ( ukiyo_portal_get_document_types() as $key => $label ) : ?>
                        <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $document['type'], $key ); ?>><?php echo esc_html( $label ); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="ukiyo-field">
                <label>Orden</label>
                <input type="number" name="ukiyo_portal_documents[<?php echo esc_attr( $index ); ?>][order]" value="<?php echo esc_attr( $document['order'] ); ?>" />
            </div>
        </div>
        <div class="ukiyo-field">
            <label>Descripción</label>
            <textarea name="ukiyo_portal_documents[<?php echo esc_attr( $index ); ?>][description]"><?php echo esc_textarea( $document['description'] ); ?></textarea>
        </div>
        <div class="ukiyo-field">
            <label>Link del recurso</label>
            <input type="url" name="ukiyo_portal_documents[<?php echo esc_attr( $index ); ?>][url]" value="<?php echo esc_attr( $document['url'] ); ?>" placeholder="https://..." />
            <p class="ukiyo-hint">Si el tipo es <strong>Recurso</strong>, este enlace se mostrará en el portal como acceso directo, aunque no haya archivo adjunto.</p>
        </div>
        <div class="ukiyo-field">
            <label>Archivo</label>
            <div class="ukiyo-file-control">
                <input type="hidden" class="ukiyo-media-input" name="ukiyo_portal_documents[<?php echo esc_attr( $index ); ?>][file_id]" value="<?php echo esc_attr( $document['file_id'] ); ?>" />
                <button type="button" class="button button-secondary ukiyo-portal-media" data-multiple="false">Seleccionar archivo</button>
                <button type="button" class="button-link-delete ukiyo-clear-media">Quitar</button>
            </div>
            <div class="ukiyo-file-preview"><?php echo esc_html( $attachment_title ); ?></div>
            <p class="ukiyo-hint">Opcional si ya has añadido un recurso externo.</p>
        </div>
    </div>
    <?php
}

function ukiyo_portal_render_itinerary_metabox( $post ) {
    $data = ukiyo_portal_get_trip_data( $post );
    ukiyo_portal_admin_styles();
    ?>
    <div class="ukiyo-portal-admin">
        <div class="ukiyo-repeater-list" data-ukiyo-repeater="itinerary-places">
            <?php foreach ( $data['itinerary'] as $index => $place ) : ?>
                <?php ukiyo_portal_render_itinerary_place_row( $index, $place ); ?>
            <?php endforeach; ?>
        </div>
        <button type="button" class="button button-primary ukiyo-add-row" data-template="ukiyo-portal-itinerary-place-template" data-target="[data-ukiyo-repeater='itinerary-places']">Añadir lugar</button>
        <script type="text/html" id="ukiyo-portal-itinerary-place-template">
            <?php ukiyo_portal_render_itinerary_place_row( '__INDEX__', [] ); ?>
        </script>
        <script type="text/html" id="ukiyo-portal-itinerary-day-template">
            <?php ukiyo_portal_render_itinerary_day_row( 'ukiyo_portal_itinerary[__PARENT__][days]', '__INDEX__', [] ); ?>
        </script>
        <script type="text/html" id="ukiyo-portal-itinerary-accommodation-template">
            <?php ukiyo_portal_render_itinerary_accommodation_row( 'ukiyo_portal_itinerary[__PARENT__][accommodations]', '__INDEX__', [] ); ?>
        </script>
        <script type="text/html" id="ukiyo-portal-itinerary-activity-template">
            <?php ukiyo_portal_render_itinerary_activity_row( 'ukiyo_portal_itinerary[__PLACE__][days][__DAY__][activities]', '__INDEX__', [] ); ?>
        </script>
    </div>
    <?php
}

function ukiyo_portal_get_editor_id_from_name( $name ) {
    $editor_id = preg_replace( '/[^a-zA-Z0-9_]+/', '_', (string) $name );
    return trim( $editor_id, '_' );
}

function ukiyo_portal_render_rich_textarea( $name, $value, $editor_id ) {
    ?>
    <div class="ukiyo-editor-shell">
        <textarea
            class="ukiyo-rich-textarea"
            id="<?php echo esc_attr( $editor_id ); ?>"
            name="<?php echo esc_attr( $name ); ?>"
            rows="8"
        ><?php echo esc_textarea( $value ); ?></textarea>
    </div>
    <?php
}

function ukiyo_portal_render_itinerary_place_row( $index, $place ) {
    $place = wp_parse_args( (array) $place, ukiyo_portal_get_itinerary_place_defaults() );
    $days  = ukiyo_portal_normalize_itinerary_days( $place['days'] );
    $accommodations = ukiyo_portal_normalize_itinerary_accommodations( isset( $place['accommodations'] ) ? $place['accommodations'] : [], ! empty( $days ) ? count( $days ) : max( 1, (int) $place['stay_days'] ) );
    $place_description_editor_id = ukiyo_portal_get_editor_id_from_name( 'ukiyo_portal_itinerary[' . $index . '][place_description]' );
    $place_label = $place['place'] ? $place['place'] : 'Nuevo lugar';
    $place_meta  = sprintf( '%s día(s) · %s', max( 1, (int) $place['stay_days'] ), ukiyo_portal_get_place_accommodation_summary( array_merge( $place, [ 'accommodations' => $accommodations ] ) ) );
    ?>
    <details class="ukiyo-repeater-item ukiyo-itinerary-place ukiyo-collapsible" data-index="<?php echo esc_attr( $index ); ?>">
        <summary>
            <div class="ukiyo-collapsible__label">
                <strong class="ukiyo-place-summary-text"><?php echo esc_html( $place_label ); ?></strong>
                <span class="ukiyo-place-summary-meta"><?php echo esc_html( $place_meta ); ?></span>
            </div>
            <div class="ukiyo-collapsible__actions">
                <span class="ukiyo-sort-handle">↕</span>
                <button type="button" class="ukiyo-remove-row">Eliminar</button>
            </div>
        </summary>
        <div class="ukiyo-collapsible__content">
            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label>Lugar</label>
                    <input type="text" class="ukiyo-place-name" name="ukiyo_portal_itinerary[<?php echo esc_attr( $index ); ?>][place]" value="<?php echo esc_attr( $place['place'] ); ?>" placeholder="Tokio, Monteverde, Puerto Viejo..." />
                </div>
                <div class="ukiyo-field">
                    <label>Número de días en este lugar</label>
                    <input type="number" min="1" class="ukiyo-place-stay-days" name="ukiyo_portal_itinerary[<?php echo esc_attr( $index ); ?>][stay_days]" value="<?php echo esc_attr( $place['stay_days'] ); ?>" />
                </div>
                <div class="ukiyo-field">
                    <label>Punto exacto de Google Maps</label>
                    <input type="url" name="ukiyo_portal_itinerary[<?php echo esc_attr( $index ); ?>][map_url]" value="<?php echo esc_attr( $place['map_url'] ); ?>" placeholder="Pega aquí el enlace del punto en Google Maps" />
                    <p class="ukiyo-hint">Pega el enlace compartido del punto exacto y el mapa del portal intentará sacar las coordenadas desde ahí.</p>
                </div>
            </div>

            <div class="ukiyo-field">
                <label>Puntos clave para el mapa de este lugar</label>
                <textarea class="ukiyo-map-points-textarea" name="ukiyo_portal_itinerary[<?php echo esc_attr( $index ); ?>][map_points]" placeholder="Timanfaya | https://maps.app.goo.gl/... | 29.0000 | -13.0000&#10;Jameos del Agua | https://maps.app.goo.gl/... | 29.0000 | -13.0000"><?php echo esc_textarea( $place['map_points'] ); ?></textarea>
                <p class="ukiyo-hint">Puedes seguir pegando líneas manuales, pero lo más cómodo es usar el buscador de abajo. Al añadir un punto se guardan también sus coordenadas para que el mapa no falle.</p>
                <div class="ukiyo-map-points-builder" data-map-points-builder>
                    <div class="ukiyo-map-points-search">
                        <input type="text" class="ukiyo-map-points-query" placeholder="Buscar punto clave: Famara, Jameos del Agua, Timanfaya..." />
                        <button type="button" class="button button-secondary ukiyo-map-points-search-button">Buscar lugar</button>
                    </div>
                    <div class="ukiyo-map-points-results" data-map-points-results></div>
                </div>
            </div>

            <div class="ukiyo-field">
                <label>Descripción editorial del lugar</label>
                <?php ukiyo_portal_render_rich_textarea( 'ukiyo_portal_itinerary[' . $index . '][place_description]', $place['place_description'], $place_description_editor_id ); ?>
                <p class="ukiyo-hint">Este texto se mostrará en la propuesta comercial como introducción de esta etapa del viaje.</p>
            </div>

            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label>Imagen del lugar</label>
                    <div class="ukiyo-media-control">
                        <input type="hidden" class="ukiyo-media-input" name="ukiyo_portal_itinerary[<?php echo esc_attr( $index ); ?>][image_id]" value="<?php echo esc_attr( $place['image_id'] ); ?>" />
                        <button type="button" class="button button-secondary ukiyo-portal-media" data-multiple="false" data-library="image">Seleccionar imagen</button>
                        <button type="button" class="button-link-delete ukiyo-clear-media">Quitar</button>
                    </div>
                    <div class="ukiyo-image-preview">
                        <?php if ( $place['image_id'] ) : ?>
                            <?php echo wp_get_attachment_image( $place['image_id'], 'medium' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="ukiyo-field"></div>
                <div class="ukiyo-field"></div>
            </div>

            <div class="ukiyo-subsection">
                <div class="ukiyo-subsection-title">
                    <strong>Alojamientos en este lugar</strong>
                    <div class="ukiyo-nested-actions">
                        <button
                            type="button"
                            class="button button-secondary ukiyo-add-nested-row"
                            data-template="ukiyo-portal-itinerary-accommodation-template"
                            data-target=".ukiyo-place-accommodations"
                            data-parent-prefix="ukiyo_portal_itinerary[<?php echo esc_attr( $index ); ?>][accommodations]"
                        >Añadir alojamiento</button>
                    </div>
                </div>
                <p class="ukiyo-hint">Puedes asignar varios alojamientos al mismo lugar o isla, indicando qué días cubre cada uno.</p>
                <div class="ukiyo-repeater-list ukiyo-place-accommodations" data-ukiyo-repeater="place-accommodations">
                    <?php foreach ( $accommodations as $accommodation_index => $accommodation ) : ?>
                        <?php ukiyo_portal_render_itinerary_accommodation_row( 'ukiyo_portal_itinerary[' . $index . '][accommodations]', $accommodation_index, $accommodation ); ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="ukiyo-subsection">
                <div class="ukiyo-subsection-title">
                    <strong>Días en este lugar</strong>
                    <div class="ukiyo-nested-actions">
                        <button
                            type="button"
                            class="button button-secondary ukiyo-add-nested-row"
                            data-template="ukiyo-portal-itinerary-day-template"
                            data-target=".ukiyo-place-days"
                            data-parent-prefix="ukiyo_portal_itinerary[<?php echo esc_attr( $index ); ?>][days]"
                        >Añadir día</button>
                        <button type="button" class="ukiyo-close-panel">Cerrar lugar</button>
                    </div>
                </div>
                <div class="ukiyo-repeater-list ukiyo-place-days" data-ukiyo-repeater="place-days">
                    <?php foreach ( $days as $day_index => $day ) : ?>
                        <?php ukiyo_portal_render_itinerary_day_row( 'ukiyo_portal_itinerary[' . $index . '][days]', $day_index, $day ); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </details>
    <?php
}

function ukiyo_portal_render_itinerary_accommodation_row( $parent_prefix, $index, $accommodation ) {
    $accommodation = wp_parse_args( (array) $accommodation, ukiyo_portal_get_itinerary_accommodation_defaults() );
    $name_base     = $parent_prefix . '[' . $index . ']';
    $label         = $accommodation['name'] ? $accommodation['name'] : 'Nuevo alojamiento';
    $day_span      = 'Días ' . max( 1, (int) $accommodation['start_day'] ) . '-' . max( max( 1, (int) $accommodation['start_day'] ), (int) $accommodation['end_day'] );
    ?>
    <details class="ukiyo-repeater-item ukiyo-repeater-item--nested ukiyo-repeater-item--stay ukiyo-collapsible" data-index="<?php echo esc_attr( $index ); ?>">
        <summary>
            <div class="ukiyo-collapsible__label">
                <strong class="ukiyo-stay-summary-text"><?php echo esc_html( $label ); ?></strong>
                <span class="ukiyo-stay-summary-meta"><?php echo esc_html( $day_span ); ?></span>
            </div>
            <div class="ukiyo-collapsible__actions">
                <span class="ukiyo-sort-handle">↕</span>
                <button type="button" class="ukiyo-remove-row">Eliminar</button>
            </div>
        </summary>
        <div class="ukiyo-collapsible__content">
            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label>Alojamiento</label>
                    <input type="text" class="ukiyo-place-accommodation" name="<?php echo esc_attr( $name_base ); ?>[name]" value="<?php echo esc_attr( $accommodation['name'] ); ?>" placeholder="Nombre del hotel, villa o casa" />
                </div>
                <div class="ukiyo-field">
                    <label>Día inicio</label>
                    <input type="number" min="1" class="ukiyo-stay-start-day" name="<?php echo esc_attr( $name_base ); ?>[start_day]" value="<?php echo esc_attr( max( 1, (int) $accommodation['start_day'] ) ); ?>" />
                </div>
                <div class="ukiyo-field">
                    <label>Día fin</label>
                    <input type="number" min="1" class="ukiyo-stay-end-day" name="<?php echo esc_attr( $name_base ); ?>[end_day]" value="<?php echo esc_attr( max( max( 1, (int) $accommodation['start_day'] ), (int) $accommodation['end_day'] ) ); ?>" />
                </div>
            </div>

            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label>Valoración externa</label>
                    <input type="text" name="<?php echo esc_attr( $name_base ); ?>[rating]" value="<?php echo esc_attr( $accommodation['rating'] ); ?>" placeholder="4.4" />
                    <p class="ukiyo-hint">Introduce solo la nota, por ejemplo <strong>4.4</strong>. En frontend se mostrará como valoración sobre 5.</p>
                </div>
                <div class="ukiyo-field">
                    <label>Google Maps del alojamiento</label>
                    <div class="ukiyo-nested-actions">
                        <input type="text" class="ukiyo-google-maps-url ukiyo-accommodation-maps-url" name="<?php echo esc_attr( $name_base ); ?>[location]" value="<?php echo esc_attr( $accommodation['location'] ); ?>" placeholder="Pega aquí el enlace del alojamiento en Google Maps" />
                        <button type="button" class="button button-secondary ukiyo-google-maps-autofill" data-autofill-context="accommodation">Autocompletar</button>
                    </div>
                    <p class="ukiyo-hint">Rellena automáticamente el nombre y la valoración del alojamiento desde Google Maps.</p>
                </div>
                <div class="ukiyo-field">
                    <label>Fuente valoración</label>
                    <input type="text" name="<?php echo esc_attr( $name_base ); ?>[rating_source]" value="<?php echo esc_attr( $accommodation['rating_source'] ); ?>" placeholder="Google, Airbnb..." />
                </div>
            </div>

            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label>Imagen del alojamiento</label>
                    <div class="ukiyo-media-control">
                        <input type="hidden" class="ukiyo-media-input" name="<?php echo esc_attr( $name_base ); ?>[image_id]" value="<?php echo esc_attr( $accommodation['image_id'] ); ?>" />
                        <button type="button" class="button button-secondary ukiyo-portal-media" data-multiple="false" data-library="image">Seleccionar imagen</button>
                        <button type="button" class="button-link-delete ukiyo-clear-media">Quitar</button>
                    </div>
                    <div class="ukiyo-image-preview ukiyo-accommodation-preview">
                        <?php if ( $accommodation['image_id'] ) : ?>
                            <?php echo wp_get_attachment_image( $accommodation['image_id'], 'medium' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="ukiyo-nested-actions">
                <button type="button" class="ukiyo-close-panel">Cerrar alojamiento</button>
            </div>
        </div>
    </details>
    <?php
}

function ukiyo_portal_render_itinerary_day_row( $parent_prefix, $index, $day ) {
    $day       = wp_parse_args( (array) $day, ukiyo_portal_get_itinerary_day_defaults() );
    $images    = ukiyo_portal_normalize_attachment_ids( $day['image_ids'] );
    $activities = ukiyo_portal_normalize_itinerary_activities( $day['activities'] );
    $name_base = $parent_prefix . '[' . $index . ']';
    $editor_id = ukiyo_portal_get_editor_id_from_name( $name_base . '[description]' );
    $day_label = $day['title'] ? $day['title'] : 'Nuevo día';
    $day_meta  = 'Día ' . ( $day['day_number'] ? (int) $day['day_number'] : ( is_numeric( $index ) ? ( (int) $index + 1 ) : 1 ) );
    ?>
    <details class="ukiyo-repeater-item ukiyo-repeater-item--nested ukiyo-collapsible" data-index="<?php echo esc_attr( $index ); ?>">
        <summary>
            <div class="ukiyo-collapsible__label">
                <strong class="ukiyo-day-summary-text"><?php echo esc_html( $day_label ); ?></strong>
                <span class="ukiyo-day-summary-meta"><?php echo esc_html( $day_meta ); ?></span>
            </div>
            <div class="ukiyo-collapsible__actions">
                <span class="ukiyo-sort-handle">↕</span>
                <button type="button" class="ukiyo-remove-row">Eliminar</button>
            </div>
        </summary>
        <div class="ukiyo-collapsible__content">
            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label>Número del día</label>
                    <input type="number" min="1" class="ukiyo-day-number" name="<?php echo esc_attr( $name_base ); ?>[day_number]" value="<?php echo esc_attr( $day['day_number'] ); ?>" />
                </div>
                <div class="ukiyo-field">
                    <label>Título del día</label>
                    <input type="text" class="ukiyo-day-title" name="<?php echo esc_attr( $name_base ); ?>[title]" value="<?php echo esc_attr( $day['title'] ); ?>" placeholder="Llegada, exploración, ruta cultural..." />
                </div>
                <div class="ukiyo-field">
                    <label>Horario orientativo</label>
                    <textarea name="<?php echo esc_attr( $name_base ); ?>[schedule]"><?php echo esc_textarea( $day['schedule'] ); ?></textarea>
                </div>
            </div>

            <div class="ukiyo-field">
                <label>Descripción del día</label>
                <?php ukiyo_portal_render_rich_textarea( $name_base . '[description]', $day['description'], $editor_id ); ?>
            </div>

            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label>Ubicación principal del día</label>
                    <input type="text" name="<?php echo esc_attr( $name_base ); ?>[location_name]" value="<?php echo esc_attr( $day['location_name'] ); ?>" placeholder="Timanfaya, Jameos del Agua, Teguise..." />
                </div>
                <div class="ukiyo-field">
                    <label>Dirección o referencia</label>
                    <input type="text" name="<?php echo esc_attr( $name_base ); ?>[location_address]" value="<?php echo esc_attr( $day['location_address'] ); ?>" placeholder="Arrecife, Lanzarote o dirección exacta" />
                </div>
                <div class="ukiyo-field">
                    <label>Google Maps de la ubicación del día</label>
                    <div class="ukiyo-nested-actions">
                        <input type="url" class="ukiyo-google-maps-url ukiyo-day-location-maps-url" name="<?php echo esc_attr( $name_base ); ?>[location_map_url]" value="<?php echo esc_attr( $day['location_map_url'] ); ?>" placeholder="https://..." />
                        <input type="hidden" class="ukiyo-location-lat" name="<?php echo esc_attr( $name_base ); ?>[location_lat]" value="<?php echo esc_attr( isset( $day['location_lat'] ) ? $day['location_lat'] : '' ); ?>" />
                        <input type="hidden" class="ukiyo-location-lng" name="<?php echo esc_attr( $name_base ); ?>[location_lng]" value="<?php echo esc_attr( isset( $day['location_lng'] ) ? $day['location_lng'] : '' ); ?>" />
                        <button type="button" class="button button-secondary ukiyo-google-maps-autofill" data-autofill-context="day-location">Autocompletar</button>
                    </div>
                </div>
            </div>

            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label>Actividades o notas del día</label>
                    <textarea name="<?php echo esc_attr( $name_base ); ?>[recommendations]"><?php echo esc_textarea( $day['recommendations'] ); ?></textarea>
                </div>
                <div class="ukiyo-field">
                    <label>Imágenes del día</label>
                    <div class="ukiyo-media-control">
                        <input type="hidden" class="ukiyo-media-input" name="<?php echo esc_attr( $name_base ); ?>[image_ids]" value="<?php echo esc_attr( implode( ',', $images ) ); ?>" />
                        <button type="button" class="button button-secondary ukiyo-portal-media" data-multiple="true" data-library="image">Seleccionar imágenes</button>
                        <button type="button" class="button-link-delete ukiyo-clear-media">Quitar</button>
                    </div>
                    <div class="ukiyo-gallery-preview">
                        <?php foreach ( $images as $image_id ) : ?>
                            <?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="ukiyo-field">
                    <label>Actividad en Google Maps o enlace útil</label>
                    <div class="ukiyo-nested-actions">
                        <input type="url" class="ukiyo-google-maps-url ukiyo-activity-maps-url" name="<?php echo esc_attr( $name_base ); ?>[link_url]" value="<?php echo esc_attr( $day['link_url'] ); ?>" placeholder="https://..." />
                        <button type="button" class="button button-secondary ukiyo-google-maps-autofill" data-autofill-context="activity">Autocompletar</button>
                    </div>
                    <p class="ukiyo-hint">Si pegas un punto de Google Maps, el título del día puede rellenarse automáticamente con la actividad.</p>
                    <div class="ukiyo-file-control" style="margin-top:10px">
                        <input type="hidden" class="ukiyo-media-input" name="<?php echo esc_attr( $name_base ); ?>[file_id]" value="<?php echo esc_attr( $day['file_id'] ); ?>" />
                        <button type="button" class="button button-secondary ukiyo-portal-media" data-multiple="false">Seleccionar archivo</button>
                        <button type="button" class="button-link-delete ukiyo-clear-media">Quitar</button>
                    </div>
                    <div class="ukiyo-file-preview"><?php echo $day['file_id'] ? esc_html( get_the_title( $day['file_id'] ) ) : ''; ?></div>
                </div>
            </div>

            <div class="ukiyo-subsection">
                <div class="ukiyo-subsection-title">
                    <strong>Actividades del día</strong>
                    <div class="ukiyo-nested-actions">
                        <button
                            type="button"
                            class="button button-secondary ukiyo-add-day-activity-row"
                            data-template="ukiyo-portal-itinerary-activity-template"
                            data-target=".ukiyo-day-activities"
                            data-parent-prefix="<?php echo esc_attr( $name_base . '[activities]' ); ?>"
                        >Añadir actividad</button>
                    </div>
                </div>
                <div class="ukiyo-repeater-list ukiyo-day-activities" data-ukiyo-repeater="day-activities">
                    <?php foreach ( $activities as $activity_index => $activity ) : ?>
                        <?php ukiyo_portal_render_itinerary_activity_row( $name_base . '[activities]', $activity_index, $activity ); ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="ukiyo-nested-actions">
                <button type="button" class="ukiyo-close-panel">Cerrar día</button>
            </div>
        </div>
    </details>
    <?php
}

function ukiyo_portal_render_itinerary_activity_row( $parent_prefix, $index, $activity ) {
    $activity  = wp_parse_args( (array) $activity, ukiyo_portal_get_itinerary_activity_defaults() );
    $images    = ukiyo_portal_normalize_attachment_ids( $activity['image_ids'] );
    $name_base = $parent_prefix . '[' . $index . ']';
    $label     = $activity['title'] ? $activity['title'] : 'Nueva actividad';
    $modal_editor_id = ukiyo_portal_get_editor_id_from_name( $name_base . '[modal_content]' );
    ?>
    <details class="ukiyo-repeater-item ukiyo-repeater-item--nested ukiyo-repeater-item--activity ukiyo-collapsible" data-index="<?php echo esc_attr( $index ); ?>">
        <summary>
            <div class="ukiyo-collapsible__label">
                <strong class="ukiyo-activity-summary-text"><?php echo esc_html( $label ); ?></strong>
                <span class="ukiyo-activity-summary-meta"><?php echo esc_html( $activity['location_name'] ?: 'Ubicación por definir' ); ?></span>
            </div>
            <div class="ukiyo-collapsible__actions">
                <span class="ukiyo-sort-handle">↕</span>
                <button type="button" class="ukiyo-remove-row">Eliminar</button>
            </div>
        </summary>
        <div class="ukiyo-collapsible__content">
            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label>Título de la actividad</label>
                    <input type="text" name="<?php echo esc_attr( $name_base ); ?>[title]" value="<?php echo esc_attr( $activity['title'] ); ?>" placeholder="Atardecer en Papagayo, visita a bodega..." />
                </div>
                <div class="ukiyo-field">
                    <label>Ubicación</label>
                    <input type="text" name="<?php echo esc_attr( $name_base ); ?>[location_name]" value="<?php echo esc_attr( $activity['location_name'] ); ?>" placeholder="Lugar concreto de la actividad" />
                </div>
                <div class="ukiyo-field">
                    <label>Dirección o referencia</label>
                    <input type="text" name="<?php echo esc_attr( $name_base ); ?>[location_address]" value="<?php echo esc_attr( $activity['location_address'] ); ?>" placeholder="Dirección, barrio o referencia" />
                </div>
            </div>

            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label>Detalle de la actividad</label>
                    <textarea name="<?php echo esc_attr( $name_base ); ?>[description]" placeholder="Qué se hace aquí, por qué importa o cualquier nota útil"><?php echo esc_textarea( $activity['description'] ); ?></textarea>
                </div>
                <div class="ukiyo-field">
                    <label>Horarios</label>
                    <input type="text" name="<?php echo esc_attr( $name_base ); ?>[visiting_hours]" value="<?php echo esc_attr( $activity['visiting_hours'] ); ?>" placeholder="Lun-dom · 09:00 a 18:00" />
                </div>
                <div class="ukiyo-field">
                    <label>Precio de entrada</label>
                    <input type="text" name="<?php echo esc_attr( $name_base ); ?>[entry_price]" value="<?php echo esc_attr( $activity['entry_price'] ); ?>" placeholder="12 € por persona, gratuito, donativo..." />
                </div>
            </div>

            <div class="ukiyo-field-grid">
                <div class="ukiyo-field ukiyo-field--full">
                    <label>Contenido ampliado del modal</label>
                    <?php ukiyo_portal_render_rich_textarea( $name_base . '[modal_content]', $activity['modal_content'], $modal_editor_id ); ?>
                    <p class="description">Este contenido aparecerá en el pop-up de “Más información”: historia, contexto, consejos, curiosidades, normas, etc.</p>
                </div>
            </div>

            <div class="ukiyo-field-grid">
                <div class="ukiyo-field">
                    <label>Imágenes de la actividad</label>
                    <div class="ukiyo-media-control">
                        <input type="hidden" class="ukiyo-media-input" name="<?php echo esc_attr( $name_base ); ?>[image_ids]" value="<?php echo esc_attr( implode( ',', $images ) ); ?>" />
                        <button type="button" class="button button-secondary ukiyo-portal-media" data-multiple="true" data-library="image">Seleccionar imágenes</button>
                        <button type="button" class="button-link-delete ukiyo-clear-media">Quitar</button>
                    </div>
                    <div class="ukiyo-gallery-preview">
                        <?php foreach ( $images as $image_id ) : ?>
                            <?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="ukiyo-field">
                    <label>Google Maps de la actividad</label>
                    <div class="ukiyo-nested-actions">
                        <input type="url" class="ukiyo-google-maps-url ukiyo-activity-item-maps-url" name="<?php echo esc_attr( $name_base ); ?>[map_url]" value="<?php echo esc_attr( $activity['map_url'] ); ?>" placeholder="https://..." />
                        <input type="hidden" class="ukiyo-map-lat" name="<?php echo esc_attr( $name_base ); ?>[map_lat]" value="<?php echo esc_attr( isset( $activity['map_lat'] ) ? $activity['map_lat'] : '' ); ?>" />
                        <input type="hidden" class="ukiyo-map-lng" name="<?php echo esc_attr( $name_base ); ?>[map_lng]" value="<?php echo esc_attr( isset( $activity['map_lng'] ) ? $activity['map_lng'] : '' ); ?>" />
                        <button type="button" class="button button-secondary ukiyo-google-maps-autofill" data-autofill-context="activity-item">Autocompletar</button>
                    </div>
                </div>
            </div>

            <div class="ukiyo-nested-actions">
                <button type="button" class="ukiyo-close-panel">Cerrar actividad</button>
            </div>
        </div>
    </details>
    <?php
}

function ukiyo_portal_render_recommendations_metabox( $post ) {
    $data = ukiyo_portal_get_trip_data( $post );
    $place_options = ukiyo_portal_get_trip_place_options( $data );
    ukiyo_portal_admin_styles();
    ?>
    <div class="ukiyo-portal-admin">
        <div class="ukiyo-repeater-list" data-ukiyo-repeater="recommendations">
            <?php foreach ( $data['recommendations'] as $index => $item ) : ?>
                <?php ukiyo_portal_render_recommendation_row( $index, $item, $place_options ); ?>
            <?php endforeach; ?>
        </div>
        <button type="button" class="button button-primary ukiyo-add-row" data-template="ukiyo-portal-recommendation-template" data-target="[data-ukiyo-repeater='recommendations']">Añadir recomendación</button>
        <script type="text/html" id="ukiyo-portal-recommendation-template">
            <?php ukiyo_portal_render_recommendation_row( '__INDEX__', [], $place_options ); ?>
        </script>
    </div>
    <?php
}

function ukiyo_portal_render_recommendation_row( $index, $item, $place_options = [] ) {
    $categories = ukiyo_portal_get_recommendation_categories();
    $place_options = is_array( $place_options ) ? $place_options : [];
    $item = wp_parse_args(
        (array) $item,
        [
            'name'        => '',
            'category'    => '',
            'place'       => '',
            'rating'      => '',
            'description' => '',
            'note'        => '',
            'cta_label'   => '',
            'url'         => '',
            'address'     => '',
            'image_id'    => 0,
        ]
    );

    if ( $item['category'] && ! isset( $categories[ $item['category'] ] ) ) {
        $categories = [ $item['category'] => $item['category'] ] + $categories;
    }

    if ( $item['place'] && ! isset( $place_options[ $item['place'] ] ) ) {
        $place_options = [ $item['place'] => $item['place'] ] + $place_options;
    }

    $editor_id = ukiyo_portal_get_editor_id_from_name( 'ukiyo_portal_recommendations[' . $index . '][description]' );
    ?>
    <div class="ukiyo-repeater-item" data-index="<?php echo esc_attr( $index ); ?>">
        <div class="ukiyo-repeater-top">
            <div class="ukiyo-repeater-title"><span class="ukiyo-sort-handle">↕</span> Recomendación</div>
            <button type="button" class="ukiyo-remove-row">Eliminar</button>
        </div>
        <div class="ukiyo-field-grid">
            <div class="ukiyo-field">
                <label>Nombre</label>
                <input type="text" name="ukiyo_portal_recommendations[<?php echo esc_attr( $index ); ?>][name]" value="<?php echo esc_attr( $item['name'] ); ?>" />
            </div>
            <div class="ukiyo-field">
                <label>Categoría</label>
                <select name="ukiyo_portal_recommendations[<?php echo esc_attr( $index ); ?>][category]">
                    <option value="">Selecciona una categoría</option>
                    <?php foreach ( $categories as $value => $label ) : ?>
                        <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $item['category'], $value ); ?>><?php echo esc_html( $label ); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="ukiyo-field">
                <label>Lugar relacionado</label>
                <select name="ukiyo_portal_recommendations[<?php echo esc_attr( $index ); ?>][place]">
                    <option value="">Sin relación concreta</option>
                    <?php foreach ( $place_options as $value => $label ) : ?>
                        <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $item['place'], $value ); ?>><?php echo esc_html( $label ); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="ukiyo-hint">Solo aparecen los lugares ya creados y guardados en el itinerario.</p>
            </div>
            <div class="ukiyo-field">
                <label>Rating</label>
                <input type="text" name="ukiyo_portal_recommendations[<?php echo esc_attr( $index ); ?>][rating]" value="<?php echo esc_attr( $item['rating'] ); ?>" placeholder="4.7" />
            </div>
            <div class="ukiyo-field">
                <label>Link del botón</label>
                <div class="ukiyo-nested-actions">
                    <input type="url" class="ukiyo-google-maps-url" name="ukiyo_portal_recommendations[<?php echo esc_attr( $index ); ?>][url]" value="<?php echo esc_attr( $item['url'] ); ?>" placeholder="https://..." />
                    <button type="button" class="button button-secondary ukiyo-google-maps-autofill">Autocompletar desde Google</button>
                </div>
                <p class="ukiyo-hint">Puede ser cualquier URL. Si pegas un enlace de Google Maps, el botón de autocompletar puede rellenar nombre y rating.</p>
            </div>
        </div>
        <div class="ukiyo-field-grid">
            <div class="ukiyo-field">
                <label>Descripción</label>
                <?php ukiyo_portal_render_rich_textarea( 'ukiyo_portal_recommendations[' . $index . '][description]', $item['description'], $editor_id ); ?>
            </div>
            <div class="ukiyo-field">
                <label>Texto destacado opcional</label>
                <input type="text" name="ukiyo_portal_recommendations[<?php echo esc_attr( $index ); ?>][note]" value="<?php echo esc_attr( $item['note'] ); ?>" placeholder="Compra una SIM nada más aterrizar" />
            </div>
            <div class="ukiyo-field">
                <label>Texto del botón</label>
                <input type="text" name="ukiyo_portal_recommendations[<?php echo esc_attr( $index ); ?>][cta_label]" value="<?php echo esc_attr( $item['cta_label'] ); ?>" placeholder="Descargar mapas de Google" />
            </div>
            <div class="ukiyo-field">
                <label>Imagen opcional</label>
                <div class="ukiyo-media-control">
                    <input type="hidden" class="ukiyo-media-input" name="ukiyo_portal_recommendations[<?php echo esc_attr( $index ); ?>][image_id]" value="<?php echo esc_attr( $item['image_id'] ); ?>" />
                    <button type="button" class="button button-secondary ukiyo-portal-media" data-multiple="false" data-library="image">Seleccionar imagen</button>
                    <button type="button" class="button-link-delete ukiyo-clear-media">Quitar</button>
                </div>
                <div class="ukiyo-image-preview">
                    <?php if ( $item['image_id'] ) : ?>
                        <?php echo wp_get_attachment_image( $item['image_id'], 'thumbnail' ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function ukiyo_portal_ajax_autofill_google_place() {
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_send_json_error( [ 'message' => 'No autorizado.' ], 403 );
    }

    check_ajax_referer( 'ukiyo_portal_admin', 'nonce' );

    $url           = isset( $_POST['google_maps_url'] ) ? esc_url_raw( wp_unslash( $_POST['google_maps_url'] ) ) : '';
    $fallback_name = isset( $_POST['fallback_name'] ) ? sanitize_text_field( wp_unslash( $_POST['fallback_name'] ) ) : '';

    if ( '' === $url ) {
        wp_send_json_error( [ 'message' => 'Pega primero un enlace de Google Maps.' ], 400 );
    }

    if ( '' === ukiyo_portal_get_google_places_api_key() ) {
        wp_send_json_error( [ 'message' => 'Falta configurar la API key de Google Places.' ], 400 );
    }

    $resolved_url = ukiyo_portal_follow_google_maps_url( $url );
    $query        = ukiyo_portal_extract_google_maps_query( $resolved_url ?: $url );

    if ( '' === $query ) {
        $query = ukiyo_portal_extract_google_maps_page_name( $resolved_url ?: $url );
    }

    if ( '' === $query && '' !== $fallback_name ) {
        $query = $fallback_name;
    }

    if ( '' === $query ) {
        wp_send_json_error( [ 'message' => 'No hemos podido extraer una búsqueda válida del enlace de Google Maps.' ], 400 );
    }

    $place_data   = ukiyo_portal_google_places_text_search( $query );

    if ( is_wp_error( $place_data ) ) {
        wp_send_json_error( [ 'message' => $place_data->get_error_message() ], 400 );
    }

    if ( empty( $place_data['url'] ) ) {
        $place_data['url'] = $resolved_url ?: $url;
    }

    wp_send_json_success( $place_data );
}
add_action( 'wp_ajax_ukiyo_portal_autofill_google_place', 'ukiyo_portal_ajax_autofill_google_place' );

function ukiyo_portal_ajax_search_google_places() {
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_send_json_error( [ 'message' => 'No autorizado.' ], 403 );
    }

    check_ajax_referer( 'ukiyo_portal_admin', 'nonce' );

    $query         = isset( $_POST['query'] ) ? sanitize_text_field( wp_unslash( $_POST['query'] ) ) : '';
    $place_context = isset( $_POST['place_context'] ) ? sanitize_text_field( wp_unslash( $_POST['place_context'] ) ) : '';

    if ( '' === $query ) {
        wp_send_json_error( [ 'message' => 'Escribe primero el nombre del lugar que quieres buscar.' ], 400 );
    }

    if ( '' === ukiyo_portal_get_google_places_api_key() ) {
        wp_send_json_error( [ 'message' => 'Falta configurar la API key de Google Places.' ], 400 );
    }

    $search_query = $query;

    if ( $place_context && false === stripos( $query, $place_context ) ) {
        $search_query .= ', ' . $place_context;
    }

    $results = ukiyo_portal_google_places_search_results( $search_query, 6 );

    if ( is_wp_error( $results ) ) {
        wp_send_json_error( [ 'message' => $results->get_error_message() ], 400 );
    }

    wp_send_json_success(
        [
            'results' => array_values(
                array_filter(
                    array_map(
                        static function ( $result ) {
                            if ( ! is_array( $result ) || empty( $result['name'] ) ) {
                                return null;
                            }

                            return [
                                'name'    => sanitize_text_field( $result['name'] ),
                                'address' => isset( $result['address'] ) ? sanitize_text_field( $result['address'] ) : '',
                                'url'     => isset( $result['url'] ) ? esc_url_raw( $result['url'] ) : '',
                                'lat'     => isset( $result['lat'] ) ? (string) $result['lat'] : '',
                                'lng'     => isset( $result['lng'] ) ? (string) $result['lng'] : '',
                            ];
                        },
                        $results
                    )
                )
            ),
        ]
    );
}
add_action( 'wp_ajax_ukiyo_portal_search_google_places', 'ukiyo_portal_ajax_search_google_places' );

function ukiyo_portal_render_contacts_metabox( $post ) {
    $profile = ukiyo_portal_get_global_contact_profile();
    ukiyo_portal_admin_styles();
    ?>
    <div class="ukiyo-portal-admin">
        <p class="ukiyo-hint">El bloque de contacto del portal es global y ya no se edita viaje a viaje.</p>
        <div class="ukiyo-field-grid">
            <div class="ukiyo-field">
                <label>WhatsApp principal</label>
                <input type="text" value="<?php echo esc_attr( $profile['whatsapp_label'] ); ?>" readonly />
            </div>
            <div class="ukiyo-field">
                <label>Email</label>
                <input type="text" value="<?php echo esc_attr( $profile['email_label'] ); ?>" readonly />
            </div>
            <div class="ukiyo-field">
                <label>Acompañamiento</label>
                <input type="text" value="<?php echo esc_attr( $profile['support_label'] ); ?>" readonly />
            </div>
        </div>
    </div>
    <?php
}
