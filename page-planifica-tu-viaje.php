<?php
/**
 * Template Name: Planifica tu viaje
 * Description: Formulario experiencial para diseñar viajes a medida.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'ukiyo_plan_trip_get_confirmation_email_html' ) ) {
    function ukiyo_plan_trip_get_confirmation_email_html( $args = [] ) {
        $defaults = [
            'lead_name'     => 'viajero',
            'schedule_link' => home_url( '/planifica-tu-viaje/' ),
            'whatsapp_link' => 'https://wa.me/message/CS2LNI6YHSETO1',
            'website_url'   => home_url( '/' ),
        ];

        $args         = wp_parse_args( $args, $defaults );
        $react_path   = get_template_directory() . '/emails/out/primer_contacto.html';
        $legacy_path  = get_template_directory() . '/email-template-primercontacto.html';
        $replacements = [
            '{{LEAD_NAME}}'      => $args['lead_name'],
            '{{SCHEDULE_LINK}}'  => $args['schedule_link'],
            '{{WHATSAPP_LINK}}'  => $args['whatsapp_link'],
            '{{WEBSITE_URL}}'    => $args['website_url'],
        ];

        if ( file_exists( $react_path ) ) {
            $html = file_get_contents( $react_path );

            if ( false !== $html ) {
                $html = strtr( $html, $replacements );
                $html = ukiyo_email_replace_static_urls( $html );

                return $html;
            }
        }

        if ( file_exists( $legacy_path ) ) {
            $html = file_get_contents( $legacy_path );

            if ( false !== $html ) {
                return str_replace( 'Hola,', 'Hola ' . esc_html( $args['lead_name'] ) . ',', $html );
            }
        }

        return wp_kses_post(
            '<p>Hola ' . esc_html( $args['lead_name'] ) . ',</p>' .
            '<p>Gracias por escribirnos. Muy pronto te contactaremos para empezar a dar forma a tu viaje.</p>'
        );
    }
}

// Catálogo base del formulario y recursos visuales.
$theme_uri = get_template_directory_uri();

$planner_countries = [
    'indonesia' => [
        'label'       => 'Indonesia',
        'eyebrow'     => 'Templos, volcanes y mar abierto',
        'image'       => $theme_uri . '/images/indonesia/viajes-a-indonesia-personalizados-bali.webp',
        'hero_image'  => $theme_uri . '/images/destination-mood/viajes-personalizados-por-el-mundo-indonesia.webp',
        'description' => 'Entre islas, cultura viva y naturaleza desbordante.',
    ],
    'colombia' => [
        'label'       => 'Colombia',
        'eyebrow'     => 'Caribe, montaña y ritmo propio',
        'image'       => $theme_uri . '/images/destination-mood/viajes-a-colombia-personalizados-cartagena-ciudad-amurallada.webp',
        'hero_image'  => $theme_uri . '/images/destination-mood/viajes-personalizados-por-el-mundo-colombia.webp',
        'description' => 'Un país diverso que pide rutas bien pensadas.',
    ],
    'costarica' => [
        'label'       => 'Costa Rica',
        'eyebrow'     => 'Selva, fauna y aventura consciente',
        'image'       => $theme_uri . '/images/costarica/viajes-a-costa-rica-personalizados-monteverde.webp',
        'hero_image'  => $theme_uri . '/images/destination-mood/viajes-personalizados-por-el-mundo-costa-rica.webp',
        'description' => 'Naturaleza intensa y momentos de conexión real.',
    ],
    'marruecos' => [
        'label'       => 'Marruecos',
        'eyebrow'     => 'Medinas, desierto y contraste',
        'image'       => $theme_uri . '/images/marruecos/viajes-personalizados-ukiyo-marruecos-merzouga.webp',
        'hero_image'  => $theme_uri . '/images/destination-mood/viajes-personalizados-por-el-mundo-marruecos.webp',
        'description' => 'Un viaje de texturas, ritmo y paisaje cambiante.',
    ],
];

$durations_by_country = [
    'indonesia' => [ '10-12', '12-15', '15-18', '18+' ],
    'colombia'  => [ '10-12', '12-15', '15-18', '18+' ],
    'costarica' => [ '10-12', '12-15', '15-18', '18+' ],
    'marruecos' => [ '4-5', '5-7', '7-10', '10-12' ],
];

$travel_blocks = [
    'indonesia' => [
        [
            'name'    => 'Bali',
            'tags'    => [ 'cultura', 'naturaleza', 'equilibrio', 'pareja', 'luna_miel', 'especial' ],
            'image'   => $theme_uri . '/images/indonesia/viajes-a-indonesia-personalizados-bali-tirta-empul.webp',
            'copy'    => 'Templos, arrozales y villas entre selva y mar.',
        ],
        [
            'name'    => 'Java',
            'tags'    => [ 'cultura', 'naturaleza', 'aventura' ],
            'image'   => $theme_uri . '/images/guides/viajes-a-indonesia-personalizados-monte-bromo.webp',
            'copy'    => 'Volcanes, amaneceres potentes y una capa cultural muy viva.',
        ],
        [
            'name'    => 'Komodo',
            'tags'    => [ 'aventura', 'naturaleza', 'especial' ],
            'image'   => $theme_uri . '/images/indonesia/flores-komodo/viajes-a-indonesia-flores-komodo-komodo-1.webp',
            'copy'    => 'Islas dramáticas, navegación y vida marina espectacular.',
        ],
        [
            'name'    => 'Lombok',
            'tags'    => [ 'calma', 'naturaleza' ],
            'image'   => $theme_uri . '/images/indonesia/lombok-gilis/viajes-a-indonesia-lombok-gilis-gilis-1.webp',
            'copy'    => 'Un ritmo más sereno con playas y paisajes abiertos.',
        ],
        [
            'name'    => 'Raja Ampat',
            'tags'    => [ 'naturaleza', 'aventura', 'premium' ],
            'image'   => $theme_uri . '/images/indonesia/viajes-a-indonesia-personalizados-raja-ampat.webp',
            'copy'    => 'Un remoto paraíso marino para viajes de gran impacto visual.',
        ],
        [
            'name'    => 'Borneo',
            'tags'    => [ 'naturaleza', 'fauna' ],
            'image'   => $theme_uri . '/images/indonesia/borneo/viajes-a-indonesia-borneo-25.webp',
            'copy'    => 'Selva profunda y encuentros con fauna icónica.',
        ],
        [
            'name'    => 'Sulawesi',
            'tags'    => [ 'cultura', 'exploracion', 'especial' ],
            'image'   => $theme_uri . '/images/indonesia/viajes-autor-ukiyo-indonesiamanta.webp',
            'copy'    => 'Una Indonesia menos evidente y mucho más singular.',
        ],
    ],
    'colombia' => [
        [
            'name'    => 'Cartagena',
            'tags'    => [ 'cultura', 'pareja', 'especial' ],
            'image'   => $theme_uri . '/images/destination-mood/viajes-a-colombia-personalizados-cartagena-ciudad-amurallada.webp',
            'copy'    => 'Ciudad amurallada, atmósfera colonial y noches con mucho encanto.',
        ],
        [
            'name'    => 'Eje Cafetero',
            'tags'    => [ 'naturaleza', 'equilibrio' ],
            'image'   => $theme_uri . '/images/colombia/viajes-a-colombia-personalizados-eje-cafetero-valle-de-cocora.webp',
            'copy'    => 'Paisaje verde, café y un ritmo suave entre montaña y finca.',
        ],
        [
            'name'    => 'Medellín',
            'tags'    => [ 'cultura', 'urbano' ],
            'image'   => $theme_uri . '/images/colombia/viajes-a-colombia-personalizados-medellin.webp',
            'copy'    => 'Una ciudad viva, creativa y muy fácil de integrar en ruta.',
        ],
        [
            'name'    => 'Nuquí',
            'tags'    => [ 'naturaleza', 'aventura' ],
            'image'   => $theme_uri . '/images/colombia/viajes-a-colombia-personalizados-nuqui-ballena.webp',
            'copy'    => 'Pacífico salvaje, selva, mar y sensación de desconexión total.',
        ],
        [
            'name'    => 'Tayrona',
            'tags'    => [ 'naturaleza', 'aventura' ],
            'image'   => $theme_uri . '/images/colombia/viajes-a-colombia-personalizados-tayrona.webp',
            'copy'    => 'Costa Caribe, senderos y playas con carácter.',
        ],
        [
            'name'    => 'Santander',
            'tags'    => [ 'calma', 'naturaleza' ],
            'image'   => $theme_uri . '/images/colombia/viajes-a-colombia-personalizados-barichara.webp',
            'copy'    => 'Pueblo colonial, senderos y una atmósfera muy especial.',
        ],
        [
            'name'    => 'Providencia',
            'tags'    => [ 'calma', 'especial' ],
            'image'   => $theme_uri . '/images/colombia/viajes-a-colombia-personalizados-providencia-mar-siete-colores.webp',
            'copy'    => 'Una isla más íntima para cerrar el viaje con otro tono.',
        ],
    ],
    'costarica' => [
        [
            'name'    => 'La Fortuna',
            'tags'    => [ 'naturaleza', 'aventura' ],
            'image'   => $theme_uri . '/images/costarica/viajes-a-costa-rica-personalizados-la-fortuna-volcan.webp',
            'copy'    => 'Volcán, selva y actividades activas sin perder confort.',
        ],
        [
            'name'    => 'Monteverde',
            'tags'    => [ 'naturaleza' ],
            'image'   => $theme_uri . '/images/costarica/viajes-a-costa-rica-personalizados-monteverde-bosque-nuboso.webp',
            'copy'    => 'Bosque nuboso, humedad, verde profundo y calma fresca.',
        ],
        [
            'name'    => 'Corcovado',
            'tags'    => [ 'aventura' ],
            'image'   => $theme_uri . '/images/costarica/viajes-a-costa-rica-personalizados-osa-corcovado-hero.webp',
            'copy'    => 'Uno de los tramos más salvajes para quien quiere intensidad natural.',
        ],
        [
            'name'    => 'Tortuguero',
            'tags'    => [ 'fauna' ],
            'image'   => $theme_uri . '/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.webp',
            'copy'    => 'Canales, agua, fauna y una sensación de aislamiento muy especial.',
        ],
        [
            'name'    => 'Puerto Viejo',
            'tags'    => [ 'calma', 'cultura' ],
            'image'   => $theme_uri . '/images/costarica/viajes-a-costa-rica-personalizados-caribe-sur-cahuita.webp',
            'copy'    => 'Caribe costarricense con mezcla cultural y mucho flow.',
        ],
        [
            'name'    => 'Rincón de la Vieja',
            'tags'    => [ 'aventura' ],
            'image'   => $theme_uri . '/images/costarica/viajes-a-costa-rica-personalizados-guanacaste.webp',
            'copy'    => 'Paisajes volcánicos secos, senderos y energía de aventura.',
        ],
        [
            'name'    => 'Sámara',
            'tags'    => [ 'calma' ],
            'image'   => $theme_uri . '/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.webp',
            'copy'    => 'Playa amable y una etapa muy equilibrada para soltar el ritmo.',
        ],
        [
            'name'    => 'Bajos del Toro',
            'tags'    => [ 'naturaleza', 'especial' ],
            'image'   => $theme_uri . '/images/costarica/viajes-a-costa-rica-personalizados-rio-celeste.webp',
            'copy'    => 'Cascadas y verde intenso para un tramo distinto dentro del país.',
        ],
        [
            'name'    => 'San Gerardo de Dota',
            'tags'    => [ 'naturaleza', 'calma' ],
            'image'   => $theme_uri . '/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-queztal.webp',
            'copy'    => 'Bosque de altura, aves y un tempo muy sereno.',
        ],
    ],
    'marruecos' => [
        [
            'name'    => 'Marrakech',
            'tags'    => [ 'cultura', 'equilibrio' ],
            'image'   => $theme_uri . '/images/marruecos/viajes-personalizados-ukiyo-marruecos-marrakech.webp',
            'copy'    => 'La entrada perfecta a un viaje de contraste y carácter.',
        ],
        [
            'name'    => 'Desierto',
            'tags'    => [ 'especial', 'aventura', 'luna_miel' ],
            'image'   => $theme_uri . '/images/marruecos/viajes-personalizados-ukiyo-marruecos-merzouga.webp',
            'copy'    => 'Dunas, silencio y esa sensación de viaje que se queda dentro.',
        ],
        [
            'name'    => 'Fez',
            'tags'    => [ 'cultura' ],
            'image'   => $theme_uri . '/images/marruecos/viajes-personalizados-ukiyo-marruecos-fez.webp',
            'copy'    => 'Una ciudad profunda para quien quiere inmersión real.',
        ],
        [
            'name'    => 'Essaouira',
            'tags'    => [ 'calma' ],
            'image'   => $theme_uri . '/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-costa.webp',
            'copy'    => 'Costa atlántica, luz suave y un tempo mucho más ligero.',
        ],
        [
            'name'    => 'Tánger',
            'tags'    => [ 'cultura' ],
            'image'   => $theme_uri . '/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-calle.webp',
            'copy'    => 'Una ciudad puente entre continentes con mucha personalidad.',
        ],
        [
            'name'    => 'Meknes',
            'tags'    => [ 'cultura' ],
            'image'   => $theme_uri . '/images/marruecos/viajes-personalizados-ukiyo-marruecos-rissani.webp',
            'copy'    => 'Una parada con historia para dar profundidad a la ruta.',
        ],
        [
            'name'    => 'Chefchaouen',
            'tags'    => [ 'especial' ],
            'image'   => $theme_uri . '/images/viajesdeautor/marruecos/viajes-de-autor-a-marruecos-azuljpg.webp',
            'copy'    => 'La ciudad azul funciona muy bien como pausa inspiracional.',
        ],
        [
            'name'    => 'Rabat',
            'tags'    => [ 'cultura' ],
            'image'   => $theme_uri . '/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-casablanca.webp',
            'copy'    => 'Elegante, sobria y fácil de integrar si la ruta lo pide.',
        ],
        [
            'name'    => 'Casablanca',
            'tags'    => [ 'urbano' ],
            'image'   => $theme_uri . '/images/viajesdeautor/marruecos/viajes-de-autor-a-costa-rica-fotografia-casablanca.webp',
            'copy'    => 'Un tramo más urbano para abrir o cerrar el viaje.',
        ],
        [
            'name'    => 'Dades',
            'tags'    => [ 'naturaleza', 'aventura' ],
            'image'   => $theme_uri . '/images/marruecos/viajes-personalizados-ukiyo-marruecos-draa.webp',
            'copy'    => 'Valle, carretera escénica y paisajes para viajes activos.',
        ],
    ],
];

$planner_month_choices = [];
$month_cursor          = new DateTimeImmutable( 'first day of this month' );

for ( $i = 0; $i < 18; $i++ ) {
    $current_month            = $month_cursor->modify( '+' . $i . ' months' );
    $planner_month_choices[] = [
        'value' => $current_month->format( 'Y-m' ),
        'label' => ucfirst( wp_date( 'F Y', $current_month->getTimestamp() ) ),
    ];
}

$form_values = [
    'country'                 => '',
    'duration'                => '',
    'travelers'               => '',
    'travel_style'            => '',
    'honeymoon'               => '',
    'date_mode'               => '',
    'exact_date'              => '',
    'approx_month'            => '',
    'gallery_recommendations' => '',
    'traveller_name'          => '',
    'email'                   => '',
    'phone'                   => '',
    'notes'                   => '',
    'gdpr'                    => '',
];

// Procesamiento del envío final.
$sent        = false;
$errors      = [];
$success_msg = '';
$recipient   = apply_filters( 'ukiyo_trip_form_recipient', 'info@viajesukiyo.com' );

if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['ukiyo_trip_nonce'] ) ) {
    if ( ! empty( $_POST['ukiyo_pot'] ) ) {
        $errors[] = 'Error de validación.';
    }

    if ( ! wp_verify_nonce( $_POST['ukiyo_trip_nonce'], 'ukiyo_trip_submit' ) ) {
        $errors[] = 'Sesión no válida. Recarga e inténtalo de nuevo.';
    }

    $form_values['country']                 = isset( $_POST['country'] ) ? sanitize_text_field( $_POST['country'] ) : '';
    $form_values['duration']                = isset( $_POST['duration'] ) ? sanitize_text_field( $_POST['duration'] ) : '';
    $form_values['travelers']               = isset( $_POST['travelers'] ) ? sanitize_text_field( $_POST['travelers'] ) : '';
    $form_values['travel_style']            = isset( $_POST['travel_style'] ) ? sanitize_text_field( $_POST['travel_style'] ) : '';
    $form_values['honeymoon']               = isset( $_POST['honeymoon'] ) ? sanitize_text_field( $_POST['honeymoon'] ) : '';
    $form_values['date_mode']               = isset( $_POST['date_mode'] ) ? sanitize_text_field( $_POST['date_mode'] ) : '';
    $form_values['exact_date']              = isset( $_POST['exact_date'] ) ? sanitize_text_field( $_POST['exact_date'] ) : '';
    $form_values['approx_month']            = isset( $_POST['approx_month'] ) ? sanitize_text_field( $_POST['approx_month'] ) : '';
    $form_values['gallery_recommendations'] = isset( $_POST['gallery_recommendations'] ) ? sanitize_text_field( $_POST['gallery_recommendations'] ) : '';
    $form_values['traveller_name']          = isset( $_POST['traveller_name'] ) ? sanitize_text_field( $_POST['traveller_name'] ) : '';
    $form_values['email']                   = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    $form_values['phone']                   = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
    $form_values['notes']                   = isset( $_POST['notes'] ) ? sanitize_textarea_field( $_POST['notes'] ) : '';
    $form_values['gdpr']                    = isset( $_POST['gdpr'] ) ? sanitize_text_field( $_POST['gdpr'] ) : '';

    if ( empty( $form_values['country'] ) ) {
        $errors[] = 'Selecciona un destino.';
    }

    if ( empty( $form_values['duration'] ) ) {
        $errors[] = 'Selecciona una duración.';
    }

    if ( empty( $form_values['travelers'] ) ) {
        $errors[] = 'Indícanos quién viaja.';
    }

    if ( empty( $form_values['travel_style'] ) ) {
        $errors[] = 'Elige cómo os imagináis este viaje.';
    }

    if ( empty( $form_values['date_mode'] ) ) {
        $errors[] = 'Selecciona cómo tenéis las fechas.';
    }

    if ( 'exact' === $form_values['date_mode'] && empty( $form_values['exact_date'] ) ) {
        $errors[] = 'Añade una fecha exacta.';
    }

    if ( 'approximate' === $form_values['date_mode'] && empty( $form_values['approx_month'] ) ) {
        $errors[] = 'Selecciona un mes aproximado.';
    }

    if ( empty( $form_values['traveller_name'] ) ) {
        $errors[] = 'Por favor, dinos tu nombre.';
    }

    if ( empty( $form_values['email'] ) || ! is_email( $form_values['email'] ) ) {
        $errors[] = 'Necesitamos un email válido para contactarte.';
    }

    if ( empty( $form_values['phone'] ) ) {
        $errors[] = 'Necesitamos un teléfono para continuar.';
    }

    if ( empty( $form_values['gdpr'] ) ) {
        $errors[] = 'Debes aceptar la política de privacidad.';
    }

    if ( empty( $errors ) ) {
        $country_label = isset( $planner_countries[ $form_values['country'] ]['label'] ) ? $planner_countries[ $form_values['country'] ]['label'] : ucfirst( $form_values['country'] );
        $date_summary  = 'Sin definir';

        if ( 'exact' === $form_values['date_mode'] && $form_values['exact_date'] ) {
            $date_summary = wp_date( 'j F Y', strtotime( $form_values['exact_date'] ) );
        } elseif ( 'approximate' === $form_values['date_mode'] && $form_values['approx_month'] ) {
            $date_summary = ucfirst( wp_date( 'F Y', strtotime( $form_values['approx_month'] . '-01' ) ) );
        } elseif ( 'flexible' === $form_values['date_mode'] ) {
            $date_summary = 'Flexible';
        }

        $subject = sprintf( '✨ Nueva solicitud de viaje - %s', $form_values['traveller_name'] );

        $body = '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Solicitud de Viaje</title>
</head>
<body style="margin:0;padding:0;background-color:#f5f2ed;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif;color:#2c2c2c;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#f5f2ed;padding:36px 20px;">
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" border="0" width="640" style="max-width:640px;background-color:#ffffff;border-radius:28px;overflow:hidden;box-shadow:0 18px 38px rgba(44,44,44,0.08);">
                    <tr>
                        <td style="padding:40px 40px 32px;background:linear-gradient(135deg,#f7ead3 0%,#fefcf8 100%);border-bottom:1px solid #ebe2d5;">
                            <p style="margin:0 0 10px;font-size:12px;letter-spacing:0.18em;text-transform:uppercase;color:#6b6b6b;">Nuevo briefing de viaje</p>
                            <h1 style="margin:0;font-size:30px;line-height:1.15;font-weight:700;color:#2c2c2c;font-family:Rowdies,sans-serif;">Planifica tu viaje</h1>
                            <p style="margin:14px 0 0;font-size:16px;line-height:1.6;color:#6b6b6b;">Una nueva solicitud acaba de llegar desde el formulario experiencial.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:36px 40px 14px;">
                            <div style="padding:22px 24px;border:1px solid #ebe2d5;border-radius:20px;background:#fefcf8;margin-bottom:24px;">
                                <h2 style="margin:0 0 16px;font-size:18px;line-height:1.3;font-weight:700;color:#2c2c2c;">Contacto</h2>
                                <p style="margin:0 0 8px;font-size:15px;line-height:1.6;"><strong>Nombre:</strong> ' . esc_html( $form_values['traveller_name'] ) . '</p>
                                <p style="margin:0 0 8px;font-size:15px;line-height:1.6;"><strong>Email:</strong> ' . esc_html( $form_values['email'] ) . '</p>
                                <p style="margin:0;font-size:15px;line-height:1.6;"><strong>Teléfono:</strong> ' . esc_html( $form_values['phone'] ) . '</p>
                            </div>

                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-bottom:24px;">
                                <tr>
                                    <td width="50%" valign="top" style="padding:0 8px 16px 0;">
                                        <div style="height:100%;padding:20px;border:1px solid #ebe2d5;border-radius:20px;background:#ffffff;">
                                            <p style="margin:0 0 6px;font-size:12px;letter-spacing:0.12em;text-transform:uppercase;color:#8b8b8b;">Destino</p>
                                            <p style="margin:0;font-size:18px;line-height:1.4;font-weight:700;color:#2c2c2c;">' . esc_html( $country_label ) . '</p>
                                        </div>
                                    </td>
                                    <td width="50%" valign="top" style="padding:0 0 16px 8px;">
                                        <div style="height:100%;padding:20px;border:1px solid #ebe2d5;border-radius:20px;background:#ffffff;">
                                            <p style="margin:0 0 6px;font-size:12px;letter-spacing:0.12em;text-transform:uppercase;color:#8b8b8b;">Duración</p>
                                            <p style="margin:0;font-size:18px;line-height:1.4;font-weight:700;color:#2c2c2c;">' . esc_html( $form_values['duration'] ) . ' días</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" valign="top" style="padding:0 8px 0 0;">
                                        <div style="height:100%;padding:20px;border:1px solid #ebe2d5;border-radius:20px;background:#ffffff;">
                                            <p style="margin:0 0 6px;font-size:12px;letter-spacing:0.12em;text-transform:uppercase;color:#8b8b8b;">Viajeros</p>
                                            <p style="margin:0;font-size:18px;line-height:1.4;font-weight:700;color:#2c2c2c;">' . esc_html( ucfirst( $form_values['travelers'] ) ) . '</p>
                                        </div>
                                    </td>
                                    <td width="50%" valign="top" style="padding:0 0 0 8px;">
                                        <div style="height:100%;padding:20px;border:1px solid #ebe2d5;border-radius:20px;background:#ffffff;">
                                            <p style="margin:0 0 6px;font-size:12px;letter-spacing:0.12em;text-transform:uppercase;color:#8b8b8b;">Estilo</p>
                                            <p style="margin:0;font-size:18px;line-height:1.4;font-weight:700;color:#2c2c2c;">' . esc_html( ucfirst( $form_values['travel_style'] ) ) . '</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <div style="padding:22px 24px;border:1px solid #ebe2d5;border-radius:20px;background:#fefcf8;margin-bottom:24px;">
                                <h2 style="margin:0 0 16px;font-size:18px;line-height:1.3;font-weight:700;color:#2c2c2c;">Momento del viaje</h2>
                                <p style="margin:0 0 8px;font-size:15px;line-height:1.6;"><strong>Fechas:</strong> ' . esc_html( $date_summary ) . '</p>
                                <p style="margin:0;font-size:15px;line-height:1.6;"><strong>Luna de miel:</strong> ' . ( $form_values['honeymoon'] ? 'Sí' : 'No' ) . '</p>
                            </div>

                            <div style="padding:22px 24px;border:1px solid #ebe2d5;border-radius:20px;background:#ffffff;margin-bottom:24px;">
                                <h2 style="margin:0 0 16px;font-size:18px;line-height:1.3;font-weight:700;color:#2c2c2c;">Inspiración sugerida</h2>
                                <p style="margin:0;font-size:15px;line-height:1.7;color:#4b4b4b;">' . ( $form_values['gallery_recommendations'] ? esc_html( $form_values['gallery_recommendations'] ) : 'Sin destinos destacados guardados.' ) . '</p>
                            </div>

                            <div style="padding:22px 24px;border:1px solid #ebe2d5;border-radius:20px;background:#ffffff;">
                                <h2 style="margin:0 0 16px;font-size:18px;line-height:1.3;font-weight:700;color:#2c2c2c;">Mensaje</h2>
                                <p style="margin:0;font-size:15px;line-height:1.7;color:#4b4b4b;">' . ( $form_values['notes'] ? nl2br( esc_html( $form_values['notes'] ) ) : 'Sin notas adicionales.' ) . '</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:26px 40px 34px;text-align:center;background:#2c2c2c;">
                            <p style="margin:0 0 8px;font-size:12px;letter-spacing:0.14em;text-transform:uppercase;color:rgba(255,255,255,0.58);">Viajes UKIYO</p>
                            <p style="margin:0;font-size:14px;line-height:1.6;color:rgba(255,255,255,0.82);">Formulario recibido desde ' . esc_html( home_url( '/' ) ) . '</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';

        $headers   = [];
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: Ukiyo Viajes <info@viajesukiyo.com>';
        $headers[] = 'MIME-Version: 1.0';

        if ( $form_values['email'] ) {
            $headers[] = 'Reply-To: ' . $form_values['traveller_name'] . ' <' . $form_values['email'] . '>';
        }

        $sent = wp_mail( $recipient, $subject, $body, $headers );

        if ( $sent ) {
            $success_msg = 'Perfecto. Ya tenemos vuestra base y te escribiremos muy pronto con el siguiente paso.';

            if ( $form_values['email'] ) {
                $user_body = ukiyo_plan_trip_get_confirmation_email_html(
                    [
                        'lead_name'     => $form_values['traveller_name'],
                        'schedule_link' => home_url( '/planifica-tu-viaje/' ),
                        'whatsapp_link' => 'https://wa.me/message/CS2LNI6YHSETO1',
                        'website_url'   => home_url( '/' ),
                    ]
                );

                wp_mail(
                    $form_values['email'],
                    'Hemos recibido tu mensaje - Ukiyo',
                    $user_body,
                    [ 'Content-Type: text/html; charset=UTF-8' ]
                );
            }

            $form_values = [
                'country'                 => '',
                'duration'                => '',
                'travelers'               => '',
                'travel_style'            => '',
                'honeymoon'               => '',
                'date_mode'               => '',
                'exact_date'              => '',
                'approx_month'            => '',
                'gallery_recommendations' => '',
                'traveller_name'          => '',
                'email'                   => '',
                'phone'                   => '',
                'notes'                   => '',
                'gdpr'                    => '',
            ];
        } else {
            $errors[] = 'Uy… no hemos podido enviar el correo. Inténtalo de nuevo en unos minutos.';
        }
    }
}

$planner_config = [
    'countries'          => $planner_countries,
    'durationsByCountry' => $durations_by_country,
    'travelBlocks'       => $travel_blocks,
    'monthChoices'       => $planner_month_choices,
    'initialState'       => [
        'country'                 => $form_values['country'],
        'duration'                => $form_values['duration'],
        'travelers'               => $form_values['travelers'],
        'travel_style'            => $form_values['travel_style'],
        'honeymoon'               => (bool) $form_values['honeymoon'],
        'date_mode'               => $form_values['date_mode'],
        'exact_date'              => $form_values['exact_date'],
        'approx_month'            => $form_values['approx_month'],
        'gallery_recommendations' => $form_values['gallery_recommendations'],
        'traveller_name'          => $form_values['traveller_name'],
        'email'                   => $form_values['email'],
        'phone'                   => $form_values['phone'],
        'notes'                   => $form_values['notes'],
        'gdpr'                    => (bool) $form_values['gdpr'],
    ],
    'initialStep'        => ! empty( $errors ) ? 5 : 0,
];

get_header();
?>

<style>
  .ukiyo-planner-hero {
    min-height: 52vh;
  }

  .ukiyo-planner-shell {
    border: 1px solid rgba(44, 44, 44, 0.08);
    box-shadow: 0 24px 60px rgba(44, 44, 44, 0.08);
  }

  .ukiyo-stepper {
    position: relative;
    display: grid;
    grid-template-columns: repeat(6, minmax(0, 1fr));
    gap: 0.75rem;
    align-items: start;
  }

  .ukiyo-stepper::before {
    content: "";
    position: absolute;
    left: 3%;
    right: 3%;
    top: 2.75rem;
    border-top: 2px dotted rgba(107, 107, 107, 0.28);
  }

  .ukiyo-stepper-item {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
    text-align: center;
  }

  .ukiyo-stepper-label {
    min-height: 3rem;
    font-size: 0.9rem;
    line-height: 1.3;
    color: rgba(107, 107, 107, 0.78);
  }

  .ukiyo-stepper-badge {
    width: 3rem;
    height: 3rem;
    border-radius: 9999px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.2rem;
    border: 2px solid rgba(44, 44, 44, 0.24);
    background: #ffffff;
    color: rgba(44, 44, 44, 0.68);
    transition: all 0.3s ease;
  }

  .ukiyo-stepper-item.is-complete .ukiyo-stepper-label,
  .ukiyo-stepper-item.is-active .ukiyo-stepper-label {
    color: #065f46;
  }

  .ukiyo-stepper-item.is-complete .ukiyo-stepper-badge {
    background: #065f46;
    border-color: #065f46;
    color: #ffffff;
  }

  .ukiyo-stepper-item.is-active .ukiyo-stepper-badge {
    border-color: #111827;
    color: #111827;
    transform: scale(1.02);
  }

  .ukiyo-stepper-item.is-future .ukiyo-stepper-badge {
    background: #9ca3af;
    border-color: #9ca3af;
    color: #ffffff;
  }

  .ukiyo-planner-panel {
    display: none;
    animation: plannerFade 0.35s ease forwards;
  }

  .ukiyo-planner-panel.is-active {
    display: block;
  }

  .ukiyo-choice-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 1rem;
  }

  .ukiyo-choice {
    position: relative;
    overflow: hidden;
    min-height: 13rem;
    padding: 1.25rem;
    border-radius: 1.5rem;
    border: 1px solid rgba(44, 44, 44, 0.1);
    background: #ffffff;
    cursor: pointer;
    transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
  }

  .ukiyo-choice:hover {
    transform: translateY(-3px);
    box-shadow: 0 16px 34px rgba(44, 44, 44, 0.1);
  }

  .ukiyo-choice-media {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease, opacity 0.35s ease;
  }

  .ukiyo-choice::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(15, 23, 42, 0.14) 0%, rgba(15, 23, 42, 0.66) 100%);
    pointer-events: none;
  }

  .ukiyo-choice-copy {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    min-height: 100%;
    color: #ffffff;
  }

  .ukiyo-choice-kicker {
    display: inline-flex;
    align-self: flex-start;
    padding: 0.45rem 0.7rem;
    border-radius: 9999px;
    background: rgba(255, 255, 255, 0.16);
    backdrop-filter: blur(8px);
    font-size: 0.72rem;
    letter-spacing: 0.08em;
    text-transform: uppercase;
  }

  .ukiyo-choice-title {
    margin-top: auto;
    font-size: 1.45rem;
    line-height: 1.1;
    font-family: var(--font-display);
  }

  .ukiyo-choice-description {
    margin-top: 0.65rem;
    font-size: 0.96rem;
    line-height: 1.55;
    color: rgba(255, 255, 255, 0.88);
  }

  .ukiyo-choice:has(input:checked) {
    border-color: rgba(246, 207, 102, 0.95);
    box-shadow: 0 0 0 2px rgba(246, 207, 102, 0.95), 0 22px 44px rgba(246, 207, 102, 0.18);
  }

  .ukiyo-choice:has(input:checked) .ukiyo-choice-media {
    transform: scale(1.06);
    opacity: 1;
  }

  .ukiyo-choice-lite {
    min-height: 0;
    padding: 1.2rem;
    background: linear-gradient(180deg, #ffffff 0%, #fefcf8 100%);
  }

  .ukiyo-choice-lite::after {
    display: none;
  }

  .ukiyo-choice-lite .ukiyo-choice-copy {
    color: var(--color-text-primary);
    min-height: 0;
    gap: 0.65rem;
  }

  .ukiyo-choice-lite .ukiyo-choice-kicker {
    background: rgba(246, 207, 102, 0.15);
    color: #8b4513;
  }

  .ukiyo-choice-lite .ukiyo-choice-description {
    color: var(--color-text-secondary);
  }

  .ukiyo-inline-toggle {
    display: flex;
    align-items: center;
    gap: 0.9rem;
    padding: 1rem 1.15rem;
    border-radius: 1.25rem;
    border: 1px solid rgba(44, 44, 44, 0.12);
    background: #fff;
  }

  .ukiyo-inline-toggle:has(input:checked) {
    border-color: rgba(246, 207, 102, 0.95);
    box-shadow: 0 0 0 2px rgba(246, 207, 102, 0.22);
  }

  .ukiyo-fade-stack {
    display: grid;
    gap: 0.9rem;
  }

  .ukiyo-alert {
    opacity: 0;
    transform: translateY(10px);
    padding: 1.05rem 1.15rem;
    border-radius: 1.1rem;
    border: 1px solid rgba(122, 148, 113, 0.2);
    background: linear-gradient(135deg, rgba(237, 248, 243, 0.98) 0%, rgba(244, 251, 248, 0.98) 100%);
    box-shadow: 0 12px 26px rgba(122, 148, 113, 0.08);
    transition: opacity 0.35s ease, transform 0.35s ease;
    position: relative;
    overflow: hidden;
  }

  .ukiyo-alert::before {
    content: "";
    position: absolute;
    inset: 0 auto 0 0;
    width: 6px;
    background: linear-gradient(180deg, #5f8f80 0%, #7a9471 100%);
  }

  .ukiyo-alert.is-visible {
    opacity: 1;
    transform: translateY(0);
  }

  .ukiyo-alert-title {
    margin-bottom: 0.35rem;
    font-size: 0.95rem;
    font-weight: 700;
    color: #214d42;
    padding-left: 0.35rem;
  }

  .ukiyo-alert-copy {
    font-size: 0.95rem;
    line-height: 1.6;
    color: #4d6a62;
    padding-left: 0.35rem;
  }

  .ukiyo-gallery-grid {
    display: flex;
    align-items: stretch;
    gap: 1rem;
    min-height: 35rem;
    margin-bottom: 3rem;
  }

  .ukiyo-gallery-card {
    flex: 1 1 1%;
    display: flex;
    flex-direction: column;
    min-width: 0;
    opacity: 0;
    transform: translateY(12px);
    cursor: pointer;
    transition: opacity 0.42s ease, transform 0.42s ease, flex-basis 0.6s cubic-bezier(0.25, 1, 0.5, 1);
  }

  .ukiyo-gallery-grid.is-hovering .ukiyo-gallery-card:not(.is-active) {
    opacity: 0.24;
  }

  .ukiyo-gallery-card.is-visible {
    opacity: 0.38;
    transform: translateY(0);
  }

  .ukiyo-gallery-card.is-active {
    opacity: 1;
  }

  .ukiyo-gallery-card.is-expanded {
    flex-basis: 30%;
  }

  .ukiyo-gallery-media {
    position: relative;
    height: 35rem;
    flex: 0 0 35rem;
    overflow: hidden;
    border-radius: 1.5rem;
    border: 1px solid rgba(44, 44, 44, 0.08);
    box-shadow: 0 12px 28px rgba(44, 44, 44, 0.08);
  }

  .ukiyo-gallery-media::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(15, 23, 42, 0) 0%, rgba(15, 23, 42, 0.14) 100%);
    transition: background 0.35s ease;
  }

  .ukiyo-gallery-card.is-expanded .ukiyo-gallery-media::after {
    background: linear-gradient(180deg, rgba(15, 23, 42, 0) 0%, rgba(15, 23, 42, 0.18) 100%);
  }

  .ukiyo-gallery-card img {
    position: absolute;
    inset: 0;
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease, filter 0.35s ease;
    filter: none;
  }

  .ukiyo-gallery-card.is-expanded img {
    transform: scale(1.04);
    filter: none;
  }

  .ukiyo-gallery-copy {
    position: absolute;
    inset: auto 0 0 0;
    z-index: 1;
    padding: 1.25rem;
    color: white;
    opacity: 0;
    transform: translateY(14px);
    transition: opacity 0.35s ease, transform 0.35s ease;
  }

  .ukiyo-gallery-card.is-expanded .ukiyo-gallery-copy {
    opacity: 1;
    transform: translateY(0);
  }

  .ukiyo-gallery-meta {
    padding: 1.1rem 0.25rem 0;
  }

  .ukiyo-gallery-title {
    font-size: 1.35rem;
    line-height: 1.2;
    font-family: var(--font-display);
    color: var(--color-text-primary);
  }

  .ukiyo-gallery-description {
    margin-top: 0.55rem;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.55;
    font-size: 0.95rem;
  }

  .ukiyo-gallery-empty {
    padding: 1.2rem;
    border-radius: 1.2rem;
    border: 1px dashed rgba(44, 44, 44, 0.2);
    color: var(--color-text-secondary);
    background: rgba(255, 255, 255, 0.7);
  }

  .ukiyo-summary-box {
    padding: 1.25rem;
    border-radius: 1.25rem;
    background: linear-gradient(180deg, #fff 0%, #fefcf8 100%);
    border: 1px solid rgba(44, 44, 44, 0.08);
  }

  .ukiyo-summary-list {
    display: grid;
    gap: 0.7rem;
    margin-top: 1rem;
  }

  .ukiyo-contact-grid {
    display: grid;
    gap: 1.5rem;
  }

  @media (min-width: 768px) {
    .ukiyo-contact-grid {
      grid-template-columns: repeat(2, minmax(0, 1fr));
      column-gap: 2rem;
    }
  }

  .ukiyo-summary-row {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    font-size: 0.95rem;
    line-height: 1.5;
  }

  .ukiyo-summary-row strong {
    color: var(--color-text-primary);
  }

  .ukiyo-planner-actions {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    padding-top: 1.5rem;
    border-top: 1px solid rgba(44, 44, 44, 0.08);
  }

  .ukiyo-planner-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.65rem;
    min-width: 9rem;
    padding: 0.95rem 1.45rem;
    border-radius: 9999px;
    border: 1px solid rgba(44, 44, 44, 0.12);
    background: #fff;
    font-weight: 700;
    color: var(--color-text-primary);
    transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease;
  }

  .ukiyo-planner-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 12px 24px rgba(44, 44, 44, 0.08);
  }

  .ukiyo-planner-button[disabled] {
    opacity: 0.45;
    cursor: not-allowed;
    box-shadow: none;
    transform: none;
  }

  .ukiyo-planner-button.is-primary {
    border-color: rgba(246, 207, 102, 0.95);
    background: #f6cf66;
  }

  .ukiyo-planner-button-right {
    margin-left: auto;
  }

  .ukiyo-step-intro {
    margin-top: 1rem;
    margin-bottom: 3rem;
  }

  .ukiyo-field {
    width: 100%;
    padding: 0.95rem 1rem;
    border-radius: 1rem;
    border: 1px solid rgba(44, 44, 44, 0.12);
    background: #ffffff;
  }

  .ukiyo-field:focus {
    outline: none;
    border-color: #f6cf66;
    box-shadow: 0 0 0 3px rgba(246, 207, 102, 0.22);
  }

  .ukiyo-sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
  }

  @keyframes plannerFade {
    from {
      opacity: 0;
      transform: translateY(8px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @media (max-width: 1024px) {
    .ukiyo-stepper {
      grid-template-columns: repeat(3, minmax(0, 1fr));
      row-gap: 1.5rem;
    }

    .ukiyo-stepper::before {
      display: none;
    }

    .ukiyo-gallery-grid {
      min-height: 28rem;
    }
  }

  @media (max-width: 767px) {
    .ukiyo-planner-hero {
      min-height: 34vh;
      padding-top: 6.5rem;
      padding-bottom: 3rem;
    }

    .ukiyo-planner-shell {
      border-radius: 1.35rem;
      padding: 0.9rem;
    }

    #ukiyo-planner-form {
      padding: 1.1rem;
      border-radius: 1.2rem;
    }

    .ukiyo-planner-panel h2 {
      font-size: 2.15rem;
      line-height: 0.98;
    }

    .ukiyo-step-intro {
      margin-top: 0.75rem;
      margin-bottom: 1.35rem;
      font-size: 1rem;
      line-height: 1.5;
    }

    .ukiyo-choice-grid {
      display: grid;
      min-height: 0;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 0.75rem;
    }

    .ukiyo-gallery-grid {
      display: grid;
      min-height: 0;
      grid-template-columns: 1fr;
    }

    .ukiyo-choice {
      min-height: 8.75rem;
      padding: 0.85rem;
      border-radius: 1.2rem;
    }

    .ukiyo-choice-lite {
      min-height: 0;
      padding: 0.95rem 0.85rem;
    }

    .ukiyo-choice-kicker {
      padding: 0.32rem 0.5rem;
      font-size: 0.58rem;
      letter-spacing: 0.05em;
    }

    .ukiyo-choice-title {
      font-size: 1.05rem;
      line-height: 1.05;
    }

    .ukiyo-choice-description {
      margin-top: 0.4rem;
      font-size: 0.82rem;
      line-height: 1.35;
    }

    .ukiyo-inline-toggle {
      gap: 0.7rem;
      padding: 0.85rem 0.95rem;
      border-radius: 1rem;
    }

    .ukiyo-alert {
      padding: 0.9rem 1rem;
      border-radius: 1rem;
    }

    .ukiyo-gallery-card,
    .ukiyo-gallery-grid:hover .ukiyo-gallery-card,
    .ukiyo-gallery-card.is-active,
    .ukiyo-gallery-card.is-expanded {
      flex: initial;
      flex-basis: auto;
    }

    .ukiyo-gallery-media {
      height: 18rem;
      flex-basis: 18rem;
    }

    .ukiyo-gallery-copy {
      opacity: 1;
      transform: translateY(0);
    }

    .ukiyo-stepper {
      grid-template-columns: repeat(6, minmax(0, 1fr));
      gap: 0.25rem;
      align-items: start;
    }

    .ukiyo-stepper::before {
      display: block;
      left: 4%;
      right: 4%;
      top: 1.95rem;
    }

    .ukiyo-stepper-item {
      gap: 0.45rem;
    }

    .ukiyo-stepper-label {
      min-height: 2rem;
      font-size: 0.64rem;
      line-height: 1.15;
      letter-spacing: -0.01em;
    }

    .ukiyo-stepper-badge {
      width: 2.1rem;
      height: 2.1rem;
      font-size: 0.95rem;
      border-width: 1.5px;
    }

    .ukiyo-planner-shell .mb-10 {
      margin-bottom: 1rem;
    }

    .ukiyo-planner-shell .mt-10 {
      margin-top: 1rem;
    }

    .ukiyo-planner-shell .mt-16,
    .ukiyo-planner-shell .md\:mt-20 {
      margin-top: 1.25rem;
    }

    .ukiyo-planner-actions {
      flex-direction: column;
      gap: 0.75rem;
      margin-top: 1rem;
      padding-top: 1rem;
    }

    .ukiyo-planner-button,
    .ukiyo-planner-button.is-primary {
      width: 100%;
    }
  }
</style>

<section class="ukiyo-planner-hero relative flex items-center justify-center overflow-hidden pt-32 pb-16">
  <div class="absolute inset-0">
    <img
      src="<?php echo esc_url( $theme_uri . '/images/destination-mood/viajes-a-colombia-personalizados-cartagena-ciudad-amurallada.webp' ); ?>"
      alt="Planifica tu viaje"
      class="h-full w-full object-cover mask-image"
      loading="eager"
    />
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/35 to-black/60"></div>
  </div>

  <div class="relative z-10 w-full">
    <div class="container mx-auto px-6">
      <div class="mx-auto max-w-4xl text-center">
        <span class="inline-block rounded-full bg-white/12 px-4 py-2 text-sm font-medium text-white backdrop-blur-sm">
          Diseño a medida
        </span>
        <h1 class="mt-6 font-rowdies text-hero text-white text-shadow">
          ¿Cómo se siente vuestro <span class="text-accent-300">próximo viaje</span>?
        </h1>
        <p class="mx-auto mt-6 max-w-3xl text-lg leading-relaxed text-white/90 md:text-xl text-shadow">
          Un formulario visual, sin fricción y con referencias inspiracionales para construir una propuesta que encaje de verdad con vosotros.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="bg-background pt-24 pb-14 md:pt-28">
  <div class="container mx-auto px-6">
    <div class="mx-auto max-w-6xl">
      <?php if ( ! empty( $errors ) ) : ?>
        <div class="mb-8 rounded-2xl border border-red-200 bg-white p-5 text-red-800 shadow-sm">
          <ul class="list-disc pl-6">
            <?php foreach ( $errors as $error ) : ?>
              <li><?php echo esc_html( $error ); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if ( $sent && $success_msg ) : ?>
        <div class="mb-8 rounded-3xl border border-emerald-200 bg-white p-6 shadow-sm">
          <p class="font-semibold text-emerald-900"><?php echo esc_html( $success_msg ); ?></p>
        </div>
      <?php endif; ?>

      <div class="ukiyo-planner-shell rounded-[2rem] bg-surface p-5 md:p-8">
        <ol class="ukiyo-stepper mb-10" id="ukiyo-stepper">
          <?php
          $step_labels = [
              'Destino',
              'Duración',
              'Viajeros',
              'Perfil y fechas',
              'Proyecto de viaje',
              'Contacto',
          ];
          foreach ( $step_labels as $index => $label ) :
              ?>
            <li class="ukiyo-stepper-item" data-stepper-index="<?php echo esc_attr( $index ); ?>">
              <span class="ukiyo-stepper-label"><?php echo esc_html( $label ); ?></span>
              <span class="ukiyo-stepper-badge"><?php echo esc_html( $index + 1 ); ?></span>
            </li>
          <?php endforeach; ?>
        </ol>

        <form id="ukiyo-planner-form" method="post" class="rounded-[1.75rem] bg-background p-6 md:p-8">
          <?php wp_nonce_field( 'ukiyo_trip_submit', 'ukiyo_trip_nonce' ); ?>
          <input type="text" name="ukiyo_pot" class="ukiyo-sr-only" tabindex="-1" autocomplete="off" aria-hidden="true" />
          <input type="hidden" name="gallery_recommendations" id="gallery_recommendations" value="<?php echo esc_attr( $form_values['gallery_recommendations'] ); ?>" />

          <section class="ukiyo-planner-panel" data-step="1">
            <div class="max-w-3xl">
              <p class="mb-3 text-sm uppercase tracking-[0.24em] text-text-secondary">Paso 1</p>
              <h2 class="font-rowdies text-4xl text-text-primary md:text-6xl">¿Dónde nos vamos?</h2>
              <p class="ukiyo-step-intro max-w-2xl text-lg text-text-secondary">
                El primer paso siempre es imaginar el lugar.
              </p>
            </div>

            <div class="ukiyo-choice-grid mt-10">
              <?php foreach ( $planner_countries as $country_key => $country ) : ?>
                <label class="ukiyo-choice">
                  <input
                    type="radio"
                    name="country"
                    class="ukiyo-sr-only"
                    value="<?php echo esc_attr( $country_key ); ?>"
                    <?php checked( $form_values['country'], $country_key ); ?>
                  />
                  <img class="ukiyo-choice-media" src="<?php echo esc_url( $country['image'] ); ?>" alt="<?php echo esc_attr( $country['label'] ); ?>" />
                  <div class="ukiyo-choice-copy">
                    <span class="ukiyo-choice-kicker"><?php echo esc_html( $country['eyebrow'] ); ?></span>
                    <div class="ukiyo-choice-title"><?php echo esc_html( $country['label'] ); ?></div>
                    <p class="ukiyo-choice-description"><?php echo esc_html( $country['description'] ); ?></p>
                  </div>
                </label>
              <?php endforeach; ?>
            </div>
          </section>

          <section class="ukiyo-planner-panel" data-step="2">
            <div class="max-w-3xl">
              <p class="mb-3 text-sm uppercase tracking-[0.24em] text-text-secondary">Paso 2</p>
              <h2 class="font-rowdies text-4xl text-text-primary md:text-6xl">¿Cuántos días le damos a esta historia?</h2>
              <p class="ukiyo-step-intro max-w-2xl text-lg text-text-secondary">
                El tiempo define el ritmo del viaje.
              </p>
            </div>

            <div id="ukiyo-duration-options" class="ukiyo-choice-grid mt-10"></div>
          </section>

          <section class="ukiyo-planner-panel" data-step="3">
            <div class="max-w-3xl">
              <p class="mb-3 text-sm uppercase tracking-[0.24em] text-text-secondary">Paso 3</p>
              <h2 class="font-rowdies text-4xl text-text-primary md:text-6xl">¿Quién se viene?</h2>
              <p class="ukiyo-step-intro max-w-2xl text-lg text-text-secondary">
                Cada viaje cambia según con quién lo compartes.
              </p>
            </div>

            <div class="ukiyo-choice-grid mt-10">
              <?php
              $travellers = [
                  'solo'    => 'Viajo solo/a',
                  'pareja'  => 'Viajamos en pareja',
                  'amigos'  => 'Nos vamos con amigos',
                  'familia' => 'Es un viaje en familia',
              ];
              foreach ( $travellers as $traveller_key => $traveller_label ) :
                  ?>
                <label class="ukiyo-choice ukiyo-choice-lite ukiyo-tile">
                  <input
                    type="radio"
                    name="travelers"
                    class="ukiyo-sr-only"
                    value="<?php echo esc_attr( $traveller_key ); ?>"
                    <?php checked( $form_values['travelers'], $traveller_key ); ?>
                  />
                  <div class="ukiyo-choice-copy">
                    <div class="ukiyo-choice-title"><?php echo esc_html( $traveller_label ); ?></div>
                  </div>
                </label>
              <?php endforeach; ?>
            </div>
          </section>

          <section class="ukiyo-planner-panel" data-step="4">
            <div class="max-w-3xl">
              <p class="mb-3 text-sm uppercase tracking-[0.24em] text-text-secondary">Paso 4</p>
              <h2 class="font-rowdies text-4xl text-text-primary md:text-6xl">¿Cómo os imagináis este viaje?</h2>
              <p class="ukiyo-step-intro max-w-2xl text-lg text-text-secondary">
                Esto nos ayuda a diseñar algo que encaje de verdad con vosotros.
              </p>
            </div>

            <div class="mt-10 grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
              <div class="space-y-8">
                <fieldset>
                  <legend class="mb-4 text-lg font-semibold text-text-primary">Estilo</legend>
                  <div class="ukiyo-choice-grid">
                    <?php
                    $styles = [
                        'cultura'    => 'Cultura',
                        'aventura'   => 'Aventura',
                        'calma'      => 'Calma',
                        'equilibrio' => 'Equilibrio',
                    ];
                    foreach ( $styles as $style_key => $style_label ) :
                        ?>
                      <label class="ukiyo-choice ukiyo-choice-lite ukiyo-tile">
                        <input
                          type="radio"
                          name="travel_style"
                          class="ukiyo-sr-only"
                          value="<?php echo esc_attr( $style_key ); ?>"
                          <?php checked( $form_values['travel_style'], $style_key ); ?>
                        />
                        <div class="ukiyo-choice-copy">
                          <div class="ukiyo-choice-title"><?php echo esc_html( $style_label ); ?></div>
                        </div>
                      </label>
                    <?php endforeach; ?>
                  </div>
                </fieldset>

                <label class="ukiyo-inline-toggle">
                  <input type="checkbox" name="honeymoon" value="1" <?php checked( $form_values['honeymoon'], '1' ); ?> />
                  <div>
                    <div class="font-semibold text-text-primary">Es un viaje de luna de miel</div>
                    <p class="mt-1 text-sm text-text-secondary">Si lo marcas, priorizamos capas más especiales y momentos más íntimos.</p>
                  </div>
                </label>

                <fieldset>
                  <legend class="mb-4 text-lg font-semibold text-text-primary">Fechas</legend>
                  <div class="ukiyo-choice-grid">
                    <?php
                    $date_modes = [
                        'exact'       => 'Ya tenemos fecha exacta',
                        'approximate' => 'Mes aproximado',
                        'flexible'    => 'Somos flexibles',
                    ];
                    foreach ( $date_modes as $mode_key => $mode_label ) :
                        ?>
                      <label class="ukiyo-choice ukiyo-choice-lite ukiyo-tile">
                        <input
                          type="radio"
                          name="date_mode"
                          class="ukiyo-sr-only"
                          value="<?php echo esc_attr( $mode_key ); ?>"
                          <?php checked( $form_values['date_mode'], $mode_key ); ?>
                        />
                        <div class="ukiyo-choice-copy">
                          <div class="ukiyo-choice-title"><?php echo esc_html( $mode_label ); ?></div>
                        </div>
                      </label>
                    <?php endforeach; ?>
                  </div>
                </fieldset>
              </div>

              <div class="space-y-6">
                <div id="ukiyo-exact-date-wrap" class="<?php echo 'exact' === $form_values['date_mode'] ? '' : 'hidden'; ?>">
                  <label class="mb-2 block text-sm font-semibold text-text-primary" for="exact_date">Fecha exacta</label>
                  <input
                    id="exact_date"
                    class="ukiyo-field"
                    type="date"
                    name="exact_date"
                    value="<?php echo esc_attr( $form_values['exact_date'] ); ?>"
                  />
                </div>

                <div id="ukiyo-approx-month-wrap" class="<?php echo 'approximate' === $form_values['date_mode'] ? '' : 'hidden'; ?>">
                  <label class="mb-2 block text-sm font-semibold text-text-primary" for="approx_month">Mes aproximado</label>
                  <select id="approx_month" class="ukiyo-field" name="approx_month">
                    <option value="">Selecciona una ventana</option>
                    <?php foreach ( $planner_month_choices as $choice ) : ?>
                      <option value="<?php echo esc_attr( $choice['value'] ); ?>" <?php selected( $form_values['approx_month'], $choice['value'] ); ?>>
                        <?php echo esc_html( $choice['label'] ); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div id="ukiyo-alerts" class="ukiyo-fade-stack"></div>
              </div>
            </div>
          </section>

          <section class="ukiyo-planner-panel" data-step="5">
            <div class="max-w-3xl">
              <p class="mb-3 text-sm uppercase tracking-[0.24em] text-text-secondary">Paso 5</p>
              <h2 class="font-rowdies text-4xl text-text-primary md:text-6xl">Proyecto de viaje</h2>
              <p class="ukiyo-step-intro max-w-2xl text-lg text-text-secondary">
                Una primera idea basada en lo que nos habéis contado.
              </p>
            </div>

            <div class="mt-16 md:mt-20">
              <div id="ukiyo-gallery" class="ukiyo-gallery-grid"></div>
              <div id="ukiyo-gallery-empty" class="ukiyo-gallery-empty hidden">
                Todavía no hay suficientes señales para construir la galería. Revisa los pasos anteriores y seguimos.
              </div>
            </div>
          </section>

          <section class="ukiyo-planner-panel" data-step="6">
            <div class="max-w-3xl">
              <p class="mb-3 text-sm uppercase tracking-[0.24em] text-text-secondary">Paso 6</p>
              <h2 class="font-rowdies text-4xl text-text-primary md:text-6xl">Cuéntanos cómo os contactamos</h2>
              <p class="ukiyo-step-intro max-w-2xl text-lg text-text-secondary">
                A partir de aquí, lo construimos con vosotros.
              </p>
            </div>

            <div class="mt-10 grid gap-8 lg:grid-cols-[1.05fr_0.95fr]">
              <div class="space-y-8">
                <div class="ukiyo-contact-grid">
                  <div>
                    <label class="mb-2 block text-sm font-semibold text-text-primary" for="traveller_name">Nombre *</label>
                    <input
                      id="traveller_name"
                      class="ukiyo-field"
                      type="text"
                      name="traveller_name"
                      value="<?php echo esc_attr( $form_values['traveller_name'] ); ?>"
                      required
                    />
                  </div>
                  <div>
                    <label class="mb-2 block text-sm font-semibold text-text-primary" for="phone">Teléfono *</label>
                    <input
                      id="phone"
                      class="ukiyo-field"
                      type="tel"
                      name="phone"
                      value="<?php echo esc_attr( $form_values['phone'] ); ?>"
                      required
                    />
                  </div>
                </div>

                <div class="pt-3 md:pt-4">
                  <label class="mb-2 block text-sm font-semibold text-text-primary" for="email">Email *</label>
                  <input
                    id="email"
                    class="ukiyo-field"
                    type="email"
                    name="email"
                    value="<?php echo esc_attr( $form_values['email'] ); ?>"
                    required
                  />
                </div>

                <div class="pt-3 md:pt-4">
                  <label class="mb-2 block text-sm font-semibold text-text-primary" for="notes">Algo más que debamos saber</label>
                  <textarea
                    id="notes"
                    class="ukiyo-field min-h-[11rem]"
                    name="notes"
                    placeholder="Qué os apetece, qué queréis evitar, si celebráis algo o si ya tenéis una idea en la cabeza."
                  ><?php echo esc_textarea( $form_values['notes'] ); ?></textarea>
                </div>

                <label class="ukiyo-inline-toggle">
                  <input type="checkbox" name="gdpr" value="1" <?php checked( $form_values['gdpr'], '1' ); ?> required />
                  <div>
                    <div class="font-semibold text-text-primary">Acepto la política de privacidad *</div>
                    <p class="mt-1 text-sm text-text-secondary">
                      Tus datos se usarán solo para preparar y gestionar esta solicitud.
                    </p>
                  </div>
                </label>
              </div>

              <aside class="ukiyo-summary-box">
                <p class="text-sm uppercase tracking-[0.2em] text-text-secondary">Resumen</p>
                <h3 class="mt-3 font-rowdies text-3xl text-text-primary">Así va quedando</h3>
                <div id="ukiyo-contact-summary" class="ukiyo-summary-list"></div>
              </aside>
            </div>
          </section>

          <div class="ukiyo-planner-actions mt-10">
            <button type="button" id="ukiyo-prev" class="ukiyo-planner-button" hidden>Atrás</button>
            <button type="button" id="ukiyo-next" class="ukiyo-planner-button ukiyo-planner-button-right is-primary">Siguiente</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="bg-background py-12">
  <div class="container mx-auto px-6">
    <div class="mx-auto max-w-3xl text-center">
      <h2 class="font-rowdies text-display text-text-primary">¿Qué pasa después?</h2>
      <p class="mt-6 text-xl leading-relaxed text-text-secondary">
        Leemos el briefing, afinamos contigo lo importante y te devolvemos una propuesta con criterio. Sin fórmulas cerradas y sin viajes enlatados.
      </p>
    </div>
  </div>
</section>

<script>
  // Configuración compartida entre PHP y el frontend del formulario.
  const plannerConfig = <?php echo wp_json_encode( $planner_config, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>;

  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('ukiyo-planner-form');
    const panels = Array.from(form.querySelectorAll('.ukiyo-planner-panel'));
    const stepperItems = Array.from(document.querySelectorAll('.ukiyo-stepper-item'));
    const prevButton = document.getElementById('ukiyo-prev');
    const nextButton = document.getElementById('ukiyo-next');
    const durationOptions = document.getElementById('ukiyo-duration-options');
    const alertsContainer = document.getElementById('ukiyo-alerts');
    const exactDateWrap = document.getElementById('ukiyo-exact-date-wrap');
    const approxMonthWrap = document.getElementById('ukiyo-approx-month-wrap');
    const exactDateInput = document.getElementById('exact_date');
    const approxMonthInput = document.getElementById('approx_month');
    const galleryContainer = document.getElementById('ukiyo-gallery');
    const galleryEmpty = document.getElementById('ukiyo-gallery-empty');
    const galleryField = document.getElementById('gallery_recommendations');
    const contactSummary = document.getElementById('ukiyo-contact-summary');

    const durationsByCountry = plannerConfig.durationsByCountry;
    const travelBlocks = plannerConfig.travelBlocks;
    const monthChoices = plannerConfig.monthChoices;
    const initialState = plannerConfig.initialState || {};
    // Rangos aproximados de Ramadán para los meses disponibles en el selector.
    const ramadanWindows = {
      2026: { start: '2026-02-17', end: '2026-03-18' },
      2027: { start: '2027-02-08', end: '2027-03-08' }
    };
    const alertCopy = {
      universal: {
        title: 'Cada viaje lo diseñamos de forma completamente personalizada',
        copy: 'Estas recomendaciones nos ayudan a construir una propuesta que encaje de verdad con vosotros.'
      },
      indonesiaHighDemand: {
        title: 'Indonesia | Julio – Agosto',
        copy: 'Indonesia es uno de los destinos más demandados en estos meses. Algunas zonas, especialmente Bali, pueden tener mayor afluencia de viajeros. Adaptamos la ruta para mantener una experiencia más auténtica y equilibrada.'
      },
      indonesiaRain: {
        title: 'Indonesia | Noviembre – Marzo',
        copy: 'En estas fechas pueden darse lluvias en algunas regiones del país. Suelen ser puntuales, pero pueden influir en el ritmo del viaje. Diseñamos la ruta teniendo en cuenta las mejores zonas según la época.'
      },
      indonesiaShort: {
        title: 'Indonesia | Tiempo mínimo recomendable',
        copy: 'Indonesia es un destino amplio que requiere tiempo para disfrutarse bien. Recomendamos dedicar al menos 10 días para construir una experiencia completa.'
      },
      colombiaClimate: {
        title: 'Colombia | Clima variable',
        copy: 'Colombia es un destino muy diverso donde el clima varía según la región. No hay una única mejor época, por lo que ajustamos cada ruta para aprovechar cada zona en su mejor momento.'
      },
      colombiaWhales: {
        title: 'Colombia | Temporada de ballenas',
        copy: 'En estas fechas coincide la temporada de avistamiento de ballenas en el Pacífico. Una experiencia muy especial que podemos integrar dentro del viaje.'
      },
      colombiaShort: {
        title: 'Colombia | Tiempo mínimo recomendable',
        copy: 'Colombia es un país grande y con desplazamientos internos. Recomendamos dedicar el tiempo suficiente para evitar un ritmo demasiado ajustado.'
      },
      costaricaGreen: {
        title: 'Costa Rica | Temporada verde',
        copy: 'Viajar en esta época significa encontrarse con la naturaleza en su máximo esplendor. Puede haber lluvias puntuales, normalmente por la tarde. Bien planteado, es un momento muy interesante para disfrutar del país.'
      },
      costaricaFauna: {
        title: 'Costa Rica | Fauna y Tortuguero',
        copy: 'Algunas épocas del año coinciden con momentos clave de la fauna, como el desove de tortugas. Podemos adaptar la ruta para incluir este tipo de experiencias si encajan en vuestro viaje.'
      },
      costaricaShort: {
        title: 'Costa Rica | Tiempo mínimo recomendable',
        copy: 'Costa Rica se disfruta mejor combinando varias zonas del país. Recomendamos dedicar al menos 10 días para vivirlo con equilibrio.'
      },
      marruecosSummer: {
        title: 'Marruecos | Verano',
        copy: 'Las temperaturas pueden ser elevadas, especialmente en zonas interiores y desierto. Ajustamos la ruta y el ritmo del viaje para que sea cómodo y disfrutable.'
      },
      marruecosWinter: {
        title: 'Marruecos | Invierno',
        copy: 'En invierno, algunas zonas pueden ser frías, especialmente por la noche. Tenemos en cuenta estos factores en alojamientos y planificación diaria.'
      },
      marruecosRamadan: {
        title: 'Marruecos | Ramadán',
        copy: 'Durante el Ramadán, el ritmo del país cambia ligeramente en algunos momentos del día. El viaje sigue siendo totalmente viable, adaptando pequeños detalles de la experiencia.'
      }
    };

    let currentStep = Number.isInteger(plannerConfig.initialStep) ? plannerConfig.initialStep : 0;

    function escapeHtml(value) {
      const div = document.createElement('div');
      div.textContent = value == null ? '' : String(value);
      return div.innerHTML;
    }

    function getState() {
      const checkedCountry = form.querySelector('input[name="country"]:checked');
      const checkedDuration = form.querySelector('input[name="duration"]:checked');
      const checkedTravelers = form.querySelector('input[name="travelers"]:checked');
      const checkedStyle = form.querySelector('input[name="travel_style"]:checked');
      const checkedDateMode = form.querySelector('input[name="date_mode"]:checked');

      return {
        country: checkedCountry ? checkedCountry.value : '',
        duration: checkedDuration ? checkedDuration.value : '',
        travelers: checkedTravelers ? checkedTravelers.value : '',
        travel_style: checkedStyle ? checkedStyle.value : '',
        honeymoon: Boolean(form.querySelector('input[name="honeymoon"]')?.checked),
        date_mode: checkedDateMode ? checkedDateMode.value : '',
        exact_date: exactDateInput.value,
        approx_month: approxMonthInput.value,
        traveller_name: form.querySelector('input[name="traveller_name"]').value.trim(),
        email: form.querySelector('input[name="email"]').value.trim(),
        phone: form.querySelector('input[name="phone"]').value.trim(),
        notes: form.querySelector('textarea[name="notes"]').value.trim(),
        gdpr: Boolean(form.querySelector('input[name="gdpr"]')?.checked)
      };
    }

    function getDurationMeta(durationLabel) {
      if (!durationLabel) {
        return { min: 0, max: 0 };
      }

      if (durationLabel.includes('+')) {
        const minValue = Number.parseInt(durationLabel, 10);
        return { min: minValue, max: Infinity };
      }

      const rangeMatch = durationLabel.match(/(\d+)-(\d+)/);
      if (!rangeMatch) {
        const days = Number.parseInt(durationLabel, 10);
        return { min: days || 0, max: days || 0 };
      }

      return {
        min: Number.parseInt(rangeMatch[1], 10),
        max: Number.parseInt(rangeMatch[2], 10)
      };
    }

    function getGalleryLimit(durationLabel) {
      const meta = getDurationMeta(durationLabel);
      return meta.max >= 15 || meta.min >= 15 ? 4 : 3;
    }

    function formatDurationLabel(durationLabel) {
      return durationLabel ? `${durationLabel} días` : '';
    }

    function getMonthInfo(state) {
      if (state.date_mode === 'exact' && state.exact_date) {
        const exactDate = new Date(`${state.exact_date}T12:00:00`);
        return {
          month: exactDate.getMonth() + 1,
          year: exactDate.getFullYear(),
          dateString: state.exact_date
        };
      }

      if (state.date_mode === 'approximate' && state.approx_month) {
        const [year, month] = state.approx_month.split('-').map(Number);
        return {
          month,
          year,
          dateString: `${state.approx_month}-01`
        };
      }

      return null;
    }

    function isInRamadan(monthInfo) {
      if (!monthInfo || !ramadanWindows[monthInfo.year]) {
        return false;
      }

      const windowData = ramadanWindows[monthInfo.year];
      const selectedDate = new Date(`${monthInfo.dateString}T12:00:00`).getTime();
      const startDate = new Date(`${windowData.start}T12:00:00`).getTime();
      const endDate = new Date(`${windowData.end}T12:00:00`).getTime();

      if (selectedDate >= startDate && selectedDate <= endDate) {
        return true;
      }

      if (monthInfo.dateString.endsWith('-01')) {
        const selectedMonthStart = new Date(`${monthInfo.year}-${String(monthInfo.month).padStart(2, '0')}-01T12:00:00`);
        const selectedMonthEnd = new Date(selectedMonthStart);
        selectedMonthEnd.setMonth(selectedMonthEnd.getMonth() + 1);
        selectedMonthEnd.setDate(0);

        return selectedMonthStart.getTime() <= endDate && selectedMonthEnd.getTime() >= startDate;
      }

      return false;
    }

    function getTravelAlerts(state) {
      const alerts = [];
      const durationMeta = getDurationMeta(state.duration);
      const monthInfo = getMonthInfo(state);

      if (!state.date_mode) {
        return alerts;
      }

      if (state.country === 'indonesia') {
        if (monthInfo && [7, 8].includes(monthInfo.month)) {
          alerts.push(alertCopy.indonesiaHighDemand);
        }
        if (monthInfo && [11, 12, 1, 2, 3].includes(monthInfo.month)) {
          alerts.push(alertCopy.indonesiaRain);
        }
        if (durationMeta.min > 0 && durationMeta.min < 10) {
          alerts.push(alertCopy.indonesiaShort);
        }
      }

      if (state.country === 'colombia') {
        alerts.push(alertCopy.colombiaClimate);
        if (monthInfo && [7, 8, 9, 10].includes(monthInfo.month)) {
          alerts.push(alertCopy.colombiaWhales);
        }
        if (durationMeta.min > 0 && durationMeta.min < 10) {
          alerts.push(alertCopy.colombiaShort);
        }
      }

      if (state.country === 'costarica') {
        if (monthInfo && [5, 6, 7, 8, 9, 10, 11].includes(monthInfo.month)) {
          alerts.push(alertCopy.costaricaGreen);
        }
        if (monthInfo && [7, 8, 9, 10].includes(monthInfo.month)) {
          alerts.push(alertCopy.costaricaFauna);
        }
        if (durationMeta.min > 0 && durationMeta.min < 10) {
          alerts.push(alertCopy.costaricaShort);
        }
      }

      if (state.country === 'marruecos') {
        if (monthInfo && [6, 7, 8, 9].includes(monthInfo.month)) {
          alerts.push(alertCopy.marruecosSummer);
        }
        if (monthInfo && [12, 1, 2].includes(monthInfo.month)) {
          alerts.push(alertCopy.marruecosWinter);
        }
        if (monthInfo && isInRamadan(monthInfo)) {
          alerts.push(alertCopy.marruecosRamadan);
        }
      }

      alerts.push(alertCopy.universal);

      return alerts;
    }

    function renderAlerts() {
      const state = getState();
      const alerts = getTravelAlerts(state);

      if (!alerts.length) {
        alertsContainer.innerHTML = '';
        return;
      }

      alertsContainer.innerHTML = alerts.map((alert, index) => `
        <article class="ukiyo-alert" data-alert-index="${index}">
          <div class="ukiyo-alert-title">${escapeHtml(alert.title)}</div>
          <p class="ukiyo-alert-copy">${escapeHtml(alert.copy)}</p>
        </article>
      `).join('');

      requestAnimationFrame(() => {
        alertsContainer.querySelectorAll('.ukiyo-alert').forEach((alertNode, index) => {
          window.setTimeout(() => {
            alertNode.classList.add('is-visible');
          }, index * 45);
        });
      });
    }

    function buildDurationOption(durationLabel) {
      const isChecked = initialState.duration === durationLabel;
      return `
        <label class="ukiyo-choice ukiyo-choice-lite ukiyo-tile">
          <input
            type="radio"
            name="duration"
            class="ukiyo-sr-only"
            value="${escapeHtml(durationLabel)}"
            ${isChecked ? 'checked' : ''}
          />
          <div class="ukiyo-choice-copy">
            <div class="ukiyo-choice-title">${escapeHtml(formatDurationLabel(durationLabel))}</div>
          </div>
        </label>
      `;
    }

    // Render dinámico de duraciones según país.
    function renderDurations() {
      const state = getState();
      const country = state.country;

      if (!country || !durationsByCountry[country]) {
        durationOptions.innerHTML = `
          <div class="ukiyo-gallery-empty">
            Selecciona primero un país para que podamos enseñarte las duraciones que tienen sentido para esa ruta.
          </div>
        `;
        return;
      }

      const options = durationsByCountry[country];

      durationOptions.innerHTML = options.map(buildDurationOption).join('');

      if (state.duration && !options.includes(state.duration)) {
        initialState.duration = '';
      }
    }

    function getCountryBlocks(country) {
      return Array.isArray(travelBlocks[country]) ? travelBlocks[country] : [];
    }

    function getTravelStyleMatches(block, style) {
      if (!style) {
        return false;
      }

      return block.tags.includes(style) || (style === 'especial' && block.tags.includes('luna_miel'));
    }

    function scoreBlock(block, state) {
      let score = 0;

      if (getTravelStyleMatches(block, state.travel_style)) {
        score += 6;
      }

      if (state.travelers && block.tags.includes(state.travelers)) {
        score += 4;
      }

      if (state.honeymoon && block.tags.includes('luna_miel')) {
        score += 5;
      }

      if (state.honeymoon && block.tags.includes('especial')) {
        score += 3;
      }

      if (state.travel_style === 'especial' && block.tags.includes('especial')) {
        score += 2;
      }

      if (state.travel_style === 'equilibrio' && block.tags.includes('naturaleza')) {
        score += 1;
      }

      if (getGalleryLimit(state.duration) === 4 && (block.tags.includes('aventura') || block.tags.includes('exploracion') || block.tags.includes('naturaleza'))) {
        score += 1;
      }

      return score;
    }

    // Motor de coincidencias para construir la galería inspiracional.
    function generateGallery(state) {
      if (!state.country) {
        return [];
      }

      const blocks = getCountryBlocks(state.country);
      const targetCount = getGalleryLimit(state.duration);

      const exactMatches = blocks
        .filter((block) => getTravelStyleMatches(block, state.travel_style))
        .map((block) => ({ ...block, score: scoreBlock(block, state) }));

      const fallbackMatches = blocks
        .filter((block) => !exactMatches.some((match) => match.name === block.name))
        .map((block) => ({ ...block, score: scoreBlock(block, state) }));

      const merged = [...exactMatches, ...fallbackMatches]
        .sort((left, right) => {
          if (right.score !== left.score) {
            return right.score - left.score;
          }
          return left.name.localeCompare(right.name, 'es');
        })
        .slice(0, targetCount);

      return merged;
    }

    function renderGallery() {
      const state = getState();
      const galleryItems = generateGallery(state);

      if (!galleryItems.length) {
        galleryContainer.innerHTML = '';
        galleryEmpty.classList.remove('hidden');
        galleryField.value = '';
        return;
      }

      galleryEmpty.classList.add('hidden');
      galleryField.value = galleryItems.map((item) => item.name).join(', ');
      galleryContainer.innerHTML = galleryItems.map((item, index) => `
        <article class="ukiyo-gallery-card" data-gallery-index="${index}" tabindex="0" aria-label="${escapeHtml(item.name)}">
          <div class="ukiyo-gallery-media">
            <img src="${escapeHtml(item.image)}" alt="${escapeHtml(item.name)}" />
          </div>
          <div class="ukiyo-gallery-meta">
            <h3 class="ukiyo-gallery-title">${escapeHtml(item.name)}</h3>
          </div>
        </article>
      `).join('');

      requestAnimationFrame(() => {
        galleryContainer.querySelectorAll('.ukiyo-gallery-card').forEach((card, index) => {
          window.setTimeout(() => {
            card.classList.add('is-visible');
          }, index * 60);
        });
      });

      setupGalleryInteractions();
    }

    function setupGalleryInteractions() {
      const cards = Array.from(galleryContainer.querySelectorAll('.ukiyo-gallery-card'));

      if (!cards.length) {
        return;
      }

      const activateAll = () => {
        galleryContainer.classList.remove('is-hovering');
        cards.forEach((card) => {
          card.classList.add('is-active');
          card.classList.remove('is-expanded');
        });
      };

      const activateOne = (activeCard) => {
        galleryContainer.classList.add('is-hovering');
        cards.forEach((card) => {
          const isCurrent = card === activeCard;
          card.classList.toggle('is-active', isCurrent);
          card.classList.toggle('is-expanded', isCurrent);
        });
      };

      activateAll();

      cards.forEach((card) => {
        card.addEventListener('mouseenter', () => activateOne(card));
        card.addEventListener('focusin', () => activateOne(card));
      });

      galleryContainer.addEventListener('mouseleave', activateAll);
      galleryContainer.addEventListener('focusout', () => {
        window.setTimeout(() => {
          if (!galleryContainer.contains(document.activeElement)) {
            activateAll();
          }
        }, 0);
      });
    }

    function renderSummary() {
      const state = getState();
      const countryLabel = state.country && plannerConfig.countries[state.country] ? plannerConfig.countries[state.country].label : '—';
      const travelersLabel = state.travelers ? state.travelers.charAt(0).toUpperCase() + state.travelers.slice(1) : '—';
      const styleLabel = state.travel_style ? state.travel_style.charAt(0).toUpperCase() + state.travel_style.slice(1) : '—';
      let dateLabel = '—';

      if (state.date_mode === 'exact' && state.exact_date) {
        const exactDate = new Date(`${state.exact_date}T12:00:00`);
        dateLabel = exactDate.toLocaleDateString('es-ES', { day: 'numeric', month: 'long', year: 'numeric' });
      } else if (state.date_mode === 'approximate' && state.approx_month) {
        const monthChoice = monthChoices.find((choice) => choice.value === state.approx_month);
        dateLabel = monthChoice ? monthChoice.label : state.approx_month;
      } else if (state.date_mode === 'flexible') {
        dateLabel = 'Flexible';
      }

      const galleryLabel = galleryField.value || 'Se completará con la selección anterior';

      contactSummary.innerHTML = `
        <div class="ukiyo-summary-row"><strong>Destino</strong><span>${escapeHtml(countryLabel)}</span></div>
        <div class="ukiyo-summary-row"><strong>Duración</strong><span>${escapeHtml(formatDurationLabel(state.duration) || '—')}</span></div>
        <div class="ukiyo-summary-row"><strong>Viajeros</strong><span>${escapeHtml(travelersLabel)}</span></div>
        <div class="ukiyo-summary-row"><strong>Estilo</strong><span>${escapeHtml(styleLabel)}</span></div>
        <div class="ukiyo-summary-row"><strong>Fechas</strong><span>${escapeHtml(dateLabel)}</span></div>
        <div class="ukiyo-summary-row"><strong>Luna de miel</strong><span>${state.honeymoon ? 'Sí' : 'No'}</span></div>
        <div class="ukiyo-summary-row"><strong>Inspiración</strong><span>${escapeHtml(galleryLabel)}</span></div>
      `;
    }

    function syncDateVisibility() {
      const state = getState();
      exactDateWrap.classList.toggle('hidden', state.date_mode !== 'exact');
      approxMonthWrap.classList.toggle('hidden', state.date_mode !== 'approximate');

      if (state.date_mode !== 'exact') {
        exactDateInput.value = '';
      }

      if (state.date_mode !== 'approximate') {
        approxMonthInput.value = '';
      }
    }

    function validateStep(stepIndex) {
      const state = getState();

      if (stepIndex === 0) {
        return Boolean(state.country);
      }

      if (stepIndex === 1) {
        return Boolean(state.country && state.duration);
      }

      if (stepIndex === 2) {
        return Boolean(state.travelers);
      }

      if (stepIndex === 3) {
        if (!state.travel_style || !state.date_mode) {
          return false;
        }

        if (state.date_mode === 'exact' && !state.exact_date) {
          return false;
        }

        if (state.date_mode === 'approximate' && !state.approx_month) {
          return false;
        }

        return true;
      }

      if (stepIndex === 4) {
        return Boolean(generateGallery(state).length);
      }

      if (stepIndex === 5) {
        return Boolean(state.traveller_name && state.email && state.phone && state.gdpr);
      }

      return true;
    }

    function updateButtons() {
      prevButton.hidden = currentStep === 0;
      nextButton.hidden = false;
      nextButton.textContent = currentStep === panels.length - 1 ? 'Quiero mi propuesta' : 'Siguiente';
      nextButton.disabled = !validateStep(currentStep);
    }

    function updateStepper() {
      stepperItems.forEach((item, index) => {
        const badge = item.querySelector('.ukiyo-stepper-badge');
        item.classList.remove('is-complete', 'is-active', 'is-future');

        if (index < currentStep) {
          item.classList.add('is-complete');
          badge.textContent = '✓';
          return;
        }

        if (index === currentStep) {
          item.classList.add('is-active');
          badge.textContent = String(index + 1);
          return;
        }

        item.classList.add('is-future');
        badge.textContent = String(index + 1);
      });
    }

    function updatePanels() {
      panels.forEach((panel, index) => {
        panel.classList.toggle('is-active', index === currentStep);
      });
    }

    function refreshUI() {
      syncDateVisibility();
      renderAlerts();
      renderGallery();
      renderSummary();
      updatePanels();
      updateStepper();
      updateButtons();
    }

    function goToStep(stepIndex) {
      currentStep = Math.max(0, Math.min(stepIndex, panels.length - 1));
      refreshUI();
    }

    prevButton.addEventListener('click', function () {
      if (currentStep > 0) {
        goToStep(currentStep - 1);
      }
    });

    nextButton.addEventListener('click', function () {
      if (!validateStep(currentStep)) {
        return;
      }

      if (currentStep === panels.length - 1) {
        form.requestSubmit();
        return;
      }

      if (currentStep < panels.length - 1) {
        goToStep(currentStep + 1);
      }
    });

    form.addEventListener('change', function (event) {
      if (event.target.name === 'country') {
        initialState.duration = '';
        renderDurations();
      }

      refreshUI();
    });

    form.addEventListener('input', function () {
      refreshUI();
    });

    stepperItems.forEach((item, index) => {
      item.addEventListener('click', function () {
        if (index <= currentStep) {
          goToStep(index);
        }
      });
      item.style.cursor = 'pointer';
    });

    renderDurations();

    if (initialState.country) {
      const countryInput = form.querySelector(`input[name="country"][value="${initialState.country}"]`);
      if (countryInput) {
        countryInput.checked = true;
      }
      renderDurations();
      const durationInput = form.querySelector(`input[name="duration"][value="${initialState.duration}"]`);
      if (durationInput) {
        durationInput.checked = true;
      }
    }

    refreshUI();
  });
</script>

<?php get_footer(); ?>
