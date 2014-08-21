<?php
/*

CONSTANTS

These are used by the print_ad_tag() function in the main template files
themselves. For instance, $section_front_ad_tag_ids is used in category.php
where the top leaderboard is rendered with 

   print_ad_tag($section_front_ad_tag_ids[$category_string][1]);

*/

global $section_front_ad_tag_ids;
global $regular_story_ad_tag_ids;
global $gallery_story_ad_tag_ids;
global $author_page_ad_tag_ids;
global $home_page_ad_tag_ids;
global $home_page_thumb_view_ad_tag_ids;

/*
 These section front pages should each have 4 ads

 #1 - top leaderboard
 #2, #3 - leaderboards interspersed
 #4 - bottom leaderboard
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
                                    4 => "div-gpt-ad-852248557877728958-4"),
    "noticias"          =>    array(1 => "div-gpt-ad-810260953707914537-1",
                                    2 => "div-gpt-ad-810260953707914537-2",
                                    3 => "div-gpt-ad-810260953707914537-3",
                                    4 => "div-gpt-ad-810260953707914537-4"),
    "default"           =>    array(1 => "div-gpt-ad-340518583735305265-1",
                                    2 => "div-gpt-ad-340518583735305265-2",
                                    3 => "div-gpt-ad-340518583735305265-3",
                                    4 => "div-gpt-ad-340518583735305265-4")
);

/*
 Regular story posts should have 3 ads - 2 banner ads and a cube ad
 The first two IDs are for the banner ads at top and bottom and the third
 ID is for the cube ad

 #1 - top leaderboard
 #2 - cube ad after first paragraph
 #3 - bottom leaderboard
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
                                    3 => "div-gpt-ad-587798549212885747-3"),
    "noticias"          =>    array(1 => "div-gpt-ad-138559680333218223-1",
                                    2 => "div-gpt-ad-138559680333218223-2",
                                    3 => "div-gpt-ad-138559680333218223-3"),
    "default"           =>    array(1 => "div-gpt-ad-930890610326643866-1",
                                    2 => "div-gpt-ad-930890610326643866-2",
                                    3 => "div-gpt-ad-930890610326643866-3")    
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
 Author page is much like a section front in that it has a loop but it's
 not topic-specific. We should use the fallback/default ad tags for a section front.
*/
$author_page_ad_tag_ids = array(
    1   => "div-gpt-ad-340518583735305265-1",
    2   => "div-gpt-ad-340518583735305265-2",
    3   => "div-gpt-ad-340518583735305265-3",
    4   => "div-gpt-ad-340518583735305265-4"    
);

/*
 The Home Page "section front" has 4 banner ads, one at top, one at bottom, and two
 interspersed among the stories listed there

 #1 - top leaderboard
 #2, #3 - interspersed banner ads
 #4 - bottom leaderboard
*/
$home_page_ad_tag_ids = array(
    1   => "div-gpt-ad-856043657983405949-1",
    2   => "div-gpt-ad-856043657983405949-2",
    3   => "div-gpt-ad-856043657983405949-3",
    4   => "div-gpt-ad-856043657983405949-4"
);

/*
The Home page thumb view "section front" has 2 banner ads, one at top and one at bottom,
and 3 cube ads interspersed among the story thumbnails.

#1 - top leaderboard
#2, #3, #4 - interspersed cube ads
#5 - bottom leaderboard
*/
$home_page_thumb_view_ad_tag_ids = array(
    1   => "div-gpt-ad-766297934540924626-1",
    2   => "div-gpt-ad-766297934540924626-2",
    3   => "div-gpt-ad-766297934540924626-3",
    4   => "div-gpt-ad-766297934540924626-4",
    5   => "div-gpt-ad-766297934540924626-5"
);

/*

FUNCTIONS

*/

function get_category_string() {
    global $current_url;
    if ( strpos( $current_url, '/deportes' ) !== false ) {
        return 'deportes';
    } elseif ( strpos( $current_url, '/fotogalerias' ) !== false ) {
        return 'fotogalerias';
    } elseif ( strpos( $current_url, '/opinion' ) !== false ) {
        return 'Opinion';
    } elseif ( strpos( $current_url, '/entretenimiento' ) !== false ) {
        return 'entretenimiento';
    } elseif ( strpos( $current_url, '/noticias' ) !== false ) {
        if ( strpos( $current_url, '/chicago' ) !== false ) {
            return 'noticias/chicago';
        } elseif ( strpos( $current_url, '/mundo' ) !== false ) {
            return 'noticias/mundo';
        } elseif ( strpos( $current_url, '/eeuu' ) !== false ) {
            return 'noticias/EEUU';
        } else {
            return 'noticias';
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
                case "noticias"         :
                    include 'ads/sf/noticias/header.php';
                    break;
                default:
                    include 'ads/sf/default/header.php';
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
                case "noticias"         :
                    include 'ads/s/noticias/header.php';
                    break;
                default:
                    include 'ads/s/default/header.php';
                    break;
            }
            break;
        case "pg"       : 
            // photo gallery
            include 'ads/pg/header.php';
            break;
        case "hp"       :
            // home page 
            include 'ads/hp/header.php';
            break;
        case "hp-thumb" :
            // home page - thumb view
            include 'ads/hp-thumb/header.php';
            break;
        case "author"   :
            // author page
            include 'ads/sf/default/header.php';
            break;
        default:
            break;
    }
}

