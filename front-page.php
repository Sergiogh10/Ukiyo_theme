<?php
/**
 * Template: Front Page (Inicio)
 * Muestra la homepage estática de UKIYO
 */

get_header(); ?>

<main>

    <!-- HERO: VIAJES PERSONALIZADOS COMO PRODUCTO PRINCIPAL -->
    <section class="relative h-screen overflow-hidden">
        <!-- Fondo -->
        <div class="absolute inset-0 w-full h-full">
            <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-a-indonesia-personalizados-nusa-penida.jpg" 
                 alt="Artesano tradicional trabajando" 
                 class="w-full h-full object-cover" loading="lazy"
                 onerror="this.src='https://images.pexels.com/photos/1450360/pexels-photo-1450360.jpeg?auto=compress&cs=tinysrgb&w=2940&h=1960&dpr=2'; this.onerror=null;" />
            <div class="absolute inset-0 bg-gradient-to-r from-primary-900/70 via-primary-800/50 to-transparent"></div>
        </div>

        <!-- Contenido Hero -->
        <div class="relative z-10 h-full flex items-center">
            <div class="container mx-auto px-6">
                <div class="max-w-3xl">
                    <h1 class="text-hero font-satoshi text-white mb-6 text-shadow-soft animate-fade-in">
                        Viajes personalizados<br />
                        que <span class="text-accent-300">te mueven por dentro</span>
                    </h1>
                    <p class="text-xl text-white/90 mb-8 max-w-2xl leading-relaxed animate-slide-up">
                        Diseñamos contigo un viaje a medida, lejos del turismo masivo.
                        Rutas pensadas al detalle, alojamientos con alma y personas locales que te enseñan su mundo de verdad.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 animate-slide-up">
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="btn-secondary text-lg px-8 py-4">
                            Diseña tu viaje a medida
                        </a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" class="bg-white/20 backdrop-blur-sm text-white px-8 py-4 rounded-lg font-semibold hover:bg-white/30 transition-all duration-300">
                            Ver viajes de autor
                        </a>
                    </div>
                    <p class="mt-4 text-sm text-white/70">
                        ¿Prefieres leer experiencias reales primero? 
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" class="underline hover:text-white">Descubre las reseñas de viajeros</a>.
                    </p>
                </div>
            </div>
        </div>

        <!-- Indicador scroll -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white/70 animate-bounce">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    <!-- SECCIÓN: VIAJES PERSONALIZADOS (EXPLICACIÓN + PASOS) -->
    <section class="py-20 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid gap-12 lg:grid-cols-2 items-center">
                <!-- Texto principal -->
                <div>
                    <h2 class="text-display font-satoshi text-text-primary mb-4">
                        Viajes personalizados<br><span class="text-secondary">diseñados contigo</span>
                    </h2>
                    <p class="text-lg text-text-secondary mb-6">
                        No vendemos paquetes cerrados. Escuchamos lo que te mueve y, a partir de ahí,
                        construimos una ruta que encaje con tu ritmo, tu presupuesto y tu forma de viajar.
                    </p>
                    <ul class="space-y-3 text-text-secondary">
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Asesoría honesta:</strong> te contamos qué merece la pena y qué no, sin turistas en masa.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Alojamientos con alma:</strong> pequeños hoteles, lodges y casas locales que suman al viaje.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Contacto cercano:</strong> estamos contigo antes y durante el viaje por si algo se tuerce.</span>
                        </li>
                    </ul>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="btn-secondary">
                            Empezar mi viaje a medida
                        </a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" class="btn-secondary">
                            Ver ideas de viaje
                        </a>
                    </div>
                </div>

                <!-- Pasos / proceso -->
                <div class="space-y-6">
                    <div class="card flex gap-4 items-start">
                        <div class="w-10 h-10 rounded-full bg-secondary-100 flex items-center justify-center text-secondary font-semibold">1</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Cuéntanos qué te apetece</h3>
                            <p class="text-text-secondary text-sm">
                                Un breve formulario o una videollamada donde nos hablas de ti, tus fechas, tu presupuesto y cómo te gusta viajar.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start">
                        <div class="w-10 h-10 rounded-full bg-secondary-100 flex items-center justify-center text-secondary font-semibold">2</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Diseñamos tu ruta ideal</h3>
                            <p class="text-text-secondary text-sm">
                                Te proponemos un itinerario claro, con opciones de actividades y alojamientos. Lo afinamos juntos hasta que encaje contigo.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start">
                        <div class="w-10 h-10 rounded-full bg-secondary-100 flex items-center justify-center text-secondary font-semibold">3</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Reservas seguras y acompañamiento</h3>
                            <p class="text-text-secondary text-sm">
                                Te ayudamos con la parte práctica y nos quedamos al otro lado del WhatsApp durante el viaje. Tú solo te ocupas de vivirlo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NAVEGACIÓN POR EMOCIONES (APOYO A VIAJES PERSONALIZADOS) -->
    <section class="py-20 bg-gradient-warm">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-display font-satoshi text-text-primary mb-4">
                    Estos son nuestros <span class="text-primary">destinos</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    Cada uno nos despertó algo distinto. Recorridos por completo para ofrecerte la mejor experiencia de viaje. Viajar sin preocupaciones nunca ha sido tan fácil.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Indonesia -->
                <div class="group cursor-pointer" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('indonesia') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/indonesia/viajes-personalizados-ukiyo-artesano-balines.jpg"
                            alt="Artesano balinés trabajando en un taller local"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Indonesia</h3>
                            <p class="text-white/80 text-sm">Tradiciones vivas, templos y ceremonias. Ideal si buscas un viaje con mucha profundidad cultural.</p>
                        </div>
                    </div>
                </div>

                <!-- Costa Rica -->
                <div class="group cursor-pointer" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('costarica') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/costarica/viajes-personalizados-ukiyo-guacamayo.jpg"
                            alt="Guacamayo observado en la selva tropical durante un viaje personalizado con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-secondary-900/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Costa Rica</h3>
                            <p class="text-white/80 text-sm">Selvas, volcanes y vida salvaje. Perfecto si necesitas parar, respirar y reconectar con la naturaleza.</p>
                        </div>
                    </div>
                </div>

                <!-- Colombia -->
                <div class="group cursor-pointer" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('colombia') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/emotion-based/viajes-personalizados-ukiyo-palanquera.jpg"
                            alt="Palanquera en Cartagena de Indias durante un viaje personalizado a Colombia con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-accent-900/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Colombia</h3>
                            <p class="text-white/80 text-sm">Colores, música y gente que te hace sentir en casa desde el primer día.</p>
                        </div>
                    </div>
                </div>

                <!-- Marruecos -->
                <div class="group cursor-pointer" onclick="window.location.href='<?php echo esc_url( get_permalink( get_page_by_path('marruecos') ) ); ?>'">
                    <div class="relative overflow-hidden rounded-lg aspect-[4/5] mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/marruecos/viajes-personalizados-ukiyo-camello-marruecos.jpg"
                            alt="Camello en el desierto de Merzouga durante un viaje personalizado a Marruecos con Ukiyo"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-700/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-satoshi text-white mb-2">Marruecos</h3>
                            <p class="text-white/80 text-sm">Desierto, medinas y rutas alejadas del turismo de masas. Puro viaje sensorial.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN: VIAJES DE AUTOR (EXPLICACIÓN + PASOS) -->
    <section class="py-20 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid gap-12 lg:grid-cols-2 items-center">

            <!-- Pasos / proceso -->
                <div class="space-y-6">
                    <div class="card flex gap-4 items-start">
                        <div class="w-10 h-10 rounded-full bg-secondary-100 flex items-center justify-center text-secondary font-semibold">1</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Elige tu viaje de autor</h3>
                            <p class="text-text-secondary text-sm">
                                Explora los itinerarios diseñados por personas locales que conocen cada rincón de su destino. Cada viaje tiene su propia personalidad.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start">
                        <div class="w-10 h-10 rounded-full bg-secondary-100 flex items-center justify-center text-secondary font-semibold">2</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Reserva tu plaza</h3>
                            <p class="text-text-secondary text-sm">
                                Los viajes de autor tienen fechas fijas y grupos reducidos. Reservas tu plaza y nosotros nos encargamos de toda la organización.
                            </p>
                        </div>
                    </div>
                    <div class="card flex gap-4 items-start">
                        <div class="w-10 h-10 rounded-full bg-secondary-100 flex items-center justify-center text-secondary font-semibold">3</div>
                        <div>
                            <h3 class="font-semibold text-text-primary mb-1">Viaja con el autor local</h3>
                            <p class="text-text-secondary text-sm">
                                Viajas acompañado por quien diseñó la ruta. Conoce el destino a través de sus ojos, sus historias y sus contactos locales.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Texto principal -->
                <div>
                    <h2 class="text-display font-satoshi text-text-primary mb-4">
                        Viajes de autor<br><span class="text-secondary">creados por locales</span>
                    </h2>
                    <p class="text-lg text-text-secondary mb-6">
                        Itinerarios únicos diseñados por personas que viven en el destino. 
                        No son guías turísticos, son locales apasionados que comparten su mundo contigo.
                    </p>
                    <ul class="space-y-3 text-text-secondary">
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Experiencia auténtica:</strong> conoce el destino desde dentro, con acceso a lugares y personas que solo un local conoce.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Grupos reducidos:</strong> viajes en grupos pequeños para mantener la calidad de la experiencia y el contacto cercano.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-3 h-3 rounded-full bg-secondary mr-3 mt-1"></span>
                            <span><strong>Todo organizado:</strong> solo tienes que presentarte. Nosotros nos ocupamos de alojamientos, traslados y actividades.</span>
                        </li>
                    </ul>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" class="btn-secondary">
                            Ver todos los viajes de autor
                        </a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="btn-secondary">
                            Prefiero un viaje a medida
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NUEVA SECCIÓN: VIAJES DE AUTOR -->
    <section class="py-20 bg-surface">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-display font-satoshi text-text-primary mb-4">
                    Viajes de autor <span class="text-accent">creados por personas locales</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-3xl mx-auto">
                    Si prefieres una ruta ya diseñada, pero con el mismo cuidado y autenticidad, descubre los viajes de autor:
                    itinerarios creados por personas que conocen su destino como la palma de su mano.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <?php
                // Consulta para obtener los 3 últimos viajes de autor publicados
                $args = array(
                    'post_type' => 'viaje_autor',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                
                $viajes_query = new WP_Query($args);
                
                if ($viajes_query->have_posts()) :
                    while ($viajes_query->have_posts()) : $viajes_query->the_post();
                        // Obtener la imagen destacada
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        if (!$thumbnail_url) {
                            $thumbnail_url = get_template_directory_uri() . '/images/placeholder-viaje.jpg';
                        }
                        
                        // Obtener el extracto
                        $excerpt = get_the_excerpt();
                        if (empty($excerpt)) {
                            $excerpt = wp_trim_words(get_the_content(), 20, '...');
                        }
                        
                        // Obtener taxonomías de destino
                        $destinos = get_the_terms(get_the_ID(), 'destino');
                        $destino_text = '';
                        if ($destinos && !is_wp_error($destinos)) {
                            $destino_names = array();
                            foreach ($destinos as $destino) {
                                $destino_names[] = $destino->name;
                            }
                            $destino_text = implode(' · ', $destino_names);
                        }
                        
                        // Obtener campos personalizados
                        $autor_subtitulo = get_post_meta(get_the_ID(), 'autor_subtitulo', true);
                        $duracion = get_post_meta(get_the_ID(), 'duracion_viaje', true);
                        $grupos = get_post_meta(get_the_ID(), 'grupos_viaje', true);
                        $precio_desde = get_post_meta(get_the_ID(), 'precio_desde', true);
                ?>
                <article class="group rounded-2xl border-2 border-black bg-white/80 backdrop-blur-md shadow-sm overflow-hidden flex flex-col">
                    <a href="<?php the_permalink(); ?>">
                        <figure class="aspect-[16/9] overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', [
                                    'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] mask-image',
                                    'loading' => 'lazy',
                                ]); ?>
                            <?php else : ?>
                                <img 
                                    src="<?php echo esc_url($thumbnail_url); ?>"
                                    alt="<?php the_title_attribute(); ?>"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02] mask-image"
                                    loading="lazy"
                                />
                            <?php endif; ?>
                        </figure>
                    </a>

                    <div class="p-6 md:p-7 flex-1 flex flex-col">
                        <div>
                            <h3 class="text-xl font-rowdies">
                                <a href="<?php the_permalink(); ?>" class="text-text-primary hover:text-accent">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <?php if ($autor_subtitulo) : ?>
                                <p class="text-sm text-text-secondary font-satoshi">
                                    <?php echo esc_html($autor_subtitulo); ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <?php if (has_excerpt()) : ?>
                            <p class="mt-4 text-text-secondary">
                                <?php echo get_the_excerpt(); ?>
                            </p>
                        <?php endif; ?>

                        <!-- Meta pills + precio -->
                        <div class="flex items-center justify-between gap-4 py-2 mt-auto">
                            <!-- Pills a la izquierda -->
                            <div class="flex flex-wrap items-center gap-2 text-sm">
                                <?php if ($duracion) : ?>
                                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">
                                        <?php echo esc_html($duracion); ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ($grupos) : ?>
                                    <span class="bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">
                                        <?php echo esc_html($grupos); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Precio a la derecha -->
                            <?php if ($precio_desde) : ?>
                                <div class="text-2xl text-text-secondary whitespace-nowrap">
                                    Desde
                                    <span class="font-semibold text-text-primary">
                                        <?php echo esc_html($precio_desde); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-text-secondary">No hay viajes de autor disponibles en este momento.</p>
                </div>
                <?php endif; ?>
            </div>
            <br>
            <br>
            <div class="text-center mt-10">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" class="btn-secondary">
                    Ver todos los viajes de autor
                </a>
            </div>
        </div>
    </section>

    <!-- REVIEWS: BLOQUE MÁS POTENTE -->
    <section class="py-20 bg-white" id="reviews">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-display font-satoshi text-text-primary mb-4">
                    Historias que <span class="text-accent">dejan huella</span>
                </h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">
                    Más allá de las fotos, lo que queda son las sensaciones. 
                    Esto es lo que cuentan algunas de las personas que ya viajaron con UKIYO.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <?php
                // Array de reseñas (mismo que en page-reviews2.php)
                $reviews = [
                    [
                        "name" => "Maite y Ramón",
                        "destination" => "Bali, Indonesia",
                        "rating" => 5,
                        "review" => "Experiencia y plan de viaje con Ukiyo 200% recomendable. Fuimos de viaje de novios a Bali y la verdad es que no pudo ser mejor, no solo por el destino en sí que ofrece de todo (cultura, playas, paisajes preciosos y todo tipo de actividades), también gracias a Sergio que nos guió el viaje y nos lo cuadró todo perfectamente, además da consejos y recomendaciones que no lo suelen hacer las agencias habitualmente. Lo recomendaría una y mil veces, profesional como la copa de un pino!",
                        "date" => "Septiembre 2024",
                        "title" => "Sentimos que alguien pensó el viaje con nosotros",
                        "image" => "resena-maite-ramon-bali-indonesia-2.jpg"
                    ],
                    [
                        "name" => "María y Edu",
                        "destination" => "Isla de Java, Indonesia",
                        "rating" => 5,
                        "review" => "Gracias a Ukiyo no solo visitamos Indonesia, si no que la vivimos de verdad. Desde el primer día sentimos mucha tranquilidad ya que todo estaba perfectamente organizado y pudimos despreocuparnos y pensar solo en disfrutar. Cuidaron cada detalle y nos crearon un itinerario adaptado a lo que buscábamos, un viaje auténtico, con alma, lejos de lo típico y de los que te dejan huella.",
                        "date" => "Julio 2025",
                        "title" => "Un viaje auténtico, con alma",
                        "image" => "resena-maria-edu-java-indonesia.jpg"
                    ],
                    [
                        "name" => "Carmen y Jose Ángel",
                        "destination" => "Komodo, Indonesia",
                        "rating" => 5,
                        "review" => "Viajar a Indonesia con Ukiyo ha sido una aventura excepcional, un viaje personalizado al 100% donde hemos podido disfrutar de experiencias auténticas y humanas, sin el agobio del turismo masivo. El esfuerzo y el trabajo detrás de la organización ha hecho que nuestro viaje sea muy toppp. Muchas gracias equipo 🙌🏼 ¡Estamos deseando repetir!",
                        "date" => "Septiembre 2025",
                        "title" => "Experiencias auténticas y humanas",
                        "image" => "resena-carmen-jose-komodo-indonesia.jpg"
                    ],
                    [
                        "name" => "Carolina y Carmen",
                        "destination" => "Cuba",
                        "rating" => 5,
                        "review" => "Lo mejor de Cuba es su gente. La calidez, las risas, las historias compartidas sin prisa… cada conversación parecía un pequeño tesoro. Pasar una tarde aprendiendo a bailar son con una familia local fue uno de esos momentos que te reconcilian con la vida. Regresé con el corazón lleno y la sensación de haber viajado no solo a un lugar, sino a una manera distinta de vivir.",
                        "date" => "Julio 2024",
                        "title" => "La sensación de estar en casa lejos de casa",
                        "image" => "resena-carolina-carmen-cuba.jpg"
                    ],
                ];
                
                // Mostrar solo las primeras 4 reseñas
                $reviews_to_show = array_slice($reviews, 0, 4);
                
                foreach ($reviews_to_show as $review) :
                    $img_url = get_template_directory_uri() . '/images/reviews/' . $review['image'];
                ?>
                <article class="card group overflow-hidden hover:shadow-card-hover transition-all duration-300">
                    <!-- Imagen -->
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="<?php echo esc_url($img_url); ?>" 
                             alt="<?php echo esc_attr($review['name'] . ' - ' . $review['destination']); ?>"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                             loading="lazy"
                             onerror="this.src='https://images.pexels.com/photos/346885/pexels-photo-346885.jpeg'; this.onerror=null;" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <p class="text-white/90 text-sm font-medium"><?php echo esc_html($review['destination']); ?></p>
                        </div>
                    </div>
                    
                    <!-- Contenido -->
                    <div class="p-6">
                        <div class="flex items-center gap-1 text-accent mb-3">
                            <?php for ($i = 0; $i < 5; $i++) : ?>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.562-.954L10 0l2.948 5.956 6.562.954-4.755 4.635 1.123 6.545z"/>
                            </svg>
                            <?php endfor; ?>
                        </div>
                        
                        <h3 class="text-lg font-semibold text-text-primary mb-2">
                            "<?php echo esc_html($review['title']); ?>"
                        </h3>
                        
                        <p class="text-text-secondary text-sm mb-4 line-clamp-4">
                            <?php echo esc_html($review['review']); ?>
                        </p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-border">
                            <div>
                                <p class="font-semibold text-text-primary text-sm"><?php echo esc_html($review['name']); ?></p>
                                <p class="text-text-secondary text-xs"><?php echo esc_html($review['date']); ?></p>
                            </div>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-12">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" class="btn-secondary">
                    Leer más reseñas
                </a>
            </div>
        </div>
    </section>

    <!-- CTA FINAL -->
    <section class="py-20 bg-gradient-primary text-white">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-display font-satoshi mb-6">
                    Tu aventura empieza aquí
                </h2>
                <p class="text-xl mb-8 opacity-90">
                    Todo gran viaje nace de una idea, una emoción o una simple curiosidad.
                    Cuéntanos qué te mueve y diseñaremos una experiencia que te haga sentir el mundo de verdad.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path('planifica-tu-viaje') ) ); ?>" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300">
                        Diseñar mi viaje a medida
                    </a>
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300">
                        Ver viajes de autor
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>