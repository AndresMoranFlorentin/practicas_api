<?php
require_once("controladores/controlador_api.php");
require_once("modelos/modeloMovies.php");
require_once("vistaapi.php");

class controladorMovies extends controlador_api
{
    private $vistaapi;
    private $modeloMovies;

    public function __construct()
    {
        $this->vistaapi = new vistaapi();
        $this->modeloMovies = new modeloMovies();
        $this->data = file_get_contents("php://input");
    }
    function getData()
    {
        return json_decode($this->data);
    }
    function mostrarMovies()
    {

        $this->vistaapi->mostrarPagina("Peliculas");
    }
    function llamar_a_peliculas($params=[])
    {
       
       $total_pel = $this->modeloMovies->numero_de_filas();
       $cuenta=$total_pel-15;
       $ini="$cuenta";
       $fin="$total_pel";
       $peliculas=$this->modeloMovies->traer_peliculas($ini,$fin);
      // echo "numero total de las filas de peliculas = " . "{$ini}" . "";
       
        //$peliculas=$this->modeloMovies->traer_peliculas();
        $this->vistaapi->response($peliculas, 200);

    }
}
