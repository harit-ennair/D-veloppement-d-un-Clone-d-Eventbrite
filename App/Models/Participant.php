<?php
namespace App\Models;
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
use Config\Database;

use App\Models\User;
class Participant extends User {


    public function register() {
        if($this->emailExiste()){
            throw new \Exception("this email dose already Existe");
        }else{
             $sql="INSERT INTO users(name,email,password,role,avatar) VALUE(:name,:email,:password,:avatar)";
             $stmt=self::$pdo->prepare($sql);
             $stmt->execute([
                "name"=>$this->name,
                "email"=>$this->email,
                "password"=>$this->password,
                "avatar"=>$this->avatar
             ]);
        }
        
    }
    public function browseEvents() {
        // Browse events logic
    }

    public function bookTicket() {
        // Book ticket logic
    }

    public function cancelBooking() {
        // Cancel booking logic
    }

    public function requestRefund() {
        // Request refund logic
    }
}
?>
