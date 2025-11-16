<?php
/**
 * Plantilla 403 - Acceso prohibido
 */
get_header();
?>

<main
    style="
        /* deja espacio para el header fijo */
        margin-top: 100px;
        /* ocupa toda la pantalla visible menos el header */
        min-height: calc(100vh - 100px);
        /* centra el contenido */
        display: flex;
        align-items: center;
        justify-content: center;
        /* añade aire alrededor */
        padding: 40px;
        background-color: var(--color-background, #fefcf8);
        box-sizing: border-box;
    "
>
    <div
        style="vale 
            text-align: center;
            max-width: 900px;
            width: 100%;
            padding: 20px;
        "
    >
        <img 
            src="<?php echo get_template_directory_uri(); ?>/images/403.png" 
            alt="Acceso prohibido"
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