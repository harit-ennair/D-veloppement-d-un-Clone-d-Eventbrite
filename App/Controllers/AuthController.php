<?php
namespace App\Controllers;

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use App\Models\User;
use Core\Auth;
use Core\Session;
use App\Models\Organizer;
use App\Models\Participant;

class AuthController {
    protected $auth;
    protected $session;

    public function __construct(Auth $auth, Session $session) {
        $this->auth = $auth;
        $this->session = $session;
    }

    public function signUp() {

        // if($this->auth->isLoggedIn()){
        //     header("location: /");
        //     exit();
        // }

        $name = $email = $role = "";
        $error = [
            "name" => "",
            "email" => "",
            "password" => "",
            "role" => ""
        ];

        // Check if form is submitted
        if (isset($_POST['submit'])) {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $role = htmlspecialchars($_POST['role']);

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->session->set('old', ['name' => $name, 'email' => $email, 'role' => $role]);
                $this->session->set('error', ['email' => "Email address is considered invalid."]);
                header('Location: /signUp');
                exit;
            }

            if (empty($role)) {
                $this->session->set('old', ['name' => $name, 'email' => $email, 'role' => $role]);
                $this->session->set('error', ['role' => "Select a role."]);
                header('Location: /signUp');

                exit;
            }

            if (empty($name) || !preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $this->session->set('old', ['name' => $name, 'email' => $email, 'role' => $role]);
                $this->session->set('error', ['name' => "Only letters and white space allowed."]);
                header('Location: /signUp');

                exit;
            }
            if(strlen($password) < 8){
                $this->session->set('old', ['name' => $name, 'email' => $email, 'role' => $role]);
                $this->session->set('error',['password'=>"invalid password"]);
                header('Location: /signUp');

                exit;
                

            }

            try {
                if (empty($error['name']) && empty($error['email']) && empty($error['password'])) {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    if ($role == 'organizer') {
                        $client = new Organizer($email, $hashedPassword, $role,$name);
                    } else {
                        $client = new Participant($email, $hashedPassword, $role,$name);
                    }
                     $userID=$client->register();

                    // $_SESSION['user']=["id"=>$userID,'name'=> $name, 'email' => $email,'role'=>$role];
                    $this->auth->login(['id' => $userID, 'name' => $name, 'email' => $email, 'role' => $role]);
                    header('Location: /'); // Redirect to dashboard or home page
                    exit;
                }
            } catch (\Exception $th) {
                $this->session->set('error', ['email' => $th->getMessage()]);
                $this->session->set('old', ['name' => $name, 'email' => $email, 'role' => $role]);
                header('Location: /signUp');
                exit;
            
        
        }
        
    }

    require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/register.php";
}

public function logIn()  {
    if(isset($_POST['submit'])){
        
        $email=htmlspecialchars($_POST['email']);
        $password=htmlspecialchars($_POST['password']);
        $password=password_verify($password,PASSWORD_BCRYPT);
    try{
        $user=new User($email,$password);
        $user=$user->login();
        // $this->auth->login([]);
        $this->auth->login($user);
    }
    catch(\Exception $th){
        
        $this->session->set('error', ['email' => $th->getMessage()]);
        $this->session->set("old",['email' => $email])  ;
        header('Location: /logIn.php');
    }
}
require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/login.php";

}
}
