<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		

		


			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				
				
			<?php endwhile; ?>
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
'orderby'=>'rand' // Randomize the posts
);
$my_query = new wp_query( $args );
if( $my_query->have_posts() ) {
echo '<div id="relatedposts" class="clear"><h3>Related Posts</h3>';
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
			</div><!-- #content -->
	</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>