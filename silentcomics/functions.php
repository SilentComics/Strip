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
	$content_width = 2048; /* pixels */

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
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'featured-image', 1272, 0 );
	
	/**
	 * Enable support for title-tag. Allows themes to add document title tag to HTML <head> (since version 4.1.).
	 */
	add_theme_support( 'title-tag' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'silentcomics' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery','audio' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'silentcomics_custom_background_args', array(
		'default-color' => 'fff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // silentcomics_setup
add_action( 'after_setup_theme', 'silentcomics_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function silentcomics_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'silentcomics' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 1', 'silentcomics' ),
		'id'            => 'footer-sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 2', 'silentcomics' ),
		'id'            => 'footer-sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 3', 'silentcomics' ),
		'id'            => 'footer-sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		));
}
add_action( 'widgets_init', 'silentcomics_widgets_init' );

/**
* add ie conditional html5 shim to header
 */
function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');

/**
 * Enqueue scripts and styles
 */
function silentcomics_scripts() {
	// add custom font here if any
	wp_enqueue_style( 'silentcomics-style', get_stylesheet_uri() );
	
	wp_enqueue_script('jquery');
	
if ( has_nav_menu( 'primary' ) )
	wp_enqueue_script( 'silentcomics-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'silentcomics-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
// toggle comments js	
	wp_enqueue_script( 'silentcomics-toggle-comments', get_template_directory_uri() . '/js/toggle-comments.js', array(), '1.0.0', true );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'silentcomics-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
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
* This is the new registration code for CTP generated by the CPT UI plugin with adaptation
*
*/

// Register Custom Post Type
function comic_post_type() {

	$labels = array(
		'name'                => _x( 'Comics', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Comic', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Comics', 'text_domain' ),
		'name_admin_bar'      => __( 'Comic', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Comic:', 'text_domain' ),
		'all_items'           => __( 'All Comics', 'text_domain' ),
		'add_new_item'        => __( 'Add New Comic', 'text_domain' ),
		'add_new'             => __( 'Add New Comic', 'text_domain' ),
		'new_item'            => __( 'New Comic', 'text_domain' ),
		'edit_item'           => __( 'Edit Comic', 'text_domain' ),
		'update_item'         => __( 'Update Comic', 'text_domain' ),
		'view_item'           => __( 'View Comic', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not Comics found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not Comics found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Comic', 'text_domain' ),
		'description'         => __( 'Comics and Webcomics', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats' ),
		'taxonomies'          => array( 'stories', 'category' ),
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
		'exclude_from_search' => false,
		'rewrite' => array( 'slug' => 'stories', 'with_front' => true ),
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		
	);
	register_post_type( 'comic', $args );

}
	register_taxonomy_for_object_type( 'stories', 'comic', 'category' );
// Hook into the 'init' action
add_action( 'init', 'comic_post_type', 0 );// End of register_cpt_comic()

function my_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );

// Register Custom Taxonomy
function comic_stories_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Stories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Story', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Stories', 'text_domain' ),
		'all_items'                  => __( 'All Stories', 'text_domain' ),
		'parent_item'                => __( 'Parent Story', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Story:', 'text_domain' ),
		'new_item_name'              => __( 'New Comic Story', 'text_domain' ),
		'add_new_item'               => __( 'Add New Story', 'text_domain' ),
		'edit_item'                  => __( 'Edit Story', 'text_domain' ),
		'update_item'                => __( 'Update Story', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate genress with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove stories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used stories', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search stories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'stories', array( 'comic' ), $args );
	register_taxonomy_for_object_type( 'stories', 'comic', 'category' );
}

// Hook into the 'init' action
add_action( 'init', 'comic_stories_taxonomy', 0 );


/**
* Add custom post type tags/categories to archive pages - to make this work, you need to create a custom category-name.php 
*
*This line returns no content but only titles for specific categories: if(is_category() || is_tag()  && empty( $query->query_vars['suppress_filters'] ) ) {
* This also works: if($query->is_category() || $query->is_tag() && $query->is_main_query && empty( $query->query_get['suppress_filters'] ) ) {
*
*
* If you want custom post type comics to also appear on blog and home, see https://developer.wordpress.org/plugins/custom-post-types-and-taxonomies/working-with-custom-post-type-data/
*/

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if($query->is_main_query() && $query->is_category() || $query->is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $post_type = get_query_var('post_type');
	if($post_type)
	    $post_type = $post_type;
	else
	    $post_type = array( 'comic','nav_menu_item');
    $query->set('post_type',$post_type);
	return $query;
    }
}

/**
* Append the query string for the custom post type 'my_custom_post_type' permalink URLs: http://codex.wordpress.org/Plugin_API/Filter_Reference/post_type_link
* (uses add_query_arg and get_post_type)
*
*/

function append_query_string( $url, $post ) {
    if ( 'comic' === get_post_type( $post ) ) {
        return add_query_arg( $_GET, $url );
    }
    return $url;
}

/**
* Get the first and latest post for custom post type using get_boundary_post() [https://core.trac.wordpress.org/ticket/27094](https://core.trac.wordpress.org/ticket/27094)
*/
function get_comic_boundary_post( $in_same_term = false, $excluded_terms = '', $start = true, $taxonomy = 'category' ) {
    $post = get_post();
    if ( ! $post || ! is_single() || is_attachment() ||  ! taxonomy_exists( $taxonomy ) )
        return null;

    $query_args = array(
        'post_type' => 'comic',
        'posts_per_page' => 1,
        'order' => $start ? 'ASC' : 'DESC',
        'update_post_term_cache' => false,
        'update_post_meta_cache' => false
    );

    $term_array = array();

    if ( ! is_array( $excluded_terms ) ) {
        if ( ! empty( $excluded_terms ) )
            $excluded_terms = explode( ',', $excluded_terms );
        else
            $excluded_terms = array();
    }

    if ( $in_same_term || ! empty( $excluded_terms ) ) {
        if ( $in_same_term )
            $term_array = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );

        if ( ! empty( $excluded_terms ) ) {
            $excluded_terms = array_map( 'intval', $excluded_terms );
            $excluded_terms = array_diff( $excluded_terms, $term_array );

            $inverse_terms = array();
            foreach ( $excluded_terms as $excluded_term )
                $inverse_terms[] = $excluded_term * -1;
            $excluded_terms = $inverse_terms;
        }

        $query_args[ 'tax_query' ] = array( array(
            'taxonomy' => $taxonomy,
            'terms' => array_merge( $term_array, $excluded_terms )
        ) );
    }

    return get_posts( $query_args );
}
?>