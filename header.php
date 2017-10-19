<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package WordPress
 * @subpackage Strip
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php if ( is_single() ) {
	single_post_title( '', true );
} else {
	bloginfo( 'name' );
	echo ' - ';
	bloginfo( 'description' );
}
	?>" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link type="text/plain" rel="author" href="" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="branding" class="site-header" role="banner">

		<div class="site-branding">
			<?php get_template_part( '/assets/inline', 'logo.svg' ); // remove or replace by your own custom svg logo. ?>
			<?php strip_the_custom_logo(); ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	</div><!-- .site-branding -->

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<nav id="site-navigation" class="main-navigation clear" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_attr_e( 'discover', 'strip' ); ?></button>
			<div><a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'strip' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'wrap' ) ); ?>
		</nav><!-- #site-navigation -->
		<?php endif; ?>

	</header><!-- #masthead -->
