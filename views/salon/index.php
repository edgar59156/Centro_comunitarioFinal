<h1>Salones</h1>
  <a href="salon.php?accion=new" class="btn btn-primary">Añadir salon</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">salon</th>
        <th scope="col">Editar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($datos as $key => $dato) :
      ?>
        <tr>
          <th scope="row"><?php echo $dato['id_salon'] ?></th>
          <td><?php echo $dato['salon'] ?></td>
          <td>
            <ul>
            <li style="list-style: none;"><a class="btn btn-success bi bi-pencil" href="salon.php?accion=modify&id_salon=<?php echo $dato['id_salon']; ?>" style="color: black;">Modificar</a></li>
            <li style="list-style: none;"><a class="btn btn-danger bi bi-pencil" href="salon.php?accion=delete&id_salon=<?php echo $dato['id_salon']; ?>" style="color: black;">Eliminar</a></li>
            </ul>
          </td>
        </tr>
      <?php
      endforeach
      ?>
    </tbody>
  </table>
