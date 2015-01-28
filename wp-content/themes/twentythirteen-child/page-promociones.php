<?php
/**
 * Template Name: Promociones
 *
 */
?>

<?php get_header('home'); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="padding-top:40px">


			<h1>Promociones</h1>
			<div class="masonry">
				<?php
					$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );

					foreach( $mypages as $page ) {
						$thumbnail = get_the_post_thumbnail($page->ID, 'large');

					?>
						<a href="<?php echo get_page_link( $page->ID ); ?>">
							<div class="item">
								<?= $thumbnail ?>
								<h3><?php echo $page->post_title; ?></h3>
							</div>
						</a>
					<?php
					}
				?>
			</div>


		</div><!-- #content -->
	</div><!-- #pages -->

<?php get_footer(); ?>