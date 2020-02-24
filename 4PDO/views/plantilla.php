<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MVC</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <script src="https://kit.fontawesome.com/30dc8252d2.js" crossorigin="anonymous"></script>

</head>
<body>

  <div class="container-fluid">
    <h3 class="text-center py-3">
      LOGO
    </h3>
  </div>

  <div class="container-fluid bg-light">
    <div class="container">
      <ul class="nav nav-justified py-2 nav-pills">
        <?php if (isset($_GET['pagina'])): ?>
          <?php if ($_GET['pagina'] == "registro"): ?>
            <il class="nav-item">
              <a href="index.php?pagina=registro" class="nav-link active">Registro</a>
            </il>
          <?php else: ?>
            <il class="nav-item">
              <a href="index.php?pagina=registro" class="nav-link">Registro</a>
            </il>
          <?php endif ?>
        <?php endif ?>
        <?php if (isset($_GET['pagina'])): ?>
          <?php if ($_GET['pagina'] == "ingreso"): ?>
            <il class="nav-item">
              <a href="index.php?pagina=ingreso" class="nav-link active">Iniciar sesión</a>
            </il>
          <?php else: ?>
            <il class="nav-item">
              <a href="index.php?pagina=ingreso" class="nav-link">Iniciar sesión</a>
            </il>
          <?php endif ?>
        <?php endif ?>
        <?php if (isset($_GET['pagina'])): ?>
          <?php if ($_GET['pagina'] == "inicio"): ?>
            <il class="nav-item">
              <a href="index.php?pagina=inicio" class="nav-link active">Inicio</a>
            </il>
          <?php else: ?>
            <il class="nav-item">
              <a href="index.php?pagina=inicio" class="nav-link">Inicio</a>
            </il>
          <?php endif ?>
          <?php if ($_GET['pagina'] == "salir"): ?>
            <il class="nav-item">
              <a href="index.php?pagina=salir" class="nav-link active">Salir</a>
            </il>
          <?php else: ?>
            <il class="nav-item">
              <a href="index.php?pagina=salir" class="nav-link">Salir</a>
            </il>
          <?php endif ?>
        <?php else: ?>
          <il class="nav-item">
            <a href="index.php?pagina=registro" class="nav-link">Registro</a>
          </il>
          <il class="nav-item">
            <a href="index.php?pagina=ingreso" class="nav-link">Iniciar sesión</a>
          </il>
          <il class="nav-item">
            <a href="index.php?pagina=inicio" class="nav-link">Inicio</a>
          </il>
          <il class="nav-item">
            <a href="index.php?pagina=salir" class="nav-link">Salir</a>
          </il>
        <?php endif ?>
      </ul>
    </div>
  </div>

  <div class="container-fluid">
    <div class="container">
      <?php
        if (isset($_GET["pagina"])) {
          if($_GET["pagina"] == "registro" || $_GET["pagina"] == "ingreso" || $_GET["pagina"] == "inicio" || $_GET["pagina"] == "salir") {
            include "pages/".$_GET["pagina"].".php";
          } else {
            include "pages/error404.php";
          }
        } else {
          include "pages/registro.php";
        }
      ?>
    </div>
  </div>

</body>
</html>