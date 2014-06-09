<?php

class TMMenu extends Walker_Nav_Menu {

    var $number = 1;

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $prl_data;
		
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$magamenu  = false;
		
		if(!in_array('menu-item-has-children', explode(' ', $class_names)) && $item->object == 'category' && $depth == 0 ){
			$class_names = $class_names . ' sf-mega-parent';
			$magamenu = true;
		}
		
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
		
		if($magamenu == true) {
		
			$item_output  .= '<div class="sf-mega">';
			$item_output  .= '<div class="prl-grid prl-grid-divider">';
			
			// Check if current category has children
			global $wpdb;
			$wpdb->get_results('SELECT * FROM '.$wpdb->prefix . 'term_taxonomy WHERE parent = '.$item->object_id);
			
			if ($wpdb->num_rows > 0) {
				$item_output  .= '<div class="prl-span-3"><ul class="sf-mega-list">';
				$terms = get_terms( 'category', array('orderby' => 'count','hide_empty' => 0, 'parent' => $item->object_id) );
				foreach ( $terms as $term ) {
				   $category_link = get_category_link( $term->term_id );
				   $item_output  .= '<li><a href="'.esc_url( $category_link ).'">' . $term->name . '</a></li>';
				 }
				$item_output  .= '</ul></div>';
				
				$showposts = 3;
			}else{
				$showposts = 4;
			}
			
			$megapost = new WP_Query(array('showposts' => $showposts,'cat' => $item->object_id));
			
			while($megapost->have_posts()): $megapost->the_post();
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full-size');
				$new_image = aq_resize( $image[0], 520, 360, TRUE, FALSE );
				$format = get_post_format( get_the_ID() ); 
				if($format == '') $format = 'file';   
				$overlay['video'] = 'video';
				$overlay['audio'] = 'audio';
				$overlay['gallery'] = 'photo';
				$overlay['file'] = 'file';
				
				$item_output  .= '<div class="prl-span-3">';
				if( has_post_thumbnail()):
					$item_output  .= '<a class="prl-thumbnail" href="'.get_permalink( get_the_ID() ).'"><span class="prl-overlay">';
					$item_output  .= '<img src="'.$new_image[0].'" alt="'.the_title_attribute('echo=0').'">';
					$item_output  .= '<span class="prl-overlay-area o-'.$overlay[$format].'"></span></span></a>';
				endif;
				$item_output  .= '<h3 class="prl-article-title"><a href="'.get_permalink( get_the_ID() ).'" title="'.the_title_attribute('echo=0').'" rel="bookmark">'.get_the_title().'</a> '.get_label_format(get_the_ID()).' '.get_label_meta(get_the_ID()).'</h3>';
				if(isset($prl_data['magamenu_post']['meta']) && $prl_data['magamenu_post']['meta']!=0) $item_output  .= '<div class="prl-article-meta">'.get_the_time('F j, Y', get_the_ID() ).'</div>';
				if(isset($prl_data['magamenu_post']['excerpt']) && $prl_data['magamenu_post']['excerpt']!=0){
					 $item_output  .= text_trim(get_the_excerpt(),$prl_data['mengamenu_num_excerpt'],'...');
				}
				$item_output  .= '</div>';
				
			endwhile; wp_reset_query();
			
			$item_output  .= '</div>';
		}
		
		
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
	
	function end_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
		global $magamenu;
		if ( $magamenu == true ) {
			$output .= "</div>\n";
		}
		$output .= "</li>\n";
    }

}

?>