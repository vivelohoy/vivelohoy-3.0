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

	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-inner full-container" style="max-width:100%">
				<?php require( 'header-part-hamburgericon.php' ); ?>
				<div class="site-branding topmenu">
					<a href="<?php echo home_url() ?>">
						<img class="nav-logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/hoy-logo.png">
					</a>
					<?php require( 'header-part-search.php' ); ?>
				</div>
				<div class="bottomMenu article-square-logo">
					<a style="border-bottom: none; padding: 5px; position: absolute; top: 3.5px; left: 31px;" href="<?php echo home_url() ?>">
						<img class="nav-logo" style="width: 35px; background: #F4F4F4;" src="<?php echo get_stylesheet_directory_uri();?>/images/square_logo.png">
					</a>
					<div class="bottomMenu nav-cat mobile-cat">
						<?php $category = get_the_category(); if($category[0]){echo '<a style="text-transform: uppercase; color: #ee3527; border-bottom: none" href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';}?> <?php echo get_the_title(); ?>
					</div>
					<?php require( 'header-part-compartelo.php' ); ?>
				</div>
			</div><!-- .site-header-inner -->
		</header><!-- #masthead -->

		<?php require( 'header-part-sidemenu.php' ); ?>

		<div id="main" class="site-main">