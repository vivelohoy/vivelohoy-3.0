<!-- Start Brightcove video player -->
			<div class="video-container">
			    <div class="video-title">
			        <span>VÍDEOS</span>
			        <a href="<?php echo home_url() ?>/video"><button><span class="mas-videos-btn">MÁS VÍDEOS</span></button></a>
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
			          <param name="linkBaseURL" value="http://vivelohoy.com/" />
			        </object>
			    </div>
			    <script type="text/javascript">
				   brightcove.createExperiences();
				</script>
			</div>
			<!-- End Brightcove video player -->