<?php
/**
 * SilentComics functions and definitions
 *
 * @package SilentComics
 */

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 1920; /* pixels */

if ( ! function_exists( 'silentcomics_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which runs
* before the init hook. The init hook is too late for some features, such as indicating
* support post thumbnails.
*/
	function silentcomics_setup() {
/**
* remove some default WordPress dashboard widgets
* an example custom dashboard widget
* adding custom login css
* changing text in footer of admin
*/
	require_once('library/admin.php');
/**
* Make theme available for translation
* Translations can be filed in the /languages/ directory
* If you're building a theme based on SilentComics, use a find and replace
* to change 'silentcomics' to the name of your theme in all the template files
*/
	load_theme_textdomain( 'silentcomics', get_template_directory() . '/languages' );

/**
* Functions for RICG-responsive-images
* https://github.com/ResponsiveImagesCG/wp-tevko-responsive-images/tree/dev#advanced-image-compression
*/
	add_theme_support( 'advanced-image-compression' );
	
	// Increase the limit to 1920px if the image is wider than 768px.

function custom_max_srcset_image_width( $max_width, $size_array ) {
    $width = $size_array[0];

    if ( $width > 768 ) {
        $max_width = 1920;
    }

    return $max_width;
}
add_filter( 'max_srcset_image_width', 'custom_max_srcset_image_width', 10, 2 );


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
* @since SilentComics 2.5.7
*
*/
	add_theme_support( 'custom-logo', array(
		'height'      => 156,
		'width'       => 312,
		'flex-height' => true,
		'flex-width' => true,
	) );

/**
* Enable support for Post Thumbnails on posts and pages
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 'featured-image', 1920, 0 ); // was using add_image_size

/**
* Remove default WordPress paragraph tags from around images (fixes layout discrepancy between post with image attachement and galleries)
* See https://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
* http://codex.wordpress.org/Function_Reference/wpautop gets the same result but also removes line blocks: remove_filter( 'the_content', 'wpautop' ); 
*	
*/
	function filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	}
	add_filter('the_content', 'filter_ptags_on_images');	 	

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'silentcomics' ),
	) );

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
	add_theme_support( 'custom-background', apply_filters( 'silentcomics_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}

/**
* This theme styles the visual editor to resemble the theme style,
* specifically font, colors, icons, and column width.
*/
    add_editor_style( array( 'css/editor-style.css', 'fonts/fenix.css' ) );
    
    /** add silentcomics_fonts_url() if you want to use Google Webfonts:
    // add_editor_style( array( 'css/editor-style.css', silentcomics_fonts_url() ) ); 
    */

	// Indicate widget sidebars can use selective refresh in the Customizer. https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
	add_theme_support( 'customize-selective-refresh-widgets' );

endif; // silentcomics_setup
add_action( 'after_setup_theme', 'silentcomics_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function silentcomics_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'silentcomics' ),
		'id'            => 'sidebar',
		'description'   => __( 'The main body widget area', 'silentcomics' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' 			=> __( 'First Footer Widget', 'silentcomics' ),
        'id' 			=> 'first-footer-widget',
        'description'   => __( 'The first footer widget', 'silentcomics' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ) );

    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' 			=> __( 'Second Footer Widget', 'silentcomics' ),
        'id' 			=> 'second-footer-widget',
        'description'   => __( 'The second footer widget', 'silentcomics' ),
        //'customize_selective_refresh' => true,
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ) );

    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' 			=> __( 'Third Footer Widget', 'silentcomics' ),
        'id' 			=> 'third-footer-widget',
        'description' 	=> __( 'The third footer widget', 'silentcomics' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ) );

    // Fourth Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' 			=> __( 'Fourth Footer Widget', 'silentcomics' ),
        'id' 			=> 'fourth-footer-widget',
        'description' 	=> __( 'The fourth footer widget', 'silentcomics' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ) );

}
add_action( 'widgets_init', 'silentcomics_widgets_init' );

/**
* Transients for menu
*
*/
function silentcomics_transient_menu( $args = array() ) {
	$defaults = array(
	'menu' => '',
	'theme_location' => '',
	'echo' => true,
	 );

    $args = wp_parse_args( $args, $defaults );

    $transient_name = 'silentcomics_menu-' . $args['menu'] . '-' . $args['theme_location'];
    $menu = get_transient( $transient_name );

	if ( false === $menu ) {
		$menu_args = $args;
		$menu_args['echo'] = false;
		$menu = wp_nav_menu( $menu_args );
		set_transient( $transient_name, $menu, 0 );
		}

if( false === $args['echo'] ) {
	return $menu;
        }

	echo $menu;
}

// now delete the transient on update
add_action( 'wp_update_nav_menu', 'silentcomics_update_menus' );
function silentcomics_update_menus() {
	global $wpdb;
    $menus = $wpdb->get_col( 'SELECT option_name FROM $wpdb->options WHERE option_name LIKE "silentcomics_menu-%" ' );
    foreach( $menus as $menu ) {
	    delete_transient( $menu );
        }
}

/**
* Google Webfonts 
* Font URLs function http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
*/
//function silentcomics_fonts_url() {
//    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Fenix, translate this to 'off'. Do not translate
    * into your own language.
    */
//    $fenix = _x( 'on', 'Fenix font: on or off', 'silentcomics' );

//    if ( 'off' !== $fenix ) {
//        $font_families = array();

//        if ( 'off' !== $fenix ) {
//            $font_families[] = 'Fenix:400';
//        }

//        $query_args = array(
//            'family' => urlencode( implode( '|', $font_families ) ),
//            'subset' => urlencode( 'latin' ),
//        );

//        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
//    }

//    return esc_url_raw( $fonts_url );
//}

/**
 * Enqueue scripts and styles
 */
function silentcomics_scripts() {
	// add custom font here if any
	wp_enqueue_style( 'fenix', get_template_directory_uri() . '/fonts/fenix.css', array(), null );
	
	wp_enqueue_style( 'inconsolata', get_template_directory_uri() . '/fonts/inconsolata.css', array(), null );

	// Add custom fonts, used in the main stylesheet. (if using Google Fonts)
    //wp_enqueue_style( 'silentcomics-fonts', silentcomics_fonts_url(), array(), null );
    	
	// Theme stylesheet
	wp_enqueue_style( 'silentcomics-style', get_stylesheet_uri() );
	
	// Load the Internet Explorer specific stylesheet. Conditional stylesheet — tested and works with IE9 on Windows7
	wp_enqueue_style( 'silentcomics-ie', get_template_directory_uri() . '/css/ie.css', array( 'silentcomics-style' ), '20160305' );
	wp_style_add_data( 'silentcomics-ie', 'conditional', 'lt IE 10' );

	if ( has_nav_menu( 'primary' ) )
	wp_enqueue_script( 'silentcomics-navigation', get_template_directory_uri() . '/js/min/navigation-min.js', array(), '20120206', true );

	// Load the html5 shiv.
	wp_enqueue_script( 'silentcomics-html5', get_template_directory_uri() . '/js/min/html5-min.js', array(), '3.7.3' );
	wp_script_add_data( 'silentcomics-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'silentcomics-skip-link-focus-fix', get_template_directory_uri() . '/js/min/skip-link-focus-fix-min.js', array(), '20130115', true );
	
	// toggle comments js
	wp_enqueue_script( 'silentcomics-toggle-comments', get_template_directory_uri() . '/js/min/toggle-comments-min.js', array( 'jquery' ), '20160401', false );

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );

	if ( is_single() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'silentcomics-keyboard-image-navigation', get_template_directory_uri() . '/js/min/keyboard-image-navigation-min.js', array( 'jquery' ), '20120202' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'silentcomics_scripts' );

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
* Register RoyalSLider
*/

//register_new_royalslider_files(1); 

/**
* MailChimp for WordPress
*/
function wp_enqueue_mc4wp_style(){
	
	wp_register_style( 'mc4wp', get_template_directory_uri() . '/library/css/mc4wp.css' );
	if ( class_exists( 'mc4wp_form_css_classes' ) ) {
	    wp_enqueue_style( 'mc4wp' );
	}
}

add_action( 'wp_enqueue_scripts', 'wp_enqueue_mc4wp_style' );
/**
* Get the first image in a post 
* See https://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/
*/	
function catch_first_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();

//$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', do_shortcode($post->post_content), $matches);
if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', do_shortcode($post->post_content, 'gallery'), $matches)){
$first_img = $matches [1][0];
return $first_img;

}

elseif(empty($first_img)) {
	$first_img = get_template_directory_uri() . '/library/images/empty.png'; // path to default image
	}
	return $first_img;
}
add_filter ('first_img', 'catch_first_image');

/**
* see if you can implement size for image galleries
* http://stackoverflow.com/questions/19802157/change-wordpress-default-gallery-output
*/

/**		
* Register Custom Post Type — code generated by the CPT UI plugin with adaptation
*/
function comic_post_type() {

	$labels = array(
		'name'                => _x( 'Comics', 'Post Type General Name', 'silentcomics' ),
		'singular_name'       => _x( 'Comic', 'Post Type Singular Name', 'silentcomics' ),
		'menu_name'           => _x( 'Comics', 'admin menu', 'silentcomics' ),
		'name_admin_bar'      => _x( 'Comic', 'add new on admin bar', 'silentcomics' ),
		'parent_item_colon'   => __( 'Parent Comic:', 'silentcomics' ),
		'all_items'           => __( 'All Comics', 'silentcomics' ),
		'add_new_item'        => __( 'Add New Comic', 'silentcomics' ),
		'add_new'             => __( 'Add New Comic', 'silentcomics' ),
		'new_item'            => __( 'New Comic', 'silentcomics' ),
		'edit_item'           => __( 'Edit Comic', 'silentcomics' ),
		'update_item'         => __( 'Update Comic', 'silentcomics' ),
		'view_item'           => __( 'View Comic', 'silentcomics' ),
		'search_items'        => __( 'Search Item', 'silentcomics' ),
		'not_found'           => __( 'No Comics found', 'silentcomics' ),
		'not_found_in_trash'  => __( 'No Comics found in Trash', 'silentcomics' ),
		'items_list'          => __( 'Comics list', 'silentcomics' ),
		'items_list_navigation' => __( 'Comics list navigation', 'silentcomics' ),
		'filter_items_list'     => __( 'Filter Comics list', 'silentcomics' ),
	);
	
	$supports            = array( 'title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'archive',
	);
	
	$args = array(
		'label'               => __( 'Comic', 'silentcomics' ),
		'description'         => __( 'Publish Comics and Webcomics', 'silentcomics' ),
		'labels'              => $labels,
		'supports'			  => $supports,
		'taxonomies'          => array( 'story', 'story_term', 'draft' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 20,
		'menu_icon' 		  => 'dashicons-book-alt',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'feeds'				  => true,
		'exclude_from_search' => false,
		'rewrite' 			  => array( 'slug' => 'stories', 'with_front' => true ),
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'comic', $args );
}

// Hook into the 'init' action
add_action( 'init', 'comic_post_type', 0 );// End of register_cpt_comic()

// Register Custom Taxonomy 'story'
function comic_story_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Comic Story', 'Taxonomy General Name', 'silentcomics' ),
		'singular_name'              => _x( 'Comic Story', 'Taxonomy Singular Name', 'silentcomics' ),
		'menu_name'                  => __( 'Comic Stories', 'silentcomics' ),
		'all_items'                  => __( 'All Comic Stories', 'silentcomics' ),
		'parent_item'                => __( 'Parent Story', 'silentcomics' ),
		'parent_item_colon'          => __( 'Parent Story:', 'silentcomics' ),
		'new_item_name'              => __( 'New Comic Story', 'silentcomics' ),
		'add_new_item'               => __( 'Add New Story', 'silentcomics' ),
		'edit_item'                  => __( 'Edit Story', 'silentcomics' ),
		'update_item'                => __( 'Update Story', 'silentcomics' ),
		'view_item'                  => __( 'View Item', 'silentcomics' ),
		'separate_items_with_commas' => __( 'Separate stories with commas', 'silentcomics' ),
		'add_or_remove_items'        => __( 'Add or Remove Stories', 'silentcomics' ),
		'choose_from_most_used'      => __( 'Choose from the most used stories', 'silentcomics' ),
		'popular_items'              => NULL, // __( 'Popular comic stories', 'silentcomics' )
		'search_items'               => __( 'Search Stories', 'silentcomics' ),
		'not_found'                  => __( 'No comic Stories found', 'silentcomics' ),
		'items_list'                 => __( 'Comic Stories list', 'silentcomics' ),
		'items_list_navigation'      => __( 'Comic Stories list navigation', 'silentcomics' ),
	);
	$args = array(
		'labels'                     => $labels,
		'label'						 => 'Stories',
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'       			 => true,
		'rewrite'          			 => array( 'slug' => 'story' ),
	);
	register_taxonomy( 'story', array( 'comic' ), $args );
	register_taxonomy_for_object_type( 'story', 'comic' );
}

// Hook into the 'init' action
add_action( 'init', 'comic_story_taxonomy', 0 );

function silentcomics_rewrite_rules() {
    flush_rewrite_rules();
}
/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'silentcomics_rewrite_rules' );


// Add Print taxonomy, NOT hierarchical (like tags)
// Register Custom Taxonomy
	$labels = array(
		'name'                       => _x( 'Prints', 'Taxonomy General Name', 'silentcomics' ),
		'singular_name'              => _x( 'Print', 'Taxonomy Singular Name', 'silentcomics' ),
		'menu_name'                  => __( 'Print', 'silentcomics' ),
		'all_items'                  => __( 'All Prints', 'silentcomics' ),
		'parent_item'                => __( 'Parent Print', 'silentcomics' ),
		'parent_item_colon'          => __( 'Parent Print:', 'silentcomics' ),
		'new_item_name'              => __( 'New Print Name', 'silentcomics' ),
		'add_new_item'               => __( 'Add New Print', 'silentcomics' ),
		'edit_item'                  => __( 'Edit Print', 'silentcomics' ),
		'update_item'                => __( 'Update Pring', 'silentcomics' ),
		'view_item'                  => __( 'View Print', 'silentcomics' ),
		'separate_items_with_commas' => __( 'Separate prints with commas', 'silentcomics' ),
		'add_or_remove_items'        => __( 'Add or remove prints', 'silentcomics' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'silentcomics' ),
		'popular_items'              => __( 'Popular Prints', 'silentcomics' ),
		'search_items'               => __( 'Search Prints', 'silentcomics' ),
		'not_found'                  => __( 'Not Found', 'silentcomics' ),
		'no_terms'                   => __( 'No prints', 'silentcomics' ),
		'items_list'                 => __( 'Prints list', 'silentcomics' ),
		'items_list_navigation'      => __( 'Prints list navigation', 'silentcomics' ),
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
remove_action( 'woocommerce_before_main_content', 	'woocommerce_breadcrumb', 					20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 		10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 		10);
remove_action( 'woocommerce_after_shop_loop', 		'woocommerce_pagination', 					10 );
remove_action( 'woocommerce_before_shop_loop', 		'woocommerce_result_count', 				20 );
remove_action( 'woocommerce_before_shop_loop', 		'woocommerce_catalog_ordering', 			30 );

add_action('woocommerce_before_main_content', 'silentcomics_wrapper_start', 					10);
add_action('woocommerce_after_main_content', 'silentcomics_wrapper_end', 						10);

function silentcomics_wrapper_start() {
	echo '<section id="content" class="woocommerce-content" role="main"><div class="entry-wrap wrap clear">';
}

function silentcomics_wrapper_end() {
	echo '</section>';
	}

/**
* Add WooCommerce support
* https://docs.woothemes.com/document/third-party-custom-theme-compatibility/*
*/
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	    add_theme_support( 'woocommerce' );
	    }
	    
/**
* Remove each WooCommerce style one by one, if needed
* see https://docs.woothemes.com/document/disable-the-default-stylesheet/
*
*/
//	add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
//	function jk_dequeue_styles( $enqueue_styles ) {
	//unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	//unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	//unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
//	return $enqueue_styles;
//}

 // Enqueue the theme's own style for WooCommerce
 function wp_enqueue_woocommerce_style(){
	
	wp_register_style( 'silentcomics-woocommerce', get_template_directory_uri() . '/library/css/woocommerce-min.css' );
	if ( class_exists( 'woocommerce' ) ) {
	    wp_enqueue_style( 'silentcomics-woocommerce' );
	}
}

add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );

/**
* Optimize WooCommerce Scripts
* Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
* see http://gregrickaby.com/remove-woocommerce-styles-and-scripts/
* and: https://wordimpress.com/how-to-load-woocommerce-scripts-and-styles-only-in-shop/
* and: https://gist.github.com/DevinWalker/7621777
* also: http://dessky.com/blog/disable-woocommerce-scripts-and-styles/
*/
add_action( 'wp_enqueue_scripts', 'silentcomics_manage_woocommerce_styles', 99 );
 
function silentcomics_manage_woocommerce_styles() {
	//remove generator meta tag
	//remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
	
	//first check that woo exists to prevent fatal errors
	if ( function_exists( 'is_woocommerce' ) ) {
		//dequeue scripts and styles, unless we're in the store
		if ( !is_woocommerce() && !is_page('store') && !is_shop() && !is_product_category() && !is_product() && !is_cart() && !is_checkout() ) {
		wp_dequeue_style( 'woocommerce_frontend_styles' );
		wp_dequeue_style( 'woocommerce-general');
		wp_dequeue_style( 'woocommerce-layout' );
		wp_dequeue_style( 'woocommerce-smallscreen' );
		wp_dequeue_style( 'woocommerce_fancybox_styles' );
		wp_dequeue_style( 'woocommerce_chosen_styles' );
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		wp_dequeue_style( 'select2' );
		wp_dequeue_style( 'silentcomics-woocommerce' ); // the theme's CSS overwrite
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
		wp_dequeue_script( 'jquery-blockui');
		wp_dequeue_script( 'jquery-placeholder' );
		wp_dequeue_script( 'jquery-payment' );
		wp_dequeue_script( 'fancybox' );
		wp_dequeue_script( 'jqueryui' );
		}
	}
}

/**
* Set posts, WooCommerce products & comics number per archive page
* Fixes 404 error on pagination due to CTP conflicting with WordPress posts_per_page default 
* see http://wordpress.stackexchange.com/questions/30757/change-posts-per-page-count/30763#30763
*/
add_action( 'pre_get_posts',  'silentcomics_set_posts_per_page'  );
function silentcomics_set_posts_per_page( $query ) {

  global $wp_the_query;

 if ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_home() ) && ( $query->is_search() ) ) {
   $query->set( 'posts_per_page', 12 );
 }
  if  ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_post_type_archive('product') ) && (taxonomy_exists('category') ) ) {
	$query->set( 'posts_per_page', 8);
  }
  elseif ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_archive() )  && (is_tax('story') ) ) {
    $query->set( 'posts_per_page', 3 );
  }
  
  return $query;
}

/**
* Add an automatic default custom taxonomy for custom post type.
* If no "story" (taxonomy) set, comic posts default to “draft”.
*
*/
function set_default_object_terms( $post_id, $post ) {
    if ( 'publish' === $post->post_status && $post->post_type === 'comic' ) {
        $defaults = array(
            'story' => array( 'draft' )
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
            wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
    add_action( 'save_post', 'set_default_object_terms', 0, 2 );

/**
* Transients (TO DO)
*/
function story_transient() {
    $transient_name = 'story';
    $post_type        = get_transient( $transient_name );

    // done
    if ( 'comic' == get_post_type( $post_id ) )
        return $post_type;

set_transient( 'story', $post_type, 12 * HOUR_IN_SECONDS );

return $content;
}

/*
* Create a function to delete our transient when a comic post is saved
* http://wordpress.stackexchange.com/questions/88991/option-to-feature-custom-post-type-on-home-page
*
*/
    function save_post_delete_story_transient( $post_id ) {
       if ( 'comic' == get_post_type( $post_id ) )
        delete_transient( 'comic', 'story' );
    }
    // Add the function to the save_post hook so it runs when posts are saved
    add_action( 'save_post', 'save_post_delete_story_transient' );

/*
Remove query strings from CSS and JS inclusions
*/
function _remove_script_version($src) {
   $parts = explode('?ver', $src);
   return $parts[0];
}
add_filter('style_loader_src', '_remove_script_version', 15, 1);
add_filter('script_loader_src', '_remove_script_version', 15, 1);
    
/*
Remove jquery migrate for enhanced performance
*/
function remove_jquery_migrate($scripts) {
   if (is_admin()) return;
   $scripts->remove('jquery');
   $scripts->add('jquery', false, array('jquery-core'), '1.10.2');
}
add_action('wp_default_scripts', 'remove_jquery_migrate');