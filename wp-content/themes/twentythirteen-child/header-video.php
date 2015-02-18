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
<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
	<?php
		if ( 'gallery' !== get_post_format() ) {
			print_ad_script("story");
		} else {
			print_ad_script("photo gallery");
		}
	?>
<?php endif; // End if ( $ADS_ENABLED ) ?>
</head>

<body <?php body_class(); ?>>
	<?php include_once("analyticstracking.php") ?>

	<div id="page" class="hfeed site" style="background-color: #f5f5f5">
		<header id="masthead" class="site-header" role="banner" style="background-color: #f5f5f5; box-shadow: 0px 1px 1px #C0C0C0;">
			<div class="site-header-inner full-container" style="max-width:100%">
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
				<div class="video-hoy-logo">
					<a href="<?php echo home_url() ?>">
						<img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/hoy-logo.png">
					</a>
				</div>
				<div class="video-logo-mobile">
					<a href="<?php echo home_url() ?>">
						<img src="<?php echo get_stylesheet_directory_uri();?>/images/square_logo.png">
					</a>
				</div>
				<?php require( 'header-part-compartelo.php' ); ?>
			</div><!-- .site-header-inner -->
		</header><!-- #masthead -->

		<?php require( 'header-sidemenu.php' ); ?>