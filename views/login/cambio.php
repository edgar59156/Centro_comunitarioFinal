
<!--Main Navigation-->
<header>
  <style>
    #intro {
      background-image: url('/centro_comunitario/image/proyecto/fondo.jpg');
      height: 100vh;
    }

    /* Height for devices larger than 576px */
    @media (min-width: 992px) {
      #intro {
        margin-top: -58.59px;
      }
    }

    .navbar .nav-link {
      color: #fff !important;
    }
  </style>


  <!-- Background image -->
  <div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-md-8">
            <form class="bg-white rounded shadow-5-strong p-5" method="POST" action="login.php?accion=update">
              <h1>Recuperación</h1>
              <!-- Email input -->
              <div class="form mb-4">
                <label class="form-label" for="form1Example1">Nueva contrasena</label>
                <input type="password" id="form1Example1" class="form-control" name="contrasena" />
              </div>



              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <!-- Checkbox -->

                </div>

              </div>

              <input type="hidden" name="correo" value="<?php echo $datos['correo']; ?>">
              <input type="hidden" name="token" value="<?php echo $datos['token']; ?>">
              <input type="submit" class="btn btn-primary" name="enviar" value="Cambiar contraseña" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>
<!--Main Navigation-->


</body>

</html>