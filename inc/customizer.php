<?php
/**
 * SilentComics Theme Customizer
 *
 * @package WordPress
 * @subpackage SilentComics
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function silentcomics_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')        ->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription') ->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
    $wp_customize->get_setting('background_image')->transport = 'postMessage';
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_title_color', array(
		'label'   => esc_html_x( 'Content Title Color', 'admin', 'silentcomics' ),
		'section' => 'colors',
	) ) );
}
add_action('customize_register', 'silentcomics_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function silentcomics_customize_preview_js()
{
    wp_enqueue_script('silentcomics_customizer', get_template_directory_uri() . '/js/min/customizer-min.js', array( 'customize-preview' ), '20130508', true);
}
add_action('customize_preview_init', 'silentcomics_customize_preview_js');
