<?php

require_once('../models/sistema.class.php');
//$sistema->validareditorial('Administrador');
require_once('../models/editorial.class.php');

$id_editorial = null;
$accion = null;
if (isset($_GET['accion'])) {
    $id_editorial = isset($_GET['id_editorial']) ? $_GET['id_editorial'] : null;
    $accion = $_GET['accion'];
}

require_once('../views\headersinmenu.php');
$sistema->validarRol('administrador');
switch ($accion) {
    case 'readOne':
        $datos = $editorial->readOne($id_editorial);
        if(is_array($datos))
        {
        require_once('../views/editorial/index.php');
        }
        else{
        $editorial->mensaje(0,"Ocurrió un error, la editorial no exixte.");
        $datos = $editorial->read();
        require_once('../views/editorial/index.php');
        }
        break;

    case 'new':
            require_once('../views/editorial/form.php');       
        break;

    case 'add':
        $datos = $_POST;
        $resultado = $editorial->create($datos);
        $editorial->mensaje($resultado,($resultado)?"La editorial se agrego correctamente":"Ocurrió un error");
        $datos = $editorial->read();
            require_once('../views/editorial/index.php');
        break;

    case 'modify':
        $datos = $editorial->readOne($id_editorial);
    
        if(is_array($datos))
        {
        require_once('../views/editorial/form.php');
        }
        else{
        $editorial->mensaje(0,"Ocurrió un error, la editorial no exixte.");
        $datos = $editorial->read();
            require_once('../views/editorial/index.php');
        }
        break;

    case 'update':
        $datos = $_POST;
        $resultado = $editorial->update($datos, $id_editorial);
        $editorial->mensaje($resultado,($resultado)?"La editorial se actualizo correctamente":"Ocurrió un error");
        $datos = $editorial->read();
            require_once('../views/editorial/index.php');
        break;

    case 'delete':
        $resultado = $editorial->delete($id_editorial);
        $editorial->mensaje($resultado,($resultado)?"La editorial se eliminó correctamente":"Ocurrió un error");

    default:
        $datos = $editorial->read();
        
        require_once('../views/editorial/index.php');
}
//require_once('../views/footer.php');
?>