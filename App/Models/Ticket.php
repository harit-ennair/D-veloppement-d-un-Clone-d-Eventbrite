<?php
class Ticket {
    private $id;
    private $event_id;
    private $user_id;
    private $type;
    private $price;
    private $qr_code;
    private $status;
    private $created_at;
    private $updated_at;

    public function __construct($id, $event_id, $user_id, $type, $price, $qr_code, $status, $created_at, $updated_at) {
        $this->id = $id;
        $this->event_id = $event_id;
        $this->user_id = $user_id;
        $this->type = $type;
        $this->price = $price;
        $this->qr_code = $qr_code;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function bookTicket() {
        // Book ticket logic
    }

    public function cancelTicket() {
        // Cancel ticket logic
    }

    public function generateQRCode() {
        // Generate QR code logic
    }

    public function downloadTicket() {
        // Download ticket logic
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEventId() {
        return $this->event_id;
    }

    public function setEventId($event_id) {
        $this->event_id = $event_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getQRCode() {
        return $this->qr_code;
    }

    public function setQRCode($qr_code) {
        $this->qr_code = $qr_code;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
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
