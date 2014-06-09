<?php 
	global $pl_data, $theme_url;
	if (have_posts()) :?>
	
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h3 class="prl-archive-title"><?php single_cat_title(); ?></h3>
		<?php echo category_description(); ?> 
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h3 class="prl-archive-title"><?php _e('Posts Tagged','presslayer');?>: <?php single_tag_title(); ?></h3>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h3 class="prl-archive-title"><?php _e('Archive for','presslayer');?> <?php the_time('F jS, Y'); ?></h3>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h3 class="prl-archive-title"><?php _e('Archive for','presslayer');?> <?php the_time('F, Y'); ?></h3>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h3 class="prl-archive-title"><?php _e('Archive for','presslayer');?> <?php the_time('Y'); ?></h3>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h3 class="prl-archive-title"><?php _e('Blog Archives','presslayer');?></h3>
 	  <?php } elseif (is_search()){ ?>
	  	<h3 class="prl-archive-title"><?php _e('Search Results','presslayer');?></h3>
	  <?php } ?>
	
	<div class="prl-grid prl-grid-divider">
	<?php 
	$i=0;
	$endRow = 0;
	$columns = 2; // number of columns
	$hloopRow1 = 0; // first row flag
	while (have_posts()) : the_post();
	$i++;
	if($endRow == 0  && $hloopRow1++ != 0) echo '<div class="prl-grid prl-grid-divider">';
	?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('prl-span-6'); ?>>
		<article class="prl-article">
			<?php if( has_post_thumbnail()):?><div class="cat-thumbnail"><?php echo post_thumb(get_the_ID(),520, 360, true);?></div><?php endif;?>
			<div class="prl-article-entry">
				<h2 class="prl-article-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h2> 
				<?php post_meta();?>
				<?php the_excerpt();?>
			</div>
		</article>
	</div>

	<?php 
	$endRow++;
	if($endRow >= $columns) {
		echo '</div> <hr class="prl-grid-divider">';
		$endRow = 0;
	}
	endwhile; 
	
	if($endRow != 0) {
		while ($endRow < $columns) {
			echo('<div class="prl-span-6">&nbsp;</div>');
			$endRow++;
		}
		echo('</div> <hr class="prl-grid-divider">');
	}
	
	?>
	
	<?php if ( function_exists( 'page_navi' ) ) page_navi( 'items=5&amp;show_num=1&amp;num_position=after' ); ?>
	  

<?php else : ?>
	<?php get_search_form(); ?>
<?php endif; ?>  