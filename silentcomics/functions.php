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
		'name'          => __( 'Footer Sidebar 1', 'silentcomics' ),
		'id'            => 'footer-sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 2', 'silentcomics' ),
		'id'            => 'footer-sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 3', 'silentcomics' ),
		'id'            => 'footer-sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		));
}
add_action( 'widgets_init', 'silentcomics_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function silentcomics_scripts() {
	// add custom font here if any
	wp_enqueue_style( 'silentcomics-style', get_stylesheet_uri() );
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

add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		'name' => 'Comics',
		'singular_name' => 'Comic',
		'menu_name' => 'Comics',
		'all_items' => 'All Series',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Comic',
		'edit' => 'Edit',
		'edit_item' => 'Edit Comic',
		'new_item' => 'New Comic',
		'view' => 'View',
		'view_item' => 'View Comic',
		'search_items' => 'Search Comic',
		'not_found' => 'No Comics Found',
		'not_found_in_trash' => 'No Comics found in Trash',
		'parent' => 'Parent Comic',
		);

	$args = array(
		'labels' => $labels,
		'description' => 'For comics and webcomics',
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'show_in_menu' => true,
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'comic', 'with_front' => true ),
		'query_var' => true,
		'menu_position' => 20,		'menu_icon' => 'dashicons-book-alt',		'supports' => array( 'title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats' ),		'taxonomies' => array( 'category', 'post_tag' )	);
	register_post_type( 'comic', $args );

// End of cptui_register_my_cpts()
}

/**
* Add custom post type tags/categories to archive pages - to make this work, you need to create a custom category-name.php 
*
*This line returns no content but only titles for specific categories: if(is_category() || is_tag()  && empty( $query->query_vars['suppress_filters'] ) ) {
* This also works: if($query->is_category() || $query->is_tag() && $query->is_main_query && empty( $query->query_get['suppress_filters'] ) ) {
*
*
* If you want custom post type comics to also appear on blog and home, see https://developer.wordpress.org/plugins/custom-post-types-and-taxonomies/working-with-custom-post-type-data/
*/

/**
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
    if($query->is_category() || $query->is_tag() && $query->is_main_query()) {
    $post_type = get_query_var('post_type');
	if($post_type)
	    $post_type = $post_type;
	else
	    $post_type = array('post','nav_menu_item', 'comic' );
    $query->set('post_type',$post_type);
	return $query;
    }
}
*/

/**
* If testing is needed, paste below this line add_action or add_filter?
*/


add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if($query->is_category() || $query->is_tag() && $query->is_main_query && empty( $query->query_get['suppress_filters'] ) ) {
    $post_type = get_query_var('post_type');
	if($post_type)
	    $post_type = $post_type;
	else
	    $post_type = array('post','comic','nav_menu_item');
    $query->set('post_type',$post_type);
	return $query;
    }
}


/**
* Test something below
*/

/**
* Get the first and latest post link for CTP comic — this functions works fine to retrieve the first and last post and fine if you have only one story, but should be improved to sort comics by categories so you can add multiple stories.
*/

/** 
function first_comic_post() {

// Query the database for the oldest post
$first_comic = new WP_Query( array(
'post_type' => 'comic',
'post_per_page' =>1,
'order'   => 'ASC',
)
);

if ($first_comic->have_posts()) { 

    $first_comic->the_post(); 
    $first_url=get_permalink();
    echo $first_url; 
}      

wp_reset_postdata();
}
/*
for latest post link
*/

/**
function latest_comic_post( $query ) {

// Query the database for the most recent post
$last_comic = new WP_Query( array(
'post_type' => 'comic', 
'showposts'=>1
)    
);
if ($last_comic->have_posts()) {

    $last_comic->the_post(); 
    $latest_url=get_permalink();
    echo $latest_url;
}

wp_reset_postdata();
}



/**
* Append the query string for the custom post type 'my_custom_post_type' permalink URLs: http://codex.wordpress.org/Plugin_API/Filter_Reference/post_type_link
* (uses add_query_arg and get_post_type)
*
*/

/**
function append_query_string( $url, $post ) {
    if ( 'comic' == get_post_type( $post ) ) {
        return add_query_arg( $_GET, $url );
    }
    return $url;
}
add_filter( 'post_type_link', 'append_query_string', 10, 2 );
*/




/**
* Get the first and latest post for custom post type using get_boundary_post() [https://core.trac.wordpress.org/ticket/27094](https://core.trac.wordpress.org/ticket/27094)
*/
function get_comic_boundary_post( $in_same_term = false, $excluded_terms = '', $start = true, $taxonomy = 'category' ) {
    $post = get_post();
    if ( ! $post || ! is_single() || is_attachment() || ! taxonomy_exists( $taxonomy ) )
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