<!doctype html>
<html lang="en">

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />

<!-- Bootstrap CSS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
<!-- Google Fonts Roboto -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
<!-- MDB -->
<link rel="stylesheet" href="/centro_comunitario/css/mdb.min.css" />
<!-- Custom styles -->
<link rel="stylesheet" href="/centro_comunitario/css/style.css" />
<!--FontAwesome-->
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- MDB -->
<script type="text/javascript" src="/centro_comunitario/js/mdb.min.js"></script>
<!-- Custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"> </script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<title>Centro Comunitario</title>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style=" background: linear-gradient(120deg, #7f70f5, #0ea0ff); height: 50px;">
  <div class="container"><a class="navbar-brand logo" href="/centro_comunitario/panel/inicioTallerista.php">Tallerista</a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    <div id="navbarNav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cuenta
          </a>
          <div class="dropdown-menu">
            <label class="dropdown-item"><?php echo $_SESSION['correo']; ?></label>
            <a class="nav-link" href="/centro_comunitario/panel/usuario.php?accion=modificar">Modificar Perfil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.php?accion=logOut">Log Out</a>
          </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="/centro_comunitario/panel/inicioTallerista.php">Mis Talleres</a></li>
        <li class="nav-item"><a class="nav-link" href="/centro_comunitario/panel/eventoTallerista.php">Mis Eventos</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar -->