function increment_pageview_for_photo(photo_idx) {
    // Omniture
    s.prop37 = "Photo " + photo_idx;
    s.events = "";
    s.t();
    // Google Analytics
    ga('send', 'pageview');
}

(function($) {
    $(document).ready(function() {
        // Add a data attribute 'index' to each gallery item indicating which one it is
        // in numeric order from top to bottom, starting at 1.
        $('.gallery-item').each(function(index, item) {
            // increment the index so counting starts at 1
            $(item).data({'index': index + 1});
        });

        // When a gallery item scrolls fully into view, count a page view
        $('.gallery-item').waypoint(function () {
            increment_pageview_for_photo($(this).data('index'));
        }, {
            triggerOnce: true,
            offset: 'bottom-in-view'
        });
    });
})(jQuery);