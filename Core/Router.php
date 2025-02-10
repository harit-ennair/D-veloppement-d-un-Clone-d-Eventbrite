<?php
namespace Core;
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';


// use App\Controllers\CarController;
use App\Controllers\AuthContorller;
use Core\Auth;
use Core\Session;
use Core\ControllerFactory;


class Router
{
    private array $routes = [];

    // public function __construct(array $routes) {
    //     $this->routes = $routes;
    // }
    public function add($method,$uri,$controller,$action){
        $this->routes[]=[
            "uri"=> $uri,
            "controller"=>$controller,
            "method"=>$method,
            "action"=>$action
        ];
    }

    public function get($uri,$controller,$action){
        $this->add("GET",$uri,$controller,$action);
    }
    public function post($uri,$controller,$action){
        $this->add("POST",$uri,$controller,$action);

    }
    public function delete($uri,$controller,$action){
        $this->add("DELETE",$uri,$controller,$action);
        
    }
    public function patch($uri,$controller,$action){
        $this->add("PATCH",$uri,$controller,$action);

    }
    public function put($uri,$controller,$action){
        $this->add("PUT",$uri,$controller,$action);
    }

    public function route($uri,$method){
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                $controllerClass = $route['controller'];
                $actionMethod = $route['action'];

                // Use the ControllerFactory to create the controller instance
                $controller = ControllerFactory::createController($controllerClass);

                if (method_exists($controller, $actionMethod)) {
                    return $controller->$actionMethod();
                } else {
                    $this->abort(404);
                }
            }
        }
        $this->abort(404);
    }

    

    private function abort(int $status = 404) {
        http_response_code($status);
        require_once $_SERVER['DOCUMENT_ROOT']."/App/Views/userFront/{$status}.php";

        exit();
    }
}
