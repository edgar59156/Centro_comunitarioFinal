<?php
require_once('sistema.class.php');
//require_once('usuario_rol.class.php');




class Libro extends Sistema
{

    public $id_libro;
    public $libro;
    public $id_editorial;
    public $id_genero;
    public $edicion;
    public $descripcion;
    public $imagen;

    /**
     * Recuperar un arreglo de ponentes
     *
     * @return  arreglo
     */
    public function read()
    {
        $this->connect();
        $sql = "select l.*,e.*,g.* from libro l
        join editorial e on e.id_editorial = l.id_editorial
        join genero g on g.id_genero = l.id_genero";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function readGenero()
    {
        $this->connect();
        $sql = "select * from genero";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function readEditorial()
    {
        $this->connect();
        $sql = "select * from editorial";
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
    public function readOne($id_libro)
    {
        $this->connect();
        $sql = "SELECT * from libro where id_libro =:id_libro";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_libro', $id_libro, PDO::PARAM_INT);
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
        

        $archivo = $this->cargarImagen("imagen", "../image/libro/");
        if (is_null($archivo)) {
            $sql = "insert into libro (libro, id_editorial, id_genero, edicion, descripcion)
        VALUES (:libro, :id_editorial, :id_genero, :edicion, :descripcion)";
            }
         else {
            $sql = "insert into libro (libro, id_editorial, id_genero, edicion, descripcion,imagen)
        VALUES (:libro, :id_editorial, :id_genero, :edicion, :descripcion,:imagen)";
        }
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':libro', $datos['libro'], PDO::PARAM_STR);
        $stmt->bindParam(':id_editorial', $datos['id_editorial'], PDO::PARAM_INT);
        $stmt->bindParam(':id_genero', $datos['id_genero'], PDO::PARAM_INT);
        $stmt->bindParam(':edicion', $datos['edicion'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        if (!is_null($archivo)) {
            $stmt->bindParam(':imagen', $archivo, PDO::PARAM_STR);
        }
        $rs = $stmt->execute();
        return $rs;
    }

    /**
     * Modificar los datos de un poenente
     *
     * @return  boolean
     */
     
    public function update($datos, $id_libro)
    {
        /*
        require_once('usuario_rol.class.php');
        $usuarioRol = new UsuarioRol;
        $rs = $usuarioRol->delete($id_usuario);
        if (isset($datos['roles'])) {
            foreach ($datos['roles'] as $key => $value) {
                $usuarioRol->create($id_usuario, $value);
            }
        }
        */

        $this->connect();
        $archivo = $this->cargarImagen("imagen", "../image/libro/");
        if (is_null($archivo)) {
            $sql = "UPDATE libro set libro=:libro, id_editorial=:id_editorial,id_genero=:id_genero,edicion=:edicion,descripcion=:descripcion 
            where id_libro=:id_libro";
            }
         else {
            $sql = "UPDATE libro set libro=:libro, id_editorial=:id_editorial,id_genero=:id_genero,edicion=:edicion,descripcion=:descripcion,imagen=:imagen 
            where id_libro=:id_libro";  
        }
        
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':libro', $datos['libro'], PDO::PARAM_STR);
        $stmt->bindParam(':id_editorial', $datos['id_editorial'], PDO::PARAM_INT);
        $stmt->bindParam(':id_genero', $datos['id_genero'], PDO::PARAM_INT);
        $stmt->bindParam(':edicion', $datos['edicion'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':id_libro', $id_libro, PDO::PARAM_INT);
        if (!is_null($archivo)) {
            $stmt->bindParam(':imagen', $archivo, PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->rowCount();
    }


    /**
     * Eliminar un ponente
     *
     * @return  boolean
     */
     
    public function delete($id_libro)
    {
        $this->connect();
        $sql = "delete from libro where id_libro=:id_libro";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_libro', $id_libro, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
    }

    public function credentials($correo){
        $_SESSION['correo'] = $correo;
        $this -> connect();
        $sql = "SELECT r.rol from rol r inner join usuario_rol u on r.id_rol=u.id_rol INNER JOIN usuario us on u.id_usuario= us.id_usuario where us.correo=:correo";
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
     * Get the value of id_libro
     */ 
    public function getId_libro()
    {
        return $this->id_libro;
    }

    /**
     * Set the value of id_libro
     *
     * @return  self
     */ 
    public function setId_libro($id_libro)
    {
        $this->id_libro = $id_libro;

        return $this;
    }

    /**
     * Get the value of libro
     */ 
    public function getLibro()
    {
        return $this->libro;
    }

    /**
     * Set the value of libro
     *
     * @return  self
     */ 
    public function setLibro($libro)
    {
        $this->libro = $libro;

        return $this;
    }

    /**
     * Get the value of id_editorial
     */ 
    public function getId_editorial()
    {
        return $this->id_editorial;
    }

    /**
     * Set the value of id_editorial
     *
     * @return  self
     */ 
    public function setId_editorial($id_editorial)
    {
        $this->id_editorial = $id_editorial;

        return $this;
    }

    /**
     * Get the value of id_genero
     */ 
    public function getId_genero()
    {
        return $this->id_genero;
    }

    /**
     * Set the value of id_genero
     *
     * @return  self
     */ 
    public function setId_genero($id_genero)
    {
        $this->id_genero = $id_genero;

        return $this;
    }

    /**
     * Get the value of edicion
     */ 
    public function getEdicion()
    {
        return $this->edicion;
    }

    /**
     * Set the value of edicion
     *
     * @return  self
     */ 
    public function setEdicion($edicion)
    {
        $this->edicion = $edicion;

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
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }
}
$libro = New Libro;
