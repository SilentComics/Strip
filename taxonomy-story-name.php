<?php
/**
 * The template for archiving the example "name" story pages
 * Clone this template and replace "name" by your own story name.
 *
 * @package WordPress
 * @subpackage Strip
 */

		get_header(); ?>

	<section id="primary"
		<main id="content" class="wrap" role="main">

	<header class="page-header">

	<h1 class="page-title"><?php single_term_title( 'All episodes: ' ); ?></h1>

	<?php
	// Show an optional term description.
	$term_description = term_description();
	if ( ! empty( $term_description ) ) :
		printf( '<div class="taxonomy-description">%s</div>', $term_description, 'strip' ); // WPCS: XSS OK.
endif;
?>

	</header><!-- .page-header -->

	<?php
	// get the correct paged figure on a static page.
	if ( get_query_var( 'paged' ) ) {
		   $paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		   $paged = get_query_var( 'page' );
	} else {
		   $paged = 1;
	}

	// Call and run loop in ascending order.
	$args = array(

	'post_type'       => 'comic',
	'posts_per_page'  => 3, // // Must be < or = to the number set in function.php to avoid breaking pagination.
	'story'           => 'name', // change this to your own story name, clone template for multiple stories.
	'orderby'         => 'title', // you can order by date if you so prefer.
	'paged'           => $paged,
	'order'           => 'ASC',
	);

	$loop = new WP_Query( $args );
	// Start the loop.
	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ) : $loop->the_post();

			get_template_part( 'content-series' ); ?>

		<?php endwhile;
		wp_reset_postdata(); ?>

		<?php
		global $wp_query;

		$big = 999999999; // need an unlikely integer.
		$translated = __( 'Page', 'strip' ); // supply translatable string.

		echo wp_kses_post( paginate_links(
			array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total' => $wp_query->max_num_pages,
			'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>',
			'prev_text' => __( 'Previous', 'strip' ), // In case you want to change the previous link text.
			'next_text' => __( 'Next', 'strip' ), // In case you want to change the next link text.
			'type' => 'title', // How you want the return value to be formatted.
			'add_fragment' => '#result', // Your anchor.
		) ) );

		else :
			get_template_part( 'no-results', 'archive-comic' );
		endif; ?>

		</main><!-- #content -->
	</section><!-- #primary -->
<?php get_footer(); ?>
