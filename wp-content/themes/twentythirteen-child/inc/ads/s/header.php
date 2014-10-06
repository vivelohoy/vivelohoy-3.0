<?php
/*
This variable is set in functions.php for the theme.
*/
global $AD_TAG_DEV;
if ($AD_TAG_DEV) {
    $ptype = 'dev';
} else {
    $ptype = 's';
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
            // Cube ad in standard (non-gallery) post
            if(typeof(is_gallery) !== 'undefined' && !is_gallery) {
                // is_gallery is set in single.php
                $('.entry-content > p:nth-of-type(2)').before($('#content-body-300x250'));
            }

            googletag.cmd.push(function() {
                window.gptadslots = new Array();
                window.leader_slots = $(document).find('.adslot.leaderboard');
                window.cube_slots = $(document).find('.adslot.cube');
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
                $(window.cube_slots).each(function() {
                    window.gptadslots[i] = googletag.defineSlot('<?php echo $ad_unit_path; ?>', 
                                                                [[$(this).data('width'), $(this).data('height')]],
                                                                $(this).attr('id'))
                                                    .setTargeting('pos', [$(this).attr('data-pos')])
                                                    .addService(googletag.pubads());
                    i++;
                });

                googletag.pubads().setTargeting('ptype',['<?php echo $ptype; ?>']);
                googletag.pubads().enableAsyncRendering();
                googletag.enableServices();

                $(window.leader_slots).each(function() {
                    googletag.display($(this).attr('id'));
                });     
                $(window.cube_slots).each(function() {
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

<div style="display:none">
    <div id="content-body-300x250" class="adslot cube" data-width="300" data-height="250" data-pos="2"></div>
</div>