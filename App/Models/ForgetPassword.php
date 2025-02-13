<?php
namespace App\Models;
require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
use PDO;

class ForgetPassword {
    private $db;

    public function __construct($db) {
        $this->db = $db::getConnection();
    }

    public function createToken($email) {
        $token = bin2hex(random_bytes(50));
        $query = "UPDATE users 
                 SET reset_token = :token, 
                     reset_token_expiry = NOW() + INTERVAL '30 minutes' 
                 WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['email' => $email, 'token' => $token]);
        return $token;
    }

    public function verifyToken($email, $token) {
        $query = "SELECT * FROM users 
                 WHERE email = :email 
                 AND reset_token = :token 
                 AND reset_token_expiry > NOW()";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['email' => $email, 'token' => $token]);
        return $stmt->fetch();
    }

    public function updatePassword($email, $password) {
        $query = "UPDATE users 
                 SET password = :password,
                     reset_token = NULL,
                     reset_token_expiry = NULL 
                 WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'email' => $email, 
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
        var_dump($stmt);
      
    }
}