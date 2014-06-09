<?php global $theme_url, $prl_data; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'PressLayer' ), max( $paged, $page ) );
	?></title>
	
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<?php if($prl_data['site_fav']!='') {?>
	<link rel="shortcut icon" href="<?php echo trim($prl_data['site_fav']);?>">
	<?php } ?>
    
<?php wp_head();?>	
</head>
<?php
$body_class = array('Boxed'=>'site-boxed', 'Wide'=>'site-wide');
?>
<body <?php body_class($body_class[$prl_data['site_style']]); ?>>
<div class="site-wrapper">
    <!--<div class="prl-container">-->

		<header id="masthead" class="clearfix">
			<div class="prl-container"><div class="masthead-bg clearfix">
				<div class="prl-header-logo"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo sitelogo();?>" alt="<?php bloginfo('name'); ?>" /></a></div>
				
				<div class="prl-header-social">
					<?php if($prl_data['header_facebook']!=''){?><a href="<?php echo $prl_data['header_facebook'];?>" class="fa fa-facebook" title="Facebook" target="_blank"></a><?php }?>
					<?php if($prl_data['header_twitter']!=''){?><a href="https://twitter.com/<?php echo $prl_data['header_twitter'];?>" class="fa fa-twitter" title="Twitter" target="_blank"></a><?php }?>
					<?php if($prl_data['header_pinterest']!=''){?><a href="http://www.pinterest.com/<?php echo $prl_data['header_pinterest'];?>" class="fa fa-pinterest" title="Pinterest" target="_blank"></a><?php }?>
					<?php if($prl_data['header_google_plus']!=''){?><a href="<?php echo $prl_data['header_google_plus'];?>" class="fa fa-google-plus" title="Google plus"></a><?php }?>
					<?php if($prl_data['header_linkedin']!=''){?><a href="<?php echo $prl_data['header_linkedin'];?>" class="fa fa-linkedin" title="LinkedIn"></a><?php }?>
				</div>
					
				<div class="prl-header-right">
					<?php  if($prl_data['header_custom_text']!=''){?>
					<span class="prl-header-custom-text"><?php echo trim($prl_data['header_custom_text']);?></span>
					<?php  } if($prl_data['header_time']!='Disable'){?>
					<span class="prl-header-time"><i class="fa fa-clock-o"></i> <?php echo date('l');?> - <?php echo date('M d, Y');?></span>
					<?php } ?>
				</div>
				</div>
			</div>					
		</header>
		<nav id="nav" class="prl-navbar" role="navigation">
			<div class="prl-container">
				<div class="nav-wrapper clearfix">
				<?php
				// Main Menu
				if ( has_nav_menu( 'main_nav' ) ) :
					
					$args = array (
						'theme_location' => 'main_nav',
						'container' => false,
						'container_class' => 'prl-navbar',
						'menu_class' => 'sf-menu',
						'menu_id' => 'sf-menu',
						'depth' => 4,
						'fallback_cb' => false
						
					 );
					if($prl_data['megamenu']!='Disable'):
						$mega = array ('walker' => new TMMenu());
						$args = array_merge($mega, $args);
					endif;
					wp_nav_menu($args);
				 else:
					echo '<div class="message warning"><i class="icon-warning-sign"></i>' . __( 'Define your site main menu', 'presslayer' ) . '</div>';
				 endif;
				 
				?>
				
				<div class="nav_menu_control"><a href="#" data-prl-offcanvas="{target:'#offcanvas'}"><span class="prl-nav-toggle prl-nav-menu"></span><span class="nav_menu_control_text"><?php _e('Navigation','presslayer');?></span></a>
				</div>
				
				<?php if($prl_data['header_search_btn']!='Disable'):?>
				<div class="prl-nav-flip">
					<div class="right"><a href="#" id="search_btn" class="prl-nav-toggle prl-nav-toggle-search search_zoom" title="Search"></a></div>
					
					<div id="search_form" class="nav_search">
						<form class="prl-search" action="<?php echo home_url();?>">
							<input type="text" id="s" name="s" value="" placeholder="<?php _e('Type & Enter to search ...','presslayer');?>" class="nav_search_input" />
						</form>
					</div>
					
				</div>
				<?php endif;?>
				</div>
			</div>
		</nav>
		
		<script>
			var $ = jQuery.noConflict();
			$(document).ready(function() { 
				var example = $('#sf-menu').superfish({
					delay:       100,
					animation:   {opacity:'show',height:'show'},
					dropShadows: false,
					autoArrows:  false
				});
			});
			
		</script>
        
    <!--</div>-->
	<?php require_once ('offcanvas.php');?>

