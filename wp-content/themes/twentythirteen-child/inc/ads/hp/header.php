<?php
/*
This variable is set in functions.php for the theme.
*/
global $AD_TAG_DEV;
if ($AD_TAG_DEV) {
    $ptype = 'dev';
} else {
    $ptype = 'hp';
}
?>

<script type="text/javascript">
    var gptadslots=[];
    var googletag = googletag || {};
    googletag.cmd = googletag.cmd || [];
    (function(){ var gads = document.createElement('script');
        gads.async = true; gads.type = 'text/javascript';
        var useSSL = 'https:' == document.location.protocol;
        gads.src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
        var node = document.getElementsByTagName('script')[0];
        node.parentNode.insertBefore(gads, node);
    })();

    (function($) {
        $(document).ready(function() {
            $('div.excerpt-post:nth-child(6)').after($('div.adposition1'));
            $('div.excerpt-post:nth-child(12)').after($('div.adposition2'));

            var dfpslots = $(document).find('.adslot').filter(':visible'),
                i = 0,
                gptadslots = new Array();

            if(dfpslots.length) {
                googletag.cmd.push(function() {
                    $(dfpslots).each(function() {
                        gptadslots[i] = googletag.defineSlot($(this).attr('data-dfp'), 
                                                             [[$(this).data('width'), $(this).data('height')]],
                                                             $(this).attr('id'))
                                                 .setTargeting('pos', [$(this).attr('data-pos')])
                                                 .addService(googletag.pubads());
                        i++;
                    });

                    googletag.pubads().setTargeting('ptype',['<?php echo $ptype; ?>']);
                    googletag.pubads().enableAsyncRendering();
                    googletag.enableServices();

                    $(dfpslots).each(function() {
                        googletag.display($(this).attr('id'));
                    });
                });    
            }
        });        
    })(jQuery);
</script>
<!-- End: GPT -->

<div style="display: none;">
    <div class="loop-leaderboard adposition1">
        <hr>
        <div id="desktop-ad-river-leaderboard-1" class="adslot desktop-ad" data-width="728" data-height="90" data-dfp="/4011/trb.vivelohoy2/hp" data-pos="2"></div>
        <div id="mobile-ad-river-leaderboard-1" class="adslot mobile-ad" data-width="320" data-height="50" data-dfp="/4011/trb.vivelohoy2" data-pos="2"></div>
        <hr>
    </div>
    <div class="loop-leaderboard adposition2">
        <hr>
        <div id="desktop-ad-river-leaderboard-2" class="adslot desktop-ad" data-width="728" data-height="90" data-dfp="/4011/trb.vivelohoy2/hp" data-pos="3"></div>
        <div id="mobile-ad-river-leaderboard-2" class="adslot mobile-ad" data-width="320" data-height="50" data-dfp="/4011/trb.vivelohoy2" data-pos="3"></div>
        <hr>
    </div>
</div>