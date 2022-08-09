<?php
require_once "smarty_copi/libs/Smarty.class.php";

class vistaapi
{
    private $smarty;
    
    function __construct()
    {
         $this->smarty = new Smarty();

    }
    public function response($objetos,$status)
    {

        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($objetos);
       
    }

    private function _requestStatus($code)
    {
        $status = array(
            200 => "OK",
            404 => "Not found",
            500 => "Internal Server Error"
        );
        return (isset($status[$code])) ? $status[$code] : $status[500];
    }
    
    function PaginaAeropuerto($vuelos,$ciudades){
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('vuelos',$vuelos);
        $this->smarty->assign('ciudades',$ciudades);
        $this->smarty->display('template/aeropuerto.tpl');
    }

}
