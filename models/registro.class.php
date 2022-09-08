<?php 
    require_once('sistema.class.php');

    Class Registro extends Sistema{

        public function register($datos){
            if($this->validarCorreo($datos['correo'])){
                if(isset($datos['nombre']) && isset($datos['contrasena'])){
                    $this->connect();
                    $this->con->beginTransaction();
                    try{
                        $sql = "insert into usuario (correo, contrasena, nombre, primer_apellido, segundo_apellido, telefono) 
                                VALUES (:correo, :contrasena, :nombre, :primer_apellido, :segundo_apellido,:telefono)";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
                        $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
                        $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
                        $stmt->bindParam(':telefono', $datos['telefono'], PDO::PARAM_STR);
                        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
                        $datos['contrasena'] = md5($datos['contrasena']);
                        $stmt->bindParam(':contrasena', $datos['contrasena'], PDO::PARAM_STR);
                        $rs = $stmt->execute();
                        if($stmt->rowcount()>0){
                            $sql = "SELECT * from usuario where correo = :correo";
                            $stmt = $this->con->prepare($sql);
                            $stmt->bindParam(':correo', $datos['correo'],PDO::PARAM_STR);
                            $rs = $stmt -> execute();
                            $usuario = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                            $sql = "INSERT into usuario_rol(id_usuario,id_rol) values (:id_usuario,2)";
                            $stmt = $this->con->prepare($sql);
                            $stmt -> bindParam(':id_usuario',$usuario[0]['id_usuario'],PDO::PARAM_INT);
                            $stmt -> execute();
                            if($stmt->rowcount()>0){
                                $sql = "INSERT into cliente (id_usuario) 
                                values (:id_usuario)";
                                $stmt = $this->con->prepare($sql);
                                $stmt ->bindParam(':id_usuario', $usuario[0]['id_usuario'],PDO::PARAM_INT);
                                $rs = $stmt-> execute();
                                if($stmt->rowcount()>0){
                                    $this->sendMail($datos['correo'],"Bienvenido al Centro comunitario","Bienvenido al Centro comunitario");
                                    $this->con->commit();
                                    return true;
                                }
                            }
                            
                        }
                    }catch(Exception $e){
                        $this->con->rollback();
                        return false;
                    }
                }
            }
            return false;
        }
    }
$registro = New Registro;
