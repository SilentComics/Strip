<?php
/**
* The Sidebar containing the main widget areas.
*
* @package SilentComics
*/
?>
<div id="primary" class="widget-area" role="complementary">
<div class="entry-wrap wrap clear">

	<?php //<nav id="site-navigation" class="main-navigation" role="navigation">
	//<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'silentcomics' ); </a>
	//wp_nav_menu( array( 'theme_location' => 'primary' ) ); 
	// </nav><!-- #site-navigation .main-navigation --> 
	?>
	
		<?php if ( is_active_sidebar( 'Sidebar' ) ) : ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'Sidebar' ); ?>
		<?php endif; // end sidebar widget area ?>
	</div><!-- .widgets-area -->
</div><!-- .entry-wrap -->
</div><!-- #primary -->