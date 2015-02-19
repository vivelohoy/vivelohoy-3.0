        <div id="toggle-sidebar">
            <button id="menu-close"></button>
            <div class="menu-wrapper">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'hoy-menu', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
            </div>
            <footer class="entry-meta">
                <div>
                    <div style="text-align:center; font-family:helvetica; font-weight:300; letter-spacing:0.5px; height:30px">Síganos en:</div>
                    <div style="height: 42px; text-align:center">
                        <a href="https://twitter.com/vivelohoy" target="_blank" style="padding-right:10px; border: none;"><span class="genericon genericon-twitter" style="color: #55acee"></span></a>
                        <a href="https://www.facebook.com/HoyMedia" style="padding-right:20px; border: none;" target="_blank"><span class="genericon genericon-facebook" style="margin-right: 5px; color:#3b5998"></span></a>   
                        <a href="http://instagram.com/vivelohoy" style="padding-right:10px;border: none;"><span class="genericon genericon-instagram" style="color: #3f729b"></span></a>
                        <a href="https://www.youtube.com/user/VIVELOHOY" style="border: none;"><span class="genericon genericon-youtube" style="color:#b31217;"></span></a>
                    </div>
                </div>
                    <div id="footer-content" style="border-top:1px solid #E6E6E6">
                    ©<?php echo date("Y"); ?> Hoy<br>
                    <a href="/about-vivelohoy/"> Acerca de nosotros</a>
                    <a href="/advertise"> Advertise</a>
                    <a href="http://www.tribpub.com/terminos-de-servicio-principales/"> Términos de servicio (actualizada)</a>
                    <a href="http://www.tribpub.com/politica-de-privacidad/"> Política de privacidad (actualizada)</a>
                </div>
            </footer>
        </div>