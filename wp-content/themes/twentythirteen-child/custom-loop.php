<?php while (have_posts()) : the_post(); ?>
<?php if ('gallery' === get_post_format($post->ID)) : ?>
    <div class="excerpt-post clearfix">
        <div style="float: left; min-height: 200px" ><a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php $image=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
            $imgurl=$image[0];
            ?><img style="padding-right:10px; width:368px" src="<?php echo $imgurl;?>"></a>
        </div>
        <div class="author-meta" style="margin: 0 20px 0 0">
            <h3 id="post-<?php the_ID(); ?>" style="display: inline">
                <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php the_title(); ?></a>
            </h3><br>
            <h6 style="display: inline; color: #808080;font-weight: 400;letter-spacing: 0.06em;}">
                <?php $category = get_the_category(); 
                if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';}?>
            </h6>
            <br>
            
                <?php the_excerpt(); ?>
            
        </div>
    </div>
<?php else : // if get_post_format() is not 'gallery' ?>
    <?php if ( $post->post_excerpt ) : // If there is an explicitly defined excerpt ?>
    <div class="excerpt-post clearfix">
        <div style="float: left; min-height: 200px"><a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php $image=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
            $imgurl=$image[0];
            ?><img style="padding-right:10px; width:368px" src="<?php echo $imgurl;?>"></a>
        </div>
        <div class="author-meta" style="margin: 0 20px 0 0">
            <h3 id="post-<?php the_ID(); ?>" style="display: inline">
                <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><?php the_title(); ?></a>
            </h3><br>
            <h6 class="author-cat" style="display: inline; color: #808080;font-weight: 400;letter-spacing: 0.06em;}">
                <?php $category = get_the_category(); 
                if($category[0]){echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';}?>
            </h6>
            <br>
            
                <?php the_excerpt(); ?>
            
        </div>
    </div>
    <?php else : // If there is not an explictly defined excerpt ?>
    <div class="excerpt-post clearfix">
        <h2 id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>
    </div><!-- end of excerpt-post -->
    <?php endif; // End the excerpt vs. content "if" statement ?>
<?php endif; // End gallery vs standard statement ?>
<?php endwhile; // End while ( have_posts() ) ?>
