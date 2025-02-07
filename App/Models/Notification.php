<?php
class Notification {
    private $id;
    private $user_id;
    private $message;
    private $type;
    private $created_at;

    public function __construct($id, $user_id, $message, $type, $created_at) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->message = $message;
        $this->type = $type;
        $this->created_at = $created_at;
    }

    public function sendNotification() {
        // Send notification logic
    }

    public function getNotifications() {
        // Get notifications logic
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
}
?>
