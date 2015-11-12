<?php
/**
 * The template for displaying image attachments.
 *
 * @package SilentComics
 */

get_header( 'simple' );
// $content_width = 1920;
?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the loop.
				while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-wrap wrap clear">
					<div class="entry-content">
						<br>
						<div class="entry-attachment">

<?php
								/**
								 * Filter the default Silentcomics image attachment size.
								 *
								 * @since Silent Comics 2.5.0
								 *
								 * @param string $image_size Image size. Default 'full'.
								 */
								$image_size = apply_filters( 'silentcomics_attachment_size', 'full' );

								echo wp_get_attachment_image( get_the_ID(), $image_size );
								
								?>

						</div><!-- .entry-attachment -->

					<?php // image navigation. ?>
<nav role="navigation" id="image-navigation" class="image-navigation  clear double">
				
				<div class="previous"><?php previous_image_link( false, __( '<div class="previous"><span class="meta-nav">&larr;</span> <span class="text-nav">Previous</span></div>', 'silentcomics' ) ); ?></div>
				<div class="next"><?php next_image_link( false, __( '<div class="next"><span class="meta-nav">&rarr;</span> <span class="text-nav">Next</span></div>', 'silentcomics' ) ); ?></div>
				
				<nav class="post-title"><br><?php echo "<a href='" . get_permalink($post->post_parent). "'>Back to ". get_the_title($post->post_parent) ."</a>"; ?></nav>
			</nav><!-- #image-navigation -->
			
					<?php if ( has_excerpt() ) : ?>
					<div class="entry-caption">
						<?php the_excerpt(); ?>
					</div><!-- .entry-caption -->
					<?php endif; ?>
					
					<?php
							the_content();
						?>
					</div><!-- .entry-content -->
				</div><!-- .entry-wrap -->
			</article><!-- #post-## -->
			
			<?php
				/** If comments are open or we have at least one comment, load up the comment template 
				 *(activate this function to enable comments on single images)  */
			//	if ( comments_open() || '0' != get_comments_number() )
			//		comments_template();
					
				// End the loop.
				endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>