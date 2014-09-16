<?php

function render_omniture_tag() {
    $server = 'www.vivelohoy.com';
    $prefix = 'VIVELOHOY';

    $scode    = get_stylesheet_directory_uri() . '/js/s_code_vivelohoy.js';

    /*
     * Include blog name in:
     *     - channel
     *     - pagename
     *     - hier1
     *     - hier2
     *     - hier4
     */
    if (get_current_blog_id() != 1)
        $blogname = get_bloginfo('name');

    $channel_blogname =     (!empty($blogname))? ':' . $blogname : '';
    $pagename_blogname =    (!empty($blogname))? ' / ' . $blogname : '';
    $hier_blogname =       (!empty($blogname))? $blogname . ':' : '';

    if (is_404()) {
        $pagetype = 'errorPage';

        $tag = array(
            'server' => $server,
            'scode' => $scode,
            'pagetype' => $pagetype
        );

            $context = Timber::get_context(); 
            $context['tag'] = $tag;
            Timber::render('templates/omniture.twig', $context); 
        return;
    }

    if (is_home()) {
        $pagename = $prefix . $pagename_blogname . ' - Home.';
        $evar21 = $prop38 = 'Home';
        $hier2 = 'home';
        $channel = $prefix . $channel_blogname . ':home';
    } else {
        $pagename = $prefix . $pagename_blogname;

        $categories = get_category_names();

        if (!empty($category)) {
            sort($categories);
            $hier2 = implode(":", $categories);
            $pagename .= implode(" / ", $categories);
        }

        if (is_single()) {
            if (is_page()) {
                $pagename .= ' / about';
                $suffix = ' - Front.';
                $hier2 = 'about';
                $evar21 = $prop38 = 'Front';
                $channel = $prefix . $channel_blogname . ':about';
            } else {
                switch (get_post_format()) {
                case 'gallery'  :    $suffix = ' - photoga.';
                                     $evar21 = $prop38 = 'photogallery';
                                     break;
                default         :    $suffix = ' - Story.';
                                     $evar21 = $prop38 = 'Story';
                                     break;
                }

                $evar42 = get_the_author();
                $channel = $prefix . $channel_blogname . ':' . implode(" / ", $categories);
            }

            // Need to handle the added string length as a result of special characters that use two bytes
            $len_test = strlen($pagename . get_the_title() . $suffix);

            if ($len_test > 100) {
                $end_idx = (strlen(get_the_title())) - ($len_test - 100);
                $pagename .= ' / ' . substr(get_the_title(), 0, $end_idx) . $suffix;
            } else
                $pagename .= ' / ' . get_the_title() . $suffix;

        }

        if (is_archive()) {
            $pagename .= ' - Front.';
            $evar21 = $prop38 = 'Front';
            $channel = $prefix . $channel_blogname . ':' . implode(" / ", $categories);
        }

        if (is_search()) {
            $pagename .= ' - search.';
            $hier2 = 'search';
            $evar21 = $prop38 = 'search';
            $channel = $prefix . $channel_blogname . ':search';
            $search_term = $_REQUEST['q'];
        }

        if (is_author()) {
            global $wp_query;

            $slug = $wp_query->query_vars['author_name'];
            $author = get_user_by('slug', $slug);

            $hier2 = 'author:' . $slug;
            $pagename = $prefix . ' / ' . get_the_author() . ' - Author.';
            $evar21 = $prop38 = 'Author';
        }
    }

    $hier2 = str_replace('-', '', $hier_blogname . $hier2);
    $hier4 = $hier2;
    $hier1 = $prefix . ':' . $hier2;

    $tag = array(
        'scode'    => $scode,
        'server'   => $server,
        'pagetype' => $pagetype,
        'pagename' => $pagename,
        'prop38'   => $prop38,
        'evar20'   => $evar20,
        'evar21'   => $evar21,
        'evar42'   => $evar42,
        'search_term' => $search_term,
        'channel'  => $channel,
        'hier1'    => $hier1,
        'hier2'    => $hier2,
        'hier4'    => $hier4
    );

    $context = Timber::get_context(); 
    $context['tag'] = $tag;
    Timber::render('templates/omniture.twig', $context);    
}
