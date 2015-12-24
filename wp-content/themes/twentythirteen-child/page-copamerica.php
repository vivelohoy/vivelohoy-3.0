<?php
/**
 *
 * Template Name: Copa America Coverage
 *
 **/

get_header('video'); ?>

  <div id="primary" class="content-area" style="margin-top: 56px;">
    <div style="max-width: 860px; margin: 0 auto; text-align: center; color: #fff; padding-top: 30px; margin-bottom: 20px;">
      <a href="http://www.yourfamilysmiles.com" target="_blank">
        <div id="flashContent">
          <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="300" height="250" id="English_TBI_539645_300x250_FamilyDentalCarePatelAurora_063015" align="middle">
            <param name="movie" value="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/assets/encasa/English_TBI_539645_300x250_FamilyDentalCarePatelAurora_063015.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#ffffff" />
            <param name="play" value="true" />
            <param name="loop" value="true" />
            <param name="wmode" value="window" />
            <param name="scale" value="showall" />
            <param name="menu" value="true" />
            <param name="devicefont" value="false" />
            <param name="salign" value="" />
            <param name="allowScriptAccess" value="sameDomain" />
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/assets/encasa/English_TBI_539645_300x250_FamilyDentalCarePatelAurora_063015.swf" width="300" height="250">
              <param name="movie" value="English_TBI_539645_300x250_FamilyDentalCarePatelAurora_063015.swf" />
              <param name="quality" value="high" />
              <param name="bgcolor" value="#ffffff" />
              <param name="play" value="true" />
              <param name="loop" value="true" />
              <param name="wmode" value="window" />
              <param name="scale" value="showall" />
              <param name="menu" value="true" />
              <param name="devicefont" value="false" />
              <param name="salign" value="" />
              <param name="allowScriptAccess" value="sameDomain" />
              <!--<![endif]-->
              <a href="http://www.adobe.com/go/getflash">
                <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
              </a>
              <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
          </object>
        </div>
      </a>
      <h3 style="font-family: helvetica, arial, sans-serif; font-weight: 500; margin-top: 40px; margin-bottom: 0px;">COBERTURA</h3>
      <h1 style="color: #FFD700; margin-bottom: 20px; font-size: 2.6em; margin-top: 0px;">COPA AMERICA</h1>
    </div>
    <div id="content" class="site-content" role="main" style="  display: table; margin: 0 auto; max-width: 860px; background: #fff; padding: 10px;">

      <?php
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $query_args = array(
          'post_type' => 'post',
          'posts_per_page' => 10,
          'paged' => $paged,
          'tag__in' => array( 956 )
        );

        $query = new WP_Query( $query_args );
      ?>

      <?php if ( $query->have_posts() ) : ?>

      <?php while ( $query->have_posts() ) : $query->the_post(); ?>

        <?php
        if ( 'gallery' === get_post_format() ) {
            $post_format_class = 'gallery';
        } else {
            if ( 'enfoque' === get_post_type() ) {
                $post_format_class = 'enfoque';
            } elseif ('patrocinado' === get_post_type() ) {
                $post_format_class = 'patrocinado';
            } elseif ('video' === get_post_format() ) {
                $post_format_class = 'video';
            }
            else {
                $post_format_class = 'standard';
            }
        }
        ?>
        <div class="post-in-loop <?php echo $post_format_class; ?>">

            <div class="post-preview-image">
                <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
                    <?php
                    if ( 'gallery' === get_post_format() ) {
                        the_post_thumbnail( 'large' );
                    } else {
                        if ( ('enfoque' === get_post_type() ) || ('patrocinado' === get_post_type() ) ) {
                            echo wp_get_attachment_image( get_field('main_image'), 'large' );
                        }
                        else {
                            the_post_thumbnail( 'large' );
                        }
                    }
                    ?>
                    <div class="post-format-icon">

                        <?php if ( 'gallery' === get_post_format() ) { ?>
                        <div class="dashicons dashicons-images-alt"></div>
                        <?php } elseif ( 'video' === get_post_format() ) { ?>
                            <div class="dashicons dashicons-video-alt3"></div>
                        <?php } ?>

                    </div>
                </a>
            </div>

            <div class="post-in-loop-container">
                <div class="post-title-link">
                    <h3 id="post-<?php the_ID(); ?>">
                        <?php if ( 'gallery' === get_post_format() ) : ?>
                        <?php endif; // if ( 'gallery' === get_post_format() ) ?>
                        <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                </div>
                <div class="post-timestamp">
                    <?php echo relativeTime(get_the_time('U'), ' m/j/y g:ia'); ?>
                </div>
                <div class="post-social-sharing-icons">
                    <?php
                        $facebook_share_link = "https://www.facebook.com/sharer/sharer.php?u=";
                        $facebook_share_link .= urlencode(get_permalink());
                    ?>
                    <a class="twitter_link" href="" target="_blank" data-text="<?php the_title(); ?>" data-url="<?php the_permalink() ?>">
                        <span class="genericon genericon-twitter">
                    </a>
                    <a href="<?php echo $facebook_share_link; ?>" target="_blank">
                        <span class="genericon genericon-facebook"></span>
                    </a>
                </div>
                <div class="post-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div>

      <?php endwhile; // End while ( have_posts() ) ?>

      <?php if ($query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
        <nav style="width:100%; display: inline-block;">
          <div style="width: 50%; float: left; text-align: left;">
            <?php echo get_next_posts_link( '← Anterior', $query->max_num_pages ); // display older posts link ?>
          </div>
          <div style="width: 50%; float: left; text-align: right;">
            <?php echo get_previous_posts_link( 'Siguiente →' ); // display newer posts link ?>
          </div>
        </nav>
      <?php } ?>

      <?php wp_reset_postdata(); ?>

      <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>


    </div><!-- #content -->
    <div style="  text-align: center; margin-top: 40px;">
      <a href="http://www.yourfamilysmiles.com" target="_blank">
        <div id="flashContent">
          <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="300" height="250" id="English_TBI_539645_300x250_FamilyDentalCarePatelAurora_063015" align="middle">
            <param name="movie" value="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/assets/encasa/English_TBI_539645_300x250_FamilyDentalCarePatelAurora_063015.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#ffffff" />
            <param name="play" value="true" />
            <param name="loop" value="true" />
            <param name="wmode" value="window" />
            <param name="scale" value="showall" />
            <param name="menu" value="true" />
            <param name="devicefont" value="false" />
            <param name="salign" value="" />
            <param name="allowScriptAccess" value="sameDomain" />
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="http://www.vivelohoy.com/wp-content/themes/twentythirteen-child/assets/encasa/English_TBI_539645_300x250_FamilyDentalCarePatelAurora_063015.swf" width="300" height="250">
              <param name="movie" value="English_TBI_539645_300x250_FamilyDentalCarePatelAurora_063015.swf" />
              <param name="quality" value="high" />
              <param name="bgcolor" value="#ffffff" />
              <param name="play" value="true" />
              <param name="loop" value="true" />
              <param name="wmode" value="window" />
              <param name="scale" value="showall" />
              <param name="menu" value="true" />
              <param name="devicefont" value="false" />
              <param name="salign" value="" />
              <param name="allowScriptAccess" value="sameDomain" />
              <!--<![endif]-->
              <a href="http://www.adobe.com/go/getflash">
                <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
              </a>
              <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
          </object>
        </div>
      </a>
    </div>
  </div><!-- #primary -->

  <style>
    a {border-bottom: none !important;}
    #page {
      background: url(http://www.vivelohoy.com/wp-content/uploads/2015/06/large-background.jpg) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; position: relative; height: 100%;
      padding-bottom: 40px;
    }
    .loop-leaderboard { display: none}
  </style>

<?php get_footer(); ?>