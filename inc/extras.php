<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Strip
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes group-blog.
 * @return array
 */
function strip_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'strip_body_classes' );

/**
 * Disable emojis introduced in WordPress 4.2.
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
} add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins disable_emojis_tinymce.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} return array();
}
	/**
	 * Remove emoji CDN hostname from DNS prefetching hints.
	 *
	 * @param array  $urls URLs to print for resource hints.
	 * @param string $relation_type The relation type the URLs are printed for.
	 * @return array Difference betwen the two arrays.
	 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' !== $relation_type ) { /** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
	return $urls; }

	/**
	 * Clean wp_head, remove queries.
	 *
	 * @since    1.1.3
	 * @link: http://cubiq.org/clean-up-and-optimize-wordpress-for-your-next-theme
	 */
			remove_action( 'wp_head', 'wp_generator' );					// WP Version.
			remove_action( 'wp_head', 'wlwmanifest_link' );
			remove_action( 'wp_head', 'rsd_link' );
			remove_action( 'wp_head', 'rel_canonical', 10, 0 );
			remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

			remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );// Parent rel link.
			remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );	// Start post rel link.
			remove_action( 'wp_head', 'index_rel_link' );

			remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Adjacent post rel link.

			add_filter( 'the_generator', '__return_false' );

			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
	/**
	 * Cleanup head remove rss version
	 *
	 * @since    1.1.3
	 */
function strip_remove_rss_version() {
	return '';
}
	/**
	 * Cleanup head remove X-Pingback
	 *
	 * @param array $headers remove x pingback.
	 * @since    1.1.3
	 */
function strip_remove_x_pingback( $headers ) {
	unset( $headers['X-Pingback'] );
	return $headers;
}

	/**
	 * Cleanup head remove inline CSS comments
	 *
	 * @since    1.1.3
	 */
function strip_remove_comments_inline_styles() {
	global $wp_widget_factory;
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}

	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
