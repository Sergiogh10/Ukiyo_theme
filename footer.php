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
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier"> 
                                <path d="M2 22L3.41152 16.8691C2.54422 15.3639 2.08876 13.6568 2.09099 11.9196C2.08095 6.44549 6.52644 2 11.99 2C14.6417 2 17.1315 3.02806 19.0062 4.9034C19.9303 5.82266 20.6627 6.91616 21.1611 8.12054C21.6595 9.32492 21.9139 10.6162 21.9096 11.9196C21.9096 17.3832 17.4641 21.8287 12 21.8287C10.3368 21.8287 8.71374 21.4151 7.26204 20.6192L2 22ZM7.49424 18.8349L7.79675 19.0162C9.06649 19.7676 10.5146 20.1644 11.99 20.1654C16.5264 20.1654 20.2263 16.4662 20.2263 11.9291C20.2263 9.73176 19.3696 7.65554 17.8168 6.1034C17.0533 5.33553 16.1453 4.72636 15.1453 4.31101C14.1452 3.89565 13.0728 3.68232 11.99 3.68331C7.44343 3.6839 3.74476 7.38316 3.74476 11.9202C3.74476 13.4724 4.17843 14.995 5.00502 16.3055L5.19645 16.618L4.35982 19.662L7.49483 18.8354L7.49424 18.8349Z" fill="#c0c0c0"></path> 
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.52024 7.76662C9.33885 7.35303 9.13737 7.34298 8.96603 7.34298C8.81477 7.33294 8.65288 7.33294 8.48154 7.33294C8.32083 7.33294 8.04845 7.39321 7.81684 7.64549C7.58464 7.89719 6.95007 8.49217 6.95007 9.71167C6.95007 10.9318 7.83693 12.1111 7.95805 12.2724C8.07858 12.4337 9.67149 15.0139 12.192 16.0124C14.2883 16.839 14.712 16.6777 15.1657 16.6269C15.6189 16.5767 16.6275 16.0325 16.839 15.4476C17.0405 14.8733 17.0405 14.3693 16.9802 14.2682C16.9199 14.1678 16.748 14.1069 16.5064 13.9758C16.2541 13.8552 15.0446 13.2502 14.813 13.1693C14.5808 13.0889 14.4195 13.0487 14.2582 13.2904C14.0969 13.5427 13.623 14.0969 13.4724 14.2582C13.3306 14.4195 13.1799 14.4396 12.9377 14.3185C12.686 14.1979 11.8895 13.9356 10.9418 13.0889C10.2056 12.4331 9.71167 11.6171 9.56041 11.3755C9.41979 11.1232 9.54032 10.992 9.67149 10.8709C9.78257 10.7604 9.92378 10.579 10.0449 10.4378C10.1654 10.296 10.2056 10.1855 10.2966 10.0242C10.377 9.86292 10.3368 9.71167 10.2765 9.59114C10.2157 9.48006 9.74239 8.25997 9.52024 7.76603V7.76662Z" fill="#c0c0c0"></path> 
                            </g>
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