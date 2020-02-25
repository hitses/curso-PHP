<?php
if (!isset($_SESSION['validarIngreso'])) {
  echo '<script>
            window.location = "index.php?pagina=ingreso";
          </script>';
} else if ($_SESSION['validarIngreso'] != true) {
  echo '<script>
          window.location = "index.php?pagina=ingreso";
        </script>';
  return;
}
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);

?>

<div class="container-fluid">
    <div class="container">
      <table class="table table-borderless">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Correo electrónico</th>
            <th scope="col">Fecha de registro</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $key => $value): ?>
          <tr>
            <td><?php echo $value["nombre"]; ?></td>
            <td><?php echo $value["email"]; ?></td>
            <td><?php echo $value["fecha"]; ?></td>
            <td>
              <div class="btn-group">
              <div class="px-1">
                <a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?>" class="btn btn-warning"><i class="fas fa-user-edit"></i></a>
              </div>
                <form method="post">
                  <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminarRegistro">
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  <?php
                    $eliminar = new ControladorFormularios();
                    $eliminar -> ctrEliminarRegistro();
                  ?>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>