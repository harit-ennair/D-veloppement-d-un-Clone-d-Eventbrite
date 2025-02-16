<?php
namespace App\Controllers;

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use App\Models\User;
use Core\Auth;
use Core\Session;
use App\Models\Organizer;
use App\Models\Participant;
use App\Repository\EventManager;

class OrganizerController{
    private $session;

    public function __construct($session) {
        $this->session=$session;
    }
    public function organizerDashboard(){
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/organizer/organizerDashboard.php";
    }
    public function OrganizerEvents(){
        $events=EventManager::getEvents();
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/organizer/Events.php";
    }
    public function addEvent(){
        if(isset($_POST["submit"])){
            // print_r($_POST);
            // print_r($_FILES);
            $data=[];
            if(isset($_POST['submit'])){
                $data=[
                    'title'=>$_POST['title'],
                    'description'=>$_POST['description'],
                    'content'=>htmlspecialchars($_POST['content']),
                    'category_id'=>$_POST['categories'],
                    'organizer_id'=>$this->session->get("user","id"),
                    'contact_email'=>$_POST['contact-email'],
                    'contact_phone'=>$_POST['contact-phone'],
                    'price'=>$_POST['Price'],
                    'capacity'=>$_POST['Capacity'],
                    'date'=>$_POST['event_date'],
                    'location'=>$_POST['localisation'],
                    'status'=>'pending'
                ];
                $image=$_FILES['image'];
                if(empty($image['name'])){
                    $this->session->set('error',"Image is required");
                    if(isset($_POST['Event'])&& !empty($_POST['Event'])){
                        $id=$_POST['Event'];
                        header("location:/addEvent?Event=$id");
                        return;
                    } else {
                        header("location:/addEvent");
                        return;
                    }
                }
                foreach($data as $key=>$value){
                    if($key=='Event'||$key=='tags'||$key=='submit'){
                        continue;
                    }
                    if(empty($value)){
                        $this->session->set('error',"$key is required");
                        if(isset($_POST['Event'])&& !empty($_POST['Event'])){
                            $id=$_POST['Event'];
                            header("location:/addEvent?Event=$id");
                            return;
                        } else {
                            header("location:/addEvent");
                            return;
                        }
                    }
                }
                $video=$_FILES['video'];
                if(empty($video['name'])){
                    $_SESSION['error']="video is required";
                    if(isset($_POST['Event'])&& !empty($_POST['Event'])){
                        $id=$_POST['Event'];
                        header("location:/addEvent?Event=$id");
                        return;
                    } else {
                        header("location:/addEvent");
                        return;
                    }
                }
                $img_url = '/uploads/'.time().$image['name'];
                $target=$_SERVER['DOCUMENT_ROOT'].$img_url;
                move_uploaded_file($image['tmp_name'],$target);
                $data['thumbnail']=$img_url;

                $vid_url = '/uploads/'.time().$video['name'];
                $target=$_SERVER['DOCUMENT_ROOT'].$vid_url;
                move_uploaded_file($video['tmp_name'],$target); 
                $data['video_url']=$vid_url;

                print_r($data);
                // print_r($_POST);
                // print_r($_GET);
                if(isset($_POST['Event'])&& !empty($_POST['Event'])){
                    $id=$_POST['Event'];
                    EventManager::updateEvent($data,$id);
                    // header("location:/YouDemy/app/views/pages/teacher/Events.php");
                    header("location:/OrganizerEvents");

                } else {
                    // print_r($data);
                    try{
                    EventManager::createEvent($data);
                    header("location:/OrganizerEvents");
                    exit();
                }catch(\Exception $e){
                    echo $e->getMessage();

                }
                }
            }
        }
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/organizer/addEvent.php";
    }
    
}