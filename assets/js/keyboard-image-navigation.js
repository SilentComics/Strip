/**
 * Strip keyboard support for image navigation.
 */

( function( $ ) {
	$( document ).on( "keydown.strip", function( e ) {
		var url = false;

		// Left arrow key code.
		if ( 37 === e.which ) {
			url = $( '.previous a' ).attr( 'href' );

		// Right arrow key code.
		} else if ( 39 === e.which ) {
			url = $( '.next a' ).attr( 'href' );

		// Other key code.
		} else {
			return;
		}

		if ( url && ! $( "textarea, input" ).is( ":focus" ) ) {
			window.location = url;
			}
		}
	);
} ( jQuery ));
