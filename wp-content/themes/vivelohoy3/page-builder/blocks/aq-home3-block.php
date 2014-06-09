<?php
/** A simple text block **/
class AQ_Home3_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Home 3 cols',
			'size' => 'span-12',
			'resizable' => 0
		);
		
		//create the block
		parent::__construct('aq_home3_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'title1' => 'Recent posts',
			'category1' => 0,
			'title2' => 'Recent posts',
			'category2' => 0,
			'title3' => 'Recent posts',
			'category3' => 0,
			'num_excerpt' =>15
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<ul class="lightbox_form">
			<li>
				<label for="<?php echo $this->get_field_id('title1') ?>">
				<div class="title">Title #1</div>
				<div class="input">  
					<?php echo aq_field_input('title1', $block_id, $title1, $size = 'full') ?>
					</div>
				</label>
			</li>
			
			<li>
				<label for="<?php echo $this->get_field_id('category1') ?>">
					<div class="title">Category #1</div>
					<div class="input">
						<?php echo aq_field_select('category1', $block_id, get_array_cats(), $category1) ?>
					</div>
				</label>
				
			</li>
						<li>
				<label for="<?php echo $this->get_field_id('title2') ?>">
				<div class="title">Title #2</div>
				<div class="input">  
					<?php echo aq_field_input('title2', $block_id, $title2, $size = 'full') ?>
					</div>
				</label>
			</li>
			
			<li>
				<label for="<?php echo $this->get_field_id('category2') ?>">
					<div class="title">Category #2</div>
					<div class="input">
						<?php echo aq_field_select('category2', $block_id, get_array_cats(), $category2) ?>
					</div>
				</label>
				
			</li>
						<li>
				<label for="<?php echo $this->get_field_id('title3') ?>">
				<div class="title">Title #3</div>
				<div class="input">  
					<?php echo aq_field_input('title3', $block_id, $title3, $size = 'full') ?>
					</div>
				</label>
			</li>
			
			<li>
				<label for="<?php echo $this->get_field_id('category3') ?>">
					<div class="title">Category #1</div>
					<div class="input">
						<?php echo aq_field_select('category3', $block_id, get_array_cats(), $category3) ?>
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
		extract($instance);	?>	
		    


    <div class="prl-grid prl-grid-divider">
       
		<div class="prl-span-4">
        	 <?php if($category1 > 0){?>
			<h5 class="prl-block-title <?php echo catcolor($category1);?>"><a href="<?php echo get_category_link( $category1 ); ?>"><?php echo get_the_category_by_ID( $category1); ?></a> <span class="prl-block-title-link right"><a href="<?php echo get_category_link( $category1 ); ?>"><?php _e('All posts','PressLayer');?> <i class="fa fa-caret-right"></i></a></span></h5>
			<?php } else {?>
			<h5 class="prl-block-title"><?php echo $title1;?></h5>	
			<?php }?>
			
            <?php 
			$recent_post1 = new WP_Query(array('post_type' => 'post','showposts' => 1,'post__not_in' => get_option('sticky_posts'),'cat' => $category1));
			$p=0;
			while($recent_post1->have_posts()): $recent_post1->the_post(); 
			$p++;
			?>
			<article class="prl-article">
				<?php echo post_thumb(get_the_ID(),520, 360, true);?>
				<h3 class="prl-article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" ><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h3>
				 
				<?php post_meta(true,false,true,false,false);?>     
				<p><?php echo text_trim(get_the_excerpt(),$num_excerpt,'...');?></p>
			</article>
			<?php endwhile; wp_reset_query(); ?>   
        </div>
		
		
		<div class="prl-span-4">
        	 <?php if($category2 > 0){?>
			<h5 class="prl-block-title <?php echo catcolor($category2);?>"><a href="<?php echo get_category_link( $category2 ); ?>"><?php echo get_the_category_by_ID( $category2); ?></a> <span class="prl-block-title-link right"><a href="<?php echo get_category_link( $category2 ); ?>"><?php _e('All posts','presslayer');?> <i class="fa fa-caret-right"></i></a></span></h5>
			<?php } else {?>
			<h5 class="prl-block-title"><?php echo $title2;?></h5>	
			<?php }?>
			
            <?php 
			$recent_post2 = new WP_Query(array('post_type' => 'post','showposts' => 1,'post__not_in' => get_option('sticky_posts'),'cat' => $category2));
			$p=0;
			while($recent_post2->have_posts()): $recent_post2->the_post(); 
			$p++;
			?>
			<article class="prl-article">
				<?php echo post_thumb(get_the_ID(),520, 360, true);?>
				<h3 class="prl-article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" ><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h3> 
				<?php post_meta(true,false,true,false,false);?>  
				<p><?php echo text_trim(get_the_excerpt(),$num_excerpt,'...');?></p>
			</article>
			<?php endwhile; wp_reset_query(); ?>   
        </div>
		
		
		<div class="prl-span-4">
        	 <?php if($category3 > 0){?>
			<h5 class="prl-block-title <?php echo catcolor($category3);?>"><a href="<?php echo get_category_link( $category3 ); ?>"><?php echo get_the_category_by_ID( $category3); ?></a> <span class="prl-block-title-link right"><a href="<?php echo get_category_link( $category3 ); ?>"><?php _e('All posts','presslayer');?> <i class="fa fa-caret-right"></i></a></span></h5>
			<?php } else {?>
			<h5 class="prl-block-title"><?php echo $title3;?></h5>	
			<?php }?>
			
            <?php 
			$recent_post3 = new WP_Query(array('post_type' => 'post','showposts' => 1,'post__not_in' => get_option('sticky_posts'),'cat' => $category3));
			$p=0;
			while($recent_post3->have_posts()): $recent_post3->the_post(); 
			$p++;
			?>
			<article class="prl-article">
				<?php echo post_thumb(get_the_ID(),520, 360, true);?>
				<h3 class="prl-article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h3> 
				<?php post_meta(true,false,true,false,false);?>     
				<p><?php echo text_trim(get_the_excerpt(),$num_excerpt,'...');?></p>
			</article>
			<?php endwhile; wp_reset_query(); ?>   
        </div>
    	
        
    </div>
       	
	<?php
		
	}
	
}
