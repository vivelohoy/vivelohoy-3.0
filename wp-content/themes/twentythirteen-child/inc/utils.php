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

/*
This is useful mainly for debugging purposes. Insert a <?php print_info(); ?> block into a page
like single.php or category.php.
*/
function print_info() {
    $c = get_category_names();
    if ( $c ) {
        echo "Categories:<br>";
        echo "<pre>";
        print_r($c);
        echo "</pre>";
    }
    if ( is_single() ) {
        $post_format = get_post_format();
        if ( false === $post_format) {
            $post_format = 'standard';
        }
        $post_type = get_post_type();

        echo "<hr>Post Format: $post_format<br><hr>";

        echo "Post Type: $post_type<br><hr>";
    }
}

function hoy_var_dump($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}