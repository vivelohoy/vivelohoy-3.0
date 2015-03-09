<?php

/**
 * Enfoque Post type
 */

get_header('enfoque');

?>

			<div id="primary" class="content-area" style="height:100%; padding:0">

				<div class="enfoque-container">

					<div class="enfoque-image" style="margin-top: 46px">

						<?php echo wp_get_attachment_image( get_field('main_image'), 'full' ); ?>

					</div>
					<div style="width: 100%; text-align: right; padding-right: 10px;">
						<p class="author-cat" style="font-weight:100; font-size:11px; margin:0; padding:5px 0; display:block">
							Foto por <?php the_field('photo_byline'); ?></a>
						</p>
    				</div>
					<div id="content" class="site-content" role="main" style="text-align: left; padding: 0 10px">

                        <header class="enfoque-header">
							<div class="post-in-loop" style="margin:0 0 20px;">
								<h1 class="enfoque-title"><?php echo get_the_title(); ?></h1>
								<div class="author-cat" style="font-weight: 100">
							        Por <a target="_blank" href="<?php echo esc_url( the_author_meta( 'user_url' ) ); ?>" style="border-bottom: none !important">
							            <?php echo get_the_author_meta( 'display_name' ); ?>
							        </a>
							    </div>
							    <div class="author-cat" style="font-weight: 100">
							        <?php
							            $category = get_the_category();
							            if ( $category[0] ) { ?>
							                <span class="category-en">en </span>
							                <a href="<?php echo get_category_link( $category[0]->term_id ); ?>" style="border-bottom: none !important">
							                    <?php echo $category[0]->cat_name; ?>
							                </a><?php
							            }
							        ?>
							    </div>
							    <div class="author-cat" style="font-weight:100">
							        <?php echo relativeTime(get_the_time('U'), ' m/j/y g:ia'); ?>
							    </div>
							</div>
						</header>

	    				<div id="content" class="site-content" role="main" style="text-align: left; padding: 0 10px; margin-top: -11px;">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<div class="entry-content">
								<?php the_field('article'); ?>
								</div><!-- .entry-content -->

							</article><!-- #post -->
							<hr>
							<br>
							<?php comments_template(); ?><!-- Comments On -->
							<br>

<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>	
			<!-- BOTTOM LEADERBOARD AD -->
			<?php if ( 'gallery' !== get_post_format() ) : // Anything but a gallery post type ?>
				<div id="bottom-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="3"></div> 
			<?php endif; // get_post_format() ?>
			<!-- BOTTOM LEADERBOARD AD -->
<?php endif; // End if ( $ADS_ENABLED ) ?>

			<script>
			var is_standard = <?php if ( !get_post_format() ) : ?>true<?php else: ?>false<?php endif; ?>;
			</script>

<?php get_footer('enfoque'); ?>



