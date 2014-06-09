<?php
/** 

Plugin Name: Aqua Page Builder
Plugin URI: http://aquagraphite.com/page-builder
Description: Easily create custom page templates with intuitive drag-and-drop interface. Requires PHP5 and WP3.5
Version: 1.1.2
Author: Syamil MJ
Author URI: http://aquagraphite.com

*/

//definitions
if(!defined('AQPB_VERSION')) define( 'AQPB_VERSION', '1.0' );
if(!defined('AQPB_PATH')) define( 'AQPB_PATH', plugin_dir_path(__FILE__) );
if(!defined('AQPB_DIR')) define( 'AQPB_DIR', get_template_directory_uri().'/page-builder/' );

//required functions & classes
require_once(AQPB_PATH . 'functions/aqpb_config.php');
require_once(AQPB_PATH . 'functions/aqpb_blocks.php');
require_once(AQPB_PATH . 'classes/class-aq-page-builder.php');
require_once(AQPB_PATH . 'classes/class-aq-block.php');
require_once(AQPB_PATH . 'functions/aqpb_functions.php');

//some default blocks
require_once(AQPB_PATH . 'blocks/aq-slider-tab-block.php');
require_once(AQPB_PATH . 'blocks/aq-slider-block.php');
require_once(AQPB_PATH . 'blocks/aq-home1-block.php');
require_once(AQPB_PATH . 'blocks/aq-home2-block.php');
require_once(AQPB_PATH . 'blocks/aq-home3-block.php');
require_once(AQPB_PATH . 'blocks/aq-home4-block.php');
require_once(AQPB_PATH . 'blocks/aq-home-tab-block.php');
require_once(AQPB_PATH . 'blocks/aq-masonry-block.php');
require_once(AQPB_PATH . 'blocks/aq-blog-block.php');
require_once(AQPB_PATH . 'blocks/aq-blog-col-block.php');
require_once(AQPB_PATH . 'blocks/aq-contact-block.php');
require_once(AQPB_PATH . 'blocks/aq-text-block.php');

//register default blocks
aq_register_block('AQ_Slider_Tab_Block');
aq_register_block('AQ_Slider_Block');
aq_register_block('AQ_Home1_Block');
aq_register_block('AQ_Home2_Block');
aq_register_block('AQ_Home3_Block');
aq_register_block('AQ_Home4_Block');
aq_register_block('AQ_Home_Tab_Block');
aq_register_block('AQ_Masonry_Block');
aq_register_block('AQ_Blog_Block');
aq_register_block('AQ_Blog_Col_Block');
aq_register_block('AQ_Contact_Block');
aq_register_block('AQ_Text_Block');

//fire up page builder
$aqpb_config = aq_page_builder_config();
$aq_page_builder = new AQ_Page_Builder($aqpb_config);
if(!is_network_admin()) $aq_page_builder->init();
?>