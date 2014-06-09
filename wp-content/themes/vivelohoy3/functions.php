<?php
require_once ('admin/index.php');
require_once ('page-builder/aq-page-builder.php');
$prl_data = $smof_data;

require_once ('inc/metaboxes/class-usage.php');
require_once ('inc/taxonomy_meta/taxonomy_meta_usage.php');
require_once ('inc/aq_resizer.php');
require_once ('inc/menu-walker.php');
require_once ('inc/multiple_sidebars.php');
require_once ('inc/custom_functions.php');
require_once ('inc/class-tgm-plugin-activation.php');

// Widgets
require_once ('inc/widgets/accordion.php');
require_once ('inc/widgets/recent-posts.php');
require_once ('inc/widgets/instagram.php');
require_once ('inc/widgets/flickr.php');
require_once ('inc/widgets/social.php');
require_once ('inc/widgets/login.php');
require_once ('inc/widgets/facebook.php');
require_once ('inc/widgets/letter.php');
require_once ('inc/widgets/twitter.php');
require_once ('inc/widgets/weather.php');
require_once ('inc/widgets/post_in_pic.php');
require_once ('inc/widgets/ads125.php');

$theme_url = get_template_directory_uri();
global  $prl_data, $theme_url;

// Localization
load_theme_textdomain('presslayer', get_template_directory() . '/languages/');

// Admin script
if( ! function_exists('admin_scripts' ) ){
    function admin_scripts() {
		global $pagenow, $theme_url;
        if( 'widgets.php' == $pagenow ){
            wp_enqueue_script('jquery');
            wp_enqueue_script('prl-widgets', $theme_url .'/js/admin-widget.js', array('jquery','jquery-ui-sortable', 'jquery-ui-draggable','jquery-ui-droppable','admin-widgets' ) );
            wp_enqueue_style('prl-widgets', $theme_url .'/css/admin-widget.css');
            wp_enqueue_style('prl-jquery-ui', $theme_url .'/css/jquery-ui.css');
        }
    }
    add_action( 'admin_enqueue_scripts', 'admin_scripts' );
}


// Front script
add_action('wp_enqueue_scripts','theme_scripts_function');

function theme_scripts_function() {
	global $post, $prl_data, $theme_url;
	
	$fonts = array('Arial','Tahoma','Lucida Sans Unicode','Times New Roman','Verdana', 'Courier New', 'Courier', 'Georgia','Geneva', 'Helvetica' );
	
	wp_enqueue_style('Roboto-Slab', 'http://fonts.googleapis.com/css?family=Roboto+Slab');
	
	if($prl_data['heading_font']!='none' && $prl_data['heading_font']!='Roboto Slab' && !in_array($prl_data['heading_font'], $fonts)):
		array_push($fonts, $prl_data['heading_font']);
		wp_enqueue_style(str_replace(' ','-',$prl_data['heading_font']), 'http://fonts.googleapis.com/css?family='.str_replace(' ','+',$prl_data['heading_font']));
	endif;
	wp_enqueue_style('font-awesome', $theme_url . '/css/font-awesome.min.css');
	wp_enqueue_style('weather-icon', $theme_url . '/css/weather-icons.min.css');
	wp_enqueue_style('flexslider', $theme_url . '/css/flexslider.css');
	wp_enqueue_style('flexslider-tab', $theme_url . '/css/flexslider-tab.css');
	wp_enqueue_style('superfish', $theme_url . '/css/megafish.css');
	wp_enqueue_style('framework', $theme_url . '/css/framework.css');
	wp_enqueue_style('style', get_bloginfo('stylesheet_url'));
	wp_enqueue_style('print', $theme_url . '/css/print.css', false, false, 'print');
	
	//JS
	wp_enqueue_script('jquery');
	wp_enqueue_script('custom', $theme_url . '/js/custom.js', false, false, true);
	wp_enqueue_script('jquery-masonry', false, false, true);
	wp_enqueue_script('placeholder', $theme_url . '/js/jquery.placeholder.js', false, false, true);
	wp_enqueue_script('superfish', $theme_url . '/js/superfish.js', false, false, true);
	wp_enqueue_script('hoverIntent', $theme_url . '/js/hoverIntent.js', false, false, true);
	wp_enqueue_script('infinitescroll', $theme_url . '/js/jquery.infinitescroll.min.js', false, false, true);
	wp_enqueue_script('flexslider', $theme_url . '/js/jquery.flexslider-min.js', false, false , true);
	wp_enqueue_script('plugins', $theme_url . '/js/plugins.js', false, false , true);
	
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	
}

// Custom styles
add_action('wp_head', 'theme_css_function');
function theme_css_function() {
	global $post, $prl_data, $theme_url;
	
	$color = array('magenta'=>'#FF0094','purple'=>'#7059ac','teal' => '#00AAAD','lime' => '#8CBE29','brown' => '#9C5100','pink' => '#E671B5','orange' => '#EF9608','blue' => '#19A2DE','red'=>'#E61400','green'=>'#319A31');
	
	echo '<style type="text/css">';
	if($prl_data['custom_bg']!='') echo 'body{ background-image: url('.$prl_data['custom_bg'].')}';
	if($prl_data['body_background']!='') echo 'body{ background-color: '.$prl_data['body_background'].'}';	
	
	// Custom page background 
	if(is_page() or is_single()){
	$background = get_post_meta($post->ID, 'pl_background', true);
	$bg_align = get_post_meta($post->ID, 'pl_bg_align', true);
	$bg_attachment = get_post_meta($post->ID, 'pl_bg_attachment', true);
	$bg_repeat = get_post_meta($post->ID, 'pl_bg_repeat', true);
	$bg_size = get_post_meta($post->ID, 'pl_bg_size', true);
	
		if($background!='') {
			echo 'body.page-id-'.$post->ID.'{ background-image: url('.$background.'); background-position: '.$bg_align.'; background-repeat: '.$bg_repeat.'; background-attachment: '.$bg_attachment.';';
			if($bg_size!='none') echo 'background-size: '.$bg_size.'!important';
			echo '}';
		}
	}
	
	//Primary color
	if($prl_data['primary_color']!=''):
		echo 'header#masthead .prl-header-logo,button, input[type=submit], input[type=button], a.prl-button,.prl-badge,.page_navi li.current span,.prl-accordion section.active a.head,.prl-nav-dropdown a:hover, .widget_newsletter { background-color:'.$prl_data['primary_color'].';}';
		
		echo 'a,.prl-block-title, .prl-block-title a, .prl-archive-title,.prl-archive-title a,#footer .prl-block-title a,.comment-reply-title,#footer .prl-block-title,.twitter_widget a,.sf-menu > li.current-menu-item > a,.sf-menu > li.current_page_item > a,.sf-menu > li.current-menu-ancestor > a,.sf-menu > li.current-menu-parent > a, .sf-menu > li:hover > a,.sf-menu > li.sfHover > a { color:'.$prl_data['primary_color'].';}';
		echo '.page_navi li.current span, #sliderTab .slider_content .prl-article-meta{ border-color:'.$prl_data['primary_color'].';}';
	endif;
	
	//Custom Primary Color in Category
	if(is_category() && catcolorpri() == 'enable'){
		echo 'header#masthead .prl-header-logo,button, input[type=submit], input[type=button], a.prl-button,.prl-badge,.page_navi li.current span,.prl-accordion section.active a.head,.prl-nav-dropdown a:hover, .widget_newsletter { background-color:'.$color[catcolor()].';}';
		
		echo 'a,.prl-block-title,.prl-block-title a, .prl-archive-title,.prl-archive-title a,#footer .prl-block-title a,.comment-reply-title,#footer .prl-block-title, .twitter_widget a,.sf-menu > li.current-menu-item > a,.sf-menu > li.current_page_item > a,.sf-menu > li.current-menu-ancestor > a,.sf-menu > li.current-menu-parent > a,.sf-menu > li:hover > a,.sf-menu > li.sfHover > a  { color:'.$color[catcolor()].';}';
		echo '.page_navi li.current span, #sliderTab .slider_content .prl-article-meta{ border-color:'.$color[catcolor()].';}';
	}
	
	//Custom Primary Color in Page
	if(is_page()){
		$page_color = get_post_meta(get_queried_object_id(), 'pl_page_color', true);
		if($page_color!='disable'  && $page_color!='' ){
			
			echo 'header#masthead .prl-header-logo,button, input[type=submit], input[type=button], a.prl-button,.prl-badge,.page_navi li.current span,.prl-accordion section.active a.head,.prl-nav-dropdown a:hover, .widget_newsletter { background-color:'.$color[$page_color].';}';
		
			echo 'a,.prl-block-title,.prl-block-title a, .prl-archive-title,.prl-archive-title a,#footer .prl-block-title a,.comment-reply-title,#footer .prl-block-title, .twitter_widget a,.sf-menu > li.current-menu-item > a,.sf-menu > li.current_page_item > a,.sf-menu > li.current-menu-ancestor > a,.sf-menu > li.current-menu-parent > a,.sf-menu > li:hover > a,.sf-menu > li.sfHover > a { color:'.$color[$page_color].';}';
			echo '.page_navi li.current span, #sliderTab .slider_content .prl-article-meta{ border-color:'.$color[$page_color].';}';
		}
	}
	
	//Font settings
	if($prl_data['heading_font']!='none' && $prl_data['heading_font']!='Roboto Slab'):
		echo 'h1,h2,h3,h4,h5,h6{font-family: "'.$prl_data['heading_font'].'", Arial, Helvetica, sans-serif;}';
	endif;
	
	//Custom CSS
	if(!empty($prl_data['custom_css'])) echo stripslashes($prl_data['custom_css']);
	echo '</style>';
}

// Menu
register_nav_menu('main_nav', 'Navigation'); 
register_nav_menu('mobile_nav', 'MobileNav'); 

// Add theme support
add_theme_support('post-thumbnails');
add_theme_support( 'post-formats', array( 'audio','gallery','video'));
add_theme_support( 'automatic-feed-links' );
if ( ! isset( $content_width ) ) $content_width = 800;


// Register Sidebars

if ( function_exists('register_sidebar') ){

	// Default sidebar
	register_sidebar(array(
		'name' => 'Sidebar - default',
		'id' => 'sidebar',
		'description' => 'Widgets in this area will be shown in the sidebar on the blog and regular posts.',
		'before_widget' => '<div id="%1$s" class="widget %2$s prl-panel clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="prl-block-title">',
		'after_title' => '</h5>',
	));
	
	// Single sidebar
	register_sidebar(array(
		'name' => 'Sidebar - single',
		'id' => 'sidebar-single',
		'description' => 'Widgets in this area will be shown in the sidebar on the blog and regular posts.',
		'before_widget' => '<div id="%1$s" class="widget %2$s prl-panel clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="prl-block-title">',
		'after_title' => '</h5>',
	));
	
	// Footer sidebar
	if(isset($prl_data['footer_widget']) && $prl_data['footer_widget']!='Disable'):
		for($i=1;$i<=4;$i++){
			register_sidebar(array(
				'name' => 'Footer #'.$i,
				'id' => 'footer_'.$i,
				'before_widget' => '<div id="%1$s" class="widget %2$s prl-panel clearfix">',
				'after_widget' => '</div>',
				'before_title' => '<h5 class="prl-block-title">',
				'after_title' => '</h5>',
			));
		}
	endif;	
	
} //function_exists('register_sidebar')

function prl_exceprt_more( $excerpt ){
    return ' <a href="'.get_permalink().'" title="'.__( 'Read more', 'presslayer' ).'" >...</a>';
}
add_filter( 'excerpt_more', 'prl_exceprt_more' );


//Install plugins
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
function my_theme_register_required_plugins() {


	$plugins = array(

		array(
			'name'     				=> 'Creativ Shortcodes', // The plugin name
			'slug'     				=> 'creativ-shortcodes', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/_plugins/creativ-shortcodes.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository
		array(
			'name' 		=> 'Easy Post View Counter',
			'slug' 		=> 'easy-post-view-counter',
			'required' 	=> true,
		),
		array(
			'name' 		=> 'Prime Strategy Page Navi',
			'slug' 		=> 'prime-strategy-page-navi',
			'required' 	=> true,
		),

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'tgmpa';

	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

?>
