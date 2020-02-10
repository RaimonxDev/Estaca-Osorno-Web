<?php
/*
 * Example setup for the custom Attached Posts field for CMB2.
 */

/**
 * Get the bootstrap! If using as a plugin, REMOVE THIS!
 */
// require_once WPMU_PLUGIN_DIR . '/cmb2/init.php';
// require_once WPMU_PLUGIN_DIR . '/cmb2-attached-posts/cmb2-attached-posts-field.php';

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function EOsorno_posts_destacado() {
    
    $prefix = 'slider_';
	$id_blog = get_option( 'page_for_posts' );
	
	$slider_home = new_cmb2_box( array(
		'id'           => $prefix. 'home',
		'title'        => __( 'Añadir post al slider', 'estacaOsornoChile' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
        'show_names'   => false, // Show field names on the left,
        'show_on'      => array( 'key' => 'id', 'value' => array($id_blog) ),

        
	) );

	$slider_home->add_field( array(
		'name'    => __( 'Añadir post en el home', 'estacaOsornoChile' ),
		'desc'    => __( 'Arrastrar los post que quiere que sean añadidos en la pagina principal, usted podra ordenarlos en la posicion que usted quiera ', 'estacaOsornoChile' ),
		'id'      => $prefix .'post',
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'post',
			), // override the get_posts args
		),
	) );


}
add_action( 'cmb2_init', 'EOsorno_posts_destacado' );


function EOsorno_Barrios(){

	$prefix = 'info_';
	$infoCapillas = new_cmb2_box( array(
		'id'            => $prefix.'barrios',
		'title'         => esc_html__( 'Informacion de la Capilla', 'cmb2' ),
		'object_types'  => array( 'barrios' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.

		
	) );
	$infoCapillas->add_field( array(
		'name' => esc_html__( 'Direccion', 'cmb2' ),
		'desc' => esc_html__( 'Añada direccion de la capilla', 'cmb2' ),
		'id'   => $prefix.'direccion',
		'type' => 'textarea_small',
	) );

	$infoCapillas->add_field( array(
		'name' => esc_html__( 'Hora de Inicio', 'cmb2' ),
		'desc' => esc_html__( 'Inicio de Reunion', 'cmb2' ),
		'id'   => $prefix.'hora_inicio',
		'type' => 'text_time',
		// 'time_format' => 'H:i', // Set to 24hr format
	) );
	
	$infoCapillas->add_field( array(
		'name' => esc_html__( 'Hora de Finalizacion', 'cmb2' ),
		'desc' => esc_html__( 'Finalizacion de Reunion', 'cmb2' ),
		'id'   => $prefix.'hora_fin',
		'type' => 'text_time',
		// 'time_format' => 'H:i', // Set to 24hr format
	) );
}
add_action( 'cmb2_init', 'EOsorno_Barrios');

function EOsorno_registro_lideres(){
	$prefix ='lideres_'; 
	
	$infoLider = new_cmb2_box( array(
		'id'           => $prefix.'grupo',
		'title'        => esc_html__( 'Lideres de Barrios o Rama', 'cmb2' ),
		'object_types' => array( 'barrios' ),
	) );

	$group_field_id = $infoLider->add_field( array(
		'id'          => $prefix . 'info_lider',
		'type'        => 'group',
		'description' => esc_html__( 'Agregue a los Lideres segun su caso', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Lideres {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Agregar nuevo lider', 'cmb2' ),
			'remove_button' => esc_html__( 'Eliminar', 'cmb2' ),
			'sortable'      => true,
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );
	$infoLider->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Nombre', 'cmb2' ),
		'id'         => $prefix.'nombre',
		'type'       => 'text',
	) );
	
	$infoLider->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Llamamiento', 'cmb2' ),
		'id'         => $prefix.'llamamiento',
		'type'       => 'text',
	) );
	$infoLider->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Agregue una Imagen', 'cmb2' ),
		'id'   => $prefix.'imagen',
		'type' => 'file',
	) );
}
add_action( 'cmb2_admin_init', 'EOsorno_registro_lideres');


function EOsorno_actividad(){

$prefix = 'actividad_';
$infoActividad = new_cmb2_box( array(
	'id'            => $prefix.'actividad',
	'title'         => esc_html__( 'Informacion de la Actividad', 'cmb2' ),
	'object_types'  => array( 'calendario' ), // Post type
	'context'    => 'normal',
	'priority'   => 'high',
	'show_names' => true, // Show field names on the left
	// 'cmb_styles' => false, // false to disable the CMB stylesheet
	// 'closed'     => true, // true to keep the metabox closed by default
	// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
	// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.

	
) );
$infoActividad->add_field( array(
	'name' => esc_html__( 'Direccion', 'cmb2' ),
	'desc' => esc_html__( 'Añada direccion de la capilla', 'cmb2' ),
	'id'   => $prefix.'direccion',
	'type' => 'textarea',
) );

$infoActividad->add_field( array(
	'name' => esc_html__( 'Invitados', 'cmb2' ),
	'desc' => esc_html__( 'Quienes participaran en la activdad', 'cmb2' ),
	'id'   => $prefix.'invitados',
	'type' => 'textarea_small',
) );

$infoActividad->add_field( array(
	'name' => esc_html__( '¿Es una Conferencia?', 'cmb2' ),
	'desc' => esc_html__( 'Marque si solo es una conferencia, que toma más de 1 día', 'cmb2' ),
	'id'   => $prefix.'conferecia',
	'type' => 'checkbox',
) );
$infoActividad->add_field( array(
	'name' => esc_html__( 'Fecha del Evento', 'cmb2' ),
	'desc' => esc_html__( 'Añadir fecha de la actividad', 'cmb2' ),
	'id'   => $prefix.'fecha',
	'type' => 'text_datetime_timestamp',
	'time_format' => 'H:i', // Set to 24hr format
	'date_format' => ('d-m-Y')


) );
$infoActividad->add_field( array(
	'name' => esc_html__( 'Hora de Finalizacion', 'cmb2' ),
	'desc' => esc_html__( 'Finalizacion de Reunion', 'cmb2' ),
	'id'   => $prefix.'hora_fin',
	'type' => 'text_datetime_timestamp',
	'time_format' => 'H:i', // Set to 24hr format
	'date_format' => ('d-m-Y')
) );

}
add_action( 'cmb2_init', 'EOsorno_actividad');

function EOsorno_entrevistas(){
	$prefix = 'entrevista_';
	
	$infoActividad = new_cmb2_box( array(
	'id'            => $prefix.'informarcion_miembro',
	'title'         => esc_html__( 'Informacion del miembro', 'cmb2' ),
	'object_types'  => array( 'entrevistas' ), // Post type
	'context'    => 'normal',
	'priority'   => 'high',
	'show_names' => true, // Show field names on the left
	// 'cmb_styles' => false, // false to disable the CMB stylesheet
	// 'closed'     => true, // true to keep the metabox closed by default
	// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
	// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.

	
) );
	$infoActividad->add_field( array(
	'name' => esc_html__( 'Telefono del Miembro', 'cmb2' ),
	'id'   => $prefix.'telefono_miembro',
	'type' => 'text_medium',
	'before_field' => '+56'
) );
}
add_action( 'cmb2_init', 'EOsorno_entrevistas');