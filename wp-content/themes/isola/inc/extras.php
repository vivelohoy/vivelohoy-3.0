<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Isola
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function isola_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'isola_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function isola_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'isola_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function isola_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'isola' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'isola_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function isola_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'isola_setup_author' );

/**
 * Regex the 1st gallery shortcode from gallery post format content.
 */
function isola_strip_first_gallery( $content ) {
	if ( 'gallery' == get_post_format() ) {
		$regex = '/\[gallery.*]/';
		$content = preg_replace( $regex, '', $content, 1 );
	}

	return $content;
}
add_filter( 'the_content', 'isola_strip_first_gallery' );


/**
 * Get first image from the_content()
 */
 
function isola_get_first_image( $content ) {

	$images = array();
	
	preg_match_all( '!<img.*src=[\'"]([^"]+)[\'"].*/?>!iUs', $content, $matches );
	
	if ( !empty( $matches[1] ) ) {
		foreach ( $matches[1] as $match ) {
			if ( stristr( $match, '/smilies/' ) )
				continue;

			$images[] = array(
				'type'  => 'image',
				'from'  => 'html',
				'src'   => html_entity_decode( $match ),
				'href'  => '', // No link to apply to these. Might potentially parse for that as well, but not for now
			);
		}
		
		return $images[0]; //Return the first image
	}
	
}