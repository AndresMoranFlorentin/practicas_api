<?php

class modeloAeropuerto
{

  function conexionDB_test()
  {

    $db = "test";
    $host = "localhost";
    $user = "root";
    $pass = "";

    return $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  }
  function los_vuelos()
  {

    $sql = "SELECT * FROM vuelos";
    $conexion = $this->conexionDB_test();
    $resultado = $conexion->prepare($sql);
    $resultado->execute();
    $vuelos = $resultado->fetchAll(PDO::FETCH_NAMED);

    return $vuelos;
  }
  function retornar_vuelos($nro)
  {

    $sql = "SELECT * FROM vuelos WHERE nro_vuelo=?";
    $conexion = $this->conexionDB_test();
    $resultado = $conexion->prepare($sql);
    $resultado->execute([$nro]);
    $vuelos = $resultado->fetchAll(PDO::FETCH_NAMED);

    return $vuelos;
  }

  function las_ciudades()
  {

    $sql = "SELECT id_ciudad, nombre FROM ciudad";
    $conexion = $this->conexionDB_test();
    $resultado = $conexion->prepare($sql);
    $resultado->execute();
    $ciudad = $resultado->fetchAll(PDO::FETCH_NAMED);

    return $ciudad;
  }
  function retornar_citys()
  {
    $sql = "SELECT * FROM ciudad";
    $conexion = $this->conexionDB_test();
    $result = $conexion->prepare($sql);
    $result->execute();
    $citys = $result->fetchAll(PDO::FETCH_ASSOC);
    return $citys;
  }
  function agregar_vuelos($nro, $fecha, $city_ori, $city_des, $estado)
  {
    $sql = "INSERT INTO vuelos (nro_vuelo,fecha_salida,ciudad_origen_id,ciudad_destino_id,estado)
     VALUES (?,?,?,?,?)";
    $conexion = $this->conexionDB_test();
    $resultado = $conexion->prepare($sql);
    $resultado->execute([$nro, $fecha, $city_ori, $city_des, $estado]);
  }
}
