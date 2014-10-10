<?php 
/**
 * The homepage template
 */

get_header('home'); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="max-width:960px">
	<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
			<div id="top-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="1"></div>
	<?php endif; // End if ( $ADS_ENABLED ) ?>		
				
	<?php include('home-loop.php') ?>

	<?php
        if (function_exists(custom_pagination)) {
          custom_pagination($custom_query->max_num_pages,"",$paged);
        }
    ?>
		
	<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>	     
			<div id="bottom-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="4"></div> 
	<?php endif; // End if ( $ADS_ENABLED ) ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>