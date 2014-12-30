function increment_pageview_for_photo(photo_idx) {
    // Omniture
    if(typeof(s) !== 'undefined') {
        s.prop37 = "Photo " + photo_idx;
        s.events = "";
        s.t();
        console.log('Omniture pageview!');
    } else {
        console.log('Omniture not loaded yet, so a pageview was lost and an angel lost its wings.');
    }
    // Google Analytics
    if(typeof(ga) !== 'undefined') {
        ga('send', 'pageview');
        console.log('Google Analytics pageview!');
    } else {
        console.log('Google Analytics not loaded yet, so a pageview was lost and a child shed a tear.');
    }
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