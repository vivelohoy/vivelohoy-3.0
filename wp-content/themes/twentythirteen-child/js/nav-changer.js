(function($) {
$(document).scroll(function () {
    var y = $(this).scrollTop();
    if (y < 200) {
        $('.topmenu').fadeIn(0);
    }else {
        $('.topmenu').fadeOut(0);
    }

});
$(document).scroll(function () {
    var y = $(this).scrollTop();
    if (y > 200) {
        $('.bottomMenu').fadeIn(0);
    } else {
        $('.bottomMenu').fadeOut(0);
    }

});
})(jQuery);