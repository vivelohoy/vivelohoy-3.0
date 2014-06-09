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

     <ul class="prl-list-category">
	<?php 
	$i=0;
	while (have_posts()) : the_post();
	$i++;
	?>
	<li id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
		<article class="prl-article">
			<?php if( has_post_thumbnail()):?>
			<div class="list-thumbnail"><?php echo post_thumb(get_the_ID(),520, 360, true);?></div>
			<?php endif;?>
			<div class="prl-article-entry">
				<h2 class="prl-article-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h2> 
				<?php post_meta();?>
				<?php the_excerpt();?>
			</div>
		</article>
	</li>

	<?php endwhile; ?>
	
	</ul>
	<?php if ( function_exists( 'page_navi' ) ) page_navi( 'items=5&amp;show_num=1&amp;num_position=after' ); ?>
	  

<?php else : ?>
	<?php get_search_form(); ?>
<?php endif; ?>  