<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package SilentComics
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses silentcomics_header_style()
 * @uses silentcomics_admin_header_style()
 * @uses silentcomics_admin_header_image()
 *
 * @package SilentComics
 */
function silentcomics_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'silentcomics_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/library/images/fuct.png',
		'header-text'  			 => true,
		'default-text-color'     => '000',
		'flex-width'   			 => true,
		'width'                  => 2048,
		'height'                 => 600,
		'flex-height'            => true,
		'wp-head-callback'       => 'silentcomics_header_style',
		'admin-head-callback'    => 'silentcomics_admin_header_style',
		'admin-preview-callback' => 'silentcomics_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'silentcomics_custom_header_setup' );

if ( ! function_exists( 'silentcomics_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see silentcomics_custom_header_setup().
 */
function silentcomics_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color )
		return;

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
		.header-image {
			margin-bottom: 0;
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
endif; // silentcomics_header_style

if ( ! function_exists( 'silentcomics_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see silentcomics_custom_header_setup().
 */
function silentcomics_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
		text-align: center;
	}
	<?php if ( ! display_header_text() ) : ?>
	#headimg h1,
	#desc {
		display: none;
	}
	<?php endif; ?>
	#headimg h1 {
		font: 700 2.4rem/1.4166666666 Futura, "Trebuchet MS", Arial, sans-serif;
		letter-spacing: 0.1em;
		margin: 0;
		text-transform: uppercase;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#desc {
		font: italic 400 14px/2.4285714285 'Fenix', Georgia, serif;
	}
	#headimg img {
		margin-bottom: 0px;
	}
	#headimg img[src*=""] {
		border-radius: 50px;
	}
	</style>
<?php
}
endif; // silentcomics_admin_header_style

if ( ! function_exists( 'silentcomics_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see silentcomics_custom_header_setup().
 */
function silentcomics_admin_header_image() {
	$style        = sprintf( ' style="color:#%s;"', get_header_textcolor() );
	$header_image = get_header_image();
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // silentcomics_admin_header_image