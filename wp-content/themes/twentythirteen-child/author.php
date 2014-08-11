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

get_header(); ?>

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
					<div style="float: left; text-align: left; max-width: 915px;">
						<h1 style="margin:0"><?php printf(get_the_author()); ?>
						</h1>
						<p style="font-family: 'Helvetica', Helvetica, Arial, 'Lucida Grande', sans-serif; float: left">
							<?php the_author_meta('description'); ?>
							<br>
							<?php 
							
								$google_profile = get_the_author_meta( 'google_profile' );
								if ( $google_profile && $google_profile != '' ) {
									echo '<a href="' . esc_url($google_profile) . '" rel="author"><span class="genericon genericon-googleplus"></span></a>';
								}
								
								$twitter_profile = get_the_author_meta( 'twitter_profile' );
								if ( $twitter_profile && $twitter_profile != '' ) {
									echo '<a href="' . esc_url($twitter_profile) . '"><span class="genericon genericon-twitter"></a>';
								}
								
								$facebook_profile = get_the_author_meta( 'facebook_profile' );
								if ( $facebook_profile && $facebook_profile != '' ) {
									echo '<a href="' . esc_url($facebook_profile) . '"><span class="genericon genericon-facebook"></span></a>';
								}
								
								$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
								if ( $linkedin_profile && $linkedin_profile != '' ) {
									echo '<a href="' . esc_url($linkedin_profile) . '"><span class="genericon genericon-linkedin-alt"></span></a>';
								}
							?>
							<a href="mailto:<?php echo get_the_author_meta('user_email'); ?>"><?php the_author_meta('user_email'); ?></a>
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
			<!-- BOTTOM LEADERBOARD AD 	
				<div id="bottomleaderboard-post">
					<iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe>
				</div>
			BOTTOM LEADERBOARD AD -->
			
			

<?php get_footer(); ?>