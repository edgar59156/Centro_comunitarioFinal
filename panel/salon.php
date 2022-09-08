<?php

require_once('../models/sistema.class.php');
//$sistema->validarsalon('Administrador');
require_once('../models/salon.class.php');

$id_salon = null;
$accion = null;
if (isset($_GET['accion'])) {
    $id_salon = isset($_GET['id_salon']) ? $_GET['id_salon'] : null;
    $accion = $_GET['accion'];
}

require_once('../views\headersinmenu.php');
$sistema->validarRol('administrador');
switch ($accion) {
    case 'readOne':
        $datos = $salon->readOne($id_salon);
        if(is_array($datos))
        {
        require_once('../views/salon/index.php');
        }
        else{
        $salon->mensaje(0,"Ocurrió un error, la salon no exixte.");
        $datos = $salon->read();
        require_once('../views/salon/index.php');
        }
        break;

    case 'new':
            require_once('../views/salon/form.php');       
        break;

    case 'add':
        $datos = $_POST;
        $resultado = $salon->create($datos);
        $salon->mensaje($resultado,($resultado)?"La salon se agrego correctamente":"Ocurrió un error");
        $datos = $salon->read();
            require_once('../views/salon/index.php');
        break;

    case 'modify':
        $datos = $salon->readOne($id_salon);
    
        if(is_array($datos))
        {
        require_once('../views/salon/form.php');
        }
        else{
        $salon->mensaje(0,"Ocurrió un error, la salon no exixte.");
        $datos = $salon->read();
            require_once('../views/salon/index.php');
        }
        break;

    case 'update':
        $datos = $_POST;
        $resultado = $salon->update($datos, $id_salon);
        $salon->mensaje($resultado,($resultado)?"La salon se actualizo correctamente":"Ocurrió un error");
        $datos = $salon->read();
            require_once('../views/salon/index.php');
        break;

    case 'delete':
        $resultado = $salon->delete($id_salon);
        $salon->mensaje($resultado,($resultado)?"La salon se eliminó correctamente":"Ocurrió un error");

    default:
        $datos = $salon->read();
        
        require_once('../views/salon/index.php');
}
//require_once('../views/footer.php');
?>