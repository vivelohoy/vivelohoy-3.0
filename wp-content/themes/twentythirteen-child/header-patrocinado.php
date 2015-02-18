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
	<meta name="googlebot-news" content="noindex,nofollow" />
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
		<div class="full-container" style="margin: 0 auto; position: relative; width: 100%">
			<button id="menu-toggle" class="toggle">
				<svg version="1.1" class="menu-toggle-image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
					<g id="menu">
						<g>
							<rect x="3" y="4" width="18" height="3"/>
							<rect x="3" y="10" width="18" height="3"/>
							<rect x="3" y="16" width="18" height="3"/>
						</g>
					</g>
				</svg>
			</button>
			<div class="article-square-logo" style="padding: 0px 25px; display:block !important;">
				<a style="float:left;border-bottom: none; padding: 5.5px" href="<?php echo home_url() ?>">
					<img class="nav-logo" style="width: 35px; background: #F4F4F4; margin: 5px" src="<?php echo get_stylesheet_directory_uri();?>/images/square_logo.png">
				</a>
				<div class="patrocinado-nav-title">
					PATROCINADO
				</div>
				<div style="position: absolute; top: 10px; right: 0">
						<div class="compartelo">COMPÁRTELO: </div>
							<?php
							$facebook_share_link = "https://www.facebook.com/sharer/sharer.php?u=";
							$facebook_share_link .= urlencode(get_permalink());
							?>
							<a class="twitter-share-link" href="" target="_blank" style="border-bottom: none">
								<span class="genericon genericon-twitter" style="color: #55acee; margin: 0; width: 35px"></span>
							</a>
							<a href="<?php echo $facebook_share_link; ?>" target="_blank" style="border-bottom: none">
								<span class="genericon genericon-facebook" style="margin-right: 0; color:#3b5998; width: 35px"></span>
							</a>
					</div>
				</div>
			</div>
		</div><!-- .site-header-inner -->
	</header><!-- #masthead -->

	<?php require( 'header-sidemenu.php' ); ?>