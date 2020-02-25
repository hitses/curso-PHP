<?php

  class ControladorFormularios{
    # Registro
    static public function ctrRegistro(){
      if (isset($_POST['registroNombre']) && isset($_POST['registroEmail']) && isset($_POST['registroPassword'])) {
        $tabla = "registros";
        $datos = array(
          "nombre" => $_POST["registroNombre"],
          "email" => $_POST["registroEmail"],
          "password" => $_POST["registroPassword"]);
        $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
        return $respuesta;
      }
    }
  }

?>