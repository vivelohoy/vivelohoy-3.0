<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen-child' ) ); ?>
		<header class="entry-header" style="text-align:center">
			<div class="entry-meta">

				<?php if ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1></center>
				<?php else : ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
				<?php endif; // is_single() ?>

				<div class="author-cat" style="margin:0">

					<!-- TODO: Add translation query here instead of hard-coded text -->
					<?php


$categories = get_the_category();
$main_category = $categories[0];
$category_url = get_category_link( $main_category->cat_ID );
$category_name = $main_category->name;
					?>
					Por <?php the_author_posts_link(); ?> en <a href="<?php echo $category_url . '?post_format=video'; ?>"><?php echo $category_name; ?></a> <?php the_time('m/j/y g:ia') ?>

					<?php edit_post_link( __( 'Edit', 'twentythirteen-child' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
			</div>	<!-- .entry-meta -->
		</header><!-- .entry-header -->
		<div class="video-excerpt"><?php the_excerpt(); ?></div>

	 <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen-child' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post -->