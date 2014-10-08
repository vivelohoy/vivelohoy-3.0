<?php while (have_posts()) : the_post(); ?>
 <!--
post-in-loop
    post-format-icon
    post-preview-image
    post-title-link
    post-category-link
    post-author-link
    post-timestamp
    post-social-sharing-icons
    post-excerpt

CSS styling can be found in css/home-loop.css
-->

<?php 
if ( 'gallery' === get_post_format() ) {
    $post_format_class = 'gallery';
} else {
    $post_format_class = 'standard';
}
?>
<div class="post-in-loop <?php echo $post_format_class; ?>">
    <div class="post-format-icon">
        <?php if ( 'gallery' === get_post_format() ) : ?>
            <span class="genericon genericon-picture"></span>
        <?php else: ?>
            <span class="genericon genericon-document"></span>
        <?php endif; // if ( 'gallery' === get_post_format() ) ?>
    </div>
    <div class="post-preview-image">
        <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
            <?php 
            if ( 'gallery' === get_post_format() ) {
                the_post_thumbnail( 'large' );
            } else {
                the_post_thumbnail( 'medium' );
            }
            ?>
        </a>
    </div>
    <div class="post-title-link">
        <h3 id="post-<?php the_ID(); ?>">
            <?php if ( 'gallery' === get_post_format() ) : ?>
            Fotogaléria: 
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
                En 
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
            $twitter_share_link = "http://twitter.com/intent/tweet?text=";
            $twitter_share_link .= get_the_title();
            $twitter_share_link .= "&url=";
            $twitter_share_link .= get_permalink();
            $facebook_share_link = "https://www.facebook.com/sharer/sharer.php?u=";
            $facebook_share_link .= get_permalink();
        ?>
        <a class="twitter_link" href="<?php echo $twitter_share_link; ?>" target="_blank">
            <span class="genericon genericon-twitter">
        </a>
        <a href="<?php echo $facebook_share_link; ?>" target="_blank">
            <span class="genericon genericon-facebook"></span>
        </a>
    </div>
    <div class="post-excerpt">

    </div>
</div>

<?php endwhile; // End while ( have_posts() ) ?>