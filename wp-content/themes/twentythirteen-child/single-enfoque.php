<?php

/**
 * Enfoque Post type
 */

get_header('enfoque');

?>

			<div id="primary" class="content-area" style="height:100%">

				<div class="boxSep">

					<header class="enfoque-header">
						<div class="post-in-loop" style="padding:0 20px">
							<h1 class="enfoque-title"><?php echo get_the_title(); ?></h1>
							<div class="enfoque-author-link">
						        <?php _e( 'By ', 'gabo'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						            <?php echo get_author_name( get_the_author_meta( 'ID' ) ); ?>
						        </a>
						    </div>
						    <div class="enfoque-category-link">
						        <?php
						            $category = get_the_category();
						            if ( $category[0] ) { ?>
						                <span class="category-en"><?php _e( 'in ', 'gabo'); ?> </span>
						                <a href="<?php echo get_category_link( $category[0]->term_id ); ?>">
						                    <?php echo $category[0]->cat_name; ?>
						                </a><?php
						            }
						        ?>
						    </div>
						    <div class="enfoque-timestamp">
						        <?php echo relativeTime(get_the_time('U'), ' m/j/y g:ia'); ?>
						    </div>
						    <div class="post-excerpt">
							    <?php the_excerpt(); ?>
							</div>
						</div>
					</header>
	    			<div class="imgLiquidFill imgLiquid">

	       				<?php echo wp_get_attachment_image( get_field('main_image'), 'full' ); ?>

					</div>
					<div style="width: 100%; text-align: right; padding-right: 10px;">
    					<p style="color:#000; font-size:15px; font-family: 'Helvetica', Helvetica, Arial, 'Lucida Grande', sans-serif">
    						Foto por <a href="<?php the_field('photo_link'); ?>" target="_blank"><?php the_field('photo_byline'); ?></a>
    					</p>
    				</div>

    				<div id="content" class="site-content" role="main" style="text-align: left; padding: 0 10px">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<div class="entry-content">
							<?php the_field('article'); ?>
							</div><!-- .entry-content -->

						</article><!-- #post -->


<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>	
			<!-- BOTTOM LEADERBOARD AD -->
			<?php if ( 'gallery' !== get_post_format() ) : // Anything but a gallery post type ?>
				<div id="bottom-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="3"></div> 
			<?php endif; // get_post_format() ?>
			<!-- BOTTOM LEADERBOARD AD -->
<?php endif; // End if ( $ADS_ENABLED ) ?>

			<script>
			var is_gallery = <?php if ( 'gallery' === get_post_format() ) : ?>true<?php else: ?>false<?php endif; ?>;
			</script>

<?php get_footer('enfoque'); ?>



