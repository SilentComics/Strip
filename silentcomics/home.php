<?php
/**
 * Template Name: Home
 * The default home page for Silent Comics - it should pick the last published comics or the first and allow pagination
 * @package SilentComics
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		
		<?php
new WP_Query( array( 'post_type'  => 'comic','orderby' => array( 'title' => 'DESC', 'menu_order' => 'ASC' ) ) ); ?>
	
		<?php if ( have_posts() ) : ?>
		
	<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php silentcomics_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>