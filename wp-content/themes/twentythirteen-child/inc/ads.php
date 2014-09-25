<?php
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

function print_ad_script($page_type) {  
    switch ( $page_type ) {
        case "home page"        :
            include 'ads/hp/header.php';
            break;
        case "section front"    :
            include 'ads/sf/header.php';
            break;
        case "story"            :
            include 'ads/s/header.php';
            break;
        case "photo gallery"    : 
            include 'ads/pg/header.php';
            break;
        default                 :
            include 'ads/sf/header.php';
            break;
    }
}

