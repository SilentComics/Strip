<?php
/**
 * Custom Header implementation
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage strip
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses strip_header_style()
 * @uses strip_admin_header_style()
 * @uses strip_admin_header_image()
 *
 * @package strip
 */
function strip_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'strip_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/assets/images/Default-header.png',
		'default-text-color'     => '000',
		'flex-width'             => true,
		'width'                  => 1920,
		'height'                 => 320,
		'flex-height'            => true,
		'wp-head-callback'       => 'strip_header_style',
		'admin-head-callback'    => 'strip_admin_header_style',
			'admin-preview-callback' => 'strip_admin_header_image',
	) ) );
	/**
 * Register default header image
 */
	register_default_headers( array(
		'DefaultHeader' => array(
		'url'  			=> get_template_directory_uri() . '/assets/images/Default-header.png',
		'thumbnail_url' => get_template_directory_uri() . '/assets/images/Default-header.png',
		'description'   => _x( 'DefaultHeader', 'header image description', 'strip' ),
		),
		)
	);

}

add_action( 'after_setup_theme', 'strip_custom_header_setup' );

if ( ! function_exists( 'strip_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @see strip_custom_header_setup().
	 */
	function strip_header_style() {

			/* Header text color. */
		  $header_text_color = get_header_textcolor();

			/* Header image. */
		$header_image = esc_url( get_header_image() );

		/* Start header styles. */
		$style = '';

		/* When to show header image. */
		$min_width = absint( apply_filters( 'strip_header_bg_show', 1 ) );

		/* Background arguments. */
		$background_arguments = esc_attr( apply_filters( 'strip_header_bg_arguments', 'no-repeat 50% 50%' ) );

		if ( ! empty( $header_image ) ) {
			$style .= "@media screen and (min-width: {$min_width}px) { body.custom-header-image .site-header { background: url({$header_image}) {$background_arguments}; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; } }";
		}

		/* Site title styles. */
		if ( display_header_text() ) {
			$style .= ".site-title, .site-title a, .site-description, .site-description a { color: #{$header_text_color} }";
			$style .= ".site-title { border-color: #{$header_text_color} }";
		}

		if ( ! display_header_text() ) {
			$style .= '.site-title, .site-title a, .site-description, .site-description a { clip: rect(1px, 1px, 1px, 1px); position: absolute; }';
		}

		/* Echo styles if it's not empty. */
		if ( ! empty( $style ) ) {
			echo "\n" . '<style type="text/css" id="custom-header-css">' . esc_attr( trim( $style ) ) . '</style>' . "\n";
		}

	}
endif; // strip_header_style.
