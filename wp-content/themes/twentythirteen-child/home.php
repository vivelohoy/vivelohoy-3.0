<?php 
/**
 * The homepage template
 */

get_header('home'); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="max-width:960px">
	
			<div id="topleaderboard-post" class="topleaderboard-home">
				<?php 
					global $home_page_ad_tag_ids;
					print_ad_tag($home_page_ad_tag_ids[1]);
				?>
			</div>

			
			
				
				
				<?php include('grid-list-loop.php') ?>
				


				 <?php
			        if (function_exists(custom_pagination)) {
			          custom_pagination($custom_query->max_num_pages,"",$paged);
			        }
			     ?>

			

			<div id="bottomleaderboard-post">
				<?php 
					global $home_page_ad_tag_ids;
					print_ad_tag($home_page_ad_tag_ids[4]);
				?>
      		</div>  

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>