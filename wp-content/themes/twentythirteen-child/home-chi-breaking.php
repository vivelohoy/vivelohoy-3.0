<div id="chi-breaking" class="cat-section breaking">
<h3>Chicago</h3>
  <?php
    $the_query = new WP_Query();
    $the_query->query(array(
        'category_name'       => 'chicago',
        'post__in'            => get_option( 'sticky_posts' ),
        'ignore_sticky_posts' => 1,
        'showposts' => 1 ));
    if ($the_query->have_posts()) :
    while($the_query->have_posts()) : $the_query->the_post();
      $chi_not_duplicate[] = $post->ID; ?>

  <div class="section-wrapper">

    <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
      <div class="brkn-chi-img"><?php the_post_thumbnail('hoy-thumb'); ?>
        <div class="brkn-chi-text">
          <h1><?php echo get_the_title(); ?></h1>
        </div>
      </div>
    </a>

    <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>


    <div class="list-feed brkn-feed">
      <div class="video-section">
        <?php
          $the_query = new WP_Query();
          $the_query->query(array(
          'category_name' => 'chicago',
          'showposts' => 2,
           'tax_query' => array(
           array(
           'taxonomy' => 'post_format',
           'field' => 'slug',
           'terms' => array( 'post-format-video'),
           'operator' => 'IN',
           ))));
          if ($the_query->have_posts()) :
          while($the_query->have_posts()) : $the_query->the_post();
          if( in_array($post->ID, $chi_not_duplicate )) continue; ?>

            <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
              <div class="chi-vid-item">
                <div style="width: 30%;float: left;"><?php the_post_thumbnail('hoy-thumb'); ?></div>
                <div style="margin-left: 6px; float: left;width: 66%;"><h2><?php the_title(); ?></h2></div>
              </div>
            </a>

        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

      </div>
      <?php

        $the_query = new WP_Query();
        $the_query->query(array(
        'category_name' => 'chicago',
        'posts_per_page' => 4,
           'tax_query' => array(
           array(
           'taxonomy' => 'post_format',
           'field' => 'slug',
           'terms' => array( 'post-format-video'),
           'operator' => 'NOT IN',
           ))));

        if ($the_query->have_posts()) :
        while($the_query->have_posts()) : $the_query->the_post();
          if( in_array($post->ID, $chi_not_duplicate )) continue;
           ?>

      <div class="feed-item">
        <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
          <h5><?php echo get_the_title(); ?></h5>
        </a>
        <div class="timestamp">
          <?php echo relativeTime(get_the_time('U'), ' m/j/y g:ia'); ?>
        </div>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

    </div>
  </div>
</div> <!-- ap-section -->


<style type="text/css">
.chi-vid-item{
width: 100%;
    float: left;
    margin: 0 0 20px;
}
.chi-item{
  width: 100%;
  float: left;
  padding: 0 0 20px;
  margin: 0 0 20px;
}

.brkn-chi-img{
  float: left;
  width:67%;
  margin-right: 1px;
  padding-right: 10px;
}
.brkn-chi-text{
    float: none;
    width: 100%;
    padding: 10px 0;
    clear: left;
}
.brkn-chi-text div{
    font-size: 18px;
    margin-top: 10px;
}



.brkn-chi-text h1{
    font-size: 28px;
    margin: 0;
}
.brkn-feed{
    width: 32%
}
.chi-item h2, .chi-vid-item h2{
    margin: 0;
    font-size: 17px;
    font-weight: 500;
    text-decoration: none;
    color: #333;
}
.video-section{
  width: 100%;
  float: left;
}



@media (max-width: 1172px) {
  .brkn-chi-text h1 {
    font-size: 30px;
  }
  .brkn-chi-text p{
    font-size: 17px;
  }
  .chi-feed h5{
    font-size: 17.5px;
  }
}

@media (max-width: 991px) {
  .brkn-feed{
    width: 100%
}
  .brkn-chi-img {
    width: 100%;
    padding-right: 0;
    margin: 0;
  }
 
  .list-item{
    float: left;
    width: 46%;
    padding: 10px;
    margin: 1px;
    min-height: 95px;
  }
  .brkn-chi-text h1 {
  font-size: 20px;
}
}



@media (max-width: 720px) {
  .brkn-chi-img{
    width: 100%;
    padding: 5%;
    margin: 0;
  }
  .brkn-chi-text h1{
  margin-bottom: 10px;
  }
  .brkn-chi-text{
    width: 100%;
    padding: 0;
    margin-top: 10px;
  }
  .list-item {
    float: none;
    width: 100%;
    padding: 1px;
    margin: 0px;
    min-height: 40px;
  }

}

</style>