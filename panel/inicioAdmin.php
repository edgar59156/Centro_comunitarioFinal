<?php
 require_once ('../models/inicio.class.php');
$accion = null;
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}
require_once('../views/headersinmenu.php');
$sistema->validarRol('administrador');
switch($accion){

    default:
    //$datos = $taller -> read();
    $datosUsuario = $inicio->conteoUsuarios();
    $datosEvento = $inicio->conteoEventos();
    $datosTaller = $inicio->conteoTaller();
    $datosCliente = $inicio->conteoClientes();
    $datosTallerista = $inicio->conteoTalleristas();

    include('../views/admin/inicio/inicio.php');
}
//require_once('../views/footer.php');

?>