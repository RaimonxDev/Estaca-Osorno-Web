<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	
	
	
	
	 function understrap_scripts() {
		// Get the theme data.
		// own
			//css
			wp_enqueue_style('slick-css','//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', false, '1.9');
		
			wp_enqueue_style('slick-theme','//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', false, '1.9');
				
			//js
			
			wp_enqueue_script( 'jquery-3','//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '3.4.1',true);
			
			wp_enqueue_script( 'slick',get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.9',true);
			
	
			wp_enqueue_script( 'moments','https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js', array(), '2.24.0',true);
			
			wp_enqueue_script( 'moments_es','//cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js', array('moments'), '2.24.0',true);
			
			
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/main.min.css' );
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/main.min.css', array(), $css_version );


		$js_version_vendor = $theme_version . '.' . filemtime( get_template_directory() . '/js/vendor.min.js' );
			wp_enqueue_script( 'understrap-scripts-vendor', get_template_directory_uri() . '/js/vendor.min.js', array(), $js_version_vendor, true );
		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/app.min.js' );
			wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/app.min.js', array(), $js_version, true );

		
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		
		
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );

// add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );

// function enqueue_load_fa() {
// wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );
// }