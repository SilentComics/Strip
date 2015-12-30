/**
 * login-colors.js 
 *
 * Changes login theme.
 *
 */

$(function(){
    var themeClassName = "theme_"+Math.floor((Math.random() * 10) + 1);
    $('body').addClass(themeClassName);
});