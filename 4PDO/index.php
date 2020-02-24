<?php

require_once "controllers/plantilla.controller.php";
require_once "controllers/formularios.controller.php";

require_once "models/conexion.php";

$conexion = Conexion::conectar();
echo '<pre>'; print_r($conexion); echo '</pre>';

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();

?>