<?php
/**
 * Template Name: Comics Archive by titles
 * The template to display comic Archives by titles only.
 *
 * @package WordPress
 * @subpackage Strip
 */

	get_header(); ?>

	<section id="primary"
		<main id="content" role="main">

			<header class="entry-header">

			<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

			<?php // call the series by title and list them. ?>

			<h2 class="series-title">

			<?php
				$args = array(
				'post_type'     => 'comic',
				'title_li'      => esc_html_e( '', 'strip' ),
				);
				wp_list_pages( $args );
			?>
			</h2>
			<br>

		</main><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
