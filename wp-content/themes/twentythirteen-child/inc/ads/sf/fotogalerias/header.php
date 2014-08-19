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
?>

<script type="text/javascript">
    googletag.cmd.push(function() {

        //Adslot 1 declaration
        gptadslots[1]= googletag.defineSlot('/4011/trb.vivelohoy2/fotogalerias', [[728,90]],'div-gpt-ad-766198326707162480-1').setTargeting('pos',['1']).addService(googletag.pubads());

        //Adslot 2 declaration
        gptadslots[2]= googletag.defineSlot('/4011/trb.vivelohoy2/fotogalerias', [[728,90]],'div-gpt-ad-766198326707162480-2').setTargeting('pos',['2']).addService(googletag.pubads());

        //Adslot 3 declaration
        gptadslots[3]= googletag.defineSlot('/4011/trb.vivelohoy2/fotogalerias', [[728,90]],'div-gpt-ad-766198326707162480-3').setTargeting('pos',['3']).addService(googletag.pubads());

        //Adslot 4 declaration
        gptadslots[4]= googletag.defineSlot('/4011/trb.vivelohoy2/fotogalerias', [[728,90]],'div-gpt-ad-766198326707162480-4').setTargeting('pos',['4']).addService(googletag.pubads());

        googletag.pubads().setTargeting('ptype',['<?php echo $ptype; ?>']);
        googletag.pubads().enableAsyncRendering();
        googletag.enableServices();
    });
</script>
<!-- End: GPT -->
<script>
(function($) {
    $(document).ready(function() {
        $(".excerpt-post:nth-child(6)").after('<div class="loop-leaderboard"><hr><div id="div-gpt-ad-766198326707162480-2"></div><hr></div>');
        googletag.cmd.push(function() { googletag.display("div-gpt-ad-766198326707162480-2"); });
        $(".excerpt-post:nth-child(12)").after('<div class="loop-leaderboard"><hr><div id="div-gpt-ad-766198326707162480-3"></div><hr></div>');
        googletag.cmd.push(function() { googletag.display("div-gpt-ad-766198326707162480-3"); });
    });
})(jQuery);
</script> 