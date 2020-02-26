<?php

require_once "controllers/plantilla.controller.php";
require_once "controllers/formularios.controller.php";

require_once "models/conexion.php";
require_once "models/formularios.modelo.php";

$conexion = Conexion::conectar();

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();