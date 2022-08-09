<?php
require_once 'libs/Route.php';
require_once 'controladores/controlador_api.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('vuelo/:nro_vuelo', 'GET', 'controlador_api', 'llamar_vuelo');
$router->addRoute('ciudad/ciudades', 'GET', 'controlador_api', 'llamar_ciudades');
$router->addRoute('vuelo', 'POST', 'controlador_api', 'agregar_vuelo');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>