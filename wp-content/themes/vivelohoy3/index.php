<?php get_header();?>
<div class="prl-container">
    <div class="prl-grid prl-grid-divider">
		<section id="main" class="prl-span-9">
		
		<?php if(is_category() && isset($prl_data['banner_top_cat']) && $prl_data['banner_top_cat']!='') echo '<div class="ads_top hide-tablet">'.stripslashes($prl_data['banner_top_cat']).'</div>';?>
		 
		<?php
		$archive_style = $prl_data['archive_style'];
		if(is_category()) {
			$queried_object = get_queried_object();
			$term_id = $queried_object->term_id;
			$cat_meta =  get_option( "tax_".$term_id);
			if($cat_meta['cat_style']!='default' && $cat_meta['cat_style']!='') $archive_style = $cat_meta['cat_style'];
			else $archive_style = $prl_data['archive_style']; 
		}

		switch($archive_style){
			case 'list':
				$content = 'content-archive';
			break;
			case '2col':
				$content = 'content-archive-2';
			break;
			case '3col':
				$content = 'content-archive-3';
			break;
			default :
				$content = 'loop-entry';
			break;
		}
		get_template_part($content,'index');?>
		
		<?php if(is_category() && isset($prl_data['banner_bot_cat']) && $prl_data['banner_bot_cat']!='') echo '<div class="ads_bottom prl-panel hide-tablet">'.stripslashes($prl_data['banner_bot_cat']).'</div>';?>
		
		</section>
        <aside id="sidebar" class="prl-span-3">
            <?php get_sidebar();?>
        </aside>
    </div><!--.prl-grid-->
</div>
<?php get_footer();?>       
        