<?php
namespace App\Controllers;

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use App\Models\User;
use Core\Auth;
use Core\Session;
use App\Models\Organizer;
use App\Models\Participant;
use App\Repository\UserManager;


class AdminController{
    public function adminDashboard(){

        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/adminDashboard.php";
        
    }
    public function verifyOrganizer(){

        $organizers =  UserManager::getOrganizers();
        
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/OrganaizerVerification.php";
    }
    public function eventVerify(){
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/eventsVerification.php";

    }
    public function category(){
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/catTag.php";
    }
    public function userManager(){
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/Users.php";
    }
    public function eventsManager(){
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/eventsManager.php";
    }
}