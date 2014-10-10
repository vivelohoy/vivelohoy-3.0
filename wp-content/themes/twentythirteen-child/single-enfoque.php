<?php

/**
 * Enfoque Post type
 */

get_header('enfoque'); 

?>	

			<div class="boxSep">
    			<div class="imgLiquidFill imgLiquid">
       				
       				<?php echo wp_get_attachment_image( get_field('main_image'), 'full' ); ?>
        			
        			
        				
        				<header class="entry-header" style="width: 100%; text-align: center; position:relative; top: 70%;color:#fff">
							<h1 class="entry-title" style="text-shadow: 0px 0px 19px rgba(0, 0, 0, 1);"><?php echo get_the_title(); ?></h1>
							<div class="author-cat" style="margin:0; color:#fff; text-shadow: 0px 0px 19px rgba(0, 0, 0, 1);">
								Por <?php echo get_the_author_link(); ?> <?php the_time('m/j/y') ?>
								<?php edit_post_link( __( 'Edit', 'twentythirteen-child' ), '<span class="edit-link">', '</span>' ); ?>
							</div><!-- .entry-meta -->
						</header><!-- .entry-header -->
        			
        			
    			
    			</div>

    			<div class="bar">
	    			<div class="bounce" style="position: absolute; right: 0">
	        			<a href="#post-<?php the_ID(); ?>"><img width="100px" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow.png" style="opacity: 0.5"></a>
	        		</div>
        		</div>


    			<div style="position: absolute; bottom:1%; width: 100%; text-align: right; padding-right: 10px;">
    				<p style="color:#fff;text-shadow: 0px 0px 19px rgba(0, 0, 0, 1); font-size:15px; font-family: 'Helvetica', Helvetica, Arial, 'Lucida Grande', sans-serif">Foto por <?php the_field('photo_byline'); ?></p>
    			</div>
			
			</div>
			


			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="entry-content">
						<?php the_field('article'); ?>
						</div><!-- .entry-content -->
			
					</article><!-- #post -->

					<!-- BOTTOM LEADERBOARD AD -->
					<?php if ( 'gallery' !== get_post_format() ) : // Anything but a gallery post type ?>
						<div id="bottomleaderboard-post">
						<iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe>
						</div>
					<?php endif; // get_post_format() ?>
					<!-- BOTTOM LEADERBOARD AD -->

					<script>
					var is_gallery = <?php if ( 'gallery' === get_post_format() ) : ?>true<?php else: ?>false<?php endif; ?>;
					</script>
			
				</div><!-- #content -->
			</div><!-- #primary -->

<?php get_footer(); ?>