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

<div style="display: inline-block; position: relative; margin-bottom: 40px; padding-bottom: 10px; border-bottom:1px solid #000">
    <div style="position:relative; margin-bottom: 10px; display: inline-block; width: 100%; border-bottom: 1px solid #C8C8C8;  font-family: 'Helvetica', Helvetica, Arial, 'Lucida Grande', sans-serif; font-weight: 600; font-size: 16px; letter-spacing: 2px;">
        <span style="float: left">VÍDEOS</span><style type="text/css"> button:hover{background: #f5f5f5 !important;}></style>
        <button style="position: absolute; right: 0; bottom: 0px; padding: 8px 41px; font-family: inherit; color: #333; background:#fff ; border: 1px solid transparent;"><span style="position:absolute; bottom:0; right:0; font-weight: 400; font-size: 11px; letter-spacing: 1px;">MÁS VÍDEOS</span></button>
    </div>
    <script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>

    <object id="myExperience" class="BrightcoveExperience">
      <param name="bgcolor" value="#FFFFFF" />
      <param name="width" value="860" />
      <param name="height" value="340" />
      <param name="playerID" value="3953170592001" />
      <param name="playerKey" value="AQ~~,AAAB2Ejp1kE~,qYgZ7QVyRmAb23iQdpSRsBXyaKukvnfS" />
      <param name="isVid" value="true" />
      <param name="isUI" value="true" />
      <param name="dynamicStreaming" value="true" />
    </object>

    <script type="text/javascript">brightcove.createExperiences();</script>

</div>