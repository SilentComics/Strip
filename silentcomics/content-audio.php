<?php
/**
 * @package SilentComics
 */

// Access global variable directly to set content_width
if ( isset( $GLOBALS['content_width'] ) )
	$GLOBALS['content_width'] = 696;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>

	<div class="entry-wrap">
		<div class="entry-info">
			<header class="entry-header">
				<?php
					$categories_list = get_the_category_list( __( ', ', 'SilentComics' ) );
//					if ( $categories_list && SilentComics_categorized_blog() )
						echo '<span class="categories-links">' . $categories_list . '</span>';

					if ( ! is_single() ) :
						the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
					else :
						the_title( '<h1 class="entry-title">', '</h1>' );
					endif;
				?>
			</header><!-- .entry-header -->

			<footer class="entry-meta">

				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'SilentComics' ), __( '1 Comment', 'SilentComics' ), __( '% Comments', 'SilentComics' ) ); ?></span>
				<?php endif; ?>

				<span class="entry-format"><a href="<?php echo esc_url( get_post_format_link( 'audio' ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'SilentComics' ), get_post_format_string( 'audio' ) ) ); ?>"><?php echo get_post_format_string( 'audio' ); ?></a></span>

				<?php edit_post_link( __( 'Edit', 'SilentComics' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->

		</div><!-- .entry-info -->

		<div class="entry-content clear">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'SilentComics' ) ); ?>
			<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'SilentComics' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry-wrap -->
</article><!-- #post-## -->