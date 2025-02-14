<?php
namespace App\Repository;
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
use Config\Database;


class UserManager {
    private static $pdo;

    // public static function getOrganizers() {
    //     self::$pdo = Database::getConnection();
    //     $stmt = self::$pdo->prepare('SELECT * , COUNT(id) as user_count FROM users WHERE role = :organizer and status = :inactive');
    //     $stmt->execute([
    //         ":organizer"=>"organizer",
    //         ":inactive"=>"inactive"
    //     ]);
    //     return $stmt->fetchAll();
    // }


    public static function getOrganizers() {
        self::$pdo = Database::getConnection();
        $stmt = self::$pdo->prepare('
            SELECT * , COUNT(id) as user_count 
            FROM users 
            WHERE role = :organizer and status = :inactive
            GROUP BY id, role, status
        ');
        $stmt->execute([
            ":organizer" => "organizer",
            ":inactive" => "inactive"
        ]);
        return $stmt->fetchAll();
    }
    

    public static function updateStatus($id, $newStatus) {
       
            $stmt = self::$pdo->prepare('UPDATE users SET status = :status, updated_at = CURRENT_TIMESTAMP WHERE id = :id');
            $stmt->bindParam(':status', $newStatus);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->rowCount() > 0;
     
    }


    public static function getUsers() {
        self::$pdo = Database::getConnection();
        $stmt = self::$pdo->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll();
        }


    public static function banUser($id) {
        self::$pdo = Database::getConnection();
        $stmt = self::$pdo->prepare('UPDATE users SET status = :banned, updated_at = CURRENT_TIMESTAMP WHERE id = :id');
        $stmt->execute([
            ":banned" => "banned",
            ":id" => $id
        ]);
        return $stmt->rowCount() > 0;
    }


    public static function unbanUser($id) {
        self::$pdo = Database::getConnection();
        $stmt = self::$pdo->prepare('UPDATE users SET status = :active, updated_at = CURRENT_TIMESTAMP WHERE id = :id');
        $stmt->execute([
            ":active" => "active",
            ":id" => $id
        ]);
        return $stmt->rowCount() > 0;
    }
    
public static function inactivUser ($id){
    self::$pdo=Database::getConnection();
    $stmt=self::$pdo->prepare('UPDATE users SET status=:inactive, updated_at=CURRENT_TIMESTAMP WHERE id=:id');
    $stmt->execute([
        ":inactive"=>"inactive",
        ":id"=>$id
    ]);
    return $stmt->rowCount()>0;
}

    

}

