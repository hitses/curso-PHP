<?php

  class ControladorFormularios{
    # Registro
    static public function ctrRegistro(){
      if (isset($_POST['registroNombre']) && isset($_POST['registroEmail']) && isset($_POST['registroPassword'])) {
        return 'Usuario registrado correctamente';
      }
    }
  }

?>