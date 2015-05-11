<?php
/**
 * The template for displaying image attachments.
 *
 * @package SilentComics
 */

get_header();
$content_width = 1272;
?>
	<div id="primary" class="content-area image-attachment">
		<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
				<div class="entry-wrap wrap clear">
					<div class="entry-content">
						<div class="entry-attachment">
							<div class="attachment">
								<?php SilentComics_the_attached_image(); ?>
							</div><!-- .attachment -->
						</div><!-- .entry-attachment -->

						<?php
							the_content();
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'SilentComics' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
						?>
						</div><!-- .entry-content -->

<nav role="navigation" id="image-navigation" class="navigation-image clear double">
				<?php next_image_link( false, __( '<div class="next"><span class="meta-nav">&rarr;</span> <span class="text-nav">Next</span></div>', 'SilentComics' ) ); ?>
				<?php previous_image_link( false, __( '<div class="previous"><span class="meta-nav">&larr;</span> <span class="text-nav">Previous</span></div>', 'SilentComics' ) ); ?>
			</nav><!-- #image-navigation -->
	
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<footer class="entry-meta">
						<?php
							$metadata = wp_get_attachment_metadata();
							printf( __( '<span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span><span class="full-size-link"><a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a></span><span class="parent-post-link"><a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a></span>', 'SilentComics' ),
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() ),
								esc_url( wp_get_attachment_url() ),
								$metadata['width'],
								$metadata['height'],
								esc_url( get_permalink( $post->post_parent ) ),
								esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
								strip_tags( get_the_title( $post->post_parent ) )
							);

							edit_post_link( __( 'Edit', 'SilentComics' ), '<span class="edit-link">', '</span>' );
						?>
					</footer><!-- .entry-meta -->

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