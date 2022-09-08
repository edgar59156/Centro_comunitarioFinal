<?php
require_once('../models/inscripcion.class.php');
//require_once('conferencia.class.php');
require_once('../models/evento.class.php');
require_once('../models/taller.class.php');

$accion = null;
if (isset($_GET['accion'])) {
    $id_taller = isset($_GET['id_taller']) ? $_GET['id_taller'] : null;
    $accion = $_GET['accion'];
}
require_once('../views/headersinmenu.php');
$sistema->validarRol('administrador');
switch($accion){

    case 'inscribirTaller':
        $id_taller = $_GET['id_taller'];
        require_once('../views/imports.php');
        $datosTaller = $taller->readOne($id_taller);
        $inscritos = $inscripcion->inscritosTaller($id_taller);
        $participantes_disponibles = $inscripcion->participantes_disponinblesTaller();

        require_once('../views/inscripcion/participanteTaller.php');
        break;
        case 'inscribirEvento':
            $id_evento = $_GET['id_evento'];
            require_once('../views/imports.php');
            $datosEvento = $evento->readOne($id_evento);
            $inscritos = $inscripcion->inscritosEvento($id_evento);
            $participantes_disponibles = $inscripcion->participantes_disponinblesEvento();
    
            require_once('../views/inscripcion/participanteEvento.php');
            break;

    case 'participanteTaller':
       
        $id_taller = $_GET['id_taller'];
        $accion_participante=null;
        
        if (isset($_GET['accion_participante'])) {
            $id_cliente = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : null;
            $accion_participante = $_GET['accion_participante'];
        }
        switch ($accion_participante){
            
            case 'eliminar':
                require_once('../views/imports.php');
                $inscripcion -> eliminarDeTaller($id_taller,$id_cliente);
                break;
            case 'agregar':
                require_once('../views/imports.php');
                $inscripcion -> agregarEnTaller($id_taller,$id_cliente); 
                break;
        }
        $id_taller = $_GET['id_taller'];
        $datosTaller = $taller->readOne($id_taller);
        $inscritos = $inscripcion->inscritosTaller($id_taller);
        $participantes_disponibles = $inscripcion->participantes_disponinblesTaller();

        require_once('../views/inscripcion/participanteTaller.php');
        break;

    case 'participanteEvento':
       
            $id_evento = $_GET['id_evento'];
            $accion_participante=null;
            if (isset($_GET['accion_participante'])) {
                $id_cliente = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : null;
                $accion_participante = $_GET['accion_participante'];
            }
            switch ($accion_participante){
                
                case 'eliminar':
                    require_once('../views/imports.php');
                    $inscripcion -> eliminarDeEvento($id_evento,$id_cliente);
                    break;
                case 'agregar':
                    require_once('../views/imports.php');
                    $inscripcion -> agregarEnEvento($id_evento,$id_cliente); 
                    break;
            }
            $id_evento = $_GET['id_evento'];
            $datosEvento = $evento->readOne($id_evento);
            $inscritos = $inscripcion->inscritosEvento($id_evento);
            $participantes_disponibles = $inscripcion->participantes_disponinblesEvento();
    
            require_once('../views/inscripcion/participanteevento.php');
            break;

    default:
    $datosTaller = $inscripcion -> readTaller();
    $datosEvento = $inscripcion -> readEvento();
    require_once('../views/inscripcion/index.php');
}
//require_once('../views/footer.php');
