<div id="dep-breaking" class="cat-section breaking">

  <?php
    $the_query = new WP_Query();
    $the_query->query(array(
        'category_name'       => 'deportes',
        'post__in'            => get_option( 'sticky_posts' ),
        'ignore_sticky_posts' => 1,
        'showposts' => 1 ));
    if ($the_query->have_posts()) :
    while($the_query->have_posts()) : $the_query->the_post();
      $do_not_duplicate = $post->ID; ?>

  <div class="section-wrapper">
    <h3>Deportes</h3>
    <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
      <div class="brkn-chi-img"><?php the_post_thumbnail('hoy-thumb'); ?>
        <div class="brkn-chi-text">
          <h1><?php echo get_the_title(); ?></h1>
          <div><?php the_excerpt(); ?></div>
        </div>
      </div>
    </a>

    <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>


    <div class="chi-feed">

      <div class="video-section">
        <?php
          $the_query = new WP_Query();
          $the_query->query(array(
          'category_name' => 'deportes',
          'showposts' => 3,
           'post_type' =>'post',
           'tax_query' => array(
           array(
           'taxonomy' => 'post_format',
           'field' => 'slug',
           'terms' => array( 'post-format-video'),
           'operator' => 'IN',
           ))));
          if ($the_query->have_posts()) :
          while($the_query->have_posts()) : $the_query->the_post();
          if( $post->ID == $do_not_duplicate ) continue; ?>

            <a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
              <div class="chi-vid-item">
                <div><?php the_post_thumbnail('hoy-thumb'); ?></div>
                <div style="margin-top: 6px;"><h2><?php the_title(); ?></h2></div>
              </div>
            </a>

        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

      </div>

      <?php
        $the_query = new WP_Query();
        $the_query->query(array(
        'category_name' => 'deportes',
        'showposts' => 3,
         'post_type' =>'post',
         'tax_query' => array(
         array(
         'taxonomy' => 'post_format',
         'field' => 'slug',
         'terms' => array( 'post-format-video'),
         'operator' => 'NOT IN',
         ))));
        if ($the_query->have_posts()) :
        while($the_query->have_posts()) : $the_query->the_post();
          if( $post->ID == $do_not_duplicate ) continue; ?>

          <div class="chi-item">
           <div><a href="<?php the_permalink() ?>" rel="bookmark" accesskey="s"><h2><?php the_title(); ?></h2></a></div>
          </div>

      <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

    </div>
  </div>
</div> <!-- ap-section -->



<style type="text/css">
.chi-vid-item{
  width: 45%;
  float: left;
  margin: 0 10px 10px;
  min-height: 72px;
}
.chi-item{
    width: 100%;
    float: left;
    padding: 0 0 20px;
    margin: 0 0 20px;
}

.brkn-chi-img{
  float: left;
  width:48.334%;
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
.chi-feed h5{
  font-weight: 500;
  margin: 15px 0;
}

.brkn-chi-text h1{
    font-size: 28px;
    margin: 0;
}
.chi-feed{
    float: left;
    width: 49%;
    padding-left: 15px;
    border-left: 1px solid #f3f3f3;
}
.chi-item h2, .chi-vid-item h2{
    margin: 0;
    font-size: 17px;
    font-weight: 500;
    text-decoration: underline;
    color: #333;
}
.video-section{
  width: 100%;
  float: left;
  padding: 0 0 10px 0;
  margin: 0 0 20px;
  border-bottom: 1px solid #CACACA;
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
  .brkn-chi-img {
    width: 100%;
    padding-right: 0;
    margin: 0;
  }
  .chi-feed{
    clear: left;
    padding: 0;
    border: none;
    width: 100%;
    border-top: 1px solid #333;
    padding-top: 30px;
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
  .chi-feed h3{
    margin-bottom: 10px;
  }
}

</style>