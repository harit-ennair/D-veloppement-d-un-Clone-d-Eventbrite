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
}

