<?php
require_once 'modelos/modelo_api.php';

class modeloMovies extends modelo_api
{

    function numero_de_filas()
    {
        $conexion = $this->conexionSQL();
        $SQL = "SELECT COUNT(*) FROM movies";
        $resultado = $conexion->prepare($SQL);
        $resultado->execute();
        $numero_pel = $resultado->fetchColumn();

        return $numero_pel;
    }
    //LIMIT total5-1,total
    function traer_peliculas($ini,$fin)
    {
        $conexion = $this->conexionSQL();
        $SQL = "SELECT * FROM movies LIMIT ".$ini.",".$fin." ";
        $resultado = $conexion->prepare($SQL);
        $resultado->execute();
        $peliculas = $resultado->fetchAll(PDO::FETCH_NAMED);

        return $peliculas;
    }
   /* function traer_peliculas($ini, $fin)
    {
        $conexion = $this->conexionSQL();
        $SQL = "SELECT * FROM movies LIMIT ?,?";
        $resultado = $conexion->prepare($SQL);
        $resultado->execute([$ini, $fin]);
        $peliculas = $resultado->fetchAll(PDO::FETCH_NAMED);

        return $peliculas;
    }*/
}
