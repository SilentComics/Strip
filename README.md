WIP Wordpress-Theme-for-Silent-Comics
=================================

Still rough — Working on it

![screenshot]

Coding is the *learning by doing* side of the project for me. Code review needed. Developers, designers and lovers of comics are welcome to write any finding to: hoa // @ // silent-comics.com

# Silent Comics Wordpress Theme

This is SilentComics — a simple Wordpress theme, designed for the upcoming [SILENT COMICS site](http://silent-comics.com). The theme, still in development, is free for everyone to use and adapt.

## Features:

Not much: white, light, one-column, fixed-layout, responsive-layout, custom-background, custom-colors, custom-header, custom-menu, featured-images, flexible-header, post-formats, editor-style.
Minimal look, custom posts format for comics, no sidebar, infinite scroll, large images. Custom login page. Large text set in [Fenix](http://j.mp/Fenix-MyFonts). The theme is light and works fine with the latest WordPress version (4.2.2).  

The main focus of this theme is to be a clutter-free receptacle for comics. It will display large images, galleries or slideshow and resize for mobile and tablets. The comic post format has a simple navigation that focus on comics. You can upload a comic page by page or display panels as a WP gallery on a post. In this logic the theme can read an episode panel by panel or page by page. Multi-stories enabled by WP categories (nothing too fancy). On the side, there is a blog, with simple typography, supporting post-formats (e.g. video, audio).

[screenshot]: http://silentcomics.com/images/screenshot.png

## Getting started / Code Review
The theme is not optimised for production yet, but feel free to grab a copy an test it—if you’d like to do a code review, I’d appreciate your time.
{: .notice}

1. Download [SilentComics file from GitHub](https://github.com/SilentComics/Wordpress-Theme-for-Silent-Comics)

2. Zip SilentComics and upload as new theme into your WorPress dashboard

3. Create your menus and submenus, you can add a header image, a background image and change the background colour

4. Until a vanilla version exists, you have to edit header.php to use your own logo. Replace this bit with your own site link and logo:

`<h1 class="site-title"><a href="http://silent-comics.com" class="logo">
 <object type="image/svg+xml" data="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMjQgNjIuODI2IiA+PHN0eWxlPi5zdHlsZTB7ZmlsbDogIzAwMDt9OmhvdmVyIHtmaWxsOiAjZmY1ZTVlO306dmlzaXRlZCB7ZmlsbDogI2ZmZjt9PC9zdHlsZT48cGF0aCBkPSJNOS42NzQgMjguMDczYy0yLjU2NCAwLTQuNDM1LTIuMDAxLTQuNzgyLTQuNDQ5bC0yLjYgMC43MzFjMC43NjMgMy43IDMuNiA2LjIgNy40IDYuMiA0LjIgMCA3LjUwOS0zLjIxMSA3LjUwOS03LjQwNCAwLTMuODEzLTIuNjI5LTUuMzcxLTUuNzM0LTYuNzM2TDkuOTMgMTUuNzE0Yy0xLjYxNy0wLjczMS0zLjc0LTEuNjg1LTMuNzQtMy43NSAwLTIuMTkzIDEuODM2LTMuNzE3IDMuOTYxLTMuNzE3IDIgMCAzLjIgMSA0LjEgMi42MDRsMi4xMjMtMS4zNjVjLTEuMjY4LTIuMzUzLTMuNTE4LTMuNzE4LTYuMTc5LTMuNzE4IC0zLjUgMC02LjY4NSAyLjM4Mi02LjY4NSA2LjEgMCAzLjQgMi40IDQuOSA1LjIgNi4xMzFsMS40NTggMC42MzVjMi4yMTkgMSA0LjQgMiA0LjQgNC43NjZDMTQuNTg2IDI2LjEgMTIuMiAyOC4xIDkuNyAyOC4wNzN6Ii8+PHJlY3QgeD0iMjYuNiIgeT0iNi4yIiB3aWR0aD0iMi43IiBoZWlnaHQ9IjI0Ii8+PHBvbHlnb24gcG9pbnRzPSIzOS44LDYuMiAzOS44LDMwLjEgNDkuMSwzMC4xIDQ5LjEsMjcuNyA0Mi41LDI3LjcgNDIuNSw2LjIiLz48cG9seWdvbiBwb2ludHM9IjY5LjgsOC43IDY5LjgsNi4yIDU3LjQsNi4yIDU3LjQsMzAuMSA2OS44LDMwLjEgNjkuOCwyNy43IDYwLjEsMjcuNyA2MC4xLDE4LjMgNjkuNSwxOC4zIDY5LjUsMTUuOCA2MC4xLDE1LjggNjAuMSw4LjciLz48cG9seWdvbiBwb2ludHM9Ijk4LjUsMjQuNyA3OS45LDUuMiA3OS45LDMwLjEgODIuNSwzMC4xIDgyLjUsMTEuNyAxMDEuMiwzMS4yIDEwMS4yLDYuMiA5OC41LDYuMiIvPjxwb2x5Z29uIHBvaW50cz0iMTA5LjcsOC43IDExNS41LDguNyAxMTUuNSwzMC4xIDExOC4yLDMwLjEgMTE4LjIsOC43IDEyNCw4LjcgMTI0LDYuMiAxMDkuNyw2LjIiLz48cGF0aCBkPSJNMTIuNDU0IDU3LjAyNmMyLjUzNCAwIDUuMDY3LTAuODU3IDcuMTI4LTIuMzV2LTMuMzA1Yy0xLjkgMS45MDYtNC41MjkgMy4xNzctNy4yMjMgMy4yIC01LjQgMC05LjY5NS00LjY0LTkuNjk1LTkuOTE0IDAtNS4yNzIgNC4zMDgtOS45MTIgOS42MjktOS45MTIgMi44IDAgNS40IDEuMiA3LjMgMy4xNzd2LTMuMzA0Yy0yLjEyNC0xLjU4OC00LjQ2Ny0yLjM1MS03LjEyOC0yLjM1MSAtNi44IDAtMTIuNDUyIDUuNjIzLTEyLjQ1MiAxMi40ODZDMC4wMDIgNTEuNSA1LjcgNTcgMTIuNSA1Ny4wMjZ6Ii8+PHBhdGggZD0iTTIyLjg3NiA0NC42NjdjMCA2LjkgNS42IDEyLjQgMTIuNSAxMi4zNThTNDcuNzggNTEuNiA0Ny44IDQ0LjY2N2MwLTYuODYyLTUuNjQtMTIuNDIzLTEyLjQ1Mi0xMi40MjNTMjIuODc2IDM3LjggMjIuOSA0NC42Njd6TTM1LjMyOCAzNC43MjJjNS40ODEgMCA5LjggNC41IDkuOCA5LjkgMCA1LjQwMi00LjM3NSA5LjkxNC05Ljc5MSA5LjkgLTUuNCAwLTkuNzkxLTQuNTEyLTkuNzkxLTkuOTE0QzI1LjUzNyAzOS4yIDI5LjggMzQuNyAzNS4zIDM0LjcyMnoiLz48cG9seWdvbiBwb2ludHM9IjQ5LjYsNTYuNiA1Mi40LDU2LjYgNTUuNCw0MC40IDU1LjUsNDAuNCA2My4yLDU3LjYgNzAuOSw0MC40IDcwLjksNDAuNCA3NCw1Ni42IDc2LjcsNTYuNiA3MS45LDMxLjMgNjMuMiw1MS40IDU0LjUsMzEuMyIvPjxyZWN0IHg9Ijc5LjgiIHk9IjMyLjciIHdpZHRoPSIyLjciIGhlaWdodD0iMjQiLz48cGF0aCBkPSJNOTguMjgxIDM0LjcyMmMyLjc1OCAwIDUuNCAxLjIgNy4zIDMuMTc3di0zLjMwNGMtMi4xMjEtMS41ODgtNC40NjUtMi4zNTEtNy4xMjctMi4zNTEgLTYuOCAwLTEyLjQ1MyA1LjYyMy0xMi40NTMgMTIuNSAwIDYuOCA1LjcgMTIuMyAxMi41IDEyLjMgMi41IDAgNS4wNjgtMC44NTcgNy4xMjctMi4zNXYtMy4zMDVjLTEuODk4IDEuOTA2LTQuNTI5IDMuMTc3LTcuMjI1IDMuMiAtNS40IDAtOS42OTUtNC42NC05LjY5NS05LjkxNEM4OC42NDggMzkuNCA5MyAzNC43IDk4LjMgMzQuNzIyeiIvPjxwYXRoIGQ9Ik0xMTYuMzA5IDU0LjU0OGMtMi41NjYgMC00LjQzNi0yLjAwMS00Ljc4My00LjQ0N2wtMi42IDAuNzI5YzAuNzYgMy43IDMuNiA2LjIgNy40IDYuMiA0LjIgMCA3LjUxMi0zLjIwOCA3LjUxMi03LjQwMSAwLTMuODE0LTIuNjMxLTUuMzctNS43MzYtNi43MzdsLTEuNTgyLTAuNjk3Yy0xLjYxNS0wLjczMi0zLjc0Mi0xLjY4Ni0zLjc0Mi0zLjc1IDAtMi4xOTEgMS44NC0zLjcxOCAzLjk2My0zLjcxOCAyIDAgMy4yIDEgNC4xIDIuNjA1bDIuMTIzLTEuMzY1Yy0xLjI2OC0yLjM1My0zLjUxNi0zLjcxOC02LjE4LTMuNzE4IC0zLjYgMC02LjY4NiAyLjM4NC02LjY4NiA2LjEgMCAzLjQgMi40IDQuOSA1LjIgNi4xMzRsMS40NTcgMC42MzVjMi4yMTkgMSA0LjQgMiA0LjQgNC43NjVDMTIxLjIyMSA1Mi42IDExOC45IDU0LjUgMTE2LjMgNTQuNTQ4eiIvPjxyZWN0IHk9IjYyLjEiIHdpZHRoPSIxMjQiIGhlaWdodD0iMC44Ii8+PHJlY3QgeT0iLTAuMSIgd2lkdGg9IjEyNCIgaGVpZ2h0PSIwLjgiLz48cmVjdCB4PSItMTI5LjIiIHk9Ii04OC40IiB3aWR0aD0iMC4yIiBoZWlnaHQ9IjAiLz48L3N2Zz4="></object></a></h1><div class="philactery"><object type="image/svg+xml" data="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMCAyMCI+PHBvbHlnb24gcG9pbnRzPSIxLC0wIDEwLDIwIDE5LC0wIi8+PC9zdmc+"></object></div>
<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>`

and replace the Base64 code to insert your own logo — you could use [Mobilefish's Base64 Encoder](http://www.mobilefish.com/services/base64/base64.php "Mobilefish's Base64 Encoder") to encode a SVG file.
	
5. For testing purpose, there are several custom category-name.php files created. These are related to comic categories called by archive-comic.php — for now you will have to change these files to match your own categories manually — although there should be a way to automate that.

6. To publish a comic you simply need to post as “comic” or add a new comic. You need at least one category per comic. Categories will show in the left hand side of the comic posts, so it’s best to not put too many categories to keep it lean.

7. In some cases, after changing theme or re-activating the theme, your comics post won’t show. This is a common custom post type behavior. You simply need to go to Setting > Permalinks > Save, which will refresh the installation.

8. Now you decide. You can post each comic episode as a single image. Or, if you post multiple images in one comic, they will display nicely taking advantage of the built-in WordPress gallery function. 

<figure>
	<img src="http://silentcomics.com/images/3-columns-gallery.jpg"></a>
</figure>
*e.g. a three columns comic post*

Clicking on one image will then take the user to one single image—so the story can read panel by panel. This allows navigation by click and by keyboard.

<figure>
	<img src="http://silentcomics.com/images/panel-image-view.jpg"></a>
</figure>
*Single panel/image view*

Or, if you have multiple images per comic post, you can also use an image. I have tested and would recommend RoyalSlider or Portfolio Slideshow Pro (see above).

<figure>
	<img src="http://silentcomics.com/images/800X1280_RoyalSlider-Panel-view.jpg"></a>
</figure>
*RoyalSlider panel view*

<figure>
	<img src="http://silentcomics.com/images/800X1280_RoyalSlider-Panel-view-02.jpg"></a>
</figure>
*>RoyalSlider panel view — transition*

9. You can use the widget to display three columns above the footer. 

<figure>
	<img src="http://silentcomics.com/images/customise-dashboard.jpg"></a>
</figure>
*Customise*

## Known issues

* As far as comics editing and management capabilities go, the functions are very basic. In part by design: why complicate things, or ad useless features? But also due to my limited coding experience.
* Comics navigation: the `<title>` link will show up in the middle of the page beneath the comic. An episode’s title (comic post) should not be too long so the navigation doesn’t break on mobile.
* Styling for headings, typography rules etc. needs (a lot) more work. 
* Comics posted under custom post type “comic” **must** have at least one category for the function to work with multiple stories: you call each new story by category, simple. If the comic post is uncategorised it will return an error when `WP_DEBUG` is *true*. 
* The theme does not (yet) serve smaller images files for mobile as I have not figured the best way to do that.
* On the blog side, post formats styling is not 100% completed

## To do:
✓ = done ✓⚡︎ = partially done. Blank indicates room for improvement / work to be done
{: .notice}
*	modify navigation to show first, previous, next, last webcomic post ✓
*	fix said navigation icons — as svg symbols with png fallback
* design a minimal, custom post type for comics ✓
* Re-design the category archive page(s) with custom categories
* reverse WP default order for comics archive ✓
*	Page grid to display books / episodes if not in archive
*	Add columns for extra large images ✓
*	Fix 3 columns footer widget media queries ✓
* Markup clean-up
* add / enable multiple stories by category ✓
* style single images navigations (e.g. for separate panels)
* Redesign header.php
* Improve customisation (e.g. custom logo over header image, etc.)
* Fix or remove sidebar (there should be no sidebar)
* improve category.php & custom comic categories (automation)
* Improve mobile viewing ✓⚡︎
*	Fix comments JS, PHP & CSS ✓⚡︎
*	Trim unused code
* style sticky post, pagelink and various post formats classes
*	Lots of small css tweaks and fixes
*	Design a consistent colour scheme!!!
*	Redesign the whole theme from scratch using *Less* or *Sass* to ease future maintenance
*	Third parties integration (e-commerce, social media, etc.)
*	Add `<picture>`element support for responsive images. See [picturefill.js + WP](http://www.taupecat.com/2014/05/picturefill-js-wordpress/)
*	Improve 404 page ✓
*	Fix compatibility issues for Internet Explorer & other browsers
*	Custom webfonts not loading on iPad 
*	Add icon support for icomoon or [Genericons](http://genericons.com/)
*	Split the comic functions from the theme in a separate plugin (in compliance with WP best practices)
*	Testing + feedback + implementation
*	…

## Code review needed

Know how this theme can be improved? Please send your findings and suggestions over to

hoa // @ // silent-comics.com
