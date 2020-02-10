 <?php  
    $participantes= get_post_meta( get_the_ID(), 'actividad_invitados',true);
    $direcion_evento = get_post_meta( get_the_ID(), 'actividad_direccion',true);
    $hora_evento = get_post_meta( get_the_ID(), 'actividad_hora_inicio',true);
    $fecha_evento = get_post_meta( get_the_ID(), 'actividad_fecha',true);
    $fecha_evento_fin = get_post_meta( get_the_ID(), 'actividad_hora_fin',true);
    $sin_confirmacion = 'Por confirmar';
?> 

    <div class="row">
        <div class="col-12 bg-detalles-actividad shadow-sm mb-5" style="--bg-calendario-detalle:url(<?php echo get_template_directory_uri(  )?>/src/img/concepcion_chile_temple.jpeg">
        </div>
        
        <div class="col-10 pb-5 mb-5 bg-white mx-auto informacion-calendario">
            <blockquote class="blockquote">
                <div class="contain">

                    <h1 class="h2 mt-2 text-center mx-auto rounded-top border-bottom border-danger"><?php echo get_the_title()?></h1>
                    <p class="lead">Informacion ó Instruciones: <?php echo get_the_content()?> </p>
                        <?php 
                          echo ($participantes) 
                          ?'<p class="info_eventos"><small>Quienes participan: '.$participantes.'</small>' 
                          : '<p class="info_eventos"><small>Quienes participan: '.$sin_confirmacion.'</small>';    
                        ?>
                    <p>
                        <small>Fecha: <?php echo gmdate('d-m-y',$fecha_evento) ?> (<?php echo $translate_day = fecha_Es(gmdate("d-m-Y", $fecha_evento));?>)
                        </small> 
                    </p>
                    <p>
                        <small>
                        <?php echo $hora_evento?> 
                        </small>
                    </p>
                    <p><small>Invitados: <?php echo $participantes?></small></p>          
                </div>
            </blockquote>

        </div>
