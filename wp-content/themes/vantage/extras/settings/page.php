<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div>
	<?php $theme = wp_get_theme(); ?>
	<h2 id="theme-settings-title">
		<img src="<?php echo esc_url( apply_filters('siteorigin_settings_page_icon', get_template_directory_uri() . '/extras/settings/images/icon.png' ) ) ?>">
		<?php printf(__( '%s Theme Settings', 'vantage' ), $theme->get('Name')) ?>
	</h2>

	<?php siteorigin_settings_change_message(); ?>
	
	<form action="options.php" method="post" id="siteorigin-settings-form" class="siteorigin-settings-form">
		<?php settings_fields( 'theme_settings' ); ?>
		<?php do_settings_sections( 'theme_settings' ) ?>

		<p class="submit">
			<input name="Submit" type="submit" class="button-primary siteorigin-settings-submit-button" value="<?php esc_attr_e('Save Settings', 'vantage'); ?>" id="siteorigin-settings-submit" />
			<input type="button" class="button-secondary siteorigin-settings-preview-button" value="<?php esc_attr_e('Preview', 'vantage'); ?>" id="siteorigin-settings-main-preview" />

			<a href="http://siteorigin.com/threads/theme-<?php echo get_template() ?>/" target="_blank" id="siteorigin-theme-support"><?php _e( 'Theme Support Forum', 'vantage' ) ?></a>
		</p>
		<input type="hidden" id="current-tab-field" name="theme_settings_current_tab" value="<?php echo intval( get_theme_mod('_theme_settings_current_tab', 0) ) ?>" />
	</form>


	<script id="settings-preview-modal-template" type="text/template">

		<div id="siteorigin-settings-preview-overlay"></div>

		<div id="siteorigin-settings-preview-modal">
			<iframe id="siteorigin-settings-preview-iframe" name="siteorigin-settings-preview-iframe" data-home="<?php echo esc_url( home_url() ) ?>" src="<?php echo esc_url( home_url() ) ?>"></iframe>
		</div>

		<div id="siteorigin-settings-preview-toolbar">
			<h3><?php printf(__( '%s Theme Settings Preview', 'vantage' ), $theme->get('Name')) ?></h3>
			<a class="media-modal-close siteorigin-settings-close" href="#"><span class="media-modal-icon"><span class="screen-reader-text">Close media panel</span></span></a>
		</div>

	</script>

	<?php if(has_filter('siteorigin_settings_tour_content')) : ?>
		<script id="settings-tour-modal-template" type="text/template">

			<div id="settings-tour-modal-wrapper">

				<div id="settings-tour-overlay"></div>

				<div id="settings-tour-modal">

					<div id="settings-tour-step-content">
						<div class="left-column">
							<a href="#" class="play-video"></a>
							<img src="" width="460" height="320" src="#" class="step-image" />
						</div>

						<div class="right-column">
							<div id="siteorigin-settings-tour-navigation">
								<div class="dashicons dashicons-arrow-left-alt2 tour-previous"></div>
								<div class="dashicons dashicons-arrow-right-alt2 tour-next"></div>
							</div>

							<h2 class="step-title"></h2>
							<p class="step-content"></p>

							<div class="siteorigin-settings-form">
								<table class="form-table">
									<tbody>

									</tbody>
								</table>
							</div>

							<div class="settings-form-buttons">
								<a href="#" target="_blank" class="button-secondary siteorigin-settings-tour-action"></a>
								<input type="button" class="button-secondary siteorigin-settings-preview" value="<?php esc_attr_e('Preview', 'vantage') ?>" />
								<div class="tour-next button-secondary">
									<span data-text-continue="<?php echo esc_attr('Continue', 'vantage') ?>" data-text-done="<?php echo esc_attr('Done', 'vantage') ?>"><?php _e('Continue', 'vantage') ?></span>
									<div class="dashicons dashicons-arrow-right-alt2"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>

					</div>

					<div id="settings-tour-toolbar">
						<div class="tour-progress">

							<?php
							printf(
								__('Step %s of %s', 'vantage'),
								'<span class="step"></span>',
								'<span class="step-total"></span>'
							)
							?>
						</div>

						<input type="button" class="button-primary siteorigin-settings-save" value="<?php esc_attr_e('Save Settings', 'vantage') ?>" />
						<input type="button" class="button-secondary siteorigin-settings-close" value="<?php esc_attr_e('Close', 'vantage') ?>" />
					</div>

				</div>

			</div>


		</script>
	<?php endif; ?>

</div> 