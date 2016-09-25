<?php
/**
 * The Header for comics
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package SilentComics
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php if (is_single()) {
    single_post_title('', true);
} else {
    bloginfo('name');
    echo " - ";
    bloginfo('description');
}
    ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link type="text/plain" rel="author" href="http://silent-comics.com/humans.txt" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <header id="masthead" class="site-header" role="banner">

        <?php if (has_nav_menu('primary')) : ?>
        <nav id="site-navigation" class="main-navigation clear" role="navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_attr_e('discover', 'silentcomics'); ?></button>
            <div><a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e('Skip to content', 'silentcomics'); ?></a></div>

            <?php wp_nav_menu(array( 'theme_location' => 'primary', 'container_class' => 'wrap'  )); ?>
        </nav><!-- #site-navigation -->
        <?php endif; ?>

    </header><!-- #masthead -->
