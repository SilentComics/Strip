<?php
/**
* The template part for displaying content
*
* @package SilentComics
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrap wrap clear">
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
			<?php if ( ! is_single() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'silentcomics' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="<?php the_ID(); ?>" class="silentcomics-featured-thumbnail">
				<?php the_post_thumbnail( 'silentcomics-featured-thumbnail' ); ?>
			</a>
			<?php else : ?>
				<?php the_post_thumbnail( 'silentcomics-featured-thumbnail' ); ?>
			<?php endif; ?>
		<?php endif; ?>

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
		</header><!-- .entry-header -->

		<footer class="entry-meta">
			<?php silentcomics_entry_meta(); ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'silentcomics' ), __( '1 Comment', 'silentcomics' ), __( '% Comments', 'silentcomics' ) ); ?></span>
			<?php endif; ?>

			<?php edit_post_link( __( 'Edit', 'silentcomics' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'silentcomics' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'silentcomics' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'silentcomics' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>

		</div><!-- .entry-content -->
		<?php endif; ?>
	</div><!-- .entry-wrap -->
</article><!-- #post-## -->
