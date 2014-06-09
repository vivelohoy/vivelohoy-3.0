<?php
add_action('widgets_init', 'newsletter_load_widgets');

function newsletter_load_widgets()
{
	register_widget('Newsletter_Widget');
}

class Newsletter_Widget extends WP_Widget {
	
	function Newsletter_Widget()
	{
		$widget_ops = array('classname' => 'widget_newsletter', 'description' => 'Newsletter widget let you display Twitter updates.');

		$control_ops = array('id_base' => 'newsletter-widget');

		$this->WP_Widget('newsletter-widget', '&raquo; Newsletter', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		
		$title = isset($instance['title']) ? $instance['title'] : '';
		$text = isset($instance['text']) ? $instance['text'] : '';
		$feedburner = isset($instance['feedburner']) ? $instance['feedburner'] : '';
		
		echo $before_widget;
		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
		
		<p><?php echo $text; ?></p>
		<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedburner; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			<fieldset>
				<div class="prl-form-row prl-newsletter-email"><input type="text" placeholder="<?php _e('Email address','presslayer');?>" name="email"  /></div>
				<div class="prl-form-row"><button class="prl-button prl-button-newsletter" type="submit"><?php _e('Subscribe','presslayer');?></button></div>
			</fieldset>
			<input type="hidden" value="<?php echo $feedburner; ?>" name="uri" />
			<input type="hidden" name="loc" value="en_US" />
		</form>
		
		<?php

		
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = $new_instance['text'];
		$instance['feedburner'] = $new_instance['feedburner'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Newsletter', 'text' => 'Sign up to receive email updates and to hear what\'s going on with our company!', 'feedburner' => 'presslayer');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" type="text" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Text for intro:</label>
			<textarea class="widefat" style="height:100px" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $instance['text']; ?></textarea>

		</p>

		
		<p>
			<label for="<?php echo $this->get_field_id('feedburner'); ?>">Feedburner ID:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('feedburner'); ?>" name="<?php echo $this->get_field_name('feedburner'); ?>" value="<?php echo $instance['feedburner']; ?>" type="text" />
			<p style="font-size:11px"><a href="http://feedburner.google.com/" target="_blank">Register Feedburn ID?</a></p>
		</p>
		
		
	<?php
	}
}
?>