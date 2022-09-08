<h1>Géneros</h1>
  <a href="genero.php?accion=new" class="btn btn-primary">Añadir genero</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">genero</th>
        <th scope="col">Editar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($datos as $key => $dato) :
      ?>
        <tr>
          <th scope="row"><?php echo $dato['id_genero'] ?></th>
          <td><?php echo $dato['genero'] ?></td>
          <td>
            <ul>
            <li style="list-style: none;"><a class="btn btn-success bi bi-pencil" href="genero.php?accion=modify&id_genero=<?php echo $dato['id_genero']; ?>" style="color: black;">Modificar</a></li>
            <li style="list-style: none;"><a class="btn btn-danger bi bi-pencil" href="genero.php?accion=delete&id_genero=<?php echo $dato['id_genero']; ?>" style="color: black;">Eliminar</a></li>
            </ul>
          </td>
        </tr>
      <?php
      endforeach
      ?>
    </tbody>
  </table>
