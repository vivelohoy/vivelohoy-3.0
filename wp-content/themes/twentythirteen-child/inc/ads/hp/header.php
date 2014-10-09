<?php
/*
This variable is set in functions.php for the theme.
*/
global $AD_TAG_DEV;
if ($AD_TAG_DEV) {
    $ptype = 'dev';
} else {
    $ptype = 'sf';
}

$ad_unit_path = '/4011/trb.vivelohoy2/hp';
?>

<script type="text/javascript">
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
            $('div.post-in-loop:nth-child(6)').after($('div.loop-leaderboard[data-pos=2]'));
            $('div.post-in-loop:nth-child(12)').after($('div.loop-leaderboard[data-pos=3]'));

            googletag.cmd.push(function() {
                window.gptadslots = new Array();
                window.leader_slots = $(document).find('.adslot.leaderboard');
                var leader_mapping = googletag.sizeMapping()
                                        .addSize([768, 0], [728, 90])
                                        .addSize([0, 0], [300, 50])
                                        .build(),
                    i = 0;

                $(window.leader_slots).each(function() {
                    window.gptadslots[i] = googletag.defineSlot('<?php echo $ad_unit_path; ?>', 
                                                                [[$(this).data('width'), $(this).data('height')]],
                                                                $(this).attr('id'))
                                                    .setTargeting('pos', [$(this).attr('data-pos')])
                                                    .defineSizeMapping(leader_mapping)
                                                    .addService(googletag.pubads());
                    i++;
                });

                googletag.pubads().setTargeting('ptype',['<?php echo $ptype; ?>']);
                googletag.pubads().enableAsyncRendering();
                googletag.enableServices();

                $(window.leader_slots).each(function() {
                    googletag.display($(this).attr('id'));
                });                
            });

            mediaCheck({
                media: '(max-width: 768px)',
                both: function() {
                    googletag.cmd.push(function() {
                        googletag.pubads().refresh(window.gptadslots);
                    });
                }
            });
        });        
    })(jQuery);
</script>
<!-- End: GPT -->

<div style="display: none;">
    <div class="loop-leaderboard" data-pos="2">
        <hr>
        <div id="loop-leaderboard-1" class="adslot leaderboard" data-width="728" data-height="90" data-pos="2"></div>
        <hr>
    </div>
    <div class="loop-leaderboard" data-pos="3">
        <hr>
        <div id="loop-leaderboard-2" class="adslot leaderboard" data-width="728" data-height="90" data-pos="3"></div>
        <hr>
    </div>
</div>