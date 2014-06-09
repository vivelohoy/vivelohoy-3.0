<?php
require_once("taxonomy_meta_class.php");

// Category
$meta = new Taxonomy_Meta(
  array(
    'taxonomy' => 'category',
    'meta_pref' => 'tax_'
  )
);
$meta->addSelect('cat_color',array('default'=>'Default', 'magenta'=>'Magenta','purple'=>'Purple','teal' => 'Teal','lime' => 'Lime','brown' => 'Brown','pink' => 'Pink','orange' => 'Orange','blue' => 'Blue','red'=>'Red','green'=>'Green'),array('name'=>'Category color','std'=>'default','desc'=>'Pick a color for Category. You can override Primary Color with option below'));
$meta->addSelect('override_primary_color',array('enable'=>'Enable','disable'=>'Disable'),array('name'=>'Override Primary Color','std'=>'enable'));
$meta->addText('cat_logo',array('name'=>'Custom Category Logo','desc'=>'You can override Site Logo by a custom Logo'));

$meta->addSelect('cat_style',array('default'=>'Default', 'list'=>'List','2col'=>'2 Columns','3col' => '3 Columns'),array('name'=>'Category style','std'=>'default','desc'=>'Choose Default if you want to use default setting in Theme Options'));

?>