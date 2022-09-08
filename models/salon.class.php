<?php
require_once('sistema.class.php');
//require_once('usuario_salon.class.php');
class Salon extends Sistema
{
    public function readOne($id_salon)
    {
        $this->connect();
        $sql = "select * from salon where id_salon = :id_salon";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_salon', $id_salon, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        return $datos;
    }
    public function delete($id_salon)
    {
        $this->connect();
        $sql = "DELETE from salon where id_salon=:id_salon";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_salon', $id_salon, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
    }

    public function read()
    {
        $this->connect();
        $sql = "SELECT * from salon";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function create($datos)
    {
        $this->connect();
        $sql = "INSERT into salon (salon) values (:salon)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':salon', $datos['salon'], PDO::PARAM_STR);
        $rs = $stmt->execute();
        return $rs;
    }
    public function update($datos, $id_salon)
    {
        $this->connect();
    
            $sql = "UPDATE salon set salon=:salon
            where id_salon=:id_salon";
        
                                  
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':salon', $datos['salon'], PDO::PARAM_STR);
        $stmt->bindParam(':id_salon', $datos, PDO::PARAM_INT);
        
        $rs = $stmt->execute();

        return $rs;
        // print_r ($rs);
        //die();


    }

}

$salon = new Salon;


?>