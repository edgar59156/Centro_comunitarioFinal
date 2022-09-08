<h1><?php echo (isset($id_evento)) ? "Modificar" : "Nuevo"; ?> evento</h1>
<?php
if (isset($id_evento)) {
?>
    <div class="text-center">
        <img src="../image/evento/<?php echo $datos['fotografia']; ?>" class="rounded-circle" width="200" height="210" alt="...">
    </div>
<?php
}
?>




<form style="padding: 2%;" method="POST" action="eventoTallerista.php?accion=<?php echo (isset($id_evento)) ? "update&id_evento=" . $id_evento : "add"; ?>" enctype='multipart/form-data'>
    <div class="row">
        <label >Nombre del evento</label>
        <div class="col">
            <input type="text" class="form-control" placeholder="evento" name="evento" value="<?php echo (isset($id_evento)) ? $datos['evento'] : "" ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Info</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"><?php echo (isset($id_evento)) ? $datos['descripcion'] : "" ?></textarea>
    </div>
    <div class="form-group col-md-4">
        <label >Fecha</label>
        <input type="date" class="form-control"  name="fecha" value="<?php echo (isset($id_evento)) ? $datos['fecha'] : "" ?>">
    </div>
    <div class="form-group col-md-4">
        <label >Horario de inicio</label>
        <input type="time" class="form-control"  name="horario_inicio" value="<?php echo (isset($id_evento)) ? $datos['horario_inicio'] : "" ?>">
    </div>
    <div class="form-group col-md-4">
        <label >Horario Fin</label>
        <input type="time" class="form-control"  name="horario_fin" value="<?php echo (isset($id_evento)) ? $datos['horario_fin'] : "" ?>">
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
        <label >Elige Salon</label>
        <select  class="form-control" name="id_salon">
            <?php foreach ($datosSalon as $key => $value) :
                $selected = "";
                if(isset($datos['id_salon'])){
                if ($value['id_salon'] == $datos['id_salon']) :
                    $selected = "Selected";
                endif;
            }
            ?>

                <option value="<?php echo $value['id_salon']; ?>" <?php echo $selected; ?>><?php echo $value['id_salon']; ?>-<?php echo $value['salon']; ?></option>

            <?php endforeach; ?>
        </select>
    </div>
    
    <input class="btn btn-success" type="submit" name="Guardar" value="Guardar">
    <a href="eventoTallerista.php" class="btn btn-danger">Regresar</a>
</form>