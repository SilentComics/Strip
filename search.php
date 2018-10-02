<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Strip
 */

get_header(); ?>
<div class="wrap">
	<section id="primary"
	<main id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'strip' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) :
				the_post();

				get_template_part( 'content', get_post_format() );

			endwhile;

			the_posts_pagination();

		else : ?>

<article id="post-0" class="no-results">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'strip' ); ?></h1>
	</header><!-- .page-header -->
<div class="entry-content">
			<p> <?php esc_html_e( 'Bummer, I cannot find what you are looking for.
				Would you like to search in the', 'strip' ); ?>

			<a href="<?php echo esc_url( get_post_type_archive_link( 'comic' ) ); ?>">Comics Archive</a>? Great stuff there.</p>

			<p><?php esc_html_e( 'Or do you prefer trying another search with different keywords?', 'strip' ); ?></p>

			<?php get_search_form(); ?>

		<?php endif; ?>
		</div><!-- .entry-content -->
	</main><!-- #content -->
</section><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>
