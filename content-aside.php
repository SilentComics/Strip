<?php
/**
 * Template part for displaying aside post format
 *
 * @package WordPress
 * @subpackage @package Strip
 */

?>

<article id="post-<?php the_ID(); ?>">
	<div class="wrap">
		<header class="entry-header">
			<?php
				$categories_list = get_the_category_list( __( ', ', 'strip' ) );
			if ( $categories_list && strip_categorized_blog() ) {
				echo '<span class="categories-links">' . $categories_list . '</span>';
			}
			?>
		</header><!-- .entry-header -->

		<footer class="entry-meta">
			<?php strip_entry_meta(); ?>

			<span class="entry-format"><a href="<?php echo esc_url( get_post_format_link( 'aside' ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'strip' ), get_post_format_string( 'aside' ) ) ); ?>"><?php echo esc_html( get_post_format_string( 'aside' ) ); ?></a></span>

			<?php edit_post_link( __( 'Edit', 'strip' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'strip' ) ); ?>

		</div><!-- .entry-content -->
		</div><!-- .entry-wrap -->
</article><!-- #post-## -->
