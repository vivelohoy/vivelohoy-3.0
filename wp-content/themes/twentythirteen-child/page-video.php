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

                    <div id="player" class="section">

                        <div style="display:none"></div>
                        <script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
                        <object id="player1" class="BrightcoveExperience">
                          <param name="bgcolor" value="#F5F5F5" />
                          <param name="width" value="1050" />
                          <param name="height" value="492" />
                          <param name="playerID" value="4201221278001" />
                          <param name="playerKey" value="AQ~~,AAAB2Ejp1kE~,qYgZ7QVyRmA6MUIcV_oQ94AobzV4jGDn" />
                          <param name="isVid" value="true" />
                          <param name="isUI" value="true" />
                          <param name="dynamicStreaming" value="true" />
                          <param name="linkBaseURL" value="http://vivelohoy.com/" />
                        </object>

                    </div>

                    <script type="text/javascript">
                       brightcove.createExperiences();
                    </script>

                    <style type="text/css">
                        .outer-container {
                          position: relative;
                          height: 0;
                          padding-bottom: 71.75%;
                        }
                        .BrightcoveExperience_mobile {
                          position: absolute;
                          top: 0;
                          left: 0;
                          width: 100%;
                          height: 100%;
                        }
                      </style>
                            <div style="display:none"></div>
                            <div id="mobile-player" class="outer-container">
                                <object id="player2" class="BrightcoveExperience BrightcoveExperience_mobile">
                                    <param name="bgcolor" value="#F5F5F5" />
                                    <param name="playerID" value="4107767766001" />
                                    <param name="playerKey" value="AQ~~,AAAB2Ejp1kE~,qYgZ7QVyRmA6qSe0cpB6vI_1jtjS58Cp" />
                                    <param name="isVid" value="true" />
                                    <param name="isUI" value="true" />
                                    <param name="dynamicStreaming" value="true" />
                                    <param name="includeAPI" value="true" />
                                    <param name="templateLoadHandler" value="onTemplateLoad" />
                                    <param name="templateReadyHandler" value="onTemplateReady" />
                                </object>
                            </div>
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
                                    <h4>Halloween</h4>
                                    <p><a href="<?php echo 'http://www.vivelohoy.com/temas/halloween' . '?post_format=video'; ?>">M&Aacute;s videos</a></p>
                                </div>
                                <ul>
                                    <?php print_video_slider_html('halloween'); ?>
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
                .entry-content {
                margin-top: 0 !important;
                }
                #page-container {
                    margin-top: 0 !important;
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