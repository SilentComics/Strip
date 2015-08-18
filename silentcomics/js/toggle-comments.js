// Show/Hide Comments
jQuery(document).ready(function() {

	// Get #comment-section div
	var commentsDiv = jQuery('#comments');

	// Only do this work if that div isn't empty
	if (commentsDiv.length) {

	// Hide #comment-section div by default
	jQuery(commentsDiv).hide();

	// Append a link to show/hide
	jQuery('<button/>')
		.attr('class', 'toggle-comments')
		.attr('href', '#respond')
		.text('Join the discussion')
		.insertBefore(commentsDiv);

	// Encase button in #toggle-comments-container div
	jQuery('.toggle-comments').wrap(jQuery('<div/>', {
		id: 'toggle-comments-container'
	}));

	// When show/hide is clicked
	jQuery('.toggle-comments').on('click', function(e) {
		e.preventDefault();

	// Show/hide the div using jQuery's toggle()
	jQuery(commentsDiv).toggle('slow', function() {
	// change the text of the anchor
		var anchor = jQuery('.toggle-comments');
		var anchorText = anchor.html() === 'Hide Comments' ? 'Show Comments' : 'Hide Comments';
		jQuery(anchor).text(anchorText);
	});
	});
 
	} // End of commentsDiv.length
	
}); // End of Show/Hide Comments