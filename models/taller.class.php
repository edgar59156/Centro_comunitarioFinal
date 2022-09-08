<?php
require_once('sistema.class.php');

//require_once('taller_rol.class.php');




class Taller extends Sistema
{

    public $id_taller;
    public $taller;
    public $descripcion;
    public $horario_inicio;
    public $horaio_fin;
    public $fotografia;

    /**
     * Recuperar un arreglo de tallers
     *
     * @return  arreglo
     */
    public function read()
    {
        $this->connect();
        $sql = "SELECT  *  from taller";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function readTallerTallerista($id_usuario)
    {
        $this->connect();
        $sql = "select t.*,tt.* from taller t join taller_tallerista tt on t.id_taller = tt.id_taller where id_usuario = :id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    /**
     * Recuperar un taller
     *@integar id_taller
     * @return  self
     */
    public function readOne($id_taller)
    {
        $this->connect();
        $sql = "SELECT id_taller,taller,descripcion,horario_inicio,horario_fin,fotografia  from taller where id_taller = :id_taller";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_taller', $id_taller, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        return $datos;
    }

    
    /**
     * Crear un taller e insertarlo en la base de datos
     *
     * @return  boolean
     */

     
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
    public function register($datos){
                $this->connect();
                $this->con->beginTransaction();
                try{
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
                    if($stmt->rowcount()>0){
                        $sql = "SELECT * from taller where taller = :taller";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam(':taller', $datos['taller'],PDO::PARAM_STR);
                        $rs = $stmt -> execute();
                        $taller = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                        $sql = "INSERT into taller_tallerista (id_taller,id_usuario,id_salon,costo) 
                        values (:id_taller,:id_usuario,:id_salon,:costo)";
                        $stmt = $this->con->prepare($sql);
                        $stmt -> bindParam(':id_taller',$taller[0]['id_taller'],PDO::PARAM_INT);
                        $stmt->bindParam(':id_usuario', $datos['id_usuario'], PDO::PARAM_INT);
                        $stmt->bindParam(':id_salon', $datos['id_salon'], PDO::PARAM_INT);
                        $stmt->bindParam(':costo', $datos['costo'], PDO::PARAM_STR);
                        $stmt -> execute();
                        $this->con->commit();
                        return true;
                        }    
                }catch(Exception $e){
                    $this->con->rollback();
                    return false;
                }
        return false;
    }

    /**
     * Modificar los datos de un poenente
     *
     * @return  boolean
     */
  
    public function update($datos, $id_taller)
    {
        $this->connect();
        $archivo = $this->cargarImagen("fotografia", "../image/taller/");
        if (is_null($archivo)) {
        $sql = "UPDATE taller set taller=:taller ,descripcion=:descripcion ,horario_inicio=:horario_inicio ,
                                  horario_fin=:horario_fin 
                                  where id_taller=:id_taller";
        }else {
            $sql = "UPDATE taller set taller=:taller ,descripcion=:descripcion ,horario_inicio=:horario_inicio ,
                                  horario_fin=:horario_fin, fotografia=:fotografia
                                  where id_taller=:id_taller";
        }
                                  
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':taller', $datos['taller'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':horario_inicio', $datos['horario_inicio'], PDO::PARAM_STR);
        $stmt->bindParam(':horario_fin', $datos['horario_fin'], PDO::PARAM_STR);
        $stmt->bindParam(':id_taller', $id_taller, PDO::PARAM_INT);
        
        if (!is_null($archivo)) {
            $stmt->bindParam(':fotografia', $archivo, PDO::PARAM_STR);
        }
        $rs = $stmt->execute();

        return $rs;
        // print_r ($rs);
        //die();


    }


    /**
     * Eliminar un taller
     *
     * @return  boolean
     */
    
    public function delete($id_taller)
    {
        $this->connect();
        $sql = "delete from taller_tallerista where id_taller=:id_taller";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_taller', $id_taller, PDO::PARAM_INT);
        $rs = $stmt->execute();

        $this->connect();
        $sql = "delete from taller where id_taller=:id_taller";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_taller', $id_taller, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
    }

    public function credentials($correo){
        $_SESSION['correo'] = $correo;
        $this -> connect();
        $sql = "SELECT r.rol from rol r inner join taller_rol u on r.id_rol=u.id_rol INNER JOIN taller us on u.id_taller= us.id_taller where us.correo=:correo";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->execute();
        $datos = array();
        $_SESSION['roles'] = array();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($datos as $key => $value){
            array_push($_SESSION['roles'],$value['rol']);
        }
        $_SESSION['validado'] = true;
        
  
    }

   


    /**
     * Get the value of id_taller
     */ 
    public function getId_taller()
    {
        return $this->id_taller;
    }

    /**
     * Set the value of id_taller
     *
     * @return  self
     */ 
    public function setId_taller($id_taller)
    {
        $this->id_taller = $id_taller;

        return $this;
    }

    /**
     * Get the value of taller
     */ 
    public function getTaller()
    {
        return $this->taller;
    }

    /**
     * Set the value of taller
     *
     * @return  self
     */ 
    public function setTaller($taller)
    {
        $this->taller = $taller;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of horario_inicio
     */ 
    public function getHorario_inicio()
    {
        return $this->horario_inicio;
    }

    /**
     * Set the value of horario_inicio
     *
     * @return  self
     */ 
    public function setHorario_inicio($horario_inicio)
    {
        $this->horario_inicio = $horario_inicio;

        return $this;
    }

    /**
     * Get the value of horaio_fin
     */ 
    public function getHoraio_fin()
    {
        return $this->horaio_fin;
    }

    /**
     * Set the value of horaio_fin
     *
     * @return  self
     */ 
    public function setHoraio_fin($horaio_fin)
    {
        $this->horaio_fin = $horaio_fin;

        return $this;
    }

    /**
     * Get the value of fotografia
     */ 
    public function getFotografia()
    {
        return $this->fotografia;
    }

    /**
     * Set the value of fotografia
     *
     * @return  self
     */ 
    public function setFotografia($fotografia)
    {
        $this->fotografia = $fotografia;

        return $this;
    }
}
$taller = new Taller;
