<?php

/**
 * Lideres Single Post
 */

get_header('lideres');
?>

			<div id="primary" class="content-area" style="height:100%; padding:0">

				<div class="enfoque-container">

					<div style="margin-top: 60px; padding-top: 30px; background-color: #202020;text-align: center;">

						<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
									<!-- TOP LEADERBOARD AD -->
										<div id="top-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="1" style="margin-top:0; padding-bottom: 30px;"></div>
									<!-- TOP LEADERBOARD AD -->
						<?php endif; // End if ( $ADS_ENABLED ) ?>
						<div style="max-width: 860px; margin: 0 auto;">
							<div id="container1" class="outer-container">
								<div style="display:none"></div>
								<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
								<object id="myExperience" class="BrightcoveExperience">
									<param name="bgcolor" value="#FFFFFF" />
									<param name="width" value="860" />
									<param name="height" value="484" />
									<param name="playerKey" value="AQ~~,AAAB2Ejp1kE~,qYgZ7QVyRmCtORwOH7VtCKYNUwwP3qno" />
									<param name="isVid" value="true" />
									<param name="isUI" value="true" />
									<param name="dynamicStreaming" value="true" />
									<param name="includeAPI" value="true" />
									<param name="templateLoadHandler" value="onTemplateLoad" />
	  								<param name="templateReadyHandler" value="onTemplateReady" />
								</object>
								<script type="text/JavaScript">
								  var player,
								    APIModules,
								    videoPlayer

								    var onTemplateLoad = function(experienceID){
								     player = brightcove.api.getExperience(experienceID);
								     APIModules = brightcove.api.modules.APIModules;
								    };

								    var onTemplateReady = function(evt){
								     videoPlayer = player.getModule(APIModules.VIDEO_PLAYER);
								     videoPlayer.loadVideoByID(<?php the_field('video'); ?>);
								    }
								</script>
							</div>
						</div>
						<header class="enfoque-header" style="padding:0 10px; display: inline-block">
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
					<div id="emprendedor" class="site-content" role="main" style="background-color: #202020; text-align: left; padding: 60px 10px 0; display: inline-block; width: 100%;">

	    				<div id="content" class="site-content" role="main" style="text-align: left; margin-top: -11px;">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<div class="entry-content">
								<?php the_content(); ?>
								</div><!-- .entry-content -->

							</article><!-- #post -->
							<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
				<div id="bottom-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="4" style="border-top:none"></div>
			<?php endif; // End if ( $ADS_ENABLED ) ?>


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
    #top-leaderboard{
    border-bottom: none !important;
}
  </style>

<?php get_footer('enfoque'); ?>