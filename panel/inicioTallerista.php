<?php
 require_once ('../models/inicio.class.php');
 require_once ('../models/taller.class.php');
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
        $id_taller = $_GET['id_taller'];
        $correo = $_SESSION['correo'];
        $datosTallerista = $tallerista->readTalleristaCorreo($correo);
       // print_r($datosTallerista);
        $datosTaller = $taller->readOne($id_taller);
        $inscritos = $inscripcion->inscritosTaller($id_taller);
        $participantes_disponibles = $inscripcion->participantes_disponinblesTaller();
        require_once('../views/tallerista/taller/vermas.php');
    break;

    case 'modify':
        $id_taller = $_GET['id_taller'];

        $datosTallerista = $tallerista->read();
        $datosSalon = $salon->read();
        $datos = $taller->readOne($id_taller);
        if(is_array($datos))
        {
        require_once('../views/tallerista/taller/form.php');
        }
        else{
        $taller->mensaje(0,"Ocurrió un error, El taller no exixte.");
        $datos = $taller->read();
            include('../views/tallerista/taller/taller.php');
        }
        break;
        case 'update':
            $datos = $_POST;
            $id_taller = $_GET['id_taller'];
            $resultado = $taller->update($datos, $id_taller);
            $taller->mensaje($resultado,($resultado)?"La taller se actualizo correctamente":"Ocurrió un error");
            $correo = $_SESSION['correo'];
            $datosTallerista = $tallerista->readTalleristaCorreo($correo);
            //print_r($datosTallerista);
            $datos = $taller -> readTallerTallerista($datosTallerista);
                require_once('../views/tallerista/taller/taller.php');
         break;


    case 'participanteTaller':
        $id_taller = $_GET['id_taller'];
        $accion_participante=null;
        require_once('../views/imports.php');
        if (isset($_GET['accion_participante'])) {
            $id_cliente = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : null;
            $accion_participante = $_GET['accion_participante'];
        }
        switch ($accion_participante){
            
            case 'eliminar':
                $inscripcion -> eliminarDeTaller($id_taller,$id_cliente);
                break;
            case 'agregar':
                
                $inscripcion -> agregarEnTaller($id_taller,$id_cliente); 
                break;
        }
        $id_taller = $_GET['id_taller'];
        $datosTaller = $taller->readOne($id_taller);
        $inscritos = $inscripcion->inscritosTaller($id_taller);
        $participantes_disponibles = $inscripcion->participantes_disponinblesTaller();

        require_once('../views/tallerista/taller/vermas.php');
    break;

    default:
    $correo = $_SESSION['correo'];
    $datosTallerista = $tallerista->readTalleristaCorreo($correo);
    //print_r($datosTallerista);
    $datos = $taller -> readTallerTallerista($datosTallerista);
    include('../views/tallerista/taller/taller.php');
}
//require_once('../views/footer.php');

?>