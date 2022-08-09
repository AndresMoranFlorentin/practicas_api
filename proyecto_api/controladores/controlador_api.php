<?php
require_once("modelos/modelo_api.php");
require_once("vistaapi.php");
require_once("modelos/modeloAvion.php");
class controlador_api
{

    private $modeloapi;

    private $vistaapi;

    private $modeloAvion;

    public function __construct()
    {

        $this->modeloapi = new modelo_api();
        $this->vistaapi = new vistaapi();
        $this->modeloAvion=new modeloAvion();
        $this->data = file_get_contents("php://input");
    }
    function getData()
    {
        return json_decode($this->data);
    }

    function mostrarHome()
    {

        $objetos = $this->modeloapi->traerObjetos();
        $this->vistaapi->response($objetos, 200);
    }
    function mostrarInicio()
    {

        $this->vistaapi->mostrarPagina("HOME");
    }

    function ir_a_Limpieza()
    {

        $this->vistaapi->mostrarPagina("Limpieza");
    }
    function mostrarAeropuerto(){
        
        $ciudades=$this->modeloAvion->las_ciudades();
        $vuelos=$this->modeloAvion->los_vuelos();
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
    function hacerOperacion($params = [])
    {

        if (!empty($params[":operacion"])) {

            $accion = $params[":operacion"];
            $numX = $params[":x"];
            $numY = $params[":y"];

            if ($accion == "suma") {

                $resultado = ($numX + $numY);
                $this->vistaapi->response($resultado, 200);

            } elseif ($accion == "multiplicacion") {

                $resultado = ($numX * $numY);
                $this->vistaapi->response($resultado, 200);

            } elseif ($accion == "division") {

                if ($numY != 0 && $numY != 0) {
                    $resultado = ($numX / $numY);
                    $this->vistaapi->response($resultado, 200);
                } else {
                    $this->vistaapi->response("No se puede dividir ese numero,debido a que ingreso 0", 303);
                }
            } else {
                $resultado = (($numX * $numY) / 100);
                $this->vistaapi->response($resultado, 200);
            }
        } else {
            $this->vistaapi->response("error no se encontro la accion o no hay internet", 404);
        }
    }
}
