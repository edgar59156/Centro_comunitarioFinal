<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://gentle-cliffs-55384.herokuapp.com/proveedor/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$response = str_replace('&quot;','"',$response);
$productos_proveedor_externo = json_decode($response,true);
//echo '<br>';
//print_r($productos_proveedor_externo);
require_once ('../views/header.php');
?>

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
      <h1 class="mb-5"><strong>Talleres externos</strong></h1>
      <h4 class="mb-5"><strong>Los talleres externos son ofrecidos por talleristas fuera del centro comunitario, para más informes por favor consulte con el tallerista</strong></h4>
      <div class="row">

        <hr class="my-5" />
        <?php foreach ($productos_proveedor_externo as $key => $values) : ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img alt="..." style="height: 276px; width: 416px;" src="../image/taller/<?php echo $values['fotografia'] ?>" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $values['taller'] ?></h5>
                <p class="card-text">
                  <?php echo $values['descripcion'] ?>
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