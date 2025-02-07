<?php
namespace App\Models;
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

use App\Models\User;
class Admin extends User {
    public function manageUsers() {
        // Manage users logic
    }

    public function validateEvents() {
        // Validate events logic
    }

    public function viewStatistics() {
        // View statistics logic
    }

    public function moderateComments() {
        // Moderate comments logic
    }
}
?>
