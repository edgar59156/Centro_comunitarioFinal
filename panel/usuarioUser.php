<?php
require_once('../models/sistema.class.php');
require_once('../models/usuario.class.php');
require_once('../models/cliente.class.php');
require_once('../models/rol.class.php');
require_once('../models/usuario_rol.class.php');
require_once('../models/inscripcion.class.php');
require_once('../models/taller.class.php');

//require_once('../panel/subir.php');
//$sistema->validarRol('Administrador');
$id_usuario = null;
$accion = null;
if (isset($_GET['accion'])) {
    $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : null;
    $accion = $_GET['accion'];
}

require_once('../views/headerUser.php');

switch ($accion) {
    case 'readOne':
        $datos = $usuario->readOne($id_usuario);
        if(is_array($datos))
        {
            
        require_once('../views/usuario/index.php');
        }
        else{
        $usuario->mensaje(0,"Ocurrió un error, la usuario no exixte.");
        $datos = $usuario->read();
        require_once('../views/usuario/index.php');
        }
        break;

    case 'new':
            require_once('../views/usuario/form.php');       
        break;

    case 'add':
        $datos = $_POST;
        $resultado = $usuario->create($datos);
        $usuario->mensaje($resultado,($resultado)?"La usuario se agrego correctamente":"Ocurrió un error");
        $datos = $usuario->read();
            require_once('../views/usuario/index.php');
        break;

    case 'modify':
        
        $datos = $usuario->readOne($id_usuario);
        $datos_roles = $rol ->read();
        $datos_usuario_rol = $usuarioRol->rolesUsuario($id_usuario);
        if(is_array($datos))
        {
       // require_once('../views/usuario/form.php');
        require_once('../views/usuario/form2.php');
        }
        else{
        $usuario->mensaje(0,"Ocurrió un error, la usuario no exixte.");
        $datos = $usuario->read();
            require_once('../views/usuario/index.php');
        }
        break;

    case 'update':
        $datos = $_POST;
        //print_r($datos);
        $resultado = $usuario->update($datos, $id_usuario);
        $usuario->mensaje($resultado,($resultado)?"La usuario se actualizo correctamente":"Ocurrió un error");
        $datosUsuario = $usuario->readOneCorreo($_SESSION['correo']);
        $cliente = $cliente->readOneUsuario($datosUsuario['id_usuario']);
       // print_r($cliente);
        $datosTallerDisponible = $inscripcion->talleresDisponiblesCliente($cliente[0]['id_cliente']);
        
        $datos = $taller->read();
        //require_once ('../views/headersinmenu.php');
        //$sistema->cargarPDF("PDF","../archivos");
        require_once('../views/user/taller/taller.php');
        break;
    case 'modificar':
        //print_r($_SESSION['correo']);
        $correo = $_SESSION['correo'];
        //echo $correo;
        $datosUsuario = $usuario->modificarPerfil($correo);
       // print_r($datosUsuario);
        $datosUsuario = $usuario->readOneCorreo($_SESSION['correo']);
        $cli = $cliente->readOneUsuario($datosUsuario['id_usuario']);
        //echo $cli[0]['id_cliente'];
        $datosCliente = $cliente->readOne($cli[0]['id_cliente']);
        $id_usuario = $datosUsuario['id_usuario'];
        $datos = $usuario->readOne($id_usuario);
        $datos_roles = $rol ->read();
        $datos_usuario_rol = $usuarioRol->rolesUsuario($id_usuario);
        if(is_array($datos))
        {
       // require_once('../views/usuario/form.php');
        require_once('../views/user/usuario/form.php');
        }
        else{
        $usuario->mensaje(0,"Ocurrió un error, la usuario no exixte.");
        $datos = $usuario->read();
            require_once('../views/usuario/index.php');
        }
        break;

      

    case 'delete':
        $resultado = $usuario->delete($id_usuario);
        $usuario->mensaje($resultado,($resultado)?"La usuario se eliminó correctamente":"Ocurrió un error");
            
    default:
    $datosUsuario = $usuario->readOneCorreo($_SESSION['correo']);
    $cliente = $cliente->readOneUsuario($datosUsuario['id_usuario']);
   // print_r($cliente);
    $datosTallerDisponible = $inscripcion->talleresDisponiblesCliente($cliente[0]['id_cliente']);
    $datos = $taller->read();
    //require_once ('../views/headersinmenu.php');
    require_once('../views/user/taller/taller.php');
        break;
}
//require_once('../views/footer.php');
?>