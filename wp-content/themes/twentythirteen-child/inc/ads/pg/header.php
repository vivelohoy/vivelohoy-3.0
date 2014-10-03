<?php
/*
This variable is set in functions.php for the theme.
*/
global $AD_TAG_DEV;
if ($AD_TAG_DEV) {
    $ptype = 'dev';
} else {
    $ptype = 'pg';
}

$ad_unit_paths = array(
    'opinion'           => '/4011/trb.vivelohoy2/Opinion',
    'deportes'          => '/4011/trb.vivelohoy2/deportes',
    'entretenimiento'   => '/4011/trb.vivelohoy2/entretenimiento',
    'mundo'             => '/4011/trb.vivelohoy2/noticias/mundo',
    'eeuu'              => '/4011/trb.vivelohoy2/noticias/EEUU',
    'chicago'           => '/4011/trb.vivelohoy2/noticias/chicago',
    'default'           => '/4011/trb.vivelohoy2'
);

$ad_unit_path = $ad_unit_paths[get_category_string()];
?>
<!-- Start: GPT Async -->
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
            for(var ad_position = 8; ad_position >= 1; ad_position--) {
                // 2*ad_position so ads appear every second image
                var image_container = $('figure.gallery-item:nth-child(' + 2*ad_position + ')');
                var ad_container = $('div.gallery-leaderboard[data-pos=' + ad_position + ']');
                $(image_container).after(ad_container);
            }

            googletag.cmd.push(function() {
                window.gptadslots = new Array();
                window.leader_slots = $(document).find('.adslot.leaderboard');
                var leader_mapping = googletag.sizeMapping()
                                        .addSize([768, 0], [728, 90])
                                        .addSize([0, 0], [320, 50])
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
                    googletag.pubads().refresh(window.gptadslots);
                }
            });
        });        
    })(jQuery);
</script>
<!-- End: GPT -->

<div style="display:none">
    <div class="gallery-leaderboard" data-pos="1">
        <hr>
        <div id="gallery-leaderboard-1" class="adslot leaderboard" data-width="728" data-height="90" data-pos="1"></div>
        <hr>
    </div>
    <div class="gallery-leaderboard" data-pos="2">
        <hr>
        <div id="gallery-leaderboard-2" class="adslot leaderboard" data-width="728" data-height="90" data-pos="2"></div>
        <hr>
    </div>
    <div class="gallery-leaderboard" data-pos="3">
        <hr>
        <div id="gallery-leaderboard-3" class="adslot leaderboard" data-width="728" data-height="90" data-pos="3"></div>
        <hr>
    </div>
    <div class="gallery-leaderboard" data-pos="4">
        <hr>
        <div id="gallery-leaderboard-4" class="adslot leaderboard" data-width="728" data-height="90" data-pos="4"></div>
        <hr>
    </div>
    <div class="gallery-leaderboard" data-pos="5">
        <hr>
        <div id="gallery-leaderboard-5" class="adslot leaderboard" data-width="728" data-height="90" data-pos="5"></div>
        <hr>
    </div>
    <div class="gallery-leaderboard" data-pos="6">
        <hr>
        <div id="gallery-leaderboard-6" class="adslot leaderboard" data-width="728" data-height="90" data-pos="6"></div>
        <hr>
    </div>
    <div class="gallery-leaderboard" data-pos="7">
        <hr>
        <div id="gallery-leaderboard-7" class="adslot leaderboard" data-width="728" data-height="90" data-pos="7"></div>
        <hr>
    </div>
    <div class="gallery-leaderboard" data-pos="8">
        <hr>
        <div id="gallery-leaderboard-8" class="adslot leaderboard" data-width="728" data-height="90" data-pos="8"></div>
        <hr>
    </div>
</div>
