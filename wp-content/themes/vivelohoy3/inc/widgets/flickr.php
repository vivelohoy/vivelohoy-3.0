<?php
class Flickr_Widget extends WP_Widget {

	function __construct() {
        $widget_ops = array('classname' => 'photos-widget', 'description' => __( 'Show latest posts in picture', 'presslayer' ) );
        parent::__construct('flickr_widget', __( '&raquo; Flickr', 'presslayer' ), $widget_ops);
    }
	
	function widget($args, $instance)
	{
		global $theme;
		extract($args);
		
		$title = isset($instance['title']) ? $instance['title'] : '';
		$user = isset($instance['user']) ? $instance['user'] : '';
		$count = isset($instance['count']) ? $instance['count'] : '';
		
		echo $before_widget;
		?>
		<!-- BEGIN WIDGET -->
		<?php
		if($title) echo $before_title.$title.$after_title;
		?>
		
		<script>
		$(function () {
	
			$('#flickr-<?php echo $widget_id;?>').jflickrfeed({
				limit: <?php echo $count;?>,
				qstrings: {
					id: '<?php echo $user;?>'
				},
				itemTemplate: '<a href="{{link}}" target="_blank"><img src="{{image_s}}" alt="{{title}}" /></a>'
			});
		});
		</script>
		
		<div class="pt-wrapper">
			<div id="flickr-<?php echo $widget_id;?>" class='pt-inner clearfix'></div>
		</div>
		
		<?php

		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['user'] = $new_instance['user'];
		$instance['count'] = $new_instance['count'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Flickr', 'user' => '52617155@N08', 'count' => 6);
		$instance = wp_parse_args((array) $instance, $defaults); 
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" type="text" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('user'); ?>">Flickr ID:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" value="<?php echo $instance['user']; ?>" type="text" />
				<br />
				<small><a href="http://idgettr.com/" target="_blank">Get Flickr ID?</a></small>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('count'); ?>">Number of photos:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $instance['count']; ?>" type="text" />
			</p>
	<?php }
}

add_action( 'widgets_init', create_function( '', "register_widget('Flickr_Widget');" ) );

?>