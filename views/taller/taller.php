<!-- Intro settings -->




<!-- Jumbotron -->
<div id="intro" class="p-5 text-center bg-light" style="background-image: url('/centro_comunitario/image/proyecto/fondo.jpg');">
  <h1 class="mb-3 h2">¡Cursos y talleres de todo tipo!</h1>
  <p class="mb-3">Registrate ahora e inscribete!</p>
  <a class="btn btn-primary m-2" href="https://www.youtube.com/watch?v=c9B4TPnak1A" role="button" rel="nofollow" target="_blank">Registrarse</a>
  <a class="btn btn-primary m-2" href="https://mdbootstrap.com/docs/standard/" target="_blank" role="button">Ya tengo cuenta</a>
</div>
<!-- Jumbotron -->

<!--Main Navigation-->

<!--Main layout-->
<main class="my-5">
  <div class="container">
    <!--Section: Content-->
    <section class="text-center">
      <h1 class="mb-5"><strong>Talleres</strong></h1>

      <div class="row">

        <hr class="my-5" />
        <?php
        foreach ($datos as $key => $dato) :
        ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img alt="..." style="height: 276px; width: 416px;" src="../image/taller/<?php echo $dato['fotografia'] ?>" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $dato['taller'] ?></h5>
                <p class="card-text">
                  <?php echo $dato['descripcion'] ?>
                </p>
                <a href="#!" class="btn btn-primary">Inscribirse</a>
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