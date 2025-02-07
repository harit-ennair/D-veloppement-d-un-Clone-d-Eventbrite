<?php
namespace App\Models;
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

use App\Models\User;
class Participant extends User {
    public function browseEvents() {
        // Browse events logic
    }

    public function bookTicket() {
        // Book ticket logic
    }

    public function cancelBooking() {
        // Cancel booking logic
    }

    public function requestRefund() {
        // Request refund logic
    }
}
?>
