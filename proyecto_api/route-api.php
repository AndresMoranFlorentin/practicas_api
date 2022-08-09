<?php
require_once 'libs/Route.php';
require_once 'controladores/controlador_api.php';
require_once 'controladores/controladorMovies.php';
require_once 'modelos/modelo_api.php';
require_once 'vistaapi.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('home', 'GET', 'controlador_api', 'mostrarHome');
$router->addRoute('operacion/:operacion/x/:x/y/:y', 'GET', 'controlador_api', 'hacerOperacion');
$router->addRoute('limpieza', 'GET', 'controlador_api', 'traerProductos');
$router->addRoute('limpieza/:ID', 'DELETE', 'controlador_api', 'borrarProducto');
$router->addRoute('limpieza/:ID', 'PUT', 'controlador_api', 'actualizarProducto');
$router->addRoute('peliculas', 'GET', 'controladorMovies', 'llamar_a_peliculas');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
/*$objects = [
        "flower" => [ "images" => ["flower_0.jpg","flower_1.jpg","flower_2.jpg","flower_3.jpg","flower_4.jpg"], "name" => "Flores"],
        "tree" => [ "images" => ["tree_0.jpg","tree_1.jpg","tree_2.jpg","tree_3.jpg","tree_4.jpg"], "name" => "Arboles"],
        "duck" => [ "images" => ["duck_0.jpg","duck_1.jpg","duck_2.jpg","duck_3.jpg","duck_4.jpg"], "name" => "Patos"]
    ];

    if(isset($_GET['object']) && isset($objects[$_GET['object']]) )
    {
        $selected_object = $objects[$_GET['object']];
        echo "<h1>".$selected_object["name"]."</h1>";
        foreach ($selected_object["images"] as $image )
            echo "<img src='img/$image'/><br>";
    }
    else
    {
        echo "<p>Seleccione un objecto:</p><br>";
        foreach ($objects as $object => $data )
            echo "<a href='$object'>" . $data["name"] . "</a><br>";
    }*/

?>