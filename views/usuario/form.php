<h1><?php echo (isset($id_usuario)) ? "Modificar" : "Nuevo"; ?> usuario</h1>
<?php 
if(isset($id_usuario)){
    ?>
        <div class="text-center">
            <img src="../image/usuario/<?php echo $datos['fotografia']; ?>" class="rounded-circle" width="200" height="210" alt="...">
        </div>
    <?php
}
?>

<form style="padding: 2%;" method="POST" action="usuario.php?accion=<?php echo (isset($id_usuario)) ? "update&id_usuario=" . $id_usuario : "add"; ?>" enctype='multipart/form-data'>

<div class="row">
        <label>Nombre </label>
        <div class="col">
            <input type="text" class="form-control"  name="nombre" value="<?php echo (isset($id_usuario)) ? $datos['nombre'] : "" ?>">
        </div>
</div>

    <div class="row">
        <label>Primer apellido</label>
        <div class="col">
            <input type="text" class="form-control"  name="primer_apellido" value="<?php echo (isset($id_usuario)) ? $datos['primer_apellido'] : "" ?>">
        </div>
    </div>
    <div class="row">
        <label>Segundo apellido</label>
        <div class="col">
            <input type="text" class="form-control"  name="segundo_apellido" value="<?php echo (isset($id_usuario)) ? $datos['segundo_apellido'] : "" ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail4">Correo</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="correo" value="<?php echo (isset($id_usuario)) ? $datos['correo'] : "" ?>">
    </div>

    <div class="row">
        <div class="col">
        <label>Contraseña</label>
            <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" >
        </div>
    </div>
    <?php if(isset($id_usuario)): ?> 
        <h3>Roles del usuario:</h3>
        <?php foreach ($datos_roles as $key => $values):
        $checked = '';
        if(in_array($values['id_rol'],$datos_usuario_rol)){
            $checked = 'checked';
        }
        ?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?php  echo($values['id_rol']); ?>" id="flexCheckDefault" name="roles[]" <?php echo $checked; ?> >
            <label class="form-check-label" for="flexCheckDefault">
                <?php echo($values['rol']) ?> 
            </label>
        </div>
        <?php 
            endforeach;
        ?>
    <?php endif; ?>
    <input class="btn btn-success" type="submit" name="Guardar" value="Guardar">
    <a href="usuario.php" class="btn btn-danger">Regresar</a>
</form>

