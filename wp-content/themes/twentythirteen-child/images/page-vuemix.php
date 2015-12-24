<?php

/**
 *
 * Template Name: Vuemix Video Page
 *
 **/

get_header('video');

?><script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

<script src="https://vuemix-web.s3.amazonaws.com/js/vuemix.all.js" charset="utf-8"></script>
<link href="http://vuemix-web.s3.amazonaws.com/css/vuemixwallsettings.css" rel="stylesheet"></link>
<script src="http://content.jwplatform.com/libraries/1XBsLZpj.js"></script>


            <div id="video-page-cont" style="margin-top: 60px; padding-top: 40px;">

                <div id="vuemix" style="min-height: 522px;">



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

                    <script>

                    function onTap(wall, content, tag)
                    {
                      if (!wall.hasVideo())
                      {
                        VuemixSDK.getLogger().tileExpanded(content.assetID);
                        VuemixSDK.getLogger().post();
                        simpleWall.close();
                        window.location.href = content.webPageURL;
                      }
                    }

                    function onDoubleTap(wall, content, tag)
                    {
                      VuemixSDK.getLogger().tileExpanded(content.assetID);
                      VuemixSDK.getLogger().post();
                      simpleWall.close();
                      window.location.href = content.webPageURL;
                    }


                    // NEW: Remove commented out var adCountUp when fixed
                    //  var adCountUp = 0;
                    //  function onPageChange(wall, pageIndex, numOfPages)
                    //  {
                    //  adCountUp ++;

                      // Play Add every 4th swipe. 1 => Every Swipe, 2 => Every-Other, etc.
                      // You can use your own custome condition/logic
                      // if (adCountUp >= 4)
                      // {
                      // adCountUp = 0;
                        // Set to your desired master video tag
                        //var tag = "http://pubads.g.doubleclick.net/gampad/ads?iu=/4011/trb.vivelohoy2/video&sz=3x3&cust_params=pos%3Dpre&impl=s&gdfp_req=1&env=vp&output=xml_vast2&unviewed_position_start=1";
                        // var tag = "http://pubads.g.doubleclick.net/gampad/ads?iu=/4011/trb.vivelohoy2/video&sz=3x3&cust_params=pos%3Dpre&impl=s&gdfp_req=1&env=vp&output=xml_vast&unviewed_position_start=1";
                        // wall.prepareAd(tag);
                      // }
                    // }

                    // $(window).on("pageshow", function() {
                    (function($) {
                        $(function() {

                      var ua = navigator.userAgent;
                      var verticalScroll = false;

                      if (ua.search(/iPhone;/) >= 0 || ua.search(/iPod touch;/) >= 0)
                        verticalScroll = false;

                      VuemixSDK.config({
                        serverAddress: "tribune-app.vuemix.com",
                        lang: "es"
                      });

                      var resizeSettings = {
                        scaleMax: 9.9,
                        scaleMin: 0.6,
                        scaleStep: 0.1,
                        xPadding: 5,
                        yPadding: 5,
                        xAlignment: "center",
                        yAlignment: "top"
                      };

                      // queryPath = "content/search.json?category_id=55690aa0544f6650ae000018";

                      queryPath = "signed:"+"content/search.json?category_id=55690aa0544f6650ae000018&account_id=tribune-app&horder=id,client_secret,expire&expire=1449096282&id=shared-rmm%2Be3VnomU2rT3eUedxm3vPbYs%3D&hash=7I9uXlj%2BD3w02f7ES75WpWMjI70%3D";

                      simpleWall = new VuemixSDK.SimpleWall(
                        "my_wall", 1024, 576, queryPath,
                        resizeSettings, verticalScroll, null, null, onTap, onDoubleTap );
                    });
                    })(jQuery);

                    (function($) {
                        $(window).unload(function(){});
                    })(jQuery);
                    </script>
                    <div id="my_wall" style="width:100%; height:550px"></div>
                    <div style="text-align:center">
                        <p>
                            Haz 'click' una vez para escuchar el video.<br>
                            Haz 'click' dos veces para leer el artículo.
                        </p>
                    </div>

                    <div id="test_buttonpaneleft" style="position:absolute;left:0;top:50%;width:42px;height:160px;margin-top:-80px">
                      <input type="image" src="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/assets/vuemix/left_arrow.png" style="position:absolute;top:59px;width:42px" onclick="simpleWall && simpleWall.prevPage()"/>
                    </div>

                    <div id="test_buttonpaneright" style="position:absolute;right:0;top:50%;width:42px;height:160px;margin-top:-80px">
                      <input type="image" src="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/assets/vuemix/right_arrow.png" style="position:absolute;top:59px;width:42px" onclick="simpleWall && simpleWall.nextPage()"/>
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
                        <script type="text/javascript">
                            var is_ios = /(iPhone|iPod)/g.test( navigator.userAgent );
                            if(is_ios)
                            {
                             $('#vuemix').css('display', 'none');
                             $('#video-page-cont').css('padding-top', '0')
                            };
                        </script>

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
            @media (max-width: 900px) {
                .video-item {
                    width: 47.580645%;
                    min-height: 345px;
                }
            }
            @media (max-width: 780px) {
                #player {
                    display: none;
                }
                #mobile-player{
                    display: block;
                }
            }
            @media (max-width: 450px) {
                .video-item {
                    width: 100%;
                }
                .video-item {
                    min-height: 250px
                }
            }

        </style>

<?php get_footer(); ?>