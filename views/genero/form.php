

<h1><?php echo(isset($id_genero))?"Modificar":"Nuevo"; ?> genero</h1>


<form style="padding: 2%;" method="POST" action="genero.php?accion=<?php echo (isset($id_genero)) ? "update&id_genero=" . $id_genero : "add"; ?>" enctype='multipart/form-data' >

    
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="genero" name="genero" value="<?php echo (isset($id_genero)) ? $datos['genero'] : "" ?>">
        </div>
    </div>   

    <input class="btn btn-success" type="submit" name="Guardar" value="Guardar">
    <a href="genero.php" class="btn btn-danger">Regresar</a>
</form>
