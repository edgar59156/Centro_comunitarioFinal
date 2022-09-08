<?php
require_once('../models/libro.class.php');

$accion = null;
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}

switch($accion){
    case 'recovery':
       
        break;

    default:
    $datos = $libro->read();
    require_once('../views/header.php');
    require_once('../views/libro/index.php');
}
//require_once('../views/footer.php');

?>