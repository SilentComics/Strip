<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage Strip
 */

get_header( 'lite' );
$content_width = 1920;
?>
	<div id="primary" class="content-area image-attachment">
		<div id="content" class="site-content" role="main">

	<?php
	// Start the loop.
	while ( have_posts() ) :
		the_post(); ?>

			<article id="post-<?php the_ID(); ?>">
				<div class="wrap">

						<div class="entry-attachment">

<?php
					/**
					 * Filter the default strip image attachment size.
					 *
					 * @since strip 2.5.0
					 *
					 * @param string $image_size Image size. Default 'full'.
					 */
					$image_size = apply_filters( 'strip_attachment_size', 'full' );

					echo wp_get_attachment_image( get_the_ID(), $image_size );

					?>

			</div><!-- .entry-attachment -->

		<?php // image navigation. ?>
<nav role="navigation" id="image-navigation" class="image-navigation">

				<div class="previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> <span class="text-nav">Previous panel</span>', 'strip' ) ); ?></div>
				<div class="next"><?php next_image_link( false, __( '<span class="meta-nav">&rarr;</span> <span class="text-nav">Next panel</span>', 'strip' ) ); ?></div>

				<nav class="post-parent-title">
					<?php printf( '<a href="%s" class="post-parent-title">%s</a>',
						esc_url( get_permalink( $post->post_parent ) ),
						esc_html( get_the_title( $post->post_parent ) )
					); ?>
				</nav>
</nav><!-- #image-navigation --><!-- #image-navigation -->

		<?php if ( has_excerpt() ) : ?>
					<div class="entry-caption">
		<?php the_excerpt(); ?>
					</div><!-- .entry-caption -->
		<?php endif; ?>

					</div><!-- .entry-content -->
				</div><!-- .entry-wrap -->
			</article><!-- #post-## -->

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer( 'lite' ); ?>
