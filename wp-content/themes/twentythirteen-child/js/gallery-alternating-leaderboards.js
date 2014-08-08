(function($) {
    gallery_leaderboard_code = $('<div class="gallery-leaderboard"><hr><iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe><hr></div>');
    $(document).ready(function() {
        $('.gallery-item:nth-child(2n)').after(gallery_leaderboard_code);
    });
})(jQuery);