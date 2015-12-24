<div id="ap-section" class="ap-category">
  <div class="section-wrapper">
  <?php
    $the_query = new WP_Query();
    $the_query->query("category_name=noticias&posts_per_page=2&meta_key=_thumbnail_id");
    if ($the_query->have_posts()) :
    while($the_query->have_posts()) : $the_query->the_post();
      $do_not_duplicate[] = $post->ID; ?>

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
      <h3>Ùltimas Noticias</h3>
      <?php

        $the_query = new WP_Query();
        $the_query->query("category_name=noticias&posts_per_page=5");
        if ($the_query->have_posts()) :
        while($the_query->have_posts()) : $the_query->the_post();
          if( in_array($post->ID, $do_not_duplicate )) continue;
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






@media (max-width: 680px){
  .ap-article{
    margin: 0;
    width: 100%;
    padding: 5%;
  }
  .ap-feat-img{
    width: 100%;
  }

}

</style>