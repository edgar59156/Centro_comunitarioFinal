<?php
require_once('sistema.class.php');


class Evento extends Sistema
{

    public $id_evento;
    public $evento;
    public $contrasena;
    public $primer_apellido;
    public $segundo_apellido;
    public $fotografia;
    public $telefono;

    /**
     * Recuperar un arreglo de eventos
     *
     * @return  arreglo
     */
    public function read()
    {
        $this->connect();
        $sql = "SELECT  *  from evento";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    /**
     * Recuperar un evento
     *@integar id_evento
     * @return  self
     */
    public function readOne($id_evento)
    {
        $this->connect();
        $sql = "SELECT *  from evento where id_evento = :id_evento";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        return $datos;
    }
    public function readEventoTallerista($id_usuario)
    {
        $this->connect();
        $sql = "select e.* from evento e
        where id_usuario = :id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function create($datos)
    {
        $this->connect();
        $archivo = $this->cargarImagen("fotografia", "../image/evento/");
        if (is_null($archivo)) {
        $sql = "INSERT into evento (evento, descripcion, horario_inicio, horario_fin,fecha,id_usuario,id_salon) 
        values (:evento, :descripcion, :horario_inicio, :horario_fin,:fecha,:id_usuario,:id_salon)";
        }else{
            $sql = "INSERT into evento (evento, descripcion, horario_inicio, horario_fin,fecha,id_usuario,id_salon,fotografia) 
            values (:evento, :descripcion, :horario_inicio, :horario_fin,:fecha,:id_usuario,:id_salon,:fotografia)";  
        }
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':evento', $datos['evento'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':horario_inicio', $datos['horario_inicio'], PDO::PARAM_STR);
        $stmt->bindParam(':horario_fin', $datos['horario_fin'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(':id_salon', $datos['id_salon'], PDO::PARAM_STR);
        $stmt->bindParam(':id_usuario', $datos['id_usuario'], PDO::PARAM_STR);
        if (!is_null($archivo)) {
            $stmt->bindParam(':fotografia', $archivo, PDO::PARAM_STR);
        }
        $rs = $stmt->execute();
        return $rs;
    }
    public function update($datos, $id_evento)
    {
        $this->connect();
        $archivo = $this->cargarImagen("fotografia", "image/evento/");
        if (is_null($archivo)) {
        $sql = "UPDATE evento set evento=:evento ,descripcion=:descripcion ,fecha=:fecha ,
                                  horario_inicio=:horario_inicio ,horario_fin=:horario_fin ,id_salon=:id_salon ,id_usuario=:id_usuario
                                  where id_evento=:id_evento";
        }else {
            $sql = "UPDATE evento set evento=:evento ,descripcion=:descripcion ,fecha=:fecha ,
                                  horario_inicio=:horario_inicio ,horario_fin=:horario_fin ,id_salon=:id_salon ,id_usuario=:id_usuario, fotografia=:fotografia
                                  where id_evento=:id_evento";
        }
                                  
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':evento', $datos['evento'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(':horario_inicio', $datos['horario_inicio'], PDO::PARAM_STR);
        $stmt->bindParam(':horario_fin', $datos['horario_fin'], PDO::PARAM_STR);
        $stmt->bindParam(':id_salon', $datos['id_salon'], PDO::PARAM_INT);
        $stmt->bindParam(':id_usuario', $datos['id_usuario'], PDO::PARAM_INT);
        $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
        
        if (!is_null($archivo)) {
            $stmt->bindParam(':fotografia', $archivo, PDO::PARAM_STR);
        }
        $rs = $stmt->execute();

        return $rs;
    }
    public function updateTallerista($datos, $id_evento)
    {
        $this->connect();
        $archivo = $this->cargarImagen("fotografia", "image/evento/");
        if (is_null($archivo)) {
        $sql = "UPDATE evento set evento=:evento ,descripcion=:descripcion ,fecha=:fecha ,
                                  horario_inicio=:horario_inicio ,horario_fin=:horario_fin ,id_salon=:id_salon
                                  where id_evento=:id_evento";
        }else {
            $sql = "UPDATE evento set evento=:evento ,descripcion=:descripcion ,fecha=:fecha ,
                                  horario_inicio=:horario_inicio ,horario_fin=:horario_fin ,id_salon=:id_salon, fotografia=:fotografia
                                  where id_evento=:id_evento";
        }
                                  
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':evento', $datos['evento'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(':horario_inicio', $datos['horario_inicio'], PDO::PARAM_STR);
        $stmt->bindParam(':horario_fin', $datos['horario_fin'], PDO::PARAM_STR);
        $stmt->bindParam(':id_salon', $datos['id_salon'], PDO::PARAM_INT);
        $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
        
        if (!is_null($archivo)) {
            $stmt->bindParam(':fotografia', $archivo, PDO::PARAM_STR);
        }
        $rs = $stmt->execute();

        return $rs;
    }
    public function delete($id_evento)
    {
        $this->connect();
        $sql = "delete from evento where id_evento=:id_evento";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
    }
    /**
     * Get the value of contrasena
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set the value of contrasena
     *
     * @return  self
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get the value of correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getPrimer_apellido()
    {
        return $this->primer_apellido;
    }

    /**
     * Set the value of primer_apellido
     *
     * @return  self
     */ 
    public function setPrimer_apellido($primer_apellido)
    {
        $this->primer_apellido = $primer_apellido;

        return $this;
    }

    /**
     * Get the value of segundo_apellido
     */ 
    public function getSegundo_apellido()
    {
        return $this->segundo_apellido;
    }

    /**
     * Set the value of segundo_apellido
     *
     * @return  self
     */ 
    public function setSegundo_apellido($segundo_apellido)
    {
        $this->segundo_apellido = $segundo_apellido;

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

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
}
$evento = new Evento;
