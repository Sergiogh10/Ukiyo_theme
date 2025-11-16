<?php
/**
 * Plantilla 500 - Error interno del servidor
 */
get_header();
?>

<main
    style="
        /* espacio para el header fijo */
        margin-top: 100px;
        /* ocupa toda la altura visible */
        min-height: calc(100vh - 100px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
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
        <!-- Imagen -->
        <img 
            src="<?php echo get_template_directory_uri(); ?>/images/500.png" 
            alt="Error interno del servidor"
            style="
                max-width: 100%;
                height: auto;
                max-height: 550px;
                object-fit: contain;
                display: block;
                margin: 0 auto 30px auto;
                border-radius: 12px;
            "
        />
    </div>
</main>

<?php get_footer(); ?>