<?php
require_once('../models/usuario.class.php');
require_once('../models/taller.class.php');

$accion = null;
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
}
require_once('../views/header.php');
switch($accion){
    case 'recovery':
        
        require_once('../views/login/recuperacion.php');
        //require_once('../views/footer.php');
        break;

    case 'change':
        if(isset ($_GET['correo']) && isset($_GET['token'])){
            $datos = $_GET;
            require_once('../views/login/cambio.php');
        } else{
            $sistema->mensaje(0,"No exixte ese correo");
        }
        
        break;
    case 'login':
        $datos=$_POST;
        //print_r($datos);
        if( $usuario ->login($datos['correo'],$datos['contrasena'])){
                $usuario->credentials($datos['correo']);
                $datosUsuario = $usuario->readOneCorreo($datos['correo']);
                $tipoUsuario = $usuario->validarUsuario($datosUsuario['id_usuario']);
                if($tipoUsuario[0]['id_rol'] == 2){
                    echo 'rol: '.$tipoUsuario[0]['id_rol'];
                    $datos = $taller -> read();
                    header('Location: ../panel/tallerUser.php');

                }else if($tipoUsuario[0]['id_rol'] == 1){
                    echo 'rol: '.$tipoUsuario[0]['id_rol'];
                    $datos = $taller -> read();
                    header('Location: ../panel/inicioAdmin.php');
                }
                else if($tipoUsuario[0]['id_rol'] == 3){
                    echo 'rol: '.$tipoUsuario[0]['id_rol'];
                    $datos = $taller -> read();
                    header('Location: ../panel/inicioTallerista.php');
                }

               
               
        }else{

            require_once('../views/header.php');
            $sistema->mensaje(0,"Usuario y contraseña invalido");
            require_once('../views/login/login.php');
            $sistema -> logout();
            //require_once('../views/footer.php');
        }
        break;
            
    case 'logout':
        $sistema->mensaje(1,"Se ha cerrado la sesion");
        $sistema -> logout();
        require_once('../views/login/login.php');
        break;   

    case 'token':
        $datos = $_POST;
        $token = $sistema->token($datos['correo']);
        $contenido = "
        <h1>Recuperacion de contraseña<h1/>
        <p> usted activo el servico para la recuperacion de la contraseña haga click en la siguiente url <p/>
        <a href='http://localhost/centro_comunitario/panel/login.php?accion=change&correo=".$datos['correo']."&token=".$token."' >Recuperar<a/>
        ";
        if($token){
            $sistema->sendMail($datos['correo'],'Recuperacion de contrasena',$contenido);
            $sistema->mensaje(1,"Se ha enviado un correo electronico a ".$datos['correo']);
            require_once('../views/login/login.php');
        }
        else{
            $sistema->mensaje(0,"No exixte ese correo");
            require_once('../views/login/login.php');
        }

        break;
    case 'sendMail':
        $sistema->sendMail('edgar591569@gmail.com','Segunda prueba','Este es el cuerpo');
        break;

        case 'update':
            $datos=$_POST;
            if (isset($datos['correo']) && isset($datos['contrasena']) && isset($datos['token'])) {
                if ($sistema->changePassword($datos)) {
                    $sistema->mensaje(1,"Se ha cambiado la contraseña");
                    require_once('../views/login/login.php');
                } else {
                    $sistema->mensaje(0,"No se puede procesar la solicitud");
                }

            }
            else {
                $sistema->mensaje(0,"No se puede procesar la solicitud");
            }
            require_once('../views/login/login.php');
        break;

    default:
    require_once('../views/header.php');
    require_once('../views/login/login.php');
}
//require_once('../views/footer.php');

?>