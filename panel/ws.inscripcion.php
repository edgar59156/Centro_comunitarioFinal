<?php
header('Content-Type: application/json; charset=utf-8');
require_once('../models/usuario.class.php');
require_once('../models/cliente.class.php');
require_once('../models/taller.class.php');
require_once('../models/inscripcion.class.php');
require_once('../models/registro.class.php');
//require_once('tipo.class.php');
//$sistema->validarRol('Usuario');
$id_cliente = null;
$id_usuario = null;
$accion = null;
$id_cliente = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : null;
$id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : null;
$id_taller = isset($_GET['id_taller']) ? $_GET['id_taller'] : null;
$accion = $_SERVER['REQUEST_METHOD'];
$dataCliente = array();
$dataTaller = array();

switch ($accion) {

    case 'POST':

        $dataCliente_input = file_get_contents('php://input');
        $dataCliente_input = json_decode($dataCliente_input, true);
        if (is_numeric($id_usuario)) {
           
                $resultado = $usuario->update2($dataCliente_input, $id_usuario);
                if ($resultado) {
                    $dataCliente['mensaje'] = "Usuario actualizado";
                    $dataCliente['datos'] = $dataCliente_input;
                } else {
                    $data['mesaje'] = 'Error usuario no insertado';
                }
        }
        else if (is_numeric($id_cliente)) {
            if (is_numeric($id_taller)) {
            $resultado = $inscripcion->agregarEnTaller($id_taller,$id_cliente);
                $data['mensaje'] = "Usuario inscrito";
                $data = json_encode($data);
                echo $data;
        }
    } 
        else {
                $resultado = $registro->register($dataCliente_input);
                if ($resultado) {
                    $dataCliente['mensaje'] = "Usuario insertado";
                    $dataCliente['datos'] = $dataCliente_input;
                } else {
                    $data['mesaje'] = 'Error usuario no insertado';
                }
        }

            break;

    case 'DELETE':
        if (is_numeric($id_usuario)) {
            $n = $usuario->delete($id_usuario);
            if ($n > 0) {
                $dataCliente['mensaje'] = 'se elimino el usuario ' . $id_cliente;
            } else {
                $dataCliente['mensaje'] = 'no existe el usuario';
            }
        }
        break;
    case 'GET':
    default:
        if (is_numeric($id_cliente)) {
            $dataCliente = $cliente->readOne($id_cliente);
        }else if (is_numeric($id_taller)) {
            $dataTaller = $taller->read();
            $dataTaller = json_encode($dataTaller);
            echo $dataTaller;
          // echo $dataTaller;
        } else {
            $dataCliente = $cliente->read();
            //$dataTaller = $taller->read();
        }
}

//$dataCliente = json_encode($dataCliente);
//$dataTaller = json_encode($dataTaller);
$dataCliente = json_encode($dataCliente);
//echo $dataCliente;
//echo $dataTaller;
echo $dataCliente;
?>