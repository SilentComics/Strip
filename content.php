<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Strip
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="wrap">
			<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'strip' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="<?php the_ID(); ?>" class="strip-featured-thumbnail">
				<?php the_post_thumbnail( 'strip-featured-thumbnail' ); ?>
			</a>
			<?php else : ?>
				<?php the_post_thumbnail( 'strip-featured-thumbnail' ); ?>
			<?php endif; ?>

		<header class="entry-header">
			<?php
			$categories_list = get_the_category_list( __( ', ', 'strip' ) );
			if ( $categories_list && strip_categorized_blog() ) {
				echo '<span class="categories-links">' . $categories_list . '</span>';
			}
			if ( ! is_single() ) :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			else :
					the_title( '<h1 class="entry-title">', '</h1>' );
			endif;
			?>
		</header><!-- .entry-header -->

		<footer class="entry-meta">
			<?php strip_entry_meta(); ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' !== get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'strip' ), __( '1 Comment', 'strip' ), __( '% Comments', 'strip' ) ); ?></span>
			<?php endif; ?>

			<?php edit_post_link( __( 'Edit', 'strip' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->

		<?php if ( is_search() ) : // Only display Excerpts for Search. ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php
			the_content(sprintf(
				/* translators: %s: Name of current post. */
				esc_html( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'strip' ), array( 'span' => array( 'class' => array() ) ) ),
				get_the_title( '<span class="screen-reader-text">"', '"</span>', false )
			));

			wp_link_pages(array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'strip' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'strip' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			));
		?>

		</div><!-- .entry-content -->
		<?php endif; ?>
	</div><!-- .entry-wrap -->
</article><!-- #post-## -->
