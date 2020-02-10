<?php
/** 
* Template Name: Capillas
**/
?>
<?php
/**
 *
 *
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>


<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">
	
	<div class="row">

		
		<div class="col-md-12 content-area" id="primary">
			
			<main class="site-main" id="main" role="main">
				<h2 class="text-center">Barrios y Ramas que conforman la Estaca Osorno</h2>
				<p>Puede consultar informacion de cada <strong>Unidad</strong> podra saber los horarios de cada unidad ademas la información de cada obipado</p>

                <div class="accordion" id="accordionExample">
                	<?php eo_capillas()?>
                </div> 

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
