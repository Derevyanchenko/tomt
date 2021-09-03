<?php

add_action('wp_ajax_mm_comment_ajax', 'mm_comment_ajax_callback');
add_action('wp_ajax_nopriv_mm_comment_ajax', 'mm_comment_ajax_callback');

function mm_comment_ajax_callback()
{
    if (!empty($_POST['name']) && !empty($_POST['message'])) {

        $commentdata = array(
            'comment_post_ID' => (int) $_POST['currpage'],
            'comment_author' => $_POST['name'],
            'comment_content' => $_POST['message'],
            'comment_approved' => 0,
        );

        $comment_id = wp_insert_comment($commentdata);
        if (!empty($_POST['rating'])) {
            if ($comment_id) {
                update_field('rating', $_POST['rating'], get_comment($comment_id));
            }
        }

        if (!empty($_POST['surname'])) {
            if ($comment_id) {
                update_field('surname', $_POST['surname'], get_comment($comment_id));
            }
        }

        if (!empty($_POST['position'])) {
            if ($comment_id) {
                update_field('position', $_POST['position'], get_comment($comment_id));
            }
        }

        if (!empty($_POST['company'])) {
            if ($comment_id) {
                update_field('company', $_POST['company'], get_comment($comment_id));
            }
        }


        wp_die('ok');
    } else {
        wp_die('fail');
    }
}



add_action("wp_ajax_articles_filter", "articles_filter_callback");
add_action("wp_ajax_nopriv_articles_filter", "articles_filter_callback");

function articles_filter_callback()
{

    $articles_cat = $_POST['statusKinds_val'];
    $sorted = $_POST['sorted'];
    $page = $_POST["page"];

    $tax_params = array();

    if ($articles_cat == "demo") {
        $tax_params = array();
    } else {
        $tax_params = array(
            array(
                'taxonomy' => 'articles_cat',
                'field' => 'term_id',
                'terms' => $articles_cat,
            ),
        );
    }

    $posts = new WP_Query(array(
        "numberposts" => -1,
        "post_type" => "articles",
        'posts_per_page' => 6,
        'paged' => $page,
        'tax_query' => $tax_params,
    ));


    if ($sorted == "new") {

        $posts = new WP_Query(array(
            'numberposts'    => -1,
            'post_type'        => 'articles',
            'posts_per_page' => 6,
            'paged' => $page,
            "order"         => "DESC",
            'tax_query' => $tax_params,
        ));
    } else if ($sorted == "popular") {

        $posts = new WP_Query(array(
            'numberposts'    => -1,
            'post_type'        => 'articles',
            'paged' => $page,
            'posts_per_page' => 6,
            "order"         => "DESC",
            "meta_key"      => "post_views_count",
            "orderby"       => "meta_value_num",
            'tax_query' => $tax_params,
        ));
    }

    show_articles_items($posts, $page);
    wp_die();
}


// articles pagination

add_action("wp_ajax_articles_pagination", "articles_pagination_callback");
add_action("wp_ajax_nopriv_articles_pagination", "articles_pagination_callback");

function articles_pagination_callback()
{
    $page = $_POST["page"];
    $articles_cat = $_POST['articles_cat'];
    $sorted = $_POST['sorted'];

    $tax_params = array();

    if ( $articles_cat <= 0 ) {
        
        $posts = new WP_Query (array(
            'post_type' => 'articles',
            'paged' => $page,
            'posts_per_page' => 6,
        ));
    
    }

    if ( $articles_cat > 0 ) {
        
        $posts = new WP_Query (array(
            'post_type' => 'articles',
            'paged' => $page,
            'posts_per_page' => 6,
            'tax_query' => array(
                array(
                    'taxonomy' => 'articles_cat',
                    'field' => 'term_id',
                    'terms' => $articles_cat,
                )
            ),
        ));
    

    }

    show_articles_items($posts, $page);

    wp_die();

}


// articles pagination end


add_action("wp_ajax_news_filter", "news_filter_callback");
add_action("wp_ajax_nopriv_news_filter", "news_filter_callback");

function news_filter_callback()
{
    $page = $_POST["page"];
    $sorted = $_POST['sorted'];


    if ($sorted == "new") {

        $posts = new WP_Query(array(
            'numberposts'    => -1,
            'post_type'        => 'novosti',
            'posts_per_page' => 6,
            "order"         => "DESC",
            'paged' => $page,
        ));
    } else if ($sorted == "popular") {

        $posts = new WP_Query(array(
            'numberposts'    => -1,
            'post_type'        => 'novosti',
            'posts_per_page' => 6,
            "order"         => "DESC",
            "meta_key"      => "post_views_count",
            "orderby"       => "meta_value_num",
            'paged' => $page,
        ));
    }

    show_news_items($posts, $page);

    wp_die();
}



// news pagination

add_action("wp_ajax_articles_pagination", "articles_pagination_callback");
add_action("wp_ajax_nopriv_articles_pagination", "articles_pagination_callback");

function news_pagination_callback()
{
    $page = $_POST["page"];
    // $articles_cat = $_POST['articles_cat'];
    $sorted = $_POST['sorted'];

    
    $posts = new WP_Query (array(
        'post_type' => 'novosti',
        'paged' => $page,
        'posts_per_page' => 6,
    ));

    show_news_items($posts, $page);

    wp_die();

}


// articles pagination end