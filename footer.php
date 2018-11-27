<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Strip
 */

	?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

<div class="entry-wrap wrap clear">
	<?php if ( is_active_sidebar( 'first-footer-widget' ) || is_active_sidebar( 'second-footer-widget' ) || is_active_sidebar( 'third-footer-widget' ) || is_active_sidebar( 'fourth-footer-widget' ) ) : ?>
	<div id="secondary" class="widget-area clear" role="complementary">
		<div class="widget-area-wrapper">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( is_active_sidebar( 'first-footer-widget' ) ) : ?>
				<div class="footer-widget-1">
		<?php dynamic_sidebar( 'first-footer-widget' ); ?>
				</div>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'second-footer-widget' ) ) : ?>
				<div class="footer-widget-2">
		<?php dynamic_sidebar( 'second-footer-widget' ); ?>
				</div>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'third-footer-widget' ) ) : ?>
				<div class="footer-widget-3">
		<?php dynamic_sidebar( 'third-footer-widget' ); ?>
				</div>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'fourth-footer-widget' ) ) : ?>
				<div class="footer-widget-4">
		<?php dynamic_sidebar( 'fourth-footer-widget' ); ?>
				</div>
	<?php endif; ?>
		</div><!-- .widget-area-wrapper -->
	</div><!-- #secondary -->
<?php endif; // is_active_sidebar. ?>
			</div><!-- .entry-wrap -->

		<div class="site-info">
			&copy; <span class="site-name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span> <?php
			$from_year = 2016;
			$this_year = (int) date( 'Y' );
			echo esc_html( $from_year . (($from_year !== $this_year) ? '-' . $this_year : '') );?>
			<span class="sep"> | </span>
	<?php do_action( 'strip_credits' ); ?>
				<a href="<?php echo esc_url( __( 'https://github.com/SilentComics/Strip', 'strip' ) ); ?>"><?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'strip' ), 'Strip', 'SILENT COMICS' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
