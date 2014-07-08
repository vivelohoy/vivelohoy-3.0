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
	<header class="entry-header">
		

		<?php if ( is_single() ) : ?>
		<center><h1 class="entry-title"><?php the_title(); ?></h1></center>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>

		<div class="entry-meta-hoy">
		<center>
			<p>
				Por <?php the_author_posts_link(); ?> en <?php the_category(', ') ?> &#8226; <?php the_time('m/j/y g:i A') ?>
		</p>
		<?php edit_post_link( __( 'Editar', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
		</center></div>
	</div>	<!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
	
	 <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?> 
	</div><!-- .entry-content -->
	<?php endif; ?>


	

	<footer class="entry-meta">

		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( 'View all % comments', 'twentythirteen' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	
<!-- RELATED POSTS -deactivated-
	<?php $orig_post = $post;
	global $post;
	$categories = get_the_category($post->ID);
	if ($categories) {
	$category_ids = array();
	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
	$args=array(
	'category__in' => $category_ids,
	'post__not_in' => array($post->ID),
	'posts_per_page'=> 4, // Number of related posts that will be displayed.
	'caller_get_posts'=>1,
	);
	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) {
	echo '<div id="entry-content" class="clear"><h3>Related Posts</h3>';
	while( $my_query->have_posts() ) {
	$my_query->the_post(); ?>
	<div class="relatedthumb">  
	 <a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
	 <?php the_post_thumbnail( 'related-posts' ); ?>
	 </a>
	 <div class="related_content">
	 <a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	 </div>
	</div>
	<? }
	echo '</div>';
	} }
	$post = $orig_post;
	wp_reset_query(); ?>
RELATED POSTS END -->

<div id="footer-content">

           
            <a href="/about-vivelohoy/">Acerca de nosotros</a>
            <a href="/advertise">| Advertise</a>
            <a href="/contactos/">| Contactos</a>
            <a href="/terminos-de-servicio/">| Términos de servicio</a>
 			<a href="/politica-de-confidencialidad">| Política de privacidad</a><br>             	
			<a href="http://www.readoz.com/publication/index?p=9330" target="_blank">Edición Impresa</a>
           	<a href="http://www.orlandosentinel.com/elsentinel" target="_blank">| El Sentinel Orlando</a>
            <a href="http://www.sunsentinel.com/elsentinel" target="_blank">| El Sentinel Sur de Florida</a>
            <a href="http://www.hoylosangeles.com" target="_blank">| Hoy Los Ángeles</a>
        <div>
			<p>435 N. Michigan Ave., Chicago, IL 60611<br>© 2014 Desarrollado por <a href="http://www.hoylabs.com/" target="_blank">Hoy Labs</a> del Hoy Chicago.</p>
		</div>
</div>



	</footer><!-- .entry-meta -->
</article><!-- #post -->
