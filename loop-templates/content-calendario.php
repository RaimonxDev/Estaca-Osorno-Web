<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header animated fadeIn">
	<?php echo get_the_post_thumbnail( $post->ID, 'medium-large' , array('class' => 'img-fluid mb-5 rounded lazy')); ?>
		
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta d-flex justify-content-center">

			<?php understrap_posted_on();?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	

	<div class="entry-content">

		<?php the_content(); ?>

		<h2>Informacion</h2>
	
		<div class="taxonomias">
			<div class="mes">
				<?php echo get_the_term_list( $post->ID, 'mes_actividad', "Mes: ", ', ',''); ?>
			</div>
		<div class="Barrios">
			<?php echo get_the_term_list( $post->ID, 'barrios', "Barrio/Rama: ", ', ',''); ?>
		</div>
	
</div>

	
		
		<?php	$participantes= get_post_meta( get_the_ID(), 'actividad_invitados',true);
            $direcion_evento = get_post_meta( get_the_ID(), 'actividad_direccion',true);
            $hora_evento = get_post_meta( get_the_ID(), 'actividad_hora_inicio',true);
            $sin_confirmacion = 'Por confirmar';

            echo '<div class="mes">';
               if($participantes){
                   
                   echo '<p class="info_eventos"><strong>Quienes participan :</strong>'.$participantes.'<br>';
               }else{
                    echo '<p class="info_eventos"><strong>Quienes participan:</strong>'.$sin_confirmacion.'<br>';
               }
               if($hora_evento){
                   
                   echo '<p class="info_eventos"><strong>Hora de inicio :</strong>'.$hora_evento.'<br>';
               }else{
                    echo '<p class="info_eventos"><strong>Hora de inicio :</strong>'.$sin_confirmacion.'<br>';
               }
               if($direcion_evento){
                   
                   echo '<p class="info_eventos"><strong>Direccion :</strong>'.$direcion_evento.'<br>';
               }else{
                    echo '<p class="info_eventos"><strong>Direccion :</strong>'.$sin_confirmacion.'<br>';
               }
            
        	echo '</div>';
            
	
			?>

			

		<?php
		
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer mb-3">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
