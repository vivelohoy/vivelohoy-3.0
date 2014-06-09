<?php
add_action('widgets_init', 'facebook_load_widget');

function facebook_load_widget()
{
	register_widget('Facebook_Widget');
}

class Facebook_Widget extends WP_Widget {
	
	function Facebook_Widget() {
		$widget_ops = array('classname' => 'facebook-widget', 'description' => 'Add a Facebook Like box to sidebar');
		$control_ops = array('id_base' => 'facebook-like-widget');
		$this->WP_Widget('facebook-like-widget', '&raquo; Facebook Box', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);
		$page_url = $instance['page_url'];
		$show_faces = isset($instance['show_faces']) ? 'true' : 'false';
		$height = '65';
		
		if($show_faces == 'true') {
			$height = '260';
		}
		
		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		
		if($page_url): ?>
		
		<div class="fw-wrapper">
			<div class="fw-inner">
			<iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($page_url); ?>&amp;width=500&amp;colorscheme=light&amp;border_color=white&amp;show_faces=<?php echo $show_faces; ?>&amp;stream=false&amp;header=false&amp;height=260" id="facebook-iframe" ></iframe>
			
			</div>
		</div>
		
	
		<?php endif;
		
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['page_url'] = $new_instance['page_url'];
		$instance['show_faces'] = $new_instance['show_faces'];
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Facebook', 'page_url' => 'http://www.facebook.com/presslayer',  'show_faces' => 'on');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" type="text" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('page_url'); ?>">Facebook Page URL:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('page_url'); ?>" name="<?php echo $this->get_field_name('page_url'); ?>" value="<?php echo $instance['page_url']; ?>" type="text" />
		</p>
		
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_faces'], 'on'); ?> id="<?php echo $this->get_field_id('show_faces'); ?>" name="<?php echo $this->get_field_name('show_faces'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_faces'); ?>">Show faces</label>
		</p>
		
		
	<?php
	}
}
?>