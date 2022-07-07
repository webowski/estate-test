<?php

/*
 * Estate object
 */
function register_post_type_estate() {
	$labels = [
		'name' => 'Недвижимость',
		'singular_name' => 'Недвижимость',
		'add_new' => 'Добавить недвижимость',
		'add_new_item' => 'Добавить новую недвижимость',
		'edit_item' => 'Редактировать недвижимость',
		'new_item' => 'Новый недвижимость',
		'all_items' => 'Вся недвижимость',
		'view_item' => 'Просмотр недвижимости на сайте',
		'search_items' => 'Искать недвижимость',
		'not_found' =>  'Недвижимости не найдено.',
		'not_found_in_trash' => 'В корзине нет недвижимости.',
		'menu_name' => 'Недвижимость'
	];
	$args = [
		'labels' => $labels,
		'public' => true,
		'menu_icon' => 'dashicons-building',
		'menu_position' => 7,
		'has_archive' => true,
		'supports' => array( 'title', 'custom-fields'),
		'taxonomies' => array('estate_type')
	];
	register_post_type('estate', $args);
}
add_action( 'init', 'register_post_type_estate' );


/*
 * Estate Type taxonomy
 */
add_action( 'init', 'create_estate_type_tax' );

function create_estate_type_tax() {
	$labels = array(
		'name' => _x( 'Тип недвижимости', 'taxonomy general name' ),
		'singular_name' => _x( 'Тип недвижимости', 'taxonomy singular name' ),
		'search_items' =>  __( 'Искать тип недвижимости' ),
		'all_items' => __( 'Все типы недвижимости' ),
		'parent_item' => __( 'Родительский тип недвижимости' ),
		'parent_item_colon' => __( 'Родительский тип недвижимости:' ),
		'edit_item' => __( 'Редактировать тип' ),
		'update_item' => __( 'Обновить тип недвижимости' ),
		'add_new_item' => __( 'Добавить новый тип недвижимости' ),
		'new_item_name' => __( 'Имя нового типа недвижимости' ),
		'menu_name' => __( 'Тип недвижимости' ),
	);

	register_taxonomy(
		'estate-type',
		array('estate'),
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'public' => true,
			'show_ui' => true,
			'show_tagcloud' => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'estate-type' ),
		)
	);

	register_taxonomy_for_object_type( 'estate-type', 'estate' );
}
