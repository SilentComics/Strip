<?php
/**
 * The template for displaying image attachments.
 *
 * @package SilentComics
 */

get_header();
// $content_width = 1272;
?>
	<div id="primary" class="content-area image-attachment">
		<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
				<div class="entry-wrap wrap clear">
					<div class="entry-content">
						<div class="entry-attachment">

							<br>
							<div class="attachment">
<?php
/*
 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
 */
$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
foreach ( $attachments as $k => $attachment ) :
	if ( $attachment->ID == $post->ID )
		break;
endforeach;

// If there is more than 1 attachment in a gallery
if ( count( $attachments ) > 1 ) :
	$k++;
	if ( isset( $attachments[ $k ] ) ) :
		// get the URL of the next image attachment
		$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
	else :
		// or get the URL of the first image attachment
		$next_attachment_url = get_attachment_link( $attachments[0]->ID );
	endif;
else :
	// or, if there's only 1 image, get the URL of the image
	$next_attachment_url = wp_get_attachment_url();
endif;
?>
								<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
								/**
 								 * Filter the image attachment size to use.
								 *
								 * @since Silent Comics 2.4.6.2
								 *
								* @param string $image_size Image size. Default 'full'.
								 */
								$image_size = apply_filters( 'silentcomics_attachment_size', 'full');
								echo wp_get_attachment_image( get_the_ID(), $image_size );
								?></a>
		
							</div><!-- .attachment -->

						</div><!-- .entry-attachment -->

						
					<?php // image navigation. ?>
<nav role="navigation" id="image-navigation" class="navigation-image clear double">
				 
				<?php next_image_link( false, __( '<div class="next"><span class="meta-nav">&rarr;</span> <span class="text-nav">Next</span></div>', 'silentcomics' ) ); ?>
				
				<?php previous_image_link( false, __( '<div class="previous"><span class="meta-nav">&larr;</span> <span class="text-nav">Previous</span></div>', 'silentcomics' ) ); ?>
				
				<nav class="navigation-comic"><br><?php echo "<a href='" . get_permalink($post->post_parent). "'>Back to ". get_the_title($post->post_parent) ."</a>"; ?></nav>
			</nav><!-- #image-navigation -->
			
					<?php if ( has_excerpt() ) : ?>
					<div class="entry-caption">
						<?php the_excerpt(); ?>
					</div><!-- .entry-caption -->
					<?php endif; ?>

				</div><!-- .entry-wrap -->
			</article><!-- #post-## -->
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template (activate function to enable comments on single images)
			//	if ( comments_open() || '0' != get_comments_number() )
			//		comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>