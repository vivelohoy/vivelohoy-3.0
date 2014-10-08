<?php while (have_posts()) : the_post(); ?>
    <div class="excerpt-post">

        

        <?php if ( 'gallery' === get_post_format() ) : ?>
                <div style="width: 960px"><a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php the_post_thumbnail( 'large' ); ?></a></div>  
                    
            <div>
                <h3 id="post-<?php the_ID(); ?>" style="display: inline">
                    Fotogaléria:<a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"> <?php the_title(); ?></a>
                </h3>
                <br>
                <div class="author-cat">
                   <?php 
                    $category = get_the_category(); 
                    if($category[0]){
                    echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
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
                
            </div>
        
        <?php else: ?>
            
            <div style="width: 300px; height: auto; float: left; margin-right: 5%"><a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php the_post_thumbnail( 'medium' ); ?></a></div>  
                    
            <div>
                <h3 id="post-<?php the_ID(); ?>" style="display: inline">
                    <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php the_title(); ?></a>
                </h3>
                <br>
                <div class="author-cat">
                   <?php 
                    $category = get_the_category(); 
                    if($category[0]){
                    echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
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
                   <p><?php $excerpt = get_the_excerpt(); 
                    $maslink = ' <a href="'.get_permalink().'"> Más</a>'; 
                    $output = $excerpt .$maslink; 
                    echo trim($output);?></p>
                </div>  
                
                
            </div>
    
        <?php endif; ?>


    </div>

<?php endwhile; // End while ( have_posts() ) ?>