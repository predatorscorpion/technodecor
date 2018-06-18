<?php
add_action( 'init', 'create_productions' );
function create_productions() {
    register_post_type( 'productions',
        array(
            'labels' => array(
                'name' => 'Продукція',
                'singular_name' => 'Продукція',
                'add_new' => 'Додати',
                'add_new_item' => 'Додати нову продукцію',
                'edit' => 'Редагувати',
                'edit_item' => 'Редагувати продукцію',
                'new_item' => 'Нова продукція',
                'view' => 'Показати',
                'view_item' => 'Показати продукцію',
                'search_items' => 'Знайти продукцію',
                'not_found' => 'Продукції не знайдено',
                'not_found_in_trash' => 'Not found in trash',
                'parent' => 'Parent service'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array(''),
            'menu_icon' => 'dashicons-carrot',
            'has_archive' => true
        )
    );
}