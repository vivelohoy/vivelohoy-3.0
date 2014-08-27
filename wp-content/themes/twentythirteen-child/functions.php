<?php
global $ADS_ENABLED;
$ADS_ENABLED = true;

/*
This determines which ptype is set in the JavaScript header files for Tribune AdOps ad
insertion. These files are found in ./inc/ads/.
*/
$AD_TAG_DEV = false;

/*
 Override twentythirteen's $content_width to the width of our content
 as defined in style.css:

    .entry-header,
    .entry-content,
    .entry-summary,
    .entry-meta {
        margin: 0 auto;
        max-width: 860px;
        width: 100%;
    }
 http://wycks.wordpress.com/2013/02/14/why-the-content_width-wordpress-global-kinda-sucks/
*/
$content_width = 860;
	
// Reset theme to only provide video and gallery post formats in addition to Standard (considered no format)
// See http://codex.wordpress.org/Post_Formats#Formats_in_a_Child_Theme
add_action( 'after_setup_theme', 'childtheme_formats', 11 );
function childtheme_formats(){
     add_theme_support( 'post-formats', array( 'gallery' ) );
}


// Changing WP Gallery Default Settings
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'custom_gallery');


function custom_gallery($attr) {
	// hard-coding these values so that they can't be broken
	$attr['columns'] = 1;
	$attr['size'] = 'large';
	$attr['link'] = 'none';
	// Let the normal gallery shortcode handler do the rest
	return gallery_shortcode( $attr );
}

// Add Author Links 
function add_to_author_profile( $contactmethods ) {
	
	$contactmethods['google_profile'] = 'Google Profile URL';
	$contactmethods['twitter_profile'] = 'Twitter Profile URL';
	$contactmethods['facebook_profile'] = 'Facebook Profile URL';
	$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
	
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);

/**
 * Overiding post_nav function
 */
function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen-child' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen-child' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen-child' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
/**
 * Overiding paging_nav function
 */

function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen-child' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen-child' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen-child' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/**
 * Enqueue scripts and styles for the front end.
 *
 */
function vivelohoy_scripts_styles() {
  // Add script for the nav changer
  wp_enqueue_script('nav-changer', get_stylesheet_directory_uri() . '/js/nav-changer.js', array('jquery'), '2014-08-26', true);
	// Loads script for floating nav
	wp_enqueue_script( 'hoy-menu', get_stylesheet_directory_uri() . '/js/hoy-menu.js', array( 'jquery' ), '2014-07-14', true );
	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_stylesheet_directory_uri() . '/fonts/genericons.css', array(), '3.1' );
	// Add custom Fontello font found at www.fontello.com
	wp_enqueue_style( 'fontello', get_stylesheet_directory_uri() . '/fonts/fontello/css/hoy.css', array(), '2014-08-12');
	// Add script for the list-grid toggle in nav
	wp_enqueue_script('list-grid', get_stylesheet_directory_uri() . '/js/list-grid.js', array('jquery'), '2014-08-13');

}
add_action( 'wp_enqueue_scripts', 'vivelohoy_scripts_styles' );

// Custom Editor Style CSS - Able to style TinyMCE
function my_theme_add_editor_styles() {
    add_editor_style( 'assets/css/custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

// Add support of other languages
function vivelohoy_theme_setup(){
    load_theme_textdomain('twentythirteen-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'vivelohoy_theme_setup');

// Placing image caption in proper caption location
add_action( 'add_attachment', 'hoy_attachment' );
function hoy_attachment($id) {
    /*
        title       post_title
        caption     post_excerpt
        description post_content
        alt text    <this one is special>
    */
    $attachment = & get_post( $id, ARRAY_A );
    if ( !empty( $attachment ) ) {
        $attachment['post_excerpt'] = $attachment['post_content'];
        // Some images lack a headline in their metadata, which is what
        // the post_title is derived from. We don't want to set the post_content,
        // i.e. description, to the title unless it exists.
        if ( '' !== $attachment['post_title'] ) {
            $attachment['post_content'] = $attachment['post_title'];
        }
        wp_update_post($attachment);
    }
}

// Total hack to expand the attachment details in the media uploader modal dialog
function expand_attachment_details() {
?>
	<style>
	.media-modal .media-toolbar { right: 700px; }
	.media-modal .attachments { right: 700px; }
	.media-modal .media-sidebar { width: 667px; }
	</style>
<?php
}
add_action( 'admin_footer', 'expand_attachment_details' );

// Set defaults for image media insertion
function vivelohoy_insert_image_defaults() {
	// http://codex.wordpress.org/Option_Reference#Uncategorized
	update_option( 'image_default_link_type', 'post' ); // 'post' means link to attachment page
	update_option( 'image_default_size', 'large' );
	update_option( 'large_size_w', 860 ); // should be same as $content_width
	update_option( 'large_size_h', 600 );
}
add_action( 'after_setup_theme', 'vivelohoy_insert_image_defaults' );


include_once('inc/relativetime.php');
include_once('inc/ads.php');
include_once('inc/omniture.php');

/**
 * Registers an image size for the post thumbnail
 */
function hoy_thumb() {
set_post_thumbnail_size( 300, 200, true );
}
add_action( 'after_setup_theme', 'hoy_thumb', 11 );

/*
Thank you! http://callmenick.com/2014/02/21/custom-wordpress-loop-with-pagination/
*/
function custom_pagination($numpages = '', $pagerange = '', $paged='') {
 
  if (empty($pagerange)) {
    $pagerange = 2;
  }
 
  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }
 
  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => '/page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo; Previa'),
    'next_text'       => __('Siguiente &raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);
  
  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo $paginate_links;
    echo "</nav>";
  }
}