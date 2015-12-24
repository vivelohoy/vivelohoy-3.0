<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
</div>

<div style="margin: 70px auto; max-width:860px">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/405.jpg" alt="Error Cuatro-Cero-Cuatro..." width="100%">
					
				<div style="text-align:center">
					<h2 class="error404-search">Esto es algo vergonzoso ¿verdad?</h2>
					<p style="margin: 0 0 5px 0; padding:0 10px">Parece que no hay nada en este espacio. ¿Y si intentas una búsqueda?</p>
					<form role="search" method="get" class="search-form" action="http://vagrant.dev/">
						<label>
							<span class="screen-reader-text">Buscar:</span>
							<input type="search" class="search-field" placeholder="Buscar…" value="" name="s" title="Buscar:">
						</label>
					</form>
					
				</div>
</div>			

<?php get_footer(); ?>