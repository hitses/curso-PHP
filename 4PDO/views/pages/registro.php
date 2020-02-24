<div class="d-flex justify-content-center text-center p-5">
  <form class="p-5 bg-light" method="post">
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" class="form-control" id="nombre" placeholder="Introduce tu nombre" name="registroNombre">
      </div>
    </div>
    <div class="form-group">
      <label for="email">Correo electrónico</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
        </div>
        <input type="email" class="form-control" id="email" placeholder="Introduce tu correo electrónico" name="registroEmail">
      </div>
    </div>
    <div class="form-group">
      <label for="pwd">Contraseña</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
        </div>
        <input type="password" class="form-control" id="pwd" placeholder="Introduce tu contraseña" name="registroPassword">
      </div>
      <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tus datos con nadie más.</small>
    </div>
    <?php
      $registro = ControladorFormularios::ctrRegistro();
      if ($registro == 'Usuario registrado correctamente') {
        echo '<script>
                if (window.history.replaceState) {
                  window.history.replaceState (null, null, window.location.href);
                }  
              </script>';
        echo '<div class="alert alert-success">Te has registrado correctamente</div>';
      }
    ?>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>