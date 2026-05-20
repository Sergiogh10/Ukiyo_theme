<?php
/**
 * Template del formulario de finalización del viaje.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$context          = ukiyo_portal_get_feedback_request_context();
$trip             = isset( $context['trip'] ) ? $context['trip'] : null;
$user             = isset( $context['user'] ) ? $context['user'] : null;
$manual_trip      = isset( $context['manual_trip'] ) && is_array( $context['manual_trip'] ) ? $context['manual_trip'] : null;
$manual_slug      = isset( $context['manual_slug'] ) ? (string) $context['manual_slug'] : '';
$recipient_name   = isset( $context['recipient_name'] ) ? (string) $context['recipient_name'] : '';
$recipient_email  = isset( $context['recipient_email'] ) ? (string) $context['recipient_email'] : '';
$feedback_type    = isset( $context['type'] ) ? (string) $context['type'] : '';
$is_valid         = ! empty( $context['valid'] );
$trip_data        = $trip instanceof WP_Post ? ukiyo_portal_get_trip_data( $trip ) : ( is_array( $manual_trip ) ? $manual_trip : ukiyo_portal_get_trip_defaults() );
$hero_image       = $trip instanceof WP_Post ? ukiyo_portal_get_trip_hero_image_url( $trip ) : ( ! empty( $trip_data['hero_image_url'] ) ? (string) $trip_data['hero_image_url'] : '' );
$travelers        = ukiyo_portal_parse_travelers( $trip_data['travelers'] );
$form_schema      = $trip instanceof WP_Post ? ukiyo_portal_get_feedback_form_schema( $trip ) : ( is_array( $manual_trip ) ? ukiyo_portal_get_feedback_form_schema_from_trip_data( $manual_trip ) : [] );
$form_values      = $trip instanceof WP_Post
    ? ( $user instanceof WP_User ? ukiyo_portal_get_feedback_values( $trip, $user ) : [] )
    : ( is_array( $manual_trip ) ? ukiyo_portal_get_manual_feedback_values( $manual_slug, $recipient_email, $manual_trip ) : [] );
$feedback_notice  = isset( $_GET['feedback_notice'] ) ? sanitize_key( wp_unslash( $_GET['feedback_notice'] ) ) : '';
$review_url       = ukiyo_portal_get_feedback_review_url();
$trip_title       = $trip instanceof WP_Post ? get_the_title( $trip ) : ( ! empty( $trip_data['title'] ) ? (string) $trip_data['title'] : 'Cierre de viaje' );
$has_submission   = $trip instanceof WP_Post
    ? ( $user instanceof WP_User && ukiyo_portal_get_feedback_for_trip_user( $trip->ID, $user->ID ) instanceof WP_Post )
    : ( is_array( $manual_trip ) && $recipient_email && ukiyo_portal_get_feedback_for_manual_recipient( $manual_slug, $recipient_email ) instanceof WP_Post );

get_header();
?>

<main id="primary" class="bg-background relative min-h-screen">
    <style>
        .ukiyo-feedback-hero { min-height: 44vh; }
        .ukiyo-feedback-shell { max-width: 1120px; }
        .ukiyo-feedback-card { background: rgba(255,255,255,0.88); backdrop-filter: blur(16px); border: 1px solid rgba(233,225,214,0.9); box-shadow: 0 24px 60px rgba(84, 61, 38, 0.10); }
        .ukiyo-feedback-rating { display:grid; grid-template-columns: repeat(5, minmax(0,1fr)); gap:12px; }
        .ukiyo-feedback-rating input { position:absolute; opacity:0; pointer-events:none; }
        .ukiyo-feedback-rating-label { display:flex; align-items:center; justify-content:center; min-height:58px; border-radius:18px; border:1px solid #e7ded2; background:#fff; font-weight:700; color:#3b342d; cursor:pointer; transition:.2s ease; }
        .ukiyo-feedback-rating input:checked + .ukiyo-feedback-rating-label { background:#ff8c42; border-color:#ff8c42; color:#fff; box-shadow:0 12px 30px rgba(255,140,66,.25); }
        .ukiyo-feedback-options { display:grid; gap:14px; }
        .ukiyo-feedback-checklist { display:grid; gap:10px; }
        .ukiyo-feedback-check { display:flex; gap:12px; align-items:flex-start; padding:14px 16px; border:1px solid #ebe2d7; border-radius:18px; background:#fffdfa; }
        .ukiyo-feedback-check input { margin-top:4px; }
        .ukiyo-feedback-place { border:1px solid rgba(229,220,209,.9); border-radius:28px; background:linear-gradient(180deg, rgba(255,255,255,.94), rgba(255,250,244,.92)); box-shadow:0 18px 36px rgba(84, 61, 38, 0.05); padding:28px; }
        .ukiyo-feedback-place-grid { display:grid; gap:24px; }
        .ukiyo-feedback-divider { height:1px; background:linear-gradient(90deg, rgba(0,0,0,0), rgba(221,209,194,.9), rgba(0,0,0,0)); margin:28px 0; }
        .ukiyo-feedback-eyebrow { display:inline-flex; align-items:center; gap:10px; padding:12px 18px; border-radius:999px; background:#f7ebdf; color:#ff8c42; font-size:13px; font-weight:700; letter-spacing:.14em; text-transform:uppercase; }
        .ukiyo-feedback-review { background:linear-gradient(135deg, rgba(255,244,220,.96), rgba(255,252,245,.98)); border:1px solid rgba(242, 212, 138, .55); }
        .ukiyo-feedback-guide-grid { display:grid; gap:16px; grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .ukiyo-feedback-textarea, .ukiyo-feedback-input { width:100%; border:1px solid #e7ded2; border-radius:18px; background:#fff; color:#2e2925; padding:16px 18px; font-size:16px; line-height:1.6; }
        .ukiyo-feedback-textarea { min-height:132px; resize:vertical; }
        .ukiyo-feedback-submit { display:inline-flex; align-items:center; justify-content:center; border:none; border-radius:999px; background:#1f4a38; color:#fff; font-weight:700; padding:16px 28px; box-shadow:0 18px 30px rgba(31,74,56,.22); }
        .ukiyo-feedback-inline-link { display:inline-flex; align-items:center; gap:10px; border-radius:999px; border:1px solid rgba(47,45,43,.18); background:#fff; color:#2f2d2b; font-weight:700; padding:14px 22px; }
        @media (max-width: 900px) {
            .ukiyo-feedback-rating { grid-template-columns: repeat(5, minmax(48px, 1fr)); }
            .ukiyo-feedback-guide-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 767px) {
            .ukiyo-feedback-hero { min-height: 38vh; }
            .ukiyo-feedback-place { padding:22px; border-radius:24px; }
            .ukiyo-feedback-rating { grid-template-columns: repeat(5, minmax(0,1fr)); gap:8px; }
            .ukiyo-feedback-rating-label { min-height:52px; border-radius:16px; }
        }
    </style>

    <section class="ukiyo-feedback-hero relative flex items-center justify-center overflow-hidden pt-32 pb-16 mb-12">
        <div class="absolute inset-0 w-full h-full">
            <?php if ( $hero_image ) : ?>
                <img src="<?php echo esc_url( $hero_image ); ?>" alt="" class="w-full h-full object-cover" loading="eager" />
            <?php endif; ?>
            <div class="absolute inset-0 bg-gradient-to-b from-black/55 via-black/45 to-black/60"></div>
        </div>

        <div class="relative z-10 w-full">
            <div class="ukiyo-feedback-shell mx-auto px-6">
                <div class="max-w-4xl">
                    <p class="text-sm md:text-base tracking-[0.25em] uppercase text-accent-300 mb-4">Final del viaje</p>
                    <h1 class="text-hero md:text-6xl font-rowdies text-white mb-4 text-shadow">
                        <?php echo esc_html( $trip_title ); ?>
                    </h1>
                    <p class="text-xl text-white/90 max-w-3xl leading-relaxed text-shadow">
                        Nos encantará saber cómo ha sido vuestra experiencia real para seguir afinando cada viaje de UKIYO.
                    </p>
                    <?php if ( ! empty( $travelers ) ) : ?>
                        <div class="mt-8 flex flex-wrap gap-3">
                            <?php foreach ( $travelers as $traveler ) : ?>
                                <span class="inline-flex items-center rounded-full bg-white/12 border border-white/20 px-4 py-2 text-white/95 text-sm">
                                    <?php echo esc_html( $traveler ); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <div class="ukiyo-feedback-shell mx-auto px-6 pb-24">
        <?php if ( ! $is_valid ) : ?>
            <div class="ukiyo-feedback-card rounded-[32px] p-10 pt-14 pb-14 md:p-14 md:pt-16 md:pb-16 text-center">
                <h2 class="text-4xl font-rowdies text-text-primary mb-5">Este enlace ya no está disponible</h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    Si necesitas volver a completar el formulario de finalización, escríbenos y te enviaremos un enlace nuevo.
                </p>
            </div>
        <?php elseif ( 'submitted' === $feedback_notice ) : ?>
            <div class="ukiyo-feedback-card rounded-[32px] p-10 md:p-14 text-center">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6" style="background-color: rgba(31,74,56,.12); border: 2px solid rgba(31,74,56,.18);">
                    <svg class="w-10 h-10 text-[#1f4a38]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h2 class="text-4xl font-rowdies text-text-primary mb-5">Gracias por compartir vuestra experiencia</h2>
                <p class="text-lg text-text-secondary max-w-3xl mx-auto mb-10">
                    Ya hemos recibido vuestra valoración. Nos ayuda muchísimo a pulir alojamientos, ritmo y detalles para futuros viajes.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="<?php echo esc_url( $review_url ); ?>" target="_blank" rel="noopener noreferrer" class="ukiyo-feedback-submit">
                        Déjanos una reseña en Google
                    </a>
                    <a href="<?php echo esc_url( add_query_arg( 'feedback_notice', 'edit', remove_query_arg( 'feedback_notice' ) ) ); ?>" class="ukiyo-feedback-inline-link">
                        Editar respuestas
                    </a>
                </div>
            </div>
        <?php else : ?>
            <?php if ( 'error' === $feedback_notice || 'invalid' === $feedback_notice ) : ?>
                <div class="mb-8 rounded-[24px] border border-red-200 bg-red-50 px-6 py-5 text-red-700">
                    No hemos podido guardar el formulario. Revísalo y vuelve a enviarlo.
                </div>
            <?php elseif ( $has_submission ) : ?>
                <div class="mb-8 rounded-[24px] border border-amber-200 bg-amber-50 px-6 py-5 text-amber-900">
                    Ya habíamos recibido una versión de este feedback. Puedes ajustarlo y volver a enviarlo si quieres matizar algo.
                </div>
            <?php endif; ?>

            <div class="ukiyo-feedback-card rounded-[32px] p-6 md:p-10">
                <div class="mb-10">
                    <span class="ukiyo-feedback-eyebrow">Cierre del viaje</span>
                    <h2 class="text-4xl md:text-5xl text-text-primary mt-5 mb-4">Queremos escuchar cómo fue de verdad</h2>
                    <p class="text-lg text-text-secondary max-w-3xl">
                        Hemos dividido el formulario por cada etapa del itinerario para que resulte rápido y útil. No hace falta rellenarlo todo con detalle: lo importante es que nos ayude a entender qué os funcionó mejor y qué merece afinar.
                    </p>
                </div>

                <form method="post" class="space-y-8">
                    <?php wp_nonce_field( 'ukiyo_portal_feedback_submit', 'ukiyo_portal_feedback_nonce' ); ?>

                    <?php foreach ( $form_schema as $place ) : ?>
                        <?php
                        $place_values = isset( $form_values['places'][ $place['index'] ] ) ? $form_values['places'][ $place['index'] ] : [];
                        ?>
                        <section class="ukiyo-feedback-place">
                            <div class="ukiyo-feedback-place-grid">
                                <div>
                                    <span class="ukiyo-feedback-eyebrow"><?php echo esc_html( $place['stay_days'] ); ?> día<?php echo 1 === (int) $place['stay_days'] ? '' : 's'; ?> en este lugar</span>
                                    <h3 class="text-3xl md:text-4xl font-rowdies text-text-primary mt-5"><?php echo esc_html( $place['place'] ); ?></h3>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold uppercase tracking-[0.18em] text-text-secondary mb-4">
                                        ¿Cómo valoraríais esta etapa?
                                    </label>
                                    <div class="ukiyo-feedback-rating">
                                        <?php for ( $rating = 1; $rating <= 5; $rating++ ) : ?>
                                            <?php $rating_id = 'ukiyo-feedback-rating-' . $place['index'] . '-' . $rating; ?>
                                            <div>
                                                <input
                                                    type="radio"
                                                    id="<?php echo esc_attr( $rating_id ); ?>"
                                                    name="<?php echo esc_attr( 'feedback[places][' . $place['index'] . '][rating]' ); ?>"
                                                    value="<?php echo esc_attr( $rating ); ?>"
                                                    <?php checked( (string) $rating, (string) $place_values['rating'] ); ?>
                                                />
                                                <label class="ukiyo-feedback-rating-label" for="<?php echo esc_attr( $rating_id ); ?>">
                                                    <?php echo esc_html( $rating ); ?>
                                                </label>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <?php if ( ! empty( $place['recommendations'] ) ) : ?>
                                    <div>
                                        <label class="block text-sm font-semibold uppercase tracking-[0.18em] text-text-secondary mb-4">
                                            ¿Os sirvió alguna de las recomendaciones de esta etapa?
                                        </label>
                                        <div class="ukiyo-feedback-checklist">
                                            <?php foreach ( $place['recommendations'] as $recommendation ) : ?>
                                                <?php $input_id = 'ukiyo-feedback-recommendation-' . $place['index'] . '-' . $recommendation['index']; ?>
                                                <label class="ukiyo-feedback-check" for="<?php echo esc_attr( $input_id ); ?>">
                                                    <input
                                                        id="<?php echo esc_attr( $input_id ); ?>"
                                                        type="checkbox"
                                                        name="<?php echo esc_attr( 'feedback[places][' . $place['index'] . '][recommendations_used][]' ); ?>"
                                                        value="<?php echo esc_attr( $recommendation['index'] ); ?>"
                                                        <?php checked( in_array( (string) $recommendation['index'], (array) $place_values['recommendations_used'], true ) ); ?>
                                                    />
                                                    <span><?php echo esc_html( $recommendation['name'] ); ?></span>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div>
                                    <label class="block text-sm font-semibold uppercase tracking-[0.18em] text-text-secondary mb-4">
                                        ¿Qué actividades llegasteis a hacer?
                                    </label>
                                    <?php if ( ! empty( $place['activities'] ) ) : ?>
                                        <div class="ukiyo-feedback-checklist mb-4">
                                            <?php foreach ( $place['activities'] as $activity ) : ?>
                                                <?php $input_id = 'ukiyo-feedback-activity-' . $place['index'] . '-' . $activity['index']; ?>
                                                <label class="ukiyo-feedback-check" for="<?php echo esc_attr( $input_id ); ?>">
                                                    <input
                                                        id="<?php echo esc_attr( $input_id ); ?>"
                                                        type="checkbox"
                                                        name="<?php echo esc_attr( 'feedback[places][' . $place['index'] . '][activities_done][]' ); ?>"
                                                        value="<?php echo esc_attr( $activity['index'] ); ?>"
                                                        <?php checked( in_array( (string) $activity['index'], (array) $place_values['activities_done'], true ) ); ?>
                                                    />
                                                    <span><?php echo esc_html( $activity['label'] ); ?></span>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <textarea
                                        class="ukiyo-feedback-textarea"
                                        name="<?php echo esc_attr( 'feedback[places][' . $place['index'] . '][activities_note]' ); ?>"
                                        placeholder="Cuéntanos si cambiasteis algo, qué repetirías o qué habría que revisar."
                                    ><?php echo esc_textarea( $place_values['activities_note'] ); ?></textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold uppercase tracking-[0.18em] text-text-secondary mb-4">
                                        Si hubo guía, ¿cómo fue la experiencia?
                                    </label>
                                    <div class="ukiyo-feedback-guide-grid">
                                        <input
                                            class="ukiyo-feedback-input"
                                            type="text"
                                            name="<?php echo esc_attr( 'feedback[places][' . $place['index'] . '][guide_name]' ); ?>"
                                            value="<?php echo esc_attr( $place_values['guide_name'] ); ?>"
                                            placeholder="Nombre del guía"
                                        />
                                        <select
                                            class="ukiyo-feedback-input"
                                            name="<?php echo esc_attr( 'feedback[places][' . $place['index'] . '][guide_rating]' ); ?>"
                                        >
                                            <option value="">Valorar del 1 al 5</option>
                                            <?php for ( $rating = 1; $rating <= 5; $rating++ ) : ?>
                                                <option value="<?php echo esc_attr( $rating ); ?>" <?php selected( (string) $rating, (string) $place_values['guide_rating'] ); ?>>
                                                    <?php echo esc_html( $rating ); ?>/5
                                                </option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <textarea
                                        class="ukiyo-feedback-textarea mt-4"
                                        name="<?php echo esc_attr( 'feedback[places][' . $place['index'] . '][guide_comment]' ); ?>"
                                        placeholder="Si quieres, deja aquí una nota sobre el guía o el acompañamiento."
                                    ><?php echo esc_textarea( $place_values['guide_comment'] ); ?></textarea>
                                </div>
                            </div>
                        </section>
                    <?php endforeach; ?>

                    <section class="ukiyo-feedback-place">
                        <span class="ukiyo-feedback-eyebrow">Mirada final</span>
                        <h3 class="text-3xl md:text-4xl font-rowdies text-text-primary mt-5 mb-4">¿Qué deberíamos mantener o mejorar?</h3>
                        <textarea
                            class="ukiyo-feedback-textarea"
                            name="feedback[general_comments]"
                            placeholder="Este espacio es para cualquier matiz general sobre el viaje, el ritmo, la propuesta o la sensación final."
                        ><?php echo esc_textarea( isset( $form_values['general_comments'] ) ? $form_values['general_comments'] : '' ); ?></textarea>
                    </section>

                    <section class="ukiyo-feedback-place ukiyo-feedback-review">
                        <span class="ukiyo-feedback-eyebrow">Una última ilusión</span>
                        <h3 class="text-3xl md:text-4xl font-rowdies text-text-primary mt-5 mb-4">Si os apetece, una reseña en Google nos ayuda muchísimo</h3>
                        <p class="text-lg text-text-secondary mb-6 max-w-3xl">
                            Si el viaje os ha dejado buen recuerdo, nos haría mucha ilusión que lo compartierais también en Google. Ese gesto nos ayuda a seguir creciendo con viajeros que encajan de verdad con UKIYO.
                        </p>
                        <a href="<?php echo esc_url( $review_url ); ?>" target="_blank" rel="noopener noreferrer" class="ukiyo-feedback-inline-link">
                            Dejar reseña en Google
                        </a>
                    </section>

                    <div class="pt-2 text-center">
                        <button type="submit" name="ukiyo_portal_feedback_submit" value="1" class="ukiyo-feedback-submit">
                            <?php echo $has_submission ? 'Actualizar feedback' : 'Enviar feedback'; ?>
                        </button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
