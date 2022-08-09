<?php

class modeloAvion {

    function conexionDB_test(){
        $db="test";
        $host="localhost";
        $user="root";
        $pass="";
        $conexion=new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        return $conexion;
    }
  function los_vuelos(){

    $sql="SELECT * FROM vuelos";
    $conexion=$this->conexionDB_test();
    $resultado= $conexion->prepare($sql);
    $resultado->execute();
    $vuelos=$resultado->fetchAll(PDO::FETCH_NAMED);

    return $vuelos;
  }
 function las_ciudades(){

    $sql="SELECT id_ciudad, nombre FROM ciudad";
    $conexion=$this->conexionDB_test();
    $resultado= $conexion->prepare($sql);
    $resultado->execute();
    $ciudad=$resultado->fetchAll(PDO::FETCH_NAMED);

    return $ciudad;
 }

}