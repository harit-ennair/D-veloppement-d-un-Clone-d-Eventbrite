<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

use App\Controllers\Pages;


// return $routes = [
//     "/"         => "../App/Controllers/index.php",
//     "/showCars" => "../App/Controllers/showCars.php",
//     "/Admin"    => "../App/Controllers/admin.php"
// ];

$router->get("/",Pages::class,"home");
$router->get("/signUp",Pages::class,"signUp");
$router->get("/addEvent",pages::class,"addEvent");
// $router->post("/",CarController::class,"creatCar");
// $router->get("/showCars","../App/Controllers/showCars.php","");
// $router->get("/Admin","../App/Controllers/CarController.php","");

