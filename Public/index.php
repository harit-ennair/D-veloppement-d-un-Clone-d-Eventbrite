<?php

require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

use Core\Router;
use App\Controllers\CarController;


$router = new Router();

$routes=require "./routes.php";

$uri=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$method=$_POST['_method']??$_SERVER['REQUEST_METHOD'];

// echo $method;

$router->route($uri,$method);
