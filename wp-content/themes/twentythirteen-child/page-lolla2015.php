<?php

/**
 *
 * Template Name: Lollapalooza 2015
 *
 **/
get_header('video');
?>

			<div id="primary" class="content-area" style="height:100%; padding:0">

				<div class="enfoque-container">

					<div class="enfoque-image" style="margin-top: 60px; padding-top: 30px; background-color: #202020;text-align: center;">

						<!-- TOP LEADERBOARD AD -->
						<div id="top-leaderboard" style="margin-top: 0; border-bottom: none;" class="adslot leaderboard" data-width="728" data-height="90" data-pos="1"></div>
						<!-- TOP LEADERBOARD AD -->

						<div style="max-width: 860px; margin: 0 auto;">

							<!-- INSERT VIDEO EMBED HERE -->

							<div id="rbtv-acl-widget" data-layout="minimal"></div><script type="text/javascript" src="http://lollapalooza.redbull.tv/iframe.js" async></script>

							<!-- END OF INSERT VIDEO EMBED HERE -->
						</div>


						<header class="enfoque-header" style="padding:0 10px">
							<div class="post-in-loop" style="margin:0 0 20px;text-align: left">
								<h1 style="margin: 20px auto; color: #fff;"><?php echo get_the_title(); ?></h1>
							    <p style="color: #A3A3A3; font-family: helvetica, sans-serif; font-size: 18px; font-weight: 300;"><?php the_field('description'); ?></p>
			                    <div>
			                    	<div class="compartelo">COMPÁRTELO: </div>
				                    <?php
				                    	$facebook_share_link = "https://www.facebook.com/sharer/sharer.php?u=";
				                    	$facebook_share_link .= urlencode(get_permalink());
				                    ?>
				                    <a class="twitter-share-link" href="" target="_blank" style="border-bottom: none">
				                        <span class="genericon genericon-twitter" style="color: #55acee; margin: 0; width: 35px"></span>
				                    </a>
				                    <a href="<?php echo $facebook_share_link; ?>" target="_blank" style="border-bottom: none">
				                        <span class="genericon genericon-facebook" style="margin-right: 0; color:#3b5998; width: 35px"></span>
				                    </a>
				                </div>
							</div>
						</header>

					</div>
					<div id="emprendedor" class="site-content" role="main" style="text-align: left; padding: 0 10px; display: inline-block; width: 100%; margin-top: 60px;">

	    				<div id="content" class="site-content" role="main" style="text-align: left; margin-top: -11px;">
							<div><h2>Nuestra cobertura:</h2></div>
							<?php
						        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						        $query_args = array(
						          'post_type' => 'post',
						          'posts_per_page' => 5,
						          'paged' => $paged,
						          'tag__in' => array( 5111 )
						        );

						        $query = new WP_Query( $query_args );
						      ?>

						      <?php if ( $query->have_posts() ) : ?>

						      <?php while ( $query->have_posts() ) : $query->the_post(); ?>

						        <?php
						        if ( 'gallery' === get_post_format() ) {
						            $post_format_class = 'gallery';
						        } else {
						            if ( 'enfoque' === get_post_type() ) {
						                $post_format_class = 'enfoque';
						            } elseif ('patrocinado' === get_post_type() ) {
						                $post_format_class = 'patrocinado';
						            } elseif ('video' === get_post_format() ) {
						                $post_format_class = 'video';
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

						                        <?php if ( 'gallery' === get_post_format() ) { ?>
						                        <div class="dashicons dashicons-images-alt"></div>
						                        <?php } elseif ( 'video' === get_post_format() ) { ?>
						                            <div class="dashicons dashicons-video-alt3"></div>
						                        <?php } ?>

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
						                <div class="post-timestamp">
						                    <?php echo relativeTime(get_the_time('U'), ' m/j/y g:ia'); ?>
						                </div>
						                <div class="post-excerpt">
						                    <?php the_excerpt(); ?>
						                </div>
						            </div>
						        </div>

						      <?php endwhile; // End while ( have_posts() ) ?>
						      <?php wp_reset_postdata(); ?>
						      <?php else : ?>
						        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						      <?php endif; ?>

							  <style type="text/css">
							    .outer-container {
							      position: relative;
							      height: 0;
							      padding-bottom: 56.25%;
							    }
							    .BrightcoveExperience {
							      position: absolute;
							      top: 0;
							      left: 0;
							      width: 100%;
							      height: 100%;
							    }
							  </style>
						</div> <!-- #content-->
					</div> <!-- boxSep -->
					<div id="bottom-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="3"></div>
					<footer style="background-color: #fff; width: 100%; padding: 80px 50px 40px;">
						<div id="footer-content">
								<a href="<?php echo home_url() ?>" style="padding: 10px 3%;">© <?php echo date("Y"); ?> Hoy</a>
					            <a href="/about-vivelohoy/" style="padding: 10px 3%;"> Acerca de nosotros</a>
					            <a href="/advertise" style="padding: 10px 3%;"> Advertise</a>
					            <a href="http://www.tribpub.com/terminos-de-servicio-principales/" style="padding: 10px 3%;"> Términos de servicio</a>
					 			<a href="http://www.tribpub.com/politica-de-privacidad/" style="padding: 10px 3%;"> Política de privacidad</a>
						</div>
					</footer>
				</div><!-- #primary -->
			</div><!-- #page -->
			<?php render_omniture_tag(); ?>
			<?php wp_footer(); ?>
		</div>
	</body>
</html>