<?php 
/**
 * The homepage template
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php if ( have_posts() ) : ?>

		<div style="margin: 10px auto; width: 100%; text-align: center">
    		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hoy-logo.png" style="padding: 10px;max-width: 500px; width: 100%">
			<p style="margin: 2px 0 1em 0; display: block; font-family: 'Helvetica', Helvetica, Arial, 'Lucida Grande', sans-serif; font-weight: 300">Últimas noticias locales, nacionales e internacionales desde Chicago.</p>
			<hr>
		</div>
		
			<?php /* The loop */ ?>
			<?php include_once("home-loop.php") ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>