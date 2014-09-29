<?php
function get_category_names() {
    $valid_categories = array("noticias", "mundo", "chicago", "eeuu", "entretenimiento", "opinion", "deportes", "fotogalerias");    
    if ( is_single() ) {
        $categories = array_map(function($cat) { return sanitize_title($cat->name); }, 
                                array_values(get_the_category()));
        $categories = array_values(array_intersect($categories, $valid_categories));
        return $categories;
    } elseif ( is_category() ) {
        $url_chunks = explode("/", $_SERVER['REQUEST_URI']);
        $categories = array_values(array_intersect($url_chunks, $valid_categories));
        return $categories;
    } else {
        return array();
    }
}