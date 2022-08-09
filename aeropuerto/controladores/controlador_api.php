<?php
require_once("vistaapi.php");
require_once("modelos/modeloAeropuerto.php");
class controlador_api
{

    private $modeloapi;

    private $vistaapi;

    private $modeloAeropuerto;
    
    private $data;

    public function __construct()
    {
        $this->vistaapi = new vistaapi();
        $this->modeloAeropuerto=new modeloAeropuerto();
        $this->data = file_get_contents("php://input");
    }
    function getData()
    {
        return json_decode($this->data);
    }

    function mostrarAeropuerto(){
        
        $ciudades=$this->modeloAeropuerto->las_ciudades();
        $vuelos=$this->modeloAeropuerto->los_vuelos();

        $this->vistaapi->PaginaAeropuerto($vuelos,$ciudades);
    }

    function traerProductos()
    {

        $productos = $this->modeloapi->traerLosProductos();
        $this->vistaapi->response($productos, 200);
    }
    function borrarProducto($params = [])
    {

        $id = $params[":ID"];
        $this->modeloapi->borrarProducto($id);
        $this->vistaapi->response("se borro con exito", 200);
    }
    function actualizarProducto($params = [])
    {

        $id = $params[":ID"];
        $body = $this->getData();
        $nombre = $body->nombre;
        $descripcion = $body->descripcion;
        $precio = $body->precio;

        $this->modeloapi->actualizarFila($id, $nombre, $descripcion, $precio);
        
        $this->vistaapi->response("se actualizo con exito", 200);
    }
    function llamar_vuelo($params=[]){
        $num=$params[":nro_vuelo"];
        if(!empty($num)){
            $vuelo=$this->modeloAeropuerto->retornar_vuelos($num);
            $this->vistaapi->response($vuelo,200);
        }
        else{
            $this->vistaapi->response("no se encontro el nro de vuelo",400);
        }
    }
    function llamar_ciudades(){

        $ciudades=$this->modeloAeropuerto->retornar_citys();
        $this->vistaapi->response($ciudades,200);
    }
    function agregar_vuelo($params=[]){

        $body=$this->getData();

        $nro=$body->nro;
        $fecha=$body->fecha;
        $estado=$body->estado;
        $ori=$body->origen;
        $dest=$body->destino;
        
        $this->modeloAeropuerto->agregar_vuelos($nro,$fecha,$ori,$dest,$estado);
        $this->vistaapi->response("se agrego bien",200);
    }
}
