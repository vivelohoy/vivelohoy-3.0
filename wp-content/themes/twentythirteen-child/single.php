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
				<div id="top-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="1"></div>
			<?php endif; // get_post_format() ?>
			<!-- TOP LEADERBOARD AD -->
<?php endif; // End if ( $ADS_ENABLED ) ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>	
			<?php endwhile; ?>
			<hr><br>
			<?php comments_template(); ?>
			<?php twentythirteen_post_nav(); ?>
			
<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>	
			<!-- BOTTOM LEADERBOARD AD -->
			<?php if ( 'gallery' !== get_post_format() ) : // Anything but a gallery post type ?>
				<div id="bottom-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="3"></div> 
			<?php endif; // get_post_format() ?>
			<!-- BOTTOM LEADERBOARD AD -->
<?php endif; // End if ( $ADS_ENABLED ) ?>

			<script>
			var is_gallery = <?php if ( 'gallery' === get_post_format() ) : ?>true<?php else: ?>false<?php endif; ?>;
			</script>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>