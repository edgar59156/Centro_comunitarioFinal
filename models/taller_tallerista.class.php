<?php
require_once('sistema.class.php');
//require_once('usuario_rol.class.php');
class TallerTallerista extends Sistema
{
    public function readOne($id_cliente)
    {
        $this->connect();
        $sql = "select c.id_cliente,
        c.id_usuario,
        u.id_usuario,
        u.correo,
        u.nombre,
        u.primer_apellido,
        u.segundo_apellido,
        u.telefono
 from cliente c
          join usuario
          join usuario u on c.id_usuario = u.id_usuario where c.id_cliente =:id_cliente group by c.id_usuario;";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        return $datos;
    }

    public function read()
    {
        $this->connect();
        $sql = "SELECT  u.id_usuario,u.nombre, u.primer_apellido, u.segundo_apellido,tt.tratamiento
        from usuario u join tallerista tt on u.id_usuario = tt.id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function create($datos)
    {
        $this->connect();
        $archivo = $this->cargarImagen("fotografia", "../image/taller/");
        if (is_null($archivo)) {
        $sql = "INSERT into taller (taller,descripcion,horario_inicio,horario_fin) values (:taller,:descripcion,:horario_inicio,:horario_fin)";
        }else{
            $sql = "INSERT into taller (taller,descripcion,horario_inicio,horario_fin,fotografia) values (:taller,:descripcion,:horario_inicio,:horario_fin,:fotografia)";  
        }
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':taller', $datos['taller'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':horario_inicio', $datos['horario_inicio'], PDO::PARAM_STR);
        $stmt->bindParam(':horario_fin', $datos['horario_fin'], PDO::PARAM_STR);
        if (!is_null($archivo)) {
            $stmt->bindParam(':fotografia', $archivo, PDO::PARAM_STR);
        }
        $rs = $stmt->execute();
        return $rs;
    }
}

$tallerTallerista = new TallerTallerista;


?>