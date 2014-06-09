<?php
add_action('widgets_init', 'login_widget_load');

function login_widget_load()
{
	register_widget('Login_Widget');
}

class Login_Widget extends WP_Widget {
	
	function Login_Widget()
	{
		$widget_ops = array('classname' => 'widget-login', 'description' => 'The login form for sidebars.');

		$control_ops = array('id_base' => 'login_widget');

		$this->WP_Widget('login_widget', '&raquo; Login', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		global $theme;
		extract($args);
		
		$title = $instance['title'];
		
		echo $before_widget;
		?>
		<!-- BEGIN WIDGET -->
		<?php
		if($title) echo $before_title.$title.$after_title;
		login_form();
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Login');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" type="text" />
			</p>
	<?php }
}

?>
