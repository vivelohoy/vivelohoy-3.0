<?php
class Post_in_Pic_Widget extends WP_Widget {
	function __construct() {
        $widget_ops = array('classname' => 'photos-widget', 'description' => __( 'Show latest posts in picture', 'presslayer' ) );
        parent::__construct('post_in_pic', __( '&raquo; Post in Picture', 'presslayer' ), $widget_ops);
    }
	
	function widget($args, $instance)
	{
		global $theme;
		extract($args);
		
		$title = isset($instance['title']) ? $instance['title'] : '';
		$category = isset($instance['category']) ? $instance['category'] : '';
		$post_count = isset($instance['post_count']) ? $instance['post_count'] : '';
		
		echo $before_widget;
		?>
		
		<!-- BEGIN WIDGET -->
		<?php
		if($category > 0){
			echo $before_title.'<a href="'.get_category_link( $category ).'">'.get_the_category_by_ID( $category).'</a><span class="prl-block-title-link right"><a href="'.get_category_link( $category ).'">'.__('All posts','PressLayer').' <i class="fa fa-caret-right"></i></a></span>'.$after_title;
		}else{
			if($title) echo $before_title.$title.$after_title;
		}
		?>
		<div class="pt-wrapper">
			<div id="post-pic-<?php echo $widget_id;?>" class='pt-inner clearfix'>
				<?php
				$args = array(
					'post_type' => 'post',
					'showposts' => $post_count,
					'post__not_in' => get_option('sticky_posts'),
					'cat' => $category
				);
				$recents = new WP_Query($args);
				while($recents->have_posts()): $recents->the_post();
				$new_image = wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), '75x75');
				?>
				<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" rel="bookmark"><?php echo $new_image;?></a>
				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
		
		<?php

		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['category'] = $new_instance['category'];
		$instance['post_count'] = $new_instance['post_count'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Post in Pictures', 'category' => '', 'post_count' => 6);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" type="text" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category', 'presslayer'); ?>:</label> 
				<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" >
					<option value='all' <?php if ('all' == $instance['category']) echo 'selected="selected"'; ?>>All categories</option>
					<?php $categories = get_categories('hide_empty=1&depth=1&type=post'); ?>
					<?php foreach($categories as $category) { ?>
					<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['category']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
					<?php } ?>
				</select>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of posts to show', 'presslayer'); ?>:</label>
				<input id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo $instance['post_count']; ?>" type="text" size="3" />
			</p>
	<?php }
}


add_action( 'widgets_init', create_function( '', "register_widget('Post_in_Pic_Widget');" ) );

?>