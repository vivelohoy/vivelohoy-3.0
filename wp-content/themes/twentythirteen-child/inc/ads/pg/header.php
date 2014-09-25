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
<script type='text/javascript'>
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
</script>

<script type="text/javascript">
    googletag.cmd.push(function() {
        gptadslots[1]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-1').setTargeting('pos',['1']).addService(googletag.pubads());       
        gptadslots[2]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-2').setTargeting('pos',['2']).addService(googletag.pubads());
        gptadslots[3]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-3').setTargeting('pos',['3']).addService(googletag.pubads());
        gptadslots[4]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-4').setTargeting('pos',['4']).addService(googletag.pubads());
        gptadslots[5]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-5').setTargeting('pos',['5']).addService(googletag.pubads());
        gptadslots[6]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-6').setTargeting('pos',['6']).addService(googletag.pubads());
        gptadslots[7]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-7').setTargeting('pos',['7']).addService(googletag.pubads());
        gptadslots[8]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-8').setTargeting('pos',['8']).addService(googletag.pubads());
        gptadslots[9]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-9').setTargeting('pos',['9']).addService(googletag.pubads());
        gptadslots[10]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-10').setTargeting('pos',['10']).addService(googletag.pubads());
        gptadslots[11]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-11').setTargeting('pos',['11']).addService(googletag.pubads());
        gptadslots[12]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-12').setTargeting('pos',['12']).addService(googletag.pubads());
        gptadslots[13]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-13').setTargeting('pos',['13']).addService(googletag.pubads());
        gptadslots[14]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-14').setTargeting('pos',['14']).addService(googletag.pubads());
        gptadslots[15]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-15').setTargeting('pos',['15']).addService(googletag.pubads());
        gptadslots[16]= googletag.defineSlot('<?php echo $ad_unit_path; ?>', [[728,90]],'desktop-ad-gallery-leaderboard-16').setTargeting('pos',['16']).addService(googletag.pubads());

        googletag.pubads().setTargeting('ptype',['<?php echo $ptype; ?>']);
        googletag.pubads().enableAsyncRendering();
        googletag.enableServices();
    });
</script>
<!-- End: GPT -->

<div style="display:none">
    <!-- START - Desktop Ad Tags -->
    <div class="gallery-leaderboard desktop-ad adposition1">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-1'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-1'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition2">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-2'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-2'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition3">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-3'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-3'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition4">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-4'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-4'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition5">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-5'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-5'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition6">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-6'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-6'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition7">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-7'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-7'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition8">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-8'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-8'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition9">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-9'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-9'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition10">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-10'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-10'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition11">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-11'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-11'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition12">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-12'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-12'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition13">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-13'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-13'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition14">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-14'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-14'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition15">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-15'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-15'); });
            </script>
        </div>
        <hr>
    </div>
    <div class="gallery-leaderboard desktop-ad adposition16">
        <hr>
        <div id='desktop-ad-gallery-leaderboard-16'>
            <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('desktop-ad-gallery-leaderboard-16'); });
            </script>
        </div>
        <hr>
    </div>
    <!-- END - Desktop Ad Tags -->
    <!-- START - Mobile Ad Tags -->
    <!-- END - Mobile Ad Tags -->
</div>

<script>
(function($) {
    $(document).ready(function() {
        for(var ad_position = 16; ad_position > 0; ad_position--) {
            // 2*ad_position so ads appear every second image
            var image_container = $('figure.gallery-item:nth-child(' + 2*ad_position + ')');
            var ad_container = $('div.gallery-leaderboard.adposition' + ad_position);
            $(image_container).after(ad_container);
        }
    });
})(jQuery);
</script> 