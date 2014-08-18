<?php
/*

CONSTANTS

*/

global $section_front_ad_tag_ids;
global $regular_story_ad_tag_ids;
global $gallery_story_ad_tag_ids;
global $home_page_ad_tag_ids;

/*
 These section front pages should each have 4 ads
*/
$section_front_ad_tag_ids = array(
    "noticias/chicago"  =>    array(1 => "div-gpt-ad-397217213140450908-1",
                                    2 => "div-gpt-ad-397217213140450908-2",
                                    3 => "div-gpt-ad-397217213140450908-3",
                                    4 => "div-gpt-ad-397217213140450908-4"),
    "deportes"          =>    array(1 => "div-gpt-ad-373909649000370341-1",
                                    2 => "div-gpt-ad-373909649000370341-2",
                                    3 => "div-gpt-ad-373909649000370341-3",
                                    4 => "div-gpt-ad-373909649000370341-4"),
    "noticias/EEUU"     =>    array(1 => "div-gpt-ad-494842353933549437-1",
                                    2 => "div-gpt-ad-494842353933549437-2",
                                    3 => "div-gpt-ad-494842353933549437-3",
                                    4 => "div-gpt-ad-494842353933549437-4"),
    "entretenimiento"   =>    array(1 => "div-gpt-ad-317393757098521244-1",
                                    2 => "div-gpt-ad-317393757098521244-2",
                                    3 => "div-gpt-ad-317393757098521244-3",
                                    4 => "div-gpt-ad-317393757098521244-4"),
    "fotogalerias"      =>    array(1 => "div-gpt-ad-766198326707162480-1",
                                    2 => "div-gpt-ad-766198326707162480-2",
                                    3 => "div-gpt-ad-766198326707162480-3",
                                    4 => "div-gpt-ad-766198326707162480-4"),
    "noticias/mundo"    =>    array(1 => "div-gpt-ad-832903405327097869-1",
                                    2 => "div-gpt-ad-832903405327097869-2",
                                    3 => "div-gpt-ad-832903405327097869-3",
                                    4 => "div-gpt-ad-832903405327097869-4"),
    "Opinion"           =>    array(1 => "div-gpt-ad-852248557877728958-1",
                                    2 => "div-gpt-ad-852248557877728958-2",
                                    3 => "div-gpt-ad-852248557877728958-3",
                                    4 => "div-gpt-ad-852248557877728958-4")
);

/*
 Regular story posts should have 3 ads - 2 banner ads and a cube ad
 The first two IDs are for the banner ads at top and bottom and the third
 ID is for the cube ad
*/
$regular_story_ad_tag_ids = array(
    "noticias/chicago"  =>    array(1 => "div-gpt-ad-748401326137094431-1",
                                    2 => "div-gpt-ad-748401326137094431-2",
                                    3 => "div-gpt-ad-748401326137094431-3"),
    "deportes"          =>    array(1 => "div-gpt-ad-620216329994082504-1",
                                    2 => "div-gpt-ad-620216329994082504-2",
                                    3 => "div-gpt-ad-620216329994082504-3"),
    "noticias/EEUU"     =>    array(1 => "div-gpt-ad-164770466101460252-1",
                                    2 => "div-gpt-ad-164770466101460252-2",
                                    3 => "div-gpt-ad-164770466101460252-3"),
    "entretenimiento"   =>    array(1 => "div-gpt-ad-877045850363442397-1",
                                    2 => "div-gpt-ad-877045850363442397-2",
                                    3 => "div-gpt-ad-877045850363442397-3"),
    "noticias/mundo"    =>    array(1 => "div-gpt-ad-324892860807243856-1",
                                    2 => "div-gpt-ad-324892860807243856-2",
                                    3 => "div-gpt-ad-324892860807243856-3"),
    "Opinion"           =>    array(1 => "div-gpt-ad-587798549212885747-1",
                                    2 => "div-gpt-ad-587798549212885747-2",
                                    3 => "div-gpt-ad-587798549212885747-3")
);
/*
 Gallery story posts have 10 ads, banner ads that intersperse the photos
*/
$gallery_story_ad_tag_ids = array(
    1   => "div-gpt-ad-523701446549874316-1",
    2   => "div-gpt-ad-523701446549874316-2",
    3   => "div-gpt-ad-523701446549874316-3",
    4   => "div-gpt-ad-523701446549874316-4",
    5   => "div-gpt-ad-523701446549874316-5",
    6   => "div-gpt-ad-523701446549874316-6",
    7   => "div-gpt-ad-523701446549874316-7",
    8   => "div-gpt-ad-523701446549874316-8",
    9   => "div-gpt-ad-523701446549874316-9",
    10  => "div-gpt-ad-523701446549874316-10"
);

/*
 The Home Page "section front" has 4 banner ads, one at top, one at bottom, and two
 interspersed among the stories listed there
*/
$home_page_ad_tag_ids = array(
    1   => "div-gpt-ad-856043657983405949-1",
    2   => "div-gpt-ad-856043657983405949-2",
    3   => "div-gpt-ad-856043657983405949-3",
    4   => "div-gpt-ad-856043657983405949-4"
);

/*

FUNCTIONS

*/

function get_category_string() {
    // Using underscore.php to simplify the category list
    $categories = __u::map(get_the_category(), function($c) { return $c->slug; });
    if ( in_array( 'fotogalerias', $categories, true ) ) {
        return 'fotogalerias';
    } elseif ( in_array( 'opinion', $categories, true ) ) {
        return 'Opinion';
    } elseif ( in_array( 'entretenimiento', $categories, true ) ) {
        return 'entretenimiento';
    } elseif ( in_array( 'deportes', $categories, true ) ) {
        return 'deportes';
    } elseif ( in_array( 'noticias', $categories, true ) ) {
        if ( in_array( 'chicago', $categories, true ) ) {
            return 'noticias/chicago';
        } elseif ( in_array( 'mundo', $categories, true ) ) {
            return 'noticias/mundo';
        } elseif ( in_array( 'eeuu', $categories, true ) ) {
            return 'noticias/EEUU';
        } else {
            return 'hp';
        }
    } else {
        return 'hp';
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
    switch ($page_type) {      
        case "sf"   :
            $category_string = get_category_string();
            switch ($category_string) {
                case "noticias/chicago" : 
                    include 'ads/sf/noticias-chicago/header.php';
                    break;
                case "deportes"         : 
                    include 'ads/sf/deportes/header.php';
                    break;
                case "noticias/EEUU"    : 
                    include 'ads/sf/noticias-EEUU/header.php';
                    break;
                case "entretenimiento"  : 
                    include 'ads/sf/entretenimiento/header.php';
                    break;
                case "fotogalerias"     : 
                    include 'ads/sf/fotogalerias/header.php';
                    break;
                case "noticias/mundo"   : 
                    include 'ads/sf/noticias-mundo/header.php';
                    break;
                case "Opinion"          : 
                    include 'ads/sf/Opinion/header.php';
                    break;
                default:
                    break;
            }
            break;
        case "s"    :
            $category_string = get_category_string();
            switch ($category_string) {
                case "noticias/chicago" : 
                    include 'ads/s/noticias-chicago/header.php';
                    break;
                case "deportes"         : 
                    include 'ads/s/deportes/header.php';
                    break;
                case "noticias/EEUU"    : 
                    include 'ads/s/noticias-EEUU/header.php';
                    break;
                case "entretenimiento"  : 
                    include 'ads/s/entretenimiento/header.php';
                    break;
                case "noticias/mundo"   : 
                    include 'ads/s/noticias-mundo/header.php';
                    break;
                case "Opinion"          : 
                    include 'ads/s/Opinion/header.php';
                    break;
                default:
                    break;
            }
            break;
        case "pg"   : 
            include 'ads/pg/header.php';
            break;
        case "hp"   : 
            include 'ads/hp/header.php';
            break;
        default:
            break;
    }
}

