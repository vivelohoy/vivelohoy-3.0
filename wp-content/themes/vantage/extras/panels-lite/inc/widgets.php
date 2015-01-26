<?php

/**
 * Display a loop of posts.
 *
 * Class SiteOrigin_Panels_Widgets_PostLoop
 */
class SiteOrigin_Panels_Widgets_PostLoop extends WP_Widget{
	function __construct() {
		parent::__construct(
			'siteorigin-panels-postloop',
			__( 'Post Loop (PB)', 'vantage' ),
			array(
				'description' => __( 'Displays a post loop.', 'vantage' ),
			)
		);
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		if( empty($instance['template']) ) return;
		if( is_admin() ) return;

		echo $args['before_widget'];

		$instance['title'] = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
		if ( !empty( $instance['title'] ) ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
		}

		if(strpos('/'.$instance['template'], '/content') !== false) {
			while(have_posts()) {
				the_post();
				locate_template($instance['template'], true, false);
			}
		}
		else {
			locate_template($instance['template'], true, false);
		}

		echo $args['after_widget'];

		// Reset everything
		rewind_posts();
		wp_reset_postdata();
	}

	function update($new, $old){
		return $new;
	}

	/**
	 * Get all the existing files
	 *
	 * @return array
	 */
	function get_loop_templates(){
		$templates = array();

		$template_files = array(
			'loop*.php',
			'*/loop*.php',
			'content*.php',
			'*/content*.php',
		);

		$template_dirs = array(get_template_directory(), get_stylesheet_directory());
		$template_dirs = array_unique($template_dirs);
		foreach($template_dirs  as $dir ){
			foreach($template_files as $template_file) {
				foreach(glob($dir.'/'.$template_file) as $file) {
					$templates[] = str_replace($dir.'/', '', $file);
				}
			}
		}

		$templates = array_unique($templates);
		sort($templates);

		return $templates;
	}

	/**
	 * Display the form for the post loop.
	 *
	 * @param array $instance
	 * @return string|void
	 */
	function form( $instance ) {
		?>
		<p><?php printf( __('Please install Page Builder to use this widget.', 'vantage') ) ?></p>
		<?php
	}
}

/**
 * Register the widgets.
 */
function siteorigin_panels_lite_widgets_init(){
	register_widget('SiteOrigin_Panels_Widgets_PostLoop');
}
add_action('widgets_init', 'siteorigin_panels_lite_widgets_init');