<?php
/**
 * Plantilla 404 - Página no encontrada
 */
get_header();
?>

<main
    style="
        /* deja espacio para el header fijo (ajusta según su altura real) */
        margin-top: 100px;
        /* ocupa toda la pantalla visible menos el header */
        min-height: calc(100vh - 100px);
        /* centra el contenido completamente */
        display: flex;
        align-items: center;
        justify-content: center;
        /* espacio adicional por si acaso */
        padding: 40px;
        /* color de fondo de tu sitio */
        background-color: var(--color-background, #fefcf8);
        box-sizing: border-box;
    "
>
    <div
        style="
            text-align: center;
            max-width: 900px;
            width: 100%;
            padding: 20px;
        "
    >
        <img 
            src="<?php echo get_template_directory_uri(); ?>/images/404.png" 
            alt="Página no encontrada"
            style="
                max-width: 100%;
                height: auto;
                max-height: 550px;
                object-fit: contain;
                display: block;
                margin: 0 auto;
                border-radius: 12px;
            "
        />
    </div>
</main>

<?php get_footer(); ?>