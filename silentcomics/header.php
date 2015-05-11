<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package SilentComics
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="description" content="">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link type="text/plain" rel="author" href="http://silent-comics.com/humans.txt" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		
		<div class="wrap">
				<?php do_action( 'before' ); ?>
				
			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) { ?>
				<a class="site-logo"  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" class="no-img header-image" />
				</a>
			<?php } // if ( ! empty( $header_image ) ) ?>
							
			<h1 class="site-title"><a href="http://silent-comics.com" <svg class="logo"><object type="image/svg+xml" data="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxOTggOTkiPjxzdHlsZT4uc3R5bGUwe2ZpbGw6ICMwMDA7fTpob3ZlciB7ZmlsbDogI2ZmZjt9PC9zdHlsZT4gPHBhdGggZD0iTTE1LjQgNDQuMmMtNC4xIDAtNy4xLTMuMi03LjYtNy4xbC00LjEgMS4yYzEuMiA1LjkgNS44IDkuOSAxMS45IDkuOWM2LjYgMCAxMi01LjEgMTItMTEuOCBjMC02LjEtNC4yLTguNi05LjItMTAuN2wtMi41LTEuMWMtMi42LTEuMi02LTIuNy02LTZjMC0zLjUgMi45LTUuOSA2LjMtNS45YzMuMiAwIDUuMSAxLjUgNi42IDQuMWwzLjQtMi4yYy0yLTMuNy01LjYtNS45LTkuOS01LjkgYy01LjcgMC0xMC43IDMuOC0xMC43IDkuN2MwIDUuNSAzLjggNy43IDguMyA5LjhsMi4zIDFjMy41IDEuNiA3IDMuMSA3IDcuNkMyMy4zIDQxLjEgMTkuNSA0NC4yIDE1LjQgNDQuMnoiLz48cmVjdCB4PSI0Mi41IiB5PSI5LjQiIHdpZHRoPSI0LjMiIGhlaWdodD0iMzguMiIvPjxwb2x5Z29uIHBvaW50cz0iNjMuNiw5LjQgNjMuNiw0Ny41IDc4LjMsNDcuNSA3OC4zLDQzLjYgNjcuOCw0My42IDY3LjgsOS40Ii8+PHBvbHlnb24gcG9pbnRzPSIxMTEuNCwxMy4zIDExMS40LDkuNCA5MS42LDkuNCA5MS42LDQ3LjUgMTExLjQsNDcuNSAxMTEuNCw0My42IDk1LjksNDMuNiA5NS45LDI4LjYgMTExLDI4LjYgMTExLDI0LjcgOTUuOSwyNC43IDk1LjksMTMuMyIvPjxwb2x5Z29uIHBvaW50cz0iMTU3LjMsMzguOSAxMjcuNSw3LjggMTI3LjUsNDcuNSAxMzEuOCw0Ny41IDEzMS44LDE4LjEgMTYxLjUsNDkuMiAxNjEuNSw5LjQgMTU3LjMsOS40Ii8+PHBvbHlnb24gcG9pbnRzPSIxNzUuMiwxMy4zIDE4NC40LDEzLjMgMTg0LjQsNDcuNSAxODguNyw0Ny41IDE4OC43LDEzLjMgMTk4LDEzLjMgMTk4LDkuNCAxNzUuMiw5LjQiLz48cGF0aCBkPSJNMTkuOSA5MC4zYzQgMCA4LjEtMS40IDExLjQtMy43di01LjNjLTMgMy03LjIgNS4xLTExLjUgNS4xYy04LjUgMC0xNS41LTcuNC0xNS41LTE1LjggYzAtOC40IDYuOS0xNS44IDE1LjQtMTUuOGM0LjQgMCA4LjYgMS45IDExLjYgNS4xdi01LjNjLTMuNC0yLjUtNy4xLTMuNy0xMS40LTMuN0M5IDUwLjkgMCA1OS44IDAgNzAuOEMwIDgxLjYgOS4xIDkwLjMgMTkuOSA5MC4zIHoiLz48cGF0aCBkPSJNMzYuNSA3MC43YzAgMTEgOSAxOS43IDE5LjkgMTkuN2MxMC45IDAgMTkuOS04LjcgMTkuOS0xOS43YzAtMTAuOS05LTE5LjgtMTkuOS0xOS44IEM0NS41IDUwLjkgMzYuNSA1OS43IDM2LjUgNzAuN3ogTTU2LjQgNTQuOEM2NS4yIDU0LjggNzIgNjIgNzIgNzAuNmMwIDguNi03IDE1LjgtMTUuNiAxNS44Yy04LjcgMC0xNS42LTcuMi0xNS42LTE1LjggQzQwLjggNjIgNDcuNyA1NC44IDU2LjQgNTQuOHoiLz48cG9seWdvbiBwb2ludHM9Ijc5LjMsODkuNyA4My42LDg5LjcgODguNSw2My45IDg4LjYsNjMuOSAxMDAuOSw5MS4yIDExMy4yLDYzLjkgMTEzLjMsNjMuOSAxMTguMiw4OS43IDEyMi41LDg5LjcgMTE0LjgsNDkuNCAxMDAuOSw4MS40IDg3LDQ5LjQiLz48cmVjdCB4PSIxMjcuNSIgeT0iNTEuNSIgd2lkdGg9IjQuMyIgaGVpZ2h0PSIzOC4xIi8+PHBhdGggZD0iTTE1Ni45IDU0LjhjNC40IDAgOC42IDEuOSAxMS42IDUuMXYtNS4zYy0zLjQtMi41LTcuMS0zLjctMTEuNC0zLjdjLTEwLjkgMC0xOS45IDktMTkuOSAxOS45IGMwIDEwLjggOS4xIDE5LjYgMTkuOSAxOS42YzQgMCA4LjEtMS40IDExLjQtMy43di01LjNjLTMgMy03LjIgNS4xLTExLjUgNS4xYy04LjUgMC0xNS41LTcuNC0xNS41LTE1LjggQzE0MS42IDYyLjIgMTQ4LjQgNTQuOCAxNTYuOSA1NC44eiIvPjxwYXRoIGQ9Ik0xODUuNyA4Ni40Yy00LjEgMC03LjEtMy4yLTcuNi03LjFsLTQuMSAxLjJjMS4yIDUuOSA1LjggOS45IDExLjkgOS45YzYuNiAwIDEyLTUuMSAxMi0xMS44IGMwLTYuMS00LjItOC42LTkuMi0xMC43bC0yLjUtMS4xYy0yLjYtMS4yLTYtMi43LTYtNmMwLTMuNSAyLjktNS45IDYuMy01LjljMy4yIDAgNS4xIDEuNSA2LjYgNC4xbDMuNC0yLjJjLTItMy43LTUuNi01LjktOS45LTUuOSBjLTUuNyAwLTEwLjcgMy44LTEwLjcgOS43YzAgNS41IDMuOCA3LjcgOC4zIDkuOGwyLjMgMWMzLjUgMS42IDcgMy4xIDcgNy42QzE5My42IDgzLjMgMTg5LjggODYuNCAxODUuNyA4Ni40eiIvPjxyZWN0IHk9Ijk3IiB3aWR0aD0iMTk4IiBoZWlnaHQ9IjIiLz48cmVjdCB5PSIwIiB3aWR0aD0iMTk4IiBoZWlnaHQ9IjIiLz48L3N2Zz4="></object></a></h1> <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .wrap -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Explore', 'silentcomics' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'silentcomics' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'wrap'  ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->