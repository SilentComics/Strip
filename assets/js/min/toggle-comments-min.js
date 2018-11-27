/**
 * toggle-comments.js
 *
 * Show and hide comments animation.
 */
jQuery(document).ready(function(){
// Get #comment-section div
var t=jQuery("#comments");
// Only do this work if that div isn't empty
t.length&&(
// Hide #comment-section div by default
jQuery(t).hide(),
// Append a link to show/hide
jQuery("<button/>").attr("class","toggle-comments").attr("href","#").text("Join the Discussion").insertBefore(t),
// Encase button in #toggle-comments-container div
jQuery(".toggle-comments").wrap(jQuery("<div/>",{id:"toggle-comments-container"})),
// When show/hide is clicked
jQuery(".toggle-comments").on("click",function(e){e.preventDefault(),
// Show/hide the div using jQuery's toggle()
jQuery(t).toggle("slow",function(){
// change the text of the anchor
var e=jQuery(".toggle-comments"),t="Hide Comments"===e.html()?"Show Comments":"Hide Comments";jQuery(e).text(t)})}));// End of commentsDiv.length
});// End of Show/Hide Comments