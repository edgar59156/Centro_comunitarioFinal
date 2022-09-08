<link rel="stylesheet" href="/centro_comunitario/css/style3.css" />
<form style="padding: 2%;" method="POST" action="usuarioUser.php?accion=<?php echo (isset($id_usuario)) ? "update&id_usuario=" . $id_usuario : "add"; ?>" enctype='multipart/form-data'>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" alt="..." width="150" src="../image/usuario/<?php echo $datos['fotografia']; ?>"><span class="font-weight-bold"><?php echo (isset($id_usuario)) ? $datos['nombre'] : "" ?></span><span class="text-black-50"><?php echo (isset($id_usuario)) ? $datos['correo'] : "" ?></span><span> </span></div>
                <div class="form-group">

                    <div>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fotografia">
                    </div>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right"><?php echo (isset($id_usuario)) ? "Modificar" : "Nuevo"; ?> usuario</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><label class="labels">Nombre</label><input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo (isset($id_usuario)) ? $datos['nombre'] : "" ?>"></div>
                        <div class="col-md-4"><label class="labels">Apellido paterno</label><input type="text" class="form-control" placeholder="Apellido paterno" name="primer_apellido" value="<?php echo (isset($id_usuario)) ? $datos['primer_apellido'] : "" ?>"></div>
                        <div class="col-md-4"><label class="labels">Apellido paterno</label><input type="text" class="form-control" placeholder="Apellido materno" name="segundo_apellido" value="<?php echo (isset($id_usuario)) ? $datos['segundo_apellido'] : "" ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email </label><input type="text" class="form-control" placeholder="Correo" name="correo" value="<?php echo (isset($id_usuario)) ? $datos['correo'] : "" ?>"></div>
                        <div class="col-md-12"><label class="labels">Contraseña</label><input type="password" class="form-control" placeholder="*****" name="contrasena"></div>
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="Numero de telefono" name="telefono" value="<?php echo (isset($id_usuario)) ? $datos['telefono'] : "" ?>"></div>
                    </div>

                    <?php if (isset($id_usuario)) : ?>
                        <h3>Roles del usuario:</h3>
                        <br>

                        <?php foreach ($datos_roles as $key => $values) :
                            $checked = '';
                            if (in_array($values['id_rol'], $datos_usuario_rol)) {
                                $checked = 'checked';
                            }
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo ($values['id_rol']); ?>"  name="roles[]" <?php echo $checked; ?>>
                                <label class="form-check-label" >
                                    <?php echo ($values['rol']) ?>
                                </label>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    <?php endif; ?>
                    <br>

                    <input class="btn btn-success" type="submit" name="Guardar" value="Guardar">
                    <a href="usuario.php" class="btn btn-danger">Regresar</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Detalles adicionales</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>

                    <?php
                    if (isset($datosCliente['ine'])) {
                    ?>
                        <label class="form-check-label">
                            Usted cuenta con los siguientes documentos:
                        </label>

                        <ul>
                            <li><a class="big text-muted" target="_blank" href="../archivos/<?php echo $datosCliente['ine'] ?>.pdf">Ine</a></li>
                        </ul>
                    <?php
                    }
                    ?>

                </div>
                <label class="form-check-label">
                    Subir INE:
                </label>
                <input type="file" name="pdf" id="pdf_ine" />
            </div>
        </div>
    </div>
</form>
</body>