<?php
namespace App\Repository;
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
use Config\Database;

class UserManager{
    private static $pdo=Database::getConnection();

    public static function SignUp(){
        $sql="";
    }
}