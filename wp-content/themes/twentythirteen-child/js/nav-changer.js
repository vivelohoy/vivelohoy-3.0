(function($) {
$(document).scroll(function () {
    var y = $(this).scrollTop();
    if (y < 200) {
        $('.topmenu').fadeIn(0);
        $('.bottomMenu').fadeOut(0);
    }else {
        $('.topmenu').fadeOut(0);
        $('.bottomMenu').fadeIn(0);
    }
});
})(jQuery);