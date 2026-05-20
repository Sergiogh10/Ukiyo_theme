<?php
/**
 * Local SVG icon helpers to avoid loading remote icon fonts.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Normalize icon names used across templates and meta fields.
 *
 * @param string $name Raw icon name.
 * @return string
 */
function ukiyo_normalize_icon_name( $name ) {
    $name = sanitize_key( str_replace( '-', '_', (string) $name ) );

    $aliases = [
        'calendar_month'    => 'calendar',
        'currency_exchange' => 'coins',
        'language'          => 'globe',
        'thermostat'        => 'thermometer',
        'check_circle'      => 'check_circle',
        'expand_more'       => 'chevron_down',
        'chevron_left'      => 'chevron_left',
        'chevron_right'     => 'chevron_right',
        'arrow_forward'     => 'arrow_right',
        'east'              => 'arrow_right',
        'north_east'        => 'arrow_up_right',
        'schedule'          => 'clock',
        'groups'            => 'users',
        'diversity_3'       => 'users',
        'person'            => 'person',
        'fact_check'        => 'clipboard_check',
        'quiz'              => 'help_circle',
        'forest'            => 'leaf',
        'eco'               => 'leaf',
        'park'              => 'leaf',
        'nature'            => 'leaf',
        'photo_camera'      => 'camera',
        'camera_alt'        => 'camera',
        'flight_takeoff'    => 'plane_takeoff',
        'label'             => 'tag',
        'close'             => 'x',
        'cancel'            => 'x_circle',
        'check'             => 'check',
        'wb_twilight'       => 'moon',
        'nightlight'        => 'moon',
        'pets'              => 'paw',
        'cruelty_free'      => 'paw',
        'hotel'             => 'hotel',
        'restaurant'        => 'utensils',
        'local_cafe'        => 'coffee',
        'wb_sunny'          => 'sun',
        'water_drop'        => 'drop',
        'location_city'     => 'city',
        'landscape'         => 'mountains',
        'castle'            => 'castle',
        'temple_buddhist'   => 'temple',
        'agriculture'       => 'wheat',
        'beach_access'      => 'beach',
        'volcano'           => 'volcano',
        'music_note'        => 'music',
        'favorite'          => 'heart',
        'edit'              => 'pencil',
        'social_leaderboard'=> 'chart',
        'bug_report'        => 'bug',
        'kayaking'          => 'waves',
        'explore'           => 'compass',
        'info'              => 'info',
        'spa'               => 'sparkle',
        'visibility'        => 'eye',
    ];

    return $aliases[ $name ] ?? $name;
}

/**
 * Return the inline SVG paths for a normalized icon.
 *
 * @param string $name Normalized icon name.
 * @return string
 */
function ukiyo_get_icon_markup( $name ) {
    $icons = [
        'calendar' => '<rect x="3" y="4" width="18" height="18" rx="2"></rect><path d="M16 2v4"></path><path d="M8 2v4"></path><path d="M3 10h18"></path>',
        'coins' => '<path d="M12 7c4.418 0 8-1.343 8-3S16.418 1 12 1 4 2.343 4 4s3.582 3 8 3Z"></path><path d="M4 4v6c0 1.657 3.582 3 8 3s8-1.343 8-3V4"></path><path d="M4 10v6c0 1.657 3.582 3 8 3s8-1.343 8-3v-6"></path>',
        'globe' => '<circle cx="12" cy="12" r="9"></circle><path d="M3 12h18"></path><path d="M12 3a15 15 0 0 1 0 18"></path><path d="M12 3a15 15 0 0 0 0 18"></path>',
        'thermometer' => '<path d="M14 14.76V5a2 2 0 1 0-4 0v9.76a4 4 0 1 0 4 0Z"></path>',
        'check_circle' => '<circle cx="12" cy="12" r="9"></circle><path d="m8.5 12 2.5 2.5 4.5-5"></path>',
        'info' => '<circle cx="12" cy="12" r="9"></circle><path d="M12 10v5"></path><path d="M12 7h.01"></path>',
        'chevron_down' => '<path d="m6 9 6 6 6-6"></path>',
        'chevron_left' => '<path d="m15 18-6-6 6-6"></path>',
        'chevron_right' => '<path d="m9 6 6 6-6 6"></path>',
        'arrow_right' => '<path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path>',
        'arrow_up_right' => '<path d="M7 17 17 7"></path><path d="M9 7h8v8"></path>',
        'clock' => '<circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 3"></path>',
        'users' => '<path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"></path><circle cx="9.5" cy="7" r="3"></circle><path d="M20 21v-2a4 4 0 0 0-3-3.87"></path><path d="M15 4.13a3 3 0 0 1 0 5.74"></path>',
        'person' => '<path d="M18 20a6 6 0 0 0-12 0"></path><circle cx="12" cy="8" r="4"></circle>',
        'clipboard_check' => '<path d="M9 3h6"></path><path d="M10 3a1 1 0 0 0-1 1v1H7a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2V4a1 1 0 0 0-1-1"></path><path d="m9 13 2 2 4-4"></path>',
        'help_circle' => '<circle cx="12" cy="12" r="9"></circle><path d="M9.09 9a3 3 0 1 1 5.82 1c0 2-3 2-3 4"></path><path d="M12 17h.01"></path>',
        'leaf' => '<path d="M11 20A7 7 0 0 1 4 13C4 7 10 4 20 4c0 10-3 16-9 16Z"></path><path d="M11 20c-1-4 1-8 6-12"></path>',
        'camera' => '<path d="M4 8h3l2-3h6l2 3h3a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2Z"></path><circle cx="12" cy="13" r="3.5"></circle>',
        'plane_takeoff' => '<path d="M2 16h20"></path><path d="m3 12 8-2 3-6 2 1-1 5 5 2-1.5 2-5.5-1-3 3H8l1-3-6-1Z"></path>',
        'tag' => '<path d="M20 12 12 20 4 12V4h8l8 8Z"></path><circle cx="9" cy="9" r="1"></circle>',
        'x' => '<path d="M6 6 18 18"></path><path d="M18 6 6 18"></path>',
        'x_circle' => '<circle cx="12" cy="12" r="9"></circle><path d="M9 9 15 15"></path><path d="m15 9-6 6"></path>',
        'check' => '<path d="m5 12 4 4L19 6"></path>',
        'moon' => '<path d="M21 12.8A9 9 0 1 1 11.2 3 7 7 0 0 0 21 12.8Z"></path>',
        'paw' => '<path d="M11 18c-1.5 0-4 1-4 3h10c0-2-2.5-3-4-3Z"></path><ellipse cx="7" cy="9" rx="1.8" ry="2.5"></ellipse><ellipse cx="12" cy="7" rx="1.8" ry="2.7"></ellipse><ellipse cx="17" cy="9" rx="1.8" ry="2.5"></ellipse><ellipse cx="9" cy="13" rx="1.6" ry="2.1"></ellipse><ellipse cx="15" cy="13" rx="1.6" ry="2.1"></ellipse>',
        'hotel' => '<path d="M4 20V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v14"></path><path d="M2 20h20"></path><path d="M7 20v-4h10v4"></path><path d="M8 8h2"></path><path d="M14 8h2"></path><path d="M8 12h2"></path><path d="M14 12h2"></path>',
        'utensils' => '<path d="M4 3v8"></path><path d="M7 3v8"></path><path d="M4 7h3"></path><path d="M5.5 11v10"></path><path d="M14 3v18"></path><path d="M14 3c2 0 4 2 4 5v3h-4"></path>',
        'coffee' => '<path d="M4 8h12v6a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4V8Z"></path><path d="M16 10h1a3 3 0 0 1 0 6h-1"></path><path d="M8 2v3"></path><path d="M12 2v3"></path>',
        'sun' => '<circle cx="12" cy="12" r="4"></circle><path d="M12 2v3"></path><path d="M12 19v3"></path><path d="m4.93 4.93 2.12 2.12"></path><path d="m16.95 16.95 2.12 2.12"></path><path d="M2 12h3"></path><path d="M19 12h3"></path><path d="m4.93 19.07 2.12-2.12"></path><path d="m16.95 7.05 2.12-2.12"></path>',
        'city' => '<path d="M4 20V8l6-3v15"></path><path d="M10 20V4l10 4v12"></path><path d="M6 12h.01"></path><path d="M6 16h.01"></path><path d="M14 10h.01"></path><path d="M14 14h.01"></path><path d="M18 10h.01"></path><path d="M18 14h.01"></path>',
        'mountains' => '<path d="m3 20 6-9 4 6 3-4 5 7H3Z"></path>',
        'castle' => '<path d="M4 20V8h4V4h8v4h4v12"></path><path d="M8 20v-4h8v4"></path><path d="M8 8h8"></path><path d="M12 4v4"></path>',
        'temple' => '<path d="M3 9 12 4l9 5"></path><path d="M5 10v8"></path><path d="M9 10v8"></path><path d="M15 10v8"></path><path d="M19 10v8"></path><path d="M3 20h18"></path>',
        'wheat' => '<path d="M12 3v18"></path><path d="M8 6c2 0 4-2 4-4"></path><path d="M16 6c-2 0-4-2-4-4"></path><path d="M8 11c2 0 4-2 4-4"></path><path d="M16 11c-2 0-4-2-4-4"></path><path d="M8 16c2 0 4-2 4-4"></path><path d="M16 16c-2 0-4-2-4-4"></path>',
        'beach' => '<path d="M4 20h16"></path><path d="M6 20c1-4 4-7 8-8"></path><path d="M12 12V6"></path><path d="M12 6c3 0 5 2 6 5"></path><path d="M12 6c-3 0-5 2-6 5"></path><path d="M16 20v-4"></path>',
        'volcano' => '<path d="M3 20h18"></path><path d="m6 20 4-10 2 4 2-6 4 12"></path><path d="M13 4c0 1 1 2 2 3"></path>',
        'music' => '<path d="M9 18V7l10-2v11"></path><circle cx="6" cy="18" r="3"></circle><circle cx="16" cy="16" r="3"></circle>',
        'heart' => '<path d="m12 20-1.5-1.3C5 13.9 2 11.1 2 7.7 2 5 4 3 6.6 3c1.7 0 3.4.8 4.4 2.1C12 3.8 13.7 3 15.4 3 18 3 20 5 20 7.7c0 3.4-3 6.2-8.5 11L12 20Z"></path>',
        'drop' => '<path d="M12 3s6 6.2 6 11a6 6 0 1 1-12 0c0-4.8 6-11 6-11Z"></path>',
        'pencil' => '<path d="m4 20 4.5-1 9-9-3.5-3.5-9 9L4 20Z"></path><path d="m13 6 3.5 3.5"></path>',
        'chart' => '<path d="M4 20h16"></path><path d="M7 16v-4"></path><path d="M12 16V8"></path><path d="M17 16v-7"></path>',
        'bug' => '<path d="M9 9h6"></path><path d="M10 4h4"></path><path d="M12 4v16"></path><path d="M7 8 4 6"></path><path d="m17 8 3-2"></path><path d="M7 12H3"></path><path d="M21 12h-4"></path><path d="m7 16-3 2"></path><path d="m17 16 3 2"></path><rect x="7" y="7" width="10" height="10" rx="5"></rect>',
        'waves' => '<path d="M3 14c1.5 1 3 1 4.5 0s3-1 4.5 0 3 1 4.5 0 3-1 4.5 0"></path><path d="M3 18c1.5 1 3 1 4.5 0s3-1 4.5 0 3 1 4.5 0 3-1 4.5 0"></path><path d="M8 10c1.5-2 3-3 4-3s2.5 1 4 3"></path>',
        'compass' => '<circle cx="12" cy="12" r="9"></circle><path d="m15.5 8.5-2.4 7-7 2.4 2.4-7 7-2.4Z"></path>',
        'sparkle' => '<path d="M12 3 13.8 8.2 19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8L12 3Z"></path>',
        'eye' => '<path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"></path><circle cx="12" cy="12" r="2.5"></circle>',
    ];

    return $icons[ $name ] ?? $icons['compass'];
}

/**
 * Render a local SVG icon.
 *
 * @param string $name  Icon name or alias.
 * @param string $class Extra CSS classes.
 * @param string $label Optional accessible label.
 * @return string
 */
function ukiyo_icon( $name, $class = '', $label = '' ) {
    $normalized = ukiyo_normalize_icon_name( $name );
    $markup     = ukiyo_get_icon_markup( $normalized );
    $classes    = trim( 'ukiyo-icon ' . $class );
    $label      = trim( (string) $label );
    $aria       = $label !== '' ? ' role="img" aria-label="' . esc_attr( $label ) . '"' : ' aria-hidden="true"';
    $title      = $label !== '' ? '<title>' . esc_html( $label ) . '</title>' : '';

    return sprintf(
        '<svg class="%1$s" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em" height="1em" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" focusable="false"%2$s>%3$s%4$s</svg>',
        esc_attr( $classes ),
        $aria,
        $title,
        $markup
    );
}
