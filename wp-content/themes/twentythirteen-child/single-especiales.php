<?php
/**
 * Template for Especiales
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<?php require( 'header-part-metatags.php' ); ?>

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php include_once("analyticstracking.php") ?>

	<div id="page">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-inner full-container" style="max-width:100%">
				<?php require( 'header-part-hamburgericon.php' ); ?>
				<div>
					<a href="<?php echo home_url() ?>" style="  padding-top: 3px; border: none; left: 41px; position: absolute; display: inline-block;">
						<img class="nav-logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/hoy-logo.png">
					</a>
					<?php require( 'header-part-compartelo.php' ); ?>
				</div>
			</div><!-- .site-header-inner -->
		</header><!-- #masthead -->

		<?php require( 'header-part-sidemenu.php' ); ?>

		<div id="primary" class="content-area" style="height:100%; padding:0">

			<div class="enfoque-container">

				<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; ?>
			</div>



<?php get_footer('enfoque'); ?>