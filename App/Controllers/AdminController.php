<?php
namespace App\Controllers;

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use App\Models\User;
use Core\Auth;
use Core\Session;
use App\Models\Organizer;
use App\Models\Participant;
use App\Repository\UserManager;
use App\Repository\eventManager;

class AdminController {
    public function adminDashboard() {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/adminDashboard.php";
    }

    public function verifyOrganizer() {
        $organizers =  UserManager::getOrganizers();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null; 
            $newStatus = $_POST['status'] ?? null; 
    
            if ($id && $newStatus) {
                UserManager::updateStatus($id, $newStatus);
            } else {
                echo "Error: Missing user ID or status.";
            }
        }
        
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/OrganaizerVerification.php";
    }

    public function updateUserStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null; 
            $newStatus = $_POST['status'] ?? null; 
            if ($id && $newStatus) {
                $success = UserManager::updateStatus($id, $newStatus);
                if ($success) {
                    echo "success";
                } else {
                    echo "Failed to update user status";
                }
            } else {
                echo "Error: Missing user ID or status";
            }
            exit;
        }
    }

    public function eventVerify() {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/eventsVerification.php";
    }

    public function category() {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/catTag.php";
    }

    public function userManager() {
        $users = UserManager::getUsers();
        if (isset($_POST['user_id']) && isset($_POST['action'])) {
            $userId = $_POST['user_id'];
            $action = $_POST['action']; 
    
            if ($action === 'ban') {
                UserManager::banUser($userId);
            } elseif ($action === 'unban') {
                UserManager::unbanUser($userId);
            } elseif ($action === 'inactivate') {
                UserManager::inactivUser($userId);
            }
        }
    
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/Users.php";
    }
    public function eventsManager() {
        $events = EventManager::showEvents();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id']) && isset($_POST['status'])) {
                try {
                    $id = $_POST['id'];
                    $status = $_POST['status'];
                    
                    // Use the corrected method name from EventManager
                    $success = EventManager::updateStatus($id, $status);
                    
                    if ($success) {
                        echo "success";
                    } else {
                        echo "No changes made to the event status";
                    }
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                }
                exit;
            }
        }
        
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/admin/eventsManager.php";
    }
}