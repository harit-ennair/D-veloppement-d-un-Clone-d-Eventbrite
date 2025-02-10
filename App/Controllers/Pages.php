<?php
namespace App\Controllers;

class Pages{
    public function home()  {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/userFront/index.php";

    }
    public function signUp() {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/register.php";
        
    }
    

}
