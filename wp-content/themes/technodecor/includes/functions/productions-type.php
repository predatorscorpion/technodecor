<?php
add_action( 'init', 'create_production_type' );
function create_production_type() {
    register_post_type( 'production-type',
        array(
            'labels' => array(
                'name' => 'Тип продукції',
                'singular_name' => 'Тип продукції',
                'add_new' => 'Додати',
                'add_new_item' => 'Додати новий тип продукції',
                'edit' => 'Редагувати',
                'edit_item' => 'Редагувати тип продукції',
                'new_item' => 'Новий тип продукції',
                'view' => 'Показати',
                'view_item' => 'Показати тип продукції',
                'search_items' => 'Знайти тип продукції',
                'not_found' => 'Типу продукції не знайдено',
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