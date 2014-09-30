<?php 
/**
 * The homepage template
 */

get_header('home'); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="max-width:960px">
	<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
			<div id="topleaderboard-post" class="topleaderboard-home">
				<div id="desktop-ad-top-leaderboard" class="adslot desktop-ad" data-width="728" data-height="90" data-dfp="/4011/trb.vivelohoy2/hp" data-pos="1"></div> 
      		</div> 
	<?php endif; // End if ( $ADS_ENABLED ) ?>		
				
				<?php include('home-loop.php') ?>

				 <?php
			        if (function_exists(custom_pagination)) {
			          custom_pagination($custom_query->max_num_pages,"",$paged);
			        }
			     ?>
		
	<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>	     
			<div id="bottomleaderboard-post">
				<div id="desktop-ad-bottom-leaderboard" class="adslot desktop-ad" data-width="728" data-height="90" data-dfp="/4011/trb.vivelohoy2/hp" data-pos="4"></div>
      		</div>  
    <?php endif; // End if ( $ADS_ENABLED ) ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>