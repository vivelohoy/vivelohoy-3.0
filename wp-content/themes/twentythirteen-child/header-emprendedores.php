<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
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

	<div id="page" class="hfeed">
		<header id="masthead" class="site-header" role="banner" style="background-color: #d5d5d5; box-shadow: 0px 1px 1px #C0C0C0;">
			<div class="site-header-inner full-container" style="max-width:100%">
				<?php require( 'header-part-hamburgericon.php' ); ?>

				<div class="site-branding">
					<a style="display: block; width: 200px; margin: 2px auto; border: none" href="<?php echo home_url() ?>">
						<img style="width: 200px;" src="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/images/emprendedores.png">
					</a>
				</div>

				<?php require( 'header-part-search.php' ); ?>
			</div><!-- .site-header-inner -->
		</header><!-- #masthead -->

	<?php require( 'header-part-sidemenu.php' ); ?>