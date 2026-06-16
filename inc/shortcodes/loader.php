<?php
/**
 * Shortcodes editoriales Ukiyo — registro central.
 *
 * Cada shortcode vive en su propio archivo en este directorio. Aquí los
 * importamos y los registramos vía add_shortcode().
 *
 * El CSS de cada componente vive en el template que los renderiza
 * (single.php, por ahora). Si en el futuro se usan en otras plantillas,
 * extraer el CSS a assets/css/ukiyo-blocks.css y enqueue condicional.
 *
 * Shortcodes disponibles:
 *   [ukiyo_callout]                 — bloque destacado con borde sage
 *   [ukiyo_h2 num="01" kicker="..."] — h2 con eyebrow numérico
 *   [ukiyo_seasons]                 — grid de 4 quadrantes
 *     [ukiyo_season label="..." text="..."]  (nested)
 *   [ukiyo_quote author="" role=""] — cita destacada con autor
 *   [ukiyo_trip_card id="123"]      — card de viaje de autor embebida
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/callout.php';
require_once __DIR__ . '/h2.php';
require_once __DIR__ . '/seasons.php';
require_once __DIR__ . '/quote.php';
require_once __DIR__ . '/trip-card.php';
