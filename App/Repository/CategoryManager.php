<?php
namespace App\Repository;
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
use Config\Database;
use App\Models\Category;


class CategoryManager{
    private static $pdo;
    public static function addCat(Category $category){
        self::$pdo=Database::getConnection();
        try{
        $sql="INSERT INTO categories(name) VALUE(:name)";
        $stmt=self::$pdo->prepare($sql);
        $stmt->execute([
            "name"=>$category->getName()
        ]);
    }catch(\Exception $th){
        throw new \Exception($th->getMessage());
    }
    }
    public static function getAllCategories() {
        self::$pdo=Database::getConnection();
        try {
            $query = "SELECT * FROM categories ORDER BY name";
            $stmt = self::$pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }
}