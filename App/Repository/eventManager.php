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
}
