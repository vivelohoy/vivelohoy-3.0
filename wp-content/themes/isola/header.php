<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Isola
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'isola' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-header-inner">
			<div class="site-branding">
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
					<span class="screen-reader-text"><?php _e( 'Primary Menu', 'isola' ); ?></span>
				</button>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<div id="site-search" class="header-search">
				<div class="header-search-form">
					<?php get_search_form(); ?>
				</div><!-- .header-search-form -->
			</div><!-- #site-navigation -->
		</div><!-- .site-header-inner -->
	</header><!-- #masthead -->	

	<div id="toggle-sidebar">
		<button id="menu-close">
			<span class="screen-reader-text"><?php _e( 'Close Menu', 'isola' ); ?></span>
		</button>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="menu-wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div>
		</nav><!-- #site-navigation -->
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
	</div>

	<?php if ( get_header_image() ) : ?>
		<div class="site-header-image">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<div style="background-image: url('<?php header_image(); ?>')"></div>
			</a>
		</div>
	<?php endif; // End header image check. ?>
	
	<div id="content" class="site-content">
