[![Codacy Badge](https://api.codacy.com/project/badge/Grade/e448b4df0cde4232a320d6f5580e76fa)](https://www.codacy.com/app/SilentComics/Strip?utm_source=github.com&utm_medium=referral&utm_content=SilentComics/Strip&utm_campaign=badger)
[![Build Status](https://travis-ci.org/SilentComics/Strip.svg?branch=master)](https://travis-ci.org/SilentComics/Strip)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/SilentComics/Strip/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/SilentComics/Strip/?branch=master)
[![Code Climate](https://codeclimate.com/github/SilentComics/Strip/badges/gpa.svg)](https://codeclimate.com/github/SilentComics/Strip)

[![Mastodon](https://img.shields.io/badge/Mastodon-@Silent_Comics-blue.svg?style=flat)](https://mastodon.social/users/Silent_Comics)

Strip: A WordPress Theme for Silent Comics
=================================

*Strip* is a WordPress theme designed for the upcoming [SILENT COMICS site](http://silent-comics.com). 

<figure>
<a href="https://github.com/SilentComics/Strip"><img src="http://silentcomics.com/images/screenshot.png"/></a>
</figure>

This theme is not 100% ready for production, although you are welcome to test it. Right now two of the theme's functions, *custom post type* and *custom taxonomy*, should go in a plugin. WordPress.org advocates for the separation of presentation and content<sup>[1](#myfootnote1)</sup>. While this is important for portability of content, custom functions within the theme suit this particular project at this point<sup>[2](#myfootnote2)</sup>. **Warning** :loudspeaker: But that means you would lose access to your (comics) data if you used this theme and then switched to another. That is not something you want to happen. So until a [simple webcomic plugin](https://github.com/SilentComics/strip-plugin) is ready to solve this potential issue, it is best to avoid using this theme on your live site.

# Theme Wiki
[Theme wiki](https://github.com/SilentComics/Strip/wiki/Theme-set-up)

## Contributing
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com)
I'd love to get contributions for this project. **I’m not a developer** at all and there is room for improvements. Do you know how to make this theme better? Please send your findings and suggestions over to hoa // @ // silent-comics.com

## Other ways you can help:
Theme review aside, there are a few ways you can [support this project ♥](https://silentcomics.com/lynchpin/). *Thank you!*

[![Flattr this git repo](http://api.flattr.com/button/flattr-badge-large.png)](https://flattr.com/submit/auto?user_id=512grl&url=https://github.com/SilentComics/Strip&title=Strip&language=&tags=github&category=software)

***

<small><a name="myfootnote1">1</a>: See WordPress.org’s [presentation vs functionality](https://make.wordpress.org/themes/handbook/review/required/#presentation-vs-functionality) guidelines</small>

<small><a name="myfootnote2">2</a>: Because the less plugins this project uses, the better.</small>
