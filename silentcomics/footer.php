<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SilentComics
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'silentcomics_credits' ); ?>
			<a href="<?php echo esc_url( __( 'https://github.com/SilentComics/Wordpress-Theme-for-Silent-Comics/', 'SilentComics' ) ); ?>" title="<?php esc_attr_e( 'Simple WordPress Comics Theme', 'SilentComics' ); ?>"><?php printf( __( 'Simple Comics %s', 'SilentComics' ), 'WP Theme' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>