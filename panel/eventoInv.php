<?php

require_once('../models/evento.class.php');
$accion = null;
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}
require_once('../views/header.php');
switch($accion){
    case 'recovery':
       
        break;

    default:
    $datos= $evento->read();
    require_once('../views/evento/index.php');
}
//require_once('../views/footer.php');

?>