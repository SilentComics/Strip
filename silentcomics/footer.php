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

<div class="entry-wrap wrap clear">
			<?php if ( is_active_sidebar( 'footer-sidebar-1' ) || is_active_sidebar( 'footer-sidebar-2' ) || is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
	<div id="tertiary" class="widget-area clear" role="complementary">
		<div class="widget-area-wrapper">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
				<div class="sidebar-1">
					<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
				<div class="sidebar-2">
					<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
				<div class="sidebar-3">
					<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
				</div>
			<?php endif; ?>
		</div><!-- .widget-area-wrapper -->
	</div><!-- #secondary -->
<?php endif; //is_active_sidebar ?>
		</div>
		
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			&copy; <?php 
  $fromYear = 2013; 
  $thisYear = (int)date('Y'); 
  echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?> SILENT COMICS
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'silentcomics' ), 'silentcomics', '<a href="" rel="designer">Silent Comics</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>