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
    googletag.cmd.push(function() {

        //Adslot 1 declaration
        gptadslots[1]= googletag.defineSlot('/4011/trb.vivelohoy2/hp', [[728,90]],'div-gpt-ad-766297934540924626-1').setTargeting('pos',['1']).addService(googletag.pubads());

        //Adslot 2 declaration
        gptadslots[2]= googletag.defineSlot('/4011/trb.vivelohoy2/hp', [[300,250]],'div-gpt-ad-766297934540924626-2').setTargeting('pos',['1']).addService(googletag.pubads());

        //Adslot 3 declaration
        gptadslots[3]= googletag.defineSlot('/4011/trb.vivelohoy2/hp', [[300,250]],'div-gpt-ad-766297934540924626-3').setTargeting('pos',['2']).addService(googletag.pubads());

        //Adslot 4 declaration
        gptadslots[4]= googletag.defineSlot('/4011/trb.vivelohoy2/hp', [[300,250]],'div-gpt-ad-766297934540924626-4').setTargeting('pos',['3']).addService(googletag.pubads());

        //Adslot 5 declaration
        gptadslots[5]= googletag.defineSlot('/4011/trb.vivelohoy2/hp', [[728,90]],'div-gpt-ad-766297934540924626-5').setTargeting('pos',['2']).addService(googletag.pubads());

        googletag.pubads().setTargeting('ptype',['sf']);
        googletag.pubads().enableAsyncRendering();
        googletag.enableServices();
    });
</script>
<!-- End: GPT -->

<script>
(function($) {
    $(document).ready(function() {
        $('#thumb-view:nth-child(4)').after('<div id="cube-thumb"><div id="div-gpt-ad-766297934540924626-2"></div></div>');
        googletag.cmd.push(function() { googletag.display("div-gpt-ad-766297934540924626-2"); });
        $('#thumb-view:nth-child(9)').after('<div id="cube-thumb"><div id="div-gpt-ad-766297934540924626-3"></div></div>');
        googletag.cmd.push(function() { googletag.display("div-gpt-ad-766297934540924626-3"); });
        $('#thumb-view:nth-child(14)').after('<div id="cube-thumb"><div id="div-gpt-ad-766297934540924626-4"></div></div>');
        googletag.cmd.push(function() { googletag.display("div-gpt-ad-766297934540924626-4"); });
    });
})(jQuery);
</script> 