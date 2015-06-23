<?php

/**
 *
 * Template Name: Emprendedores Page
 *
 **/

get_header('video');
?>
<div id="pages" class="content-area">

  <div id="page-container">

    <?php
          // set up or arguments for our custom query
        $query_args = array(
          'post_type' => 'post',
          'category_name' => 'emprendedores',
          'posts_per_page' => '33',
        );
        // create a new instance of WP_Query
        $the_query = new WP_Query( $query_args );
    ?>

    <?php if ( $the_query->have_posts() ) ?>
    <?php $post = $posts[0]; $c=0;?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );
    $thumbnail_url = $thumb['0']; // run the loop ?>
    <?php $c++; if( $c == 1) :?>

    <div id="top-video-player" class="entry-content">

        <div>
          <?php the_content('Leer más...'); ?>
          <h2 style="margin-bottom: 0;"><?php the_title(); ?></h2>
          <?php the_excerpt(); ?>
        </div>
        <div style="margin: 60px 0 40px; text-align: center; border-top: 1px solid #DDDDDD;">
            <h4 style="font-weight: 400; text-transform: uppercase">Emprendedores Presentado por:</h4>
            <a href="http://story.wintrust.com" target="_blank"><img style="max-width: 728px;" src="http://www.vivelohoy.com/wp-content/uploads/2015/06/wintrust.jpg"></a>
        </div>

    </div> <!-- entry-content -->

    <div id="video-loop-container">
      <div id="video-wrapper">
        <div class="video-cat-row">
          <div class="video-cat-wrapper">
            <ul>

              <?php else :?>

              <li class="video-item">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $post_title; ?>" />
                    <div class="video-icon">
                        <div class="dashicons dashicons-video-alt3"></div>
                    </div>
                </a>
                <h3><?php the_title(); ?></h3>
              </li>

              <?php endif; ?>
              <?php endwhile; ?>

            </ul>
          </div>
        </div>
      </div><!-- #video-wrapper -->
    </div><!-- #video-loop-container -->
  </div><!-- #page-container -->
</div><!-- #pages -->

<style>
#pages {
    margin: 0;
    padding: 60px 0 0;
}
#top-video-player {
    max-width:860px;
    width:100%;
}
#player{}
#mobile-player{
    display:none
}
#video-loop-container{
    background:#ffffff;
    padding: 30px;
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
