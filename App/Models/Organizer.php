<?php
namespace App\Models;
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

use App\Models\User;
class Organizer extends User {
    public function createEvent() {
        // Create event logic
    }

    public function manageEvent() {
        // Manage event logic
    }

    public function viewSalesStatistics() {
        // View sales statistics logic
    }

    public function exportParticipants() {
        // Export participants logic
    }
}
?>
