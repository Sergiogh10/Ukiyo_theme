<?php
/*
Template Name: Destinos
*/
get_header();
?>

<style>
.destino-row{height: 500px}@media(min-width:1024px){.destino-row{height:500px}}
.destino-row .destino-img{width:100%;height:100%!important;object-fit:cover}
.destino-row+.destino-row{margin-top:0}
</style>

<!-- Hero Section -->
<section class="pt-24 pb-12 bg-gradient-warm text-center">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-hero font-crimson text-text-primary mb-6">
                Descubre nuestros <span class="text-primary">destinos</span>
            </h1>
            <p class="text-xl text-text-secondary mb-8 max-w-3xl mx-auto">
                Más allá de los destinos, cada experiencia despierta sentimientos únicos. Explora nuestras aventuras culturales por país. Nosotros sólo organizamos aquellos países que ya hemos visitado.
            </p>
        </div>
    </div>
</section>

<!-- Destinos Section -->
<section class="w-full">

  <!-- Indonesia -->
  <div class="destino-row relative w-full overflow-hidden group cursor-pointer"
         onclick="window.location.href='<?php echo site_url('/indonesia'); ?>'">
    <img src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/dragonkomodo.jpg"       alt="Indonesia"
       class="destino-img w-full object-cover opacity-60 group-hover:opacity-100 transition-all duration-700 ease-out"
       style="-webkit-mask-image: radial-gradient(ellipse at center, black 50%, transparent 100%); mask-image: radial-gradient(ellipse at center, black 50%, transparent 100%);">
    <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white z-10 px-4">
        <h1 class="text-hero font-telma text-text-white mb-6 drop-shadow-lg">Indonesia</h1>
        <h2 class="text-lg max-w-xl text-white/90">Espiritualidad, naturaleza y arte…</h2>
    </div>
    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/10 transition duration-700 ease-out"></div>
  </div>

  <!-- Costa Rica -->
  <div class="destino-row relative w-full overflow-hidden group cursor-pointer" onclick="window.location.href='<?php echo site_url('/costa-rica'); ?>'">
    <img src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/tucan.jpg"
         alt="Costa Rica"
         class="destino-img w-full object-cover opacity-60 group-hover:opacity-100 transition-all duration-700 ease-out"
         style="object-position: 50% 30%; -webkit-mask-image: radial-gradient(ellipse at center, black 50%, transparent 100%); mask-image: radial-gradient(ellipse at center, black 50%, transparent 100%);">
    <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white z-10 px-4">
      <h1 class="text-hero text-text-white mb-6">Costa Rica</h1>
      <h2 class="text-lg max-w-xl text-white/90">Bosques vivos, fauna libre y pura vida en estado natural.</h2>
    </div>
    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/10 transition duration-700 ease-out"></div>
  </div>

  <!-- Colombia -->
  <div class="destino-row relative w-full overflow-hidden group cursor-pointer" onclick="window.location.href='<?php echo site_url('/colombia'); ?>'">
    <img src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/colombiacalle.jpg"
        alt="Colombia"
        class="destino-img w-full object-cover opacity-60 group-hover:opacity-100 transition-all duration-700 ease-out"
        style="-webkit-mask-image: radial-gradient(ellipse at center, black 50%, transparent 100%); mask-image: radial-gradient(ellipse at center, black 50%, transparent 100%);">
    <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white z-10 px-4">
      <h1 class="text-hero mb-6 font-telma">Colombia</h1>
      <h2 class="text-lg max-w-xl text-white/90">Colores, café y cultura vibrante que despiertan el alma.</h2>
    </div>
    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/10 transition duration-700 ease-out"></div>
  </div>

  <!-- Marruecos -->
  <div class="destino-row relative w-full overflow-hidden group cursor-pointer" onclick="window.location.href='<?php echo site_url('/marruecos'); ?>'">
    <img src="<?php echo get_template_directory_uri(); ?>/images/destination-mood/kasbah.jpg"
         alt="Marruecos"
         class="destino-img w-full object-cover opacity-60 group-hover:opacity-100 transition-all duration-700 ease-out"
         style="-webkit-mask-image: radial-gradient(ellipse at center, black 50%, transparent 100%); mask-image: radial-gradient(ellipse at center, black 50%, transparent 100%);">
    <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white z-10 px-4">
      <h1 class="text-hero mb-6 font-telma">Marruecos</h1>
      <h2 class="text-lg max-w-xl text-white/90">Aromas, desiertos y medinas que cuentan historias milenarias.</h2>
    </div>
    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/10 transition duration-700 ease-out"></div>
  </div>

</section>

<?php get_footer(); ?>