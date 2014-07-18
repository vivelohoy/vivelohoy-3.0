<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<center><h1 class="entry-title"><?php the_title(); ?></h1></center>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>
		<div class="entry-meta-hoy" style="display: inline; color: #808080;font-weight: 400;letter-spacing: 0.06em; font-style: italic">
			<center>
				<p>
					Por <?php the_author_posts_link(); ?> en <?php the_category(', ') ?> <?php the_time('m/j/y g:i A') ?>
				</p>
				<?php edit_post_link( __( 'Editar', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
			</center>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_single() || ! get_post_gallery() ) : ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		<?php else : ?>
			<?php echo get_post_gallery(); ?>
		<?php endif; // is_single() ?>
	</div><!-- .entry-content -->


</article><!-- #post -->