<?php
/**
 * Template part for displaying the link post format
 *
 * @package WordPress
 * @subpackage Strip
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="wrap">
		<header class="entry-header">
			<?php
				$categories_list = get_the_category_list( __( ', ', 'strip' ) ); ?>

		</header><!-- .entry-header -->

		<footer class="entry-meta">
			<?php strip_entry_meta(); ?>

			<span class="entry-format"><a href="<?php echo esc_url( get_post_format_link( 'link' ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'strip' ), get_post_format_string( 'link' ) ) ); ?>"><?php echo esc_html( get_post_format_string( 'link' ) ); ?></a></span>

			<?php edit_post_link( __( 'Edit', 'strip' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'strip' ) ); ?>

			</div><!-- .entry-content -->
		</div><!-- .entry-wrap -->
</article><!-- #post-## -->
