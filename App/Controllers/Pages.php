<?php
namespace App\Controllers;
use Core\Auth;
use Core\Session;

class Pages{
    public function home(Auth $auth=null,Session $session=null)  {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/userFront/index.php";

    }

}
