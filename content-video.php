<?php
/**
 * Template part for displaying the video post format
 *
 * @package WordPress
 * @subpackage Strip
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
	<div class="entry-wrap wrap clear">

	<?php
	if ( '' !== get_the_post_thumbnail() ) :
		the_post_thumbnail( 'strip-featured-thumbnail' );
	endif;
	?>

	<header class="entry-header">
		<?php
			$categories_list = get_the_category_list( __( ', ', 'strip' ) );

		if ( ! is_single() ) :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		else :
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;
		?>
	</header><!-- .entry-header -->
	<br>
	<div class="entry-content">
		<?php
			the_content(sprintf(
				/* translators: %s: Name of current post. */
				esc_html( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'strip' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			));

		?>
	</div><!-- .entry-content -->

			<footer class="entry-meta">
				<?php strip_entry_meta(); ?>

				<span class="entry-format"><a href="<?php echo esc_url( get_post_format_link( 'video' ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'strip' ), get_post_format_string( 'video' ) ) ); ?>"><?php echo esc_html( get_post_format_string( 'video' ) ); ?></a></span>

				<?php edit_post_link( __( 'Edit', 'strip' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->

	<?php if ( has_excerpt() ) : ?>
		<div class="entry-summary">
	<?php do_action( 'strip_formatted_posts_excerpt_before' ); ?>
	<?php the_excerpt(); ?>
	<?php do_action( 'strip_formatted_posts_excerpt_after' ); ?>
		</div><!-- .entry-caption -->
	<?php endif; ?>

	</div><!-- .entry-wrap -->
</article><!-- #post-## -->
