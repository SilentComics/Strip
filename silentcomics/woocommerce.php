<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SilentComics
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="woocommerce-content" role="main">
			<div class="entry-wrap wrap clear">

			<?php woocommerce_content(); ?>
			
	
	</div><!-- .entry-wrap -->
	</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>