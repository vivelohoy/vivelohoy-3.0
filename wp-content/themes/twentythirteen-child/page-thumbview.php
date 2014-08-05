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
   		 





<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
  
    <nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
<?php } ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<?php wp_reset_postdata(); ?>


<?php get_footer(); ?>