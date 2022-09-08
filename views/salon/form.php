

<h1><?php echo(isset($id_salon))?"Modificar":"Nuevo"; ?> salon</h1>


<form style="padding: 2%;" method="POST" action="salon.php?accion=<?php echo (isset($id_salon)) ? "update&id_salon=" . $id_salon : "add"; ?>" enctype='multipart/form-data' >

    
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="salon" name="salon" value="<?php echo (isset($id_salon)) ? $datos['salon'] : "" ?>">
        </div>
    </div>   

    <input class="btn btn-success" type="submit" name="Guardar" value="Guardar">
    <a href="salon.php" class="btn btn-danger">Regresar</a>
</form>
