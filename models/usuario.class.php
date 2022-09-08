<?php
require_once('sistema.class.php');
//require_once('usuario_rol.class.php');




class Usuario extends Sistema
{

    public $id_usuario;
    public $correo;
    public $contrasena;
    public $primer_apellido;
    public $segundo_apellido;
    public $fotografia;
    public $telefono;

    /**
     * Recuperar un arreglo de ponentes
     *
     * @return  arreglo
     */
    public function read()
    {
        $this->connect();
        $sql = "SELECT  *  from usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }


    /**
     * Recuperar un ponente
     *@integar id_ponente
     * @return  self
     */
    public function readOne($id_usuario)
    {
        $this->connect();
        $sql = "SELECT id_usuario,correo,contrasena,nombre,primer_apellido,segundo_apellido,fotografia,telefono  from usuario where id_usuario = :id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        return $datos;
    }
    public function readOneCorreo($correo)
    {
        $this->connect();
        $sql = "SELECT *  from usuario where correo = :correo";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        return $datos;
    }



    /**
     * Crear un ponente e insertarlo en la base de datos
     *
     * @return  boolean
     */


    public function create($datos)
    {
        $this->connect();
        $sql = "insert into usuario (correo, contrasena, nombre, primer_apellido, segundo_apellido) 
        VALUES (:correo, :contrasena, :nombre, :primer_apellido, :segundo_apellido)";
        $stmt = $this->con->prepare($sql);

        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
        //$stmt->bindParam(':fotografia', $datos['fotografia'], PDO::PARAM_STR);
        //$stmt->bindParam(':telefono', $datos['telefono'], PDO::PARAM_STR);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $datos['contrasena'] = md5($datos['contrasena']);
        $stmt->bindParam(':contrasena', $datos['contrasena'], PDO::PARAM_STR);
        $rs = $stmt->execute();
        return $rs;
    }
    public function modificarPerfil($correo)
    {
        $this->connect();
        $sql = "SELECT * from usuario where correo =:correo";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        return $datos;
    }

    /**
     * Modificar los datos de un poenente
     *
     * @return  boolean
     */

    public function update($datos, $id_usuario)
    {
        
        $this->connect();

        $pdf = $this->cargarPDF("pdf", "../archivos/");

        if (is_null($pdf)) {

            $this->connect();
            $archivo = $this->cargarImagen("fotografia", "../image/usuario/");
            $usuarioRol = new UsuarioRol;
            require_once('usuario_rol.class.php');
           
            $rs = $usuarioRol->delete($id_usuario);
            if (isset($datos['roles'])) {
                foreach ($datos['roles'] as $key => $value) {
                    $usuarioRol->create($id_usuario, $value);
                }
            }

            if (is_null($archivo)) {
                $sql = "UPDATE usuario set correo=:correo,nombre=:nombre,primer_apellido=:primer_apellido,segundo_apellido=:segundo_apellido,telefono=:telefono
         where id_usuario=:id_usuario";
                if (strlen($datos['contrasena']) > 0) {
                    $sql = "UPDATE usuario set correo=:correo,contrasena=:contrasena,nombre=:nombre,primer_apellido=:primer_apellido,segundo_apellido=:segundo_apellido,telefono=:telefono
            where id_usuario=:id_usuario";
                }
            } else {
                $sql = "UPDATE usuario set correo=:correo,nombre=:nombre,primer_apellido=:primer_apellido,segundo_apellido=:segundo_apellido,telefono=:telefono,fotografia=:fotografia
         where id_usuario=:id_usuario";
                if (strlen($datos['contrasena']) > 0) {
                    $sql = "UPDATE usuario set correo=:correo,contrasena=:contrasena,nombre=:nombre,primer_apellido=:primer_apellido,segundo_apellido=:segundo_apellido,telefono=:telefono,fotografia=:fotografia
            where id_usuario=:id_usuario";
                }
            }

            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
            //$stmt->bindParam(':contrasena', $datos['contrasena'], PDO::PARAM_STR);
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $datos['telefono'], PDO::PARAM_STR);
            if (!is_null($archivo)) {
                $stmt->bindParam(':fotografia', $archivo, PDO::PARAM_STR);
            }
            if (strlen($datos['contrasena']) > 0) {
                $datos['contrasena'] = md5($datos['contrasena']);
                $stmt->bindParam(':contrasena', $datos['contrasena'], PDO::PARAM_STR);
            }

            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        } else {
            $this->connect();
            $sql = "UPDATE cliente set ine=:ine
                    where id_usuario=:id_usuario";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':ine', $pdf, PDO::PARAM_STR);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        }
    }
    public function update2($datos, $id_usuario)
    {
        
            $this->connect();

      
                $sql = "UPDATE usuario set correo=:correo,nombre=:nombre,primer_apellido=:primer_apellido,segundo_apellido=:segundo_apellido,telefono=:telefono
         where id_usuario=:id_usuario";

                if (strlen($datos['contrasena']) > 0) {
                    $sql = "UPDATE usuario set correo=:correo,contrasena=:contrasena,nombre=:nombre,primer_apellido=:primer_apellido,segundo_apellido=:segundo_apellido,telefono=:telefono
            where id_usuario=:id_usuario";
                }
             
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
            //$stmt->bindParam(':contrasena', $datos['contrasena'], PDO::PARAM_STR);
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $datos['telefono'], PDO::PARAM_STR);

            if (strlen($datos['contrasena']) > 0) {
                $datos['contrasena'] = md5($datos['contrasena']);
                $stmt->bindParam(':contrasena', $datos['contrasena'], PDO::PARAM_STR);
            }

            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        } 
    



    /**
     * Eliminar un ponente
     *
     * @return  boolean
     */

    public function delete($id_usuario)
    {
        $this->connect();
        $sql = "delete from cliente where id_usuario=:id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $rs = $stmt->execute();
        
        $this->connect();
        $sql = "delete from usuario where id_usuario=:id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
       
    }
    
    public function deleteWS($id_usuario)
    {
        $this->connect();
        $sql = "SELECT * from cliente where id_usuario = :id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $usuario = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $rs = $stmt -> execute();

        $this->connect();
        $sql = "delete from taller_cliente where id_cliente=:id_cliente";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_cliente', $usuario[0]['id_cliente'], PDO::PARAM_INT);
        $rs = $stmt->execute();       
    
        $this->connect();
        $sql = "delete from cliente where id_usuario=:id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $rs = $stmt->execute();
        
        $this->connect();
        $sql = "delete from usuario where id_usuario=:id_usuario";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
       
    }

    public function credentials($correo)
    {
        $_SESSION['correo'] = $correo;
        $this->connect();
        $sql = "SELECT r.rol from rol r inner join usuario_rol u on r.id_rol=u.id_rol INNER JOIN usuario us on u.id_usuario= us.id_usuario where us.correo=:correo";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->execute();
        $datos = array();
        $_SESSION['roles'] = array();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($datos as $key => $value) {
            array_push($_SESSION['roles'], $value['rol']);
        }
        $_SESSION['validado'] = true;
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
     * Get the value of primer_apellido
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
$usuario = new Usuario;
