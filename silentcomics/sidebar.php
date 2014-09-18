<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package SilentComics
 */
?>
	<div class="widget-areas">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- .widget-ara -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- .widget-ara -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div><!-- .widget-ara -->
		<?php endif; ?>
	</div><!-- .widgets-areas -->