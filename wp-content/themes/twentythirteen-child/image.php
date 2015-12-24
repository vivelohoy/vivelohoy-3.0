<?php
/**
 * The template for displaying image attachments
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area" style="padding: 0 10px">
        <div id="content" class="site-content" role="main">
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
                <div class="entry-content" style="padding:20px 0">
                    <nav id="image-navigation" class="navigation image-navigation" role="navigation">
                        <span class="nav-previous" style="left: -117px"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'twentythirteen-child' ) ); ?></span>
                        <span class="nav-next" style="right: -84px"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'twentythirteen-child' ) ); ?></span>
                    </nav><!-- #image-navigation -->

                    <div class="entry-attachment" style="max-width: 960px; text-align: center">
                        <div class="attachment">
                            <?php echo wp_get_attachment_image( $attachment->ID, 'large');?>

                            <?php if ( has_excerpt() ) : ?>
                            <div class="entry-caption">
                                <?php the_excerpt(); ?>
                            </div>

                            <?php endif; ?>
                            <?php $imgmeta = wp_get_attachment_metadata( $id );?>

                        </div><!-- .attachment -->
                    </div><!-- .entry-attachment -->

                </div><!-- .entry-content -->
            </article><!-- #post -->

            <hr>
            <?php //comments_template(); ?>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>
