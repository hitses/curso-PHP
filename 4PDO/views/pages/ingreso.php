<div class="d-flex justify-content-center text-center p-5">
  <form class="p-5 bg-light" method="post">
    <div class="form-group">
      <label for="email">Correo electrónico</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
        </div>
        <input type="email" class="form-control" id="email" placeholder="Tu correo electrónico" name="ingresoEmail">
      </div>
    </div>
    <div class="form-group">
      <label for="pwd">Contraseña</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
        </div>
        <input type="password" class="form-control" id="pwd" placeholder="Tu contraseña" name="ingresoPassword">
      </div>
    </div>
    <?php
      $ingreso = new ControladorFormularios();
      $ingreso -> ctrIngreso();
    ?>
    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
  </form>
</div>