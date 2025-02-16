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
    public static function getEvents(){
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
    public static function getEventDetail($organizer_id,$event_id){
        try {
            self::$pdo = Database::getConnection();
            $sql = "SELECT 
    events.id, 
    events.title, 
    events.description, 
    events.content, 
    users.name AS organizer, 
    categories.name AS category, 
    events.created_at, 
    events.thumbnail, 
    events.status, 
    events.video_url, 
    events.price, 
    events.capacity, 
    events.date, 
    events.location, 
    events.contact_email, 
    events.contact_phone
FROM 
    events 
JOIN 
    users ON events.organizer_id = users.id 
JOIN 
    categories ON events.category_id = categories.id
WHERE 
    users.id = :organizer_id
   AND events.id= :event_id
GROUP BY 
    events.id, 
    users.name, 
    categories.name;";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute(['organizer_id' => $organizer_id,
        "event_id"=>$event_id]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch(\Exception $e) {
            throw new \Exception("Failed to fetch courses: " . $e->getMessage());
        }
    }
}
