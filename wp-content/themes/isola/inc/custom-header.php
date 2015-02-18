<?php
/**
 * @package Isola
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses isola_header_style()
 * @uses isola_admin_header_style()
 * @uses isola_admin_header_image()
 */
function isola_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'isola_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '777777',
		'width'                  => 2000,
		'height'                 => 500,
		'flex-height'            => true,
		'wp-head-callback'       => 'isola_header_style',
		'admin-head-callback'    => 'isola_admin_header_style',
		'admin-preview-callback' => 'isola_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'isola_custom_header_setup' );

if ( ! function_exists( 'isola_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see isola_custom_header_setup().
 */
function isola_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // isola_header_style

if ( ! function_exists( 'isola_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see isola_custom_header_setup().
 */
function isola_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			background: #efefef;
			border: none;
			font-size: 16px;
			padding: 0;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
			font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;
			font-size: 1em;
			line-height: 1.6em;
			font-weight: bold;
			letter-spacing: 1px;
			margin: 0;
			padding: 8px 5%;
			text-transform: uppercase;
		}
		#headimg h1 a {
			text-decoration: none;
		}
		#desc {
			display: none;
		}
		#headimg img {
			max-width: 100%;
			height: auto;
		}
	</style>
<?php
}
endif; // isola_admin_header_style

if ( ! function_exists( 'isola_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see isola_custom_header_setup().
 */
function isola_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
			<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
	</div>
<?php
}
endif; // isola_admin_header_image
