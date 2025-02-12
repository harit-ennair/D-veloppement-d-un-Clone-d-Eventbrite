<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

use App\Controllers\Pages;
use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\OrganizerController;


// return $routes = [
//     "/"         => "../App/Controllers/index.php",
//     "/showCars" => "../App/Controllers/showCars.php",
//     "/Admin"    => "../App/Controllers/admin.php"
// ];

$router->get("/",Pages::class,"home");
$router->get("/signUp",AuthController::class,"signUp");
$router->post("/signUp",AuthController::class,"signUp");
$router->get("/logIn",AuthController::class,"logIn");
$router->post("/logIn",AuthController::class,"logIn");
$router->get("/admin",AdminController::class,"adminDashboard");
$router->post("/admin",AdminController::class,"adminDashboard");
$router->get("/verifyOrganizer",AdminController::class,"verifyOrganizer");
$router->post("/verifyOrganizer",AdminController::class,"verifyOrganizer");
$router->get("/eventVerify",AdminController::class,"eventVerify");
$router->get("/category",AdminController::class,"category");
$router->get("/userManager",AdminController::class,"userManager");
$router->get("/eventsManager",AdminController::class,"eventsManager");
$router->get("/organizerDashboard",OrganizerController::class,"organizerDashboard");
$router->get("/OrganizerEvents",OrganizerController::class,"OrganizerEvents");
$router->get("/addEvent",OrganizerController::class,"addEvent");
$router->get("/forgotPassword", C_password::class, "showForgotForm");
$router->post("/forgotPassword", C_password::class, "forgotPassword");
$router->get("/resetPassword", C_password::class, "showResetForm");
$router->post("/resetPassword", C_password::class, "resetPassword");



// $router->post("/signUp",AuthContorller::class,"signUp");
// $router->post("/signUp",AuthContorller::class,"signUp");
// $router->get("/config",Database::class,"home");
// $router->post("/",CarController::class,"creatCar");
// $router->get("/showCars","../App/Controllers/showCars.php","");
// $router->get("/Admin","../App/Controllers/CarController.php","");

