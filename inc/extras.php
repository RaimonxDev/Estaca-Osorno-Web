<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_filter( 'body_class', 'understrap_body_classes' );

if ( ! function_exists( 'understrap_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function understrap_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter( 'body_class', 'understrap_adjust_body_class' );

if ( ! function_exists( 'understrap_adjust_body_class' ) ) {
	/**
	 * Setup body classes.
	 *
	 * @param string $classes CSS classes.
	 *
	 * @return mixed
	 */
	function understrap_adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( 'tag' == $value ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;

	}
}

// Filter custom logo with correct classes.
add_filter( 'get_custom_logo', 'understrap_change_logo_class' );

if ( ! function_exists( 'understrap_change_logo_class' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return mixed
	 */
	function understrap_change_logo_class( $html ) {

		$html = str_replace( 'class="custom-logo"', 'class="img-fluid"', $html );
		$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );
		$html = str_replace( 'alt=""', 'title="Home" alt="logo"', $html );

		return $html;
	}
}

/**
 * Display navigation to next/previous post when applicable.
 */

if ( ! function_exists ( 'understrap_post_nav' ) ) {
	function understrap_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="container navigation post-navigation">
		
			<h2 class="sr-only"><?php esc_html_e( 'Post navigation', 'understrap' ); ?></h2>
			<h1></h1>
			<div class="row nav-links justify-content-between">
				<?php
				if ( get_previous_post_link() ) {
					previous_post_link( '<span class="nav-previous"><svg class="bi bi-arrow-left" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M7.854 6.646a.5.5 0 010 .708L5.207 10l2.647 2.646a.5.5 0 01-.708.708l-3-3a.5.5 0 010-.708l3-3a.5.5 0 01.708 0z" clip-rule="evenodd"/>
					<path fill-rule="evenodd" d="M4.5 10a.5.5 0 01.5-.5h10.5a.5.5 0 010 1H5a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
				  </svg> %link</span>', _x( '&nbsp;%title', 'Previous post link', 'understrap' ) );
				}
				if ( get_next_post_link() ) {
					next_post_link( '<span class="nav-next">%link <svg class="bi bi-arrow-right" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M12.146 6.646a.5.5 0 01.708 0l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708-.708L14.793 10l-2.647-2.646a.5.5 0 010-.708z" clip-rule="evenodd"/>
					<path fill-rule="evenodd" d="M4 10a.5.5 0 01.5-.5H15a.5.5 0 010 1H4.5A.5.5 0 014 10z" clip-rule="evenodd"/>
				  </svg></span>', _x( '%title&nbsp;', 'Next post link', 'understrap' ) );
				}
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
}

if ( ! function_exists( 'understrap_pingback' ) ) {
	/**
	 * Add a pingback url auto-discovery header for single posts of any post type.
	 */
	function understrap_pingback() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="' . esc_url( get_bloginfo( 'pingback_url' ) ) . '">' . "\n";
		}
	}
}
add_action( 'wp_head', 'understrap_pingback' );

if ( ! function_exists( 'understrap_mobile_web_app_meta' ) ) {
	/**
	 * Add mobile-web-app meta.
	 */
	function understrap_mobile_web_app_meta() {
		echo '<meta name="mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-title" content="' . esc_attr( get_bloginfo( 'name' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'understrap_mobile_web_app_meta' );




// crear campos que se mostraran en frontend

function eo_campos_entrevista (){
	$cmb = new_cmb2_box(array(
		'id' => 'eo_enviar_solicitud_entrevista',
		'object_types' => array('page'),
		'hookup' => false, //hookup es la pantalla actual, si se va a guardar el post como borrador en la pantalla actual, colocamos false porque esta informacion se mostrara en el front-end
		'save_fields' => false, // si no se va a guardar los campos durante el hookup	

	));
	$cmb->add_field (array(
		'name' => 'Ingrese sus datos para agendar un entrevista',
		'id' => 'titulo_formulario',
		'type' => 'title'
	));

	$cmb->add_field (array(
		'name' => 'Nombre',
		'id' => 'nombre_del_miembro',
		'type' => 'text_medium'
	));
	
	$cmb->add_field (array(
		'name' => 'Eliga su Unidad Barrio/Rama',
		'id' => 'unidad_miembro',
		'type' => 'taxonomy_select',
		'taxonomy' => 'barrios'
		
	));	
	$cmb->add_field (array(
		'name' => 'Ingrese su numero telefonico',
		'id' => 'telefono_miembro',
		'type' => 'text',
		'before_field' => '+56', // override '$' symbol if needed
	));	
	$cmb->add_field (array(
		'name' => 'Desea una entrevista para: ',
		'id' => 'motivo_para_entrevista',
		'type' => 'taxonomy_select',
		'taxonomy'=> 'motivo_entrevista'
	));	
	$cmb->add_field (array(
		'name' => 'Alguna Informacion que desee agregar extra por ejemplo:(dia que puede asistir a la entrevista)',
		'id' => 'informacion_extra',
		'type' => 'textarea_small'
	));	

	
    
	

}
add_action( 'cmb2_init', 'eo_campos_entrevista');

// instanciamos la funcion campos entrevistas para inyectarla en el shortcode
function eo_formulario_instancia (){
		// id del metabox
	 $metabox_id = 'eo_enviar_solicitud_entrevista';
	 // no aplica el object id  ya que se va a general automaticamente
	 $object_id = 'fake-object-id';

	 return cmb2_get_metabox($metabox_id, $object_id);
}


// Crea el shortcode 
function eo_formulario_entrevistas_shortcode(){

	// obtenemos el id del formulario 
	$cmb = eo_formulario_instancia();

	$output = '';
	
	// Obtener algún error
    if ( ( $error = $cmb->prop( 'submission_error' ) ) && is_wp_error( $error ) ) {
		// If there was an error with the submission, add it to our ouput.
		$output .= '<h3>' . sprintf( __( 'Hubo un error: %s', 'Estaca Osorno' ), '<strong>'. $error->get_error_message() .'</strong>' ) . '</h3>';
	}
    
    // si la receta se envia correctamente, notificar al usuario
    if ( isset( $_GET['post_submitted'] ) && ( $post = get_post( absint( $_GET['post_submitted'] ) ) ) ) {

		// Get submitter's name
		//2° parametro es el id del cmb2 que queremos mostrar
		$nombre = get_post_meta( $post->ID, 'nombre_del_miembro', 1 );
		$nombre = $nombre ? ' '. $nombre : '';

		// Imprimir un aviso.
		$output .= '<h3 class=" alert alert-success">' . sprintf( __( 'Gracias%s, Tu solicitud ha sido enviada con exito, Por favor tenga paciencia el secretario de estaca se comunicara con usted para asignarle el dia y hora de la entrevista', 'Estaca Osorno' ), esc_html( $nombre ) ) . '</h3>';

	}

	// imprimir formularios
	$output .= cmb2_get_metabox_form($cmb, 'fake-object-id', array('save_button' => 'Solicitar Entrevita'));

	return $output;
}

add_shortcode( 'eo_formulario_entrevias_shortcode','eo_formulario_entrevistas_shortcode');

function eo_insertar_entrevista(){

	if(empty($_POST) || !isset( $_POST['submit-cmb'], $_POST['object_id']) ) {
        return false;
    }
    
    // Obtener una instancia del formulario
    $cmb = eo_formulario_instancia();
    
    $post_data = array();
    
    // Revisar nonce de seguridad
    if( !isset($_POST[ $cmb->nonce()] ) || !wp_verify_nonce($_POST[ $cmb->nonce()], $cmb->nonce() ) ) {
        return $cmb->prop('submission_error', new WP_Error('security_fail', 'Fallo en la seguridad.') );
    }
    
    // Revisar que haya un titulo de receta
    
    if(empty($_POST['nombre_del_miembro'])) {
        return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Por favor Ingrese su nombre'));
	}
	if(empty($_POST['unidad_miembro'])) {
        return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Por favor Ingrese su unidad'));
	}
	
	$valores_sanitizados = $cmb->get_sanitized_values($_POST);

	$post_data['post_title'] = $valores_sanitizados['nombre_del_miembro'];
    unset($valores_sanitizados['nombre_del_miembro']);
    
    // Agregar Contenido a $post_data
    $post_data['post_content'] = $valores_sanitizados['informacion_extra'];
    unset($valores_sanitizados['informacion_extra']);
    
    
    // Agregar Taxonomias al $post_data
    $post_data['tax_input'] = array(
            'barrios' => $valores_sanitizados['unidad_miembro'],
			'motivo_entrevista' => $valores_sanitizados['motivo_para_entrevista'],
    );
    // Llenar los metaboxes
    $post_data['meta_input'] =  array(
            'entrevista_telefono_miembro' => $valores_sanitizados['telefono_miembro'],
	);
	// post-type donde se mostrara
	$post_data['post_type'] = 'entrevistas';
	// Formato de Publicacion
	$post_data['post_status'] = 'private'; 
    
    // Insertar el post en la BD
    $nuevo_post = wp_insert_post($post_data, true);
    
    if(is_wp_error($nuevo_post)) {
        return $cmb->prop('submission_error', $nuevo_post);
    }
    // Guardamos los campos de CMB
	$cmb->save_fields($nuevo_post, 'post', $valores_sanitizados);
	
	wp_redirect(esc_url_raw(add_query_arg('post_submitted', $nuevo_post)));
    exit;


}
add_action('cmb2_after_init', 'eo_insertar_entrevista');