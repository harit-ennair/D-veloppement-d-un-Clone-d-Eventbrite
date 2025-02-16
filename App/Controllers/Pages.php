<?php
namespace App\Controllers;
use Core\Auth;
use Core\Session;

class Pages{
    public function home(Auth $auth=null,Session $session=null)  {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/userFront/index.php";

    }
    public function team(Auth $auth=null,Session $session=null)  {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/userFront/team.php";

    }
    public function faq(Auth $auth=null,Session $session=null)  {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/userFront/faq.php";

    }
    public function comingSoon(Auth $auth=null,Session $session=null)  {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/userFront/comingSoon.php";

    }
    public function contact(Auth $auth=null,Session $session=null)  {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/userFront/contact.php";

    }
    public function event(Auth $auth=null,Session $session=null)  {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/userFront/event.php";

    }


}
