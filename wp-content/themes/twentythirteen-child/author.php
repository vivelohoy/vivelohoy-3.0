<?php
/**
 * The template for displaying Author archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header('author'); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php
				/*
				 * Queue the first post, that way we know what author
				 * we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>

			<header class="archive-header" style="text-align: center; margin-top: 37px">	
				<div style="display: inline-block">	
					<div class="hoy-avatar" style="float: left; margin-right:10px"><?php echo get_avatar( get_the_author_meta('email'), '120' ); ?></div>	
					<div class="author-head">
						<h1 style="margin:0"><?php printf(get_the_author()); ?>
						</h1>
						<p>
							<?php the_author_meta('description'); ?>
							<br>
							<a href="mailto:<?php echo get_the_author_meta('user_email'); ?>"><span class="genericon genericon-mail" style="margin-right: 10px"></span></a>
						
							<?php 
								
								$twitter_profile = get_the_author_meta( 'twitter_profile' );
								if ( $twitter_profile && $twitter_profile != '' ) {
									echo '<a href="' . esc_url($twitter_profile) . '" target=”_blank”><span class="genericon genericon-twitter"></a>';
								}
								
								$facebook_profile = get_the_author_meta( 'facebook_profile' );
								if ( $facebook_profile && $facebook_profile != '' ) {
									echo '<a href="' . esc_url($facebook_profile) . '" target=”_blank”><span class="genericon genericon-facebook"></span></a>';
								}

								$google_profile = get_the_author_meta( 'google_profile' );
								if ( $google_profile && $google_profile != '' ) {
									echo '<a href="' . esc_url($google_profile) . '" rel="author" target=”_blank”><span class="genericon genericon-googleplus"></span></a>';
								}
								
								$instagram_profile = get_the_author_meta( 'instagram_profile' );
								if ( $instagram_profile && $instagram_profile != '' ) {
									echo '<a href="' . esc_url($instagram_profile) . '" target=”_blank”><span class="genericon genericon-instagram"></span></a>';
								}
							?>
							</p>
					</div>
				</div>	
			</header>
			<hr style="width: 75%; margin: 0 auto">


			<?php
				/*
				 * Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>

			<div class="author-page"><style type="text/css">.author-meta {padding-left: 0;}</style>			
				<?php include_once("home-loop.php") ?>
			</div> <!-- End div style="overflow: hidden;" -->


			<?php
			        if (function_exists(custom_pagination)) {
			          custom_pagination($custom_query->max_num_pages,"",$paged);
			        }
			?>

			<?php else : // If not have_posts() for the whole author page ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; // End if ( have_posts() ) for the whole author page ?>
			<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
			<!-- BOTTOM LEADERBOARD AD -->	
				<div id="bottom-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="4"></div> 
			<!-- BOTTOM LEADERBOARD AD -->
			<?php endif; // End if ( $ADS_ENABLED ) ?>
<?php get_footer(); ?>