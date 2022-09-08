<?php
require_once('../models/taller.class.php');
require_once('../models/evento.class.php');
$accion = null;
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}
require_once('../views/headerinicio.php');
switch($accion){
    case 'recovery':
       
        break;

    default:
    $datos = $taller->read();
    $datosevento = $evento->read();
    require_once('../views/inicio/inicio2.php');
}
//require_once('../views/footer.php');

?>