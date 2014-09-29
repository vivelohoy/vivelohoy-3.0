<?php 
/**
 * The homepage template
 */

get_header('home'); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="max-width:960px">
	<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
			<div id="topleaderboard-post" class="topleaderboard-home">
				<div id="desktop-ad-top-leaderboard" class="desktop-ad">
				    <script type='text/javascript'>
				        googletag.cmd.push(function() { googletag.display("desktop-ad-top-leaderboard"); });
				    </script>
				</div>
				<div id="mobile-ad-top-leaderboard" class="mobile-ad">
				    <script type='text/javascript'>
				        googletag.cmd.push(function() { googletag.display("mobile-ad-top-leaderboard"); });
				    </script>
				</div>  
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
				<div id="desktop-ad-bottom-leaderboard" class="desktop-ad">
				    <script type='text/javascript'>
				        googletag.cmd.push(function() { googletag.display("desktop-ad-bottom-leaderboard"); });
				    </script>
				</div>
				<div id="mobile-ad-bottom-leaderboard" class="mobile-ad">
				    <script type='text/javascript'>
				        googletag.cmd.push(function() { googletag.display("mobile-ad-bottom-leaderboard"); });
				    </script>
				</div>  
      		</div>  
    <?php endif; // End if ( $ADS_ENABLED ) ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>