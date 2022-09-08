<h1> <?php echo $evento[0]['evento']; ?> </h1>
<h3> Hora: <?php echo $evento[0]['horario_inicio']; ?> - <?php echo $evento[0]['horario_fin']; ?> </h3>
<h3>Fecha: <?php echo $evento[0]['fecha']; ?> </h3>
<h3>Impartido por: <?php echo $evento[0]['impartido_por']; ?> </h3>
<h3>Clientes inscritos: </h3>
    <?php
    foreach ($participantes as $key => $participante) :
    ?>
    <?php echo $participante['primer_apellido']. ' '. $participante['primer_apellido'].' '.$participante['nombre'] ?>
    <br/>
    <?php endforeach; ?>
    <hr/>
