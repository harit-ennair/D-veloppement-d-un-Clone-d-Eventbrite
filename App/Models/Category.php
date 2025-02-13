<?php
// Category.php
namespace App\Models;

class Category {
    private $db;

    public function __construct($db) {
        $this->db = $db::getConnection();
    }

    public function addCategory($name) {
        try {
            $query = "INSERT INTO categories (name) VALUES (:name)";
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute(['name' => $name]);
            
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
        } catch (\PDOException $e) {
            return [
                'success' => false,
                'message' => "Error: " . $e->getMessage()
            ];
        }
    }

    public function updateCategory($id, $name) {
        try {
            $query = "UPDATE categories SET name = :name WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute([
                'name' => $name,
                'id' => $id
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

    public function deleteCategory($id) {
        try {
            $query = "DELETE FROM categories WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute(['id' => $id]);
            
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

    public function getAllCategories() {
        try {
            $query = "SELECT * FROM categories ORDER BY name";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }
}