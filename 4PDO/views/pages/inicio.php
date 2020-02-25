<?php
$usuarios = ControladorFormularios::ctrSeleccionarRegistros();
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
                <button class="btn btn-warning"><i class="fas fa-user-edit"></i></button>
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>