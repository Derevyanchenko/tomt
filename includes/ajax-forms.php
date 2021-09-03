<?php 

// ajax forms

add_action('wp_ajax_call_form', 'call_form_callback'); // form action, function down
//
add_action('wp_ajax_nopriv_call_form', 'call_form_callback');

function call_form_callback()
{
    if (!empty($_POST['name']) && !empty($_POST['phone'])) {

        $new_post_id = wp_insert_post(array('post_type' => 'call_form', 'post_status' => 'publish'));
        wp_update_post(array(
            'ID' => $new_post_id,
            'post_type' => 'call_form',
            'post_title' => 'Заявка на звонок ' . $new_post_id . ' от ' . $_POST['name']
        ));

        $fields = array('name', 'phone');
        foreach ($fields as $field) {
            update_post_meta($new_post_id, 'mm_call_form_' . $field, $_POST[$field]);
        }

        $to = get_option('admin_email');
        $subject = 'Заявка на звонок ' . $new_post_id . ' от ' . $_POST['name'];
        $body =
            'Имя: ' . $_POST['name'] .'<br>' .
            'Номер: ' . '<a href="tel:' . $_POST['phone'] . '">' . $_POST['phone'] .'</a>' . '<br>' .
            '[' . get_bloginfo('name') . '] Новая заяка на звонок, смотреть: <a href="' . admin_url() . 'post.php?post=' . $new_post_id . '&action=edit"> Заяка на звонок ' . $new_post_id . '</a>';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $body = wordwrap($body, 70, "\r\n");

        wp_mail($to, $subject, $body, $headers);
        

        wp_die('ok');
    } else {
        wp_die('fail');
    }

    
}

function call_form_adding_custom_meta_boxes($post)
{
    add_meta_box(
        'mm_call_form_metabox',
        __('Заявка на звонок'),
        'mm_call_form_metabox_cb',
        'call_form',
        'normal',
        'default'
    );
}

add_action('add_meta_boxes_call_form', 'call_form_adding_custom_meta_boxes');

function mm_call_form_metabox_cb($post){
    echo 'Имя: ';
    echo get_post_meta($post->ID, 'mm_call_form_name', true);
    echo '<br>';

    echo 'Телефон: ';
    echo '<a href="tel:' . preg_replace("/[^0-9]/", "",
            get_post_meta($post->ID, 'mm_call_form_phone', true)) . '">' . get_post_meta($post->ID,
            'mm_call_form_phone', true) . '</a>';
    echo '<br>';

}

// call form end


// make order

add_action('wp_ajax_make_order', 'make_order_callback'); // form action, function down
//
add_action('wp_ajax_nopriv_make_order', 'make_order_callback');
function make_order_callback()
{
    if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['subject']) && !empty($_POST['message'])) {

        $new_post_id = wp_insert_post(array('post_type' => 'make_order', 'post_status' => 'publish'));
        wp_update_post(array(
            'ID' => $new_post_id,
            'post_type' => 'make_order',
            'post_title' => 'Оформленная заявка ' . $new_post_id . ' от ' . $_POST['name']
        ));
        $fields = array('name', 'phone', 'subject', 'message');
        foreach ($fields as $field) {
            update_post_meta($new_post_id, 'mm_make_order_' . $field, $_POST[$field]);
        }
        $to = get_option('admin_email');
        $subject = 'Оформленная заявка ' . $new_post_id . ' от ' . $_POST['name'];
        $body =
            'Имя: ' . $_POST['name'] .'<br>' .
            'Номер: ' . '<a href="tel:' . $_POST['phone'] . '">' . $_POST['phone'] .'</a>' . '<br>' .
            'Тема сообщения: ' . $_POST['subject'] .'<br>' .
            'Текст сообщения: ' . $_POST['message'] .'<br>' .
            '[' . get_bloginfo('name') . '] Новая оформленная заявка, смотреть: <a href="' . admin_url() . 'post.php?post=' . $new_post_id . '&action=edit"> Оформленная заявка ' . $new_post_id . '</a>';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $body = wordwrap($body, 70, "\r\n");
        wp_mail($to, $subject, $body, $headers);
        wp_die('ok');
    } else {
        wp_die('fail');
    }
}
function make_order_adding_custom_meta_boxes($post)
{
    add_meta_box(
        'mm_make_order_metabox',
        __('Оформленная заявка'),
        'mm_make_order_metabox_cb',
        'make_order',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes_make_order', 'make_order_adding_custom_meta_boxes');
function mm_make_order_metabox_cb($post){
    echo 'Имя: ';
    echo get_post_meta($post->ID, 'mm_make_order_name', true);
    echo '<br>';

    echo 'Телефон: ';
    echo '<a href="tel:' . preg_replace("/[^0-9]/", "",
            get_post_meta($post->ID, 'mm_make_order_phone', true)) . '">' . get_post_meta($post->ID,
            'mm_make_order_phone', true) . '</a>';
    echo '<br>';


    echo 'Тема сообщения: ';
    echo get_post_meta($post->ID, 'mm_make_order_subject', true);
    echo '<br>';

    echo 'Текст сообщения: ';
    echo get_post_meta($post->ID, 'mm_make_order_message', true);
    echo '<br>';
}



// contacts request

add_action('wp_ajax_contacts_request', 'contacts_request_callback'); // form action, function down
//
add_action('wp_ajax_nopriv_contacts_request', 'contacts_request_callback');
function contacts_request_callback()
{
    if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['subject']) && !empty($_POST['email']) && !empty($_POST['message'])) {

        $new_post_id = wp_insert_post(array('post_type' => 'contacts_request', 'post_status' => 'publish'));
        wp_update_post(array(
            'ID' => $new_post_id,
            'post_type' => 'contacts_request',
            'post_title' => 'Заявка со страницы контактов ' . $new_post_id . ' от ' . $_POST['name']
        ));
        $fields = array('name', 'phone', 'subject', 'email', 'message');
        foreach ($fields as $field) {
            update_post_meta($new_post_id, 'mm_contacts_request_' . $field, $_POST[$field]);
        }
        $to = get_option('admin_email');
        $subject = 'Заявка со страницы контактов ' . $new_post_id . ' от ' . $_POST['name'];
        $body =
            'Имя: ' . $_POST['name'] .'<br>' .
            'Номер: ' . '<a href="tel:' . $_POST['phone'] . '">' . $_POST['phone'] .'</a>' . '<br>' .
            'Тема сообщения: ' . $_POST['subject'] .'<br>' .
            'Email: ' . '<a href="mailto:' . $_POST['email'] . '">' . $_POST['email'] .'</a>' . '<br>' .
            'Текст сообщения: ' . $_POST['message'] .'<br>' .
            '[' . get_bloginfo('name') . '] Новая заявка со страницы контакто, смотреть: <a href="' . admin_url() . 'post.php?post=' . $new_post_id . '&action=edit"> Заявка со страницы контактов ' . $new_post_id . '</a>';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $body = wordwrap($body, 70, "\r\n");
        wp_mail($to, $subject, $body, $headers);
        wp_die('ok');
    } else {
        wp_die('fail');
    }
}
function contacts_request_adding_custom_meta_boxes($post)
{
    add_meta_box(
        'mm_contacts_request_metabox',
        __('Заявка со страницы контактов'),
        'mm_contacts_request_metabox_cb',
        'contacts_request',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes_contacts_request', 'contacts_request_adding_custom_meta_boxes');
function mm_contacts_request_metabox_cb($post){
    echo 'Имя: ';
    echo get_post_meta($post->ID, 'mm_contacts_request_name', true);
    echo '<br>';

    echo 'Телефон: ';
    echo '<a href="tel:' . preg_replace("/[^0-9]/", "",
            get_post_meta($post->ID, 'mm_contacts_request_phone', true)) . '">' . get_post_meta($post->ID,
            'mm_contacts_request_phone', true) . '</a>';
    echo '<br>';


    echo 'Тема сообщения: ';
    echo get_post_meta($post->ID, 'mm_contacts_request_subject', true);
    echo '<br>';

    echo 'Эл. почта: ';
    echo get_post_meta($post->ID, 'mm_contacts_request_email', true);
    echo '<br>';

    echo 'Текст сообщения: ';
    echo get_post_meta($post->ID, 'mm_contacts_request_message', true);
    echo '<br>';
}


// price request

add_action('wp_ajax_price_request', 'price_request_callback'); // form action, function down
//
add_action('wp_ajax_nopriv_price_request', 'price_request_callback');

function price_request_callback()
{
    if (!empty($_POST['name']) && !empty($_POST['phone'])) {

        $id         = $_POST['id'];
        $spare_name = get_the_title($id);

        $new_post_id = wp_insert_post(array('post_type' => 'price_request', 'post_status' => 'publish'));
        wp_update_post(array(
            'ID' => $new_post_id,
            'post_type' => 'price_request',
            'post_title' => 'Запрос цены ' . $new_post_id . ' от ' . $_POST['name']
        ));

        $fields = array('name', 'phone', "email", "id");
        foreach ($fields as $field) {
            update_post_meta($new_post_id, 'mm_price_request_' . $field, $_POST[$field]);
        }

        $to = get_option('admin_email');
        $subject = 'Запрос цены ' . $new_post_id . ' от ' . $_POST['name'];
        $body =
            'Имя: ' . $_POST['name'] .'<br>' .
            'Номер: ' . '<a href="tel:' . $_POST['phone'] . '">' . $_POST['phone'] .'</a>' . '<br>' .
            'Почта: ' . $_POST['email'] .'<br>' .
            'Название запчасти: ' . $spare_name .'<br>' .
            '[' . get_bloginfo('name') . '] Новый запрос цены, смотреть: <a href="' . admin_url() . 'post.php?post=' . $new_post_id . '&action=edit"> Запрос цены ' . $new_post_id . '</a>';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $body = wordwrap($body, 70, "\r\n");

        wp_mail($to, $subject, $body, $headers);
        

        wp_die('ok');
    } else {
        wp_die('fail');
    }

    
}

function price_request_adding_custom_meta_boxes($post)
{
    add_meta_box(
        'mm_price_request_metabox',
        __('Запросы цен'),
        'mm_price_request_metabox_cb',
        'price_request',
        'normal',
        'default'
    );
}

add_action('add_meta_boxes_price_request', 'price_request_adding_custom_meta_boxes');

function mm_price_request_metabox_cb($post){

    $id         = get_post_meta($post->ID, 'mm_price_request_id', true);
    $spare_name = get_the_title($id);

    echo 'Имя: ';
    echo get_post_meta($post->ID, 'mm_price_request_name', true);
    echo '<br>';

    echo 'Телефон: ';
    echo '<a href="tel:' . preg_replace("/[^0-9]/", "",
            get_post_meta($post->ID, 'mm_price_request_phone', true)) . '">' . get_post_meta($post->ID,
            'mm_price_request_phone', true) . '</a>';
    echo '<br>';

    echo 'Почта: ';
    echo get_post_meta($post->ID, 'mm_price_request_email', true);
    echo '<br>';

    echo 'Название запчасти: ';
    echo $spare_name;
    echo '<br>';  

}

// price request end


// orders

add_action('wp_ajax_orders', 'orders_callback'); // form action, function down
//
add_action('wp_ajax_nopriv_orders', 'orders_callback');

function orders_callback()
{
    if (!empty($_POST['name']) && !empty($_POST['phone'])) {

        $id         = $_POST['id'];
        $order_name = get_the_title($id);

        $new_post_id = wp_insert_post(array('post_type' => 'orders', 'post_status' => 'publish'));
        wp_update_post(array(
            'ID' => $new_post_id,
            'post_type' => 'orders',
            'post_title' => 'Запрос цены ' . $new_post_id . ' от ' . $_POST['name']
        ));

        $fields = array('name', 'phone', "email", "id");
        foreach ($fields as $field) {
            update_post_meta($new_post_id, 'mm_orders_' . $field, $_POST[$field]);
        }

        $to = get_option('admin_email');
        $subject = 'Запрос цены ' . $new_post_id . ' от ' . $_POST['name'];
        $body =
            'Имя: ' . $_POST['name'] .'<br>' .
            'Номер: ' . '<a href="tel:' . $_POST['phone'] . '">' . $_POST['phone'] .'</a>' . '<br>' .
            'Почта: ' . $_POST['email'] .'<br>' .
            'Название оборудования: ' . $order_name .'<br>' .
            '[' . get_bloginfo('name') . '] Новый запрос цены, смотреть: <a href="' . admin_url() . 'post.php?post=' . $new_post_id . '&action=edit"> Запрос цены ' . $new_post_id . '</a>';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $body = wordwrap($body, 70, "\r\n");

        wp_mail($to, $subject, $body, $headers);
        

        wp_die('ok');
    } else {
        wp_die('fail');
    }

    
}

function orders_adding_custom_meta_boxes($post)
{
    add_meta_box(
        'mm_orders_metabox',
        __('Запросы цен'),
        'mm_orders_metabox_cb',
        'orders',
        'normal',
        'default'
    );
}

add_action('add_meta_boxes_orders', 'orders_adding_custom_meta_boxes');

function mm_orders_metabox_cb($post){

    $id         = get_post_meta($post->ID, 'mm_orders_id', true);
    $order_name = get_the_title($id);

    echo 'Имя: ';
    echo get_post_meta($post->ID, 'mm_orders_name', true);
    echo '<br>';

    echo 'Телефон: ';
    echo '<a href="tel:' . preg_replace("/[^0-9]/", "",
            get_post_meta($post->ID, 'mm_orders_phone', true)) . '">' . get_post_meta($post->ID,
            'mm_orders_phone', true) . '</a>';
    echo '<br>';

    echo 'Почта: ';
    echo get_post_meta($post->ID, 'mm_orders_email', true);
    echo '<br>';

    echo 'Название оборудования: ';
    echo $order_name;
    echo '<br>';  

}

// orders end