<?php

/*
render_omniture_tag({
        'server': 'www.vivelohoy.com',
        'prefix': 'VIVELOHOY',
        'category': category,
        'subcategory': subcategory,
        'search_term': search_term
    })
*/


/**
 * Pass array $args with the following keys:
 *
 * prefix      // (required) prefix for pageName, channel and hier vars
 * server      // (required) value for s.server
 * search_term // (optional) if on search page, pass in the search term
 * category    // (optional) category front name or top-level category; required for posts
 *             // and section fronts
 * subcategory // (optional) subcategory front name or second-level category
 *
 **/
function render_omniture_tag($args) {

    extract($args);

    $scode    = get_stylesheet_directory_uri() . '/js/s_code_vivelohoy.js';
    $saccount = ($saccount)? $saccount:'vivelohoy';

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

        if (!empty($category)) {
            $hier2 = $category;
            $pagename .= ' / ' . $category;
        }

        if (!empty($subcategory)) {
            $hier2 .= ':' . $subcategory;
            $pagename .= ' / ' . $subcategory;
        }

        if (is_single()) {
            global $post;

            if (is_page()) {
                $pagename .= ' / about';
                $suffix = ' - Front.';
                $hier2 = 'about';
                $evar21 = $prop38 = 'Front';
                $channel = $prefix . $channel_blogname . ':about';
            } else {

                $format = get_post_format($post->ID);

                switch ($format) {
                case 'gallery':
                    $suffix .= ' - photoga.';
                    $evar21 = $prop38 = 'photogallery';
                    break;
                case 'quote':
                    $suffix .= ' - Quote.';
                    $evar21 = $prop38 = 'Quote';
                    break;
                case 'link':
                    $suffix .= ' - Link.';
                    $evar21 = $prop38 = 'Link';
                    break;
                case 'video':
                    $suffix .= ' - Video.';
                    $evar21 = $prop38 = 'Video';
                    break;
                default:
                    $suffix .= ' - Story.';
                    $evar21 = $prop38 = 'Story';
                }

                $evar42 = get_the_author_meta('display_name', $post->post_author);
                $channel = $prefix . $channel_blogname . ':' . $category;
            }

            $len_test = strlen($pagename . $post->post_title . $suffix);

            if ($len_test > 100) {
                $end_idx = (strlen($post->post_title)) - ($len_test - 100);
                $pagename .= ' / ' . substr($post->post_title, 0, $end_idx) . $suffix;
            } else
                $pagename .= ' / ' . $post->post_title . $suffix;

        }

        if (is_archive()) {
            $pagename .= ' - Front.';
            $evar21 = $prop38 = 'Front';
            $channel = $prefix . $channel_blogname . ':' . $category;
        }

        if (is_search()) {
            $pagename .= ' - search.';
            $hier2 = 'search';
            $evar21 = $prop38 = 'search';
            $channel = $prefix . $channel_blogname . ':search';
        }

        if (is_author()) {
            global $wp_query;

            $slug = $wp_query->query_vars['author_name'];
            $author = get_user_by('slug', $slug);

            $hier2 = 'author:' . $slug;
            $pagename = $prefix . ' / ' . $author->display_name . ' - Author.';
            $evar21 = $prop38 = 'Author';
        }
    }

    $hier2 = str_replace('-', '', $hier_blogname . $hier2);
    $hier4 = $hier2;
    $hier1 = $prefix . ':' . $hier2;

    $tag = array(
        'scode'    => $scode,
        'saccount' => $saccount,
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
