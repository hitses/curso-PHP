<?php

# Condición if
$a = 2;
$b = 2;

if($a > $b) {
  echo "<p>A es mayor que B.</p>";
} else if($a < $b) {
  echo "<p>A es menor que B.</p>";
} else {
  echo "<p>A y B son iguales.</p>";
}

#Condición switch
$dia = "Lunes";

switch ($dia) {
  case 'Sábado':
    echo "<p>Hoy es sábado.</p>";
    break;
  case 'Viernes':
    echo "<p>Hoy es viernes.</p>";
    break;
  default:
    echo "<p>Cargando mundo...</p>";
    break;
}

# Condición while
$n = 1;

while($n <= 5) {
  echo "<p>$n</p>";
  $n++;
}

# Condición do while
$p = 1;

do{
  echo "<p>$p</p>";
  $p++;
}while($p <= 5);

# COndición for
for ($i=1; $i < 6; $i++) { 
  echo "<p>$i</p>";
}

?>