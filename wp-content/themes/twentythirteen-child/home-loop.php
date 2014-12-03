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
    }
    else {
        $post_format_class = 'standard';
    }
}
?>
<div class="post-in-loop <?php echo $post_format_class; ?>">

    <div class="post-preview-image">
        <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
            <?php
            if ( 'gallery' === get_post_format() ) {
                the_post_thumbnail( 'large' );
            } else {
                if ( ('enfoque' === get_post_type() ) || ('patrocinado' === get_post_type() ) ) {
                    echo wp_get_attachment_image( get_field('main_image'), 'large' );
                }
                else {
                    the_post_thumbnail( 'large' );
                }
            }
            ?>
            <div class="post-format-icon">
                <?php if ( 'gallery' === get_post_format() ) : ?>
                    <div class="dashicons dashicons-images-alt"></div>
                <?php endif; // if ( 'gallery' === get_post_format() ) ?>
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
        <div class="post-author-link">
            Por <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                <?php echo get_author_name( get_the_author_meta( 'ID' ) ); ?>
            </a>
        </div>
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

<?php endwhile; // End while ( have_posts() ) ?>