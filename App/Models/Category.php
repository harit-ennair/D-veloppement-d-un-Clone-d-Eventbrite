<?php
namespace App\Models;

class Category {
    private $id;
    private $name;
    private $db;

    public function __construct($id, $name, $db) {
        $this->id = $id;
        $this->name = $name;
        $this->db = $db::getConnection();
    }

    public function addCategory() {
        try {
            $query = "INSERT INTO categories (name) VALUES (:name)";
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute(['name' => $this->name]);
            
            if ($result) {
                return [
                    'success' => true,
                    'id' => $this->db->lastInsertId(),
                    'message' => 'Category added successfully'
                ];
            }
            return [
                'success' => false,
                'message' => 'Failed to add category'
            ];
        } catch (Exception $e) {
            echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
        }
        
    }

    public function updateCategory() {
        try {
            $query = "UPDATE categories SET name = :name WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute([
                'name' => $this->name,
                'id' => $this->id
            ]);
            
            return [
                'success' => $result,
                'message' => $result ? 'Category updated successfully' : 'No changes made'
            ];
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error occurred'
            ];
        }
    }

    public function deleteCategory() {
        try {
            $query = "DELETE FROM categories WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute(['id' => $this->id]);
            
            return [
                'success' => $result,
                'message' => $result ? 'Category deleted successfully' : 'Category not found'
            ];
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error occurred'
            ];
        }
    }

    public static function getAllCategories($db) {
        try {
            $conn = $db::getConnection();
            $query = "SELECT * FROM categories ORDER BY name";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }


    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}
?>
