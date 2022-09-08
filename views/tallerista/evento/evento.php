
<!--Main Navigation-->

<!--Main layout-->
<main class="my-5">
  <div class="container">
    <!--Section: Content-->
    <section class="text-center">
      <h1 class="mb-5"><strong>Sus Eventos</strong></h1>
      <div class="row">
      <input type="hidden" name="id_usuario" value="<?php echo $datosUsuario['id_usuario']; ?>">
        <hr class="my-5" />
        <?php
        foreach ($datos as $key => $dato) :
        ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img alt="..." style="height: 276px; width: 416px;" src="../image/evento/<?php echo $dato['fotografia'] ?>" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $dato['evento'] ?></h5>
                <p class="card-text">
                  <?php echo $dato['descripcion'] ?>
                </p>
                <i class="btn btn-primary bi bi-pencil"><a href="eventoTallerista.php?accion=vermas&id_evento=<?php echo $dato['id_evento']?>" style="color: black;">Ver alumnos</a></i>
                <i class="btn btn-success bi bi-pencil"><a href="eventoTallerista.php?accion=modify&id_evento=<?php echo $dato['id_evento']?>" style="color: black;">Modificar detalles</a></i>
              </div>
            </div>
          </div>

        <?php
        endforeach
        ?>

      </div>
    </section>

    
    <!--Section: Content-->

    <!-- Pagination -->
    <nav class="my-4" aria-label="...">
      <ul class="pagination pagination-circle justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item " aria-current="page">
          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</main>
<!--Main layout-->


</html>