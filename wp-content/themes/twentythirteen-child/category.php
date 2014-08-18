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

			<div id="topleaderboard-post" class="topleaderboard-home">
				<?php 
					global $section_front_ad_tag_ids;
					$category_string = get_category_string();
					print_ad_tag($section_front_ad_tag_ids[$category_string][1]);
				?>
			</div>
			
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1><?php printf( __( '%s', 'twentythirteen' ), single_cat_title( '', false ) ); ?></h1>

				<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?><hr>
			</header><!-- .archive-header -->

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

			<div id="bottomleaderboard-post">
				<?php 
					global $section_front_ad_tag_ids;
					$category_string = get_category_string();
					print_ad_tag($section_front_ad_tag_ids[$category_string][4]);
				?>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>