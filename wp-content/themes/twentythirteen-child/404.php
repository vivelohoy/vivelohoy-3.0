<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div>
				<div class="page-content">
					<h1>Lo sentimos, la página que buscas no está disponible.</h1>
					<p><?php _e( 'La página que intentas ver no fue encontrada en nuestros servidores, 
						es posible que el contenido no exista o se ha mudado. Si llegaste a esta página 
						a través de un enlace incorrecto te sugerimos intentes una búsqueda o regreses 
						a la página principal donde encontraras un amplio contenido incluyendo, 
						artículos, videos, gallerías y mucho más. Gracias por tu preferencia', 
						'twentythirteen' ); ?>
					</p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>