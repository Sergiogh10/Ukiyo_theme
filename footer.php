<?php
/**
 * Footer global de UKIYO
 */
?>
<footer class="bg-text-primary text-white py-16">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            
            <!-- Brand -->
            <div class="lg:col-span-2">
                <div class="flex items-center space-x-3 mb-6">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo/logoblanconuevo.png"
                             alt="<?php bloginfo('name'); ?> Logo"
                             class="h-8 md:h-10 w-auto" />
                    </a>
                </div>
                <p class="text-white/80 mb-6 max-w-md">
Viajes auténticos, sostenibles y creados a tu medida.                </p>
                <div class="flex flex-col space-y-3">
                    <a href="https://wa.me/message/XD2DTYOAKBIAJ1" target="_blank" class="flex items-center text-white/60 hover:text-accent transition-colors" aria-label="WhatsApp">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6 mr-2">
                            <path d="M16.72 14.84c-.23-.12-1.36-.67-1.57-.75-.21-.08-.36-.12-.52.12s-.6.75-.74.91c-.14.16-.27.18-.5.06-.23-.12-.97-.36-1.85-1.15-.68-.61-1.14-1.37-1.27-1.6-.13-.23-.01-.35.11-.47.11-.11.23-.27.35-.4.12-.13.16-.23.24-.39.08-.16.04-.3-.02-.42-.06-.12-.52-1.26-.72-1.72-.19-.46-.39-.4-.52-.41h-.44c-.14 0-.37.05-.57.27s-.75.73-.75 1.78.77 2.07.88 2.22c.11.15 1.51 2.3 3.66 3.22.51.22.91.35 1.22.45.51.16.98.14 1.35.08.41-.06 1.36-.55 1.55-1.08.19-.53.19-.99.13-1.08-.06-.09-.21-.14-.44-.26z"/>
                            <path d="M12 2C6.48 2 2 6.49 2 12a9.93 9.93 0 0 0 1.69 5.53L2 22l4.63-1.68A9.93 9.93 0 0 0 12 22c5.52 0 10-4.49 10-10S17.52 2 12 2zm0 17.5c-1.69 0-3.26-.5-4.59-1.36l-.33-.21-2.73.99.94-2.66-.22-.34A7.48 7.48 0 0 1 4.5 12c0-4.14 3.36-7.5 7.5-7.5S19.5 7.86 19.5 12 16.14 19.5 12 19.5z"/>
                        </svg>
                        <span>Pregúntanos tus dudas</span>
                    </a>
                    <a href="mailto:info@viajesukiyo.com" class="flex items-center text-white/60 hover:text-accent transition-colors" aria-label="Correo">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6 mr-2">
                            <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        <span>info@viajesukiyo.com</span>
                    </a>
                   <!-- <a href="https://instagram.com/ukiyo.oficial" target="_blank" class="flex items-center text-white/60 hover:text-accent transition-colors" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6 mr-2">
                            <path d="M7.001 2C4.243 2 2 4.243 2 7.001v9.998C2 19.757 4.243 22 7.001 22h9.998C19.757 22 22 19.757 22 17V7.001C22 4.243 19.757 2 17 2H7.001zM20 17c0 1.654-1.346 3-3.001 3H7.001A3.004 3.004 0 0 1 4 17V7.001C4 5.346 5.346 4 7.001 4H17C18.654 4 20 5.346 20 7.001V17z"/>
                            <path d="M12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 8.001A3.001 3.001 0 1 1 12 9a3.001 3.001 0 0 1 0 6.001zM17.5 6a1.5 1.5 0 1 1-3.001 0A1.5 1.5 0 0 1 17.5 6z"/>
                        </svg>
                        <span>Instagram</span>
                    </a> -->
                </div>
            </div>

            <!-- Experiencias -->
            <div>
                <h4 class="font-crimson text-lg mb-4">Destinos</h4>
                <ul class="space-y-2 text-white/80">
                    <li><a href="<?php echo esc_url( site_url('/indonesia') ); ?>" class="hover:text-accent transition-colors">Indonesia</a></li>
                    <li><a href="<?php echo esc_url( site_url('/costarica') ); ?>" class="hover:text-accent transition-colors">Costa Rica</a></li>
                    <li><a href="<?php echo esc_url( site_url('/marruecos') ); ?>" class="hover:text-accent transition-colors">Marruecos</a></li>
                    <li><a href="<?php echo esc_url( site_url('/colombia') ); ?>" class="hover:text-accent transition-colors">Colombia</a></li>
                </ul>
            </div>

            <!-- Compañía -->
            <div>
                <h4 class="font-crimson text-lg mb-4">Compañía</h4>
                <ul class="space-y-2 text-white/80">
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_path('nosotros') ) ); ?>" class="hover:text-accent transition-colors">Nosotros</a></li>
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_path('experiencias') ) ); ?>" class="hover:text-accent transition-colors">Destinos</a></li>
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_path('viajes-de-autor') ) ); ?>" class="hover:text-accent transition-colors">Viajes de autor</a></li>
                   <!-- <li><a href="<?php echo esc_url( site_url('/sustainability') ); ?>" class="hover:text-accent transition-colors">Sostenibilidad</a></li> -->
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_path('pricing') ) ); ?>" class="hover:text-accent transition-colors">Precios</a></li>
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" class="hover:text-accent transition-colors">Reseñas</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/20 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-white/60 text-sm">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('privacidad') ) ); ?>" class="text-white/60 hover:text-accent text-sm transition-colors">Privacidad</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('terminos') ) ); ?>" class="text-white/60 hover:text-accent text-sm transition-colors">Términos</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path('cookies') ) ); ?>" class="text-white/60 hover:text-accent text-sm transition-colors">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>