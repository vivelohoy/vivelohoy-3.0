<?php

/**
 * Patrocinado Post type
 */

get_header('patrocinado');
$image = wp_get_attachment_image_src(get_field('feature_image'), 'large');

?>
		<div id="primary" class="content-area" style="height:100%; padding:0">

			<div class="patrocinado-container">

				<?php if ( get_field('article') ) { ?>
					<div id="bg_img" class="patrocinado-image">
						<script type="text/javascript">
							var string = "url('<?php echo $image[0]; ?>')";
							document.getElementById("bg_img").style.backgroundImage = string ;
						</script>
				    </div>
				    <?php } elseif ( get_field('main_video') ) { ?>
				    <div class="top_margin"></div>
				    <?php } elseif ( get_field('gallery_image_1') ) { ?>
				    <div class="top_margin"></div>
				<?php } ?>

				<div id="content" class="site-content" role="main" style="text-align: left; padding: 0 10px">
					<img class="aligncenter size-full wp-image-8402912" src="http://vagrant.dev/wp-content/uploads/2014/12/wintrust.png" alt="wintrust">
                    <header class="patrocinado-header">
						<div class="post-in-loop">
							<h1 class="enfoque-title"><?php echo get_the_title(); ?></h1>
							<div class="patrocinado-author-link">
						        Patrocinado por
						        <a target="_blank" href="<?php the_field('company_website'); ?>">
							        <div class="patrocinado-author-link">
							            <?php the_field('company_name'); ?>
						            </div>
						        </a>
						    </div>
						    <div class="enfoque-timestamp">
						        <?php echo relativeTime(get_the_time('U'), ' m/j/y g:ia'); ?>
						    </div>
						</div>
					</header>
					<article class="patrocinado-footer" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">

						<?php if (get_field('article')) { ?>
							<?php the_field('article'); ?>
						<?php } elseif (get_field('main_video')) { ?>
						    <div class="patrocinado-video">
						    	<?php echo the_field('main_video'); ?>
						    </div>
							<?php the_field('video_article'); ?>

						<?php } elseif (get_field('gallery_image_2')) { ?>

						<?php
							$NUMBER_OF_GALLERY_IMAGES = 10;
							$gallery_shortcode_string = '[gallery ids="';
							for ($image_number = 1; $image_number <= $NUMBER_OF_GALLERY_IMAGES; $image_number++ ) {
								$image_id = get_field('gallery_image_' . $image_number );
								if ( $image_id ) {
									$gallery_shortcode_string = $gallery_shortcode_string . $image_id . ',';
								}

							}
							$gallery_shortcode_string .='"]';
							echo do_shortcode( $gallery_shortcode_string );

						?>

						<?php }?>
						</div><!-- .entry-content -->
					</article><!-- #post -->

<?php get_footer(); ?>