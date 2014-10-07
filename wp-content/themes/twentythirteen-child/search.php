<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header('home'); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			
<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
			<div id="top-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="1"></div>
<?php endif; // End if ( $ADS_ENABLED ) ?>	

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h2><?php printf( __( 'Search Results for: %s', 'twentythirteen-child' ), get_search_query() ); ?></h2>
				<hr>
			</header>

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

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>