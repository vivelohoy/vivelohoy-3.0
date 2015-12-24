<div id="galeria-section" class="cat-section">
  <h3>Fotogalerias</h3>
  <div class="section-wrapper">
  <?php
    $the_query = new WP_Query();
    $the_query->query(array(
          'showposts' => 2,
           'tax_query' => array(
           array(
           'taxonomy' => 'post_format',
           'field' => 'slug',
           'terms' => array( 'post-format-gallery'),
           'operator' => 'IN',
           ))));
    if ($the_query->have_posts()) :
    while($the_query->have_posts()) : $the_query->the_post();
     ?>

  <a class="galeria-item" href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
    <div>
      <div class="ap-feat-img"><?php the_post_thumbnail('hoy-thumb'); ?></div>
      <div class="feat-text">
        <div class="timestamp"><?php echo relativeTime(get_the_time('U'), ' m/j/y g:ia'); ?></div>
       <h1><?php echo get_the_title(); ?></h1>
      </div>
    </div>
  </a>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

  </div>
</div> <!-- chi-section -->


<style type="text/css">




.chi-vid-item{
    margin-bottom: 0;
    width: 100%;
    float: left;
}
.galeria-item{
  width: 48%;
  float: left;
  margin: 0;
}
.ap-article a{
  color: #333 !important;
}
.ap-feat-img{
  float: left;
}

.section-wrapper .galeria-item:nth-child(2){
    float: right;
  }








@media (max-width: 680px){

  .ap-article{
    margin: 0;
    width: 100%;
    padding: 0 5%;
  }
  .ap-feat-img{
    width: 100%;
  }

}

</style>