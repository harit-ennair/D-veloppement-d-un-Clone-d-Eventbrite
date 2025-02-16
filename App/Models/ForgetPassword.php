<?php
namespace App\Models;
require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
use PDO;

class ForgetPassword {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createToken($email) {
        $token = bin2hex(random_bytes(50));
        $query = "UPDATE users 
                 SET reset_token = :token, 
                     reset_token_expiry = NOW() + INTERVAL '30 minutes' 
                 WHERE email = :email";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['email' => $email, 'token' => $token]) ? $token : false;
    }

    public function verifyToken($email, $token) {
        $query = "SELECT * FROM users 
                 WHERE email = :email 
                 AND reset_token = :token 
                 AND reset_token_expiry > NOW()";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['email' => $email, 'token' => $token]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : false;
    }

    public function updatePassword($email, $password) {
        try {
            $this->db->beginTransaction();
            
            $query = "UPDATE users 
                     SET password = :password,
                         reset_token = NULL,
                         reset_token_expiry = NULL 
                     WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $success = $stmt->execute([
                'email' => $email, 
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            
            if (!$success) {
                $this->db->rollBack();
                throw new \Exception('Failed to update password');
            }
            
            $rowCount = $stmt->rowCount();
            if ($rowCount === 0) {
                $this->db->rollBack();
                throw new \Exception('No user found with this email');
            }
            
            $this->db->commit();
            return true;
            
        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log("Password update error: " . $e->getMessage());
            throw $e;
        }
    }
}