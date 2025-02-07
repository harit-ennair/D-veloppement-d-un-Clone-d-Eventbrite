<?php
class Payment {
    private $id;
    private $ticket_id;
    private $amount;
    private $payment_method;
    private $status;
    private $created_at;
    private $updated_at;

    public function __construct($ticket_id, $amount, $payment_method, $status) {
        
        $this->ticket_id = $ticket_id;
        $this->amount = $amount;
        $this->payment_method = $payment_method;
        $this->status = $status;
    }

    public function processPayment() {
        // Process payment logic
    }

    public function refundPayment() {
        // Refund payment logic
    }

    public function getPaymentDetails() {
        // Get payment details logic
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTicketId() {
        return $this->ticket_id;
    }

    public function setTicketId($ticket_id) {
        $this->ticket_id = $ticket_id;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getPaymentMethod() {
        return $this->payment_method;
    }

    public function setPaymentMethod($payment_method) {
        $this->payment_method = $payment_method;
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
