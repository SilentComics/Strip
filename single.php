<?php
/**
 * The Template for displaying all single posts.
 *
 * @package SilentComics
 */

get_header(); ?>

		<section id="primary">
			<main id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

			<?php silentcomics_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>
