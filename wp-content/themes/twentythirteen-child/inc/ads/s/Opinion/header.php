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
?>

<script type="text/javascript">
    googletag.cmd.push(function() {

        //Adslot 1 declaration
        gptadslots[1]= googletag.defineSlot('/4011/trb.vivelohoy2/Opinion', [[728,90]],'div-gpt-ad-587798549212885747-1').setTargeting('pos',['1']).addService(googletag.pubads());

        //Adslot 2 declaration
        gptadslots[2]= googletag.defineSlot('/4011/trb.vivelohoy2/Opinion', [[728,90]],'div-gpt-ad-587798549212885747-2').setTargeting('pos',['2']).addService(googletag.pubads());

        //Adslot 3 declaration
        gptadslots[3]= googletag.defineSlot('/4011/trb.vivelohoy2/Opinion', [[300,250]],'div-gpt-ad-587798549212885747-3').setTargeting('pos',['1']).addService(googletag.pubads());

        googletag.pubads().setTargeting('ptype',['<?php echo $ptype; ?>']);
        googletag.pubads().enableAsyncRendering();
        googletag.enableServices();
    });
</script>
<!-- End: GPT -->
<script>
(function($) {
    $(document).ready(function() {
        // Cube ad in standard (non-gallery) post
        if(typeof(is_gallery) !== 'undefined' && !is_gallery) {
            // is_gallery is set in single.php
            $('.entry-content > p:nth-of-type(2)').before('<div id="content-cube"><div id="div-gpt-ad-587798549212885747-3"></div></div>');
            googletag.cmd.push(function() { googletag.display("div-gpt-ad-587798549212885747-3"); });
        }
    });
})(jQuery);
</script> 