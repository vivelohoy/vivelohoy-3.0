<?php

/**
 * Emprendedores Single Post
 */

get_header('emprendedores');
?>

			<div id="primary" class="content-area" style="height:100%; padding:0">

				<div class="enfoque-container">

					<div class="enfoque-image" style="margin-top: 60px; padding-top: 30px; background-color: #202020;text-align: center;">

						<a style="display: inline-block; border-bottom: none; margin: 0 20px 20px;" href="http://story.wintrust.com" target="_blank">
							<img style="max-width: 728px;" src="http://www.vivelohoy.com/wp-content/uploads/2015/06/wintrust.jpg">
						</a>
						<div style="max-width: 860px; margin: 0 auto;">
							<div id="container1" class="outer-container">
								<div style="display:none"></div>
								<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
								<object id="myExperience" class="BrightcoveExperience">
									<param name="bgcolor" value="#FFFFFF" />
									<param name="width" value="860" />
									<param name="height" value="484" />
									<param name="playerID" value="3971228038001" />
									<param name="playerKey" value="AQ~~,AAAB2Ejp1kE~,qYgZ7QVyRmAY6eVE_jKAzK_NU0a57Pd6" />
									<param name="isVid" value="true" />
									<param name="isUI" value="true" />
									<param name="dynamicStreaming" value="true" />
									<param name="includeAPI" value="true" />
									<param name="templateLoadHandler" value="onTemplateLoad" />
									<param name="templateReadyHandler" value="onTemplateReady" />
								</object>
								<script type="text/javascript">brightcove.createExperiences();</script>
								<script type="text/JavaScript">
								 var player,
								    APIModules,
								    videoPlayer,
								    videosAra,
								    bumperVideosAra,
								    bumperVideosAraLength,
								    playBumper=true;

								    var onTemplateLoad = function(experienceID){
								     player = brightcove.api.getExperience(experienceID);
								     APIModules = brightcove.api.modules.APIModules;
								    };

								    var onTemplateReady = function(evt){
								     var contentModule;
								     videoPlayer = player.getModule(APIModules.VIDEO_PLAYER);
								     contentModule = player.getModule(APIModules.CONTENT);
								     contentModule.getPlaylistByID("4298104973001", onGetBumperPlaylist);
								    };

								    var onGetBumperPlaylist = function(playlistDTO){
								      console.log(playlistDTO);
								      bumperVideosAra = playlistDTO.videos;
								      bumperVideosAraLength = playlistDTO.videoCount;
								      playVideo();
								    };

								    var playVideo = function(evt){
								      var toPlayID;
								      var bumperRandomNumber = Math.floor(Math.random()*bumperVideosAraLength);
								      console.log(bumperRandomNumber);
								      if (playBumper){
								        playBumper = false;
								        toPlayID = bumperVideosAra[bumperRandomNumber].id;
								        videoPlayer.loadVideoByID(toPlayID);
								        videoPlayer.loadVideoByID(<?php the_field('video'); ?>);
								      } else {
								        playBumper = true;
								        videoPlayer.loadVideoByID(<?php the_field('video'); ?>);
								      }
								    };
								</script>
							</div>
						</div>
						<header class="enfoque-header" style="padding:0 10px">
							<div class="post-in-loop" style="margin:0 0 20px;text-align: left">
								<h1 style="margin: 10px auto; color: #fff;"><?php echo get_the_title(); ?></h1>
							    <p style="color: #A3A3A3;"><?php the_field('description'); ?></p>
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
					<div class="site-content" role="main" style="text-align: left; padding: 0 10px; display: inline-block; width: 100%; margin-top: 60px;">

	    				<div id="content" class="site-content" role="main" style="text-align: left; margin-top: -11px;">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<div class="entry-content">
								<?php the_content(); ?>
								</div><!-- .entry-content -->

							</article><!-- #post -->
							<hr>
							<br>
							<?php comments_template(); ?><!-- Comments On -->
							<br>

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

<?php get_footer('enfoque'); ?>



