<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 * TO DO: trim the sleaze
 *
 * @package SilentComics
 */
 
/**
* Add custom header image to header area
*/
function silentcomics_header_background() {
	if ( get_header_image() ) {
		$css = '.site-branding { background-image: url(' . esc_url( get_header_image() ) . '); }';
		wp_add_inline_style( 'silentcomics-style', $css );
	}
}
add_action( 'wp_enqueue_scripts', 'silentcomics_header_background', 11 );

if ( ! function_exists( 'silentcomics_content_nav' ) ) :

/**
 * Display navigation to next/previous pages when applicable
 */
function silentcomics_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	
/**
* Fast next & previous links 
* see http://wordpress.stackexchange.com/questions/101435/get-adjacent-post-alternative-on-a-very-large-db
*/
//do_action( 'fast_prev_post_link' );
//do_action( 'fast_next_post_link' );
	
// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;
		
		$nav_class = ( is_single() || is_tax('story') ) ? 'post-navigation' : 'paging-navigation' ;

	?> <div class="wrap clear">
	
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?> clear">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'silentcomics' ); ?></h1>
		
		<?php  if ( 'comic' == get_post_type() && ( is_single() ||  is_front_page() ) ) : //comics navigation links 
			
		$nav_class .= ' navigation-comic'; ?> 
		
				<div class="navigation-comic">
				<nav class="nav-first"><a href="<?php echo esc_url( first_comic_link()); ?>"><?php esc_html_e( '&#124;&#10094; Start', 'silentcomics' ); ?></a></nav>
				<nav class="nav-previous"><?php previous_post_link('%link',  __( 'Previous', 'silentcomics' ), $in_same_term = true, $excluded_terms = '', $taxonomy = 'story' ); ?></nav>
				<nav class="nav-title"><?php the_title( '<h4 class=".series-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?></nav>
				<nav class="nav-next"><?php next_post_link( '%link', __('Next', 'silentcomics' ), true, '', 'story' ); ?></nav>  
				<nav class="nav-last"><a href="<?php echo esc_url( last_comic_link()); ?>"><?php esc_html_e( 'Last &#10095;&#124;', 'silentcomics' ); ?></a></nav>
			</div>

			<?php elseif ( is_single() ) : // navigation links for single posts ?>
				
		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&#8592;', 'Previous post link', 'silentcomics' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&#8594;', 'Next post link', 'silentcomics' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for blog, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous-page"><?php next_posts_link( __( 'Older posts', 'silentcomics' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next-page"><?php previous_posts_link( __( 'Recent posts', 'silentcomics' ) ); ?></div>
			<?php endif; ?>

		<?php endif; ?>

		</div>
	</nav><!-- #<?php echo ( $nav_id ); ?> -->
	<?php
}
endif; // silentcomics_content_nav

if ( ! function_exists( 'silentcomics_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments. Remove it to solve conflict with toggle comments  
 */
function silentcomics_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'silentcomics' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'silentcomics' ), '<span class="edit-link">', '<span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<span class="comment-author-avatar"><?php echo get_avatar( $comment, 96 ); ?></span>
					<?php printf( __( '%s <span class="says">says:</span>', 'silentcomics' ), sprintf( '<cite class="author-cite">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				
			</footer>
			
			<div class="comment-content">
				<?php comment_text(); ?>
				<?php if ( $comment->comment_approved === '0' ) : ?>
					<p><em><?php _e( 'Your comment is awaiting moderation.', 'silentcomics' ); ?></em></p>
				<?php endif; ?>
			</div>

			<div class="comment-meta commentmetadata">
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
				<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'silentcomics' ), get_comment_date(), get_comment_time() ); ?>
				</time></a>
				<span><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
				<span><?php edit_comment_link( __( 'Edit', 'silentcomics' ), '<span class="edit-link">', '<span>' ); ?></span>
			</div><!-- .comment-meta .commentmetadata -->
			
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for silentcomics_comment()

if ( ! function_exists( 'silentcomics_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function silentcomics_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		printf( __( '<span class="featured-post"><a href="%1$s" title="%2$s" rel="bookmark">Sticky</a></span>', 'silentcomics' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() )
		);

	if ( 'post' === get_post_type() ) {
		printf( __( '<span class="entry-date"><a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a></span><span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span>', 'silentcomics' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'silentcomics' ), get_the_author() ) ),
			get_the_author()
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'silentcomics' ) );
	if ( $tags_list )
		echo '<span class="tags-links">' . $tags_list . '</span>';
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function silentcomics_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'silentcomics_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'silentcomics_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so silentcomics_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so silentcomics_categorized_blog should return false.
		return false;
	}
}

/**
 * Flushes out the transients used in silentcomics_categorized_blog.
 */
function silentcomics_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'silentcomics_categories' );
}
add_action( 'edit_category', 'silentcomics_category_transient_flusher' );
add_action( 'save_post',     'silentcomics_category_transient_flusher' );

if ( ! function_exists( 'silentcomics_the_site_logo' ) ) :
/**
 * Displays the optional site logo.
 *
 * Returns early if the site logo is not available.
 *
 * @since SilentComics 2.5.6.9
 */
function silentcomics_the_site_logo() {
	if ( ! function_exists( 'the_site_logo' ) ) {
		return;
	} else {
		the_site_logo();
	}
}
endif;

/**
* Get the first and last custom type post using get_boundary_post() 
* See https://core.trac.wordpress.org/ticket/27094
*
*/
function get_comic_boundary_post( $in_same_term = false, $excluded_terms = '', $start = true, $taxonomy = 'category' ) {
    $post = get_post();
    if ( ! $post || ! is_single() || is_attachment() ||  ! taxonomy_exists( $taxonomy ) )
        return null;

    $query_args = array(
        'post_type' => 'comic',
        'posts_per_page' => 1,
        'order' => $start ? 'ASC' : 'DESC',
        'no_found_rows' => true,
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

/**
 * Link to the first comic post in same term
 * @param string $format
 * @param array $args
 */ 
 function first_comic_link( $args = array() ) {
	$first = get_comic_boundary_post( TRUE, '', TRUE, 'story' );
    apply_filters( 'the_title', $first[0]->post_title ); 

$query = new WP_Query( $args );
    
if ( $query->have_posts() )
	$query->the_post(); 
	echo get_permalink( $first[0]->ID );	
}  

wp_reset_postdata();

/**
 * Link to the last comic post in same term
 * @param string $format
 * @param array $args
 */ 
function last_comic_link( $args = array() ) {  
	$last = get_comic_boundary_post( TRUE, '', FALSE, 'story' );
    apply_filters( 'the_title', $last[0]->post_title );
	 
$query = new WP_Query( $args );    
     
if ( $query->have_posts() )
	$query->the_post(); 
	echo get_permalink( $last[0]->ID );
} 

wp_reset_postdata();


if ( ! function_exists( 'silentcomics_product_categories' ) ) {
	/**
	 * Display Product Categories
	 * Hooked into the `homepage` action in the homepage template
	 * @since  1.0.0
	 * @return void
	 */
	function silentcomics_product_categories( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'silentcomics_product_categories_args', array(
				'limit' 			=> 8,
				'columns' 			=> 8,
				'child_categories' 	=> 0,
				'orderby' 			=> 'name',
				'title'				=> __( 'Product Categories', 'silentcomics' ),
				) );

			echo '<section class="silentcomics-product-section silentcomics-product-categories">';

				do_action( 'silentcomics_homepage_before_product_categories' );

				echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

				do_action( 'silentcomics_homepage_after_product_categories_title' );

				echo silentcomics_do_shortcode( 'product_categories',
					array(
						'number' 	=> intval( $args['limit'] ),
						'columns'	=> intval( $args['columns'] ),
						'orderby'	=> esc_attr( $args['orderby'] ),
						'parent'	=> esc_attr( $args['child_categories'] ),
						) );

				do_action( 'silentcomics_homepage_after_product_categories' );

			echo '</section>';

		}
	}
}

if ( ! function_exists( 'silentcomics_recent_products' ) ) {
	/**
	 * Display Recent Products
	 * Hooked into the `homepage` action in the homepage template
	 * @since  1.0.0
	 * @return void
	 */
	function silentcomics_recent_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'silentcomics_recent_products_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'title'				=> __( 'Recent Products', 'silentcomics' ),
				) );

			echo '<section class="silentcomics-product-section silentcomics-recent-products">';

				do_action( 'silentcomics_homepage_before_recent_products' );

				echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

				do_action( 'silentcomics_homepage_after_recent_products_title' );

				echo silentcomics_do_shortcode( 'recent_products',
					array(
						'per_page' 	=> intval( $args['limit'] ),
						'columns'	=> intval( $args['columns'] ),
						) );

				do_action( 'silentcomics_homepage_after_recent_products' );

			echo '</section>';
		}
	}
}

if ( ! function_exists( 'silentcomics_featured_products' ) ) {
	/**
	 * Display Featured Products
	 * Hooked into the `homepage` action in the homepage template
	 * @since  1.0.0
	 * @return void
	 */
	function silentcomics_featured_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'silentcomics_featured_products_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'orderby'			=> 'date',
				'order'				=> 'desc',
				'title'				=> __( 'Featured Products', 'silentcomics' ),
				) );

			echo '<section class="silentcomics-product-section silentcomics-featured-products">';

				do_action( 'silentcomics_homepage_before_featured_products' );

				echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

				do_action( 'silentcomics_homepage_after_featured_products_title' );

				echo silentcomics_do_shortcode( 'featured_products',
					array(
						'per_page' 	=> intval( $args['limit'] ),
						'columns'	=> intval( $args['columns'] ),
						'orderby'	=> esc_attr( $args['orderby'] ),
						'order'		=> esc_attr( $args['order'] ),
						) );

				do_action( 'silentcomics_homepage_after_featured_products' );

			echo '</section>';

		}
	}
}

if ( ! function_exists( 'silentcomics_popular_products' ) ) {
	/**
	 * Display Popular Products
	 * Hooked into the `homepage` action in the homepage template
	 * @since  1.0.0
	 * @return void
	 */
	function silentcomics_popular_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'silentcomics_popular_products_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'title'				=> __( 'Top Rated Products', 'silentcomics' ),
				) );

			echo '<section class="silentcomics-product-section silentcomics-popular-products">';

				do_action( 'silentcomics_homepage_before_popular_products' );

				echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

				do_action( 'silentcomics_homepage_after_popular_products_title' );

				echo silentcomics_do_shortcode( 'top_rated_products',
					array(
						'per_page' 	=> intval( $args['limit'] ),
						'columns'	=> intval( $args['columns'] ),
						) );

				do_action( 'silentcomics_homepage_after_popular_products' );

			echo '</section>';

		}
	}
}

if ( ! function_exists( 'silentcomics_on_sale_products' ) ) {
	/**
	 * Display On Sale Products
	 * Hooked into the `homepage` action in the homepage template
	 * @since  1.0.0
	 * @return void
	 */
	function silentcomics_on_sale_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'silentcomics_on_sale_products_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'title'				=> __( 'On Sale', 'silentcomics' ),
				) );

			echo '<section class="silentcomics-product-section silentcomics-on-sale-products">';

				do_action( 'silentcomics_homepage_before_on_sale_products' );

				echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

				do_action( 'silentcomics_homepage_after_on_sale_products_title' );

				echo silentcomics_do_shortcode( 'sale_products',
					array(
						'per_page' 	=> intval( $args['limit'] ),
						'columns'	=> intval( $args['columns'] ),
						) );

				do_action( 'silentcomics_homepage_after_on_sale_products' );

			echo '</section>';

		}
	}
}
