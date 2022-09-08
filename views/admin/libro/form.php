<h1><?php echo (isset($id_libro)) ? "Modificar" : "Nuevo"; ?> libro</h1>
<?php
if (isset($id_libro)) {
?>
    <div class="text-center">
        <img src="../image/libro/<?php echo $datos['imagen']; ?>" class="rounded-circle" width="200" height="210" alt="...">
    </div>
<?php
}
?>


<form style="padding: 2%;" method="POST" action="libroAdmin.php?accion=<?php echo (isset($id_libro)) ? "update&id_libro=" . $id_libro : "add"; ?>" enctype='multipart/form-data'>
    <div class="row">
        <label >Nombre del libro</label>
        <div class="col">
            <input type="text" class="form-control" placeholder="libro" name="libro" value="<?php echo (isset($id_libro)) ? $datos['libro'] : "" ?>">
        </div>
    </div>
    <div class="row">
        <label >Edicion</label>
        <div class="col">
            <input type="text" class="form-control"  name="edicion" value="<?php echo (isset($id_libro)) ? $datos['edicion'] : "" ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Descripcion</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"><?php echo (isset($id_libro)) ? $datos['descripcion'] : "" ?></textarea>
    </div>
    
    <div class="form-group">
        <div>
            <label for="exampleFormControlFile1">Imagen</label>
        </div>
        <div>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen">
        </div>
    </div>

    <div class="form-group col-md-4">
        <label >Elige Genero</label>
        <select  class="form-control" name="id_genero">
            <?php foreach ($datosGenero as $key => $value) :
                $selected = "";
                if(isset($datos)){
                if ($value['id_genero'] == $datos['id_genero']) :
                    $selected = "Selected";
                endif;
            }
            ?>
                <option value="<?php echo $value['id_genero']; ?>" <?php echo $selected; ?>><?php echo $value['id_genero']; ?>:<?php echo $value['genero']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label >Elige Editorial:</label>
        <select  class="form-control" name="id_editorial">
            <?php foreach ($datosEditorial as $key => $value) :
                $selected = "";
                if(isset($datos)){
                if ($value['id_editorial'] == $datos['id_editorial']) :
                    $selected = "Selected";
                endif;
            }
            ?>
                <option value="<?php echo $value['id_editorial']; ?>" <?php echo $selected; ?>><?php echo $value['id_editorial']; ?>: <?php echo $value['editorial']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <input class="btn btn-success" type="submit" name="Guardar" value="Guardar">
    <a href="libroAdmin.php" class="btn btn-danger">Regresar</a>
</form>