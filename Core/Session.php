<?php
namespace Core;

class Session {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key,$index=null) {
        if($index){
        return isset($_SESSION[$key][$index]) ? $_SESSION[$key][$index] : null;
    }else{
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    }

    public function remove($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public function destroy() {
        session_unset();
        session_destroy();
    }
}
