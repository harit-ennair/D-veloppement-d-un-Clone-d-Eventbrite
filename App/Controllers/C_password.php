<?php
namespace App\Controllers;
require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use Config\Database;
use App\Models\ForgetPassword;
use App\Models\SendEmail;
use Core\Session;

class C_password {
    private $db;
    private $session;
    private $mailer;
    private $forgetPassword;

    public function __construct($db, $session) {
        $this->db = $db;
        $this->session = $session;
        $this->mailer = new SendEmail();
        $this->forgetPassword = new ForgetPassword($db);
    }

    public function showForgotForm() {
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/forgetPassword.php";
    }

    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

            if (!$email) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Invalid email format'
                ]);
                return;
            }

            try {
                $user = $this->getUserByEmail($email);
                if ($user) {
                    $token = $this->forgetPassword->createToken($email);
                    $this->mailer->sendResetEmail($email, $token);
                }

                echo json_encode([
                    'success' => true,
                    'message' => 'If your email exists in our system, you will receive a password reset link.'
                ]);
            } catch (\Exception $e) {
                error_log("Password reset error: " . $e->getMessage());
                echo json_encode([
                    'success' => false,
                    'message' => 'An error occurred. Please try again later.'
                ]);
            }
        }
    }

    public function showResetForm() {
        $token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);

        if (!$token || !$email) {
            header('Location: /login');
            exit;
        }

        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/resetPassword.php";
    }

    public function resetPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';
    //         var_dump($_POST);
    // exit;

            if (!$email || !$token) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Invalid request parameters'
                ]);
                return;
            }

            try {
                if (strlen($password) < 8) {
                    throw new \Exception('Password must be at least 8 characters long');
                }

                if ($password !== $confirmPassword) {
                    throw new \Exception('Passwords do not match');
                }

                $tokenData = $this->forgetPassword->verifyToken($email, $token);
                if (!$tokenData) {
                    throw new \Exception('Invalid or expired reset token');
                }

                $this->forgetPassword->updatePassword($email, $password);

                echo json_encode([
                    'success' => true,
                    'message' => 'Your password has been successfully updated.'
                ]);
            } catch (\Exception $e) {
                error_log("Password reset error: " . $e->getMessage());
                echo json_encode([
                    'success' => false,
                    'message' => $e->getMessage()
                ]);
            }
        }
    }

    private function getUserByEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        try {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->execute(['email' => $email]);
            return $stmt->fetch();
        } catch (\PDOException $e) {
            error_log("Database error in getUserByEmail: " . $e->getMessage());
            throw new \Exception('Database error occurred');
        }
    }
}