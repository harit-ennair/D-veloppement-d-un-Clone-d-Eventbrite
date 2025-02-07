<?php
class Event {
    private $id;
    private $title;
    private $description;
    private $content;
    private $thumbnail;
    private $date;
    private $location;
    private $price;
    private $capacity;
    private $organizer_id;
    private $category_id;
    private $status;
    private $created_at;
    private $updated_at;
    private $contact_email;
    private $contact_phone;
    private $video_url;

    public function __construct($id, $title, $description, $content, $thumbnail, $date, $location, $price, $capacity, $organizer_id, $category_id, $status, $created_at, $updated_at, $contact_email = null, $contact_phone = null, $video_url = null) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->thumbnail = $thumbnail;
        $this->date = $date;
        $this->location = $location;
        $this->price = $price;
        $this->capacity = $capacity;
        $this->organizer_id = $organizer_id;
        $this->category_id = $category_id;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->contact_email = $contact_email;
        $this->contact_phone = $contact_phone;
        $this->video_url = $video_url;
    }

    // Method to create a new event
    public function createEvent() {
        // Logic to create a new event in the database
        // Example:
        // $db->insert('events', ['title' => $this->title, 'description' => $this->description, ...]);
    }

    // Method to update an existing event
    public function updateEvent() {
        // Logic to update an existing event in the database
        // Example:
        // $db->update('events', ['title' => $this->title, 'description' => $this->description, ...], ['id' => $this->id]);
    }

    // Method to delete an event
    public function deleteEvent() {
        // Logic to delete an event from the database
        // Example:
        // $db->delete('events', ['id' => $this->id]);
    }

    // Method to validate an event (e.g., by an admin)
    public function validateEvent() {
        // Logic to validate an event
        // Example:
        // $this->status = 'validated';
        // $db->update('events', ['status' => $this->status], ['id' => $this->id]);
    }

    // Method to get event details
    public function getEventDetails() {
        // Logic to retrieve event details from the database
        // Example:
        // return $db->select('events', ['id' => $this->id]);
    }

    // Method to set the thumbnail image
    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
    }

    // Method to get the thumbnail image
    public function getThumbnail() {
        return $this->thumbnail;
    }

    // Method to set the contact email
    public function setContactEmail($contact_email) {
        $this->contact_email = $contact_email;
    }

    // Method to get the contact email
    public function getContactEmail() {
        return $this->contact_email;
    }

    // Method to set the contact phone
    public function setContactPhone($contact_phone) {
        $this->contact_phone = $contact_phone;
    }

    // Method to get the contact phone
    public function getContactPhone() {
        return $this->contact_phone;
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

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
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

    public function getVideoUrl() {
        return $this->video_url;
    }

    public function setVideoUrl($video_url) {
        $this->video_url = $video_url;
    }
}
?>
