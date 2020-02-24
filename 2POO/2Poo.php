<?php

# Clase: es un modelo que se utiliza para crear objetos que comparten un mismo comportamiento, estado e identidad (más seguro).
class Automovil {
  #Propiedades: son las características que pueden tener los objetos.
  public $marca;
  public $modelo;
  #Método: es el algoritmo asociado a un objeto que indica la capacidad de lo que éste puede hacer.
  public function mostrar(){
    echo "<p>¡Hola! Soy un $this->marca, modelo $this->modelo.</p>";
  }
  # La única diferencia entre un método y una función es que llamamos métodos a las funciones de una clase (en la POO) y funciones a los algoritmos de la programación estructurada.
}
# Objeto: es una entidad provista de métodos o mensajes a los cuales responde propiedades con valores concretos.
$a = new Automovil();
$a -> marca = "Toyota";
$a -> modelo = "Corolla";
$a -> mostrar();

$b = new Automovil();
$b -> marca = "Peugeot";
$b -> modelo = 508;
$b -> mostrar();

$c = new Automovil();
$c -> marca = "Mazda";
$c -> modelo = 2;
$c -> mostrar();

/*
Abstracción: permite crear nuevos tipos de datos (el que se quiera se crea).
Encapsulación: organizas el código en grupos lógicos
Ocultamiento: oculta detalles de implementación y expone solo los detalles que sean necesarios para el resto del sistema.
*/

?>