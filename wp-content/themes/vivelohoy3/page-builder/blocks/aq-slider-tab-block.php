<?php
/** A simple text block **/
class AQ_Slider_Tab_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Slider Tab',
			'size' => 'span-12',
			'resizable' => 0
		);
		
		//create the block
		parent::__construct('aq_slider_tab_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'tabs_pos' => 'tabs-right',
			'category' => 0
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<ul class="lightbox_form">
        <li>
			<label for="<?php echo $this->get_field_id('tabs_pos') ?>">
            <div class="title">Tabs position</div>
            <div class="input">  
				
				<?php echo aq_field_select('tabs_pos', $block_id, array('tabs-right' => 'Tabs on right', 'tabs-left' => 'Tabs on left'), $tabs_pos) ?>
				</div>
			</label>
		</li>

		<li>
			<label for="<?php echo $this->get_field_id('category') ?>">
				<div class="title">Category</div>
				<div class="input">
					<?php echo aq_field_select('category', $block_id, get_array_cats(), $category) ?>
                </div>
			</label>
			
		</li>
        </ul>
		
<?php
	} 
	
	function block($instance) {
		extract($instance);

		if($title) echo '<h4 class="aq-block-title">'.strip_tags($title).'</h4>';
		?>
		
		<?php
		$slider = new WP_Query(array(
			'post_type' => 'post',
			'showposts' => 5,
			'post__not_in' => get_option('sticky_posts'),
			'cat' => $category
		));
		$tab_items = '';	
		?>	
		<div id="sliderTab" class="<?php echo $tabs_pos;?>">
			<div id="mainFlexslider" class="slider_content flexslider" >
				<ul class="slides">
				 <?php while($slider->have_posts()): $slider->the_post();
				 if( has_post_thumbnail()):
				 $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full-size');
				 $new_image = aq_resize( $image[0], 550, 368, TRUE, FALSE );
				 $tab_items .= '<li><div class="tab_content"><a href="'.get_permalink().'" title="'.the_title_attribute('echo=0').'" rel="bookmark">'.get_the_title().'</a></div></li>';
				 ?>
				  <li>
				   <article> 
						<div class="slider_title">
							<?php post_meta(true,false,true,false,false);?>
							<h2><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h2>
						</div>
					   <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" rel="bookmark"><img width="550" height="368" src="<?php echo $new_image[0];?>" alt="<?php the_title_attribute();?>" /></a>
				   </article>
				 </li>
				 <?php 
				 endif;
				 endwhile; wp_reset_query(); ?>	
				 
				</ul>
		
				
				<script type="text/javascript">
					var $ = jQuery.noConflict();
					$(document).ready(function() { 
						$('#mainFlexslider').flexslider({
							animation: "fade",
							manualControls: "#main-slider-control-nav li"
						});
					});
				</script>
			
			</div>
			<div class="slider_tabs">
				<ul class="tabs" id="main-slider-control-nav">
					<?php echo $tab_items;?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		
		<?php
		
	}
	
}
