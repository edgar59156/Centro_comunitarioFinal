<?php
require_once('../models/evento.class.php');
require_once('../models/salon.class.php');
require_once('../models/usuario.class.php');
$id_evento = null;
$accion = null;
if (isset($_GET['accion'])) {
    $id_evento = isset($_GET['id_evento']) ? $_GET['id_evento'] : null;
    $accion = $_GET['accion'];
}
require_once('../views/headersinmenu.php');
$sistema->validarRol('administrador');
switch($accion){
    case 'readOne':
        $datos = $evento->readOne($id_evento);
        if(is_array($datos))
        {
        require_once('../views/admin/evento/index.php');
        print_r($datos);
        }
        else{
        $evento->mensaje(0,"Ocurrió un error, la evento no exixte.");
        $datos = $evento->read();
        require_once('../views/admin/evento/index.php');
        }
        break;

    case 'new':
        $datosSalon = $salon->read();
        $datosUsuarios = $usuario->read();
        require_once('../views\headersinmenu.php');
            require_once('../views/evento/form.php');       
        break;

    case 'add':
        require_once ('../views/headersinmenu.php');
        $datos = $_POST;
        $resultado = $evento->create($datos);
        $evento->mensaje($resultado,($resultado)?"El evento se agrego correctamente":"Ocurrió un error");
        print_r($datos);
        $datos = $evento->read();
            require_once('../views/admin/evento/index.php');
        break;

    case 'modify':
        require_once ('../views/headersinmenu.php');
        $datos = $evento->readOne($id_evento);
        $datosSalon = $salon->read();
        $datosUsuarios = $usuario->read();
        if(is_array($datos))
        {
        require_once('../views/evento/form.php');
        }
        else{
        $evento->mensaje(0,"Ocurrió un error, El evento no exixte.");
        $datos = $evento->read();
            require_once('../views/admin/evento/index.php');
        }
        break;

    case 'update':
        $datos = $_POST;
        $resultado = $evento->update($datos, $id_evento);
        $evento->mensaje($resultado,($resultado)?"La evento se actualizo correctamente":"Ocurrió un error");
        $datos = $evento->read();
            require_once('../views/admin/evento/index.php');
        break;

    case 'delete':
        $resultado = $evento->delete($id_evento);
        $evento->mensaje($resultado,($resultado)?"La evento se eliminó correctamente":"Ocurrió un error");

    default:
    $datos= $evento->read();
    require_once('../views/admin/evento/index.php');
}
//require_once('../views/footer.php');
?>