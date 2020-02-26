<?php

require_once "conexion.php";

class ModeloFormularios{
  # Registro
  static public function mdlRegistro($tabla, $datos) {
    $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(token, nombre, email, password) VALUES (:token, :nombre, :email, :password)");
    $stmt -> bindParam(":token", $datos["token"], PDO::PARAM_STR);
    $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
    $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);

    if($stmt -> execute()) {
      return 'ok';
    } else {
      print_r(Conexion::conectar() -> errorInfo());
    }
    $stmt -> close();
    $stmt = null;
  }
  # Seleccionar registros
  static public function mdlSeleccionarRegistros($tabla, $item, $valor) {
    if ($item == null && $valor == null) {
      $stmt = Conexion::conectar() -> prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla");
      $stmt -> execute();
      return $stmt -> fetchAll();
    } else {
      $stmt = Conexion::conectar() -> prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item");
      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
      $stmt -> execute();
      return $stmt -> fetch();
    }
    $stmt -> close();
    $stmt = null;
  }
  # Actualizar
  static public function mdlActualizarRegistro($tabla, $datos) {
    $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET nombre=:nombre,email=:email,password=:password WHERE token = :token");
    $stmt -> bindParam(":token", $datos["token"], PDO::PARAM_STR);
    $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
    $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);

    if($stmt -> execute()) {
      return 'ok';
    } else {
      print_r(Conexion::conectar() -> errorInfo());
    }
    $stmt -> close();
    $stmt = null;
  }
  # Eliminar
  static public function mdlEliminarRegistro($tabla, $valor) {
    $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE token = :token");
    $stmt -> bindParam(":token", $valor, PDO::PARAM_STR);

    if($stmt -> execute()) {
      return 'ok';
    } else {
      print_r(Conexion::conectar() -> errorInfo());
    }
    $stmt -> close();
    $stmt = null;
  }
}