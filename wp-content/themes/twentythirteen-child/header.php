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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="http://mmenu.frebsite.nl/mmenu/js/jquery.mmenu.min.all.js" type="text/javascript"></script>
    <link href="http://mmenu.frebsite.nl/mmenu/css/jquery.mmenu.all.css" type="text/css" rel="stylesheet" />
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
					<a id="hamburger" class="mm-fixed-top" href="#menu"><span></span></a>
		<nav id="menu">
			<ul>
				<li><a href="/"><i class="fa fa-home"></i> &nbsp; Home</a></li>
				<li><a href="/examples.html"><i class="fa fa-code"></i> &nbsp; Examples</a></li>
				<li>
					<span><i class="fa fa-search">i> &nbsp; Tutorial</span>
					<div>
						<p>This tutorial guides you through the first steps of creating an app look-alike sliding menu for your website and webapp.</p>
						<ul>
				<li><a href="/tutorial">Getting started</a></li>
				<li><a href="/tutorial/setting-up-the-html.html">Setting up the html</a></li>
				<li><a href="/tutorial/fire-the-plugin.html">Fire the plugin</a></li>
				<li><a href="/tutorial/open-and-close-the-menu.html">Open and close the menu</a></li>
				<li><a href="/tutorial/styling-lists.html">Styling lists</a></li>
				<li><a href="/tutorial/fixed-elements.html">Fixed elements</a></li>
				<li><a href="/tutorial/learn-more.html">Learn more</a></li>
						</ul>
					</div>
				</li>
				<li>
					<span><i class="fa fa-file-text-o"></i> &nbsp; Documentation</span>
					<ul>
						<li>
							<span>Options</span>
							<ul>
				<li><a href="/documentation/options">Options</a></li>
				<li><a href="/documentation/options/configuration.html">Configuration</a></li>
							</ul>
						</li>
				<li><a href="/documentation/custom-events.html">Custom events</a></li>
						<li>
							<span>Extensions</span>
							<div>
								<p>With these extensions, you can easily extend the look and feel of your menu.</p>
								<ul>
				<li><a href="/documentation/extensions">Introduction</a></li>
				<li><a href="/documentation/extensions/effects.html">Effects</a></li>
				<li><a href="/documentation/extensions/fullscreen.html">Fullscreen</a></li>
				<li><a href="/documentation/extensions/iconbar.html">Iconbar</a></li>
				<li><a href="/documentation/extensions/positioning.html">Positioning</a></li>
				<li><a href="/documentation/extensions/themes.html">Themes</a></li>
				<li><a href="/documentation/extensions/widescreen.html">Widescreen</a></li>
								</ul>
							</div>
						</li>
						<li>
							<span>Add-ons</span>
							<div>
								<p>With these add-ons, you can easily add additional behavior to your menu.</p>
								<ul>
				<li><a href="/documentation/addons">Introduction</a></li>
				<li><a href="/documentation/addons/counters.html">Counters</a></li>
				<li><a href="/documentation/addons/drag-open.html">Drag open</a></li>
				<li><a href="/documentation/addons/header.html">Header</a></li>
				<li><a href="/documentation/addons/labels.html">Labels</a></li>
				<li><a href="/documentation/addons/off-canvas.html">Off-canvas</a></li>
				<li><a href="/documentation/addons/searchfield.html">Searchfield</a></li>
				<li><a href="/documentation/addons/toggles.html">Toggles</a></li>
								</ul>
							</div>
						</li>
				<li><a href="/documentation/changelog.html">Changelog</a></li>
					</ul>
				</li>
				<li><a href="/on-and-off-canvas.html"><i class="fa fa-arrows-h"></i> &nbsp; On- and off-canvas</a></li>
				<li><a href="/download.html"><i class="fa fa-download"></i> &nbsp; Download &amp; License information</a></li>
				<li>
					<span><i class="fa fa-support"></i> &nbsp; Support</span>
					<ul>
				<li><a href="/support/tips-and-tricks.html">Tips and tricks</a></li>
				<li><a href="/support/debugging.html">Debugging</a></li>
				<li><a href="/support/contact.html">Contact</a></li>
					</ul>
				</li>
				<li><a href="https://github.com/BeSite/jQuery.mmenu" target="_blank"><i class="fa fa-github"></i> &nbsp; Fork me on GitHub</a></li>
				<li id="donate">
					<p>The jQuery.mmenu plugin is created as donationware,<br />
						if you are going to use it in a commercial project, please donate.</p>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" name="donate">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="A8GPDD776Z8DJ">
						<input type="image" src="/img/donate-btn.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif" width="1" height="1">
					</form>
				</li>
			</ul>
		</nav>
					<div style="float:left">	
						<a href="#menu"><span class="genericon genericon-menu"></span></a>
						<a href="<?php echo home_url(); ?>"><img class="nav-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/vivelohoy_logo.png"></a>
						<a class="screen-reader-text skip-link" href="#main" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					</div>
					<div class="social-icons-nav">
						<a class="twitter_link" href="http://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo $current_url; ?>" target="_blank"><span class="genericon genericon-twitter"></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>" target="_blank"><span class="genericon genericon-facebook"></span></a>	
					</div>	
						<?php get_search_form(); ?>
					<script type="text/javascript">
			$(function() {
				$('nav#menu').mmenu();
			});
		</script>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->

		<div id="main" class="site-main">
			
