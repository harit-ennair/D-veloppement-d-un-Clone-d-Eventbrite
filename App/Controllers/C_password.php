<?php
namespace App\Controllers;
// hadi ay kone fiha ligic ta3 u pdet password 

// ohta dyale chek dayle expire dyale token 


class C_password extends Controller {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function resetPassword($email, $token) {
        $model = new \App\Models\ForgetPassword($this->db);
        
        $reset = $model->verifyToken($email, $token);
        
        if ($reset) {
            $this->view->render('resetPassword', ['email' => $email, 'token' => $token]);
        } else {
            $this->view->render('error', ['message' => 'Invalid or expired token']);
        }
    }

    public function updatePassword() {
        $email = $_POST['email'];
        $token = $_POST['token'];
        $password = $_POST['password'];
        
        $model = new \App\Models\ForgetPassword($this->db);
        
        $reset = $model->verifyToken($email, $token);
        
        if ($reset) {
            $model->updatePassword($email, password_hash($password, PASSWORD_DEFAULT));
            $this->view->render('success', ['message' => 'Password updated successfully']);
        } else {
            $this->view->render('error', ['message' => 'Invalid or expired token']);
        }
    }
}


?>