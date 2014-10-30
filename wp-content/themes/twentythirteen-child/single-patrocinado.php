<?php

/**
 * Patrocinado Post type
 */

get_header('patrocinado');

?>


			<div class="boxSep" style="margin-top: 52px">
    			<div class="imgLiquidFill imgLiquid">

       				<?php echo wp_get_attachment_image( get_field('main_image'), 'full' ); ?>

    				<!-- Adding blank link to overide LiquidImg a: style. Original code here: https://github.com/karacas/imgLiquid/blob/01bc41e8ac32c0e9730b59d75a5f53f373173b6d/js/imgLiquid.js#L164-L168 -->
    				<div style="display:none"><a href="#"></a></div>

					<header class="enfoque-header">
						<div class="post-in-loop">
							<h1 class="enfoque-title"><?php echo get_the_title(); ?></h1>
							<div class="enfoque-author-link">
						        Por <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						            <?php echo get_author_name( get_the_author_meta( 'ID' ) ); ?>
						        </a>
						    </div>
						    <div class="enfoque-category-link">
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
						    <div class="enfoque-timestamp">
						        <?php echo relativeTime(get_the_time('U'), ' m/j/y g:ia'); ?>
						    </div>
						    <div class="post-excerpt">
							    <?php the_excerpt(); ?>
							</div>
						</div>
					</header>

				</div>

			</div>



			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="entry-content">
						<?php the_field('article'); ?>
						</div><!-- .entry-content -->

					</article><!-- #post -->

				</div><!-- #content -->
			</div><!-- #primary -->

<?php get_footer(); ?>