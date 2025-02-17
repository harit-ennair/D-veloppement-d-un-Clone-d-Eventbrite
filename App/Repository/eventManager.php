<?php
namespace App\Repository;
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
use Config\Database;

class EventManager{
    private static $pdo;

    public static function createEvent($data){
        try {
            self::$pdo = Database::getConnection();
            $columns = array_keys($data);
            $placeholders = array_fill(0, count($data), '?');
            
            $sql = "INSERT INTO events (" . implode(",", $columns) . ") 
                    VALUES (" . implode(",", $placeholders) . ")";
            
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute(array_values($data));
            
            return self::$pdo->lastInsertId();
        } catch(\Exception $e) {
            throw new \Exception("Failed to create event: " . $e->getMessage());
        }
    }
    public static function showEvents(){
        try {
            self::$pdo = Database::getConnection();
            $sql = "SELECT * FROM events";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch(\Exception $e) {
            throw new \Exception("Failed to fetch events: " . $e->getMessage());
        }
    }
    
public static function updateStatus($id, $status) {
    try {
        self::$pdo = Database::getConnection();
        $sql = "UPDATE events SET status = :status WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        
        error_log("Updating event ID: $id to status: $status");
        
        $result = $stmt->execute([
            'status' => $status, 
            'id' => $id
        ]);
        
        error_log("Update result: " . ($result ? "success" : "failed"));
        error_log("Rows affected: " . $stmt->rowCount());
        
        return $stmt->rowCount() > 0;
    } catch(\Exception $e) {
        error_log("Error updating status: " . $e->getMessage());
        throw new \Exception("Failed to update event status: " . $e->getMessage());
    }
}

// public static function  showEvents(){
//     try {
//         self::$pdo = Database::getConnection();
//         $sql = "SELECT * FROM events WHERE id = :id";
//         $stmt = self::$pdo->prepare($sql);
//         $stmt->execute(['id' => $id]);
//         return $stmt->fetch(\PDO::FETCH_ASSOC);
//     } catch(\Exception $e) {
//         throw new \Exception("Failed to fetch event: " . $e->getMessage());
//     }


}


