<?php

# Funcones sin parámetros
function saludo() {
  echo "<p>Hola, mundo.</p>";
}

saludo();

# Funciones con parámetros
function despedida($adios) {
  echo "<p>$adios</p>";
}

despedida("Adiós, mundo.");

# Funciones con return

function retorno($retornar) {
  return $retornar;
}

echo retorno("Return");

?>