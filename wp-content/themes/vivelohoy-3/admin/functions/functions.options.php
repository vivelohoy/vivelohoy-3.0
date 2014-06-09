<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Site style",
						"desc" 		=> "Select style for your site.",
						"id" 		=> "site_style",
						"std" 		=> "Boxed",
						"type" 		=> "select",
						"options" 	=> array('Boxed','Wide')
				);	

$of_options[] = array( 	"name" 		=> "Switcher",
						"desc" 		=> "Enable/Disable demo switcher",
						"id" 		=> "switcher",
						"std" 		=> "Disable",
						"type" 		=> "select",
						"options" 	=> array('Enable','Disable')
				);							
				
$of_options[] = array( 	"name" 		=> "Logo",
						"desc" 		=> "Upload/Enter URL an image for logo",
						"id" 		=> "site_logo",
						"std" 		=> get_template_directory_uri()."/images/logo.png",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Favicon",
						"desc" 		=> "Upload/Enter URL an icon for favicon",
						"id" 		=> "site_fav",
						"std" 		=> get_template_directory_uri()."/images/fav.ico",
						"type" 		=> "text"
				);				
					
$url =  ADMIN_DIR . 'assets/images/';
				

$of_options[] = array( 	"name" 		=> "Footer Widget",
						"desc" 		=> "Enable/Disable Footer Widget",
						"id" 		=> "footer_widget",
						"std" 		=> "Enable",
						"type" 		=> "select",
						"options" 	=> array('Enable','Disable')
				);
								
$of_options[] = array( 	"name" 		=> "Footer Text",
						"desc" 		=> "",
						"id" 		=> "footer_text",
						"std" 		=> "Designed by <a href=\"http://www.presslayer.com\" target=\"_blank\">PressLayer</a>",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Tracking Code",
						"desc" 		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		=> "google_analytics",
						"std" 		=> "",
						"type" 		=> "textarea"
				);				
				
$of_options[] = array( 	"name" 		=> "Header",
						"type" 		=> "heading"
				);



$of_options[] = array( 	"name" 		=> "Megamenu",
						"desc" 		=> "Enable/Disable Megamenu in Navigation",
						"id" 		=> "megamenu",
						"std" 		=> "Enable",
						"type" 		=> "select",
						"options" 	=> array('Enable','Disable')
				);
$of_options[] = array( 	"name" 		=> "Megamenu Posts",
						"desc" 		=> "",
						"id" 		=> "magamenu_post",
						"std" 		=> array("meta"),
						"type" 		=> "multicheck",
						"options" 	=> array('meta'=>"Show posts's meta", 'excerpt'=>"Show posts's excerpt")
				);

$of_options[] = array( 	"name" 		=> "Length of Excerpt (Megamenu excerpt)",
						"desc" 		=> "",
						"id" 		=> "mengamenu_num_excerpt",
						"std" 		=> "15",
						"type" 		=> "text"
				);					
					
$of_options[] = array( 	"name" 		=> "Header Search Button",
						"desc" 		=> "Enable/Disable Header Search Button",
						"id" 		=> "header_search_btn",
						"std" 		=> "Enable",
						"type" 		=> "select",
						"options" 	=> array('Enable','Disable')
				);									

$of_options[] = array( 	"name" 		=> "Facebook",
						"desc" 		=> "Enter Facebook url",
						"id" 		=> "header_facebook",
						"std" 		=> "http://www.facebook.com/presslayer",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Twitter",
						"desc" 		=> "Enter Twitter username",
						"id" 		=> "header_twitter",
						"std" 		=> "presslayer",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> "Pinterest",
						"desc" 		=> "Enter Pinterest username",
						"id" 		=> "header_pinterest",
						"std" 		=> "presslayer",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Google plus",
						"desc" 		=> "Enter Google plus url",
						"id" 		=> "header_google_plus",
						"std" 		=> "https://plus.google.com/u/0/b/111027962250947126317/111027962250947126317",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "LinkedIn",
						"desc" 		=> "Enter LinkedIn url",
						"id" 		=> "header_linkedin",
						"std" 		=> "#",
						"type" 		=> "text"
				);	


$of_options[] = array( 	"name" 		=> "Header custom text",
						"desc" 		=> "",
						"id" 		=> "header_custom_text",
						"std" 		=> "<i class='fa fa-phone-square'></i> +174 123 456 789",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Header Time",
						"desc" 		=> "",
						"id" 		=> "header_time",
						"std" 		=> "Enable",
						"type" 		=> "select",
						"options" 	=> array('Enable','Disable')
				);																										

$of_options[] = array( 	"name" 		=> "Blog Settings",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Archive Style",
						"desc" 		=> "You can override this setting by Category Options",
						"id" 		=> "archive_style",
						"std" 		=> "list",
						"type" 		=> "radio",
						"options" 	=> array('list'=>'List', '2col'=>'2 Columns','3col'=>'3 Columns')
				);
				
$of_options[] = array( 	"name" 		=> "Show Excerpt in single post",
						"desc" 		=> "Enable/Disable show excerpt before post content.",
						"id" 		=> "show_excerpt",
						"std" 		=> "Disable",
						"type" 		=> "select",
						"options" 	=> array('Enable','Disable')
				);

$of_options[] = array( 	"name" 		=> "Next & Previous Posts",
						"desc" 		=> "Enable/Disable Next & Previous Posts",
						"id" 		=> "next_previous",
						"std" 		=> "Enable",
						"type" 		=> "select",
						"options" 	=> array('Enable','Disable')
				);

$of_options[] = array( 	"name" 		=> "Post Author",
						"desc" 		=> "Enable/Disable author box in Post single",
						"id" 		=> "post_author",
						"std" 		=> "Enable",
						"type" 		=> "select",
						"options" 	=> array('Enable','Disable')
				);	

$of_options[] = array( 	"name" 		=> "Related Posts",
						"desc" 		=> "Enable/Disable related posts in Post single",
						"id" 		=> "related_post",
						"std" 		=> "Enable",
						"type" 		=> "select",
						"options" 	=> array('Enable','Disable')
				);

$of_options[] = array( 	"name" 		=> "Related Posts Options",
						"desc" 		=> "",
						"id" 		=> "related_post_opt",
						"std" 		=> array("meta","excerpt"),
						"type" 		=> "multicheck",
						"options" 	=> array('meta'=>"Show posts's meta", 'excerpt'=>"Show posts's excerpt")
				);

$of_options[] = array( 	"name" 		=> "Length of Excerpt",
						"desc" 		=> "",
						"id" 		=> "related_post_num_excerpt",
						"std" 		=> "15",
						"type" 		=> "text"
				);																		
				
$of_options[] = array( 	"name" 		=> "Styling Options",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Predefined Skins",
						"desc" 		=> "Select a predefined then you can change everything that you want",
						"id" 		=> "theme_skin",
						"std" 		=> "blue",
						"type" 		=> "skin",
						"options" 	=> array(
											'magenta' => array('color'=>'FF0094', 'bgcolor'=>'eeeeee','bgimg'=>'bg1'),
											'purple' => array('color'=>'A500FF', 'bgcolor'=>'eeeeee','bgimg'=>'bg2'),
											'teal' => array('color'=>'00AAAD', 'bgcolor'=>'eeeeee','bgimg'=>'bg3'),
											'lime' => array('color'=>'8CBE29', 'bgcolor'=>'eeeeee','bgimg'=>'bg4'),
											'brown' => array('color'=>'9C5100', 'bgcolor'=>'eeeeee','bgimg'=>'bg5'),
											'pink' => array('color'=>'E671B5', 'bgcolor'=>'eeeeee','bgimg'=>'bg6'),
											'orange' => array('color'=>'EF9608', 'bgcolor'=>'eeeeee','bgimg'=>'bg7'),
											'blue' => array('color'=>'19A2DE', 'bgcolor'=>'eeeeee','bgimg'=>'bg8'),
											'red' => array('color'=>'E61400', 'bgcolor'=>'eeeeee','bgimg'=>'bg9'),
											'green' => array('color'=>'319A31', 'bgcolor'=>'eeeeee','bgimg'=>'bg10')
											
										)
				);

$of_options[] = array( 	"name" 		=> "Primarty Color",
						"desc" 		=> "Pick a Primary Color for the theme. Note: You can override Primary Color in Category/Page options",
						"id" 		=> "primary_color",
						"std" 		=> "#19A2DE",
						"type" 		=> "color"
				);				

$of_options[] = array( 	"name" 		=> "Body Background Color",
						"desc" 		=> "Pick a background color for the theme (default: #fff).",
						"id" 		=> "body_background",
						"std" 		=> "#eeeeee",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Background Images",
						"desc" 		=> "Select a background pattern.",
						"id" 		=> "custom_bg",
						"std" 		=> $bg_images_url."bg0.png",
						"type" 		=> "tiles",
						"options" 	=> $bg_images,
				);

$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Quickly add some CSS to your theme by adding it to this block.",
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Font Settings",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Heading Font",
						"desc" 		=> "Select heading (h1,h2,h3 ...) font for theme.",
						"id" 		=> "heading_font",
						"std" 		=> "Roboto Condensed",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "Font preview", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=> array(
										"none" => "Select a font",//please, always use this key: "none"
										'Arial'=>'Arial',
										'Tahoma'=>'Tahoma',
										'Lucida Sans Unicode'=>'Lucida Sans Unicode',
										'Times New Roman'=>'Times New Roman',
										'Verdana'=>'Verdana', 
										'Courier New'=>'Courier New', 
										'Courier'=>'Courier', 
										'Georgia'=>'Georgia',
										'Geneva'=>'Geneva', 
										'Helvetica'=>'Helvetica',
										"Roboto Slab" => "Roboto Slab",
										"Lato" => "Lato",
										"Oswald" => "Oswald",
										"Open Sans" => "Open Sans",
										"Alegreya Sans SC" => "Alegreya Sans SC",
										"Roboto Condensed" => "Roboto Condensed",
										"Cousine" => "Cousine",
										"Prosto One" => "Prosto One",
										"Coda Caption" => "Coda Caption",
										"Droid Sans Mono" => "Droid Sans Mono",
										"Yesteryear" => "Yesteryear",
										"Arbutus Slab" => "Arbutus Slab",
										"Francois One" => "Francois One",
										"Michroma" => "Michroma",
										"Copse" => "Copse",
										"Ropa Sans" => "Ropa Sans",
										"Patua One" => "Patua One",
										"Belgrano" => "Belgrano",
										"Cookie" => "Cookie",
										"Kaushan Script" => "Kaushan Script",
						)
				);				
				
$of_options[] = array( 	"name" 		=> "Ads Management",
						"type" 		=> "heading"
				);

$theme_url = get_template_directory_uri();

$of_options[] = array( 	"name" 		=> "Banner - Top categories",
						"desc" 		=> "",
						"id" 		=> "banner_top_cat",
						"std" 		=> '<a href="#"><img src="'.$theme_url.'/images/ads/banner728x90.png" alt="" /></a>',
						"type" 		=> "textarea"
				);
$of_options[] = array( 	"name" 		=> "Banner - Bottom categories",
						"desc" 		=> "",
						"id" 		=> "banner_bot_cat",
						"std" 		=> '<a href="#"><img src="'.$theme_url.'/images/ads/banner728x90.png" alt="" /></a>',
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Banner - Before single title",
						"desc" 		=> "",
						"id" 		=> "banner_before_single_title",
						"std" 		=> '<a href="#"><img src="'.$theme_url.'/images/ads/banner728x90.png" alt="" /></a>',
						"type" 		=> "textarea"
				);	

$of_options[] = array( 	"name" 		=> "Banner - After single content",
						"desc" 		=> "",
						"id" 		=> "banner_after_single_content",
						"std" 		=> '<a href="#"><img src="'.$theme_url.'/images/ads/banner468x60.png" alt="" /></a>',
						"type" 		=> "textarea"
				);									
												
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
