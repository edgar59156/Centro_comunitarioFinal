<?php 
    require_once('sistema.class.php');
    class Inicio extends Sistema{
        public function conteoUsuarios(){
        $this->connect();
        $sql = "SELECT count(*) as conteo FROM usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos[0]['conteo'];

        }
        public function conteoTaller(){
            $this->connect();
            $sql = "SELECT count(*) as conteo FROM taller";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos[0]['conteo'];
        }
        public function conteoEventos(){
            $this->connect();
            $sql = "SELECT count(*) as conteo FROM evento";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos[0]['conteo'];
        }
        public function conteoClientes(){
            $this->connect();
            $sql = "SELECT count(distinct id_usuario) as conteo FROM cliente";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos[0]['conteo'];
        }
        public function conteoTalleristas(){
            $this->connect();
            $sql = "SELECT count(distinct id_usuario) as conteo FROM tallerista";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos[0]['conteo'];
        }


    }
$inicio = new Inicio;
?>