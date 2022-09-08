<?php
require_once('../models/sistema.class.php');
require_once('../models/libro.class.php');
$id_libro = null;
$accion = null;
if (isset($_GET['accion'])) {
    $id_libro = isset($_GET['id_libro']) ? $_GET['id_libro'] : null;
    $accion = $_GET['accion'];
}

require_once ('../views/headersinmenu.php');
$sistema->validarRol('administrador');
switch ($accion) {

    case 'readOne':
        $datos = $libro->readOne($id_libro);
        if(is_array($datos))
        {
        require_once('../views/admin/libro/index.php');
        print_r($datos);
        }
        else{
        $libro->mensaje(0,"Ocurrió un error, la libro no exixte.");
        $datos = $libro->read();
        require_once('../views/admin/libro/index.php');
        }
        break;

    case 'new':
        $datoslibro= $libro->read();
        $datosGenero = $libro->readGenero();
        $datosEditorial = $libro->readEditorial();
            require_once('../views/admin/libro/form.php');       
        break;

    case 'add':
        //require_once ('../views/headersinmenu.php');
        $datos = $_POST;
        $resultado = $libro->create($datos);
        $libro->mensaje($resultado,($resultado)?"El libro se agrego correctamente":"Ocurrió un error");
        print_r($datos);
        $datos = $libro->read();
            require_once('../views/admin/libro/index.php');
        break;

    case 'modify':
        $datosGenero = $libro->readGenero();
        $datosEditorial = $libro->readEditorial();
        $datos = $libro->readOne($id_libro);
        if(is_array($datos))
        {
            require_once('../views/admin/libro/form.php');   
        }
        else{
        $libro->mensaje(0,"Ocurrió un error, El libro no exixte.");
        $datos = $libro->read();
            require_once('../views/admin/libro/index.php');
        }
        break;

    case 'update':
        $datos = $_POST;
        $resultado = $libro->update($datos, $id_libro);
        $libro->mensaje($resultado,($resultado)?"La libro se actualizo correctamente":"Ocurrió un error");
        $datos = $libro->read();
            require_once('../views/admin/libro/index.php');
        break;

    case 'delete':
        $resultado = $libro->delete($id_libro);
        $libro->mensaje($resultado,($resultado)?"La libro se eliminó correctamente":"Ocurrió un error");

    default:
        $datos = $libro->read();
        require_once('../views/admin/libro/index.php');
        //print_r($_SESSION);
        break;
}
//require_once('../views/footer.php');
?>