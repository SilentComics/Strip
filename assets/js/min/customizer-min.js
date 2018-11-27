"use strict";
/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
!function(i,t){var e=t.customize;// Site title and description.
e("blogname",function(t){t.bind(function(t){i("#header h1 a, #footer a.site-name").html(t)})}),e("blogdescription",function(t){t.bind(function(t){i("#header p.site-description").html(t)})}),// Header text color.
e("header_textcolor",function(t){t.bind(function(t){"blank"===t?i(".site-title, .site-description").css({clip:"rect(1px, 1px, 1px, 1px)",position:"absolute"}):(i(".site-title, .site-description").css({clip:"auto",color:t,position:"static"}),i(".site-title a, .site-description").css({color:t}),i(".site-title a").css({"border-color":t}))})})}(jQuery);
//# sourceMappingURL=customizer-min.js.map