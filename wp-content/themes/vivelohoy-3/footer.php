<?php global $theme_url, $prl_data;?>
	<footer id="footer">
		<?php if($prl_data['footer_widget']!='Disable'):?>
		<div class="footer-widget">
			<div class="prl-container">
				<div class="prl-grid prl-grid-divider">
					<?php for($i=1;$i<=4;$i++){?>
					<div class="prl-span-3">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_'.$i) ) : ?><?php endif; ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php endif;?>
		<div class="copyright">
			<div class="prl-container">
				<div class="left">
					&copy; <?php echo date('Y');?> <?php _e('by','presslayer');?> <a href="<?php echo home_url();?>"><?php bloginfo('name');?></a> -  <?php bloginfo('description');?>
				</div>
				<div class="right"><?php echo trim($prl_data['footer_text']);?></div>
			</div>
		</div><!-- .copyright -->
		
	</footer><!-- #footer -->
	
</div><!-- .site-wrapper -->
	<?php if($prl_data['switcher']=='Enable') include ('_switcher/index.php');?>  
	<a id="toTop" href="#"><i class="fa fa-long-arrow-up"></i></a>
	<?php wp_footer();?>
	<?php echo stripslashes($prl_data['google_analytics']); ?>
	</body>
</html>