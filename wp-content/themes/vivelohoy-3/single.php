<?php get_header();?>    
<div class="prl-container">
    <div class="prl-grid prl-grid-divider">
        <section id="main" class="prl-span-9">
		   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		   <article id="post-<?php the_ID(); ?>" <?php post_class('article-single'); ?>> 
			   <?php if(isset($prl_data['banner_before_single_title']) && $prl_data['banner_before_single_title']!='') echo '<div class="ads_top hide-tablet">'.stripslashes($prl_data['banner_before_single_title']).'</div>';?>
			   <h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			   <hr class="prl-grid-divider">
			   <div class="prl-grid">
					<div class="prl-span-9 prl-span-flip">
						<div class="prl-entry-content clearfix">
							<?php if( has_post_thumbnail() && get_post_meta($post->ID, 'pl_post_thumb', true)!='Disable') : ?>
								<div class="single-post-thumbnail space-bot">
									<?php 
									the_post_thumbnail(''); 
									$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full-size'); // For pinterest sharing
									?>
								</div>
							<?php endif; ?>
						   <?php if($prl_data['show_excerpt']=='Enable') {?><strong><?php the_excerpt(); ?></strong><?php }?>
						   <?php the_content(); ?>
						   <?php wp_link_pages(array('before' => __('Pages','presslayer').': ', 'next_or_number' => 'number')); ?>
						   <?php edit_post_link(__('Edit','presslayer'),'<p>','</p>'); ?>
						   
						   <?php if(isset($prl_data['banner_after_single_content']) && $prl_data['banner_after_single_content']!='') echo '<div class="hide-mobile"><center>'.stripslashes($prl_data['banner_after_single_content']).'</center></div>';?>
			
						</div> <!-- .prl-entry-content -->
					</div>
					
					<div class="prl-span-3 prl-entry-meta">
						<?php post_meta();
						
						//Rating
						$enable = get_post_meta($post->ID, 'pl_enable_review', true);
	
						if($enable == 'on'){ ?>
							
							
							<?php
							$total_score = 0;
							$count = 0;
							$bar_str = '';
							for($i=1;$i<=5;$i++){
								$score = get_post_meta($post->ID, 'pl_critera_'.$i.'_score', true);
								if($score>0){
									$percent = ($score/5)*100;
									$bar_str .= '<strong>'.get_post_meta($post->ID, 'pl_critera_'.$i, true).'</strong>';
									$bar_str .= '<div class="prl-progress prl-progress-mini"><div class="prl-progress-bar" style="width: '.$percent.'%;"></div></div>';
									$count++;
									$total_score += $score;
								}
							}
						if($count>0){?>
						
						<hr class="prl-article-divider">					
						<p><strong><?php _e('Editor review','presslayer');?></strong></p>

						<?php
							$overall_score = round($total_score/$count,1);
							$overall_label = '';
							if($overall_score < 2) $overall_label = __('Bad','presslayer');
							else if($overall_score >= 2 & $overall_score <= 3) $overall_label = __('Normal','presslayer');
							else if($overall_score > 3 & $overall_score <= 4) $overall_label = __('Good','presslayer');
							else if($overall_score > 4 && $overall_score < 4.5) $overall_label = __('Very Good','presslayer');
							elseif($overall_score >= 4.5)  $overall_label = __('Excellent','presslayer');
							?>
							
							<p class="prl-post-rating ">
								<?php 
								$insert_half = 0;
								$insert_half = ceil($overall_score);
								for($i=1;$i<=5;$i++){
									if($i<=$overall_score){
										echo '<i class="fa fa-star"></i> ';
									}else if($i == $insert_half){
										echo '<i class="fa fa-star-half-o"></i> ';
									}else{
										echo '<i class="fa fa-star-o"></i> ';
									}
								 };
								 ?>
							
							</p>
							<p><?php echo $overall_label;?>: <?php echo $overall_score;?>/5</p>
							
							<?php echo $bar_str; ?>
							<?php
							$title = get_the_title();
							$author=  get_the_author();
							$p = get_post( get_the_ID() );
							$excerpt = ( $p->post_excerpt ) ? $p->post_excerpt :  wp_trim_words($p->post_content, 40 );
							?>
							<div class="schema-microdata">
								<div itemscope itemtype="http://schema.org/Review">
									<meta itemprop="name" content="<?php echo esc_attr($title); ?>">
									<meta itemprop="description" content="<?php echo esc_attr($excerpt); ?>">
									<meta itemprop="reviewBody" content="<?php echo esc_attr($excerpt); ?>">
									<div itemprop="author" itemscope itemtype="http://schema.org/Person">
										 <meta itemprop="name" content="<?php echo esc_html($author); ?>">
									</div>
									<div itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing">	
										<meta itemprop="name" content="<?php echo esc_attr($title); ?>">
									</div>
								   <meta itemprop="datePublished" content="<?php the_time('Y-m-d\TH:i:sP');?>">
									<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
										
										<meta itemprop="worstRating" content="0">
										<meta itemprop="ratingValue" content="<?php echo $overall_score; ?>">
										<meta itemprop="bestRating" content="5">
											
									</div>
								</div>
						   </div>
						
						<?php 
							} 
						}

						?>

						<hr class="prl-article-divider">
						<?php social_share();?>
						<?php the_tags( '<hr class="prl-article-divider"><p class="prl-article-tags"><strong>'. __('Tags','presslayer') . '</strong>: ', ', ', '</p>'); ?>
						
						<?php if(isset($prl_data['next_previous']) && $prl_data['next_previous']!='Disable'):?>
						<hr class="prl-article-divider">
						<ul class="prl-list prl-list-line no-bullet next_previous">
						<?php next_post_link('<li><strong>Next</strong>: %link</li> '); ?> 
						<?php previous_post_link('<li><strong>Previous</strong>: %link</li>'); ?> 
						</ul> 
						<?php endif;?>
					</div>
			   
			   </div> <!-- .prl-grid -->
			  
		   </article>
		  
		   <?php endwhile; endif; ?>
		   
		   <?php if($prl_data['post_author']!='Disable'):?>		   
		   <div id="article_author" class="prl-article-author clearfix">
		   		<hr class="prl-grid-divider">
		   		<span class="author-avatar"><?php echo get_avatar(get_the_author_meta('email'), '100'); ?></span>
				<div class="author-info">
					<h4><?php _e('About the author', 'presslayer'); ?>:  <?php the_author_posts_link(); ?></h4>
					<p><?php the_author_meta("description"); ?></p>
				</div>
			</div>
			<?php endif;?>
			
			<?php
			$single_id = $post->ID;
			if(get_post_meta($post->ID, 'pl_related', true)=='default' or get_post_meta($post->ID, 'pl_related', true)==''){
				$related = $prl_data['related_post'];
			}else{
				$related = get_post_meta($post->ID, 'pl_related', true);
			}
			if($related!='Disable') get_template_part( 'related-post');
			?>
			
		   <?php comments_template(); ?>
		   
		  
        </section>

        <aside id="sidebar" class="prl-span-3">
            <?php get_sidebar('single');?>
        </aside>
    </div>
</div>


<?php get_footer();?>       
        