<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
</div><!-- closing #primary -->
</div><!-- closing #content -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen-child' ) ); ?>

        <!-- Consejo Legal Pre Roll Video -->
        <?php if(get_field('consejo_legal_video')) { ?>
            <div id="container1" class="outer-container">
                <div style="display: none;"></div>
                <script src="http://admin.brightcove.com/js/BrightcoveExperiences.js" type="text/javascript"></script>
                <object id="myExperience" class="BrightcoveExperience" width="300" height="150">
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
                    var player, APIModules, videoPlayer, videosAra, bumperVideosAra, bumperVideosAraLength, playBumper=true;
                    var onTemplateLoad = function(experienceID){
                        player = brightcove.api.getExperience(experienceID);
                        APIModules = brightcove.api.modules.APIModules;
                    };
                    var onTemplateReady = function(evt){
                        var contentModule;
                        videoPlayer = player.getModule(APIModules.VIDEO_PLAYER);
                        contentModule = player.getModule(APIModules.CONTENT);
                        contentModule.getPlaylistByID("4539564434001", onGetBumperPlaylist);
                    };
                    var onGetBumperPlaylist = function(playlistDTO){
                        bumperVideosAra = playlistDTO.videos;
                        bumperVideosAraLength = playlistDTO.videoCount;
                        playBumper();
                    };
                    var playBumper = function(evt){
                        videoPlayer.addEventListener(brightcove.api.events.MediaEvent.COMPLETE, onBumperComplete);
                        var toPlayID;
                        var bumperRandomNumber = Math.floor(Math.random()*bumperVideosAraLength);
                        toPlayID = bumperVideosAra[bumperRandomNumber].id;
                        videoPlayer.loadVideoByID(toPlayID);
                    };
                    var onBumperComplete = function(evt){
                        videoPlayer.removeEventListener(brightcove.api.events.MediaEvent.COMPLETE, onBumperComplete);
                        videoPlayer.loadVideoByID(<?php the_field('consejo_legal_video'); ?>);
                        onVideoComplete();
                    };
                    var onVideoComplete = function(evt){
                        videoPlayer.addEventListener( brightcove.api.events.MediaEvent.COMPLETE, postRoll);
                    };
                    var postRoll = function(evt){
                        videoPlayer.loadVideoByID(4578976552001);
                        videoPlayer.removeEventListener(brightcove.api.events.MediaEvent.COMPLETE, postRoll);
                    }
                </script>
            </div>
        <?php } ?>
        <!-- Consejo Legal Pre Roll Video -->


        <!-- Salud Pre Roll Video -->
        <?php if(get_field('salud_video')) { ?>
            <div id="container1" class="outer-container">
                <div style="display: none;"></div>
                <script src="http://admin.brightcove.com/js/BrightcoveExperiences.js" type="text/javascript"></script>
                <object id="myExperience" class="BrightcoveExperience" width="300" height="150">
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
                    var player, APIModules, videoPlayer, videosAra, bumperVideosAra, bumperVideosAraLength, playBumper=true;
                    var onTemplateLoad = function(experienceID){
                        player = brightcove.api.getExperience(experienceID);
                        APIModules = brightcove.api.modules.APIModules;
                    };
                    var onTemplateReady = function(evt){
                        var contentModule;
                        videoPlayer = player.getModule(APIModules.VIDEO_PLAYER);
                        contentModule = player.getModule(APIModules.CONTENT);
                        contentModule.getPlaylistByID("4607808574001", onGetBumperPlaylist);
                    };
                    var onGetBumperPlaylist = function(playlistDTO){
                        bumperVideosAra = playlistDTO.videos;
                        bumperVideosAraLength = playlistDTO.videoCount;
                        playBumper();
                    };
                    var playBumper = function(evt){
                        videoPlayer.addEventListener(brightcove.api.events.MediaEvent.COMPLETE, onBumperComplete);
                        var toPlayID;
                        var bumperRandomNumber = Math.floor(Math.random()*bumperVideosAraLength);
                        toPlayID = bumperVideosAra[bumperRandomNumber].id;
                        videoPlayer.loadVideoByID(toPlayID);
                    };
                    var onBumperComplete = function(evt){
                        videoPlayer.removeEventListener(brightcove.api.events.MediaEvent.COMPLETE, onBumperComplete);
                        videoPlayer.loadVideoByID(<?php the_field('salud_video'); ?>);
                        onVideoComplete();
                    };
                    var onVideoComplete = function(evt){
                        videoPlayer.addEventListener( brightcove.api.events.MediaEvent.COMPLETE, postRoll);
                    };
                    var postRoll = function(evt){
                        videoPlayer.loadVideoByID(4607936729001);
                        videoPlayer.removeEventListener(brightcove.api.events.MediaEvent.COMPLETE, postRoll);
                    }
                </script>
            </div>
        <?php } ?>
        <!-- Salud Pre Roll Video -->


        <header class="entry-header" style="text-align:center">
			<div class="entry-meta">

				<?php if ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1></center>
				<?php else : ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
				<?php endif; // is_single() ?>

				<div class="author-cat" style="margin:0">

					<?php
						$categories = get_the_category();
						$main_category = $categories[0];
						$category_url = get_category_link( $main_category->cat_ID );
						$category_name = $main_category->name;
					?>
					Por <?php the_author_posts_link(); ?> en <a href="<?php echo $category_url . '?post_format=video'; ?>"><?php echo $category_name; ?></a> <?php the_time('m/j/y g:ia') ?>

					<?php edit_post_link( __( 'Edit', 'twentythirteen-child' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
			</div>	<!-- .entry-meta -->
		</header><!-- .entry-header -->
		<div class="video-excerpt"><?php the_excerpt(); ?></div>

	 <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen-child' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

    <div id="video-loop-container">
                    <div id="video-wrapper">

                        <?php

                        function print_video_slider_html( $category = null, $posts_per_page = 4 ) {
                            global $post;
                            ?>

                                <?php
                                    if( is_null( $category ) ) {
                                        $custom_args = array(
                                            'post_type'     => 'post',
                                            'posts_per_page' => $posts_per_page,
                                            'post__not_in' => array($post->ID),
                                            'tax_query'     => array(
                                                array(
                                                    'taxonomy'  => 'post_format',
                                                    'field'     => 'slug',
                                                    'terms'     => array( 'post-format-video' ),
                                                ),
                                            ),
                                            'no_found_rows' => true
                                        );
                                    } else {
                                        if( !is_array( $category ) ) {
                                            $category = array( $category );
                                        }
                                        $custom_args = array(
                                            'post_type'     => 'post',
                                            'posts_per_page' => $posts_per_page,
                                            'post__not_in' => array($post->ID),
                                            'tax_query'     => array(
                                                'relation'  => 'AND',
                                                array(
                                                    'taxonomy'  => 'post_format',
                                                    'field'     => 'slug',
                                                    'terms'     => array( 'post-format-video' ),
                                                ),
                                                array(
                                                    'taxonomy'  => 'category',
                                                    'field'     => 'slug',
                                                    'terms'     => $category,
                                                ),
                                            ),
                                            'no_found_rows' => true
                                        );
                                    }
                                    $custom_query = new WP_Query( $custom_args );

                                    if ( $custom_query->have_posts() ) {
                                        while ( $custom_query->have_posts() ) {
                                            $custom_query->the_post();

                                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );
                                            $thumbnail_url = $thumb['0'];
                                            $video_id = get_post_meta( $post->ID, '_brightcove_video_id', true );
                                            $post_title = get_the_title();
                                ?>

                                    <li class="video-item">
                                        <a href="<?php the_permalink(); ?>" data-videoid="<?php echo $video_id; ?>">
                                            <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $post_title; ?>" />
                                            <div class="video-icon">
                                                <div class="dashicons dashicons-video-alt3"></div>
                                            </div>
                                        </a>
                                        <h3><?php echo $post_title; ?></h3>
                                    </li>

                                <?php
                                        }  // ends while ( $custom_query->have_posts() )
                                    } // ends if ( $custom_query->have_posts() )
                                    wp_reset_query();
                                ?>
                                <!-- end ul.slides -->
                            <?php
                        }

                        ?>

                        <div class="video-cat-row">
                            <div class="video-cat-wrapper">
                                <div class="video-cat-title">
                                    <h4>Nominadas al Emmy</h4>
                                    <p><a href="<?php echo 'http://www.vivelohoy.com/temas/emmy' . '?post_format=video'; ?>">M&Aacute;s videos</a></p>
                                </div>
                                <ul>
                                    <?php print_video_slider_html('emmy'); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="video-cat-row">
                            <div class="video-cat-wrapper">
                                <div class="video-cat-title">
                                    <h4>Chicago</h4>
                                    <p><a href="<?php echo 'http://www.vivelohoy.com/temas/chicago' . '?post_format=video'; ?>">M&Aacute;s videos</a></p>
                                </div>
                                <ul>
                                    <?php print_video_slider_html('chicago'); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="video-cat-row">
                            <div class="video-cat-wrapper">
                                <div class="video-cat-title">
                                    <h4>Entretenimiento</h4>
                                    <p><a href="<?php echo 'http://www.vivelohoy.com/temas/entretenimiento' . '?post_format=video'; ?>">M&Aacute;s videos</a></p>
                                </div>
                                <ul>
                                    <?php print_video_slider_html('entretenimiento'); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="video-cat-row">
                            <div class="video-cat-wrapper">
                                <div class="video-cat-title">
                                    <h4>Deportes</h4>
                                    <p><a href="<?php echo 'http://www.vivelohoy.com/temas/deportes' . '?post_format=video'; ?>">M&Aacute;s videos</a></p>
                                </div>
                                <ul>
                                    <?php print_video_slider_html('deportes'); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="video-cat-row">
                            <div class="video-cat-wrapper">
                                <div class="video-cat-title">
                                    <h4>Consejo legal</h4>
                                    <p><a href="<?php echo 'http://www.vivelohoy.com/temas/consejo-legal' . '?post_format=video'; ?>">M&Aacute;s videos</a></p>
                                </div>
                                <ul>
                                    <?php print_video_slider_html('consejo-legal'); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="video-cat-row">
                            <div class="video-cat-wrapper">
                                <div class="video-cat-title">
                                    <h4>qué rico chicago</h4>
                                    <p><a href="<?php echo 'http://www.vivelohoy.com/temas/que-rico-chicago' . '?post_format=video'; ?>">M&Aacute;s videos</a></p>
                                </div>
                                <ul>
                                    <?php print_video_slider_html('que-rico-chicago'); ?>
                                </ul>
                            </div>
                        </div>

                    </div><!-- #video-wrapper -->
                </div><!-- #video-loop-container -->
            </div><!-- #page-container -->
        </div><!-- #pages -->


<script type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
        <style>
            #pages {
                margin: 0;
                padding: 60px 0 0;
            }
            #page-container {
                margin-top: 40px;
            }
            #top-video-player {
                max-width:1050px;
                width:100%;
            }
            #player{}
            #mobile-player{
                display:none
            }
            #video-loop-container{
                background:#ffffff;
                padding: 0 30px;
                margin-top: 30px;
                width:100%
            }
            #video-wrapper{
                max-width: 1050px;
                margin: 0 auto;
            }
            .video-item {
                float: left;
                width: 22.58064516%;
                display: inline;
                height: auto;
                list-style: none;
                margin: 0 1.20967742% 0;
            }
            .video-item a {
                display: block;
                position: relative;
                outline: none;
                border-bottom: none;
            }
            .video-item img {
                width: 100%;
            }
            .video-icon {
                padding: 10px 26px 0px 4px;
                bottom: 7px;
                left: 6px;
                background-color: rgba(0,0,0,.5);
                border-radius: 5px;
                transition: background-color .3s ease-out;
                position: absolute;
                color: #fff;
            }
            .video-item h3 {
                margin-top: 15px;
                color: #323232;
                font-size: 0.7em;
                font-weight: normal;
            }
            .video-cat-row {
                border-bottom: 1px solid #ccc;
                padding-top: 10px;
            }
            .video-cat-title {
                display: inline-block;
                width: 100%;
                padding: 0 1%;
            }
            .video-cat-title a {
                font-family: sans-serif;
                text-transform: uppercase;
                font-size: 15px;
                line-height: 2.6;
            }
            .video-cat-title h4 {
                font-weight: 700;
                line-height: 22px;
                text-transform: uppercase;
                margin-top: 1em;
                float:left;
                margin-bottom: 0;
            }
            .video-cat-title p {
                float: right;
                margin: 1.3em 0 0;
                font-family: helvetica;
                font-weight: 200;
                font-size: 15px;
                text-transform: uppercase;
            }
            .video-cat-title a {
                color: #ccc !important;
                border-bottom: 1px solid #ccc;
            }
            .video-cat-wrapper ul {
                display: inline-block;
                width: 100%;
                padding: 0;
                list-style: none;
                margin: 0;
            }
            #video-info {
                border: 1px #999 solid;
                border-radius: 5px;
                background-color: #F5F5F5;
                padding: 5px;
                width: 350px;
                margin-left: 10px;
                display: inline-block;
            }
            #video-info h3,#video-info h4 {
                margin-top: 3px;
                margin-bottom: 3px;
            }
            .float-right {
                float: right;
            }
            .float-left {
                float: left;
            }
            #bottom-leaderboard {
                border-top:none !important;
            }
            @media (max-width: 900px){
                .video-item {
                    width: 47.580645%;
                    min-height: 290px;
                }
            }
            @media (max-width: 780px){
                #player {
                    display: none;
                }
                #mobile-player{
                    display: block;
                }
            }
            @media (max-width: 450px){
                .video-item {
                    width: 100%;
                }
                .video-item {
                    min-height: 250px
                }
            }

        </style>

</article><!-- #post -->