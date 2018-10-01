<?php
/**
 *  The Template for displaying all single comics
 *
 * @package WordPress
 * @subpackage Strip
 */

if ( post_type_exists( $comics )  && is_single() ) {
	get_header( 'lite' );
} else {
	get_header();
}
?>

	<section id="primary">
		<main id="content" role="main">

	<?php
	// Start the loop.
	while ( have_posts() ) : the_post(); ?>

			<div class="entry-comic">

				<?php get_template_part( 'content-comic' ); ?>

					<div class="wrap clear">

						<h1 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'strip' ); ?></h1>

								<div class="navigation-comic">
								<nav class="nav-first"><a href="<?php echo esc_url( first_comic_link() ); ?>"><?php esc_html_e( 'Start', 'strip' ); ?></a></nav>
								<nav class="nav-previous"><?php previous_post_link( '%link', __( 'Previous', 'strip' ), true, '', 'story' ); ?></nav>
								<nav class="nav-title"><?php the_title( '<h4 class="series-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?></nav>
								<nav class="nav-next"><?php next_post_link( '%link', __( 'Next', 'strip' ), true, '', 'story' ); ?></nav>
								<nav class="nav-last"><a href="<?php echo esc_url( last_comic_link() ); ?>"><?php esc_html_e( 'Last', 'strip' ); ?></a></nav>
							</div><!-- .wrap -->

						<?php set_transient( 'story', $comics );?>

			</div><!-- #entry-comic -->

			<?php wp_reset_postdata(); ?>

		<?php
			// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' !== get_comments_number() ) :
			comments_template();
		endif;

	  endwhile; // end of the loop. ?>

		</main><!-- #content -->
	</section><!-- #primary -->
<?php get_footer( 'lite' ); ?>
