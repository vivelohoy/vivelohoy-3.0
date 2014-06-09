<?php get_header();?>
<div class="prl-container">
    <div class="prl-grid prl-grid-divider">
		<section id="main" class="prl-span-9"> 
			<h1><?php _e('We\'re sorry!','presslayer');?></h1>
			<h4><?php _e('The page you have requested cannot be found','presslayer');?>.</h4>
			<p><?php _e('Maybe the page was moved or deleted, or perhaps you just mistyped the address','presslayer');?>.</p>
			<p><?php _e('Why not try and find your way using the navigation bar above or click on the logo to return to our home page','presslayer');?>.</p> 
		</section>
        <aside id="sidebar" class="prl-span-3">
            <?php get_sidebar();?>
        </aside>
    </div><!--.prl-grid-->
</div>
<?php get_footer();?>       

