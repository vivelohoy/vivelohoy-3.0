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
		<?php require( 'footer-part-nav.php' ); ?>
	</div><!-- #page -->
	<?php render_omniture_tag(); ?>
	<?php wp_footer(); ?>

	<!-- Simpli.fi Pixel -->
	<script async src="https://i.simpli.fi/dpx.js?cid=23231&action=100&segment=hoyllc&m=1&sifi_tuid=9736"></script>

</body>
</html>