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
	
		
			<!-- TOP LEADERBOARD AD -->	
			<?php if ( 'gallery' !== get_post_format() ) : // Anything but a gallery post type ?>
				<div id="topleaderboard-post">
				<?php 
					global $regular_story_ad_tag_ids;
					$category_string = get_category_string();
					print_ad_tag($regular_story_ad_tag_ids[$category_string][1]);
				?>
				</div>
			<?php endif; // get_post_format() ?>
			<!-- TOP LEADERBOARD AD -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>	
			<?php endwhile; ?>
			<?php twentythirteen_post_nav(); ?>
			

			<!-- BOTTOM LEADERBOARD AD -->
			<?php if ( 'gallery' !== get_post_format() ) : // Anything but a gallery post type ?>
				<div id="bottomleaderboard-post">
				<?php 
					global $regular_story_ad_tag_ids;
					$category_string = get_category_string();
					print_ad_tag($regular_story_ad_tag_ids[$category_string][2]);
				?>
				</div>
			<?php endif; // get_post_format() ?>
			<!-- BOTTOM LEADERBOARD AD -->

			<script>
			var is_gallery = <?php if ( 'gallery' === get_post_format() ) : ?>true<?php else: ?>false<?php endif; ?>;
			</script>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>