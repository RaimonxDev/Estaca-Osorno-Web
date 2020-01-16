<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */
// ZONA HORARIA COMPATIBLE CON UTC-3 (CHILE)
//  date_default_timezone_set('America/Argentina/Buenos_Aires');

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/cmb2.php',							// Load CMB2 Originals.
	'/cmb2-custom.php',						// Load CMB2 Customs
	'/post-type.php',						// Load Post-Type
	'/querys.php',							// querys Globals,
	'/taxonomy.php'							// taxonomias 
);


foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
};

// añadir buscador a barra de navegacion
add_filter( 'wp_nav_menu_items', 'add_search_bar_nav', 10, 2);

function add_search_bar_nav( $search, $args ) {

	if ($args->theme_location == 'primary') {

		$search .= '<li class="menu-item item-search pt-2 pt-md-0">'
		.'<form method="get" id="searchform" action="'.esc_url( home_url( '/' ) ).'" role="search">'

		.'<input class="field form-control buscador" id="search_nav" name="s" type="text"
		placeholder="Buscar" autocomplete="off"'.esc_attr_e( '', 'understrap' ).'" value="'.get_search_query().'">'


		.'<label class="label-search" for="search_nav">
			<svg class="bi bi-search text-white" width="1.5rem" viewBox="2 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		<path fill-rule="evenodd" d="M12.442 12.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
		<path fill-rule="evenodd" d="M8.5 14a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM15 8.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
			</svg>
		</label>
		'

		.'<input class="submit btn btn-link" id="searchsubmit--nav" name="submit" type="submit"
		value="" style="--imagen-search:url('. get_template_directory_uri(  ).'/img/search.svg)">'
		

		.'</form>'
		. '</li>';
	}
	return $search;
}

function fecha_Es ($fecha) {
	$fecha = substr($fecha, 0, 10);
	$numeroDia = date('d', strtotime($fecha));
	$dia = date('l', strtotime($fecha));
	// $mes = date('F', strtotime($fecha));
	// $anio = date('Y', strtotime($fecha));
	$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
	$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	$nombredia = str_replace($dias_EN, $dias_ES, $dia);
//   $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
// 	$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
// 	$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
	return $nombredia;
  }
add_filter('use_block_editor_for_post', '__return_false', 10);


// update_option( 'siteurl', 'http://localhost/estacaOsorno' );
// update_option( 'home', 'http://localhost/estacaOsorno' );