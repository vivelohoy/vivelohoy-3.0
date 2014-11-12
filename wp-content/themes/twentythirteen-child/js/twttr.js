(function($) {
	$(document).ready(function() {
		// This is for story level
		var text = encodeURIComponent($('h1:first').text());
		var url = window.location;
		var via = 'vivelohoy'
		$('.twitter-share-link').attr('href', 'http://twitter.com/intent/tweet?text=' + text + '&url=' + url + '&via=' + via);
		// This is for front page loop
		$('.post-in-loop-container a.twitter_link').each(function() {
			var text = encodeURIComponent($(this).data('text'));
			var url = $(this).data('url');
			$(this).attr('href', 'http://twitter.com/intent/tweet?text=' + text + '&url=' + url + '&via=' + via);
		});
	});
})(jQuery);