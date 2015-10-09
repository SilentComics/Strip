<?php
/**
 * SilentComics functions and definitions
 *
 * @package SilentComics
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
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
		'chat',
	) );

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
		'id'            => 'sidebar',
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
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 4', 'silentcomics' ),
		'id'            => 'footer-sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'silentcomics_widgets_init' );

/** Remove widget queries when no widget is used
* Unregister all Default Widgets
*/

//function unregister_default_wp_widgets() {
//    unregister_widget('WP_Widget_Pages');
//    unregister_widget('WP_Widget_Calendar');
//    unregister_widget('WP_Widget_Archives');
//    unregister_widget('WP_Widget_Links');
//    unregister_widget('WP_Widget_Meta');
//    unregister_widget('WP_Widget_Search');
//    unregister_widget('WP_Widget_Text');
//    unregister_widget('WP_Widget_Categories');
//    unregister_widget('WP_Widget_Recent_Posts');
//    unregister_widget('WP_Widget_Recent_Comments');
//    unregister_widget('WP_Widget_RSS');
//    unregister_widget('WP_Widget_Tag_Cloud');
//}
//add_action('widgets_init', 'unregister_default_wp_widgets', 1);

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
* Webfonts 
* Font URLs function http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
*/
function theme_slug_fonts_url() {
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
function theme_slug_scripts_styles() {
    wp_enqueue_style( 'silentcomics-fonts', get_stylesheet_directory_uri() . '/style.css', array(), null );
}
add_action( 'wp_enqueue_scripts', 'theme_slug_scripts_styles' );

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
	
if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'silentcomics-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
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
* remove the  WordPress function
*/
// remove_shortcode('gallery', 'gallery_shortcode');
// add our own replacement function


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
		'not_found'           => __( 'Not Comics found', 'silentcomics' ),
		'not_found_in_trash'  => __( 'Not Comics found in Trash', 'silentcomics' ),
	);
	$args = array(
		'label'               => __( 'Comic', 'silentcomics' ),
		'description'         => __( 'Publish Comics and Webcomics', 'silentcomics' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author'),
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

function my_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );


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
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if($query->is_main_query() && $query->is_comic_story_taxonomy() || $query->is_story() && empty( $query->query_vars['suppress_filters'] ) ) {
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
* Append the query string for the custom post type 'my_custom_post_type' permalink URLs: http://codex.wordpress.org/Plugin_API/Filter_Reference/post_type_link
* (uses add_query_arg and get_post_type)
*
*/

//function append_query_string( $url, $post ) {
//   if ( 'comic' == get_post_type( $post ) ) {
//   return add_query_arg( $_GET, $url );
//   }
//return $url;
//}

/**
* Get the first and last custom type post using get_boundary_post() 
* See https://core.trac.wordpress.org/ticket/27094](https://core.trac.wordpress.org/ticket/27094
*
*/
function get_comic_boundary_post( $in_same_term = false, $excluded_terms = '', $start = true, $taxonomy = 'story' ) {
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