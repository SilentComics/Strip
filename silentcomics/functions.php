<?php
/**
 * SilentComics functions and definitions
 *
 * @package SilentComics
 */

/**
* Set the content width based on the theme's design and stylesheet.
*/
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
	 * removing some default WordPress dashboard widgets
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
	function custom_theme_setup() {
    add_theme_support( 'advanced-image-compression' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

	/**
	* Add EditorStyle
	*/

function silentcomics_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'silentcomics_add_editor_styles' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for title-tag. Allows themes to add document title tag to HTML <head> (since version 4.1.).
	 */
	add_theme_support( 'title-tag' );

		/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'featured-image', 1920, 0 );

/**
* Remove default WordPress paragraph tags from around images (fixes layout discrepancy between post with image attachement and galleries)
* See https://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
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
		'default-color' => 'fff',
		'default-image' => '',
	) ) );
}
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
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
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

/*
*
*/

add_action( 'wp_update_nav_menu', 'silentcomics_update_menus' );
function silentcomics_update_menus() {
	global $wpdb;
    $menus = $wpdb->get_col( 'SELECT option_name FROM $wpdb->options WHERE option_name LIKE "silentcomics_menu-%" ' );
    foreach( $menus as $menu ) {
	    delete_transient( $menu );
        }
}

/**
* Webfonts
* Font URLs function http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
*/
function silentcomics_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Fenix, translate this to 'off'. Do not translate
    * into your own language.
    */
    $fenix = _x( 'on', 'Fenix font: on or off', 'silentcomics' );

    if ( 'off' !== $fenix ) {
        $font_families = array();

        if ( 'off' !== $fenix ) {
            $font_families[] = 'Fenix:400';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}
/**
* Now enqueue the custom font to the front end (see function above)
*/
function silentcomics_scripts_styles() {
    wp_enqueue_style( 'silentcomics-fonts', silentcomics_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'silentcomics_scripts_styles' );


/**
 * Enqueue scripts and styles
 */
function silentcomics_scripts() {
	// add custom font here if any
	wp_enqueue_style( 'silentcomics-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');

if ( has_nav_menu( 'primary' ) )
	wp_enqueue_script( 'silentcomics-navigation', get_template_directory_uri() . '/js/min/navigation-min.js', array(), '20120206', true );

		// Load the html5 shiv.
	wp_enqueue_script( 'silentcomics-html5', get_template_directory_uri() . '/js/min/html5-min.js', array(), '3.7.3' );
	wp_script_add_data( 'silentcomics-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'silentcomics-skip-link-focus-fix', get_template_directory_uri() . '/js/min/skip-link-focus-fix-min.js', array(), '20130115', true );

// toggle comments js
	wp_enqueue_script( 'silentcomics-toggle-comments', get_template_directory_uri() . '/js/min/toggle-comments-min.js', array(), '1.0.0', true );


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

/*
* WooCommerce Hooks
*
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'silentcomics_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'silentcomics_wrapper_end', 10);

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

 // Enqueue the theme's own style for Woo
 function wp_enqueue_woocommerce_style(){
	
	wp_register_style( 'silentcomics-woocommerce', get_template_directory_uri() . '/library/css/woocommerce.css' );
	if ( class_exists( 'woocommerce' ) ) {
	    wp_enqueue_style( 'silentcomics-woocommerce' );
	}
}

add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );


/**
* Now stop WooCommerce queries on other pages 
*
* see http://gregrickaby.com/remove-woocommerce-styles-and-scripts/
* and: https://wordimpress.com/how-to-load-woocommerce-scripts-and-styles-only-in-shop/
* and: https://gist.github.com/DevinWalker/7621777
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
function sc_woocommerce_script_cleaner() {
	//remove generator meta tag
	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

	// Unless we're in the store, remove all the cruft!
	if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
		//dequeue scripts and styles
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
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
		wp_dequeue_script( 'jquery-blockui' );
		wp_dequeue_script( 'jquery-placeholder' );
		wp_dequeue_script( 'jquery-payment' );
		wp_dequeue_script( 'fancybox' );
		wp_dequeue_script( 'jqueryui' );
		}
	}
	
	add_action( 'wp_enqueue_styles', 'wp_enqueue_scripts', 'sc_woocommerce_script_cleaner');
	
/**
* Get the first image in a post https://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/		
*
*/	

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "/path/to/default.png";
  }
  return $first_img;
}
	
/**	
* This is the new registration code for CPT generated by the CPT UI plugin with adaptation
*
*/

// Register Custom Post Type
function comic_post_type() {

	$labels = array(
		'name'                => _x( 'Comics', 'Post Type General Name', 'silentcomics' ),
		'singular_name'       => _x( 'Comic', 'Post Type Singular Name', 'silentcomics' ),
		'menu_name'           => __( 'Comics', 'silentcomics' ),
		'name_admin_bar'      => __( 'Comic', 'silentcomics' ),
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
	$args = array(
		'label'               => __( 'Comic', 'silentcomics' ),
		'description'         => __( 'Publish Comics and Webcomics', 'silentcomics' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'archive'),
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
	register_taxonomy_for_object_type( 'story', 'comic' );
	register_taxonomy( 'story', // register custom taxonomy - comic story
			'comic',
			array( 'hierarchical' => true,
				'label' => 'Stories'
			)
		);
}

// Hook into the 'init' action
add_action( 'init', 'comic_post_type', 0 );// End of register_cpt_comic()

function silentcomics_rewrite_rules() {
    flush_rewrite_rules();
}
/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'silentcomics_rewrite_rules' );


// Register Custom Taxonomy 'story'
function comic_story_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Story', 'Taxonomy General Name', 'silentcomics' ),
		'singular_name'              => _x( 'Story', 'Taxonomy Singular Name', 'silentcomics' ),
		'menu_name'                  => __( 'Stories', 'silentcomics' ),
		'all_items'                  => __( 'All Stories', 'silentcomics' ),
		'parent_item'                => __( 'Parent Story', 'silentcomics' ),
		'parent_item_colon'          => __( 'Parent Story:', 'silentcomics' ),
		'new_item_name'              => __( 'New Comic Story', 'silentcomics' ),
		'add_new_item'               => __( 'Add New Story', 'silentcomics' ),
		'edit_item'                  => __( 'Edit Story', 'silentcomics' ),
		'update_item'                => __( 'Update Story', 'silentcomics' ),
		'view_item'                  => __( 'View Item', 'silentcomics' ),
		'separate_items_with_commas' => __( 'Separate stories with commas', 'silentcomics' ),
		'add_or_remove_items'        => __( 'Add or remove stories', 'silentcomics' ),
		'choose_from_most_used'      => __( 'Choose from the most used stories', 'silentcomics' ),
		'popular_items'              => __( 'Popular Items', 'silentcomics' ),
		'search_items'               => __( 'Search stories', 'silentcomics' ),
		'not_found'                  => __( 'Not Found', 'silentcomics' ),
		'items_list'                 => __( 'Stories list', 'silentcomics' ),
		'items_list_navigation'      => __( 'Stories list navigation', 'silentcomics' ),
	);
	$args = array(
		'labels'                     => $labels,
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
}

// Hook into the 'init' action
add_action( 'init', 'comic_story_taxonomy', 0 );

// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Prints', 'taxonomy general name', 'silentcomics' ),
		'singular_name'              => _x( 'Print', 'taxonomy singular name', 'silentcomics' ),
		'search_items'               => __( 'Search Prints', 'silentcomics' ),
		'popular_items'              => __( 'Popular Prints', 'silentcomics' ),
		'all_items'                  => __( 'All Prints', 'silentcomics' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Print', 'silentcomics' ),
		'update_item'                => __( 'Update Print', 'silentcomics' ),
		'add_new_item'               => __( 'Add New Print', 'silentcomics' ),
		'new_item_name'              => __( 'New Author Name', 'silentcomics' ),
		'separate_items_with_commas' => __( 'Separate prints with commas', 'silentcomics' ),
		'add_or_remove_items'        => __( 'Add or remove prints', 'silentcomics' ),
		'choose_from_most_used'      => __( 'Choose from the most used prints', 'silentcomics' ),
		'not_found'                  => __( 'No prints found.', 'silentcomics' ),
		'menu_name'                  => __( 'Prints', 'silentcomics' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'prints' ),
	);

	register_taxonomy( 'print', // register custom taxonomy - comic tag
			'comic',
			array( 'hierarchical' => false,
				'label' => 'Prints'
			)
		);

/**
* Add custom post type tags/categories to archive pages
* If you want custom post type comics to also appear on blog and home, see https://developer.wordpress.org/plugins/custom-post-types-and-taxonomies/working-with-custom-post-type-data/
*
*/
//add_filter('pre_get_posts', 'query_post_type');
//function query_post_type($query) {
//  if($query->is_main_query() && $query->is_post_type( 'comic' ) || $query->taxonomy_exists('story') && empty( $query->query_vars['suppress_filters'] ) ) {
//    $post_type = get_query_var('post_type');
//	if($post_type)
//	    $post_type = $post_type;
//	else
//	    $post_type = array( 'comic','nav_menu_item');
//    $query->set('post_type',$post_type);
//	return $query;
//   }
//}  

// elseif $query->is_attachment() || is_single() Keeping this as backburner — needs re write 

// Show posts of 'post' and 'comic' post types on home page
add_action( 'pre_get_posts', 'add_comics_to_query' );

function add_comics_to_query( $query ) {
	if ( is_home() && $query->is_main_query() )
	$query->set( 'post_type', array( 'post', 'comic' ) );
	return $query;
}
/**
* Fixes 404 error on pagination due to CTP conflicting with WordPress default 10 posts per page
* see http://wordpress.stackexchange.com/questions/30757/change-posts-per-page-count/30763#30763
*/
add_action( 'pre_get_posts',  'set_posts_per_page'  );
function set_posts_per_page( $query ) {

  global $wp_the_query;

  if ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_home() ) && ( $query->is_search() ) ) {
    $query->set( 'posts_per_page', 12 );
  }
  elseif ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_archive() ) && taxonomy_exists('story') ) {
    $query->set( 'posts_per_page', 6 );
  }

  return $query;
}

/**
* Add an automatic default custom taxonomy for custom post type.
* If no story (taxonomy) is set, the comic post will be sorted as “draft” and won’t return an offset error
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
* filter
* Reducing postmeta queries with update_meta_cache()
* see http://hitchhackerguide.com/2011/11/01/reducing-postmeta-queries-with-update_meta_cache/
* Seems WordPress handles all already
*/

add_filter( 'posts_results', 'cache_meta_data', 9999, 2 );
function cache_meta_data( $posts, $object ) {
    $posts_to_cache = array();
    // this usually makes only sense when we have a bunch of posts
    if ( empty( $posts ) || is_wp_error( $posts ) || is_single() || is_page() || taxonomy_exists('comic') || count( $posts ) < 3 )
        return $posts;

    foreach( $posts as $post ) {
        if ( isset( $post->ID ) && isset( $post->post_type ) ) {
            $posts_to_cache[$post->ID] = 1;
        }
    }

    if ( empty( $posts_to_cache ) )
        return $posts;

    update_meta_cache( 'post', 'comic', array_keys( $posts_to_cache ) );
    unset( $posts_to_cache );

    return $posts;
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