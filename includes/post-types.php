<?php 

// post type "services"

// function register_post_type_services()
// {
//     register_post_type('uslugi', array(
//         'labels' => array(
//             'name' => 'Услуги', // Основное название типа записи
//             'singular_name' => 'Услуга', // отдельное название записи типа Book
//             'add_new' => 'Добавить услугу',
//             'add_new_item' => 'Добавить новую услугу',
//             'edit_item' => 'Редактировать услугу',
//             'new_item' => 'Новая услуга',
//             'view_item' => 'Посмотреть услугу',
//             'search_items' => 'Найти услугу',
//             'not_found' => 'Услуг не найдено',
//             'not_found_in_trash' => 'В корзине услугу не найдено',
//             'parent_item_colon' => '',
//             'menu_name' => 'Услуги',
//         ),
//         'public' => true,
//         'publicly_queryable' => true,
//         'show_ui' => true,
//         'show_in_menu' => true,
//         'query_var' => true,
//         'taxonomies' => array(""),
//         /*'rewrite' => array('slug' => 'uslugi', 'with_front' => false),*/
//         'capability_type' => 'post',
//         'has_archive' => false,
//         'menu_icon' => 'dashicons-media-default',
//         'hierarchical' => false,
//         'menu_position' => null,
//         'supports' => array('title', 'editor'),
//     ));
// }

function register_post_type_news()
{
    register_post_type('novosti', array(
        'labels' => array(
            'name' => 'Новости', // Основное название типа записи
            'singular_name' => 'Новость', // отдельное название записи типа Book
            'add_new' => 'Добавить новость',
            'add_new_item' => 'Добавить новую новость',
            'edit_item' => 'Редактировать новость',
            'new_item' => 'Новая новость',
            'view_item' => 'Посмотреть новость',
            'search_items' => 'Найти новость',
            'not_found' => 'Новостей не найдено',
            'not_found_in_trash' => 'В корзине новостей не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Новости',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        // 'rewrite' => array('slug' => 'novosti', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => false,
        'menu_icon' => 'dashicons-media-default',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}


function register_post_type_articles()
{
    register_post_type('articles', array(
        'labels' => array(
            'name' => 'Статьи', // Основное название типа записи
            'singular_name' => 'Статья', // отдельное название записи типа Book
            'add_new' => 'Добавить статью',
            'add_new_item' => 'Добавить новую статью',
            'edit_item' => 'Редактировать статью',
            'new_item' => 'Новая статья',
            'view_item' => 'Посмотреть статью',
            'search_items' => 'Найти статью',
            'not_found' => 'Статей не найдено',
            'not_found_in_trash' => 'В корзине статей не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Статьи',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        // 'rewrite' => array('slug' => 'blog', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => false,
        'menu_icon' => 'dashicons-media-default',
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}

function create_taxonomy_articles_cat()
{
    register_taxonomy('articles_cat', array('articles'), array(
        'label' => '', // определяется параметром $labels->name
        'labels' => array(
            'name' => 'категории статей',
            'singular_name' => 'категория статьи',
            'search_items' => 'Найти категорию',
            'all_items' => 'Все категории',
            'view_item ' => 'Посмотреть категории',
            'parent_item' => 'Parent категория',
            'parent_item_colon' => 'Parent категория:',
            'edit_item' => 'Редактировать категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новая категория',
            'menu_name' => 'Категории статей',
        ),
        'description' => '', // описание таксономии
        'public' => true,
        'publicly_queryable' => null, // равен аргументу public
        'show_in_nav_menus' => true, // равен аргументу public
        'show_ui' => true, // равен аргументу public
        'show_in_menu' => true, // равен аргументу show_ui
        'show_tagcloud' => true, // равен аргументу show_ui
        'show_in_rest' => null, // добавить в REST API
        'rest_base' => null, // $taxonomy
        'hierarchical' => true,
        'update_count_callback' => '',
        'rewrite' => array('slug' => 'kategorii-statey', 'with_front' => false),
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities' => array(),
        'meta_box_cb' => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column' => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin' => false,
        'show_in_quick_edit' => null, // по умолчанию значение show_ui
    ));
}

function register_post_type_vakansii()
{
    register_post_type('vakansii', array(
        'labels' => array(
            'name' => 'Вакансии', // Основное название типа записи
            'singular_name' => 'Вакансия', // отдельное название записи типа Book
            'add_new' => 'Добавить вакансии',
            'add_new_item' => 'Добавить новую вакансию',
            'edit_item' => 'Редактировать вакансию',
            'new_item' => 'Новая вакансия',
            'view_item' => 'Посмотреть вакансию',
            'search_items' => 'Найти вакансию',
            'not_found' => 'Вакансий не найдено',
            'not_found_in_trash' => 'В вакансий статей не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Вакансии',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        // 'rewrite' => array('slug' => 'blog', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => false,
        'menu_icon' => 'dashicons-media-default',
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}

function register_post_type_equipment()
{
    register_post_type('equipment', array(
        'labels' => array(
            'name' => 'Б/У оборудование', // Основное название типа записи
            'singular_name' => 'Б/У оборудование', // отдельное название записи типа Book
            'add_new' => 'Добавить Б/У оборудование',
            'add_new_item' => 'Добавить новое Б/У оборудование',
            'edit_item' => 'Редактировать Б/У оборудование',
            'new_item' => 'Новое Б/У оборудование',
            'view_item' => 'Посмотреть оборудование',
            'search_items' => 'Найти оборудование',
            'not_found' => 'Оборудований не найдено',
            'not_found_in_trash' => 'В корзине оборудование не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Б/У оборудование',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        // 'rewrite' => array('slug' => 'blog', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => false,
        'menu_icon' => 'dashicons-media-default',
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail'),
    ));
}

function create_taxonomy_equipment_cat()
{
    register_taxonomy('equipment_cat', array('equipment'), array(
        'label' => '', // определяется параметром $labels->name
        'labels' => array(
            'name' => 'категории Б/У оборудования',
            'singular_name' => 'категория Б/У оборудования',
            'search_items' => 'Найти категорию',
            'all_items' => 'Все категории',
            'view_item ' => 'Посмотреть категории',
            'parent_item' => 'Parent категория',
            'parent_item_colon' => 'Parent категория:',
            'edit_item' => 'Редактировать категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новая категория',
            'menu_name' => 'Категории Б/У оборудования',
        ),
        'description' => '', // описание таксономии
        'public' => true,
        'publicly_queryable' => null, // равен аргументу public
        'show_in_nav_menus' => true, // равен аргументу public
        'show_ui' => true, // равен аргументу public
        'show_in_menu' => true, // равен аргументу show_ui
        'show_tagcloud' => true, // равен аргументу show_ui
        'show_in_rest' => null, // добавить в REST API
        'rest_base' => null, // $taxonomy
        'hierarchical' => true,
        'update_count_callback' => '',
        // 'rewrite' => array('slug' => 'kategorii-statey', 'with_front' => false),
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities' => array(),
        'meta_box_cb' => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column' => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin' => false,
        'show_in_quick_edit' => null, // по умолчанию значение show_ui
    ));
}

function register_post_type_equipment_new()
{
    register_post_type('equipment_new', array(
        'labels' => array(
            'name' => 'Оборудование', // Основное название типа записи
            'singular_name' => 'Оборудование', // отдельное название записи типа Book
            'add_new' => 'Добавить оборудование',
            'add_new_item' => 'Добавить новое оборудование',
            'edit_item' => 'Редактировать оборудование',
            'new_item' => 'Новое оборудование',
            'view_item' => 'Посмотреть оборудование',
            'search_items' => 'Найти оборудование',
            'not_found' => 'Оборудований не найдено',
            'not_found_in_trash' => 'В корзине оборудование не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Оборудование',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        // 'rewrite' => array('slug' => 'blog', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => false,
        'menu_icon' => 'dashicons-media-default',
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail'),
    ));
}

function create_taxonomy_equipment_cat_new()
{
    register_taxonomy('equipment_cat_new', array('equipment_new'), array(
        'label' => '', // определяется параметром $labels->name
        'labels' => array(
            'name' => 'категории оборудования',
            'singular_name' => 'категория оборудования',
            'search_items' => 'Найти категорию',
            'all_items' => 'Все категории',
            'view_item ' => 'Посмотреть категории',
            'parent_item' => 'Parent категория',
            'parent_item_colon' => 'Parent категория:',
            'edit_item' => 'Редактировать категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новая категория',
            'menu_name' => 'Категории оборудования',
        ),
        'description' => '', // описание таксономии
        'public' => true,
        'publicly_queryable' => null, // равен аргументу public
        'show_in_nav_menus' => true, // равен аргументу public
        'show_ui' => true, // равен аргументу public
        'show_in_menu' => true, // равен аргументу show_ui
        'show_tagcloud' => true, // равен аргументу show_ui
        'show_in_rest' => null, // добавить в REST API
        'rest_base' => null, // $taxonomy
        'hierarchical' => true,
        'update_count_callback' => '',
        'rewrite' => array('slug' => 'uslugi', 'with_front' => false),
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities' => array(),
        'meta_box_cb' => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column' => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin' => false,
        'show_in_quick_edit' => null, // по умолчанию значение show_ui
    ));
}

function register_post_type_manufacturers()
{
    register_post_type('manufacturers', array(
        'labels' => array(
            'name' => 'Производители', // Основное название типа записи
            'singular_name' => 'Производитель', // отдельное название записи типа Book
            'add_new' => 'Добавить производителя',
            'add_new_item' => 'Добавить нового производителя',
            'edit_item' => 'Редактировать производителя',
            'new_item' => 'Новое производитель',
            'view_item' => 'Посмотреть производителя',
            'search_items' => 'Найти производителя',
            'not_found' => 'Производителей не найдено',
            'not_found_in_trash' => 'В корзине производителей не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Производители',
        ),
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        'rewrite' => array('slug' => 'proizvoditeli', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => false,
        'menu_icon' => 'dashicons-media-default',
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail', 'editor'),
    ));
}

function register_post_type_spares()
{
    register_post_type('spares', array(
        'labels' => array(
            'name' => 'Запчасти', // Основное название типа записи
            'singular_name' => 'Запчасть', // отдельное название записи типа Book
            'add_new' => 'Добавить запчасть',
            'add_new_item' => 'Добавить новую запчасть',
            'edit_item' => 'Редактировать запчасть',
            'new_item' => 'Новая запчасть',
            'view_item' => 'Посмотреть запчасть',
            'search_items' => 'Найти запчасть',
            'not_found' => 'Запчастей не найдено',
            'not_found_in_trash' => 'В корзине запчастей не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Запчасти',
        ),
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        // 'rewrite' => array('slug' => 'proizvoditeli', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => false,
        'menu_icon' => 'dashicons-media-default',
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail'),
    ));
}

function create_taxonomy_manufacturers()
{
    register_taxonomy('manufacturers_сat', array('manufacturers'), array(
        'label' => '', // определяется параметром $labels->name
        'labels' => array(
            'name' => 'категории производителей',
            'singular_name' => 'категория производителя',
            'search_items' => 'Найти производителей',
            'all_items' => 'Все производители',
            'view_item ' => 'Посмотреть производителей',
            'parent_item' => 'Parent категория',
            'parent_item_colon' => 'Parent категория:',
            'edit_item' => 'Редактировать категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новая категория',
            'menu_name' => 'Категории производителей',
        ),
        'description' => '', // описание таксономии
        'public' => true,
        'publicly_queryable' => null, // равен аргументу public
        'show_in_nav_menus' => true, // равен аргументу public
        'show_ui' => true, // равен аргументу public
        'show_in_menu' => true, // равен аргументу show_ui
        'show_tagcloud' => true, // равен аргументу show_ui
        'show_in_rest' => null, // добавить в REST API
        'rest_base' => null, // $taxonomy
        'hierarchical' => true,
        'update_count_callback' => '',
        // 'rewrite' => array('slug' => 'kategorii-statey', 'with_front' => false),
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities' => array(),
        'meta_box_cb' => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column' => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin' => false,
        'show_in_quick_edit' => null, // по умолчанию значение show_ui
    ));
}

// ajax post types

function register_post_type_call_form()
{
    register_post_type('call_form', array(
        'labels' => array(
            'name' => 'Заявки на звонок', // Основное название типа записи
            'singular_name' => 'Заявка на звонок', // отдельное название записи типа Book
            'add_new' => 'Добавить заявку',
            'add_new_item' => 'Добавить новую заявку',
            'edit_item' => 'Редактировать заявку',
            'new_item' => 'Новая заявку',
            'view_item' => 'Посмотреть заявку',
            'search_items' => 'Найти заявку',
            'not_found' => 'Заявок не найдено',
            'not_found_in_trash' => 'В корзине заявок не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Заявки на звонок',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'menu_icon' => 'dashicons-phone',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array(""),
    ));
}

function register_post_type_make_order()
{
    register_post_type('make_order', array(
        'labels' => array(
            'name' => 'Оформленные заявки', // Основное название типа записи
            'singular_name' => 'Оформленная заявка', // отдельное название записи типа Book
            'add_new' => 'Добавить заявку',
            'add_new_item' => 'Добавить новую заявку',
            'edit_item' => 'Редактировать заявку',
            'new_item' => 'Новая заявку',
            'view_item' => 'Посмотреть заявку',
            'search_items' => 'Найти заявку',
            'not_found' => 'Заявок не найдено',
            'not_found_in_trash' => 'В корзине заявок не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Оформленные заявки',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'menu_icon' => 'dashicons-phone',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array(""),
    ));
}

function register_post_type_contacts_request()
{
    register_post_type('contacts_request', array(
        'labels' => array(
            'name' => "Заявки с контактов", // Основное название типа записи
            'singular_name' => 'Заявка с контактов', // отдельное название записи типа Book
            'add_new' => 'Добавить заявку',
            'add_new_item' => 'Добавить новую заявку',
            'edit_item' => 'Редактировать заявку',
            'new_item' => 'Новая заявку',
            'view_item' => 'Посмотреть заявку',
            'search_items' => 'Найти заявку',
            'not_found' => 'Заявок не найдено',
            'not_found_in_trash' => 'В корзине заявок не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Заявки с контактов',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'menu_icon' => 'dashicons-phone',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array(""),
    ));
}

function register_post_type_price_request()
{
    register_post_type('price_request', array(
        'labels' => array(
            'name' => "Запросы цен", // Основное название типа записи
            'singular_name' => 'Запрос цен', // отдельное название записи типа Book
            'add_new' => 'Добавить запрос',
            'add_new_item' => 'Добавить новый запрос',
            'edit_item' => 'Редактировать запрос',
            'new_item' => 'Новый запрос',
            'view_item' => 'Посмотреть запросы',
            'search_items' => 'Найти запросы',
            'not_found' => 'запросов не найдено',
            'not_found_in_trash' => 'В корзине запросов не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Запросы цен',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'menu_icon' => 'dashicons-phone',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array(""),
    ));
}

function register_post_type_orders()
{
    register_post_type('orders', array(
        'labels' => array(
            'name' => "Заказы", // Основное название типа записи
            'singular_name' => 'Заказ', // отдельное название записи типа Book
            'add_new' => 'Добавить заказ',
            'add_new_item' => 'Добавить новый заказ',
            'edit_item' => 'Редактировать заказ',
            'new_item' => 'Новый заказ',
            'view_item' => 'Посмотреть заказы',
            'search_items' => 'Найти заказы',
            'not_found' => 'заказов не найдено',
            'not_found_in_trash' => 'В корзине заказов не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Заказы',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'menu_icon' => 'dashicons-phone',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array(""),
    ));
}