<?php
namespace App\Controllers;

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use App\Models\User;
use Core\Auth;
use Core\Session;
use App\Models\Organizer;
use App\Models\Participant;

class OrganizerController{
    public function organizerDashboard(){
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/organizer/organizerDashboard.php";
    }
    public function OrganizerEvents(){
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/organizer/Events.php";
    }
    public function addEvent(){
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/organizer/addEvent.php";
    }
}