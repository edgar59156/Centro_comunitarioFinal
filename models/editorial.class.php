<?php
require_once('sistema.class.php');
//require_once('usuario_editorial.class.php');
class Editorial extends Sistema
{
    public function readOne($id_editorial)
    {
        $this->connect();
        $sql = "select * from editorial where id_editorial = :id_editorial";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_editorial', $id_editorial, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        return $datos;
    }
    public function delete($id_editorial)
    {
        $this->connect();
        $sql = "DELETE from editorial where id_editorial=:id_editorial";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_editorial', $id_editorial, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
    }

    public function read()
    {
        $this->connect();
        $sql = "SELECT * from editorial";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function create($datos)
    {
        $this->connect();
        $sql = "INSERT into editorial (editorial) values (:editorial)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':editorial', $datos['editorial'], PDO::PARAM_STR);
        $rs = $stmt->execute();
        return $rs;
    }
    public function update($datos, $id_editorial)
    {
        $this->connect();
    
            $sql = "UPDATE editorial set editorial=:editorial
            where id_editorial=:id_editorial";
        
                                  
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':editorial', $datos['editorial'], PDO::PARAM_STR);
        $stmt->bindParam(':id_editorial', $id_editorial, PDO::PARAM_INT);
        
        $rs = $stmt->execute();

        return $rs;
        // print_r ($rs);
        //die();


    }

}

$editorial = new Editorial;


?>