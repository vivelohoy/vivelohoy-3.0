<?php

/**
 * Enfoque Post type
 */

get_header('enfoque'); 

?>	

			<div class="boxSep">
    			<div class="imgLiquidFill imgLiquid">
       				
       				<?php echo wp_get_attachment_image( get_field('main_image'), 'full' ); ?>
        			
        				<!-- Adding blank link to overide Liquidimg a: style. Original code here: https://github.com/karacas/imgLiquid/blob/01bc41e8ac32c0e9730b59d75a5f53f373173b6d/js/imgLiquid.js#L164-L168 -->
        				<div style="display:none"><a href="#"></a></div>

        				<header class="entry-header" style="width: 100%; text-align: center; position:relative; top: 60%;color:#fff">
							<div class="post-in-loop">
								<h1 class="entry-title" style="text-shadow: 0px 0px 19px rgba(0, 0, 0, 1);"><?php echo get_the_title(); ?></h1>
								<div class="post-author-link">
							        Por <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
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
							    <div class="post-excerpt">
								    <?php the_excerpt(); ?>
								</div>
							</div>
						</header><!-- .entry-header -->
        			
        			
    			
    			</div>

    			<div class="bar">
	    			<div class="bounce" style="position: absolute; right: 0">
	        			<a href="#post-<?php the_ID(); ?>"><img width="100px" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow.png" style="opacity: 0.5"></a>
	        		</div>
        		</div>


    			<div style="position: absolute; width: 100%; text-align: right; padding-right: 10px;">
    				<p style="color:#000; font-size:15px; font-family: 'Helvetica', Helvetica, Arial, 'Lucida Grande', sans-serif">Foto por <?php the_field('photo_byline'); ?></p>
    			</div>
			
			</div>
			


			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
	
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
			
				</div><!-- #content -->
			</div><!-- #primary -->

<?php get_footer(); ?>