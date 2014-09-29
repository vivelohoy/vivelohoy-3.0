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

    googletag.cmd.push(function() {

        // Desktop Ads
        gptadslots[1]= googletag.defineSlot('/4011/trb.vivelohoy2/hp', [[728,90]],'desktop-ad-top-leaderboard').setTargeting('pos',['1']).addService(googletag.pubads());

        gptadslots[2]= googletag.defineSlot('/4011/trb.vivelohoy2/hp', [[728,90]],'desktop-ad-river-leaderboard-1').setTargeting('pos',['2']).addService(googletag.pubads());

        gptadslots[3]= googletag.defineSlot('/4011/trb.vivelohoy2/hp', [[728,90]],'desktop-ad-river-leaderboard-2').setTargeting('pos',['3']).addService(googletag.pubads());

        gptadslots[4]= googletag.defineSlot('/4011/trb.vivelohoy2/hp', [[728,90]],'desktop-ad-bottom-leaderboard').setTargeting('pos',['4']).addService(googletag.pubads());

        // Mobile Ads
        gptadslots[5] = googletag.defineSlot('/4011/trb.vivelohoy2', [[320,50]], 'mobile-ad-top-leaderboard').setTargeting('pos',['1']).addService(googletag.pubads());

        gptadslots[6] = googletag.defineSlot('/4011/trb.vivelohoy2', [[320,50]], 'mobile-ad-river-leaderboard-1').setTargeting('pos',['2']).addService(googletag.pubads());

        gptadslots[7] = googletag.defineSlot('/4011/trb.vivelohoy2', [[320,50]], 'mobile-ad-river-leaderboard-2').setTargeting('pos',['3']).addService(googletag.pubads());

        gptadslots[8] = googletag.defineSlot('/4011/trb.vivelohoy2', [[320,50]], 'mobile-ad-bottom-leaderboard').setTargeting('pos',['4']).addService(googletag.pubads());



        googletag.pubads().setTargeting('ptype',['<?php echo $ptype; ?>']);
        googletag.pubads().enableAsyncRendering();
        googletag.enableServices();
    });
</script>
<!-- End: GPT -->

<div style="display:none">
    <!-- START - Desktop Ad Tags -->
    <div class="loop-leaderboard desktop-ad adposition1">
        <hr>
        <div id="desktop-ad-river-leaderboard-1">
            <script type="text/javascript">
                googletag.cmd.push(function() { googletag.display("desktop-ad-river-leaderboard-1"); });
            </script>
        </div>
        <hr>
    </div>
    <div class="loop-leaderboard desktop-ad adposition2">
        <hr>
        <div id="desktop-ad-river-leaderboard-2">
            <script type="text/javascript">
                googletag.cmd.push(function() { googletag.display("desktop-ad-river-leaderboard-2"); });
            </script>
        </div>
        <hr>
    </div>
    <!-- END - Desktop Ad Tags -->
    <!-- START - Mobile Ad Tags -->
    <div class="loop-leaderboard mobile-ad adposition1">
        <hr>
        <div id="mobile-ad-river-leaderboard-1">
            <script type="text/javascript">
                googletag.cmd.push(function() { googletag.display("mobile-ad-river-leaderboard-1"); });
            </script>
        </div>
        <hr>
    </div>
    <div class="loop-leaderboard mobile-ad adposition2">
        <hr>
        <div id="mobile-ad-river-leaderboard-2">
            <script type="text/javascript">
                googletag.cmd.push(function() { googletag.display("mobile-ad-river-leaderboard-2"); });
            </script>
        </div>
        <hr>
    </div>    
    <!-- END - Mobile Ad Tags -->
</div>

<script>
(function($) {
    $(document).ready(function() {
        $('div.excerpt-post:nth-child(6)').after($('div.adposition1'));
        $('div.excerpt-post:nth-child(12)').after($('div.adposition2'));
    });
})(jQuery);
</script> 