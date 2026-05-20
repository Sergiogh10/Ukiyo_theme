<?php
/*
 * Single template for viaje_autor post ID 135
 * Description: Ficha de viaje de autor - Wild Costa Rica (diseño Tailwind premium con sidebar sticky)
 */
get_header();
$uri = get_template_directory_uri();
?>

<!-- Tailwind CDN with custom config -->
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: "#D4AF37", 
                    secondary: "#2E4A3D", 
                    "background-light": "#F9F9F7", 
                    "surface-light": "#FFFFFF",
                    "text-light": "#1A1A1A",
                },
                fontFamily: {
                    rowdies: ["Rowdies", "cursive"],
                    satoshi: ["Satoshi", "sans-serif"],
                },
                borderRadius: {
                    DEFAULT: "0.5rem",
                },
            },
        },
    };
</script>

<style type="text/tailwindcss">
    @layer utilities {
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    }
    details > summary {
        list-style: none;
    }
    details > summary::-webkit-details-marker {
        display: none;
    }
    .itinerary-section {
        scroll-margin-top: 100px;
    }
    /* Carousel Styles */
    .carousel {
        position: relative;
        overflow: hidden;
    }
    .carousel-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }
    .carousel-slide {
        min-width: 100%;
        flex-shrink: 0;
    }
    .carousel-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        background: rgba(255,255,255,0.9);
        border: none;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        transition: all 0.3s;
    }
    .carousel-btn:hover {
        background: white;
        transform: translateY(-50%) scale(1.1);
    }
    .carousel-btn.prev { left: 12px; }
    .carousel-btn.next { right: 12px; }
    .carousel-dots {
        position: absolute;
        bottom: 16px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
        z-index: 10;
    }
    .carousel-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        border: 2px solid white;
        cursor: pointer;
        transition: all 0.3s;
    }
    .carousel-dot.active {
        background: #D4AF37;
        border-color: #D4AF37;
    }
</style>

<div class="bg-background-light text-text-light font-satoshi antialiased selection:bg-primary selection:text-white transition-colors duration-300">

<!-- Header Hero -->
<header class="relative h-[80vh] w-full overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0">
        <img alt="Guacamayo en Costa Rica durante un viaje de autor con guía experto" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-guacamayo.jpg" onerror="this.src='https://images.pexels.com/photos/2404370/pexels-photo-2404370.jpeg'"/>
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-background-light"></div>
    </div>
    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto mt-16">
        <div class="flex flex-wrap justify-center gap-3 mb-6">
            <span class="px-4 py-1 rounded-full border border-white/30 bg-black/30 backdrop-blur-sm text-xs text-white uppercase tracking-widest">11 Días</span>
            <span class="px-4 py-1 rounded-full border border-white/30 bg-black/30 backdrop-blur-sm text-xs text-white uppercase tracking-widest">Grupos Reducidos</span>
            <span class="px-4 py-1 rounded-full border border-white/30 bg-black/30 backdrop-blur-sm text-xs text-white uppercase tracking-widest">Plazas Limitadas</span>
        </div>
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-rowdies font-bold text-white mb-2 leading-tight">Wild Costa Rica</h1>
        <p class="text-2xl md:text-4xl font-rowdies italic text-primary mb-8">viaje a la biodiversidad más rica del planeta</p>
    </div>
</header>

<!-- Pricing Card -->
<div class="relative -mt-16 max-w-[1600px] mx-auto px-4 z-30">
    <div class="bg-white shadow-xl rounded-2xl p-6 md:p-8 flex flex-wrap justify-between items-center gap-6 border border-gray-100">
        <div class="flex items-center gap-4 flex-1 min-w-[150px]">
            <div class="p-3 bg-primary/10 rounded-full text-primary">
                <span class="material-symbols-outlined">schedule</span>
            </div>
            <div>
                <h4 class="text-xs uppercase text-gray-500 font-bold tracking-wide">Duración</h4>
                <p class="font-rowdies text-lg text-gray-900">11 días</p>
            </div>
        </div>
        <div class="w-px h-12 bg-gray-200 hidden md:block"></div>
        <div class="flex items-center gap-4 flex-1 min-w-[150px]">
            <div class="p-3 bg-primary/10 rounded-full text-primary">
                <span class="material-symbols-outlined">groups</span>
            </div>
            <div>
                <h4 class="text-xs uppercase text-gray-500 font-bold tracking-wide">Grupo</h4>
                <p class="font-rowdies text-lg text-gray-900">Reducido</p>
            </div>
        </div>
        <div class="w-px h-12 bg-gray-200 hidden md:block"></div>
        <!-- Price + CTA Section -->
        <div class="flex items-center gap-6 bg-secondary/5 rounded-2xl p-4 md:px-8 border border-secondary/10">
            <div class="text-center md:text-left">
                <h4 class="text-xs uppercase text-secondary font-bold tracking-wide">Desde</h4>
                <p class="font-rowdies text-2xl md:text-3xl text-secondary font-bold">2.400€</p>
                <span class="text-xs text-gray-500">por persona</span>
            </div>
            <a href="<?php echo esc_url( ukiyo_get_route_url( 'form_viaje_autor' ) ); ?>" class="bg-secondary text-white hover:bg-primary transition-all duration-300 px-6 md:px-8 py-4 rounded-full font-medium tracking-wide shadow-lg text-sm uppercase flex items-center gap-2 whitespace-nowrap">
                <span class="material-symbols-outlined text-xl">flight_takeoff</span>
                Reservar
            </a>
        </div>
    </div>
</div>

<!-- Main Content with Sidebar -->
<main class="relative flex flex-col lg:flex-row max-w-[1600px] mx-auto">
    
    <!-- Sidebar Navigation -->
    <aside class="lg:w-72 w-full lg:sticky lg:top-0 lg:h-screen bg-background-light z-20 border-r border-gray-200 p-8 flex flex-col justify-center overflow-y-auto hide-scrollbar">
        <p class="text-[10px] font-bold text-primary tracking-[0.3em] uppercase mb-8">Itinerario</p>
        <nav class="space-y-6">
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all" href="#experto">
                <span class="w-8 h-8 rounded-full border border-primary/30 flex items-center justify-center text-[10px] group-hover:bg-primary group-hover:text-white transition-colors"><span class="material-symbols-outlined text-sm">person</span></span>
                <span>El Experto</span>
            </a>
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all" href="#llegada">
                <span class="w-8 h-8 rounded-full border border-primary/30 flex items-center justify-center text-[10px] group-hover:bg-primary group-hover:text-white transition-colors">00</span>
                <span>Llegada</span>
            </a>
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all" href="#dia-1">
                <span class="w-8 h-8 rounded-full border border-primary/30 flex items-center justify-center text-[10px] group-hover:bg-primary group-hover:text-white transition-colors">01</span>
                <span>San Gerardo de Dota</span>
            </a>
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all" href="#dia-2">
                <span class="w-8 h-8 rounded-full border border-primary/30 flex items-center justify-center text-[10px] group-hover:bg-primary group-hover:text-white transition-colors">02</span>
                <span>Puerto Jiménez</span>
            </a>
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all" href="#dia-3">
                <span class="w-8 h-8 rounded-full border border-primary/30 flex items-center justify-center text-[10px] group-hover:bg-primary group-hover:text-white transition-colors">03</span>
                <span>Corcovado</span>
            </a>
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all" href="#dia-4">
                <span class="w-8 h-8 rounded-full border border-primary/30 flex items-center justify-center text-[10px] group-hover:bg-primary group-hover:text-white transition-colors">04</span>
                <span>Orotina</span>
            </a>
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all" href="#dia-5">
                <span class="w-8 h-8 rounded-full border border-primary/30 flex items-center justify-center text-[10px] group-hover:bg-primary group-hover:text-white transition-colors">05</span>
                <span>Río Sarapiquí</span>
            </a>
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all" href="#dia-6">
                <span class="w-8 h-8 rounded-full border border-primary/30 flex items-center justify-center text-[10px] group-hover:bg-primary group-hover:text-white transition-colors">06</span>
                <span>Tortuguero</span>
            </a>
            <a class="group flex items-center gap-4 text-sm font-medium hover:text-primary transition-all pt-8 border-t border-gray-100" href="#faq">
                <span class="material-symbols-outlined text-xl text-primary">quiz</span>
                <span>Preguntas Frecuentes</span>
            </a>
        </nav>
    </aside>

    <!-- Content Area -->
    <div class="flex-1">
        
        <!-- Expert Section -->
        <section class="py-24 px-8 lg:px-20 border-b border-gray-100 bg-white" id="experto">
            <div class="max-w-4xl mx-auto">
                <div class="bg-background-light p-8 md:p-12 rounded-3xl border border-primary/10 flex flex-col md:flex-row items-center gap-10 shadow-sm">
                    <div class="flex-shrink-0">
                        <div class="w-48 h-48 rounded-full bg-white flex items-center justify-center border-4 border-white shadow-xl overflow-hidden relative">
                            <img src="<?php echo $uri; ?>/images/autores/luis/autor-luis.png" alt="Luis Acuña - Fotógrafo y Guía Experto" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'"/>
                            <div class="absolute inset-0 bg-secondary/50 hidden items-center justify-center">
                                <span class="font-rowdies text-4xl text-primary font-bold">LA</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center md:text-left flex-1">
                        <h2 class="text-4xl md:text-5xl font-rowdies font-medium text-gray-900 mb-2">Luis Acuña</h2>
                        <p class="text-xs font-bold text-primary tracking-[0.2em] uppercase mb-6">Guía Costarricense & Fotógrafo</p>
                        <p class="text-gray-600 leading-relaxed font-light mb-8 italic">
                            "Imagino cada tour de vida silvestre como una semilla, plantada en el corazón de cada viajero que pone un pie en el paraíso biodiverso de Costa Rica. Cada fotografía que mis clientes toman es un testimonio de la belleza que prospera en estas tierras."
                        </p>
                        <div class="flex flex-wrap justify-center md:justify-start gap-8">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">forest</span>
                                <div class="text-left">
                                    <span class="block text-[10px] font-bold uppercase tracking-wider text-gray-400">Especialidad</span>
                                    <span class="text-xs font-bold uppercase tracking-wider">Corcovado & Osa</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">photo_camera</span>
                                <div class="text-left">
                                    <span class="block text-[10px] font-bold uppercase tracking-wider text-gray-400">Enfoque</span>
                                    <span class="text-xs font-bold uppercase tracking-wider">Fotografía Fauna</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16 px-4">
                    <div class="space-y-3 text-center md:text-left">
                        <span class="material-symbols-outlined text-primary text-3xl">eco</span>
                        <h4 class="font-bold text-sm uppercase tracking-wider">Ecosistemas Diversos</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Bosque nuboso, selva tropical, manglares, canales y playas remotas.</p>
                    </div>
                    <div class="space-y-3 text-center md:text-left">
                        <span class="material-symbols-outlined text-primary text-3xl">pets</span>
                        <h4 class="font-bold text-sm uppercase tracking-wider">Experiencias Auténticas</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Quetzales, tapires, tortugas anidando y la fauna más escurridiza.</p>
                    </div>
                    <div class="space-y-3 text-center md:text-left">
                        <span class="material-symbols-outlined text-primary text-3xl">groups</span>
                        <h4 class="font-bold text-sm uppercase tracking-wider">Acompañamiento Cercano</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">El autor del viaje comparte cada experiencia contigo.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Arrival Section -->
        <section class="itinerary-section py-24 px-8 lg:px-20 border-b border-gray-100 bg-background-light" id="llegada">
            <div class="max-w-4xl">
                <span class="text-xs font-bold text-primary uppercase tracking-widest">Llegada • San José</span>
                <h2 class="text-4xl font-rowdies font-bold mt-4 mb-8">Aeropuerto Internacional Juan Santamaría (SJO)</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div>
                        <h4 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">Actividades del día</h4>
                        <p class="text-gray-600 leading-relaxed font-light">
                            Llegada a San José y primer encuentro con el grupo y el autor del viaje. Traslado hacia la zona de montaña para iniciar la aventura en el bosque nuboso.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-primary/10 shadow-sm">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="material-symbols-outlined text-primary">hotel</span>
                            <h4 class="font-bold text-sm">Traslado hacia San Gerardo de Dota</h4>
                        </div>
                        <ul class="text-xs space-y-2 text-gray-500">
                            <li>• Recogida en aeropuerto SJO</li>
                            <li>• Vehículo privado con aire acondicionado</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Day 1: San Gerardo de Dota -->
        <section class="itinerary-section py-24 px-8 lg:px-20 border-b border-gray-100 bg-white" id="dia-1">
            <div class="max-w-4xl">
                <div class="flex flex-col md:flex-row gap-12">
                    <div class="flex-1">
                        <span class="text-xs font-bold text-primary uppercase tracking-widest">Días 1-2 • Bosque Nuboso</span>
                        <h2 class="text-4xl font-rowdies font-bold mt-4 mb-8">San Gerardo de Dota</h2>
                        <!-- Carousel -->
                        <div class="carousel aspect-video mb-8 rounded-3xl" data-carousel>
                            <div class="carousel-track h-full">
                                <div class="carousel-slide">
                                    <img alt="Bosque nuboso San Gerardo" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/costarica/viajes-a-costa-rica-personalizados-monteverde.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Quetzal resplandeciente" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-queztal.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Bosque nuboso montañas" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/costarica/viajes-a-costa-rica-personalizados-monteverde-bosque-nuboso.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                            </div>
                            <button class="carousel-btn prev" aria-label="Anterior"><span class="material-symbols-outlined">chevron_left</span></button>
                            <button class="carousel-btn next" aria-label="Siguiente"><span class="material-symbols-outlined">chevron_right</span></button>
                            <div class="carousel-dots"></div>
                        </div>
                        <h4 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">La Experiencia</h4>
                        <p class="text-gray-600 leading-relaxed font-light mb-8">
                            Empezamos en el corazón del bosque nuboso costarricense. San Gerardo de Dota es uno de los mejores lugares del país para observar colibríes, tangaras y, sobre todo, el quetzal resplandeciente. Tendremos amaneceres dedicados a buscarlo con guías locales, y una tarde para disfrutar del paisaje a caballo.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 rounded-xl border border-green-100 bg-green-50/50">
                                <span class="text-[10px] font-bold text-secondary uppercase block mb-2">Incluye hoy</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✓ Búsqueda del quetzal al amanecer</li>
                                    <li>✓ Cabalgata entre montañas</li>
                                </ul>
                            </div>
                            <div class="p-4 rounded-xl border border-red-100 bg-red-50/50">
                                <span class="text-[10px] font-bold text-red-800 uppercase block mb-2">No incluye</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✗ Bebidas alcohólicas</li>
                                    <li>✗ Propinas</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-80">
                        <div class="sticky top-24 bg-background-light p-8 rounded-3xl border border-primary/10">
                            <h4 class="font-rowdies font-bold text-xl mb-6">Alojamiento</h4>
                            <div class="space-y-6">
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Nombre</p>
                                    <p class="text-sm font-medium">Cabañas Mirian's</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Tipo</p>
                                    <p class="text-sm font-medium">Cabañas de Montaña</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Destacado</p>
                                    <p class="text-xs text-gray-500 leading-relaxed">Rodeadas de bosque nuboso. Perfecto para salir a primera hora a buscar quetzales.</p>
                                </div>
                                <div class="flex gap-2">
                                    <span class="material-symbols-outlined text-primary text-xl">forest</span>
                                    <span class="material-symbols-outlined text-primary text-xl">wb_twilight</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Day 2: Puerto Jiménez -->
        <section class="itinerary-section py-24 px-8 lg:px-20 border-b border-gray-100 bg-background-light" id="dia-2">
            <div class="max-w-4xl">
                <div class="flex flex-col md:flex-row-reverse gap-12">
                    <div class="flex-1">
                        <span class="text-xs font-bold text-primary uppercase tracking-widest">Días 3-4 • Península de Osa</span>
                        <h2 class="text-4xl font-rowdies font-bold mt-4 mb-8">Puerto Jiménez</h2>
                        <!-- Carousel -->
                        <div class="carousel aspect-video mb-8 rounded-3xl" data-carousel>
                            <div class="carousel-track h-full">
                                <div class="carousel-slide">
                                    <img alt="Puerto Jiménez" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/costarica/viajes-a-costa-rica-personalizados-bahia-drake.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Caimán en manglares" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-caiman.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Guacamayo salvaje" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/costarica/viajes-personalizados-ukiyo-guacamayo.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                            </div>
                            <button class="carousel-btn prev" aria-label="Anterior"><span class="material-symbols-outlined">chevron_left</span></button>
                            <button class="carousel-btn next" aria-label="Siguiente"><span class="material-symbols-outlined">chevron_right</span></button>
                            <div class="carousel-dots"></div>
                        </div>
                        <h4 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">La Experiencia</h4>
                        <p class="text-gray-600 leading-relaxed font-light mb-8">
                            Bajamos hacia la Península de Osa. Puerto Jiménez es la puerta de entrada a Corcovado, y nuestra base antes y después de dormir dentro del parque. En ruta exploraremos los manglares de Sierpe, un santuario natural lleno de aves y mamíferos.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 rounded-xl border border-green-100 bg-green-50/50">
                                <span class="text-[10px] font-bold text-secondary uppercase block mb-2">Incluye hoy</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✓ Tour manglares de Sierpe</li>
                                    <li>✓ Tiempo libre en la costa</li>
                                </ul>
                            </div>
                            <div class="p-4 rounded-xl border border-red-100 bg-red-50/50">
                                <span class="text-[10px] font-bold text-red-800 uppercase block mb-2">No incluye</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✗ Equipo fotográfico personal</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-80">
                        <div class="sticky top-24 bg-white p-8 rounded-3xl border border-primary/10 shadow-sm">
                            <h4 class="font-rowdies font-bold text-xl mb-6">Alojamiento</h4>
                            <div class="space-y-6">
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Nombre</p>
                                    <p class="text-sm font-medium">Hotel Nereus</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Tipo</p>
                                    <p class="text-sm font-medium">Hotel Cómodo</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Destacado</p>
                                    <p class="text-xs text-gray-500 leading-relaxed">Ideal para organizar la logística hacia Corcovado y descansar tras la selva.</p>
                                </div>
                                <div class="flex gap-2">
                                    <span class="material-symbols-outlined text-primary text-xl">beach_access</span>
                                    <span class="material-symbols-outlined text-primary text-xl">restaurant</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Day 3: Corcovado -->
        <section class="itinerary-section py-24 px-8 lg:px-20 border-b border-gray-100 bg-white" id="dia-3">
            <div class="max-w-4xl">
                <div class="flex flex-col md:flex-row gap-12">
                    <div class="flex-1">
                        <span class="text-xs font-bold text-primary uppercase tracking-widest">Día 5 • Selva Profunda</span>
                        <h2 class="text-4xl font-rowdies font-bold mt-4 mb-8">Parque Nacional Corcovado</h2>
                        <!-- Carousel -->
                        <div class="carousel aspect-video mb-8 rounded-3xl" data-carousel>
                            <div class="carousel-track h-full">
                                <div class="carousel-slide">
                                    <img alt="Selva Corcovado" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-guacamayo.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Tapir en Corcovado" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-tapir.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Mono araña" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-mono.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                            </div>
                            <button class="carousel-btn prev" aria-label="Anterior"><span class="material-symbols-outlined">chevron_left</span></button>
                            <button class="carousel-btn next" aria-label="Siguiente"><span class="material-symbols-outlined">chevron_right</span></button>
                            <div class="carousel-dots"></div>
                        </div>
                        <h4 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">La Experiencia</h4>
                        <p class="text-gray-600 leading-relaxed font-light mb-8">
                            Entramos en uno de los lugares con mayor biodiversidad del planeta. Caminaremos por senderos donde la fauna es protagonista: tapires, monos, pecaríes y aves tropicales. Dormir dentro del parque nos permite vivir Corcovado con luz de amanecer y atardecer, cuando la selva está más activa.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 rounded-xl border border-green-100 bg-green-50/50">
                                <span class="text-[10px] font-bold text-secondary uppercase block mb-2">Incluye hoy</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✓ Trekking por la selva (6h)</li>
                                    <li>✓ Salida al amanecer</li>
                                </ul>
                            </div>
                            <div class="p-4 rounded-xl border border-red-100 bg-red-50/50">
                                <span class="text-[10px] font-bold text-red-800 uppercase block mb-2">No incluye</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✗ Bebidas extra</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-80">
                        <div class="sticky top-24 bg-background-light p-8 rounded-3xl border border-primary/10">
                            <h4 class="font-rowdies font-bold text-xl mb-6">Alojamiento</h4>
                            <div class="space-y-6">
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Nombre</p>
                                    <p class="text-sm font-medium">Estación Sirena</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Tipo</p>
                                    <p class="text-sm font-medium">Alojamiento Básico</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Destacado</p>
                                    <p class="text-xs text-gray-500 leading-relaxed">Experiencia única dentro del parque. Sal directo a los senderos.</p>
                                </div>
                                <div class="flex gap-2">
                                    <span class="material-symbols-outlined text-primary text-xl">hiking</span>
                                    <span class="material-symbols-outlined text-primary text-xl">visibility</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Day 4: Orotina -->
        <section class="itinerary-section py-24 px-8 lg:px-20 border-b border-gray-100 bg-background-light" id="dia-4">
            <div class="max-w-4xl">
                <div class="flex flex-col md:flex-row-reverse gap-12">
                    <div class="flex-1">
                        <span class="text-xs font-bold text-primary uppercase tracking-widest">Día 6 • Descanso & Río Tárcoles</span>
                        <h2 class="text-4xl font-rowdies font-bold mt-4 mb-8">Orotina - Cerro Lodge</h2>
                        <!-- Carousel -->
                        <div class="carousel aspect-video mb-8 rounded-3xl" data-carousel>
                            <div class="carousel-track h-full">
                                <div class="carousel-slide">
                                    <img alt="Perezoso en Orotina" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-perezoso.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Momoto turquesa" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-momoto.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                            </div>
                            <button class="carousel-btn prev" aria-label="Anterior"><span class="material-symbols-outlined">chevron_left</span></button>
                            <button class="carousel-btn next" aria-label="Siguiente"><span class="material-symbols-outlined">chevron_right</span></button>
                            <div class="carousel-dots"></div>
                        </div>
                        <h4 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">La Experiencia</h4>
                        <p class="text-gray-600 leading-relaxed font-light mb-8">
                            Tras la intensidad de la selva, llegamos a Cerro Lodge para descansar. La tarde es tranquila para disfrutar del entorno, y al día siguiente navegaremos el Río Tárcoles, hogar de la mayor población de cocodrilos del país.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 rounded-xl border border-green-100 bg-green-50/50">
                                <span class="text-[10px] font-bold text-secondary uppercase block mb-2">Incluye hoy</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✓ Tour en barco Río Tárcoles</li>
                                    <li>✓ Observación de cocodrilos</li>
                                </ul>
                            </div>
                            <div class="p-4 rounded-xl border border-red-100 bg-red-50/50">
                                <span class="text-[10px] font-bold text-red-800 uppercase block mb-2">No incluye</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✗ Gastos personales</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-80">
                        <div class="sticky top-24 bg-white p-8 rounded-3xl border border-primary/10 shadow-sm">
                            <h4 class="font-rowdies font-bold text-xl mb-6">Alojamiento</h4>
                            <div class="space-y-6">
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Nombre</p>
                                    <p class="text-sm font-medium">Cerro Lodge</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Tipo</p>
                                    <p class="text-sm font-medium">Eco-Lodge</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Destacado</p>
                                    <p class="text-xs text-gray-500 leading-relaxed">Rodeado de naturaleza, perfecto para una tarde de descanso.</p>
                                </div>
                                <div class="flex gap-2">
                                    <span class="material-symbols-outlined text-primary text-xl">spa</span>
                                    <span class="material-symbols-outlined text-primary text-xl">nature</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Day 5: Río Sarapiquí -->
        <section class="itinerary-section py-24 px-8 lg:px-20 border-b border-gray-100 bg-white" id="dia-5">
            <div class="max-w-4xl">
                <div class="flex flex-col md:flex-row gap-12">
                    <div class="flex-1">
                        <span class="text-xs font-bold text-primary uppercase tracking-widest">Días 7-8 • Mariposas & Noche</span>
                        <h2 class="text-4xl font-rowdies font-bold mt-4 mb-8">Río Sarapiquí - Pierella Garden</h2>
                        <!-- Carousel -->
                        <div class="carousel aspect-video mb-8 rounded-3xl" data-carousel>
                            <div class="carousel-track h-full">
                                <div class="carousel-slide">
                                    <img alt="Pierella Garden" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/costarica/viajes-a-costa-rica-personalizados-osa-corcovado-hero.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Iguana verde" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-iguana.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Murciélago blanco" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-whitebat.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Rana dardo" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-rana.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                            </div>
                            <button class="carousel-btn prev" aria-label="Anterior"><span class="material-symbols-outlined">chevron_left</span></button>
                            <button class="carousel-btn next" aria-label="Siguiente"><span class="material-symbols-outlined">chevron_right</span></button>
                            <div class="carousel-dots"></div>
                        </div>
                        <h4 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">La Experiencia</h4>
                        <p class="text-gray-600 leading-relaxed font-light mb-8">
                            Pierella Garden es una eco-finca dedicada a la cría y conservación de mariposas. Nos alojamos dos noches en este entorno reforestado, con visitas al Río Sarapiquí, caminatas nocturnas y un tour para entender el fascinante ciclo de estas especies.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 rounded-xl border border-green-100 bg-green-50/50">
                                <span class="text-[10px] font-bold text-secondary uppercase block mb-2">Incluye hoy</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✓ Tour de mariposas</li>
                                    <li>✓ Caminata nocturna</li>
                                    <li>✓ Visita Río Sarapiquí</li>
                                </ul>
                            </div>
                            <div class="p-4 rounded-xl border border-red-100 bg-red-50/50">
                                <span class="text-[10px] font-bold text-red-800 uppercase block mb-2">No incluye</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✗ Propinas</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-80">
                        <div class="sticky top-24 bg-background-light p-8 rounded-3xl border border-primary/10">
                            <h4 class="font-rowdies font-bold text-xl mb-6">Alojamiento</h4>
                            <div class="space-y-6">
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Nombre</p>
                                    <p class="text-sm font-medium">Pierella Garden Ecolodge</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Tipo</p>
                                    <p class="text-sm font-medium">Ecolodge Conservación</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Destacado</p>
                                    <p class="text-xs text-gray-500 leading-relaxed">Referencia en conservación de mariposas y biodiversidad del Caribe norte.</p>
                                </div>
                                <div class="flex gap-2">
                                    <span class="material-symbols-outlined text-primary text-xl">bug_report</span>
                                    <span class="material-symbols-outlined text-primary text-xl">nightlight</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Day 6: Tortuguero -->
        <section class="itinerary-section py-24 px-8 lg:px-20 border-b border-gray-100 bg-background-light" id="dia-6">
            <div class="max-w-4xl">
                <div class="flex flex-col md:flex-row-reverse gap-12">
                    <div class="flex-1">
                        <span class="text-xs font-bold text-primary uppercase tracking-widest">Días 9-10 • Caribe & Tortugas</span>
                        <h2 class="text-4xl font-rowdies font-bold mt-4 mb-8">Tortuguero</h2>
                        <!-- Carousel -->
                        <div class="carousel aspect-video mb-8 rounded-3xl" data-carousel>
                            <div class="carousel-track h-full">
                                <div class="carousel-slide">
                                    <img alt="Canales Tortuguero" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-canales.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Mono en Tortuguero" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/costarica/viajes-a-costa-rica-personalizados-tortuguero-mono.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                                <div class="carousel-slide">
                                    <img alt="Murciélago nocturno" class="w-full h-full object-cover" src="<?php echo $uri; ?>/images/viajesdeautor/wildcostarica/viajes-de-autor-a-costa-rica-fotografia-murcielago.jpg" onerror="this.src='https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg'"/>
                                </div>
                            </div>
                            <button class="carousel-btn prev" aria-label="Anterior"><span class="material-symbols-outlined">chevron_left</span></button>
                            <button class="carousel-btn next" aria-label="Siguiente"><span class="material-symbols-outlined">chevron_right</span></button>
                            <div class="carousel-dots"></div>
                        </div>
                        <h4 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">La Experiencia</h4>
                        <p class="text-gray-600 leading-relaxed font-light mb-8">
                            Cerramos la ruta en el Caribe más remoto. Tortuguero solo se alcanza en bote o avioneta, y sus canales son uno de los grandes santuarios de vida silvestre del país. Navegaremos en canoa entre selva y agua, y por la noche viviremos el momento más esperado: el anidamiento de tortugas marinas.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 rounded-xl border border-green-100 bg-green-50/50">
                                <span class="text-[10px] font-bold text-secondary uppercase block mb-2">Incluye hoy</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✓ Canoa por los canales</li>
                                    <li>✓ Anidamiento de tortugas</li>
                                </ul>
                            </div>
                            <div class="p-4 rounded-xl border border-red-100 bg-red-50/50">
                                <span class="text-[10px] font-bold text-red-800 uppercase block mb-2">No incluye</span>
                                <ul class="text-xs space-y-1 text-gray-600">
                                    <li>✗ Gastos personales</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-80">
                        <div class="sticky top-24 bg-white p-8 rounded-3xl border border-primary/10 shadow-sm">
                            <h4 class="font-rowdies font-bold text-xl mb-6">Tu Refugio</h4>
                            <div class="space-y-6">
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Nombre</p>
                                    <p class="text-sm font-medium">Hotel frente a la playa</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Tipo</p>
                                    <p class="text-sm font-medium">Hotel Caribeño</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-primary uppercase mb-1">Destacado</p>
                                    <p class="text-xs text-gray-500 leading-relaxed">Acceso directo a playa y canales. Ideal para el anidamiento nocturno.</p>
                                </div>
                                <div class="flex gap-2">
                                    <span class="material-symbols-outlined text-primary text-xl">kayaking</span>
                                    <span class="material-symbols-outlined text-primary text-xl">cruelty_free</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-24 px-8 lg:px-20 bg-white" id="faq">
            <div class="max-w-4xl">
                <span class="text-xs font-bold text-primary uppercase tracking-widest">Resolviendo dudas</span>
                <h2 class="text-4xl font-rowdies font-bold mt-4 mb-12">Preguntas Frecuentes</h2>
                <div class="space-y-4">
                    
                    <!-- General Category -->
                    <div class="mb-8">
                        <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">Sobre el viaje</h4>
                        <div class="space-y-2">
                            <details class="group bg-background-light rounded-2xl border border-gray-100 overflow-hidden">
                                <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition-colors">
                                    <span class="font-medium">¿El viaje es privado?</span>
                                    <span class="material-symbols-outlined text-primary group-open:rotate-180 transition-transform">expand_more</span>
                                </summary>
                                <div class="px-6 pb-6 text-sm text-gray-500 leading-relaxed">
                                    No. Este es un <strong>viaje en grupo</strong> con plazas limitadas. Una vez se llenan, no se añaden más participantes para mantener la experiencia cercana y controlada.
                                </div>
                            </details>
                            <details class="group bg-background-light rounded-2xl border border-gray-100 overflow-hidden">
                                <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition-colors">
                                    <span class="font-medium">¿Podemos modificar el itinerario?</span>
                                    <span class="material-symbols-outlined text-primary group-open:rotate-180 transition-transform">expand_more</span>
                                </summary>
                                <div class="px-6 pb-6 text-sm text-gray-500 leading-relaxed">
                                    No. La ruta está <strong>diseñada específicamente</strong> para maximizar las probabilidades de avistamiento y fotografía de fauna. Cada ubicación, horario y transición forma parte de un itinerario optimizado.
                                </div>
                            </details>
                            <details class="group bg-background-light rounded-2xl border border-gray-100 overflow-hidden">
                                <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition-colors">
                                    <span class="font-medium">¿Habrá asistencia durante el viaje?</span>
                                    <span class="material-symbols-outlined text-primary group-open:rotate-180 transition-transform">expand_more</span>
                                </summary>
                                <div class="px-6 pb-6 text-sm text-gray-500 leading-relaxed">
                                    Sí. El <strong>Autor del viaje</strong> estará con vosotros durante todo el itinerario, acompañando cada salida, resolviendo dudas y ayudando en la fotografía de fauna en campo.
                                </div>
                            </details>
                        </div>
                    </div>
                    
                    <!-- Documentation Category -->
                    <div class="mb-8">
                        <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">Documentación y Precio</h4>
                        <div class="space-y-2">
                            <details class="group bg-background-light rounded-2xl border border-gray-100 overflow-hidden">
                                <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition-colors">
                                    <span class="font-medium">¿Qué documentación necesito?</span>
                                    <span class="material-symbols-outlined text-primary group-open:rotate-180 transition-transform">expand_more</span>
                                </summary>
                                <div class="px-6 pb-6 text-sm text-gray-500 leading-relaxed">
                                    Pasaporte vigente. Ciudadanos de la Unión Europea y la mayoría de países de Latinoamérica <strong>no necesitan visado</strong> para estancias turísticas inferiores a 90 días.
                                </div>
                            </details>
                            <details class="group bg-background-light rounded-2xl border border-gray-100 overflow-hidden">
                                <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition-colors">
                                    <span class="font-medium">¿Cuál es el precio del viaje?</span>
                                    <span class="material-symbols-outlined text-primary group-open:rotate-180 transition-transform">expand_more</span>
                                </summary>
                                <div class="px-6 pb-6 text-sm text-gray-500 leading-relaxed">
                                    El precio final del viaje es de <strong>3.100 € por persona</strong>, en base a habitación triple compartida.
                                </div>
                            </details>
                            <details class="group bg-background-light rounded-2xl border border-gray-100 overflow-hidden">
                                <summary class="flex items-center justify-between p-6 cursor-pointer hover:bg-gray-50 transition-colors">
                                    <span class="font-medium">¿Cuál es el depósito para reservar?</span>
                                    <span class="material-symbols-outlined text-primary group-open:rotate-180 transition-transform">expand_more</span>
                                </summary>
                                <div class="px-6 pb-6 text-sm text-gray-500 leading-relaxed">
                                    Para asegurar tu plaza se requiere un <strong>depósito de 500 €</strong>. El resto del pago se realiza antes del inicio del viaje según las instrucciones de la organización.
                                </div>
                            </details>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

    </div>
</main>

<!-- Footer -->
<footer class="bg-[#121212] text-white py-16 px-6 pb-16 border-t border-white/5">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
        <div class="col-span-1 md:col-span-2">
            <h2 class="text-4xl font-rowdies font-bold mb-6">UKIYO</h2>
            <p class="text-gray-400 max-w-sm mb-6">Viajes auténticos, sostenibles y creados a tu medida. Conectando viajeros con la esencia de cada destino.</p>
            <div class="flex space-x-4">
                <a class="text-gray-400 hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined">social_leaderboard</span></a>
                <a class="text-gray-400 hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined">camera_alt</span></a>
            </div>
        </div>
        <div>
            <h4 class="font-bold mb-4 uppercase text-sm tracking-wider">Destinos</h4>
            <ul class="space-y-2 text-gray-400 text-sm">
                <li><a class="hover:text-primary transition-colors" href="<?php echo esc_url( ukiyo_get_route_url( 'destination_indonesia' ) ); ?>">Indonesia</a></li>
                <li><a class="hover:text-primary transition-colors" href="<?php echo esc_url( ukiyo_get_route_url( 'destination_costa_rica' ) ); ?>">Costa Rica</a></li>
                <li><a class="hover:text-primary transition-colors" href="<?php echo esc_url( ukiyo_get_route_url( 'destination_marruecos' ) ); ?>">Marruecos</a></li>
                <li><a class="hover:text-primary transition-colors" href="<?php echo esc_url( ukiyo_get_route_url( 'destination_colombia' ) ); ?>">Colombia</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold mb-4 uppercase text-sm tracking-wider">Compañía</h4>
            <ul class="space-y-2 text-gray-400 text-sm">
                <li><a class="hover:text-primary transition-colors" href="<?php echo esc_url( ukiyo_get_route_url( 'about' ) ); ?>">Nosotros</a></li>
                <li><a class="hover:text-primary transition-colors" href="<?php echo esc_url( ukiyo_get_route_url( 'viajes_autor' ) ); ?>">Viajes de Autor</a></li>
                <li><a class="hover:text-primary transition-colors" href="<?php echo esc_url( get_permalink( get_page_by_path('contacto') ) ); ?>">Contacto</a></li>
            </ul>
        </div>
    </div>
    <div class="max-w-7xl mx-auto mt-12 pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between text-xs text-gray-500">
        <p>© 2026 Ukiyo. Todos los derechos reservados.</p>
        <div class="flex space-x-6 mt-4 md:mt-0">
            <a class="hover:text-white transition-colors" href="<?php echo esc_url( ukiyo_get_route_url( 'privacy' ) ); ?>">Privacidad</a>
            <a class="hover:text-white transition-colors" href="<?php echo esc_url( ukiyo_get_route_url( 'terms' ) ); ?>">Términos</a>
            <a class="hover:text-white transition-colors" href="<?php echo esc_url( ukiyo_get_route_url( 'cookies' ) ); ?>">Cookies</a>
        </div>
    </div>
</footer>

</div>

<!-- Carousel JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[data-carousel]').forEach(function(carousel) {
        const track = carousel.querySelector('.carousel-track');
        const slides = carousel.querySelectorAll('.carousel-slide');
        const prevBtn = carousel.querySelector('.carousel-btn.prev');
        const nextBtn = carousel.querySelector('.carousel-btn.next');
        const dotsContainer = carousel.querySelector('.carousel-dots');
        
        let currentIndex = 0;
        const totalSlides = slides.length;
        
        // Create dots
        slides.forEach((_, index) => {
            const dot = document.createElement('button');
            dot.classList.add('carousel-dot');
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => goToSlide(index));
            dotsContainer.appendChild(dot);
        });
        
        const dots = dotsContainer.querySelectorAll('.carousel-dot');
        
        function updateDots() {
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }
        
        function goToSlide(index) {
            currentIndex = index;
            track.style.transform = `translateX(-${currentIndex * 100}%)`;
            updateDots();
        }
        
        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            goToSlide(currentIndex);
        }
        
        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            goToSlide(currentIndex);
        }
        
        prevBtn.addEventListener('click', prevSlide);
        nextBtn.addEventListener('click', nextSlide);
        
        // Touch/Swipe support
        let startX = 0;
        let endX = 0;
        
        carousel.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        }, { passive: true });
        
        carousel.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            const diff = startX - endX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) nextSlide();
                else prevSlide();
            }
        }, { passive: true });
    });
});
</script>

<?php
if ( function_exists( 'ukiyo_render_viaje_autor_blog_resources_section' ) ) {
    ukiyo_render_viaje_autor_blog_resources_section( get_the_ID(), 'bg-white' );
}
get_footer();
?>
