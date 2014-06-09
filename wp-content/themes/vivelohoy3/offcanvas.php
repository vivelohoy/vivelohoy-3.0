<div id="offcanvas" class="prl-offcanvas">
	<div class="prl-offcanvas-bar">
		<nav class="side-nav">
		<?php
		// Mobile Menu
		if ( has_nav_menu( 'mobile_nav' ) ) :
			wp_nav_menu( array (
				'theme_location' => 'mobile_nav',
				'container' => false,
				'menu_class' => 'nav-list',
				'menu_id' => 'nav-list',
				'depth' => 2,
				'fallback_cb' => false
			 ));
		 else:
			echo '<div class="message warning"><i class="icon-warning-sign"></i>' . __( 'Define your site main menu', 'presslayer' ) . '</div>';
		 endif;
		 
		?>
		</nav>
</div></div>