<?php
/**
 * The Template for displaying comics.
 *
 * @package SilentComics
 */
 
get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="entry-comic" role="main">

<?php while ( have_posts() ) : the_post(); ?>
			
			<?php if ( 'comic' === get_post_type() && ( is_single() ||  is_front_page() ) ) : ?>

			<div class="entry-comic">

				<?php get_template_part( 'content-comic', get_post_format() ); ?>

				<?php silentcomics_content_nav( 'comics-nav-below' ); ?>
			</div>
			
			

		<?php endif; ?>
				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?> 

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	
	<?php get_footer(); ?>