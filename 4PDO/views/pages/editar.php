<?php
if (isset($_GET['token'])) {
  $item = 'token';
  $valor = $_GET['token'];
  $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
}
?>
<div class="d-flex justify-content-center text-center p-5">
  <form class="p-5 bg-light" method="post">
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" class="form-control" id="nombre" placeholder="Nuevo nombre" name="actualizarNombre" value="<?php echo $usuario['nombre']; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-square"></i></span>
        </div>
        <input type="email" class="form-control" id="email" placeholder="Nuevo correo electrónico" name="actualizarEmail" value="<?php echo $usuario['email']; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
        </div>
        <input type="password" class="form-control" id="pwd" placeholder="Nueva ontraseña" name="actualizarPassword">
        <input type="hidden" name="passwordActual" value="<?php echo $usuario['password']; ?>">
        <input type="hidden" name="tokenUsuario" value="<?php echo $usuario['token']; ?>">
      </div>
      <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tus datos con nadie más.</small>
    </div>
    <?php
      $actualizar = new ControladorFormularios();
      $actualizar -> ctrActualizarRegistro();
    ?>
    <button type="submit" class="btn btn-primary">Guardar cambios</button>
  </form>
</div>