/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $, wp ) {
    var api = wp.customize;

    // Site title and description.
    api( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '#header h1 a, #footer a.site-name' ).html( to );
        } );
    } );

    api( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '#header p.site-description' ).html( to );
        } );
    } );
     // Header text color.
     api("header_textcolor", function(value) {
         value.bind(function(to) {
             if ("blank" === to) {
                 $(".site-title, .site-description").css({
                     "clip": "rect(1px, 1px, 1px, 1px)",
                     "position": "absolute"
                 });
             } else {
                 $(".site-title, .site-description").css({
                     "clip": "auto",
                     "color": to,
                     "position": "static"
                 });
                 $(".site-title a, .site-description").css({
                     "color": to
                 });
                 $(".site-title a").css({
                     "border-color": to
                 });
             }
         });
     });
 }(jQuery));
