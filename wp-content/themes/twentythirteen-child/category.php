<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header('category'); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="margin: 0 auto">
			
<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
			<div id="top-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="1"></div>
<?php endif; // End if ( $ADS_ENABLED ) ?>	
			
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php include_once("home-loop.php") ?>
			
			<?php
		        if (function_exists(custom_pagination)) {
		        	custom_pagination($custom_query->max_num_pages,"",$paged);
		        }
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>	     
			<div id="bottom-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="4"></div> 
<?php endif; // End if ( $ADS_ENABLED ) ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>