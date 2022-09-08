<?php
 require_once ('../models/taller.class.php');
 require_once ('../models/usuario.class.php');
$accion = null;
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}
require_once('../views/headerUser.php');

$datosUsuario = $usuario->readOneCorreo($_SESSION['correo']);
switch($accion){
    case 'recovery':
       
        break;

        
    default:
    $datos = $taller -> read();
    include('../views/user/taller/taller.php');
}
//require_once('../views/footer.php');

?>