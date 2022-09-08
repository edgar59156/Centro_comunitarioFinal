<?php
require_once('../models/sistema.class.php');
require_once('../models/taller.class.php');
require_once('../models/salon.class.php');
require_once('../models/tallerista.class.php');
//require_once('rol.class.php');
//$sistema->validarRol('Administrador');
$id_taller = null;
$accion = null;
if (isset($_GET['accion'])) {
    $id_taller = isset($_GET['id_taller']) ? $_GET['id_taller'] : null;
    $accion = $_GET['accion'];
}

require_once ('../views/headersinmenu.php');
$sistema->validarRol('administrador');
switch ($accion) {

    case 'readOne':
        $datos = $taller->readOne($id_taller);
        if(is_array($datos))
        {
        require_once('../views/admin/taller/index.php');
        print_r($datos);
        }
        else{
        $taller->mensaje(0,"Ocurrió un error, la taller no exixte.");
        $datos = $taller->read();
        require_once('../views/admin/taller/index.php');
        }
        break;

    case 'new':
        $datosTallerista = $tallerista->read();
        $datosSalon = $salon->read();
        require_once('../views\headersinmenu.php');
            require_once('../views/taller/form.php');       
        break;

    case 'add':
        require_once ('../views/headersinmenu.php');
        $datos = $_POST;
        $resultado = $taller->register($datos);
        $taller->mensaje($resultado,($resultado)?"El taller se agrego correctamente":"Ocurrió un error");
        print_r($datos);
        $datos = $taller->read();
            require_once('../views/admin/taller/index.php');
        break;

    case 'modify':
        require_once ('../views/headersinmenu.php');
        $datosTallerista = $tallerista->read();
        $datosSalon = $salon->read();
        $datos = $taller->readOne($id_taller);
       // $datos_roles = $rol ->read();
       // $datos_usuario_rol = $usuarioRol->rolesUsuario($id_taller);
        if(is_array($datos))
        {
        require_once('../views/taller/form.php');
        }
        else{
        $taller->mensaje(0,"Ocurrió un error, El taller no exixte.");
        $datos = $taller->read();
            require_once('../views/admin/taller/index.php');
        }
        break;

    case 'update':
        $datos = $_POST;
        $resultado = $taller->update($datos, $id_taller);
        $taller->mensaje($resultado,($resultado)?"La taller se actualizo correctamente":"Ocurrió un error");
        $datos = $taller->read();
            require_once('../views/admin/taller/index.php');
        break;

    case 'delete':
        $resultado = $taller->delete($id_taller);
        $taller->mensaje($resultado,($resultado)?"La taller se eliminó correctamente":"Ocurrió un error");

    default:
        $datos = $taller->read();
        require_once ('../views/headersinmenu.php');
        require_once('../views/admin/taller/index.php');
        //print_r($_SESSION);
        break;
}
//require_once('../views/footer.php');
?>