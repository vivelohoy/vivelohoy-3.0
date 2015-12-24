<div id="mundo-section" class="cat-section">
  <h3>Mundo</h3>
  <div class="section-wrapper">
  <?php
    $the_query = new WP_Query();
    $the_query->query(array(
      'category_name' => 'mundo',
      'posts_per_page' => 2,
      ));
    if ($the_query->have_posts()) :
    while($the_query->have_posts()) : $the_query->the_post();
      $chi_not_duplicate[] = $post->ID; ?>

  <a class="ap-article" href="<?php the_permalink() ?>" rel="bookmark" accesskey="s">
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


    <div class="list-feed">
      <?php

        $the_query = new WP_Query();
        $the_query->query(array(
        'category_name' => 'mundo',
        'posts_per_page' => 5
         ));

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
</div> <!-- chi-section -->


<style type="text/css">

.chi-vid-item{
    margin-bottom: 0;
    width: 100%;
    float: left;
}
.ap-article{
  width: 300px;
  float: left;
  margin: 0 20px 0 0;
}
.ap-article a{
  color: #333 !important;
}
.ap-feat-img{
  float: left;
}
.chi-vid-item h2{
    margin: 0;
    font-size: 17px;
    font-weight: 500;
    text-decoration: none;
    color: #333;
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