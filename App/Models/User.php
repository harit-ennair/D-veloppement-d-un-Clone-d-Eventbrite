<?php
namespace App\Models;

class User {
    protected $id;
    protected $email;
    protected $password;
    protected $role;
    protected $name;
    protected $avatar;
    protected $created_at;
    protected $updated_at;

    public function __construct($id, $email, $password, $role, $name, $avatar, $created_at, $updated_at) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->name = $name;
        $this->avatar = $avatar;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function register() {
        // Registration logic
    }

    public function login() {
        // Login logic
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
