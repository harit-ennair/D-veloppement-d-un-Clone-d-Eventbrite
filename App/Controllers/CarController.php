<?php
namespace App\Controllers;
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

use App\Models\Car;

class CarController {

public static function creatCar() {
  if(isset($_POST['Submit']) ){
    $name=$_POST["nom"];
    $desc=$_POST["description"];
    $car=new Car($name,$desc);
    $car->insert();
    header("location:CarController.php");
    }
else 
require $_SERVER['DOCUMENT_ROOT'].'/App/Views/pages/page.php';
}


}
// CarController::creatCar();