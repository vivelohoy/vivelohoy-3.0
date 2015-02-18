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
	<meta name="googlebot-news" content="noindex,nofollow" />
	<?php require( 'header-part-metatags.php' ); ?>

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php include_once("analyticstracking.php") ?>

	<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="full-container" style="margin: 0 auto; position: relative; width: 100%">
			<?php require( 'header-part-hamburgericon.php' ); ?>
			<div class="article-square-logo" style="padding: 0px 25px; display:block !important;">
				<a style="float:left;border-bottom: none; padding: 5.5px" href="<?php echo home_url() ?>">
					<img class="nav-logo" style="width: 35px; background: #F4F4F4; margin: 5px" src="<?php echo get_stylesheet_directory_uri();?>/images/square_logo.png">
				</a>
				<div class="patrocinado-nav-title">
					PATROCINADO
				</div>
				<?php require( 'header-part-compartelo.php' ); ?>
			</div>
		</div><!-- .site-header-inner -->
	</header><!-- #masthead -->

	<?php require( 'header-part-sidemenu.php' ); ?>