<?php
class Event {
    private $id;
    private $title;
    private $description;
    private $date;
    private $location;
    private $price;
    private $capacity;
    private $organizer_id;
    private $category_id;
    private $status;
    private $created_at;
    private $updated_at;

    public function __construct($id, $title, $description, $date, $location, $price, $capacity, $organizer_id, $category_id, $status, $created_at, $updated_at) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->location = $location;
        $this->price = $price;
        $this->capacity = $capacity;
        $this->organizer_id = $organizer_id;
        $this->category_id = $category_id;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function createEvent() {
        // Create event logic
    }

    public function updateEvent() {
        // Update event logic
    }

    public function deleteEvent() {
        // Delete event logic
    }

    public function validateEvent() {
        // Validate event logic
    }

    public function getEventDetails() {
        // Get event details logic
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    public function getOrganizerId() {
        return $this->organizer_id;
    }

    public function setOrganizerId($organizer_id) {
        $this->organizer_id = $organizer_id;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
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
