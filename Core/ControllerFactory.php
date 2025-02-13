<?php
namespace Core;

use Core\Auth;
use Core\Session;
use Config\Database;

class ControllerFactory
{
    public static function createController($controllerName)
    {
        $session = new Session();
        $auth = new Auth($session);
        $db = Database::getConnection();

        switch ($controllerName) {
            case 'App\Controllers\AuthController':
                return new $controllerName($auth, $session);
            
            // Add cases for other controllers with different dependencies
            // case 'App\Controllers\AnotherController':
            //     return new $controllerName($dependency1, $dependency2);

            case 'C_password':
                $controllerName = 'App\\Controllers\\C_password';
                return new $controllerName($db, $session);

            default:
                return new $controllerName();
    }
}
}
