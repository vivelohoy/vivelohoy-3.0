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
	<div class="entry-header-hoy-body">
	<header class="entry-header-hoy">
		<?php if ( is_single() ) : ?>
		
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>

		<div class="entry-meta-hoy">
		<?php the_category(', ') ?>
		<p>Por <?php the_author_posts_link(); ?> 
		<?php the_time('m/j/y g:i A') ?></p>
		<?php edit_post_link( __( 'Editar', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</div>	
	</header>


	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	
	<div class="entry-hoy-body">
	<div class="entry-content-hoy">


		<?php the_content( __( '', 'twentythirteen' ) ); ?>

			<div class="entry-meta">
				<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
				<?php get_template_part( 'author-bio' ); ?>
				<?php endif; ?>
			</div>

		</div></div>
			<div class="aside-hoy">
<img src="http://pagead2.googlesyndication.com/simgad/3592052693738488925">
</div>
		<hr>
		<h3>Artículos Relacionados</h3>  
		
<?php  
    $orig_post = $post;  
    global $post;  
    $tags = wp_get_post_tags($post->ID);  
      
    if ($tags) {  
    $tag_ids = array();  
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
    $args=array(  
    'tag__in' => $tag_ids,  
    'post__not_in' => array($post->ID),  
    'posts_per_page'=>3, // Number of related posts to display.  
    'caller_get_posts'=>1  
    );  
      
    $my_query = new wp_query( $args );  
  
    while( $my_query->have_posts() ) {  
    $my_query->the_post();  
    ?>  
      
    <div class="relatedthumb">  
       <a rel="external" href="<? the_permalink()?>"><?php the_post_thumbnail('thumbnail'); ?><br />  
        <?php the_title(); ?>  
        </a>       
    </div>  
      
    <? }  
    }  
    $post = $orig_post;  
    wp_reset_query();  
    ?>





	
	<?php endif; ?>

<!-- .entry-meta -->
</article><!-- #post --></div></div>