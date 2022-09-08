<?php
require_once('../models/sistema.class.php');
require_once('../models/taller.class.php');
require_once('../models/inscripcion.class.php');
require_once('../models/cliente.class.php');
require_once('../models/usuario.class.php');
//require_once('rol.class.php');
//$sistema->validarRol('Administrador');
$id_taller = null;
$accion = null;
if (isset($_GET['accion'])) {
    $id_taller = isset($_GET['id_taller']) ? $_GET['id_taller'] : null;
    $accion = $_GET['accion'];
}
$datosUsuario = $usuario->readOneCorreo($_SESSION['correo']);
//require_once('../views\header.php');
require_once('../views/headerUser.php');
$sistema->validarRol('cliente');

switch ($accion) {

    case 'readOne':
        $datos = $taller->readOne($id_taller);
        if(is_array($datos))
        {
        require_once('../views/taller/index.php');
        print_r($datos);
        }
        else{
        $taller->mensaje(0,"Ocurrió un error, la taller no exixte.");
        $datos = $taller->read();
        require_once('../views/taller/index.php');
        }
        break;

    case 'new':
        require_once('../views\header.php');
            require_once('../views/taller/form.php');       
        break;

    case 'add':
        $datos = $_POST;
        $resultado = $taller->create($datos);
        $taller->mensaje($resultado,($resultado)?"La taller se agrego correctamente":"Ocurrió un error");
        print_r($datos);
        $datos = $taller->read();
            require_once('../views/taller/index.php');
        break;

    case 'modify':
        require_once('../views\header.php');
        $datos = $taller->readOne($id_taller);
       // $datos_roles = $rol ->read();
       // $datos_usuario_rol = $usuarioRol->rolesUsuario($id_taller);
        if(is_array($datos))
        {
        require_once('../views/taller/form.php');
        }
        else{
        $taller->mensaje(0,"Ocurrió un error, la taller no exixte.");
        $datos = $taller->read();
            require_once('../views/taller/index.php');
        }
        break;

    case 'update':
        $datos = $_POST;
        $resultado = $taller->update($datos, $id_taller);
        $taller->mensaje($resultado,($resultado)?"La taller se actualizo correctamente":"Ocurrió un error");
        $datos = $taller->read();
            require_once('../views/taller/index.php');
        break;
    case 'vermas':
        $datos = $_GET;
        //print_r($_GET);

        $datosTaller = $taller->readOne($datos['id_taller']);
        $datosTallerInsc = $inscripcion->readOneTaller($datos['id_taller']);
        //print_r($datosTallerInsc);
        require_once('../views/user/taller/vermas.php');


        break;

    case 'inscribir':
        //echo "inscribir";
        $datos = $_GET;
        print_r($datos);
        $cliente = $cliente->readOneUsuario($datos['id_usuario']);
        $datosTallerDisponible = $inscripcion->talleresDisponiblesCliente($cliente[0]['id_cliente']);
        print_r($cliente[0]['id_cliente']);
        print_r($datos['id_taller']);
        $resultado = $inscripcion->agregarEnTaller($datos['id_taller'], $cliente[0]['id_cliente']);
        $datosTallerDisponible = $inscripcion->talleresDisponiblesCliente($cliente[0]['id_cliente']);
        $datos = $taller->read();
        require_once('../views/user/taller/taller.php');
              
        break;

    case 'delete':
        $datos = $_GET;
        //print_r($datos);
        $datosUsuario = $usuario->readOneCorreo($_SESSION['correo']);
        $cliente = $cliente->readOneUsuario($datosUsuario['id_usuario']);
        $resultado = $inscripcion->eliminarDeTaller($datos['id_taller'],$cliente[0]['id_cliente']);
        $datosTallerDisponible = $inscripcion->talleresDisponiblesCliente($cliente[0]['id_cliente']);
        $datos = $taller->read();
        require_once('../views/user/taller/taller.php');
        break;

    default:
        $datosUsuario = $usuario->readOneCorreo($_SESSION['correo']);
        $cliente = $cliente->readOneUsuario($datosUsuario['id_usuario']);
       // print_r($cliente);
        $datosTallerDisponible = $inscripcion->talleresDisponiblesCliente($cliente[0]['id_cliente']);
        $datos = $taller->read();
        //require_once ('../views/headersinmenu.php');
        require_once('../views/user/taller/taller.php');
        
        break;
}
//require_once('../views/footer.php');
?>