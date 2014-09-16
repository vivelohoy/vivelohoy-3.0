(function($) {
    $(document).ready(function() {
        function increment_pageview(photo_idx) {
            // 's' is Omniture's object
            s.prop37 = "Photo " + photo_idx;
            s.events = "";
            s.t();
        }
        // Add a data attribute 'index' to each gallery item indicating which one it is
        // in numeric order from top to bottom, starting at 1.
        $('.gallery-item').each(function(index, item) {
            // increment the index so counting starts at 1
            $(item).data({'index': index + 1});
        });

        $('.gallery-item').waypoint(function () {
            increment_pageview($(this).data('index'));
        }, {
            triggerOnce: true,
            offset: 'bottom-in-view'
        });
    });
})(jQuery);