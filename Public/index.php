<?php
// $_SERVER['DOCUMENT_ROOT']="C:/laragon/www/D-veloppement-d-un-Clone-d-Eventbrite";

// print_r($_SERVER);

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

use Core\Router;


$router = new Router();

$routes=require "./routes.php";

$uri=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// echo $uri;


$method=$_POST['_method']??$_SERVER['REQUEST_METHOD'];

// echo $method;

$router->route($uri,$method);

