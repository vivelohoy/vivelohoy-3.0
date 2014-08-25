<?php
// Set the language of the admin to English
function vivelohoy_set_admin_lang($lang) {
    if( is_admin() ) {
        $lang = 'en_US';
    }
    return $lang;
}
add_filter( 'locale', 'vivelohoy_set_admin_lang' );