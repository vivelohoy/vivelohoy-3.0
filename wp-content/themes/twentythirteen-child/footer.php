<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer class="entry-meta">
				<div id="footer-content">
						© <?php echo date("Y"); ?> Hoy
			            <a href="/about-vivelohoy/"> Acerca de nosotros</a>
			            <a href="/advertise"> Advertise</a>
			            <a href="http://www.tribpub.com/terminos-de-servicio-principales/"> Términos de servicio (actualizada)</a>
			 			<a href="http://www.tribpub.com/politica-de-privacidad/"> Política de privacidad (actualizada)</a>
				</div>
			</footer><!-- #colophon -->
	</div><!-- #page -->
	<?php render_omniture_tag(); ?>
	<?php wp_footer(); ?>
</body>
</html>