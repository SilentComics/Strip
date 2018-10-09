<?php
/**
 * The template for archiving the example "name" story pages
 * Clone this template and replace "name" by your own story name to get going.
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

	<?php // Call and run loop in ascending order.
	$args = array(

	'post_type'       => 'comic',
	'story'           => 'name', // Change this to your own story name, clone template for multiple stories.
	'orderby'         => 'title', // you can order by date if you so prefer.
	'paged'           => $paged,
	'order'           => 'ASC', // It is either ASC or DESC, standing for ascendant or descendant order.
	);

	$loop = new WP_Query( $args );
	// Start the loop.
	if ( $loop->have_posts() ) :
		$i = 1;
		while ( $loop->have_posts() && $i < 3 ) : $loop->the_post(); // 3 sets the posts per page. @link https://digwp.com/2009/12/limit-posts-without-plugin/

			get_template_part( 'content-series' ); ?>

				<?php  $i++;
endwhile;
		wp_reset_postdata(); ?>

<div class="wrap">
	<?php the_posts_pagination( array(
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'strip' ) . ' </span>',
		'prev_text' => __( 'Previous', 'strip' ), // In case you want to change the previous link text.
		'next_text' => __( 'Next', 'strip' ), // In case you want to change the next link text.
		'type' => 'title', // How you want the return value to be formatted.
		'add_fragment' => '#result', // Your anchor.
	) ); ?>
</div>

<?php else :
	get_template_part( 'no-results', 'archive-comic' );
endif; ?>

		</main><!-- #content -->
	</section><!-- #primary -->
<?php get_footer(); ?>
