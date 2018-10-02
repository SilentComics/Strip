=== Strip ===

Contributors: Anh Hoa Si, SILENT COMICS
Requires at least: WordPress 4.7.3
Tested up to: 4.9.8
Version; 1.1.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: one-column, flexible-header, grid-layout, custom-background, custom-colors, custom-header, custom-menu, editor-style, featured-images, post-formats, rtl-language-support, sticky-post, theme-options, custom-logo, translation-ready, blog

Strip is a WordPress theme designed for the upcoming [SILENT COMICS](https://silent-comics.com) site. The theme is released under the GNU General Public License but still under development.
If you intend to use this theme on a live site, please read the warning first.

=== Warning ===

At this writing, the theme doesn't comply with WordPress.org requirements of separation of presentation and content.
To be specific, two ```functions, register_post_type()``` and ```register_taxonomy()``` should go in a plugin.
These enable "comics", and sorting through different series or "stories".
In effect, this creates an involuntary lock-in effect.
This means you would lose access to your (comics) data if you used this theme and then switched to another theme.
The data would still exist but you wouldn’t be able to see it.
That is an unwanted consequence of sharing a theme designed for a specific project.
Until a simple comic plugin can solve this potential issue, it is best to avoid using this theme on your live site.

**DO NOT** use it on your live site, unless the above doesn’t bother you.

== Description ==

Strip is a theme to showcase and manage online comics with WordPress.
Easy to use, distraction free and responsive.
Designed for large images, galleries and continuous stories, optimized for fullscreen mode on desktop computers, mobile and tablets.
Its main function is a comic post format with basic navigation for web comics.
It will display comics in ascending or descending order (scroll) or one panel at a time, using the native WP gallery for each comic post (card). Following this logic, each story reads either panel by panel or page by page.
The theme will handle different series or one-offs, sorted under the custom taxonomy “story”.
A comic post without category will default to “draft”.
Blog features: one column, simple typography, and post-formats.
Non obtrusive commenting with toggle on & off button.
Four columns footer widget, no sidebars.

Features:
Minimal look, custom posts format for comics, no sidebar, large images. Custom login page.
Large body text set in [Fenix](http://tipotype.com/fenix/), headings set in Futura.
Light-weight theme, tested with the latest WordPress version (4.7)

For more information about Silent Comics please go to https://Strip.com/about.

== Installation ==

- 1 Download Strip Theme from GitHub

- 2 Upload Strip directory into your WordPress installation’s theme folder (wp-content/themes).

- 3 In the WordPress backend, find and activate the theme under Appearance —> Themes.

== Setup ==

- 1 Create your menus and submenus. You can add a header image, a background image and change the theme’s background colour.

- 2 To use your own logo in svg format, you need to edit header.php.
Replace the Base64 code found in assets/inline-logo.svg.php with your own logo.
You can then call your logo in header.php replacing this line: `<?php get_template_part(‘assets/inline', 'logo.svg'); ?>`.
Or remove that line if you don’t bother about having a svg logo.
You can also add a custom image logo from the customizer → site identity → logo, just use the site text title or both.

- 3 To publish a comic you can post under “comic” or “add a new comic”.
Add a story name to sort comics by titles for multiple stories.
Each series will live in a loop of its own.
The default for unclassified comic stories is “draft”.
There is an archive page template for all comic stories taxonomies: archive-comic.php.
Since the theme has archive ordered by term, you can have any comics story archive on its own page.
You need to write your own `taxonomy-$taxonomy-$term.php` for each story, after `taxonomy-story-draft.php`.
e.g. if you created a story called “name”, you must add a file taxonomy-story-new.php.
A “new” title link will show in the left hand side above each individual “name” comic posts.
This will take you to page displaying all “name” comics in ascendant order.
You can change the order in the template.
The url will be http://yoururl/story/name

- 4 Post each comic episode as a single image or several images to form one comic.
The theme allows for high resolution pictures.
The recommended width for large images is 1920px.
The theme uses native WordPress galleries for galleries posted in comics and regular posts.
Clicking on one image will take the user to a single image page. So a comics can read panel by panel.
You can go to the next single panel by click or keyboard navigation (left and right arrows).
For galleries, you can use an image slider plugin instead of the single image page.
Based on tests, I would recommend RoyalSlider or Portfolio Slideshow Pro.

== Managing comics ==
Once you create a comic story, or episode, you should assign it a “story” name. If you are familiar with WordPress, think about story as a *taxonomy* or category. This allows you to sort through and archive multiple stories. Archiving comics by story `$terms` is easy.  Once you have created your first comic posts, you can replace “name” in the template `taxonomy-story-name.php` by your story you’ll have to change  with your own title. For multiple stories, just clone this template with new details for each new story. You can also write a story description which will show on the specific story archive pages.

Templates:
`archive.php`
This is the archive for your regular blog posts, unless you play with functions.php to change this behaviour, the comics won’t be archived in this page.

Comics specific archive templates:
`archive-comic.php`
This is where all your comics are archived in ascending order, by title. Pagination is set by default to the default posts per page set in WordPress dashboard > Settings > Reading `Blog pages show at most` number. You can change the `'posts_per_page'` number.

`archive-story.php`
This is a template you can use to archive your comics in a three columns grids.
Archived by title in descending order by default. You can add a story term (your story name) to `'story'`
You can change `'posts_per_page'` number, use `-1` to retrieve all the comics. Change `'DESC'` to `'ASC'` if you want the comics to appear in chronological order, starting from the first.

`archive-titles.php`
This template call all comics episodes but will only display their titles, in ascending order. It’s basically a single row of titles, grouped by stories.

`taxonomy-story-draft.php`
The fallback for all uncategorized stories — no pagination.
Note that for the theme to run smoothly you should have a single taxonomy for each story.
A "draft" taxonomy is a good way to preview your unpublished stories.

`taxonomy-story-name.php`
A sample template — replace “name” by your own story title and duplicate this template with new details for each new story

## Pagination.
In WordPress, pagination method differs for a static front page and other pages — Strip has archives for comics (archive.story.php and taxonomy-story-name.php for instance). If you use these template for your home page you need to adjust the pagination accordingly
 `get_query_var( 'paged' )`` should become  `get_query_var( 'page')``

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Strip includes support for Infinite Scroll in Jetpack, and support for WooCommerce.


== Credits ==

Strip WordPress Theme, Copyright 2013-2018 silent-comics.com

Strip Theme bundles the following third-party resources:
Based on Underscores http://underscores.me/, Copyright 2012-2016 Automattic, Inc.,
Licence: [GPLv3 or later](https://www.gnu.org/licenses/gpl-3.0.html)

normalize.css http://necolas.github.io/normalize.css/, Copyright 2012-2016 Nicolas Gallagher and Jonathan Neal
Licence: [MIT](http://opensource.org/licenses/MIT)

HTML5 Shiv v3.7.0, Copyright 2014 Alexander Farkas
Licences: MIT/GPL2
Source: https://github.com/aFarkas/html5shiv

Custom Admin, Copyright Eddie Machado
License: WTFPL
URL: http://themble.com/bones/

Fenix font, Copyright Fernando Díaz, TipoType, 2012
Licence: EULA
Source: http://www.ferfolio.com/about/

Inconsolata, Copyright Raphael Levien
Licence: Open Font License of SIL
Source: http://www.levien.com/type/myfonts/inconsolata.html

Strip is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

== Notes ==

This theme looks best in the latest version of one of the following browsers; Safari, Firefox, Edge, Chrome, Opera, Vivaldi or Brave.

Found a bug? Please report it to hoa // at // silent-comics.com
