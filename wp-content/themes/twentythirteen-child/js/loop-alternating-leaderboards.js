(function($) {
    leaderboard_code = $('<div class="loop-leaderboard"><hr><iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe><hr></div>');
    $(document).ready(function() {
        $('.excerpt-post:nth-child(5n)').after(leaderboard_code);
    });
})(jQuery);