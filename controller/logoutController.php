<?php

logoutController::logout();

class logoutController {
    public static function logout(){
        session_start();
        session_unset();
        session_destroy();
        $_SESSION = array();
        header('location: ../views/login.php');
    }
}
