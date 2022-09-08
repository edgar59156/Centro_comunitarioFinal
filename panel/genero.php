<?php

require_once('../models/sistema.class.php');
//$sistema->validargenero('Administrador');
require_once('../models/genero.class.php');

$id_genero = null;
$accion = null;
if (isset($_GET['accion'])) {
    $id_genero = isset($_GET['id_genero']) ? $_GET['id_genero'] : null;
    $accion = $_GET['accion'];
}

require_once('../views\headersinmenu.php');
$sistema->validarRol('administrador');
switch ($accion) {
    case 'readOne':
        $datos = $genero->readOne($id_genero);
        if(is_array($datos))
        {
        require_once('../views/genero/index.php');
        }
        else{
        $genero->mensaje(0,"Ocurrió un error, la genero no exixte.");
        $datos = $genero->read();
        require_once('../views/genero/index.php');
        }
        break;

    case 'new':
            require_once('../views/genero/form.php');       
        break;

    case 'add':
        $datos = $_POST;
        $resultado = $genero->create($datos);
        $genero->mensaje($resultado,($resultado)?"La genero se agrego correctamente":"Ocurrió un error");
        $datos = $genero->read();
            require_once('../views/genero/index.php');
        break;

    case 'modify':
        $datos = $genero->readOne($id_genero);
    
        if(is_array($datos))
        {
        require_once('../views/genero/form.php');
        }
        else{
        $genero->mensaje(0,"Ocurrió un error, la genero no exixte.");
        $datos = $genero->read();
            require_once('../views/genero/index.php');
        }
        break;

    case 'update':
        $datos = $_POST;
        $resultado = $genero->update($datos, $id_genero);
        $genero->mensaje($resultado,($resultado)?"La genero se actualizo correctamente":"Ocurrió un error");
        $datos = $genero->read();
            require_once('../views/genero/index.php');
        break;

    case 'delete':
        $resultado = $genero->delete($id_genero);
        $genero->mensaje($resultado,($resultado)?"La genero se eliminó correctamente":"Ocurrió un error");

    default:
        $datos = $genero->read();
        
        require_once('../views/genero/index.php');
}
//require_once('../views/footer.php');
?>