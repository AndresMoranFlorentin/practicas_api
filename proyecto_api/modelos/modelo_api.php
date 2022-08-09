<?php

class modelo_api
{
  function conexionSQL()
  {
    $user = "root";
    $pass = "";
    $db = "objetos_de_practica";
    $host = "localhost";
    $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $pass); //conecta php con la base de datos

    return $conexion;
  }
 function traerLosProductos(){

  $conexion=$this->conexionSQL();
  $sql="SELECT * FROM productos_limpieza";
  $resultado= $conexion->prepare($sql);
  $resultado->execute();
  $productos_de_limpieza=$resultado->fetchAll(PDO::FETCH_NAMED);

  return $productos_de_limpieza;
 }
 function borrarProducto($id){

  $conexion=$this->conexionSQL();
  $sql="DELETE FROM productos_limpieza WHERE id=?";
  $resultado=$conexion->prepare($sql);
  $resultado->execute([$id]);
 }
 function actualizarFila($id,$nombre,$descripcion,$precio){

  $conexion=$this->conexionSQL();
  $sql="UPDATE productos_limpieza SET nombre=?, descripcion=?, precio=? WHERE id=?";
  $resultado=$conexion->prepare($sql);
  $resultado->execute([$nombre,$descripcion,$precio,$id]);
  
 }
  function traerObjetos()
  {
    $conexion = $this->conexionSQL();/*llamo a la clase modelo animal para asi pedirle
   algo que ella tenga, en este caso la conexion()*/ //creo la conexion con msql como una puerta
    $sql = 'SELECT id, tipo_de_objeto FROM objetos ORDER BY id ASC';
    $resultado = $conexion->prepare($sql);
    $resultado->execute();
    $objetos = $resultado->fetchAll(PDO::FETCH_NAMED); //traigo informacion dura del msql la parte string mas que nada

    return $objetos; //la matrix con todos los datos del msql, cada fila seria un arreglo en si
  }
}
