<?php

use App\Autoloader;
use App\Core\Router;

//On importe les namespaces de l'autoloader et du router.


//On inclut l'autoloader.
include '../Autoloader.php';
Autoloader::register();

//On instancie le routeur.
$route = new Router();

//On lance l'application.
$route->routes();
