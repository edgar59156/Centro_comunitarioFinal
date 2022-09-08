<?php
require_once('sistema.class.php');


class Reporte extends Sistema
{
    public function listaEvento($id_evento)
    {
        $this->connect();
        $sql = "SELECT * from evento where id_evento = :id_evento";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        if (!is_null($datos)) {
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
               left join `centro_comunitario`.`evento_cliente` `ec` on (`e`.`id_evento` = `ec`.`id_evento`)) join salon s on  (`e`.`id_salon` = `s`.`id_salon`) 
               where e.id_evento =:id_evento
      group by `e`.`id_evento`;";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
            $stmt->execute();
            $evento = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $sql = "SELECT u.nombre,u.primer_apellido,u.segundo_apellido from usuario u 
                    join cliente c on u.id_usuario = c.id_usuario 
                    join evento_cliente ec on c.id_cliente = ec.id_cliente where id_evento =:id_evento; ";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
            $stmt->execute();
            $participantes = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            $content = include ('../views/reporte/lista.php');            
        }
        else{
        $content = 'No se puede mostrar el reporte';
        }
        return $content;
    }
    public function listaTaller($id_taller)
    {
        $this->connect();
        $sql = "SELECT * from taller where id_taller = :id_taller";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_taller', $id_taller, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        if (!is_null($datos)) {
            $sql = "SELECT
            `t`.`id_taller` AS `id_taller`,
            `t`.`taller` AS `taller`,
            `t`.`horario_inicio` AS `horario_inicio`,
            `t`.`horario_fin` AS `horario_fin`,
            `t`.`fotografia` AS `fotografia`,
            `t`.`descripcion` AS `descripcion`,
           `tt`.`costo` AS `costo`,
            CONCAT(`u`.`nombre`, ' ', `u`.`primer_apellido`) AS `impartido_por`,
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
            ) WHERE t.id_taller=1
        GROUP BY
            `t`.`id_taller`";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id_taller', $id_taller, PDO::PARAM_INT);
            $stmt->execute();
            $taller = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $sql = "SELECT u.nombre,u.primer_apellido,u.segundo_apellido from usuario u 
                    join cliente c on u.id_usuario = c.id_usuario 
                    join taller_cliente ec on c.id_cliente = ec.id_cliente where id_taller =:id_taller; ";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id_taller', $id_taller, PDO::PARAM_INT);
            $stmt->execute();
            $participantes = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            $content = include ('../views/reporte/listaTaller.php');            
        }
        else{
        $content = 'No se puede mostrar el reporte';
        }
        return $content;
    }
}

$reporte = new Reporte;
