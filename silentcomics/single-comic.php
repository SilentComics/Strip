<?php
/**
 *  The Template for displaying all single comics.
 *
 * @package SilentComics
 */
 

if ( post_type_exists( $post_type )  && is_single() ) {
    
    get_header( 'lite' );
}
else
{
    get_header();
}
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

<?php while ( have_posts() ) : the_post(); ?>
			
			<?php if ( 'comic' == get_post_type() ) : ?>
			
			<div class="entry-comic">
				
				<?php get_template_part( 'content-comic' ); ?>

				<?php silentcomics_content_nav( 'comics-nav-below' ); ?>
				
						
			</div><!-- #entry-comic -->
			
			<?php  endif; wp_reset_query(); ?>
				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?> 

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	
	<?php get_footer(); ?>