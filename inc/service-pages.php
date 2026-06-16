<?php
/**
 * Service landing page content for the reusable service template.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukiyo_get_service_pages() {
    $theme_uri = get_template_directory_uri();

    return [
        'viajes-a-medida' => [
            'route_key'   => 'service_custom_travel',
            'title'       => 'Servicio de viajes a medida: cómo lo diseñamos | UKIYO',
            'description' => 'Cómo diseñamos viajes a medida en UKIYO: qué incluye el servicio, plazos, precio orientativo y cómo se desarrolla la propuesta personalizada paso a paso.',
            'image'       => $theme_uri . '/images/heroimages/viajes-personalizados-ukiyo-costaricatucan.webp',
            'eyebrow'     => 'Viajes personalizados',
            'h1'          => 'Viajes a medida y personalizados',
            'lead'        => 'Diseñamos rutas desde cero para que el viaje encaje contigo: tus fechas, tu ritmo, tus intereses y la forma en la que te gusta descubrir un destino.',
            'intro'       => 'No partimos de un paquete cerrado. Escuchamos qué buscas, te orientamos con honestidad y construimos una propuesta clara para viajar con calma, intención y apoyo experto.',
            'primary_cta' => 'Empezar mi viaje a medida',
            'highlights'  => [
                'Ruta privada y flexible, sin itinerarios de catálogo.',
                'Destinos que conocemos de primera mano.',
                'Acompañamiento antes y durante el viaje.',
            ],
            'features'    => [
                [
                    'title' => 'Escucha y criterio',
                    'copy'  => 'Primero entendemos cómo quieres viajar. Después te decimos qué encaja, qué conviene evitar y dónde merece la pena invertir tiempo.',
                ],
                [
                    'title' => 'Itinerario claro',
                    'copy'  => 'Recibes una ruta ordenada, con alojamientos, experiencias y tiempos pensados para que el viaje fluya sin prisas innecesarias.',
                ],
                [
                    'title' => 'Ajustes contigo',
                    'copy'  => 'Afinamos la propuesta hasta que tenga sentido para ti. El viaje no se cierra hasta que la ruta está bien equilibrada.',
                ],
            ],
            'steps'       => [
                'Nos cuentas fechas, presupuesto, destinos e intereses.',
                'Preparamos una propuesta inicial con ruta y recomendaciones.',
                'Ajustamos alojamientos, ritmo y experiencias.',
                'Te acompañamos con la parte práctica antes de viajar.',
            ],
            'destinations' => [
                'Costa Rica para naturaleza y fauna.',
                'Indonesia para cultura, islas y volcanes.',
                'Marruecos para medinas, desierto y alojamientos con carácter.',
                'Colombia para Caribe, café, selva y ciudades vivas.',
            ],
            'faqs'        => [
                [
                    'question' => '¿El viaje está completamente personalizado?',
                    'answer'   => 'Sí. Partimos de tus fechas, presupuesto, ritmo y prioridades. Podemos inspirarnos en rutas anteriores, pero no vendemos un viaje cerrado.',
                ],
                [
                    'question' => '¿Puedo viajar en pareja, familia o con amigos?',
                    'answer'   => 'Sí. Adaptamos la ruta al tipo de viaje, edades, nivel de actividad y estilo de alojamiento que mejor encaje.',
                ],
                [
                    'question' => '¿Trabajáis todos los destinos?',
                    'answer'   => 'No. Priorizamos destinos que conocemos y podemos diseñar con criterio real.',
                ],
            ],
        ],
        'viajes-de-novios' => [
            'route_key'   => 'service_honeymoon',
            'title'       => 'Viajes de novios a medida | UKIYO',
            'description' => 'Viajes de novios a medida, diseñados con calma, privacidad y experiencias especiales para una luna de miel única.',
            'image'       => $theme_uri . '/images/heroimages/viajes-autor-ukiyo-viajeros2.webp',
            'eyebrow'     => 'Luna de miel',
            'h1'          => 'Viajes de novios personalizados',
            'lead'        => 'Diseñamos lunas de miel con buen ritmo, alojamientos cuidados y momentos especiales sin convertir el viaje en una lista interminable de planes.',
            'intro'       => 'Un viaje de novios necesita equilibrio: tiempo para descansar, lugares con encanto y experiencias que encajen con vuestra forma de viajar.',
            'primary_cta' => 'Diseñar nuestra luna de miel',
            'highlights'  => [
                'Rutas pensadas para dos, con tiempo real para disfrutar.',
                'Alojamientos con encanto y buena ubicación.',
                'Combinaciones de naturaleza, cultura, playa o aventura suave.',
            ],
            'features'    => [
                [
                    'title' => 'Ritmo cuidado',
                    'copy'  => 'Evitamos viajes sobrecargados. Buscamos que cada etapa tenga sentido y que haya espacio para descansar.',
                ],
                [
                    'title' => 'Detalles bien elegidos',
                    'copy'  => 'Seleccionamos alojamientos, traslados y experiencias que sumen al viaje sin hacerlo rígido.',
                ],
                [
                    'title' => 'Destinos con contraste',
                    'copy'  => 'Podemos combinar selva y playa, ciudad y naturaleza, o aventura y calma según lo que os apetezca.',
                ],
            ],
            'steps'       => [
                'Definimos fechas, duración y estilo de viaje.',
                'Elegimos destinos y ritmo de ruta.',
                'Proponemos alojamientos y experiencias especiales.',
                'Ajustamos el viaje hasta que encaje con vosotros.',
            ],
            'destinations' => [
                'Indonesia y Bali para cultura, villas y mar.',
                'Costa Rica para naturaleza, fauna y descanso.',
                'Colombia para Caribe, café y ciudades con ambiente.',
                'Italia o Lanzarote para una luna de miel más cercana.',
            ],
            'faqs'        => [
                [
                    'question' => '¿Con cuánta antelación conviene organizarlo?',
                    'answer'   => 'Lo ideal es empezar varios meses antes, sobre todo si viajáis en temporada alta o queréis alojamientos concretos.',
                ],
                [
                    'question' => '¿Podéis combinar varios destinos?',
                    'answer'   => 'Sí, siempre que la combinación tenga sentido por tiempos, vuelos y ritmo de viaje.',
                ],
                [
                    'question' => '¿El viaje puede ser tranquilo y no muy activo?',
                    'answer'   => 'Sí. Ajustamos la intensidad para que haya equilibrio entre descubrir y descansar.',
                ],
            ],
        ],
        'viajes-en-grupo' => [
            'route_key'   => 'service_group_travel',
            'title'       => 'Viajes en grupo reducido | UKIYO',
            'description' => 'Viajes en grupo reducido diseñados con criterio experto, rutas cuidadas y experiencias compartidas sin masificación.',
            'image'       => $theme_uri . '/images/heroimages/viajes-personalizados-ukiyo-indonesia.webp',
            'eyebrow'     => 'Grupos reducidos',
            'h1'          => 'Viajes en grupo reducido',
            'lead'        => 'Organizamos viajes para grupos pequeños que quieren compartir ruta sin perder cuidado, flexibilidad ni una forma tranquila de descubrir el destino.',
            'intro'       => 'Puede ser un grupo privado de amigos, una familia amplia o una salida de autor con plazas limitadas. La clave es mantener el grupo manejable y la ruta bien pensada.',
            'primary_cta' => 'Consultar viaje en grupo',
            'secondary_cta' => [
                'label' => 'Ver viajes de autor',
                'route' => 'viajes_autor',
            ],
            'highlights'  => [
                'Grupos pequeños, con logística clara.',
                'Rutas con tiempo suficiente en cada lugar.',
                'Opción de grupo privado o salida de autor.',
            ],
            'features'    => [
                [
                    'title' => 'Sin masificación',
                    'copy'  => 'Priorizamos grupos reducidos para cuidar la experiencia, los tiempos y la relación con el destino.',
                ],
                [
                    'title' => 'Logística ordenada',
                    'copy'  => 'Coordinamos ruta, alojamientos y traslados para que el grupo viaje con una estructura clara.',
                ],
                [
                    'title' => 'Dos formatos',
                    'copy'  => 'Podemos diseñar un viaje privado para vuestro grupo o proponeros una salida de autor publicada.',
                ],
            ],
            'steps'       => [
                'Definimos tamaño del grupo, fechas e intereses.',
                'Elegimos el formato: privado o salida de autor.',
                'Diseñamos ruta, alojamientos y dinámica del viaje.',
                'Cerramos detalles prácticos para todos los viajeros.',
            ],
            'destinations' => [
                'Marruecos para rutas privadas y grupos con guía local.',
                'Costa Rica para naturaleza y fauna.',
                'Indonesia para cultura, islas y aventura suave.',
                'Colombia para una ruta variada entre ciudad, café y Caribe.',
            ],
            'faqs'        => [
                [
                    'question' => '¿Cuál es el tamaño ideal del grupo?',
                    'answer'   => 'Depende del destino, pero trabajamos mejor con grupos pequeños, donde la logística y el ritmo se pueden cuidar.',
                ],
                [
                    'question' => '¿Es lo mismo que un viaje de autor?',
                    'answer'   => 'No siempre. Un viaje de autor tiene fechas y enfoque propios. Un viaje en grupo privado se diseña para vuestro grupo.',
                ],
                [
                    'question' => '¿Podemos pedir una ruta privada para amigos o familia?',
                    'answer'   => 'Sí. Es una de las formas más habituales de trabajar este servicio.',
                ],
            ],
        ],
        'viajes-privados' => [
            'route_key'   => 'service_private',
            'title'       => 'Viajes privados y exclusivos | UKIYO',
            'description' => 'Viajes privados y exclusivos diseñados a medida, con ruta flexible, alojamientos cuidados y acompañamiento experto.',
            'image'       => $theme_uri . '/images/heroimages/viajes-personalizados-ukiyo-marruecos.webp',
            'eyebrow'     => 'Viajes privados',
            'h1'          => 'Viajes privados diseñados a medida',
            'lead'        => 'Diseñamos viajes privados para quienes quieren una ruta propia, con flexibilidad, buen acompañamiento y decisiones cuidadas en cada etapa.',
            'intro'       => 'Un viaje privado no significa hacerlo todo más complejo. Significa tener una ruta pensada para vosotros, sin depender de salidas cerradas ni ritmos ajenos.',
            'primary_cta' => 'Diseñar un viaje privado',
            'highlights'  => [
                'Ruta propia, sin grupo abierto.',
                'Flexibilidad de fechas, ritmo y alojamientos.',
                'Ideal para parejas, familias, amigos o celebraciones.',
            ],
            'features'    => [
                [
                    'title' => 'Privacidad real',
                    'copy'  => 'La ruta se organiza para vuestro grupo, con margen para adaptar tiempos, alojamientos y experiencias.',
                ],
                [
                    'title' => 'Acompañamiento experto',
                    'copy'  => 'Os ayudamos a tomar buenas decisiones antes de viajar y a resolver dudas durante el proceso.',
                ],
                [
                    'title' => 'Viaje con intención',
                    'copy'  => 'Buscamos una ruta coherente, sin rellenar días ni forzar actividades que no encajan.',
                ],
            ],
            'steps'       => [
                'Entendemos quién viaja y qué necesitáis.',
                'Definimos destino, ritmo y nivel de acompañamiento.',
                'Preparamos una ruta privada con opciones claras.',
                'Ajustamos cada detalle antes de cerrar el viaje.',
            ],
            'destinations' => [
                'Marruecos para desierto, medinas y guía local.',
                'Colombia para una ruta privada muy variada.',
                'Costa Rica para naturaleza con logística cuidada.',
                'Indonesia para islas, cultura y alojamientos especiales.',
            ],
            'faqs'        => [
                [
                    'question' => '¿Un viaje privado implica guía todo el tiempo?',
                    'answer'   => 'No necesariamente. Puede incluir guías puntuales, acompañamiento local o solo una ruta privada bien organizada.',
                ],
                [
                    'question' => '¿Es adecuado para familias?',
                    'answer'   => 'Sí. Adaptamos ritmo, alojamientos y actividades a edades, intereses y necesidades concretas.',
                ],
                [
                    'question' => '¿Podemos elegir fechas?',
                    'answer'   => 'Sí. Esa es una de las principales ventajas frente a una salida cerrada.',
                ],
            ],
        ],
    ];
}

function ukiyo_get_english_service_page_data( $slug = '' ) {
    $theme_uri = get_template_directory_uri();

    $pages = [
        'tailor-made-travel' => [
            'route_key'   => 'service_custom_travel',
            'title'       => 'Tailor-made travel designed around you | UKIYO',
            'description' => 'Private tailor-made trips designed with care, local insight and first-hand knowledge by UKIYO.',
            'image'       => $theme_uri . '/images/heroimages/viajes-personalizados-ukiyo-costaricatucan.webp',
            'eyebrow'     => 'Tailor-made travel',
            'h1'          => 'Tailor-made and personal trips',
            'lead'        => 'We design routes from scratch so the journey fits your dates, rhythm, interests and way of discovering a destination.',
            'intro'       => 'We do not start from a closed package. We listen to what you are looking for, guide you honestly and build a clear proposal for traveling with calm, intention and expert support.',
            'primary_cta' => 'Start my tailor-made trip',
            'highlights'  => [
                'A private, flexible route, without catalogue itineraries.',
                'Destinations we know first-hand.',
                'Support before and during the trip.',
            ],
            'features'    => [
                [ 'title' => 'Listening and judgement', 'copy' => 'First we understand how you want to travel. Then we explain what fits, what is worth avoiding and where it makes sense to invest time.' ],
                [ 'title' => 'A clear itinerary', 'copy' => 'You receive an ordered route with stays, experiences and timings designed so the trip flows without unnecessary rush.' ],
                [ 'title' => 'Adjustments with you', 'copy' => 'We refine the proposal until it makes sense for you. The trip is not closed until the route feels balanced.' ],
            ],
            'steps'       => [
                'You tell us your dates, budget, destinations and interests.',
                'We prepare an initial proposal with route and recommendations.',
                'We adjust stays, rhythm and experiences.',
                'We support you with the practical details before traveling.',
            ],
            'destinations' => [
                'Costa Rica for nature and wildlife.',
                'Indonesia for culture, islands and volcanoes.',
                'Morocco for medinas, desert and characterful stays.',
                'Colombia for Caribbean coast, coffee region, rainforest and lively cities.',
            ],
            'faqs'        => [
                [ 'question' => 'Is the trip fully personalized?', 'answer' => 'Yes. We start from your dates, budget, rhythm and priorities. We can take inspiration from previous routes, but we do not sell a closed trip.' ],
                [ 'question' => 'Can I travel as a couple, family or with friends?', 'answer' => 'Yes. We adapt the route to the type of trip, ages, activity level and accommodation style that fits best.' ],
                [ 'question' => 'Do you work with every destination?', 'answer' => 'No. We prioritize destinations we know and can design with real judgement.' ],
            ],
        ],
        'honeymoon-travel' => [
            'route_key'   => 'service_honeymoon',
            'title'       => 'Tailor-made honeymoon travel | UKIYO',
            'description' => 'Honeymoon trips designed with calm, privacy and meaningful experiences.',
            'image'       => $theme_uri . '/images/heroimages/viajes-autor-ukiyo-viajeros2.webp',
            'eyebrow'     => 'Honeymoon',
            'h1'          => 'Personal honeymoon travel',
            'lead'        => 'We design honeymoons with a careful rhythm, thoughtful stays and special moments without turning the journey into an endless checklist.',
            'intro'       => 'A honeymoon needs balance: time to rest, places with character and experiences that fit the way you like to travel.',
            'primary_cta' => 'Design our honeymoon',
            'highlights'  => [
                'Routes designed for two, with real time to enjoy.',
                'Characterful stays in good locations.',
                'Combinations of nature, culture, beach or soft adventure.',
            ],
            'features'    => [
                [ 'title' => 'A careful rhythm', 'copy' => 'We avoid overloaded trips. Each stage should make sense and leave space to rest.' ],
                [ 'title' => 'Well-chosen details', 'copy' => 'We select stays, transfers and experiences that add to the journey without making it rigid.' ],
                [ 'title' => 'Destinations with contrast', 'copy' => 'We can combine rainforest and beach, city and nature, or adventure and calm depending on what you want.' ],
            ],
            'steps'       => [
                'We define dates, duration and travel style.',
                'We choose destinations and route rhythm.',
                'We propose stays and special experiences.',
                'We adjust the trip until it fits both of you.',
            ],
            'destinations' => [
                'Indonesia and Bali for culture, villas and sea.',
                'Costa Rica for nature, wildlife and rest.',
                'Colombia for Caribbean coast, coffee and lively cities.',
                'Italy or Lanzarote for a closer honeymoon.',
            ],
            'faqs'        => [
                [ 'question' => 'How far in advance should we organize it?', 'answer' => 'Ideally several months ahead, especially if you travel in high season or want specific stays.' ],
                [ 'question' => 'Can you combine several destinations?', 'answer' => 'Yes, as long as the combination makes sense for timing, flights and travel rhythm.' ],
                [ 'question' => 'Can the trip be calm and not too active?', 'answer' => 'Yes. We adjust the intensity so there is balance between discovering and resting.' ],
            ],
        ],
        'small-group-trips' => [
            'route_key'   => 'service_group_travel',
            'title'       => 'Small group trips with UKIYO',
            'description' => 'Small group trips with limited departures, careful routes and shared experiences without mass tourism.',
            'image'       => $theme_uri . '/images/heroimages/viajes-personalizados-ukiyo-indonesia.webp',
            'eyebrow'     => 'Small groups',
            'h1'          => 'Small group trips',
            'lead'        => 'We organize trips for small groups who want to share a route without losing care, flexibility or a calmer way of discovering the destination.',
            'intro'       => 'It can be a private group of friends, a larger family or a signature trip with limited places. The key is keeping the group manageable and the route well designed.',
            'primary_cta' => 'Ask about a group trip',
            'secondary_cta' => [ 'label' => 'View signature trips', 'route' => 'viajes_autor' ],
            'highlights'  => [
                'Small groups with clear logistics.',
                'Routes with enough time in each place.',
                'Private group or published signature departure.',
            ],
            'features'    => [
                [ 'title' => 'No mass tourism', 'copy' => 'We prioritize small groups to care for the experience, timing and relationship with the destination.' ],
                [ 'title' => 'Organized logistics', 'copy' => 'We coordinate route, stays and transfers so the group travels with a clear structure.' ],
                [ 'title' => 'Two formats', 'copy' => 'We can design a private trip for your group or suggest a published signature departure.' ],
            ],
            'steps'       => [
                'We define group size, dates and interests.',
                'We choose the format: private or signature departure.',
                'We design route, stays and group dynamics.',
                'We close the practical details for all travelers.',
            ],
            'destinations' => [
                'Morocco for private routes and groups with a local guide.',
                'Costa Rica for nature and wildlife.',
                'Indonesia for culture, islands and soft adventure.',
                'Colombia for a varied route between city, coffee and Caribbean coast.',
            ],
            'faqs'        => [
                [ 'question' => 'What is the ideal group size?', 'answer' => 'It depends on the destination, but we work best with small groups where logistics and rhythm can be cared for.' ],
                [ 'question' => 'Is it the same as a signature trip?', 'answer' => 'Not always. A signature trip has its own dates and focus. A private group trip is designed for your group.' ],
                [ 'question' => 'Can we request a private route for friends or family?', 'answer' => 'Yes. It is one of the most common ways we work with this service.' ],
            ],
        ],
        'private-trips' => [
            'route_key'   => 'service_private',
            'title'       => 'Private tailor-made trips | UKIYO',
            'description' => 'Private trips designed around your group, with a flexible route and expert support.',
            'image'       => $theme_uri . '/images/heroimages/viajes-personalizados-ukiyo-marruecos.webp',
            'eyebrow'     => 'Private trips',
            'h1'          => 'Private trips designed around you',
            'lead'        => 'We design private trips for travelers who want their own route, flexibility, good support and careful decisions at every stage.',
            'intro'       => 'A private trip does not mean making everything more complicated. It means having a route designed for you, without depending on fixed departures or someone else’s rhythm.',
            'primary_cta' => 'Design a private trip',
            'highlights'  => [
                'Your own route, without an open group.',
                'Flexible dates, rhythm and stays.',
                'Ideal for couples, families, friends or celebrations.',
            ],
            'features'    => [
                [ 'title' => 'Real privacy', 'copy' => 'The route is organized for your group, with room to adapt timings, stays and experiences.' ],
                [ 'title' => 'Expert support', 'copy' => 'We help you make good decisions before traveling and resolve questions during the process.' ],
                [ 'title' => 'A trip with intention', 'copy' => 'We look for a coherent route, without filler days or activities that do not fit.' ],
            ],
            'steps'       => [
                'We understand who is traveling and what you need.',
                'We define destination, rhythm and support level.',
                'We prepare a private route with clear options.',
                'We adjust each detail before closing the trip.',
            ],
            'destinations' => [
                'Morocco for desert, medinas and local guiding.',
                'Colombia for a varied private route.',
                'Costa Rica for nature with careful logistics.',
                'Indonesia for islands, culture and special stays.',
            ],
            'faqs'        => [
                [ 'question' => 'Does a private trip mean having a guide all the time?', 'answer' => 'Not necessarily. It can include specific guides, local support or simply a well-organized private route.' ],
                [ 'question' => 'Is it suitable for families?', 'answer' => 'Yes. We adapt rhythm, stays and activities to ages, interests and specific needs.' ],
                [ 'question' => 'Can we choose our dates?', 'answer' => 'Yes. That is one of the main advantages compared with a fixed departure.' ],
            ],
        ],
    ];

    return isset( $pages[ $slug ] ) ? $pages[ $slug ] : null;
}

function ukiyo_get_service_page_data( $slug = '' ) {
    $slug = sanitize_title( (string) $slug );
    $pages = ukiyo_get_service_pages();

    $english_page = ukiyo_get_english_service_page_data( $slug );
    if ( is_array( $english_page ) ) {
        return $english_page;
    }

    return isset( $pages[ $slug ] ) ? $pages[ $slug ] : null;
}
