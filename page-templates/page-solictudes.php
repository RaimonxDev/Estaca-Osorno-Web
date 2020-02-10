<?php
/** 
* Template Name: Solicitudes
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
				<h2 class="text-center">Solicitudes para Entrevistas</h2>
                <div class="alert alert-warning text-center" role="alert">
                    Esta informacion es privada
                </div>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Barrio</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Motivo</th>
                        <th scope="col">Comentario</th>
                        </tr>
                    </thead>
                <?php
                    $args = array(
                        'post_type' => 'entrevistas',
                        'posts_per_page' => -1,
                        'order' => 'ASC'
                    );

                    $solitudes = new WP_Query($args);

                ?>

                <?php
                  while($solitudes->have_posts()): $solitudes->the_post();?>
                  
                    <tbody>
                    <tr>
                        <td><?php the_title()?></td>
                        <td><p class="text-dark"><?php echo get_the_term_list( $post->ID, 'barrios', '',''); ?></p></td>
                        <td><?php echo get_post_meta( get_the_ID(), 'entrevista_telefono_miembro', true)?></td>
                        <td><?php echo get_the_term_list( $post->ID, 'motivo_entrevista' )?></td>
                        <td><?php echo the_content( )?></td>
                    <tr>
                        
                    </tbody>



                <?php endwhile; wp_reset_postdata( )?>
		        </table>
			</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>