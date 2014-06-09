<?php
/** A simple text block **/
class AQ_Blog_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Blog',
			'size' => 'span-12',
			'resizable' => 0
		);
		
		//create the block
		parent::__construct('aq_blog_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'title' => 'Blog',
			'category' => 0,
			'post_count' => '10',
			'thumbnail' =>'t-left',
			'num_excerpt' =>35
			
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
				<label for="<?php echo $this->get_field_id('category') ?>">
					<div class="title">Category</div>
					<div class="input">
						<?php echo aq_field_select('category', $block_id, get_array_cats(), $category) ?>
					</div>
				</label>
			</li>
			<li>
				<label for="<?php echo $this->get_field_id('post_count') ?>">
					<div class="title">Post count</div>
					<div class="input"><?php echo aq_field_input('post_count', $block_id, $post_count, $size = 'small') ?></div>
				</label>
				
			</li>
			<li>
				<label for="<?php echo $this->get_field_id('thumbnail') ?>">
					<div class="title">Thumbnail position</div>
					<div class="input">
						<?php echo aq_field_select('thumbnail', $block_id, array('t-left'=>'Left', 't-right'=>'Right'), $thumbnail) ?>
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

		if(is_front_page()){
			$current_page_num = get_query_var('page') ? get_query_var('page') : 1;
		}else{
			$current_page_num = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		}
		query_posts(array(
			'post_type'=>'post',
			'orderby' => '',
			'order' => '',
			'posts_per_page' => $post_count,
			'cat' => $category,
			'paged'=> $current_page_num
		));
		?>
		<?php if($title!='') echo '<h5 class="prl-block-title">'.trim($title).'</h5>';?>	
		<ul class="prl-list-category">
			<?php while (have_posts()) : the_post();?>
			 <li id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
				<article class="prl-article">
					<div class="list-thumbnail <?php echo $thumbnail;?>"><?php echo post_thumb(get_the_ID(),520, 360, true);?></div>
					<div class="prl-article-entry">
						<h2 class="prl-article-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h2> 
						<?php post_meta();?>
						<p><?php echo text_trim(get_the_excerpt(),$num_excerpt,'...');?></p>
					</div>
				</article>
			</li>
			 <?php endwhile; ?>	
		  </ul>
		  
		  <?php if ( function_exists( 'page_navi' ) ) page_navi( 'items=5&amp;show_num=1&amp;num_position=after' ); ?>
		 <?php wp_reset_query();
	}
	
}
