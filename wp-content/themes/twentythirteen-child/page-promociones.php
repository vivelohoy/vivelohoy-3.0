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
				<?
				$child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order", 'OBJECT');

				if ( $child_pages ) :
				    foreach ( $child_pages as $pageChild ) :
				        setup_postdata( $pageChild );
				        $thumbnail = get_the_post_thumbnail($pageChild->ID, 'large');
				?>
				        <div class="child-thumb item">
				          <a href="<?= get_permalink($pageChild->ID) ?>" rel="bookmark" title="<?= $pageChild->post_title ?>" style="border-bottom:none">
				            <?= $pageChild->post_title ?><br /><?= $thumbnail ?>
				          </a>
				        </div>
				<?
				    endforeach;
				endif;
				?>
			</div>


		</div><!-- #content -->
	</div><!-- #pages -->



<?php get_footer(); ?>