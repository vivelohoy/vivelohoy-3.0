<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'isola' ); ?></span>
		<span class="search-icon">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
			<g id="search">
				<path class="icon" d="M15.846,13.846C16.573,12.742,17,11.421,17,10c0-3.866-3.134-7-7-7s-7,3.134-7,7s3.134,7,7,7
					c1.421,0,2.742-0.427,3.846-1.154L19,21l2-2L15.846,13.846z M10,15c-2.761,0-5-2.238-5-5c0-2.761,2.239-5,5-5c2.762,0,5,2.239,5,5
					C15,12.762,12.762,15,10,15z"/>
			</g>
		</svg>
	</span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search …', 'isola' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'isola' ); ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'isola' ); ?>" />
</form>