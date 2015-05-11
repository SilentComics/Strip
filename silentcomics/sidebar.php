<?php
/**
 * The Sidebar containing the footer widgets.
 *
 * @package SilentComics
 */
?>
<?php if ( is_active_sidebar( 'footer-sidebar-1' ) || is_active_sidebar( 'footer-sidebar-2' ) || is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
	<div id="secondary" class="widget-area clear" role="complementary">
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