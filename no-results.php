<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SilentComics
 */
?>

<article id="post-0" class="no-results">
	<div class="entry-wrap wrap clear">
		<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'silentcomics' ); ?></h1>
	</header><!-- .page-header -->

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'silentcomics' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Bummer, I cannot find what you are looking for.<br>Would you like to search in the', 'silentcomics' ); ?>

			<a href="<?php echo get_post_type_archive_link( 'comic' ); ?>">Comics Archive</a>? Great stuff there.</p>

			<p><?php _e('Or do you prefer trying another search with different keywords?', 'silentcomics'); ?></p>

			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'silentcomics' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
		</div><!-- .entry-content -->
	</div><!-- .entry-wrap -->
</article><!-- #post-0 .post .no-results .not-found -->
