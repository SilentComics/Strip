<?php
/**
 * @package silentcomics
 */
?>
<article id="single-comic-<?php the_id(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'silentcomics-comic-strip' ); ?></a>
	<?php the_title( '<h1 class="comic-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
	<header class="comic-meta entry-meta">
		<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
		<?php if ( ! is_singular( 'single-comic' ) && ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"> ~ </span>
		<span class="comic-comments-link"><?php comments_popup_link( __( 'Leave a comment', 'silentcomics' ), __( '1 Comment', 'silentcomics' ), __( '% Comments', 'silentcomics' ) ); ?></span>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'silentcomics' ), '<span class="sep"> ~ </span><span class="comic-edit-link">', '</span>' ); ?>
	</header>
	<div class="comic-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'silentcomics' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<footer class="comic-meta entry-meta">
		<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'silentcomics' ) );

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ', ', 'silentcomics' ) );

		if ( ! silentcomics_categorized_blog() ) {
			// This blog only has 1 category so we just need to worry about tags in the meta text
			if ( '' != $tag_list ) {
				$meta_text = __( 'This comic was tagged %2$s.', 'silentcomics' );
			}

		} else {
			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) {
				$meta_text = __( 'This comic was posted in %1$s and tagged %2$s.', 'silentcomics' );
			} else {
				$meta_text = __( 'This comic was posted in %1$s.', 'silentcomics' );
			}

		} // end check for categories on this blog

		printf(
			$meta_text,
			$category_list,
			$tag_list
		);
		?>
	</footer>
</article>