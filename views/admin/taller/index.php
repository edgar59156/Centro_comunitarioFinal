

  <h1>Talleres</h1>
  <a href="taller.php?accion=new" class="btn btn-primary">Añadir taller</a>

  <table class="table table-striped">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Taller</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Hora de inicio</th>
        <th scope="col">Hora de termino</th>
        <th scope="col">Fotografia</th>
        <th scope="col">Modificar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($datos as $key => $dato) :
      ?>
        <tr>
          <th scope="row"><?php echo $dato['id_taller'] ?></th>
          <td><?php echo $dato['taller'] ?></td>
          <td><?php echo $dato['descripcion'] ?></td>
          <td><?php echo $dato['horario_inicio'] ?></td>
          <td><?php echo $dato['horario_fin'] ?></td>
          <td>
            <div class="text-center">
              <img src="../image/taller/<?php echo $dato['fotografia']; ?>" class="img-thumbnail" width="200" height="210" alt="...">
            </div>
          </td>
          <td>
            <ul>
              <li style="list-style: none;"><a class="btn btn-success bi bi-pencil" href="taller.php?accion=modify&id_taller=<?php echo $dato['id_taller']; ?>" style="color: black;">Modificar</a></li>
            </ul>
            <ul>
            <li style="list-style: none;"> <a class="btn btn-danger bi bi-trash-fill" href="taller.php?accion=delete&id_taller=<?php echo $dato['id_taller']; ?>" style="color: black;">Eliminar</a></li>
            </ul>
          </td>

        </tr>
      <?php
      endforeach
      ?>
    </tbody>
  </table>
</html>
