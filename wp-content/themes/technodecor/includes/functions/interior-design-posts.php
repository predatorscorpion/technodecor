<?php
add_action( 'init', 'create_interior_designs' );
function create_interior_designs() {
    register_post_type( 'interior-designs',
        array(
            'labels' => array(
                'name' => 'Дизайн інтер\'єру',
                'singular_name' => 'Дизайн інтер\'єру',
                'add_new' => 'Додати',
                'add_new_item' => 'Додати новий дизайн інтер\'єру',
                'edit' => 'Редагувати',
                'edit_item' => 'Редагувати дизайн інтер\'єру',
                'new_item' => 'Новий дизайн інтер\'єру',
                'view' => 'Показати',
                'view_item' => 'Показати дизайн інтер\'єру',
                'search_items' => 'Знайти дизайн інтер\'єру',
                'not_found' => 'Дизайн інтер\'єру не знайдено',
                'not_found_in_trash' => 'Not found in trash',
                'parent' => 'Parent service'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array(''),
            'menu_icon' => 'dashicons-art',
            'has_archive' => true
        )
    );
}