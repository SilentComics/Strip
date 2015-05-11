<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package SilentComics
 */

if ( ! function_exists( 'silentcomics_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function silentcomics_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}
	
// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;
		
		$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';
	
		if ( !'comic' === get_post_type() )
		$nav_class .= ' navigation-comic'; ?>
			
			<?php // Add a class when both navigation items are there.
	if ( ( get_previous_posts_link() && get_next_posts_link() ) || ( is_single() && ( $next && $previous ) ) )
		$nav_class .= ' double';
	?>

	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?> clear">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'silentcomics' ); ?></h1>
		
		<?php if ( 'comic' === get_post_type() && ( is_single() || is_front_page() ) ) : //comics navigation links ?>
		
				<div class="navigation-comic">
				<nav class="nav-first"><a href="<?php echo esc_url( first_comic_link()); ?>"><?php esc_html_e( '&#124;&#10094; First', 'First Episode', 'silentcomics' ); ?></a></nav>
				<nav class="nav-previous"><?php previous_post_link( '%link', '&#10094; Previous', TRUE ); ?></nav>
				<nav class="nav-title"><?php the_title( '<h6 class="comic-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h6>' ); ?></nav>
				<nav class="nav-next"><?php next_post_link( '%link', 'Next &#10095;', TRUE ); ?></nav>
				<nav class="nav-last"><a href="<?php echo esc_url( last_comic_link() ); ?>"><?php esc_html_e( 'Latest &#10095;&#124;', 'Latest Episode', 'silentcomics' ); ?></a></nav>
			</div>

			<?php elseif ( is_single() ) : // navigation links for single posts ?>
			<div class="wrap clear">
				
		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&#8592;', 'Previous post link', 'silentcomics' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&#8594;', 'Next post link', 'silentcomics' ) . '</span>' ); ?>
		
		

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'silentcomics' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'silentcomics' ) ); ?></div>
			<?php endif; ?>

		<?php endif; ?>

		</div>
	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
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
				<?php if ( $comment->comment_approved == '0' ) : ?>
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

if ( ! function_exists( 'silentcomics_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function silentcomics_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'silentcomics_attachment_size', array( 1272, 1272 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

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

	if ( 'post' == get_post_type() ) {
		printf( __( '<span class="entry-date"><a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a></span><span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span>', 'silentcomics' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'silentcomics' ), get_the_author() ) ),
			get_the_author()
		);
	}

	$tags_list = get_the_tag_list( '', __( ', ', 'silentcomics' ) );
	if ( $tags_list )
		echo '<span class="tags-links">' . $tags_list . '</span>';
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function silentcomics_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'silentcomics_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so silentcomics_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so silentcomics_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in silentcomics_categorized_blog
 */
function silentcomics_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'silentcomics_category_transient_flusher' );
add_action( 'save_post',     'silentcomics_category_transient_flusher' );

/**
 * Link to the first comic post in category
 *
 * @param string $format
 * @param array $args
 */
 
function first_comic_link( $args = array() ) {
	$first = get_comic_boundary_post( TRUE, '', TRUE );
    apply_filters( 'the_title', $first[0]->post_title ); 

$query = new WP_Query( $args );
    
if ( $query->have_posts() )
		$query->the_post(); 
		return post_permalink( $first[0]->ID );
}      
wp_reset_postdata();

/**
 * Link to the last post in a series.
 *
 * @param string $format
 * @param array $args
 */
 
 function last_comic_link( $args = array() ) {  
	$last = get_comic_boundary_post( TRUE, '', FALSE );
    apply_filters( 'the_title', $last[0]->post_title );
	 
$query = new WP_Query( $args );    
     
if ( $query->have_posts() )
		$query->the_post(); 
		return post_permalink( $last[0]->ID );
}      
wp_reset_postdata();