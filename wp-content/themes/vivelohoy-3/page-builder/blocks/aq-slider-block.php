<?php
/** A simple text block **/
class AQ_Slider_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Slider',
			'size' => 'span-12',
			'resizable' => 0
		);
		
		//create the block
		parent::__construct('aq_slider_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'category' => 0,
			'post_count' => '5'
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<ul class="lightbox_form">
			<li>
				<label for="<?php echo $this->get_field_id('category') ?>">
					<div class="title">Category</div>
					<div class="input">
						<?php echo aq_field_select('category', $block_id, get_array_cats(), $category) ?>
					</div>
				</label>
			</li>
			<li>
				<label for="<?php echo $this->get_field_id('post_count') ?>">
					<div class="title">Content</div>
					<div class="input"><?php echo aq_field_input('post_count', $block_id, $post_count, $size = 'small') ?></div>
				</label>
				
			</li>
        </ul>
		
<?php
	} 
	
	function block($instance) {
		extract($instance);

		?>
		
		<?php
		$slider = new WP_Query(array(
			'post_type' => 'post',
			'showposts' => $post_count,
			'cat' => $category
		));
		?>	
		
		<div id="homeslider" class="fullwidth flexslider">
			<ul class="slides">
				 <?php while($slider->have_posts()): $slider->the_post();
				 if( has_post_thumbnail()) : 
				 $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full-size');
				 $new_image = aq_resize( $image[0], 800, 400, TRUE, FALSE );
				 ?>
				   <li>
					<article>
						<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" rel="bookmark"><img width="800" height="400" src="<?php echo $new_image[0];?>" alt="<?php the_title_attribute();?>" /></a>
						<div class="caption"><h3><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" rel="bookmark"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h3></div>
						<div class="slider-meta"><span><?php the_time('F j, Y');?></span> <?php comments_popup_link( __('0 comments','presslayer'), __('1 comment','presslayer'), __('% comments','presslayer'), 'comments-link', __('Comments are off','presslayer'));?></div>
					</article>
				 </li>
				 <?php endif; endwhile; wp_reset_query(); ?>	
				</ul>
				</div>		

				<script type="text/javascript">
				jQuery(function ($) {
				  $('#homeslider').flexslider({
					autoPlay: true,
					pauseOnAction: false,
					animation: "fade"
				  });
				});
				</script>
			
			
		
		<?php
		
	}
	
}
