<?php

// Register Custom Taxonomy
function tax_meses() {

	$labels = array(
		'name'                       => _x( 'Meses', 'Taxonomy General Name', 'Estaca Osorno' ),
		'singular_name'              => _x( 'Mes', 'Taxonomy Singular Name', 'Estaca Osorno' ),
		'menu_name'                  => __( 'Mes', 'Estaca Osorno' ),
		'all_items'                  => __( 'Todos los meses', 'Estaca Osorno' ),
		'parent_item'                => __( 'Mes padre', 'Estaca Osorno' ),
		'parent_item_colon'          => __( 'Parent Item:', 'Estaca Osorno' ),
		'new_item_name'              => __( 'Añadir nuevo mes', 'Estaca Osorno' ),
		'add_new_item'               => __( 'Añadir nuevo mes', 'Estaca Osorno' ),
		'edit_item'                  => __( 'Editar mes', 'Estaca Osorno' ),
		'update_item'                => __( 'Actualizar mes', 'Estaca Osorno' ),
		'view_item'                  => __( 'Ver mes', 'Estaca Osorno' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'Estaca Osorno' ),
		'add_or_remove_items'        => __( 'Añadir o remover mes', 'Estaca Osorno' ),
		'choose_from_most_used'      => __( 'Elegir mes mas usado', 'Estaca Osorno' ),
		'popular_items'              => __( 'Popular Items', 'Estaca Osorno' ),
		'search_items'               => __( 'Buscar mes', 'Estaca Osorno' ),
		'not_found'                  => __( 'Mes no encontrado', 'Estaca Osorno' ),
		'no_terms'                   => __( 'Sin elementos', 'Estaca Osorno' ),
		'items_list'                 => __( 'Items list', 'Estaca Osorno' ),
		'items_list_navigation'      => __( 'Items list navigation', 'Estaca Osorno' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'					 => array('slug' => 'actividad de mes')
	);
	register_taxonomy( 'mes_actividad', array( 'calendario' ), $args );

}
add_action( 'init', 'tax_meses');

function tax_barrios() {

	$labels = array(
		'name'                       => _x( 'Barrios', 'Taxonomy General Name', 'Estaca Osorno' ),
		'singular_name'              => _x( 'Barrio', 'Taxonomy Singular Name', 'Estaca Osorno' ),
		'menu_name'                  => __( 'Barrios/Ramas', 'Estaca Osorno' ),
		'all_items'                  => __( 'Todos los barrios', 'Estaca Osorno' ),
		'parent_item'                => __( 'Barrio padre', 'Estaca Osorno' ),
		'parent_item_colon'          => __( 'Parent Item:', 'Estaca Osorno' ),
		'new_item_name'              => __( 'Añadir nuevo barrio', 'Estaca Osorno' ),
		'add_new_item'               => __( 'Añadir nuevo barrio', 'Estaca Osorno' ),
		'edit_item'                  => __( 'Editar barrio', 'Estaca Osorno' ),
		'update_item'                => __( 'Actualizar barrio', 'Estaca Osorno' ),
		'view_item'                  => __( 'Ver barrio', 'Estaca Osorno' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'Estaca Osorno' ),
		'add_or_remove_items'        => __( 'Añadir o remover barrio', 'Estaca Osorno' ),
		'choose_from_most_used'      => __( 'Elegir barrio mas usado', 'Estaca Osorno' ),
		'popular_items'              => __( 'Popular Items', 'Estaca Osorno' ),
		'search_items'               => __( 'Buscar barrio', 'Estaca Osorno' ),
		'not_found'                  => __( 'Barrio no encontrado', 'Estaca Osorno' ),
		'no_terms'                   => __( 'Sin elementos', 'Estaca Osorno' ),
		'items_list'                 => __( 'Items list', 'Estaca Osorno' ),
		'items_list_navigation'      => __( 'Items list navigation', 'Estaca Osorno' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'					 => array('slug' => 'barrio')
	);
	register_taxonomy( 'barrios', array( 'calendario', 'post', 'barrios','entrevistas' ), $args );

}
add_action( 'init', 'tax_barrios');



function tax_organizacion() {

	$labels = array(
		'name'                       => _x( 'Organizaciones', 'Taxonomy General Name', 'Estaca Osorno' ),
		'singular_name'              => _x( 'Organizacion', 'Taxonomy Singular Name', 'Estaca Osorno' ),
		'menu_name'                  => __( 'Organizaciones', 'Estaca Osorno' ),
		'all_items'                  => __( 'Todas', 'Estaca Osorno' ),
		'parent_item'                => __( 'Organizacion padre', 'Estaca Osorno' ),
		'parent_item_colon'          => __( 'Parent Item:', 'Estaca Osorno' ),
		'new_item_name'              => __( 'Añadir nueva org', 'Estaca Osorno' ),
		'add_new_item'               => __( 'Añadir nuevo org', 'Estaca Osorno' ),
		'edit_item'                  => __( 'Editar org', 'Estaca Osorno' ),
		'update_item'                => __( 'Actualizar org', 'Estaca Osorno' ),
		'view_item'                  => __( 'Ver org', 'Estaca Osorno' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'Estaca Osorno' ),
		'add_or_remove_items'        => __( 'Añadir o remover', 'Estaca Osorno' ),
		'choose_from_most_used'      => __( 'Elegir organizacion mas usada', 'Estaca Osorno' ),
		'popular_items'              => __( 'Popular Items', 'Estaca Osorno' ),
		'search_items'               => __( 'Buscar organizacion', 'Estaca Osorno' ),
		'not_found'                  => __( 'Organizacion no encontrado', 'Estaca Osorno' ),
		'no_terms'                   => __( 'Sin elementos', 'Estaca Osorno' ),
		'items_list'                 => __( 'Items list', 'Estaca Osorno' ),
		'items_list_navigation'      => __( 'Items list navigation', 'Estaca Osorno' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'tag_organizaciones', array( 'calendario', ' post' ), $args );

}
add_action( 'init', 'tax_organizacion', 0 );

function eo_tax_motivos_entrevista() {

	$labels = array(
		'name'                       => _x( 'Motivos Entrevistas', 'Taxonomy General Name', 'Estaca Osorno' ),
		'singular_name'              => _x( 'Motivo Entrevista ', 'Taxonomy Singular Name', 'Estaca Osorno' ),
		'menu_name'                  => __( 'Motivos Entrevistas', 'Estaca Osorno' ),
		'all_items'                  => __( 'Todos los motivos', 'Estaca Osorno' ),
		'parent_item'                => __( 'Motivos Entrevista  padre', 'Estaca Osorno' ),
		'parent_item_colon'          => __( 'Parent Item:', 'Estaca Osorno' ),
		'new_item_name'              => __( 'Añadir nueva motivo', 'Estaca Osorno' ),
		'add_new_item'               => __( 'Añadir nuevo motivo', 'Estaca Osorno' ),
		'edit_item'                  => __( 'Editar motivo', 'Estaca Osorno' ),
		'update_item'                => __( 'Actualizar motivo', 'Estaca Osorno' ),
		'view_item'                  => __( 'Ver motivo', 'Estaca Osorno' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'Estaca Osorno' ),
		'add_or_remove_items'        => __( 'Añadir o remover', 'Estaca Osorno' ),
		'choose_from_most_used'      => __( 'Elegir mas usado', 'Estaca Osorno' ),
		'popular_items'              => __( 'Popular Items', 'Estaca Osorno' ),
		'search_items'               => __( 'Buscar', 'Estaca Osorno' ),
		'not_found'                  => __( 'motivo no encontrado', 'Estaca Osorno' ),
		'no_terms'                   => __( 'Sin elementos', 'Estaca Osorno' ),
		'items_list'                 => __( 'Items list', 'Estaca Osorno' ),
		'items_list_navigation'      => __( 'Items list navigation', 'Estaca Osorno' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'motivo_entrevista', array( 'entrevistas', ' post' ), $args );

}
add_action( 'init', 'eo_tax_motivos_entrevista', 0 );

