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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<?php
	// get the current page url (used for rel canonical and open graph tags)
	global $current_url;
	$current_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" />

    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sm.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-med.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-lg.png" />	

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php include_once("analyticstracking.php") ?>

	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			

			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					
		<div id="hoy-menu" style="display:none">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'hoy-menu' ) ); ?>
		</div>
					<div style="float:left">	


						<span id="hoy-menunav" class="genericon genericon-menu"></span>
						<a href="<?php echo home_url(); ?>"><img class="nav-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hoy-logo.png"></a>
						<a class="screen-reader-text skip-link" href="#main" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen-child' ); ?>"><?php _e( 'Skip to content', 'twentythirteen-child' ); ?></a>
					</div>
					<div class="social-icons-nav">
						<a class="twitter_link" href="http://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo $current_url; ?>" target="_blank"><span class="genericon genericon-twitter"></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>" target="_blank"><span class="genericon genericon-facebook"></span></a>	
						<?php get_search_form(); ?>

					</div>	

				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->

		<div id="main" class="site-main">
