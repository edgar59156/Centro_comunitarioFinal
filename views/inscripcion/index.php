
    <h1>Inscripciones para talleres</h1>
    <a href="/centro_comunitario/panel/taller.php?accion=new" class="btn btn-primary">Nuevo taller</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">taller</th>
                <th scope="col">Horario de inicio</th>
                <th scope="col">Horario de fin</th>
                <th scope="col">fotografia</th>
                <th scope="col">instructor</th>
                <th scope="col">Personas inscritas</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datosTaller as $key => $dato) :
            ?>
                <tr>
                    <th scope="row"><?php echo $dato['id_taller'] ?></th>
                    <td><?php echo $dato['taller'] ?></td>
                    <td><?php echo $dato['horario_inicio'] ?></td>
                    <td><?php echo $dato['horario_fin'] ?></td>
                    <td>
                        <div class="text-center">
                            <img src="../image/taller/<?php echo $dato['fotografia']; ?>" class="img-thumbnail" width="200" height="117" alt="...">
                        </div>
                    </td>
                    <td><?php echo $dato['instructor'] ?></td>
                    <td><?php echo $dato['usuarios_inscritos'] ?></td>
                    <td>
                        <ul>
                        <li style="list-style: none;"><a class="btn btn-success bi bi-pencil"  href="inscripcion.php?accion=inscribirTaller&id_taller=<?php echo $dato['id_taller']; ?>" style="color: black;">Inscribir</a></li>
                        <li style="list-style: none;"><a class="btn btn-primary bi bi-pencil"  href="reporte.php?accion=listaTaller&id_taller=<?php echo $dato['id_taller']; ?>" style="color: black;">Reporte</a></li>
                        </ul>
                    </td>
                </tr>
            <?php
            endforeach
            ?>
        </tbody>
    </table>

    <h1>Inscripciones para Eventos</h1>
    <a href="/centro_comunitario/panel/taller.php?accion=new" class="btn btn-primary">Nuevo Evento</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Evento</th>
                <th scope="col">fecha</th>
                <th scope="col">Horario de inicio</th>
                <th scope="col">Horario de fin</th>
                <th scope="col">fotografia</th>
                <th scope="col">Impartido por</th>
                <th scope="col">Personas inscritas</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datosEvento as $key => $dato) :
            ?>
                <tr>
                    <th scope="row"><?php echo $dato['id_evento'] ?></th>
                    <td><?php echo $dato['evento'] ?></td>
                    <td><?php echo $dato['fecha'] ?></td>
                    <td><?php echo $dato['horario_inicio'] ?></td>
                    <td><?php echo $dato['horario_fin'] ?></td>
                    <td>
                        <div class="text-center">
                            <img src="../image/evento/<?php echo $dato['fotografia']; ?>" class="img-thumbnail" width="200" height="117" alt="...">
                        </div>
                    </td>
                    <td><?php echo $dato['impartido_por'] ?></td>
                    <td><?php echo $dato['usuarios_inscritos'] ?></td>
                    <td>
                        <ul>
                            <li style="list-style: none;"><a class="btn btn-success bi bi-pencil" href="inscripcion.php?accion=inscribirEvento&id_evento=<?php echo $dato['id_evento']; ?>" style="color: black;">Inscribir</a></li>
                            <li style="list-style: none;"><a class="btn btn-primary bi bi-pencil" href="reporte.php?accion=listaEvento&id_evento=<?php echo $dato['id_evento']; ?>" style="color: black;">Reporte</a></li>
                        </ul>
                    </td>
                </tr>
            <?php
            endforeach
            ?>
        </tbody>
    </table>

</body>

</html>