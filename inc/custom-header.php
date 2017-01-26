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
}
add_action( 'after_setup_theme', 'strip_custom_header_setup' );

if ( ! function_exists( 'strip_header_style' ) ) :

	/**
* Register default header image
*/
	register_default_headers( array(
		'DefaultHeader' => array(
		'url'  			=> get_template_directory_uri() . '/assets/images/Default-header.png',
		'thumbnail_url' => get_template_directory_uri() . '/assets/images/Default-header.png',
		'description'   => _x( 'DefaultHeader', 'header image description', 'strip' ),
		),
	));
	/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @see strip_custom_header_setup().
	 */
	function strip_header_style() {
		$header_text_color = get_header_textcolor();

		// If no custom options for text are set, let's bail
		// get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}
		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		return;
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
		.site-title {
			border-color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>

	</style>
	<?php
	}
endif; // strip_header_style.

if ( ! function_exists( 'strip_admin_header_style' ) ) :
	/**
	 * Styles the header image displayed on the Appearance > Header admin panel.
	 *
	 * @see strip_custom_header_setup().
	 */
	function strip_admin_header_style() {
		?>
		<style type="text/css">
		.appearance_page_custom-header #headimg {
		border: none; }
		#headimg h1,
		#desc { }

		#headimg h1 {
		font: 700 2.4rem/1.4166666666 Futura, "Trebuchet MS", Arial, sans-serif;
		text-align: center;
		text-transform: uppercase; }

		#headimg h1 a {
		border: 6px solid #424242;
		font-size: 1.2em;
		letter-spacing: 0.1em;
		line-height: 1.24;
		padding: 0 .76em; }

		#desc { }
		#headimg img { }
		</style>
		<?php
	}
endif; // strip_admin_header_style.

if ( ! function_exists( 'strip_admin_header_image' ) ) :
	/**
	 * Custom header image markup displayed on the Appearance > Header admin panel.
	 *
	 * @see strip_custom_header_setup().
	 */
	function strip_admin_header_image() {
		$style        = sprintf( ' style="color:#%s;"', get_header_textcolor() );
		?>
		<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo esc_attr( $style ); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo esc_attr( $style ); ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div><!-- #headimg -->
	<?php
	}
endif; // strip_admin_header_image.
