<?php

  class ControladorFormularios{
    # Registro
    static public function ctrRegistro(){
      if (isset($_POST['registroNombre']) && isset($_POST['registroEmail']) && isset($_POST['registroPassword'])) {
        if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['registroNombre']) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['registroEmail']) && preg_match('/^[0-9a-zA-ZñÑ]+$/', $_POST['registroPassword'])) {
          $tabla = "registros";
          $datos = array(
            "nombre" => $_POST["registroNombre"],
            "email" => $_POST["registroEmail"],
            "password" => $_POST["registroPassword"]);
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
        if ($respuesta['email'] == $_POST['ingresoEmail'] && $respuesta['password'] == $_POST['ingresoPassword']) {
          $_SESSION['validarIngreso'] = true;
          echo '<script>
                  if (window.history.replaceState) {
                    window.history.replaceState (null, null, window.location.href);
                  }
                  window.location = "index.php?pagina=inicio";
                </script>';
        } else {
          echo '<script>
                  if (window.history.replaceState) {
                    window.history.replaceState (null, null, window.location.href);
                  }
                </script>';
          echo '<div class="alert alert-danger">Usuario o contraseña incorrectos</div>';
        }
      }
    }
    # Lectura
    public function ctrActualizarRegistro(){
      if (isset($_POST['actualizarNombre']) || isset($_POST['actualizarEmail'])) {
        if (isset($_POST['actualizarPassword']) != '') {
          $password = $_POST['actualizarPassword'];
        } else {
          $password = $_POST['passwordActual'];
        }
        $tabla = "registros";
        $datos = array(
          "id" => $_POST['idUsuario'],
          "nombre" => $_POST['actualizarNombre'],
          "email" => $_POST['actualizarEmail'],
          "password" => $password);
        $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
        if ($respuesta == true) {
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
      }
    }
    # Eliminar
    public function ctrEliminarRegistro(){
      if (isset($_POST['eliminarRegistro'])) {
        $tabla = "registros";
        $valor = $_POST['eliminarRegistro'];
        $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);
        if ($respuesta == true) {
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