<?php while (have_posts()) : the_post(); ?>
    <div class="excerpt-post">

        <div class="hoy-avatar"><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                
            <?php echo get_avatar( get_the_author_meta('email'), '65' ); ?></a></div>  
                    
        <div class="author-meta">
            <h3 id="post-<?php the_ID(); ?>" style="display: inline">
                <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php the_title(); ?></a>
            </h3>
            <br>
            <h6 class="author-cat" style="display: inline; color: #A3A3A3;font-weight: 400;letter-spacing: 0.06em">
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
            </h6>
            <div class="loop-time">    
                <?php the_time(' m/j/y g:ia') ?>
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
<?php endwhile; // End while ( have_posts() ) ?>
