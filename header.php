<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Baloo|Nunito:300,400,700|Lato&display=swap" rel="stylesheet">
	<title>Estaca Osorno Chile Sur</title>  
	<meta name="description" content= "Estaca Osorno Chile, es es una pagina de blog informativa, que busca poder compartir con los miembros de la Iglesia de JESUCRISTO de los ultimos dias " />
	<meta name="robots" content= "index, follow">
	<meta name="theme-color" content="#3ca7dd">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

		<?php do_action( 'wp_body_open' ); ?>

			<div class="site" id="page">
					<!-- Estaca logo -->



					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>
						<div class="container_logo">

								<h1 class="navbar-brand mb-0 text-center w-100 p-4">

								<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url" class="h2 logo"><?php bloginfo( 'name' ); ?></a>

								</h1>

							<?php else : ?>
								<h1 class="navbar-brand mb-0 text-center w-100 p-4">
									<a class="h2 logo" rel="home" 
										href="<?php echo esc_url( home_url( '/' ) ); ?>" 
										title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?>
									</a>
								</h1>

						<?php endif; ?>

						</div><!--container-logo-->
						<?php } else {
							the_custom_logo();
						} ?><!-- end custom logo -->

<!-- ******************* The Navbar Area ******************* -->

		<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

			<nav id="navegacion" class="navbar navbar-expand-md navbar-dark bg__nav__hero">

				<?php if ( 'container' == $container ) : ?>
				<div class="container">
				<?php endif; ?>

					<button class="navbar-toggler" type="button" data-toggle="collapse"

						data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" 		aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>
		
				

				<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto align-items-md-center',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								)
							); ?>

						<?php if ( 'container' == $container ) : ?>
					</div><!-- .container -->
					<?php endif; ?>

				<!-- buscador navegacion -->


			</nav><!-- .site-navigation -->
		

		
		</div><!-- #wrapper-navbar end -->



