<?php
// Register Custom Post Type
function Post_Barrios() {

	$labels = array(
		'name'                  => 'Barrios/Rama',
		'singular_name'         => 'Barrio/Rama',
		'menu_name'             => 'Barrios/Ramas',
		'name_admin_bar'        => 'Barrios/Rama',
		'archives'              => 'Item Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'Todos',
		'add_new_item'          => 'Añadir Nuevo Barrio/Rama',
		'add_new'               => 'Añadir Nuevo',
		'new_item'              => 'Nuevo',
		'edit_item'             => 'Editar',
		'update_item'           => 'Acualizar',
		'view_item'             => 'Ver',
		'view_items'            => 'Ver todos',
		'search_items'          => 'Buscar',
		'not_found'             => 'No encontrado',
		'not_found_in_trash'    => 'No encontrado en la papelera',
		'featured_image'        => '',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Barrio/Rama',
		'description'           => 'Barrios y Ramas',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-admin-home',   
	);
	register_post_type( 'barrios', $args );

}
add_action( 'init', 'Post_Barrios', 0 );

function eo_entrevistas() {

	$labels = array(
		'name'                  => 'Entrevistas',
		'singular_name'         => 'Entrevista',
		'menu_name'             => 'Solicitudes de Entrevistas',
		'name_admin_bar'        => 'Entrevistas Templo',
		'archives'              => 'Item Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'Todas',
		'add_new_item'          => 'Añadir Nuevo Entrevistas',
		'add_new'               => 'Añadir Nuevo',
		'new_item'              => 'Nuevo',
		'edit_item'             => 'Editar',
		'update_item'           => 'Acualizar',
		'view_item'             => 'Ver',
		'view_items'            => 'Ver todos',
		'search_items'          => 'Buscar',
		'not_found'             => 'No encontrado',
		'not_found_in_trash'    => 'No encontrado en la papelera',
		'featured_image'        => '',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Entrevistas Estaca',
		'description'           => 'Estrevistas',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-thumbs-up',   
	);
	register_post_type( 'entrevistas', $args );

}
add_action( 'init', 'eo_entrevistas', 0 );


function posttype_calendario() {

	$labels = array(
		'name'                  => 'Calendario',
		'singular_name'         => 'Calendario',
		'menu_name'             => 'Calendario',
		'name_admin_bar'        => 'Calendario',
		'archives'              => 'Item Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'Todos',
		'add_new_item'          => 'Añadir nueva actividad',
		'add_new'               => 'Añadir nueva actividad',
		'new_item'              => 'Nueva actividad',
		'edit_item'             => 'Editar',
		'update_item'           => 'Acualizar',
		'view_item'             => 'Ver actividad',
		'view_items'            => 'Ver actividades',
		'search_items'          => 'Buscar actividad',
		'not_found'             => 'No encontrado',
		'not_found_in_trash'    => 'No encontrado en la papelera',
		'featured_image'        => 'Imagen Destacada',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Calendario',
		'description'           => 'Calendario de Estaca',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'menu_icon'             => 'dashicons-calendar-alt'   
	);
	register_post_type( 'calendario', $args );

}
add_action( 'init', 'posttype_calendario');

