<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
	
<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>			
			<!-- TOP LEADERBOARD AD -->	
			<?php if ( 'gallery' !== get_post_format() ) : // Anything but a gallery post type ?>
				<div id="topleaderboard-post">
					<div id="desktop-ad-top-leaderboard">
					    <script type='text/javascript'>
					        googletag.cmd.push(function() { googletag.display("desktop-ad-top-leaderboard"); });
					    </script>
					</div> 
				</div>
			<?php endif; // get_post_format() ?>
			<!-- TOP LEADERBOARD AD -->
<?php endif; // End if ( $ADS_ENABLED ) ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>	
			<?php endwhile; ?>
			<?php twentythirteen_post_nav(); ?>
			
<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>	
			<!-- BOTTOM LEADERBOARD AD -->
			<?php if ( 'gallery' !== get_post_format() ) : // Anything but a gallery post type ?>
				<div id="bottomleaderboard-post">
					<div id="desktop-ad-bottom-leaderboard">
					    <script type='text/javascript'>
					        googletag.cmd.push(function() { googletag.display("desktop-ad-bottom-leaderboard"); });
					    </script>
					</div> 
				</div>
			<?php endif; // get_post_format() ?>
			<!-- BOTTOM LEADERBOARD AD -->
<?php endif; // End if ( $ADS_ENABLED ) ?>

			<script>
			var is_gallery = <?php if ( 'gallery' === get_post_format() ) : ?>true<?php else: ?>false<?php endif; ?>;
			</script>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>