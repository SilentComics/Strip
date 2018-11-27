"use strict";
/**
 * Strip keyboard support for image navigation.
 */
/**
 * Strip keyboard support for image navigation.
 */
!function(i){i(document).on("keydown.strip",function(t){var e=!1;// Left arrow key code.
if(37===t.which)e=i(".previous a").attr("href");// Right arrow key code.
else{if(39!==t.which)return;e=i(".next a").attr("href")}e&&!i("textarea, input").is(":focus")&&(window.location=e)})}(jQuery);
//# sourceMappingURL=keyboard-image-navigation-min.js.map