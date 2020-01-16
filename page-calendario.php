<?php
/** 
* Template Name: calendario
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
					
				
				<div class="jumbotron p-0 ">
					
					<?php consulta_eventos_proximos();?>
				</div>
			

				<div class="content__calendario">
				<!-- menu calendario -->

				<h1 class=" p-3 text-center">Calendario del año <?php echo Date("Y")?></h1>
				<div class="alert alert-warning" role="alert">
					La informacion presente esta <strong class="text-bold">sujeta a cambios</strong>, le recomendamos revisar con tiempo la informacion del calendario
				</div>
					<ul class="menu__calendario d-flex justify-content-center flex-wrap p-0">
						<?php

						$terms = get_terms( array(
							'taxonomy' => 'mes_actividad',
							'orderby'  => 'description',
							'order'	   => 'ASC'
						) );

						foreach($terms as $term) {
							echo "<li class='p-3' id='$term->name'><a href='#". $term->slug . "'>" . $term->name ."</a></li>";
						}
						?>
						
					</ul>
					<!-- fin menu calendario -->
					
					<div class="col-md-12" id="calendario__mes">
						<?php foreach($terms as $term){
						
								filtro_meses($term->slug);

						}?>
					</div><!--col-md-8-->

				</div>
                
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>