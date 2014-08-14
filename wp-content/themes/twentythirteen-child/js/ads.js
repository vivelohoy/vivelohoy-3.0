(function($) {
    $(document).ready(function(){
        // Cube ad in thumbnail view loop
        $('#thumb-view:nth-child(5n+4)').after('<div id="cube-thumb"><iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=2;ptype=sf;pos=1;sz=300x250;u=%s;ord=%s" height="250" width="300" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=2;ptype=sf;pos=1;sz=300x250;u=http://www.vivelohoy.com/;ord=86085469"></iframe></div>');
        // Leaderboard ads in list view loop
        $('.excerpt-post:nth-child(6n)').after('<div class="loop-leaderboard"><hr><iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe><hr></div>');  
        // Cube ad in standard (non-gallery) post
        if(typeof(is_gallery) !== 'undefined' && !is_gallery) {
            // is_gallery is set in single.php
            $('.entry-content > p:nth-of-type(2)').before('<div id="content-cube"><iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=2;ptype=sf;pos=1;sz=300x250;u=%s;ord=%s" height="250" width="300" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=2;ptype=sf;pos=1;sz=300x250;u=http://www.vivelohoy.com/;ord=86085469"></iframe></div>');
        }  
        // Leaderboard ads in gallery post
        $('.gallery-item:nth-child(2n)').after('<div class="gallery-leaderboard"><hr><iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe><hr></div>');                  
    });
})(jQuery);