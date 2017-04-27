<?php
/**
 * The Template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Strip
 */

get_header(); ?>

		<section id="primary">
			<main id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || '0' !== get_comments_number() ) :
				comments_template();
			endif;

			the_post_navigation( array(
				'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'strip' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . esc_html_x( '&larr;', 'Previous post link', 'strip' ) . '</span> %title</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'strip' ) . '</span> %title <span aria-hidden="true" class="nav-subtitle">' . esc_html_x( '&rarr;', 'Next post link', 'strip' ) . '</span> </span>',
			) );

		endwhile; // end of the loop. ?>

		</main><!-- #content -->
	</section><!-- #primary -->

<br><br>

<?php get_footer(); ?>
