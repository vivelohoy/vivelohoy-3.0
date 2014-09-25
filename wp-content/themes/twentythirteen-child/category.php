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
		<div id="content" class="site-content" role="main" style="max-width: 960px; margin: 0 auto">
		<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
			<div id="topleaderboard-post" class="topleaderboard-home">
				<div id="desktop-ad-top-leaderboard">
				    <script type='text/javascript'>
				        googletag.cmd.push(function() { googletag.display("desktop-ad-top-leaderboard"); });
				    </script>
				</div> 
			</div>
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
			<div id="bottomleaderboard-post">
				<div id="desktop-ad-bottom-leaderboard">
				    <script type='text/javascript'>
				        googletag.cmd.push(function() { googletag.display("desktop-ad-bottom-leaderboard"); });
				    </script>
				</div> 
			</div>
		<?php endif; // End if ( $ADS_ENABLED ) ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>