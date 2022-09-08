<?php

require_once('../models/evento.class.php');
require_once('../models/usuario.class.php');
require_once('../models/cliente.class.php');
require_once('../models/inscripcion.class.php');

$accion = null;
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}
$datosUsuario = $usuario->readOneCorreo($_SESSION['correo']);
require_once('../views/headerUser.php');
$sistema->validarRol('cliente');
switch($accion){
    case 'recovery':
       
        break;

    case 'vermas':
            $datos = $_GET;
            //print_r($_GET);
    
            $datosEvento = $evento->readOne($datos['id_evento']);
            $datosEventoInsc = $inscripcion->readOneEvento($datos['id_evento']);
            //print_r($datoseventoInsc);
            require_once('../views/user/evento/vermas.php');
    break;

    case 'delete':
        $datos = $_GET;
        //print_r($datos);
        $datosUsuario = $usuario->readOneCorreo($_SESSION['correo']);
        $cliente = $cliente->readOneUsuario($datosUsuario['id_usuario']);
        $resultado = $inscripcion->eliminarDeevento($datos['id_evento'],$cliente[0]['id_cliente']);
        $datoseventoDisponible = $inscripcion->eventosDisponiblesCliente($cliente[0]['id_cliente']);
        $datos = $evento->read();
        require_once('../views/user/evento/index.php');
        break;

    case 'inscribir':
        //echo "inscribir";
        $datos = $_GET;
        //print_r($datos);
        $cliente = $cliente->readOneUsuario($datos['id_usuario']);

        $datoseventoDisponible = $inscripcion->eventosDisponiblesCliente($cliente[0]['id_cliente']);
        //echo "<pre/>";
        //print_r($datoseventoDisponible);
       // print_r($datos['id_evento']);
        $resultado = $inscripcion->agregarEnEvento($datos['id_evento'], $cliente[0]['id_cliente']);
        $datoseventoDisponible = $inscripcion->eventosDisponiblesCliente($cliente[0]['id_cliente']);
        $datos = $evento->read();
        require_once('../views/user/evento/index.php');
            
        break;

    default:
    $cliente = $cliente->readOneUsuario($datosUsuario['id_usuario']);
    $datoseventoDisponible = $inscripcion->eventosDisponiblesCliente($cliente[0]['id_cliente']);
    $datos= $evento->read();
    require_once('../views/user/evento/index.php');
}
//require_once('../views/footer.php');

?>