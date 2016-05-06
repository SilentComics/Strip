<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features. // TO DO: trim the sleaze
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

if ( ! function_exists( 'silentcomics_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since SilentComics 2.5.7
 */
function silentcomics_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
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
       // 'update_term_meta_cache' => true, // added
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