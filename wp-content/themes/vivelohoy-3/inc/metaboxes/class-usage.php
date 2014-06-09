<?php
/*
Plugin Name: Demo MetaBox
Plugin URI: http://en.bainternet.info
Description: My Meta Box Class usage demo
Version: 3.0.1
Author: Bainternet, Ohad Raz
Author URI: http://en.bainternet.info
*/

//include the main class file
require_once("meta-box-class/meta-box-class.php");
if (is_admin()){
  /* 
   * prefix of meta keys, optional
   * use underscore (_) at the beginning to make keys hidden, for example $prefix = '_ba_';
   *  you also can make prefix empty to disable it
   * 
   */
  $prefix = 'pl_';
  
  /* 
   * SIDEBAR (for pages)
   */
  $config_sidebar = array(
    'id' => 'sidebar_meta_box',
    'title' => 'Sidebar', 
    'pages' => array('page'),
    'context' => 'normal',
    'priority' => 'high', 
    'fields' => array()
  );
  
  $sidebar_meta =  new AT_Meta_Box($config_sidebar);
	$sidebar['sidebar'] = 'Default';
	if(get_option('sbg_sidebars')){
		foreach(get_option('sbg_sidebars') as $k=>$v){
			$sidebar[$k] = $v;
		}
	} // if($options['sidebar'])
	
  $sidebar_meta->addSelect($prefix.'sidebar',$sidebar,array('name'=> 'Select sidebar', 'std'=> array('sidebar')));
  $sidebar_meta->Finish();
  
   /* 
   * POST OPTIONS (for post, page)
   */
  $p_config = array(
    'id' => 'post_option_box',
    'title' => 'Post Options', 
    'pages' => array('post'),
    'context' => 'normal',
    'priority' => 'high', 
    'fields' => array()
  );
	$p_meta =  new AT_Meta_Box($p_config);
	$p_meta->addSelect($prefix.'post_thumb',array('Enable'=>'Enable','Disable' => 'Disable'),array('name'=> 'Post Thumbnail', 'desc'=>'Enable/Disable Post Thumbnail in Single post'));
	
	$p_meta->addText($prefix.'label_text',array('name'=> 'Label', 'desc'=>'Add a label after Post title', 'group' => 'start'));
	$p_meta->addSelect($prefix.'label_color',array('magenta'=>'Magenta','purple'=>'Purple','teal' => 'Teal','lime' => 'Lime','brown' => 'Brown','pink' => 'Pink','orange' => 'Orange','blue' => 'Blue','red'=>'Red','green'=>'Green'),array('name'=> 'Label color', 'group' => 'end'));
	$p_meta->addSelect($prefix.'related',array('default'=>'Default','Enable'=>'Enable','Disable' => 'Disable'),array('name'=> 'Related posts', 'desc'=>'Choose Default if you want to use default setting from Theme Opitons'));
	$p_meta->Finish();
  
  /* 
   * REVIEW INFO (for post)
   */
  $ri_config = array(
    'id' => 'post_review_info',
    'title' => 'Review Info', 
    'pages' => array('post'),
    'context' => 'normal',
    'priority' => 'high', 
    'fields' => array()
  );
	$ri_meta =  new AT_Meta_Box($ri_config);

  $ri_meta->addCheckbox($prefix.'enable_review', array('name'=> 'Enable Review','desc'=> __('Enable/Disable Review Box for this Post')));

				
	$ri_meta->addText($prefix.'critera_1',array('name'=> 'Critera 1','desc'=>__('Enter a rating Criteria (eg. Design)','presslayer'),'group' => 'start'));
	
	$ri_meta->addSelect($prefix.'critera_1_score',array('0' => '0','0.5' => '0.5','1' => '1','1.5' => '1.5','2' => '2','2.5' => '2.5','3' => '3','3.5' => '3.5',					'4' => '4','4.5' => '4.5','5' => '5'),array('name'=> 'Critera 1 Score','group' => 'end'));
	$ri_meta->addText($prefix.'critera_2',array('name'=> 'Critera 2','group' => 'start'));
	$ri_meta->addSelect($prefix.'critera_2_score',array('0' => '0','0.5' => '0.5','1' => '1','1.5' => '1.5','2' => '2','2.5' => '2.5','3' => '3','3.5' => '3.5',					'4' => '4','4.5' => '4.5','5' => '5'),array('name'=> 'Critera 2 Score','group' => 'end'));
	$ri_meta->addText($prefix.'critera_3',array('name'=> 'Critera 3','group' => 'start'));
	$ri_meta->addSelect($prefix.'critera_3_score',array('0' => '0','0.5' => '0.5','1' => '1','1.5' => '1.5','2' => '2','2.5' => '2.5','3' => '3','3.5' => '3.5',					'4' => '4','4.5' => '4.5','5' => '5'),array('name'=> 'Critera 3 Score','group' => 'end'));
	$ri_meta->addText($prefix.'critera_4',array('name'=> 'Critera 4','group' => 'start'));
	$ri_meta->addSelect($prefix.'critera_4_score',array('0' => '0','0.5' => '0.5','1' => '1','1.5' => '1.5','2' => '2','2.5' => '2.5','3' => '3','3.5' => '3.5',					'4' => '4','4.5' => '4.5','5' => '5'),array('name'=> 'Critera 4 Score','group' => 'end'));
	$ri_meta->addText($prefix.'critera_5',array('name'=> 'Critera 5','group' => 'start'));
	$ri_meta->addSelect($prefix.'critera_5_score',array('0' => '0','0.5' => '0.5','1' => '1','1.5' => '1.5','2' => '2','2.5' => '2.5','3' => '3','3.5' => '3.5',					'4' => '4','4.5' => '4.5','5' => '5'),array('name'=> 'Critera 5 Score','group' => 'end'));			
	$ri_meta->Finish();

  
   /* 
   * SLIDER OPTION (for flexslider)
   */
  $s_config = array(
    'id' => 'slider_meta_box',
    'title' => 'Slider Options', 
    'pages' => array('slider'),
    'context' => 'normal',
    'priority' => 'high', 
    'fields' => array()
  );
  
   $s_meta =  new AT_Meta_Box($s_config);
   $s_meta->addText($prefix.'link',array('name'=> 'Link'));
   $s_meta->Finish();
  

  /* 
   * Page Options (for page)
   */
  $page_config = array(
    'id' => 'page_option',
    'title' => 'Page Options', 
    'pages' => array('page'), 
    'context' => 'normal', 
    'priority' => 'high', 
    'fields' => array()
  );
  
  $page_meta =  new AT_Meta_Box($page_config);
  $page_meta->addSelect($prefix.'page_title',array('enable' => 'Enable','disable' => 'Disable'),array('name'=> 'Page Title'));
  $page_meta->addSelect($prefix.'page_color',array('default'=>'Default', 'magenta'=>'Magenta','purple'=>'Purple','teal' => 'Teal','lime' => 'Lime','brown' => 'Brown','pink' => 'Pink','orange' => 'Orange','blue' => 'Blue','red'=>'Red','green'=>'Green'),array('name'=> 'Page Color','desc'=>'Pick a color for Category to override Primary Color'));
  $page_meta->addUpload($prefix.'page_logo',array('name'=> 'Page Logo','desc'=>'You can override Site Logo by a custom Logo'));
  $page_meta->Finish();
 
  /* 
   * BACKGROUND (for page)
   */
  $config2 = array(
    'id' => 'background_meta_box',
    'title' => 'Background', 
    'pages' => array('page'), 
    'context' => 'normal', 
    'priority' => 'high', 
    'fields' => array()
  );
  

  $my_meta2 =  new AT_Meta_Box($config2);
  
  $my_meta2->addUpload($prefix.'background',array('name'=> 'Enter URL or Upload background','desc'=>'It only work with boxed layout'));
  $my_meta2->addSelect($prefix.'bg_align',array('top left' => 'Top Left','top right' => 'Top Right','top center' => 'Top Center','bottom left' => 'Bottom Left','bottom right' => 'Bottom Right', 'bottom center' => 'Bottom Center','center center'=>'Center Center'),array('name'=> 'Background align','group' => 'start'));
  $my_meta2->addSelect($prefix.'bg_attachment',array('scroll' => 'Scroll','fixed' => 'Fixed'),array('name'=> 'Background attachment'));
  $my_meta2->addSelect($prefix.'bg_repeat',array('repeat' => 'Repeat','repeat-x' => 'Repeat X','repeat-y' => 'Repeat Y','no-repeat' => 'No repeat'),array('name'=> 'Background repeat'));
  $my_meta2->addSelect($prefix.'bg_size',array('none'=>'No scale','100% auto' => '100% - Auto','auto 100%' => 'Auto - 100%','100% 100%' => '100% - 100%'),array('name'=> 'Background size','group' => 'end'));
  
  $my_meta2->Finish();

}