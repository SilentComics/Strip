<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package SilentComics
 */

$facebook = get_theme_mod( 'jetpack-facebook' );
$twitter = get_theme_mod( 'jetpack-twitter' );
$tumblr = get_theme_mod( 'jetpack-tumblr' );
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php esc_html_e( 'Archives', 'silentcomics' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h1 class="widget-title"><?php esc_html_e( 'Meta', 'silentcomics' ); ?></h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->