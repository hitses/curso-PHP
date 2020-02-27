<?php

  class ControladorFormularios{
    # Registro
    static public function ctrRegistro(){
      if (isset($_POST['registroNombre']) && isset($_POST['registroEmail']) && isset($_POST['registroPassword'])) {
        if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['registroNombre']) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['registroEmail']) && preg_match('/^[0-9a-zA-ZñÑ]+$/', $_POST['registroPassword'])) {
          $tabla = "registros";
          $token = md5($_POST['registroNombre'].'+'.$_POST['registroEmail']);
          $encriptarPassword = crypt($_POST["registroPassword"], '$5$rounds=5000$FertallforAnywim$');
          $datos = array(
            'token' => $token,
            "nombre" => $_POST["registroNombre"],
            "email" => $_POST["registroEmail"],
            "password" => $encriptarPassword);
          $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
          return $respuesta;
        } else {
          $respuesta = "error";
          return $respuesta;
        }
      }
    }
    # Lectura
    static public function ctrSeleccionarRegistros($item, $valor){
      $tabla = "registros";
      $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
      return $respuesta;
    }
    # Iniciar sesión
    public function ctrIngreso(){
      if(isset($_POST["ingresoEmail"])) {
        $tabla = 'registros';
        $item = 'email';
        $valor = $_POST["ingresoEmail"];
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
        $encriptarPassword = crypt($_POST["ingresoPassword"], '$5$rounds=5000$FertallforAnywim$');
        if ($respuesta['email'] == $_POST['ingresoEmail'] && $respuesta['password'] == $encriptarPassword) {
          ModeloFormularios::mdlActualizarIntentosFalllidos($tabla, 0, $respuesta['token']);
          $_SESSION['validarIngreso'] = 'ok';
          echo '<script>
                  if (window.history.replaceState) {
                    window.history.replaceState (null, null, window.location.href);
                  }
                  window.location = "index.php?pagina=inicio";
                </script>';
        } else {
          if ($respuesta['intentos_fallidos'] < 2) {
            $intentos_fallidos = $respuesta['intentos_fallidos'] + 1;
            ModeloFormularios::mdlActualizarIntentosFalllidos($tabla, $intentos_fallidos, $respuesta['token']);
            echo '<script>
                    if (window.history.replaceState) {
                      window.history.replaceState (null, null, window.location.href);
                    }
                  </script>';
            echo '<div class="alert alert-danger">Usuario o contraseña incorrectos</div>';
          } else {
            // Añadir código de captcha aquí
            echo '<div class="alert alert-warning">reCAPTCHA: demuestra que no eres un bot</div>';
          }
        }
      }
    }
    # Lectura
    public function ctrActualizarRegistro(){
      if (isset($_POST['actualizarNombre']) || isset($_POST['actualizarEmail'])) {
        if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['actualizarNombre']) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['actualizarEmail'])) {
          $tabla = 'registros';
          $item = 'token';
          $valor = $_POST['tokenUsuario'];
          $usuario = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
          $compararToken = md5($usuario['nombre'].'+'.$usuario['email']);
          if ($compararToken == $_POST['tokenUsuario'] && $_POST['idUsuario'] == $usuario['id']) {
            if (isset($_POST['actualizarPassword']) != '') {
              if (preg_match('/^[0-9a-zA-ZñÑ]+$/', $_POST['actualizarPassword'])){
                $password = crypt($_POST["actualizarPassword"], '$5$rounds=5000$FertallforAnywim$');
              }
            } else {
              $password = $_POST['passwordActual'];
            }
            $tabla = "registros";
            $actualizarToken = md5($_POST['actualizarNombre'].'+'.$_POST['actualizarEmail']);
            $datos = array(
              'id' => $_POST['idUsuario'],
              "token" => $actualizarToken,
              "nombre" => $_POST['actualizarNombre'],
              "email" => $_POST['actualizarEmail'],
              "password" => $password);
            $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
            if ($respuesta == 'ok') {
            echo '<script>
                      if (window.history.replaceState) {
                        window.history.replaceState (null, null, window.location.href);
                      }  
                    </script>';
              echo '<div class="alert alert-success">Tu información se ha actualizado correctamente</div>
                    <script>
                      setTimeout(function(){
                        window.location = "index.php?pagina=inicio";
                      },3000);
                    </script>';
            }
            return $respuesta;
          } else {
            $respuesta = 'error';
            return $respuesta;
          }
        } else {
          $respuesta = 'error';
          return $respuesta;
        }
      }
    }
    # Eliminar
    public function ctrEliminarRegistro(){
      if (isset($_POST['eliminarRegistro'])) {
        $usuario = ModeloFormularios::mdlSeleccionarRegistros('registros', 'token', $_POST['eliminarRegistro']);
        $compararToken = $token = md5($usuario['nombre'].'+'.$usuario['email']);
        if ($compararToken == $_POST['eliminarRegistro']) {
          $tabla = "registros";
          $valor = $_POST['eliminarRegistro'];
          $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);
          if ($respuesta == 'ok') {
            echo '<script>
                    if (window.history.replaceState) {
                      window.history.replaceState (null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=inicio";
                  </script>';
          }
          return $respuesta;
        }
      }
    }
  }