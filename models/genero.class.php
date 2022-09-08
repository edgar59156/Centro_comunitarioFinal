<?php
require_once('sistema.class.php');
//require_once('usuario_genero.class.php');
class Genero extends Sistema
{
    public function readOne($id_genero)
    {
        $this->connect();
        $sql = "select * from genero where id_genero = :id_genero";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_genero', $id_genero, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        return $datos;
    }
    public function delete($id_genero)
    {
        $this->connect();
        $sql = "DELETE from genero where id_genero=:id_genero";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_genero', $id_genero, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
    }

    public function read()
    {
        $this->connect();
        $sql = "SELECT * from genero";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function create($datos)
    {
        $this->connect();
        $sql = "INSERT into genero (genero) values (:genero)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':genero', $datos['genero'], PDO::PARAM_STR);
        $rs = $stmt->execute();
        return $rs;
    }
    public function update($datos, $id_genero)
    {
        $this->connect();
    
            $sql = "UPDATE genero set genero=:genero
            where id_genero=:id_genero";
        
                                  
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':genero', $datos['genero'], PDO::PARAM_STR);
        $stmt->bindParam(':id_genero', $id_genero, PDO::PARAM_INT);
        
        $rs = $stmt->execute();

        return $rs;
        // print_r ($rs);
        //die();


    }

}

$genero = new Genero;


?>