
  <h1>Usuarios</h1>
  <a href="usuario.php?accion=new" class="btn btn-primary">Añadir usuario</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Usuario</th>
        <th scope="col">Correo</th>
        <th scope="col">Nombre</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">fotografia</th>
        <th scope="col">telefono</th>
        <th scope="col">Modificar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($datos as $key => $dato) :
      ?>
        <tr>
          <th scope="row"><?php echo $dato['id_usuario'] ?></th>
          <td><?php echo $dato['correo'] ?></td>
          <td><?php echo $dato['nombre'] ?></td>
          <td><?php echo $dato['primer_apellido'] ?></td>
          <td><?php echo $dato['segundo_apellido'] ?></td>
          <td>
            <div class="text-center">
              <img alt="..." src="../image/usuario/<?php echo $dato['fotografia'] ?>" class="rounded-circle" width="100" height="110">
            </div>
          </td>
          <td><?php echo $dato['telefono'] ?></td>
          <td>
            <ul>
            <li style="list-style: none;"><a class="btn btn-success bi bi-pencil" href="usuario.php?accion=modify&id_usuario=<?php echo $dato['id_usuario']; ?>" style="color: black;">Modificar</a></li>
            <li style="list-style: none;"><a class="btn btn-danger bi bi-pencil" href="usuario.php?accion=delete&id_usuario=<?php echo $dato['id_usuario']; ?>" style="color: black;">Eliminar</a></li>
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
