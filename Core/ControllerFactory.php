<?php
namespace Core;

use Core\Auth;
use Core\Session;

class ControllerFactory
{
    public static function createController($controllerName)
    {
        $session = new Session();
        $auth = new Auth($session);

        switch ($controllerName) {
            case 'App\Controllers\AuthController':
                return new $controllerName($auth, $session);
            
            // Add cases for other controllers with different dependencies
            // case 'App\Controllers\AnotherController':
            //     return new $controllerName($dependency1, $dependency2);

            case 'App\Controllers\C_password':
                return new $controllerName($db, $session, $_REQUEST);  

            default:
                return new $controllerName();
        }
    }
}
