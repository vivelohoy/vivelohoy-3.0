<?php
 
//Insert ads B second paragraph of single post content.

add_filter( 'the_content', 'prefix_insert_post_ads' );

function prefix_insert_post_ads( $content ) {
	
	$ad_code = '<div id="content-cube"><iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=2;ptype=sf;pos=1;sz=300x250;u=%s;ord=%s" height="250" width="300" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=2;ptype=sf;pos=1;sz=300x250;u=http://www.vivelohoy.com/;ord=86085469"></iframe></div>';

	if ( is_single() && ! is_admin() ) {
		// The paragraph index starts at 1 (the first paragraph)
		$paragraph_index = 2;
		return prefix_insert_before_paragraph( $ad_code, $paragraph_index, $content );
	}
	
	return $content;
}
 
// Parent Function that makes the magic happen
 
function prefix_insert_before_paragraph( $insertion, $paragraph_id, $content ) {
	$closing_p = '<p>';
	$paragraphs = explode( $closing_p, $content );
	foreach ($paragraphs as $index => $paragraph) {

		if ( trim( $paragraph ) ) {
			$paragraphs[$index] .= $closing_p;
		}

		if ( $paragraph_id == $index + 1 ) {
			$paragraphs[$index] .= $insertion;
		}
	}
	
	return implode( '', $paragraphs );
}

add_theme_support( 'infinite-scroll', array(
    'primary' => 'content',
    'footer' => 'page',
) );

// Reset theme to only provide video and gallery post formats in addition to Standard (considered no format)
// See http://codex.wordpress.org/Post_Formats#Formats_in_a_Child_Theme
add_action( 'after_setup_theme', 'childtheme_formats', 11 );
function childtheme_formats(){
     add_theme_support( 'post-formats', array( 'video', 'gallery') );
}


// Changing WP Gallery Default Settings
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'custom_gallery');

function custom_gallery($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	# hard-coding these values so that they can't be broken
	
	$attr['columns'] = 1;
	$attr['size'] = 'full';
	$attr['link'] = 'none';

	$attr['orderby'] = 'post__in';
	$attr['include'] = $attr['ids'];		

	#Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	
	if ( $output != '' )
		return $output;

	# We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'div',
		'icontag'    => 'div',
		'captiontag' => 'p',
		'columns'    => 1,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	$gallery_style = $gallery_div = '';

	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "<!-- see gallery_shortcode() in functions.php -->";
	
	$gallery_div = "<div id='homepage-gallery-wrap' class='gallery gallery-columns-1 gallery-size-full'>";
	
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
	
	foreach ( $attachments as $id => $attachment ) {
		$link = wp_get_attachment_link($id, 'full', true, false);

		$output .= "<div class='homepage-gallery-item'>";
		$output .= "
			<div class='homepage-gallery-icon'>
				$link
			</div>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<p class='wp-caption-text homepage-gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</p>";
		}
		$output .= "</div>";
	}

	$output .= "</div>\n";

	return $output;
}