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
    <?php print_ad_script("home page"); ?>
</head>

<body <?php body_class(); ?>>
	<?php include_once("analyticstracking.php") ?>

	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-inner full-container">
				<?php require( 'header-part-hamburgericon.php' ); ?>
				<div class="site-branding">
					<a href="<?php echo home_url() ?>">
						<img class="nav-logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/hoy-logo.png">
					</a>
				</div>
				<?php require( 'header-part-video.php' ); ?>
				<?php require( 'header-part-search.php' ); ?>
			</div><!-- .site-header-inner -->
		</header><!-- #masthead -->

		<?php require( 'header-part-sidemenu.php' ); ?>

		<style>
			@media (max-width: 400px) {
				.video-btn-wrap {
			 	 right: 36px;
			 	 left: initial;
			 	 display: block;
				}
				.site-branding a {
				float: left;
				}
			}
		</style>