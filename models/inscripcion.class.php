<?php
require_once('sistema.class.php');

class Inscripcion extends Sistema
{
    // Declaración de una propiedad
    public $id_evento;
    public $evento;
    public $nombre;
    public $fecha_inicio;
    public $fecha_fin;
    public $conferencias;
    public $conferencistas;
    public $participantes;


    

    public function inscritosTaller($id_taller){
        $this->connect();
        $sql="
        SELECT c.id_cliente, u.nombre, u.primer_apellido, u.segundo_apellido
        from taller_cliente tc  join cliente c on c.id_cliente = tc.id_cliente
            join usuario u on u.id_usuario = c.id_usuario where tc.id_taller =:id_taller
        order by  c.id_cliente;";
        $stmt=$this->con->prepare($sql);
        $stmt->bindParam(':id_taller',$id_taller,PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function inscritosEvento($id_evento){
        $this->connect();
        $sql="
        SELECT c.id_cliente, u.nombre, u.primer_apellido, u.segundo_apellido
        from evento_cliente ec  join cliente c on c.id_cliente = ec.id_cliente
        join usuario u on u.id_usuario = c.id_usuario where ec.id_evento =:id_evento
        order by  c.id_cliente";
        $stmt=$this->con->prepare($sql);
        $stmt->bindParam(':id_evento',$id_evento,PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function conferencias_en_evento($id_evento){
        $this->connect();
        $sql = "SELECT c.id_conferencia,c.titulo,c.sinopsis,c.imagen,c.id_ponente from conferencia c right join conferencia_programacion cp on c.id_conferencia=cp.id_conferencia WHERE cp.id_evento =:id_evento;";
        $stmt=$this->con->prepare($sql);
        $stmt->bindParam(':id_evento',$id_evento,PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function talleresDisponiblesCliente($id_cliente){
        $this->connect();
        $sql = " select t.* from taller_cliente tc join taller t on t.id_taller = tc.id_taller where tc.id_cliente =:id_cliente";
        $stmt=$this->con->prepare($sql);
        $stmt->bindParam(':id_cliente',$id_cliente,PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function eventosDisponiblesCliente($id_cliente){
        $this->connect();
        $sql = " select e.* from evento_cliente ec join evento e on e.id_evento = ec.id_evento where ec.id_cliente =:id_cliente";
        $stmt=$this->con->prepare($sql);
        $stmt->bindParam(':id_cliente',$id_cliente,PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function eliminarDeTaller($id_taller,$id_cliente){
        $this->connect();
        $sql = "DELETE FROM taller_cliente 
        WHERE id_taller =:id_taller AND id_cliente =:id_cliente";
        $stmt=$this->con->prepare($sql);
        $stmt->bindParam(':id_taller',$id_taller,PDO::PARAM_INT);
        $stmt->bindParam(':id_cliente',$id_cliente,PDO::PARAM_INT);
        $rs = $stmt->execute();
        //$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function eliminarDeEvento($id_evento,$id_cliente){
        $this->connect();
        $sql = "DELETE FROM evento_cliente
        WHERE id_evento =:id_evento AND id_cliente =:id_cliente";
        $stmt=$this->con->prepare($sql);
        $stmt->bindParam(':id_evento',$id_evento,PDO::PARAM_INT);
        $stmt->bindParam(':id_cliente',$id_cliente,PDO::PARAM_INT);
        $rs = $stmt->execute();
        //$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function eliminar_conferencia($id_conferencia,$id_evento){
        $this->connect();
        $sql = "DELETE FROM conferencia_programacion 
                WHERE id_evento =:id_evento AND id_conferencia =:id_conferencia";
        $stmt=$this->con->prepare($sql);
        $stmt->bindParam(':id_conferencia',$id_conferencia,PDO::PARAM_INT);
        $stmt->bindParam(':id_evento',$id_evento,PDO::PARAM_INT);
        $rs = $stmt->execute();
        //$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function participantes_disponinblesTaller(){
        $this->connect();
        $sql = "SELECT c.id_cliente, u.nombre, u.primer_apellido, u.segundo_apellido
        from usuario u  join cliente c on u.id_usuario = c.id_usuario
        left join taller_cliente tc on c.id_cliente = tc.id_cliente where tc.id_cliente is null;";
        $stmt=$this->con->prepare($sql);
        $rs = $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function participantes_disponinblesEvento(){
        $this->connect();
        $sql = "SELECT c.id_cliente, u.nombre, u.primer_apellido, u.segundo_apellido
        from usuario u  join cliente c on u.id_usuario = c.id_usuario
        left join evento_cliente ec on c.id_cliente = ec.id_cliente where ec.id_cliente is null;";
        $stmt=$this->con->prepare($sql);
        $rs = $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function conferencias_disponinbles(){
        $this->connect();
        $sql = "SELECT c.id_conferencia,c.titulo,c.sinopsis,c.imagen,c.id_ponente from conferencia c left join conferencia_programacion cp on c.id_conferencia=cp.id_conferencia WHERE cp.id_conferencia is null ;";
        $stmt=$this->con->prepare($sql);
        $rs = $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
  
  
    /**
     * Recuperar un arreglo de ponentes
     *
     * @return  arreglo
     */
    /*
    public function readTaller()
    {
        $this->connect();
        $sql = "SELECT * from vw_talleres";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    */public function readTaller()
    {
        $this->connect();
        $sql = "SELECT
        `t`.`id_taller` AS `id_taller`,
        `t`.`taller` AS `taller`,
        `t`.`horario_inicio` AS `horario_inicio`,
        `t`.`horario_fin` AS `horario_fin`,
        `t`.`fotografia` AS `fotografia`,
        CONCAT(`u`.`nombre`, ' ', `u`.`primer_apellido`) AS `instructor`,
        COALESCE(COUNT(DISTINCT `c`.`id_usuario`),
        0) AS `usuarios_inscritos`
    FROM
        (
            (
                (
                    (
                        `centro_comunitario`.`usuario` `u`
                    JOIN `centro_comunitario`.`taller_tallerista` `tt`
                    ON
                        (`u`.`id_usuario` = `tt`.`id_usuario`)
                    )
                LEFT JOIN `centro_comunitario`.`taller` `t`
                ON
                    (`t`.`id_taller` = `tt`.`id_taller`)
                )
            LEFT JOIN `centro_comunitario`.`taller_cliente` `tc`
            ON
                (`t`.`id_taller` = `tc`.`id_taller`)
            )
        LEFT JOIN `centro_comunitario`.`cliente` `c`
        ON
            (`c`.`id_cliente` = `tc`.`id_cliente`)
        )
    GROUP BY
        `t`.`id_taller`";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function readOneTaller($id_taller)
    {
        $this->connect();
        $sql = "SELECT
        `t`.`id_taller` AS `id_taller`,
        `t`.`taller` AS `taller`,
        `t`.`horario_inicio` AS `horario_inicio`,
        `t`.`horario_fin` AS `horario_fin`,
        `t`.`fotografia` AS `fotografia`,
       `tt`.`costo` AS `costo`,
        CONCAT(`u`.`nombre`, ' ', `u`.`primer_apellido`) AS `instructor`,
        COALESCE(COUNT(DISTINCT `c`.`id_usuario`),
        0) AS `usuarios_inscritos`
    FROM
        (
            (
                (
                    (
                        `centro_comunitario`.`usuario` `u`
                    JOIN `centro_comunitario`.`taller_tallerista` `tt`
                    ON
                        (`u`.`id_usuario` = `tt`.`id_usuario`)
                    )
                LEFT JOIN `centro_comunitario`.`taller` `t`
                ON
                    (`t`.`id_taller` = `tt`.`id_taller`)
                )
            LEFT JOIN `centro_comunitario`.`taller_cliente` `tc`
            ON
                (`t`.`id_taller` = `tc`.`id_taller`)
            )
        LEFT JOIN `centro_comunitario`.`cliente` `c`
        ON
            (`c`.`id_cliente` = `tc`.`id_cliente`)
        ) WHERE t.id_taller=:id_taller
    GROUP BY
        `t`.`id_taller`";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_taller',$id_taller,PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function readEvento()
    {
        $this->connect();
        $sql = "select `e`.`id_evento`                                  AS `id_evento`,
        `e`.`evento`                                     AS `evento`,
        `e`.`fecha`                                      AS `fecha`,
        `e`.`horario_inicio`                             AS `horario_inicio`,
        `e`.`horario_fin`                                AS `horario_fin`,
        `e`.`fotografia`                                 AS `fotografia`,
        concat(`u`.`nombre`, ' ', `u`.`primer_apellido`) AS `impartido_por`,
        coalesce(count(distinct `ec`.`id_cliente`), 0)   AS `usuarios_inscritos`
 from ((`centro_comunitario`.`evento` `e` join `centro_comunitario`.`usuario` `u` on (`e`.`id_usuario` = `u`.`id_usuario`))
          left join `centro_comunitario`.`evento_cliente` `ec` on (`e`.`id_evento` = `ec`.`id_evento`))
 group by `e`.`id_evento`;";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    public function readOneEvento($id_evento)
    {
        $this->connect();
        $sql = "select `e`.`id_evento`                                  AS `id_evento`,
        `s`.`salon`                                  AS `salon`,
        `e`.`id_salon`                                  AS `id_salon`,
         `e`.`evento`                                     AS `evento`,
         `e`.`fecha`                                      AS `fecha`,
         `e`.`horario_inicio`                             AS `horario_inicio`,
         `e`.`horario_fin`                                AS `horario_fin`,
         `e`.`fotografia`                                 AS `fotografia`,
         concat(`u`.`nombre`, ' ', `u`.`primer_apellido`) AS `impartido_por`,
         coalesce(count(distinct `ec`.`id_cliente`), 0)   AS `usuarios_inscritos`
  from ((`centro_comunitario`.`evento` `e` join `centro_comunitario`.`usuario` `u` on (`e`.`id_usuario` = `u`.`id_usuario`))
           left join `centro_comunitario`.`evento_cliente` `ec` on (`e`.`id_evento` = `ec`.`id_evento`)) join salon s on  (`e`.`id_salon` = `s`.`id_salon`) where e.id_evento =:id_evento
  group by `e`.`id_evento`;";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_evento',$id_evento,PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function agregarEnTaller($id_taller,$id_cliente)
    {
        $this->connect();
        $sql = "insert into taller_cliente (id_taller, id_cliente) values (:id_taller,:id_cliente)";
        $stmt=$this->con->prepare($sql);
        $stmt->bindParam(':id_taller',$id_taller,PDO::PARAM_INT);
        $stmt->bindParam(':id_cliente',$id_cliente,PDO::PARAM_INT);
        $rs = $stmt->execute();
    }
    public function agregarEnEvento($id_evento,$id_cliente)
    {
        $this->connect();
        $sql = "insert into evento_cliente (id_evento, id_cliente) values (:id_evento,:id_cliente)";
        $stmt=$this->con->prepare($sql);
        $stmt->bindParam(':id_evento',$id_evento,PDO::PARAM_INT);
        $stmt->bindParam(':id_cliente',$id_cliente,PDO::PARAM_INT);
        $rs = $stmt->execute();
    }
    public function agregar_conferencia($id_evento,$id_conferencia)
    {
        $this->connect();
        $sql = "INSERT INTO conferencia_programacion (id_conferencia,id_evento) values (:id_conferencia,:id_evento)";
        $stmt=$this->con->prepare($sql);
        $stmt->bindParam(':id_evento',$id_evento,PDO::PARAM_INT);
        $stmt->bindParam(':id_conferencia',$id_conferencia,PDO::PARAM_INT);
        $rs = $stmt->execute();
    }

    /**
     * Recuperar un ponente
     *@integar id_ponente
     * @return  self
     */
    public function readOne($id_ponente)
    {
        $this->connect();
        $sql = "SELECT *,p.id_ponente,concat(p.nombre,' ',p.primer_apellido) as nombre_completo,t.tipo,p.fotografia from ponente p inner join tipo t on p.id_tipo=t.id_tipo where p.id_ponente = :id_ponente";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_ponente', $id_ponente, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos=(isset($datos[0]))?$datos[0]:null;
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
        $archivo = $this->cargarImagen("fotografia", "image/ponentes/");
        if (is_null($archivo)) {
            $sql = "INSERT into ponente (nombre,primer_apellido,segundo_apellido,tratamiento,correo,resumen,id_tipo) values (:nombre,:primer_apellido,:segundo_apellido,:tratamiento,:correo,:resumen,:id_tipo)";
        } else {
            $sql = "INSERT into ponente (nombre,primer_apellido,segundo_apellido,tratamiento,correo,resumen,id_tipo,fotografia) values (:nombre,:primer_apellido,:segundo_apellido,:tratamiento,:correo,:resumen,:id_tipo,:fotografia)";
        }
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_tipo', $datos['id_tipo'], PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':tratamiento', $datos['tratamiento'], PDO::PARAM_STR);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':resumen', $datos['resumen'], PDO::PARAM_STR);
        if (!is_null($archivo)) {
            $stmt->bindParam(':fotografia', $archivo, PDO::PARAM_STR);
        }

        $rs = $stmt->execute();
        return $rs;
    }

    /**
     * Modificar los datos de un poenente
     *
     * @return  boolean
     */
    public function update($datos, $id_ponente)
    {
        $this->connect();
        $archivo = $this->cargarImagen("fotografia", "image/ponentes/");
        if (is_null($archivo)) {
        $sql = "UPDATE ponente set nombre=:nombre ,primer_apellido=:primer_apellido ,segundo_apellido=:segundo_apellido ,
                                  tratamiento=:tratamiento ,correo=:correo ,resumen=:resumen ,id_tipo=:id_tipo
                                  where id_ponente=:id_ponente";
        }else {
            $sql = "UPDATE ponente set nombre=:nombre ,primer_apellido=:primer_apellido ,segundo_apellido=:segundo_apellido ,
                                  tratamiento=:tratamiento ,correo=:correo ,resumen=:resumen ,id_tipo=:id_tipo, fotografia=:fotografia
                                  where id_ponente=:id_ponente";
        }
                                  
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':tratamiento', $datos['tratamiento'], PDO::PARAM_STR);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':resumen', $datos['resumen'], PDO::PARAM_STR);
        $stmt->bindParam(':id_tipo', $datos['id_tipo'], PDO::PARAM_INT);
        $stmt->bindParam(':id_ponente', $id_ponente, PDO::PARAM_INT);
        
        if (!is_null($archivo)) {
            $stmt->bindParam(':fotografia', $archivo, PDO::PARAM_STR);
        }
        $rs = $stmt->execute();

        return $rs;
        // print_r ($rs);
        //die();


    }
    /**
     * Eliminar un ponente
     *
     * @return  boolean
     */
    public function delete($id_ponente)
    {
        $this->connect();
        $sql = "delete from ponente where id_ponente=:id_ponente";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_ponente', $id_ponente, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
    }

    /**
     * Get the value of id_evento
     */ 
    public function getId_evento()
    {
        return $this->id_evento;
    }

    /**
     * Set the value of id_evento
     *
     * @return  self
     */ 
    public function setId_evento($id_evento)
    {
        $this->id_evento = $id_evento;

        return $this;
    }

    /**
     * Get the value of evento
     */ 
    public function getEvento()
    {
        return $this->evento;
    }

    /**
     * Set the value of evento
     *
     * @return  self
     */ 
    public function setEvento($evento)
    {
        $this->evento = $evento;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of fecha_inicio
     */ 
    public function getFecha_inicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set the value of fecha_inicio
     *
     * @return  self
     */ 
    public function setFecha_inicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    /**
     * Get the value of fecha_fin
     */ 
    public function getFecha_fin()
    {
        return $this->fecha_fin;
    }

    /**
     * Set the value of fecha_fin
     *
     * @return  self
     */ 
    public function setFecha_fin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;

        return $this;
    }

    /**
     * Get the value of conferencias
     */ 
    public function getConferencias()
    {
        return $this->conferencias;
    }

    /**
     * Set the value of conferencias
     *
     * @return  self
     */ 
    public function setConferencias($conferencias)
    {
        $this->conferencias = $conferencias;

        return $this;
    }

    /**
     * Get the value of conferencistas
     */ 
    public function getConferencistas()
    {
        return $this->conferencistas;
    }

    /**
     * Set the value of conferencistas
     *
     * @return  self
     */ 
    public function setConferencistas($conferencistas)
    {
        $this->conferencistas = $conferencistas;

        return $this;
    }

    /**
     * Get the value of participantes
     */ 
    public function getParticipantes()
    {
        return $this->participantes;
    }

    /**
     * Set the value of participantes
     *
     * @return  self
     */ 
    public function setParticipantes($participantes)
    {
        $this->participantes = $participantes;

        return $this;
    }
}

$inscripcion = new Inscripcion;

