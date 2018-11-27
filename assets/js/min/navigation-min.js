/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
!function(){
/**
     * Sets or removes .focus class on an element.
     */
function e(){
// Move up through the ancestors of the current link until we hit .nav-menu.
for(var e=this;-1===e.className.indexOf("nav-menu");)
// On li elements toggle the class .focus.
"li"===e.tagName.toLowerCase()&&(-1!==e.className.indexOf("focus")?e.className=e.className.replace(" focus",""):e.className+=" focus"),e=e.parentElement}var a,t,s,n,l;if((a=document.getElementById("site-navigation"))&&void 0!==(t=a.getElementsByTagName("button")[0]))
// Hide menu toggle button if menu is empty and return early.
if(void 0!==(s=a.getElementsByTagName("ul")[0])){s.setAttribute("aria-expanded","false"),-1===s.className.indexOf("nav-menu")&&(s.className+=" nav-menu"),t.onclick=function(){-1!==a.className.indexOf("toggled")?(a.className=a.className.replace(" toggled",""),t.setAttribute("aria-expanded","false"),s.setAttribute("aria-expanded","false")):(a.className+=" toggled",t.setAttribute("aria-expanded","true"),s.setAttribute("aria-expanded","true"))},
// Get all the link elements within the menu.
n=s.getElementsByTagName("a");
// Set menu items with submenus to aria-haspopup="true".
for(var i=0,r=(l=s.getElementsByTagName("ul")).length;i<r;i++)l[i].parentNode.setAttribute("aria-haspopup","true");
// Each time a menu link is focused or blurred, toggle focus.
for(i=0,r=n.length;i<r;i++)n[i].addEventListener("focus",e,!0),n[i].addEventListener("blur",e,!0)}else t.style.display="none"}();