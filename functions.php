<?php
/**
 * Strip functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Strip
 */

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 1920;
} /* pixels */

if ( ! function_exists( 'strip_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function strip_setup() {
		/**
* Remove some default WordPress dashboard widgets
* an example custom dashboard widget
* adding custom login css
* changing text in footer of admin
*/
		require_once( 'assets/admin.php' );
		/**
* Make theme available for translation
* Translations can be filed in the /languages/ directory
* If you're building a theme based on strip, use a find and replace
* to change 'strip' to the name of your theme in all the template files
*/
		load_theme_textdomain( 'strip', get_template_directory() . '/languages' );

		/**
* Add default posts and comments RSS feed links to head
*/
		add_theme_support( 'automatic-feed-links' );

		/**
* Enable support for title-tag. Allows themes to add document title tag to HTML <head> (since version 4.1.).
*/
		add_theme_support( 'title-tag' );

		/**
* Enable support for custom logo.
*
* @since strip 1.0
*/
		add_theme_support( 'custom-logo', array(
			'height'      => 156,
			'width'       => 312,
			'flex-height' => true,
			'flex-width'  => true,
			)
		);

		/**
* Enable support for Post Thumbnails on posts and pages
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1920, 0 ); // was using add_image_size.
		add_image_size( 'thumbnail', 312, 156, true ); // cropped.

		/**
		 * See https://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
		 * http://codex.wordpress.org/Function_Reference/wpautop gets the same result but also removes line blocks: remove_filter( 'the_content', 'wpautop' );
		 *
		 * @param $strings $content filter_ptags_on_images.
		 */
		function filter_ptags_on_images( $content ) {
			return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
		}
		add_filter( 'the_content', 'filter_ptags_on_images' );

		/**
	 	* This theme uses wp_nav_menu() in one location.
	 	*/
		register_nav_menus(array(
			'primary' => __( 'Primary Menu', 'strip' ),
		));

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
	 * Enable support for Post Formats
	 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		// Setup the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('strip_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));
	}

	/**
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, icons, and column width.
	*/
	add_editor_style( array( '/assets/css/editor-style.css', '/assets/fonts/fenix.css' ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	// See https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/ for detail.
	add_theme_support( 'customize-selective-refresh-widgets' );
endif; // strip_setup.
add_action( 'after_setup_theme', 'strip_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function strip_widgets_init() {
	register_sidebar(array(
		'name'          => __( 'Main Sidebar', 'strip' ),
		'id'            => 'sidebar',
		'description'   => __( 'The main body widget area', 'strip' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	// First footer widget area, located in the footer. Empty by default.
	register_sidebar( array(
		'name'          => __( 'First Footer Widget', 'strip' ),
		'id'            => 'first-footer-widget',
		'description'   => __( 'The first footer widget', 'strip' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	// Second Footer Widget Area, located in the footer. Empty by default.
	register_sidebar(array(
		'name'          => __( 'Second Footer Widget', 'strip' ),
		'id'            => 'second-footer-widget',
		'description'   => __( 'The second footer widget', 'strip' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	// Third Footer Widget Area, located in the footer. Empty by default.
	register_sidebar(array(
		'name'          => __( 'Third Footer Widget', 'strip' ),
		'id'            => 'third-footer-widget',
		'description'   => __( 'The third footer widget', 'strip' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	// Fourth Footer Widget Area, located in the footer. Empty by default.
	register_sidebar(array(
		'name'           => __( 'Fourth Footer Widget', 'strip' ),
		'id'             => 'fourth-footer-widget',
		'description'    => __( 'The fourth footer widget', 'strip' ),
		'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h3 class="widget-title">',
		'after_title'    => '</h3>',
	));

}
add_action( 'widgets_init', 'strip_widgets_init' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Strip 1.0
 */
function strip_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'strip_javascript_detection', 0 );

/**
 * Enqueue_styles for custom fonts.
 */
function strip_scripts() {
	// add custom font here if any.
	wp_enqueue_style( 'fenix', get_template_directory_uri() . '/assets/fonts/fenix.css', array(), null );

	wp_enqueue_style( 'inconsolata', get_template_directory_uri() . '/assets/fonts/inconsolata.css', array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'strip-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet. Conditional stylesheet — tested and works with IE9 on Windows7.
	wp_enqueue_style( 'strip-ie', get_template_directory_uri() . 'assets/css/ie.css', array( 'strip-style' ), '20160305' );
	wp_style_add_data( 'strip-ie', 'conditional', 'lt IE 10' );

	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script( 'strip-navigation', get_template_directory_uri() . '/assets/js/min/navigation-min.js', array(), '20120206', true );
	}

	// Load the html5 shiv.
	wp_enqueue_script( 'strip-html5', get_template_directory_uri() . '/assets/js/min/html5-min.js', array(), '3.7.3' );
	wp_script_add_data( 'strip-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'strip-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/min/skip-link-focus-fix-min.js', array(), '20130115', true );

	// toggle comments js.
	wp_enqueue_script( 'strip-toggle-comments', get_template_directory_uri() . '/assets/js/min/toggle-comments-min.js', array( 'jquery' ), '20160401', false );

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );

		if ( is_single() && wp_attachment_is_image() ) {
			wp_enqueue_script( 'strip-keyboard-image-navigation', get_template_directory_uri() . '/assets/js/min/keyboard-image-navigation-min.js', array( 'jquery' ), '20120202' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'strip_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Get the first image in a post. Strip Version. Retrieve the first image from each post and resize.
 *
 * @param string $size get the first image size.
 * @link https://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/
 * see https://gist.github.com/SilentComics/0a7ea47942eb759dbb48eac2b7be1bbc
 */
function get_first_image( $size = 'thumbnail' ) {
	global $post, $posts;
	$first_img = '';
	preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', do_shortcode( $post->post_content, 'gallery' ), $matches );
	  $first_img = isset( $matches[1][0] ) ? $matches[1][0] : null;

	if ( empty( $first_img ) ) {
			return get_template_directory_uri() . '/assets/images/empty.png'; // path to default image.
	}

	// Now we have the $first_img but we want the thumbnail of that image.
	 $explode = explode( '.', $first_img );
	 $count = count( $explode );
	 $size = '-624x312'; // Our panel ratio (2:1) 312x156 for lighther page, 624x312 for retina; use add_image_size() and Force Regenerate Thumbnails plugin when changing sizes.
	 $explode[ $count -2 ] = $explode[ $count -2 ] . '' . $size;
	 $thumb_img = implode( '.', $explode );
	 return $thumb_img;
}
	add_filter( 'get_first_image', 'thumbnail' );

/**
 * Register Custom Post Type for comics
 */
function comic_post_type() {

	$labels = array(
		'name'                       => _x( 'Comics', 'Post Type General Name', 'strip' ),
		'singular_name'              => _x( 'Comic', 'Post Type Singular Name', 'strip' ),
		'menu_name'                  => _x( 'Comics', 'admin menu', 'strip' ),
		'name_admin_bar'             => _x( 'Comic', 'add new on admin bar', 'strip' ),
		'parent_item_colon'	         => __( 'Parent Comic:', 'strip' ),
		'all_items'                  => __( 'All Comics', 'strip' ),
		'add_new_item'               => __( 'Add New Comic', 'strip' ),
		'add_new'                    => __( 'Add New Comic', 'strip' ),
		'new_item'                   => __( 'New Comic', 'strip' ),
		'edit_item'                  => __( 'Edit Comic', 'strip' ),
		'update_item'                => __( 'Update Comic', 'strip' ),
		'view_item'                  => __( 'View Comic', 'strip' ),
		'search_items'               => __( 'Search Item', 'strip' ),
		'not_found'                  => __( 'No Comics found', 'strip' ),
		'not_found_in_trash'         => __( 'No Comics found in Trash', 'strip' ),
		'items_list'                 => __( 'Comics list', 'strip' ),
		'items_list_navigation'      => __( 'Comics list navigation', 'strip' ),
		'filter_items_list'          => __( 'Filter Comics list', 'strip' ),
	);

	$supports = array(
	'title',
	'editor',
	'excerpt',
	'trackbacks',
	'custom-fields',
	'comments',
	'revisions',
	'thumbnail',
	'author',
	'archive',
	);

	$args = array(
		'label'                      => __( 'Comic', 'strip' ),
		'description'                => __( 'Publish Comics and Webcomics', 'strip' ),
		'labels'                     => $labels,
		'supports'                   => $supports,
		'taxonomies'                 => array( 'story', 'story_term', 'draft' ),
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_in_menu'               => true,
		'menu_position'              => 20,
		'menu_icon'                  => 'dashicons-book-alt',
		'show_in_admin_bar'	         => true,
		'show_in_nav_menus'	         => true,
		'can_export'                 => true,
		'has_archive'                => true,
		'feeds'                      => true,
		'exclude_from_search'        => false,
		'rewrite'                    => array( 'slug' => 'stories', 'with_front' => true ),
		'publicly_queryable'	     => true,
		'capability_type'            => 'post',
	);
	register_post_type( 'comic', $args );
}

// Hook into the 'init' action.
add_action( 'init', 'comic_post_type', 0 ); // End of register_cpt_comic().

	/**
	 * Register Custom Taxonomy 'story'
	 */
function comic_story_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Comic Story', 'Taxonomy General Name', 'strip' ),
		'singular_name'              => _x( 'Comic Story', 'Taxonomy Singular Name', 'strip' ),
		'menu_name'                  => __( 'Comic Stories', 'strip' ),
		'all_items'                  => __( 'All Comic Stories', 'strip' ),
		'parent_item'                => __( 'Parent Story', 'strip' ),
		'parent_item_colon'          => __( 'Parent Story:', 'strip' ),
		'new_item_name'              => __( 'New Comic Story', 'strip' ),
		'add_new_item'               => __( 'Add New Story', 'strip' ),
		'edit_item'                  => __( 'Edit Story', 'strip' ),
		'update_item'                => __( 'Update Story', 'strip' ),
		'view_item'                  => __( 'View Item', 'strip' ),
		'separate_items_with_commas' => __( 'Separate stories with commas', 'strip' ),
		'add_or_remove_items'        => __( 'Add or Remove Stories', 'strip' ),
		'choose_from_most_used'      => __( 'Choose from the most used stories', 'strip' ),
		'popular_items'              => __( 'Popular comic stories', 'strip' ),
		'search_items'               => __( 'Search Stories', 'strip' ),
		'not_found'                  => __( 'No comic Stories found', 'strip' ),
		'items_list'                 => __( 'Comic Stories list', 'strip' ),
		'items_list_navigation'      => __( 'Comic Stories list navigation', 'strip' ),
	);
	$args = array(
		'labels'                     => $labels,
		'label'                      => 'Stories',
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'	                 => true,
		'rewrite'                    => array( 'slug' => 'story' ),
	);
	register_taxonomy( 'story', array( 'comic' ), $args );
	register_taxonomy_for_object_type( 'story', 'comic' );
}

// Hook into the 'init' action.
add_action( 'init', 'comic_story_taxonomy', 0 );

/**
 * Function strip rewrite rules.
 */
function strip_rewrite_rules() {
	flush_rewrite_rules();
}
/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'strip_rewrite_rules' );

// Add Print taxonomy, NOT hierarchical (like tags)
// Register Custom Taxonomy.
	$labels = array(
		'name'                       => _x( 'Prints', 'Taxonomy General Name', 'strip' ),
		'singular_name'              => _x( 'Print', 'Taxonomy Singular Name', 'strip' ),
		'menu_name'                  => __( 'Print', 'strip' ),
		'all_items'                  => __( 'All Prints', 'strip' ),
		'parent_item'                => __( 'Parent Print', 'strip' ),
		'parent_item_colon'          => __( 'Parent Print:', 'strip' ),
		'new_item_name'              => __( 'New Print Name', 'strip' ),
		'add_new_item'               => __( 'Add New Print', 'strip' ),
		'edit_item'                  => __( 'Edit Print', 'strip' ),
		'update_item'                => __( 'Update Pring', 'strip' ),
		'view_item'                  => __( 'View Print', 'strip' ),
		'separate_items_with_commas' => __( 'Separate prints with commas', 'strip' ),
		'add_or_remove_items'        => __( 'Add or remove prints', 'strip' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'strip' ),
		'popular_items'              => __( 'Popular Prints', 'strip' ),
		'search_items'               => __( 'Search Prints', 'strip' ),
		'not_found'                  => __( 'Not Found', 'strip' ),
		'no_terms'                   => __( 'No prints', 'strip' ),
		'items_list'                 => __( 'Prints list', 'strip' ),
		'items_list_navigation'      => __( 'Prints list navigation', 'strip' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'print', array( 'comic' ), $args );

	/*
	* WooCommerce Hooks
	* Layout
	*/
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

	add_action( 'woocommerce_before_main_content', 'strip_wrapper_start', 10 );
	add_action( 'woocommerce_after_main_content', 'strip_wrapper_end', 10 );

		 /**
		  * WooCommerce wrapper
		  */
	function strip_wrapper_start() {
		echo '<section id="content" class="woocommerce-content" role="main"><div class="entry-wrap wrap clear">';
	}

	/**
	 * End WooCommerce wrapper
	 */
	function strip_wrapper_end() {
		echo '</section>';
	}

	add_action( 'after_setup_theme', 'woocommerce_support' );
	/**
	 * Add WooCommerce support
	 * https://docs.woothemes.com/document/third-party-custom-theme-compatibility/*
	 */
	function woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}

	/**
	 * Enqueue the theme's own style for WooCommerce.
	 */
	function wp_enqueue_woocommerce_style() {

			wp_register_style( 'strip-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce-min.css' );
		if ( class_exists( 'woocommerce' ) ) {
			wp_enqueue_style( 'strip-woocommerce' );
		}
	}

	add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );

	/**
* Optimize WooCommerce Scripts
* Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
*
* @link http://gregrickaby.com/remove-woocommerce-styles-and-scripts/
* @link https://wordimpress.com/how-to-load-woocommerce-scripts-and-styles-only-in-shop/
* @link https://gist.github.com/DevinWalker/7621777
* @link http://dessky.com/blog/disable-woocommerce-scripts-and-styles/
*/
	add_action( 'wp_enqueue_scripts', 'strip_manage_woocommerce_styles', 99 );

	/**
	 * Remove some WooCommerce queries.
	 */
	function strip_manage_woocommerce_styles() {
		// remove generator meta tag.
		remove_action( 'wp_head', array( 'woocommerce', 'generator' ) ); // this line when used with $GLOBALS['woocommerce'] prompts an error when Woo is deactivated though.
		// first check that woo exists to prevent fatal errors.
		if ( function_exists( 'is_woocommerce' ) ) {
			// dequeue scripts and styles, unless we're in the store.
			if ( ! is_woocommerce() && ! is_page( 'store' ) && ! is_shop() && ! is_product_category() && ! is_product() && ! is_cart() && ! is_checkout() ) {
				wp_dequeue_style( 'woocommerce_frontend_styles' );
				wp_dequeue_style( 'woocommerce-general' );
				wp_dequeue_style( 'woocommerce-layout' );
				wp_dequeue_style( 'woocommerce-smallscreen' );
				wp_dequeue_style( 'woocommerce_fancybox_styles' );
				wp_dequeue_style( 'woocommerce_chosen_styles' );
				wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
				wp_dequeue_style( 'select2' );
				wp_dequeue_style( 'strip-woocommerce' ); // the theme's CSS overwrite.
				wp_dequeue_script( 'wc-add-payment-method' );
				wp_dequeue_script( 'wc-lost-password' );
				wp_dequeue_script( 'wc_price_slider' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-add-to-cart' );
				wp_dequeue_script( 'wc-cart-fragments' );
				wp_dequeue_script( 'wc-credit-card-form' );
				wp_dequeue_script( 'wc-checkout' );
				wp_dequeue_script( 'wc-add-to-cart-variation' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-cart' );
				wp_dequeue_script( 'wc-chosen' );
				wp_dequeue_script( 'woocommerce' );
				wp_dequeue_script( 'jquery-cookie' );
				wp_dequeue_script( 'prettyPhoto' );
				wp_dequeue_script( 'prettyPhoto-init' );
				wp_dequeue_script( 'jquery-blockui' );
				wp_dequeue_script( 'jquery-placeholder' );
				wp_dequeue_script( 'jquery-payment' );
				wp_dequeue_script( 'fancybox' );
				wp_dequeue_script( 'jqueryui' );
			}
		}
	}

	add_action( 'pre_get_posts', 'strip_set_posts_per_page' );
	/**
	 * Set posts, WooCommerce products & comics number per archive page
	 * Fixes 404 error on pagination due to CTP conflicting with WordPress posts_per_page default
	 * see http://wordpress.stackexchange.com/questions/30757/change-posts-per-page-count/30763#30763
	 *
	 * @param string $query strip_set_posts_per_page.
	 */
	function strip_set_posts_per_page( $query ) {
		if ( ( ! is_admin() ) && ( is_home() ) && ( is_search() ) ) {
			$query->set( 'post_type', array( 'post', 'page', 'comic', 'posts_per_page', 12 ) );
		}
		if ( ( ! is_admin() ) && ( is_post_type_archive( 'product' ) ) && ( taxonomy_exists( 'category' ) ) ) {
			$query->set( 'posts_per_page', 8 );
		} elseif ( ( ! is_admin() ) && ( is_archive( 'story' ) ) ) {
			$query->set( 'posts_per_page', 3 );
		}
		return $query;
	}

	/**
	 * Set an automatic default custom taxonomy for comic posts.
	 * When no "story" (taxonomy) is set, comic posts default to “draft”.
	 *
	 * @param	string $post_id set_default_object_terms.
	 * @param	string $post set_default_object_terms.
	 */
	function set_default_object_terms( $post_id, $post ) {
		if ( 'publish' === $post->post_status && 'comic' === $post->post_type ) {
			$defaults = array(
			'story' => array( 'draft' ),
			);
			$taxonomies = get_object_taxonomies( $post->post_type );
			foreach ( (array) $taxonomies as $taxonomy ) {
				$terms = get_the_terms( $post_id, $taxonomy );
				if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
					wp_set_object_terms( $post_id, $defaults[ $taxonomy ], $taxonomy );
				}
			}
		}
	}
	add_action( 'save_post', 'set_default_object_terms', 0, 2 );

	/**
	 * Remove jquery migrate $scripts for enhanced performance.
	 *
	 * @param strings $scripts remove_jquery_migrate.
	 */
	function remove_jquery_migrate( $scripts ) {
		if ( is_admin() ) {
			return;
		}
		 $scripts->remove( 'jquery' );
		 $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
		add_action( 'wp_default_scripts', 'remove_jquery_migrate' );
