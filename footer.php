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
                <div class="flex space-x-4">
                    <!-- <a href="https://twitter.com" target="_blank" class="text-white/60 hover:text-accent transition-colors" aria-label="Twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6">
                            <path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 
                                    1.014-.611 1.794-1.574 2.163-2.724 
                                    -.951.555-2.005.959-3.127 1.184 
                                    -.897-.959-2.178-1.555-3.594-1.555 
                                    -2.717 0-4.924 2.208-4.924 4.924 
                                    0 .39.045.765.127 1.124 
                                    -4.09-.205-7.719-2.165-10.148-5.144 
                                    -.424.729-.666 1.577-.666 2.475 
                                    0 1.708.87 3.213 2.188 4.096 
                                    -.807-.026-1.566-.248-2.229-.616v.061 
                                    c0 2.385 1.693 4.374 3.946 4.827 
                                    -.413.111-.849.171-1.296.171 
                                    -.317 0-.626-.03-.928-.086 
                                    .627 1.956 2.444 3.377 4.6 3.418 
                                    -1.68 1.318-3.809 2.107-6.102 2.107 
                                    -.397 0-.79-.023-1.175-.067 
                                    2.179 1.397 4.768 2.212 7.557 2.212 
                                    9.054 0 14-7.496 14-13.986 
                                    0-.21 0-.423-.015-.634 
                                    .962-.695 1.8-1.562 2.46-2.549z"/>
                        </svg>
                    </a>
                    <a href="https://facebook.com" target="_blank" class="text-white/60 hover:text-accent transition-colors" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6">
                            <path d="M22.675 0h-21.35C.6 0 0 .6 0 1.337v21.326C0 
                                23.4.6 24 1.325 24H12.82V14.708h-3.13v-3.62h3.13V8.41
                                c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.464.099 2.797.143v3.24h-1.92
                                c-1.505 0-1.796.716-1.796 1.764v2.313h3.59l-.467 3.62h-3.123V24h6.127
                                c.727 0 1.325-.6 1.325-1.337V1.337C24 .6 23.402 0 22.675 0z"/>
                        </svg>
                    </a> -->
                   <a href="https://instagram.com/ukiyo.oficial" target="_blank" class="text-white/60 hover:text-accent transition-colors" aria-label="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6">
                        <path d="M7.001 2C4.243 2 2 4.243 2 7.001v9.998C2 19.757 4.243 22 7.001 22h9.998C19.757 22 22 19.757 22 17V7.001C22 4.243 19.757 2 17 2H7.001zM20 17c0 1.654-1.346 3-3.001 3H7.001A3.004 3.004 0 0 1 4 17V7.001C4 5.346 5.346 4 7.001 4H17C18.654 4 20 5.346 20 7.001V17z"/>
                        <path d="M12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 8.001A3.001 3.001 0 1 1 12 9a3.001 3.001 0 0 1 0 6.001zM17.5 6a1.5 1.5 0 1 1-3.001 0A1.5 1.5 0 0 1 17.5 6z"/>
                    </svg>
                    </a>
                </div>
            </div>

            <!-- Experiencias -->
            <div>
                <h4 class="font-crimson text-lg mb-4">Experiencias</h4>
                <ul class="space-y-2 text-white/80">
                    <li><a href="<?php echo esc_url( site_url('/experiences') ); ?>" class="hover:text-accent transition-colors">Transformación cultural</a></li>
                    <li><a href="<?php echo esc_url( site_url('/sustainability') ); ?>" class="hover:text-accent transition-colors">Renovación natural</a></li>
                    <li><a href="<?php echo esc_url( site_url('/experiences') ); ?>" class="hover:text-accent transition-colors">Alegría vibrante</a></li>
                    <li><a href="<?php echo esc_url( site_url('/experiences') ); ?>" class="hover:text-accent transition-colors">Misterio sensorial</a></li>
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