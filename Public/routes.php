<?php
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

use App\Controllers\CarController;

// return $routes = [
//     "/"         => "../App/Controllers/index.php",
//     "/showCars" => "../App/Controllers/showCars.php",
//     "/Admin"    => "../App/Controllers/admin.php"
// ];

$router->get("/",CarController::class,"creatCar");
$router->post("/",CarController::class,"creatCar");
$router->get("/showCars","../App/Controllers/showCars.php","");
$router->get("/Admin","../App/Controllers/CarController.php","");

