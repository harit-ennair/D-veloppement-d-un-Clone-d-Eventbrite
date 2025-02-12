<?php
namespace App\Controllers;

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";




use Config\Database;
use App\Models\Category;
// use Core\ControllerFactory;

class CategoryController {
    private $db;
    private $category;

    public function __construct() {
        $this->db = new Database();
        $this->category = new Category($this->db);

    }

    public function addCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
            echo json_encode($this->category->addCategory($_POST['name']));
        }
    }
    

    public function updateCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['name'])) {
            echo json_encode($this->category->updateCategory($_POST['id'], $_POST['name']));
        }
    }

    public function deleteCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            echo json_encode($this->category->deleteCategory($_POST['id']));
        }
    }

    public function getCategories() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($this->category->getAllCategories());
        }
    }
}

$controller = new CategoryController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'addCategory') {
        $controller->addCategory();
    } elseif ($_POST['action'] === 'updateCategory') {
        $controller->updateCategory();
    } elseif ($_POST['action'] === 'deleteCategory') {
        $controller->deleteCategory();
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getCategories') {
    $controller->getCategories();
    exit;
}
?>
