<?php 
	$sidebar_id = get_post_meta($post->ID, 'pl_sidebar', TRUE);
	if($sidebar_id=='') $sidebar_id = 'sidebar';
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar_id) ) : endif; 
?>
	
	

