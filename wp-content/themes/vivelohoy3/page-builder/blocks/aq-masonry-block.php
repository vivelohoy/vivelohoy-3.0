<?php
/** A simple text block **/
class AQ_Masonry_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Masonry',
			'size' => 'span-12',
			'resizable' => 0
		);
		
		//create the block
		parent::__construct('aq_masonry_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'title' => 'Masonry',
			'category' => 0,
			'post_count' => '10',
			'width' => 'medium',
			'infinite' => 'yes',
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
				<label for="<?php echo $this->get_field_id('width') ?>">
					<div class="title">Column Width</div>
					<div class="input">
						<?php echo aq_field_select('width', $block_id, array('200' => 'Small','300'=>'Medium','450'=>'Large'), $width) ?>
					</div>
				</label>
			</li>
			<li>
				<label for="<?php echo $this->get_field_id('infinite') ?>">
					<div class="title">Infinite Scroll</div>
					<div class="input">
						<?php echo aq_field_select('infinite', $block_id, array('yes' => 'Yes', 'no'=>'No (use Pagination)'), $infinite) ?>
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
		<div class="masonry-container">
			<?php while (have_posts()) : the_post();?>
			 <div class="masonry-item">
				 <article class="prl-article">
					<?php echo post_thumb(get_the_ID(),520, 1000, FALSE);?>
					<h3 class="prl-article-title"><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" rel="bookmark"><?php the_title();?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h3> 
					<?php post_meta();?>
					<p><?php echo text_trim(get_the_excerpt(),$num_excerpt,'...');?></p>
				</article>
				 
			 </div><!-- .masonry-item -->
			 <?php endwhile; ?>	
		  </div><!-- .container -->
		  
		  <script type="text/javascript">
			jQuery(function ($) {	
				var $container = $('.masonry-container');
				var gutter = 25;
				var min_width = <?php echo $width;?>;
				$container.imagesLoaded( function(){
					$container.masonry({
						itemSelector : '.masonry-item',
						gutterWidth: gutter,
						isAnimated: true,
						columnWidth: function( containerWidth ) {
							var box_width = (((containerWidth - 2*gutter)/3) | 0) ;
							if (box_width < min_width) {box_width = (((containerWidth - gutter)/2) | 0);}
							if (box_width < min_width) {box_width = containerWidth;}
							$('.masonry-item').width(box_width);
							return box_width;
						}
					});
				});
				<?php if($infinite == 'yes'){?>
				$container.infinitescroll({
						navSelector  : '#page-nav', 
						nextSelector : '#page-nav a',
						itemSelector : '.masonry-item',
						loading: {
							selector: '#infscr-load',
							msgText  : '<?php _e('Loading','presslayer');?> ...',   
							finishedMsg: '<?php _e('No more posts to load','presslayer');?>.'
						}
					}, 
					
					function( newElements ) {
						var $newElems = $( newElements ).css({ opacity: 0 });
						$newElems.imagesLoaded(function(){
							$newElems.animate({ opacity: 1 });
							$container.append( $newElems ).masonry( 'reload' );
							$('#page-nav').show();
							
							// init
							$('.popup-link-video').magnificPopup({type:'iframe'});
							$('.popup-link-image').magnificPopup({
								type: 'image',
								fixedContentPos: true,
								mainClass: 'mfp-no-margins mfp-with-zoom', 
								image: {
								verticalFit: true
								},
								zoom: {
									enabled: true,
									duration: 300
								}
							});
							
							$("body").fitVids();
							// init end
						});
				});
				
				// kill scroll binding
				$(window).unbind('.infscr');
			
				$("#page-nav a").on('click',function(){
					$container.infinitescroll('retrieve');
					return false;
				});
			
				// remove the paginator when we're done.
				$(document).ajaxError(function(e,xhr,opt){
				  if (xhr.status == 404) $('#page-nav a').remove();
				});

				<?php } ?>
				
			});
			
			</script>
			
			<?php if($infinite == 'yes'){?>
			<div id="page-nav" class="page-nav">
			<?php next_posts_link(__('Load more posts','presslayer').' ...') ?>
			</div>
			<div id="infscr-load"></div>
			<?php } else {?>
			
			<?php if ( function_exists( 'page_navi' ) ) echo '<hr class="prl-article-divider">'; page_navi( 'items=5&amp;show_num=1&amp;num_position=after' ); ?>
			<?php }?>
			<?php wp_reset_query();
	}
	
}
