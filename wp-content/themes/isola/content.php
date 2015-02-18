<?php
/**
 * @package Isola
 */
$format = get_post_format();
$formats = get_theme_support( 'post-formats' );
if ( 'image' == $format || 'video' == $format )
	$content = apply_filters( 'the_content', get_the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'isola' ) ) );
else
	$content = '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( $format && in_array( $format, $formats[0] ) ): ?>
			<a class="entry-format" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'isola' ), get_post_format_string( $format ) ) ); ?>"><?php echo get_post_format_string( $format ); ?></a>
		<?php endif; ?>
		<?php if ( 'link' == $format ) : ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( isola_get_link_url() ) ), '</a></h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<?php if ( has_post_thumbnail() && 'image' == $format ) : ?>
		<figure class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'isola-featured' ); ?></a>
		</figure>
	<?php elseif ( 'image' == $format ) : ?>
			<?php
			$image = isola_get_first_image( $content );
			
			$content = preg_replace( '!<img.*src=[\'"]([^"]+)[\'"].*/?>!iUs', '', $content ); //Strip out all images from content
			
			if ( ! empty( $image ) ) : ?>
				<figure class="entry-thumbnail">
					<?php printf( '<a href="%1$s"><img src="%2$s" /></a>', esc_url( get_permalink() ), esc_url( $image['src'] ) ); ?>
				</figure>
			<?php endif; ?>
	<?php elseif ( has_post_thumbnail() ) : ?>
		<figure class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'isola-featured' ); ?></a>
		</figure>
	<?php endif; ?>
	
	<?php
	if ( 'video' == $format ) :
		$media = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );

		if ( ! empty( $media ) ) :
		    foreach( $media as $embed_html ) {
		        $content = str_replace( $embed_html, '', $content );
		    } ?>
			<div class="entry-video jetpack-video-wrapper">
		    <?php
		        foreach ( $media as $embed_html ) {
		            printf( '%1$s', $embed_html );
		        } ?>
	    	</div>
	    <?php endif;
	endif; ?>
	
	<div class="entry-content">
	<?php if ( 'video' == $format || 'image' == $format ) : ?>
		<?php echo $content; ?>
	<?php else : ?>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'isola' ) ); ?>
	<?php endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'isola' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Comment', 'isola' ), __( '1 Comment', 'isola' ), __( '% Comments', 'isola' ) ); ?></span>
			<?php endif; ?>
			<div class="entry-meta">
				<?php isola_posted_on(); ?>
			</div>
			<?php
				$tags_list = get_the_tag_list( '', '' );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php echo $tags_list; ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php edit_post_link( __( 'Edit', 'isola' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->