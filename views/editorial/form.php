

<h1><?php echo(isset($id_editorial))?"Modificar":"Nuevo"; ?> editorial</h1>


<form style="padding: 2%;" method="POST" action="editorial.php?accion=<?php echo (isset($id_editorial)) ? "update&id_editorial=" . $id_editorial : "add"; ?>" enctype='multipart/form-data' >

    
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="editorial" name="editorial" value="<?php echo (isset($id_editorial)) ? $datos['editorial'] : "" ?>">
        </div>
    </div>   

    <input class="btn btn-success" type="submit" name="Guardar" value="Guardar">
    <a href="editorial.php" class="btn btn-danger">Regresar</a>
</form>
