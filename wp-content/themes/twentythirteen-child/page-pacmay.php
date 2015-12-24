<?php
/**
 *
 * Template Name: Mayweahter vs Pacquaio Coverage
 *
 **/

get_header('video'); ?>

	<div id="primary" class="content-area" style="margin-top: 56px;">
		<div style="max-width: 860px; margin: 0 auto; text-align: center; color: #fff; padding-top: 1px; margin-bottom: 20px;">
			<h3 style="font-family: helvetica, arial, sans-serif; font-weight: 500;">COBERTURA</h3>
			<h2 style="color: #FFD700; margin-bottom: 20px;">EL COMBATE DEL SIGLO</h2>
			<a href="http://www.lavinata.com" target="_blank">
				<img src="http://www.tribuneinteractive.com/creative/ads/newspaper/CHI/LaVinataLiquors/042915/CHI_529907_728X90_LaVinataLiquors_042915_V1.jpg">
			</a>
		</div>
		<div id="content" class="site-content" role="main" style="  display: table; margin: 0 auto; max-width: 860px; background: #fff; padding: 10px;">

			<?php
			  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			  $query_args = array(
			    'post_type' => 'post',
			    'posts_per_page' => 20,
			    'paged' => $paged,
			    'tag__in' => array( 1507, 2338 )
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

			<?php if ($query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
			  <nav style="width:100%; display: inline-block;">
			    <div style="width: 50%; float: left; text-align: left;">
			      <?php echo get_next_posts_link( '← Anterior', $query->max_num_pages ); // display older posts link ?>
			    </div>
			    <div style="width: 50%; float: left; text-align: right;">
			      <?php echo get_previous_posts_link( 'Siguiente →' ); // display newer posts link ?>
			    </div>
			  </nav>
			<?php } ?>

			<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>


		</div><!-- #content -->
		<div style="  text-align: center; margin-top: 40px;">
			<a href="http://www.lavinata.com" target="_blank"><img src="http://www.tribuneinteractive.com/creative/ads/newspaper/CHI/LaVinataLiquors/042915/CHI_529907_728X90_LaVinataLiquors_042915_V1.jpg"></a>
		</div>
	</div><!-- #primary -->

	<style>
		a {border-bottom: none !important;}
		#page {
			background: url(http://www.vivelohoy.com/wp-content/uploads/2015/04/bg3.jpg) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; position: relative; height: 100%;
			padding-bottom: 40px;
		}
		.loop-leaderboard { display: none}
	</style>

<?php get_footer(); ?>