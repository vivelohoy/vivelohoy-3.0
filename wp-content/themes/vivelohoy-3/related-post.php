<?php
global $single_id, $theme_url, $prl_data;

$categories = get_the_category();

if(!empty($categories) and is_array($categories)){
    foreach( $categories as $category) $array_ID[] = $category->cat_ID;
    $cats = implode(",", $array_ID);
}else{
    $cats = 0;
}

$rp_query = new WP_Query(array(
            'post_type' => 'post',
            'post__not_in' => array($single_id),
            'showposts' => 3,
            'cat' => $cats,
            'orderby' =>'rand'
        ));

if( $rp_query->have_posts() ):?>
<div id="related_posts" class="prl-panel">
    <h5 class="prl-block-title"><?php _e('Related Posts','presslayer'); ?></h5>
    <div class="prl-grid prl-grid-divider">
    <?php
    while ($rp_query->have_posts()) : $rp_query->the_post(); ?>
    
    <div class="prl-span-4">
        <article class="prl-article">
            <?php echo post_thumb(get_the_ID(),520, 360, true);?>
            <h3 class="prl-article-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="title" rel="bookmark"><?php the_title(); ?></a> <?php echo get_label_format(get_the_ID());?> <?php echo get_label_meta(get_the_ID());?></h3> 
            <?php if($prl_data['related_post_opt']['meta']!=0) post_meta(true,false,true,false,true);?>
            <?php if($prl_data['related_post_opt']['excerpt']!=0) {
                 echo '<p>'.text_trim(get_the_excerpt(),$prl_data['related_post_num_excerpt'],'...').'</p>';
            }?>
        </article>
        
    </div>

    <?php
    endwhile;
    ?>
    </div>
</div>
<?php endif;
wp_reset_query();
?>