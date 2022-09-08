<h1> <?php echo $taller[0]['taller']; ?> </h1>
<h3> Hora: <?php echo $taller[0]['horario_inicio']; ?> - <?php echo $taller[0]['horario_fin']; ?> </h3>
<h3>Impartido por: <?php echo $taller[0]['impartido_por']; ?> </h3>
<p>Descripcion: <?php echo $taller[0]['descripcion']; ?> </p>
<h3>Clientes inscritos: </h3>
    <?php
    foreach ($participantes as $key => $participante) :
    ?>
    <?php echo $participante['primer_apellido']. ' '. $participante['primer_apellido'].' '.$participante['nombre'] ?>
    <br/>
    <?php endforeach; ?>
    <hr/>
