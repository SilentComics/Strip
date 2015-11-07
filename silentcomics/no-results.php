<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SilentComics
 */
?>

<article id="post-0" class="post no-results not-found">
	<div class="entry-wrap wrap clear">
		<header class="page-header">
			<h1 class="page-title">
				<?php
					printf( __( 'Nothing Found %s', 'silentcomics' ), '<span>' .
					single_cat_title( '', false ) . '</span>' );
					?>
					</h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'silentcomics' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( '&mdash;Bummer, I cannot find what you are looking for. <br>Nothing matched your search terms.<br>&mdash;...<br>&mdash;Would you like to look in the', 'silentcomics' ); ?>
			
			<a href="<?php echo get_post_type_archive_link( 'comic' ); ?>">Comics Archive</a></p>
  
			<p><?php
echo nl2br("&mdash;Nah, thanks, I feel like searchin'\r\n&mdash;OK then. Try again with different keywords. See you.", false); ?></p>

			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'silentcomics' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
		</div><!-- .entry-content -->
	</div><!-- .entry-wrap -->
</article><!-- #post-0 .post .no-results .not-found -->