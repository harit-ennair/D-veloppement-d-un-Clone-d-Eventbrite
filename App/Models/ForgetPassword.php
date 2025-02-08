<?php   
namespace App\Models;

// hade page atkone ta3  roket updet ta3 password 
class ForgetPassword {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createToken($email) {
        $token = bin2hex(random_bytes(16));
        $expires = date('Y-m-d H:i:s', strtotime('+30 minutes'));
        
        $query = "INSERT INTO password_resets (email, token, expires) VALUES (:email, :token, :expires)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['email' => $email, 'token' => $token, 'expires' => $expires]);
        
        return $token;
    }

    public function verifyToken($email, $token) {
        $query = "SELECT * FROM password_resets WHERE email = :email AND token = :token AND expires > :expires";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['email' => $email, 'token' => $token, 'expires' => date('Y-m-d H:i:s')]);
        
        return $stmt->fetch();
    }

    public function updatePassword($email, $password) {
        $query = "UPDATE users SET password = :password WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['email' => $email, 'password' => $password]);
    }
}


?>