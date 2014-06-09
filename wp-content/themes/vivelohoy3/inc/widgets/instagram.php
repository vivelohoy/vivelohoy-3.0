<?php
add_action('widgets_init', 'instagram_widget_load');

function instagram_widget_load()
{
	register_widget('Instagram_Widget');
}

class Instagram_Widget extends WP_Widget {
	
	function Instagram_Widget()
	{
		$widget_ops = array('classname' => 'photos-widget', 'description' => 'The most recent photos from instagram.');

		$control_ops = array('id_base' => 'instagram_widget');

		$this->WP_Widget('instagram_widget', '&raquo; Instagram', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		global $theme;
		extract($args);
		
		$title = isset($instance['title']) ? $instance['title'] : '';
		$user = isset($instance['user']) ? $instance['user'] : '';
		$token = isset($instance['token']) ? $instance['token'] : '';
		$count = isset($instance['count']) ? $instance['count'] : '';
		
		echo $before_widget;
		?>
		<!-- BEGIN WIDGET -->
		<?php
		if($title) echo $before_title.$title.$after_title;
		?>
		
		<script>
		$(function () {
			$("#instagram-<?php echo $widget_id;?>").jqinstapics({
			  "user_id": "<?php echo $user;?>",
			  "access_token": "<?php echo $token;?>",
			  "count": <?php echo $count;?>
			});
		});
		</script>
		
		<div class="pt-wrapper">
			<div id="instagram-<?php echo $widget_id;?>" class='pt-inner clearfix'></div>
		</div>
		
		<?php

		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['user'] = $new_instance['user'];
		$instance['token'] = $new_instance['token'];
		$instance['count'] = $new_instance['count'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Instagram', 'user' => '294495709', 'token' => '294495709.5b9e1e6.8b935342cb424bcbb14d38b0cacebe3b', 'count' => 6);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" type="text" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('user'); ?>">Instagram username:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" value="<?php echo $instance['user']; ?>" type="text" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('token'); ?>">Access token:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('token'); ?>" name="<?php echo $this->get_field_name('token'); ?>" value="<?php echo $instance['token']; ?>" type="text" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('count'); ?>">Number of photos:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $instance['count']; ?>" type="text" />
			</p>
	<?php }
}

?>