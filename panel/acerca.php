<?php
require_once('../models/taller.class.php');
require_once('../models/evento.class.php');
$accion = null;
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}

switch($accion){
    case 'recovery':
       
        break;

    default:
    require_once('../views/header.php');
    require_once('../views/acerca/index.php');
}
//require_once('../views/footer.php');

?>