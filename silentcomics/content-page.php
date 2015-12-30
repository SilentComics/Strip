<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package SilentComics
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrap wrap clear">
		<?php
			if ( '' != get_the_post_thumbnail() ) :
				the_post_thumbnail( 'silentcomics-featured-thumbnail' );
			endif;
		?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			
				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'silentcomics' ), __( '1 Comment', 'silentcomics' ), __( '% Comments', 'silentcomics' ) ); ?></span>
				<?php endif; ?>
				<?php 
					edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'silentcomics' ),
				get_the_title()
			),
			'<footer class="entry-meta"><span class="edit-link">',
			'</span></footer><!-- .entry-meta -->'
		);
 ?>
			
		</header><!-- .entry-header -->

		<div class="entry-content clear">
			<?php the_content(); ?>
			
		</div><!-- .entry-content -->
	</div><!-- .entry-wrap -->
</article><!-- #post-## -->