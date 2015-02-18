<?php
/**
 * WordPress.com-specific functions and definitions
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package Isola
 */

function isola_theme_colors() {
	global $themecolors;

	/**
	 * Set a default theme color array for WP.com.
	 *
	 * @global array $themecolors
	 */
	if ( ! isset( $themecolors ) ) :
		$themecolors = array(
			'bg' => 'ffffff',
			'border' => 'efefef',
			'text' => '333333',
			'link' => '777777',
			'url' => '777777',
		);
	endif;
}
add_action( 'after_setup_theme', 'isola_theme_colors' );

//WordPress.com specific styles
function isola_wpcom_styles() {
	wp_enqueue_style( 'isola-wpcom', get_template_directory_uri() . '/inc/style-wpcom.css', '061714' );
}
add_action( 'wp_enqueue_scripts', 'isola_wpcom_styles' );

/**
 * Adds support for WP.com print styles and responsive videos
 */
function isola_theme_support() {
	add_theme_support( 'print-style' );
}
add_action( 'after_setup_theme', 'isola_theme_support' );

/*
 * De-queue Google fonts if custom fonts are being used instead
 */
function isola_dequeue_fonts() {
	if ( class_exists( 'TypekitData' ) && class_exists( 'CustomDesign' ) && CustomDesign::is_upgrade_active() ) {
		$customfonts = TypekitData::get( 'families' );
		if ( $customfonts && $customfonts['site-title']['id'] && $customfonts['headings']['id'] && $customfonts['body-text']['id'] ) {
			wp_dequeue_style( 'isola-source-sans-pro' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'isola_dequeue_fonts' );
