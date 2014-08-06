<?php
/**
 * Template Name: Thumbnail View
 * 
 */
?>

<?php get_header(); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		  <div id="topleaderboard-post" class="topleaderboard-home">
			 <iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe>
		  </div>

		  <div class="thumb-container">
			
        <?php 
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $custom_args = array(
        'post_type' => 'post',
        'posts_per_page' => 14,
        'paged' => $paged
        );
        $custom_query = new WP_Query( $custom_args ); 
        ?>
 
        <?php if ( $custom_query->have_posts() ) : ?>


      <!-- the loop -->
      <?php while ( $custom_query->have_posts() ) : $custom_query->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnail' );
			$url = $thumb['0'];
			?>
        
		    <div id="thumb-view">    
		     
       		<div class="thumb-loop" style="background-image: url(<?php echo $url; ?>)">
	          <h5 id="post-<?php the_ID(); ?>" class="thumb-heading">
		          <div class="thumb-cat">
               <?php 
                $category = get_the_category(); 
                if($category[0]){
                echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
                }
                ?>
	            </div>
              <br>
		            <a style="color:#fff; font-size:16px" href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php echo balanceTags(wp_trim_words( get_the_title(), $num_words = 11, $more = null ), true); ?></a>
		        </h5>
	        </div>  
                    
	        <div style="padding: 0">
	          <div id="social-home" style="margin-top: 8px">
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