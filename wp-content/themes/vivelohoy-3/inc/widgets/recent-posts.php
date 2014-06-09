<?php
class recents_posts_Widget extends WP_Widget {
	function __construct() {
        $widget_ops = array('classname' => 'widget-recent-post', 'description' => __( 'Display latest news with settings', 'presslayer' ) );
        parent::__construct('recent_posts', __( '&raquo; Recent Posts', 'presslayer' ), $widget_ops);
    }
	
	function widget($args, $instance)
	{
		global $theme;

		extract($args);

		$title = apply_filters('widget_title', isset($instance['title']) ? $instance['title'] : '', $instance, $this->id_base);
		$category = isset($instance['category']) ? $instance['category'] : '';
		$sort = isset($instance['sort']) ? $instance['sort'] : '';
		$order = isset($instance['order']) ? $instance['order'] : '';
		$post_format = isset($instance['post-format']) ? $instance['post-format'] : '';
		$post_count = isset($instance['post_count']) ? $instance['post_count'] : '';
		$thumbnail_first = isset($instance['thumbnail_first']) ? $instance['thumbnail_first'] : '';
		$thumbnail = isset($instance['thumbnail']) ? $instance['thumbnail'] : '';
		$meta = isset($instance['meta']) ? $instance['meta'] : '';
		$date = isset($instance['date']) ? $instance['date'] : '';
		$author = isset($instance['author']) ? $instance['author'] : '';
		$comment = isset($instance['comment']) ? $instance['comment'] : '';
		$view = isset($instance['view']) ? $instance['view'] : '';
		$cat = isset($instance['cat']) ? $instance['cat'] : '';
		$show_reviews = isset($instance['show_reviews']) ? $instance['show_reviews'] : '';
		$show_excerpt = isset($instance['show_excerpt']) ? $instance['show_excerpt'] : '';
		$num_excerpt = isset($instance['num_excerpt']) ? $instance['num_excerpt'] : '';
		
		echo $before_widget;
		?>
		<!-- BEGIN WIDGET -->
		<?php
		if($category > 0){
			echo $before_title.'<a href="'.get_category_link( $category ).'">'.get_the_category_by_ID( $category).'</a><span class="prl-block-title-link right"><a href="'.get_category_link( $category ).'">'.__('All posts','PressLayer').' <i class="fa fa-caret-right"></i></a></span>'.$after_title;
		}else{
			if($title) echo $before_title.$title.$after_title;
		}
		
		// Post format
		$tax_query=array();
        if(!empty($post_format)){
		 	$tax_query= array(
						array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',
							'terms'    => array( 'post-format-'.$post_format),
							'operator' => 'IN'
						)
					  );
		}
		
		//Reviews
		$rev_query = array();
        if($show_reviews == true){
		 	$rev_query = array(
				array(
					'key' => 'pl_enable_review',
					'value' => 'enable',
					'compare' => '='
				));
		}
		
		$args = array(
			'post_type' => 'post',
			'showposts' => $post_count,
			'cat' => $category,
			'tax_query' => $tax_query,
			'meta_query' => $rev_query,
			'order'=> $order
		);
		
		if($sort == 'popular'){
			$popular_arr = array(
				'orderby'=>'comment_count',
				'order'=> $order
			);
			$args = array_merge ($args, $popular_arr);
			
		}else if($sort == 'view'){
			$view_arr = array(
				'orderby'   =>  "meta_value_num",
				'meta_key'  =>  'EasyPostViewCounter',
				'order' =>  $order
			);
			$args = array_merge ($args, $view_arr);
		}
		

		$recents = new WP_Query($args);
		?>
		
		<ul class="recent-list">
			<?php
			$i = 0;
			while($recents->have_posts()): $recents->the_post();
			$i++;
			?>
			<li class="recent-post-<?php echo $thumbnail;?>">
				<article class="clearfix">
						
						<?php 
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full-size');
						$new_image = aq_resize( $image[0], 60, 60, TRUE, FALSE );
						
						switch($thumbnail){
							case 'large':
								if($thumbnail_first == true){
									if($i == 1 && has_post_thumbnail()) echo post_thumb(get_the_ID(),520, 360, true);
								}else{
									if(has_post_thumbnail()) echo post_thumb(get_the_ID(),520, 360, true);
								}
							break;
							case 'small' :
							if($thumbnail_first == true){
							if($i == 1 && has_post_thumbnail()) {
							?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="prl-thumbnail"><img src="<?php echo $new_image[0];?>" width="60" height="60" alt="<?php the_title_attribute(); ?>"></a>
							<?php
							}} else{ 
							if(has_post_thumbnail()):
							?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="prl-thumbnail"><img src="<?php echo $new_image[0];?>" width="60" height="60" alt="<?php the_title_attribute(); ?>"></a>	
							<?php
							endif;
							}
							break;
							
							default:
							break;	
						}
						?>
		
					<?php if($thumbnail == 'large' && $thumbnail_first == true && $i == 1) {?>	
					<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h3>
					<?php }else{?>
					<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h4>
					<?php }
					?>
					<?php if($meta == true) {?><?php post_meta($date,$author,$comment,$cat,$view);?><?php } ?>
					<?php 
					if($show_reviews == true) {
					echo get_rating_star(get_the_ID());	
					 }?>
					<?php if($show_excerpt == true) {?><p><?php echo text_trim(get_the_excerpt(),$num_excerpt,'...');?></p><?php } ?>
				</article>
			</li>
			<?php endwhile; wp_reset_query(); ?>
		</ul>
		
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['category'] = (int) $new_instance['category'];
		$instance['sort'] = $new_instance['sort'];
		$instance['order'] = $new_instance['order'];
		$instance['post-format'] = $new_instance['post-format'];
		$instance['post_count'] = (int) $new_instance['post_count'];
		$instance['thumbnail'] = $new_instance['thumbnail'];
		$instance['thumbnail_first'] = (bool) $new_instance['thumbnail_first'];
		$instance['meta'] = (bool) $new_instance['meta'];
		$instance['date'] = (bool) $new_instance['date'];
		$instance['author'] = (bool) $new_instance['author'];
		$instance['comment'] = (bool) $new_instance['comment'];
		$instance['view'] = (bool) $new_instance['view'];
		$instance['cat'] = (bool) $new_instance['cat'];
		$instance['show_reviews'] = (bool) $new_instance['show_reviews'];
		$instance['show_excerpt'] = (bool) $new_instance['show_excerpt'];
		$instance['num_excerpt'] = (int) $new_instance['num_excerpt'];

		return $instance;
	}


	function form($instance)
	{
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $category = isset($instance['category']) ? absint($instance['category']) : 0;
		$sort = isset($instance['sort']) ? $instance['sort'] : 'latest';
		$order = isset($instance['order']) ? $instance['order'] : 'DESC';
        $post_format = isset($instance['post-format']) ? $instance['post-format'] : 'all';
		$post_count = isset($instance['post_count']) ? absint($instance['post_count']) : 3;
		$thumbnail = isset($instance['thumbnail']) ? $instance['thumbnail'] : 'large';
		$thumbnail_first = isset($instance['thumbnail_first']) ? (bool) $instance['thumbnail_first'] : true;
        $meta = isset($instance['meta']) ? (bool) $instance['meta'] : false;
			$date = isset($instance['date']) ? (bool) $instance['date'] : false;
			$author = isset($instance['author']) ? (bool) $instance['author'] : false;
			$comment = isset($instance['comment']) ? (bool) $instance['comment'] : false;
			$view = isset($instance['view']) ? (bool) $instance['view'] : false;
			$cat = isset($instance['cat']) ? (bool) $instance['cat'] : false;
        $show_reviews = isset($instance['show_reviews']) ? (bool) $instance['show_reviews'] : false;
		$show_excerpt = isset($instance['show_excerpt']) ? (bool) $instance['show_excerpt'] : false;
		$num_excerpt = isset($instance['num_excerpt']) ? absint($instance['num_excerpt']) : false;
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'presslayer'); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category', 'presslayer'); ?>:</label> 
			<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" >
				<option value='all' <?php if ('all' == $category) echo 'selected="selected"'; ?>><?php _e('All categories', 'presslayer'); ?></option>
				<?php $prl_cats = get_categories('hide_empty=1&depth=1&type=post'); ?>
				<?php foreach($prl_cats as $prl_cat) {?>
				<option value='<?php echo $prl_cat->term_id; ?>' <?php selected($category, $prl_cat->term_id);?>><?php echo $prl_cat->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
		
		
		<p><label for="<?php echo $this->get_field_id('sort'); ?>"><?php _e('Sort by', 'presslayer'); ?>:</label><br>
           <select class="widefat" name="<?php echo $this->get_field_name('sort') ?>" id="<?php echo $this->get_field_id('sort')  ?>">
                <option <?php selected($sort, 'latest') ?> value="latest">Latest (time of posts)</option>
                <option <?php selected($sort, 'popular') ?> value="popular">Popular (number of comments)</option>
                <option <?php selected($sort, 'view') ?> value="view">View (number of views)</option>
            </select>   
        </p>
		
		<p><label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order by', 'presslayer'); ?>:</label><br>
           <select class="widefat" name="<?php echo $this->get_field_name('order') ?>" id="<?php echo $this->get_field_id('order')  ?>">
                <option <?php selected($order, 'DESC') ?> value="DESC">Descending</option>
                <option <?php selected($order, 'ASC') ?> value="ASC">Ascending</option>
            </select>   
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('post-format') ?>">
                <?php _e('Post Format', 'presslayer'); ?>
                <select class="widefat" name="<?php echo $this->get_field_name('post-format') ?>" id="<?php echo $this->get_field_id('post-format')  ?>">
                    <option <?php selected($post_format, '') ?> value="">All</option>
					<option <?php selected($post_format, 'video') ?> value="video">Video</option>
					<option <?php selected($post_format, 'audio') ?> value="audio">Audio</option>
					<option <?php selected($post_format, 'gallery') ?> value="gallery">Gallery</option>
                </select>   
            </label>
        </p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of posts to show', 'presslayer'); ?>:</label>
			<input id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo $post_count; ?>" type="text" size="3" />
		</p>
		
		<p>
            <label for="<?php echo $this->get_field_id('thumbnail') ?>">
                <?php  _e('Thumbnail','presslayer') ?>
                <select class="widefat" name="<?php echo $this->get_field_name('thumbnail') ?>" id="<?php echo $this->get_field_id('thumbnail')  ?>">
                    <option <?php selected('large', $thumbnail) ?> value="large">Large</option>
                    <option <?php selected('small', $thumbnail) ?> value="small">Small</option>
                 	<option <?php selected('nothumb', $thumbnail) ?> value="nothumb">No Thumbnails</option>
                </select>   
            </label>
        </p>
		
		<p>
            <label for="<?php echo $this->get_field_id('thumbnail_first'); ?>" ><input type="checkbox" name="<?php echo $this->get_field_name('thumbnail_first') ?>" id="<?php echo $this->get_field_id('thumbnail_first'); ?>" <?php checked(true, $thumbnail_first); ?>> <?php  _e('Show thumbnail for first post only','presslayer') ?></label>
        </p>
		
		<div class="meta-info">
            <p>
				<label for="<?php echo $this->get_field_id('meta'); ?>"><input class="recent-post-meta-info" type="checkbox" <?php checked(true, $meta); ?> id="<?php echo $this->get_field_id('meta'); ?>" name="<?php echo $this->get_field_name('meta'); ?>" /> <?php  _e('Show the meta infomation of post','presslayer') ?></label>
				
			</p>
            <p>&nbsp;&nbsp; <label for="<?php echo $this->get_field_id('date'); ?>" ><input type="checkbox" <?php disabled( false,  $meta ); ?> name="<?php echo $this->get_field_name('date') ?>" id="<?php echo $this->get_field_id('date'); ?>" <?php checked(true, $date); ?> class="submeta-info" > <?php  _e('Show the date of post','presslayer') ?> </label>
            </p>
            <p>&nbsp;&nbsp; <label for="<?php echo $this->get_field_id('author'); ?>" ><input type="checkbox" <?php disabled( false,  $meta ); ?> name="<?php echo $this->get_field_name('author') ?>" id="<?php echo $this->get_field_id('author'); ?>" <?php checked(true, $author); ?> class="submeta-info" > <?php  _e('Show the author info','presslayer') ?> </label>
            </p>
            <p>&nbsp;&nbsp; <label for="<?php echo $this->get_field_id('comment'); ?>" ><input type="checkbox" <?php disabled( false,  $meta ); ?> name="<?php echo $this->get_field_name('comment') ?>" id="<?php echo $this->get_field_id('comment'); ?>" <?php checked(true, $comment); ?> class="submeta-info" > <?php  _e('Show the comment','presslayer') ?> </label>
            </p>
			
			<p>&nbsp;&nbsp; <label for="<?php echo $this->get_field_id('view'); ?>" ><input type="checkbox" <?php disabled( false,  $meta ); ?> name="<?php echo $this->get_field_name('view') ?>" id="<?php echo $this->get_field_id('view'); ?>" <?php checked(true, $view); ?> class="submeta-info" > <?php  _e('Show views','presslayer') ?> </label>
            </p>
			
			<p>&nbsp;&nbsp; <label for="<?php echo $this->get_field_id('cat'); ?>" ><input type="checkbox" <?php disabled( false,  $meta ); ?> name="<?php echo $this->get_field_name('cat') ?>" id="<?php echo $this->get_field_id('cat'); ?>" <?php checked(true, $cat); ?> class="submeta-info" > <?php  _e('Show the category info','presslayer') ?> </label>
            </p>
        </div>
		
		<p>
			<label for="<?php echo $this->get_field_id('show_reviews'); ?>"><input class="checkbox" type="checkbox" <?php checked(true, $show_reviews); ?> id="<?php echo $this->get_field_id('show_reviews'); ?>" name="<?php echo $this->get_field_name('show_reviews'); ?>" /> <?php  _e('Show reviews','presslayer') ?></label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('show_excerpt'); ?>"><input class="checkbox" type="checkbox" <?php checked(true, $show_excerpt); ?> id="<?php echo $this->get_field_id('show_excerpt'); ?>" name="<?php echo $this->get_field_name('show_excerpt'); ?>" /> <?php  _e('Show excerpt','presslayer') ?></label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('num_excerpt'); ?>"><?php _e('Length of Excerpt', 'presslayer'); ?>:</label>
			<input id="<?php echo $this->get_field_id('num_excerpt'); ?>" name="<?php echo $this->get_field_name('num_excerpt'); ?>" value="<?php echo $num_excerpt; ?>" type="text" size="3" />
		</p>
		
		
	<?php }
}

add_action( 'widgets_init', create_function( '', "register_widget('recents_posts_Widget');" ) );
?>