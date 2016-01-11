<?php
/**
 * @package SilentComics
 */

// Access global variable directly to set content_width
if ( isset( $GLOBALS['content_width'] ) )
	$GLOBALS['content_width'] = 1920;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrap wrap clear">

<?php
			if ( '' != get_the_post_thumbnail() ) :
				the_post_thumbnail( 'silentcomics-featured-thumbnail' );
			endif;
		?>

		<header class="entry-header">
			<?php
				$categories_list = get_the_category_list( __( ', ', 'silentcomics' ) );
				if ( $categories_list && silentcomics_categorized_blog() )
					echo '<span class="categories-links">' . $categories_list . '</span>';

				if ( ! is_single() ) :
					the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				else :
					the_title( '<h1 class="entry-title">', '</h1>' );
				endif;
			?>
					
		<div class="entry-content clear">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'silentcomics' ) ); ?>
			
		</div><!-- .entry-content -->
		</header><!-- .entry-header -->

		<footer class="entry-meta">
			<?php silentcomics_entry_meta(); ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'silentcomics' ), __( '1 Comment', 'silentcomics' ), __( '% Comments', 'silentcomics' ) ); ?></span>
			<?php endif; ?>

			<span class="entry-format"><a href="<?php echo esc_url( get_post_format_link( 'gallery' ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'silentcomics' ), get_post_format_string( 'gallery' ) ) ); ?>"><?php echo get_post_format_string( 'gallery' ); ?></a></span>

			<?php edit_post_link( __( 'Edit', 'silentcomics' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->

		<?php if ( has_excerpt() ) : ?>
		<div class="entry-summary">
			<?php do_action( 'silentcomics_formatted_posts_excerpt_before' ); ?>
			<?php the_excerpt(); ?>
			<?php do_action( 'silentcomics_formatted_posts_excerpt_after' ); ?>
		</div><!-- .entry-caption -->
		<?php endif; ?>

	</div><!-- .entry-wrap -->
</article><!-- #post-## -->