<?php
 require_once ('../models/inicio.class.php');
 require_once ('../models/evento.class.php');
 require_once ('../models/tallerista.class.php');
 require_once ('../models/inscripcion.class.php');
 require_once('../models/salon.class.php');
$accion = null;
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}
require_once('../views/headerTallerista.php');
$sistema->validarRol('tallerista');
switch($accion){

    case 'vermas':
        require_once('../views/imports.php');
        $id_evento = $_GET['id_evento'];
        $correo = $_SESSION['correo'];
        $datosTallerista = $tallerista->readTalleristaCorreo($correo);
       // print_r($datosTallerista);
        $datosEvento = $evento->readOne($id_evento);
        $inscritos = $inscripcion->inscritosEvento($id_evento);
        $participantes_disponibles = $inscripcion->participantes_disponinblesEvento();
        require_once('../views/tallerista/evento/vermas.php');
    break;

    case 'modify':
        $id_evento = $_GET['id_evento'];

        $datosTallerista = $tallerista->read();
        $datosSalon = $salon->read();
        $datos = $evento->readOne($id_evento);
        if(is_array($datos))
        {
        require_once('../views/tallerista/evento/form.php');
        }
        else{
        $taller->mensaje(0,"Ocurrió un error, El taller no exixte.");
        $datos = $taller->read();
            include('../views/tallerista/evento/taller.php');
        }
        break;
        case 'update':
            $datos = $_POST;
            $id_evento = $_GET['id_evento'];
            $resultado = $evento->updateTallerista($datos, $id_evento);
            $evento->mensaje($resultado,($resultado)?"La evento se actualizo correctamente":"Ocurrió un error");
            $correo = $_SESSION['correo'];
            $datosTallerista = $tallerista->readTalleristaCorreo($correo);
            //print_r($datosTallerista);
            $datos = $evento -> readEventoTallerista($datosTallerista[0]['id_usuario']);
                require_once('../views/tallerista/evento/evento.php');
         break;


    case 'participanteEvento':
        $id_evento = $_GET['id_evento'];
        $accion_participante=null;
        require_once('../views/imports.php');
        if (isset($_GET['accion_participante'])) {
            $id_cliente = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : null;
            $accion_participante = $_GET['accion_participante'];
        }
        switch ($accion_participante){
            
            case 'eliminar':
                $inscripcion -> eliminarDeEvento($id_evento,$id_cliente);
                break;
            case 'agregar':
                
                $inscripcion -> agregarEnEvento($id_evento,$id_cliente); 
                break;
        }
        $id_evento = $_GET['id_evento'];
        $datosEvento = $evento->readOne($id_evento);
        $inscritos = $inscripcion->inscritosEvento($id_evento);
        $participantes_disponibles = $inscripcion->participantes_disponinblesEvento();

        require_once('../views/tallerista/evento/vermas.php');
    break;

    default:
    $correo = $_SESSION['correo'];
    $datosTallerista = $tallerista->readTalleristaCorreo($correo);
    //print_r($datosTallerista);
    $datos = $evento -> readEventoTallerista($datosTallerista[0]['id_usuario']);
    
    include('../views/tallerista/evento/evento.php');

}
//require_once('../views/footer.php');

?>