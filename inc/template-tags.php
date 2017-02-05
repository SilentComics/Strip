<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 * TO DO: trim.
 *
 * @package WordPress
 * @subpackage Strip
 */

/**
 * Add custom header image to header area
 */
function strip_header_background() {
	if ( get_header_image() ) {
		$css = '.site-branding { background-image: url(' . esc_url( get_header_image() ) . '); }';
		wp_add_inline_style( 'strip-style', $css );
	}
}
add_action( 'wp_enqueue_scripts', 'strip_header_background', 11 );

if ( ! function_exists( 'strip_content_nav' ) ) :

	/**
	 * Display navigation to next/previous pages when applicable
	 *
	 * @param $string $nav_id strip_content_nav.
	 */
	function strip_content_nav( $nav_id ) {
		global $wp_query;
		// Don't print empty markup on single pages if there's nowhere to navigate.
		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}

		$nav_class = ( is_single() || is_tax( 'story' ) ) ? 'post-navigation' : 'paging-navigation' ;

		?> <div class="wrap clear">

		<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo esc_attr( $nav_class ); ?> clear">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'strip' ); ?></h1>

		<?php  if ( 'comic' === get_post_type() && ( is_single() ) ) : // comics navigation links.

			$nav_class .= ' navigation-comic'; ?>

				<div class="navigation-comic">
				<nav class="nav-first"><a href="<?php echo esc_url( first_comic_link() ); ?>"><?php esc_html_e( 'Start', 'strip' ); ?></a></nav>
				<nav class="nav-previous"><?php previous_post_link( '%link', __( 'Previous', 'strip' ), true, '', 'story' ); ?></nav>
				<nav class="nav-title"><?php the_title( '<h4 class="series-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?></nav>
				<nav class="nav-next"><?php next_post_link( '%link', __( 'Next', 'strip' ), true, '', 'story' ); ?></nav>
				<nav class="nav-last"><a href="<?php echo esc_url( last_comic_link() ); ?>"><?php esc_html_e( 'Last', 'strip' ); ?></a></nav>
			</div><!-- .navigation-comic -->

		<?php elseif ( is_single() ) : // navigation links for single posts. ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&#8592;', 'Previous post link', 'strip' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&#8594;', 'Next post link', 'strip' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for blog, archive, and search pages. ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous-page"><?php next_posts_link( __( 'Older posts', 'strip' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next-page"><?php previous_posts_link( __( 'Recent posts', 'strip' ) ); ?></div>
			<?php endif; ?>

		<?php endif; ?>

				</div><!-- .entry-wrap -->
			</nav><!-- #<?php echo esc_attr( $nav_id ); ?> -->
			<?php
	}
endif; // strip_content_nav.

if ( ! function_exists( 'strip_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function strip_entry_meta() {
		if ( is_sticky() && is_home() ) {
			printf(
				__( '<span class="featured-post"><a href="%1$s" title="%2$s" rel="bookmark">Sticky</a></span>', 'strip' ),
				esc_url( get_permalink() ),
				esc_attr( get_the_time() )
			);
		}

		if ( 'post' === get_post_type() ) {
			printf(
				__( '<span class="entry-date"><a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a></span><span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span>', 'strip' ),
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				esc_attr( get_the_date( 'c' ) ),
				get_the_date(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'strip' ), get_the_author() ) ),
				get_the_author()
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'strip' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html( '%1$s', 'strip' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
endif;

if ( ! function_exists( 'strip_term_description' ) ) :
	/**
	 * Display optional term description for category, tag and custom taxonomy pages.
	 *
	 * @since Strip 1.0
	 */
	function strip_term_description() {
		// Show an optional term description.
		$term_description = term_description();

		if ( is_post_type_archive( 'comic' ) || is_category() || is_tag() || is_tax( 'story' ) && ! empty( $term_description ) ) :
			printf( '<div class="taxonomy-description">%s</div>', $term_description, 'strip' ); // WPCS: XSS OK.
			endif;
	}
endif; // ends check for strip_term_description.

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function strip_categorized_blog() {
	$category_count = get_transient( 'strip_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'strip_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}


/**
 * Flush out the transients used in strip_categorized_blog.
 */
function strip_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'strip_categories' );
}
add_action( 'edit_category', 'strip_category_transient_flusher' );
add_action( 'save_post',     'strip_category_transient_flusher' );

if ( ! function_exists( 'strip_the_custom_logo' ) ) :
	/**
	 * Displays the optional custom logo.
	 *
	 * Does nothing if the custom logo is not available.
	 *
	 * @since strip 1.0
	 */
	function strip_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
endif;

/**
 * Get the first and last custom type post using get_boundary_post()
 *
 * @link https://core.trac.wordpress.org/ticket/27094
 *
 * @param bool   $in_same_term   Optional. Whether returned post should be in a same taxonomy term.
 * @param bool   $start          Optional. Whether to retrieve first or last post.
 * @param string $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return mixed Array containing the boundary post object if successful, null otherwise.
 */
function get_comic_boundary_post( $in_same_term = false, $start = true, $taxonomy = 'category' ) {
	global $post;
	setup_postdata( $post );
	if ( ! taxonomy_exists( $taxonomy ) ) {
		return null;
	}

	$query_args = array(
		'post_type'              => 'comic',
		'posts_per_page'         => 1,
		'order'                  => $start ? 'ASC' : 'DESC',
		'no_found_rows'          => true,
		'update_post_term_cache' => false,
		'update_post_meta_cache' => false,
	);

	$term_array = array();
	if ( $in_same_term ) {
		if ( $in_same_term ) {
			$term_array = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
		}
		$query_args['tax_query'] = array( array(
			'taxonomy' => $taxonomy,
			'terms' => array_merge( $term_array ),
		),
		);
	}

	$get_posts = new wp_query;
	return $get_posts -> query( $query_args );
	wp_reset_postdata();
}

/**
 * Link to the first comic post in same term
 */
function first_comic_link() {
	$first = get_comic_boundary_post( true, '', true, 'story' );
	apply_filters( 'the_title', $first[0]->post_title );

	echo esc_html( get_permalink( $first[0]->ID ) );
}

/**
 * Link to the last comic post in same term
 */
function last_comic_link() {
	$last = get_comic_boundary_post( true, '', false, 'story' );
	apply_filters( 'the_title', $last[0]->post_title );

	echo esc_html( get_permalink( $last[0]->ID ) );
}
