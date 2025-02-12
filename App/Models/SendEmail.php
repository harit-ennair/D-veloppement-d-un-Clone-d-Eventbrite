<?php
namespace App\Models;  

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendEmail {
    private $mailer;
    
    public function __construct() {
        $this->mailer = new PHPMailer(true);
        $this->setupMailer();
    }
 
    private function setupMailer() {
        try {
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.gmail.com';
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = 'hamzaelboukri01@gmail.com';
            $this->mailer->Password = 'kwbf vohy toxo ydnu'; 
            $this->mailer->SMTPSecure = 'tls';
            $this->mailer->Port = 587;
            $this->mailer->SMTPDebug = 0; 
        } catch (Exception $e) {
            error_log("Mailer setup failed: " . $e->getMessage());
            throw new Exception("Email setup failed: " . $e->getMessage());
        }
    }

    public function sendResetEmail($email, $token) {
        try {
            $resetLink = "http://localhost/D-veloppement-d-un-Clone-d-Eventbrite/App/Views/resetPassword.php?token=" . urlencode($token) . "&email=" . urlencode($email);
           
            $this->mailer->clearAddresses(); 
            $this->mailer->setFrom('hamzaelboukri01@gmail.com', 'Game Store');
            $this->mailer->addAddress($email);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Password Reset Request';
            $this->mailer->Body = "
                <h2>Password Reset Request</h2>
                <p>Click the link below to reset your password:</p>
                <p><a href='{$resetLink}'>{$resetLink}</a></p>
                <p>This link will expire in 30 minutes.</p>
                <p>If you didn't request this, please ignore this email.</p>
            ";
            
            $result = $this->mailer->send();
            error_log("Email sent successfully to: " . $email);
            return $result;
        } catch (Exception $e) {
            error_log("Email sending failed: " . $e->getMessage());
            error_log("Full error trace: " . $e->getTraceAsString());
            throw new Exception("Failed to send password reset email: " . $e->getMessage());
        }
    }
}