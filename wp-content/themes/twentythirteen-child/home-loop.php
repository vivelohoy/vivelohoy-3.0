<?php while (have_posts()) : the_post(); ?>
    <div class="excerpt-post clearfix">

        <div class="hoy-avatar" style="float: left; margin-right:10px;"><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                
            <?php echo get_avatar( get_the_author_meta('email'), '50' ); ?></a></div>  
                    
        <div class="author-meta" style="margin: 0 20px 0 0">
            <h3 id="post-<?php the_ID(); ?>" style="display: inline">
                <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php the_title(); ?></a>
            </h3>
            <h6 class="author-cat" style="display: inline; color: #808080;font-weight: 400;letter-spacing: 0.06em;}">
                <?php $category = get_the_category(); 
                if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';}?>
                <?php the_time('m/j/y g:i A') ?>
            </h6>
           
            <!-- 
            TODO: Replace this with a translatable string.

            The text that would normally appear here to read more of an article is
            "Continue reading <span class=\"meta-nav\">&rarr;</span>"
            which would be replaced with
            "Sigue leyendo <span class=\"meta-nav\">&rarr;</span>"
            -->
            <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s" style="color: #D83429">Más</a>
            
        </div>
    </div>
<?php endwhile; // End while ( have_posts() ) ?>
