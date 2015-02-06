<?php
/**
 * The homepage template
 */

get_header('home'); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
				<div id="top-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="1"></div>
			<?php endif; // End if ( $ADS_ENABLED ) ?>

			<?php include('home-loop.php') ?>

			<!-- Start Brightcove video player -->
			<div class="video-container">
			    <div class="video-title">
			        <span>VÍDEOS</span>
			        <a href="<?php echo home_url() ?>/type/video"><button><span class="mas-videos-btn">MÁS VÍDEOS</span></button></a>
			    </div>
			    <script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
			    <div class="brighcove-player">
			        <object id="myExperience" class="BrightcoveExperience">
			          <param name="bgcolor" value="#FFFFFF" />
			          <param name="width" value="860" />
			          <param name="height" value="460" />
			          <param name="playerID" value="3971228075001" />
			          <param name="playerKey" value="AQ~~,AAAB2Ejp1kE~,qYgZ7QVyRmC7WYNrwwfATzRsOr1tXGiH" />
			          <param name="isVid" value="true" />
			          <param name="isUI" value="true" />
			          <param name="dynamicStreaming" value="true" />
			        </object>
			    </div>
			    <script type="text/javascript">brightcove.createExperiences();</script>
			</div>
			<!-- End Brightcove video player -->

			<div style="width: 100%; margin-bottom: 30px; text-align: center;">
				<?php hoy_pagination(); ?>
			</div>

			<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
				<div id="bottom-leaderboard" class="adslot leaderboard" data-width="728" data-height="90" data-pos="4"></div>
			<?php endif; // End if ( $ADS_ENABLED ) ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>