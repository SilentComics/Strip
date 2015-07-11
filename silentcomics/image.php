<?php
/**
 * The template for displaying image attachments.
 *
 * @package SilentComics
 */

get_header();
$content_width = 696;
?>
	<div id="primary" class="content-area image-attachment">
		<div id="content" class="site-content" role="main">

		
		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_title(); ?>" <?php post_class( 'clear' ); ?>>
				<div class="entry-wrap wrap clear">
					<div class="entry-content">
						<div class="entry-attachment">
							<div class="attachment">
								<br>
								<?php SilentComics_the_attached_image(); ?>
							</div><!-- .attachment -->
						</div><!-- .entry-attachment -->

<nav role="navigation" id="image-navigation" class="navigation-image clear double">
				<?php next_image_link( false, __( '<div class="next"><span class="meta-nav">&rarr;</span> <span class="text-nav">Next</span></div>', 'SilentComics' ) ); ?>
				<?php previous_image_link( false, __( '<div class="previous"><span class="meta-nav">&larr;</span> <span class="text-nav">Previous</span></div>', 'SilentComics' ) ); ?>
				<nav class="text-nav"><?php echo "<h6><a href='" . get_permalink($post->post_parent). "'>Back to ". get_the_title($post->post_parent) ."</a></h6>"; ?></nav>
			</nav><!-- #image-navigation -->
			
			

					<?php if ( has_excerpt() ) : ?>
					<div class="entry-caption">
						<?php the_excerpt(); ?>
					</div><!-- .entry-caption -->
					<?php endif; ?>

				</div><!-- .entry-wrap -->
			</article><!-- #post-## -->
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>