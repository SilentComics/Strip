<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package WordPress
 * @subpackage Strip
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function strip_infinite_scroll_setup() {
	add_theme_support('infinite-scroll', array(
		'container'      => 'content',
		'footer'         => 'page',
		'type'           => 'scroll',
		'footer_widgets' => false,
		'container'      => 'content',
		'wrapper'        => true,
		'render'         => false,
		'posts_per_page' => false,
	));
}
add_action( 'after_setup_theme', 'strip_infinite_scroll_setup' );

/**
 * Enables Jetpack's Infinite Scroll for home (blog)
 *
 * @return bool
 * https://wordpress.org/support/topic/suppress-infinite-blog-with-woocommerce
 */
function strip_jetpack_infinite_scroll_supported() {
	return current_theme_supports( 'infinite-scroll' ) && ( is_admin() || is_home() || is_search() );
}
add_filter( 'infinite_scroll_archive_supported', 'strip_jetpack_infinite_scroll_supported' );
