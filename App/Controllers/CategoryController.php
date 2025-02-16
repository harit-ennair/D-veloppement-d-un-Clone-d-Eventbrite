<?php
namespace App\Controllers;

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use Config\Database;
use App\Models\Category;

class CategoryController {
    private $db;
    private $category;

    public function __construct() {
        ob_start();
        $this->db = new Database();
        ob_clean();
        
        $this->category = new Category($this->db);
    }

    public function addCategory() {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
            $name = trim($_POST['name']);
            if (empty($name)) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Category name cannot be empty'
                ]);
                return;
            }
            echo json_encode($this->category->addCategory($name));
        }
    }

    public function updateCategory() {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['name'])) {
            $name = trim($_POST['name']);
            if (empty($name)) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Category name cannot be empty'
                ]);
                return;
            }
            echo json_encode($this->category->updateCategory($_POST['id'], $name));
        }
    }

    public function deleteCategory() {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            echo json_encode($this->category->deleteCategory($_POST['id']));
        }
    }

    public function getCategories() {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($this->category->getAllCategories());
        }
    }
}

ob_start();

$controller = new CategoryController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'addCategory':
            $controller->addCategory();
            break;
        case 'updateCategory':
            $controller->updateCategory();
            break;
        case 'deleteCategory':
            $controller->deleteCategory();
            break;
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getCategories') {
    $controller->getCategories();
    exit;
}

ob_end_clean();
?>