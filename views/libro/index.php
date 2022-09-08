<!-- Intro settings -->




<!-- Jumbotron -->
<div id="intro" class="p-5 text-center bg-light" style="background-image: url('/centro_comunitario/image/proyecto/libreria.jpg');">
    <h1 style="color: white;" class="mb-3 h2">¡Una gran variedad de libros!</h1>
    <p style="color: white;" class="mb-3">Registrate ahora y solicitalos!</p>
    <a class="btn btn-primary m-2" href="https://www.youtube.com/watch?v=c9B4TPnak1A" role="button" rel="nofollow" target="_blank">Registrarse</a>
    <a class="btn btn-primary m-2" href="https://mdbootstrap.com/docs/standard/" target="_blank" role="button">Ya tengo cuenta</a>
</div>
<!-- Jumbotron -->

<!--Main Navigation-->


<!--Main layout-->
<main class="my-5">
    <div class="container">
        <!--Section: Content-->
        <section class="text-center text-md-start">
            <h1 class="mb-5"><strong>Libros</strong></h1>

            <hr class="my-5" />
            <?php
            foreach ($datos as $key => $dato) :
            ?>

                <!-- Post -->
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                            <img alt="..." style="height: 500px; width: 416px;" src="../image/libro/<?php echo $dato['imagen'] ?>" class="img-fluid" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-8 mb-4">
                        <h1><?php echo $dato['libro'] ?></h1>
                        <h3>Editorial: <?php echo $dato['editorial'] ?></h3>
                        <h3>Genero: <?php echo $dato['genero'] ?></h3>
                        <p>
                            <?php echo $dato['descripcion'] ?>"
                        </p>

                        <button type="button" class="btn btn-primary">Solicitar!</button>
                    </div>
                </div>

            <?php
            endforeach
            ?>

        </section>
        <!--Section: Content-->
    </div>
</main>
<!--Main layout-->

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


<!--Main layout-->