<?php
/**
 * Template Name: Thumbnail View
 * 
 */
?>

<?php get_header(); ?>

<style>
/* ============================================================
  CUSTOM PAGINATION
============================================================ */
.custom-pagination span,
.custom-pagination a {
  display: inline-block;
  padding: 2px 10px;
}
.custom-pagination a {
  background-color: #ebebeb;
  color: #ff3c50;
}
.custom-pagination a:hover {
  background-color: #ff3c50;
  color: #fff;
}
.custom-pagination span.page-num {
  margin-right: 10px;
  padding: 0;
}
.custom-pagination span.dots {
  padding: 0;
  color: gainsboro;
}
.custom-pagination span.current {
  background-color: #ff3c50;
  color: #fff;
}
</style>
<?php
/*
Thank you! http://callmenick.com/2014/02/21/custom-wordpress-loop-with-pagination/
*/
function custom_pagination($numpages = '', $pagerange = '', $paged='') {
 
  if (empty($pagerange)) {
    $pagerange = 2;
  }
 
  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }
 
  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => '/page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);
  
  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }
}
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
	
			<div id="topleaderboard-post" class="topleaderboard-home">
				<iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe>
			</div>

		
			<div style="margin: 0 auto; width: 100%; max-width: 960px">
			

			<?php 

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  
  $custom_args = array(
      'post_type' => 'post',
      'posts_per_page' => 15,
      'paged' => $paged
    );

  $custom_query = new WP_Query( $custom_args ); ?>
 
  <?php if ( $custom_query->have_posts() ) : ?>


      <!-- the loop -->
    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnail' );
			$url = $thumb['0'];
			?>
        
		<div style="float: left; margin: 20px 0;padding: 0 10px; max-width: 320px; width: 100%">    
		     
       		<div class="home-loop" style="border: 1px solid #e3e3e3; background-image: url(<?php echo $url; ?>); min-height: 200px;background-size: cover; position:relative">
	            <h3 id="post-<?php the_ID(); ?>" style="line-height: 1; margin: 0; font-weight:300; position: absolute; bottom: 0; background: rgba(0, 0, 0, 0.46); padding: 3px 5px">
		        <a style="color:#fff; font-size:0.8em" href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php echo balanceTags(wp_trim_words( get_the_title(), $num_words = 11, $more = null ), true); ?></a>
		        </h3>
	        </div>  
                    
	        <div style="padding: 0">
	            <div class="author-cat">
	               <?php 
	                $category = get_the_category(); 
	                if($category[0]){
	                echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
	                }
	                ?>
	            </div>
	            <div class="loop-time">    
	                <?php the_time(' m/j/y g:ia') ?>
	            </div>  
	            <br>
	            <div id="social-home">
	                    <a style="margin-right: 5px" class="twitter_link" href="http://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_permalink(); ?>" target="_blank"><span class="genericon genericon-twitter"></a>
	                    <a style="margin-right: 5px" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"><span class="genericon genericon-facebook"></span></a>   
	                    <a style="margin-right: 5px" href="mailto:?subject=<?php echo get_the_title(); ?>&body=<?php echo get_permalink(); ?>"><span class="genericon genericon-mail"></span></a>                   
	            </div>          
	        </div>
	    
	    </div>

     <?php endwhile; ?>
    <!-- end of the loop -->
   		 
    <?php
      if (function_exists(custom_pagination)) {
        custom_pagination($custom_query->max_num_pages,"",$paged);
      }
    ?>

			<?php else : ?> 
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?> <!-- end if ( $custom_query->have_posts() ) : -->

		</div><!-- #content -->
	</div><!-- #primary -->

	<?php wp_reset_postdata(); ?>


<?php get_footer(); ?>