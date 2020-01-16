<?php
/**
 * Sidebar setup for footer full.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>
<!-- 
<?php if ( is_active_sidebar( 'footerfull' ) ) : ?> -->

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper" id="wrapper-footer-full">

		<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

			<div class="row">
				<div class=" col-12 col-md-3 menu__footer">
				
					<h2 class="h5">Menú</h2>
					<nav class="navbar navbar-expand navbar-dark">
							<?php wp_nav_menu(
								array(
									'theme_location'  => 'footer',
									'container_class' => 'collapse navbar-collapse',
									'container_id'    => 'navbarNavDropdown',
									'menu_class'      => 'navbar-nav',
									'fallback_cb'     => '',
									'menu_id'         => 'footer-menu',
									'depth'           => 2,
									'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								)
							); ?>
					</nav>
				
				</div>
				
				<div class=" col-12 col-md-3 sitios__oficiales">
					<h2 class="h5">Sitios Oficiales</h2>
							<ul>
								<li>
									<a href="https://www.churchofjesuschrist.org/?lang=spa" target="_blank">- Church of Jesuschrist.org</a>
								</li>
								<li>
									<a href="https://www.youtube.com/user/MormonMessagesSPA" target="_blank" rel="noopener noreferrer">- Youtube</a>
								</li>
								<li>
									<a href="https://www.churchofjesuschrist.org/youth?lang=spa" target="_blank" rel="noopener noreferrer">- Jovenes</a>
								</li>
							</ul>
				</div>
				<div class=" col-12 col-md-6 aviso">
					<h2 class="h5">Aviso</h2>
					<p >Este sitio web no es propiedad ni está afiliado a La Iglesia de Jesucristo de los Santos de los Últimos Días (a veces llamada la Iglesia Mormona o SUD). Los contenidos (servicios) ofrecidos por Estaca Chile Osorno no son elaborados, proporcionados, aprobados ni respaldados por Intellectual Reserve, Inc. o La Iglesia de Jesucristo de los Santos de los Últimos Días.</p>
				</div>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->
<!-- 
<?php endif; ?> -->
