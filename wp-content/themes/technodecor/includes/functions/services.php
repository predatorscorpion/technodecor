<?php
add_action( 'init', 'create_services' );
function create_services() {
    register_post_type( 'service',
        array(
            'labels' => array(
                'name' => 'Послуги',
                'singular_name' => 'Послуги',
                'add_new' => 'Додати',
                'add_new_item' => 'Додати нову послугу',
                'edit' => 'Редагувати',
                'edit_item' => 'Редагувати послугу',
                'new_item' => 'Нова послуга',
                'view' => 'Показати',
                'view_item' => 'Показати послугу',
                'search_items' => 'Знайти послугу',
                'not_found' => 'Послуги не знайдено',
                'not_found_in_trash' => 'Not found in trash',
                'parent' => 'Parent service'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array(''),
            'menu_icon' => 'dashicons-admin-appearance',
            'has_archive' => true
        )
    );
}