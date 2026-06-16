<?php
/**
 * Definiciones de feedback manual para viajes no cargados en el portal.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_portal_get_manual_feedback_trips() {
    static $trips = null;

    if ( null !== $trips ) {
        return $trips;
    }

    $trips = [
        'costa-rica-panama-marzo-2026' => [
            'title'          => 'Costa Rica (15 días) con Panamá',
            'destination'    => 'Costa Rica y Panamá',
            'dates'          => '17 al 31 de marzo de 2026',
            'travelers'      => implode(
                "\n",
                [
                    'Estefanía Lázaro Prudencio',
                    'María Macarena García Díaz',
                    'Francisco Javier Martín Pelayos',
                    'Francisco Javier Gomez Espinosa',
                ]
            ),
            'hero_image_url' => get_template_directory_uri() . '/images/destination-mood/viajes-personalizados-ukiyo-portada.webp',
            'itinerary'      => [
                [
                    'place'      => 'Puerto Viejo',
                    'stay_days'  => 3,
                    'days'       => [
                        [
                            'day_number' => 17,
                            'title'      => 'Llegada a Puerto Viejo',
                        ],
                        [
                            'day_number' => 18,
                            'title'      => 'Parque Nacional de Cahuita',
                        ],
                        [
                            'day_number' => 19,
                            'title'      => 'Salida hacia Bocas del Toro',
                        ],
                    ],
                ],
                [
                    'place'      => 'Bocas del Toro',
                    'stay_days'  => 4,
                    'days'       => [
                        [
                            'day_number' => 19,
                            'title'      => 'Bioluminiscencia',
                        ],
                        [
                            'day_number' => 20,
                            'title'      => 'Cayo Zapatilla y snorkel',
                        ],
                        [
                            'day_number' => 21,
                            'title'      => 'Isla Pájaro y Playa Estrella',
                        ],
                        [
                            'day_number' => 22,
                            'title'      => 'Regreso a Puerto Viejo',
                        ],
                    ],
                ],
                [
                    'place'      => 'Tortuguero',
                    'stay_days'  => 3,
                    'days'       => [
                        [
                            'day_number' => 23,
                            'title'      => 'Llegada a Tortuguero',
                        ],
                        [
                            'day_number' => 24,
                            'title'      => 'Canales y fauna de Tortuguero',
                        ],
                        [
                            'day_number' => 24,
                            'title'      => 'Sendero Jaguar',
                        ],
                        [
                            'day_number' => 25,
                            'title'      => 'Salida hacia Bajos del Toro Amarillo',
                        ],
                    ],
                ],
                [
                    'place'      => 'Bajos del Toro Amarillo',
                    'stay_days'  => 2,
                    'days'       => [
                        [
                            'day_number' => 25,
                            'title'      => 'Llegada y tarde libre',
                        ],
                        [
                            'day_number' => 26,
                            'title'      => 'Cañón Jurásico',
                        ],
                    ],
                ],
                [
                    'place'      => 'Monteverde',
                    'stay_days'  => 3,
                    'days'       => [
                        [
                            'day_number' => 26,
                            'title'      => 'Llegada y tarde tranquila',
                        ],
                        [
                            'day_number' => 27,
                            'title'      => 'Bosque Nuboso Monteverde',
                        ],
                        [
                            'day_number' => 27,
                            'title'      => '100% Aventura canopy y Tarzán',
                        ],
                    ],
                ],
                [
                    'place'      => 'Bahía Drake (Corcovado)',
                    'stay_days'  => 3,
                    'days'       => [
                        [
                            'day_number' => 28,
                            'title'      => 'Llegada y ruta nocturna por la selva',
                        ],
                        [
                            'day_number' => 29,
                            'title'      => 'Estación Sirena',
                        ],
                        [
                            'day_number' => 30,
                            'title'      => 'Salida hacia San Gerardo de Dota',
                        ],
                    ],
                ],
                [
                    'place'      => 'San Gerardo de Dota',
                    'stay_days'  => 2,
                    'days'       => [
                        [
                            'day_number' => 30,
                            'title'      => 'Llegada y paseo por el valle del Savegre',
                        ],
                        [
                            'day_number' => 31,
                            'title'      => 'Cierre del viaje y entorno del Savegre',
                        ],
                    ],
                ],
            ],
            'recommendations' => [
                [
                    'place' => 'Puerto Viejo',
                    'name'  => 'Conducir con calma por el cruce de animales',
                ],
                [
                    'place' => 'Puerto Viejo',
                    'name'  => 'Llevar efectivo a mano',
                ],
                [
                    'place' => 'Puerto Viejo',
                    'name'  => 'Respetar la fauna y no alimentar animales',
                ],
                [
                    'place' => 'Puerto Viejo',
                    'name'  => 'Entrar en Cahuita a primera hora',
                ],
                [
                    'place' => 'Bocas del Toro',
                    'name'  => 'Protegerse bien del sol',
                ],
                [
                    'place' => 'Bocas del Toro',
                    'name'  => 'Llevar efectivo para islas pequeñas y playas alejadas',
                ],
                [
                    'place' => 'Bocas del Toro',
                    'name'  => 'Respetar la fauna marina',
                ],
                [
                    'place' => 'Tortuguero',
                    'name'  => 'Llevar ropa ligera y de secado rápido',
                ],
                [
                    'place' => 'Tortuguero',
                    'name'  => 'Asumir la humedad como parte de la experiencia',
                ],
                [
                    'place' => 'Tortuguero',
                    'name'  => 'Observar y escuchar la fauna con calma',
                ],
                [
                    'place' => 'Bajos del Toro Amarillo',
                    'name'  => 'Llevar calzado con buen agarre',
                ],
                [
                    'place' => 'Bajos del Toro Amarillo',
                    'name'  => 'Llevar ropa de abrigo ligera',
                ],
                [
                    'place' => 'Bajos del Toro Amarillo',
                    'name'  => 'Respetar senderos y zonas marcadas',
                ],
                [
                    'place' => 'Monteverde',
                    'name'  => 'Llevar ropa de abrigo ligera',
                ],
                [
                    'place' => 'Monteverde',
                    'name'  => 'Llevar impermeable siempre a mano',
                ],
                [
                    'place' => 'Monteverde',
                    'name'  => 'Usar calzado cerrado y antideslizante',
                ],
                [
                    'place' => 'Monteverde',
                    'name'  => 'Ir a primera hora para ver más vida en el bosque',
                ],
                [
                    'place' => 'Bahía Drake (Corcovado)',
                    'name'  => 'Asumir que el confort pasa a segundo plano',
                ],
                [
                    'place' => 'Bahía Drake (Corcovado)',
                    'name'  => 'Mantener respeto absoluto por la fauna',
                ],
                [
                    'place' => 'Bahía Drake (Corcovado)',
                    'name'  => 'Escuchar siempre al guía en Corcovado',
                ],
                [
                    'place' => 'San Gerardo de Dota',
                    'name'  => 'Llevar ropa de abrigo para la noche',
                ],
                [
                    'place' => 'San Gerardo de Dota',
                    'name'  => 'Madrugar si queríais buscar el quetzal',
                ],
                [
                    'place' => 'San Gerardo de Dota',
                    'name'  => 'Disfrutar del silencio y caminar por el entorno sin prisa',
                ],
            ],
        ],
    ];

    return $trips;
}

function ukiyo_portal_get_manual_feedback_trip( $slug ) {
    $slug  = sanitize_title( (string) $slug );
    $trips = ukiyo_portal_get_manual_feedback_trips();

    return isset( $trips[ $slug ] ) ? $trips[ $slug ] : null;
}

function ukiyo_portal_get_manual_feedback_trip_options() {
    $options = [];

    foreach ( ukiyo_portal_get_manual_feedback_trips() as $slug => $trip ) {
        $options[ $slug ] = isset( $trip['title'] ) ? (string) $trip['title'] : $slug;
    }

    return $options;
}
