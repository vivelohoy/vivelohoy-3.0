<?php
/**
 * The template for displaying Author archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php
				/*
				 * Queue the first post, that way we know what author
				 * we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>
<?php
if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name);
else :
$curauth = get_userdata(intval($author));
endif;
?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Noticias por %s', 'twentythirteen' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
			<div class="author-info">
	<div class="author-avatar">
		<?php
		/**
		 * Filter the author bio avatar size.
		 *
		 * @since Twenty Thirteen 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'twentythirteen_author_bio_avatar_size', 74 );
		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->
	<div class="author-description">
		<h2 class="author-title"><?php printf( __( '%s', 'twentythirteen' ), get_the_author() ); ?></h2>
		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'Mas noticas por %s <span class="meta-nav">&rarr;</span>', 'twentythirteen' ), get_the_author() ); ?>
			</a>
		</p>
	</div><!-- .author-description -->
</div><!-- .author-info -->
			</header><!-- .archive-header -->

			<?php
				/*
				 * Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>

			<!-- Start of the Loop -->

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php if ( $post->post_excerpt ) : // If there is an explicitly defined excerpt ?>
<div class="excerpt-post clearfix">
	<?php the_post_thumbnail( 'medium' ); ?>
<h2 id="post-<?php the_ID(); ?>">
<a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php the_title(); ?></a>
</h2>
<div class="catslist"><?php the_category(' and '); ?></div>
<div class="entry">
<?php the_excerpt(); ?>
<div class="readmore">
<a href="<?php the_permalink(); ?>">CONTINUE READING</a>
</div>
</div> <!--end of entry -->
<!-- <?php trackback_rdf(); ?> -->
</div><!-- end of excerpt-post -->
<?php else : // If there is not an explictly defined excerpt ?>
<div class="excerpt-post clearfix">
<h2 id="post-<?php the_ID(); ?>">
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
</h2>
<div class="catslist"><?php the_category(' and '); ?></div>
<div class="entry">
<?php the_content('<span class="readmore">CONTINUE READING</span>'); ?>
</div><!-- end of entry -->
<!-- <?php trackback_rdf(); ?> -->
</div><!-- end of excerpt-post -->
<?php endif; // End the excerpt vs. content "if" statement ?>
<?php endwhile; else: ?>
<h2 class="center">Page Not Found</h2>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<p><?php _e('To help you find the information you seek, 
we recommend you check out our 
<a title="Camera on the Road Site Map" href="sitemap.php">Site Map</a> 
to help track down what you are looking for.'); ?></p>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>
<?php endif; ?>
<!--end Loop -->

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>