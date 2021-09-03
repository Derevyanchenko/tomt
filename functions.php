<?php

add_action('wp_enqueue_scripts', 'tomt_styles');
add_action('wp_enqueue_scripts', 'tomt_scripts');
add_action( 'admin_menu', 'edit_admin_menus' );

add_action("admin_head", "hide_child_taxonomies_on_the_front_page");

add_action('acf/init', 'my_acf_init');
add_action("init", "register_post_type_news");
add_action("init", "register_post_type_articles");
add_action('init', 'create_taxonomy_articles_cat');
// add_action("init", 'register_post_type_services');
add_action("init", "register_post_type_vakansii");
add_action("init", "register_post_type_equipment");
add_action("init", "create_taxonomy_equipment_cat");

add_action("init", "register_post_type_equipment_new");
add_action("init", "create_taxonomy_equipment_cat_new");

add_action("init", "register_post_type_manufacturers");
add_action("init", "create_taxonomy_manufacturers");
add_action("init", "register_post_type_spares");

// ajax post types

add_action("init", "register_post_type_call_form");
add_action("init", "register_post_type_make_order");
add_action("init", "register_post_type_contacts_request");
add_action("init", "register_post_type_price_request");
add_action("init", "register_post_type_orders");


add_filter('excerpt_more', function ($more) {
    return '...';
});

add_filter('excerpt_length', function () {
    return 40;
});

function edit_admin_menus() {
    global $menu;
  
    $menu[25][0] = 'Отзывы'; // Изменить комментарии на отзывы
}


function hide_child_taxonomies_on_the_front_page() {

    $front_page_id = get_option("page_on_front"); 
// 67
    if ( get_the_ID() == $front_page_id) {
        echo '<style>
        .acf-taxonomy-field .acf-checkbox-list ul.children {display: none;}
        </style>';
    }

}

// .acf-taxonomy-field .acf-checkbox-list ul.children

add_theme_support('custom-logo', array(
    'height' => 85,
    'width' => 85,
    'flex-width' => true,
    'flex-height' => true,
));


register_nav_menus(array(
    "main_menu" => esc_html__("top", "clean"),
));

register_nav_menus(array(
    "footer_menu" => esc_html__("bottom", "clean"),
));

add_theme_support("post-thumbnails");


// add post views 

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// add post views end


// register theme settings

function my_acf_init()
{

    if (function_exists('acf_add_options_page')) {

        $option_page = acf_add_options_page(array(
            'page_title' => 'Настройки темы',
            'menu_title' => 'Настройки темы',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
            'position' => '76',
            'post_id' => 'theme-general-settings',
        ));

    }

}

// register theme settings end


// styles

function tomt_styles()
{
    wp_enqueue_style('finex-style', get_stylesheet_uri());
    wp_enqueue_style('bundle-style', get_template_directory_uri() . "/assets/css/style.bundle.css");
}

function tomt_scripts()
{
    wp_enqueue_script("main-script", get_template_directory_uri() . "/assets/js/bundle.js", array("jquery"), "", true);

    wp_localize_script('main-script', 'mm_ajax_object',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'templ_dir_uri' => get_template_directory_uri(),
            'uploads_dir_uri' => wp_upload_dir()['baseurl'],
            'home_url' => home_url()
        ));

}

// styles end


// includes

include 'includes/post-types.php';
include 'includes/mm-comment.php';
include 'includes/ajax-loops.php';
include 'includes/mm-ajax.php';
include 'includes/ajax-forms.php';
