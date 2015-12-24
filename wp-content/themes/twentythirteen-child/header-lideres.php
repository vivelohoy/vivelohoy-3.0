<?php
/**
 * Lideres Header
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
    <title><?php wp_title( '- Emprendedor de Hoy', true, 'right' ); ?></title>
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

	<div id="page" class="hfeed">
		<header id="masthead" class="site-header" role="banner" style="background-color: #D5D5D5; box-shadow: 0px 1px 1px #C0C0C0;">
			<div class="site-header-inner full-container" style="max-width:100%">
				<?php require( 'header-part-hamburgericon.php' ); ?>

				<div class="site-branding">
					<a style="display: block; width: 120px; margin: 2px auto; border: none" href="<?php echo home_url() ?>">
						<img style="width:120px" src="http://vivelohoy.com/wp-content/themes/twentythirteen-child/assets/lider/lideres_sm.png">
					</a>
				</div>

				<?php require( 'header-part-search.php' ); ?>
			</div><!-- .site-header-inner -->
		</header><!-- #masthead -->

	<?php require( 'header-part-sidemenu.php' ); ?>