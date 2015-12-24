<?php

/**
 *
 * Template Name: Lideres Page
 *
 **/

get_header('video');
?>
<div id="pages" class="content-area">

  <div id="page-container">

    <div id="top-video-player">
        <div style="text-align: center;">
            <img style="margin: 20px auto; text-align: center; max-width: 400px;" src="http://vivelohoy.com/wp-content/themes/twentythirteen-child/assets/lider/lideres.png">
        </div>

    </div> <!-- top video player -->

    <?php
          // set up or arguments for our custom query
        $query_args = array(
          'post_type' => 'lider',
          'showposts' => 33
        );
        // create a new instance of WP_Query
        $the_query = new WP_Query( $query_args );
    ?>


    <div id="video-loop-container">
      <div id="video-wrapper">
        <div class="video-cat-row">
          <div class="video-cat-wrapper">
            <ul>

                <?php if ( $the_query->have_posts() ) ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );
                $thumbnail_url = $thumb['0']; // run the loop ?>

              <li class="video-item">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $post_title; ?>" />
                    <div class="video-icon">
                        <div class="dashicons dashicons-video-alt3"></div>
                    </div>
                </a>
                <h3><?php the_title(); ?></h3>
              </li>

              <?php endwhile; ?>

            </ul>
          </div>
        </div>
      </div><!-- #video-wrapper -->
    </div><!-- #video-loop-container -->
  </div><!-- #page-container -->
</div><!-- #pages -->

<style>
.video-hoy-logo{
    float: left !important;
}
#pages{
    margin: 0;
    padding: 60px 0 0;
}
#top-video-player {
    width:100%;
    display: inline-block;
    background-color: #D5D4D5;
    padding: 30px 0;
    color: #fff;
}
#top-video-player h4{
    font-weight: 400;
    text-transform: uppercase;
}
#top-video-player img {
    max-width: 728px;
    width: 100%;
    padding: 0 20px;
}
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
#player{
    max-width: 860px;
    margin: 0 auto;
}
#video-loop-container{
    background:#ffffff;
    padding: 30px;
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
    min-height: 260px;
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
