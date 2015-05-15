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
		
		
				<?php do_action( 'before' ); ?>
				
			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) { ?>
				<a class="header-image"  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" class="no-header-image" />
				</a>
			<?php } // if ( ! empty( $header_image ) ) ?>
							
			<h1 class="site-title"><a href="http://silent-comics.com" class="logo"><object type="image/svg+xml" data="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxOTggOTkiPjxzdHlsZT4uc3R5bGUwe2ZpbGw6ICMwMDA7fTpob3ZlciB7ZmlsbDogI2ZmY2MwMDt9OnZpc2l0ZWQge2ZpbGw6ICNmZmY7fTwvc3R5bGU+IDxwYXRoIGQ9Ik0xNS40IDQ0LjJjLTQuMSAwLTcuMS0zLjItNy42LTcuMWwtNC4xIDEuMmMxLjIgNS45IDUuOCA5LjkgMTEuOSA5LjljNi42IDAgMTItNS4xIDEyLTExLjggYzAtNi4xLTQuMi04LjYtOS4yLTEwLjdsLTIuNS0xLjFjLTIuNi0xLjItNi0yLjctNi02YzAtMy41IDIuOS01LjkgNi4zLTUuOWMzLjIgMCA1LjEgMS41IDYuNiA0LjFsMy40LTIuMmMtMi0zLjctNS42LTUuOS05LjktNS45IGMtNS43IDAtMTAuNyAzLjgtMTAuNyA5LjdjMCA1LjUgMy44IDcuNyA4LjMgOS44bDIuMyAxYzMuNSAxLjYgNyAzLjEgNyA3LjZDMjMuMyA0MS4xIDE5LjUgNDQuMiAxNS40IDQ0LjJ6Ii8+PHJlY3QgeD0iNDIuNSIgeT0iOS40IiB3aWR0aD0iNC4zIiBoZWlnaHQ9IjM4LjIiLz48cG9seWdvbiBwb2ludHM9IjYzLjYsOS40IDYzLjYsNDcuNSA3OC4zLDQ3LjUgNzguMyw0My42IDY3LjgsNDMuNiA2Ny44LDkuNCIvPjxwb2x5Z29uIHBvaW50cz0iMTExLjQsMTMuMyAxMTEuNCw5LjQgOTEuNiw5LjQgOTEuNiw0Ny41IDExMS40LDQ3LjUgMTExLjQsNDMuNiA5NS45LDQzLjYgOTUuOSwyOC42IDExMSwyOC42IDExMSwyNC43IDk1LjksMjQuNyA5NS45LDEzLjMiLz48cG9seWdvbiBwb2ludHM9IjE1Ny4zLDM4LjkgMTI3LjUsNy44IDEyNy41LDQ3LjUgMTMxLjgsNDcuNSAxMzEuOCwxOC4xIDE2MS41LDQ5LjIgMTYxLjUsOS40IDE1Ny4zLDkuNCIvPjxwb2x5Z29uIHBvaW50cz0iMTc1LjIsMTMuMyAxODQuNCwxMy4zIDE4NC40LDQ3LjUgMTg4LjcsNDcuNSAxODguNywxMy4zIDE5OCwxMy4zIDE5OCw5LjQgMTc1LjIsOS40Ii8+PHBhdGggZD0iTTE5LjkgOTAuM2M0IDAgOC4xLTEuNCAxMS40LTMuN3YtNS4zYy0zIDMtNy4yIDUuMS0xMS41IDUuMWMtOC41IDAtMTUuNS03LjQtMTUuNS0xNS44IGMwLTguNCA2LjktMTUuOCAxNS40LTE1LjhjNC40IDAgOC42IDEuOSAxMS42IDUuMXYtNS4zYy0zLjQtMi41LTcuMS0zLjctMTEuNC0zLjdDOSA1MC45IDAgNTkuOCAwIDcwLjhDMCA4MS42IDkuMSA5MC4zIDE5LjkgOTAuMyB6Ii8+PHBhdGggZD0iTTM2LjUgNzAuN2MwIDExIDkgMTkuNyAxOS45IDE5LjdjMTAuOSAwIDE5LjktOC43IDE5LjktMTkuN2MwLTEwLjktOS0xOS44LTE5LjktMTkuOCBDNDUuNSA1MC45IDM2LjUgNTkuNyAzNi41IDcwLjd6IE01Ni40IDU0LjhDNjUuMiA1NC44IDcyIDYyIDcyIDcwLjZjMCA4LjYtNyAxNS44LTE1LjYgMTUuOGMtOC43IDAtMTUuNi03LjItMTUuNi0xNS44IEM0MC44IDYyIDQ3LjcgNTQuOCA1Ni40IDU0Ljh6Ii8+PHBvbHlnb24gcG9pbnRzPSI3OS4zLDg5LjcgODMuNiw4OS43IDg4LjUsNjMuOSA4OC42LDYzLjkgMTAwLjksOTEuMiAxMTMuMiw2My45IDExMy4zLDYzLjkgMTE4LjIsODkuNyAxMjIuNSw4OS43IDExNC44LDQ5LjQgMTAwLjksODEuNCA4Nyw0OS40Ii8+PHJlY3QgeD0iMTI3LjUiIHk9IjUxLjUiIHdpZHRoPSI0LjMiIGhlaWdodD0iMzguMSIvPjxwYXRoIGQ9Ik0xNTYuOSA1NC44YzQuNCAwIDguNiAxLjkgMTEuNiA1LjF2LTUuM2MtMy40LTIuNS03LjEtMy43LTExLjQtMy43Yy0xMC45IDAtMTkuOSA5LTE5LjkgMTkuOSBjMCAxMC44IDkuMSAxOS42IDE5LjkgMTkuNmM0IDAgOC4xLTEuNCAxMS40LTMuN3YtNS4zYy0zIDMtNy4yIDUuMS0xMS41IDUuMWMtOC41IDAtMTUuNS03LjQtMTUuNS0xNS44IEMxNDEuNiA2Mi4yIDE0OC40IDU0LjggMTU2LjkgNTQuOHoiLz48cGF0aCBkPSJNMTg1LjcgODYuNGMtNC4xIDAtNy4xLTMuMi03LjYtNy4xbC00LjEgMS4yYzEuMiA1LjkgNS44IDkuOSAxMS45IDkuOWM2LjYgMCAxMi01LjEgMTItMTEuOCBjMC02LjEtNC4yLTguNi05LjItMTAuN2wtMi41LTEuMWMtMi42LTEuMi02LTIuNy02LTZjMC0zLjUgMi45LTUuOSA2LjMtNS45YzMuMiAwIDUuMSAxLjUgNi42IDQuMWwzLjQtMi4yYy0yLTMuNy01LjYtNS45LTkuOS01LjkgYy01LjcgMC0xMC43IDMuOC0xMC43IDkuN2MwIDUuNSAzLjggNy43IDguMyA5LjhsMi4zIDFjMy41IDEuNiA3IDMuMSA3IDcuNkMxOTMuNiA4My4zIDE4OS44IDg2LjQgMTg1LjcgODYuNHoiLz48cmVjdCB5PSI5NyIgd2lkdGg9IjE5OCIgaGVpZ2h0PSIyIi8+PHJlY3QgeT0iMCIgd2lkdGg9IjE5OCIgaGVpZ2h0PSIyIi8+PC9zdmc+"></object></a></h1> <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		
		
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Explore', 'silentcomics' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'silentcomics' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'wrap'  ) ); ?>
		</nav><!-- #site-navigation -->
		<?php endif; ?>
	</header><!-- #masthead -->