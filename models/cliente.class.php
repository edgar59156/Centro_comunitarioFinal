<?php
require_once('sistema.class.php');
//require_once('usuario_rol.class.php');
class Cliente extends Sistema
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
        u.telefono,c.ine
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
          join usuario u on c.id_usuario = u.id_usuario group by c.id_usuario;";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    
    public function readOneUsuario($id_usuario)
    {
        $this->connect();
        $sql = "SELECT * from cliente c where c.id_usuario =:id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario , PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

}

$cliente = new Cliente;


?>