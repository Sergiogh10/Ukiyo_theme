<?php
get_header();
?>

<main class="container mx-auto py-16">
    <h1>PLANTILLA GENERAL VIAJE_AUTOR</h1>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <div><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
</main>

<?php
get_footer();