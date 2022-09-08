<h1><?php echo (isset($id_taller)) ? "Modificar" : "Nuevo"; ?> taller</h1>
<?php
if (isset($id_taller)) {
?>
    <div class="text-center">
        <img src="../image/taller/<?php echo $datos['fotografia']; ?>" class="rounded-circle" width="200" height="210" alt="...">
    </div>
<?php
}
?>




<form style="padding: 2%;" method="POST" action="taller.php?accion=<?php echo (isset($id_taller)) ? "update&id_taller=" . $id_taller : "add"; ?>" enctype='multipart/form-data'>
    <div class="row">
        <label for="formGroupExampleInput">Nombre del taller</label>
        <div class="col">
            <input type="text" class="form-control" placeholder="Taller" name="taller" value="<?php echo (isset($id_taller)) ? $datos['taller'] : "" ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Info</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"><?php echo (isset($id_taller)) ? $datos['descripcion'] : "" ?></textarea>
    </div>
    <div class="form-group col-md-4">
        <label for="formGroupExampleInput">Horario de inicio</label>
        <input type="time" class="form-control" id="inputEmail4" placeholder="hora" name="horario_inicio" value="<?php echo (isset($id_taller)) ? $datos['horario_inicio'] : "" ?>">
    </div>
    <div class="form-group col-md-4">
        <label for="formGroupExampleInput">Horario Fin</label>
        <input type="time" class="form-control" id="inputEmail4" placeholder="hora" name="horario_fin" value="<?php echo (isset($id_taller)) ? $datos['horario_fin'] : "" ?>">
    </div>
    <div class="form-group col-md-4">
        <label for="formGroupExampleInput">Costo</label>
        <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control"  name="costo" value="<?php echo (isset($id_taller)) ? $datos['costo'] : "" ?>">
    </div>
    
    <div class="form-group">
        <div>
            <label for="exampleFormControlFile1">Imagen</label>
        </div>
        <div>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fotografia">
        </div>
    </div>

    <div class="form-group col-md-4">
        <label for="inputState">Elige Salon</label>
        <select id="inputState" class="form-control" name="id_salon">
            <?php foreach ($datosSalon as $key => $value) :
                $selected = "";
                if ($value['id_salon'] == $datos['id_salon']) :
                    $selected = "Selected";
                endif;
            ?>

                <option value="<?php echo $value['id_salon']; ?>" <?php echo $selected; ?>><?php echo $value['id_salon']; ?>-<?php echo $value['salon']; ?></option>

            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="inputState">Elige instructor/tallerista:</label>
        <select id="inputState" class="form-control" name="id_usuario">
            <?php foreach ($datosTallerista as $key => $value) :
                $selected = "";
                if ($value['id_usuario'] == $datos['id_usuario']) :
                    $selected = "Selected";
                endif;
            ?>

                <option value="<?php echo $value['id_usuario']; ?>" <?php echo $selected; ?>><?php echo $value['tratamiento']; ?>: <?php echo $value['nombre']; ?> <?php echo $value['primer_apellido']; ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    
    <input class="btn btn-success" type="submit" name="Guardar" value="Guardar">
    <a href="taller.php" class="btn btn-danger">Regresar</a>
</form>