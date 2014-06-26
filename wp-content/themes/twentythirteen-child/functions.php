<?php
 
//Insert ads B second paragraph of single post content.

add_filter( 'the_content', 'prefix_insert_post_ads' );

function prefix_insert_post_ads( $content ) {
	
	$ad_code = '<div id="content-cube"><iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=2;ptype=sf;pos=1;sz=300x250;u=%s;ord=%s" height="250" width="300" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=2;ptype=sf;pos=1;sz=300x250;u=http://www.vivelohoy.com/;ord=86085469"></iframe></div>';

	if ( is_single() && ! is_admin() ) {
		return prefix_insert_before_paragraph( $ad_code, 1, $content );
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