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
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo/logoblanco.png"
                             alt="<?php bloginfo('name'); ?> Logo"
                             class="h-8 md:h-10 w-auto" />
                    </a>
                </div>
                <p class="text-white/80 mb-6 max-w-md">
Viajes auténticos, sostenibles y creados a tu medida.                </p>
                <div class="flex space-x-4">
                    <a href="https://twitter.com" target="_blank" class="text-white/60 hover:text-accent transition-colors" aria-label="Twitter">
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
                    </a>
                    <a href="https://github.com" target="_blank" class="text-white/60 hover:text-accent transition-colors" aria-label="GitHub">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 
                                    1.366.062 2.633.35 3.608 1.325.975.975 
                                    1.262 2.242 1.324 3.608.058 1.266.07 
                                    1.646.07 4.85s-.012 3.584-.07 4.85c-.062 
                                    1.366-.35 2.633-1.324 3.608-.975.975 
                                    -2.242 1.262-3.608 1.324-1.266.058-1.646.07
                                    -4.85.07s-3.584-.012-4.85-.07c-1.366-.062
                                    -2.633-.35-3.608-1.324-.975-.975-1.262-2.242
                                    -1.324-3.608C2.175 15.747 2.163 15.367 2.163 
                                    12s.012-3.584.07-4.85c.062-1.366.35-2.633 
                                    1.324-3.608.975-.975 2.242-1.262 3.608-1.324
                                    1.266-.058 1.646-.07 4.85-.07M12 0C8.741 
                                    0 8.333.013 7.052.072 5.771.131 4.659.478 
                                    3.757 1.38 2.855 2.282 2.508 3.394 2.449 
                                    4.675 2.39 5.956 2.377 6.364 2.377 12s.013 
                                    6.044.072 7.325c.059 1.281.406 2.393 
                                    1.308 3.295.902.902 2.014 1.249 3.295 1.308 
                                    1.281.059 1.689.072 7.325.072s6.044-.013 
                                    7.325-.072c1.281-.059 2.393-.406 3.295-1.308 
                                    .902-.902 1.249-2.014 1.308-3.295.059-1.281.072 
                                    -1.689.072-7.325s-.013-6.044-.072-7.325c-.059
                                    -1.281-.406-2.393-1.308-3.295C21.393.478 
                                    20.281.131 19 .072 17.719.013 17.311 0 12 0zm0 
                                    5.838A6.162 6.162 0 0 0 5.838 12 6.162 6.162 
                                    0 0 0 12 18.162 6.162 6.162 0 0 0 18.162 12 
                                    6.162 6.162 0 0 0 12 5.838zm0 10.162a4 
                                    4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 
                                    1.44 0 1 1-2.881 0 1.44 1.44 0 0 1 2.881 0z"/>
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
                   <!-- <li><a href="<?php echo esc_url( site_url('/sustainability') ); ?>" class="hover:text-accent transition-colors">Sostenibilidad</a></li> -->
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_path('pricing') ) ); ?>" class="hover:text-accent transition-colors">Precios</a></li>
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_path('resenas') ) ); ?>" class="hover:text-accent transition-colors">Reseñas</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/20 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-white/60 text-sm">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="<?php echo esc_url( site_url('/privacy') ); ?>" class="text-white/60 hover:text-accent text-sm transition-colors">Privacidad</a>
                <a href="<?php echo esc_url( site_url('/terms') ); ?>" class="text-white/60 hover:text-accent text-sm transition-colors">Términos</a>
                <a href="<?php echo esc_url( site_url('/cookies') ); ?>" class="text-white/60 hover:text-accent text-sm transition-colors">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>