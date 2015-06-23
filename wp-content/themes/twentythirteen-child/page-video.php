<?php

/**
 *
 * Template Name: Video Page
 *
 **/

get_header('video');

?>


        <div id="pages" class="content-area">

            <div id="page-container">

                <div id="top-video-player" class="entry-content">



                    <?php
                        $custom_args = array(
                            'post_type'     => 'post',
                            'posts_per_page' => 1,
                            'tax_query'     => array(
                                array(
                                    'taxonomy'  => 'post_format',
                                    'field'     => 'slug',
                                    'terms'     => array( 'post-format-video' ),
                                ),
                            ),
                            'no_found_rows' => true
                        );
                        $custom_query = new WP_Query( $custom_args );

                        if ( $custom_query->have_posts() ) {
                            while ( $custom_query->have_posts() ) {
                                $custom_query->the_post();
                                $most_recent_video_id = get_post_meta( $post->ID, '_brightcove_video_id', true );
                            }
                        }
                    ?>

                    <div id="player" class="section">

                        <div style="display:none"></div>

                        <object id="player1" class="BrightcoveExperience">
                          <param name="bgcolor" value="#F5F5F5" />
                          <param name="width" value="1050" />
                          <param name="height" value="445" />
                          <param name="playerID" value="4201221278001" />
                          <param name="playerKey" value="AQ~~,AAAB2Ejp1kE~,qYgZ7QVyRmA6MUIcV_oQ94AobzV4jGDn" />
                          <param name="isVid" value="true" />
                          <param name="isUI" value="true" />
                          <param name="dynamicStreaming" value="true" />
                          <param name="includeAPI" value="true">
                          <param name="templateLoadHandler" value="onTemplateLoad">
                          <param name="templateReadyHandler" value="onTemplateReady" />
                        </object>
                        <script type="text/javascript" src="http://admin.brightcove.com/js/APIModules_all.js"></script>
                        <script type="text/javascript">
                        // namespace for everything global
                        var BCL = {};
                        // initial setup in the special onTemplateLoaded() function
                        function onTemplateLoad(id) {
                          BCL.player = brightcove.getExperience(id);
                          BCL.experienceModule = BCL.player.getModule(APIModules.EXPERIENCE);
                          BCL.experienceModule.addEventListener(BCExperienceEvent.TEMPLATE_READY, BCL.onTemplateReady);
                        }
                        // event listener for the player being ready
                        BCL.onTemplateReady = function(event) {
                          // remove the event listener
                          BCL.experienceModule.removeEventListener(BCExperienceEvent.TEMPLATE_READY, BCL.onTemplateReady);
                          // prepare the URL for appending the video id
                          BCL.setURLstring();
                          // get a reference to the video player module
                          BCL.videoPlayer = BCL.player.getModule(APIModules.VIDEO_PLAYER);
                          // get a reference to the social module
                          BCL.socialModule = BCL.player.getModule(APIModules.SOCIAL);
                          // set up listner for media change events
                          BCL.videoPlayer.addEventListener(BCMediaEvent.CHANGE, BCL.onMediaChange);
                          // execute the change event handler for the initial video in the player
                          BCL.onMediaChange(null);
                        }
                        // set the URL prefix for the video ID
                            // see if the document URL has URL params appended
                        BCL.setURLstring = function() {
                            // get a reference to the current URL
                            BCL.docURL = document.URL;
                            // several vars to be used in manipulating the string
                            var URLpart = "";
                            var paramPart = "";
                            var docURLsplit = [];
                            var paramString1 = "";
                            var paramString2 = "";
                            // see if there are already URL params
                            if ( BCL.docURL.indexOf("?") > 0 ) {
                                // split the string into the root URL and the URL params
                                docURLsplit = BCL.docURL.split("?");
                                // the URL part will equal the first part of the array
                                URLpart = docURLsplit[0];
                                // now see if the params already include a video id
                                if ( docURLsplit[1].indexOf("bctid") >= 0 ) {
                                    // split the param string into whatever comes before bctid and the rest
                                    // get the first part of the string
                                    paramString1 = docURLsplit[1].substr(0, docURLsplit[1].indexOf("bctid"));
                                    // get the rest of the string, which will begin with the video id param
                                    paramString2 = docURLsplit[1].slice( docURLsplit[1].indexOf("bctid") );
                                    // see if there are other params after the video id
                                    if ( paramString2.indexOf("&") > 0 ) {
                                        // if so, delete everything up to and including the first &
                                        paramString2 = paramString2.slice(paramString2.indexOf("&") + 1);
                                        // recombine the first part of the param string with what's left of the second part and add a ? before and an & after
                                        paramPart = paramPart.concat("?", paramString1 ,paramString2, "&");
                                    }
                                    // if there are no more params, then just use ? + paramString1
                                    else {
                                        paramPart = "?" + paramString1;
                                    }
                                        // put the string back together
                                        BCL.docURL = URLpart.concat(paramPart);
                                }
                            }
                            // there are no query params, so just append a ? to the original URL
                            else {
                                BCL.docURL = BCL.docURL.concat("?");
                            }
                            return;
                        }</script>
                        <script type="text/javascript">
                        // add handler for change events
                        BCL.onMediaChange = function(event) {
                            // add the video id to the URL
                            var newLink = BCL.docURL + "bctid=" + BCL.videoPlayer.getCurrentVideo().id;
                            // set the new link based on the page URL and the video ID
                            BCL.socialModule.setLink(newLink);
                            // log(BCL.socialModule.getLink());
                            return;
                        }</script>

                    </div>
                    <div id="mobile-player">
                          <object id="player2" class="BrightcoveExperience">
                            <param name="bgcolor" value="#FFFFFF" />
                            <param name="width" value="860" />
                            <param name="height" value="484" />
                            <param name="playerID" value="4107767766001" />
                            <param name="playerKey" value="AQ~~,AAAB2Ejp1kE~,qYgZ7QVyRmA6qSe0cpB6vI_1jtjS58Cp" />
                            <param name="isVid" value="true" />
                            <param name="isUI" value="true" />
                            <param name="dynamicStreaming" value="true" />
                            <param name="includeAPI" value="true">
                            <param name="templateLoadHandler" value="onTemplateLoad">
                            <param name="templateReadyHandler" value="onTemplateReady" />
                          </object>
                    </div><p id="displayInfo"></p>

                </div> <!-- entry-content -->

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
                                    <h4>Esquina Verde</h4>
                                    <p><a href="<?php echo 'http://www.vivelohoy.com/temas/esquina-verde' . '?post_format=video'; ?>">M&Aacute;s videos</a></p>
                                </div>
                                <ul>
                                    <?php print_video_slider_html('esquina-verde'); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="video-cat-row">
                            <div class="video-cat-wrapper">
                                <div class="video-cat-title">
                                    <h4>Documentales</h4>
                                    <p><a href="<?php echo 'http://www.vivelohoy.com/temas/documentales' . '?post_format=video'; ?>">M&Aacute;s videos</a></p>
                                </div>
                                <ul>
                                    <?php print_video_slider_html('documentales'); ?>
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
            @media (max-width: 900px){
                .video-item {
                    width: 47.580645%;
                    min-height: 345px;
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

<?php get_footer(); ?>