<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
</div><div style="margin: 30px auto">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404.jpg" alt="Error Cuatro-Cero-Cuatro..." width="100%">
					
				<div class="page-content">
					<h2 class="error404-search"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentythirteen-child' ); ?></h2>
					<p style="margin: 0 0 5px 0"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen-child' ); ?></p>
					
						<?php get_search_form(); ?>
					
				</div><!-- .page-content -->
			

<?php get_footer(); ?>