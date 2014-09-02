<?php

/**
 * Medium Post type
 */

get_header(); 

?>	

			<div class="boxSep">
    			<div class="imgLiquidFill imgLiquid">
       				
       				<?php echo wp_get_attachment_image( get_field('main_image'), 'full' ); ?>
        			
        			<div style="width: 100%; text-align: center; position:relative; top: 70vh;color:#fff">
        				<h1 style="text-shadow: 1px 1px 5px #000; font-size:4vmax"><?php the_title(); ?></h1>
        			</div>
    			
    			</div>
    			
    			<div style="position: absolute; width: 100%; text-align: right; padding-right: 10px;">
    				<p style="color:#3c3c3c; font-size:15px; font-family: 'Helvetica', Helvetica, Arial, 'Lucida Grande', sans-serif">Photo by <?php the_field('photo_byline'); ?></p>
    			</div>
			
			</div>
			


			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">

					<!-- TOP LEADERBOARD AD -->	
					<?php if ( 'gallery' !== get_post_format() ) : // Anything but a gallery post type ?>
						<div id="topleaderboard-post">
						<iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe>
						</div>
					<?php endif; // get_post_format() ?>
					<!-- TOP LEADERBOARD AD -->
	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
						<header class="entry-header" style="text-align:center">
							<h1 class="entry-title"></h1>
							<div class="author-cat" style="margin:0">
								<p>Por <?php the_author_posts_link(); ?> en <?php the_category(', ') ?> <?php the_time('m/j/y g:ia') ?></p>
								<?php edit_post_link( __( 'Edit', 'twentythirteen-child' ), '<span class="edit-link">', '</span>' ); ?>
							</div><!-- .entry-meta -->
						</header><!-- .entry-header -->

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