<?php
/**
 * Template Name: Archive all comics
 *
 * The template for displaying comic Archives pages
 * An overview to peruse all stories — has links to custom comic posts in a second loop
 *
 * @package WordPress
 * @subpackage Strip
 */

get_header(); ?>
	<section id="primary"
		<main id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
							printf(
								esc_html( 'STORIES %s', 'strip' ), '<span>' .
								single_cat_title( '', false ) . '</span>'
							);
						?>
					</h1>

				<?php
					// Show an optional term description.
					$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					'<div class="taxonomy-description"' . printf( esc_html( '%s', $term_description ) ) . '</div>';
				endif;
				?>
			</header><!-- .page-header -->

<?php
	// Create and run first loop in reverse order.
	$comic = new WP_Query();
	$comic = new WP_Query(
		array(
					'post_type'      => 'comic',
					'posts_per_page' => 12, // optional, changes default Blog pages number "reading settings" set in dashboard.
					'paged'          => $paged,
					'orderby'        => 'title',
					'order'          => 'DESC',
		)
	);

while ( $comic->have_posts() ) : $comic->the_post();
	get_template_part( 'content-comic' );
	// change to 'content' to style it like the blog entry page.
		?>
	<?php endwhile;
						wp_reset_postdata(); ?>

						<div class="wrap">
								<?php the_posts_pagination( array(
									'prev_text' => _x( '&#8592;', 'Previous page link', 'strip' ) . '<span class="screen-reader-text">' . __( 'Previous page', 'strip' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'strip' ) . '</span>' . _x( '&#8594;', 'Next post link', 'strip' ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'strip' ) . ' </span>',
								) ); ?>
				</div>

	<?php else : ?>

	<?php get_template_part( 'no-results', 'archive-comic' ); ?>

	<?php endif;
			wp_reset_postdata(); ?>

		</main><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
