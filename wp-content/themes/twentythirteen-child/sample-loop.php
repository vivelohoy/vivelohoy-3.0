<div id="list">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="excerpt-post">

        <div class="hoy-avatar"><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                
            <?php echo get_avatar( get_the_author_meta('email'), '65' ); ?></a></div>  
                    
        <div class="author-meta">
            <h3 id="post-<?php the_ID(); ?>" style="display: inline">
                <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php the_title(); ?></a>
            </h3>
            <br>
            <div class="author-cat">
               <?php $categories = get_the_category();
                $separator = ' | ';
                $output = '';
                if($categories){
                    foreach($categories as $category) {
                        $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                    }
                echo trim($output, $separator);
                }
                ?>
            </div>
            <div class="loop-time">    
                <?php echo relativeTime(get_the_time('U'), ' m/j/y g:ia'); ?>
            </div>    
                <div id="social-home">
                    <a class="twitter_link" href="http://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_permalink(); ?>" target="_blank"><span class="genericon genericon-twitter"></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"><span class="genericon genericon-facebook"></span></a>   
                   <!-- <a href="mailto:?subject=<?php echo get_the_title(); ?>&body=<?php echo get_permalink(); ?>"><span class="genericon genericon-mail"></span></a> -->                
                </div>        
            
            <div class="home-loop">
                <?php $excerpt = get_the_excerpt(); 
                $maslink = ' <a href="'.get_permalink().'"> Más</a>'; 
                $output = $excerpt .$maslink; 
                echo trim($output);?>
            </div>  
            
            <!-- 
            TODO: Add Relative Time
            -->
            
        </div>
    </div>
    <?php endwhile; else: ?>

          <div class="page-header">
            <h1>Oh no!</h1>
          </div>

          <p>No content is appearing for this page!</p>

        <?php endif; ?>

      </div>



<?php rewind_posts(); ?>




      <div class="thumb-container" id="grid">
             
        <?php 
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $custom_args = array(
        'post_type' => 'post',
        'posts_per_page' => 15,
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
              <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><div class="thumb-loop" style="background-image: url(<?php echo $url; ?>)"></div></a>  
          <div style="min-height: 76px; background:rgba(0, 0, 0, 0.76);margin: 0 1px">  
            <div class="thumb-cat">
             <?php 
              $category = get_the_category(); 
              if($category[0]){
              echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
              }
              ?>
             <div id="social-home">
              <a style="margin-right: 5px" class="twitter_link" href="http://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_permalink(); ?>" target="_blank"><span class="genericon genericon-twitter" style="margin-top: 0"></a>
              <a style="margin-right: 5px" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"><span class="genericon genericon-facebook" style="margin-top: 0"></span></a>   
              </div>
              <h5 id="post-<?php the_ID(); ?>" class="thumb-heading">
              <a style="color:#fff; font-size:16px" href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php echo balanceTags(wp_trim_words( get_the_title(), $num_words = 9, $more = null ), true); ?></a>
              </h5>
            </div>
            
            <br>
          </div>    
        </div>



        </div>