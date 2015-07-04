WIP Wordpress-Theme-for-Silent-Comics
=================================

Still rough — Working on it

![screenshot]

Coding is the *learning by doing* side of the project for me. Code review needed. Developers, designers and lovers of comics are welcome to write any finding to: hoa // @ // silent-comics.com

# Silent Comics Wordpress Theme

This is SilentComics — a simple Wordpress theme, designed for the upcoming [SILENT COMICS site](http://silent-comics.com). The theme, still in development, is released on GNU General Public License.

## Theme Aim and Focus 
The main focus of the theme is to be a clutter-free receptacle for comics. It can display large images, galleries or slideshow and resize for mobile and tablets.
The comic post format has a simple navigation that focus on comics. You can upload a comic page by page or display panels as a WP gallery on a post. In this logic the theme can read an episode panel by panel or page by page. Multi-stories enabled by custom taxonomies (nothing too fancy).
On the side, there is a blog, with simple typography, supporting post-formats (e.g. video, audio). Three columns footer widget, no sidebars. 

## Features:
*white, light, one-column, fixed-layout, responsive-layout, custom-background, custom-colors, custom-header, custom-menu, featured-images, flexible-header, post-formats, editor-style*

Minimal look, custom posts format for comics, no sidebar, large images. Custom login page. Large body text set in [Fenix](http://tipotype.com/fenix/). All headings are in Futura, as on this blog.
Light-weight, works with the latest WordPress version (4.3.0). 

[screenshot]: http://silentcomics.com/images/screenshot.png

## Getting started / Code Review
The theme is not optimised for production yet, but feel free to grab a copy an test it. If you’d like to do a code review, I’d appreciate your time.
{: .notice}

<div markdown=“0”><a href=“http://j.mp/SilentComics-WP” class=“btn btn-noir pull-right”>WIP SilentComics Theme — Download from GitHub</a></div>

1. Download [SilentComics WIP](https://github.com/SilentComics/Wordpress-Theme-for-Silent-Comics)

2. Zip SilentComics and upload as new theme into your WorPress dashboard

3. Create your menus and submenus, you can add a header image, a background image and change the background colour.

4. Until a vanilla version exists, you have to edit header.php to use your own logo. Replace the Base64 code¹ and insert your own logo—you could use [Mobilefish’s Base64 Encoder](http://www.mobilefish.com/services/base64/base64.php “Mobilefish’s Base64 Encoder”) to encode a SVG file. 

5. To publish a comic you just need to post as “comic” or add a new comic. To sort comics by story titles, if you want multiple stories, just add a story name. Each series will live in a loop of its own. There is a custom taxonomy-story-draft.php. This is the default unclassified comic stories. Uncategorized stories will automatically be sorted as “draft”.
The comic stories taxonomies are called by archive-comic.php. You will have to create your own taxonomy-$taxonomy-$term.php manually for each story, after taxonomy-story-draft.php.e.g. if you create a story called “New”, you’ll need to add a file taxonomy-story-new.php. A story title will show in the left hand side above the comic posts, so it’s best to keep titles reasonably short.

7. Now you decide. You can post each comic episode as a single image. Or, if you post several images in one comic. They will display nicely, taking advantage of the built-in WordPress gallery function. 

<figure>
	<img src=“http://silentcomics.com/images/3-columns-gallery.jpg”></a>
	<figcaption>e.g. a three columns comic post</figcaption>
</figure>

Clicking on one image will then take the user to one single image—so the story can read panel by panel. This allows navigation by click and by keyboard.

<figure>
	<img src=“http://silentcomics.com/images/panel-image-view.jpg”></a>
	<figcaption>Single panel/image view</figcaption>
</figure>

Or, if you have multiple images per comic post, you can also use an image. I have tested and would recommend RoyalSlider or Portfolio Slideshow Pro (see above).

<figure>
	<img src=“http://silentcomics.com/images/800X1280_RoyalSlider-Panel-view.jpg”></a>
	<figcaption>RoyalSlider panel view</figcaption>
</figure>

<figure>
	<img src=“http://silentcomics.com/images/800X1280_RoyalSlider-Panel-view-02.jpg”></a>
	<figcaption>RoyalSlider panel view — transition</figcaption>
</figure>

8. You can use the widget to display three columns above the footer. 

<figure>
	<img src=“http://silentcomics.com/images/customise-dashboard.jpg”></a>
	<figcaption>Customise</figcaption>
</figure>

¹ Replace this part: 
{% highlight html %}
<h1 class="site-title"><a href="http://silent-comics.com" class="logo"><object type="image/svg+xml" data="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxOTggOTkiPjxzdHlsZT4uc3R5bGUwe2ZpbGw6ICMwMDA7fTpob3ZlciB7ZmlsbDogI2ZmY2MwMDt9OnZpc2l0ZWQge2ZpbGw6ICNmZmY7fTwvc3R5bGU+IDxwYXRoIGQ9Ik0xNS40IDQ0LjJjLTQuMSAwLTcuMS0zLjItNy42LTcuMWwtNC4xIDEuMmMxLjIgNS45IDUuOCA5LjkgMTEuOSA5LjljNi42IDAgMTItNS4xIDEyLTExLjggYzAtNi4xLTQuMi04LjYtOS4yLTEwLjdsLTIuNS0xLjFjLTIuNi0xLjItNi0yLjctNi02YzAtMy41IDIuOS01LjkgNi4zLTUuOWMzLjIgMCA1LjEgMS41IDYuNiA0LjFsMy40LTIuMmMtMi0zLjctNS42LTUuOS05LjktNS45IGMtNS43IDAtMTAuNyAzLjgtMTAuNyA5LjdjMCA1LjUgMy44IDcuNyA4LjMgOS44bDIuMyAxYzMuNSAxLjYgNyAzLjEgNyA3LjZDMjMuMyA0MS4xIDE5LjUgNDQuMiAxNS40IDQ0LjJ6Ii8+PHJlY3QgeD0iNDIuNSIgeT0iOS40IiB3aWR0aD0iNC4zIiBoZWlnaHQ9IjM4LjIiLz48cG9seWdvbiBwb2ludHM9IjYzLjYsOS40IDYzLjYsNDcuNSA3OC4zLDQ3LjUgNzguMyw0My42IDY3LjgsNDMuNiA2Ny44LDkuNCIvPjxwb2x5Z29uIHBvaW50cz0iMTExLjQsMTMuMyAxMTEuNCw5LjQgOTEuNiw5LjQgOTEuNiw0Ny41IDExMS40LDQ3LjUgMTExLjQsNDMuNiA5NS45LDQzLjYgOTUuOSwyOC42IDExMSwyOC42IDExMSwyNC43IDk1LjksMjQuNyA5NS45LDEzLjMiLz48cG9seWdvbiBwb2ludHM9IjE1Ny4zLDM4LjkgMTI3LjUsNy44IDEyNy41LDQ3LjUgMTMxLjgsNDcuNSAxMzEuOCwxOC4xIDE2MS41LDQ5LjIgMTYxLjUsOS40IDE1Ny4zLDkuNCIvPjxwb2x5Z29uIHBvaW50cz0iMTc1LjIsMTMuMyAxODQuNCwxMy4zIDE4NC40LDQ3LjUgMTg4LjcsNDcuNSAxODguNywxMy4zIDE5OCwxMy4zIDE5OCw5LjQgMTc1LjIsOS40Ii8+PHBhdGggZD0iTTE5LjkgOTAuM2M0IDAgOC4xLTEuNCAxMS40LTMuN3YtNS4zYy0zIDMtNy4yIDUuMS0xMS41IDUuMWMtOC41IDAtMTUuNS03LjQtMTUuNS0xNS44IGMwLTguNCA2LjktMTUuOCAxNS40LTE1LjhjNC40IDAgOC42IDEuOSAxMS42IDUuMXYtNS4zYy0zLjQtMi41LTcuMS0zLjctMTEuNC0zLjdDOSA1MC45IDAgNTkuOCAwIDcwLjhDMCA4MS42IDkuMSA5MC4zIDE5LjkgOTAuMyB6Ii8+PHBhdGggZD0iTTM2LjUgNzAuN2MwIDExIDkgMTkuNyAxOS45IDE5LjdjMTAuOSAwIDE5LjktOC43IDE5LjktMTkuN2MwLTEwLjktOS0xOS44LTE5LjktMTkuOCBDNDUuNSA1MC45IDM2LjUgNTkuNyAzNi41IDcwLjd6IE01Ni40IDU0LjhDNjUuMiA1NC44IDcyIDYyIDcyIDcwLjZjMCA4LjYtNyAxNS44LTE1LjYgMTUuOGMtOC43IDAtMTUuNi03LjItMTUuNi0xNS44IEM0MC44IDYyIDQ3LjcgNTQuOCA1Ni40IDU0Ljh6Ii8+PHBvbHlnb24gcG9pbnRzPSI3OS4zLDg5LjcgODMuNiw4OS43IDg4LjUsNjMuOSA4OC42LDYzLjkgMTAwLjksOTEuMiAxMTMuMiw2My45IDExMy4zLDYzLjkgMTE4LjIsODkuNyAxMjIuNSw4OS43IDExNC44LDQ5LjQgMTAwLjksODEuNCA4Nyw0OS40Ii8+PHJlY3QgeD0iMTI3LjUiIHk9IjUxLjUiIHdpZHRoPSI0LjMiIGhlaWdodD0iMzguMSIvPjxwYXRoIGQ9Ik0xNTYuOSA1NC44YzQuNCAwIDguNiAxLjkgMTEuNiA1LjF2LTUuM2MtMy40LTIuNS03LjEtMy43LTExLjQtMy43Yy0xMC45IDAtMTkuOSA5LTE5LjkgMTkuOSBjMCAxMC44IDkuMSAxOS42IDE5LjkgMTkuNmM0IDAgOC4xLTEuNCAxMS40LTMuN3YtNS4zYy0zIDMtNy4yIDUuMS0xMS41IDUuMWMtOC41IDAtMTUuNS03LjQtMTUuNS0xNS44IEMxNDEuNiA2Mi4yIDE0OC40IDU0LjggMTU2LjkgNTQuOHoiLz48cGF0aCBkPSJNMTg1LjcgODYuNGMtNC4xIDAtNy4xLTMuMi03LjYtNy4xbC00LjEgMS4yYzEuMiA1LjkgNS44IDkuOSAxMS45IDkuOWM2LjYgMCAxMi01LjEgMTItMTEuOCBjMC02LjEtNC4yLTguNi05LjItMTAuN2wtMi41LTEuMWMtMi42LTEuMi02LTIuNy02LTZjMC0zLjUgMi45LTUuOSA2LjMtNS45YzMuMiAwIDUuMSAxLjUgNi42IDQuMWwzLjQtMi4yYy0yLTMuNy01LjYtNS45LTkuOS01LjkgYy01LjcgMC0xMC43IDMuOC0xMC43IDkuN2MwIDUuNSAzLjggNy43IDguMyA5LjhsMi4zIDFjMy41IDEuNiA3IDMuMSA3IDcuNkMxOTMuNiA4My4zIDE4OS44IDg2LjQgMTg1LjcgODYuNHoiLz48cmVjdCB5PSI5NyIgd2lkdGg9IjE5OCIgaGVpZ2h0PSIyIi8+PHJlY3QgeT0iMCIgd2lkdGg9IjE5OCIgaGVpZ2h0PSIyIi8+PC9zdmc+"></object></a></h1> <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
{% endhighlight %}

## Tested with the following plugins:

### BruteProtect
[BruteProtect](http://bruteprotect.com) — (mu-plugin) ✓

### For slideshows:
(suggested to display comics panel by panel)

- [RoyalSlider](http://dimsemenov.com/plugins/royal-slider/) - Touch Content Slider for WordPress by [Dmitry Semenov](http://dimsemenov.com/) ✓

- [Portfolio Slideshow Pro](http://momnt.co/downloads/portfolio-slideshow-pro) by [Momnt](http://momnt.co) ✓


### Disqus comments ✓

### MailChimp integration ✓
- [MailChimp for WordPress Lite](https://wordpress.org/plugins/mailchimp-for-wp/) by [Danny van Kooten](https://dannyvankooten.com/)

### Scroll Kit plugin ✓
[https://wordpress.org/plugins/scrollkit/](https://wordpress.org/plugins/scrollkit/)

No longer in use since Scroll Kit development is discontinued.
{: .notice}

### Theme-check ✓
Would pass theme-check if custom-post “comic” functions were removed. In the future, I might write a plugin to call these functions and release a simpler version of the theme.

### WordPress Beta Tester ✓
[https://wordpress.org/plugins/wordpress-beta-tester/](https://wordpress.org/plugins/wordpress-beta-tester/)

### WooCommerce ⚡︎
Enabled it on local test, it worked fine, but I removed it after an update messed with the database. I don’t think I would be using this plugin on a live site because it seems it can be a bit of a headache to maintain—this could change since their [acquisition by Automattic](https://ma.tt/2015/05/woomattic/). It is a good solution for small sites and indie developers, and it is free. If you don’t want to use a plugin, there are plenty of robust e-commerce solutions hosted on third parties severs. Anyway, if you want to use it, WooCommerce is compatible with this theme, you only need to add one line in functions.php. and a few lines of css.
{: .notice}

## Known issues

* As far as comics editing and management capabilities go, the functions are very basic. In part by design: why complicate things by adding useless features? But also due to my limited coding experience. 
* Comics navigation: the `<title>` link will show up in the middle of the page beneath the comic. An episode’s title (comic post) should not be too long so the navigation doesn’t break on mobile.
* If a comic post is uncategorised it will return an error when `WP_DEBUG` is *true*. The comics are sorted by custom taxonomy “story”; so before adding your own story titles, you should add a “draft” category in the “story” bow. From there on if you forget to assign a category to your comic post, comics that are not categorized will then fall as “story draft” without prompting any error.
* The theme does not (yet) serve smaller images files for mobile as I have not figured the best way to do that.
* On the blog side, post formats styling is not 100% completed— Styles for headings, typography rules etc. needs more work. 
* If after changing theme or re-activating the theme, your comics posts won’t show, go to Setting > Permalinks > Save, which will refresh the installation. This shouldn’t happen, though, since this issue is fixed by [Flushing Rewrite on Activation](https://codex.wordpress.org/Function_Reference/register_post_type#Flushing_Rewrite_on_Activation) ✓) 


## To do:
✓ = *done* ✓⚡︎ = *partially done*. **Blank** indicates *room for improvement / work to be done*.
{: .notice}
*	Modify navigation to show first, previous, next, last webcomic post ✓
*	Improve custom post and theme logic from a user point of view ✓⚡︎
*	Fix said navigation icons — as svg symbols with png fallback
* Design a minimal, custom post type for comics ✓
* Re-design the category archive page(s) with custom categories
* Reverse WP default order for comics archive ✓
*	Page grid to display books / episodes if not in archive
*	Add columns for extra large images ✓
*	Fix 3 columns footer widget media queries ✓
* Markup clean-up: trim unused code
* add / enable multiple stories by category ✓
* Style single images navigations (e.g. for separate panels) ✓⚡︎
* Redesign header.php
* Re-write content-image.php 
* Fix image per image comic posts navigation, it should navigate through images within the same post.
* Improve customisation (e.g. custom logo over header image, etc.)
* Fix or remove sidebar (there should be no sidebar) ✓
* improve category.php & custom comic categories—new logic uses custom taxonomies, rather than built-in categories ✓
* Improve mobile viewing ✓⚡︎
*	Fix comments JS, PHP & CSS ✓⚡︎
* style sticky post, pagelink and various post formats classes
*	Lots of small css tweaks and fixes
*	Design a consistent colour scheme!!!
*	Redesign the whole theme from scratch using *Less* or *Sass* to ease future maintenance
*	Third parties integration (e-commerce, social media, etc.) ⚡︎
*	Add `<picture>`element support for responsive images. See [picturefill.js + WP](http://www.taupecat.com/2014/05/picturefill-js-wordpress/)
*	Improve 404 page ✓
*	Fix compatibility issues for Internet Explorer & other browsers
*	Custom webfonts not loading on iPad 
*	Add icon support for [icomoon](https://icomoon.io) or [Genericons](http://genericons.com/)
*	Split the comic functions from the theme in a separate plugin (in compliance with WP best practices)
*	Test + feedback + implementation ⚡︎
*	Review the navigation / pagination logic (test) ✓
*	Add search for custom taxonomies ⚡︎
*	Write documentation
*	…

## Code review needed

Do you know how this theme can be improved? Please send your findings and suggestions over to

hoa // @ // silent-comics.com
