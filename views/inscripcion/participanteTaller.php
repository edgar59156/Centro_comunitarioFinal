
<h1>Inscribir en: <?php echo $datosTaller['taller']; ?></h1>
<form method="GET" action="inscripcion.php">
    
<select name="id_cliente" data-placeholder="Choose a Country..." class="chosen-select" tabindex="2">
        <option value=" ">...</option>
        <?php foreach ($participantes_disponibles as $key => $dato) : ?>
            <option value="<?php echo $dato['id_cliente']; ?>"><?php echo $dato['primer_apellido'] . " " . $dato['segundo_apellido'] . " " . $dato['nombre']; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="hidden" name="accion" value="participanteTaller">
    <input type="hidden" name="id_taller" value="<?php echo $id_taller; ?>">
    <input type="submit" name="accion_participante" value="agregar">

</form>
<table class="table table-striped">
    <thead>
        <tr class="row100 head">
            <th class="cell100 column1" scope="col">#</th>
            <th class="cell100 column1" scope="col">Apellido Paterno</th>
            <th class="cell100 column1" scope="col">Apellido Materno</th>
            <th class="cell100 column1" scope="col">Nombres</th>
            <th class="cell100 column1" scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($inscritos as $key => $dato) :
        ?>
            <tr>
                <th scope="row"><?php echo $dato['id_cliente']; ?></th>
                <td><?php echo $dato['primer_apellido']; ?></td>
                <td><?php echo $dato['segundo_apellido']; ?></td>
                <td><?php echo $dato['nombre']; ?></td>
                <td>
                    <ul>
                    <li style="list-style: none;"><a class="btn btn-danger bi bi-pencil" href="inscripcion.php?accion=participanteTaller&id_taller=<?php echo $id_taller; ?>&id_cliente=<?php echo $dato['id_cliente']; ?>&accion_participante=eliminar">Eliminar</a></li>
                    </ul>
                </td>
            </tr>
        <?php
        endforeach
        ?>

    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script src="../libs/chosen_v1.8.7/docsupport/jquery-3.2.1.min.js"></script>
<script src="../libs/chosen_v1.8.7/chosen.jquery.js"></script>
<script src="../libs/chosen_v1.8.7/docsupport/prism.js"></script>
<script src="../libs/chosen_v1.8.7/docsupport/init.js"></script>