<?php $post_counter=0; ?>
 <!-- CSS styling can be found in css/home-loop.css -->
<?php while (have_posts()) : the_post(); ?>

<?php
if ( 'gallery' === get_post_format() ) {
    $post_format_class = 'gallery';
} else {
    if ( 'enfoque' === get_post_type() ) {
        $post_format_class = 'enfoque';
    } elseif ('patrocinado' === get_post_type() ) {
        $post_format_class = 'patrocinado';
    } elseif ('video' === get_post_format() ) {
        $post_format_class = 'video';
    }
    else {
        $post_format_class = 'standard';
    }
}
?>
<div class="post-in-loop <?php echo $post_format_class; ?>">

    <div class="post-preview-image">
        <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
            <?php if ('patrocinado' === get_post_type() ) { ?>
                <?php $image = wp_get_attachment_image_src(get_field('feature_image'), 'large'); ?>
                <img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('image_test')) ?>" />
            <?php } else ( the_post_thumbnail( 'large' )); ?>
            <div class="post-format-icon">
                <?php if ( 'gallery' === get_post_format() ) { ?>
                <div class="dashicons dashicons-images-alt"></div>
                <?php } elseif ( 'video' === get_post_format() ) { ?>
                    <div class="dashicons dashicons-video-alt3"></div>
                <?php } ?>

            </div>
        </a>
    </div>

    <div class="post-in-loop-container">
        <div class="post-title-link">
            <h3 id="post-<?php the_ID(); ?>">
                <?php if ( 'gallery' === get_post_format() ) : ?>
                <?php endif; // if ( 'gallery' === get_post_format() ) ?>
                <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
                    <?php the_title(); ?>
                </a>
            </h3>
        </div>

        <?php if ( is_author() ) { ?>
            <!-- do nothing -->
        <?php } elseif ( 'patrocinado' === get_post_type() ) { ?>
            <div class="post-author-link">
                Patrocinado por <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                    <?php echo get_the_author_meta( 'display_name' ); ?>
                </a>
            </div>
        <?php } elseif ( is_home() || is_category() ) { ?>
            <div class="post-author-link">
                Por <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                    <?php echo get_the_author_meta( 'display_name' ); ?>
                </a>
            </div>
        <?php } ?>

        <div class="post-category-link">
            <?php
                $category = get_the_category();
                if ( $category[0] ) { ?>
                    <span class="category-en">en </span>
                    <a href="<?php echo get_category_link( $category[0]->term_id ); ?>">
                        <?php echo $category[0]->cat_name; ?>
                    </a><?php
                }
            ?>
        </div>
        <div class="post-timestamp">
            <?php echo relativeTime(get_the_time('U'), ' m/j/y g:ia'); ?>
        </div>
        <div class="post-social-sharing-icons">
            <?php
                $facebook_share_link = "https://www.facebook.com/sharer/sharer.php?u=";
                $facebook_share_link .= urlencode(get_permalink());
            ?>
            <a class="twitter_link" href="" target="_blank" data-text="<?php the_title(); ?>" data-url="<?php the_permalink() ?>">
                <span class="genericon genericon-twitter">
            </a>
            <a href="<?php echo $facebook_share_link; ?>" target="_blank">
                <span class="genericon genericon-facebook"></span>
            </a>
        </div>
        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>
    </div>
</div>

    <!-- Patrocinado sticky post goes here, check with Ads about scheduling -->
    <!-- Removing patrocinado post until new one
        <?php
            $post_counter++;
            $id = 8435568; // Patrocinado Post ID goes here (currently Taxline)
            $post = get_post($id);
            $title = $post->post_title;
            $excerpt = $post->post_excerpt;
            if ($post_counter == 2) // Post appears after 2nd post
         { ?>

            <div class="post-in-loop video patrocinado">

                <div class="post-preview-image">
                    <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
                        <?php $image = wp_get_attachment_image_src(get_field('feature_image', $id), 'large'); ?>
                        <img src="<?php echo $image[0]; ?>" />
                        <div class="post-format-icon">
                            <div class="dashicons dashicons-video-alt3"></div>
                        </div>
                    </a>
                </div>
                <div class="post-in-loop-container">
                    <div class="post-title-link">
                        <h3 id="post-<?php the_ID(); ?>">
                            <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
                                <?php echo $title ?>
                            </a>
                        </h3>
                    </div>
                    <div class="post-author-link">
                        Patrocinado por <a class="author-link" href="<?php the_field('company_website', $id); ?>" rel="author">
                            <div class="patrocinado-author-link">
                                <?php the_field('company_name', $id); ?>
                            </div>
                        </a>
                    </div>
                    <div class="post-timestamp">
                        <?php echo relativeTime(get_the_time('U'), ' m/j/y g:ia'); ?>
                    </div>
                    <div class="post-excerpt">
                        <?php echo $excerpt ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    END Patrocinado-->

<?php endwhile; // End while ( have_posts() ) ?>