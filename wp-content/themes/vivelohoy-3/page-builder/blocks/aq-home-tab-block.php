<?php
/** A simple text block **/
class AQ_Home_Tab_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Home Tab',
			'size' => 'span-12',
			'resizable' => 0
		);
		
		//create the block
		parent::__construct('aq_home_tab_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'review' =>  TRUE,
			'review_label' => 'MOST LATEST REVIEWS',
			'popular' =>  TRUE,
			'popular_label' => 'MOST POPULAR POSTS',
			'view' =>  TRUE,
			'view_label' => 'MOST VIEW POSTS',
			'num_excerpt' => 15
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<ul class="lightbox_form">
			<li>
				<label for="<?php echo $this->get_field_id('review') ?>">
					<div class="title">&nbsp;</div>
					<div class="input">
						<?php echo aq_field_checkbox('review', $block_id, $review) ?> Enable <strong>Latest Reviews</strong>
					</div>
				</label>
			</li>
			<li>
				<label for="<?php echo $this->get_field_id('review_label') ?>">
					<div class="title">Latest Reviews label</div>
					<div class="input">  
						<?php echo aq_field_input('review_label', $block_id, $review_label, $size = 'full') ?>
					</div>
				</label>
			</li>
			
			<li>
				<label for="<?php echo $this->get_field_id('popular') ?>">
					<div class="title">&nbsp;</div>
					<div class="input">
						<?php echo aq_field_checkbox('popular', $block_id, $popular) ?> Enable <strong>Popular Posts</strong>
					</div>
				</label>
			</li>
			<li>
				<label for="<?php echo $this->get_field_id('popular_label') ?>">
					<div class="title">Popular Posts label</div>
					<div class="input">  
						<?php echo aq_field_input('popular_label', $block_id, $popular_label, $size = 'full') ?>
					</div>
				</label>
			</li>
			
			<li>
				<label for="<?php echo $this->get_field_id('view') ?>">
					<div class="title">&nbsp;</div>
					<div class="input">
						<?php echo aq_field_checkbox('view', $block_id, $view) ?> Enable <strong>Most View Posts</strong>
					</div>
				</label>
			</li>
			<li>
				<label for="<?php echo $this->get_field_id('view_label') ?>">
					<div class="title">Most View label</div>
					<div class="input">  
						<?php echo aq_field_input('view_label', $block_id, $view_label, $size = 'full') ?>
					</div>
				</label>
			</li>
			
			<li>
				<label for="<?php echo $this->get_field_id('num_excerpt') ?>">
					<div class="title">Length of Excerpt</div>
					<div class="input">  
						<?php echo aq_field_input('num_excerpt', $block_id, $num_excerpt, $size = 'full') ?>
					</div>
				</label>
			</li>

		
        </ul>
		
<?php
	} 
	
	function block($instance) {
		extract($instance);

		?>	
		
<div class="prl-panel homepage-widget-tab">
	
	<ul id="hometab-<?php echo $instance['template_id'];?>-<?php echo $instance['block_id'];?>" class="prl-tab" data-prl-tab="{connect:'#content1'}">
		<?php if($review){?><li><a href="#"><?php echo strip_tags(trim($review_label));?></a></li><?php } ?>
		<?php if($popular){?><li><a href="#"><?php echo strip_tags(trim($popular_label));?></a></li><?php } ?>
		<?php if($view){?><li><a href="#"><?php echo strip_tags(trim($view_label));?></a></li><?php } ?>
	</ul>
    
   
    <ul id="content1" class="prl-switcher">
    <?php if($review){?>
	<li>
   
    <div class="prl-grid prl-grid-divider">
        <?php 
		//Reviews
		$rev_query = array(
			array(
				'key' => 'pl_enable_review',
				'value' => 'on',
				'compare' => '='
			));
		
		 
		$my_query = new WP_Query(array(
			'post_type' => 'post',
			'showposts' => 3,
			'post__not_in' => get_option('sticky_posts'),
			'meta_query' => $rev_query
		));
		while($my_query->have_posts()): $my_query->the_post();
		?>
		<div class="prl-span-4">
			<article class="prl-article">
				<?php echo post_thumb(get_the_ID(),520, 360, true);?>
				<h3 class="prl-article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h3> 
				<?php 
				echo get_rating_star(get_the_ID());?>
				<p><?php echo text_trim(get_the_excerpt(),$num_excerpt,'...');?></p>
			</article>
		</div>
		<?php endwhile; wp_reset_query(); ?>
    
    </div></li>
	<?php } ?>
	
	<?php if($popular){?>
    <li>
   
    <div class="prl-grid prl-grid-divider">
        <?php 
		$my_query = new WP_Query(array(
			'orderby'=>'comment_count',
			'order'=>'DESC',
			'post_type' => 'post',
			'post__not_in' => get_option('sticky_posts'),
			'showposts' => 3
		));
		while($my_query->have_posts()): $my_query->the_post();
		?>
		<div class="prl-span-4">
			<article class="prl-article">
				<?php echo post_thumb(get_the_ID(),520, 360, true);?>
				<h3 class="prl-article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h3> 
				<?php post_meta(true,false,true,false,false);?>
				<p><?php echo text_trim(get_the_excerpt(),$num_excerpt,'...');?></p>
			</article>
		</div>
		<?php endwhile; wp_reset_query(); ?>
    </div></li>
    <?php } ?>
	<?php if($view){?>
    <li><div class="prl-grid prl-grid-divider">
        <?php 
		$my_query = new WP_Query(array(
			'orderby'   =>  "meta_value_num",
			'meta_key'  =>  'EasyPostViewCounter',
			'order' =>  'DESC',
			'post_type' => 'post',
			'post__not_in' => get_option('sticky_posts'),
			'showposts' => 3
		));
		while($my_query->have_posts()): $my_query->the_post();
		?>
		<div class="prl-span-4">
			<article class="prl-article">
				<?php echo post_thumb(get_the_ID(),520, 360, true);?>
				<h3 class="prl-article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h3> 
				<?php post_meta(true,false,false,false,true);?>
				<p><?php echo text_trim(get_the_excerpt(),$num_excerpt,'...');?></p>
			</article>
		</div>
		<?php endwhile; wp_reset_query(); ?>
    </div></li>
	<?php } ?>
    </ul>

</div>

<script type="text/javascript">
	
var $ = jQuery.noConflict();
$(document).ready(function() { 
	$('#hometab-<?php echo $instance['template_id'];?>-<?php echo $instance['block_id'];?> li:first').addClass('prl-active');
});

</script>
			
			
		<?php
		
	}
	
}
