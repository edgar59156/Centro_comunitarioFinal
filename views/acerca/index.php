<header>
    <!-- Intro settings -->
    <style>
        /* Default height for small devices */
        #intro {
            height: 600px;
            /* Margin to fix overlapping fixed navbar */

        }

        @media (max-width: 991px) {
            #intro {
                /* Margin to fix overlapping fixed navbar */
                margin-top: 45px;
            }
        }
    </style>

    <!-- Background image -->
    <div id="intro" class="p-5 text-center bg-image shadow-1-strong" style="background-image: url('https://mdbootstrap.com/img/new/slides/205.jpg');">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white px-4">
                    <h1 class="mb-3">Acerca de nosotros</h1>

                    <!-- Time Counter -->
                    <h3 class="border border-light my-4 p-4">Centro comunitario</h3>

                    <p>Ofrecemos una variedad de cursos, talleres y <br> libros para todas las personas, ven a conocernos!</p>

                    <p>Registrate para acceder al contenido </p>

                    <a class="btn btn-outline-light btn-lg m-2" href="../panel/registro.php" role="button" rel="nofollow" target="_blank">Registrarse</a>
                    <a class="btn btn-outline-light btn-lg m-2" href="../panel/login.php" target="_blank" role="button">Iniciar Sesion</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main class="mt-5">
    <div class="container">
        <!--Section: Content-->

        <!--Section: Content-->
    </div>
</main>
<!--Main layout-->
<hr class="my-5" />
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Contáctanos
            </h1>
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Example multiple select</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </form>

        </div>
        <div class="col">
            <h1>
                Ubicación
            </h1>
            <div class="col" style="align-content: center;">
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3736.6187781518706!2d-100.81423458504176!3d20.521848286275212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cba88ad4cef97%3A0x6d5c18ec11bd59ae!2sBola%20del%20Agua!5e0!3m2!1ses-419!2smx!4v1625516961857!5m2!1ses-419!2smx" width="540" height="540" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>

    </div>
</div>




</body>

</html>