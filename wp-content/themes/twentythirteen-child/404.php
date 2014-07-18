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
					<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentythirteen-child' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen-child' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->


		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>