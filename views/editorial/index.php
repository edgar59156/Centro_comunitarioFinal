<h1>editoriales</h1>
  <a href="editorial.php?accion=new" class="btn btn-primary">Añadir editorial</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">editorial</th>
        <th scope="col">Editar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($datos as $key => $dato) :
      ?>
        <tr>
          <th scope="row"><?php echo $dato['id_editorial'] ?></th>
          <td><?php echo $dato['editorial'] ?></td>
          <td>
            <ul>
            <li style="list-style: none;"><a class="btn btn-success bi bi-pencil" href="editorial.php?accion=modify&id_editorial=<?php echo $dato['id_editorial']; ?>" style="color: black;">Modificar</a></li>
            <li style="list-style: none;"><a class="btn btn-danger bi bi-pencil" href="editorial.php?accion=delete&id_editorial=<?php echo $dato['id_editorial']; ?>" style="color: black;">Eliminar</a></li>
            </ul>
          </td>
        </tr>
      <?php
      endforeach
      ?>
    </tbody>
  </table>
