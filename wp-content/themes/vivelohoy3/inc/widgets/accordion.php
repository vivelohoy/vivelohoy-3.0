<?php  
/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class accordion_Widget extends nested_Widget {

    function accordion_Widget() {
        $widget_ops = array( 'classname' => 'prl-accordion', 'description' => __('Display widgets inside a accordion','presslayer') );
        $this->WP_Widget( 'prl-accordions', '&raquo; Accordion', $widget_ops );
    }

    function display_widgets_front($instance){
        global $wp_registered_widget_updates;
        wp_parse_args($instance, array(
          'widgets' => array()
        ));
        
        $widgets = explode(':prl-data:', $instance['widgets'] );
        if( !empty($widgets) && is_array($widgets) ){ ?>
		
          
		  <script>
			$(function () {
				$("#accordion-<?php echo $this->id ?>").jAccordion(); 
			});	
		  </script>
		  
		  <div id="accordion-<?php echo $this->id ?>" class="prl-accordion">
		  
          <?php
          $i = 0;
          foreach ($widgets as $widget ) {
            $active = '';
            if( $i == 0 ){ $active='active'; } 
            $i++;
            if( !empty( $widget ) ) {
              $url = rawurldecode($widget);
              parse_str($widget,$s);
              $instance = !empty($s['widget-'.$s['id_base']]) ? array_shift( $s['widget-'.$s['id_base']] ) : array();
              $widget = $this->get_widgets( $s['id_base'], $i );
			  
              if( $widget ) {
                $widget_title = isset($instance['title']) ? $instance['title'] : $widget->name;
				?>
				<section>
					<a href="#<?php echo $s['widget-id'];?>" id="<?php echo $s['widget-id'];?>" class="head"><?php echo $widget_title;?></a>
					<div class="acc-content">
						<?php  
						  $default_args = array(
						  	'widget_id' => $s['widget-id'], 
							'before_widget' => '<div id="'.$s['widget-id'].'" class="widget '.$widget->widget_options['classname'].' prl-panel clearfix">', 
							'after_widget' => '</div>', 
							'before_title' => '<h3 class="widget-title">',
							'after_title' => '</h3>' 
						  );
						  $widget->widget($default_args,$instance);
						?>
					</div>
				</section>
				<?php
              }
            }
          }
          ?>
          </div>
          <?php
           
         } 
    }
}

add_action( 'widgets_init', create_function( '', "register_widget('accordion_Widget');" ) );
?>