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
	<meta charset="<?php bloginfo( 'charset' ); ?>" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/ui-icons/css/font-awesome.min.css">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="hfeed site">

		<header id="masthead" class="site-header" role="banner">

			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<a class="nav-brand" 
					   href="<?php echo esc_url( home_url( '/' ) ); ?>" 
					   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
					   rel="home">
						   <?php bloginfo( 'name' ); ?>
					</a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container' => false ) ); ?>
					<?php get_search_form(); ?>
					<h3 class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></h3>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->

		</header><!-- #masthead -->


		<div id="main" class="site-main">

