<?php
namespace App\Models;
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
use Config\Database;
// use Database\Database;

class User {
    protected $id;
    protected $email;
    protected $password;
    protected $role;
    protected $name;
    protected $avatar;
    protected $created_at;
    protected $updated_at;
    protected static $pdo;

    public function __construct($email, $password, $role=null, $name=null, $avatar=null) {
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->name = $name;
        $this->avatar = $avatar;
        self::$pdo=Database::getConnection();
       
    }

    
    public function emailExiste(){
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([$this->email]);
        $result = $stmt->fetchAll();
        $emailExiste=false;
        if (count($result) > 0) {
            $emailExiste=true;
        } else {
            $emailExiste=false;
        }
        return $emailExiste;
    }
    public function login() {
        if(!$this->emailExiste()){
            throw new \Exception("This email does not exist");
        }
        else{
            $sql="SELECT id,name,email,password,role FROM users WHERE email=:email";
            $stmt=self::$pdo->prepare($sql);
            $stmt->execute([
                ":email"=>$this->email
            ]);
            $result=$stmt->fetch(\PDO::FETCH_ASSOC);
            if(!password_verify($this->password,$result['password'])){
                throw new \Exception("invalid password");
            }
            return $result;
            
        }
    }

    public function logout() {
        // Logout logic
    }

    public function updateProfile() {
        // Update profile logic
    }

    public function changePassword() {
        // Change password logic
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }
}
?>
