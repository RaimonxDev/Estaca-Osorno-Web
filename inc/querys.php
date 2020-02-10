<?php
function eo_capillas($cantidad = -1){

    $args= array(
        'post_type' => 'barrios',
        'posts_per_page' => $cantidad 
    );

    $capilla = new WP_Query($args);
    while ($capilla -> have_posts(  )) : $capilla -> the_post();
    $collapse = 'collapse'.get_the_ID();        
    ?>

            <div class="card capillas">
                <div class="card-header capilla" id="<?php echo get_the_ID(  )?>">
                 <h2 class="mb-0 text-center">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo$collapse?>" aria-expanded="true" aria-controls="<?php echo$collapse?>">
                        <?php the_title()?>
                    </button>
                </h2>
                </div>
                
                <div id="<?php echo$collapse?>" class="collapse" aria-labelledby="<?php echo get_the_ID(  )?>" data-parent="#accordionExample">
                    <div class="card-body row">
                   
                        <div class="direccion col-md-6">

                            <p class="direccion">Direcion:<?php echo get_post_meta(get_the_ID(  ),'info_direccion', true)?>
                            </p>

                            <p class="Horarios">Reuniones Dominicales <span class="hora__Inicio">Inicio :<?php echo get_post_meta(get_the_ID(),'info_hora_inicio',true) ?></span> Finalizacion <span class="hora__final"><?php echo get_post_meta(get_the_ID(),'info_hora_fin',true) ?> </span>
                            </p>

                        </div>
                        <div class="lideres col-md-6 d-flex flex-column flex-md-row          justify-content-around">

                            <?php
                            $lideres = get_post_meta( get_the_ID(), 'lideres_info_lider', true );
                            foreach($lideres as $lider){?>
                            <div class="content">
                                <div class="text-center">
                                    <img src="<?php echo $lider['lideres_imagen'] ?>" alt="icon_lider" class="img-fluid rounded-circle icon__lider ">
                                </div>
                                
                                <p class="nombre text-center"><?php echo $lider['lideres_nombre']?></p>
                                
                                <p class="llamamiento text-center"><?php echo $lider['lideres_llamamiento']?></p>  
                            </div>
                            <!-- CONTENT -->
                            <?php }?>
                        </div>
                        <!--lideres-->
                    </div>
                    <!--card-body-->
                </div>
            </div>
            <!--card-->

        <?php endwhile; wp_reset_postdata(  );


}

function eo_actividades($cantidad = 2){

    $args= array(
        'post_type' => 'calendario',
        'posts_per_page' => $cantidad 
    );

    $actividad = new WP_Query($args);
    while ($actividad -> have_posts(  )) : $actividad -> the_post(); ?>

        <h1><?php the_title() ?></h1>
        <h1><?php the_content() ?></h1>
        <a href="<?php the_permalink(get_the_ID());?>">link</a>
          
        <?php endwhile; wp_reset_postdata(  );


}
  
function filtro_meses($mes){
    // toma el primer dia del año actual
    $anio_unix = mktime(0, 0, 0, 1, 1,   date("Y"));
   
    $args = array(
    'posts_per_page' => -1,
    'post_type' => 'calendario',
    'order' => 'ASC',
    'orderby'   => 'meta_value',
	'meta_key'  => 'actividad_fecha',
	'meta_type' => 'NUMERIC',
    'tax_query' => array(
        array(
        'taxonomy' => 'mes_actividad',
        'field'    => 'slug',
        'terms'    => $mes
        )
    ),
    
    'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
    'relation' => 'AND', 
        array(
               'key' => 'actividad_fecha', // Check the start date field
               'value' =>  $anio_unix, // Set today's date (note the similar format)
               'compare' => '>=', // Return the ones greater than today's date
               'type' => 'NUMERIC' // Let WordPress know we're working with numbers
        )
           
           ),
    );
    $meses = new WP_Query( $args );
    

    if($meses->have_posts()) {
        
        echo '<div id="'.$mes.'" class="row mes__content ">';
            echo '<div class="card-columns">';

        while($meses->have_posts()): $meses->the_post();
       
            
            $participantes= get_post_meta( get_the_ID(), 'actividad_invitados',true);
            $direcion_evento = get_post_meta( get_the_ID(), 'actividad_direccion',true);
            $hora_evento = get_post_meta( get_the_ID(), 'actividad_hora_inicio',true);
            $fecha_evento = get_post_meta( get_the_ID(), 'actividad_fecha',true);
            $fecha_evento_fin = get_post_meta( get_the_ID(), 'actividad_hora_fin',true);
            $sin_confirmacion = 'Por confirmar';
            // checkbox de conferencia
            $on= get_post_meta( get_the_ID(), 'actividad_conferecia', true );

            echo '<div class="card">';
                echo '<div class="row">';
                    echo'<div class="col-5" id="container-day-months">';
                       
                    if($on === 'on'){

                        echo '<div class="bg-danger date-conferencia">';
                            if($fecha_evento){
                                echo '<p class="pt-2">'.gmdate("d",$fecha_evento).' </p>';
                                echo '<p> - </p>';
                                echo '<p class="pb-2">'.gmdate("d",$fecha_evento_fin).' </p>';

                            } else {
                                echo '<p class="text-muted">--</p>';
                            }
                            
                            echo '</div>';//date
                            
                            echo '<div class="day">';
                            $translate_day = fecha_Es(gmdate("d-m-Y", $fecha_evento));
                            $translate_day_fin = fecha_Es(gmdate("d-m-Y", $fecha_evento_fin));
                                
                                echo '<p class="text-center pt-1 m-0">Conferencia</p>';
                                
                                echo '<p class="text-center p-0 m-0 text-muted"><small>Inicia: <strong>'.$translate_day.'</strong></small></p>';
                                
                                echo '<p  class="text-center p-0 m-0 text-muted"><small>Finaliza: <strong>'.$translate_day_fin.'</
                                strong></small></p>';
                        
                            echo '</div>'; //day
                    
                    }else{

                        echo '<div class="bg-primary date">';
                            if($fecha_evento){
                                echo '<p class="p-2">'.gmdate("d",$fecha_evento).'</p>';
                            }else{
                                echo '<p class="text-muted">--</p>';
                            }
                        echo '</div>';//date
                            
                        echo '<div class="day">';
                            $translate_day = fecha_Es(gmdate("d-m-Y", $fecha_evento));
                                echo '<p  class="text-center text-muted">'.$translate_day.'</p>';
                        echo '</div>'; //date

                    }
                        
                    echo'</div>';//col-4
                    
                    echo'<div class="col informacion-del-evento">';              
                        echo'<div class="card-body">';
                            echo the_title( '<h1 class="h6 text-center mr-2 font-weight-bold">', '</h1>', true );
                            echo '<hr class="mr-3 text-success">';

                            if($participantes){

                                echo '<p class="informacion-evento__item informacion_evento__participantes card-text"><strong>Quienes participan : </strong>'.$participantes.'<br>';
                            }else{
                                echo '<p class="informacion-evento__item informacion_evento__participantes card-text"><strong>Quienes participan: </strong>'.$sin_confirmacion.'<br>';
                            }
                                //    ----------------
                            if($fecha_evento){
                                
                                echo '<p class="informacion-evento__item informacion_evento__hora card-text"><strong>Hora de inicio : </strong>'.gmdate('H:i',$fecha_evento).'<br>';
                            }else{
                                echo '<p class="informacion-evento__item informacion_evento__hora card-text"><strong>Hora de inicio : </strong>'.$sin_confirmacion.'<br>';
                            }
                                    //    ----------------
                            if($direcion_evento){
                                
                                echo '<p class="informacion-evento__item informacion_evento__direccion card-text"><strong>Direccion : </strong>'.$direcion_evento.'<br>';
                            }else{
                                echo '<p class="informacion-evento__item informacion_evento__direccion card-text"><strong>Direccion : </strong>'.$sin_confirmacion.'<br>';
                            }
                                //   ----------------

                            if($on=== 'on'){

                                if($fecha_evento){
                                    
                                    echo '<p class="informacion-evento__item informacion_evento__fecha card-text"><strong>Inicia : </strong>' .gmdate("d-m-Y", $fecha_evento).'<br>';
                                    echo '<p class="informacion-evento__item informacion_evento__fecha card-text"><strong>Finaliza : </strong>' .gmdate("d-m-Y", $fecha_evento_fin).'<br>';
                                }else{
                                    echo '<p class="informacion-evento__item informacion_evento__fecha card-text"><strong>Fecha : </strong>'.$sin_confirmacion.'<br>';}
                                        
                            } else{
                                if($fecha_evento){
                                    
                                    echo '<p class="informacion-evento__item informacion_evento__fecha card-text"><strong>Fecha : </strong>' .gmdate("d-m-Y", $fecha_evento).'<br>';
                                }else{
                                    echo '<p class="informacion-evento__item informacion_evento__fecha card-text"><strong>Fecha : </strong>'.$sin_confirmacion.'<br>';}
                            }   
                            if(get_the_content()){
                                echo '<a type="button" class="btn btn-sm btn-outline-success .text-reset" href="'.get_the_permalink().'">Instruciones</a>';
                            }

                        echo '</div>'; // card body 
                    echo'</div>';  //col
                echo '</div>';//row         
            echo '</div>';//card
            
    endwhile; wp_reset_postdata();

            echo '</div>';// card columns
        echo '</div>';// row mes
    }
}


function consulta_eventos_proximos($mostrar =1) {
    
    $HoyUTC_3 = new DateTime();
    $HoyUTC_3->modify('-3 hours');
    $today= $HoyUTC_3->format('U');
        
    $args = array(
      'post_type' => 'calendario', // Tell WordPress which post type we want
       'orderby' => 'meta_value', // We want to organize the events by date
       'meta_key' => 'actividad_fecha', // Grab the "start date" field created via "More Fields" plugin (stored in YYYY-MM-DD format)
       'order' => 'ASC', // ASC is the other option
       'posts_per_page' => $mostrar, // Let's show them all.
       
       'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
        array(
               'key' => 'actividad_hora_fin', // Check the start date field
               'value' => $today, // Set today's date (note the similar format)
               'compare' => '>=', // Return the ones greater than today's date
               'type' => 'NUMERIC' // Let WordPress know we're working with numbers
        )       
           ),
     );
     
     $eventos = new WP_Query($args);
     while($eventos->have_posts()): $eventos->the_post();
   
          $direcion_evento = get_post_meta( get_the_ID(), 'actividad_direccion',true);
          $hora_evento = get_post_meta( get_the_ID(), 'actividad_hora_inicio',true);
          $invitados_evento = get_post_meta( get_the_ID(), 'actividad_invitados',true);
          $fecha_evento =  get_post_meta( get_the_ID(), 'actividad_fecha', true );
          $sin_confirmacion = 'Por confirmar';
          
          echo '<h1 class="text-center">Proxima actividades</h1>';
          echo "<h1 class='h2 text-center text-primary' id='event-title' data-id='".get_the_ID()."'>".get_the_title()."</h1>";
        echo "<p class='lead pl-3 text-center'>".get_the_content()."</p>";
        
        echo '<div class="d-flex flex-column flex-md-row justify-content-around">';
            
            echo '<p class="informacion_evento__item"><strong class="text-primary">Fecha</strong>: <span class="fecha-eventos-js" data-date-id="',get_the_ID(  ).'" 
            id="event-'.get_the_ID(  ).'">'.gmdate("d-m-Y", $fecha_evento)."</span></p>";
            
            if($direcion_evento){

                echo "<p class='informacion_evento__item'><strong>Direccion: </strong> ".$direcion_evento."</p>";
            }else{
                echo "<p class='informacion_evento__item'><strong>Direccion: </strong> La direccion aun no esta confirmada</p>";
            }

            if($fecha_evento){
                echo "<p class='informacion_evento__item'><strong>Hora: </strong> <span id='event-hours-".get_the_ID(  )."'>".gmdate("H:i",$fecha_evento). "</span></p>";
            }else {
                echo "<p class='informacion_evento__item'><strong>Hora: </strong> ¡la actividad no tiene hora confirmada!</p>";
            }
            if($invitados_evento){

                echo "<p class='informacion_evento__item'><strong>Invitados: </strong> ".$invitados_evento."</p>";
            }else{
                echo '<p class="informacion_evento__item"><strong>Invitados :</strong>'.$sin_confirmacion.'<br>';
            }

            
            echo '</div>'; //d-flex
        echo '<div class="contador text-center "id="cuentaRegresiva-'.get_the_ID(  ).'"></div>';            
    
       endwhile; wp_reset_postdata();
  
  }

  