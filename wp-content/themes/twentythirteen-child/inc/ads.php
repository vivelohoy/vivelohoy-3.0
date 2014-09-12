<?php
/*

CONSTANTS

These are used by the print_ad_tag() function in the main template files
themselves. For instance, $section_front_ad_tag_ids is used in category.php
where the top leaderboard is rendered with 

   print_ad_tag($section_front_ad_tag_ids[$category_string][1]);

*/

global $ad_tag_ids;

$ad_tag_ids = array(
    "home page"         => array(
        "leaderboard-top"       => "div-gpt-ad-856043657983405949-1",
        "leaderboard-bottom"    => "div-gpt-ad-856043657983405949-4"
        ),
    "section front"     => array(
        "default"           => array(
            "leaderboard-top"       => "div-gpt-ad-340518583735305265-1",
            "leaderboard-bottom"    => "div-gpt-ad-340518583735305265-4"  
            ),
        "deportes"          => array(
            "leaderboard-top"       => "div-gpt-ad-373909649000370341-1",
            "leaderboard-bottom"    => "div-gpt-ad-373909649000370341-4"  
            ),
        "entretenimiento"   => array(
            "leaderboard-top"       => "div-gpt-ad-317393757098521244-1",
            "leaderboard-bottom"    => "div-gpt-ad-317393757098521244-4"  
            ),
        "noticias-chicago"  => array(
            "leaderboard-top"       => "div-gpt-ad-397217213140450908-1",
            "leaderboard-bottom"    => "div-gpt-ad-397217213140450908-4"  
            ),
        "noticias-eeuu"     => array(
            "leaderboard-top"       => "div-gpt-ad-494842353933549437-1",
            "leaderboard-bottom"    => "div-gpt-ad-494842353933549437-4"  
            ),
        "noticias-mundo"    => array(
            "leaderboard-top"       => "div-gpt-ad-832903405327097869-1",
            "leaderboard-bottom"    => "div-gpt-ad-832903405327097869-2"  
            ),
        "opinion"           => array(
            "leaderboard-top"       => "div-gpt-ad-852248557877728958-1",
            "leaderboard-bottom"    => "div-gpt-ad-852248557877728958-4"  
            )
        ),
    "story"             => array(
        "default"           => array(
            "leaderboard-top"       => "div-gpt-ad-930890610326643866-1",
            "leaderboard-bottom"    => "div-gpt-ad-930890610326643866-3"  
            ),
        "deportes"          => array(
            "leaderboard-top"       => "div-gpt-ad-620216329994082504-1",
            "leaderboard-bottom"    => "div-gpt-ad-620216329994082504-2"  
            ),
        "entretenimiento"   => array(
            "leaderboard-top"       => "div-gpt-ad-877045850363442397-1",
            "leaderboard-bottom"    => "div-gpt-ad-877045850363442397-2"  
            ),
        "noticias-chicago"  => array(
            "leaderboard-top"       => "div-gpt-ad-748401326137094431-1",
            "leaderboard-bottom"    => "div-gpt-ad-748401326137094431-2"  
            ),
        "noticias-eeuu"     => array(
            "leaderboard-top"       => "div-gpt-ad-164770466101460252-1",
            "leaderboard-bottom"    => "div-gpt-ad-164770466101460252-2"  
            ),
        "noticias-mundo"    => array(
            "leaderboard-top"       => "div-gpt-ad-324892860807243856-1",
            "leaderboard-bottom"    => "div-gpt-ad-324892860807243856-2"  
            ),
        "opinion"           => array(
            "leaderboard-top"       => "div-gpt-ad-587798549212885747-1",
            "leaderboard-bottom"    => "div-gpt-ad-587798549212885747-2"  
            )
        )
    );

/*

FUNCTIONS

*/

function get_category_string() {
    // get_category_names() is defined in inc/utils.php
    $current_categories = get_category_names();
    if( $current_categories ) {
        if ( in_array( 'deportes', $current_categories ) ) {
            return 'deportes';
        } elseif ( in_array( 'entretenimiento', $current_categories ) ) {
            return 'entretenimiento';
        } elseif ( in_array( 'chicago', $current_categories ) ) {
            return 'noticias-chicago';
        } elseif ( in_array( 'eeuu', $current_categories ) ) {
            return 'noticias-eeuu';
        } elseif ( in_array( 'mundo', $current_categories ) ) {
            return 'noticias-mundo';
        } elseif ( in_array( 'opinion', $current_categories ) ) {
            return 'opinion';
        } else {
            return 'default';
        }
    } else {
        return 'default';
    }
}

function print_ad_tag($ad_tag_id) {
    ?>
<div id="<?php echo $ad_tag_id; ?>">
    <script type='text/javascript'>
        googletag.cmd.push(function() { googletag.display("<?php echo $ad_tag_id; ?>"); });
    </script>
</div>    
    <?php
}

function print_ad_script($page_type) {  
    include 'ads/header-begin.php';
    $category_string = get_category_string();
    switch ( $page_type ) {
        case "home page"        :
            include 'ads/hp/header.php';
            break;
        case "section front"    :
            switch ( $category_string ) {
                case 'deportes'         :
                    include 'ads/sf/deportes/header.php';
                    break;
                case 'entretenimiento'  :
                    include 'ads/sf/entretenimiento/header.php';
                    break;
                case 'noticias-chicago' :
                    include 'ads/sf/noticias-chicago/header.php';
                    break;
                case 'noticias-eeuu'    :
                    include 'ads/sf/noticias-eeuu/header.php';
                    break;
                case 'noticias-mundo'   :
                    include 'ads/sf/noticias-mundo/header.php';
                    break;
                case 'opinion'          :
                    include 'ads/sf/opinion/header.php';
                    break;                
                default                 :
                    include 'ads/sf/default/header.php';
                    break;
            }
            break;
        case "story"            :
            switch ($category_string) {
                case 'deportes'         :
                    include 'ads/s/deportes/header.php';
                    break;
                case 'entretenimiento'  :
                    include 'ads/s/entretenimiento/header.php';
                    break;
                case 'noticias-chicago' :
                    include 'ads/s/noticias-chicago/header.php';
                    break;
                case 'noticias-eeuu'    :
                    include 'ads/s/noticias-eeuu/header.php';
                    break;
                case 'noticias-mundo'   :
                    include 'ads/s/noticias-mundo/header.php';
                    break;
                case 'opinion'          :
                    include 'ads/s/opinion/header.php';
                    break;                
                default                 :
                    include 'ads/s/default/header.php';
                    break;
            }
            break;
        case "photo gallery"    : 
            switch ($category_string) {
                case 'deportes'         :
                    include 'ads/pg/deportes/header.php';
                    break;
                case 'entretenimiento'  :
                    include 'ads/pg/entretenimiento/header.php';
                    break;
                case 'noticias-chicago' :
                    include 'ads/pg/noticias-chicago/header.php';
                    break;
                case 'noticias-eeuu'    :
                    include 'ads/pg/noticias-eeuu/header.php';
                    break;
                case 'noticias-mundo'   :
                    include 'ads/pg/noticias-mundo/header.php';
                    break;
                case 'opinion'          :
                    include 'ads/pg/opinion/header.php';
                    break;                
                default                 :
                    include 'ads/pg/default/header.php';
                    break;
            }
            break;
        default                 :
            include 'ads/sf/default/header.php';
            break;
    }
}

