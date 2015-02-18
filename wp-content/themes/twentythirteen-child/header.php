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
				<div class="site-branding topmenu">
					<a href="<?php echo home_url() ?>">
						<img class="nav-logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/hoy-logo.png">
					</a>
					<div id="search-icon">
						<div id="search-icon-icon">
							<div class="vantage-icon-search">
								<span class="genericon genericon-search"></span>
							</div>
						</div>
						<?php get_search_form(); ?>
					</div>
				</div>
				<div class="bottomMenu article-square-logo" style="padding: 0px 25px">
					<a style="float:left;border-bottom: none; padding: 5.5px" href="<?php echo home_url() ?>">
						<img class="nav-logo" style="width: 35px; background: #F4F4F4; margin: 5px" src="<?php echo get_stylesheet_directory_uri();?>/images/square_logo.png">
					</a>
					<div class="bottomMenu nav-cat mobile-cat" style="line-height: 3.9em">
						<?php $category = get_the_category(); if($category[0]){echo '<a style="text-transform: uppercase; color: #ee3527; border-bottom: none" href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';}?> <?php echo get_the_title(); ?> 
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
			</div><!-- .site-header-inner -->
		</header><!-- #masthead -->

		<?php require( 'header-sidemenu.php' ); ?>

		<div id="main" class="site-main">