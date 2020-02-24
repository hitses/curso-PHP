<?php

# Esto es un comentario y lo de debajo es una variable numérica.
$numero = 22;
# Variable texto.
$palabra = "palabra";
# Variables booleanas
$booleanoVerdadero = true;
$booleanoFalso = false;
# Varaible array
$colores = array("Rojo", "Amarillo", "Verde", "Azul");
# Variable array con propiedades
$verduras = array("Verdura1"=>"Leghuga", "Verdura2"=>"Cebolla");
# Variable de tipo objeto
$frutas = (object)["Fruta1"=>"Manzana", "Fruta2"=>"Pera"];

var_dump($numero);

echo "<p>Aquí tenemos el número $numero.</p>", "<br>", "<p>Esto es una $palabra.</p>", "<p>Esto es un booleano: '$booleanoVerdadero'.</p>", "<p>Esto es un booleano falso: '$booleanoFalso'.</p>", "<p>Esto es un array: $colores[0]</p>", "<p>Esto es una variable de array con propiedades: $verduras[Verdura1]</p>", "<p>Esto es una variable objeto: $frutas->Fruta1</p>";

?>