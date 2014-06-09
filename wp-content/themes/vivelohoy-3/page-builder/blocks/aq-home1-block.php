<?php
/** A simple text block **/
class AQ_Home1_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Home #1',
			'size' => 'span-12',
			'resizable' => 0
		);
		
		//create the block
		parent::__construct('aq_home1_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'title' => 'Recent posts',
			'style' => 'prl-homestyle-left',
			'category' => 0,
			'num_excerpt' =>15
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<ul class="lightbox_form">
        <li>
			<label for="<?php echo $this->get_field_id('title') ?>">
            <div class="title">Title</div>
            <div class="input">  
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
				</div>
			</label>
		</li>
		<li>
			<label for="<?php echo $this->get_field_id('style') ?>">
            <div class="title">Style</div>
            <div class="input">  
				<?php echo aq_field_select('style', $block_id, array('prl-homestyle-left' => 'Left', 'prl-homestyle-right' => 'Right'), $style) ?>
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

			<?php if($category > 0){?>
			<h5 class="prl-block-title <?php echo catcolor($category);?>"><a href="<?php echo get_category_link( $category ); ?>"><?php echo get_the_category_by_ID( $category); ?></a> <span class="prl-block-title-link right"><a href="<?php echo get_category_link( $category ); ?>"><?php _e('All posts','presslayer');?> <i class="fa fa-caret-right"></i></a></span></h5>
			<?php } else {?>
			<h5 class="prl-block-title"><?php echo $title;?></h5>	
			<?php }?>
			
			<div class="prl-grid prl-grid-divider <?php echo $style;?>">
				<?php 
				$recent_posts = new WP_Query(array('post_type' => 'post','showposts' => 7,'post__not_in' => get_option('sticky_posts'),'cat' => $category));
				$p=0;
				while($recent_posts->have_posts()): $recent_posts->the_post(); 
				$p++;
				?>
				<?php if($p < 2){?>
				<?php if($p == 1) echo '<div class="prl-span-8 prl-span-left">';?>
				<article class="prl-article">
					<?php echo post_thumb(get_the_ID(),520, 360, true);?>
					<h2 class="prl-article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h2> 
					<?php post_meta(true,false,true,false,false);?> 
					<p><?php echo text_trim(get_the_excerpt(),$num_excerpt,'...');?></p>   
				</article>
				<hr class="prl-article-divider">
				<ul class="prl-list prl-list-line prl-list-arrow">
				<?php } else if($p < 6) {?>
					<li><h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h4></li>
				<?php } else {?>
				<?php if($p==6) echo '</ul></div><div class="prl-span-4 prl-span-right">';?>	
					<article class="prl-article prl-panel">
						<?php echo post_thumb(get_the_ID(),520, 360, true);?>
						<h3 class="prl-article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h3> 
						<?php post_meta(true,false,true,false,false);?>    
						<p><?php echo text_trim(get_the_excerpt(),$num_excerpt,'...');?></p>
					</article>
				<?php } ?>	
				<?php endwhile; wp_reset_query(); ?>
				<?php echo '</div>'; ?>
			</div>
  
		
		
		<?php
		
	}
	
}
