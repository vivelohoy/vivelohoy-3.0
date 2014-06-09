<?php
function get_rating_star($post_id){
	$enable = get_post_meta($post_id, 'pl_enable_review', true);
	if($enable != 'on') return '';
	
	$total_score = 0;
	$count = 0;
	
	for($i=1;$i<=5;$i++){
		$score = get_post_meta($post_id, 'pl_critera_'.$i.'_score', true);
		if($score>0){
			$percent = ($score/5)*100;
			$count++;
			$total_score += $score;
		}
	}
	if($count>0){
		$overall_score = round($total_score/$count,1);
		$insert_half = 0;
		$insert_half = ceil($overall_score);
		$stars = '<p class="prl-post-rating ">';
		for($i=1;$i<=5;$i++){
			if($i<=$overall_score){
				$stars .= '<i class="fa fa-star"></i> ';
			}else if($i == $insert_half){
				$stars .= '<i class="fa fa-star-half-o"></i> ';
			}else{
				$stars .= '<i class="fa fa-star-o"></i> ';
			}
		 };
		 $stars .= '</p>';
		
		return $stars;
	}else{
		return '';
	}	
}

function post_meta($date = true,$author=true,$comment=true,$cat=true,$view = true){?>
	<div class="prl-article-meta">
		<?php 
		if($date == true) { echo '<span>'; the_time('F j, Y');  echo '</span>'; } ?>
		<?php if($author==true){?><span><?php _e('by', 'presslayer');?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></span><?php } ?>
		<?php if($comment==true){?><span><?php comments_popup_link( __('0 comments','presslayer'), __('1 comment','presslayer'), __('% comments','presslayer'), 'comments-link', __('Comments are off','presslayer'));?></span> <?php } ?>
		<?php 
		if ( $view == true) {
			$count = get_post_meta(get_the_ID(), 'EasyPostViewCounter', true);
			if(!$count or $count == '') $count = 0;
			if($count == 1) $view_label = __('view','presslayer');
			else $view_label = __('views','presslayer');
			
			echo '<span>'.$count.' '. $view_label .'</span>'; 
		}
		if ( $cat == true) :
			$categories_list = get_the_category_list( __( ', ', 'presslayer' ) );
			if ( $categories_list) :
				printf( __( 'on %1$s', 'presslayer' ) , $categories_list ); 
			endif;
		endif;
		edit_post_link(__('Edit','presslayer'),'&nbsp;','');
		?> 
	</div>
<?php 
}

function post_thumb($post_id, $width, $height = FALSE, $crop = FALSE){ 
	if ( has_post_thumbnail()):
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full-size');
		$new_image = aq_resize( $image[0], $width, $height, $crop, FALSE );
		$format = get_post_format( $post_id ); 
		if($format == '') $format = 'file';   
		$overlay['video'] = 'video';
		$overlay['audio'] = 'audio';
		$overlay['gallery'] = 'photo';
		$overlay['file'] = 'file';
		
		$str  = '<a class="prl-thumbnail" href="'.get_permalink($post_id).'" title="'.the_title_attribute('echo=0').'">';
		$str .= '<span class="prl-overlay"><img src="'.$new_image[0].'" alt="'.the_title_attribute('echo=0').'">';
		$str .= '<span class="prl-overlay-area o-'.$overlay[$format].'"></span></span></a>';
		return $str;
	endif;	
}

function get_label_meta($post_id){ 
	$label_text = get_post_meta($post_id, 'pl_label_text', true);
	$label_color = get_post_meta($post_id, 'pl_label_color', true);
	if($label_text != ''){
		$str = '<span class="prl-badge prl-badge-'.$label_color.'">'.$label_text.'</span>';
	}else{
		$str = '';
	}
	return $str;
}

function get_label_format($post_id){ 
	$format = get_post_format( $post_id ); 
	$label_color = array();   
	$label_color['video'] = 'red';
	$label_color['audio'] = 'green';
	$label_color['gallery'] = 'teal';
	$str = '';
	if($format!='' && array_key_exists($format, $label_color)){
		$str = '<span class="prl-badge prl-badge-'.$label_color[$format].'">'.$format.'</span>';
	}else{
		$str = '';
	}
	return $str;
}

function text_trim($text, $words = 50, $more = '...'){ 
	$matches = preg_split("/\s+/", $text, $words + 1);
	$sz = count($matches);
	if ($sz > $words) 
	{
		unset($matches[$sz-1]);
		return implode(' ',$matches)." ".$more;
	}
	return $text;
}


function login_form( $login_only  = 0 ) {
	global $user_ID, $user_identity, $user_level;
	
	if ( $user_ID ) : ?>
		<?php if( empty( $login_only ) ): ?>
		<p><?php _e( 'Welcome' , 'presslayer' ) ?> <strong><?php echo $user_identity ?></strong> .</p>
		<div class="clearfix">
			
			<div class="login-avatar">
				<span class="author-avatar"><?php echo get_avatar( $user_ID, $size = '85'); ?></span>
			</div>
			<div class="left">
			<ul>
				<li><a href="<?php echo home_url() ?>/wp-admin/"><?php _e( 'Dashboard' , 'presslayer' ) ?> </a></li>
				<li><a href="<?php echo home_url() ?>/wp-admin/profile.php"><?php _e( 'Your Profile' , 'presslayer' ) ?> </a></li>
				<li><a href="<?php echo wp_logout_url(); ?>"><?php _e( 'Logout' , 'presslayer' ) ?> </a></li>
			</ul>
			</div>
		</div>
		<?php endif; ?>
	<?php else: ?>
		<div id="login-form">
			<form class="prl-form" action="<?php echo home_url() ?>/wp-login.php" method="post">
				<div class="prl-form-row prl-login-username">
				<input type="text" name="log" id="log" placeholder="<?php _e( 'Username' , 'presslayer' ) ?>" size="33" /></div>
				<div class="prl-form-row prl-login-password">
				<input type="password" name="pwd" id="pwd" placeholder="<?php _e( 'Password' , 'presslayer' ) ?>" size="33" /></div>
				
				<div class="prl-form-row">
					<button class="prl-button prl-button-primary" type="submit"><?php _e( 'Log in' , 'presslayer' ) ?></button>
					<label for="rememberme" class="prl-form-help-inline"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /><input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/> <?php _e( 'Remember Me' , 'presslayer' ) ?> </label>
				</div>
				
				<div class="prl-form-row">
					<?php if ( get_option('users_can_register') ) : ?><?php echo wp_register() ?><?php endif; ?>
					<a href="<?php echo home_url() ?>/wp-login.php?action=lostpassword"><?php _e( 'Lost your password?' , 'presslayer' ) ?></a>
				</div>
				
			</form>
		</div>
	<?php endif;
}

function comment_list( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'presslayer' ); ?> <?php comment_author_link(); ?> | <?php edit_comment_link( __( 'Edit', 'presslayer' ), '<span class="edit-link">', '</span>' ); ?></li>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<article class="prl-comment">
			
			<header class="prl-comment-header">
				<span class="prl-comment-avatar"><?php echo get_avatar( $comment, 50 );?></span>
				<h4 class="prl-comment-title"><?php echo get_comment_author_link() ?></h4>
				<div class="prl-comment-meta"><?php echo get_comment_date(get_option('date_format'));?> <?php _e('at','presslayer');?> <?php echo get_comment_time(get_option('time_format'));?></div>
			</header>
			<div class="prl-comment-body">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'presslayer' ); ?></em>
				<?php endif; ?>
				<?php comment_text(); ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'presslayer' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				<?php edit_comment_link(__( 'Edit', 'presslayer' ), '<small>', '</small>' ); ?>
			</div>

		</article>
	
	<?php
		break;
	endswitch;
}


// Custom recent comment
function recent_comment($number, $comment_length, $show_comment_time){
	global $wpdb;
	$recent_comments = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,110) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT $number";
	$the_comments = $wpdb->get_results($recent_comments);
	$out = '<ul>';
	foreach ($the_comments as $comment) {
		$out.= '<li>'.get_avatar($comment, '50');
		$out.= '<p><cite>'.strip_tags($comment->comment_author).':</cite>';
		if($show_comment_time == 'on') $out.= ' <em>'.$comment->comment_date_gmt.'</em>';
		$out.= ' <a href="'.get_permalink($comment->ID).'#comment-'.$comment->comment_ID.'" title="'.strip_tags($comment->comment_author).' on '.$comment->post_title.'">';
		$out.= text_trim(strip_tags($comment->com_excerpt), $comment_length,'...').'</a></p>';
		
		$out .= '<div class="clear"></div></li>';	
	}
	$out.= '</ul>';
	
	return $out; 
}

// Tag cloud
function tag_cloud($count, $show_count){
	$tags = get_tags(array('orderby' => 'count', 'order' => 'DESC', 'number' => $count));
	$out = '<ul>';
	foreach ((array) $tags as $tag) {
		$out .= '<li><a href="' . get_tag_link ($tag->term_id) . '" title="'.$tag->count.' '. __('toptic','presslayer').'">' . $tag->name . '';
		if($show_count == 'on') $out .= ' ('.$tag->count.')';
		$out .= '</a></li>';
	}
	$out .= '</ul>';
	
	return $out; 
}


function social_share(){
global $theme_url, $image;
?>

<ul class="prl-list prl-list-sharing">
	<li><strong><?php _e('Share this post','presslayer');?></strong></li>
	<li><a href="http://www.facebook.com/share.php?u=<?php the_permalink();?>" target="_blank"><i class="fa fa-facebook-square"></i> Facebook</a></li>
	<li><a href="http://twitter.com/home?status=<?php the_title_attribute();?> - <?php the_permalink();?>" target="_blank"><i class="fa fa-twitter-square"></i> Twitter</a></li>
	<li><a href="https://plus.google.com/share?url=<?php the_permalink();?>" onClick="javascript:window.open(this.href,&#39;&#39;, &#39;menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=320,width=620&#39;);return false;"><i class="fa fa-google-plus-square"></i> Google plus</a></li>
	<li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php echo $image[0];?>" class="pin-it-button" count-layout="horizontal" onClick="javascript:window.open(this.href,&#39;&#39;, &#39;menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=320,width=620&#39;);return false;"><i class="fa fa-pinterest-square"></i> Pinterest</a></li>
	<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title_attribute();?>" target="_blank"><i class="fa fa-linkedin-square"></i> Linkedin</a></li>
	<li><a href="mailto:?subject=<?php the_title_attribute();?>&body=<?php the_permalink();?>" target="_blank"><i class="fa fa-envelope"></i> Mail this article</a></li>
	<li><a href="#" onclick="window.print();" id="print-page" ><i class="fa fa-print"></i> Print this article</a></li>
</ul>	


<?php 
}


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
	
	$gallery_div = '<div id="gallery-'.$post->ID.'" class="flexslider gallery_slider"><ul class="slides">';
	
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
	
	foreach ( $attachments as $id => $attachment ) {
		$link = wp_get_attachment_link($id, 'full', true, false);
		
		$output .= "<li>".strip_tags($link,'<img>')."";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= '<div class="caption">' . wptexturize($attachment->post_excerpt) . '</div';
		}
		$output .= "</li>\n";
	}

	$output .= "</ul></div>\n";

	return $output;
}


function catcolor($term_id = NULL){
	if($term_id == NULL ){
		$queried_object = get_queried_object();
		$term_id = $queried_object->term_id;
	}
	$cat_meta =  get_option( "tax_".$term_id);
	$color = $cat_meta['cat_color'];
	return $color; 
}	
function catcolorpri($term_id = NULL){
	if($term_id == NULL ){
		$queried_object = get_queried_object();
		$term_id = $queried_object->term_id;
	}
	$cat_meta =  get_option( "tax_".$term_id);
	$colorpri = $cat_meta['override_primary_color'];
	return $colorpri; 
}

function sitelogo(){
	global $theme_url, $prl_data;
	$logo = $prl_data['site_logo'];
	
	if(is_category()){
		$queried_object = get_queried_object();
		$term_id = $queried_object->term_id;
		$cat_meta =  get_option( "tax_".$term_id);
		if($cat_meta['cat_logo']!='') $logo = $cat_meta['cat_logo'];
	}
	
	if(is_page()){
		$page_logo = get_post_meta(get_queried_object_id(), 'pl_page_logo', true);
		if($page_logo!=''){
			$logo = $page_logo;
		}
	}
	
	return $logo;
}

class nested_Widget extends WP_Widget {

    function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );
        echo $before_widget;
        $this->display_widgets_front($instance);
        echo $after_widget;
      }

      function update( $new_instance, $old_instance ) {
        $updated_instance = $new_instance;
        return $updated_instance;
      }

      function form( $instance ) {
        global $wp_registered_widgets;
        $instance = wp_parse_args( $instance, array( 
          'widgets'    =>  '',
          'title'     =>  ''
        ) );
        ?>
          <input type="hidden" class="widefat" name="<?php echo $this->get_field_name('widgets') ?>" id="<?php echo $this->get_field_id('widgets') ?>" value="<?php echo htmlentities( $instance['widgets'] ) ?>" >
          <input type="hidden" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?>" value="<?php echo $instance['title'] ?>" class="widefat">
          <div class="prl-widget-extends" data-setting="#<?php echo $this->get_field_id('widgets') ?>" >
            <p class="description"><?php _e('Drag & Drop Widgets Here','presslayer') ?></p>
            <?php
              $widgets = explode(':prl-data:', $instance['widgets'] );
              if( !empty($widgets) && is_array($widgets) ){
                $number = 1;
                foreach ($widgets as $widget) {
                  if( !empty( $widget ) ) {
                    $url = rawurldecode($widget);
                    parse_str($widget,$s);
                    $this->display_widgets($s, $number);
                  }
                  $number++;
                }
              }
            ?>
          </div>
        <?php
      }

      function get_widgets( $id_base, $number ){
        global $wp_registered_widgets;

        $widget = false;
        foreach ($wp_registered_widgets as $key => $wdg) {
          if( strpos( $key, $id_base ) === 0 ) {
            if( isset($wp_registered_widgets[ $key ]['callback'][0]) && is_object($wp_registered_widgets[ $key ]['callback'][0]) ) {
              $classname = get_class( $wp_registered_widgets[ $key ]['callback'][0] );
              $widget = new $classname;
              $widget->id_base = $id_base;
              $widget->number = $number;
              break;
            }
          }
        }

        return $widget;
      }

      function display_widgets($s, $number){
        $instance = !empty($s['widget-'.$s['id_base']]) ? array_shift( $s['widget-'.$s['id_base']] ) : array();
        $widget = $this->get_widgets( $s['id_base'], $number );
      ?>  
        <?php if( $widget ) { ?>
        <div id="<?php echo esc_attr($s['widget-id']); ?>" class="widget">
          <div class="widget-top">
            <div class="widget-title-action">
              <a class="widget-action hide-if-no-js" href="#available-widgets"></a>
              <a class="widget-control-edit hide-if-js" href="<?php echo esc_url( add_query_arg( $query_arg ) ); ?>">
                <span class="edit"><?php _ex( 'Edit', 'widget' ); ?></span>
                <span class="add"><?php _ex( 'Add', 'widget' ); ?></span>
                <span class="screen-reader-text"><?php echo $widget->name; ?></span>
              </a>
            </div>
            <div class="widget-title"><h4><?php echo $widget->name; ?><span class="in-widget-title"></span></h4></div>
          </div>

          <div class="widget-inside">
            <div class="widget-content">
              <?php if( isset($s['id_base'] ) ) { 
                $widget->form($instance); 
              } else { 
                echo "\t\t<p>" . __('There are no options for this widget.','presslayer') . "</p>\n"; 
              } ?>
            </div>
            <input data-dw="true" type="hidden" name="widget-id" class="widget-id" value="<?php echo esc_attr($s['widget-id']); ?>" />
            <input data-dw="true" type="hidden" name="id_base" class="id_base" value="<?php echo esc_attr($s['id_base']); ?>" />
            <input data-dw="true" type="hidden" name="widget-width" class="widget-width" value="<?php echo esc_attr($s['widget-width']); ?>">
            <div class="widget-control-actions">
              <div class="alignleft">
                <a class="widget-control-remove" href="#remove"><?php _e('Delete','presslayer'); ?></a> |
                <a class="widget-control-close" href="#close"><?php _e('Close','presslayer'); ?></a>
              </div>
              <div class="alignright widget-control-noform">
                <?php submit_button( __( 'Save', 'presslayer' ), 'button-primary widget-control-save right', 'savewidget', false, array( 'id' => 'widget-' . esc_attr( $s['widget-id'] ) . '-savewidget' ) ); ?>
                <span class="spinner"></span>
              </div>
              <br class="clear" />
            </div>
          </div>

          <div class="widget-description"><?php echo ( $widget_description = wp_widget_description($widget_id) ) ? "$widget_description\n" : "$widget_title\n"; ?></div>
        </div>
        <?php } ?>
      <?php
      }
}

?>